<?php
/**
 * Cron Dispatcher
 * Central entry point for all cron jobs
 * 
 * Usage: php cron.php <task_name>
 * 
 * Available tasks:
 * - suspend_accounts: Suspend school accounts based on criteria
 * - process_bulk_emails: Process bulk email queue
 * - process_scheduled_emails: Send scheduled emails
 * - publish_announcements: Publish scheduled announcements
 * - test: Test cron system
 */

// Ensure script is run from CLI only
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    die('Access denied. This script can only be run from command line.');
}

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);

// Set timezone
date_default_timezone_set('Africa/Lagos');

// Define base path
define('BASE_PATH', __DIR__);

// Load configuration
require_once BASE_PATH . '/config/database.php';

// Load cron libraries
require_once BASE_PATH . '/cron/lib/CronLock.php';
require_once BASE_PATH . '/cron/lib/CronLogger.php';
require_once BASE_PATH . '/cron/lib/CronTask.php';
require_once BASE_PATH . '/cron/lib/EmailQueue.php';

// Load cron configuration
require_once BASE_PATH . '/cron/config.php';

/**
 * Get database connection
 */
function getDatabaseConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_PLATFORM_NAME . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]);
        
        return $pdo;
        
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage() . PHP_EOL;
        exit(1);
    }
}

/**
 * Main execution
 */
function main($argv) {
    // Check if task name is provided
    if (!isset($argv[1])) {
        echo "Usage: php cron.php <task_name>" . PHP_EOL;
        echo PHP_EOL;
        echo "Available tasks:" . PHP_EOL;
        echo "  suspend_accounts          - Suspend school accounts based on criteria" . PHP_EOL;
        echo "  process_bulk_emails       - Process bulk email queue" . PHP_EOL;
        echo "  process_scheduled_emails  - Send scheduled emails" . PHP_EOL;
        echo "  publish_announcements     - Publish scheduled announcements" . PHP_EOL;
        echo "  test                      - Test cron system" . PHP_EOL;
        exit(1);
    }
    
    $taskName = $argv[1];
    
    // Map task names to task files
    $taskMap = [
        'suspend_accounts' => BASE_PATH . '/cron/tasks/SuspendSchoolAccounts.php',
        'process_bulk_emails' => BASE_PATH . '/cron/tasks/ProcessBulkEmails.php',
        'process_scheduled_emails' => BASE_PATH . '/cron/tasks/ProcessScheduledEmails.php',
        'publish_announcements' => BASE_PATH . '/cron/tasks/PublishScheduledAnnouncements.php',
        'test' => null // Special test task
    ];
    
    // Validate task name
    if (!array_key_exists($taskName, $taskMap)) {
        echo "Error: Unknown task '$taskName'" . PHP_EOL;
        echo "Run 'php cron.php' without arguments to see available tasks." . PHP_EOL;
        exit(1);
    }
    
    // Handle test task
    if ($taskName === 'test') {
        echo "Cron system test" . PHP_EOL;
        echo "=================" . PHP_EOL;
        echo "Current time: " . date('Y-m-d H:i:s') . PHP_EOL;
        echo "PHP version: " . PHP_VERSION . PHP_EOL;
        echo "Memory limit: " . ini_get('memory_limit') . PHP_EOL;
        echo "Max execution time: " . ini_get('max_execution_time') . PHP_EOL;
        echo PHP_EOL;
        echo "✓ Cron system is working!" . PHP_EOL;
        
        // Test database connection
        try {
            $db = getDatabaseConnection();
            echo "✓ Database connection successful" . PHP_EOL;
        } catch (Exception $e) {
            echo "✗ Database connection failed: " . $e->getMessage() . PHP_EOL;
            exit(1);
        }
        
        // Test logging
        try {
            $logger = new CronLogger('test', $db);
            $logger->info("Test log entry");
            echo "✓ Logging system working" . PHP_EOL;
        } catch (Exception $e) {
            echo "✗ Logging failed: " . $e->getMessage() . PHP_EOL;
        }
        
        // Test locking
        try {
            $lock = new CronLock('test');
            if ($lock->acquire()) {
                echo "✓ Locking system working" . PHP_EOL;
                $lock->release();
            } else {
                echo "✗ Failed to acquire lock" . PHP_EOL;
            }
        } catch (Exception $e) {
            echo "✗ Locking failed: " . $e->getMessage() . PHP_EOL;
        }
        
        exit(0);
    }
    
    // Acquire lock for the task
    $lock = new CronLock($taskName);
    
    if (!$lock->acquire()) {
        $lockInfo = $lock->getLockInfo();
        echo "Task '$taskName' is already running." . PHP_EOL;
        if ($lockInfo) {
            echo "Lock info: " . json_encode($lockInfo, JSON_PRETTY_PRINT) . PHP_EOL;
        }
        exit(0);
    }
    
    try {
        // Get database connection
        $db = getDatabaseConnection();
        
        // Load task file
        require_once $taskMap[$taskName];
        
        // Determine task class name (convert snake_case to PascalCase)
        $className = str_replace('_', '', ucwords($taskName, '_'));
        
        // Instantiate and run task
        if (!class_exists($className)) {
            throw new Exception("Task class '$className' not found");
        }
        
        $task = new $className($db, $taskName);
        $success = $task->run();
        
        // Release lock
        $lock->release();
        
        exit($success ? 0 : 1);
        
    } catch (Exception $e) {
        echo "Fatal error: " . $e->getMessage() . PHP_EOL;
        echo "File: " . $e->getFile() . PHP_EOL;
        echo "Line: " . $e->getLine() . PHP_EOL;
        
        // Release lock
        $lock->release();
        
        exit(1);
    }
}

// Run main function
main($argv);
