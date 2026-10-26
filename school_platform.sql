-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2026 at 01:52 PM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academixsuite_platform`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_school_database` (IN `school_id` INT)   BEGIN
    DECLARE db_name VARCHAR(100);
    SET db_name = CONCAT('school_', school_id);
    
    -- Create the database
    SET @create_db = CONCAT('CREATE DATABASE `', db_name, '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    PREPARE stmt FROM @create_db;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
    -- Grant privileges to app user
    SET @grant_priv = CONCAT('GRANT ALL PRIVILEGES ON `', db_name, '`.* TO \'academixsuite_platfrom\'@\'localhost\'');
    PREPARE stmt FROM @grant_priv;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
    FLUSH PRIVILEGES;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSchoolStatistics` (IN `school_id` INT)   BEGIN
    SELECT
        s.name AS school_name,
        s.student_count,
        s.teacher_count,
        s.class_count,
        COUNT(DISTINCT er.id) AS total_enrollment_requests,
        SUM(CASE WHEN er.status='accepted' THEN 1 ELSE 0 END) AS accepted_enrollments,
        SUM(CASE WHEN er.status='pending' THEN 1 ELSE 0 END) AS pending_enrollments,
        COUNT(DISTINCT inv.id) AS total_invoices,
        SUM(CASE WHEN inv.status='paid' THEN inv.total_amount ELSE 0 END) AS total_revenue,
        COUNT(DISTINCT st.id) AS open_tickets
    FROM schools s
    LEFT JOIN enrollment_requests er ON s.id = er.school_id
    LEFT JOIN invoices inv ON s.id = inv.school_id
    LEFT JOIN support_tickets st ON s.id = st.school_id AND st.status IN ('open', 'in_progress')
    WHERE s.id = school_id
    GROUP BY s.id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `active_schools_view`
--

CREATE TABLE `active_schools_view` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `plan_name` varchar(100) DEFAULT NULL,
  `price_monthly` decimal(10,2) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `event` varchar(100) NOT NULL,
  `auditable_type` varchar(255) DEFAULT NULL,
  `auditable_id` int(10) UNSIGNED DEFAULT NULL,
  `old_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`old_values`)),
  `new_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`new_values`)),
  `url` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `school_id`, `user_id`, `user_type`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`) VALUES
