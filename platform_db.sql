-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2026 at 08:58 PM
-- Server version: 10.11.15-MariaDB
-- PHP Version: 8.4.14

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

CREATE PROCEDURE `GetSchoolStatistics` (IN `school_id` INT)
BEGIN
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
-- Stand-in structure for view `active_schools_view`
-- (See below for the actual view)
--
CREATE TABLE `active_schools_view` (
`id` int(10) unsigned
,`name` varchar(255)
,`slug` varchar(100)
,`email` varchar(255)
,`phone` varchar(20)
,`plan_name` varchar(100)
,`price_monthly` decimal(10,2)
,`trial_ends_at` timestamp
,`created_at` timestamp
);

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
(1, 1, 1001, 'school_admin', 'school.updated', 'School', 1, '{\"student_count\": 800}', '{\"student_count\": 850}', NULL, '197.210.76.101', 'Mozilla/5.0 (Windows NT 10.0)', NULL, '2026-01-15 00:57:06'),
(2, 1, 1002, 'school_admin', 'enrollment.accepted', 'EnrollmentRequest', 2, '{\"status\": \"reviewing\"}', '{\"status\": \"accepted\"}', NULL, '197.210.76.102', 'Mozilla/5.0 (Macintosh)', NULL, '2026-01-15 00:57:06'),
(3, 2, 2001, 'school_admin', 'invoice.created', 'Invoice', 3, NULL, '{\"amount\": 49.99, \"status\": \"draft\"}', NULL, '197.210.77.101', 'Mozilla/5.0 (Linux)', NULL, '2026-01-15 00:57:06'),
(4, 1, 1001, 'school_admin', 'school.updated', 'School', 1, '{\"student_count\": 800}', '{\"student_count\": 850}', NULL, '197.210.76.101', 'Mozilla/5.0 (Windows NT 10.0)', NULL, '2026-01-15 01:01:31'),
(5, 1, 1002, 'school_admin', 'enrollment.accepted', 'EnrollmentRequest', 2, '{\"status\": \"reviewing\"}', '{\"status\": \"accepted\"}', NULL, '197.210.76.102', 'Mozilla/5.0 (Macintosh)', NULL, '2026-01-15 01:01:31'),
(6, 2, 2001, 'school_admin', 'invoice.created', 'Invoice', 3, NULL, '{\"amount\": 49.99, \"status\": \"draft\"}', NULL, '197.210.77.101', 'Mozilla/5.0 (Linux)', NULL, '2026-01-15 01:01:31');

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

--
-- Dumping data for table `email_logs`
--

INSERT INTO `email_logs` (`id`, `school_id`, `to_email`, `subject`, `template`, `status`, `message_id`, `opened_at`, `clicked_at`, `error_message`, `created_at`) VALUES
(1, 1, 'james.okafor@email.com', 'Enrollment Application Received', 'enrollment_received', 'sent', 'MSG001', NULL, NULL, NULL, '2026-01-15 15:00:00'),
(2, 1, 'fatima.a@email.com', 'Admission Offer Letter', 'admission_offer', 'sent', 'MSG002', NULL, NULL, NULL, '2026-01-15 20:50:00'),
(3, 2, 'grace.c@email.com', 'Application Fee Reminder', 'fee_reminder', 'sent', 'MSG003', NULL, NULL, NULL, '2026-01-16 14:30:00'),
(4, 1, 'accounts@royalacademy.edu.ng', 'Payment Confirmation', 'payment_confirmation', 'sent', 'MSG004', NULL, NULL, NULL, '2026-01-05 19:35:00'),
(5, 1, 'james.okafor@email.com', 'Enrollment Application Received', 'enrollment_received', 'sent', 'MSG001', NULL, NULL, NULL, '2026-01-15 15:00:00'),
(6, 1, 'fatima.a@email.com', 'Admission Offer Letter', 'admission_offer', 'sent', 'MSG002', NULL, NULL, NULL, '2026-01-15 20:50:00'),
(7, 2, 'grace.c@email.com', 'Application Fee Reminder', 'fee_reminder', 'sent', 'MSG003', NULL, NULL, NULL, '2026-01-16 14:30:00'),
(8, 1, 'accounts@royalacademy.edu.ng', 'Payment Confirmation', 'payment_confirmation', 'sent', 'MSG004', NULL, NULL, NULL, '2026-01-05 19:35:00');

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

--
-- Dumping data for table `enrollment_fees`
--

