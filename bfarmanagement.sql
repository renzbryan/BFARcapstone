-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2024 at 02:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bfarmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bfar_office`
--

CREATE TABLE `bfar_office` (
  `id` bigint UNSIGNED NOT NULL,
  `office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bfar_office`
--

INSERT INTO `bfar_office` (`id`, `office`, `rcc`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Office of the Administrative and Finance Unit', '05-003-03-00017-01-01', NULL, '2024-02-23 20:17:21', '2024-02-23 20:17:21'),
(2, 'Human Resources & Management Section', '05-003-03-00017-01-01', NULL, '2024-02-23 20:17:52', '2024-02-23 20:17:52'),
(3, 'Budget Section', '05-003-03-00017-01-01', NULL, '2024-02-23 20:18:03', '2024-02-23 20:18:03'),
(4, 'Accounting Section', '05-003-03-00017-01-01', NULL, '2024-02-23 20:18:19', '2024-02-23 20:18:19'),
(5, 'Records Section & POCU', '05-003-03-00017-01-01', NULL, '2024-02-23 20:18:43', '2024-02-23 20:18:43'),
(6, 'Cashier Section', '05-003-03-00017-01-01', NULL, '2024-02-23 20:18:51', '2024-02-23 20:18:51'),
(7, 'Property Section', '05-003-03-00017-01-01', NULL, '2024-02-23 20:19:03', '2024-02-23 20:19:03'),
(8, 'BAC Section', '05-003-09-00017-01-06', NULL, '2024-02-23 20:20:04', '2024-02-23 20:20:04'),
(9, 'General Services Unit', '05-003-03-00017-01-01', NULL, '2024-02-23 20:20:34', '2024-02-23 20:20:34'),
(10, 'Quarantine', '05-003-03-00017-01-02', NULL, '2024-02-23 20:21:00', '2024-02-23 20:21:00'),
(11, 'Occidental Mindoro', '05-003-03-00017-03-01', NULL, '2024-02-23 20:21:40', '2024-02-23 20:21:40'),
(12, 'Oriental Mindoro', '05-003-03-00017-03-02', NULL, '2024-02-23 20:21:48', '2024-02-23 20:21:48'),
(13, 'MARINDUQUE', '05-003-03-00017-03-03', NULL, '2024-02-23 20:22:09', '2024-02-23 20:22:09'),
(14, 'ROMBLON', '05-003-03-00017-03-04', NULL, '2024-02-23 20:22:19', '2024-02-23 20:22:19'),
(15, 'NORTHERN PALAWAN', '05-003-03-00017-03-05', NULL, '2024-02-23 20:22:33', '2024-02-23 20:22:33'),
(16, 'SOUTHERN PALAWAN', '05-003-03-00017-03-05', NULL, '2024-02-23 20:22:46', '2024-02-23 20:22:46'),
(17, 'MEETING/WORKSHOP', '05-003-03-00017-01-03', NULL, '2024-02-23 20:23:28', '2024-02-23 20:23:28'),
(18, 'MONITORING & EVALUATION', '05-003-03-00017-01-03', NULL, '2024-02-23 20:24:14', '2024-02-23 20:24:14'),
(19, 'LEGAL', '05-003-03-00017-01-04', NULL, '2024-02-23 20:24:32', '2024-02-23 20:24:32'),
(20, 'ADJUDICATION', '05-003-03-00017-01-04', NULL, '2024-02-23 20:24:40', '2024-02-23 20:24:40'),
(21, 'INFORMATION MANAGEMENT UNIT', '05-003-03-00017-01-05', NULL, '2024-02-23 20:25:13', '2024-02-23 20:25:13'),
(22, 'OFFICE OF THE ASSISTANT DIRECTOR', '05-003-03-00017-01-05', NULL, '2024-02-23 20:25:31', '2024-02-23 20:25:31'),
(23, 'INTERNAL AUDIT', '05-003-03-00017-01-07', NULL, '2024-02-23 20:26:04', '2024-02-23 20:26:04'),
(24, 'Fishing Gear and Paraphernalia Distribution', '05-003-03-00017-02-01', NULL, '2024-02-23 20:26:46', '2024-02-23 20:26:46'),
(25, 'Broodstock - BFRS Barcenaga', '05-003-03-00017-02-01', NULL, '2024-02-23 20:28:09', '2024-02-23 20:28:09'),
(26, 'Broodstock - Bongabong', '05-003-03-00017-02-01', NULL, '2024-02-23 20:28:28', '2024-02-23 20:28:28'),
(27, 'Broodstock - ISRS', '05-003-03-00017-02-01', NULL, '2024-02-23 20:28:39', '2024-02-23 20:28:39'),
(28, 'Broodstock - NARRA', '05-003-03-00017-02-01', NULL, '2024-02-23 20:29:08', '2024-02-23 20:29:08'),
(29, 'Broodstock - MRBC ROMBLON', '05-003-03-00017-02-01', NULL, '2024-02-23 20:29:36', '2024-02-23 20:29:36'),
(30, 'FINGERLINGS/SEEDS STOCKS - BFRS BARCENAGA', '05-003-03-00017-02-01', NULL, '2024-02-23 20:30:06', '2024-02-23 20:30:06'),
(31, 'FINGERLINGS/SEEDS STOCKS - BONGABONG', '05-003-03-00017-02-01', NULL, '2024-02-23 20:30:33', '2024-02-23 20:30:33'),
(32, 'FINGERLINGS/SEEDS STOCKS - ISRS', '05-003-03-00017-02-01', NULL, '2024-02-23 20:30:41', '2024-02-23 20:30:41'),
(33, 'FINGERLINGS/SEEDS STOCKS - NARRA', '05-003-03-00017-02-01', NULL, '2024-02-23 20:30:53', '2024-02-23 20:30:53'),
(34, 'FINGERLINGS/SEEDS STOCKS - MRBC ROMBLON', '05-003-03-00017-02-01', NULL, '2024-02-23 20:31:10', '2024-02-23 20:31:10'),
(35, 'FRY/SEEDSROCKS - BFRS', '05-003-03-00017-02-01', NULL, '2024-02-23 20:32:00', '2024-02-23 20:32:00'),
(36, 'FRY/SEEDSROCKS - NARRA', '05-003-03-00017-02-01', NULL, '2024-02-23 20:32:11', '2024-02-23 20:32:11'),
(37, 'FRY/SEEDSROCKS - ISRS', '05-003-03-00017-02-01', NULL, '2024-02-23 20:32:20', '2024-02-23 20:32:20'),
(38, 'FRY/SEEDSROCKS - BFRS BONGABONG', '05-003-03-00017-02-01', NULL, '2024-02-23 20:32:44', '2024-02-23 20:32:44'),
(39, 'FRY/SEEDSROCKS - ROMBLON', '05-003-03-00017-02-01', NULL, '2024-02-23 20:33:28', '2024-02-23 20:33:28'),
(40, 'SEAWEED NURSERIES - REGION', '05-003-03-00017-02-01', NULL, '2024-02-23 20:33:43', '2024-02-23 20:33:43'),
(41, 'SEAWEED CULTURE LABORATORY - ISRS', '05-003-03-00017-02-01', NULL, '2024-02-23 20:34:12', '2024-02-23 20:34:12'),
(42, 'MARICULTURE PARKS - ROMBLON', '05-003-03-00017-02-01', NULL, '2024-02-23 20:34:28', '2024-02-23 20:34:28'),
(43, 'MARICULTURE PARKS - MAM SALLY', '05-003-03-00017-02-01', NULL, '2024-02-23 20:34:44', '2024-02-23 20:34:44'),
(44, 'NUMBER OF CAGES LIVELIHOOD', '05-003-03-00017-02-01', NULL, '2024-02-23 20:35:02', '2024-02-23 20:35:02'),
(45, 'OPERATION - ISRS', '05-003-03-00017-04-03', NULL, '2024-02-23 20:35:24', '2024-02-23 20:35:24'),
(46, 'OPERATION - BFRS BARCENAGA', '05-003-03-00017-04-01', NULL, '2024-02-23 20:36:19', '2024-02-23 20:36:19'),
(47, 'HATCHERIES - BFRS', '05-003-03-00017-04-01', NULL, '2024-02-23 20:36:38', '2024-02-23 20:36:38'),
(48, 'HATCHERIES - MELGAR', '05-003-03-00017-04-02', NULL, '2024-02-23 20:36:45', '2024-02-23 20:36:45'),
(49, 'HATCHERIES - NARRA', '05-003-03-00017-04-03', NULL, '2024-02-23 20:36:53', '2024-02-23 20:36:53'),
(50, 'HATCHERIES - ISRS', '05-003-03-00017-04-04', NULL, '2024-02-23 20:37:15', '2024-02-23 20:37:15'),
(51, 'HATCHERIES - BONGABONG MINDORO SHRIMP HATCHERY', '05-003-03-00017-04-04', NULL, '2024-02-23 20:38:30', '2024-02-23 20:38:30'),
(52, 'HATCHERIES - BONGABONG MARINE FISH SPECIES HATCHERY', '05-003-03-00017-04-04', NULL, '2024-02-23 20:38:53', '2024-02-23 20:38:53'),
(53, 'HATCHERIES - MRBC ROMBLON', '05-003-03-00017-04-04', NULL, '2024-02-23 20:39:07', '2024-02-23 20:39:07'),
(54, 'POST HARVEST', '05-003-03-00017-02-01', NULL, '2024-02-24 04:12:05', '2024-02-24 04:12:05'),
(55, 'MARKET/CREDIT', '05-003-03-00017-02-01', NULL, '2024-02-24 04:12:39', '2024-02-24 04:12:39'),
(56, 'MARKET EXHIBIT', '05-003-03-00017-02-01', NULL, '2024-02-24 04:12:52', '2024-02-24 04:12:52'),
(57, 'SPECIAL AREAS FOR AGRICULTURAL DEVELOPMENT (SAAD)', '05-003-03-00017-01-01', NULL, '2024-02-24 04:13:33', '2024-02-24 04:13:33'),
(58, 'MCS', '05-003-03-00017-02-02', NULL, '2024-02-24 04:13:45', '2024-02-24 04:13:45'),
(59, 'QUALITY CONTROL/FISH HEALTH REGION', '05-003-03-00017-02-05', NULL, '2024-02-24 04:14:15', '2024-02-24 04:14:15'),
(60, 'QUALITY CONTROL/CDT LABORATORY PALAWAN', '05-003-03-00017-02-05', NULL, '2024-02-24 04:14:47', '2024-02-24 04:14:47'),
(61, 'QUALITY CONTROL/JOAN LORQUE', '05-003-03-00017-02-05', NULL, '2024-02-24 04:15:27', '2024-02-24 04:15:27'),
(62, 'QUARANTINE, REGISTRATION AND LICENSING', '05-003-03-00017-02-02', NULL, '2024-02-24 04:15:56', '2024-02-24 04:15:56'),
(63, 'QUARANTINE UNIT', '05-003-03-00017-02-02', NULL, '2024-02-24 04:16:14', '2024-02-24 04:16:14'),
(64, 'FISH INSPECTION UNIT REGION', '05-003-03-00017-02-02', NULL, '2024-02-24 04:16:34', '2024-02-24 04:16:34'),
(65, 'FMA', '05-003-03-00017-02-02', NULL, '2024-02-24 04:16:50', '2024-02-24 04:16:50'),
(66, 'MMK', '05-003-03-00017-02-02', NULL, '2024-02-24 04:16:56', '2024-02-24 04:16:56'),
(67, 'SAG', '05-003-03-00017-02-02', NULL, '2024-02-24 04:17:02', '2024-02-24 04:17:02'),
(68, 'BASIL', '05-003-03-00017-02-02', NULL, '2024-02-24 04:17:09', '2024-02-24 04:17:09'),
(69, 'GALUNGGONG', '05-003-03-00017-02-02', NULL, '2024-02-24 04:17:25', '2024-02-24 04:17:25'),
(70, 'ESSETS - RFTFCD PALAWAN', '05-003-03-00017-02-03', NULL, '2024-02-24 04:17:57', '2024-02-24 04:17:57'),
(71, 'ESSETS - RFTFCD MIMARO', '05-003-03-00017-02-03', NULL, '2024-02-24 04:18:14', '2024-02-24 04:18:14'),
(72, 'ESSETS - RFTFCD - TECNICHNOLOGY DEMONSTRATION', '05-003-03-00017-02-03', NULL, '2024-02-24 04:19:10', '2024-02-24 04:19:10'),
(73, 'ESSETS - TECHNICAL ASSISTANCE - PLANNING', '05-003-03-00017-02-03', NULL, '2024-02-24 04:19:30', '2024-02-24 04:19:30'),
(74, 'ESSETS - IEC', '05-003-03-00017-02-03', NULL, '2024-02-24 04:19:44', '2024-02-24 04:19:44'),
(75, 'ESSETS - FARMC', '05-003-03-00017-02-03', NULL, '2024-02-24 04:19:53', '2024-02-24 04:19:53'),
(76, 'ESSETS - FARMC\'S STRENTHENED', '05-003-03-00017-02-03', NULL, '2024-02-24 04:20:14', '2024-02-24 04:20:14'),
(77, 'ESSETS - LGU TECHNICIAN', '05-003-03-00017-02-03', NULL, '2024-02-24 04:20:33', '2024-02-24 04:20:33'),
(78, 'ESSETS - SCHOLARSHIP', '05-003-03-00017-02-03', NULL, '2024-02-24 04:20:43', '2024-02-24 04:20:43'),
(79, 'FISHERIES DATA UPDATING', '05-003-03-00017-02-03', NULL, '2024-02-24 04:21:10', '2024-02-24 04:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iar_tbl`
--