(1, 1, 1, 'super_admin', 'school_created', 'schools', 1, NULL, '{\"name\":\"bitflux wallet\",\"status\":\"trial\",\"database_created\":true,\"database_name\":\"school_1\"}', '/platform/admin/schools/process_provision.php', '2605:59c0:ea6:5e08:c65:1bc8:5b65:6f4a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', NULL, '2026-02-16 17:30:30'),
(2, 2, 1, 'super_admin', 'school_created', 'schools', 2, NULL, '{\"name\":\"Nobsams International \",\"status\":\"trial\",\"database_created\":true,\"database_name\":\"school_2\"}', '/platform/admin/schools/process_provision.php', '2605:59c0:ea6:5e08:c65:1bc8:5b65:6f4a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', NULL, '2026-02-16 18:33:56'),
(3, 3, 1, 'super_admin', 'school_created', 'schools', 3, NULL, '{\"name\":\"wisdom gate international\",\"status\":\"trial\",\"database_created\":true,\"database_name\":\"school_3\"}', '/platform/admin/schools/process_provision.php', '2605:59c0:ea6:5e08:c65:1bc8:5b65:6f4a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', NULL, '2026-02-16 19:16:08'),
(4, 4, 1, 'super_admin', 'school_created', 'schools', 4, NULL, '{\"name\":\"Goodnew international\",\"status\":\"trial\",\"database_created\":true,\"database_name\":\"school_4\"}', '/platform/admin/schools/process_provision.php', '197.210.55.168', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', NULL, '2026-02-17 09:33:18'),
(5, 5, 1, 'super_admin', 'school_created', 'schools', 5, NULL, '{\"name\":\" Damtoj international\",\"status\":\"trial\",\"database_created\":true,\"database_name\":\"school_5\"}', '/platform/admin/schools/process_provision.php', '98.97.79.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-02-18 16:11:48'),
(6, 6, 1, 'super_admin', 'school_created', 'schools', 6, NULL, '{\"name\":\"bitflux wallet\",\"status\":\"trial\",\"database_created\":true,\"database_name\":\"school_6\",\"onboarding_log\":\"26 steps logged\"}', '/platform/admin/schools/process_provision.php', '98.97.79.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-02-18 17:11:37'),
(7, 7, 1, 'super_admin', 'school_created', 'schools', 7, NULL, '{\"name\":\"spring blooms college\",\"status\":\"trial\",\"database_created\":true,\"database_name\":\"school_7\",\"onboarding_log\":\"26 steps logged\"}', '/platform/admin/schools/process_provision.php', '98.97.79.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-02-18 18:40:51'),
(8, 8, 1, 'super_admin', 'school_created', 'schools', 8, NULL, '{\"name\":\"blue rose\",\"status\":\"trial\",\"database_created\":true,\"database_name\":\"school_8\",\"onboarding_log\":\"26 steps logged\"}', '/platform/admin/schools/process_provision.php', '98.97.79.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-02-18 19:24:12'),
(9, 6, 1, 'admin', 'settings_updated', 'schools', 6, NULL, '{\"updated_fields\":[\"name\",\"email\",\"phone\",\"address\",\"city\",\"state\",\"country\",\"postal_code\",\"website\",\"establishment_year\",\"school_type\",\"curriculum\",\"principal_name\",\"principal_message\",\"mission_statement\",\"vision_statement\",\"description\",\"timezone\",\"currency\",\"language\"]}', NULL, '98.97.76.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-03 13:55:58'),
(10, 6, 1, 'admin', 'settings_updated', 'schools', 6, NULL, '{\"updated_fields\":[\"name\",\"email\",\"phone\",\"address\",\"city\",\"state\",\"country\",\"postal_code\",\"website\",\"establishment_year\",\"school_type\",\"curriculum\",\"principal_name\",\"principal_message\",\"mission_statement\",\"vision_statement\",\"description\",\"timezone\",\"currency\",\"language\"]}', NULL, '98.97.76.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-03 13:56:11'),
(11, 6, 1, 'admin', 'backup_created', 'database_backups', 0, NULL, '{\"filename\":\"backup_6_2026-03-03_15-05-03.sql\"}', NULL, '98.97.76.13', NULL, NULL, '2026-03-03 14:05:03'),
(12, 6, 1, 'admin', 'settings_updated', 'schools', 6, NULL, '{\"updated_fields\":[\"name\",\"email\",\"phone\",\"address\",\"city\",\"state\",\"country\",\"postal_code\",\"website\",\"establishment_year\",\"school_type\",\"curriculum\",\"principal_name\",\"principal_message\",\"mission_statement\",\"vision_statement\",\"description\",\"timezone\",\"currency\",\"language\"]}', NULL, '98.97.76.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-03 14:07:41'),
(13, 6, 1, 'admin', 'settings_updated', 'schools', 6, NULL, '{\"updated_fields\":[\"name\",\"email\",\"phone\",\"address\",\"city\",\"state\",\"country\",\"postal_code\",\"website\",\"establishment_year\",\"school_type\",\"curriculum\",\"principal_name\",\"principal_message\",\"mission_statement\",\"vision_statement\",\"description\",\"timezone\",\"currency\",\"language\"]}', NULL, '98.97.76.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-03 14:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `bulk_email_campaigns`
--

CREATE TABLE `bulk_email_campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL COMMENT 'Super admin who created campaign',
  `subject` varchar(500) NOT NULL,
  `template_name` varchar(100) DEFAULT NULL,
  `filters` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Status filters, trial inclusion, etc.' CHECK (json_valid(`filters`)),
  `total_recipients` int(10) UNSIGNED DEFAULT 0,
  `queued_count` int(10) UNSIGNED DEFAULT 0,
  `sent_count` int(10) UNSIGNED DEFAULT 0,
  `failed_count` int(10) UNSIGNED DEFAULT 0,
  `pending_count` int(10) UNSIGNED DEFAULT 0,
  `cancelled_count` int(10) UNSIGNED DEFAULT 0,
  `status` enum('draft','queued','processing','completed','failed','cancelled') DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `started_at` timestamp NULL DEFAULT NULL COMMENT 'When first email was sent',
  `completed_at` timestamp NULL DEFAULT NULL COMMENT 'When all emails processed',
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Error summaries, performance metrics, etc.' CHECK (json_valid(`details`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bulk email campaign tracking and statistics';

-- --------------------------------------------------------

--
-- Table structure for table `cron_execution_history`
--

CREATE TABLE `cron_execution_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `status` enum('started','completed','failed') DEFAULT 'started',
  `started_at` datetime NOT NULL,
  `completed_at` datetime DEFAULT NULL,
  `execution_time` decimal(10,4) DEFAULT NULL COMMENT 'Execution time in seconds',
  `memory_peak` int(10) UNSIGNED DEFAULT NULL COMMENT 'Peak memory in bytes',
  `items_processed` int(10) UNSIGNED DEFAULT 0,
  `items_succeeded` int(10) UNSIGNED DEFAULT 0,
  `items_failed` int(10) UNSIGNED DEFAULT 0,
  `error_message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cron_logs`
--

CREATE TABLE `cron_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `level` enum('INFO','WARNING','ERROR','SUCCESS') DEFAULT 'INFO',
  `message` text NOT NULL,
  `context` text DEFAULT NULL COMMENT 'JSON context data',
  `execution_time` decimal(10,4) DEFAULT NULL COMMENT 'Execution time in seconds',
  `memory_used` int(10) UNSIGNED DEFAULT NULL COMMENT 'Memory used in bytes',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cron_schedules`
--

CREATE TABLE `cron_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `schedule` varchar(100) NOT NULL COMMENT 'Cron expression: * * * * *',
  `command` varchar(255) NOT NULL COMMENT 'PHP file to execute',
  `is_active` tinyint(1) DEFAULT 1,
  `last_run_at` datetime DEFAULT NULL,
  `next_run_at` datetime DEFAULT NULL,
  `run_count` int(10) UNSIGNED DEFAULT 0,
  `failure_count` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cron_schedules`
--

INSERT INTO `cron_schedules` (`id`, `task_name`, `description`, `schedule`, `command`, `is_active`, `last_run_at`, `next_run_at`, `run_count`, `failure_count`, `created_at`, `updated_at`) VALUES
(1, 'process_email_queue', 'Process pending emails in queue', '*/5 * * * *', 'tasks/process_email_queue.php', 1, NULL, NULL, 0, 0, '2026-02-16 17:39:31', '2026-02-16 17:39:31'),
(2, 'process_scheduled_emails', 'Send scheduled emails', '*/10 * * * *', 'tasks/process_scheduled_emails.php', 1, NULL, NULL, 0, 0, '2026-02-16 17:39:31', '2026-02-16 17:39:31'),
(3, 'process_student_suspensions', 'Process student account suspensions', '0 * * * *', 'tasks/process_student_suspensions.php', 1, NULL, NULL, 0, 0, '2026-02-16 17:39:31', '2026-02-16 17:39:31'),
(4, 'publish_scheduled_announcements', 'Publish scheduled announcements', '*/15 * * * *', 'tasks/publish_scheduled_announcements.php', 1, NULL, NULL, 0, 0, '2026-02-16 17:39:31', '2026-02-16 17:39:31'),
(5, 'cleanup_old_logs', 'Clean up old cron logs', '0 2 * * *', 'tasks/cleanup_old_logs.php', 1, NULL, NULL, 0, 0, '2026-02-16 17:39:31', '2026-02-16 17:39:31'),
(6, 'retry_failed_emails', 'Retry failed emails', '0 */6 * * *', 'tasks/retry_failed_emails.php', 1, NULL, NULL, 0, 0, '2026-02-16 17:39:31', '2026-02-16 17:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `database_backups`
--

CREATE TABLE `database_backups` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `database_name` varchar(100) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `backup_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `database_backups`
--

INSERT INTO `database_backups` (`id`, `school_id`, `database_name`, `filename`, `file_size`, `backup_type`, `created_at`) VALUES
(1, 6, 'school_6', 'backup_6_2026-03-03_15-05-03.sql', 0, 'manual', '2026-03-03 14:05:03'),
(2, 6, 'school_6', 'school_6_backup_2026-03-24_09-20-20.sql.gz', 42245, 'manual', '2026-03-24 08:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `email_bounces`
--

CREATE TABLE `email_bounces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_queue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `recipient_email` varchar(255) NOT NULL,
  `bounce_type` enum('hard','soft','complaint','unsubscribe') NOT NULL,
  `bounce_reason` text DEFAULT NULL,
  `bounce_code` varchar(50) DEFAULT NULL,
  `provider_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Raw webhook data from email provider' CHECK (json_valid(`provider_data`)),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Email bounce and complaint tracking for deliverability';

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `to_email` varchar(255) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `template` varchar(100) DEFAULT NULL,
  `status` enum('sent','failed','bounced') DEFAULT 'sent',
  `message_id` varchar(255) DEFAULT NULL,
  `opened_at` timestamp NULL DEFAULT NULL,
  `clicked_at` timestamp NULL DEFAULT NULL,
  `error_message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_queue`
--

CREATE TABLE `email_queue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Multi-tenant identifier',
  `school_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'School FK if applicable',
  `recipient_email` varchar(255) NOT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `recipient_type` enum('school_admin','teacher','parent','student','other') DEFAULT 'school_admin',
  `subject` varchar(500) NOT NULL,
  `body_html` text NOT NULL,
  `body_text` text DEFAULT NULL COMMENT 'Plain text version',
  `template_name` varchar(100) DEFAULT NULL,
  `template_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Template variables as JSON' CHECK (json_valid(`template_data`)),
  `from_email` varchar(255) NOT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `reply_to` varchar(255) DEFAULT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Additional email headers' CHECK (json_valid(`headers`)),
  `attachments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Attachment metadata' CHECK (json_valid(`attachments`)),
  `status` enum('pending','processing','sent','failed','cancelled') DEFAULT 'pending',
  `priority` tinyint(3) UNSIGNED DEFAULT 5 COMMENT '1=highest, 10=lowest',
  `attempts` tinyint(3) UNSIGNED DEFAULT 0,
  `max_attempts` tinyint(3) UNSIGNED DEFAULT 3,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `scheduled_at` timestamp NULL DEFAULT NULL COMMENT 'For delayed/scheduled sending',
  `processing_at` timestamp NULL DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `failed_at` timestamp NULL DEFAULT NULL,
  `next_retry_at` timestamp NULL DEFAULT NULL COMMENT 'Exponential backoff retry time',
  `error_message` text DEFAULT NULL,
  `error_code` varchar(50) DEFAULT NULL,
  `smtp_response` text DEFAULT NULL COMMENT 'Full SMTP server response',
  `campaign_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_id` varchar(100) DEFAULT NULL COMMENT 'Batch identifier for grouping',
  `message_id` varchar(255) DEFAULT NULL COMMENT 'SMTP Message-ID header',
  `provider_message_id` varchar(255) DEFAULT NULL COMMENT 'SendGrid/Mailgun/SES message ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Email queue for asynchronous bulk email processing';

--
-- Dumping data for table `email_queue`
--

INSERT INTO `email_queue` (`id`, `tenant_id`, `school_id`, `recipient_email`, `recipient_name`, `recipient_type`, `subject`, `body_html`, `body_text`, `template_name`, `template_data`, `from_email`, `from_name`, `reply_to`, `headers`, `attachments`, `status`, `priority`, `attempts`, `max_attempts`, `created_at`, `scheduled_at`, `processing_at`, `sent_at`, `failed_at`, `next_retry_at`, `error_message`, `error_code`, `smtp_response`, `campaign_id`, `batch_id`, `message_id`, `provider_message_id`) VALUES
(1, NULL, 3, 'favourhenry05@gmail.com', 'Favourhenry05', 'school_admin', 'Welcome to AcademixSuite! 🎓 - Your School is Ready', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Welcome to AcademixSuite</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <h1 style=\"margin: 0; font-size: 32px;\">🎓 AcademixSuite</h1>\n                    <p style=\"opacity: 0.9; margin: 8px 0 0 0;\">School Management Simplified</p>\n                </div>\n                \n                <div class=\"content\">\n                    <h2 style=\"color: #1f2937; margin-top: 0;\">Welcome, james azu!</h2>\n                    \n                    <div class=\"card\">\n                        <div style=\"display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;\">\n                            <h3 style=\"margin: 0; color: #1f2937;\">Your School: wisdom gate international</h3>\n                            <span class=\"trial-badge\">7-Day Free Trial</span>\n                        </div>\n                        \n                        <p>Your school has been successfully provisioned and is ready to use with our <strong>Professional</strong> plan.</p>\n                        \n                        <div class=\"credentials\">\n                            <h4 style=\"margin-top: 0; color: #1f2937;\">Login Credentials:</h4>\n                            <p><strong>Email:</strong> favourhenry05@gmail.com</p>\n                            <p><strong>Password:</strong> 74DB&amp;cUdpQGG</p>\n                            <p><strong>Login URL:</strong> <a href=\"https://www.academixsuite.com/tenant/wisdom-gate-international/login.php\">https://www.academixsuite.com/tenant/wisdom-gate-international/login.php</a></p>\n                        </div>\n                        \n                        <div style=\"text-align: center; margin: 32px 0;\">\n                            <a href=\"https://www.academixsuite.com/tenant/wisdom-gate-international/login.php\" class=\"button\">🚀 Launch School Portal</a>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\">\n                        <h3 style=\"color: #1f2937; margin-top: 0;\">✨ What You Can Do Now</h3>\n                        \n                        <div class=\"feature-grid\">\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👨‍🎓</div>\n                                <div>Add Students</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👩‍🏫</div>\n                                <div>Add Teachers</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">📚</div>\n                                <div>Create Classes</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">💰</div>\n                                <div>Set Up Fees</div>\n                            </div>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\" style=\"background: #fef3c7; border-left: 4px solid #f59e0b;\">\n                        <h3 style=\"color: #92400e; margin-top: 0;\">📅 Trial Information</h3>\n                        <p><strong>Trial Period:</strong> 7 days</p>\n                        <p><strong>Trial Ends:</strong> February 23, 2026</p>\n                        <p><strong>Plan:</strong> Professional Plan</p>\n                        <p>No payment required during trial. You will be notified 3 days before trial ends.</p>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin: 32px 0;\">\n                        <p style=\"color: #6b7280; font-size: 14px;\">\n                            Need help? <a href=\"mailto:support@academixsuite.com\" style=\"color: #3b82f6;\">Contact our support team</a>\n                        </p>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>This is an automated message from AcademixSuite.</p>\n                    <p>Please do not reply to this email.</p>\n                    <p style=\"font-size: 12px; color: #9ca3af; margin-top: 16px;\">\n                        © 2026 AcademixSuite. All rights reserved.<br>\n                        If you did not request this account, please contact us immediately.\n                    </p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Welcome to AcademixSuite\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            \n        \n        \n            \n                \n                    🎓 AcademixSuite\n                    School Management Simplified\n                \n                \n                \n                    Welcome, james azu!\n                    \n                    \n                        \n                            Your School: wisdom gate international\n                            7-Day Free Trial\n                        \n                        \n                        Your school has been successfully provisioned and is ready to use with our Professional plan.\n                        \n                        \n                            Login Credentials:\n                            Email: favourhenry05@gmail.com\n                            Password: 74DB&amp;cUdpQGG\n                            Login URL: https://www.academixsuite.com/tenant/wisdom-gate-international/login.php\n                        \n                        \n                        \n                            🚀 Launch School Portal\n                        \n                    \n                    \n                    \n                        ✨ What You Can Do Now\n                        \n                        \n                            \n                                👨‍🎓\n                                Add Students\n                            \n                            \n                                👩‍🏫\n                                Add Teachers\n                            \n                            \n                                📚\n                                Create Classes\n                            \n                            \n                                💰\n                                Set Up Fees\n                            \n                        \n                    \n                    \n                    \n                        📅 Trial Information\n                        Trial Period: 7 days\n                        Trial Ends: February 23, 2026\n                        Plan: Professional Plan\n                        No payment required during trial. You will be notified 3 days before trial ends.\n                    \n                    \n                    \n                        \n                            Need help? Contact our support team\n                        \n                    \n                \n                \n                \n                    This is an automated message from AcademixSuite.\n                    Please do not reply to this email.\n                    \n                        © 2026 AcademixSuite. All rights reserved.\n                        If you did not request this account, please contact us immediately.\n                    \n                \n            \n        \n        \n        ', 'welcome', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 1, 1, 3, '2026-02-17 01:26:38', '2026-02-17 01:26:38', '2026-02-17 01:26:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 3, 'favourhenry05@gmail.com', 'Favourhenry05', 'school_admin', 'Your AcademixSuite Invoice - INV-20260216-0003', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Invoice INV-20260216-0003</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <div>\n                        <h2 style=\"margin: 0;\">🎓 AcademixSuite</h2>\n                    </div>\n                    <div class=\"status-badge\"></div>\n                </div>\n                \n                <div class=\"content\">\n                    <h1 style=\"margin-top: 0; color: #111827;\">Invoice Details</h1>\n                    <p>Hello <strong>wisdom gate international</strong>,</p>\n                    <p>This is a summary of your subscription invoice. </p>\n                    \n                    <div class=\"invoice-details\">\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Number</span>\n                            <span class=\"value\">INV-20260216-0003</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Date</span>\n                            <span class=\"value\">February 16, 2026</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Due Date</span>\n                            <span class=\"value\">March 18, 2026</span>\n                        </div>\n                    </div>\n                    \n                    <div style=\"margin-bottom: 30px;\">\n                        <h3 style=\"color: #111827; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;\">Description</h3>\n                        <p style=\"color: #4b5563;\">Trial subscription for Professional plan (monthly) - Free 7-day trial</p>\n                    </div>\n                    \n                    <div class=\"total-box\">\n                        <span class=\"total-label\">Amount Due</span>\n                        <div class=\"total-amount\">NGN 99.99</div>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin-top: 30px;\">\n                        <a href=\"https://www.academixsuite.com/platform/billing/invoice/INV-20260216-0003\" class=\"button\">View Full Invoice</a>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>© 2026 AcademixSuite. All rights reserved.</p>\n                    <p>If you have any questions regarding this invoice, please contact support@academixsuite.com</p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Invoice INV-20260216-0003\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            \n        \n        \n            \n                \n                    \n                        🎓 AcademixSuite\n                    \n                    \n                \n                \n                \n                    Invoice Details\n                    Hello wisdom gate international,\n                    This is a summary of your subscription invoice. \n                    \n                    \n                        \n                            Invoice Number\n                            INV-20260216-0003\n                        \n                        \n                            Invoice Date\n                            February 16, 2026\n                        \n                        \n                            Due Date\n                            March 18, 2026\n                        \n                    \n                    \n                    \n                        Description\n                        Trial subscription for Professional plan (monthly) - Free 7-day trial\n                    \n                    \n                    \n                        Amount Due\n                        NGN 99.99\n                    \n                    \n                    \n                        View Full Invoice\n                    \n                \n                \n                \n                    © 2026 AcademixSuite. All rights reserved.\n                    If you have any questions regarding this invoice, please contact support@academixsuite.com\n                \n            \n        \n        \n        ', 'invoice', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 2, 1, 3, '2026-02-17 01:26:38', '2026-02-17 01:26:38', '2026-02-17 01:26:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 4, 'mutexia1@gmail.com', 'Mutexia1', 'school_admin', 'Welcome to AcademixSuite! 🎓 - Your School is Ready', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Welcome to AcademixSuite</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <h1 style=\"margin: 0; font-size: 32px;\">🎓 AcademixSuite</h1>\n                    <p style=\"opacity: 0.9; margin: 8px 0 0 0;\">School Management Simplified</p>\n                </div>\n                \n                <div class=\"content\">\n                    <h2 style=\"color: #1f2937; margin-top: 0;\">Welcome, john wick!</h2>\n                    \n                    <div class=\"card\">\n                        <div style=\"display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;\">\n                            <h3 style=\"margin: 0; color: #1f2937;\">Your School: Goodnew international</h3>\n                            <span class=\"trial-badge\">7-Day Free Trial</span>\n                        </div>\n                        \n                        <p>Your school has been successfully provisioned and is ready to use with our <strong>Starter</strong> plan.</p>\n                        \n                        <div class=\"credentials\">\n                            <h4 style=\"margin-top: 0; color: #1f2937;\">Login Credentials:</h4>\n                            <p><strong>Email:</strong> mutexia1@gmail.com</p>\n                            <p><strong>Password:</strong> 0WlkK*6u3uLE</p>\n                            <p><strong>Login URL:</strong> <a href=\"https://www.academixsuite.com/tenant/goodnew-international/login.php\">https://www.academixsuite.com/tenant/goodnew-international/login.php</a></p>\n                        </div>\n                        \n                        <div style=\"text-align: center; margin: 32px 0;\">\n                            <a href=\"https://www.academixsuite.com/tenant/goodnew-international/login.php\" class=\"button\">🚀 Launch School Portal</a>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\">\n                        <h3 style=\"color: #1f2937; margin-top: 0;\">✨ What You Can Do Now</h3>\n                        \n                        <div class=\"feature-grid\">\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👨‍🎓</div>\n                                <div>Add Students</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👩‍🏫</div>\n                                <div>Add Teachers</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">📚</div>\n                                <div>Create Classes</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">💰</div>\n                                <div>Set Up Fees</div>\n                            </div>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\" style=\"background: #fef3c7; border-left: 4px solid #f59e0b;\">\n                        <h3 style=\"color: #92400e; margin-top: 0;\">📅 Trial Information</h3>\n                        <p><strong>Trial Period:</strong> 7 days</p>\n                        <p><strong>Trial Ends:</strong> February 24, 2026</p>\n                        <p><strong>Plan:</strong> Starter Plan</p>\n                        <p>No payment required during trial. You will be notified 3 days before trial ends.</p>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin: 32px 0;\">\n                        <p style=\"color: #6b7280; font-size: 14px;\">\n                            Need help? <a href=\"mailto:support@academixsuite.com\" style=\"color: #3b82f6;\">Contact our support team</a>\n                        </p>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>This is an automated message from AcademixSuite.</p>\n                    <p>Please do not reply to this email.</p>\n                    <p style=\"font-size: 12px; color: #9ca3af; margin-top: 16px;\">\n                        © 2026 AcademixSuite. All rights reserved.<br>\n                        If you did not request this account, please contact us immediately.\n                    </p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Welcome to AcademixSuite\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            \n        \n        \n            \n                \n                    🎓 AcademixSuite\n                    School Management Simplified\n                \n                \n                \n                    Welcome, john wick!\n                    \n                    \n                        \n                            Your School: Goodnew international\n                            7-Day Free Trial\n                        \n                        \n                        Your school has been successfully provisioned and is ready to use with our Starter plan.\n                        \n                        \n                            Login Credentials:\n                            Email: mutexia1@gmail.com\n                            Password: 0WlkK*6u3uLE\n                            Login URL: https://www.academixsuite.com/tenant/goodnew-international/login.php\n                        \n                        \n                        \n                            🚀 Launch School Portal\n                        \n                    \n                    \n                    \n                        ✨ What You Can Do Now\n                        \n                        \n                            \n                                👨‍🎓\n                                Add Students\n                            \n                            \n                                👩‍🏫\n                                Add Teachers\n                            \n                            \n                                📚\n                                Create Classes\n                            \n                            \n                                💰\n                                Set Up Fees\n                            \n                        \n                    \n                    \n                    \n                        📅 Trial Information\n                        Trial Period: 7 days\n                        Trial Ends: February 24, 2026\n                        Plan: Starter Plan\n                        No payment required during trial. You will be notified 3 days before trial ends.\n                    \n                    \n                    \n                        \n                            Need help? Contact our support team\n                        \n                    \n                \n                \n                \n                    This is an automated message from AcademixSuite.\n                    Please do not reply to this email.\n                    \n                        © 2026 AcademixSuite. All rights reserved.\n                        If you did not request this account, please contact us immediately.\n                    \n                \n            \n        \n        \n        ', 'welcome', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 1, 1, 3, '2026-02-17 09:33:18', '2026-02-17 09:33:18', '2026-02-17 09:33:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 4, 'mutexia1@gmail.com', 'Mutexia1', 'school_admin', 'Your AcademixSuite Invoice - INV-20260217-0004', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Invoice INV-20260217-0004</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <div>\n                        <h2 style=\"margin: 0;\">🎓 AcademixSuite</h2>\n                    </div>\n                    <div class=\"status-badge\"></div>\n                </div>\n                \n                <div class=\"content\">\n                    <h1 style=\"margin-top: 0; color: #111827;\">Invoice Details</h1>\n                    <p>Hello <strong>Goodnew international</strong>,</p>\n                    <p>This is a summary of your subscription invoice. </p>\n                    \n                    <div class=\"invoice-details\">\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Number</span>\n                            <span class=\"value\">INV-20260217-0004</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Date</span>\n                            <span class=\"value\">February 17, 2026</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Due Date</span>\n                            <span class=\"value\">March 19, 2026</span>\n                        </div>\n                    </div>\n                    \n                    <div style=\"margin-bottom: 30px;\">\n                        <h3 style=\"color: #111827; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;\">Description</h3>\n                        <p style=\"color: #4b5563;\">Trial subscription for Starter plan (monthly) - Free 7-day trial</p>\n                    </div>\n                    \n                    <div class=\"total-box\">\n                        <span class=\"total-label\">Amount Due</span>\n                        <div class=\"total-amount\">NGN 49.99</div>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin-top: 30px;\">\n                        <a href=\"https://www.academixsuite.com/platform/billing/invoice/INV-20260217-0004\" class=\"button\">View Full Invoice</a>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>© 2026 AcademixSuite. All rights reserved.</p>\n                    <p>If you have any questions regarding this invoice, please contact support@academixsuite.com</p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Invoice INV-20260217-0004\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            \n        \n        \n            \n                \n                    \n                        🎓 AcademixSuite\n                    \n                    \n                \n                \n                \n                    Invoice Details\n                    Hello Goodnew international,\n                    This is a summary of your subscription invoice. \n                    \n                    \n                        \n                            Invoice Number\n                            INV-20260217-0004\n                        \n                        \n                            Invoice Date\n                            February 17, 2026\n                        \n                        \n                            Due Date\n                            March 19, 2026\n                        \n                    \n                    \n                    \n                        Description\n                        Trial subscription for Starter plan (monthly) - Free 7-day trial\n                    \n                    \n                    \n                        Amount Due\n                        NGN 49.99\n                    \n                    \n                    \n                        View Full Invoice\n                    \n                \n                \n                \n                    © 2026 AcademixSuite. All rights reserved.\n                    If you have any questions regarding this invoice, please contact support@academixsuite.com\n                \n            \n        \n        \n        ', 'invoice', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 2, 1, 3, '2026-02-17 09:33:18', '2026-02-17 09:33:18', '2026-02-17 09:33:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `email_queue` (`id`, `tenant_id`, `school_id`, `recipient_email`, `recipient_name`, `recipient_type`, `subject`, `body_html`, `body_text`, `template_name`, `template_data`, `from_email`, `from_name`, `reply_to`, `headers`, `attachments`, `status`, `priority`, `attempts`, `max_attempts`, `created_at`, `scheduled_at`, `processing_at`, `sent_at`, `failed_at`, `next_retry_at`, `error_message`, `error_code`, `smtp_response`, `campaign_id`, `batch_id`, `message_id`, `provider_message_id`) VALUES
(5, NULL, NULL, 'zubetechhub@gmail.com', 'Zubetechhub', 'school_admin', 'Welcome to AcademixSuite! 🎓 - Your School is Ready', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Welcome to AcademixSuite</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <h1 style=\"margin: 0; font-size: 32px;\">🎓 AcademixSuite</h1>\n                    <p style=\"opacity: 0.9; margin: 8px 0 0 0;\">School Management Simplified</p>\n                </div>\n                \n                <div class=\"content\">\n                    <h2 style=\"color: #1f2937; margin-top: 0;\">Welcome, alex james!</h2>\n                    \n                    <div class=\"card\">\n                        <div style=\"display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;\">\n                            <h3 style=\"margin: 0; color: #1f2937;\">Your School: Damtoj international</h3>\n                            <span class=\"trial-badge\">7-Day Free Trial</span>\n                        </div>\n                        \n                        <p>Your school has been successfully provisioned and is ready to use with our <strong>Professional</strong> plan.</p>\n                        \n                        <div class=\"credentials\">\n                            <h4 style=\"margin-top: 0; color: #1f2937;\">Login Credentials:</h4>\n                            <p><strong>Email:</strong> zubetechhub@gmail.com</p>\n                            <p><strong>Password:</strong> Ty^VmclLEc3V</p>\n                            <p><strong>Login URL:</strong> <a href=\"https://www.academixsuite.com/tenant/damtoj-international/login.php\">https://www.academixsuite.com/tenant/damtoj-international/login.php</a></p>\n                        </div>\n                        \n                        <div style=\"text-align: center; margin: 32px 0;\">\n                            <a href=\"https://www.academixsuite.com/tenant/damtoj-international/login.php\" class=\"button\">🚀 Launch School Portal</a>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\">\n                        <h3 style=\"color: #1f2937; margin-top: 0;\">✨ What You Can Do Now</h3>\n                        \n                        <div class=\"feature-grid\">\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👨‍🎓</div>\n                                <div>Add Students</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👩‍🏫</div>\n                                <div>Add Teachers</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">📚</div>\n                                <div>Create Classes</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">💰</div>\n                                <div>Set Up Fees</div>\n                            </div>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\" style=\"background: #fef3c7; border-left: 4px solid #f59e0b;\">\n                        <h3 style=\"color: #92400e; margin-top: 0;\">📅 Trial Information</h3>\n                        <p><strong>Trial Period:</strong> 7 days</p>\n                        <p><strong>Trial Ends:</strong> February 25, 2026</p>\n                        <p><strong>Plan:</strong> Professional Plan</p>\n                        <p>No payment required during trial. You will be notified 3 days before trial ends.</p>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin: 32px 0;\">\n                        <p style=\"color: #6b7280; font-size: 14px;\">\n                            Need help? <a href=\"mailto:support@academixsuite.com\" style=\"color: #3b82f6;\">Contact our support team</a>\n                        </p>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>This is an automated message from AcademixSuite.</p>\n                    <p>Please do not reply to this email.</p>\n                    <p style=\"font-size: 12px; color: #9ca3af; margin-top: 16px;\">\n                        © 2026 AcademixSuite. All rights reserved.<br>\n                        If you did not request this account, please contact us immediately.\n                    </p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Welcome to AcademixSuite\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            \n        \n        \n            \n                \n                    🎓 AcademixSuite\n                    School Management Simplified\n                \n                \n                \n                    Welcome, alex james!\n                    \n                    \n                        \n                            Your School: Damtoj international\n                            7-Day Free Trial\n                        \n                        \n                        Your school has been successfully provisioned and is ready to use with our Professional plan.\n                        \n                        \n                            Login Credentials:\n                            Email: zubetechhub@gmail.com\n                            Password: Ty^VmclLEc3V\n                            Login URL: https://www.academixsuite.com/tenant/damtoj-international/login.php\n                        \n                        \n                        \n                            🚀 Launch School Portal\n                        \n                    \n                    \n                    \n                        ✨ What You Can Do Now\n                        \n                        \n                            \n                                👨‍🎓\n                                Add Students\n                            \n                            \n                                👩‍🏫\n                                Add Teachers\n                            \n                            \n                                📚\n                                Create Classes\n                            \n                            \n                                💰\n                                Set Up Fees\n                            \n                        \n                    \n                    \n                    \n                        📅 Trial Information\n                        Trial Period: 7 days\n                        Trial Ends: February 25, 2026\n                        Plan: Professional Plan\n                        No payment required during trial. You will be notified 3 days before trial ends.\n                    \n                    \n                    \n                        \n                            Need help? Contact our support team\n                        \n                    \n                \n                \n                \n                    This is an automated message from AcademixSuite.\n                    Please do not reply to this email.\n                    \n                        © 2026 AcademixSuite. All rights reserved.\n                        If you did not request this account, please contact us immediately.\n                    \n                \n            \n        \n        \n        ', 'welcome', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 1, 1, 3, '2026-02-18 16:11:48', '2026-02-18 16:11:48', '2026-02-18 16:11:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, 'zubetechhub@gmail.com', 'Zubetechhub', 'school_admin', 'Your AcademixSuite Invoice - INV-20260218-0005', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Invoice INV-20260218-0005</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <div>\n                        <h2 style=\"margin: 0;\">🎓 AcademixSuite</h2>\n                    </div>\n                    <div class=\"status-badge\"></div>\n                </div>\n                \n                <div class=\"content\">\n                    <h1 style=\"margin-top: 0; color: #111827;\">Invoice Details</h1>\n                    <p>Hello <strong>Damtoj international</strong>,</p>\n                    <p>This is a summary of your subscription invoice. </p>\n                    \n                    <div class=\"invoice-details\">\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Number</span>\n                            <span class=\"value\">INV-20260218-0005</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Date</span>\n                            <span class=\"value\">February 18, 2026</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Due Date</span>\n                            <span class=\"value\">March 20, 2026</span>\n                        </div>\n                    </div>\n                    \n                    <div style=\"margin-bottom: 30px;\">\n                        <h3 style=\"color: #111827; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;\">Description</h3>\n                        <p style=\"color: #4b5563;\">Trial subscription for Professional plan (monthly) - Free 7-day trial</p>\n                    </div>\n                    \n                    <div class=\"total-box\">\n                        <span class=\"total-label\">Amount Due</span>\n                        <div class=\"total-amount\">NGN 99.99</div>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin-top: 30px;\">\n                        <a href=\"https://www.academixsuite.com/platform/billing/invoice/INV-20260218-0005\" class=\"button\">View Full Invoice</a>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>© 2026 AcademixSuite. All rights reserved.</p>\n                    <p>If you have any questions regarding this invoice, please contact support@academixsuite.com</p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Invoice INV-20260218-0005\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            \n        \n        \n            \n                \n                    \n                        🎓 AcademixSuite\n                    \n                    \n                \n                \n                \n                    Invoice Details\n                    Hello Damtoj international,\n                    This is a summary of your subscription invoice. \n                    \n                    \n                        \n                            Invoice Number\n                            INV-20260218-0005\n                        \n                        \n                            Invoice Date\n                            February 18, 2026\n                        \n                        \n                            Due Date\n                            March 20, 2026\n                        \n                    \n                    \n                    \n                        Description\n                        Trial subscription for Professional plan (monthly) - Free 7-day trial\n                    \n                    \n                    \n                        Amount Due\n                        NGN 99.99\n                    \n                    \n                    \n                        View Full Invoice\n                    \n                \n                \n                \n                    © 2026 AcademixSuite. All rights reserved.\n                    If you have any questions regarding this invoice, please contact support@academixsuite.com\n                \n            \n        \n        \n        ', 'invoice', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 2, 1, 3, '2026-02-18 16:11:48', '2026-02-18 16:11:48', '2026-02-18 16:11:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, 'safebit99@gmail.com', 'Safebit99', 'school_admin', 'Welcome to AcademixSuite! 🎓 - Your School is Ready', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Welcome to AcademixSuite</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <h1 style=\"margin: 0; font-size: 32px;\">🎓 AcademixSuite</h1>\n                    <p style=\"opacity: 0.9; margin: 8px 0 0 0;\">School Management Simplified</p>\n                </div>\n                \n                <div class=\"content\">\n                    <h2 style=\"color: #1f2937; margin-top: 0;\">Welcome, bitflux wallet!</h2>\n                    \n                    <div class=\"card\">\n                        <div style=\"display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;\">\n                            <h3 style=\"margin: 0; color: #1f2937;\">Your School: bitflux wallet</h3>\n                            <span class=\"trial-badge\">7-Day Free Trial</span>\n                        </div>\n                        \n                        <p>Your school has been successfully provisioned and is ready to use with our <strong>Professional</strong> plan.</p>\n                        \n                        <div class=\"credentials\">\n                            <h4 style=\"margin-top: 0; color: #1f2937;\">Login Credentials:</h4>\n                            <p><strong>Email:</strong> safebit99@gmail.com</p>\n                            <p><strong>Password:</strong> mfSl6^hQ#n3O</p>\n                            <p><strong>Login URL:</strong> <a href=\"https://www.academixsuite.com/tenant/bitflux-wallet-1771434696/login.php\">https://www.academixsuite.com/tenant/bitflux-wallet-1771434696/login.php</a></p>\n                        </div>\n                        \n                        <div style=\"text-align: center; margin: 32px 0;\">\n                            <a href=\"https://www.academixsuite.com/tenant/bitflux-wallet-1771434696/login.php\" class=\"button\">🚀 Launch School Portal</a>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\">\n                        <h3 style=\"color: #1f2937; margin-top: 0;\">✨ What You Can Do Now</h3>\n                        \n                        <div class=\"feature-grid\">\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👨‍🎓</div>\n                                <div>Add Students</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👩‍🏫</div>\n                                <div>Add Teachers</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">📚</div>\n                                <div>Create Classes</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">💰</div>\n                                <div>Set Up Fees</div>\n                            </div>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\" style=\"background: #fef3c7; border-left: 4px solid #f59e0b;\">\n                        <h3 style=\"color: #92400e; margin-top: 0;\">📅 Trial Information</h3>\n                        <p><strong>Trial Period:</strong> 7 days</p>\n                        <p><strong>Trial Ends:</strong> February 25, 2026</p>\n                        <p><strong>Plan:</strong> Professional Plan</p>\n                        <p>No payment required during trial. You will be notified 3 days before trial ends.</p>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin: 32px 0;\">\n                        <p style=\"color: #6b7280; font-size: 14px;\">\n                            Need help? <a href=\"mailto:support@academixsuite.com\" style=\"color: #3b82f6;\">Contact our support team</a>\n                        </p>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>This is an automated message from AcademixSuite.</p>\n                    <p>Please do not reply to this email.</p>\n                    <p style=\"font-size: 12px; color: #9ca3af; margin-top: 16px;\">\n                        © 2026 AcademixSuite. All rights reserved.<br>\n                        If you did not request this account, please contact us immediately.\n                    </p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Welcome to AcademixSuite\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            \n        \n        \n            \n                \n                    🎓 AcademixSuite\n                    School Management Simplified\n                \n                \n                \n                    Welcome, bitflux wallet!\n                    \n                    \n                        \n                            Your School: bitflux wallet\n                            7-Day Free Trial\n                        \n                        \n                        Your school has been successfully provisioned and is ready to use with our Professional plan.\n                        \n                        \n                            Login Credentials:\n                            Email: safebit99@gmail.com\n                            Password: mfSl6^hQ#n3O\n                            Login URL: https://www.academixsuite.com/tenant/bitflux-wallet-1771434696/login.php\n                        \n                        \n                        \n                            🚀 Launch School Portal\n                        \n                    \n                    \n                    \n                        ✨ What You Can Do Now\n                        \n                        \n                            \n                                👨‍🎓\n                                Add Students\n                            \n                            \n                                👩‍🏫\n                                Add Teachers\n                            \n                            \n                                📚\n                                Create Classes\n                            \n                            \n                                💰\n                                Set Up Fees\n                            \n                        \n                    \n                    \n                    \n                        📅 Trial Information\n                        Trial Period: 7 days\n                        Trial Ends: February 25, 2026\n                        Plan: Professional Plan\n                        No payment required during trial. You will be notified 3 days before trial ends.\n                    \n                    \n                    \n                        \n                            Need help? Contact our support team\n                        \n                    \n                \n                \n                \n                    This is an automated message from AcademixSuite.\n                    Please do not reply to this email.\n                    \n                        © 2026 AcademixSuite. All rights reserved.\n                        If you did not request this account, please contact us immediately.\n                    \n                \n            \n        \n        \n        ', 'welcome', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 1, 1, 3, '2026-02-18 17:11:37', '2026-02-18 17:11:37', '2026-02-18 17:11:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, 'safebit99@gmail.com', 'Safebit99', 'school_admin', 'Your AcademixSuite Invoice - INV-20260218-0006', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Invoice INV-20260218-0006</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <div>\n                        <h2 style=\"margin: 0;\">🎓 AcademixSuite</h2>\n                    </div>\n                    <div class=\"status-badge\"></div>\n                </div>\n                \n                <div class=\"content\">\n                    <h1 style=\"margin-top: 0; color: #111827;\">Invoice Details</h1>\n                    <p>Hello <strong>bitflux wallet</strong>,</p>\n                    <p>This is a summary of your subscription invoice. </p>\n                    \n                    <div class=\"invoice-details\">\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Number</span>\n                            <span class=\"value\">INV-20260218-0006</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Date</span>\n                            <span class=\"value\">February 18, 2026</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Due Date</span>\n                            <span class=\"value\">March 20, 2026</span>\n                        </div>\n                    </div>\n                    \n                    <div style=\"margin-bottom: 30px;\">\n                        <h3 style=\"color: #111827; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;\">Description</h3>\n                        <p style=\"color: #4b5563;\">Trial subscription for Professional plan (monthly) - Free 7-day trial</p>\n                    </div>\n                    \n                    <div class=\"total-box\">\n                        <span class=\"total-label\">Amount Due</span>\n                        <div class=\"total-amount\">NGN 99.99</div>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin-top: 30px;\">\n                        <a href=\"https://www.academixsuite.com/platform/billing/invoice/INV-20260218-0006\" class=\"button\">View Full Invoice</a>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>© 2026 AcademixSuite. All rights reserved.</p>\n                    <p>If you have any questions regarding this invoice, please contact support@academixsuite.com</p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Invoice INV-20260218-0006\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            \n        \n        \n            \n                \n                    \n                        🎓 AcademixSuite\n                    \n                    \n                \n                \n                \n                    Invoice Details\n                    Hello bitflux wallet,\n                    This is a summary of your subscription invoice. \n                    \n                    \n                        \n                            Invoice Number\n                            INV-20260218-0006\n                        \n                        \n                            Invoice Date\n                            February 18, 2026\n                        \n                        \n                            Due Date\n                            March 20, 2026\n                        \n                    \n                    \n                    \n                        Description\n                        Trial subscription for Professional plan (monthly) - Free 7-day trial\n                    \n                    \n                    \n                        Amount Due\n                        NGN 99.99\n                    \n                    \n                    \n                        View Full Invoice\n                    \n                \n                \n                \n                    © 2026 AcademixSuite. All rights reserved.\n                    If you have any questions regarding this invoice, please contact support@academixsuite.com\n                \n            \n        \n        \n        ', 'invoice', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 2, 1, 3, '2026-02-18 17:11:37', '2026-02-18 17:11:37', '2026-02-18 17:11:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `email_queue` (`id`, `tenant_id`, `school_id`, `recipient_email`, `recipient_name`, `recipient_type`, `subject`, `body_html`, `body_text`, `template_name`, `template_data`, `from_email`, `from_name`, `reply_to`, `headers`, `attachments`, `status`, `priority`, `attempts`, `max_attempts`, `created_at`, `scheduled_at`, `processing_at`, `sent_at`, `failed_at`, `next_retry_at`, `error_message`, `error_code`, `smtp_response`, `campaign_id`, `batch_id`, `message_id`, `provider_message_id`) VALUES
(9, NULL, NULL, 'zubetechhub@gmail.com', 'Zubetechhub', 'school_admin', 'Welcome to AcademixSuite! 🎓 - Your School is Ready', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Welcome to AcademixSuite</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <h1 style=\"margin: 0; font-size: 32px;\">🎓 AcademixSuite</h1>\n                    <p style=\"opacity: 0.9; margin: 8px 0 0 0;\">School Management Simplified</p>\n                </div>\n                \n                <div class=\"content\">\n                    <h2 style=\"color: #1f2937; margin-top: 0;\">Welcome, abraham lincon!</h2>\n                    \n                    <div class=\"card\">\n                        <div style=\"display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;\">\n                            <h3 style=\"margin: 0; color: #1f2937;\">Your School: spring blooms college</h3>\n                            <span class=\"trial-badge\">7-Day Free Trial</span>\n                        </div>\n                        \n                        <p>Your school has been successfully provisioned and is ready to use with our <strong>Professional</strong> plan.</p>\n                        \n                        <div class=\"credentials\">\n                            <h4 style=\"margin-top: 0; color: #1f2937;\">Login Credentials:</h4>\n                            <p><strong>Email:</strong> zubetechhub@gmail.com</p>\n                            <p><strong>Password:</strong> lR%Arojj7FPZ</p>\n                            <p><strong>Login URL:</strong> <a href=\"https://www.academixsuite.com/tenant/spring-blooms-college/login.php\">https://www.academixsuite.com/tenant/spring-blooms-college/login.php</a></p>\n                        </div>\n                        \n                        <div style=\"text-align: center; margin: 32px 0;\">\n                            <a href=\"https://www.academixsuite.com/tenant/spring-blooms-college/login.php\" class=\"button\">🚀 Launch School Portal</a>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\">\n                        <h3 style=\"color: #1f2937; margin-top: 0;\">✨ What You Can Do Now</h3>\n                        \n                        <div class=\"feature-grid\">\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👨‍🎓</div>\n                                <div>Add Students</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">👩‍🏫</div>\n                                <div>Add Teachers</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">📚</div>\n                                <div>Create Classes</div>\n                            </div>\n                            <div class=\"feature-item\">\n                                <div style=\"font-size: 24px; margin-bottom: 8px;\">💰</div>\n                                <div>Set Up Fees</div>\n                            </div>\n                        </div>\n                    </div>\n                    \n                    <div class=\"card\" style=\"background: #fef3c7; border-left: 4px solid #f59e0b;\">\n                        <h3 style=\"color: #92400e; margin-top: 0;\">📅 Trial Information</h3>\n                        <p><strong>Trial Period:</strong> 7 days</p>\n                        <p><strong>Trial Ends:</strong> February 25, 2026</p>\n                        <p><strong>Plan:</strong> Professional Plan</p>\n                        <p>No payment required during trial. You will be notified 3 days before trial ends.</p>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin: 32px 0;\">\n                        <p style=\"color: #6b7280; font-size: 14px;\">\n                            Need help? <a href=\"mailto:support@academixsuite.com\" style=\"color: #3b82f6;\">Contact our support team</a>\n                        </p>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>This is an automated message from AcademixSuite.</p>\n                    <p>Please do not reply to this email.</p>\n                    <p style=\"font-size: 12px; color: #9ca3af; margin-top: 16px;\">\n                        © 2026 AcademixSuite. All rights reserved.<br>\n                        If you did not request this account, please contact us immediately.\n                    </p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Welcome to AcademixSuite\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f9fafb; }\n                .container { max-width: 600px; margin: 0 auto; background: white; }\n                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 20px; text-align: center; color: white; }\n                .content { padding: 40px; }\n                .card { background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 24px; margin-bottom: 24px; }\n                .credentials { background: #f8fafc; border-left: 4px solid #3b82f6; padding: 16px; }\n                .button { display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 12px 32px; border-radius: 6px; font-weight: 600; margin: 16px 0; }\n                .footer { text-align: center; padding: 24px; color: #6b7280; font-size: 14px; border-top: 1px solid #e5e7eb; }\n                .trial-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 8px 16px; border-radius: 20px; display: inline-block; font-weight: 600; }\n                .feature-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin: 24px 0; }\n                .feature-item { text-align: center; padding: 16px; background: #f9fafb; border-radius: 6px; }\n            \n        \n        \n            \n                \n                    🎓 AcademixSuite\n                    School Management Simplified\n                \n                \n                \n                    Welcome, abraham lincon!\n                    \n                    \n                        \n                            Your School: spring blooms college\n                            7-Day Free Trial\n                        \n                        \n                        Your school has been successfully provisioned and is ready to use with our Professional plan.\n                        \n                        \n                            Login Credentials:\n                            Email: zubetechhub@gmail.com\n                            Password: lR%Arojj7FPZ\n                            Login URL: https://www.academixsuite.com/tenant/spring-blooms-college/login.php\n                        \n                        \n                        \n                            🚀 Launch School Portal\n                        \n                    \n                    \n                    \n                        ✨ What You Can Do Now\n                        \n                        \n                            \n                                👨‍🎓\n                                Add Students\n                            \n                            \n                                👩‍🏫\n                                Add Teachers\n                            \n                            \n                                📚\n                                Create Classes\n                            \n                            \n                                💰\n                                Set Up Fees\n                            \n                        \n                    \n                    \n                    \n                        📅 Trial Information\n                        Trial Period: 7 days\n                        Trial Ends: February 25, 2026\n                        Plan: Professional Plan\n                        No payment required during trial. You will be notified 3 days before trial ends.\n                    \n                    \n                    \n                        \n                            Need help? Contact our support team\n                        \n                    \n                \n                \n                \n                    This is an automated message from AcademixSuite.\n                    Please do not reply to this email.\n                    \n                        © 2026 AcademixSuite. All rights reserved.\n                        If you did not request this account, please contact us immediately.\n                    \n                \n            \n        \n        \n        ', 'welcome', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 1, 1, 3, '2026-02-18 18:40:51', '2026-02-18 18:40:51', '2026-02-18 18:40:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, 'zubetechhub@gmail.com', 'Zubetechhub', 'school_admin', 'Your AcademixSuite Invoice - INV-20260218-0007', '\n        <!DOCTYPE html>\n        <html>\n        <head>\n            <meta charset=\"UTF-8\">\n            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n            <title>Invoice INV-20260218-0007</title>\n            <style>\n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            </style>\n        </head>\n        <body>\n            <div class=\"container\">\n                <div class=\"header\">\n                    <div>\n                        <h2 style=\"margin: 0;\">🎓 AcademixSuite</h2>\n                    </div>\n                    <div class=\"status-badge\"></div>\n                </div>\n                \n                <div class=\"content\">\n                    <h1 style=\"margin-top: 0; color: #111827;\">Invoice Details</h1>\n                    <p>Hello <strong>spring blooms college</strong>,</p>\n                    <p>This is a summary of your subscription invoice. </p>\n                    \n                    <div class=\"invoice-details\">\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Number</span>\n                            <span class=\"value\">INV-20260218-0007</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Invoice Date</span>\n                            <span class=\"value\">February 18, 2026</span>\n                        </div>\n                        <div class=\"detail-row\">\n                            <span class=\"label\">Due Date</span>\n                            <span class=\"value\">March 20, 2026</span>\n                        </div>\n                    </div>\n                    \n                    <div style=\"margin-bottom: 30px;\">\n                        <h3 style=\"color: #111827; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;\">Description</h3>\n                        <p style=\"color: #4b5563;\">Trial subscription for Professional plan (monthly) - Free 7-day trial</p>\n                    </div>\n                    \n                    <div class=\"total-box\">\n                        <span class=\"total-label\">Amount Due</span>\n                        <div class=\"total-amount\">NGN 99.99</div>\n                    </div>\n                    \n                    <div style=\"text-align: center; margin-top: 30px;\">\n                        <a href=\"https://www.academixsuite.com/platform/billing/invoice/INV-20260218-0007\" class=\"button\">View Full Invoice</a>\n                    </div>\n                </div>\n                \n                <div class=\"footer\">\n                    <p>© 2026 AcademixSuite. All rights reserved.</p>\n                    <p>If you have any questions regarding this invoice, please contact support@academixsuite.com</p>\n                </div>\n            </div>\n        </body>\n        </html>\n        ', '\n        \n        \n        \n            \n            \n            Invoice INV-20260218-0007\n            \n                body { font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f3f4f6; }\n                .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }\n                .header { background: #111827; padding: 30px; color: white; display: flex; justify-content: space-between; align-items: center; }\n                .content { padding: 40px; }\n                .invoice-details { border-top: 2px solid #f3f4f6; border-bottom: 2px solid #f3f4f6; padding: 20px 0; margin: 20px 0; }\n                .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; }\n                .label { color: #6b7280; font-weight: 500; }\n                .value { color: #111827; font-weight: 600; }\n                .total-box { background: #f9fafb; padding: 20px; border-radius: 8px; text-align: right; }\n                .total-label { font-size: 14px; color: #6b7280; }\n                .total-amount { font-size: 24px; color: #111827; font-weight: 800; }\n                .status-badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 700; color: white; background-color: #fbbf24; }\n                .footer { text-align: center; padding: 30px; color: #9ca3af; font-size: 12px; }\n                .button { display: inline-block; background: #3b82f6; color: white !important; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; margin-top: 20px; }\n            \n        \n        \n            \n                \n                    \n                        🎓 AcademixSuite\n                    \n                    \n                \n                \n                \n                    Invoice Details\n                    Hello spring blooms college,\n                    This is a summary of your subscription invoice. \n                    \n                    \n                        \n                            Invoice Number\n                            INV-20260218-0007\n                        \n                        \n                            Invoice Date\n                            February 18, 2026\n                        \n                        \n                            Due Date\n                            March 20, 2026\n                        \n                    \n                    \n                    \n                        Description\n                        Trial subscription for Professional plan (monthly) - Free 7-day trial\n                    \n                    \n                    \n                        Amount Due\n                        NGN 99.99\n                    \n                    \n                    \n                        View Full Invoice\n                    \n                \n                \n                \n                    © 2026 AcademixSuite. All rights reserved.\n                    If you have any questions regarding this invoice, please contact support@academixsuite.com\n                \n            \n        \n        \n        ', 'invoice', NULL, 'noreply@academixsuite.com', 'AcademixSuite', NULL, '{\"X-Mailer\":\"AcademixSuite Email Queue Manager\",\"X-Priority\":\"3\",\"List-Unsubscribe\":\"<mailto:unsubscribe@academixsuite.com>\",\"Precedence\":\"bulk\"}', NULL, 'processing', 2, 1, 3, '2026-02-18 18:40:51', '2026-02-18 18:40:51', '2026-02-18 18:40:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_suppression_list`
--

CREATE TABLE `email_suppression_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `reason` enum('hard_bounce','complaint','unsubscribe','manual') NOT NULL,
  `details` text DEFAULT NULL,
  `added_at` timestamp NULL DEFAULT current_timestamp(),
  `added_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'Admin ID who added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Suppression list - emails that should not receive messages';

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_documents`
--

CREATE TABLE `enrollment_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `enrollment_request_id` int(10) UNSIGNED NOT NULL,
  `document_type` varchar(50) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `file_size` int(11) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_fees`
--

CREATE TABLE `enrollment_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `enrollment_request_id` int(10) UNSIGNED NOT NULL,
  `fee_type` enum('application','registration','acceptance','other') DEFAULT 'application',
  `description` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `due_date` date DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT 0,
  `paid_at` timestamp NULL DEFAULT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_requests`
--

CREATE TABLE `enrollment_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `request_number` varchar(50) NOT NULL,
  `parent_first_name` varchar(100) NOT NULL,
  `parent_last_name` varchar(100) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_phone` varchar(20) NOT NULL,
  `parent_address` text DEFAULT NULL,
  `student_first_name` varchar(100) NOT NULL,
  `student_last_name` varchar(100) NOT NULL,
  `student_gender` enum('male','female','other') NOT NULL,
  `student_date_of_birth` date NOT NULL,
  `student_grade_level` varchar(50) NOT NULL,
  `student_previous_school` varchar(255) DEFAULT NULL,
  `enrollment_type` enum('new','transfer','re_enrollment') DEFAULT 'new',
  `academic_year` varchar(20) NOT NULL,
  `academic_term` varchar(50) DEFAULT NULL,
  `special_requirements` text DEFAULT NULL,
  `documents_submitted` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`documents_submitted`)),
  `status` enum('pending','reviewing','accepted','waitlisted','rejected') DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `reviewed_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `enrollment_requests`
--
DELIMITER $$
CREATE TRIGGER `before_enrollment_requests_insert` BEFORE INSERT ON `enrollment_requests` FOR EACH ROW BEGIN
    IF NEW.request_number IS NULL OR NEW.request_number='' THEN
    SET NEW.request_number=CONCAT('ENR-', DATE_FORMAT(NOW(), '%Y%m%d-' ), LPAD(FLOOR(RAND() * 10000), 4, '0' ));
    END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `payment_gateway_id` int(10) UNSIGNED DEFAULT NULL,
  `subscription_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `payment_reference` varchar(255) DEFAULT NULL,
  `payment_link` text DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT 0.00,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(3) DEFAULT 'NGN',
  `status` enum('draft','sent','paid','overdue','canceled') DEFAULT 'draft',
  `payment_status` enum('pending','initiated','processing','success','failed','refunded') DEFAULT 'pending',
  `due_date` date DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_trial` tinyint(1) DEFAULT 0,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_gateway_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payment_gateway_response`)),
  `webhook_received_at` timestamp NULL DEFAULT NULL,
  `payment_initiated_at` timestamp NULL DEFAULT NULL,
  `payment_confirmed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `school_id`, `payment_gateway_id`, `subscription_id`, `invoice_number`, `payment_reference`, `payment_link`, `description`, `amount`, `tax`, `total_amount`, `currency`, `status`, `payment_status`, `due_date`, `paid_at`, `start_date`, `end_date`, `is_trial`, `payment_method`, `transaction_id`, `notes`, `created_at`, `payment_gateway_response`, `webhook_received_at`, `payment_initiated_at`, `payment_confirmed_at`) VALUES
(1, 1, NULL, 1, 'INV-20260216-0001', NULL, NULL, 'Trial subscription for Enterprise plan (monthly) - Free 7-day trial', 199.99, 0.00, 199.99, 'NGN', '', 'pending', '2026-03-18', NULL, '2026-02-16 17:30:30', '2027-02-16 17:30:30', 1, NULL, NULL, NULL, '2026-02-16 17:30:30', NULL, NULL, NULL, NULL),
(2, 2, NULL, 2, 'INV-20260216-0002', NULL, NULL, 'Trial subscription for Enterprise plan (monthly) - Free 7-day trial', 199.99, 0.00, 199.99, 'NGN', '', 'pending', '2026-03-18', NULL, '2026-02-16 18:33:56', '2027-02-16 18:33:56', 1, NULL, NULL, NULL, '2026-02-16 18:33:56', NULL, NULL, NULL, NULL),
(3, 3, NULL, 3, 'INV-20260216-0003', NULL, NULL, 'Trial subscription for Professional plan (monthly) - Free 7-day trial', 99.99, 0.00, 99.99, 'NGN', '', 'pending', '2026-03-18', NULL, '2026-02-16 19:16:08', '2027-02-16 19:16:08', 1, NULL, NULL, NULL, '2026-02-16 19:16:08', NULL, NULL, NULL, NULL),
(4, 4, NULL, 4, 'INV-20260217-0004', NULL, NULL, 'Trial subscription for Starter plan (monthly) - Free 7-day trial', 49.99, 0.00, 49.99, 'NGN', '', 'pending', '2026-03-19', NULL, '2026-02-17 09:33:18', '2027-02-17 09:33:18', 1, NULL, NULL, NULL, '2026-02-17 09:33:18', NULL, NULL, NULL, NULL),
(5, 5, NULL, 5, 'INV-20260218-0005', NULL, NULL, 'Trial subscription for Professional plan (monthly) - Free 7-day trial', 99.99, 0.00, 99.99, 'NGN', '', 'pending', '2026-03-20', NULL, '2026-02-18 16:11:48', '2027-02-18 16:11:48', 1, NULL, NULL, NULL, '2026-02-18 16:11:48', NULL, NULL, NULL, NULL),
(6, 6, NULL, 6, 'INV-20260218-0006', NULL, NULL, 'Trial subscription for Professional plan (monthly) - Free 7-day trial', 99.99, 0.00, 99.99, 'NGN', '', 'pending', '2026-03-20', NULL, '2026-02-18 17:11:37', '2027-02-18 17:11:37', 1, NULL, NULL, NULL, '2026-02-18 17:11:37', NULL, NULL, NULL, NULL),
(7, 7, NULL, 7, 'INV-20260218-0007', NULL, NULL, 'Trial subscription for Professional plan (monthly) - Free 7-day trial', 99.99, 0.00, 99.99, 'NGN', '', 'pending', '2026-03-20', NULL, '2026-02-18 18:40:51', '2027-02-18 18:40:51', 1, NULL, NULL, NULL, '2026-02-18 18:40:51', NULL, NULL, NULL, NULL),
(8, 8, NULL, 8, 'INV-20260218-0008', NULL, NULL, 'Trial subscription for Starter plan (monthly) - Free 7-day trial', 49.99, 0.00, 49.99, 'NGN', '', 'pending', '2026-03-20', NULL, '2026-02-18 19:24:12', '2027-02-18 19:24:12', 1, NULL, NULL, NULL, '2026-02-18 19:24:12', NULL, NULL, NULL, NULL);

--
-- Triggers `invoices`
--
DELIMITER $$
CREATE TRIGGER `before_invoices_insert` BEFORE INSERT ON `invoices` FOR EACH ROW BEGIN
    IF NEW.invoice_number IS NULL OR NEW.invoice_number='' THEN
    SET NEW.invoice_number=CONCAT('INV-', DATE_FORMAT(NOW(), '%Y%m%d-' ), LPAD(FLOOR(RAND() * 10000), 4, '0' ));
    END IF;
    IF NEW.total_amount IS NULL THEN
    SET NEW.total_amount=NEW.amount + COALESCE(NEW.tax, 0);
    END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `onboarding_logs`
--

CREATE TABLE `onboarding_logs` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'completed',
  `log_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`log_data`)),
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `onboarding_logs`
--

INSERT INTO `onboarding_logs` (`id`, `school_id`, `admin_id`, `school_name`, `status`, `log_data`, `created_at`) VALUES
(1, 6, 1, 'bitflux wallet', 'completed', '[{\"step\":\"init\",\"timestamp\":\"2026-02-18 17:11:36\",\"message\":\"School provisioning process initiated\"},{\"step\":\"system_files\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"System files loaded successfully\"},{\"step\":\"authentication\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"Super admin authenticated: Super Admin\",\"admin_id\":1},{\"step\":\"csrf_validation\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"CSRF token validated successfully\"},{\"step\":\"field_validation\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"All required fields validated\",\"school_name\":\"bitflux wallet\",\"admin_email\":\"safebit99@gmail.com\"},{\"step\":\"database_connection\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"Platform database connected successfully\"},{\"step\":\"email_uniqueness_check\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"School and admin emails are unique\"},{\"step\":\"slug_generation\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"School slug generated\",\"slug\":\"bitflux-wallet-1771434696\"},{\"step\":\"plan_selection\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"Plan selected\",\"plan_id\":2,\"plan_name\":\"Professional\",\"plan_price\":\"99.99\"},{\"step\":\"data_preparation\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"School data prepared for insertion\",\"data_fields\":[\"parent_school_id\",\"uuid\",\"name\",\"description\",\"mission_statement\",\"vision_statement\",\"principal_name\",\"principal_message\",\"slug\",\"school_type\",\"curriculum\",\"student_count\",\"teacher_count\",\"class_count\",\"email\",\"phone\",\"address\",\"city\",\"postal_code\",\"state\",\"country\",\"establishment_year\",\"avg_rating\",\"total_reviews\",\"fee_range_from\",\"fee_range_to\",\"facilities\",\"gallery_images\",\"admission_status\",\"accreditation\",\"accreditations\",\"affiliations\",\"extracurricular_activities\",\"sports_facilities\",\"transportation_available\",\"boarding_available\",\"meal_provided\",\"teacher_student_ratio\",\"average_class_size\",\"school_hours\",\"admission_process\",\"admission_deadline\",\"entrance_exam_required\",\"interview_required\",\"social_links\",\"logo_path\",\"primary_color\",\"secondary_color\",\"database_name\",\"database_host\",\"database_port\",\"plan_id\",\"status\",\"trial_ends_at\",\"subscription_ends_at\",\"settings\",\"timezone\",\"currency\",\"language\",\"created_at\",\"updated_at\",\"suspended_at\",\"campus_type\",\"campus_code\",\"storage_used\",\"request_count\",\"last_request_at\",\"last_backup_at\",\"last_optimized_at\"]},{\"step\":\"transaction_start\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"Platform database transaction started\"},{\"step\":\"school_record_created\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"School record created in platform database\",\"school_id\":\"6\",\"school_name\":\"bitflux wallet\"},{\"step\":\"logo_upload\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"School logo uploaded\",\"logo_path\":\"assets\\/uploads\\/schools\\/6\\/logo-bitflux-wallet-1771434696.jpg\"},{\"step\":\"database_creation_start\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"Starting school database creation\"},{\"step\":\"database_created\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"School database created successfully\",\"database_name\":\"school_6\",\"database_result\":{\"success\":true,\"message\":\"School database created successfully\",\"database_name\":\"school_6\",\"admin_user_id\":\"1\"}},{\"step\":\"directories_created\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"School directories created\"},{\"step\":\"portal_ensured\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"School portal files ensured\"},{\"step\":\"database_connection_test\",\"timestamp\":\"2026-02-18 18:11:36\",\"message\":\"Successfully connected to school database\",\"table_count\":46},{\"step\":\"admin_user_warning\",\"timestamp\":\"2026-02-18 18:11:37\",\"message\":\"Warning: Could not create admin user in school database\"},{\"step\":\"platform_admin_created\",\"timestamp\":\"2026-02-18 18:11:37\",\"message\":\"Admin record created in platform database\",\"platform_admin_id\":\"6\",\"role\":\"owner\",\"school_id\":\"6\"},{\"step\":\"subscription_created\",\"timestamp\":\"2026-02-18 18:11:37\",\"message\":\"Subscription record created\",\"subscription_id\":\"6\",\"billing_cycle\":\"monthly\",\"amount\":\"99.99\",\"trial_ends_at\":\"2026-02-25 18:11:36\"},{\"step\":\"invoice_created\",\"timestamp\":\"2026-02-18 18:11:37\",\"message\":\"Trial invoice created\",\"invoice_number\":\"INV-20260218-0006\",\"invoice_id\":\"6\"},{\"step\":\"statistics_update\",\"timestamp\":\"2026-02-18 18:11:37\",\"message\":\"School statistics updated\",\"teacher_student_ratio\":\"500:50\"},{\"step\":\"class_size_update\",\"timestamp\":\"2026-02-18 18:11:37\",\"message\":\"Average class size calculated\",\"average_class_size\":25},{\"step\":\"transaction_commit\",\"timestamp\":\"2026-02-18 18:11:37\",\"message\":\"Platform transaction committed successfully\"},{\"step\":\"emails_sent\",\"timestamp\":\"2026-02-18 18:11:37\",\"message\":\"Welcome emails processed\",\"email_details\":{\"welcome_email_sent\":true,\"invoice_email_sent\":true,\"email_queue_ids\":{\"welcome\":\"7\",\"invoice\":\"8\"},\"email_send_attempts\":{\"welcome\":\"queued\",\"welcome_send_result\":{\"success\":true,\"message\":\"Email sent successfully\",\"message_id\":null,\"provider_message_id\":null},\"invoice_send_result\":{\"success\":true,\"message\":\"Email sent successfully\",\"message_id\":null,\"provider_message_id\":null}},\"email_log_ids\":[]}}]', '2026-02-18 18:11:37'),
(2, 7, 1, 'spring blooms college', 'completed', '[{\"step\":\"init\",\"timestamp\":\"2026-02-18 18:40:50\",\"message\":\"School provisioning process initiated\"},{\"step\":\"system_files\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"System files loaded successfully\"},{\"step\":\"authentication\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"Super admin authenticated: Super Admin\",\"admin_id\":1},{\"step\":\"csrf_validation\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"CSRF token validated successfully\"},{\"step\":\"field_validation\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"All required fields validated\",\"school_name\":\"spring blooms college\",\"admin_email\":\"zubetechhub@gmail.com\"},{\"step\":\"database_connection\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"Platform database connected successfully\"},{\"step\":\"email_uniqueness_check\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"School and admin emails are unique\"},{\"step\":\"slug_generation\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"School slug generated\",\"slug\":\"spring-blooms-college\"},{\"step\":\"plan_selection\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"Plan selected\",\"plan_id\":2,\"plan_name\":\"Professional\",\"plan_price\":\"99.99\"},{\"step\":\"data_preparation\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"School data prepared for insertion\",\"data_fields\":[\"parent_school_id\",\"uuid\",\"name\",\"description\",\"mission_statement\",\"vision_statement\",\"principal_name\",\"principal_message\",\"slug\",\"school_type\",\"curriculum\",\"student_count\",\"teacher_count\",\"class_count\",\"email\",\"phone\",\"address\",\"city\",\"postal_code\",\"state\",\"country\",\"establishment_year\",\"avg_rating\",\"total_reviews\",\"fee_range_from\",\"fee_range_to\",\"facilities\",\"gallery_images\",\"admission_status\",\"accreditation\",\"accreditations\",\"affiliations\",\"extracurricular_activities\",\"sports_facilities\",\"transportation_available\",\"boarding_available\",\"meal_provided\",\"teacher_student_ratio\",\"average_class_size\",\"school_hours\",\"admission_process\",\"admission_deadline\",\"entrance_exam_required\",\"interview_required\",\"social_links\",\"logo_path\",\"primary_color\",\"secondary_color\",\"database_name\",\"database_host\",\"database_port\",\"plan_id\",\"status\",\"trial_ends_at\",\"subscription_ends_at\",\"settings\",\"timezone\",\"currency\",\"language\",\"created_at\",\"updated_at\",\"suspended_at\",\"campus_type\",\"campus_code\",\"storage_used\",\"request_count\",\"last_request_at\",\"last_backup_at\",\"last_optimized_at\"]},{\"step\":\"transaction_start\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"Platform database transaction started\"},{\"step\":\"school_record_created\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"School record created in platform database\",\"school_id\":\"7\",\"school_name\":\"spring blooms college\"},{\"step\":\"logo_upload\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"School logo uploaded\",\"logo_path\":\"assets\\/uploads\\/schools\\/7\\/logo-spring-blooms-college.png\"},{\"step\":\"database_creation_start\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"Starting school database creation\"},{\"step\":\"database_created\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"School database created successfully\",\"database_name\":\"school_7\",\"database_result\":{\"success\":true,\"message\":\"School database created successfully\",\"database_name\":\"school_7\",\"admin_user_id\":\"1\"}},{\"step\":\"directories_created\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"School directories created\"},{\"step\":\"portal_ensured\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"School portal files ensured\"},{\"step\":\"database_connection_test\",\"timestamp\":\"2026-02-18 19:40:50\",\"message\":\"Successfully connected to school database\",\"table_count\":46},{\"step\":\"admin_user_warning\",\"timestamp\":\"2026-02-18 19:40:51\",\"message\":\"Warning: Could not create admin user in school database\"},{\"step\":\"platform_admin_created\",\"timestamp\":\"2026-02-18 19:40:51\",\"message\":\"Admin record created in platform database\",\"platform_admin_id\":\"7\",\"role\":\"owner\",\"school_id\":\"7\"},{\"step\":\"subscription_created\",\"timestamp\":\"2026-02-18 19:40:51\",\"message\":\"Subscription record created\",\"subscription_id\":\"7\",\"billing_cycle\":\"monthly\",\"amount\":\"99.99\",\"trial_ends_at\":\"2026-02-25 19:40:50\"},{\"step\":\"invoice_created\",\"timestamp\":\"2026-02-18 19:40:51\",\"message\":\"Trial invoice created\",\"invoice_number\":\"INV-20260218-0007\",\"invoice_id\":\"7\"},{\"step\":\"statistics_update\",\"timestamp\":\"2026-02-18 19:40:51\",\"message\":\"School statistics updated\",\"teacher_student_ratio\":\"500:50\"},{\"step\":\"class_size_update\",\"timestamp\":\"2026-02-18 19:40:51\",\"message\":\"Average class size calculated\",\"average_class_size\":25},{\"step\":\"transaction_commit\",\"timestamp\":\"2026-02-18 19:40:51\",\"message\":\"Platform transaction committed successfully\"},{\"step\":\"emails_sent\",\"timestamp\":\"2026-02-18 19:40:51\",\"message\":\"Welcome emails processed\",\"email_details\":{\"welcome_email_sent\":true,\"invoice_email_sent\":true,\"email_queue_ids\":{\"welcome\":\"9\",\"invoice\":\"10\"},\"email_send_attempts\":{\"welcome\":\"queued\",\"welcome_send_result\":{\"success\":true,\"message\":\"Email sent successfully\",\"message_id\":null,\"provider_message_id\":null},\"invoice_send_result\":{\"success\":true,\"message\":\"Email sent successfully\",\"message_id\":null,\"provider_message_id\":null}},\"email_log_ids\":[]}}]', '2026-02-18 19:40:51'),
(3, 8, 1, 'blue rose', 'completed', '[{\"step\":\"init\",\"timestamp\":\"2026-02-18 19:24:11\",\"message\":\"School provisioning process initiated\"},{\"step\":\"system_files\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"System files loaded successfully\"},{\"step\":\"authentication\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"Super admin authenticated: Super Admin\",\"admin_id\":1},{\"step\":\"csrf_validation\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"CSRF token validated successfully\"},{\"step\":\"field_validation\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"All required fields validated\",\"school_name\":\"blue rose\",\"admin_email\":\"limitedtgs@gmail.com\"},{\"step\":\"database_connection\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"Platform database connected successfully\"},{\"step\":\"email_uniqueness_check\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"School and admin emails are unique\"},{\"step\":\"slug_generation\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"School slug generated\",\"slug\":\"blue-rose\"},{\"step\":\"plan_selection\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"Plan selected\",\"plan_id\":1,\"plan_name\":\"Starter\",\"plan_price\":\"49.99\"},{\"step\":\"data_preparation\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"School data prepared for insertion\",\"data_fields\":[\"parent_school_id\",\"uuid\",\"name\",\"description\",\"mission_statement\",\"vision_statement\",\"principal_name\",\"principal_message\",\"slug\",\"school_type\",\"curriculum\",\"student_count\",\"teacher_count\",\"class_count\",\"email\",\"phone\",\"address\",\"city\",\"postal_code\",\"state\",\"country\",\"establishment_year\",\"avg_rating\",\"total_reviews\",\"fee_range_from\",\"fee_range_to\",\"facilities\",\"gallery_images\",\"admission_status\",\"accreditation\",\"accreditations\",\"affiliations\",\"extracurricular_activities\",\"sports_facilities\",\"transportation_available\",\"boarding_available\",\"meal_provided\",\"teacher_student_ratio\",\"average_class_size\",\"school_hours\",\"admission_process\",\"admission_deadline\",\"entrance_exam_required\",\"interview_required\",\"social_links\",\"logo_path\",\"primary_color\",\"secondary_color\",\"database_name\",\"database_host\",\"database_port\",\"plan_id\",\"status\",\"trial_ends_at\",\"subscription_ends_at\",\"settings\",\"timezone\",\"currency\",\"language\",\"created_at\",\"updated_at\",\"suspended_at\",\"campus_type\",\"campus_code\",\"storage_used\",\"request_count\",\"last_request_at\",\"last_backup_at\",\"last_optimized_at\"]},{\"step\":\"transaction_start\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"Platform database transaction started\"},{\"step\":\"school_record_created\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"School record created in platform database\",\"school_id\":\"8\",\"school_name\":\"blue rose\"},{\"step\":\"logo_upload\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"School logo uploaded\",\"logo_path\":\"assets\\/uploads\\/schools\\/8\\/logo-blue-rose.png\"},{\"step\":\"database_creation_start\",\"timestamp\":\"2026-02-18 20:24:11\",\"message\":\"Starting school database creation\"},{\"step\":\"database_created\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"School database created successfully\",\"database_name\":\"school_8\",\"database_result\":{\"success\":true,\"message\":\"School database created successfully\",\"database_name\":\"school_8\",\"admin_user_id\":\"1\"}},{\"step\":\"directories_created\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"School directories created\"},{\"step\":\"portal_ensured\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"School portal files ensured\"},{\"step\":\"database_connection_test\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"Successfully connected to school database\",\"table_count\":46},{\"step\":\"admin_user_warning\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"Warning: Could not create admin user in school database\"},{\"step\":\"platform_admin_created\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"Admin record created in platform database\",\"platform_admin_id\":\"8\",\"role\":\"owner\",\"school_id\":\"8\"},{\"step\":\"subscription_created\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"Subscription record created\",\"subscription_id\":\"8\",\"billing_cycle\":\"monthly\",\"amount\":\"49.99\",\"trial_ends_at\":\"2026-02-25 20:24:11\"},{\"step\":\"invoice_created\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"Trial invoice created\",\"invoice_number\":\"INV-20260218-0008\",\"invoice_id\":\"8\"},{\"step\":\"statistics_update\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"School statistics updated\",\"teacher_student_ratio\":\"500:50\"},{\"step\":\"class_size_update\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"Average class size calculated\",\"average_class_size\":25},{\"step\":\"transaction_commit\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"Platform transaction committed successfully\"},{\"step\":\"emails_sent\",\"timestamp\":\"2026-02-18 20:24:12\",\"message\":\"Welcome emails processed\",\"email_details\":{\"welcome_email_sent\":true,\"invoice_email_sent\":true,\"email_results\":{\"welcome\":{\"success\":true,\"method\":\"fallback\"},\"invoice\":{\"success\":true,\"method\":\"fallback\"}}}}]', '2026-02-18 20:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `parent_portal_access`
--

CREATE TABLE `parent_portal_access` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `access_token` varchar(100) NOT NULL,
  `access_code` varchar(10) DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `login_count` int(10) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'NULL for platform-wide gateways',
  `name` varchar(100) NOT NULL,
  `provider` enum('paystack','flutterwave','stripe','paypal','manual') NOT NULL,
  `mode` enum('test','live') DEFAULT 'test',
  `public_key` varchar(500) DEFAULT NULL,
  `secret_key` varchar(500) DEFAULT NULL,
  `encryption_key` varchar(500) DEFAULT NULL,
  `webhook_url` varchar(500) DEFAULT NULL,
  `webhook_secret` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `is_default` tinyint(1) DEFAULT 0,
  `transaction_fee_percentage` decimal(5,2) DEFAULT 0.00,
  `transaction_fee_fixed` decimal(10,2) DEFAULT 0.00,
  `settlement_bank` varchar(100) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `supported_currencies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`supported_currencies`)),
  `config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`config`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `school_id`, `name`, `provider`, `mode`, `public_key`, `secret_key`, `encryption_key`, `webhook_url`, `webhook_secret`, `is_active`, `is_default`, `transaction_fee_percentage`, `transaction_fee_fixed`, `settlement_bank`, `account_number`, `account_name`, `supported_currencies`, `config`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Paystack Default', 'paystack', 'test', 'pk_test_public_key', 'sk_test_secret_key', NULL, NULL, NULL, 1, 1, 1.50, 0.00, NULL, NULL, NULL, '[\"NGN\", \"GHS\", \"USD\"]', NULL, '2026-01-15 00:48:26', '2026-01-15 00:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tokens`
