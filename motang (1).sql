-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 11:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motang`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `make_brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `year_of_manufacture` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `transmission` varchar(255) DEFAULT NULL,
  `car_registered` varchar(255) DEFAULT NULL,
  `fuel` varchar(255) DEFAULT NULL,
  `seats` varchar(255) DEFAULT NULL,
  `doors` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `price_negotiable` varchar(255) DEFAULT NULL,
  `listed_by` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `attachment_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `make_brand`, `model`, `location`, `year_of_manufacture`, `color`, `condition`, `transmission`, `car_registered`, `fuel`, `seats`, `doors`, `price`, `price_negotiable`, `listed_by`, `phone_number`, `status`, `attachment_id`, `description`, `created_at`, `updated_at`) VALUES
(1, '7', '6', 'Taraba', '9', 'Yellow', 'Nigerian Used', 'Automatic', '0', 'Diesel', '4', '6', '433', '1', 'Dealer', '+1 (358) 345-4292', '1', '2', 'Voluptatem Reprehen', '2023-11-10 09:07:48', '2023-11-10 09:07:48'),
(2, '8', '7', 'Borno', '14', 'Purple', 'Brand New', 'Tiptronic', '1', 'Petrol', '7', '2', '928', '0', 'Reseller', '+1 (377) 443-2428', '0', '11,12,13,14,15,16,17', 'Velit itaque eaque l', '2023-11-10 09:08:16', '2023-11-10 09:09:36'),
(3, '8', '7', 'Delta', '6', 'Silver', 'Nigerian Used', 'Tiptronic', '0', 'Petrol', '6', '6', '992', '0', 'Dealer', '+1 (691) 592-9823', '1', '18,19,20,21,22,23,24', 'Tempore possimus p', '2023-11-10 09:17:32', '2023-11-10 09:17:32'),
(4, '8', '7', 'Akwa Ibom', '8', 'Gray', 'Foreign Used', 'Manual', '1', 'Electric', '2', '6', '105', '1', 'Reseller', '+1 (922) 327-8752', '1', '25,26,27,28,29,30,31,32', 'Minus ad sapiente co', '2023-11-10 09:23:30', '2023-11-10 09:23:30'),
(5, '14', '8', 'Abia', '4', 'Brown', 'Brand New', 'Automatic', '0', 'Petrol', '6', '5', '4555', '1', 'Owner', '564616551', '0', '40,41,42,43,44,45,46', 'Hello World', '2023-11-10 09:50:47', '2023-11-10 09:53:49'),
(6, '15', '9', 'Ondo', '3', 'Orange', 'Foreign Used', 'Manual', '1', 'Petrol/Electric Hybrid', '8', '9', '439', '0', 'Dealer', '+1 (775) 297-8186', '0', '47,48,49,50,51,52', 'Natus accusantium ul', '2023-11-11 13:07:15', '2023-11-11 13:07:15'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-13 06:27:18', '2023-11-13 06:27:18'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-13 06:27:40', '2023-11-13 06:27:40'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-13 06:28:12', '2023-11-13 06:28:12'),
(10, '8', '7', 'Hello API', '14', 'Red', 'Brand New', 'Manual', '1', 'Petrol', '4', '4', '439', '0', 'Dealer', '03153265481', '1', '40,41,42,43,44,45,46', 'description', '2023-11-14 08:41:12', '2023-11-14 08:41:12'),
(12, '8', '7', 'Hello API', '14', 'Red', 'Brand New', 'Manual', '1', 'Petrol', '4', '4', '43932', '0', 'Dealer', '03153265481', '1', '53,54,55,56,57', 'description', '2023-11-14 08:55:49', '2023-11-14 08:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `api_tests`
--

CREATE TABLE `api_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1699625121_02.png', 'image/png', '2023-11-10 09:05:21', '2023-11-10 09:05:21', NULL),
(2, '1699625268_02.png', 'image/png', '2023-11-10 09:07:48', '2023-11-10 09:07:48', NULL),
(3, '1699625296_02.jpg', 'image/jpeg', '2023-11-10 09:08:16', '2023-11-10 09:08:16', NULL),
(4, '1699625296_02.png', 'image/png', '2023-11-10 09:08:16', '2023-11-10 09:08:16', NULL),
(5, '1699625296_2-4.png', 'image/png', '2023-11-10 09:08:16', '2023-11-10 09:08:16', NULL),
(6, '1699625296_2-150x150.png', 'image/webp', '2023-11-10 09:08:16', '2023-11-10 09:08:16', NULL),
(7, '1699625296_2-300x300.png', 'image/webp', '2023-11-10 09:08:16', '2023-11-10 09:08:16', NULL),
(8, '1699625296_03.png', 'image/png', '2023-11-10 09:08:16', '2023-11-10 09:08:16', NULL),
(9, '1699625296_3.gif', 'image/gif', '2023-11-10 09:08:16', '2023-11-10 09:08:16', NULL),
(10, '1699625296_3-2.png', 'image/png', '2023-11-10 09:08:16', '2023-11-10 09:08:16', NULL),
(11, '1699625376_02.png', 'image/png', '2023-11-10 09:09:36', '2023-11-10 09:09:36', NULL),
(12, '1699625376_2-4.png', 'image/png', '2023-11-10 09:09:36', '2023-11-10 09:09:36', NULL),
(13, '1699625376_2-150x150.png', 'image/webp', '2023-11-10 09:09:36', '2023-11-10 09:09:36', NULL),
(14, '1699625376_2-300x300.png', 'image/webp', '2023-11-10 09:09:36', '2023-11-10 09:09:36', NULL),
(15, '1699625376_03.png', 'image/png', '2023-11-10 09:09:36', '2023-11-10 09:09:36', NULL),
(16, '1699625376_3.gif', 'image/gif', '2023-11-10 09:09:36', '2023-11-10 09:09:36', NULL),
(17, '1699625376_3-2.png', 'image/png', '2023-11-10 09:09:36', '2023-11-10 09:09:36', NULL),
(18, '1699625852_02.png', 'image/png', '2023-11-10 09:17:32', '2023-11-10 09:17:32', NULL),
(19, '1699625852_2-4.png', 'image/png', '2023-11-10 09:17:32', '2023-11-10 09:17:32', NULL),
(20, '1699625852_2-150x150.png', 'image/webp', '2023-11-10 09:17:32', '2023-11-10 09:17:32', NULL),
(21, '1699625852_2-300x300.png', 'image/webp', '2023-11-10 09:17:32', '2023-11-10 09:17:32', NULL),
(22, '1699625852_03.png', 'image/png', '2023-11-10 09:17:32', '2023-11-10 09:17:32', NULL),
(23, '1699625852_3.gif', 'image/gif', '2023-11-10 09:17:32', '2023-11-10 09:17:32', NULL),
(24, '1699625852_3-2.png', 'image/png', '2023-11-10 09:17:32', '2023-11-10 09:17:32', NULL),
(25, '1699626210_3.gif', 'image/gif', '2023-11-10 09:23:30', '2023-11-10 09:23:30', NULL),
(26, '1699626210_3-2.png', 'image/png', '2023-11-10 09:23:30', '2023-11-10 09:23:30', NULL),
(27, '1699626210_3-150x150.png', 'image/png', '2023-11-10 09:23:30', '2023-11-10 09:23:30', NULL),
(28, '1699626210_3-300x300.png', 'image/webp', '2023-11-10 09:23:30', '2023-11-10 09:23:30', NULL),
(29, '1699626210_4-3.png', 'image/png', '2023-11-10 09:23:30', '2023-11-10 09:23:30', NULL),
(30, '1699626210_4-300x300.png', 'image/webp', '2023-11-10 09:23:30', '2023-11-10 09:23:30', NULL),
(31, '1699626210_5-1.png', 'image/png', '2023-11-10 09:23:30', '2023-11-10 09:23:30', NULL),
(32, '1699626210_5-3.png', 'image/png', '2023-11-10 09:23:30', '2023-11-10 09:23:30', NULL),
(33, '1699627847_02.png', 'image/png', '2023-11-10 09:50:47', '2023-11-10 09:50:47', NULL),
(34, '1699627847_2-4.png', 'image/png', '2023-11-10 09:50:47', '2023-11-10 09:50:47', NULL),
(35, '1699627847_2-150x150.png', 'image/webp', '2023-11-10 09:50:47', '2023-11-10 09:50:47', NULL),
(36, '1699627847_2-300x300.png', 'image/webp', '2023-11-10 09:50:47', '2023-11-10 09:50:47', NULL),
(37, '1699627847_03.png', 'image/png', '2023-11-10 09:50:47', '2023-11-10 09:50:47', NULL),
(38, '1699627847_3.gif', 'image/gif', '2023-11-10 09:50:47', '2023-11-10 09:50:47', NULL),
(39, '1699627847_3-2.png', 'image/png', '2023-11-10 09:50:47', '2023-11-10 09:50:47', NULL),
(40, '1699628028_02.png', 'image/png', '2023-11-10 09:53:49', '2023-11-10 09:53:49', NULL),
(41, '1699628029_2-4.png', 'image/png', '2023-11-10 09:53:49', '2023-11-10 09:53:49', NULL),
(42, '1699628029_2-150x150.png', 'image/webp', '2023-11-10 09:53:49', '2023-11-10 09:53:49', NULL),
(43, '1699628029_2-300x300.png', 'image/webp', '2023-11-10 09:53:49', '2023-11-10 09:53:49', NULL),
(44, '1699628029_03.png', 'image/png', '2023-11-10 09:53:49', '2023-11-10 09:53:49', NULL),
(45, '1699628029_3.gif', 'image/gif', '2023-11-10 09:53:49', '2023-11-10 09:53:49', NULL),
(46, '1699628029_3-2.png', 'image/png', '2023-11-10 09:53:49', '2023-11-10 09:53:49', NULL),
(47, '1699726035_02.jpg', 'image/jpeg', '2023-11-11 13:07:15', '2023-11-11 13:07:15', NULL),
(48, '1699726035_02.png', 'image/png', '2023-11-11 13:07:15', '2023-11-11 13:07:15', NULL),
(49, '1699726035_2-4.png', 'image/png', '2023-11-11 13:07:15', '2023-11-11 13:07:15', NULL),
(50, '1699726035_2-150x150.png', 'image/webp', '2023-11-11 13:07:15', '2023-11-11 13:07:15', NULL),
(51, '1699726035_2-300x300.png', 'image/webp', '2023-11-11 13:07:15', '2023-11-11 13:07:15', NULL),
(52, '1699726035_03.png', 'image/png', '2023-11-11 13:07:15', '2023-11-11 13:07:15', NULL),
(53, '1699970149_sl_0210121_40570_17.jpg', 'image/jpeg', '2023-11-14 08:55:49', '2023-11-14 08:55:49', NULL),
(54, '1699970149_35718704_63-[Converted]3.jpg', 'image/jpeg', '2023-11-14 08:55:49', '2023-11-14 08:55:49', NULL),
(55, '1699970149_35718704_63-[Converted]4.jpg', 'image/jpeg', '2023-11-14 08:55:49', '2023-11-14 08:55:49', NULL),
(56, '1699970149_35718704_63-[Converted]11.jpg', 'image/jpeg', '2023-11-14 08:55:49', '2023-11-14 08:55:49', NULL),
(57, '1699970149_35718704_63-[Converted]10.jpg', 'image/jpeg', '2023-11-14 08:55:49', '2023-11-14 08:55:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(7, 'Hello World', '2023-11-06 01:01:20', '2023-11-06 01:01:20'),
(8, 'Ehtisham', '2023-11-08 09:52:16', '2023-11-08 09:52:16'),
(9, 'Shakeel', '2023-11-10 09:30:17', '2023-11-10 09:30:17'),
(10, 'haaan', '2023-11-10 09:33:11', '2023-11-10 09:33:11'),
(11, 'haaaaan', '2023-11-10 09:37:06', '2023-11-10 09:37:06'),
(12, 'hekkdsafsdf', '2023-11-10 09:38:47', '2023-11-10 09:41:03'),
(14, 'Toyota', '2023-11-10 09:48:00', '2023-11-10 09:48:00'),
(15, 'Ford', '2023-11-11 13:04:34', '2023-11-11 13:04:34'),
(19, 'Brand Newssahan', '2023-11-14 01:28:47', '2023-11-14 07:39:09'),
(22, 'Hello WOrld Manual', '2023-11-14 01:48:40', '2023-11-14 01:48:40'),
(23, 'Hello WOrld Manuals', '2023-11-14 01:50:59', '2023-11-14 01:50:59'),
(25, 'Normal Brands', '2023-11-14 02:03:44', '2023-11-14 02:03:44'),
(28, 'fdassssss', '2023-11-14 02:19:16', '2023-11-14 02:19:16'),
(29, 'Hello', '2023-11-14 02:19:23', '2023-11-14 02:19:23'),
(31, 'Piper Hebert', '2023-11-14 02:26:24', '2023-11-14 02:26:24'),
(32, 'Hogya', '2023-11-14 03:01:41', '2023-11-14 03:01:41'),
(33, 'Emi Cortez', '2023-11-14 03:02:00', '2023-11-14 03:02:00'),
(34, 'Hanae Avila', '2023-11-14 03:02:41', '2023-11-14 03:02:41'),
(35, 'Chester Chang', '2023-11-14 03:03:46', '2023-11-14 03:03:46'),
(36, 'Hogyadas', '2023-11-14 03:04:02', '2023-11-14 03:04:02'),
(37, 'Ramessh', '2023-11-14 03:25:38', '2023-11-14 03:25:38'),
(38, 'Ramessha', '2023-11-14 03:33:03', '2023-11-14 03:33:03'),
(39, 'Ramesshaa', '2023-11-14 03:33:19', '2023-11-14 03:33:19'),
(40, 'Ramesshaao', '2023-11-14 03:45:30', '2023-11-14 03:45:30'),
(41, 'Ramesshaaoaaas', '2023-11-14 05:16:10', '2023-11-14 05:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `ad_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `title`, `description`, `ad_id`, `created_at`, `updated_at`) VALUES
(1, 'Successfully Purchased', 'Han', 2, '2023-11-10 07:39:33', '2023-11-10 07:39:33'),
(2, 'Cant Reach The Seller', 'Lorem Ipsum is simply dummy text printing and type setting industry 5562. po alpu', 2, '2023-11-10 07:51:34', '2023-11-10 07:51:34'),
(3, 'Successfully Purchased', 'Hello World\r\nHere', 1, '2023-11-10 09:51:36', '2023-11-10 09:51:36'),
(4, 'Successfully Purchased', 'Hello WOrld', 5, '2023-11-11 13:08:37', '2023-11-11 13:08:37'),
(5, 'Cant Reach The Seller', 'API FEEDBACK', 2, '2023-11-14 09:41:47', '2023-11-14 09:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `message_contacts`
--

CREATE TABLE `message_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_contacts`
--

INSERT INTO `message_contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'API EHTISHAM', 'ehtishamapi@api.com', '0215102851', 'subjectsubjectsubjectsubject', 'hansadkjkasldsalajd', '2023-11-15 09:15:33', '2023-11-15 09:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_03_134825_create_roles_table', 1),
(6, '2023_10_03_135114_create_permissions_table', 1),
(7, '2023_10_03_135221_create_role_permissions_table', 1),
(10, '2023_10_12_124525_create_brands_table', 2),
(11, '2023_10_16_104237_create_years_table', 3),
(19, '2023_11_08_124951_create_model_managements_table', 5),
(20, '2023_11_01_062700_create_feedbacks_table', 6),
(21, '2023_11_07_053530_add_ad_id_to_feedbacks_table', 7),
(22, '2023_11_10_134511_create_attachments_table', 8),
(23, '2023_10_17_095325_create_ads_table', 9),
(25, '2023_11_13_130004_create_api_tests_table', 10),
(26, '2023_11_15_115018_create_message_contacts_table', 11),
(27, '2023_11_16_062000_create_reports_table', 12),
(28, '2023_11_16_063658_add_ad_id_to_reports_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_managements`
--

CREATE TABLE `model_managements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `make_brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_managements`
--

INSERT INTO `model_managements` (`id`, `make_brand`, `model`, `created_at`, `updated_at`) VALUES
(6, '7', 'HEllo', '2023-11-10 01:52:02', '2023-11-10 01:52:02'),
(7, '8', 'Han Hello', '2023-11-10 02:30:39', '2023-11-10 02:30:39'),
(8, '14', 'Corolla', '2023-11-10 09:48:26', '2023-11-10 09:48:26'),
(9, '15', 'GXI 2019', '2023-11-11 13:05:46', '2023-11-11 13:05:46'),
(11, '11', 'Hello World 99', '2023-11-14 02:36:55', '2023-11-14 02:36:55'),
(12, '11', 'Hello World 99a', '2023-11-14 02:38:48', '2023-11-14 02:38:48'),
(13, NULL, NULL, '2023-11-14 06:34:23', '2023-11-14 06:34:23'),
(14, NULL, NULL, '2023-11-14 06:34:31', '2023-11-14 06:34:31'),
(15, '11', 'HAB', '2023-11-14 07:17:31', '2023-11-14 07:17:31'),
(16, '40', 'Repudiandae consecte', '2023-11-14 07:49:59', '2023-11-14 07:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `group`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'read-user', 'Read User', 'User Management', '2023-10-10 07:41:51', '2023-10-10 07:41:51', NULL),
(2, 'create-user', 'Create User', 'User Management', '2023-10-10 07:41:51', '2023-10-10 07:41:51', NULL),
(3, 'update-user', 'Update User', 'User Management', '2023-10-10 07:41:51', '2023-10-10 07:41:51', NULL),
(4, 'read-role', 'Read Role', 'Role Management', '2023-10-10 07:41:51', '2023-10-10 07:41:51', NULL),
(5, 'create-role', 'Create Role', 'Role Management', '2023-10-10 07:41:51', '2023-10-10 07:41:51', NULL),
(6, 'update-role', 'Update Role', 'Role Management', '2023-10-10 07:41:51', '2023-10-10 07:41:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(5, 'App\\Models\\User', 1, 'my-app-token', '4a6a89aedbf2f2937b78dfe9a077a76414810436defa6d7d55e3ea1eae47bb5b', '[\"*\"]', NULL, NULL, '2023-11-13 09:30:32', '2023-11-13 09:30:32'),
(6, 'App\\Models\\User', 1, 'my-app-token', '59ed0a1c3e0e9b6903ee03a9538d20d71211dc9ab6bf1d242aef8c372af5751c', '[\"*\"]', NULL, NULL, '2023-11-13 09:32:31', '2023-11-13 09:32:31'),
(7, 'App\\Models\\User', 1, 'my-app-token', '2a9bb25d4baf7f1183e72c9a55b90f7aaa7370a51f83a337ebd31438eaca4d4b', '[\"*\"]', '2023-11-13 09:46:27', NULL, '2023-11-13 09:46:15', '2023-11-13 09:46:27'),
(8, 'App\\Models\\User', 1, 'my-app-token', '791b11a9b105df2cac8afa120215639e958253acc332cf33cbab2a4fc25ebc3f', '[\"*\"]', '2023-11-13 09:48:40', NULL, '2023-11-13 09:48:31', '2023-11-13 09:48:40'),
(9, 'App\\Models\\User', 1, 'my-app-token', 'f57d420d1c0019d793bfc34950abd4fa22ff2b2e5adb3ed2709e520e15cd511d', '[\"*\"]', '2023-11-13 09:56:23', NULL, '2023-11-13 09:52:34', '2023-11-13 09:56:23'),
(10, 'App\\Models\\User', 1, 'my-app-token', '04fe28ec28a66b17e38f3f0720dc3f05e0a0c51f2277fed575712bddbdd8f344', '[\"*\"]', '2023-11-14 07:58:50', NULL, '2023-11-14 01:15:54', '2023-11-14 07:58:50'),
(11, 'App\\Models\\User', 1, 'my-app-token', '171dc28ad1e6e4bb289aed3e731140ecf555c2cc20f167d68662c77997f9aa96', '[\"*\"]', '2023-11-14 02:10:18', NULL, '2023-11-14 02:07:16', '2023-11-14 02:10:18'),
(12, 'App\\Models\\User', 1, 'my-app-token', '053298f6e39bf9c54d3d2e9a42abf17a90264a2e49b75a8f4f43ede246e5cb1c', '[\"*\"]', '2023-11-14 03:25:18', NULL, '2023-11-14 03:23:55', '2023-11-14 03:25:18'),
(13, 'App\\Models\\User', 1, 'my-app-token', '59d4114f31ec018502d5c8204c5157e05741811065745b1e58bc3f7186a7bf9d', '[\"*\"]', '2023-11-14 10:24:16', NULL, '2023-11-14 09:37:44', '2023-11-14 10:24:16'),
(14, 'App\\Models\\User', 1, 'my-app-token', 'd568b8176598542c414a607eda5b78a5a77be08cb561889a6516310fe15fcd21', '[\"*\"]', '2023-11-16 03:38:18', NULL, '2023-11-16 03:35:55', '2023-11-16 03:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `ad_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report`, `description`, `status`, `ad_id`, `created_at`, `updated_at`) VALUES
(3, 'It is sold', '<td>\r\n                                                                <div class=\"btn-group\" role=\"group\"\r\n                                                                    aria-label=\"Basic example\">\r\n                                                                    @if(in_array(\'update-user\', getUserPermissions()))\r\n                                                                    <a class=\"btn btn-primary\" style=\"margin-right:5px;\"\r\n                                                                        href=\'{{ route($section->slug.\".edit\", $value->id) }}\'><em\r\n                                                                            class=\"icon fa fa-edit\"></em></a>\r\n                                                                    @endif\r\n                                                                    <a class=\"btn btn-danger\">\r\n                                                                        <form id=\"\"\r\n                                                                            onSubmit=\"if(!confirm(\'Is the form filled out correctly?\')){return false;}\"\r\n                                                                            class=\"float-right\"\r\n                                                                            action=\" {!! route($section->slug.\'.destroy\',$value->id) !!}\"\r\n                                                                            method=\"POST\">\r\n                                                                            {{ method_field(\'DELETE\') }}\r\n                                                                            {{ csrf_field() }}\r\n                                                                            {!! Form::button(\' <i\r\n                                                                                class=\"icon fa fa-trash\"></i> \', [\'type\'\r\n                                                                            =>\r\n                                                                            \'submit\', \'class\' => \'btn pt-1\',\'style\' =>\r\n                                                                            \'padding: 2px\r\n                                                                            2px;color:white;\']) !!}\r\n                                                                        </form>\r\n                                                                    </a>\r\n                                                                </div>\r\n                                                            </td>', NULL, 2, '2023-11-16 03:21:01', '2023-11-16 03:21:01'),
(4, 'The ads is spam', '<td>\r\n                                                                <div class=\"btn-group\" role=\"group\"\r\n                                                                    aria-label=\"Basic example\">\r\n                                                                    @if(in_array(\'update-user\', getUserPermissions()))\r\n                                                                    <a class=\"btn btn-primary\" style=\"margin-right:5px;\"\r\n                                                                        href=\'{{ route($section->slug.\".edit\", $value->id) }}\'><em\r\n                                                                            class=\"icon fa fa-edit\"></em></a>\r\n                                                                    @endif\r\n                                                                    <a class=\"btn btn-danger\">\r\n                                                                        <form id=\"\"\r\n                                                                            onSubmit=\"if(!confirm(\'Is the form filled out correctly?\')){return false;}\"\r\n                                                                            class=\"float-right\"\r\n                                                                            action=\" {!! route($section->slug.\'.destroy\',$value->id) !!}\"\r\n                                                                            method=\"POST\">\r\n                                                                            {{ method_field(\'DELETE\') }}\r\n                                                                            {{ csrf_field() }}\r\n                                                                            {!! Form::button(\' <i\r\n                                                                                class=\"icon fa fa-trash\"></i> \', [\'type\'\r\n                                                                            =>\r\n                                                                            \'submit\', \'class\' => \'btn pt-1\',\'style\' =>\r\n                                                                            \'padding: 2px\r\n                                                                            2px;color:white;\']) !!}\r\n                                                                        </form>\r\n                                                                    </a>\r\n                                                                </div>\r\n                                                            </td>', NULL, 2, '2023-11-16 03:21:05', '2023-11-16 03:21:05'),
(5, 'Wrong category', '<td>\r\n                                                                <div class=\"btn-group\" role=\"group\"\r\n                                                                    aria-label=\"Basic example\">\r\n                                                                    @if(in_array(\'update-user\', getUserPermissions()))\r\n                                                                    <a class=\"btn btn-primary\" style=\"margin-right:5px;\"\r\n                                                                        href=\'{{ route($section->slug.\".edit\", $value->id) }}\'><em\r\n                                                                            class=\"icon fa fa-edit\"></em></a>\r\n                                                                    @endif\r\n                                                                    <a class=\"btn btn-danger\">\r\n                                                                        <form id=\"\"\r\n                                                                            onSubmit=\"if(!confirm(\'Is the form filled out correctly?\')){return false;}\"\r\n                                                                            class=\"float-right\"\r\n                                                                            action=\" {!! route($section->slug.\'.destroy\',$value->id) !!}\"\r\n                                                                            method=\"POST\">\r\n                                                                            {{ method_field(\'DELETE\') }}\r\n                                                                            {{ csrf_field() }}\r\n                                                                            {!! Form::button(\' <i\r\n                                                                                class=\"icon fa fa-trash\"></i> \', [\'type\'\r\n                                                                            =>\r\n                                                                            \'submit\', \'class\' => \'btn pt-1\',\'style\' =>\r\n                                                                            \'padding: 2px\r\n                                                                            2px;color:white;\']) !!}\r\n                                                                        </form>\r\n                                                                    </a>\r\n                                                                </div>\r\n                                                            </td>', NULL, 2, '2023-11-16 03:21:07', '2023-11-16 03:21:07'),
(6, 'Others', '<td>\r\n                                                                <div class=\"btn-group\" role=\"group\"\r\n                                                                    aria-label=\"Basic example\">\r\n                                                                    @if(in_array(\'update-user\', getUserPermissions()))\r\n                                                                    <a class=\"btn btn-primary\" style=\"margin-right:5px;\"\r\n                                                                        href=\'{{ route($section->slug.\".edit\", $value->id) }}\'><em\r\n                                                                            class=\"icon fa fa-edit\"></em></a>\r\n                                                                    @endif\r\n                                                                    <a class=\"btn btn-danger\">\r\n                                                                        <form id=\"\"\r\n                                                                            onSubmit=\"if(!confirm(\'Is the form filled out correctly?\')){return false;}\"\r\n                                                                            class=\"float-right\"\r\n                                                                            action=\" {!! route($section->slug.\'.destroy\',$value->id) !!}\"\r\n                                                                            method=\"POST\">\r\n                                                                            {{ method_field(\'DELETE\') }}\r\n                                                                            {{ csrf_field() }}\r\n                                                                            {!! Form::button(\' <i\r\n                                                                                class=\"icon fa fa-trash\"></i> \', [\'type\'\r\n                                                                            =>\r\n                                                                            \'submit\', \'class\' => \'btn pt-1\',\'style\' =>\r\n                                                                            \'padding: 2px\r\n                                                                            2px;color:white;\']) !!}\r\n                                                                        </form>\r\n                                                                    </a>\r\n                                                                </div>\r\n                                                            </td>', NULL, 2, '2023-11-16 03:21:11', '2023-11-16 03:21:11'),
(7, 'It is sold', 'Han', NULL, 2, '2023-11-16 03:37:54', '2023-11-16 03:37:54'),
(8, 'It is sold', 'Han', NULL, 2, '2023-11-16 03:38:18', '2023-11-16 03:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 1, 1, '2023-10-10 07:41:51', '2023-10-10 07:41:51', NULL),
(2, 'Asst Admin', 1, 1, '2023-10-10 07:41:51', '2023-10-10 07:41:51', NULL),
(3, 'Seller', 1, 1, '2023-10-10 07:41:51', '2023-10-10 07:41:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `user_type`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@motong.com', 'Super-Admin', NULL, 0, '$2y$10$ILWpGIjgJAxLtnP5U3p5Sexzn0DEj3banJqZ5TyB.AVknzYfmozhG', 'Active', NULL, '2023-10-10 07:41:51', '2023-10-10 07:41:51'),
(2, 'Jena Fernandez', 'ryzuxe@mailinator.com', 'wisehigylo', NULL, 3, '827ccb0eea8a706c4c34a16891f84e7b', '1', NULL, '2023-10-10 07:42:17', '2023-10-10 07:42:17'),
(3, 'Thaddeus Riley', 'tudy@mailinator.com', 'xaxap', NULL, 3, '$2y$10$iiwXb8WYZI8e5VMM3O1eFOg8beZReyiqHuFK6wIFlUhzv1m3cbvo.', '1', NULL, '2023-10-10 07:42:48', '2023-10-10 07:42:48'),
(4, 'Kylie Estrada', 'gaputebywu@mailinator.com', 'qiweje', NULL, 1, '$2y$10$cmMasZZU4FF8q2/xXC1.guOzHss32Gn.O/g2gGT4VkFhd4FfpPcd.', '0', NULL, '2023-10-10 07:43:09', '2023-10-11 08:20:35'),
(5, 'Rosalyn Graves', 'mijakybyf@mailinator.com', 'qujadec', NULL, 0, '$2y$10$yhr2MWb96i/.ZBOHyz/TBe0SV1QwtOUd7lsdsCe52Dt7neSLE82yW', '0', NULL, '2023-10-10 07:43:25', '2023-10-12 08:44:53'),
(6, 'Mercedes Mcfarland', 'reka@mailinator.com', 'tukuciset', NULL, 0, '$2y$10$1dIqoZHD0yltlRER6msSRuoRLCjvIpVaiVA/KBLQdr79h3HKKywnO', '1', NULL, '2023-10-11 08:21:23', '2023-10-11 08:21:23'),
(7, 'Dara Mccormick', 'suqacaxa@mailinator.com', 'qifywe', NULL, 1, '$2y$10$T5eMpmF3VL9qkdyoN7lJUugU.khhf8zODPRd/eYeGdU5X0tdi9S26', '1', NULL, '2023-10-11 08:21:44', '2023-10-11 08:21:44'),
(9, 'Ehtishamsadsaaf', 'han@gma.com', 'ehtishamalif', NULL, 3, '$2y$10$ookyXi.OPrC1pFHnfE79LesRBPptvFJ9jKCFkHdr/sJdzVwbGan1W', '0', NULL, '2023-11-14 10:16:33', '2023-11-14 10:24:16'),
(10, 'ehtishamseller', 'ehtishamseller@motong.com', 'ehtishamseller', NULL, 3, '$2y$10$Ay906GXaoz0muyPiLg2rBu7n.VYEOD0ovX3u8lmomXOaAS1EpPNtu', '1', NULL, '2023-11-15 03:05:26', '2023-11-15 03:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `created_at`, `updated_at`) VALUES
(1, '1992', '2023-10-16 07:01:27', '2023-10-16 07:01:27'),
(2, '1993', '2023-10-16 07:48:12', '2023-10-16 07:48:12'),
(3, '1994', '2023-10-16 08:51:01', '2023-10-16 08:51:01'),
(4, '1995', '2023-10-16 09:02:41', '2023-10-16 09:02:41'),
(5, '1996', '2023-10-16 09:04:57', '2023-10-16 09:04:57'),
(6, '1998', '2023-10-16 09:13:47', '2023-10-16 09:13:47'),
(7, '1999', '2023-10-16 09:21:46', '2023-10-16 09:21:46'),
(8, '2000', '2023-10-17 02:01:59', '2023-10-17 02:01:59'),
(9, '2001', '2023-10-17 02:39:08', '2023-10-17 02:39:08'),
(10, '2002', '2023-10-17 02:52:30', '2023-10-17 02:52:30'),
(11, '2003', '2023-10-18 01:52:30', '2023-10-18 01:52:30'),
(12, '2004', '2023-10-18 01:53:04', '2023-10-18 01:53:04'),
(13, '2006', '2023-10-30 00:33:48', '2023-10-30 00:33:48'),
(14, '2007', '2023-10-31 06:49:13', '2023-10-31 06:49:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_tests`
--
ALTER TABLE `api_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_contacts`
--
ALTER TABLE `message_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_managements`
--
ALTER TABLE `model_managements`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `api_tests`
--
ALTER TABLE `api_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message_contacts`
--
ALTER TABLE `message_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `model_managements`
--
ALTER TABLE `model_managements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