INSERT INTO `enrollment_fees` (`id`, `school_id`, `enrollment_request_id`, `fee_type`, `description`, `amount`, `due_date`, `is_paid`, `paid_at`, `transaction_id`, `created_at`) VALUES
(1, 1, 1, 'application', 'Application Fee', 25000.00, '2026-01-31', 1, NULL, NULL, '2026-01-15 00:57:06'),
(2, 1, 1, 'registration', 'Registration Fee', 150000.00, '2026-02-15', 0, NULL, NULL, '2026-01-15 00:57:06'),
(3, 1, 2, 'application', 'Application Fee', 25000.00, '2026-01-31', 1, NULL, NULL, '2026-01-15 00:57:06'),
(4, 1, 2, 'acceptance', 'Acceptance Fee', 200000.00, '2026-02-20', 1, NULL, NULL, '2026-01-15 00:57:06'),
(5, 2, 3, 'application', 'Application Fee', 15000.00, '2026-02-10', 0, NULL, NULL, '2026-01-15 00:57:06'),
(6, 3, 4, 'application', 'Application Fee', 10000.00, '2026-01-25', 1, NULL, NULL, '2026-01-15 00:57:06'),
(7, 1, 1, 'application', 'Application Fee', 25000.00, '2026-01-31', 1, NULL, NULL, '2026-01-15 01:01:07'),
(8, 1, 1, 'registration', 'Registration Fee', 150000.00, '2026-02-15', 0, NULL, NULL, '2026-01-15 01:01:07'),
(9, 1, 2, 'application', 'Application Fee', 25000.00, '2026-01-31', 1, NULL, NULL, '2026-01-15 01:01:07'),
(10, 1, 2, 'acceptance', 'Acceptance Fee', 200000.00, '2026-02-20', 1, NULL, NULL, '2026-01-15 01:01:07'),
(11, 2, 3, 'application', 'Application Fee', 15000.00, '2026-02-10', 0, NULL, NULL, '2026-01-15 01:01:07'),
(12, 3, 4, 'application', 'Application Fee', 10000.00, '2026-01-25', 1, NULL, NULL, '2026-01-15 01:01:07');

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
-- Dumping data for table `enrollment_requests`
--