--

CREATE TABLE `payment_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `gateway` varchar(50) NOT NULL,
  `card_last_four` varchar(4) DEFAULT NULL,
  `card_brand` varchar(50) DEFAULT NULL,
  `expiry_month` int(2) DEFAULT NULL,
  `expiry_year` int(4) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_gateway_id` int(10) UNSIGNED NOT NULL,
  `transaction_reference` varchar(255) NOT NULL,
  `gateway_transaction_id` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) DEFAULT 'NGN',
  `gateway_fee` decimal(10,2) DEFAULT 0.00,
  `net_amount` decimal(10,2) NOT NULL,
  `status` enum('initiated','pending','success','failed','cancelled','refunded') DEFAULT 'initiated',
  `payment_method` varchar(50) DEFAULT NULL,
  `card_last_four` varchar(4) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `payer_name` varchar(255) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `payer_phone` varchar(20) DEFAULT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `gateway_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gateway_response`)),
  `verified_at` timestamp NULL DEFAULT NULL,
  `refunded_at` timestamp NULL DEFAULT NULL,
  `refund_reason` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price_monthly` decimal(10,2) NOT NULL DEFAULT 0.00,
  `price_yearly` decimal(10,2) NOT NULL DEFAULT 0.00,
  `student_limit` int(10) UNSIGNED NOT NULL DEFAULT 50,
  `teacher_limit` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `campus_limit` int(10) UNSIGNED DEFAULT 1,
  `storage_limit` int(10) UNSIGNED DEFAULT 1024,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `is_active` tinyint(1) DEFAULT 1,
  `is_default` tinyint(1) DEFAULT 0,
  `sort_order` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `slug`, `description`, `price_monthly`, `price_yearly`, `student_limit`, `teacher_limit`, `campus_limit`, `storage_limit`, `features`, `is_active`, `is_default`, `sort_order`, `created_at`) VALUES
(1, 'Starter', 'starter', 'Perfect for small schools just getting started', 49.99, 499.99, 100, 20, 1, 1024, '[\r\n    \"Up to 100 students\",\r\n    \"Up to 20 teachers\",\r\n    \"1 campus included\",\r\n    \"1 GB storage\",\r\n    \"Student information system\",\r\n    \"Attendance tracking\",\r\n    \"Gradebook and report cards\",\r\n    \"Parent portal access\",\r\n    \"Basic communication tools\",\r\n    \"School website builder\",\r\n    \"Email support\",\r\n    \"Mobile app access\"\r\n]', 1, 1, 1, '2026-01-15 00:48:26'),
(2, 'Professional', 'professional', 'For growing schools with multiple campuses', 99.99, 999.99, 500, 50, 3, 5120, '[\r\n    \"Up to 500 students\",\r\n    \"Up to 50 teachers\",\r\n    \"3 campuses included\",\r\n    \"5 GB storage\",\r\n    \"All Starter features\",\r\n    \"Fee and payment management\",\r\n    \"Library management system\",\r\n    \"Transport management\",\r\n    \"Inventory management\",\r\n    \"Advanced reporting & analytics\",\r\n    \"Custom report builder\",\r\n    \"Biometric integration\",\r\n    \"Priority email & chat support\",\r\n    \"API access\",\r\n    \"Custom fields\"\r\n]', 1, 0, 2, '2026-01-15 00:48:26'),
(3, 'Enterprise', 'enterprise', 'For large institutions with complex needs', 199.99, 1999.99, 2000, 200, 10, 10240, '[\r\n    \"Up to 2000 students\",\r\n    \"Up to 200 teachers\",\r\n    \"10 campuses included\",\r\n    \"10 GB storage\",\r\n    \"All Professional features\",\r\n    \"Advanced analytics dashboard\",\r\n    \"Custom workflow automation\",\r\n    \"Single sign-on (SSO)\",\r\n    \"Custom integrations\",\r\n    \"White-label branding\",\r\n    \"Dedicated account manager\",\r\n    \"24/7 phone support\",\r\n    \"Training & implementation\",\r\n    \"Custom SLA agreement\",\r\n    \"Unlimited custom fields\"\r\n]', 1, 0, 3, '2026-01-15 00:48:26'),
(4, 'Free Trial', 'free-trial', '14-day free trial with limited features', 0.00, 0.00, 50, 5, 1, 512, '[\r\n    \"Up to 50 students\",\r\n    \"Up to 5 teachers\",\r\n    \"1 campus included\",\r\n    \"512 MB storage\",\r\n    \"Student management\",\r\n    \"Basic attendance\",\r\n    \"Gradebook\",\r\n    \"14-day trial period\",\r\n    \"All core features\",\r\n    \"Email support during trial\"\r\n]', 1, 0, 0, '2026-01-15 00:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `platform_audit_logs`
--

CREATE TABLE `platform_audit_logs` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `event` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `platform_audit_logs`
--

INSERT INTO `platform_audit_logs` (`id`, `school_id`, `event`, `description`, `user_type`, `created_at`) VALUES
(1, 6, 'school_activated', 'School activated by super admin', 'super_admin', '2026-03-03 13:52:58'),
(2, 6, 'database_backup', 'Database backup created: school_6_backup_2026-03-24_09-20-20.sql.gz (41.25 KB)', 'super_admin', '2026-03-24 08:20:20'),
(3, 5, 'school_activated', 'School activated by super admin', 'super_admin', '2026-03-24 08:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `platform_broadcasts`
--

CREATE TABLE `platform_broadcasts` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `user_types` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`user_types`)),
  `total_recipients` int(11) DEFAULT NULL,
  `emails_sent` int(11) DEFAULT NULL,
  `sent_by` varchar(100) DEFAULT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `platform_users`
--

CREATE TABLE `platform_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_admin','support','sales') DEFAULT 'support',
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(45) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `platform_users`
--

