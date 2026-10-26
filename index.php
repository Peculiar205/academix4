<?php
/**
 * AcademixSuite - Main Entry Point
 */

define('ROOT_PATH', __DIR__);

$sessionConfig = __DIR__ . '/includes/session_config.php';
if (is_readable($sessionConfig)) {
    require_once $sessionConfig;
}

if (session_status() === PHP_SESSION_NONE) {
    session_name('AcademixSuite_session');
    session_start(function_exists('academix_session_options') ? academix_session_options() : []);
}

$autoloadPath = __DIR__ . '/includes/autoload.php';
if (!is_readable($autoloadPath)) {
    http_response_code(500);
    echo 'System configuration error. Please contact administrator.';
    exit;
}

require_once $autoloadPath;

if (class_exists('ErrorHandler')) {
    ErrorHandler::register();
}

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$requestUri = strtok($requestUri, '?');
$requestPath = trim($requestUri, '/');
$schoolSlug = function_exists('school_subdomain_slug') ? school_subdomain_slug() : null;

// Defensive fallback for wildcard subdomain requests if Apache rewrite misses.
if ($schoolSlug) {
    if ($requestPath === '' || $requestPath === 'index.php') {
        $_GET['slug'] = $schoolSlug;
        require_once __DIR__ . '/tenant/school_profile.php';
        exit;
    }

    if (preg_match('/^(login|logout)(\.php)?$/', $requestPath, $matches)) {
        $_GET['school_slug'] = $schoolSlug;
        require_once __DIR__ . '/tenant/' . $matches[1] . '.php';
        exit;
    }

    if ($requestPath === 'forgot-password' || $requestPath === 'forgot-password.php') {
        $_GET['school_slug'] = $schoolSlug;
        require_once __DIR__ . '/tenant/forgot-password.php';
        exit;
    }

    if (preg_match('#^(admin|admin2|teacher|student|parent|staff)(?:/(.*))?$#', $requestPath, $matches)) {
        $_GET['school_slug'] = $schoolSlug;
        $_GET['user_type'] = $matches[1];
        $_GET['page'] = !empty($matches[2]) ? $matches[2] : 'dashboard.php';
        require_once __DIR__ . '/tenant/router.php';
        exit;
    }
}

if (strpos($requestUri, '/platform/') === 0) {
    $platformIndex = __DIR__ . '/platform/index.php';
    if (is_readable($platformIndex)) {
        require_once $platformIndex;
    } else {
        http_response_code(500);
        echo 'Platform entry point is missing.';
    }
    exit;
} elseif ($requestUri === '/login' || $requestUri === '/login.php') {
    if (isset($_SESSION['super_admin'])) {
        header('Location: /platform/admin/dashboard.php');
    } elseif (isset($_SESSION['school_auth'])) {
        $sessionSchoolSlug = $_SESSION['school_auth']['school_slug'] ?? '';
        $userType = $_SESSION['school_auth']['user_type'] ?? 'admin';
        $redirectUrl = function_exists('school_route_url')
            ? school_route_url($sessionSchoolSlug, $userType, 'dashboard.php', false)
            : '/tenant/' . rawurlencode($sessionSchoolSlug) . '/' . rawurlencode($userType) . '/dashboard.php';
        header('Location: ' . $redirectUrl);
    } else {
        header('Location: ' . (function_exists('school_login_url') ? school_login_url('', false) : '/tenant/login.php'));
    }
    exit;
}

foreach ([__DIR__ . '/home.php', __DIR__ . '/tenant/index.php'] as $homeFile) {
    if (is_readable($homeFile)) {
        require_once $homeFile;
        exit;
    }
}

http_response_code(500);
echo 'Home page is missing. Please upload home.php or tenant/index.php.';
exit;