INSERT INTO `enrollment_requests` (`id`, `school_id`, `request_number`, `parent_first_name`, `parent_last_name`, `parent_email`, `parent_phone`, `parent_address`, `student_first_name`, `student_last_name`, `student_gender`, `student_date_of_birth`, `student_grade_level`, `student_previous_school`, `enrollment_type`, `academic_year`, `academic_term`, `special_requirements`, `documents_submitted`, `status`, `admin_notes`, `submitted_at`, `reviewed_at`, `reviewed_by`) VALUES
(1, 1, 'ENR-20260115-0001', 'James', 'Okafor', 'james.okafor@email.com', '+2347031234567', '45 Victoria Street, Lagos', 'David', 'Okafor', 'male', '2015-03-15', 'Primary 5', 'Sunrise Primary School', 'transfer', '2026/2027', 'First Term', 'Needs special attention in mathematics', '[\"birth_certificate\", \"previous_school_report\", \"passport_photos\", \"medical_report\"]', 'reviewing', 'Good academic records, needs to take placement test', '2026-01-15 00:57:06', '2026-01-14 16:30:00', NULL),
(2, 1, 'ENR-20260115-0002', 'Fatima', 'Abdullahi', 'fatima.a@email.com', '+2348023456789', '12 Ahmadu Bello Way, Kaduna', 'Aisha', 'Abdullahi', 'female', '2016-07-22', 'Primary 4', 'No previous school', 'new', '2026/2027', 'First Term', 'None', '[\"birth_certificate\", \"passport_photos\", \"medical_report\"]', 'accepted', 'All documents verified, parent interview completed', '2026-01-15 00:57:06', '2026-01-14 20:45:00', NULL),
(3, 2, 'ENR-20260116-0001', 'Grace', 'Chukwu', 'grace.c@email.com', '+2348098765432', '78 Independence Road, Abuja', 'Daniel', 'Chukwu', 'male', '2019-11-05', 'Nursery 2', 'Little Stars Nursery', 're_enrollment', '2026/2027', 'First Term', 'Allergic to peanuts', '[\"birth_certificate\", \"previous_report\", \"medical_report\", \"allergy_certificate\"]', 'pending', NULL, '2026-01-15 00:57:06', NULL, NULL),
(4, 3, 'ENR-20260116-0002', 'Mohammed', 'Aliyu', 'm.aliyu@email.com', '+2348145678901', '30 College Road, Kaduna', 'Kabir', 'Aliyu', 'male', '2010-08-14', 'JSS 3', 'Excel Comprehensive College (branch)', 'transfer', '2026/2027', 'First Term', 'Excel in sciences', '[\"birth_certificate\", \"transfer_certificate\", \"report_card\"]', 'waitlisted', 'Good student but class is full, on waiting list', '2026-01-15 00:57:06', '2026-01-15 14:20:00', NULL);

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
(1, 1, 1, 1, 'INV-202601-0001', NULL, NULL, 'Professional Plan - January 2026', 99.99, 5.00, 104.99, 'NGN', 'paid', 'success', '2026-01-10', NULL, '2026-01-15 00:57:06', '2026-01-15 00:57:06', 0, 'card', NULL, 'Payment received via Paystack', '2026-01-15 00:57:06', NULL, NULL, NULL, NULL),
(2, 1, 1, 1, 'INV-202512-0001', NULL, NULL, 'Professional Plan - December 2025', 99.99, 5.00, 104.99, 'NGN', 'paid', 'success', '2025-12-10', NULL, '2026-01-15 00:57:06', '2026-01-15 00:57:06', 0, 'bank_transfer', NULL, 'Payment via bank transfer', '2026-01-15 00:57:06', NULL, NULL, NULL, NULL),
(3, 2, 1, 2, 'INV-202601-0002', NULL, NULL, 'Starter Plan - January 2026', 49.99, 2.50, 52.49, 'NGN', 'paid', 'success', '2026-01-10', NULL, '2026-01-15 00:57:06', '2026-01-15 00:57:06', 0, 'card', NULL, 'Auto-debit payment', '2026-01-15 00:57:06', NULL, NULL, NULL, NULL),
(4, 2, 1, 2, 'INV-202512-0002', NULL, NULL, 'Starter Plan - December 2025', 49.99, 2.50, 52.49, 'NGN', 'paid', 'success', '2025-12-10', NULL, '2026-01-15 00:57:06', '2026-01-15 00:57:06', 0, 'card', NULL, 'Payment received', '2026-01-15 00:57:06', NULL, NULL, NULL, NULL),
(5, 3, 1, 3, 'INV-202601-0003', NULL, NULL, 'Free Trial Invoice', 0.00, 0.00, 0.00, 'NGN', 'sent', 'pending', '2026-02-15', NULL, '2026-01-15 00:57:06', '2026-01-15 00:57:06', 0, NULL, NULL, 'Free trial period', '2026-01-15 00:57:06', NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `payment_transactions`
--

INSERT INTO `payment_transactions` (`id`, `school_id`, `invoice_id`, `student_id`, `parent_id`, `payment_gateway_id`, `transaction_reference`, `gateway_transaction_id`, `amount`, `currency`, `gateway_fee`, `net_amount`, `status`, `payment_method`, `card_last_four`, `bank_name`, `account_number`, `payer_name`, `payer_email`, `payer_phone`, `metadata`, `gateway_response`, `verified_at`, `refunded_at`, `refund_reason`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 1, 'TXN-20260101-001', 'PSK_REF001', 104.99, 'NGN', 1.57, 103.42, 'success', 'card', '1234', NULL, NULL, 'Royal International Academy', 'accounts@royalacademy.edu.ng', '+2348031234567', '{\"invoice_id\": 1, \"subscription_id\": 1}', NULL, '2026-01-05 19:30:00', NULL, NULL, '2026-01-15 00:57:06', '2026-01-15 00:57:06'),
(2, 2, 3, NULL, NULL, 1, 'TXN-20260102-001', 'PSK_REF002', 52.49, 'NGN', 0.79, 51.70, 'success', 'card', '5678', NULL, NULL, 'Greenwood Montessori', 'director@greenwood.edu.ng', '+2348029876543', '{\"invoice_id\": 3, \"subscription_id\": 2}', NULL, '2026-01-06 15:15:00', NULL, NULL, '2026-01-15 00:57:06', '2026-01-15 00:57:06');

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
(1, 'Starter', 'starter', 'Perfect for small schools just getting started', 49.99, 499.99, 100, 20, 1, 1024, NULL, 1, 1, 1, '2026-01-15 00:48:26'),
(2, 'Professional', 'professional', 'For growing schools with multiple campuses', 99.99, 999.99, 500, 50, 3, 5120, NULL, 1, 0, 2, '2026-01-15 00:48:26'),
(3, 'Enterprise', 'enterprise', 'For large institutions with complex needs', 199.99, 1999.99, 2000, 200, 10, 10240, NULL, 1, 0, 3, '2026-01-15 00:48:26'),
(4, 'Free Trial', 'free-trial', '14-day free trial with limited features', 0.00, 0.00, 50, 5, 1, 512, NULL, 1, 0, 0, '2026-01-15 00:48:26');

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
(1, 1, 'subscription.renewed', 'Royal International Academy renewed Professional plan', 'system', '2026-01-05 19:30:00'),
(2, 2, 'payment.received', 'Payment received from Greenwood Montessori School', 'system', '2026-01-06 15:15:00'),
(3, 3, 'trial.started', 'Excel Comprehensive College started free trial', 'system', '2026-01-15 05:00:00');

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

--
-- Dumping data for table `platform_broadcasts`
--

INSERT INTO `platform_broadcasts` (`id`, `school_id`, `subject`, `message`, `user_types`, `total_recipients`, `emails_sent`, `sent_by`, `sent_at`) VALUES
(1, NULL, 'System Maintenance Notice', 'The platform will undergo maintenance on Sunday, 25th January 2026 from 2:00 AM to 6:00 AM. Services may be temporarily unavailable.', '[\"school_admin\", \"platform_admin\"]', 150, 150, 'System', '2026-01-15 01:01:45'),
(2, 1, 'New Feature: Parent Portal', 'We have launched an enhanced parent portal with new features. Check it out!', '[\"school_admin\"]', 5, 5, 'Platform Admin', '2026-01-15 01:01:45');

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
(1, 'Super Admin', 'admin@academixsuite.com', NULL, '$2y$10$d2Kj0wgJjhgplYqhdUFXRemEC17IAy/ik61X1J0iJMOoWjW8OkE96', 'super_admin', NULL, NULL, NULL, NULL, NULL, '2026-01-15 01:19:42', '102.90.81.44', 1, '2026-01-15 00:48:26', '2026-01-15 01:19:42'),
(2, 'Support Agent', 'support@schoolsaas.com', NULL, '$2y$10$AnotherHashHereForSupport', 'support', '+2348001234567', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-15 01:01:45', '2026-01-15 01:01:45'),
(3, 'Sales Executive', 'sales@schoolsaas.com', NULL, '$2y$10$AnotherHashHereForSales', 'sales', '+2348007654321', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2026-01-15 01:01:45', '2026-01-15 01:01:45');

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
(1, NULL, '22454e61-f1ad-11f0-a74d-00163e30e058', 'Royal International Academy', 'A premier international school offering world-class education with modern facilities and experienced faculty.', 'To provide holistic education that develops students intellectually, socially, and emotionally.', 'To be the leading educational institution producing global citizens and future leaders.', 'Dr. Adebayo Johnson', 'Welcome to Royal International Academy where excellence meets opportunity.', 'royal-international-academy', 'international', 'British Curriculum', 850, 65, 42, 'info@royalacademy.edu.ng', '+2348031234567', '1 Education Road, Victoria Island', 'Lagos', '101001', 'Lagos', 'Nigeria', '1995', 4.70, 2, 1500000.00, 3500000.00, '[\"Science Labs\", \"Library\", \"ICT Center\", \"Swimming Pool\", \"Football Field\", \"Music Studio\", \"Art Room\", \"Cafeteria\", \"Auditorium\"]', '[\"/schools/royal/campus1.jpg\", \"/schools/royal/lab.jpg\", \"/schools/royal/sports.jpg\"]', 'open', '[\"WAEC Accredited\", \"British Council Partner\"]', '[\"Cambridge International\", \"Pearson Edexcel\"]', '[\"Association of International Schools\", \"Nigerian Private Schools Association\"]', '[\"Debate Club\", \"Robotics\", \"Music Band\", \"Drama Society\", \"Chess Club\", \"Science Club\"]', '[\"Football\", \"Basketball\", \"Swimming\", \"Tennis\", \"Athletics\", \"Table Tennis\"]', 1, 1, 1, '1:15', 25, '7:30 AM - 3:30 PM', 'Submit application form, entrance exam, interview, document verification, admission offer', '2026-03-31', 1, 1, '{\"facebook\": \"https://facebook.com/royalacademy\", \"twitter\": \"https://twitter.com/royalacademy\", \"instagram\": \"https://instagram.com/royalacademy\", \"website\": \"https://royalacademy.edu.ng\"}', '/logos/royal-logo.png', '#1E40AF', '#047857', 'royal_academy_db', 'localhost', 3306, 2, 'active', '2026-03-01 04:59:59', '2027-01-01 04:59:59', '{\"email_notifications\": true, \"sms_notifications\": true, \"auto_backup\": true, \"parent_portal\": true}', 'Africa/Lagos', 'NGN', 'en', '2025-09-15 13:00:00', '2026-01-15 01:01:45', NULL, 'main', 'RIA001', 245, 1560, NULL, NULL, NULL),
(2, NULL, '224563e2-f1ad-11f0-a74d-00163e30e058', 'Greenwood Montessori School', 'Montessori-based education focusing on child-centered learning and development.', 'To nurture independent, confident learners through hands-on Montessori education.', 'Creating lifelong learners who contribute positively to society.', 'Mrs. Chinenye Okoro', 'At Greenwood, we believe every child is unique and capable.', 'greenwood-montessori', 'montessori', 'Montessori', 320, 28, 18, 'admissions@greenwood.edu.ng', '+2348029876543', '24 Learning Lane, GRA', 'Abuja', '900001', 'FCT', 'Nigeria', '2008', 4.80, 1, 800000.00, 1500000.00, '[\"Montessori Materials\", \"Playground\", \"Art Corner\", \"Music Room\", \"Library\", \"Garden\"]', '[\"/schools/greenwood/class1.jpg\", \"/schools/greenwood/playground.jpg\"]', 'waiting_list', '[\"Montessori Accreditation\", \"Ministry of Education Licensed\"]', '[\"Association of Montessori Schools\"]', '[\"Nigerian Montessori Association\", \"Early Childhood Association\"]', '[\"Gardening Club\", \"Story Time\", \"Creative Arts\", \"Music Appreciation\"]', '[\"Playground Equipment\", \"Mini Sports Field\"]', 1, 0, 1, '1:12', 20, '8:00 AM - 2:00 PM', 'Parent orientation, child observation, admission decision', '2026-02-28', 0, 1, '{\"facebook\": \"https://facebook.com/greenwoodmontessori\", \"instagram\": \"https://instagram.com/greenwoodmontessori\"}', '/logos/greenwood-logo.png', '#059669', '#F59E0B', 'greenwood_db', 'localhost', 3306, 1, 'active', '2026-02-01 04:59:59', '2026-12-01 04:59:59', '{\"email_notifications\": true, \"sms_notifications\": true, \"parent_portal\": true}', 'Africa/Lagos', 'NGN', 'en', '2025-10-10 14:30:00', '2026-01-15 01:01:45', NULL, 'main', 'GMS001', 120, 890, NULL, NULL, NULL),
(3, NULL, '2245688e-f1ad-11f0-a74d-00163e30e058', 'Excel Comprehensive College', 'Comprehensive secondary school offering both sciences and arts with excellent academic records.', 'To provide quality education that prepares students for university and life.', 'Producing academically excellent and morally sound graduates.', 'Mr. Ibrahim Abdullahi', 'Excel in academics, excel in character, excel in life.', 'excel-comprehensive', 'comprehensive', 'Nigerian', 1200, 85, 48, 'excelcollege@excel.edu.ng', '+2348145678901', '15 Knowledge Avenue, Sabo', 'Kaduna', '800001', 'Kaduna', 'Nigeria', '1985', 4.20, 1, 500000.00, 1200000.00, '[\"Science Labs\", \"Library\", \"Computer Lab\", \"Sports Complex\", \"Arts Studio\", \"Home Economics Lab\"]', '[\"/schools/excel/science-lab.jpg\", \"/schools/excel/sports-complex.jpg\"]', 'open', '[\"WAEC\", \"NECO\", \"JAMB Accredited\"]', '[\"Federal Ministry of Education\"]', '[\"Association of Model Schools\", \"Science Teachers Association\"]', '[\"Science Club\", \"Debating Society\", \"Press Club\", \"Young Farmers\", \"JETS Club\"]', '[\"Football\", \"Basketball\", \"Volleyball\", \"Athletics\", \"Table Tennis\"]', 0, 1, 0, '1:18', 35, '7:00 AM - 4:00 PM', 'Entrance exam, interview, medical checkup, admission', '2026-04-15', 1, 1, '{\"facebook\": \"https://facebook.com/excelcollege\", \"website\": \"https://excelcollege.edu.ng\"}', '/logos/excel-logo.png', '#DC2626', '#1E40AF', 'excel_db', 'localhost', 3306, 3, 'trial', '2026-03-16 03:59:59', NULL, '{\"email_notifications\": true, \"sms_notifications\": false, \"auto_backup\": false}', 'Africa/Lagos', 'NGN', 'en', '2025-11-05 19:20:00', '2026-01-15 01:01:45', NULL, 'main', 'ECC001', 85, 450, NULL, NULL, NULL),
(5, NULL, 'c5bb6321-36fd-4ccc-a966-e3cf5945de93', 'brook harry', 'tewsdt', NULL, NULL, NULL, NULL, 'brook-harry', 'comprehensive', 'American', 100, 5, 20, 'favouruzodinma55@gmail.com', '+377909888766', 'Sbagha Bagha\r\nSbagha Bagha', 'casablanca', '10000', 'Anambra', 'Nigeria', '1990', 0.00, 0, 0.00, 0.00, NULL, NULL, 'open', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'assets/uploads/schools/5/logo-brook-harry.jpeg', '#3B82F6', '#10B981', NULL, 'localhost', 3306, 3, 'trial', '2026-01-22 01:40:47', NULL, '{\"timezone\":\"Africa\\/Lagos\",\"currency\":\"NGN\",\"language\":\"en\",\"attendance_method\":\"daily\",\"grading_system\":\"percentage\"}', 'Africa/Lagos', 'NGN', 'en', '2026-01-15 01:40:47', '2026-01-15 01:40:47', NULL, 'main', 'MAI654', 0, 0, NULL, NULL, NULL);

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
(1, 1, 1001, 'admin@royalacademy.edu.ng', 'owner', '[\"manage_school\", \"manage_users\", \"view_reports\", \"process_payments\"]', 1, '2026-01-15 00:57:06'),
(2, 1, 1002, 'principal@royalacademy.edu.ng', 'principal', '[\"manage_academics\", \"view_reports\", \"manage_staff\"]', 1, '2026-01-15 00:57:06'),
(3, 1, 1003, 'accounts@royalacademy.edu.ng', 'accountant', '[\"process_payments\", \"view_financials\", \"generate_invoices\"]', 1, '2026-01-15 00:57:06'),
(4, 2, 2001, 'director@greenwood.edu.ng', 'owner', '[\"manage_school\", \"manage_users\", \"view_reports\"]', 1, '2026-01-15 00:57:06'),
(5, 3, 3001, 'admin@excel.edu.ng', 'admin', '[\"manage_school\", \"view_reports\", \"manage_users\"]', 1, '2026-01-15 00:57:06');

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

--
-- Dumping data for table `school_contacts`
--

INSERT INTO `school_contacts` (`id`, `school_id`, `type`, `label`, `value`, `is_primary`, `sort_order`, `created_at`) VALUES
(1, 1, 'phone', 'Main Office', '+2348031234567', 1, 1, '2026-01-15 00:57:06'),
(2, 1, 'phone', 'Admissions', '+2348022345678', 0, 2, '2026-01-15 00:57:06'),
(3, 1, 'email', 'General Inquiry', 'info@royalacademy.edu.ng', 1, 3, '2026-01-15 00:57:06'),
(4, 1, 'email', 'Admissions', 'admissions@royalacademy.edu.ng', 0, 4, '2026-01-15 00:57:06'),
(5, 1, 'address', 'Main Campus', '1 Education Road, Victoria Island, Lagos', 1, 5, '2026-01-15 00:57:06'),
(6, 1, 'website', 'Official Website', 'https://royalacademy.edu.ng', 1, 6, '2026-01-15 00:57:06'),
(7, 2, 'phone', 'School Office', '+2348029876543', 1, 1, '2026-01-15 00:57:06'),
(8, 2, 'email', 'General', 'info@greenwood.edu.ng', 1, 2, '2026-01-15 00:57:06'),
(9, 2, 'address', 'School Address', '24 Learning Lane, GRA, Abuja', 1, 3, '2026-01-15 00:57:06'),
(10, 3, 'phone', 'Principal Office', '+2348145678901', 1, 1, '2026-01-15 00:57:06'),
(11, 3, 'phone', 'Admin Office', '+2348156789012', 0, 2, '2026-01-15 00:57:06'),
(12, 3, 'email', 'Contact', 'contact@excel.edu.ng', 1, 3, '2026-01-15 00:57:06'),
(13, 1, 'phone', 'Main Office', '+2348031234567', 1, 1, '2026-01-15 00:59:53'),
(14, 1, 'phone', 'Admissions', '+2348022345678', 0, 2, '2026-01-15 00:59:53'),
(15, 1, 'email', 'General Inquiry', 'info@royalacademy.edu.ng', 1, 3, '2026-01-15 00:59:53'),
(16, 1, 'email', 'Admissions', 'admissions@royalacademy.edu.ng', 0, 4, '2026-01-15 00:59:53'),
(17, 1, 'address', 'Main Campus', '1 Education Road, Victoria Island, Lagos', 1, 5, '2026-01-15 00:59:53'),
(18, 1, 'website', 'Official Website', 'https://royalacademy.edu.ng', 1, 6, '2026-01-15 00:59:53'),
(19, 2, 'phone', 'School Office', '+2348029876543', 1, 1, '2026-01-15 00:59:53'),
(20, 2, 'email', 'General', 'info@greenwood.edu.ng', 1, 2, '2026-01-15 00:59:53'),
(21, 2, 'address', 'School Address', '24 Learning Lane, GRA, Abuja', 1, 3, '2026-01-15 00:59:53'),
(22, 3, 'phone', 'Principal Office', '+2348145678901', 1, 1, '2026-01-15 00:59:53'),
(23, 3, 'phone', 'Admin Office', '+2348156789012', 0, 2, '2026-01-15 00:59:53'),
(24, 3, 'email', 'Contact', 'contact@excel.edu.ng', 1, 3, '2026-01-15 00:59:53');

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

--
-- Dumping data for table `school_facilities`
--

INSERT INTO `school_facilities` (`id`, `school_id`, `name`, `description`, `icon`, `is_active`, `sort_order`, `created_at`) VALUES
(1, 1, 'Science Laboratory', 'Fully equipped physics, chemistry and biology labs', 'flask', 1, 1, '2026-01-15 01:01:31'),
(2, 1, 'Library', 'Digital and physical library with over 10,000 books', 'book', 1, 2, '2026-01-15 01:01:31'),
(3, 1, 'ICT Center', 'Computer lab with high-speed internet', 'monitor', 1, 3, '2026-01-15 01:01:31'),
(4, 1, 'Sports Complex', 'Football field, basketball court, swimming pool', 'sports', 1, 4, '2026-01-15 01:01:31'),
(5, 2, 'Montessori Classroom', 'Specially designed Montessori learning environment', 'home', 1, 1, '2026-01-15 01:01:31'),
(6, 2, 'Playground', 'Safe and well-equipped playground', 'play', 1, 2, '2026-01-15 01:01:31'),
(7, 3, 'Science Lab', 'Laboratory for practical sciences', 'flask', 1, 1, '2026-01-15 01:01:31'),
(8, 3, 'Computer Lab', 'ICT training center', 'monitor', 1, 2, '2026-01-15 01:01:31');

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

--
-- Dumping data for table `school_gallery`
--

INSERT INTO `school_gallery` (`id`, `school_id`, `image_url`, `caption`, `type`, `sort_order`, `created_at`) VALUES
(1, 1, '/gallery/royal/campus-aerial.jpg', 'Aerial view of campus', 'campus', 1, '2026-01-15 01:01:31'),
(2, 1, '/gallery/royal/science-lab.jpg', 'Modern science laboratory', 'laboratory', 2, '2026-01-15 01:01:31'),
(3, 1, '/gallery/royal/sports-day.jpg', 'Annual sports day event', 'events', 3, '2026-01-15 01:01:31'),
(4, 2, '/gallery/greenwood/classroom.jpg', 'Montessori classroom setup', 'classroom', 1, '2026-01-15 01:01:31'),
(5, 2, '/gallery/greenwood/play-area.jpg', 'Children playing area', 'sports', 2, '2026-01-15 01:01:31');

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

--
-- Dumping data for table `school_reviews`
--

INSERT INTO `school_reviews` (`id`, `school_id`, `parent_name`, `parent_email`, `student_name`, `rating`, `title`, `comment`, `pros`, `cons`, `is_verified`, `is_approved`, `helpful_count`, `created_at`) VALUES
(1, 1, 'Sarah Johnson', 'sarah.j@email.com', 'Emily Johnson', 5.0, 'Excellent School!', 'Royal Academy has transformed my daughter. The teachers are dedicated and facilities are top-notch.', 'Great teachers, modern facilities, diverse activities', 'Fees are high but worth it', 1, 1, 15, '2026-01-15 00:57:06'),
(2, 1, 'Michael Adeyemi', 'mike.a@email.com', 'Tunde Adeyemi', 4.5, 'Great academic standards', 'My son has improved tremendously in his academics. The school focuses on holistic development.', 'Strong academics, good discipline, caring staff', 'Traffic during drop-off/pick-up', 1, 1, 8, '2026-01-15 00:57:06'),
(3, 2, 'Jennifer Okeke', 'j.okeke@email.com', 'Chima Okeke', 4.8, 'Perfect for young children', 'Greenwood provides a nurturing environment. My son loves going to school every day.', 'Child-centered approach, caring teachers, safe environment', 'Limited sports facilities', 1, 1, 12, '2026-01-15 00:57:06'),
(4, 3, 'Alhaji Bello', 'a.bello@email.com', 'Musa Bello', 4.2, 'Good value for money', 'Excel College provides quality education at reasonable fees. Disciplined environment.', 'Affordable, disciplined, good academic records', 'Crowded classes, needs more facilities', 1, 1, 5, '2026-01-15 00:57:06'),
(5, 1, 'Sarah Johnson', 'sarah.j@email.com', 'Emily Johnson', 5.0, 'Excellent School!', 'Royal Academy has transformed my daughter. The teachers are dedicated and facilities are top-notch.', 'Great teachers, modern facilities, diverse activities', 'Fees are high but worth it', 1, 1, 15, '2026-01-15 01:01:08'),
(6, 1, 'Michael Adeyemi', 'mike.a@email.com', 'Tunde Adeyemi', 4.5, 'Great academic standards', 'My son has improved tremendously in his academics. The school focuses on holistic development.', 'Strong academics, good discipline, caring staff', 'Traffic during drop-off/pick-up', 1, 1, 8, '2026-01-15 01:01:08'),
(7, 2, 'Jennifer Okeke', 'j.okeke@email.com', 'Chima Okeke', 4.8, 'Perfect for young children', 'Greenwood provides a nurturing environment. My son loves going to school every day.', 'Child-centered approach, caring teachers, safe environment', 'Limited sports facilities', 1, 1, 12, '2026-01-15 01:01:08'),
(8, 3, 'Alhaji Bello', 'a.bello@email.com', 'Musa Bello', 4.2, 'Good value for money', 'Excel College provides quality education at reasonable fees. Disciplined environment.', 'Affordable, disciplined, good academic records', 'Crowded classes, needs more facilities', 1, 1, 5, '2026-01-15 01:01:08');

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

--
-- Dumping data for table `sms_logs`
--

INSERT INTO `sms_logs` (`id`, `school_id`, `to`, `message`, `status`, `cost`, `message_id`, `provider`, `error_message`, `created_at`) VALUES
(1, 1, '+2347031234567', 'Dear parent, your enrollment application has been received. Application No: ENR-20260115-0001', 'delivered', 2.5000, NULL, 'Termii', NULL, '2026-01-15 15:05:00'),
(2, 1, '+2348023456789', 'Congratulations! Your child has been admitted to Royal International Academy. Check email for details.', 'sent', 2.5000, NULL, 'Termii', NULL, '2026-01-15 20:55:00'),
(3, 2, '+2348098765432', 'Reminder: Application fee of N15,000 is due on 2026-02-10. Please make payment.', 'delivered', 2.5000, NULL, 'Termii', NULL, '2026-01-16 14:35:00'),
(4, 1, '+2347031234567', 'Dear parent, your enrollment application has been received. Application No: ENR-20260115-0001', 'delivered', 2.5000, NULL, 'Termii', NULL, '2026-01-15 15:05:00'),
(5, 1, '+2348023456789', 'Congratulations! Your child has been admitted to Royal International Academy. Check email for details.', 'sent', 2.5000, NULL, 'Termii', NULL, '2026-01-15 20:55:00'),
(6, 2, '+2348098765432', 'Reminder: Application fee of N15,000 is due on 2026-02-10. Please make payment.', 'delivered', 2.5000, NULL, 'Termii', NULL, '2026-01-16 14:35:00');

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
(1, 1, 2, NULL, NULL, 'Professional Plan - Monthly', 'active', 'monthly', 99.99, 'NGN', '2026-01-01 05:00:00', '2026-02-01 05:00:00', NULL, NULL, '2026-01-15 00:57:06'),
(2, 2, 1, NULL, NULL, 'Starter Plan - Monthly', 'active', 'monthly', 49.99, 'NGN', '2026-01-01 05:00:00', '2026-02-01 05:00:00', NULL, NULL, '2026-01-15 00:57:06'),
(3, 3, 4, NULL, NULL, 'Free Trial', 'pending', 'monthly', 0.00, 'NGN', '2026-01-15 05:00:00', '2026-02-15 05:00:00', NULL, NULL, '2026-01-15 00:57:06');

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
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `school_id`, `ticket_number`, `subject`, `description`, `priority`, `status`, `category`, `assigned_to`, `resolved_at`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'TICKET-20260110-001', 'Parent Portal Login Issue', 'Parents are unable to login to the portal. Error message shows \"Invalid credentials\" even with correct password.', 'high', 'in_progress', 'technical', 1, NULL, 1001, '2026-01-10 14:15:00', '2026-01-15 00:57:06'),
(2, 2, 'TICKET-20260112-001', 'Invoice Generation Problem', 'Unable to generate invoices for the new term. System shows error when trying to create bulk invoices.', 'medium', 'open', 'billing', NULL, NULL, 2001, '2026-01-12 19:30:00', '2026-01-15 00:57:06'),
(3, 1, 'TICKET-20260114-001', 'Payment Gateway Integration', 'Need to integrate Flutterwave as additional payment option for parents.', 'low', 'resolved', 'integration', 1, NULL, 1003, '2026-01-14 16:20:00', '2026-01-15 00:57:06'),
(4, 3, 'TICKET-20260115-001', 'Database Backup Not Working', 'Scheduled database backups are failing. Error in backup process.', 'urgent', 'open', 'technical', NULL, NULL, 3001, '2026-01-15 21:45:00', '2026-01-15 00:57:06');

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
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_school` (`school_id`),
  ADD KEY `idx_to` (`to_email`),
  ADD KEY `idx_created` (`created_at`);

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
-- Indexes for table `parent_portal_access`
--
ALTER TABLE `parent_portal_access`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `access_token` (`access_token`),
  ADD KEY `idx_school_parent` (`school_id`,`parent_id`),
  ADD KEY `idx_student` (`student_id`),
  ADD KEY `idx_expires` (`expires_at`);

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
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enrollment_documents`
--
ALTER TABLE `enrollment_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment_fees`
--
ALTER TABLE `enrollment_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enrollment_requests`
--
ALTER TABLE `enrollment_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parent_portal_access`
--
ALTER TABLE `parent_portal_access`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_tokens`
--
ALTER TABLE `payment_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `platform_audit_logs`
--
ALTER TABLE `platform_audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `platform_broadcasts`
--
ALTER TABLE `platform_broadcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `platform_users`
--
ALTER TABLE `platform_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_admins`
--
ALTER TABLE `school_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_contacts`
--
ALTER TABLE `school_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `school_facilities`
--
ALTER TABLE `school_facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_gallery`
--
ALTER TABLE `school_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_reviews`
--
ALTER TABLE `school_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

-- --------------------------------------------------------

--
-- Structure for view `active_schools_view`
--
DROP TABLE IF EXISTS `active_schools_view`;

CREATE OR REPLACE VIEW `active_schools_view` AS 
SELECT 
    `s`.`id` AS `id`,
    `s`.`name` AS `name`, 
    `s`.`slug` AS `slug`, 
    `s`.`email` AS `email`, 
    `s`.`phone` AS `phone`, 
    `p`.`name` AS `plan_name`, 
    `p`.`price_monthly` AS `price_monthly`, 
    `s`.`trial_ends_at` AS `trial_ends_at`, 
    `s`.`created_at` AS `created_at` 
FROM (`schools` `s` 
LEFT JOIN `plans` `p` ON `s`.`plan_id` = `p`.`id`) 
WHERE `s`.`status` IN ('active','trial') 
ORDER BY `s`.`created_at` DESC;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD CONSTRAINT `email_logs_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `enrollment_documents`
--
ALTER TABLE `enrollment_documents`
  ADD CONSTRAINT `enrollment_documents_ibfk_1` FOREIGN KEY (`enrollment_request_id`) REFERENCES `enrollment_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollment_fees`
--
ALTER TABLE `enrollment_fees`
  ADD CONSTRAINT `fk_enrollment_fees_request` FOREIGN KEY (`enrollment_request_id`) REFERENCES `enrollment_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_enrollment_fees_school` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollment_requests`
--
ALTER TABLE `enrollment_requests`
  ADD CONSTRAINT `enrollment_requests_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invoices_payment_gateway` FOREIGN KEY (`payment_gateway_id`) REFERENCES `payment_gateways` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `parent_portal_access`
--
ALTER TABLE `parent_portal_access`
  ADD CONSTRAINT `fk_parent_portal_school` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD CONSTRAINT `fk_payment_gateways_school` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_tokens`
--
ALTER TABLE `payment_tokens`
  ADD CONSTRAINT `payment_tokens_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD CONSTRAINT `fk_transactions_gateway` FOREIGN KEY (`payment_gateway_id`) REFERENCES `payment_gateways` (`id`),
  ADD CONSTRAINT `fk_transactions_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_transactions_school` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`parent_school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `schools_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `school_admins`
--
ALTER TABLE `school_admins`
  ADD CONSTRAINT `school_admins_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_contacts`
--
ALTER TABLE `school_contacts`
  ADD CONSTRAINT `school_contacts_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_facilities`
--
ALTER TABLE `school_facilities`
  ADD CONSTRAINT `school_facilities_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_gallery`
--
ALTER TABLE `school_gallery`
  ADD CONSTRAINT `school_gallery_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_reviews`
--
ALTER TABLE `school_reviews`
  ADD CONSTRAINT `school_reviews_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD CONSTRAINT `sms_logs_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`);

--
-- Constraints for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD CONSTRAINT `support_tickets_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `support_tickets_ibfk_2` FOREIGN KEY (`assigned_to`) REFERENCES `platform_users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