INSERT INTO `platform_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `avatar`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `last_login_at`, `last_login_ip`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@academixsuite.com', NULL, '$2y$12$6PMv0yocTPOo6Hv2zeDVAOgYVjinNSQN9ORGV4Fr3.FXhoRKeXawG', 'super_admin', NULL, NULL, NULL, NULL, NULL, '2026-04-11 14:46:45', '102.89.43.152', 1, '2026-01-15 00:48:26', '2026-04-11 14:46:45'),
(2, 'Support Agent', 'support@academixsuite.com', NULL, '$2y$10$AnotherHashHereForSupport', 'support', '+2348001234567', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-15 01:01:45', '2026-02-12 16:28:26'),
(3, 'Sales Executive', 'sales@academixsuite.com', NULL, '$2y$10$AnotherHashHereForSales', 'sales', '+2348007654321', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-15 01:01:45', '2026-02-12 16:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_announcements`
--

CREATE TABLE `scheduled_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'NULL = platform-wide',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(50) DEFAULT 'general' COMMENT 'general, urgent, maintenance, etc.',
  `target_audience` varchar(50) DEFAULT 'all' COMMENT 'all, students, teachers, parents, admins',
  `status` enum('scheduled','published','cancelled') DEFAULT 'scheduled',
  `scheduled_for` datetime NOT NULL,
  `published_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `send_email` tinyint(1) DEFAULT 0 COMMENT 'Also send as email notification',
  `send_sms` tinyint(1) DEFAULT 0 COMMENT 'Also send as SMS',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_school_id` int(10) UNSIGNED DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `mission_statement` text DEFAULT NULL,
  `vision_statement` text DEFAULT NULL,
  `principal_name` varchar(255) DEFAULT NULL,
  `principal_message` text DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `school_type` enum('nursery','primary','secondary','comprehensive','international','montessori','boarding','day') DEFAULT 'secondary',
  `curriculum` varchar(100) DEFAULT 'Nigerian',
  `student_count` int(11) DEFAULT 0,
  `teacher_count` int(11) DEFAULT 0,
  `class_count` int(11) DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT 'Nigeria',
  `establishment_year` year(4) DEFAULT NULL,
  `avg_rating` decimal(3,2) DEFAULT 0.00,
  `total_reviews` int(11) DEFAULT 0,
  `fee_range_from` decimal(10,2) DEFAULT 0.00,
  `fee_range_to` decimal(10,2) DEFAULT 0.00,
  `facilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`facilities`)),
  `gallery_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery_images`)),
  `admission_status` enum('open','closed','waiting_list') DEFAULT 'open',
  `accreditation` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`accreditation`)),
  `accreditations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`accreditations`)),
  `affiliations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`affiliations`)),
  `extracurricular_activities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`extracurricular_activities`)),
  `sports_facilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sports_facilities`)),
  `transportation_available` tinyint(1) DEFAULT 0,
  `boarding_available` tinyint(1) DEFAULT 0,
  `meal_provided` tinyint(1) DEFAULT 0,
  `teacher_student_ratio` varchar(20) DEFAULT NULL,
  `average_class_size` int(11) DEFAULT NULL,
  `school_hours` varchar(100) DEFAULT NULL,
  `admission_process` text DEFAULT NULL,
  `admission_deadline` date DEFAULT NULL,
  `entrance_exam_required` tinyint(1) DEFAULT 0,
  `interview_required` tinyint(1) DEFAULT 0,
  `social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_links`)),
  `logo_path` varchar(500) DEFAULT NULL,
  `primary_color` varchar(7) DEFAULT '#3B82F6',
  `secondary_color` varchar(7) DEFAULT '#10B981',
  `database_name` varchar(100) DEFAULT NULL,
  `database_host` varchar(255) DEFAULT 'localhost',
  `database_port` int(11) DEFAULT 3306,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('pending','trial','active','suspended','cancelled') DEFAULT 'pending',
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `subscription_ends_at` timestamp NULL DEFAULT NULL,
  `settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`settings`)),
  `timezone` varchar(50) DEFAULT 'Africa/Lagos',
  `currency` varchar(3) DEFAULT 'NGN',
  `language` varchar(10) DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `suspended_at` timestamp NULL DEFAULT NULL,
  `campus_type` enum('main','branch') DEFAULT 'main',
  `campus_code` varchar(50) DEFAULT NULL,
  `storage_used` int(11) DEFAULT 0 COMMENT 'Storage used in MB',
  `request_count` int(11) DEFAULT 0,
  `last_request_at` timestamp NULL DEFAULT NULL,
  `last_backup_at` timestamp NULL DEFAULT NULL,
  `last_optimized_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `parent_school_id`, `uuid`, `name`, `description`, `mission_statement`, `vision_statement`, `principal_name`, `principal_message`, `slug`, `school_type`, `curriculum`, `student_count`, `teacher_count`, `class_count`, `email`, `phone`, `address`, `city`, `postal_code`, `state`, `country`, `establishment_year`, `avg_rating`, `total_reviews`, `fee_range_from`, `fee_range_to`, `facilities`, `gallery_images`, `admission_status`, `accreditation`, `accreditations`, `affiliations`, `extracurricular_activities`, `sports_facilities`, `transportation_available`, `boarding_available`, `meal_provided`, `teacher_student_ratio`, `average_class_size`, `school_hours`, `admission_process`, `admission_deadline`, `entrance_exam_required`, `interview_required`, `social_links`, `logo_path`, `primary_color`, `secondary_color`, `database_name`, `database_host`, `database_port`, `plan_id`, `status`, `trial_ends_at`, `subscription_ends_at`, `settings`, `timezone`, `currency`, `language`, `created_at`, `updated_at`, `suspended_at`, `campus_type`, `campus_code`, `storage_used`, `request_count`, `last_request_at`, `last_backup_at`, `last_optimized_at`) VALUES
(1, NULL, 'eabfbd7f-6166-4b19-a30c-076569143496', 'bitflux wallet', 'testing', NULL, NULL, NULL, NULL, 'bitflux-wallet', 'day', 'Nigerian', 500, 50, 20, 'bitfluxwallet@gmail.com', '+18119999755', '123 walkers street\r\n123 walkers street', 'new york', '40012', 'Abia', 'Nigeria', '2003', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '500:50', 25, NULL, NULL, NULL, 0, 0, NULL, 'assets/uploads/schools/1/logo-bitflux-wallet.png', '#3B82F6', '#10B981', 'school_1', 'localhost', 3306, 3, 'suspended', '2026-02-23 17:30:29', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-02-16 17:30:29', '2026-02-23 22:00:10', NULL, 'main', 'MAI788', 0, 0, NULL, NULL, NULL),
(2, NULL, '9d544f7a-84b4-404c-9237-e7688341f7c9', 'Nobsams International', 'testing', NULL, NULL, NULL, NULL, 'nobsams-international', 'day', 'Bilingual', 500, 50, 20, 'favouruzodinma55@gmail.com', '07041390038', 'testing', 'Igbo etche', '501001', 'Rivers', 'Nigeria', '2005', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '500:50', 25, NULL, NULL, NULL, 0, 0, NULL, 'assets/uploads/schools/2/logo-nobsams-international.png', '#3B82F6', '#10B981', 'school_2', 'localhost', 3306, 3, 'suspended', '2026-02-23 18:33:55', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-02-16 18:33:55', '2026-02-23 22:00:10', NULL, 'main', 'MAI020', 0, 0, NULL, NULL, NULL),
(3, NULL, '5aa4e7a3-2d09-49be-9773-b7cb70198edb', 'wisdom gate international', 'tester', NULL, NULL, NULL, NULL, 'wisdom-gate-international', 'day', 'British', 500, 50, 20, 'favourhenry05@gmail.com', '09070525288', '123 walkers street\r\n123 walkers street', 'eliozu', '501001', 'Rivers', 'Nigeria', '2005', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '500:50', 25, NULL, NULL, NULL, 0, 0, NULL, 'assets/uploads/schools/3/logo-wisdom-gate-international.png', '#3B82F6', '#10B981', 'school_3', 'localhost', 3306, 2, 'suspended', '2026-02-23 19:16:07', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-02-16 19:16:07', '2026-02-23 22:00:10', NULL, 'main', 'MAI921', 0, 0, NULL, NULL, NULL),
(4, NULL, 'd499bf09-5063-4f5c-93c3-70ee4a16ab0d', 'Goodnew international', 'testfdt', NULL, NULL, NULL, NULL, 'goodnew-international', 'day', 'Technical', 500, 50, 20, 'mutexia1@gmail.com', '+2348033480654', 'eliozu portharcourt', 'port harcourt', '510010', 'Rivers', 'Nigeria', '2015', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '500:50', 25, NULL, NULL, NULL, 0, 0, NULL, 'assets/uploads/schools/4/logo-goodnew-international.png', '#3B82F6', '#10B981', 'school_4', 'localhost', 3306, 1, 'suspended', '2026-02-24 09:33:17', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-02-17 09:33:17', '2026-02-24 11:32:44', NULL, 'main', 'MAI695', 0, 0, NULL, NULL, NULL),
(5, NULL, 'c061ca7b-8991-439c-a3cb-079ffe840727', 'Damtoj international', 'testing123', NULL, NULL, NULL, NULL, 'damtoj-international', 'day', 'IB', 500, 50, 20, 'zubetechhubb@gmail.com', '+18119999755', '123 walkers street\r\n123 walkers street', 'new york', '40012', 'Rivers', 'Nigeria', '2004', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '500:50', 25, NULL, NULL, NULL, 0, 0, NULL, 'assets/uploads/schools/5/logo-damtoj-international.jpeg', '#3B82F6', '#10B981', 'school_5', 'localhost', 3306, 2, 'active', '2026-02-25 16:11:47', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-02-18 16:11:47', '2026-03-24 08:23:22', NULL, 'main', 'MAI092', 0, 0, NULL, NULL, NULL),
(6, NULL, '5ba109ad-d739-44c8-99a7-7f7cf729a7e4', 'bitflux wallet', 'tesztibg', 'testing', 'testig', NULL, 'hold on', 'bitflux-wallet-1771434696', 'secondary', 'Nigerian', 500, 50, 20, 'safebit99@gmail.com', '+18119999755', '123 walkers street123 walkers street', 'new york', '40012', 'Abia', 'Nigeria', '2004', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '500:50', 25, NULL, NULL, NULL, 0, 0, '{\"facebook\":\"\",\"twitter\":\"\",\"instagram\":\"\",\"linkedin\":\"\",\"youtube\":\"\"}', 'assets/uploads/schools/6/logo-bitflux-wallet-1771434696.jpg', '#3B82F6', '#10B981', 'school_6', 'localhost', 3306, 2, 'active', '2026-02-25 17:11:36', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-02-18 17:11:36', '2026-03-03 14:08:57', NULL, 'main', 'MAI995', 0, 0, NULL, NULL, NULL),
(7, NULL, '7cb5f696-ecc9-4338-a82c-6e1d32cf032d', 'spring blooms college', 'testimg', NULL, NULL, NULL, NULL, 'spring-blooms-college', 'boarding', 'IB', 500, 50, 20, 'zubetechhub@gmail.com', '+18119999758', '123 walkers street\r\n123 walkers street', 'new york', '40012', 'Adamawa', 'Nigeria', '2015', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '500:50', 25, NULL, NULL, NULL, 0, 0, NULL, 'assets/uploads/schools/7/logo-spring-blooms-college.png', '#3B82F6', '#10B981', 'school_7', 'localhost', 3306, 2, 'suspended', '2026-02-25 18:40:50', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-02-18 18:40:50', '2026-03-03 08:59:31', NULL, 'main', 'MAI957', 0, 0, NULL, NULL, NULL),
(8, NULL, 'ebe2d7b0-7688-403b-8c9e-21c658f9310a', 'blue rose', 'testing', NULL, NULL, NULL, NULL, 'blue-rose', 'comprehensive', 'IB', 500, 50, 20, 'limitedtgs@gmail.com', '+18119999700', '123 walkers street\r\n123 walkers street', 'new york', '40012', 'Akwa Ibom', 'Nigeria', '2019', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '500:50', 25, NULL, NULL, NULL, 0, 0, NULL, 'assets/uploads/schools/8/logo-blue-rose.png', '#3B82F6', '#10B981', 'school_8', 'localhost', 3306, 1, 'suspended', '2026-02-25 19:24:11', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-02-18 19:24:11', '2026-03-03 08:59:31', NULL, 'branch', 'BRA899', 0, 0, NULL, NULL, NULL),
(12, NULL, 'c5553e68-e690-4ea5-8ce9-64a768cfbd67', 'osusu community school', 'hdgsghxc', NULL, NULL, NULL, NULL, 'osusu-community-school', '', 'IB', 100, 20, 10, 'favour-uzodinma@tpvconstruction.com.ng', '07041390000', 'chokocho\r\netche', 'chokocho', '510010', 'Rivers', 'Nigeria', '1990', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'assets/uploads/schools/12/logo-osusu-community-school.png', '#3B82F6', '#10B981', NULL, 'localhost', 3306, 1, 'suspended', '2026-03-24 17:46:36', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-03-17 17:46:36', '2026-03-30 10:29:31', NULL, 'main', 'MAI850', 0, 0, NULL, NULL, NULL);

--
-- Triggers `schools`
--
DELIMITER $$
CREATE TRIGGER `before_schools_insert` BEFORE INSERT ON `schools` FOR EACH ROW BEGIN
    IF NEW.uuid IS NULL OR NEW.uuid='' THEN
    SET NEW.uuid=UUID();
    END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `school_admins`
--

CREATE TABLE `school_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('owner','admin','accountant','principal') DEFAULT 'owner',
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_admins`
--

INSERT INTO `school_admins` (`id`, `school_id`, `user_id`, `email`, `role`, `permissions`, `is_active`, `created_at`) VALUES
(1, 1, 1, 'bitfluxwallet@gmail.com', 'owner', '[\"*\"]', 1, '2026-02-16 17:30:30'),
(2, 2, 1, 'favouruzodinma55@gmail.com', 'owner', '[\"*\"]', 1, '2026-02-16 18:33:56'),
(3, 3, 1, 'favourhenry05@gmail.com', 'owner', '[\"*\"]', 1, '2026-02-16 19:16:08'),
(4, 4, 1, 'mutexia1@gmail.com', 'owner', '[\"*\"]', 1, '2026-02-17 09:33:18'),
(5, 5, 1, 'zubetechhubb@gmail.com', 'owner', '[\"*\"]', 1, '2026-02-18 16:11:48'),
(6, 6, 1, 'safebit99@gmail.com', 'owner', '[\"*\"]', 1, '2026-02-18 17:11:37'),
(7, 7, 1, 'zubetechhub@gmail.com', 'owner', '[\"*\"]', 1, '2026-02-18 18:40:51'),
(8, 8, 1, 'limitedtgs@gmail.com', 'owner', '[\"*\"]', 1, '2026-02-18 19:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `school_contacts`
--

CREATE TABLE `school_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `type` enum('phone','email','address','website','social') NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `sort_order` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_database_credentials`
--

CREATE TABLE `school_database_credentials` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `database_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `encrypted_password` text NOT NULL,
  `encryption_iv` varchar(64) NOT NULL,
  `status` enum('active','inactive','expired') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_database_info`
--

CREATE TABLE `school_database_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `database_name` varchar(100) NOT NULL,
  `database_user` varchar(100) DEFAULT NULL,
  `database_host` varchar(255) DEFAULT 'localhost',
  `database_port` int(11) DEFAULT 3306,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_database_stats`
--

CREATE TABLE `school_database_stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `database_name` varchar(100) NOT NULL,
  `size_mb` decimal(10,2) DEFAULT 0.00,
  `table_count` int(11) DEFAULT 0,
  `last_backup_at` timestamp NULL DEFAULT NULL,
  `last_optimized_at` timestamp NULL DEFAULT NULL,
  `health_status` enum('healthy','warning','critical') DEFAULT 'healthy',
  `checked_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_facilities`