CREATE TABLE `iar_tbl` (
  `iar_id` bigint UNSIGNED NOT NULL,
  `iar_entityname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iar_fundcluster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iar_supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iar_Podate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iar_rod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iar_rcc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iar_number` int DEFAULT NULL,
  `iar_date` date DEFAULT NULL,
  `iar_invoice` int DEFAULT NULL,
  `iar_invoice_d` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iar_tbl`
--

INSERT INTO `iar_tbl` (`iar_id`, `iar_entityname`, `iar_fundcluster`, `iar_supplier`, `iar_Podate`, `iar_rod`, `iar_rcc`, `iar_number`, `iar_date`, `iar_invoice`, `iar_invoice_d`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hatulan', 'fafd', 'adf', '2024-02-14', 'lkj', 'klj', 222, '2024-02-05', 22, '2024-02-08', '2024-02-11 19:08:08', '2024-02-11 19:12:40', NULL),
(2, 'Hatula', '01101101', 'dsad-----', '2012-02-12', 'jjhjhjh909090', '9809098098809890ghghghghgh', 3133, '0012-12-12', 466565, '3222-02-23', '2024-02-11 19:21:36', '2024-02-11 19:21:36', NULL),
(3, 'hatulan', '10000', 'hatulan', '2024-02-14', 'ads', '2193', 192, '2024-02-17', 123123, '2024-02-16', '2024-02-12 22:04:26', '2024-02-19 22:00:56', NULL),
(4, 'MucoFaco', '12678', 'office 2', '2024-02-22', 'office 1', '698809', 4213, '2024-02-23', 22, '2024-02-17', '2024-02-19 22:02:13', '2024-02-19 22:02:13', NULL),
(5, 'alsd;fjk', '12312', 'office 1', '2024-02-15', '12', NULL, 3123, '2024-02-24', 123, '2024-02-20', '2024-02-24 04:44:53', '2024-02-24 04:44:53', NULL),
(6, 'aldsf', '12231', 'office 1', '2024-02-20', NULL, '05-003-03-00017-01-02', 2342, '2024-02-24', 3234, '2024-02-29', '2024-02-24 04:56:10', '2024-02-24 04:56:10', NULL),
(7, 'adf', '123123', 'office 1', '2024-02-20', NULL, '05-003-03-00017-01-03', 13, '2024-02-25', 231, '2024-02-29', '2024-02-25 04:26:05', '2024-02-25 04:26:05', NULL),
(8, 'qewrqw', '123123', 'office 1', '2024-02-08', NULL, '05-003-03-00017-03-03', 11, '2024-02-25', 12312, '2024-02-20', '2024-02-25 04:30:09', '2024-02-25 04:30:09', NULL),
(9, 'qe', '123', 'office 1', '2024-02-21', NULL, '05-003-03-00017-03-05', 2, '2024-02-25', 9, '2024-02-22', '2024-02-25 04:31:37', '2024-02-25 04:31:37', NULL),
(10, 'aldf', '123', 'office 1', '2024-02-10', NULL, '05-003-03-00017-01-03', 1, '2024-02-25', 3, '2024-02-29', '2024-02-25 04:33:04', '2024-02-25 04:33:04', NULL),
(11, 'lj', '123', 'office 1', '2024-02-08', 'MEETING/WORKSHOP', '05-003-03-00017-01-03', 123, '2024-02-28', 123, '2024-02-20', '2024-02-25 04:35:24', '2024-02-25 04:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_tbl`
--

CREATE TABLE `items_tbl` (
  `item_id` bigint UNSIGNED NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` int NOT NULL,
  `is_stock` int DEFAULT NULL,
  `is_property` int DEFAULT NULL,
  `is_wmr` int DEFAULT NULL,
  `iar_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items_tbl`
--

INSERT INTO `items_tbl` (`item_id`, `item_name`, `item_desc`, `item_unit`, `item_quantity`, `is_stock`, `is_property`, `is_wmr`, `iar_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 'papel', 'for office', 'bundle', 234, NULL, NULL, NULL, 7, '2024-01-12 23:34:57', '2024-01-12 23:34:57', NULL),
(25, 'stapler', 'for office', 'bundle', 234, NULL, NULL, NULL, 7, '2024-01-12 23:45:06', '2024-01-12 23:45:06', NULL),
(26, 'ballpen', 'for office', 'bundle', 234, NULL, NULL, NULL, 7, '2024-01-12 23:45:26', '2024-01-12 23:45:26', NULL),
(27, 'palabok', 'for lomi', 'bundle', 12, NULL, NULL, NULL, 16, '2024-01-13 04:35:06', '2024-02-05 20:40:32', '2024-02-05 20:40:32'),
(28, 'papel', 'asd', 'set', 234, NULL, NULL, NULL, 16, '2024-01-13 04:36:31', '2024-02-05 20:40:32', '2024-02-05 20:40:32'),
(29, 'asda', 'asd', 'bundle', 12, NULL, NULL, NULL, 7, '2024-02-01 08:12:31', '2024-02-01 08:12:31', NULL),
(30, 'palabok', 'for kitchen', 'bundle', 12, NULL, NULL, NULL, 18, '2024-02-02 22:28:23', '2024-02-05 20:40:19', '2024-02-05 20:40:19'),
(31, 'hotdog', 'hotdog', '12', 1229, NULL, NULL, NULL, 1, '2024-02-11 19:08:43', '2024-02-11 19:12:40', NULL),
(32, 'wood', 'wood', '100', 1000, NULL, NULL, NULL, 3, '2024-02-12 22:04:48', '2024-02-19 22:00:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_11_051855_create_iar_tbl_table', 2),
(6, '2024_01_11_054529_create_iar_tbl_table', 3),
(7, '2024_01_11_054822_create_iar_tbl_table', 4),
(8, '2024_01_11_142517_create_items_tbl_table', 5),
(9, '2023_12_29_154004_create_tbl_inventory_table', 6),
(10, '2024_01_08_125239_create_iar_tbl_table', 7),
(11, '2024_01_08_161421_add_soft_deletes_to_iar_tbl', 7),
(12, '2024_02_07_115220_create_file_table', 7),
(13, '2024_02_07_115549_modify_iar_tbl_table', 7),
(14, '2024_02_08_010850_modify_iar_table', 8),
(15, '2024_02_08_012816_create_iar', 9),
(16, '2024_02_08_013223_modify_iar_table', 10),
(17, '2024_02_08_030148_create_worker_table', 11),
(18, '2024_02_12_030138_modify_iar', 12),
(19, '2024_02_12_030644_modifyiar', 13),
(20, '2024_02_13_050744_modify_file_table', 14),
(21, '2024_02_24_034634_rcctable', 14),
(22, '2024_02_10_121207_create_rlsddsp_table', 15),
(23, '2024_02_11_023325_add_soft_delete_to_rlsddsp', 15),
(24, '2024_02_17_065406_create_stock_card_table', 15),
(25, '2024_03_03_165624_create_task_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rlsddsp`
--

CREATE TABLE `rlsddsp` (
  `rlsddsp_id` bigint UNSIGNED NOT NULL,
  `item_id` int NOT NULL,
  `rlsddsp_dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rlsddsp_acc_offcr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rlsddsp_desg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rlsddsp_pol` tinyint(1) NOT NULL,
  `rlsddsp_pol_sta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rlsddsp_pol_date` date NOT NULL,
  `rlsddsp_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rlsddsp_date` date NOT NULL,
  `ics_id` int NOT NULL,
  `ics_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ics_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_card`
--

CREATE TABLE `stock_card` (
  `sc_id` bigint UNSIGNED NOT NULL,
  `item_id` int NOT NULL,
  `iar_id` int NOT NULL,
  `sc_stock_no` int NOT NULL,
  `sc_reorder_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_date` date NOT NULL,
  `sc_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_receipt_qty` int NOT NULL,
  `sc_issue_offc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_balance` int NOT NULL,
  `sc_consume` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_user_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `inventory_id` bigint UNSIGNED NOT NULL,
  `inventory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory_quantity` int NOT NULL,
  `inventory_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'renz', 'rnztby19@gmail.com', NULL, '$2y$12$y.arWwOuXER8OkEHdzbnNebs91.I8uVEZ7OZqCrHekr5/Q8.fowi2', NULL, '2024-01-10 21:04:10', '2024-01-10 21:04:10'),
(2, 'Justine Maderazo', 'gakigaki27@gmail.com', NULL, '$2y$12$jeuc4IHIAIFuFdnyMC7hquaAgQbbhk75EyE5PP3/QSibp/m9d10SG', NULL, '2024-02-07 20:20:32', '2024-02-07 20:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bfar_office`
--
ALTER TABLE `bfar_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iar_tbl`
--
ALTER TABLE `iar_tbl`
  ADD PRIMARY KEY (`iar_id`);

--
-- Indexes for table `items_tbl`
--
ALTER TABLE `items_tbl`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rlsddsp`
--
ALTER TABLE `rlsddsp`
  ADD PRIMARY KEY (`rlsddsp_id`);

--
-- Indexes for table `stock_card`
--
ALTER TABLE `stock_card`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_assigned_user_id_foreign` (`assigned_user_id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `workers_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bfar_office`
--
ALTER TABLE `bfar_office`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iar_tbl`
--
ALTER TABLE `iar_tbl`
  MODIFY `iar_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items_tbl`
--
ALTER TABLE `items_tbl`
  MODIFY `item_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rlsddsp`
--
ALTER TABLE `rlsddsp`
  MODIFY `rlsddsp_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_card`
--
ALTER TABLE `stock_card`
  MODIFY `sc_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `inventory_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_assigned_user_id_foreign` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
