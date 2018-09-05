-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 02:04 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstName`, `lastName`, `username`, `mobile`, `image`, `dob`, `location`, `jop`, `about`, `gender`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alaa', 'Elsaid', 'alaa.elsaid', '01027543768', '55779_about-02.jpg', '1994-09-27', 'صهرجت الصغري - أجا -دقهلية', 'PHP Laravel Developer', 'PHP Laravel Developer', 0, 'alaa4cat@gmail.com', '$2y$10$0Wxnv.cT8.5DlcSf0NpNfOA1c5GImmL6ttXjo80d5V7UeV5CPb2hO', '4JKTF88482GyBhJPO7gePVN6oXDMAsRbD5deGdxacHe9jOSw56CEVbaCurBD', '2018-08-16 22:00:00', '2018-08-17 19:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin_product`
--

CREATE TABLE `admin_product` (
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_product`
--

INSERT INTO `admin_product` (`product_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-07-20 22:00:00', '2018-07-20 22:00:00'),
(2, 1, '2018-07-20 22:00:00', '2018-07-20 22:00:00'),
(3, 1, '2018-07-21 19:58:40', '2018-07-21 19:58:40'),
(4, 1, '2018-07-20 22:00:00', '2018-07-20 22:00:00'),
(6, 1, '2018-07-20 22:00:00', '2018-07-20 22:00:00'),
(8, 1, '2018-07-20 22:00:00', '2018-07-20 22:00:00'),
(10, 1, '2018-07-20 22:00:00', '2018-07-20 22:00:00'),
(12, 1, '2018-07-20 22:00:00', '2018-07-20 22:00:00'),
(14, 1, '2018-07-20 22:00:00', '2018-07-20 22:00:00'),
(16, 1, '2018-07-20 22:00:00', '2018-07-20 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `head` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `head`, `body`, `image`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0646\\u0633\\u0627\\u0621\",\"en\":\"Women\"}', '{\"ar\":\"\\u0643\\u0644 \\u0645\\u0627 \\u064a\\u062a\\u0639\\u0644\\u0642 \\u0628\\u0627\\u0644\\u0646\\u0633\\u0627\\u0621\",\"en\":\"All About Womens\"}', '7571_banner-01.jpg', 1, NULL, '2018-06-30 01:56:19', '2018-06-30 01:56:19'),
(2, '{\"ar\":\"\\u0631\\u062c\\u0627\\u0644\",\"en\":\"Men\"}', '{\"ar\":\"\\u0643\\u0644 \\u0645\\u0627 \\u064a\\u062a\\u0639\\u0644\\u0642 \\u0628\\u0627\\u0644\\u0631\\u062c\\u0627\\u0644\",\"en\":\"All About men\"}', '8303_banner-02.jpg', 2, NULL, '2018-06-30 02:04:38', '2018-06-30 02:04:38'),
(3, '{\"ar\":\"\\u0627\\u0644\\u0623\\u062d\\u0630\\u064a\\u0629\",\"en\":\"Shoes\"}', '{\"ar\":\"\\u0643\\u0644 \\u0645\\u0627 \\u064a\\u062a\\u0639\\u0644\\u0642 \\u0628\\u0627\\u0644\\u0627\\u062d\\u0630\\u064a\\u0629\",\"en\":\"All About Shoes\"}', '9786_product-09.jpg', 4, NULL, '2018-06-30 02:07:03', '2018-06-30 02:07:03'),
(4, '{\"ar\":\"\\u0627\\u0644\\u0633\\u0627\\u0639\\u0627\\u062a\",\"en\":\"Watches\"}', '{\"ar\":\"\\u0643\\u0644 \\u0645\\u0627 \\u064a\\u062a\\u0639\\u0644\\u0642 \\u0628\\u0627\\u0644\\u0633\\u0627\\u0639\\u0627\\u062a\",\"en\":\"All About Watches\"}', '7833_product-15.jpg', 5, NULL, '2018-06-30 02:08:01', '2018-06-30 02:09:34'),
(5, '{\"ar\":\"\\u0627\\u062d\\u0630\\u0645\\u0629\",\"en\":\"Belts\"}', '{\"ar\":\"\\u0643\\u0644 \\u0645\\u0627\\u064a\\u062a\\u0639\\u0644\\u0642 \\u0628\\u0627\\u0644\\u0627\\u062d\\u0630\\u0645\\u0629\",\"en\":\"All About Belts\"}', '18913_product-12.jpg', 6, NULL, '2018-07-22 14:30:57', '2018-07-22 14:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"نساء\",\"en\":\"women\"}', '{\"ar\":\"\\u0646\\u0633\\u0627\\u0621\",\"en\":\"Womens\"}', 0, NULL, '2018-06-26 14:16:27', '2018-06-26 14:16:27'),
(2, '{\"ar\":\"رجال\",\"en\":\"men\"}', '{\"ar\":\"\\u0631\\u062c\\u0627\\u0644\",\"en\":\"Men\"}', 0, NULL, '2018-06-26 14:19:11', '2018-06-26 14:19:11'),
(4, '{\"ar\":\"أحذية\",\"en\":\"shoes\"}', '{\"ar\":\"\\u0623\\u062d\\u0630\\u064a\\u0629\",\"en\":\"Shoses\"}', 1, NULL, '2018-06-27 10:14:15', '2018-06-27 10:16:56'),
(5, '{\"ar\":\"ساعات\",\"en\":\"watches\"}', '{\"ar\":\"\\u0633\\u0627\\u0639\\u0627\\u062a\",\"en\":\"Watches\"}', 1, NULL, '2018-06-27 10:14:41', '2018-06-27 10:14:41'),
(6, '{\"ar\":\"\\u0623\\u062d\\u0632\\u0645\\u0629\",\"en\":\"belt\"}', '{\"ar\":\"\\u0623\\u062d\\u0632\\u0645\\u0629\",\"en\":\"Belts\"}', 0, NULL, '2018-07-10 14:09:39', '2018-07-10 14:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0627\\u062e\\u0636\\u0631\",\"en\":\"green\"}', '#42d97e', '2018-06-27 18:08:18', '2018-06-27 18:08:18'),
(2, '{\"ar\":\"\\u0627\\u0644\\u0627\\u0633\\u0648\\u062f\",\"en\":\"black\"}', '#000000', '2018-06-27 18:30:10', '2018-06-27 18:30:10'),
(3, '{\"ar\":\"\\u0627\\u0644\\u0627\\u062d\\u0645\\u0631\",\"en\":\"red\"}', '#ff0000', '2018-06-27 18:30:35', '2018-06-27 18:39:12'),
(4, '{\"ar\":\"\\u0627\\u0644\\u0631\\u0645\\u0627\\u062f\\u064a\",\"en\":\"silver\"}', '#c0c0c0', '2018-06-27 18:32:13', '2018-06-27 18:32:13'),
(5, '{\"ar\":\"\\u0627\\u0644\\u0628\\u0646\\u0641\\u0633\\u062c\\u064a\",\"en\":\"purlpe\"}', '#9e36a0', '2018-06-27 18:32:46', '2018-06-27 18:32:46'),
(6, '{\"ar\":\"\\u0627\\u0644\\u0627\\u0628\\u064a\\u0636\",\"en\":\"white\"}', '#ffffff', '2018-06-27 18:42:43', '2018-06-27 18:42:43'),
(7, '{\"ar\":\"\\u0648\\u0631\\u062f\\u064a\",\"en\":\"Pink\"}', '#ff0080', '2018-07-23 19:33:18', '2018-07-23 19:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2018-07-10 13:00:40', '2018-07-10 13:00:40'),
(1, 4, '2018-07-14 13:12:54', '2018-07-14 13:12:54'),
(1, 6, '2018-07-10 13:00:40', '2018-07-10 13:00:40'),
(2, 2, '2018-07-10 13:09:49', '2018-07-10 13:09:49'),
(2, 6, '2018-07-10 13:09:49', '2018-07-10 13:09:49'),
(3, 4, '2018-07-10 13:12:16', '2018-07-10 13:12:16'),
(3, 6, '2018-07-10 13:12:16', '2018-07-10 13:12:16'),
(4, 2, '2018-07-10 13:13:56', '2018-07-10 13:13:56'),
(4, 6, '2018-07-10 13:23:45', '2018-07-10 13:23:45'),
(5, 1, '2018-07-10 13:36:49', '2018-07-10 13:36:49'),
(5, 4, '2018-07-10 13:36:49', '2018-07-10 13:36:49'),
(6, 2, '2018-07-10 13:40:28', '2018-07-10 13:40:28'),
(6, 4, '2018-07-10 13:40:28', '2018-07-10 13:40:28'),
(7, 2, '2018-07-10 13:42:54', '2018-07-10 13:42:54'),
(7, 4, '2018-07-10 13:42:54', '2018-07-10 13:42:54'),
(8, 2, '2018-07-10 13:45:29', '2018-07-10 13:45:29'),
(8, 6, '2018-07-10 13:45:29', '2018-07-10 13:45:29'),
(9, 2, '2018-07-10 14:00:17', '2018-07-10 14:00:17'),
(10, 2, '2018-07-10 14:03:06', '2018-07-10 14:03:06'),
(11, 6, '2018-07-10 14:07:04', '2018-07-10 14:07:04'),
(12, 2, '2018-07-10 14:11:40', '2018-07-10 14:11:40'),
(13, 2, '2018-07-10 14:14:03', '2018-07-10 14:14:03'),
(13, 6, '2018-07-10 14:14:03', '2018-07-10 14:14:03'),
(14, 2, '2018-07-10 14:16:17', '2018-07-10 14:16:17'),
(14, 6, '2018-07-10 14:16:17', '2018-07-10 14:16:17'),
(15, 2, '2018-07-10 14:19:12', '2018-07-10 14:19:12'),
(15, 3, '2018-07-10 14:19:13', '2018-07-10 14:19:13'),
(16, 1, '2018-07-13 14:03:45', '2018-07-13 14:03:45'),
(16, 3, '2018-07-13 14:03:45', '2018-07-13 14:03:45'),
(16, 5, '2018-07-13 14:03:45', '2018-07-13 14:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'gdggdggdg', '2018-06-11 00:41:04', '2018-06-11 00:41:04'),
(2, 2, 1, 'هذا عمل رائع', '2018-06-11 00:42:09', '2018-06-11 00:42:09'),
(3, 4, 1, 'thats right', '2018-06-24 21:11:15', '2018-06-24 21:11:15'),
(4, 5, 1, 'احلي بضاعة دي ولا ايه', '2018-06-30 20:02:44', '2018-06-30 20:02:44'),
(5, 7, 1, 'alaa', '2018-07-18 20:54:31', '2018-07-18 20:54:31'),
(6, 2, 1, 'asasasas', '2018-07-19 18:34:06', '2018-07-19 18:34:06'),
(7, 8, 4, 'what is this ???', '2018-07-26 20:03:21', '2018-07-26 20:03:21'),
(8, 2, 1, 'anther comment', '2018-08-28 09:12:31', '2018-08-28 09:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `co_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_message` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_view` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `co_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `head` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `head`, `body`, `created_at`, `updated_at`, `type`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0633\\u0624\\u0627\\u0644 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":\"first question\"}', '{\"ar\":\"\\u0627\\u062c\\u0627\\u0628\\u0629 \\u0627\\u0644\\u0633\\u0624\\u0627\\u0644 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":\"first question answer\"}', '2018-07-16 12:15:18', '2018-07-16 19:42:36', '0'),
(6, '{\"ar\":\"\\u0634\\u0633\\u064a\\u0634\\u064a\\u0633\\u0634\\u064a\\u0634\\u064a\\u0634\\u0633\\u064a\\u0634\\u0633\",\"en\":\"dsadasdsadsadasda\"}', '{\"ar\":\"\\u0634\\u0633\\u064a\\u0634\\u064a\\u0633\\u0634\\u064a\\u0634\\u064a\\u0634\\u0633\\u064a\\u0634\\u0633\",\"en\":\"dsadasdsadsadasda\"}', '2018-07-16 18:10:15', '2018-07-16 18:10:15', '1'),
(7, '{\"ar\":\"\\u0633\\u0634\\u064a\\u0634\\u0633\\u064a\\u0633\\u0634\\u064a\",\"en\":\"dsadasdsadsadasda\"}', '{\"ar\":\"\\u0633\\u0634\\u064a\\u0634\\u0633\\u064a\\u0633\\u0634\\u064a\",\"en\":\"dsadasdsadsadasda\"}', '2018-07-16 18:10:43', '2018-07-16 18:10:43', '1'),
(8, '{\"ar\":\"\\u0633\\u0634\\u064a\\u0634\\u0633\\u064a\\u0633\\u0634\\u064a\",\"en\":\"\\u0633\\u0634\\u064a\\u0634\\u0633\\u064a\\u0633\\u0634\\u064a\"}', '{\"ar\":\"\\u0633\\u0634\\u064a\\u0634\\u0633\\u064a\\u0633\\u0634\\u064a\",\"en\":\"\\u0633\\u0634\\u064a\\u0634\\u0633\\u064a\\u0633\\u0634\\u064a\"}', '2018-07-16 18:10:57', '2018-07-16 18:10:57', '2'),
(12, '{\"ar\":\"\\u0627\\u0644\\u0633\\u0624\\u0627\\u0644 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":\"The First Question\"}', '{\"ar\":\"\\u0627\\u0644\\u0627\\u062c\\u0627\\u0628\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u064a\",\"en\":\"First Answer\"}', '2018-07-16 19:32:30', '2018-07-16 19:32:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_24_232100_create_settings_table', 1),
(4, '2018_05_25_122505_add_gender_to_users', 1),
(5, '2018_05_25_123717_add_slug_to_settings', 1),
(6, '2018_05_28_202439_create_posts_table', 1),
(7, '2018_05_28_203813_add_image_to_posts', 1),
(8, '2018_05_29_013956_create_comments_table', 1),
(9, '2018_05_31_020018_create_tags_table', 1),
(10, '2018_06_01_225049_create_post_tag_table', 1),
(11, '2018_06_02_225645_create_contacts_table', 1),
(12, '2018_06_03_144523_create_sliders_table', 1),
(13, '2018_06_04_165743_create_notifications_table', 1),
(14, '2018_06_07_155721_create_products_table', 1),
(15, '2018_06_09_151253_add_deleted_at_to_users', 1),
(16, '2018_06_09_203158_add_discription_to_products', 1),
(17, '2018_06_11_150356_create_faqs_table', 1),
(18, '2018_06_12_160550_create_providers_table', 1),
(19, '2018_06_15_230348_add_lang_to_users', 1),
(20, '2018_06_23_213954_create_banners_table', 1),
(21, '2018_06_26_153428_create_categories_table', 1),
(22, '2018_06_26_162054_add_category_to_banners', 1),
(23, '2018_06_26_213236_create_product_tag_table', 1),
(24, '2018_06_26_214624_create_colors_table', 1),
(25, '2018_06_27_183046_add_color_to_colors', 1),
(26, '2018_06_27_212946_create_color_product_table', 1),
(27, '2018_06_29_133437_add_type_to_categories', 2),
(28, '2018_06_29_134033_add_category_id_to_products', 3),
(29, '2018_06_29_173814_create_color_product_table', 4),
(30, '2018_06_29_174226_create_product_color_table', 5),
(31, '2018_06_29_175233_create_color_product_table', 6),
(32, '2018_07_01_191543_create_reviews_table', 7),
(33, '2018_07_10_132049_add_qtn_to_products', 8),
(34, '2018_07_13_231212_create_product_size_table', 9),
(35, '2018_07_13_231757_create_sizes_table', 9),
(36, '2018_07_16_145643_add_type_to_faqs', 10),
(37, '2018_07_16_234112_create_orders_table', 11),
(38, '2018_07_19_213435_add_brand_to_products', 11),
(39, '2018_07_21_163458_create_product_user_table', 12),
(40, '2018_07_23_182412_add_year_to_products', 13),
(41, '2018_07_24_192526_create_wishlists_table', 14),
(42, '2018_07_31_132506_create_shoppingcart_table', 15),
(43, '2018_08_01_031335_create_shoppingcart_table', 16),
(44, '2018_08_05_162537_create_shoppings_table', 17),
(45, '2018_08_13_163357_create_orders_table', 18),
(46, '2018_08_13_164009_create_orders_table', 19),
(47, '2018_08_14_172644_create_orders_table', 20),
(48, '2018_08_17_160025_create_admins_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `custumer_id` int(11) NOT NULL,
  `gov_id` int(11) NOT NULL,
  `custumer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `custumer_id`, `gov_id`, `custumer_name`, `tel`, `state`, `street`, `products`, `total`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Ramadan Hamed', 1002271140, 'al haram', '23, ramsses, street', '{\"ids\":[1],\"qty\":[\"2\"],\"color\":[\"2\"],\"size\":[\"3\"]}', '33.28', NULL, '2018-08-14 20:58:46', '2018-08-16 17:46:23'),
(2, 1, 2, 'Ali Abdo', 1011468087, 'mansoura', '12, el-gomhorea, street', '{\"ids\":[16],\"qty\":[\"2\"],\"color\":[\"1\"],\"size\":[\"3\"]}', '400.00', NULL, '2018-08-18 00:07:44', '2018-08-19 18:44:15'),
(4, 1, 2, 'Ali Abdo', 1011468087, 'mansoura', '12, el-gomhorea, street', '{\"ids\":[2],\"qty\":[\"1\"],\"color\":[\"2\"],\"size\":[\"2\"]}', '35.31', NULL, '2018-08-18 00:18:27', '2018-08-18 00:18:27'),
(5, 3, 3, 'احمد السعيد', 1011468087, 'al haram', '23, ramsses, street', '{\"ids\":[14],\"qty\":[\"2\"],\"color\":[\"2\"],\"size\":[\"3\"]}', '109.58', NULL, '2018-08-26 11:26:07', '2018-08-26 11:26:07'),
(6, 3, 2, 'احمد السعيد', 1011468087, 'al haram', '23, ramsses, street', '{\"ids\":[12,7],\"qty\":[\"2\",\"2\"],\"color\":[\"2\",\"2\"],\"size\":[\"3\",\"3\"]}', '231.62', NULL, '2018-08-26 11:30:31', '2018-08-26 11:30:31'),
(7, 1, 6, 'Ali Abdo', 1011468087, 'al haram', '23, ramsses, street', '{\"ids\":[1],\"qty\":[\"4\"],\"color\":[\"2\"],\"size\":[\"2\"]}', '66.56', NULL, '2018-08-28 09:22:37', '2018-08-28 09:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(800) CHARACTER SET utf8 NOT NULL,
  `body` varchar(800) CHARACTER SET utf8 NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `title`, `body`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, '{\"ar\":\"\\u0639\\u0646\\u0648\\u0627\\u0646\",\"en\":\"title in english\"}', '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a\",\"en\":\"body in english\"}', '1141_gallery-02.jpg', NULL, '2018-06-03 00:12:20', '2018-07-18 20:38:27'),
(4, 1, '{\"ar\":\"text_ar\",\"en\":\"text_en\"}', '{\"ar\":\"text_ar\",\"en\":\"text_en\"}', '6479_gallery-05.jpg', NULL, '2018-06-24 11:33:30', '2018-07-18 20:38:51'),
(5, 1, '{\"ar\":\"\\u0627\\u062d\\u0644\\u064a \\u0645\\u062f\\u0648\\u0646\\u0629 \\u062f\\u064a \\u0648\\u0644\\u0627 \\u0627\\u064a\\u0647\",\"en\":\"the most beautful blog is that right\"}', '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 1\",\"en\":\"content 1\"}', '2271_blog-06.jpg', NULL, '2018-06-30 18:51:49', '2018-07-18 20:08:49'),
(6, 1, '{\"ar\":\"\\u0627\\u0642\\u0648\\u064a \\u0643\\u0627\\u0631\\u062a \\u0641\\u064a \\u0645\\u0635\\u0631\",\"en\":\"the most powerfull card in egypt\"}', '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 2\",\"en\":\"content 2\"}', '2413_blog-05.jpg', NULL, '2018-06-30 20:01:27', '2018-06-30 20:01:27'),
(11, 1, '{\"ar\":\"\\u0645\\u0646 \\u0639\\u062c\\u0627\\u0626\\u0628 \\u0627\\u0644\\u062f\\u0646\\u064a\\u0627 \\u0627\\u0644\\u0633\\u0628\\u0639\",\"en\":\"the first panner\"}', '{\"ar\":\"\\u0645\\u0646 \\u0639\\u062c\\u0627\\u0626\\u0628 \\u0627\\u0644\\u062f\\u0646\\u064a\\u0627 \\u0627\\u0644\\u0633\\u0628\\u0639\",\"en\":\"the first panner\"}', '95300_about-02.jpg', NULL, '2018-08-21 20:15:29', '2018-08-21 20:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2018-07-11 12:36:34', '2018-07-11 12:36:34'),
(2, 3, '2018-07-11 12:36:34', '2018-07-11 12:36:34'),
(2, 4, '2018-07-11 12:40:49', '2018-07-11 12:40:49'),
(4, 1, '2018-07-11 12:44:39', '2018-07-11 12:44:39'),
(4, 4, '2018-07-18 20:04:22', '2018-07-18 20:04:22'),
(4, 5, '2018-07-11 12:44:40', '2018-07-11 12:44:40'),
(5, 2, '2018-07-11 12:45:08', '2018-07-11 12:45:08'),
(5, 3, '2018-07-11 12:45:08', '2018-07-11 12:45:08'),
(5, 4, '2018-07-18 19:59:06', '2018-07-18 19:59:06'),
(6, 1, '2018-07-11 12:45:41', '2018-07-11 12:45:41'),
(6, 2, '2018-07-11 12:45:41', '2018-07-11 12:45:41'),
(6, 3, '2018-07-11 12:45:41', '2018-07-11 12:45:41'),
(11, 1, '2018-08-21 20:15:29', '2018-08-21 20:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `brand` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `qtn` int(11) NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `discription` longtext CHARACTER SET utf8 NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `brand`, `qtn`, `year`, `image`, `model`, `status`, `discription`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 1\",\"en\":\"Esprit Ruffle Shirt\"}', 16.64, 'GUCCI', 40, '2018', '{\"image0\":\"34081_product-01.jpg\",\"image1\":\"85790_gallery-04.jpg\",\"image2\":\"27193_gallery-05.jpg\",\"image3\":\"64580_gallery-06.jpg\"}', 'E0DFG25', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 1\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-02-10 13:00:39', '2018-07-19 17:55:46'),
(2, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 2\",\"en\":\"Herschel supply\"}', 35.31, 'ZARA', 30, '2018', '{\"image0\":\"70950_product-02.jpg\",\"image1\":\"31912_gallery-05.jpg\",\"image2\":\"91408_gallery-06.jpg\",\"image3\":\"95863_gallery-07.jpg\"}', 'E0DFG26', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 1\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-02-10 13:09:49', '2018-07-19 19:46:16'),
(3, 2, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 3\",\"en\":\"Only Check Trouser\"}', 25.50, 'Victoria Secret', 20, '2018', '{\"image0\":\"45148_product-03.jpg\",\"image1\":\"87635_gallery-06.jpg\",\"image2\":\"85142_gallery-07.jpg\",\"image3\":\"33434_gallery-08.jpg\"}', 'E0DFG27', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 11\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 1\\u0645\\u062d\\u062a\\u0648\\u064a 11\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-02-10 13:12:16', '2018-07-23 18:24:23'),
(4, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 4\",\"en\":\"Classic Trench Coat\"}', 75.00, 'Victoria Secret', 17, '2018', '{\"image0\":\"14564_product-04.jpg\",\"image1\":\"65307_gallery-07.jpg\",\"image2\":\"64232_gallery-08.jpg\",\"image3\":\"31646_gallery-09.jpg\"}', 'E0DFG28', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 4\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-02-10 13:13:55', '2018-07-10 13:31:02'),
(5, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 5\",\"en\":\"Front Pocket Jumper\"}', 34.75, 'Victoria Secret', 15, '2018', '{\"image0\":\"14364_product-05.jpg\",\"image1\":\"99632_gallery-07.jpg\",\"image2\":\"82731_gallery-08.jpg\",\"image3\":\"14434_gallery-09.jpg\"}', 'E0DFG29', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 5\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-03-10 13:36:48', '2018-07-10 13:36:48'),
(6, 5, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 6\",\"en\":\"Vintage Inspired Classic\"}', 93.20, 'ZARA', 15, '2018', '{\"image0\":\"44738_product-15.jpg\",\"image1\":\"13112_banner-07.jpg\",\"image2\":\"12788_item-cart-03.jpg\",\"image3\":\"50875_product-06.jpg\"}', 'E0DFG30', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 6\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-03-10 13:40:27', '2018-07-15 19:41:52'),
(7, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 7\",\"en\":\"Shirt in Stretch Cotton\"}', 52.66, 'ZARA', 25, '2018', '{\"image0\":\"82981_product-07.jpg\",\"image1\":\"61501_gallery-03.jpg\",\"image2\":\"58243_gallery-06.jpg\",\"image3\":\"50854_gallery-09.jpg\"}', 'E0DFG31', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 7\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-04-10 13:42:54', '2018-07-10 13:42:54'),
(8, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 8\",\"en\":\"Pieces Metallic Printed\"}', 18.49, 'ZARA', 14, '2018', '{\"image0\":\"66277_product-08.jpg\",\"image1\":\"66382_gallery-09.jpg\",\"image2\":\"92483_gallery-02.jpg\",\"image3\":\"40929_gallery-03.jpg\"}', 'E0DFG32', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 8\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-06-09 22:00:00', '2018-07-10 13:45:28'),
(9, 4, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 9\",\"en\":\"Converse All Star Hi Plimsolls\"}', 75.00, 'GUCCI', 9, '2018', '{\"image0\":\"29442_product-09.jpg\",\"image1\":\"77940_gallery-04.jpg\",\"image2\":\"68875_gallery-07.jpg\",\"image3\":\"76409_gallery-02.jpg\"}', 'E0DFG33', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 9\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-06-10 14:00:16', '2018-07-15 19:45:44'),
(10, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 10\",\"en\":\"Femme T-Shirt In Stripe\"}', 25.85, 'GUCCI', 12, '2018', '{\"image0\":\"71052_product-10.jpg\",\"image1\":\"63693_gallery-09.jpg\",\"image2\":\"65985_gallery-04.jpg\",\"image3\":\"38887_gallery-06.jpg\"}', 'E0DFG34', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 10\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-07-10 14:03:06', '2018-07-10 14:03:06'),
(11, 2, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 11\",\"en\":\"Herschel supply\"}', 63.16, 'ZARA', 6, '2018', '{\"image0\":\"33603_product-11.jpg\",\"image1\":\"30452_gallery-07.jpg\",\"image2\":\"76209_gallery-08.jpg\",\"image3\":\"45967_gallery-09.jpg\"}', 'E0DFG35', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 11\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-08-10 14:07:03', '2018-07-15 19:42:39'),
(12, 6, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 12\",\"en\":\"Herschel supply\"}', 63.15, 'GUCCI', 25, '2018', '{\"image0\":\"33847_product-12.jpg\",\"image1\":\"34877_blog-01.jpg\",\"image2\":\"39029_about-01.jpg\",\"image3\":\"33955_about-02.jpg\"}', 'E0DFG36', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 12\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat\"}', NULL, '2018-09-10 14:11:40', '2018-07-15 19:43:01'),
(13, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 13\",\"en\":\"T-Shirt with Sleeve\"}', 18.49, 'Victoria Secret', 30, '2018', '{\"image0\":\"90739_product-13.jpg\",\"image1\":\"43745_blog-02.jpg\",\"image2\":\"82505_blog-03.jpg\",\"image3\":\"56653_gallery-07.jpg\"}', 'E0DFG37', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 13\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-10-10 14:14:03', '2018-07-10 14:14:03'),
(14, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 14\",\"en\":\"Pretty Little Thing\"}', 54.79, 'Victoria Secret', 23, '2018', '{\"image0\":\"70208_product-14.jpg\",\"image1\":\"46080_blog-01.jpg\",\"image2\":\"73431_blog-02.jpg\",\"image3\":\"66287_blog-03.jpg\"}', 'E0DFG38', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 14\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-11-10 14:16:16', '2018-07-10 14:16:16'),
(15, 5, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c 15\",\"en\":\"Mini Silver Mesh Watch\"}', 88.85, 'Victoria Secret', 30, '2018', '{\"image0\":\"42405_product-06.jpg\",\"image1\":\"60522_gallery-07.jpg\",\"image2\":\"81953_gallery-08.jpg\",\"image3\":\"66502_gallery-09.jpg\"}', 'E0DFG39', 1, '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 15\",\"en\":\"Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.\"}', NULL, '2018-12-10 14:19:12', '2018-07-15 19:43:39'),
(16, 1, '{\"ar\":\"\\u0645\\u0646\\u062a\\u062c \\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\",\"en\":\"test\"}', 200.00, 'CUCCI', 44, '2018', '{\"image0\":\"57652_gallery-03.jpg\",\"image1\":\"96675_gallery-04.jpg\",\"image2\":\"98911_gallery-01.jpg\",\"image3\":\"94554_gallery-02.jpg\"}', 'E0DFG55', 1, '{\"ar\":\"\\u0648\\u0635\\u0641\",\"en\":\"discr\"}', NULL, '2018-12-13 14:03:44', '2018-08-14 13:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-07-14 13:08:47', '2018-07-14 13:08:47'),
(1, 2, '2018-07-14 13:08:47', '2018-07-14 13:08:47'),
(1, 3, '2018-07-13 22:00:00', '2018-07-13 22:00:00'),
(2, 2, '2018-07-19 19:46:16', '2018-07-19 19:46:16'),
(2, 4, '2018-07-14 13:14:51', '2018-07-14 13:14:51'),
(3, 1, '2018-07-21 19:58:40', '2018-07-21 19:58:40'),
(3, 2, '2018-07-14 13:15:18', '2018-07-14 13:15:18'),
(4, 3, '2018-07-14 13:15:51', '2018-07-14 13:15:51'),
(4, 4, '2018-07-14 13:15:51', '2018-07-14 13:15:51'),
(4, 5, '2018-07-14 13:15:51', '2018-07-14 13:15:51'),
(5, 3, '2018-07-14 13:16:14', '2018-07-14 13:16:14'),
(5, 4, '2018-07-14 13:16:14', '2018-07-14 13:16:14'),
(5, 5, '2018-07-14 13:16:14', '2018-07-14 13:16:14'),
(6, 3, '2018-07-14 13:16:55', '2018-07-14 13:16:55'),
(6, 4, '2018-07-14 13:16:56', '2018-07-14 13:16:56'),
(6, 5, '2018-07-14 13:16:56', '2018-07-14 13:16:56'),
(7, 3, '2018-07-14 13:16:34', '2018-07-14 13:16:34'),
(7, 4, '2018-07-14 13:16:34', '2018-07-14 13:16:34'),
(7, 5, '2018-07-14 13:16:34', '2018-07-14 13:16:34'),
(8, 3, '2018-07-14 13:17:25', '2018-07-14 13:17:25'),
(8, 4, '2018-07-14 13:17:25', '2018-07-14 13:17:25'),
(8, 5, '2018-07-14 13:17:25', '2018-07-14 13:17:25'),
(9, 3, '2018-07-14 13:18:04', '2018-07-14 13:18:04'),
(9, 4, '2018-07-14 13:18:04', '2018-07-14 13:18:04'),
(10, 3, '2018-07-14 13:18:35', '2018-07-14 13:18:35'),
(10, 4, '2018-07-14 13:18:36', '2018-07-14 13:18:36'),
(10, 5, '2018-07-14 13:18:36', '2018-07-14 13:18:36'),
(11, 3, '2018-07-14 13:19:01', '2018-07-14 13:19:01'),
(11, 4, '2018-07-14 13:19:01', '2018-07-14 13:19:01'),
(11, 5, '2018-07-14 13:19:01', '2018-07-14 13:19:01'),
(12, 3, '2018-07-14 13:19:31', '2018-07-14 13:19:31'),
(12, 4, '2018-07-14 13:19:31', '2018-07-14 13:19:31'),
(13, 3, '2018-07-14 13:19:58', '2018-07-14 13:19:58'),
(13, 4, '2018-07-14 13:19:58', '2018-07-14 13:19:58'),
(13, 5, '2018-07-14 13:19:58', '2018-07-14 13:19:58'),
(14, 3, '2018-07-14 13:20:33', '2018-07-14 13:20:33'),
(14, 4, '2018-07-14 13:20:33', '2018-07-14 13:20:33'),
(14, 5, '2018-07-14 13:20:33', '2018-07-14 13:20:33'),
(15, 3, '2018-07-14 13:21:10', '2018-07-14 13:21:10'),
(15, 4, '2018-07-14 13:21:11', '2018-07-14 13:21:11'),
(15, 5, '2018-07-14 13:21:11', '2018-07-14 13:21:11'),
(16, 1, '2018-07-15 19:44:29', '2018-07-15 19:44:29'),
(16, 3, '2018-07-15 19:44:11', '2018-07-15 19:44:11'),
(16, 5, '2018-07-15 19:44:11', '2018-07-15 19:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-07-10 13:00:40', '2018-07-10 13:00:40'),
(1, 2, '2018-07-10 13:00:40', '2018-07-10 13:00:40'),
(2, 2, '2018-07-10 13:09:49', '2018-07-10 13:09:49'),
(2, 4, '2018-07-10 13:09:49', '2018-07-10 13:09:49'),
(3, 1, '2018-07-10 13:12:16', '2018-07-10 13:12:16'),
(3, 2, '2018-07-10 13:12:16', '2018-07-10 13:12:16'),
(4, 1, '2018-07-10 13:13:56', '2018-07-10 13:13:56'),
(4, 3, '2018-07-10 13:13:56', '2018-07-10 13:13:56'),
(4, 5, '2018-07-10 13:13:56', '2018-07-10 13:13:56'),
(5, 1, '2018-07-10 13:36:48', '2018-07-10 13:36:48'),
(5, 3, '2018-07-10 13:36:48', '2018-07-10 13:36:48'),
(6, 1, '2018-07-10 13:40:27', '2018-07-10 13:40:27'),
(6, 6, '2018-07-10 13:40:27', '2018-07-10 13:40:27'),
(7, 1, '2018-07-10 13:42:54', '2018-07-10 13:42:54'),
(7, 3, '2018-07-10 13:42:54', '2018-07-10 13:42:54'),
(8, 1, '2018-07-10 13:45:28', '2018-07-10 13:45:28'),
(8, 2, '2018-07-10 13:45:28', '2018-07-10 13:45:28'),
(8, 4, '2018-07-10 13:45:28', '2018-07-10 13:45:28'),
(9, 6, '2018-07-10 14:00:17', '2018-07-10 14:00:17'),
(10, 2, '2018-07-10 14:03:06', '2018-07-10 14:03:06'),
(10, 4, '2018-07-10 14:03:06', '2018-07-10 14:03:06'),
(11, 2, '2018-07-10 14:07:03', '2018-07-10 14:07:03'),
(11, 4, '2018-07-10 14:07:04', '2018-07-10 14:07:04'),
(12, 6, '2018-07-10 14:11:40', '2018-07-10 14:11:40'),
(13, 2, '2018-07-10 14:14:03', '2018-07-10 14:14:03'),
(13, 4, '2018-07-10 14:14:03', '2018-07-10 14:14:03'),
(14, 2, '2018-07-10 14:16:16', '2018-07-10 14:16:16'),
(14, 4, '2018-07-10 14:16:16', '2018-07-10 14:16:16'),
(15, 1, '2018-07-10 14:19:12', '2018-07-10 14:19:12'),
(15, 6, '2018-07-10 14:19:12', '2018-07-10 14:19:12'),
(16, 1, '2018-07-13 14:03:44', '2018-07-13 14:03:44'),
(16, 3, '2018-07-13 14:03:45', '2018-07-13 14:03:45'),
(16, 5, '2018-07-13 14:03:45', '2018-07-13 14:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'this is my review', '4', '2018-07-15 15:58:58', '2018-07-15 15:58:58'),
(2, 1, 11, 'this is my review', '4', '2018-07-15 16:01:16', '2018-07-15 16:01:16'),
(3, 1, 1, 'this is my review about this product', '4', '2018-07-20 20:34:16', '2018-07-20 20:34:16'),
(4, 2, 1, 'this is my review', '4', '2018-07-20 22:00:00', '2018-07-20 22:00:00'),
(5, 1, 4, 'sdsasdada', '4', '2018-07-25 15:52:23', '2018-07-25 15:52:23'),
(6, 1, 2, 'this my review', '5', '2018-07-25 22:35:04', '2018-07-25 22:35:04'),
(7, 1, 10, 'sdsadadas', '4', '2018-07-26 12:38:52', '2018-07-26 12:38:52'),
(8, 4, 1, 'هذا تقييمي لهذا المنتج', '4', '2018-07-26 20:00:29', '2018-07-26 20:00:29'),
(9, 4, 3, 'pshxpashxkshxpss', '3', '2018-07-26 20:02:00', '2018-07-26 20:02:00'),
(10, 1, 13, 'this is awesame !!', '4', '2018-08-05 17:04:05', '2018-08-05 17:04:05'),
(11, 1, 5, 'this is my review', '3', '2018-08-06 15:32:03', '2018-08-06 15:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slug`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'sitename', 'إسم الموقع', '{\"ar\":\"\\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u062a\\u0633\\u0648\\u0642 \\u0639\\u0628\\u0631 \\u0627\\u0644\\u0627\\u0646\\u062a\\u0631\\u0646\\u062a \\u0627\\u0644\\u0627\\u0648\\u0644 \\u0641\\u064a \\u0645\\u0635\\u0631\",\"en\":\"The First Website in Online Shopping\"}', '1', '2018-06-01 22:00:00', '2018-08-19 15:32:46'),
(2, 'facebook', 'الفيسبوك', 'http://www.facebook.com/cozastore', '0', '2018-06-01 22:00:00', '2018-06-01 22:00:00'),
(3, 'instagram', 'الانستجرام', 'http://www.instagram.com/cozastore', '0', '2018-06-01 22:00:00', '2018-06-01 22:00:00'),
(4, 'pinterest', 'البينترست', 'http://www.pinterest.com/cozastore', '0', '2018-06-01 22:00:00', '2018-06-22 12:06:04'),
(5, 'siteSmallDis', 'وصف مصغر للموقع', '{\"ar\":\"\\u064a\\u0645\\u0643\\u0646\\u0643\\u0645 \\u0627\\u0644\\u062a\\u0643\\u0631\\u0645 \\u0628\\u0632\\u064a\\u0627\\u0631\\u062a\\u0646\\u0627 \\u0639\\u0644\\u064a \\u0627\\u0644\\u0639\\u0646\\u0648\\u0627\\u0646 \\u0627\\u0644\\u062a\\u0627\\u0644\\u064a 36 \\u0634\\u0627\\u0631\\u0639 \\u0627\\u0644\\u0644\\u0648\\u0627\\u0621 \\u0627\\u062d\\u0645\\u062f \\u0627\\u0644\\u0633\\u0639\\u064a\\u062f \\u0627\\u0644\\u0645\\u062a\\u0641\\u0631\\u0639 \\u0645\\u0646 \\u0634\\u0627\\u0631\\u0639 \\u0635\\u0644\\u0627\\u062d \\u0633\\u0627\\u0644\\u0645 \\u0627\\u0644\\u0642\\u0627\\u0647\\u0631\\u0629\",\"en\":\"You can honer us by visiting us on this address 36 comandos ahmed elsaid street subpart of salah salem street\"}', '1', '2018-06-01 22:00:00', '2018-06-22 12:28:12'),
(6, 'no_image', 'لا يوجد صورة', 'no_image.jpg', '2', '2018-06-01 22:00:00', '2018-08-19 15:32:47'),
(7, 'mobile', 'الموبايل المحمول', '+201027543768', '0', '2018-06-02 18:34:19', '2018-06-02 18:34:19'),
(8, 'mail', 'البريد الإلكتروني للموقع', 'support@cozastore.com', '0', '2018-06-02 18:44:36', '2018-06-22 13:08:22'),
(9, 'siteoffer', 'عرض اليوم', '{\"ar\":\"\\u064a\\u0645\\u0643\\u0646\\u0643 \\u0627\\u0644\\u062d\\u0635\\u0648\\u0644 \\u0639\\u0644\\u064a \\u062a\\u062e\\u0641\\u064a\\u0636 \\u064a\\u0635\\u0644 \\u0627\\u0644\\u064a 10 \\u0641\\u064a \\u0627\\u0644\\u0645\\u0627\\u0626\\u0629 \\u0639\\u0646\\u062f \\u0648\\u0635\\u0648\\u0644 \\u0627\\u0644\\u0645\\u0634\\u062a\\u0631\\u0648\\u0627\\u062a \\u0627\\u0644\\u064a 2000 \\u062c\\u0646\\u064a\\u0647\\u0627\",\"en\":\"You can have discount reach 10% if your sales reached 2000 L.E\"}', '1', '2018-06-03 18:42:08', '2018-06-25 16:05:54'),
(10, 'siteCurrence', 'عملة الموقع', '{\"ar\":\"\\u062c\\u0646\\u064a\\u0647\\u0627\",\"en\":\"L.E\"}', '1', '2018-06-09 12:13:37', '2018-06-22 12:28:13'),
(11, 'sitestory', 'من نحن - ( قصتنا )', '{\"ar\":\"text_ar\",\"en\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat consequat enim, non auctor massa ultrices non. Morbi sed odio massa. Quisque at vehicula tellus, sed tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu arcu egestas convallis. Nullam eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae nec augue. Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis diam faucibus et. Morbi a tempor elit.\\r\\n\\r\\nDonec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula.\\r\\n\\r\\nAny questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879\"}', '1', '2018-06-24 21:41:38', '2018-06-24 21:41:38'),
(13, 'siteOurMission', 'من نحن - ( مهمتنا)', '{\"ar\":\"text_ar\",\"en\":\"Mauris non lacinia magna. Sed nec lobortis dolor. Vestibulum rhoncus dignissim risus, sed consectetur erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam maximus mauris sit amet odio convallis, in pharetra magna gravida. Praesent sed nunc fermentum mi molestie tempor. Morbi vitae viverra odio. Pellentesque ac velit egestas, luctus arcu non, laoreet mauris. Sed in ipsum tempor, consequat odio in, porttitor ante. Ut mauris ligula, volutpat in sodales in, porta non odio. Pellentesque tempor urna vitae mi vestibulum, nec venenatis nulla lobortis. Proin at gravida ante. Mauris auctor purus at lacus maximus euismod. Pellentesque vulputate massa ut nisl hendrerit, eget elementum libero iaculis.\"}', '1', '2018-06-24 21:44:21', '2018-06-24 21:44:21'),
(14, 'siteMoral', 'من نحن - ( الحكمة)', '{\"ar\":\"text_ar\",\"en\":\"Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn\'t really do it, they just saw something. It seemed obvious to them after a while.\"}', '1', '2018-06-24 21:45:41', '2018-06-24 21:45:41'),
(15, 'siteMoralOwner', 'من نحن - ( صاحب الحكمة)', '{\"ar\":\"text_ar\",\"en\":\"Steve Job\\u2019s\"}', '1', '2018-06-24 21:46:56', '2018-06-24 21:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, 'XS', '2018-07-14 11:44:03', '2018-07-14 11:44:03'),
(2, 'SM', '2018-07-14 11:44:27', '2018-07-14 11:44:27'),
(3, 'M', '2018-07-14 11:44:37', '2018-07-14 11:44:37'),
(4, 'L', '2018-07-14 11:44:55', '2018-07-14 11:44:55'),
(5, 'XL', '2018-07-14 11:45:04', '2018-07-14 11:45:04'),
(6, 'XXL', '2018-07-14 11:45:14', '2018-07-14 11:45:14'),
(8, 'XXXL', '2018-07-18 21:01:54', '2018-07-18 21:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `user_id`, `title`, `subtitle`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"ar\":\"\\u0628\\u0646\\u0631 1\",\"en\":\"Slider1\"}', '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 1\",\"en\":\"content 1\"}', '2346_slide-04.jpg', NULL, '2018-06-30 01:24:42', '2018-06-30 01:52:42'),
(2, 1, '{\"ar\":\"\\u0627\\u0644\\u0628\\u0646\\u0631 2\",\"en\":\"Slider2\"}', '{\"ar\":\"\\u0645\\u062d\\u062a\\u0648\\u064a 2\",\"en\":\"content 2\"}', '9721_slide-07.jpg', NULL, '2018-06-30 18:10:09', '2018-06-30 18:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'موضة', '2018-06-01 23:02:03', '2018-06-01 23:02:03'),
(2, 'صيفي', '2018-06-01 23:02:13', '2018-06-01 23:02:13'),
(3, 'شتوي', '2018-06-01 23:02:21', '2018-06-01 23:02:21'),
(4, 'خفيف', '2018-06-01 23:02:28', '2018-06-01 23:02:28'),
(5, 'ثقيل', '2018-06-01 23:02:36', '2018-06-01 23:02:36'),
(6, 'إكسيسوارات', '2018-06-01 23:02:58', '2018-06-01 23:02:58'),
(7, 'رجالي', '2018-06-01 23:03:06', '2018-06-01 23:03:06'),
(8, 'نسائي', '2018-06-01 23:03:16', '2018-06-01 23:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lang`, `firstName`, `lastName`, `email`, `username`, `gender`, `mobile`, `image`, `dob`, `location`, `jop`, `about`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'en', 'ali', 'abdo', 'ali@gmail.com', 'ali.abdo', 0, '01027543768', '2648_gallery-09.jpg', '1994-06-14', 'صهرجت الصغري - أجا - دقهلية', 'Accountant', 'none', '$2y$10$EQzV9zoRpJ8QiKCdCV0yqOuq.IfomSrrL7fwwrfgG13MfULGRacAa', 'zsUOWGlunZ7MCkkdItUDBpK3t3ZJ2fs6svspNl1xEcR6l8LRKKtGnxeJ9CUd', '2018-06-09 13:08:16', '2018-08-17 23:54:49', NULL),
(2, NULL, 'ramadan', 'hamed', 'ramadan94@gmail.com', 'ramadan.hamed', 0, '01011468087', '55541_about-02.jpg', '1994-04-22', 'صهرجت الصغري - أجا - دقهلية', 'Civil Engineering', 'none', '$2y$10$CTn5jZfHsifNOIOoNvhs/ORmc.2647mHLFaJIy3WKpihgz5PXpoyC', NULL, '2018-07-21 20:42:44', '2018-07-21 20:42:44', NULL),
(3, NULL, 'احمد', 'السعيد', 'ahmed4kit@gmail.com', 'ahmed.elsaid', 0, '01024536587', '54397_about-01.jpg', '1998-12-11', 'صهرجت الصغري - أجا - دقهلية', 'Civil Engineering', 'Civil Engineering', '$2y$10$FG6ilGABi/s2.Vl5PbfpQOVm9cn..ngBmQHeEfiMZtVQ5jg4o9vbu', 'N6lgrMeW66mlCQy6ZttnNF2VMZVD5TAxJTYzlieFdK1Wu9gA99uj0x0gELwf', '2018-07-26 19:33:03', '2018-08-26 11:24:00', NULL),
(4, NULL, 'mohamed', 'rayan', 'mohamed.rayan@gmail.com', 'mohamed.rayan', 0, '01027543768', '51489_about-02.jpg', '1994-08-19', 'Mansoura, dakahlia, egypt', 'Laravel PHP Developers', 'none', '$2y$10$ZG/qYivgq6Zudyw6Am0guexlRJ2mda.SMXw6NB5DBoodROr/xOj2O', NULL, '2018-08-21 20:18:10', '2018-08-21 20:18:10', NULL),
(5, NULL, 'mohamed', 'hamed', 'mo.hamed@gmail.com', 'mohamed.hamed', 0, '01011468087', '', '1994-08-02', 'صهرجت الصغري - أجا - دقهلية', 'Civil Engineering', 'none', '$2y$10$p0O7fxlminh.yvaFLf8VL.qwZzn.2AWFs8kmjOPhoAe/ii2XiMvcG', NULL, '2018-08-21 20:19:47', '2018-08-21 20:19:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_product`
--
ALTER TABLE `admin_product`
  ADD PRIMARY KEY (`product_id`,`admin_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`product_id`,`color_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `model` (`model`),
  ADD UNIQUE KEY `image` (`image`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`product_id`,`size_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`product_id`,`tag_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