--

CREATE TABLE `school_facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_gallery`
--

CREATE TABLE `school_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `type` enum('campus','classroom','laboratory','library','sports','events','other') DEFAULT 'campus',
  `sort_order` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_reviews`
--

CREATE TABLE `school_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `title` varchar(255) DEFAULT NULL,
  `comment` text NOT NULL,
  `pros` text DEFAULT NULL,
  `cons` text DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `is_approved` tinyint(1) DEFAULT 0,
  `helpful_count` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `to` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `status` enum('sent','failed','delivered') DEFAULT 'sent',
  `cost` decimal(8,4) DEFAULT 0.0000,
  `message_id` varchar(255) DEFAULT NULL,
  `provider` varchar(50) DEFAULT NULL,
  `error_message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_suspension_queue`
--

CREATE TABLE `student_suspension_queue` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL COMMENT 'payment_expired, violation, admin_action, etc.',
  `suspension_type` enum('temporary','permanent') DEFAULT 'temporary',
  `scheduled_for` datetime NOT NULL,
  `expires_at` datetime DEFAULT NULL COMMENT 'For temporary suspensions',
  `status` enum('pending','processed','cancelled') DEFAULT 'pending',
  `processed_at` datetime DEFAULT NULL,
  `email_sent` tinyint(1) DEFAULT 0,
  `metadata` text DEFAULT NULL COMMENT 'JSON for additional data',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `stripe_subscription_id` varchar(255) DEFAULT NULL,
  `paystack_subscription_code` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` enum('active','pending','canceled','past_due') DEFAULT 'pending',
  `billing_cycle` enum('monthly','yearly') DEFAULT 'monthly',
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) DEFAULT 'NGN',
  `current_period_start` timestamp NULL DEFAULT NULL,
  `current_period_end` timestamp NULL DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `canceled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `school_id`, `plan_id`, `stripe_subscription_id`, `paystack_subscription_code`, `description`, `status`, `billing_cycle`, `amount`, `currency`, `current_period_start`, `current_period_end`, `trial_ends_at`, `canceled_at`, `created_at`) VALUES
(1, 1, 3, NULL, NULL, NULL, '', 'monthly', 199.99, 'NGN', '2026-02-16 17:30:30', '2027-02-16 17:30:30', '2026-02-23 17:30:29', NULL, '2026-02-16 17:30:30'),
(2, 2, 3, NULL, NULL, NULL, '', 'monthly', 199.99, 'NGN', '2026-02-16 18:33:56', '2027-02-16 18:33:56', '2026-02-23 18:33:55', NULL, '2026-02-16 18:33:56'),
(3, 3, 2, NULL, NULL, NULL, '', 'monthly', 99.99, 'NGN', '2026-02-16 19:16:08', '2027-02-16 19:16:08', '2026-02-23 19:16:07', NULL, '2026-02-16 19:16:08'),
(4, 4, 1, NULL, NULL, NULL, '', 'monthly', 49.99, 'NGN', '2026-02-17 09:33:18', '2027-02-17 09:33:18', '2026-02-24 09:33:17', NULL, '2026-02-17 09:33:18'),
(5, 5, 2, NULL, NULL, NULL, '', 'monthly', 99.99, 'NGN', '2026-02-18 16:11:48', '2027-02-18 16:11:48', '2026-02-25 16:11:47', NULL, '2026-02-18 16:11:48'),
(6, 6, 2, NULL, NULL, NULL, '', 'monthly', 99.99, 'NGN', '2026-02-18 17:11:37', '2027-02-18 17:11:37', '2026-02-25 17:11:36', NULL, '2026-02-18 17:11:37'),
(7, 7, 2, NULL, NULL, NULL, '', 'monthly', 99.99, 'NGN', '2026-02-18 18:40:51', '2027-02-18 18:40:51', '2026-02-25 18:40:50', NULL, '2026-02-18 18:40:51'),
(8, 8, 1, NULL, NULL, NULL, '', 'monthly', 49.99, 'NGN', '2026-02-18 19:24:12', '2027-02-18 19:24:12', '2026-02-25 19:24:11', NULL, '2026-02-18 19:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `ticket_number` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `priority` enum('low','medium','high','urgent') DEFAULT 'medium',
  `status` enum('open','in_progress','resolved','closed') DEFAULT 'open',
  `category` varchar(100) DEFAULT NULL,
  `assigned_to` int(10) UNSIGNED DEFAULT NULL,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `support_tickets`
--
DELIMITER $$
CREATE TRIGGER `before_support_tickets_insert` BEFORE INSERT ON `support_tickets` FOR EACH ROW BEGIN
    IF NEW.ticket_number IS NULL OR NEW.ticket_number='' THEN
    SET NEW.ticket_number=CONCAT('TICKET-', DATE_FORMAT(NOW(), '%Y%m%d-' ), LPAD(FLOOR(RAND() * 10000), 4, '0' ));
    END IF;
    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_schools_view`
