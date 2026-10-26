-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2026 at 01:53 PM
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
-- Database: `school_6`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddCampusIdToAllTables` ()   BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE tbl_name VARCHAR(255);
    DECLARE cur CURSOR FOR 
        SELECT table_name 
        FROM information_schema.tables 
        WHERE table_schema = 'school_6' 
          AND table_type = 'BASE TABLE'
        ORDER BY table_name;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    OPEN cur;

    read_loop: LOOP
        FETCH cur INTO tbl_name;
        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Check if campus_id column already exists
        SET @column_exists = NULL;
        SELECT COUNT(*) INTO @column_exists
        FROM information_schema.columns 
        WHERE table_schema = 'school_6' 
          AND table_name = tbl_name 
          AND column_name = 'campus_id';

        -- Drop column if it exists
        IF @column_exists > 0 THEN
            SET @drop_sql = CONCAT('ALTER TABLE `', tbl_name, '` DROP COLUMN `campus_id`');
            PREPARE stmt FROM @drop_sql;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        END IF;

        -- Add column as nullable
        SET @add_sql = CONCAT('ALTER TABLE `', tbl_name, '` ADD COLUMN `campus_id` INT UNSIGNED NULL');
        PREPARE stmt FROM @add_sql;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;

        -- Update to default campus (replace 1 with your actual campus ID)
        SET @update_sql = CONCAT('UPDATE `', tbl_name, '` SET `campus_id` = 1');
        PREPARE stmt FROM @update_sql;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;

        -- Decide whether to make NOT NULL or keep nullable (for log tables)
        -- By default, we make NOT NULL. For optional tables, we'll handle separately below.
        -- We'll use a conditional list for tables that should remain nullable.
        IF tbl_name IN ('login_attempts', 'security_logs', 'subscriptions', 'performance_metrics', 'rate_limits', 'recovery_points', 'storage_usage', 'system_alerts', 'maintenance_logs') THEN
            -- Keep nullable, add index and FK with ON DELETE SET NULL
            SET @modify_sql = CONCAT('ALTER TABLE `', tbl_name, '` MODIFY `campus_id` INT UNSIGNED NULL,
                                      ADD INDEX `idx_campus` (`campus_id`),
                                      ADD CONSTRAINT `fk_', tbl_name, '_campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE');
        ELSE
            -- Make NOT NULL
            SET @modify_sql = CONCAT('ALTER TABLE `', tbl_name, '` MODIFY `campus_id` INT UNSIGNED NOT NULL,
                                      ADD INDEX `idx_campus` (`campus_id`),
                                      ADD CONSTRAINT `fk_', tbl_name, '_campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE');
        END IF;

        PREPARE stmt FROM @modify_sql;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;

    END LOOP;

    CLOSE cur;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `academic_terms`
--

CREATE TABLE `academic_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `campus_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_terms`
--

INSERT INTO `academic_terms` (`id`, `school_id`, `academic_year_id`, `name`, `start_date`, `end_date`, `is_default`, `created_at`, `campus_id`) VALUES
(1, 6, 1, 'first term', '2025-09-08', '2025-11-27', 0, '2026-03-05 21:06:31', 1),
(2, 6, 1, 'second term', '2026-01-05', '2026-04-15', 1, '2026-03-05 21:07:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `status` enum('upcoming','active','completed') DEFAULT 'upcoming',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `campus_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `school_id`, `name`, `start_date`, `end_date`, `is_default`, `status`, `created_at`, `campus_id`) VALUES
(1, 6, '2025-2026', '2025-09-08', '2026-07-24', 1, 'active', '2026-03-03 13:57:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admission_applications`
--

CREATE TABLE `admission_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `application_number` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `applying_for_class_id` int(10) UNSIGNED NOT NULL,
  `previous_school` varchar(255) DEFAULT NULL,
  `previous_class` varchar(100) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_phone` varchar(20) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mother_phone` varchar(20) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_phone` varchar(20) DEFAULT NULL,
  `status` enum('pending','reviewed','accepted','rejected','waitlisted') DEFAULT 'pending',
  `reviewed_by` int(10) UNSIGNED DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_documents`
--

CREATE TABLE `admission_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `application_id` int(10) UNSIGNED NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'If they were a student in the system',
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `graduation_year` year(4) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(500) DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumni_donations`
--

CREATE TABLE `alumni_donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `alumni_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) DEFAULT 'NGN',
  `donation_date` date NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumni_events`
--

CREATE TABLE `alumni_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `event_date` date NOT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `target` enum('all','students','teachers','parents','class','section') DEFAULT 'all',
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `school_id`, `title`, `description`, `target`, `class_id`, `section_id`, `start_date`, `end_date`, `is_published`, `created_by`, `created_at`) VALUES
(1, 6, 'PTA meeting', 'testign', 'all', NULL, NULL, '2026-03-05', '2026-03-06', 0, 1, '2026-03-03 13:58:17'),
(2, 6, 'School prayer', 'Pray against Sapa ', 'all', NULL, NULL, '2026-03-11', '2026-03-12', 1, 1, '2026-03-10 07:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `api_key` varchar(100) NOT NULL,
  `api_secret` varchar(100) DEFAULT NULL,
  `permissions` text DEFAULT NULL COMMENT 'JSON encoded permissions',
  `rate_limit_per_minute` int(10) DEFAULT 60,
  `rate_limit_per_hour` int(10) DEFAULT 1000,
  `rate_limit_per_day` int(10) DEFAULT 10000,
  `allowed_ips` text DEFAULT NULL COMMENT 'JSON array of allowed IPs',
  `allowed_origins` text DEFAULT NULL COMMENT 'JSON array of allowed origins',
  `expires_at` timestamp NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE `api_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `api_key_id` int(10) UNSIGNED DEFAULT NULL,
  `endpoint` varchar(500) NOT NULL,
  `method` varchar(10) NOT NULL,
  `request_body` text DEFAULT NULL,
  `response_body` text DEFAULT NULL,
  `status_code` int(3) DEFAULT NULL,
  `response_time` decimal(10,4) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `is_success` tinyint(1) DEFAULT 0,
  `error_message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_usage`
--

CREATE TABLE `api_usage` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `api_key_id` int(10) UNSIGNED DEFAULT NULL,
  `endpoint` varchar(500) NOT NULL,
  `method` varchar(10) NOT NULL,
  `request_count` int(10) DEFAULT 1,
  `total_response_time` decimal(12,4) DEFAULT 0.0000,
  `failed_count` int(10) DEFAULT 0,
  `period` enum('minute','hour','day','month') DEFAULT 'day',
  `period_start` timestamp NOT NULL,
  `period_end` timestamp NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `assessment_type_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `max_score` decimal(5,2) NOT NULL,
  `date` date NOT NULL,
  `is_published` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_scores`
--

CREATE TABLE `assessment_scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `assessment_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `entered_by` int(10) UNSIGNED NOT NULL,
  `entered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_types`
--

CREATE TABLE `assessment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `weight` decimal(5,2) DEFAULT NULL COMMENT 'Percentage weight towards final grade',
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` enum('present','absent','late','half_day','holiday','sunday') NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `marked_by` int(10) UNSIGNED DEFAULT NULL,
  `session` enum('morning','afternoon','full_day') DEFAULT 'full_day',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `school_id`, `student_id`, `class_id`, `date`, `status`, `remark`, `marked_by`, `session`, `created_at`) VALUES
(1, 6, 3, 2, '2026-03-08', 'present', '', 1, 'full_day', '2026-03-08 17:31:18'),
(2, 6, 2, 1, '2026-03-08', 'late', '', 1, 'full_day', '2026-03-08 17:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `entity_type` varchar(100) DEFAULT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `old_values` text DEFAULT NULL COMMENT 'JSON encoded old values',
  `new_values` text DEFAULT NULL COMMENT 'JSON encoded new values',
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `school_id`, `user_id`, `user_type`, `action`, `entity_type`, `entity_id`, `old_values`, `new_values`, `ip_address`, `user_agent`, `url`, `created_at`) VALUES
(1, 6, 1, 'admin', 'academic_year_created', 'academic_years', 1, NULL, '{\"name\":\"2025-2026\",\"start_date\":\"2025-09-08\",\"end_date\":\"2026-07-24\",\"is_default\":1,\"status\":\"active\"}', '98.97.76.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/settings/general.php', '2026-03-03 13:57:33'),
(2, 6, 1, 'admin', 'announcement_created', 'announcements', 1, NULL, '{\"title\":\"PTA meeting\"}', '98.97.76.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/settings/general.php', '2026-03-03 13:58:17'),
(3, 6, 1, 'admin', 'subject_created', 'subjects', 1, NULL, '{\"name\":\"mathematic\",\"code\":\"maths\"}', '143.105.174.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-04 20:29:35'),
(4, 6, 1, 'admin', 'class_created', 'classes', 1, NULL, '{\"name\":\"grade 10\",\"code\":\"G10\"}', '143.105.174.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-04 20:30:17'),
(5, 6, 1, 'admin', 'section_created', 'sections', 1, NULL, '{\"name\":\"section a\",\"code\":\"a\"}', '143.105.174.0', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-04 20:30:38'),
(6, 6, 1, 'admin', 'create', 'student', 1, NULL, '{\"academic_year_id\":1,\"class_id\":1,\"section_id\":1,\"roll_number\":\"3\",\"admission_date\":\"2026-03-05\",\"first_name\":\"favour\",\"middle_name\":\"nzube\",\"last_name\":\"Zubetech\",\"gender\":\"male\",\"date_of_birth\":\"2020-03-05\",\"student_email\":\"zubetechhub@gmail.com\",\"student_phone\":\"09070525288\",\"guardian_name\":\"hennry uzodima\",\"guardian_email\":\"zubetechhub3@gmail.com\",\"guardian_phone\":\"07042424553\",\"guardian_relation\":\"father\",\"guardian_address\":\"chokocho\\r\\netche\",\"existing_parent_id\":null,\"blood_group\":\"A+\",\"allergies\":\"ull\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"chokocho\",\"permanent_address\":\"etche\",\"previous_school\":\"nobsams\",\"previous_class\":\"ss3\",\"transfer_certificate_no\":\"null\"}', '98.97.77.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-05 12:59:29'),
(7, 6, 1, 'admin', 'create', 'student', 2, NULL, '{\"academic_year_id\":1,\"class_id\":1,\"section_id\":1,\"roll_number\":\"3\",\"admission_date\":\"2026-03-05\",\"first_name\":\"Bibi\",\"middle_name\":\"Steph\",\"last_name\":\"Agundu\",\"gender\":\"female\",\"date_of_birth\":\"2006-10-05\",\"student_email\":\"fs@gmail.com\",\"student_phone\":\"080525288\",\"guardian_name\":\"Fatima\",\"guardian_email\":\"fhj@gmail.con\",\"guardian_phone\":\"0804344545\",\"guardian_relation\":\"mother\",\"guardian_address\":\"Etch\",\"existing_parent_id\":null,\"blood_group\":\"O+\",\"allergies\":\"Dust\",\"medical_conditions\":\"Ulcer\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"Umuchima\",\"permanent_address\":\"Etche\",\"previous_school\":\"Damtoj\",\"previous_class\":\"Ss3\",\"transfer_certificate_no\":\"2943283\"}', '102.90.98.183', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Brave/1 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-05 14:01:27'),
(8, 6, 1, 'admin', 'update', 'student', 1, NULL, '{\"academic_year_id\":1,\"class_id\":1,\"section_id\":1,\"roll_number\":\"3\",\"admission_number\":\"BIT-2025-0001\",\"first_name\":\"favour\",\"middle_name\":\"nzube\",\"last_name\":\"Zubetech\",\"gender\":\"male\",\"date_of_birth\":\"2020-03-05\",\"student_phone\":\"09070525288\",\"student_email\":\"zubetechhub@gmail.com\",\"blood_group\":\"A+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"okafor\",\"doctor_phone\":\"08033480654\",\"current_address\":\"chokocho\",\"permanent_address\":\"etche\",\"previous_school\":\"nobsams\",\"previous_class\":\"ss3\",\"transfer_certificate_no\":\"null\"}', '98.97.77.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-05 16:14:50'),
(9, 6, 1, 'admin', 'class_created', 'classes', 2, NULL, '{\"name\":\"grade 1\",\"code\":\"g1\"}', '98.97.77.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-05 18:33:25'),
(10, 6, 1, 'admin', 'section_created', 'sections', 2, NULL, '{\"name\":\"afternoon\",\"code\":\"noon\"}', '98.97.77.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-05 18:34:35'),
(11, 6, 1, 'admin', 'subject_created', 'subjects', 2, NULL, '{\"name\":\"english\",\"code\":\"eng101\"}', '98.97.77.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-05 18:34:56'),
(12, 6, 1, 'admin', 'create', 'teacher', 3, NULL, '{\"employee_id\":\"TCH-2026-8367\",\"name\":\"brook harry\",\"email\":\"favouruzodinma55@gmail.com\",\"phone\":\"909888766\",\"gender\":\"male\",\"date_of_birth\":\"1991-06-06\",\"fathers_name\":\"okafor\",\"mothers_name\":\"janet\",\"marital_status\":\"Married\",\"contract_type\":\"Permanent\",\"shift\":\"Day Shift\",\"work_location\":\"o site\",\"joining_date\":\"2026-03-06\",\"qualification\":\"bsc\",\"experience_years\":1,\"blood_group\":\"A+\",\"height\":\"5.4\",\"weight\":\"63\",\"bank_name\":\"kuda\",\"bank_account\":\"2032909568\",\"ifsc_code\":\"23423\",\"national_id\":\"345323434\",\"current_address\":\"Sbagha Bagha\",\"permanent_address\":\"Sbagha Bagha\",\"previous_school\":\"nobsams\",\"previous_school_address\":\"testinng\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"null\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[\"1\"],\"assigned_subjects\":[{\"id\":1,\"school_id\":6,\"name\":\"mathematic\",\"code\":\"maths\",\"type\":\"core\",\"description\":\"easy\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-04 21:29:35\"}]}', '98.97.77.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-05 19:03:03'),
(13, 6, 1, 'admin', 'suspend', 'teacher', 3, NULL, '{\"reason\":\"\"}', '98.97.77.67', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', NULL, '2026-03-05 19:58:34'),
(14, 6, 1, 'admin', 'activate', 'teacher', 3, NULL, '{\"status\":\"active\"}', '98.97.77.67', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', NULL, '2026-03-05 19:58:41'),
(15, 6, 1, 'admin', 'suspend', 'teacher', 3, NULL, '{\"reason\":\"\"}', '98.97.77.67', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', NULL, '2026-03-05 20:08:11'),
(16, 6, 1, 'admin', 'activate', 'teacher', 3, NULL, '{\"status\":\"active\"}', '98.97.77.67', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', NULL, '2026-03-05 20:08:17'),
(17, 6, 1, 'admin', 'academic_term_created', 'academic_terms', 1, NULL, '{\"name\":\"first term\",\"academic_year_id\":\"1\"}', '98.97.77.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-05 21:06:31'),
(18, 6, 1, 'admin', 'academic_term_created', 'academic_terms', 2, NULL, '{\"name\":\"second term\",\"academic_year_id\":\"1\"}', '98.97.77.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-05 21:07:23'),
(19, 6, 1, 'admin', 'create', 'timetable', 1, NULL, '{\"academic_year_id\":1,\"academic_term_id\":2,\"class_id\":2,\"section_id\":null,\"day\":\"monday\",\"period_number\":1,\"start_time\":\"09:00\",\"end_time\":\"09:45\",\"subject_id\":2,\"teacher_id\":9,\"room_number\":\"A101\",\"is_break\":0}', '98.97.77.67', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-05 21:08:10'),
(20, 6, 1, 'admin', 'profile_updated', 'users', 1, NULL, '{\"updated_fields\":[\"action\",\"name\",\"email\",\"phone\",\"gender\",\"date_of_birth\",\"blood_group\",\"religion\",\"address\"]}', '129.222.206.213', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/profile.php', '2026-03-05 21:45:30'),
(21, 6, 1, 'admin', 'profile_updated', 'users', 1, NULL, '{\"updated_fields\":[\"action\",\"name\",\"email\",\"phone\",\"gender\",\"date_of_birth\",\"blood_group\",\"religion\",\"address\"]}', '129.222.206.213', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/profile.php', '2026-03-05 21:45:40'),
(22, 6, 1, 'admin', 'profile_updated', 'users', 1, NULL, '{\"updated_fields\":[\"action\",\"name\",\"email\",\"phone\",\"gender\",\"date_of_birth\",\"blood_group\",\"religion\",\"address\"]}', '129.222.206.213', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/profile.php', '2026-03-05 21:49:17'),
(23, 6, 1, 'admin', 'profile_updated', 'users', 1, NULL, '{\"updated_fields\":[\"action\",\"name\",\"email\",\"phone\",\"gender\",\"date_of_birth\",\"blood_group\",\"religion\",\"address\"]}', '129.222.206.213', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/profile.php', '2026-03-05 21:49:24'),
(24, 6, 1, 'admin', 'profile_updated', 'users', 1, NULL, '{\"updated_fields\":[\"action\",\"name\",\"email\",\"phone\",\"gender\",\"date_of_birth\",\"blood_group\",\"religion\",\"address\"]}', '129.222.206.213', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/profile.php', '2026-03-05 21:49:29'),
(25, 6, 1, 'admin', 'profile_updated', 'users', 1, NULL, '{\"updated_fields\":[\"action\",\"name\",\"email\",\"phone\",\"gender\",\"date_of_birth\",\"blood_group\",\"religion\",\"address\"]}', '129.222.206.213', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/profile.php', '2026-03-05 21:57:02'),
(26, 6, 1, 'admin', 'profile_updated', 'users', 1, NULL, '{\"updated_fields\":[\"action\",\"name\",\"email\",\"phone\",\"gender\",\"date_of_birth\",\"blood_group\",\"religion\",\"address\"]}', '129.222.206.213', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/profile.php', '2026-03-05 21:57:39'),
(27, 6, 1, 'admin', 'profile_updated', 'users', 1, NULL, '{\"updated_fields\":[\"action\",\"name\",\"email\",\"phone\",\"gender\",\"date_of_birth\",\"blood_group\",\"religion\",\"address\"]}', '129.222.206.213', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/profile.php', '2026-03-05 21:59:45'),
(28, 6, 1, 'admin', 'create', 'timetable', 2, NULL, '{\"academic_year_id\":1,\"academic_term_id\":2,\"class_id\":2,\"section_id\":null,\"day\":\"monday\",\"period_number\":2,\"start_time\":\"09:45\",\"end_time\":\"10:30\",\"subject_id\":1,\"teacher_id\":9,\"room_number\":\"R202\",\"is_break\":0}', '102.90.98.183', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', NULL, '2026-03-06 01:29:55'),
(29, 6, 1, 'admin', 'create', 'student', 3, NULL, '{\"academic_year_id\":1,\"class_id\":2,\"section_id\":2,\"roll_number\":\"4\",\"admission_date\":\"2026-03-06\",\"first_name\":\"Uzochukwu\",\"middle_name\":\"Kosisochukwu\",\"last_name\":\"Jessica\",\"gender\":\"female\",\"date_of_birth\":\"2007-10-07\",\"student_email\":\"uzochukwukosisochukwu046@gmail.com\",\"student_phone\":\"07041390038\",\"guardian_name\":\"Emezie Ngozi\",\"guardian_email\":\"ngozionyebuchin@gmail.com\",\"guardian_phone\":\"07061052210\",\"guardian_relation\":\"mother\",\"guardian_address\":\"eliozu portharcourt\",\"existing_parent_id\":null,\"blood_group\":\"O+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"eliozu portharcourt\",\"permanent_address\":\"2047 Walt Nuzum Farm Road\",\"previous_school\":\"FGGC Abuloma\",\"previous_class\":\"jss3\",\"transfer_certificate_no\":\"null\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-06 07:52:59'),
(30, 6, 1, 'admin', 'class_created', 'classes', 3, NULL, '{\"name\":\"Primary 3\",\"code\":\"Pri 3\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:00:26'),
(31, 6, 1, 'admin', 'section_created', 'sections', 3, NULL, '{\"name\":\"evening\",\"code\":\"e\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:02:10'),
(32, 6, 1, 'admin', 'subject_created', 'subjects', 3, NULL, '{\"name\":\"Basic Science\",\"code\":\"BSc\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:03:35'),
(33, 6, 1, 'admin', 'subject_created', 'subjects', 4, NULL, '{\"name\":\"Basic Technnology\",\"code\":\"B.tech\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:07:39'),
(34, 6, 1, 'admin', 'subject_created', 'subjects', 5, NULL, '{\"name\":\"Creative and cultural art\",\"code\":\"CCA\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:09:36'),
(35, 6, 1, 'admin', 'subject_created', 'subjects', 6, NULL, '{\"name\":\"Civic Education\",\"code\":\"CEd\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:12:06'),
(36, 6, 1, 'admin', 'subject_created', 'subjects', 7, NULL, '{\"name\":\"French\",\"code\":\"Frn\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:13:22'),
(37, 6, 1, 'admin', 'subject_created', 'subjects', 8, NULL, '{\"name\":\"Igbo\",\"code\":\"IGB\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:14:34'),
(38, 6, 1, 'admin', 'subject_created', 'subjects', 9, NULL, '{\"name\":\"Social Studies\",\"code\":\"SOS\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:17:05'),
(39, 6, 1, 'admin', 'subject_created', 'subjects', 10, NULL, '{\"name\":\"Yoruba\",\"code\":\"YOR\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:18:38'),
(40, 6, 1, 'admin', 'subject_created', 'subjects', 11, NULL, '{\"name\":\"Hausa\",\"code\":\"HSA\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:19:09'),
(41, 6, 1, 'admin', 'subject_created', 'subjects', 12, NULL, '{\"name\":\"Christian Religious Knowledge\",\"code\":\"CRK\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:20:53'),
(42, 6, 1, 'admin', 'subject_created', 'subjects', 13, NULL, '{\"name\":\"History\",\"code\":\"HST\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:21:51'),
(43, 6, 1, 'admin', 'subject_created', 'subjects', 14, NULL, '{\"name\":\"Geography\",\"code\":\"GEO\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:22:15'),
(44, 6, 1, 'admin', 'subject_created', 'subjects', 15, NULL, '{\"name\":\"Chemistry\",\"code\":\"CHEM\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:22:35'),
(45, 6, 1, 'admin', 'subject_created', 'subjects', 16, NULL, '{\"name\":\"Biology \",\"code\":\"BIO\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:22:59'),
(46, 6, 1, 'admin', 'subject_created', 'subjects', 17, NULL, '{\"name\":\"Physics\",\"code\":\"PHY\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:23:31'),
(47, 6, 1, 'admin', 'subject_created', 'subjects', 18, NULL, '{\"name\":\"Economics\",\"code\":\"ECO\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:24:40'),
(48, 6, 1, 'admin', 'subject_created', 'subjects', 19, NULL, '{\"name\":\"Verbal Reasoning\",\"code\":\"VRB\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:26:30'),
(49, 6, 1, 'admin', 'create', 'teacher', 4, NULL, '{\"employee_id\":\"TCH-2026-2653\",\"name\":\"Maxwell Acheampong\",\"email\":\"bitfluxwallet@gmail.com\",\"phone\":\"8119999755\",\"gender\":\"male\",\"date_of_birth\":\"2026-03-19\",\"fathers_name\":\"obinna max\",\"mothers_name\":\"obinna female\",\"marital_status\":\"Unmarried\",\"contract_type\":\"Permanent\",\"shift\":\"Day Shift\",\"work_location\":\"onsite\",\"joining_date\":\"2026-03-06\",\"qualification\":\"bsc\",\"experience_years\":5,\"blood_group\":\"A-\",\"height\":\"5.9\",\"weight\":\"20\",\"bank_name\":\"\",\"bank_account\":\"\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"123 walkers street\",\"permanent_address\":\"123 walkers street\",\"previous_school\":\"futo\",\"previous_school_address\":\"owerri\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"new tacher\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[\"3\"],\"assigned_subjects\":[{\"id\":4,\"school_id\":6,\"name\":\"Basic Technnology\",\"code\":\"B.tech\",\"type\":\"core\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:07:39\"},{\"id\":15,\"school_id\":6,\"name\":\"Chemistry\",\"code\":\"CHEM\",\"type\":\"core\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:22:35\"}]}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-06 08:28:09'),
(50, 6, 1, 'admin', 'subject_created', 'subjects', 20, NULL, '{\"name\":\"Quantitative Reasoning \",\"code\":\"QTR\"}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:28:51'),
(51, 6, 1, 'admin', 'subject_created', 'subjects', 21, NULL, '{\"name\":\"Further Mathematics\",\"code\":\"F.Maths\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:34:22'),
(52, 6, 1, 'admin', 'class_created', 'classes', 4, NULL, '{\"name\":\"Kindergaten\",\"code\":\"KG\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:41:57'),
(53, 6, 1, 'admin', 'class_created', 'classes', 5, NULL, '{\"name\":\"Nursery 1\",\"code\":\"NUR 1\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:45:53'),
(54, 6, 1, 'admin', 'class_created', 'classes', 6, NULL, '{\"name\":\"Nursery 2\",\"code\":\"NUR 2\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:48:10'),
(55, 6, 1, 'admin', 'class_created', 'classes', 7, NULL, '{\"name\":\"Nursery 3\",\"code\":\"NUR 3\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:49:19'),
(56, 6, 1, 'admin', 'class_created', 'classes', 8, NULL, '{\"name\":\"Primary 1\",\"code\":\"PRY 1\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:53:40'),
(57, 6, 1, 'admin', 'class_created', 'classes', 9, NULL, '{\"name\":\"Primary 2\",\"code\":\"PRY 2\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:55:20'),
(58, 6, 1, 'admin', 'class_created', 'classes', 10, NULL, '{\"name\":\"Primary 4\",\"code\":\"PRY 4\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 08:59:16'),
(59, 6, 1, 'admin', 'class_created', 'classes', 11, NULL, '{\"name\":\"Primary 5\",\"code\":\"PRY 5\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 09:00:49'),
(60, 6, 1, 'admin', 'class_created', 'classes', 12, NULL, '{\"name\":\"Junior Secondary School 1\",\"code\":\"JSS1\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 09:02:37'),
(61, 6, 1, 'admin', 'class_created', 'classes', 13, NULL, '{\"name\":\"Junior Secondary School 3\",\"code\":\"JSS3\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 09:04:10'),
(62, 6, 1, 'admin', 'class_created', 'classes', 14, NULL, '{\"name\":\"Senior Secondary School 1\",\"code\":\"SSS1\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 09:11:37'),
(63, 6, 1, 'admin', 'class_created', 'classes', 15, NULL, '{\"name\":\"Senior Secondary School 2\",\"code\":\"SSS2\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 09:12:39'),
(64, 6, 1, 'admin', 'class_created', 'classes', 16, NULL, '{\"name\":\"Senior Secondary School 3\",\"code\":\"SSS3\"}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-06 09:13:33'),
(65, 6, 1, 'admin', 'create', 'guardian', 13, NULL, '{\"guardian_name\":\"Emezie IKe\",\"guardian_type\":\"father\",\"phone\":\"585-415-1576\",\"email\":\"mutexia21@gmail.com\",\"occupation\":\"hunter\",\"address\":\"2047 Walt Nuzum Farm Road\",\"gender\":\"male\",\"instagram\":\"@jsjs\",\"guardian_photo\":null}', '102.90.96.225', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-06 09:16:26'),
(66, 6, 1, 'admin', 'create', 'guardian', 12, NULL, '{\"guardian_name\":\"promise uzodinma\",\"guardian_type\":\"mother\",\"phone\":\"811-999-9755\",\"email\":\"bitfluxwallet@gmail.com\",\"occupation\":\"trader\",\"address\":\"123 walkers street\",\"gender\":\"female\",\"instagram\":\"@promise\",\"guardian_photo\":null,\"student_ids\":[\"3\"],\"relationships\":{\"3\":\"guardian\"},\"can_pickup\":{\"3\":\"1\"},\"emergency_contact\":{\"3\":\"0\"}}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-06 09:46:16'),
(67, 6, 1, 'admin', 'create', 'guardian', 12, NULL, '{\"guardian_name\":\"promise uzodinma\",\"guardian_type\":\"mother\",\"phone\":\"811-999-9755\",\"email\":\"bitfluxwallet@gmail.com\",\"occupation\":\"trader\",\"address\":\"123 walkers street\",\"gender\":\"male\",\"instagram\":\"@promise\",\"guardian_photo\":null,\"student_ids\":[\"2\"],\"relationships\":{\"2\":\"guardian\"},\"can_pickup\":{\"2\":\"1\"},\"emergency_contact\":{\"2\":\"0\"}}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-06 09:57:25'),
(68, 6, 1, 'admin', 'create', 'guardian', 12, NULL, '{\"guardian_name\":\"promise uzodinma\",\"guardian_type\":\"mother\",\"phone\":\"811-999-9755\",\"email\":\"bitfluxwallet@gmail.com\",\"occupation\":\"trader\",\"address\":\"123 walkers street\",\"gender\":\"male\",\"instagram\":\"@promise\",\"guardian_photo\":null,\"student_ids\":[\"2\"],\"relationships\":{\"2\":\"sister\"}}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-06 10:07:15'),
(69, 6, 1, 'admin', 'create', 'guardian', 12, NULL, '{\"guardian_name\":\"promise uzodinma\",\"guardian_type\":\"mother\",\"phone\":\"811-999-9755\",\"email\":\"bitfluxwallet@gmail.com\",\"occupation\":\"trader\",\"address\":\"123 walkers street\",\"gender\":\"male\",\"instagram\":\"@promise\",\"guardian_photo\":null,\"student_ids\":[\"2\"],\"relationships\":{\"2\":\"guardian\"}}', '102.90.96.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-06 11:03:31'),
(70, 6, 1, 'admin', 'update', 'guardian', 13, NULL, '{\"csrf_token\":\"528d48f4fda54a21fe86ca1825ce2eb403760bcca687bd28faf9054b2e377bfb\",\"guardian_type\":\"brother\",\"guardian_name\":\"Emezie IKe\",\"instagram\":\"\",\"phone\":\"585-415-1576\",\"occupation\":\"\",\"address\":\"2047 Walt Nuzum Farm Road\",\"gender\":\"male\",\"email\":\"mutexia21@gmail.com\",\"password\":\"\"}', '98.97.79.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/edit-guardian.php?id=13', '2026-03-06 18:15:42'),
(71, 6, 1, 'admin', 'delete', 'announcement', 1, '{\"title\":\"PTA meeting\"}', NULL, '98.97.79.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/notice-board.php?id=1', '2026-03-06 19:30:29'),
(72, 6, 1, 'admin', 'create', 'events', 1, NULL, '{\"title\":\"pta meeting\",\"type\":\"meeting\",\"start_date\":\"2026-03-12\"}', '98.97.79.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/event.php', '2026-03-06 21:43:54'),
(73, 6, 1, 'admin', 'create', 'events', 2, NULL, '{\"title\":\"pta meeting\",\"type\":\"meeting\",\"start_date\":\"2026-03-12\"}', '98.97.79.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/event.php', '2026-03-06 21:44:02'),
(74, 6, 1, 'admin', 'delete', 'events', 2, '{\"id\":2,\"school_id\":6,\"title\":\"pta meeting\",\"description\":\"a guadian to a student must be present\",\"type\":\"meeting\",\"start_date\":\"2026-03-12\",\"end_date\":\"2026-03-12\",\"start_time\":\"10:30:00\",\"end_time\":\"12:30:00\",\"venue\":\"school hall\",\"is_public\":1,\"created_by\":1,\"created_at\":\"2026-03-06 22:44:02\",\"created_by_name\":\"bitflux wallet\",\"created_by_email\":\"safebit99@gmail.com\",\"status\":\"upcoming\"}', NULL, '98.97.79.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/event.php?id=2', '2026-03-06 21:51:01'),
(75, 6, 1, 'admin', 'delete', 'announcement', 1, '{\"title\":\"PTA meeting\"}', NULL, '102.90.100.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/notice-board.php', '2026-03-07 02:45:00'),
(76, 6, 1, 'admin', 'delete', 'announcement', 1, '{\"title\":\"PTA meeting\"}', NULL, '102.90.100.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/notice-board.php', '2026-03-07 02:45:11'),
(77, 6, 1, 'admin', 'create', 'student', 4, NULL, '{\"academic_year_id\":1,\"class_id\":2,\"section_id\":2,\"roll_number\":\"2\",\"admission_date\":\"2026-03-09\",\"first_name\":\"Allen\",\"middle_name\":\"Firi\",\"last_name\":\"Faith\",\"gender\":\"female\",\"date_of_birth\":\"2006-06-23\",\"student_email\":\"amina2006@gmail.com\",\"student_phone\":\"0907052500\",\"guardian_name\":\"Allen Ateli\",\"guardian_email\":\"aminfather@gmail.com\",\"guardian_phone\":\"07061052211\",\"guardian_relation\":\"father\",\"guardian_address\":\"chokocho\\r\\netche\",\"existing_parent_id\":null,\"blood_group\":\"B+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"etche\",\"permanent_address\":\"igbo etech\",\"previous_school\":\"International Unity School\",\"previous_class\":\"JSS1\",\"transfer_certificate_no\":\"null\"}', '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-09 10:14:58'),
(78, 6, 1, 'admin', 'create', 'student', 5, NULL, '{\"academic_year_id\":1,\"class_id\":2,\"section_id\":2,\"roll_number\":\"1\",\"admission_date\":\"2026-03-09\",\"first_name\":\"obinna\",\"middle_name\":\"emmanuel\",\"last_name\":\"uzodinma\",\"gender\":\"male\",\"date_of_birth\":\"2006-03-09\",\"student_email\":\"emmaobinna@gmail.com\",\"student_phone\":\"08119999775\",\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":\"\",\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":4,\"blood_group\":\"A-\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"chokocho etche rivers state\",\"permanent_address\":\"etche\",\"previous_school\":\"ulakwo primary school\",\"previous_class\":\"primary 5\",\"transfer_certificate_no\":\"2005-3949\"}', '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-09 11:30:05'),
(79, 6, 1, 'admin', 'create', 'events', 3, NULL, '{\"title\":\"Inter-house sports\",\"type\":\"sports\",\"start_date\":\"2026-03-27\"}', '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/event.php', '2026-03-09 11:39:38'),
(80, 6, 1, 'admin', 'create', 'events', 4, NULL, '{\"title\":\"Inter-house sports\",\"type\":\"sports\",\"start_date\":\"2026-03-27\"}', '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/event.php', '2026-03-09 11:39:47'),
(81, 6, 1, 'admin', 'delete', 'events', 4, '{\"id\":4,\"school_id\":6,\"title\":\"Inter-house sports\",\"description\":\"\",\"type\":\"sports\",\"start_date\":\"2026-03-27\",\"end_date\":\"2026-03-27\",\"start_time\":\"08:30:00\",\"end_time\":\"16:00:00\",\"venue\":\"School Field\",\"is_public\":1,\"created_by\":1,\"created_at\":\"2026-03-09 12:39:47\",\"created_by_name\":\"bitflux wallet\",\"created_by_email\":\"safebit99@gmail.com\",\"status\":\"upcoming\"}', NULL, '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/event.php?id=4&school_slug=bitflux-wallet-1771434696', '2026-03-09 11:40:17'),
(82, 6, 1, 'admin', 'create', 'teacher', 5, NULL, '{\"employee_id\":\"TCH-2026-3448\",\"name\":\"Samuel Sharon\",\"email\":\"samuelsharon@gmail.com\",\"phone\":\"08144162281\",\"gender\":\"female\",\"date_of_birth\":\"2002-07-02\",\"fathers_name\":\"Mr. Samuel James\",\"mothers_name\":\"Mrs. Samuel Joan\",\"marital_status\":\"Unmarried\",\"contract_type\":\"Permanent\",\"shift\":\"Day Shift\",\"work_location\":\"onsite\",\"joining_date\":\"2026-03-08\",\"qualification\":\"bsc\",\"experience_years\":3,\"blood_group\":\"B+\",\"height\":\"5&quot;7\",\"weight\":\"57kg\",\"bank_name\":\"\",\"bank_account\":\"1874611392\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"Rumuodumaya, Rivers State.\",\"permanent_address\":\"Rumuodumaya, Rivers State.\",\"previous_school\":\"Girls&#039; Grammar School, Rumueme\",\"previous_school_address\":\"Rumueme, Rivers State\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[\"12\"],\"assigned_subjects\":[{\"id\":12,\"school_id\":6,\"name\":\"Christian Religious Knowledge\",\"code\":\"CRK\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:20:53\"},{\"id\":6,\"school_id\":6,\"name\":\"Civic Education\",\"code\":\"CEd\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:12:06\"}]}', '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-09 11:52:42'),
(83, 6, 1, 'admin', 'section_created', 'sections', 4, NULL, '{\"name\":\"Section A\",\"code\":\"A\"}', '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/general.php', '2026-03-09 11:54:33'),
(84, 6, 1, 'admin', 'create', 'teacher', 6, NULL, '{\"employee_id\":\"TCH-2026-4791\",\"name\":\"Ibim Dokubo Shannel\",\"email\":\"shannelibimdokubo@gmail.com\",\"phone\":\"08177896543\",\"gender\":\"female\",\"date_of_birth\":\"2005-06-10\",\"fathers_name\":\"Mr. Ibim Dokubo John\",\"mothers_name\":\"Mrs. Ibim Dokubo Elizabeth\",\"marital_status\":\"Married\",\"contract_type\":\"Permanent\",\"shift\":\"Day Shift\",\"work_location\":\"onsite\",\"joining_date\":\"2026-03-02\",\"qualification\":\"Bsc\",\"experience_years\":2,\"blood_group\":\"O+\",\"height\":\"5&quot;5\",\"weight\":\"55kg\",\"bank_name\":\"\",\"bank_account\":\"\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"AGIP, Port Harcourt\",\"permanent_address\":\"AGIP, Port Harcourt\",\"previous_school\":\"Staff School, Abuloma\",\"previous_school_address\":\"Abuloma, Rivers State\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[],\"assigned_subjects\":[{\"id\":1,\"school_id\":6,\"name\":\"mathematic\",\"code\":\"maths\",\"type\":\"core\",\"description\":\"easy\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-04 21:29:35\"},{\"id\":20,\"school_id\":6,\"name\":\"Quantitative Reasoning \",\"code\":\"QTR\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:28:51\"}]}', '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-09 12:23:49'),
(85, 6, 1, 'admin', 'create', 'teacher', 7, NULL, '{\"employee_id\":\"TCH-2026-0542\",\"name\":\"Onyebuchi Maurice\",\"email\":\"mauricechukwunenye@gmail.com\",\"phone\":\"07011432678\",\"gender\":\"male\",\"date_of_birth\":\"1999-04-26\",\"fathers_name\":\"Onyebuchi Solomon\",\"mothers_name\":\"Onyebuchi Bridget\",\"marital_status\":\"Married\",\"contract_type\":\"Temporary\",\"shift\":\"Afternoon Shift\",\"work_location\":\"onsite\",\"joining_date\":\"2026-02-20\",\"qualification\":\"Bsc\",\"experience_years\":7,\"blood_group\":\"B-\",\"height\":\"6&quot;0\",\"weight\":\"62kg\",\"bank_name\":\"\",\"bank_account\":\"\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"Rumuomasi, Rivers State\",\"permanent_address\":\"Lekki, Lagos\",\"previous_school\":\"Queens&#039; College\",\"previous_school_address\":\"Yaba, Lagos state\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[],\"assigned_subjects\":[{\"id\":21,\"school_id\":6,\"name\":\"Further Mathematics\",\"code\":\"F.Maths\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:34:22\"},{\"id\":1,\"school_id\":6,\"name\":\"mathematic\",\"code\":\"maths\",\"type\":\"core\",\"description\":\"easy\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-04 21:29:35\"},{\"id\":17,\"school_id\":6,\"name\":\"Physics\",\"code\":\"PHY\",\"type\":\"core\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:23:31\"}]}', '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-09 12:31:48'),
(86, 6, 1, 'admin', 'create', 'teacher', 8, NULL, '{\"employee_id\":\"TCH-2026-8371\",\"name\":\"Nwosu Jude\",\"email\":\"judejudon114@gmail.com\",\"phone\":\"08076593005\",\"gender\":\"male\",\"date_of_birth\":\"2002-08-19\",\"fathers_name\":\"Mr. Nwosu Nnaagu\",\"mothers_name\":\"Mrs. Nwosu Queeneth\",\"marital_status\":\"Married\",\"contract_type\":\"Permanent\",\"shift\":\"Afternoon Shift\",\"work_location\":\"onsite\",\"joining_date\":\"2023-03-13\",\"qualification\":\"Bsc\",\"experience_years\":9,\"blood_group\":\"O-\",\"height\":\"5&quot;7\",\"weight\":\"60kg\",\"bank_name\":\"\",\"bank_account\":\"\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"Amadi Road, Rivers State.\",\"permanent_address\":\"Amadi Road, Rivers State.\",\"previous_school\":\"Bereton Nursery and Primary School, Elekahia, Rivers State\",\"previous_school_address\":\"Elekahia, Rivers State\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[],\"assigned_subjects\":[{\"id\":3,\"school_id\":6,\"name\":\"Basic Science\",\"code\":\"BSc\",\"type\":\"core\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:03:35\"},{\"id\":4,\"school_id\":6,\"name\":\"Basic Technnology\",\"code\":\"B.tech\",\"type\":\"core\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:07:39\"},{\"id\":16,\"school_id\":6,\"name\":\"Biology \",\"code\":\"BIO\",\"type\":\"core\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:22:59\"}]}', '98.97.76.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-09 12:46:31'),
(87, 6, 1, 'admin', 'suspend', 'teacher', 3, NULL, '{\"reason\":\"\"}', '129.222.206.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-09 20:33:04'),
(88, 6, 1, 'admin', 'activate', 'teacher', 3, NULL, '{\"status\":\"active\"}', '129.222.206.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-09 20:33:12'),
(89, 6, 1, 'admin', 'create', 'announcement', 2, NULL, '{\"title\":\"School prayer\"}', '197.210.54.222', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/notice-board.php', '2026-03-10 07:36:12'),
(90, 6, 1, 'admin', 'create', 'timetable', 3, NULL, '{\"academic_year_id\":1,\"academic_term_id\":2,\"class_id\":12,\"section_id\":null,\"day\":\"tuesday\",\"period_number\":3,\"start_time\":\"09:00\",\"end_time\":\"09:45\",\"subject_id\":1,\"teacher_id\":19,\"room_number\":\"A1\",\"is_break\":0}', '102.90.99.97', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', NULL, '2026-03-10 12:32:05'),
(91, 6, 1, 'admin', 'create', 'timetable', 4, NULL, '{\"academic_year_id\":1,\"academic_term_id\":2,\"class_id\":2,\"section_id\":null,\"day\":\"monday\",\"period_number\":3,\"start_time\":\"10:00\",\"end_time\":\"10:45\",\"subject_id\":5,\"teacher_id\":19,\"room_number\":\"D101\",\"is_break\":0}', '102.90.81.13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-10 12:36:01'),
(92, 6, 1, 'admin', 'create', 'student', 14, NULL, '{\"academic_year_id\":1,\"class_id\":13,\"section_id\":null,\"roll_number\":\"1\",\"admission_date\":\"2026-03-11\",\"first_name\":\"prosper\",\"middle_name\":\"eche\",\"last_name\":\"checz\",\"gender\":\"male\",\"date_of_birth\":\"1998-09-02\",\"student_email\":\"prosper.checz@student.bitflux-wallet-1771434696\",\"student_phone\":\"\",\"guardian_name\":\"james checz\",\"guardian_email\":\"jameschecz@gmail.com\",\"guardian_phone\":\"0908888288\",\"guardian_relation\":\"father\",\"guardian_address\":\"umuahia town , gae junction\",\"existing_parent_id\":null,\"blood_group\":\"O+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"etche\",\"permanent_address\":\"chokocho\\r\\netche\",\"previous_school\":\"Wisdom Gate\",\"previous_class\":\"jss2\",\"transfer_certificate_no\":\"2098-2982\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-11 07:12:33'),
(93, 6, 1, 'admin', 'create', 'teacher', 9, NULL, '{\"employee_id\":\"TCH-2026-8372\",\"name\":\"Solomon amaechi\",\"email\":\"solomon@gmail.com\",\"phone\":\"08119999755\",\"gender\":\"male\",\"date_of_birth\":\"1986-03-12\",\"fathers_name\":\"Amadi johnson\",\"mothers_name\":\"Nkechi amadi\",\"marital_status\":\"Unmarried\",\"contract_type\":\"Permanent\",\"shift\":\"Day Shift\",\"work_location\":\"On shite\",\"joining_date\":\"2026-03-12\",\"qualification\":\"O level\",\"experience_years\":1,\"blood_group\":\"AB+\",\"height\":\"6\",\"weight\":\"56kg\",\"bank_name\":\"\",\"bank_account\":\"\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"\",\"permanent_address\":\"\",\"previous_school\":\"\",\"previous_school_address\":\"\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[\"15\"],\"assigned_subjects\":[{\"id\":10,\"school_id\":6,\"name\":\"Yoruba\",\"code\":\"YOR\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:18:38\"}]}', '102.90.79.148', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', NULL, '2026-03-11 18:09:55'),
(94, 6, 1, 'admin', 'create', 'guardian', 52, NULL, '{\"guardian_name\":\"Uzochukwu Uzomaka Rachael\",\"guardian_type\":\"mother\",\"phone\":\"707-308-9496\",\"email\":\"uzoamakarach678@mail.com\",\"occupation\":\"Tailor\",\"address\":\"Igwuruta, Rivers State\",\"gender\":\"female\",\"instagram\":\"null\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 09:19:07'),
(95, 6, 1, 'admin', 'create', 'guardian', 53, NULL, '{\"guardian_name\":\"Unagbu Udochukwu Simon\",\"guardian_type\":\"father\",\"phone\":\"707-571-2549\",\"email\":\"unagbusimon098@gmail.com\",\"occupation\":\"Engineer\",\"address\":\"Okomoko, Rivers State\",\"gender\":\"male\",\"instagram\":\"\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 09:23:53'),
(96, 6, 1, 'admin', 'create', 'guardian', 54, NULL, '{\"guardian_name\":\"Okoye Ifunnanya Jennifer\",\"guardian_type\":\"mother\",\"phone\":\"706-105-2210\",\"email\":\"ifunnanyajenn09@gmail.com\",\"occupation\":\"Accountant\",\"address\":\"Igbo-Etche, Rivers State\",\"gender\":\"female\",\"instagram\":\"\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 09:27:54');
INSERT INTO `audit_logs` (`id`, `school_id`, `user_id`, `user_type`, `action`, `entity_type`, `entity_id`, `old_values`, `new_values`, `ip_address`, `user_agent`, `url`, `created_at`) VALUES
(97, 6, 1, 'admin', 'create', 'guardian', 55, NULL, '{\"guardian_name\":\"Adeyemi Kehinde Joshua\",\"guardian_type\":\"father\",\"phone\":\"814-416-2281\",\"email\":\"adeyemijoshua@gmail.com\",\"occupation\":\"Teacher\",\"address\":\"Umuechem, Rivers State\",\"gender\":\"male\",\"instagram\":\"\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 09:31:23'),
(98, 6, 1, 'admin', 'create', 'guardian', 56, NULL, '{\"guardian_name\":\"Adetifa Ayomide Shedrach\",\"guardian_type\":\"father\",\"phone\":\"700-896-9436\",\"email\":\"sheddytifa1972@gmail.com\",\"occupation\":\"CEO\",\"address\":\"Okomoko, Rivers State\",\"gender\":\"male\",\"instagram\":\"Sheddy_tifa\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 09:36:58'),
(99, 6, 1, 'admin', 'create', 'guardian', 57, NULL, '{\"guardian_name\":\"Ovieva Oghenerukevwe Simona\",\"guardian_type\":\"mother\",\"phone\":\"814-415-7784\",\"email\":\"oghenerukevwemona@gmail.com\",\"occupation\":\"Business Woman\",\"address\":\"Umuechem, Rivers State\",\"gender\":\"female\",\"instagram\":\"\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 09:42:23'),
(100, 6, 1, 'admin', 'create', 'guardian', 58, NULL, '{\"guardian_name\":\"Pere Tokoni Joy\",\"guardian_type\":\"grandmother\",\"phone\":\"911-846-0472\",\"email\":\"tokonipere001@gmail.com\",\"occupation\":\"\",\"address\":\"Igbo-Etche, Rivers State\",\"gender\":\"female\",\"instagram\":\"\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 09:47:16'),
(101, 6, 1, 'admin', 'create', 'section', 5, NULL, '{\"name\":\"Section A\",\"code\":\"A\",\"class_id\":\"4\"}', '98.97.77.110', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/section-list.php?class_id=4', '2026-03-12 09:47:57'),
(102, 6, 1, 'admin', 'create', 'guardian', 59, NULL, '{\"guardian_name\":\"Bagshaw Boma Hephzibah\",\"guardian_type\":\"mother\",\"phone\":\"907-536-3889\",\"email\":\"bomahephzibah@gmail.com\",\"occupation\":\"Nurse\",\"address\":\"Igwuruta, Rivers State\",\"gender\":\"female\",\"instagram\":\"\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 09:53:57'),
(103, 6, 1, 'admin', 'create', 'section', 6, NULL, '{\"name\":\"section b\",\"code\":\"SEc B\",\"class_id\":\"12\"}', '98.97.77.110', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/section-list.php?class_id=12', '2026-03-12 09:57:10'),
(104, 6, 1, 'admin', 'create', 'guardian', 60, NULL, '{\"guardian_name\":\"Ogbuogu Chukwuma Benson\",\"guardian_type\":\"father\",\"phone\":\"816-744-9957\",\"email\":\"bennchukss111@gmail.com\",\"occupation\":\"Progammer\",\"address\":\"Umuechem, Rivers State\",\"gender\":\"male\",\"instagram\":\"Benn Chuks\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 09:58:00'),
(105, 6, 1, 'admin', 'create', 'guardian', 61, NULL, '{\"guardian_name\":\"Sylvester Chioma Monica\",\"guardian_type\":\"sister\",\"phone\":\"809-655-4738\",\"email\":\"monicachioma002@gmail.com\",\"occupation\":\"Student\",\"address\":\"Chokocho, Rivers State\",\"gender\":\"female\",\"instagram\":\"Mon_nique\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 10:04:57'),
(106, 6, 1, 'admin', 'create', 'guardian', 62, NULL, '{\"guardian_name\":\"Okere Chiamaka Juliet\",\"guardian_type\":\"mother\",\"phone\":\"806-277-2775\",\"email\":\"okerejuliet90@gmail.com\",\"occupation\":\"Farmer\",\"address\":\"Chokocho, Rivers State\",\"gender\":\"female\",\"instagram\":\"\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 10:14:39'),
(107, 6, 1, 'admin', 'create', 'guardian', 63, NULL, '{\"guardian_name\":\"Amadi Otonsiki Benita\",\"guardian_type\":\"mother\",\"phone\":\"708-966-5434\",\"email\":\"otonsikibenita@gmail.com\",\"occupation\":\"Teacher\",\"address\":\"Umuechem, Rivers State\",\"gender\":\"female\",\"instagram\":\"\",\"guardian_photo\":null,\"student_ids\":[],\"relationships\":[]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-guardian.php', '2026-03-12 10:19:19'),
(108, 6, 1, 'admin', 'create', 'student', 21, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":null,\"roll_number\":\"1\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Uzochukwu\",\"middle_name\":\"Chiemela\",\"last_name\":\"Victory\",\"gender\":\"female\",\"date_of_birth\":\"2023-11-02\",\"student_email\":\"zubuetechhub@gmail.com\",\"student_phone\":\"09099926700\",\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":\"\",\"guardian_relation\":\"\",\"guardian_address\":\"\",\"existing_parent_id\":52,\"blood_group\":\"\",\"allergies\":\"null\",\"medical_conditions\":\"Asthma\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"Igwuruta, Rivers State\",\"permanent_address\":\"Igwuruta, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 10:28:06'),
(109, 6, 1, 'admin', 'assign_subjects', 'class', 4, NULL, '{\"subjects\":[\"7\",\"21\",\"13\",\"17\",\"19\"]}', '98.97.77.110', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/assign-subjects.php?class_id=4', '2026-03-12 10:30:22'),
(110, 6, 1, 'admin', 'create', 'student', 22, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"1\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Unagbu\",\"middle_name\":\"Chioma\",\"last_name\":\"Rita\",\"gender\":\"female\",\"date_of_birth\":\"2023-07-09\",\"student_email\":\"unagbusimon018@gmail.com\",\"student_phone\":\"08172689365\",\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":\"\",\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":53,\"blood_group\":\"O-\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"Okomoko, Rivers State\",\"permanent_address\":\"Okomoko, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 10:33:48'),
(111, 6, 1, 'admin', 'assign_subjects', 'class', 4, NULL, '{\"subjects\":[\"3\",\"4\",\"16\",\"15\",\"12\",\"6\",\"5\",\"18\",\"2\",\"7\",\"21\",\"14\"]}', '98.97.77.110', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/assign-subjects.php?class_id=4', '2026-03-12 10:35:50'),
(112, 6, 1, 'admin', 'assign_subjects', 'class', 12, NULL, '{\"subjects\":[\"3\",\"4\",\"16\",\"15\",\"12\",\"6\",\"5\",\"18\",\"2\",\"7\",\"21\",\"14\",\"11\",\"13\",\"8\",\"1\",\"17\",\"20\",\"9\",\"19\",\"10\"]}', '98.97.77.110', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/assign-subjects.php?class_id=12', '2026-03-12 10:36:43'),
(113, 6, 1, 'admin', 'assign_subjects', 'class', 12, NULL, '{\"subjects\":[\"16\",\"15\",\"12\",\"6\",\"5\",\"18\",\"2\",\"7\",\"21\",\"14\",\"11\",\"13\",\"8\",\"1\",\"17\",\"9\",\"10\"]}', '98.97.77.110', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '/tenant/bitflux-wallet-1771434696/admin/assign-subjects.php?class_id=12', '2026-03-12 10:37:01'),
(114, 6, 1, 'admin', 'create', 'student', 23, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":null,\"roll_number\":\"1\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Okoye\",\"middle_name\":\"Nwabuogo\",\"last_name\":\"Maryann\",\"gender\":\"female\",\"date_of_birth\":\"2023-04-08\",\"student_email\":\"okoye.maryann@student.bitflux-wallet-1771434696.1773311892\",\"student_phone\":\"08144162280\",\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":\"\",\"guardian_relation\":\"\",\"guardian_address\":\"\",\"existing_parent_id\":54,\"blood_group\":\"\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"Igbo-Etche, Rivers State\",\"permanent_address\":\"Igbo-Etche, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 10:38:13'),
(115, 6, 1, 'admin', 'update', 'student', 23, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"1\",\"admission_number\":\"BIT-2025-0009\",\"first_name\":\"Okoye\",\"middle_name\":\"Nwabuogo\",\"last_name\":\"Maryann\",\"gender\":\"female\",\"date_of_birth\":\"2023-04-08\",\"student_phone\":\"08144162280\",\"student_email\":\"okoye.maryann@student.bitflux-wallet-1771434696.1773311892\",\"blood_group\":\"\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"Igbo-Etche, Rivers State\",\"permanent_address\":\"Igbo-Etche, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-12 10:39:00'),
(116, 6, 1, 'admin', 'update', 'student', 21, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"1\",\"admission_number\":\"BIT-2025-0007\",\"first_name\":\"Uzochukwu\",\"middle_name\":\"Chiemela\",\"last_name\":\"Victory\",\"gender\":\"female\",\"date_of_birth\":\"2023-11-02\",\"student_phone\":\"09099926700\",\"student_email\":\"zubuetechhub@gmail.com\",\"blood_group\":\"\",\"allergies\":\"null\",\"medical_conditions\":\"Asthma\",\"doctor_name\":\"\",\"doctor_phone\":\"\",\"current_address\":\"Igwuruta, Rivers State\",\"permanent_address\":\"Igwuruta, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-12 10:39:27'),
(117, 6, 1, 'admin', 'create', 'student', 24, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"1\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Adeyemi\",\"middle_name\":\"Toluwani\",\"last_name\":\"Hephzibah\",\"gender\":\"female\",\"date_of_birth\":\"2023-08-19\",\"student_email\":\"adeyemi.hephzibah@student.bitflux-wallet-1771434696\",\"student_phone\":null,\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":null,\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":55,\"blood_group\":\"B+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Umuechem, Rivers State\",\"permanent_address\":\"Umuechem, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 10:43:02'),
(118, 6, 1, 'admin', 'assign_subjects', 'class', 2, NULL, '{\"subjects\":[\"4\",\"12\",\"6\",\"5\",\"2\",\"7\",\"21\",\"11\",\"13\",\"8\",\"1\",\"20\",\"9\",\"19\",\"10\"]}', '98.97.77.110', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/assign-subjects.php?class_id=2', '2026-03-12 10:50:18'),
(119, 6, 1, 'admin', 'create', 'student', 25, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"2\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Adetifa\",\"middle_name\":\"Mayorkun\",\"last_name\":\"Israel\",\"gender\":\"male\",\"date_of_birth\":\"2023-10-01\",\"student_email\":\"adetifa.israel@student.bitflux-wallet-1771434696\",\"student_phone\":null,\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":null,\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":56,\"blood_group\":\"B-\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Okomoko, Rivers State\",\"permanent_address\":\"Okomoko, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 10:50:43'),
(120, 6, 1, 'admin', 'create', 'student', 26, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"2\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Ovieva\",\"middle_name\":\"Oghenetega\",\"last_name\":\"Favour\",\"gender\":\"male\",\"date_of_birth\":\"2023-10-04\",\"student_email\":\"ovieva.favour@student.bitflux-wallet-1771434696\",\"student_phone\":null,\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":null,\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":57,\"blood_group\":\"O-\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Umuechem, Rivers State\",\"permanent_address\":\"Umuechem, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 10:57:28'),
(121, 6, 1, 'admin', 'create', 'student', 27, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"2\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Tamuno\",\"middle_name\":\"Biebele\",\"last_name\":\"Rejoice\",\"gender\":\"female\",\"date_of_birth\":\"2023-02-07\",\"student_email\":\"tamuno.rejoice@student.bitflux-wallet-1771434696\",\"student_phone\":null,\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":null,\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":58,\"blood_group\":\"O-\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Igbo-Etche, Rivers State\",\"permanent_address\":\"Igbo-Etche, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 11:00:17'),
(122, 6, 1, 'admin', 'create', 'student', 28, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"2\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Bagshaw\",\"middle_name\":\"Biobele\",\"last_name\":\"Joy\",\"gender\":\"female\",\"date_of_birth\":\"2023-05-12\",\"student_email\":\"bagshaw.joy@student.bitflux-wallet-1771434696\",\"student_phone\":null,\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":null,\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":59,\"blood_group\":\"B-\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Igwuruta, Rivers State\",\"permanent_address\":\"Igwuruta, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 11:05:59'),
(123, 6, 1, 'admin', 'create', 'student', 29, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"3\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Ogbuogu\",\"middle_name\":\"Chibuenyim\",\"last_name\":\"Christopher\",\"gender\":\"male\",\"date_of_birth\":\"2023-04-06\",\"student_email\":\"ogbuogu.christopher@student.bitflux-wallet-1771434696\",\"student_phone\":null,\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":null,\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":60,\"blood_group\":\"O-\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Umuechem, Rivers State\",\"permanent_address\":\"Umuechem, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 11:08:19'),
(124, 6, 1, 'admin', 'create', 'student', 30, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"3\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Sylvester\",\"middle_name\":\"Onyedikachi\",\"last_name\":\"Favour\",\"gender\":\"\",\"date_of_birth\":\"2023-12-06\",\"student_email\":\"sylvester.favour@student.bitflux-wallet-1771434696\",\"student_phone\":null,\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":null,\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":61,\"blood_group\":\"O+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Chokocho, Rivers State\",\"permanent_address\":\"Chokocho, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 11:11:28'),
(125, 6, 1, 'admin', 'create', 'student', 31, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"3\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Okere\",\"middle_name\":\"Iheanyi\",\"last_name\":\"Francis\",\"gender\":\"male\",\"date_of_birth\":\"2023-02-12\",\"student_email\":\"okere.francis@student.bitflux-wallet-1771434696\",\"student_phone\":null,\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":null,\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":62,\"blood_group\":\"AB+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Chokocho, Rivers State\",\"permanent_address\":\"Chokocho, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 11:13:52'),
(126, 6, 1, 'admin', 'create', 'student', 32, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"3\",\"admission_date\":\"2025-09-11\",\"first_name\":\"Amadi\",\"middle_name\":\"Kelechi\",\"last_name\":\"ThankGod\",\"gender\":\"male\",\"date_of_birth\":\"2023-03-12\",\"student_email\":\"amadi.thankgod@student.bitflux-wallet-1771434696\",\"student_phone\":null,\"guardian_name\":\"\",\"guardian_email\":\"\",\"guardian_phone\":null,\"guardian_relation\":null,\"guardian_address\":\"\",\"existing_parent_id\":63,\"blood_group\":\"AB+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Umuchem, Rivers State\",\"permanent_address\":\"Umuchem, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-12 11:21:26'),
(127, 6, 1, 'admin', 'update', 'student', 30, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"3\",\"admission_number\":\"BIT-2025-0016\",\"first_name\":\"Sylvester\",\"middle_name\":\"Onyedikachi\",\"last_name\":\"Favour\",\"gender\":\"male\",\"date_of_birth\":\"2023-12-06\",\"student_phone\":null,\"student_email\":\"sylvester.favour@student.bitflux-wallet-1771434696\",\"blood_group\":\"O+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Chokocho, Rivers State\",\"permanent_address\":\"Chokocho, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\",\"password\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/edit-student.php?id=30', '2026-03-12 11:58:30'),
(128, 6, 1, 'admin', 'update', 'student', 32, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"3\",\"admission_number\":\"BIT-2025-0018\",\"first_name\":\"Amadi\",\"middle_name\":\"Kelechi\",\"last_name\":\"ThankGod\",\"gender\":\"female\",\"date_of_birth\":\"2023-03-12\",\"student_phone\":null,\"student_email\":\"amadi.thankgod@student.bitflux-wallet-1771434696\",\"blood_group\":\"AB+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Umuchem, Rivers State\",\"permanent_address\":\"Umuchem, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\",\"password\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/edit-student.php?id=32', '2026-03-12 12:06:21'),
(129, 6, 1, 'admin', 'update', 'student', 32, NULL, '{\"academic_year_id\":1,\"class_id\":4,\"section_id\":5,\"roll_number\":\"3\",\"admission_number\":\"BIT-2025-0018\",\"first_name\":\"Amadi\",\"middle_name\":\"Kelechi\",\"last_name\":\"ThankGod\",\"gender\":\"male\",\"date_of_birth\":\"2023-03-12\",\"student_phone\":null,\"student_email\":\"amadi.thankgod@student.bitflux-wallet-1771434696\",\"blood_group\":\"AB+\",\"allergies\":\"null\",\"medical_conditions\":\"null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Umuchem, Rivers State\",\"permanent_address\":\"Umuchem, Rivers State\",\"previous_school\":\"\",\"previous_class\":\"\",\"transfer_certificate_no\":\"\",\"password\":\"\"}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/edit-student.php?id=32', '2026-03-12 12:06:46'),
(130, 6, 1, 'admin', 'create', 'teacher', 10, NULL, '{\"employee_id\":\"TCH-2026-8373\",\"name\":\"Uzodinma Udochukwu Timothy\",\"email\":\"zubetechub@gmail.com\",\"phone\":\"09070520000\",\"gender\":\"male\",\"date_of_birth\":\"2004-09-02\",\"fathers_name\":\"Uzodinma Nzubechukwu Henry\",\"mothers_name\":\"Uzodinma Amarachi Promise\",\"marital_status\":\"Unmarried\",\"contract_type\":\"Permanent\",\"shift\":\"Day Shift\",\"work_location\":\"onsite\",\"joining_date\":\"2019-04-12\",\"qualification\":\"B.Sc\",\"experience_years\":7,\"blood_group\":\"AB+\",\"height\":\"5&quot;8\",\"weight\":\"60kg\",\"bank_name\":\"\",\"bank_account\":\"\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"chokocho\",\"permanent_address\":\"etche\",\"previous_school\":\"\",\"previous_school_address\":\"chokocho, etche\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[],\"assigned_subjects\":[{\"id\":1,\"school_id\":6,\"name\":\"mathematic\",\"code\":\"maths\",\"type\":\"core\",\"description\":\"easy\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-04 21:29:35\"},{\"id\":20,\"school_id\":6,\"name\":\"Quantitative Reasoning \",\"code\":\"QTR\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:28:51\"}]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-12 12:45:51'),
(131, 6, 1, 'admin', 'create', 'teacher', 11, NULL, '{\"employee_id\":\"TCH-2026-8374\",\"name\":\"Okpobiri Ijeoma Felicia\",\"email\":\"feliciaonyebuchi@gmail.com\",\"phone\":\"08057646999\",\"gender\":\"female\",\"date_of_birth\":\"1971-06-11\",\"fathers_name\":\"Onyebuchi Emezie Solomon\",\"mothers_name\":\"Onyebuchi Bridget\",\"marital_status\":\"Married\",\"contract_type\":\"Permanent\",\"shift\":\"Day Shift\",\"work_location\":\"onsite\",\"joining_date\":\"2020-08-19\",\"qualification\":\"B.Ed\",\"experience_years\":6,\"blood_group\":\"B+\",\"height\":\"5&quot;6\",\"weight\":\"60kg\",\"bank_name\":\"\",\"bank_account\":\"\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"chokocho\",\"permanent_address\":\"etche\",\"previous_school\":\"\",\"previous_school_address\":\"chokocho, etche\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[],\"assigned_subjects\":[{\"id\":2,\"school_id\":6,\"name\":\"english\",\"code\":\"eng101\",\"type\":\"core\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-05 19:34:56\"},{\"id\":9,\"school_id\":6,\"name\":\"Social Studies\",\"code\":\"SOS\",\"type\":\"core\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:17:05\"},{\"id\":19,\"school_id\":6,\"name\":\"Verbal Reasoning\",\"code\":\"VRB\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:26:30\"}]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-12 12:55:41'),
(132, 6, 1, 'admin', 'create', 'teacher', 12, NULL, '{\"employee_id\":\"TCH-2026-8375\",\"name\":\"Onyeuchi Nkechi Katherine\",\"email\":\"katrell009@gmail.com\",\"phone\":\"08097667541\",\"gender\":\"female\",\"date_of_birth\":\"1983-04-09\",\"fathers_name\":\"Onyebuchi Obinna Martin\",\"mothers_name\":\"Onyebuchi Chinonyelum Cecilia\",\"marital_status\":\"Unmarried\",\"contract_type\":\"Permanent\",\"shift\":\"Day Shift\",\"work_location\":\"onsite\",\"joining_date\":\"2020-07-10\",\"qualification\":\"B.Ed\",\"experience_years\":8,\"blood_group\":\"O-\",\"height\":\"5&quot;5\",\"weight\":\"55kg\",\"bank_name\":\"\",\"bank_account\":\"\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"chokocho\",\"permanent_address\":\"etche\",\"previous_school\":\"International Unity School\",\"previous_school_address\":\"chokocho, etche\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[],\"assigned_subjects\":[{\"id\":12,\"school_id\":6,\"name\":\"Christian Religious Knowledge\",\"code\":\"CRK\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:20:53\"},{\"id\":6,\"school_id\":6,\"name\":\"Civic Education\",\"code\":\"CEd\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:12:06\"},{\"id\":18,\"school_id\":6,\"name\":\"Economics\",\"code\":\"ECO\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:24:40\"}]}', '98.97.77.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', NULL, '2026-03-12 13:11:43'),
(133, 6, 1, 'admin', 'create', 'student', 33, NULL, '{\"academic_year_id\":1,\"class_id\":2,\"section_id\":2,\"roll_number\":\"5\",\"admission_date\":\"2026-03-14\",\"first_name\":\"David\",\"middle_name\":\"Chi\",\"last_name\":\"Aniago\",\"gender\":\"male\",\"date_of_birth\":\"2020-03-14\",\"student_email\":\"daveaniago91@gmail.com\",\"student_phone\":null,\"guardian_name\":\"Beatrice\",\"guardian_email\":\"davidaniag78@gmail.com\",\"guardian_phone\":\"023\",\"guardian_relation\":\"guardian\",\"guardian_address\":\"Gu\",\"existing_parent_id\":null,\"blood_group\":\"O-\",\"allergies\":\"Null\",\"medical_conditions\":\"Null\",\"doctor_name\":\"\",\"doctor_phone\":null,\"current_address\":\"Bom\",\"permanent_address\":\"Bag\",\"previous_school\":\"Gh\",\"previous_class\":\"R\",\"transfer_certificate_no\":\"34\"}', '102.90.116.109', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/add-new-student.php', '2026-03-14 04:29:07'),
(134, 6, 1, 'admin', 'assign_subjects', 'class', 4, NULL, '{\"subjects\":[\"3\",\"4\",\"16\",\"15\",\"12\",\"6\",\"5\",\"18\",\"2\",\"7\",\"21\",\"14\",\"11\",\"1\",\"9\"]}', '102.90.116.184', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '/tenant/bitflux-wallet-1771434696/admin/assign-subjects.php?class_id=4', '2026-03-14 16:37:15'),
(135, 6, 1, 'admin', 'create', 'teacher', 13, NULL, '{\"employee_id\":\"TCH-2026-8376\",\"name\":\"Adebayo Temilola\",\"email\":\"ademilola@gmail.com\",\"phone\":\"09087763243\",\"gender\":\"female\",\"date_of_birth\":\"1999-10-07\",\"fathers_name\":\"Adebayo Joshua\",\"mothers_name\":\"Adebayo temitope\",\"marital_status\":\"Unmarried\",\"contract_type\":\"Permanent\",\"shift\":\"Day Shift\",\"work_location\":\"onsite\",\"joining_date\":\"2025-06-02\",\"qualification\":\"\",\"experience_years\":null,\"blood_group\":\"A-\",\"height\":\"5&quot;5\",\"weight\":\"57kg\",\"bank_name\":\"Access Bank\",\"bank_account\":\"1877099835\",\"ifsc_code\":\"\",\"national_id\":\"\",\"current_address\":\"123 walkers street\",\"permanent_address\":\"123 walkers street\",\"previous_school\":\"Null\",\"previous_school_address\":\"Null\",\"facebook_link\":\"\",\"linkedin_link\":\"\",\"instagram_link\":\"\",\"youtube_link\":\"\",\"details\":\"\",\"password\":\"\",\"profile_photo\":null,\"assigned_classes\":[],\"assigned_subjects\":[{\"id\":12,\"school_id\":6,\"name\":\"Christian Religious Knowledge\",\"code\":\"CRK\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:20:53\"},{\"id\":6,\"school_id\":6,\"name\":\"Civic Education\",\"code\":\"CEd\",\"type\":\"elective\",\"description\":\"\",\"credit_hours\":\"1.0\",\"is_active\":1,\"created_at\":\"2026-03-06 09:12:06\"}]}', '197.210.55.86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', NULL, '2026-03-29 08:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `backup_history`
--

CREATE TABLE `backup_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `backup_type` enum('full','incremental','differential','schema_only') DEFAULT 'full',
  `storage_type` enum('local','s3','ftp','google_drive') DEFAULT 'local',
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `database_size` bigint(20) DEFAULT NULL,
  `table_count` int(10) DEFAULT NULL,
  `status` enum('pending','in_progress','completed','failed','cancelled') DEFAULT 'pending',
  `error_message` text DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `retention_days` int(10) DEFAULT 30,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_history`
--

CREATE TABLE `billing_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `subscription_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax_amount` decimal(10,2) DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) DEFAULT 'NGN',
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` enum('pending','paid','failed','refunded') DEFAULT 'pending',
  `payment_date` timestamp NULL DEFAULT NULL,
  `due_date` date NOT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_gateway` varchar(50) DEFAULT NULL,
  `gateway_response` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campuses`
--

CREATE TABLE `campuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL COMMENT 'For geofencing',
  `longitude` decimal(11,8) DEFAULT NULL COMMENT 'For geofencing',
  `radius` int(10) UNSIGNED DEFAULT NULL COMMENT 'Allowed radius in meters',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campuses`
--

INSERT INTO `campuses` (`id`, `school_id`, `name`, `code`, `address`, `city`, `state`, `country`, `phone`, `email`, `latitude`, `longitude`, `radius`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 6, 'Main Campus', 'MAIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-03-16 07:23:11', '2026-03-16 07:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_attempts`
--

CREATE TABLE `cbt_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_time` timestamp NULL DEFAULT NULL,
  `status` enum('in_progress','completed','scored','expired') DEFAULT 'in_progress',
  `total_score` decimal(5,2) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL,
  `graded_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'For essay questions graded manually',
  `graded_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_options`
--

CREATE TABLE `cbt_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `option_text` text NOT NULL,
  `is_correct` tinyint(1) DEFAULT 0,
  `order` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_questions`
--

CREATE TABLE `cbt_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `question_text` text NOT NULL,
  `question_type` enum('multiple_choice','true_false','essay') NOT NULL,
  `marks` decimal(5,2) NOT NULL,
  `difficulty_level` enum('easy','medium','hard') DEFAULT 'medium',
  `attachment` varchar(500) DEFAULT NULL COMMENT 'Image/audio/video path',
  `order` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_responses`
--

CREATE TABLE `cbt_responses` (
  `id` int(10) UNSIGNED NOT NULL,
  `attempt_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `selected_option_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'For MCQ',
  `answer_text` text DEFAULT NULL COMMENT 'For essay',
  `is_correct` tinyint(1) DEFAULT NULL COMMENT 'For auto-graded questions',
  `marks_obtained` decimal(5,2) DEFAULT NULL,
  `graded_by` int(10) UNSIGNED DEFAULT NULL,
  `graded_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_results`
--

CREATE TABLE `cbt_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `attempt_id` int(10) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `published` tinyint(1) DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_tests`
--

CREATE TABLE `cbt_tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `paper_id` int(10) UNSIGNED NOT NULL,
  `is_random_questions` tinyint(1) DEFAULT 0,
  `is_random_options` tinyint(1) DEFAULT 0,
  `allow_review` tinyint(1) DEFAULT 1 COMMENT 'Can student review answers after submission?',
  `show_result_immediately` tinyint(1) DEFAULT 0,
  `scheduled_start` datetime DEFAULT NULL COMMENT 'If null, available anytime',
  `scheduled_end` datetime DEFAULT NULL,
  `pass_marks` decimal(5,2) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates_issued`
--

CREATE TABLE `certificates_issued` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `template_id` int(10) UNSIGNED DEFAULT NULL,
  `certificate_number` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL COMMENT 'Generated PDF path',
  `metadata` text DEFAULT NULL COMMENT 'JSON of dynamic data used',
  `issued_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_templates`
--

CREATE TABLE `certificate_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('leaving','character','achievement','participation','other') DEFAULT 'other',
  `template_html` text NOT NULL,
  `orientation` enum('portrait','landscape') DEFAULT 'portrait',
  `default_fields` text DEFAULT NULL COMMENT 'JSON of placeholder fields',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `grade_level` varchar(50) DEFAULT NULL,
  `class_teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `capacity` int(10) UNSIGNED DEFAULT 40,
  `room_number` varchar(50) DEFAULT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `school_id`, `campus_id`, `name`, `code`, `description`, `grade_level`, `class_teacher_id`, `capacity`, `room_number`, `academic_year_id`, `is_active`, `created_at`) VALUES
(1, 6, NULL, 'grade 10', 'G10', 'learning', 'Junior secoundary school 2', 9, 20, 'A101', 1, 1, '2026-03-04 20:30:17'),
(2, 6, NULL, 'grade 1', 'g1', '', 'primary', NULL, 19, 'b202', 1, 1, '2026-03-05 18:33:25'),
(3, 6, NULL, 'Primary 3', 'Pri 3', '', 'primary', 12, 16, 'c303', 1, 1, '2026-03-06 08:00:26'),
(4, 6, NULL, 'Kindergaten', 'KG', '', 'Kindergaten', NULL, 12, 'A1', 1, 1, '2026-03-06 08:41:57'),
(5, 6, NULL, 'Nursery 1', 'NUR 1', '', 'Nursery', NULL, 23, 'B1', 1, 1, '2026-03-06 08:45:53'),
(6, 6, NULL, 'Nursery 2', 'NUR 2', '', 'Nursery', NULL, 20, 'B2', 1, 1, '2026-03-06 08:48:10'),
(7, 6, NULL, 'Nursery 3', 'NUR 3', '', 'Nursery', NULL, 19, 'B3', 1, 1, '2026-03-06 08:49:19'),
(8, 6, NULL, 'Primary 1', 'PRY 1', '', 'Primary', NULL, 24, 'C1', 1, 1, '2026-03-06 08:53:40'),
(9, 6, NULL, 'Primary 2', 'PRY 2', '', 'Primary', NULL, 25, 'C2', 1, 1, '2026-03-06 08:55:20'),
(10, 6, NULL, 'Primary 4', 'PRY 4', '', 'Primary', NULL, 24, 'C4', 1, 1, '2026-03-06 08:59:16'),
(11, 6, NULL, 'Primary 5', 'PRY 5', '', 'Primary', NULL, 26, 'C5', 1, 1, '2026-03-06 09:00:49'),
(12, 6, NULL, 'Junior Secondary School 1', 'JSS1', '', 'Secondary', 17, 30, 'D1', 1, 1, '2026-03-06 09:02:37'),
(13, 6, NULL, 'Junior Secondary School 3', 'JSS3', '', 'Secondary', NULL, 28, 'D3', 1, 1, '2026-03-06 09:04:10'),
(14, 6, NULL, 'Senior Secondary School 1', 'SSS1', '', 'Secondary', NULL, 33, 'DD1', 1, 1, '2026-03-06 09:11:37'),
(15, 6, NULL, 'Senior Secondary School 2', 'SSS2', '', 'Secondary', 39, 35, 'DD2', 1, 1, '2026-03-06 09:12:39'),
(16, 6, NULL, 'Senior Secondary School 3', 'SSS3', '', 'Secondary', NULL, 31, 'DD3', 1, 1, '2026-03-06 09:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `class_id`, `subject_id`, `teacher_id`, `created_at`) VALUES
(50, 12, 16, NULL, '2026-03-12 10:37:01'),
(51, 12, 15, NULL, '2026-03-12 10:37:01'),
(52, 12, 12, 83, '2026-03-12 10:37:01'),
(53, 12, 6, 83, '2026-03-12 10:37:01'),
(54, 12, 5, NULL, '2026-03-12 10:37:01'),
(55, 12, 18, NULL, '2026-03-12 10:37:01'),
(56, 12, 2, NULL, '2026-03-12 10:37:01'),
(57, 12, 7, NULL, '2026-03-12 10:37:01'),
(58, 12, 21, NULL, '2026-03-12 10:37:01'),
(59, 12, 14, NULL, '2026-03-12 10:37:01'),
(60, 12, 11, NULL, '2026-03-12 10:37:01'),
(61, 12, 13, NULL, '2026-03-12 10:37:01'),
(62, 12, 8, NULL, '2026-03-12 10:37:01'),
(63, 12, 1, 78, '2026-03-12 10:37:01'),
(64, 12, 17, NULL, '2026-03-12 10:37:01'),
(65, 12, 9, 79, '2026-03-12 10:37:01'),
(66, 12, 10, NULL, '2026-03-12 10:37:01'),
(67, 2, 4, NULL, '2026-03-12 10:50:18'),
(68, 2, 12, NULL, '2026-03-12 10:50:18'),
(69, 2, 6, NULL, '2026-03-12 10:50:18'),
(70, 2, 5, NULL, '2026-03-12 10:50:18'),
(71, 2, 2, NULL, '2026-03-12 10:50:18'),
(72, 2, 7, NULL, '2026-03-12 10:50:18'),
(73, 2, 21, NULL, '2026-03-12 10:50:18'),
(74, 2, 11, NULL, '2026-03-12 10:50:18'),
(75, 2, 13, NULL, '2026-03-12 10:50:18'),
(76, 2, 8, NULL, '2026-03-12 10:50:18'),
(77, 2, 1, NULL, '2026-03-12 10:50:18'),
(78, 2, 20, 78, '2026-03-12 10:50:18'),
(79, 2, 9, NULL, '2026-03-12 10:50:18'),
(80, 2, 19, 79, '2026-03-12 10:50:18'),
(81, 2, 10, NULL, '2026-03-12 10:50:18'),
(82, 4, 3, NULL, '2026-03-14 16:37:15'),
(83, 4, 4, NULL, '2026-03-14 16:37:15'),
(84, 4, 16, NULL, '2026-03-14 16:37:15'),
(85, 4, 15, NULL, '2026-03-14 16:37:15'),
(86, 4, 12, NULL, '2026-03-14 16:37:15'),
(87, 4, 6, NULL, '2026-03-14 16:37:15'),
(88, 4, 5, NULL, '2026-03-14 16:37:15'),
(89, 4, 18, NULL, '2026-03-14 16:37:15'),
(90, 4, 2, NULL, '2026-03-14 16:37:15'),
(91, 4, 7, NULL, '2026-03-14 16:37:15'),
(92, 4, 21, NULL, '2026-03-14 16:37:15'),
(93, 4, 14, NULL, '2026-03-14 16:37:15'),
(94, 4, 11, NULL, '2026-03-14 16:37:15'),
(95, 4, 1, NULL, '2026-03-14 16:37:15'),
(96, 4, 9, NULL, '2026-03-14 16:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `conversation_type` enum('individual','group') DEFAULT 'individual',
  `subject` varchar(255) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `last_message_id` int(10) UNSIGNED DEFAULT NULL,
  `last_message_at` timestamp NULL DEFAULT NULL,
  `is_archived` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `school_id`, `conversation_type`, `subject`, `created_by`, `last_message_id`, `last_message_at`, `is_archived`, `created_at`, `updated_at`) VALUES
(1, 6, 'individual', NULL, 1, 18, '2026-03-08 16:40:26', 0, '2026-03-08 11:47:00', '2026-03-08 16:40:26'),
(2, 6, 'individual', NULL, 1, 20, '2026-03-09 11:59:21', 0, '2026-03-08 11:47:32', '2026-03-09 11:59:21'),
(3, 6, 'individual', NULL, 1, 6, '2026-03-08 12:19:47', 0, '2026-03-08 12:11:11', '2026-03-08 12:19:47'),
(4, 0, 'individual', NULL, 1, 11, '2026-03-08 14:01:38', 0, '2026-03-08 13:55:59', '2026-03-08 14:01:38'),
(5, 0, 'group', 'family of emezie', 1, 10, '2026-03-08 13:56:50', 0, '2026-03-08 13:56:27', '2026-03-08 13:56:50'),
(6, 0, 'individual', NULL, 1, 15, '2026-03-08 14:38:30', 0, '2026-03-08 14:07:25', '2026-03-08 14:38:30'),
(7, 0, 'group', 'emezie family', 1, 23, '2026-03-09 12:02:44', 0, '2026-03-09 12:02:00', '2026-03-09 12:02:44'),
(8, 0, 'individual', NULL, 1, 26, '2026-03-24 08:38:45', 0, '2026-03-09 12:03:24', '2026-03-24 08:38:45'),
(9, 0, 'individual', NULL, 1, NULL, '2026-03-24 08:49:13', 0, '2026-03-24 08:49:13', '2026-03-24 08:49:13'),
(10, 0, 'individual', NULL, 1, 28, '2026-03-30 10:38:51', 0, '2026-03-30 10:38:26', '2026-03-30 10:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_participants`
--

CREATE TABLE `conversation_participants` (
  `id` int(10) UNSIGNED NOT NULL,
  `conversation_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` enum('admin','teacher','student','parent','accountant','librarian','receptionist') NOT NULL,
  `last_read_at` timestamp NULL DEFAULT NULL,
  `is_muted` tinyint(1) DEFAULT 0,
  `is_archived` tinyint(1) DEFAULT 0,
  `is_deleted` tinyint(1) DEFAULT 0,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `left_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversation_participants`
--

INSERT INTO `conversation_participants` (`id`, `conversation_id`, `user_id`, `user_type`, `last_read_at`, `is_muted`, `is_archived`, `is_deleted`, `joined_at`, `left_at`, `created_at`) VALUES
(1, 1, 1, 'admin', '2026-03-30 10:39:25', 1, 0, 0, '2026-03-08 11:47:00', NULL, '2026-03-08 11:47:00'),
(2, 1, 9, 'teacher', NULL, 0, 0, 0, '2026-03-08 11:47:00', NULL, '2026-03-08 11:47:00'),
(3, 2, 1, 'admin', '2026-03-24 08:48:51', 0, 0, 0, '2026-03-08 11:47:32', NULL, '2026-03-08 11:47:32'),
(4, 2, 11, 'parent', NULL, 0, 0, 0, '2026-03-08 11:47:32', NULL, '2026-03-08 11:47:32'),
(5, 3, 1, 'admin', '2026-03-30 10:39:18', 0, 0, 0, '2026-03-08 12:11:11', NULL, '2026-03-08 12:11:11'),
(6, 3, 13, 'parent', NULL, 0, 0, 0, '2026-03-08 12:11:11', NULL, '2026-03-08 12:11:11'),
(7, 4, 1, 'admin', '2026-03-30 10:39:21', 0, 0, 0, '2026-03-08 13:55:59', NULL, '2026-03-08 13:55:59'),
(8, 4, 6, 'parent', NULL, 0, 0, 0, '2026-03-08 13:55:59', NULL, '2026-03-08 13:55:59'),
(9, 5, 1, 'admin', '2026-03-08 13:59:51', 0, 0, 1, '2026-03-08 13:56:27', '2026-03-08 13:59:56', '2026-03-08 13:56:27'),
(10, 5, 9, 'teacher', NULL, 0, 0, 0, '2026-03-08 13:56:27', NULL, '2026-03-08 13:56:27'),
(11, 5, 13, 'parent', NULL, 0, 0, 0, '2026-03-08 13:56:27', NULL, '2026-03-08 13:56:27'),
(12, 5, 11, 'parent', NULL, 0, 0, 0, '2026-03-08 13:56:27', NULL, '2026-03-08 13:56:27'),
(13, 6, 1, 'admin', '2026-03-24 08:48:10', 0, 0, 0, '2026-03-08 14:07:25', NULL, '2026-03-08 14:07:25'),
(14, 6, 4, 'parent', NULL, 0, 0, 0, '2026-03-08 14:07:25', NULL, '2026-03-08 14:07:25'),
(15, 7, 1, 'admin', '2026-03-10 11:57:13', 0, 0, 1, '2026-03-09 12:02:00', '2026-03-10 11:57:18', '2026-03-09 12:02:00'),
(16, 7, 13, 'parent', NULL, 0, 0, 0, '2026-03-09 12:02:00', NULL, '2026-03-09 12:02:00'),
(17, 7, 11, 'parent', NULL, 0, 0, 0, '2026-03-09 12:02:00', NULL, '2026-03-09 12:02:00'),
(18, 8, 1, 'admin', '2026-03-24 08:46:39', 0, 0, 0, '2026-03-09 12:03:24', NULL, '2026-03-09 12:03:24'),
(19, 8, 17, 'teacher', NULL, 0, 0, 0, '2026-03-09 12:03:24', NULL, '2026-03-09 12:03:24'),
(20, 9, 1, 'admin', '2026-03-24 08:49:13', 0, 0, 0, '2026-03-24 08:49:13', NULL, '2026-03-24 08:49:13'),
(21, 9, 38, 'parent', NULL, 0, 0, 0, '2026-03-24 08:49:13', NULL, '2026-03-24 08:49:13'),
(22, 10, 1, 'admin', '2026-04-11 17:07:25', 0, 0, 0, '2026-03-30 10:38:26', NULL, '2026-03-30 10:38:26'),
(23, 10, 62, 'parent', NULL, 0, 0, 0, '2026-03-30 10:38:26', NULL, '2026-03-30 10:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_outlines`
--

CREATE TABLE `curriculum_outlines` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `week` int(10) UNSIGNED DEFAULT NULL,
  `topic` varchar(255) NOT NULL,
  `objectives` text DEFAULT NULL,
  `resources` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discipline_actions`
--

CREATE TABLE `discipline_actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `incident_id` int(10) UNSIGNED DEFAULT NULL,
  `action_type` enum('detention','suspension','expulsion','community_service','warning') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `issued_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `template_key` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body_html` text NOT NULL,
  `body_text` text DEFAULT NULL,
  `variables` text DEFAULT NULL COMMENT 'JSON array of available variables',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('holiday','exam','meeting','celebration','sports','other') DEFAULT 'other',
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `school_id`, `title`, `description`, `type`, `start_date`, `end_date`, `start_time`, `end_time`, `venue`, `is_public`, `created_by`, `created_at`) VALUES
(1, 6, 'pta meeting', 'a guadian to a student must be present', 'meeting', '2026-03-12', '2026-03-12', '10:30:00', '12:30:00', 'school hall', 1, 1, '2026-03-06 21:43:54'),
(3, 6, 'Inter-house sports', '', 'sports', '2026-03-27', '2026-03-27', '08:30:00', '16:00:00', 'School Field', 1, 1, '2026-03-09 11:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `academic_term_id` int(10) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_grades`
--

CREATE TABLE `exam_grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `marks_obtained` decimal(5,2) DEFAULT NULL,
  `total_marks` decimal(5,2) NOT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `entered_by` int(10) UNSIGNED DEFAULT NULL,
  `entered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_published` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_options`
--

CREATE TABLE `exam_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `option_text` text NOT NULL,
  `is_correct` tinyint(1) DEFAULT 0,
  `order` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_papers`
--

CREATE TABLE `exam_papers` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL COMMENT 'Teacher who created the paper',
  `title` varchar(255) NOT NULL,
  `total_marks` decimal(5,2) NOT NULL,
  `duration_minutes` int(10) UNSIGNED DEFAULT NULL,
  `paper_type` enum('cbt','printed') NOT NULL,
  `status` enum('draft','submitted','approved','rejected') DEFAULT 'draft',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `paper_id` int(10) UNSIGNED NOT NULL,
  `question_text` text NOT NULL,
  `question_type` enum('multiple_choice','true_false','essay') NOT NULL,
  `marks` decimal(5,2) NOT NULL,
  `attachment` varchar(500) DEFAULT NULL,
  `order` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_structures`
--

CREATE TABLE `fee_structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `academic_term_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `fee_category_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `due_date` date DEFAULT NULL,
  `late_fee` decimal(10,2) DEFAULT 0.00,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_storage`
--

CREATE TABLE `file_storage` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `storage_type` enum('local','s3','cloudinary','wasabi') DEFAULT 'local',
  `bucket_name` varchar(255) DEFAULT NULL,
  `object_key` varchar(500) DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT 0,
  `access_hash` varchar(100) DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `download_count` int(10) DEFAULT 0,
  `last_downloaded` timestamp NULL DEFAULT NULL,
  `metadata` text DEFAULT NULL COMMENT 'JSON encoded metadata',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `geofence_logs`
--

CREATE TABLE `geofence_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `action` enum('clock_in','clock_out') NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `is_within_allowed` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = outside, 1 = inside',
  `distance_meters` decimal(10,2) DEFAULT NULL COMMENT 'Distance from campus center if applicable',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `relationship` enum('father','mother','brother','sister','uncle','aunt','grandfather','grandmother','guardian','other') NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `can_pickup` tinyint(1) DEFAULT 1,
  `emergency_contact` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `school_id`, `user_id`, `student_id`, `relationship`, `is_primary`, `can_pickup`, `emergency_contact`) VALUES
(2, 6, 6, 2, 'mother', 1, 1, 1),
(3, 6, 11, 3, 'mother', 1, 1, 1),
(4, 6, 12, 2, 'guardian', 1, 1, 1),
(5, 6, 13, 3, 'guardian', 1, 1, 1),
(6, 6, 15, 4, 'father', 1, 1, 1),
(8, 6, 38, 14, 'father', 1, 1, 1),
(9, 6, 52, 21, 'guardian', 1, 1, 1),
(10, 6, 53, 22, 'guardian', 1, 1, 1),
(11, 6, 54, 23, 'guardian', 1, 1, 1),
(12, 6, 55, 24, 'guardian', 1, 1, 1),
(13, 6, 56, 25, 'guardian', 1, 1, 1),
(14, 6, 57, 26, 'guardian', 1, 1, 1),
(15, 6, 58, 27, 'guardian', 1, 1, 1),
(16, 6, 59, 28, 'guardian', 1, 1, 1),
(17, 6, 60, 29, 'guardian', 1, 1, 1),
(18, 6, 61, 30, 'guardian', 1, 1, 1),
(19, 6, 62, 31, 'guardian', 1, 1, 1),
(20, 6, 63, 32, 'guardian', 1, 1, 1),
(22, 6, 4, 1, 'guardian', 1, 1, 1),
(23, 6, 82, 3, 'guardian', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `attachment` varchar(500) DEFAULT NULL,
  `due_date` date NOT NULL,
  `submission_type` enum('online','offline') DEFAULT 'offline',
  `max_marks` decimal(5,2) DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `capacity` int(10) UNSIGNED DEFAULT NULL COMMENT 'Total number of beds',
  `gender` enum('male','female','co-ed') DEFAULT 'co-ed',
  `address` text DEFAULT NULL COMMENT 'Optional, if different from campus address',
  `facilities` text DEFAULT NULL COMMENT 'JSON array or comma separated list',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_assignments`
--

CREATE TABLE `hostel_assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `hostel_id` int(10) UNSIGNED NOT NULL,
  `bed_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL COMMENT 'Null means currently assigned',
  `status` enum('active','inactive','transferred') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_beds`
--

CREATE TABLE `hostel_beds` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `hostel_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `bed_number` varchar(20) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_rooms`
--

CREATE TABLE `hostel_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `hostel_id` int(10) UNSIGNED NOT NULL,
  `room_number` varchar(20) NOT NULL,
  `floor` varchar(10) DEFAULT NULL,
  `capacity` int(10) UNSIGNED NOT NULL COMMENT 'Number of beds in the room',
  `gender` enum('male','female','co-ed') DEFAULT 'co-ed',
  `class_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'If set, room is reserved for students of this class',
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

CREATE TABLE `incidents` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `incident_date` date NOT NULL,
  `incident_time` time DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `reported_by` int(10) UNSIGNED NOT NULL,
  `status` enum('open','investigating','resolved','closed') DEFAULT 'open',
  `action_taken` text DEFAULT NULL,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `resolved_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incident_students`
--

CREATE TABLE `incident_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `incident_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `role` enum('perpetrator','victim','witness') DEFAULT 'perpetrator',
  `statement` text DEFAULT NULL,
  `action_taken` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_categories`
--

CREATE TABLE `inventory_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `item_code` varchar(50) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL COMMENT 'e.g., piece, kg, box',
  `unit_price` decimal(10,2) DEFAULT NULL,
  `quantity_in_stock` decimal(10,2) DEFAULT 0.00,
  `minimum_quantity` decimal(10,2) DEFAULT 0.00,
  `maximum_quantity` decimal(10,2) DEFAULT NULL,
  `reorder_level` decimal(10,2) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL COMMENT 'Shelf/rack location',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_movements`
--

CREATE TABLE `inventory_movements` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `movement_type` enum('receipt','issue','adjustment','return') NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL COMMENT 'e.g., invoice number, issue slip',
  `description` text DEFAULT NULL,
  `issued_to` varchar(255) DEFAULT NULL COMMENT 'Person/department who received',
  `issued_to_user_id` int(10) UNSIGNED DEFAULT NULL,
  `movement_date` date NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `academic_term_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `late_fee` decimal(10,2) DEFAULT 0.00,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `balance_amount` decimal(10,2) NOT NULL,
  `status` enum('draft','pending','partial','paid','overdue','cancelled') DEFAULT 'pending',
  `payment_method` varchar(50) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_v2`
--

CREATE TABLE `invoices_v2` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `billing_history_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT 0.00,
  `discount` decimal(10,2) DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) DEFAULT 'NGN',
  `status` enum('draft','sent','viewed','paid','overdue','cancelled') DEFAULT 'draft',
  `due_date` date NOT NULL,
  `paid_date` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `pdf_path` varchar(500) DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `viewed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `fee_category_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` enum('teacher','staff','student') NOT NULL COMMENT 'Mirrors users.user_type for clarity',
  `leave_type_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text NOT NULL,
  `status` enum('pending','approved','rejected','cancelled') DEFAULT 'pending',
  `approved_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'User ID of approver',
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `applied_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `max_days_per_year` int(10) UNSIGNED DEFAULT NULL COMMENT 'Maximum allowed days per year (optional)',
  `applicable_to` enum('teacher','staff','student','all') DEFAULT 'all',
  `is_paid` tinyint(1) DEFAULT 1,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `school_id`, `name`, `description`, `max_days_per_year`, `applicable_to`, `is_paid`, `is_active`, `created_at`) VALUES
(1, 6, 'spa leave', 'enjoyment', 1, 'teacher', 0, 1, '2026-03-09 21:24:17'),
(2, 6, 'Maternity leave', 'Just gave birth', 90, 'teacher', 0, 1, '2026-03-10 07:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_plans`
--

CREATE TABLE `lesson_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `week` int(10) UNSIGNED DEFAULT NULL,
  `topic` varchar(255) NOT NULL,
  `objectives` text DEFAULT NULL,
  `materials` text DEFAULT NULL,
  `procedure` text DEFAULT NULL,
  `assessment` text DEFAULT NULL,
  `homework` text DEFAULT NULL,
  `attachment` varchar(500) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `approved_by` int(10) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_books`
--

CREATE TABLE `library_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `edition` varchar(50) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `shelf_location` varchar(100) DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `available_quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `price` decimal(10,2) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cover_image` varchar(500) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_categories`
--

CREATE TABLE `library_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_fine_settings`
--

CREATE TABLE `library_fine_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `fine_per_day` decimal(10,2) NOT NULL DEFAULT 0.00,
  `max_fine` decimal(10,2) DEFAULT NULL,
  `grace_days` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_issues`
--

CREATE TABLE `library_issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('issued','returned','overdue','lost') DEFAULT 'issued',
  `fine_amount` decimal(10,2) DEFAULT 0.00,
  `fine_paid` tinyint(1) DEFAULT 0,
  `issued_by` int(10) UNSIGNED NOT NULL COMMENT 'Librarian user ID',
  `returned_by` int(10) UNSIGNED DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_members`
--

CREATE TABLE `library_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `membership_number` varchar(50) NOT NULL,
  `membership_type` enum('student','teacher','staff') NOT NULL,
  `issued_date` date NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_reservations`
--

CREATE TABLE `library_reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `reservation_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` enum('pending','fulfilled','cancelled','expired') DEFAULT 'pending',
  `notified` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `success` tinyint(1) DEFAULT 0,
  `failed_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_logs`
--

CREATE TABLE `maintenance_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `maintenance_type` enum('database_optimization','cache_clear','backup_cleanup','storage_cleanup','system_update') NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','running','completed','failed','cancelled') DEFAULT 'pending',
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `duration_seconds` int(10) DEFAULT NULL,
  `affected_records` int(10) DEFAULT NULL,
  `freed_space` bigint(20) DEFAULT NULL,
  `error_message` text DEFAULT NULL,
  `performed_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_bookings`
--

CREATE TABLE `meeting_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `slot_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `purpose` text DEFAULT NULL,
  `status` enum('booked','attended','cancelled','no_show') DEFAULT 'booked',
  `booked_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `attended_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_slots`
--

CREATE TABLE `meeting_slots` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `max_bookings` int(10) UNSIGNED DEFAULT 1 COMMENT 'Number of simultaneous bookings (e.g., group meeting)',
  `current_bookings` int(10) UNSIGNED DEFAULT 0,
  `status` enum('available','full','cancelled') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `conversation_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `sender_type` enum('admin','teacher','student','parent','accountant','librarian','receptionist') NOT NULL,
  `message_type` enum('text','image','file','audio','video','system') DEFAULT 'text',
  `message` text NOT NULL,
  `metadata` text DEFAULT NULL COMMENT 'JSON encoded metadata (file info, dimensions, etc)',
  `is_delivered` tinyint(1) DEFAULT 0,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL,
  `is_starred` tinyint(1) DEFAULT 0,
  `is_pinned` tinyint(1) DEFAULT 0,
  `is_deleted` tinyint(1) DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `reply_to_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender_id`, `sender_type`, `message_type`, `message`, `metadata`, `is_delivered`, `delivered_at`, `is_read`, `read_at`, `is_starred`, `is_pinned`, `is_deleted`, `deleted_at`, `reply_to_id`, `created_at`) VALUES
(1, 1, 1, 'admin', 'text', 'hello', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 11:47:09'),
(2, 2, 1, 'admin', 'text', 'hello', NULL, 0, NULL, 0, NULL, 0, 0, 1, '2026-03-08 14:40:44', NULL, '2026-03-08 11:47:42'),
(3, 1, 1, 'admin', 'text', 'see the receipt', NULL, 0, NULL, 0, NULL, 0, 0, 1, '2026-03-08 13:47:00', NULL, '2026-03-08 11:49:47'),
(4, 1, 1, 'admin', 'text', 'hehe', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 11:51:53'),
(5, 2, 1, 'admin', 'text', 'helllo oo', NULL, 0, NULL, 0, NULL, 0, 0, 1, '2026-03-08 14:40:41', NULL, '2026-03-08 11:58:39'),
(6, 3, 1, 'admin', 'text', '🥹🥹🥹🥹', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 12:19:47'),
(7, 1, 1, 'admin', 'text', 'answer me nah', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, 1, '2026-03-08 13:47:13'),
(8, 1, 1, 'admin', 'text', 'send', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 13:47:26'),
(9, 5, 0, '', 'system', 'Group created by bitflux wallet', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 13:56:27'),
(10, 5, 1, 'admin', 'text', 'hello every one', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, 9, '2026-03-08 13:56:50'),
(11, 4, 1, 'admin', 'text', 'yes', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 14:01:38'),
(12, 1, 1, 'admin', 'text', 'hello', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, 8, '2026-03-08 14:14:24'),
(13, 1, 1, 'admin', 'text', 'send me my money nah', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 14:14:34'),
(14, 1, 1, 'admin', 'text', 'When are u coming home ?', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 14:20:45'),
(15, 6, 1, 'admin', 'text', 'Bbhhhh', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 14:38:30'),
(16, 2, 1, 'admin', 'text', 'Hello', NULL, 0, NULL, 0, NULL, 0, 0, 1, '2026-03-09 12:00:42', NULL, '2026-03-08 14:49:25'),
(17, 1, 1, 'admin', 'text', 'Hereby if. Fun ey c', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 15:04:11'),
(18, 1, 1, 'admin', 'text', 'Hey daddy', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 16:40:26'),
(19, 2, 1, 'admin', 'text', 'Hiii daddy', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-08 16:41:53'),
(20, 2, 1, 'admin', 'text', 'Hello', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-09 11:59:21'),
(21, 7, 0, '', 'system', 'Group created by bitflux wallet', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-09 12:02:00'),
(22, 7, 1, 'admin', 'text', 'hello', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-09 12:02:12'),
(23, 7, 1, 'admin', 'text', '❤️😂', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-09 12:02:44'),
(24, 8, 1, 'admin', 'text', 'hello', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-24 08:37:54'),
(25, 8, 1, 'admin', 'text', 'favicon', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-24 08:38:15'),
(26, 8, 1, 'admin', 'text', 'send me a desifgnn', NULL, 0, NULL, 0, NULL, 0, 0, 1, '2026-03-24 08:38:52', 25, '2026-03-24 08:38:45'),
(27, 10, 1, 'admin', 'text', 'Hello', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, NULL, '2026-03-30 10:38:32'),
(28, 10, 1, 'admin', 'text', 'Hello', NULL, 0, NULL, 0, NULL, 0, 0, 0, NULL, 27, '2026-03-30 10:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `message_attachments`
--

CREATE TABLE `message_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `mime_type` varchar(100) NOT NULL,
  `file_extension` varchar(20) DEFAULT NULL,
  `thumbnail_path` varchar(500) DEFAULT NULL,
  `duration` int(10) DEFAULT NULL COMMENT 'For audio/video in seconds',
  `dimensions` varchar(50) DEFAULT NULL COMMENT 'For images (widthxheight)',
  `is_downloaded` tinyint(1) DEFAULT 0,
  `download_count` int(10) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_attachments`
--

INSERT INTO `message_attachments` (`id`, `message_id`, `file_name`, `file_path`, `file_size`, `mime_type`, `file_extension`, `thumbnail_path`, `duration`, `dimensions`, `is_downloaded`, `download_count`, `created_at`) VALUES
(1, 8, 'contact-info-img.png', 'uploads/messages/6/69ad7deeec815_1772977646.png', 226213, 'image/png', 'png', 'uploads/messages/6/thumbnails/thumb_69ad7deeec815_1772977646.png', NULL, '443x564', 0, 0, '2026-03-08 13:47:26'),
(2, 20, 'academix  456.jpg', 'uploads/messages/6/69aeb61986292_1773057561.jpg', 606831, 'image/jpeg', 'jpg', 'uploads/messages/6/thumbnails/thumb_69aeb61986292_1773057561.jpg', NULL, '3242x3194', 0, 0, '2026-03-09 11:59:21'),
(3, 25, 'academix-favicon.png', 'uploads/messages/6/69c24d7760156_1774341495.png', 122238, 'image/png', 'png', 'uploads/messages/6/thumbnails/thumb_69c24d7760156_1774341495.png', NULL, '546x457', 0, 0, '2026-03-24 08:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `message_blocks`
--

CREATE TABLE `message_blocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `blocked_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_blocks`
--

INSERT INTO `message_blocks` (`id`, `school_id`, `user_id`, `blocked_user_id`, `created_at`) VALUES
(1, 6, 1, 4, '2026-03-08 14:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `message_drafts`
--

CREATE TABLE `message_drafts` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `conversation_id` int(10) UNSIGNED DEFAULT NULL,
  `recipient_id` int(10) UNSIGNED DEFAULT NULL,
  `recipient_type` enum('teacher','parent','student') DEFAULT NULL,
  `message` text NOT NULL,
  `attachments` text DEFAULT NULL COMMENT 'JSON array of temporary file paths',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_reactions`
--

CREATE TABLE `message_reactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reaction` varchar(50) NOT NULL COMMENT 'Emoji or reaction type',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_reactions`
--

INSERT INTO `message_reactions` (`id`, `message_id`, `user_id`, `reaction`, `created_at`) VALUES
(3, 7, 1, '👍', '2026-03-08 14:20:22'),
(5, 20, 1, '👍', '2026-03-09 12:00:12'),
(6, 25, 1, '👍', '2026-03-24 08:38:20'),
(8, 27, 1, '❤️', '2026-03-30 10:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `message_status`
--

CREATE TABLE `message_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('sent','delivered','read') DEFAULT 'sent',
  `status_changed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_status`
--

INSERT INTO `message_status` (`id`, `message_id`, `user_id`, `status`, `status_changed_at`, `created_at`) VALUES
(1, 3, 9, 'sent', '2026-03-08 11:49:47', '2026-03-08 11:49:47'),
(2, 4, 9, 'sent', '2026-03-08 11:51:53', '2026-03-08 11:51:53'),
(3, 5, 11, 'sent', '2026-03-08 11:58:39', '2026-03-08 11:58:39'),
(4, 6, 13, 'sent', '2026-03-08 12:19:47', '2026-03-08 12:19:47'),
(5, 7, 9, 'sent', '2026-03-08 13:47:13', '2026-03-08 13:47:13'),
(6, 8, 9, 'sent', '2026-03-08 13:47:26', '2026-03-08 13:47:26'),
(7, 10, 9, 'sent', '2026-03-08 13:56:50', '2026-03-08 13:56:50'),
(8, 10, 11, 'sent', '2026-03-08 13:56:50', '2026-03-08 13:56:50'),
(9, 10, 13, 'sent', '2026-03-08 13:56:50', '2026-03-08 13:56:50'),
(10, 11, 6, 'sent', '2026-03-08 14:01:38', '2026-03-08 14:01:38'),
(11, 12, 9, 'sent', '2026-03-08 14:14:24', '2026-03-08 14:14:24'),
(12, 13, 9, 'sent', '2026-03-08 14:14:34', '2026-03-08 14:14:34'),
(13, 14, 9, 'sent', '2026-03-08 14:20:45', '2026-03-08 14:20:45'),
(14, 15, 4, 'sent', '2026-03-08 14:38:30', '2026-03-08 14:38:30'),
(15, 16, 11, 'sent', '2026-03-08 14:49:25', '2026-03-08 14:49:25'),
(16, 17, 9, 'sent', '2026-03-08 15:04:11', '2026-03-08 15:04:11'),
(17, 18, 9, 'sent', '2026-03-08 16:40:26', '2026-03-08 16:40:26'),
(18, 19, 11, 'sent', '2026-03-08 16:41:53', '2026-03-08 16:41:53'),
(19, 20, 11, 'sent', '2026-03-09 11:59:21', '2026-03-09 11:59:21'),
(20, 22, 11, 'sent', '2026-03-09 12:02:12', '2026-03-09 12:02:12'),
(21, 22, 13, 'sent', '2026-03-09 12:02:12', '2026-03-09 12:02:12'),
(23, 23, 11, 'sent', '2026-03-09 12:02:44', '2026-03-09 12:02:44'),
(24, 23, 13, 'sent', '2026-03-09 12:02:44', '2026-03-09 12:02:44'),
(26, 24, 17, 'sent', '2026-03-24 08:37:54', '2026-03-24 08:37:54'),
(27, 25, 17, 'sent', '2026-03-24 08:38:15', '2026-03-24 08:38:15'),
(28, 26, 17, 'sent', '2026-03-24 08:38:45', '2026-03-24 08:38:45'),
(29, 27, 62, 'sent', '2026-03-30 10:38:32', '2026-03-30 10:38:32'),
(30, 28, 62, 'sent', '2026-03-30 10:38:51', '2026-03-30 10:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('email','sms','push','in_app','system') DEFAULT 'in_app',
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `data` text DEFAULT NULL COMMENT 'JSON encoded data',
  `priority` enum('low','normal','high','urgent') DEFAULT 'normal',
  `is_read` tinyint(1) DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL,
  `is_sent` tinyint(1) DEFAULT 0,
  `sent_at` timestamp NULL DEFAULT NULL,
  `delivery_status` enum('pending','sent','delivered','failed','bounced') DEFAULT 'pending',
  `failure_reason` text DEFAULT NULL,
  `scheduled_for` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `school_id`, `user_id`, `type`, `title`, `message`, `data`, `priority`, `is_read`, `read_at`, `is_sent`, `sent_at`, `delivery_status`, `failure_reason`, `scheduled_for`, `expires_at`, `created_at`) VALUES
(1, 6, 12, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":1,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:43:55'),
(2, 6, 9, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":1,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:43:55'),
(3, 6, 6, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":1,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:43:55'),
(4, 6, 5, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":1,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:43:55'),
(5, 6, 13, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":1,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:43:55'),
(6, 6, 11, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":1,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:43:55'),
(7, 6, 10, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":1,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:43:55'),
(8, 6, 3, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":1,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:43:55'),
(9, 6, 4, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":1,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:43:55'),
(10, 6, 12, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:44:03'),
(11, 6, 9, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:44:03'),
(12, 6, 6, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:44:03'),
(13, 6, 5, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:44:03'),
(14, 6, 13, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:44:03'),
(15, 6, 11, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:44:03'),
(16, 6, 10, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:44:03'),
(17, 6, 3, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:44:03'),
(18, 6, 4, 'in_app', 'New event scheduled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:44:03'),
(19, 6, 12, 'in_app', 'Event cancelled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:51:02'),
(20, 6, 9, 'in_app', 'Event cancelled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:51:02'),
(21, 6, 6, 'in_app', 'Event cancelled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:51:02'),
(22, 6, 5, 'in_app', 'Event cancelled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:51:02'),
(23, 6, 13, 'in_app', 'Event cancelled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:51:02'),
(24, 6, 11, 'in_app', 'Event cancelled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:51:02'),
(25, 6, 10, 'in_app', 'Event cancelled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:51:02'),
(26, 6, 3, 'in_app', 'Event cancelled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:51:02'),
(27, 6, 4, 'in_app', 'Event cancelled', 'pta meeting - Mar 12, 2026', '{\"event_id\":2,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-06 21:51:02'),
(28, 6, 3, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(29, 6, 4, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(30, 6, 5, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(31, 6, 6, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(32, 6, 9, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(33, 6, 10, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(34, 6, 11, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(35, 6, 12, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(36, 6, 13, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(37, 6, 14, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(38, 6, 15, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(39, 6, 16, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":3,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:39'),
(40, 6, 3, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(41, 6, 4, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(42, 6, 5, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(43, 6, 6, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(44, 6, 9, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(45, 6, 10, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(46, 6, 11, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(47, 6, 12, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(48, 6, 13, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(49, 6, 14, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(50, 6, 15, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(51, 6, 16, 'in_app', 'New event scheduled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"created\",\"icon\":\"ri-calendar-check-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:39:48'),
(52, 6, 3, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(53, 6, 4, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(54, 6, 5, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(55, 6, 6, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(56, 6, 9, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(57, 6, 10, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(58, 6, 11, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(59, 6, 12, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(60, 6, 13, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(61, 6, 14, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(62, 6, 15, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18'),
(63, 6, 16, 'in_app', 'Event cancelled', 'Inter-house sports - Mar 27, 2026', '{\"event_id\":4,\"action\":\"deleted\",\"icon\":\"ri-calendar-close-line\"}', 'normal', 0, NULL, 0, NULL, 'pending', NULL, NULL, NULL, '2026-03-09 11:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `payment_number` varchar(100) NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` enum('cash','cheque','bank_transfer','card','mobile_money','online') NOT NULL,
  `payment_date` date NOT NULL,
  `collected_by` int(10) UNSIGNED DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `cheque_number` varchar(100) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `type` enum('card','bank_transfer','mobile_money','wallet') NOT NULL,
  `provider` varchar(50) DEFAULT NULL,
  `last_four` varchar(4) DEFAULT NULL,
  `exp_month` int(2) DEFAULT NULL,
  `exp_year` int(4) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `is_verified` tinyint(1) DEFAULT 0,
  `metadata` text DEFAULT NULL COMMENT 'JSON encoded metadata',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_allowances`
--

CREATE TABLE `payroll_allowances` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `allowance_type` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `effective_from` date NOT NULL,
  `effective_to` date DEFAULT NULL,
  `is_recurring` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_deductions`
--

CREATE TABLE `payroll_deductions` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `deduction_type` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `effective_from` date NOT NULL,
  `effective_to` date DEFAULT NULL,
  `is_recurring` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_employees`
--

CREATE TABLE `payroll_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `employee_number` varchar(50) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `salary_grade_id` int(10) UNSIGNED DEFAULT NULL,
  `basic_salary` decimal(10,2) DEFAULT NULL COMMENT 'If not using grade',
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `tax_id` varchar(50) DEFAULT NULL,
  `pan_number` varchar(20) DEFAULT NULL,
  `pf_number` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_employees`
--

INSERT INTO `payroll_employees` (`id`, `school_id`, `user_id`, `employee_number`, `department`, `designation`, `joining_date`, `salary_grade_id`, `basic_salary`, `bank_name`, `bank_account`, `ifsc_code`, `tax_id`, `pan_number`, `pf_number`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 6, 9, 'EMP-2026-7711', '', '', '2026-03-10', 1, NULL, 'kuda', '2032909568', '23423', NULL, NULL, NULL, 0, '2026-03-10 16:53:11', '2026-03-11 05:14:09'),
(2, 6, 18, 'EMP-2026-5748', NULL, NULL, '2026-03-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-03-10 16:53:11', '2026-03-10 16:53:11'),
(3, 6, 12, 'EMP-2026-8680', NULL, NULL, '2026-03-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2026-03-10 16:53:11', '2026-03-10 17:05:21'),
(4, 6, 20, 'EMP-2026-7669', NULL, NULL, '2026-03-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-03-10 16:53:11', '2026-03-10 16:53:11'),
(5, 6, 19, 'EMP-2026-6483', NULL, NULL, '2026-03-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-03-10 16:53:11', '2026-03-10 16:53:11'),
(6, 6, 17, 'EMP-2026-4480', '', '', '2026-03-10', 2, NULL, '', '', '', NULL, NULL, NULL, 0, '2026-03-10 16:53:11', '2026-03-11 05:00:03'),
(7, 6, 39, 'TCH-2026-8372', NULL, 'Teacher', '2026-03-12', NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2026-03-11 18:09:55', '2026-03-11 18:09:55'),
(8, 6, 78, 'TCH-2026-8373', NULL, 'Teacher', '2019-04-12', NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2026-03-12 12:45:51', '2026-03-12 12:45:51'),
(9, 6, 79, 'TCH-2026-8374', NULL, 'Teacher', '2020-08-19', NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2026-03-12 12:55:41', '2026-03-12 12:55:41'),
(10, 6, 80, 'TCH-2026-8375', NULL, 'Teacher', '2020-07-10', NULL, NULL, '', '', '', NULL, NULL, NULL, 1, '2026-03-12 13:11:43', '2026-03-12 13:11:43'),
(11, 6, 83, 'TCH-2026-8376', NULL, 'Teacher', '2025-06-02', NULL, NULL, 'Access Bank', '1877099835', '', NULL, NULL, NULL, 1, '2026-03-29 08:52:35', '2026-03-29 08:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_periods`
--

CREATE TABLE `payroll_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('open','processing','closed','archived') DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_periods`
--

INSERT INTO `payroll_periods` (`id`, `school_id`, `name`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Cosmos', '2026-03-18', '2026-03-23', 'processing', '2026-03-11 08:17:09', '2026-03-11 13:54:05'),
(2, 6, 'Cosmos', '2026-03-18', '2026-03-23', 'processing', '2026-03-11 08:17:11', '2026-03-11 18:32:48'),
(3, 6, 'Cosmos', '2026-03-18', '2026-03-23', 'closed', '2026-03-11 08:17:12', '2026-03-12 04:59:19'),
(4, 6, 'Cosmos', '2026-03-18', '2026-03-23', 'open', '2026-03-11 08:17:19', '2026-03-11 08:17:19'),
(5, 6, 'Cosmos', '2026-03-18', '2026-03-23', 'open', '2026-03-11 08:17:19', '2026-03-11 08:17:19'),
(6, 6, 'Cosmos', '2026-03-18', '2026-03-23', 'open', '2026-03-11 08:17:20', '2026-03-11 08:17:20'),
(7, 6, 'Cosmos', '2026-03-18', '2026-03-23', 'open', '2026-03-11 08:17:20', '2026-03-11 08:17:20'),
(9, 6, 'Cosmos', '2026-03-11', '2026-03-13', 'open', '2026-03-11 08:17:31', '2026-03-11 08:17:31'),
(10, 6, 'Cosmos', '2026-03-11', '2026-03-13', 'open', '2026-03-11 08:17:32', '2026-03-11 08:17:32'),
(11, 6, 'Cosmos', '2026-03-11', '2026-03-13', 'processing', '2026-03-11 08:17:32', '2026-03-14 16:42:20'),
(12, 6, 'Cosmos', '2026-03-11', '2026-03-13', 'open', '2026-03-11 08:17:32', '2026-03-11 08:17:32'),
(13, 6, 'Cosmos', '2026-03-11', '2026-03-13', 'open', '2026-03-11 08:17:33', '2026-03-11 08:17:33'),
(14, 6, 'Cosmos', '2026-03-11', '2026-03-13', 'open', '2026-03-11 08:17:33', '2026-03-11 08:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_runs`
--

CREATE TABLE `payroll_runs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `period_id` int(10) UNSIGNED NOT NULL,
  `processed_by` int(10) UNSIGNED NOT NULL,
  `processed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_gross` decimal(12,2) DEFAULT 0.00,
  `total_deductions` decimal(12,2) DEFAULT 0.00,
  `total_net` decimal(12,2) DEFAULT 0.00,
  `status` enum('draft','approved','paid','cancelled') DEFAULT 'draft',
  `payment_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_runs`
--

INSERT INTO `payroll_runs` (`id`, `school_id`, `period_id`, `processed_by`, `processed_at`, `total_gross`, `total_deductions`, `total_net`, `status`, `payment_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, '2026-03-11 13:54:05', 0.00, 0.00, 0.00, 'draft', NULL, NULL, '2026-03-11 13:54:05', '2026-03-11 13:54:05'),
(2, 6, 2, 1, '2026-03-11 18:32:48', 0.00, 0.00, 0.00, 'draft', NULL, NULL, '2026-03-11 18:32:48', '2026-03-11 18:32:48'),
(3, 6, 11, 1, '2026-03-14 16:42:20', 0.00, 0.00, 0.00, 'draft', NULL, NULL, '2026-03-14 16:42:20', '2026-03-14 16:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_salary_grades`
--

CREATE TABLE `payroll_salary_grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `grade_name` varchar(100) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `house_allowance` decimal(10,2) DEFAULT 0.00,
  `transport_allowance` decimal(10,2) DEFAULT 0.00,
  `medical_allowance` decimal(10,2) DEFAULT 0.00,
  `other_allowances` decimal(10,2) DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_salary_grades`
--

INSERT INTO `payroll_salary_grades` (`id`, `school_id`, `grade_name`, `basic_salary`, `house_allowance`, `transport_allowance`, `medical_allowance`, `other_allowances`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 6, 'subject teacher', 150000.00, 0.00, 0.00, 0.00, 0.00, '', 1, '2026-03-11 04:57:11', '2026-03-11 04:57:11'),
(2, 6, 'class teacher', 180000.00, 0.00, 0.00, 0.00, 0.00, '', 1, '2026-03-11 04:57:57', '2026-03-11 04:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_slips`
--

CREATE TABLE `payroll_slips` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `payroll_run_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `gross_salary` decimal(10,2) NOT NULL,
  `total_allowances` decimal(10,2) DEFAULT 0.00,
  `total_deductions` decimal(10,2) DEFAULT 0.00,
  `net_salary` decimal(10,2) NOT NULL,
  `payment_method` enum('bank_transfer','cash','cheque') DEFAULT 'bank_transfer',
  `payment_status` enum('pending','paid','failed') DEFAULT 'pending',
  `payment_date` date DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `pdf_path` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_slips`
--

INSERT INTO `payroll_slips` (`id`, `school_id`, `payroll_run_id`, `employee_id`, `gross_salary`, `total_allowances`, `total_deductions`, `net_salary`, `payment_method`, `payment_status`, `payment_date`, `transaction_id`, `remarks`, `pdf_path`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 2, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-11 13:54:05', '2026-03-11 13:54:05'),
(2, 6, 1, 4, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-11 13:54:05', '2026-03-11 13:54:05'),
(3, 6, 1, 5, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-11 13:54:05', '2026-03-11 13:54:05'),
(4, 6, 2, 2, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-11 18:32:48', '2026-03-11 18:32:48'),
(5, 6, 2, 4, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-11 18:32:48', '2026-03-11 18:32:48'),
(6, 6, 2, 5, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-11 18:32:48', '2026-03-11 18:32:48'),
(7, 6, 2, 7, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-11 18:32:48', '2026-03-11 18:32:48'),
(8, 6, 3, 2, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-14 16:42:20', '2026-03-14 16:42:20'),
(9, 6, 3, 4, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-14 16:42:20', '2026-03-14 16:42:20'),
(10, 6, 3, 5, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-14 16:42:20', '2026-03-14 16:42:20'),
(11, 6, 3, 7, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-14 16:42:20', '2026-03-14 16:42:20'),
(12, 6, 3, 8, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-14 16:42:20', '2026-03-14 16:42:20'),
(13, 6, 3, 9, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-14 16:42:20', '2026-03-14 16:42:20'),
(14, 6, 3, 10, 0.00, 0.00, 0.00, 0.00, 'bank_transfer', 'pending', NULL, NULL, NULL, NULL, '2026-03-14 16:42:20', '2026-03-14 16:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `performance_metrics`
--

CREATE TABLE `performance_metrics` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `metric_type` enum('api_response','page_load','query_time','memory_usage','cpu_usage') NOT NULL,
  `endpoint` varchar(500) DEFAULT NULL,
  `value` decimal(10,4) NOT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `sample_count` int(10) DEFAULT 1,
  `min_value` decimal(10,4) DEFAULT NULL,
  `max_value` decimal(10,4) DEFAULT NULL,
  `avg_value` decimal(10,4) DEFAULT NULL,
  `p95_value` decimal(10,4) DEFAULT NULL,
  `metadata` text DEFAULT NULL COMMENT 'JSON encoded metadata',
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate_limits`
--

CREATE TABLE `rate_limits` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `endpoint` varchar(500) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `request_count` int(10) DEFAULT 1,
  `limit_reached` tinyint(1) DEFAULT 0,
  `first_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `window_reset` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recovery_points`
--

CREATE TABLE `recovery_points` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `backup_id` int(10) UNSIGNED DEFAULT NULL,
  `point_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `recovery_type` enum('full','partial','data_only','schema_only') DEFAULT 'full',
  `tables_included` text DEFAULT NULL COMMENT 'JSON array of tables',
  `status` enum('available','restoring','restored','failed') DEFAULT 'available',
  `file_path` varchar(500) DEFAULT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `checksum` varchar(64) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `restored_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_cards`
--

CREATE TABLE `report_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `academic_term_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `generated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_path` varchar(500) DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT 0,
  `published_by` int(10) UNSIGNED DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `permissions` text DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `school_id`, `name`, `slug`, `description`, `permissions`, `is_system`, `created_at`) VALUES
(1, 6, 'Super Administrator', 'super_admin', 'Has full access to all features', '[\"*\"]', 1, '2026-02-18 17:11:36'),
(2, 6, 'School Administrator', 'school_admin', 'Manages school operations', '[\"dashboard.view\", \"students.*\", \"teachers.*\", \"classes.*\", \"attendance.*\", \"exams.*\", \"fees.*\", \"reports.*\", \"settings.*\"]', 1, '2026-02-18 17:11:36'),
(3, 6, 'Teacher', 'teacher', 'Can manage classes and students', '[\"dashboard.view\", \"attendance.mark\", \"grades.enter\", \"homework.*\", \"students.view\"]', 1, '2026-02-18 17:11:36'),
(4, 6, 'Student', 'student', 'Can view their own information', '[\"dashboard.view\", \"timetable.view\", \"grades.view\", \"homework.view\"]', 1, '2026-02-18 17:11:36'),
(5, 6, 'Parent', 'parent', 'Can view child information', '[\"dashboard.view\", \"children.view\", \"attendance.view\", \"fees.view\"]', 1, '2026-02-18 17:11:36'),
(6, 6, 'Accountant', 'accountant', 'Manages financial operations', '[\"dashboard.view\", \"fees.*\", \"payments.*\", \"invoices.*\", \"reports.financial\"]', 1, '2026-02-18 17:11:36'),
(7, 6, 'Librarian', 'librarian', 'Manages library operations', '[\"dashboard.view\", \"library.*\"]', 1, '2026-02-18 17:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `capacity` int(10) UNSIGNED DEFAULT 40,
  `class_teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `school_id`, `class_id`, `name`, `code`, `room_number`, `capacity`, `class_teacher_id`, `is_active`, `created_at`) VALUES
(1, 6, 1, 'section a', 'a', 'A101', 20, NULL, 1, '2026-03-04 20:30:38'),
(2, 6, 2, 'afternoon', 'noon', 'b202', 19, NULL, 1, '2026-03-05 18:34:35'),
(3, 6, 3, 'evening', 'e', 'c303', 16, NULL, 1, '2026-03-06 08:02:10'),
(4, 6, 12, 'Section A', 'A', 'A101', 20, NULL, 1, '2026-03-09 11:54:33'),
(5, 6, 4, 'Section A', 'A', '101', 12, 18, 1, '2026-03-12 09:47:57'),
(6, 6, 12, 'section b', 'SEc B', '', 20, 20, 1, '2026-03-12 09:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `security_logs`
--

CREATE TABLE `security_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `event_type` enum('login_attempt','failed_login','password_change','session_start','session_end','suspicious_activity','blocked_ip') NOT NULL,
  `severity` enum('low','medium','high','critical') DEFAULT 'low',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `resolved` tinyint(1) DEFAULT 0,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `resolved_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(50) DEFAULT 'string',
  `category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `school_id`, `key`, `value`, `type`, `category`, `created_at`, `updated_at`) VALUES
(1, 6, 'school_name', 'bitflux wallet', 'string', 'general', '2026-02-18 17:11:36', '2026-03-03 14:08:57'),
(2, 6, 'school_email', 'safebit99@gmail.com', 'string', 'general', '2026-02-18 17:11:36', '2026-03-03 14:08:57'),
(3, 6, 'school_phone', '+18119999755', 'string', 'general', '2026-02-18 17:11:36', '2026-03-03 14:08:57'),
(4, 6, 'school_address', '', 'string', 'general', '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(5, 6, 'currency', 'NGN', 'string', 'financial', '2026-02-18 17:11:36', '2026-03-03 14:08:57'),
(6, 6, 'currency_symbol', '₦', 'string', 'financial', '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(7, 6, 'attendance_method', 'daily', 'string', 'academic', '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(8, 6, 'grading_system', 'percentage', 'string', 'academic', '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(9, 6, 'result_publish', 'immediate', 'string', 'academic', '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(10, 6, 'fee_due_days', '30', 'number', 'financial', '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(11, 6, 'late_fee_percentage', '5', 'number', 'financial', '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(12, 6, 'address', '123 walkers street123 walkers street', 'string', NULL, '2026-03-03 13:55:58', '2026-03-03 14:08:57'),
(13, 6, 'city', 'new york', 'string', NULL, '2026-03-03 13:55:58', '2026-03-03 14:08:57'),
(14, 6, 'state', 'Abia', 'string', NULL, '2026-03-03 13:55:58', '2026-03-03 14:08:57'),
(15, 6, 'country', 'Nigeria', 'string', NULL, '2026-03-03 13:55:58', '2026-03-03 14:08:57'),
(16, 6, 'postal_code', '40012', 'string', NULL, '2026-03-03 13:55:58', '2026-03-03 14:08:57'),
(17, 6, 'timezone', 'Africa/Lagos', 'string', NULL, '2026-03-03 13:55:58', '2026-03-03 14:08:57'),
(18, 6, 'language', 'en', 'string', NULL, '2026-03-03 13:55:58', '2026-03-03 14:08:57'),
(19, 6, 'school_description', 'tesztibg', 'string', NULL, '2026-03-03 13:55:58', '2026-03-03 14:08:57'),
(20, 6, 'mission_statement', 'testing', 'string', NULL, '2026-03-03 14:07:41', '2026-03-03 14:08:57'),
(21, 6, 'vision_statement', 'testig', 'string', NULL, '2026-03-03 14:07:41', '2026-03-03 14:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `sick_visits`
--

CREATE TABLE `sick_visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time DEFAULT NULL,
  `symptoms` text NOT NULL,
  `temperature` decimal(4,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `treatment` text DEFAULT NULL,
  `medication_given` text DEFAULT NULL,
  `referred_to` varchar(255) DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `attended_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'User ID of nurse/doctor',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `recipient` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `sender_id` varchar(20) DEFAULT NULL,
  `message_id` varchar(100) DEFAULT NULL,
  `status` enum('pending','sent','delivered','failed','undelivered') DEFAULT 'pending',
  `status_code` varchar(50) DEFAULT NULL,
  `status_message` text DEFAULT NULL,
  `cost` decimal(8,4) DEFAULT NULL,
  `units` int(10) DEFAULT NULL,
  `provider` varchar(50) DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `clock_in_time` timestamp NULL DEFAULT NULL,
  `clock_out_time` timestamp NULL DEFAULT NULL,
  `clock_in_lat` decimal(10,8) DEFAULT NULL,
  `clock_in_lng` decimal(11,8) DEFAULT NULL,
  `clock_out_lat` decimal(10,8) DEFAULT NULL,
  `clock_out_lng` decimal(11,8) DEFAULT NULL,
  `clock_in_ip` varchar(45) DEFAULT NULL,
  `clock_out_ip` varchar(45) DEFAULT NULL,
  `clock_in_method` enum('manual','biometric','location','mobile') DEFAULT 'manual',
  `clock_out_method` enum('manual','biometric','location','mobile') DEFAULT 'manual',
  `status` enum('present','absent','late','half_day','holiday') DEFAULT 'present',
  `work_hours` decimal(5,2) GENERATED ALWAYS AS (timestampdiff(HOUR,`clock_in_time`,`clock_out_time`)) STORED COMMENT 'Calculated work hours',
  `approved_by` int(10) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storage_usage`
--

CREATE TABLE `storage_usage` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `storage_type` enum('database','files','backups','attachments') NOT NULL,
  `used_bytes` bigint(20) DEFAULT 0,
  `limit_bytes` bigint(20) DEFAULT 1073741824,
  `file_count` int(10) DEFAULT 0,
  `last_calculated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_usage`
--

INSERT INTO `storage_usage` (`id`, `school_id`, `storage_type`, `used_bytes`, `limit_bytes`, `file_count`, `last_calculated`, `created_at`) VALUES
(1, 6, 'database', 0, 1073741824, 0, '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(2, 6, 'files', 0, 1073741824, 0, '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(3, 6, 'backups', 0, 536870912, 0, '2026-02-18 17:11:36', '2026-02-18 17:11:36'),
(4, 6, 'attachments', 0, 536870912, 0, '2026-02-18 17:11:36', '2026-02-18 17:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `admission_number` varchar(50) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `admission_date` date NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `mother_tongue` varchar(100) DEFAULT NULL,
  `current_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `previous_school` varchar(255) DEFAULT NULL,
  `previous_class` varchar(100) DEFAULT NULL,
  `transfer_certificate_no` varchar(100) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `medical_conditions` text DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `doctor_phone` varchar(20) DEFAULT NULL,
  `status` enum('active','inactive','graduated','transferred','withdrawn') DEFAULT 'active',
  `graduation_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `campus_id`, `user_id`, `admission_number`, `roll_number`, `class_id`, `section_id`, `admission_date`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `birth_place`, `nationality`, `mother_tongue`, `current_address`, `permanent_address`, `previous_school`, `previous_class`, `transfer_certificate_no`, `blood_group`, `allergies`, `medical_conditions`, `doctor_name`, `doctor_phone`, `status`, `graduation_date`, `created_at`, `updated_at`) VALUES
(1, 6, NULL, 3, 'BIT-2025-0001', '3', 1, 1, '2026-03-05', 'favour', 'nzube', 'Zubetech', '2020-03-05', NULL, NULL, NULL, 'chokocho', 'etche', 'nobsams', 'ss3', 'null', 'A+', 'null', 'null', 'okafor', '08033480654', 'active', NULL, '2026-03-05 12:59:28', '2026-03-05 16:14:50'),
(2, 6, NULL, 5, 'BIT-2025-0002', '3', 13, 3, '2026-03-05', 'Bibi', 'Steph', 'Agundu', '2006-10-05', NULL, NULL, NULL, 'Umuchima', 'Etche', 'Damtoj', 'Ss3', '2943283', 'O+', 'Dust', 'Ulcer', '', '', 'active', NULL, '2026-03-05 14:01:27', '2026-03-09 22:58:02'),
(3, 6, NULL, 10, 'BIT-2025-0003', '4', 2, 2, '2026-03-06', 'Uzochukwu', 'Kosisochukwu', 'Jessica', '2007-10-07', NULL, NULL, NULL, 'eliozu portharcourt', '2047 Walt Nuzum Farm Road', 'FGGC Abuloma', 'jss3', 'null', 'O+', 'null', 'null', '', '', 'active', NULL, '2026-03-06 07:52:59', '2026-03-06 07:52:59'),
(4, 6, NULL, 14, 'BIT-2025-0004', '2', 2, 2, '2026-03-09', 'Allen', 'Firi', 'Faith', '2006-06-23', NULL, NULL, NULL, 'etche', 'igbo etech', 'International Unity School', 'JSS1', 'null', 'B+', 'null', 'null', '', '', 'active', NULL, '2026-03-09 10:14:57', '2026-03-09 10:14:57'),
(5, 6, NULL, 16, 'BIT-2025-0005', '1', 2, 2, '2026-03-09', 'obinna', 'emmanuel', 'uzodinma', '2006-03-09', NULL, NULL, NULL, 'chokocho etche rivers state', 'etche', 'ulakwo primary school', 'primary 5', '2005-3949', 'A-', 'null', 'null', '', '', 'active', NULL, '2026-03-09 11:30:05', '2026-03-09 11:30:05'),
(14, 6, NULL, 37, 'BIT-2025-0006', '1', 13, NULL, '2026-03-11', 'prosper', 'eche', 'checz', '1998-09-02', NULL, NULL, NULL, 'etche', 'chokocho\r\netche', 'Wisdom Gate', 'jss2', '2098-2982', 'O+', 'null', 'null', '', '', 'active', NULL, '2026-03-11 07:12:33', '2026-03-11 07:12:33'),
(21, 6, NULL, 65, 'BIT-2025-0007', '1', 4, 5, '2025-09-11', 'Uzochukwu', 'Chiemela', 'Victory', '2023-11-02', NULL, NULL, NULL, 'Igwuruta, Rivers State', 'Igwuruta, Rivers State', '', '', '', '', 'null', 'Asthma', '', '', 'active', NULL, '2026-03-12 10:28:06', '2026-03-12 10:39:27'),
(22, 6, NULL, 66, 'BIT-2025-0008', '1', 4, 5, '2025-09-11', 'Unagbu', 'Chioma', 'Rita', '2023-07-09', NULL, NULL, NULL, 'Okomoko, Rivers State', 'Okomoko, Rivers State', '', '', '', 'O-', 'null', 'null', '', '', 'active', NULL, '2026-03-12 10:33:48', '2026-03-12 10:33:48'),
(23, 6, NULL, 68, 'BIT-2025-0009', '1', 4, 5, '2025-09-11', 'Okoye', 'Nwabuogo', 'Maryann', '2023-04-08', NULL, NULL, NULL, 'Igbo-Etche, Rivers State', 'Igbo-Etche, Rivers State', '', '', '', '', 'null', 'null', '', '', 'active', NULL, '2026-03-12 10:38:13', '2026-03-12 10:39:00'),
(24, 6, NULL, 69, 'BIT-2025-0010', '1', 4, 5, '2025-09-11', 'Adeyemi', 'Toluwani', 'Hephzibah', '2023-08-19', NULL, NULL, NULL, 'Umuechem, Rivers State', 'Umuechem, Rivers State', '', '', '', 'B+', 'null', 'null', '', NULL, 'active', NULL, '2026-03-12 10:43:02', '2026-03-12 10:43:02'),
(25, 6, NULL, 70, 'BIT-2025-0011', '2', 4, 5, '2025-09-11', 'Adetifa', 'Mayorkun', 'Israel', '2023-10-01', NULL, NULL, NULL, 'Okomoko, Rivers State', 'Okomoko, Rivers State', '', '', '', 'B-', 'null', 'null', '', NULL, 'active', NULL, '2026-03-12 10:50:43', '2026-03-12 10:50:43'),
(26, 6, NULL, 71, 'BIT-2025-0012', '2', 4, 5, '2025-09-11', 'Ovieva', 'Oghenetega', 'Favour', '2023-10-04', NULL, NULL, NULL, 'Umuechem, Rivers State', 'Umuechem, Rivers State', '', '', '', 'O-', 'null', 'null', '', NULL, 'active', NULL, '2026-03-12 10:57:28', '2026-03-12 10:57:28'),
(27, 6, NULL, 72, 'BIT-2025-0013', '2', 4, 5, '2025-09-11', 'Tamuno', 'Biebele', 'Rejoice', '2023-02-07', NULL, NULL, NULL, 'Igbo-Etche, Rivers State', 'Igbo-Etche, Rivers State', '', '', '', 'O-', 'null', 'null', '', NULL, 'active', NULL, '2026-03-12 11:00:17', '2026-03-12 11:00:17'),
(28, 6, NULL, 73, 'BIT-2025-0014', '2', 4, 5, '2025-09-11', 'Bagshaw', 'Biobele', 'Joy', '2023-05-12', NULL, NULL, NULL, 'Igwuruta, Rivers State', 'Igwuruta, Rivers State', '', '', '', 'B-', 'null', 'null', '', NULL, 'active', NULL, '2026-03-12 11:05:59', '2026-03-12 11:05:59'),
(29, 6, NULL, 74, 'BIT-2025-0015', '3', 4, 5, '2025-09-11', 'Ogbuogu', 'Chibuenyim', 'Christopher', '2023-04-06', NULL, NULL, NULL, 'Umuechem, Rivers State', 'Umuechem, Rivers State', '', '', '', 'O-', 'null', 'null', '', NULL, 'active', NULL, '2026-03-12 11:08:19', '2026-03-12 11:08:19'),
(30, 6, NULL, 75, 'BIT-2025-0016', '3', 4, 5, '2025-09-11', 'Sylvester', 'Onyedikachi', 'Favour', '2023-12-06', NULL, NULL, NULL, 'Chokocho, Rivers State', 'Chokocho, Rivers State', '', '', '', 'O+', 'null', 'null', '', NULL, 'active', NULL, '2026-03-12 11:11:28', '2026-03-12 11:58:30'),
(31, 6, NULL, 76, 'BIT-2025-0017', '3', 4, 5, '2025-09-11', 'Okere', 'Iheanyi', 'Francis', '2023-02-12', NULL, NULL, NULL, 'Chokocho, Rivers State', 'Chokocho, Rivers State', '', '', '', 'AB+', 'null', 'null', '', NULL, 'active', NULL, '2026-03-12 11:13:52', '2026-03-12 11:13:52'),
(32, 6, NULL, 77, 'BIT-2025-0018', '3', 4, 5, '2025-09-11', 'Amadi', 'Kelechi', 'ThankGod', '2023-03-12', NULL, NULL, NULL, 'Umuchem, Rivers State', 'Umuchem, Rivers State', '', '', '', 'AB+', 'null', 'null', '', NULL, 'active', NULL, '2026-03-12 11:21:26', '2026-03-29 08:55:54'),
(33, 6, NULL, 81, 'BIT-2025-0019', '5', 2, 2, '2026-03-14', 'David', 'Chi', 'Aniago', '2020-03-14', NULL, NULL, NULL, 'Bom', 'Bag', 'Gh', 'R', '34', 'O-', 'Null', 'Null', '', NULL, 'active', NULL, '2026-03-14 04:29:07', '2026-03-24 08:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `student_health_records`
--

CREATE TABLE `student_health_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `chronic_conditions` text DEFAULT NULL,
  `disabilities` text DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_phone` varchar(20) DEFAULT NULL,
  `emergency_contact_relation` varchar(50) DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `doctor_phone` varchar(20) DEFAULT NULL,
  `doctor_address` text DEFAULT NULL,
  `insurance_provider` varchar(255) DEFAULT NULL,
  `insurance_policy` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_promotions`
--

CREATE TABLE `student_promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `from_academic_year_id` int(10) UNSIGNED NOT NULL,
  `to_academic_year_id` int(10) UNSIGNED NOT NULL,
  `from_class_id` int(10) UNSIGNED NOT NULL,
  `to_class_id` int(10) UNSIGNED NOT NULL,
  `from_section_id` int(10) UNSIGNED DEFAULT NULL,
  `to_section_id` int(10) UNSIGNED DEFAULT NULL,
  `from_campus_id` int(10) UNSIGNED DEFAULT NULL,
  `to_campus_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_date` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_promotions`
--

INSERT INTO `student_promotions` (`id`, `school_id`, `student_id`, `from_academic_year_id`, `to_academic_year_id`, `from_class_id`, `to_class_id`, `from_section_id`, `to_section_id`, `from_campus_id`, `to_campus_id`, `promotion_date`, `remarks`, `created_by`, `created_at`) VALUES
(1, 6, 2, 1, 1, 1, 13, 1, 3, NULL, NULL, '2026-03-09', '', 1, '2026-03-09 22:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `student_transport`
--

CREATE TABLE `student_transport` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `assignment_id` int(10) UNSIGNED NOT NULL,
  `stop_id` int(10) UNSIGNED NOT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `type` enum('core','elective','extra_curricular') DEFAULT 'core',
  `description` text DEFAULT NULL,
  `credit_hours` decimal(4,1) DEFAULT 1.0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `school_id`, `name`, `code`, `type`, `description`, `credit_hours`, `is_active`, `created_at`) VALUES
(1, 6, 'mathematic', 'maths', 'core', 'easy', 1.0, 1, '2026-03-04 20:29:35'),
(2, 6, 'english', 'eng101', 'core', '', 1.0, 1, '2026-03-05 18:34:56'),
(3, 6, 'Basic Science', 'BSc', 'core', '', 1.0, 1, '2026-03-06 08:03:35'),
(4, 6, 'Basic Technnology', 'B.tech', 'core', '', 1.0, 1, '2026-03-06 08:07:39'),
(5, 6, 'Creative and cultural art', 'CCA', 'core', '', 1.0, 1, '2026-03-06 08:09:36'),
(6, 6, 'Civic Education', 'CEd', 'elective', '', 1.0, 1, '2026-03-06 08:12:06'),
(7, 6, 'French', 'Frn', 'elective', '', 1.0, 1, '2026-03-06 08:13:22'),
(8, 6, 'Igbo', 'IGB', 'elective', '', 1.0, 1, '2026-03-06 08:14:34'),
(9, 6, 'Social Studies', 'SOS', 'core', '', 1.0, 1, '2026-03-06 08:17:05'),
(10, 6, 'Yoruba', 'YOR', 'elective', '', 1.0, 1, '2026-03-06 08:18:38'),
(11, 6, 'Hausa', 'HSA', 'elective', '', 1.0, 1, '2026-03-06 08:19:09'),
(12, 6, 'Christian Religious Knowledge', 'CRK', 'elective', '', 1.0, 1, '2026-03-06 08:20:53'),
(13, 6, 'History', 'HST', 'elective', '', 1.0, 1, '2026-03-06 08:21:51'),
(14, 6, 'Geography', 'GEO', 'elective', '', 1.0, 1, '2026-03-06 08:22:15'),
(15, 6, 'Chemistry', 'CHEM', 'core', '', 1.0, 1, '2026-03-06 08:22:35'),
(16, 6, 'Biology ', 'BIO', 'core', '', 1.0, 1, '2026-03-06 08:22:59'),
(17, 6, 'Physics', 'PHY', 'core', '', 1.0, 1, '2026-03-06 08:23:31'),
(18, 6, 'Economics', 'ECO', 'elective', '', 1.0, 1, '2026-03-06 08:24:40'),
(19, 6, 'Verbal Reasoning', 'VRB', 'elective', '', 1.0, 1, '2026-03-06 08:26:30'),
(20, 6, 'Quantitative Reasoning ', 'QTR', 'elective', '', 1.0, 1, '2026-03-06 08:28:51'),
(21, 6, 'Further Mathematics', 'F.Maths', 'elective', '', 1.0, 1, '2026-03-06 08:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `plan_id` varchar(50) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `status` enum('active','pending','cancelled','expired','past_due') DEFAULT 'pending',
  `billing_cycle` enum('monthly','quarterly','yearly') DEFAULT 'monthly',
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) DEFAULT 'NGN',
  `storage_limit` bigint(20) DEFAULT 1073741824,
  `user_limit` int(10) DEFAULT 100,
  `student_limit` int(10) DEFAULT 500,
  `features` text DEFAULT NULL COMMENT 'JSON encoded features',
  `current_period_start` date NOT NULL,
  `current_period_end` date NOT NULL,
  `cancel_at_period_end` tinyint(1) DEFAULT 0,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `school_id`, `plan_id`, `plan_name`, `status`, `billing_cycle`, `amount`, `currency`, `storage_limit`, `user_limit`, `student_limit`, `features`, `current_period_start`, `current_period_end`, `cancel_at_period_end`, `cancelled_at`, `trial_ends_at`, `created_at`, `updated_at`) VALUES
(1, 6, 'free_tier', 'Free Plan', 'active', 'monthly', 0.00, 'NGN', 1073741824, 100, 500, NULL, '2026-02-18', '2026-03-18', 0, NULL, NULL, '2026-02-18 17:11:36', '2026-02-18 17:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `system_alerts`
--

CREATE TABLE `system_alerts` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `alert_type` enum('storage_limit','user_limit','subscription_expiry','payment_failed','performance_issue','security_issue','system_error') NOT NULL,
  `severity` enum('info','warning','error','critical') DEFAULT 'info',
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `data` text DEFAULT NULL COMMENT 'JSON encoded data',
  `is_resolved` tinyint(1) DEFAULT 0,
  `resolved_at` timestamp NULL DEFAULT NULL,
  `resolved_by` int(10) UNSIGNED DEFAULT NULL,
  `resolution_notes` text DEFAULT NULL,
  `acknowledged` tinyint(1) DEFAULT 0,
  `acknowledged_at` timestamp NULL DEFAULT NULL,
  `acknowledged_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `experience_years` int(10) UNSIGNED DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `leaving_date` date DEFAULT NULL,
  `salary_grade` varchar(50) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `school_id`, `user_id`, `employee_id`, `qualification`, `specialization`, `experience_years`, `joining_date`, `leaving_date`, `salary_grade`, `bank_name`, `bank_account`, `ifsc_code`, `is_active`) VALUES
(3, 6, 9, 'TCH-2026-8367', 'bsc', 'mathematic', 1, '2026-03-06', NULL, NULL, 'kuda', '2032909568', '23423', 1),
(4, 6, 12, 'TCH-2026-2653', 'bsc', 'Basic Technnology, Chemistry', 5, '2026-03-06', NULL, NULL, '', '', '', 1),
(5, 6, 17, 'TCH-2026-3448', 'bsc', 'Christian Religious Knowledge, Civic Education', 3, '2026-03-08', NULL, NULL, '', '1874611392', '', 1),
(6, 6, 18, 'TCH-2026-4791', 'Bsc', 'mathematic, Quantitative Reasoning ', 2, '2026-03-02', NULL, NULL, '', '', '', 1),
(7, 6, 19, 'TCH-2026-0542', 'Bsc', 'Further Mathematics, mathematic, Physics', 7, '2026-02-20', NULL, NULL, '', '', '', 1),
(8, 6, 20, 'TCH-2026-8371', 'Bsc', 'Basic Science, Basic Technnology, Biology ', 9, '2023-03-13', NULL, NULL, '', '', '', 1),
(9, 6, 39, 'TCH-2026-8372', 'O level', 'Yoruba', 1, '2026-03-12', NULL, NULL, '', '', '', 1),
(10, 6, 78, 'TCH-2026-8373', 'B.Sc', 'mathematic, Quantitative Reasoning ', 7, '2019-04-12', NULL, NULL, '', '', '', 1),
(11, 6, 79, 'TCH-2026-8374', 'B.Ed', 'english, Social Studies, Verbal Reasoning', 6, '2020-08-19', NULL, NULL, '', '', '', 1),
(12, 6, 80, 'TCH-2026-8375', 'B.Ed', 'Christian Religious Knowledge, Civic Education, Economics', 8, '2020-07-10', NULL, NULL, '', '', '', 1),
(13, 6, 83, 'TCH-2026-8376', '', 'Christian Religious Knowledge, Civic Education', NULL, '2025-06-02', NULL, NULL, 'Access Bank', '1877099835', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `academic_term_id` int(10) UNSIGNED NOT NULL,
  `day` enum('monday','tuesday','wednesday','thursday','friday','saturday') NOT NULL,
  `period_number` int(10) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `is_break` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `school_id`, `class_id`, `section_id`, `academic_year_id`, `academic_term_id`, `day`, `period_number`, `start_time`, `end_time`, `subject_id`, `teacher_id`, `room_number`, `is_break`, `created_at`) VALUES
(1, 6, 2, NULL, 1, 2, 'monday', 1, '09:00:00', '09:45:00', 2, 9, 'A101', 0, '2026-03-05 21:08:10'),
(2, 6, 2, NULL, 1, 2, 'monday', 2, '09:45:00', '10:30:00', 1, 9, 'R202', 0, '2026-03-06 01:29:55'),
(3, 6, 12, NULL, 1, 2, 'tuesday', 3, '09:00:00', '09:45:00', 1, 19, 'A1', 0, '2026-03-10 12:32:05'),
(4, 6, 2, NULL, 1, 2, 'monday', 3, '10:00:00', '10:45:00', 5, 19, 'D101', 0, '2026-03-10 12:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `transport_assignments`
--

CREATE TABLE `transport_assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `route_id` int(10) UNSIGNED NOT NULL,
  `academic_term_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `morning_driver` varchar(255) DEFAULT NULL,
  `evening_driver` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_routes`
--

CREATE TABLE `transport_routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `route_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `start_point` varchar(255) NOT NULL,
  `end_point` varchar(255) NOT NULL,
  `distance_km` decimal(5,2) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_stops`
--

CREATE TABLE `transport_stops` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `route_id` int(10) UNSIGNED NOT NULL,
  `stop_name` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `stop_order` int(10) UNSIGNED DEFAULT 0,
  `pickup_time` time DEFAULT NULL,
  `dropoff_time` time DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_vehicles`
--

CREATE TABLE `transport_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `campus_id` int(10) UNSIGNED NOT NULL,
  `vehicle_number` varchar(50) NOT NULL,
  `registration_number` varchar(50) DEFAULT NULL,
  `type` enum('bus','van','car') DEFAULT 'bus',
  `capacity` int(10) UNSIGNED NOT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `driver_phone` varchar(20) DEFAULT NULL,
  `driver_license` varchar(100) DEFAULT NULL,
  `assistant_name` varchar(255) DEFAULT NULL,
  `assistant_phone` varchar(20) DEFAULT NULL,
  `insurance_expiry` date DEFAULT NULL,
  `fitness_expiry` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('admin','teacher','student','parent','accountant','librarian','receptionist') NOT NULL,
  `profile_photo` varchar(500) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(45) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `reset_token` varchar(100) DEFAULT NULL,
  `reset_token_expires` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `school_id`, `name`, `email`, `phone`, `username`, `password`, `user_type`, `profile_photo`, `gender`, `date_of_birth`, `blood_group`, `religion`, `address`, `email_verified_at`, `phone_verified_at`, `is_active`, `last_login_at`, `last_login_ip`, `remember_token`, `reset_token`, `reset_token_expires`, `created_at`, `updated_at`) VALUES
(1, 6, 'bitflux wallet', 'safebit99@gmail.com', '+18119999755', NULL, '$2y$12$6PMv0yocTPOo6Hv2zeDVAOgYVjinNSQN9ORGV4Fr3.FXhoRKeXawG', 'admin', '/assets/uploads/profiles/6/profile_1_1773140938.jpg', 'male', NULL, 'A+', 'chirstian', NULL, NULL, NULL, 1, '2026-04-11 17:06:40', '143.105.174.106', NULL, NULL, NULL, '2026-02-18 17:11:36', '2026-04-11 17:06:40'),
(3, 6, 'favour nzube Zubetech', 'zubetechhub@gmail.com', '09070525288', 'zubetechhub', '$2y$12$etcmzezxAZD8lHAehh3vhutMcZnY7SccctdFzkyMv/ZEjm2mgdmyC', 'student', NULL, 'male', '2020-03-05', NULL, NULL, 'chokocho', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-05 12:59:28', '2026-03-05 16:14:50'),
(4, 6, 'hennry uzodima', 'zubetechhub3@gmail.com', '07042424553', 'zubetechhub3', '$2y$12$E7uW0cXDw0qc3gxlXac5jO99eiBLuTEY.9mdI/elGCT2ZULlv2KQe', 'parent', NULL, NULL, NULL, NULL, NULL, 'chokocho\r\netche', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-05 12:59:29', '2026-03-05 12:59:29'),
(5, 6, 'Bibi Steph Agundu', 'fs@gmail.com', '080525288', 'fs', '$2y$12$.cEjbQY0W1.fJRGa4.Y6reTfa.eLpK6jbyd/nuQbpTqYhAr0MI8tS', 'student', NULL, 'female', '2006-10-05', NULL, NULL, 'Umuchima', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-05 14:01:27', '2026-03-09 22:39:19'),
(6, 6, 'Fatima', 'fhj@gmail.con', '0804344545', 'fhj', '$2y$12$KZcSEtHnX3hLoNI2ySYNouAaK3lQJyTdiaVIQRYLN7o6AWKN74lay', 'parent', NULL, NULL, NULL, NULL, NULL, 'Etch', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-05 14:01:27', '2026-03-05 14:01:27'),
(9, 6, 'brook harry', 'favouruzodinma55@gmail.com', '909888766', 'favouruzodinma55', '$2y$12$OeWFDgIIIsggNMDfKBS9gOdRlHA4SBa4Qu8FofN8kUDI5Gu8MidzO', 'teacher', NULL, 'male', '1991-06-06', NULL, NULL, 'Sbagha Bagha', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-05 19:03:03', '2026-03-09 20:33:12'),
(10, 6, 'Uzochukwu Kosisochukwu Jessica', 'uzochukwukosisochukwu046@gmail.com', '07041390038', 'uzochukwukosisochukwu046', '$2y$12$x3tC9pzPLSQTRq7lGcfVp.R5otog2GdhTRR/l7Sks3ifCX72IRA02', 'student', NULL, 'female', '2007-10-07', NULL, NULL, 'eliozu portharcourt', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-06 07:52:59', '2026-03-09 05:24:15'),
(11, 6, 'Emezie Ngozi', 'ngozionyebuchin@gmail.com', '07061052210', 'ngozionyebuchin', '$2y$12$4XoRSauETseO/iwF6Jm0Webux3Tor3KGdEGKZmhX1rYQAnsz3w4G6', 'parent', NULL, NULL, NULL, NULL, NULL, 'eliozu portharcourt', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-06 07:52:59', '2026-03-06 07:52:59'),
(12, 6, 'Maxwell Acheampong', 'bitfluxwallet@gmail.com', '8119999755', 'bitfluxwallet', '$2y$12$ExUglz7CNZ2Tuv6CQS1IruzaYK6qvBJj5BzlRU5isy.uo.iCjBXam', 'teacher', NULL, 'male', '2026-03-19', NULL, NULL, '123 walkers street', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-06 08:28:09', '2026-03-06 08:28:09'),
(13, 6, 'Emezie IKe', 'mutexia21@gmail.com', '585-415-1576', 'mutexia21', '$2y$12$VVpX7.y2GidgodEZtnIwReL1n7K908lXKhjmOpEHc3yDixJ.1Lx5S', 'parent', NULL, 'male', NULL, NULL, NULL, '2047 Walt Nuzum Farm Road', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-06 09:16:26', '2026-03-06 18:15:42'),
(14, 6, 'Allen Firi Faith', 'amina2006@gmail.com', '0907052500', 'amina2006', '$2y$12$CsfUsHH4jNtf/wgDc4ZFguUi2YZ7rtBKbNBB7Y1VTRKQIZk.v5.VG', 'student', NULL, 'female', '2006-06-23', NULL, NULL, 'etche', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-09 10:14:57', '2026-03-09 10:14:57'),
(15, 6, 'Allen Ateli', 'aminfather@gmail.com', '07061052211', 'aminfather', '$2y$12$WPbz1jJm0Htw9VO/eJW9QuhO/5cGhSvil2ZPMZvuokBjoypRzjTvq', 'parent', NULL, NULL, NULL, NULL, NULL, 'chokocho\r\netche', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-09 10:14:58', '2026-03-09 10:14:58'),
(16, 6, 'obinna emmanuel uzodinma', 'emmaobinna@gmail.com', '08119999775', 'emmaobinna', '$2y$12$CF6SRog7CuMGSFUScIqmNe5wR8PwZ5f/E.pLtUtWRbyqLdjdba6IK', 'student', NULL, 'male', '2006-03-09', NULL, NULL, 'chokocho etche rivers state', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-09 11:30:05', '2026-03-09 11:30:05'),
(17, 6, 'Samuel Sharon', 'samuelsharon@gmail.com', '08144162281', 'samuelsharon', '$2y$12$Y7vCJO91FjgGOSXAscIfL.5Khmmv3AsILCyQ9my2JStrCNuUEerq2', 'teacher', NULL, 'female', '2002-07-02', NULL, NULL, 'Rumuodumaya, Rivers State.', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-09 11:52:42', '2026-03-09 11:52:42'),
(18, 6, 'Ibim Dokubo Shannel', 'shannelibimdokubo@gmail.com', '08177896543', 'shannelibimdokubo', '$2y$12$t0oN2hkcHpLXkD/zM.t0bOgtC/3CPyK2R8mNliB0ZyPr6Fjcbnwtq', 'teacher', NULL, 'female', '2005-06-10', NULL, NULL, 'AGIP, Port Harcourt', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-09 12:23:49', '2026-03-09 12:23:49'),
(19, 6, 'Onyebuchi Maurice', 'mauricechukwunenye@gmail.com', '07011432678', 'mauricechukwunenye', '$2y$12$8yyhl9nRFOBhJh57cwPze.gim24hmxEbIWylDJ5o0mc8KfI02V.0y', 'teacher', NULL, 'male', '1999-04-26', NULL, NULL, 'Rumuomasi, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-09 12:31:48', '2026-03-09 12:31:48'),
(20, 6, 'Nwosu Jude', 'judejudon114@gmail.com', '08076593005', 'judejudon114', '$2y$12$.R9P2bwA34//vx.2EjlvWu6Rb/TLJ56vEAr0nrMuFGwikJPn8/QYi', 'teacher', NULL, 'male', '2002-08-19', NULL, NULL, 'Amadi Road, Rivers State.', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-09 12:46:31', '2026-03-09 12:46:31'),
(37, 6, 'prosper eche checz', 'prosper.checz@student.bitflux-wallet-1771434696', '', 'prosper.checz', '$2y$12$Jp7cMB/2z59nKsHxCYTSKeoY81joXU4XbvZzA7RBSEo7TquXgNzj6', 'student', NULL, 'male', '1998-09-02', NULL, NULL, 'etche', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-11 07:12:33', '2026-03-11 07:12:33'),
(38, 6, 'james checz', 'jameschecz@gmail.com', '0908888288', 'jameschecz', '$2y$12$BFY701JnjPeTGvTfPlgIVePvq6m.gj8EEtzAFGaMsb2WKeAbOZhRW', 'parent', NULL, NULL, NULL, NULL, NULL, 'umuahia town , gae junction', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-11 07:12:33', '2026-03-11 07:12:33'),
(39, 6, 'Solomon amaechi', 'solomon@gmail.com', '08119999755', 'solomon', '$2y$12$H43w.SxyNSMqMnsN5OWh5.5Ga1X9ug.Fx8c/VWm9Z8ht9fruK4xae', 'teacher', NULL, 'male', '1986-03-12', NULL, NULL, '', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-11 18:09:55', '2026-03-11 18:09:55'),
(52, 6, 'Uzochukwu Uzomaka Rachael', 'uzoamakarach678@mail.com', '707-308-9496', 'uzoamakarach678', '$2y$12$kHwnaf8BstRkIC2Y/zVxXOEiSIlwN0vWYCF8ZhBTKVcHJ25ArptRO', 'parent', NULL, 'female', NULL, NULL, NULL, 'Igwuruta, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 09:19:07', '2026-03-12 09:19:07'),
(53, 6, 'Unagbu Udochukwu Simon', 'unagbusimon098@gmail.com', '707-571-2549', 'unagbusimon098', '$2y$12$Ilp9omBZSgiGrwW4Js3u7uqt6gM2PoeHiTCz8OgyoSsYlMfNShTC2', 'parent', NULL, 'male', NULL, NULL, NULL, 'Okomoko, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 09:23:53', '2026-03-12 09:23:53'),
(54, 6, 'Okoye Ifunnanya Jennifer', 'ifunnanyajenn09@gmail.com', '706-105-2210', 'ifunnanyajenn09', '$2y$12$HOHeUbsoimQr/TjwEdwTUOeiwCNiJeRUKwprSA5QeTU0ffGtpiruS', 'parent', NULL, 'female', NULL, NULL, NULL, 'Igbo-Etche, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 09:27:54', '2026-03-12 09:27:54'),
(55, 6, 'Adeyemi Kehinde Joshua', 'adeyemijoshua@gmail.com', '814-416-2281', 'adeyemijoshua', '$2y$12$nkwcSLv6voJTGALPQ/rZ4eVUsjyzJndAkvCiUjxuHeGHDxDDsOdHC', 'parent', NULL, 'male', NULL, NULL, NULL, 'Umuechem, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 09:31:23', '2026-03-12 09:31:23'),
(56, 6, 'Adetifa Ayomide Shedrach', 'sheddytifa1972@gmail.com', '700-896-9436', 'sheddytifa1972', '$2y$12$DWH5XRmVFeQFounCU5tbQe5wX4sWJFO9DxcP2JfK8QAWtYioE0/OK', 'parent', NULL, 'male', NULL, NULL, NULL, 'Okomoko, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 09:36:58', '2026-03-12 09:36:58'),
(57, 6, 'Ovieva Oghenerukevwe Simona', 'oghenerukevwemona@gmail.com', '814-415-7784', 'oghenerukevwemona', '$2y$12$INnZWnty3ynADfPiQQX7XO/w1WkqiyNVKP0GOVXgcWhu8OOAsj3IK', 'parent', NULL, 'female', NULL, NULL, NULL, 'Umuechem, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 09:42:23', '2026-03-12 09:42:23'),
(58, 6, 'Pere Tokoni Joy', 'tokonipere001@gmail.com', '911-846-0472', 'tokonipere001', '$2y$12$j8yPextLjPlPHxa1FVeiZeWM5.75qJHJnhaOCO67Dwb1lPuglxHzq', 'parent', NULL, 'female', NULL, NULL, NULL, 'Igbo-Etche, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 09:47:16', '2026-03-12 09:47:16'),
(59, 6, 'Bagshaw Boma Hephzibah', 'bomahephzibah@gmail.com', '907-536-3889', 'bomahephzibah', '$2y$12$jfMDRYlrezNOs3KEJjZ6M.wopXG0RJMnl5qnKNKeC3o8/UNJ4bB4S', 'parent', NULL, 'female', NULL, NULL, NULL, 'Igwuruta, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 09:53:57', '2026-03-12 09:53:57'),
(60, 6, 'Ogbuogu Chukwuma Benson', 'bennchukss111@gmail.com', '816-744-9957', 'bennchukss111', '$2y$12$Cksmom5nSkgfkiJoQuRv9uF4Pr0Hj5zyxfz0ANW4rJDlS5O7cBqAG', 'parent', NULL, 'male', NULL, NULL, NULL, 'Umuechem, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 09:58:00', '2026-03-12 09:58:00'),
(61, 6, 'Sylvester Chioma Monica', 'monicachioma002@gmail.com', '809-655-4738', 'monicachioma002', '$2y$12$SXqHip5G8Cj.8gtRNjfyXeaos.HE8EiefrwkekTExX7kzqYe8LrbO', 'parent', NULL, 'female', NULL, NULL, NULL, 'Chokocho, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 10:04:57', '2026-03-12 10:04:57'),
(62, 6, 'Okere Chiamaka Juliet', 'okerejuliet90@gmail.com', '806-277-2775', 'okerejuliet90', '$2y$12$tx6GGH3qTCHyznIRwZH3uOxHk7.juczlu5Z3VhbV2OnTpFHU5MAgu', 'parent', NULL, 'female', NULL, NULL, NULL, 'Chokocho, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 10:14:39', '2026-03-12 10:14:39'),
(63, 6, 'Amadi Otonsiki Benita', 'otonsikibenita@gmail.com', '708-966-5434', 'otonsikibenita', '$2y$12$zG8o8JCp8uKZSsh3kQlreO1bfq3cgV/Vy.TTvD1suYHfhMuxV2JgC', 'parent', NULL, 'female', NULL, NULL, NULL, 'Umuechem, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 10:19:19', '2026-03-12 10:19:19'),
(65, 6, 'Uzochukwu Chiemela Victory', 'zubuetechhub@gmail.com', '09099926700', 'zubuetechhub', '$2y$12$2yOOTUc.pHD3l2yFrF8H1OxXnCNKOrnWvJ78AsUEXlryhzG9C45kS', 'student', NULL, 'female', '2023-11-02', NULL, NULL, 'Igwuruta, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 10:28:06', '2026-03-12 10:39:27'),
(66, 6, 'Unagbu Chioma Rita', 'unagbusimon018@gmail.com', '08172689365', 'unagbusimon018', '$2y$12$i3WQ70MzdtNDCECfw.kW9O0XKiU/Twmpvrj86NTHKvnFTDvW.amC2', 'student', NULL, 'female', '2023-07-09', NULL, NULL, 'Okomoko, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 10:33:48', '2026-03-12 10:33:48'),
(68, 6, 'Okoye Nwabuogo Maryann', 'okoye.maryann@student.bitflux-wallet-1771434696.1773311892', '08144162280', 'okoye.maryann', '$2y$12$aoEJ6HM7wDrpjRmnHfqHce9JYko59e5jOVL.EvLOI1zNZo0WVfcN2', 'student', NULL, 'female', '2023-04-08', NULL, NULL, 'Igbo-Etche, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 10:38:13', '2026-03-12 10:39:00'),
(69, 6, 'Adeyemi Toluwani Hephzibah', 'adeyemi.hephzibah@student.bitflux-wallet-1771434696', NULL, 'adeyemi.hephzibah', '$2y$12$8ZyFUm9ULp1AF0Ng0iSCQ.Vy3pMCb6U8Hydcw1PAQcLeRj5wfPKbG', 'student', NULL, 'female', '2023-08-19', NULL, NULL, 'Umuechem, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 10:43:02', '2026-03-12 10:43:02'),
(70, 6, 'Adetifa Mayorkun Israel', 'adetifa.israel@student.bitflux-wallet-1771434696', NULL, 'adetifa.israel', '$2y$12$a9OWQLlexFbmbKIgSY7gO.YvcU/jZuHnyMrEA62ohrghNDl/sZrvu', 'student', NULL, 'male', '2023-10-01', NULL, NULL, 'Okomoko, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 10:50:43', '2026-03-12 10:50:43'),
(71, 6, 'Ovieva Oghenetega Favour', 'ovieva.favour@student.bitflux-wallet-1771434696', NULL, 'ovieva.favour', '$2y$12$H0tacIKF4uRDWBUtVd9bkuI0.oYnXg0mFNdebK1kjNdCgmVT9k/A.', 'student', NULL, 'male', '2023-10-04', NULL, NULL, 'Umuechem, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 10:57:28', '2026-03-12 10:57:28'),
(72, 6, 'Tamuno Biebele Rejoice', 'tamuno.rejoice@student.bitflux-wallet-1771434696', NULL, 'tamuno.rejoice', '$2y$12$Kl/K20kyMwu6j50KCFjzPOHOLi.O.8G3SrtXp9swVrkQGch3nL2O.', 'student', NULL, 'female', '2023-02-07', NULL, NULL, 'Igbo-Etche, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 11:00:17', '2026-03-12 11:00:17'),
(73, 6, 'Bagshaw Biobele Joy', 'bagshaw.joy@student.bitflux-wallet-1771434696', NULL, 'bagshaw.joy', '$2y$12$985oMnOuu2swRQj6ypAxPObYWwcWd3.DD1Qt1r3YzfUH7rtqaIDke', 'student', NULL, 'female', '2023-05-12', NULL, NULL, 'Igwuruta, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 11:05:59', '2026-03-12 11:05:59'),
(74, 6, 'Ogbuogu Chibuenyim Christopher', 'ogbuogu.christopher@student.bitflux-wallet-1771434696', NULL, 'ogbuogu.christopher', '$2y$12$lyl9523khoV6JP2M23vY7e6UT5gwP5qzT7o4gMg/FbEzMg7J3kUbC', 'student', NULL, 'male', '2023-04-06', NULL, NULL, 'Umuechem, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 11:08:19', '2026-03-12 11:08:19'),
(75, 6, 'Sylvester Onyedikachi Favour', 'sylvester.favour@student.bitflux-wallet-1771434696', NULL, 'sylvester.favour', '$2y$12$g0YgpoDJAn6TbqBX48AQMeiH267H8jVnc4y3aOcn2rfFRaXt/KueS', 'student', NULL, 'male', '2023-12-06', NULL, NULL, 'Chokocho, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 11:11:28', '2026-03-12 11:58:30'),
(76, 6, 'Okere Iheanyi Francis', 'okere.francis@student.bitflux-wallet-1771434696', NULL, 'okere.francis', '$2y$12$aXIadlzJY3evDo5jW6WER.dEZexUA29uCpYhJh2hNKQ0.BwZcY1O.', 'student', NULL, 'male', '2023-02-12', NULL, NULL, 'Chokocho, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 11:13:52', '2026-03-12 11:13:52'),
(77, 6, 'Amadi Kelechi ThankGod', 'amadi.thankgod@student.bitflux-wallet-1771434696', NULL, 'amadi.thankgod', '$2y$12$Mvo8svR6c4pjSnDBVFgMIOT84nlM5KjlvFGEgretEgODz.EBM4Coa', 'student', NULL, 'male', '2023-03-12', NULL, NULL, 'Umuchem, Rivers State', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 11:21:26', '2026-03-29 08:55:54'),
(78, 6, 'Uzodinma Udochukwu Timothy', 'zubetechub@gmail.com', '09070520000', 'zubetechub', '$2y$12$71vU8NKmQD7CfxyHmSwjSeNFBZeOT/X0b.jgW90wV1PHJdtCirYK6', 'teacher', NULL, 'male', '2004-09-02', NULL, NULL, 'chokocho', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 12:45:51', '2026-03-12 12:45:51'),
(79, 6, 'Okpobiri Ijeoma Felicia', 'feliciaonyebuchi@gmail.com', '08057646999', 'feliciaonyebuchi', '$2y$12$j9BfqneG6xcEIbe.eVisBuYH7ediyCRFvnG1qYSMDHSVBdU1nkWAa', 'teacher', NULL, 'female', '1971-06-11', NULL, NULL, 'chokocho', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 12:55:41', '2026-03-12 12:55:41'),
(80, 6, 'Onyeuchi Nkechi Katherine', 'katrell009@gmail.com', '08097667541', 'katrell009', '$2y$12$6BC6HDk0jYlhSDbfzYHZhOtwxNvHAc1Tcgy4jJDohclnJiHL2p7/y', 'teacher', NULL, 'female', '1983-04-09', NULL, NULL, 'chokocho', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-12 13:11:43', '2026-03-12 13:11:43'),
(81, 6, 'David Chi Aniago', 'daveaniago91@gmail.com', NULL, 'daveaniago91', '$2y$12$8nD.OqSXGOi09Z3z0rZUkesQo8DDez5ozvlWukBueuRFUwjbAC/46', 'student', NULL, 'male', '2020-03-14', NULL, NULL, 'Bom', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-14 04:29:07', '2026-03-24 08:15:08'),
(82, 6, 'Beatrice', 'davidaniag78@gmail.com', '023', 'davidaniag78', '$2y$12$hok3rtwpm9EBKgl8mu9apu1YPiwVC6iFsxojIk3dzW91Sx9SPGOPe', 'parent', NULL, NULL, NULL, NULL, NULL, 'Gu', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-14 04:29:07', '2026-03-14 04:29:07'),
(83, 6, 'Adebayo Temilola', 'ademilola@gmail.com', '09087763243', 'ademilola', '$2y$12$YNp01Phnb1XmsbWrQx1PROfYAWeJktCx.7J0bKd7R26BnShL0xF.6', 'teacher', NULL, 'female', '1999-10-07', NULL, NULL, '123 walkers street', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2026-03-29 08:52:35', '2026-03-29 08:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`) VALUES
(1, 1, 2, '2026-02-18 17:11:36'),
(2, 3, 4, '2026-03-05 12:59:28'),
(3, 4, 5, '2026-03-05 12:59:29'),
(4, 5, 4, '2026-03-05 14:01:27'),
(5, 6, 5, '2026-03-05 14:01:27'),
(8, 9, 3, '2026-03-05 19:03:03'),
(9, 10, 4, '2026-03-06 07:52:59'),
(10, 11, 5, '2026-03-06 07:52:59'),
(11, 12, 3, '2026-03-06 08:28:09'),
(12, 13, 5, '2026-03-06 09:16:26'),
(13, 14, 4, '2026-03-09 10:14:57'),
(14, 15, 5, '2026-03-09 10:14:58'),
(15, 16, 4, '2026-03-09 11:30:05'),
(16, 17, 3, '2026-03-09 11:52:42'),
(17, 18, 3, '2026-03-09 12:23:49'),
(18, 19, 3, '2026-03-09 12:31:48'),
(19, 20, 3, '2026-03-09 12:46:31'),
(28, 37, 4, '2026-03-11 07:12:33'),
(29, 38, 5, '2026-03-11 07:12:33'),
(30, 39, 3, '2026-03-11 18:09:55'),
(37, 52, 5, '2026-03-12 09:19:07'),
(38, 53, 5, '2026-03-12 09:23:53'),
(39, 54, 5, '2026-03-12 09:27:54'),
(40, 55, 5, '2026-03-12 09:31:23'),
(41, 56, 5, '2026-03-12 09:36:58'),
(42, 57, 5, '2026-03-12 09:42:23'),
(43, 58, 5, '2026-03-12 09:47:16'),
(44, 59, 5, '2026-03-12 09:53:57'),
(45, 60, 5, '2026-03-12 09:58:00'),
(46, 61, 5, '2026-03-12 10:04:57'),
(47, 62, 5, '2026-03-12 10:14:39'),
(48, 63, 5, '2026-03-12 10:19:19'),
(49, 65, 4, '2026-03-12 10:28:06'),
(50, 66, 4, '2026-03-12 10:33:48'),
(51, 68, 4, '2026-03-12 10:38:13'),
(52, 69, 4, '2026-03-12 10:43:02'),
(53, 70, 4, '2026-03-12 10:50:43'),
(54, 71, 4, '2026-03-12 10:57:28'),
(55, 72, 4, '2026-03-12 11:00:17'),
(56, 73, 4, '2026-03-12 11:05:59'),
(57, 74, 4, '2026-03-12 11:08:19'),
(58, 75, 4, '2026-03-12 11:11:28'),
(59, 76, 4, '2026-03-12 11:13:52'),
(60, 77, 4, '2026-03-12 11:21:26'),
(61, 78, 3, '2026-03-12 12:45:51'),
(62, 79, 3, '2026-03-12 12:55:41'),
(63, 80, 3, '2026-03-12 13:11:43'),
(64, 81, 4, '2026-03-14 04:29:07'),
(65, 82, 5, '2026-03-14 04:29:07'),
(66, 83, 3, '2026-03-29 08:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinations`
--

CREATE TABLE `vaccinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `vaccine_name` varchar(100) NOT NULL,
  `date_administered` date NOT NULL,
  `next_due_date` date DEFAULT NULL,
  `administered_by` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voting_candidates`
--

CREATE TABLE `voting_candidates` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `election_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `manifesto` text DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `approved_by` int(10) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voting_elections`
--

CREATE TABLE `voting_elections` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('upcoming','active','closed','archived') DEFAULT 'upcoming',
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voting_positions`
--

CREATE TABLE `voting_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `election_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `eligibility_criteria` text DEFAULT NULL COMMENT 'JSON: e.g., {"class_id": 12, "min_grade": "10"}',
  `max_candidates` int(10) UNSIGNED DEFAULT 1,
  `max_votes_per_voter` int(10) UNSIGNED DEFAULT 1,
  `is_active` tinyint(1) DEFAULT 1,
  `order` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voting_results`
--

CREATE TABLE `voting_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `election_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `candidate_id` int(10) UNSIGNED NOT NULL,
  `vote_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `percentage` decimal(5,2) DEFAULT NULL,
  `is_winner` tinyint(1) DEFAULT 0,
  `calculated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voting_votes`
--

CREATE TABLE `voting_votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `election_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `candidate_id` int(10) UNSIGNED NOT NULL,
  `voter_id` int(10) UNSIGNED NOT NULL COMMENT 'Student ID of voter',
  `vote_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_terms`
--
ALTER TABLE `academic_terms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_term_school` (`school_id`,`academic_year_id`,`name`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_year` (`academic_year_id`),
  ADD KEY `idx_campus` (`campus_id`);

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_year_school` (`school_id`,`name`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_campus` (`campus_id`);

--
-- Indexes for table `admission_applications`
--
ALTER TABLE `admission_applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_application` (`school_id`,`application_number`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_class` (`applying_for_class_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `admission_documents`
--
ALTER TABLE `admission_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_application` (`application_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_student` (`student_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `alumni_donations`
--
ALTER TABLE `alumni_donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_alumni` (`alumni_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `alumni_events`
--
ALTER TABLE `alumni_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_published` (`is_published`),
  ADD KEY `idx_dates` (`start_date`,`end_date`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_key` (`api_key`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_is_active` (`is_active`),
  ADD KEY `idx_expires_at` (`expires_at`),
  ADD KEY `idx_school_active` (`school_id`,`is_active`,`expires_at`);

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_key_id` (`api_key_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_endpoint` (`endpoint`),
  ADD KEY `idx_status_code` (`status_code`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_endpoint` (`school_id`,`endpoint`,`created_at`),
  ADD KEY `idx_api_logs_school_endpoint` (`school_id`,`endpoint`,`created_at`);

--
-- Indexes for table `api_usage`
--
ALTER TABLE `api_usage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_api_usage` (`school_id`,`api_key_id`,`endpoint`,`method`,`period`,`period_start`),
  ADD KEY `api_key_id` (`api_key_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_endpoint` (`endpoint`),
  ADD KEY `idx_period` (`period`),
  ADD KEY `idx_period_start` (`period_start`),
  ADD KEY `idx_school_period` (`school_id`,`period`,`period_start`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_class_subject` (`class_id`,`subject_id`),
  ADD KEY `idx_teacher` (`teacher_id`),
  ADD KEY `idx_term` (`term_id`),
  ADD KEY `idx_type` (`assessment_type_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `fk_assessments_section` (`section_id`),
  ADD KEY `fk_assessments_subject` (`subject_id`);

--
-- Indexes for table `assessment_scores`
--
ALTER TABLE `assessment_scores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_score` (`assessment_id`,`student_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `fk_assessment_scores_entered_by` (`entered_by`);

--
-- Indexes for table `assessment_types`
--
ALTER TABLE `assessment_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`school_id`,`name`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_attendance` (`student_id`,`date`,`session`),
  ADD KEY `marked_by` (`marked_by`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_date` (`date`),
  ADD KEY `idx_class` (`class_id`),
  ADD KEY `idx_attendance_student_date` (`student_id`,`date`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_action` (`action`),
  ADD KEY `idx_entity` (`entity_type`,`entity_id`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_action` (`school_id`,`action`,`created_at`),
  ADD KEY `idx_audit_logs_school_action` (`school_id`,`action`,`created_at`);

--
-- Indexes for table `backup_history`
--
ALTER TABLE `backup_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_backup_type` (`backup_type`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_expires_at` (`expires_at`),
  ADD KEY `idx_school_status` (`school_id`,`status`,`created_at`),
  ADD KEY `idx_backup_history_school_status` (`school_id`,`status`,`created_at`);

--
-- Indexes for table `billing_history`
--
ALTER TABLE `billing_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`),
  ADD KEY `subscription_id` (`subscription_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_payment_status` (`payment_status`),
  ADD KEY `idx_payment_date` (`payment_date`),
  ADD KEY `idx_school_status` (`school_id`,`payment_status`);

--
-- Indexes for table `campuses`
--
ALTER TABLE `campuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_campus_code` (`school_id`,`code`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `cbt_attempts`
--
ALTER TABLE `cbt_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_test` (`test_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_graded_by` (`graded_by`);

--
-- Indexes for table `cbt_options`
--
ALTER TABLE `cbt_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_question` (`question_id`);

--
-- Indexes for table `cbt_questions`
--
ALTER TABLE `cbt_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_test` (`test_id`);

--
-- Indexes for table `cbt_responses`
--
ALTER TABLE `cbt_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_attempt` (`attempt_id`),
  ADD KEY `idx_question` (`question_id`),
  ADD KEY `idx_option` (`selected_option_id`),
  ADD KEY `idx_graded_by` (`graded_by`);

--
-- Indexes for table `cbt_results`
--
ALTER TABLE `cbt_results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attempt_id` (`attempt_id`);

--
-- Indexes for table `cbt_tests`
--
ALTER TABLE `cbt_tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paper_id` (`paper_id`),
  ADD KEY `idx_created_by` (`created_by`);

--
-- Indexes for table `certificates_issued`
--
ALTER TABLE `certificates_issued`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificate_number` (`certificate_number`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_template` (`template_id`),
  ADD KEY `idx_issued_by` (`issued_by`);

--
-- Indexes for table `certificate_templates`
--
ALTER TABLE `certificate_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_class_school` (`school_id`,`academic_year_id`,`code`),
  ADD KEY `class_teacher_id` (`class_teacher_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_year` (`academic_year_id`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_class_subject` (`class_id`,`subject_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `idx_class` (`class_id`),
  ADD KEY `idx_teacher` (`teacher_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_created_by` (`created_by`),
  ADD KEY `idx_last_message` (`last_message_id`),
  ADD KEY `idx_last_message_at` (`last_message_at`),
  ADD KEY `idx_school_archived` (`school_id`,`is_archived`,`last_message_at`);

--
-- Indexes for table `conversation_participants`
--
ALTER TABLE `conversation_participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_participant` (`conversation_id`,`user_id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_conversation` (`conversation_id`),
  ADD KEY `idx_user_unread` (`user_id`,`last_read_at`),
  ADD KEY `idx_user_archived` (`user_id`,`is_archived`);

--
-- Indexes for table `curriculum_outlines`
--
ALTER TABLE `curriculum_outlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_class_subject` (`class_id`,`subject_id`),
  ADD KEY `idx_term` (`term_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `fk_curriculum_subject` (`subject_id`);

--
-- Indexes for table `discipline_actions`
--
ALTER TABLE `discipline_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_incident` (`incident_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`),
  ADD KEY `fk_discipline_actions_issued_by` (`issued_by`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_template` (`school_id`,`template_key`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_template_key` (`template_key`),
  ADD KEY `idx_is_active` (`is_active`),
  ADD KEY `idx_school_active` (`school_id`,`is_active`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_dates` (`start_date`,`end_date`),
  ADD KEY `idx_type` (`type`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_exam_school` (`school_id`,`academic_year_id`,`academic_term_id`,`name`),
  ADD KEY `academic_term_id` (`academic_term_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_year` (`academic_year_id`);

--
-- Indexes for table `exam_grades`
--
ALTER TABLE `exam_grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_exam_grade` (`exam_id`,`student_id`,`subject_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `entered_by` (`entered_by`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_exam` (`exam_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_subject` (`subject_id`),
  ADD KEY `idx_exam_grades_exam_student` (`exam_id`,`student_id`);

--
-- Indexes for table `exam_options`
--
ALTER TABLE `exam_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_question` (`question_id`);

--
-- Indexes for table `exam_papers`
--
ALTER TABLE `exam_papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_exam` (`exam_id`),
  ADD KEY `idx_subject` (`subject_id`),
  ADD KEY `idx_class` (`class_id`),
  ADD KEY `idx_teacher` (`teacher_id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_paper` (`paper_id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_category_school` (`school_id`,`name`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `fee_structures`
--
ALTER TABLE `fee_structures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_fee_structure` (`academic_year_id`,`academic_term_id`,`class_id`,`fee_category_id`),
  ADD KEY `academic_term_id` (`academic_term_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `fee_category_id` (`fee_category_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_year` (`academic_year_id`);

--
-- Indexes for table `file_storage`
--
ALTER TABLE `file_storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_file_type` (`file_type`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_type` (`school_id`,`file_type`),
  ADD KEY `idx_access_hash` (`access_hash`);

--
-- Indexes for table `geofence_logs`
--
ALTER TABLE `geofence_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_guardian_student` (`student_id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_primary` (`is_primary`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_class` (`class_id`),
  ADD KEY `idx_due_date` (`due_date`),
  ADD KEY `idx_teacher` (`teacher_id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_hostel_code` (`school_id`,`campus_id`,`code`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_campus` (`campus_id`);

--
-- Indexes for table `hostel_assignments`
--
ALTER TABLE `hostel_assignments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_active_bed` (`bed_id`,`start_date`),
  ADD UNIQUE KEY `unique_active_student` (`student_id`,`hostel_id`,`start_date`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_campus` (`campus_id`),
  ADD KEY `idx_hostel` (`hostel_id`),
  ADD KEY `idx_bed` (`bed_id`),
  ADD KEY `idx_student` (`student_id`);

--
-- Indexes for table `hostel_beds`
--
ALTER TABLE `hostel_beds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_bed_in_room` (`room_id`,`bed_number`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_campus` (`campus_id`),
  ADD KEY `idx_hostel` (`hostel_id`),
  ADD KEY `idx_room` (`room_id`);

--
-- Indexes for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_room` (`hostel_id`,`room_number`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_campus` (`campus_id`),
  ADD KEY `idx_hostel` (`hostel_id`),
  ADD KEY `idx_class` (`class_id`);

--
-- Indexes for table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_reported_by` (`reported_by`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`),
  ADD KEY `fk_incidents_resolved_by` (`resolved_by`);

--
-- Indexes for table `incident_students`
--
ALTER TABLE `incident_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_incident_student` (`incident_id`,`student_id`),
  ADD KEY `idx_student` (`student_id`);

--
-- Indexes for table `inventory_categories`
--
ALTER TABLE `inventory_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_category` (`school_id`,`campus_id`,`name`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_item` (`school_id`,`campus_id`,`item_code`),
  ADD KEY `idx_category` (`category_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_item` (`item_id`),
  ADD KEY `idx_movement_type` (`movement_type`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`),
  ADD KEY `fk_inventory_movements_created_by` (`created_by`),
  ADD KEY `fk_inventory_movements_issued_to` (`issued_to_user_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`),
  ADD KEY `academic_year_id` (`academic_year_id`),
  ADD KEY `academic_term_id` (`academic_term_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_due_date` (`due_date`),
  ADD KEY `idx_invoices_student_status` (`student_id`,`status`);

--
-- Indexes for table `invoices_v2`
--
ALTER TABLE `invoices_v2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`),
  ADD KEY `billing_history_id` (`billing_history_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_due_date` (`due_date`),
  ADD KEY `idx_school_status` (`school_id`,`status`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_category_id` (`fee_category_id`),
  ADD KEY `idx_invoice` (`invoice_id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_leave_type` (`leave_type_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_dates` (`start_date`,`end_date`),
  ADD KEY `idx_approved_by` (`approved_by`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_leave_type` (`school_id`,`name`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `lesson_plans`
--
ALTER TABLE `lesson_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_class_subject` (`class_id`,`subject_id`),
  ADD KEY `idx_teacher` (`teacher_id`),
  ADD KEY `idx_term` (`term_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `fk_lesson_plans_section` (`section_id`),
  ADD KEY `fk_lesson_plans_subject` (`subject_id`),
  ADD KEY `fk_lesson_plans_approved_by` (`approved_by`);

--
-- Indexes for table `library_books`
--
ALTER TABLE `library_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_category` (`category_id`),
  ADD KEY `idx_isbn` (`isbn`),
  ADD KEY `idx_title` (`title`);

--
-- Indexes for table `library_categories`
--
ALTER TABLE `library_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_category_school` (`school_id`,`name`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `library_fine_settings`
--
ALTER TABLE `library_fine_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_id` (`school_id`);

--
-- Indexes for table `library_issues`
--
ALTER TABLE `library_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_book` (`book_id`),
  ADD KEY `idx_member` (`member_id`),
  ADD KEY `idx_issued_by` (`issued_by`),
  ADD KEY `idx_returned_by` (`returned_by`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_due_date` (`due_date`);

--
-- Indexes for table `library_members`
--
ALTER TABLE `library_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `membership_number` (`membership_number`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_user` (`user_id`);

--
-- Indexes for table `library_reservations`
--
ALTER TABLE `library_reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_book` (`book_id`),
  ADD KEY `idx_member` (`member_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_ip` (`ip_address`),
  ADD KEY `idx_success` (`success`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_ip` (`school_id`,`ip_address`,`created_at`);

--
-- Indexes for table `maintenance_logs`
--
ALTER TABLE `maintenance_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performed_by` (`performed_by`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_maintenance_type` (`maintenance_type`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_type` (`school_id`,`maintenance_type`,`created_at`);

--
-- Indexes for table `meeting_bookings`
--
ALTER TABLE `meeting_bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_booking` (`slot_id`,`parent_id`,`student_id`),
  ADD KEY `idx_parent` (`parent_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `meeting_slots`
--
ALTER TABLE `meeting_slots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_slot` (`teacher_id`,`date`,`start_time`),
  ADD KEY `idx_teacher` (`teacher_id`),
  ADD KEY `idx_date` (`date`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_conversation` (`conversation_id`),
  ADD KEY `idx_sender` (`sender_id`),
  ADD KEY `idx_reply_to` (`reply_to_id`),
  ADD KEY `idx_conversation_created` (`conversation_id`,`created_at`),
  ADD KEY `idx_conversation_read` (`conversation_id`,`is_read`),
  ADD KEY `idx_sender_conversation` (`sender_id`,`conversation_id`,`created_at`);

--
-- Indexes for table `message_attachments`
--
ALTER TABLE `message_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_message` (`message_id`),
  ADD KEY `idx_file_type` (`mime_type`);

--
-- Indexes for table `message_blocks`
--
ALTER TABLE `message_blocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_block` (`user_id`,`blocked_user_id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_blocked` (`blocked_user_id`);

--
-- Indexes for table `message_drafts`
--
ALTER TABLE `message_drafts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_conversation` (`conversation_id`);

--
-- Indexes for table `message_reactions`
--
ALTER TABLE `message_reactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_reaction` (`message_id`,`user_id`,`reaction`),
  ADD KEY `idx_message` (`message_id`),
  ADD KEY `idx_user` (`user_id`);

--
-- Indexes for table `message_status`
--
ALTER TABLE `message_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_message_user` (`message_id`,`user_id`),
  ADD KEY `idx_message` (`message_id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_type` (`type`),
  ADD KEY `idx_is_read` (`is_read`),
  ADD KEY `idx_priority` (`priority`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_user` (`school_id`,`user_id`,`is_read`,`created_at`),
  ADD KEY `idx_notifications_school_user_read` (`school_id`,`user_id`,`is_read`,`created_at`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_number` (`payment_number`),
  ADD KEY `collected_by` (`collected_by`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_invoice` (`invoice_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_payment_date` (`payment_date`),
  ADD KEY `idx_payments_invoice_date` (`invoice_id`,`payment_date`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_type` (`type`),
  ADD KEY `idx_default` (`is_default`),
  ADD KEY `idx_school_default` (`school_id`,`is_default`);

--
-- Indexes for table `payroll_allowances`
--
ALTER TABLE `payroll_allowances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_employee` (`employee_id`);

--
-- Indexes for table `payroll_deductions`
--
ALTER TABLE `payroll_deductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_employee` (`employee_id`);

--
-- Indexes for table `payroll_employees`
--
ALTER TABLE `payroll_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_number` (`employee_number`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_salary_grade` (`salary_grade_id`);

--
-- Indexes for table `payroll_periods`
--
ALTER TABLE `payroll_periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `payroll_runs`
--
ALTER TABLE `payroll_runs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_period` (`period_id`),
  ADD KEY `idx_processed_by` (`processed_by`);

--
-- Indexes for table `payroll_salary_grades`
--
ALTER TABLE `payroll_salary_grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_grade_school` (`school_id`,`grade_name`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `payroll_slips`
--
ALTER TABLE `payroll_slips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_payroll_run` (`payroll_run_id`),
  ADD KEY `idx_employee` (`employee_id`);

--
-- Indexes for table `performance_metrics`
--
ALTER TABLE `performance_metrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_metric_type` (`metric_type`),
  ADD KEY `idx_recorded_at` (`recorded_at`),
  ADD KEY `idx_school_metric` (`school_id`,`metric_type`,`recorded_at`);

--
-- Indexes for table `rate_limits`
--
ALTER TABLE `rate_limits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_rate_limit` (`school_id`,`endpoint`,`ip_address`,`user_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_endpoint` (`endpoint`),
  ADD KEY `idx_ip` (`ip_address`),
  ADD KEY `idx_window_reset` (`window_reset`),
  ADD KEY `idx_school_endpoint_ip` (`school_id`,`endpoint`,`ip_address`,`last_request`);

--
-- Indexes for table `recovery_points`
--
ALTER TABLE `recovery_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `backup_id` (`backup_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_status` (`school_id`,`status`,`created_at`);

--
-- Indexes for table `report_cards`
--
ALTER TABLE `report_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_year` (`academic_year_id`),
  ADD KEY `idx_term` (`academic_term_id`),
  ADD KEY `idx_class` (`class_id`),
  ADD KEY `idx_published_by` (`published_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_role_school` (`school_id`,`slug`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_section_class` (`class_id`,`code`),
  ADD KEY `class_teacher_id` (`class_teacher_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_class` (`class_id`);

--
-- Indexes for table `security_logs`
--
ALTER TABLE `security_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_event_type` (`event_type`),
  ADD KEY `idx_severity` (`severity`),
  ADD KEY `idx_ip` (`ip_address`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_event` (`school_id`,`event_type`,`created_at`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_setting` (`school_id`,`key`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_key` (`key`);

--
-- Indexes for table `sick_visits`
--
ALTER TABLE `sick_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_date` (`visit_date`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `fk_sick_visits_attended_by` (`attended_by`);

--
-- Indexes for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_recipient` (`recipient`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_status` (`school_id`,`status`,`created_at`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_staff_attendance` (`user_id`,`date`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_date` (`date`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_approved_by` (`approved_by`),
  ADD KEY `idx_clock_in_coords` (`clock_in_lat`,`clock_in_lng`),
  ADD KEY `idx_clock_out_coords` (`clock_out_lat`,`clock_out_lng`);

--
-- Indexes for table `storage_usage`
--
ALTER TABLE `storage_usage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_school_storage` (`school_id`,`storage_type`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_type` (`storage_type`),
  ADD KEY `idx_usage` (`used_bytes`),
  ADD KEY `idx_school_type` (`school_id`,`storage_type`),
  ADD KEY `idx_storage_usage_school_type` (`school_id`,`storage_type`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admission_number` (`admission_number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_class` (`class_id`),
  ADD KEY `idx_admission` (`admission_number`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_students_class_status` (`class_id`,`status`),
  ADD KEY `idx_students_admission_date` (`admission_date`);

--
-- Indexes for table `student_health_records`
--
ALTER TABLE `student_health_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_student` (`student_id`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `student_promotions`
--
ALTER TABLE `student_promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_from_academic_year` (`from_academic_year_id`),
  ADD KEY `idx_to_academic_year` (`to_academic_year_id`),
  ADD KEY `idx_from_class` (`from_class_id`),
  ADD KEY `idx_to_class` (`to_class_id`),
  ADD KEY `idx_from_section` (`from_section_id`),
  ADD KEY `idx_to_section` (`to_section_id`),
  ADD KEY `idx_from_campus` (`from_campus_id`),
  ADD KEY `idx_to_campus` (`to_campus_id`),
  ADD KEY `idx_created_by` (`created_by`);

--
-- Indexes for table `student_transport`
--
ALTER TABLE `student_transport`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_student_transport` (`student_id`,`assignment_id`,`start_date`),
  ADD KEY `idx_assignment` (`assignment_id`),
  ADD KEY `idx_stop` (`stop_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_subject_school` (`school_id`,`code`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_school_subscription` (`school_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_period` (`current_period_end`),
  ADD KEY `idx_school_plan` (`school_id`,`plan_id`),
  ADD KEY `idx_subscriptions_status_end` (`status`,`current_period_end`);

--
-- Indexes for table `system_alerts`
--
ALTER TABLE `system_alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_alert_type` (`alert_type`),
  ADD KEY `idx_severity` (`severity`),
  ADD KEY `idx_is_resolved` (`is_resolved`),
  ADD KEY `idx_created_at` (`created_at`),
  ADD KEY `idx_school_resolved` (`school_id`,`is_resolved`,`created_at`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_employee` (`employee_id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_timetable` (`class_id`,`section_id`,`day`,`period_number`,`academic_year_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `academic_year_id` (`academic_year_id`),
  ADD KEY `academic_term_id` (`academic_term_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_class` (`class_id`),
  ADD KEY `idx_day` (`day`);

--
-- Indexes for table `transport_assignments`
--
ALTER TABLE `transport_assignments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_assignment` (`vehicle_id`,`route_id`,`academic_term_id`,`start_date`),
  ADD KEY `idx_route` (`route_id`),
  ADD KEY `idx_term` (`academic_term_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `transport_routes`
--
ALTER TABLE `transport_routes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_route` (`school_id`,`campus_id`,`route_name`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `transport_stops`
--
ALTER TABLE `transport_stops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_route` (`route_id`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `transport_vehicles`
--
ALTER TABLE `transport_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_vehicle` (`school_id`,`campus_id`,`vehicle_number`),
  ADD KEY `idx_school_campus` (`school_id`,`campus_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email_school` (`school_id`,`email`),
  ADD UNIQUE KEY `unique_phone_school` (`school_id`,`phone`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_user_type` (`user_type`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_phone` (`phone`),
  ADD KEY `idx_users_school_type` (`school_id`,`user_type`),
  ADD KEY `idx_users_email_type` (`email`,`user_type`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_role` (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `idx_user` (`user_id`);

--
-- Indexes for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_school` (`school_id`);

--
-- Indexes for table `voting_candidates`
--
ALTER TABLE `voting_candidates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_candidate` (`election_id`,`position_id`,`student_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_position` (`position_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_approved_by` (`approved_by`);

--
-- Indexes for table `voting_elections`
--
ALTER TABLE `voting_elections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_dates` (`start_date`,`end_date`),
  ADD KEY `idx_created_by` (`created_by`);

--
-- Indexes for table `voting_positions`
--
ALTER TABLE `voting_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_election` (`election_id`);

--
-- Indexes for table `voting_results`
--
ALTER TABLE `voting_results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_result` (`election_id`,`position_id`,`candidate_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_election` (`election_id`),
  ADD KEY `idx_position` (`position_id`),
  ADD KEY `idx_candidate` (`candidate_id`);

--
-- Indexes for table `voting_votes`
--
ALTER TABLE `voting_votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_vote` (`election_id`,`position_id`,`voter_id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_election` (`election_id`),
  ADD KEY `idx_position` (`position_id`),
  ADD KEY `idx_candidate` (`candidate_id`),
  ADD KEY `idx_voter` (`voter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_terms`
--
ALTER TABLE `academic_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_applications`
--
ALTER TABLE `admission_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_documents`
--
ALTER TABLE `admission_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumni_donations`
--
ALTER TABLE `alumni_donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumni_events`
--
ALTER TABLE `alumni_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_usage`
--
ALTER TABLE `api_usage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_scores`
--
ALTER TABLE `assessment_scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_types`
--
ALTER TABLE `assessment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `backup_history`
--
ALTER TABLE `backup_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_history`
--
ALTER TABLE `billing_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campuses`
--
ALTER TABLE `campuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cbt_attempts`
--
ALTER TABLE `cbt_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_options`
--
ALTER TABLE `cbt_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_questions`
--
ALTER TABLE `cbt_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_responses`
--
ALTER TABLE `cbt_responses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_results`
--
ALTER TABLE `cbt_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_tests`
--
ALTER TABLE `cbt_tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates_issued`
--
ALTER TABLE `certificates_issued`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_templates`
--
ALTER TABLE `certificate_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `conversation_participants`
--
ALTER TABLE `conversation_participants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `curriculum_outlines`
--
ALTER TABLE `curriculum_outlines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discipline_actions`
--
ALTER TABLE `discipline_actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_grades`
--
ALTER TABLE `exam_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_options`
--
ALTER TABLE `exam_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_papers`
--
ALTER TABLE `exam_papers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_structures`
--
ALTER TABLE `fee_structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_storage`
--
ALTER TABLE `file_storage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geofence_logs`
--
ALTER TABLE `geofence_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_assignments`
--
ALTER TABLE `hostel_assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_beds`
--
ALTER TABLE `hostel_beds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incident_students`
--
ALTER TABLE `incident_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_categories`
--
ALTER TABLE `inventory_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices_v2`
--
ALTER TABLE `invoices_v2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lesson_plans`
--
ALTER TABLE `lesson_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_books`
--
ALTER TABLE `library_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_categories`
--
ALTER TABLE `library_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_fine_settings`
--
ALTER TABLE `library_fine_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_issues`
--
ALTER TABLE `library_issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_members`
--
ALTER TABLE `library_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_reservations`
--
ALTER TABLE `library_reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_logs`
--
ALTER TABLE `maintenance_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_bookings`
--
ALTER TABLE `meeting_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_slots`
--
ALTER TABLE `meeting_slots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `message_attachments`
--
ALTER TABLE `message_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message_blocks`
--
ALTER TABLE `message_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_drafts`
--
ALTER TABLE `message_drafts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_reactions`
--
ALTER TABLE `message_reactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message_status`
--
ALTER TABLE `message_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_allowances`
--
ALTER TABLE `payroll_allowances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_deductions`
--
ALTER TABLE `payroll_deductions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_employees`
--
ALTER TABLE `payroll_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payroll_periods`
--
ALTER TABLE `payroll_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payroll_runs`
--
ALTER TABLE `payroll_runs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payroll_salary_grades`
--
ALTER TABLE `payroll_salary_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_slips`
--
ALTER TABLE `payroll_slips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `performance_metrics`
--
ALTER TABLE `performance_metrics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_limits`
--
ALTER TABLE `rate_limits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recovery_points`
--
ALTER TABLE `recovery_points`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_cards`
--
ALTER TABLE `report_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `security_logs`
--
ALTER TABLE `security_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sick_visits`
--
ALTER TABLE `sick_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storage_usage`
--
ALTER TABLE `storage_usage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student_health_records`
--
ALTER TABLE `student_health_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_promotions`
--
ALTER TABLE `student_promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_transport`
--
ALTER TABLE `student_transport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_alerts`
--
ALTER TABLE `system_alerts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transport_assignments`
--
ALTER TABLE `transport_assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_routes`
--
ALTER TABLE `transport_routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_stops`
--
ALTER TABLE `transport_stops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_vehicles`
--
ALTER TABLE `transport_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `vaccinations`
--
ALTER TABLE `vaccinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voting_candidates`
--
ALTER TABLE `voting_candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voting_elections`
--
ALTER TABLE `voting_elections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voting_positions`
--
ALTER TABLE `voting_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voting_results`
--
ALTER TABLE `voting_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voting_votes`
--
ALTER TABLE `voting_votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_terms`
--
ALTER TABLE `academic_terms`
  ADD CONSTRAINT `fk_academic_terms_campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD CONSTRAINT `fk_academic_years_campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admission_applications`
--
ALTER TABLE `admission_applications`
  ADD CONSTRAINT `fk_admission_applications_class` FOREIGN KEY (`applying_for_class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admission_documents`
--
ALTER TABLE `admission_documents`
  ADD CONSTRAINT `fk_admission_documents_application` FOREIGN KEY (`application_id`) REFERENCES `admission_applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `fk_alumni_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `alumni_donations`
--
ALTER TABLE `alumni_donations`
  ADD CONSTRAINT `fk_alumni_donations_alumni` FOREIGN KEY (`alumni_id`) REFERENCES `alumni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `fk_assessments_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_assessments_section` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_assessments_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_assessments_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_assessments_term` FOREIGN KEY (`term_id`) REFERENCES `academic_terms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_assessments_type` FOREIGN KEY (`assessment_type_id`) REFERENCES `assessment_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assessment_scores`
--
ALTER TABLE `assessment_scores`
  ADD CONSTRAINT `fk_assessment_scores_assessment` FOREIGN KEY (`assessment_id`) REFERENCES `assessments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_assessment_scores_entered_by` FOREIGN KEY (`entered_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_assessment_scores_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cbt_attempts`
--
ALTER TABLE `cbt_attempts`
  ADD CONSTRAINT `fk_cbt_attempts_graded_by` FOREIGN KEY (`graded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cbt_attempts_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cbt_attempts_test` FOREIGN KEY (`test_id`) REFERENCES `cbt_tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cbt_options`
--
ALTER TABLE `cbt_options`
  ADD CONSTRAINT `fk_cbt_options_question` FOREIGN KEY (`question_id`) REFERENCES `cbt_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cbt_questions`
--
ALTER TABLE `cbt_questions`
  ADD CONSTRAINT `fk_cbt_questions_test` FOREIGN KEY (`test_id`) REFERENCES `cbt_tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cbt_responses`
--
ALTER TABLE `cbt_responses`
  ADD CONSTRAINT `fk_cbt_responses_attempt` FOREIGN KEY (`attempt_id`) REFERENCES `cbt_attempts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cbt_responses_graded_by` FOREIGN KEY (`graded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cbt_responses_option` FOREIGN KEY (`selected_option_id`) REFERENCES `cbt_options` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cbt_responses_question` FOREIGN KEY (`question_id`) REFERENCES `cbt_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cbt_results`
--
ALTER TABLE `cbt_results`
  ADD CONSTRAINT `fk_cbt_results_attempt` FOREIGN KEY (`attempt_id`) REFERENCES `cbt_attempts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cbt_tests`
--
ALTER TABLE `cbt_tests`
  ADD CONSTRAINT `fk_cbt_tests_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cbt_tests_paper` FOREIGN KEY (`paper_id`) REFERENCES `exam_papers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certificates_issued`
--
ALTER TABLE `certificates_issued`
  ADD CONSTRAINT `fk_certificates_issued_issued_by` FOREIGN KEY (`issued_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_certificates_issued_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_certificates_issued_template` FOREIGN KEY (`template_id`) REFERENCES `certificate_templates` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `curriculum_outlines`
--
ALTER TABLE `curriculum_outlines`
  ADD CONSTRAINT `fk_curriculum_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_curriculum_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_curriculum_term` FOREIGN KEY (`term_id`) REFERENCES `academic_terms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discipline_actions`
--
ALTER TABLE `discipline_actions`
  ADD CONSTRAINT `fk_discipline_actions_incident` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_discipline_actions_issued_by` FOREIGN KEY (`issued_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_discipline_actions_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_options`
--
ALTER TABLE `exam_options`
  ADD CONSTRAINT `fk_exam_options_question` FOREIGN KEY (`question_id`) REFERENCES `exam_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_papers`
--
ALTER TABLE `exam_papers`
  ADD CONSTRAINT `fk_exam_papers_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_exam_papers_exam` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_exam_papers_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_exam_papers_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD CONSTRAINT `fk_exam_questions_paper` FOREIGN KEY (`paper_id`) REFERENCES `exam_papers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `geofence_logs`
--
ALTER TABLE `geofence_logs`
  ADD CONSTRAINT `fk_geofence_logs_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostels`
--
ALTER TABLE `hostels`
  ADD CONSTRAINT `fk_hostels_campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel_assignments`
--
ALTER TABLE `hostel_assignments`
  ADD CONSTRAINT `fk_hostel_assignments_bed` FOREIGN KEY (`bed_id`) REFERENCES `hostel_beds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hostel_assignments_campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hostel_assignments_hostel` FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hostel_assignments_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel_beds`
--
ALTER TABLE `hostel_beds`
  ADD CONSTRAINT `fk_hostel_beds_campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hostel_beds_hostel` FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hostel_beds_room` FOREIGN KEY (`room_id`) REFERENCES `hostel_rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  ADD CONSTRAINT `fk_hostel_rooms_campus` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hostel_rooms_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hostel_rooms_hostel` FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `fk_incidents_reported_by` FOREIGN KEY (`reported_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_incidents_resolved_by` FOREIGN KEY (`resolved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `incident_students`
--
ALTER TABLE `incident_students`
  ADD CONSTRAINT `fk_incident_students_incident` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_incident_students_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD CONSTRAINT `fk_inventory_items_category` FOREIGN KEY (`category_id`) REFERENCES `inventory_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  ADD CONSTRAINT `fk_inventory_movements_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventory_movements_issued_to` FOREIGN KEY (`issued_to_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventory_movements_item` FOREIGN KEY (`item_id`) REFERENCES `inventory_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `fk_leave_requests_approved_by` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_leave_requests_leave_type` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_leave_requests_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lesson_plans`
--
ALTER TABLE `lesson_plans`
  ADD CONSTRAINT `fk_lesson_plans_approved_by` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lesson_plans_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lesson_plans_section` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lesson_plans_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lesson_plans_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lesson_plans_term` FOREIGN KEY (`term_id`) REFERENCES `academic_terms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_books`
--
ALTER TABLE `library_books`
  ADD CONSTRAINT `fk_library_books_category` FOREIGN KEY (`category_id`) REFERENCES `library_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `library_issues`
--
ALTER TABLE `library_issues`
  ADD CONSTRAINT `fk_library_issues_book` FOREIGN KEY (`book_id`) REFERENCES `library_books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_library_issues_issued_by` FOREIGN KEY (`issued_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_library_issues_member` FOREIGN KEY (`member_id`) REFERENCES `library_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_library_issues_returned_by` FOREIGN KEY (`returned_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `library_members`
--
ALTER TABLE `library_members`
  ADD CONSTRAINT `fk_library_members_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_reservations`
--
ALTER TABLE `library_reservations`
  ADD CONSTRAINT `fk_library_reservations_book` FOREIGN KEY (`book_id`) REFERENCES `library_books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_library_reservations_member` FOREIGN KEY (`member_id`) REFERENCES `library_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meeting_bookings`
--
ALTER TABLE `meeting_bookings`
  ADD CONSTRAINT `fk_meeting_bookings_parent` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_meeting_bookings_slot` FOREIGN KEY (`slot_id`) REFERENCES `meeting_slots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_meeting_bookings_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meeting_slots`
--
ALTER TABLE `meeting_slots`
  ADD CONSTRAINT `fk_meeting_slots_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payroll_allowances`
--
ALTER TABLE `payroll_allowances`
  ADD CONSTRAINT `fk_payroll_allowances_employee` FOREIGN KEY (`employee_id`) REFERENCES `payroll_employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payroll_deductions`
--
ALTER TABLE `payroll_deductions`
  ADD CONSTRAINT `fk_payroll_deductions_employee` FOREIGN KEY (`employee_id`) REFERENCES `payroll_employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payroll_employees`
--
ALTER TABLE `payroll_employees`
  ADD CONSTRAINT `fk_payroll_employees_salary_grade` FOREIGN KEY (`salary_grade_id`) REFERENCES `payroll_salary_grades` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payroll_employees_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payroll_runs`
--
ALTER TABLE `payroll_runs`
  ADD CONSTRAINT `fk_payroll_runs_period` FOREIGN KEY (`period_id`) REFERENCES `payroll_periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payroll_runs_processed_by` FOREIGN KEY (`processed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payroll_slips`
--
ALTER TABLE `payroll_slips`
  ADD CONSTRAINT `fk_payroll_slips_employee` FOREIGN KEY (`employee_id`) REFERENCES `payroll_employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payroll_slips_payroll_run` FOREIGN KEY (`payroll_run_id`) REFERENCES `payroll_runs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report_cards`
--
ALTER TABLE `report_cards`
  ADD CONSTRAINT `fk_report_cards_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_report_cards_published_by` FOREIGN KEY (`published_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_report_cards_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_report_cards_term` FOREIGN KEY (`academic_term_id`) REFERENCES `academic_terms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_report_cards_year` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sick_visits`
--
ALTER TABLE `sick_visits`
  ADD CONSTRAINT `fk_sick_visits_attended_by` FOREIGN KEY (`attended_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sick_visits_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_health_records`
--
ALTER TABLE `student_health_records`
  ADD CONSTRAINT `fk_student_health_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_promotions`
--
ALTER TABLE `student_promotions`
  ADD CONSTRAINT `fk_student_promotions_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_promotions_from_campus` FOREIGN KEY (`from_campus_id`) REFERENCES `campuses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_promotions_from_class` FOREIGN KEY (`from_class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_promotions_from_section` FOREIGN KEY (`from_section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_promotions_from_year` FOREIGN KEY (`from_academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_promotions_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_promotions_to_campus` FOREIGN KEY (`to_campus_id`) REFERENCES `campuses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_promotions_to_class` FOREIGN KEY (`to_class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_promotions_to_section` FOREIGN KEY (`to_section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_promotions_to_year` FOREIGN KEY (`to_academic_year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_transport`
--
ALTER TABLE `student_transport`
  ADD CONSTRAINT `fk_student_transport_assignment` FOREIGN KEY (`assignment_id`) REFERENCES `transport_assignments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_transport_stop` FOREIGN KEY (`stop_id`) REFERENCES `transport_stops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_transport_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transport_assignments`
--
ALTER TABLE `transport_assignments`
  ADD CONSTRAINT `fk_transport_assignments_route` FOREIGN KEY (`route_id`) REFERENCES `transport_routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transport_assignments_term` FOREIGN KEY (`academic_term_id`) REFERENCES `academic_terms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transport_assignments_vehicle` FOREIGN KEY (`vehicle_id`) REFERENCES `transport_vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transport_stops`
--
ALTER TABLE `transport_stops`
  ADD CONSTRAINT `fk_transport_stops_route` FOREIGN KEY (`route_id`) REFERENCES `transport_routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD CONSTRAINT `fk_vaccinations_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voting_candidates`
--
ALTER TABLE `voting_candidates`
  ADD CONSTRAINT `fk_voting_candidates_approved_by` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voting_candidates_election` FOREIGN KEY (`election_id`) REFERENCES `voting_elections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voting_candidates_position` FOREIGN KEY (`position_id`) REFERENCES `voting_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voting_candidates_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voting_elections`
--
ALTER TABLE `voting_elections`
  ADD CONSTRAINT `fk_voting_elections_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voting_positions`
--
ALTER TABLE `voting_positions`
  ADD CONSTRAINT `fk_voting_positions_election` FOREIGN KEY (`election_id`) REFERENCES `voting_elections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voting_results`
--
ALTER TABLE `voting_results`
  ADD CONSTRAINT `fk_voting_results_candidate` FOREIGN KEY (`candidate_id`) REFERENCES `voting_candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voting_results_election` FOREIGN KEY (`election_id`) REFERENCES `voting_elections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voting_results_position` FOREIGN KEY (`position_id`) REFERENCES `voting_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voting_votes`
--
ALTER TABLE `voting_votes`
  ADD CONSTRAINT `fk_voting_votes_candidate` FOREIGN KEY (`candidate_id`) REFERENCES `voting_candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voting_votes_election` FOREIGN KEY (`election_id`) REFERENCES `voting_elections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voting_votes_position` FOREIGN KEY (`position_id`) REFERENCES `voting_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voting_votes_voter` FOREIGN KEY (`voter_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
