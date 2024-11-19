-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2024 at 03:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bark`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint UNSIGNED NOT NULL,
  `state_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Noman', 'Noman@gmail.com', 'as', '2024-10-30 07:00:42', '2024-10-30 07:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint UNSIGNED NOT NULL,
  `sortname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE `estimates` (
  `id` bigint UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `valid_until` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `inventoriable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventoriable_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_gated_property` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_cat_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_homeowner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_unit_cordination` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `multe_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_tech_assign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes_for_tech` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completion_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_priority_categories`
--

CREATE TABLE `job_priority_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_source_categories`
--

CREATE TABLE `job_source_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_sub_categories`
--

CREATE TABLE `job_sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_cat_id` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job__categories`
--

CREATE TABLE `job__categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(2, 'as', 'as@gmail.com', '2024-10-31 09:52:06', '2024-10-31 09:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `lead_genrates`
--

CREATE TABLE `lead_genrates` (
  `id` bigint UNSIGNED NOT NULL,
  `assign_company_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `need` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `business` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_genrates`
--

INSERT INTO `lead_genrates` (`id`, `assign_company_id`, `service_id`, `need`, `business`, `industry`, `live_website`, `contact`, `budget`, `hire`, `name`, `phone`, `email`, `zip`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 'To advertise my business/services', 'Sole trader/self-employed', 'Entertainment & events', 'Within a month', NULL, '£2,000 - £2,999', 'I will possibly hire someone', 'Mallory Hayes', '+1 (588) 975-8666', 'mezeme@mailinator.com', '31184', 'Dolores dolor id di', 1, '2024-10-30 06:10:41', '2024-10-30 07:54:43'),
(2, 3, NULL, 'To advertise my business/services', 'Personal project', 'Creative industries', 'As soon as possible', NULL, '£1,000 - £1,999', 'Im definitely going to hire someone', 'Palmer Larsen', '+1 (457) 879-9964', 'jadol@mailinator.com', '16794', 'Dolores dolor id di', 1, '2024-10-30 06:18:34', '2024-10-30 07:55:03'),
(3, 2, NULL, 'To advertise my business/services', 'Sole trader/self-employed', 'Entertainment & events', 'Within a few months', NULL, '£2,000 - £2,999', 'I will possibly hire someone', 'Helen Harmon', '+1 (912) 943-8759', 'hagonysic@mailinator.com', '26978', 'Dolores dolor id di', 1, '2024-10-30 06:59:52', '2024-10-30 07:58:45'),
(4, 3, NULL, 'To advertise my business/services', 'Sole trader/self-employed', 'Entertainment & events', 'As soon as possible', NULL, '£250 - £999', 'Im likely to hire someone', 'umarf4929@gmail.com', '+923172112995', 'umarf4929@gmail.com', '79400', 'Dolores dolor id di', 1, '2024-10-30 08:03:49', '2024-10-30 08:04:12'),
(5, 3, NULL, 'To advertise my business/services', 'Small business (1 - 9 employees)', 'Entertainment & events', 'Within a few weeks', NULL, '£1,000 - £1,999', 'I will possibly hire someone', 'Noman', '+1 (936) 852-5551', 'nomi@gmail.com', '7900', 'Dolores dolor id di', 1, '2024-10-31 10:32:56', '2024-10-31 12:18:22'),
(6, 3, NULL, 'To sell products/services e.g. e-commerce', 'Small business (1 - 9 employees)', 'Home services', 'Within a few weeks', NULL, '£250 - £999', 'Im likely to hire someone', 'Robin Blake', '+1 (864) 589-5236', 'wycepawuto@mailinator.com', '46845', 'Dolores dolor id di', 1, '2024-10-31 13:11:33', '2024-11-01 06:40:22'),
(7, 3, NULL, 'To advertise my business/services', 'Personal project', 'Creative industries', 'As soon as possible', NULL, '£250 - £999', 'Im likely to hire someone', 'Joel Fowler', '+1 (984) 811-5975', 'gusigedyx@mailinator.com', '98382', 'Dolores dolor id di', 1, '2024-11-01 06:38:26', '2024-11-01 06:40:32'),
(8, 3, NULL, 'To advertise my business/services', 'Personal project', 'Entertainment & events', 'I would like to discuss this with the professional', NULL, '£250 - £999', 'I will possibly hire someone', 'as33', '03172112996', 'as33@gmail.com', '79400', 'pakasaasas', 1, '2024-11-13 09:38:51', '2024-11-13 10:01:14'),
(9, 3, NULL, 'To advertise my business/services', 'Sole trader/self-employed', 'Health & fitness', 'I would like to discuss this with the professional', NULL, '£3,000 - £4,999', 'I will possibly hire someone', 'Simon Burgess', '+1 (267) 155-2148', 'zizevyb@mailinator.com', '93608', 'Voluptatibus accusan', 1, '2024-11-14 10:03:34', '2024-11-14 12:37:56'),
(10, 3, NULL, 'To sell products/services e.g. e-commerce', 'Medium business (10 - 29 employees)', 'Entertainment & events', 'I would like to discuss this with the professional', NULL, '£5,000 or more', 'Im definitely going to hire someone', 'Nerea Russell', '+1 (868) 375-2098', 'qepyneby@mailinator.com', '95188', 'Ut qui nihil et exce', 1, '2024-11-14 12:38:58', '2024-11-14 12:39:29'),
(11, NULL, NULL, 'To advertise my business/services', 'Sole trader/self-employed', 'Financial services', 'Within a month', NULL, '£2,000 - £2,999', 'I will possibly hire someone', 'Fallon Guthrie', '+1 (167) 313-8957', 'minyk@mailinator.com', '88828', 'Soluta repudiandae c', NULL, '2024-11-15 09:55:25', '2024-11-15 09:55:25'),
(12, NULL, NULL, 'To sell products/services e.g. e-commerce', 'Medium business (10 - 29 employees)', 'Home services', 'Within a few months', NULL, '£2,000 - £2,999', 'I will possibly hire someone', 'Regan Perry', '+1 (416) 814-4905', 'bomekyqeli@mailinator.com', '36190', 'Nihil obcaecati ut q', NULL, '2024-11-15 09:59:23', '2024-11-15 09:59:23'),
(13, NULL, NULL, 'Marquee Hire', 'Medium business (10 - 29 employees)', 'Home services', 'Within a few months', NULL, '£1,000 - £1,999', 'I will possibly hire someone', 'Rogan Black', '+1 (534) 394-7622', 'bexacyreq@mailinator.com', '79365', 'Obcaecati nisi in es', NULL, '2024-11-18 10:40:07', '2024-11-18 10:40:07'),
(14, NULL, NULL, 'To advertise my business/services', 'Small business (1 - 9 employees)', 'Financial services', 'Within a month', NULL, '£2,000 - £2,999', 'Im likely to hire someone', 'nasir', '+1 (936) 852-5551', 'nasir@gmail.com', '79400', 'yes i have don', NULL, '2024-11-18 11:03:25', '2024-11-18 11:03:25'),
(15, NULL, NULL, 'To advertise my business/services', 'Medium business (10 - 29 employees)', 'Health & fitness', 'Within a month', NULL, '£1,000 - £1,999', 'Im likely to hire someone', 'Yael Young', '+1 (271) 173-7586', 'dysiri@mailinator.com', '20954', 'Modi et temporibus v', NULL, '2024-11-18 11:11:23', '2024-11-18 11:11:23'),
(16, NULL, NULL, 'To advertise my business/services', 'Sole trader/self-employed', 'Entertainment & events', 'Within a month', NULL, '£1,000 - £1,999', 'Im likely to hire someone', 'Julian Sharpe', '+1 (547) 811-5686', 'kurocucyc@mailinator.com', '30302', 'Eum modi impedit ei', NULL, '2024-11-18 11:15:12', '2024-11-18 11:15:12'),
(17, NULL, NULL, 'To advertise my business/services', 'Small business (1 - 9 employees)', 'Financial services', 'Within a month', NULL, '£2,000 - £2,999', 'Im likely to hire someone', 'Carter Lyons', '+1 (697) 672-4743', 'pypo@mailinator.com', '92911', 'Nihil praesentium do', NULL, '2024-11-18 11:21:46', '2024-11-18 11:21:46'),
(18, NULL, NULL, 'To advertise my business/services', 'Sole trader/self-employed', 'Entertainment & events', 'Within a few weeks', NULL, '£1,000 - £1,999', 'Im likely to hire someone', 'Oliver Carter', '+1 (819) 998-1422', 'vageloke@mailinator.com', '34736', 'At sunt fuga Ullam', NULL, '2024-11-18 11:32:52', '2024-11-18 11:32:52'),
(19, NULL, NULL, 'Female', 'Small business (1 - 9 employees)', 'Health & fitness', 'Within a month', NULL, '£1,000 - £1,999', 'Im likely to hire someone', 'Troy Wooten', '+1 (945) 661-6969', 'lusapapel@mailinator.com', '60953', 'Inventore eum pariat', NULL, '2024-11-18 11:34:06', '2024-11-18 11:34:06'),
(20, NULL, NULL, 'To sell products/services e.g. e-commerce', 'Medium business (10 - 29 employees)', 'Health & fitness', 'I would like to discuss this with the professional', NULL, '£3,000 - £4,999', 'Im planning and researching', 'Nell Mccarthy', '+1 (674) 858-5662', 'qapacacuw@mailinator.com', '87503', 'Alias elit dolorem', NULL, '2024-11-18 11:48:59', '2024-11-18 11:48:59'),
(21, NULL, 3, 'To advertise my business/services', 'Sole trader/self-employed', 'Home services', 'Within a few months', NULL, '£2,000 - £2,999', 'Im likely to hire someone', 'Ursula Barrera', '+1 (517) 424-2511', 'fofiwily@mailinator.com', '92134', 'Ab qui sunt et blan', NULL, '2024-11-19 05:20:06', '2024-11-19 05:20:06'),
(22, NULL, 6, 'Commercial property', 'Small business (1 - 9 employees)', 'Business services', 'I would like to discuss this with the professional', NULL, '£1,000 - £1,999', 'I will possibly hire someone', 'Kameko Erickson', '+1 (495) 955-5714', 'difyjo@mailinator.com', '78371', 'Non culpa ab ullamco', NULL, '2024-11-19 05:28:06', '2024-11-19 05:28:06'),
(23, NULL, 3, 'To sell products/services e.g. e-commerce', 'Large business (30 - 99 employees)', 'Health & fitness', 'Within a few months', NULL, '£250 - £999', 'I will possibly hire someone', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-19 06:18:44', '2024-11-19 06:18:44'),
(24, NULL, 3, 'To advertise my business/services', 'Small business (1 - 9 employees)', 'Business services', 'Within a few weeks', NULL, '£3,000 - £4,999', 'I will possibly hire someone', 'Avram Russo', '+1 (576) 744-4968', 'valahila@mailinator.com', '25883', 'Ut sint non sunt qua', NULL, '2024-11-19 07:28:08', '2024-11-19 07:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `lead_services`
--

CREATE TABLE `lead_services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_services`
--

INSERT INTO `lead_services` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Web Design', 'Web Design', '2024-11-15 11:52:40', '2024-11-18 10:42:21'),
(4, 'House Cleaning', 'House Cleaning', '2024-11-18 09:36:01', '2024-11-18 10:42:08'),
(5, 'Personal Trainers', 'Personal Trainers', '2024-11-18 10:47:42', '2024-11-18 10:47:42'),
(6, 'Web Development', 'Web Development', '2024-11-18 11:44:08', '2024-11-18 11:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_06_222923_create_transactions_table', 1),
(4, '2018_11_07_192923_create_transfers_table', 1),
(5, '2018_11_15_124230_create_wallets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2021_01_30_100000_create_inventories_table', 1),
(9, '2021_11_02_202021_update_wallets_uuid_table', 1),
(10, '2022_11_17_142500_create_permission_tables', 1),
(11, '2022_11_18_154332_create_users_verify_table', 1),
(12, '2022_11_29_123506_create_country_table', 1),
(13, '2022_11_29_123754_create_state_table', 1),
(14, '2022_11_29_123812_create_city_table', 1),
(15, '2022_12_08_114205_create_general_settings_table', 1),
(16, '2023_06_23_120608_create_posts_table', 1),
(17, '2023_07_05_131852_create_work_orders_table', 1),
(18, '2023_07_05_132022_create_technicians_table', 1),
(19, '2023_07_21_103254_create_jobs_table', 1),
(20, '2023_07_25_120816_create_job__categories_table', 1),
(21, '2023_07_25_121246_create_job_source_categories_table', 1),
(22, '2023_07_25_121321_create_job_priority_categories_table', 1),
(23, '2023_07_31_142159_create_estimates_table', 1),
(24, '2023_08_01_111844_create_job_sub_categories_table', 1),
(25, '2023_08_17_150010_create_products_table', 1),
(26, '2023_08_17_160900_create_purchase_orders_table', 1),
(27, '2023_08_28_152221_create_invoices_table', 1),
(28, '2023_10_10_150450_create_companies_table', 1),
(29, '2023_10_10_150703_create_packages_table', 1),
(30, '2023_10_10_155915_create_leads_table', 1),
(31, '2023_10_10_155935_create_credits_table', 1),
(32, '2023_10_12_115826_create_lead_genrates_table', 1),
(37, '2024_11_15_155558_create_lead_services_table', 2),
(38, '2024_11_15_155612_create_services_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `amount`, `description`, `credit`, `created_at`, `updated_at`) VALUES
(1, 'Silver', '400', 'Silver', '200', '2024-10-30 07:00:59', '2024-11-13 11:26:00'),
(2, 'Golden', '75', 'Golden', '100', '2024-10-30 08:01:02', '2024-11-13 11:26:11'),
(3, 'Premium', '600', 'Premium', '150', '2024-10-30 08:01:39', '2024-10-30 08:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(2, 'role-create', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(3, 'role-edit', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(4, 'role-delete', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(5, 'user-list', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(6, 'user-create', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(7, 'user-edit', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(8, 'user-delete', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(9, 'permission-list', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(10, 'permission-create', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(11, 'permission-edit', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(12, 'permission-delete', 'web', '2024-10-30 06:09:42', '2024-10-30 06:09:42'),
(13, 'change-password', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(14, 'package-list', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(15, 'package-create', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(16, 'package-edit', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(17, 'package-delete', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(18, 'category-list', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(19, 'category-create', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(20, 'category-edit', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(21, 'category-delete', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(22, 'subcategory-list', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(23, 'subcategory-create', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(24, 'subcategory-edit', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(25, 'subcategory-delete', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(26, 'product-list', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(27, 'product-create', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(28, 'product-edit', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(29, 'product-delete', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(30, 'pages-list', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(31, 'pages-create', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(32, 'pages-edit', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(33, 'pages-delete', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(34, 'general_setting', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` int DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(2, 'customer', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43'),
(3, 'company', 'web', '2024-10-30 06:09:43', '2024-10-30 06:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `lead_service_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `lead_service_id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(2, 3, 'To advertise my business/services', 'business/services', '225.00', '2024-11-15 12:09:08', '2024-11-18 11:36:31'),
(3, 3, 'To sell products/services e.g. e-commerce', 'commerce', '124.00', '2024-11-15 12:10:10', '2024-11-18 10:44:24'),
(4, 4, 'Bungalow', 'Bungalow', '140.00', '2024-11-15 12:22:59', '2024-11-18 10:45:26'),
(5, 4, 'Commercial property', 'Commercial property', '220.00', '2024-11-15 12:22:59', '2024-11-18 10:45:26'),
(6, 4, 'Flat or Apartment', 'Flat or Apartment', '88.00', '2024-11-15 12:22:59', '2024-11-18 10:45:26'),
(7, 5, 'Female', 'Female', '140.00', '2024-11-18 10:54:14', '2024-11-18 10:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `payable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_id` bigint UNSIGNED NOT NULL,
  `wallet_id` bigint UNSIGNED NOT NULL,
  `type` enum('deposit','withdraw') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` json DEFAULT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint UNSIGNED NOT NULL,
  `from_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint UNSIGNED NOT NULL,
  `to_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` bigint UNSIGNED NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` bigint UNSIGNED NOT NULL,
  `withdraw_id` bigint UNSIGNED NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT '0',
  `fee` decimal(64,0) NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_status` int DEFAULT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `assign_status`, `credit`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_email_verified`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, '2024-10-30 06:09:43', '$2y$10$mMMHQosRwhfAMOONW8xM5.v7ZZcPOcv5hkwcZAwbvmGn/PdxBk.DC', NULL, '2024-10-30 06:09:43', '2024-10-30 06:09:43', 0),
(2, 'Company 2', 'company2@gmail.com', NULL, 1, '100', '2024-10-30 06:09:43', '$2y$10$Fw1v4hlMJwnZRQ2ZiPm4beMWg98sEMoXaJcJLYXJ0vTc1eg.hTyR6', NULL, '2024-10-30 06:33:29', '2024-10-30 07:58:45', 0),
(3, 'Company', 'company@gmail.com', NULL, 1, '150', '2024-10-30 06:09:43', '$2y$10$28792.U5f6NtmtuIpQvAyukKDTgUDO6wOOjbkTwoheu9GSt.NFkHy', NULL, '2024-10-30 06:54:52', '2024-11-14 12:39:29', 0),
(4, 'Nasir', 'nasir@gmail.com', NULL, NULL, NULL, '2024-10-30 06:09:43', '$2y$10$k6CeK1AckISeJ13Zw9tPRO3rsEzbGmrBoH59aApiIRTOZz2Xmlc9y', NULL, '2024-10-30 07:03:39', '2024-10-30 07:03:39', 0),
(5, 'noman', 'noman@gmail.com', NULL, NULL, NULL, '2024-10-30 06:09:43', '$2y$10$kXyvtpWGfhtTXn3PL9AP3elz/MRCdgqNJEnTVYzKrz6jLZNJsQCpK', NULL, '2024-10-30 11:31:45', '2024-10-30 11:31:45', 0),
(7, 'VX xoloutions', 'vx@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$vlKi3Bkgr3BxMaAmIMAE1ejilVe53Bj2eyqfgfEEb3knIweAOkQMC', NULL, '2024-11-14 12:45:23', '2024-11-14 12:45:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

CREATE TABLE `users_verify` (
  `user_id` int NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `holder_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` json DEFAULT NULL,
  `balance` decimal(64,0) NOT NULL DEFAULT '0',
  `decimal_places` smallint UNSIGNED NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_orders`
--

CREATE TABLE `work_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `technician_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimates`
--
ALTER TABLE `estimates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_inventoriable_type_inventoriable_id_index` (`inventoriable_type`,`inventoriable_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_priority_categories`
--
ALTER TABLE `job_priority_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_source_categories`
--
ALTER TABLE `job_source_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_sub_categories`
--
ALTER TABLE `job_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job__categories`
--
ALTER TABLE `job__categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_genrates`
--
ALTER TABLE `lead_genrates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_services`
--
ALTER TABLE `lead_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_lead_service_id_foreign` (`lead_service_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `technicians_email_unique` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_uuid_unique` (`uuid`),
  ADD KEY `transactions_payable_type_payable_id_index` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_payable_id_ind` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_ind` (`payable_type`,`payable_id`,`type`),
  ADD KEY `payable_confirmed_ind` (`payable_type`,`payable_id`,`confirmed`),
  ADD KEY `payable_type_confirmed_ind` (`payable_type`,`payable_id`,`type`,`confirmed`),
  ADD KEY `transactions_type_index` (`type`),
  ADD KEY `transactions_wallet_id_foreign` (`wallet_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transfers_uuid_unique` (`uuid`),
  ADD KEY `transfers_from_type_from_id_index` (`from_type`,`from_id`),
  ADD KEY `transfers_to_type_to_id_index` (`to_type`,`to_id`),
  ADD KEY `transfers_deposit_id_foreign` (`deposit_id`),
  ADD KEY `transfers_withdraw_id_foreign` (`withdraw_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_holder_type_holder_id_slug_unique` (`holder_type`,`holder_id`,`slug`),
  ADD UNIQUE KEY `wallets_uuid_unique` (`uuid`),
  ADD KEY `wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  ADD KEY `wallets_slug_index` (`slug`);

--
-- Indexes for table `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimates`
--
ALTER TABLE `estimates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_priority_categories`
--
ALTER TABLE `job_priority_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_source_categories`
--
ALTER TABLE `job_source_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_sub_categories`
--
ALTER TABLE `job_sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job__categories`
--
ALTER TABLE `job__categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lead_genrates`
--
ALTER TABLE `lead_genrates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lead_services`
--
ALTER TABLE `lead_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_lead_service_id_foreign` FOREIGN KEY (`lead_service_id`) REFERENCES `lead_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_deposit_id_foreign` FOREIGN KEY (`deposit_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_withdraw_id_foreign` FOREIGN KEY (`withdraw_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