--
ALTER TABLE `active_schools_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_event` (`event`),
  ADD KEY `idx_created` (`created_at`),
  ADD KEY `idx_user` (`user_id`,`user_type`),
  ADD KEY `idx_audit_school_event` (`school_id`,`event`,`created_at`);

--
-- Indexes for table `bulk_email_campaigns`
--
ALTER TABLE `bulk_email_campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_admin` (`admin_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_created` (`created_at`),
  ADD KEY `idx_completed` (`completed_at`);

--
-- Indexes for table `cron_execution_history`
--
ALTER TABLE `cron_execution_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_task` (`task_name`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_started` (`started_at`);

--
-- Indexes for table `cron_logs`
--
ALTER TABLE `cron_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_task` (`task_name`),
  ADD KEY `idx_level` (`level`),
  ADD KEY `idx_created` (`created_at`);

--
-- Indexes for table `cron_schedules`
--
ALTER TABLE `cron_schedules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_task` (`task_name`),
  ADD KEY `idx_active` (`is_active`),
  ADD KEY `idx_next_run` (`next_run_at`);

--
-- Indexes for table `database_backups`
--
ALTER TABLE `database_backups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_bounces`
--
ALTER TABLE `email_bounces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_email` (`recipient_email`),
  ADD KEY `idx_queue` (`email_queue_id`),
  ADD KEY `idx_type` (`bounce_type`),
  ADD KEY `idx_created` (`created_at`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_to` (`to_email`),
  ADD KEY `idx_created` (`created_at`);

--
-- Indexes for table `email_queue`
--
ALTER TABLE `email_queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_scheduled` (`scheduled_at`,`status`),
  ADD KEY `idx_next_retry` (`next_retry_at`,`status`),
  ADD KEY `idx_recipient` (`recipient_email`),
  ADD KEY `idx_campaign` (`campaign_id`),
  ADD KEY `idx_tenant` (`tenant_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_created` (`created_at`),
  ADD KEY `idx_priority_status` (`priority`,`status`,`scheduled_at`),
  ADD KEY `idx_batch` (`batch_id`),
  ADD KEY `idx_worker_query` (`status`,`scheduled_at`,`next_retry_at`,`attempts`,`priority`,`created_at`);

--
-- Indexes for table `email_suppression_list`
--
ALTER TABLE `email_suppression_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_reason` (`reason`);

--
-- Indexes for table `enrollment_documents`
--
ALTER TABLE `enrollment_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_enrollment` (`enrollment_request_id`);

--
-- Indexes for table `enrollment_fees`
--
ALTER TABLE `enrollment_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_enrollment_request` (`enrollment_request_id`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `enrollment_requests`
--
ALTER TABLE `enrollment_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `request_number` (`request_number`),
  ADD KEY `idx_school_id` (`school_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_email` (`parent_email`),
  ADD KEY `idx_created` (`submitted_at`),
  ADD KEY `idx_enrollment_requests_composite` (`school_id`,`status`,`submitted_at`,`academic_year`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`),
  ADD KEY `subscription_id` (`subscription_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_due_date` (`due_date`),
  ADD KEY `idx_invoice_number` (`invoice_number`),
  ADD KEY `idx_invoices_school_date` (`school_id`,`due_date`),
  ADD KEY `idx_payment_status` (`payment_status`),
  ADD KEY `idx_payment_reference` (`payment_reference`),
  ADD KEY `fk_invoices_payment_gateway` (`payment_gateway_id`),
  ADD KEY `idx_invoices_composite` (`school_id`,`status`,`due_date`,`payment_status`);

--
-- Indexes for table `onboarding_logs`
--
ALTER TABLE `onboarding_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school_id` (`school_id`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `parent_portal_access`
--
ALTER TABLE `parent_portal_access`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `access_token` (`access_token`),
  ADD KEY `idx_school_parent` (`school_id`,`parent_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_expires` (`expires_at`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school_provider` (`school_id`,`provider`),
  ADD KEY `idx_active_default` (`is_active`,`is_default`);

--
-- Indexes for table `payment_tokens`
--
ALTER TABLE `payment_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `idx_school_parent` (`school_id`,`parent_id`);

--
-- Indexes for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_reference` (`transaction_reference`),
  ADD UNIQUE KEY `gateway_transaction_id` (`gateway_transaction_id`),
  ADD KEY `idx_school_status` (`school_id`,`status`),
  ADD KEY `idx_invoice` (`invoice_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_parent` (`parent_id`),
  ADD KEY `idx_created` (`created_at`),
  ADD KEY `fk_transactions_gateway` (`payment_gateway_id`),
  ADD KEY `idx_payment_transactions_composite` (`school_id`,`status`,`created_at`,`payment_method`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_active` (`is_active`),
  ADD KEY `idx_default` (`is_default`);

--
-- Indexes for table `platform_audit_logs`
--
ALTER TABLE `platform_audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platform_broadcasts`
--
ALTER TABLE `platform_broadcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platform_users`
--
ALTER TABLE `platform_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_role` (`role`);

--
-- Indexes for table `scheduled_announcements`
--
ALTER TABLE `scheduled_announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_scheduled` (`scheduled_for`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_slug` (`slug`),
  ADD KEY `idx_plan` (`plan_id`),
  ADD KEY `idx_trial` (`trial_ends_at`),
  ADD KEY `idx_schools_created` (`created_at`),
  ADD KEY `idx_schools_email` (`email`),
  ADD KEY `parent_school_id` (`parent_school_id`),
  ADD KEY `idx_school_search` (`name`,`state`,`city`,`curriculum`,`school_type`),
  ADD KEY `idx_schools_search_composite` (`name`,`city`,`state`,`school_type`,`curriculum`);

--
-- Indexes for table `school_admins`
--
ALTER TABLE `school_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_school_user` (`school_id`,`user_id`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `school_contacts`
--
ALTER TABLE `school_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school_id` (`school_id`),
  ADD KEY `idx_type` (`type`);

--
-- Indexes for table `school_database_credentials`
--
ALTER TABLE `school_database_credentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_school_db` (`school_id`,`database_name`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_database` (`database_name`);

--
-- Indexes for table `school_database_info`
--
ALTER TABLE `school_database_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_school` (`school_id`);

--
-- Indexes for table `school_database_stats`
--
ALTER TABLE `school_database_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_health` (`health_status`);

--
-- Indexes for table `school_facilities`
--
ALTER TABLE `school_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school_id` (`school_id`);

--
-- Indexes for table `school_gallery`
--
ALTER TABLE `school_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school_id` (`school_id`);

--
-- Indexes for table `school_reviews`
--
ALTER TABLE `school_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school_id` (`school_id`),
  ADD KEY `idx_rating` (`rating`),
  ADD KEY `idx_approved` (`is_approved`);

--
-- Indexes for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_to` (`to`),
  ADD KEY `idx_created` (`created_at`);

--
-- Indexes for table `student_suspension_queue`
--
ALTER TABLE `student_suspension_queue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_pending_suspension` (`school_id`,`student_id`,`status`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_scheduled` (`scheduled_for`),
  ADD KEY `idx_school_student` (`school_id`,`student_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_period_end` (`current_period_end`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_number` (`ticket_number`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_priority` (`priority`),
  ADD KEY `idx_support_tickets_composite` (`school_id`,`status`,`priority`,`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_schools_view`
--
ALTER TABLE `active_schools_view`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bulk_email_campaigns`
--
ALTER TABLE `bulk_email_campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cron_execution_history`
--
ALTER TABLE `cron_execution_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cron_logs`
--
ALTER TABLE `cron_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cron_schedules`
--
ALTER TABLE `cron_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `database_backups`
--
ALTER TABLE `database_backups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_bounces`
--
ALTER TABLE `email_bounces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_queue`
--
ALTER TABLE `email_queue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `email_suppression_list`
--
ALTER TABLE `email_suppression_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment_documents`
--
ALTER TABLE `enrollment_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment_fees`
--
ALTER TABLE `enrollment_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment_requests`
--
ALTER TABLE `enrollment_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `onboarding_logs`
--
ALTER TABLE `onboarding_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent_portal_access`
--
ALTER TABLE `parent_portal_access`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_tokens`
--
ALTER TABLE `payment_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `platform_audit_logs`
--
ALTER TABLE `platform_audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `platform_broadcasts`
--
ALTER TABLE `platform_broadcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scheduled_announcements`
--
ALTER TABLE `scheduled_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `school_admins`
--
ALTER TABLE `school_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_contacts`
--
ALTER TABLE `school_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_database_credentials`
--
ALTER TABLE `school_database_credentials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_database_info`
--
ALTER TABLE `school_database_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_database_stats`
--
ALTER TABLE `school_database_stats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_facilities`
--
ALTER TABLE `school_facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_gallery`
--
ALTER TABLE `school_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_reviews`
--
ALTER TABLE `school_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_suspension_queue`
--
ALTER TABLE `student_suspension_queue`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
