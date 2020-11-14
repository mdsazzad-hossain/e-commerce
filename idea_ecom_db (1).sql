-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 01:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idea_ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_managers`
--

CREATE TABLE `ad_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_managers`
--

INSERT INTO `ad_managers` (`id`, `avatar`, `slug`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, '821312094.jpg', '821312094.jpg', 'top', 1, '2020-11-07 16:12:04', '2020-11-07 16:12:04'),
(2, '618375193.png', '618375193.png', 'popup', 1, '2020-11-07 20:48:42', '2020-11-07 20:49:30'),
(3, '885138437.webp', '885138437.webp', 'body-top left', 1, '2020-11-07 20:49:55', '2020-11-07 20:53:25'),
(4, '1799700980.png', '1799700980.png', 'body-top right', 1, '2020-11-07 20:50:13', '2020-11-07 20:50:13'),
(5, '1372443945.jpg', '1372443945.jpg', 'body-bottom left', 1, '2020-11-07 20:52:39', '2020-11-07 20:52:39'),
(6, '224685782.jpg', '224685782.jpg', 'body-bottom right', 1, '2020-11-07 20:52:57', '2020-11-07 20:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `banars`
--

CREATE TABLE `banars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banars`
--

INSERT INTO `banars` (`id`, `image`, `image1`, `image2`, `image3`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, '322906268.jpg', '1690744041.jpg', '362745482.jpg', '1204489144.jpeg', '322906268.jpg', 1, '2020-11-07 20:55:26', '2020-11-07 20:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `br_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `child_category_id`, `sub_child_category_id`, `brand_name`, `slug`, `br_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 8, 'iphone xs max', 'iphone xs max', 'Apple iPhone Xs Max 64GB', 1, '2020-11-07 20:10:53', '2020-11-07 20:10:53'),
(2, 1, 2, 22, 'j2 Prime', 'j2 Prime', NULL, 1, '2020-11-07 20:17:39', '2020-11-07 20:17:39'),
(3, 1, 2, 8, 'iphone xs max', 'iphone xs max', NULL, 1, '2020-11-07 20:23:48', '2020-11-07 20:23:48'),
(4, 2, 78, 19, 'g32', 'g32', NULL, 1, '2020-11-07 20:33:48', '2020-11-07 20:33:48'),
(5, 9, 63, 23, 'Bata', 'Bata', 'bata product', 1, '2020-11-08 05:37:07', '2020-11-08 05:37:07'),
(6, 1, 7, 19, 'SAMSUNG', 'SAMSUNG', 'sdgdsfgdf', 1, '2020-11-08 05:41:16', '2020-11-08 05:41:16'),
(7, 9, 52, 16, 'Levis', 'Levis', 'asdfdsfdsf', 1, '2020-11-08 05:48:03', '2020-11-08 05:48:03'),
(8, 1, 2, 8, 'Apple iPhone 11', 'Apple iPhone 11', 'Apple A13 Bionic processor', 1, '2020-11-09 18:49:29', '2020-11-09 18:49:29'),
(9, 9, 58, 75, 'H&M', 'H&M', NULL, 1, '2020-11-09 20:16:06', '2020-11-09 20:16:06'),
(10, 1, 3, 20, 'lg', 'lg', NULL, 1, '2020-11-09 20:25:46', '2020-11-09 20:25:46'),
(11, 7, 43, 52, 'Towel High', 'Towel High', NULL, 1, '2020-11-09 20:43:26', '2020-11-09 20:43:26'),
(12, 7, 43, 52, 'Tzowel Normal', 'Tzowel Normal', NULL, 1, '2020-11-09 20:48:06', '2020-11-09 20:48:06'),
(13, 9, 52, 61, 'Polo', 'Polo', NULL, 1, '2020-11-09 20:54:22', '2020-11-09 20:54:22'),
(14, 9, 56, 72, 'Adidas', 'Adidas', NULL, 1, '2020-11-09 21:12:14', '2020-11-09 21:12:14'),
(15, 9, 56, 70, 'Nike', 'Nike', NULL, 1, '2020-11-09 21:17:40', '2020-11-09 21:17:40'),
(16, 9, 52, 63, 'Tshart', 'Tshart', NULL, 1, '2020-11-09 21:38:08', '2020-11-09 21:38:08'),
(17, 7, 46, 58, 'Nescafe', 'Nescafe', NULL, 1, '2020-11-09 22:09:38', '2020-11-09 22:09:38'),
(18, 4, 22, 43, 'Oil', 'Oil', NULL, 1, '2020-11-09 22:29:55', '2020-11-09 22:29:55'),
(19, 4, 23, 48, 'Shampo', 'Shampo', NULL, 1, '2020-11-09 22:33:43', '2020-11-09 22:33:43'),
(20, 9, 52, 63, 'T-Shart', 'T-Shart', NULL, 1, '2020-11-09 22:53:46', '2020-11-09 22:53:46'),
(21, 3, 15, 34, 'Smart Tv', 'Smart Tv', NULL, 1, '2020-11-09 23:01:57', '2020-11-09 23:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `explor` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cover`, `explor`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronic Devices', '422965659.png', 1, 1, '2020-11-07 16:19:24', '2020-11-09 18:28:16'),
(2, 'Electronic Accessories', '546846995.jpg', 1, 1, '2020-11-07 16:33:15', '2020-11-09 18:08:48'),
(3, 'TV & Home Appliances', '2029306244.jpg', 1, 1, '2020-11-07 16:34:20', '2020-11-09 18:08:40'),
(4, 'Health & Beauty', '803644607.jpeg', 1, 1, '2020-11-07 16:34:38', '2020-11-09 05:24:59'),
(5, 'Babies & Toys', '734570397.jpg', 1, 1, '2020-11-07 16:35:19', '2020-11-09 18:08:35'),
(6, 'Groceries & Pets', '244823824.jpg', 1, 1, '2020-11-07 16:36:02', '2020-11-09 18:08:27'),
(7, 'Home & Lifestyle', '1391780564.jpg', 1, 1, '2020-11-07 16:36:35', '2020-11-09 18:08:19'),
(8, 'Women\'s Fashion', '1442187275.jpg', 1, 1, '2020-11-07 16:37:01', '2020-11-09 18:08:11'),
(9, 'Men\'s Fashion', '1187856068.jpg', 1, 1, '2020-11-07 16:37:55', '2020-11-09 05:24:47'),
(10, 'Watches & Accessories', '566847989.jpg', 1, 1, '2020-11-07 16:38:25', '2020-11-09 18:07:15'),
(11, 'Sports & Outdoor', '1463845472.jpg', 1, 1, '2020-11-07 16:38:54', '2020-11-09 18:07:24'),
(12, 'Automotive & Motorbike', '1182520930.jpg', 1, 1, '2020-11-07 16:39:43', '2020-11-09 18:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `child_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_categories`
--

INSERT INTO `child_categories` (`id`, `category_id`, `child_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'tv', 1, '2020-11-07 16:29:42', '2020-11-07 16:29:42'),
(2, 1, 'Mobile', 1, '2020-11-07 16:30:04', '2020-11-07 16:44:37'),
(3, 1, 'Fridge', 1, '2020-11-07 16:40:47', '2020-11-07 16:40:47'),
(4, 1, 'Washing Machine', 1, '2020-11-07 16:41:07', '2020-11-07 16:41:36'),
(5, 1, 'Laptop', 1, '2020-11-07 16:42:49', '2020-11-07 16:42:49'),
(6, 1, 'Camera', 1, '2020-11-07 16:43:03', '2020-11-07 16:43:03'),
(7, 1, 'Mobile', 1, '2020-11-07 16:43:21', '2020-11-07 16:43:21'),
(8, 2, 'Audio', 1, '2020-11-07 16:45:16', '2020-11-07 16:45:16'),
(9, 2, 'Printer', 1, '2020-11-07 16:45:27', '2020-11-07 16:45:27'),
(10, 2, 'Software', 1, '2020-11-07 16:45:44', '2020-11-07 16:45:44'),
(11, 2, 'Mobile Accessories', 1, '2020-11-07 16:46:47', '2020-11-07 16:46:47'),
(12, 2, 'Computer Accessories', 1, '2020-11-07 16:47:12', '2020-11-07 16:47:12'),
(13, 2, 'Camera Accessories', 1, '2020-11-07 16:47:42', '2020-11-07 16:47:42'),
(14, 2, 'Console Accessories', 1, '2020-11-07 16:48:24', '2020-11-07 16:48:24'),
(15, 3, 'Television', 1, '2020-11-07 16:49:30', '2020-11-07 16:49:30'),
(16, 3, 'Home Audio', 1, '2020-11-07 16:49:45', '2020-11-07 16:49:45'),
(17, 3, 'Large Appliance', 1, '2020-11-07 16:50:23', '2020-11-07 16:50:23'),
(18, 3, 'Small Kitchen Appliances', 1, '2020-11-07 16:50:57', '2020-11-07 16:50:57'),
(19, 3, 'cooling & Heating', 1, '2020-11-07 16:51:17', '2020-11-07 16:51:17'),
(20, 3, 'Vacuums', 1, '2020-11-07 16:51:50', '2020-11-07 16:51:50'),
(21, 3, 'Irons & Garments Streamers', 1, '2020-11-07 16:53:05', '2020-11-07 16:53:05'),
(22, 4, 'Bath & Body', 1, '2020-11-07 16:53:36', '2020-11-07 16:53:36'),
(23, 4, 'Beauty & Tools', 1, '2020-11-07 16:54:03', '2020-11-07 16:54:03'),
(24, 4, 'Hair Care', 1, '2020-11-07 16:54:21', '2020-11-07 16:54:21'),
(25, 4, 'Makeup', 1, '2020-11-07 16:54:49', '2020-11-07 16:54:49'),
(26, 4, 'Men\'s Care', 1, '2020-11-07 16:55:13', '2020-11-07 16:55:13'),
(27, 4, 'Personal Care', 1, '2020-11-07 16:55:32', '2020-11-07 16:55:32'),
(28, 4, 'Skin Care', 1, '2020-11-07 16:55:49', '2020-11-07 16:55:49'),
(29, 5, 'Mother & Baby', 1, '2020-11-07 16:56:18', '2020-11-07 16:56:18'),
(30, 5, 'Feeding', 1, '2020-11-07 16:56:31', '2020-11-07 16:56:31'),
(31, 5, 'Baby Gear', 1, '2020-11-07 16:57:01', '2020-11-07 16:57:01'),
(32, 5, 'Baby personal Care', 1, '2020-11-07 16:57:19', '2020-11-07 16:57:19'),
(33, 5, 'Nursery', 1, '2020-11-07 16:57:37', '2020-11-07 16:57:37'),
(34, 5, 'Toys & Game', 1, '2020-11-07 16:59:28', '2020-11-07 16:59:28'),
(35, 6, 'Beverage', 1, '2020-11-07 18:06:01', '2020-11-07 18:06:01'),
(36, 6, 'Breakfast, Choco & Snacks', 1, '2020-11-07 18:07:07', '2020-11-07 18:07:07'),
(37, 6, 'cat', 1, '2020-11-07 18:08:07', '2020-11-07 18:08:07'),
(38, 6, 'Dog', 1, '2020-11-07 18:08:18', '2020-11-07 18:08:18'),
(39, 6, 'Fish', 1, '2020-11-07 18:08:32', '2020-11-07 18:08:32'),
(40, 6, 'Bird', 1, '2020-11-07 18:08:41', '2020-11-07 18:08:41'),
(41, 6, 'Laundry & Household', 1, '2020-11-07 18:09:17', '2020-11-07 18:09:17'),
(42, 7, 'Bath', 1, '2020-11-07 18:09:43', '2020-11-07 18:09:43'),
(43, 7, 'Bedding', 1, '2020-11-07 18:09:58', '2020-11-07 18:09:58'),
(44, 7, 'Decor', 1, '2020-11-07 18:10:53', '2020-11-07 18:10:53'),
(45, 7, 'Furniture', 1, '2020-11-07 18:11:08', '2020-11-07 18:11:08'),
(46, 7, 'Kitchen & Dining', 1, '2020-11-07 18:11:45', '2020-11-07 18:11:45'),
(47, 8, 'Traditional Clothing', 1, '2020-11-07 18:12:06', '2020-11-07 18:12:06'),
(48, 8, 'Sharee', 1, '2020-11-07 18:12:18', '2020-11-07 18:12:18'),
(49, 8, 'Shalwar Kameez', 1, '2020-11-07 18:13:05', '2020-11-07 18:13:05'),
(50, 8, 'Kurtis', 1, '2020-11-07 18:13:36', '2020-11-07 18:13:36'),
(51, 8, 'Women\'s Bag', 1, '2020-11-07 18:14:02', '2020-11-07 18:14:02'),
(52, 9, 'T-shirt', 1, '2020-11-07 18:14:40', '2020-11-07 18:14:40'),
(53, 9, 'Shirts', 1, '2020-11-07 18:14:55', '2020-11-07 18:14:55'),
(54, 9, 'Panjabi & Fatua', 1, '2020-11-07 18:15:19', '2020-11-07 18:15:19'),
(55, 9, 'Polo Shirts', 1, '2020-11-07 18:16:39', '2020-11-07 18:16:39'),
(56, 9, 'Shoes', 1, '2020-11-07 18:23:19', '2020-11-07 18:23:19'),
(57, 9, 'Men\'s Bag', 1, '2020-11-07 18:23:53', '2020-11-07 18:23:53'),
(58, 9, 'Jeans', 1, '2020-11-07 18:24:25', '2020-11-07 18:24:25'),
(59, 10, 'Men\'s Watch', 1, '2020-11-07 18:26:06', '2020-11-07 18:26:06'),
(60, 10, 'Women\'s  Watch', 1, '2020-11-07 18:26:29', '2020-11-07 18:26:29'),
(61, 10, 'Women\'s Jewelry', 1, '2020-11-07 18:27:08', '2020-11-07 18:27:08'),
(62, 10, 'Men\'s  Wallet', 1, '2020-11-07 18:27:31', '2020-11-07 18:27:31'),
(63, 10, 'men\'s Belt', 1, '2020-11-07 18:27:51', '2020-11-07 18:27:51'),
(64, 10, 'Sunglass', 1, '2020-11-07 18:28:10', '2020-11-07 18:28:10'),
(65, 11, 'Treadmills', 1, '2020-11-07 18:29:22', '2020-11-07 18:29:22'),
(66, 11, 'Fitness Accessories', 1, '2020-11-07 18:30:09', '2020-11-07 18:30:09'),
(67, 11, 'Dumbbells\'', 1, '2020-11-07 18:30:59', '2020-11-07 18:30:59'),
(68, 11, 'Racket Sports', 1, '2020-11-07 18:31:19', '2020-11-07 18:31:19'),
(69, 11, 'Outdoor Recreation', 1, '2020-11-07 18:31:43', '2020-11-07 18:31:43'),
(70, 12, 'Automobiles', 1, '2020-11-07 18:32:22', '2020-11-07 18:32:22'),
(71, 12, 'Auto Oil & Fluids', 1, '2020-11-07 18:33:31', '2020-11-07 18:33:31'),
(72, 12, 'Interior Accessories', 1, '2020-11-07 18:34:19', '2020-11-07 18:34:19'),
(73, 12, 'Exterior Accessories', 1, '2020-11-07 18:34:44', '2020-11-07 18:34:44'),
(74, 12, 'Car Audio', 1, '2020-11-07 18:35:04', '2020-11-07 18:35:04'),
(75, 12, 'Motor Parts & Accessories', 1, '2020-11-07 18:35:38', '2020-11-07 18:35:38'),
(76, 2, 'Phone Case', 1, '2020-11-07 19:44:36', '2020-11-07 19:44:36'),
(77, 2, 'Power Bank', 1, '2020-11-07 19:45:05', '2020-11-07 19:45:05'),
(78, 2, 'Wireless Charger', 1, '2020-11-07 19:45:50', '2020-11-07 19:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_05_133820_create_banars_table', 1),
(5, '2020_10_05_164645_create_categories_table', 1),
(6, '2020_10_05_165019_create_child_categories_table', 1),
(7, '2020_10_05_165129_create_sub_child_categories_table', 1),
(8, '2020_10_07_111132_create_brands_table', 1),
(9, '2020_10_07_111207_create_products_table', 1),
(10, '2020_10_07_111238_create_product_avatars_table', 1),
(11, '2020_10_10_114048_create_ad_managers_table', 1),
(12, '2020_10_12_101727_create_vendors_table', 1),
(13, '2020_10_12_164255_create_single_vendors_table', 1),
(14, '2020_10_12_164957_create_vendor_products_table', 1),
(15, '2020_10_13_171028_create_vendor_product_avatars_table', 1),
(16, '2020_10_20_102950_create_wish_lists_table', 1),
(17, '2020_10_20_103232_create_carts_table', 1),
(18, '2020_10_22_151618_create_orders_table', 1),
(19, '2020_10_25_172102_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `total_emoney` decimal(10,2) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `amount`, `total_emoney`, `address`, `delivery_status`, `status`, `transaction_id`, `currency`, `payment`, `qty`, `created_at`, `updated_at`) VALUES
(15, 1, 'First order', 'you@example.com', '01711xxxxxx', '14620.00', '12.60', '93 B, New Eskaton Road', 'pending', 'Pending', '5fabd0f21aca0', 'BDT', 'cash on delivery', 3, NULL, '2020-11-12 10:44:03'),
(16, 1, 'vvvvvv', 'you@example.com', '01711xxxxxx', '5500.00', '0.00', '93 B, New Eskaton Road', 'pending', 'Processing', '5fabd65e831e6', 'BDT', 'BKASH-BKash', 2, NULL, NULL),
(17, 1, 'mmmmmmm', 'you@example.com', '01711xxxxxx', '400.00', '7.00', '93 B, New Eskaton Road', 'pending', 'Pending', '5faceca7a603d', 'BDT', 'cash on delivery', 1, NULL, '2020-11-12 08:07:54'),
(18, 1, 'John Doe', 'you@example.com', '01711xxxxxx', '1400.00', '0.00', '93 B, New Eskaton Road', 'delivered', 'Pending', '5facecec3dc0d', 'BDT', 'cash on delivery', 1, NULL, '2020-11-12 10:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `shipp_charge` decimal(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `vendor_product_id`, `user_id`, `qty`, `total`, `shipp_charge`, `status`, `created_at`, `updated_at`) VALUES
(19, 15, 21, NULL, 1, 4, '1220.00', '100.00', 1, '2020-11-11 11:54:26', '2020-11-12 10:57:36'),
(20, 15, 24, NULL, 1, 1, '400.00', '50.00', 1, '2020-11-11 11:54:26', '2020-11-12 10:57:36'),
(21, 15, NULL, 3, 1, 1, '13000.00', NULL, 0, '2020-11-11 11:54:26', '2020-11-12 10:55:10'),
(22, 16, 10, NULL, 1, 2, '3900.00', '100.00', 0, '2020-11-11 12:17:55', '2020-11-11 12:17:55'),
(23, 16, 11, NULL, 1, 1, '1600.00', '100.00', 0, '2020-11-11 12:17:55', '2020-11-11 13:04:41'),
(24, 17, 24, NULL, 1, 1, '400.00', '50.00', 0, '2020-11-12 08:04:55', '2020-11-12 08:04:55'),
(25, 18, NULL, 2, 1, 1, '1400.00', NULL, 0, '2020-11-12 08:06:04', '2020-11-12 10:37:42');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pur_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `promo_price` decimal(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `e_money` decimal(8,2) DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indoor_charge` decimal(8,2) DEFAULT NULL,
  `outdoor_charge` decimal(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` decimal(8,2) DEFAULT NULL,
  `shipp_des` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flash_timing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flash_status` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_name`, `slug`, `product_code`, `color`, `size`, `qty`, `pur_price`, `sale_price`, `promo_price`, `discount`, `e_money`, `position`, `indoor_charge`, `outdoor_charge`, `description`, `total_price`, `shipp_des`, `flash_timing`, `flash_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'j2 prime 32 gb', 'j2 prime 32 gb', '68476', 'yellow', 'xm', '16', '9000.00', '10000.00', '9500.00', '-940000.00', '100.00', 'just for you', '80.00', '120.00', 'dfdsfdsfdsf', '200000.00', NULL, NULL, 1, 1, '2020-11-07 20:18:35', '2020-11-11 10:44:41'),
(2, 4, 'ZENS Wireless Charging', 'ZENS Wireless Charging', '35465', 'black', 'xll', '8', '10000.00', '12000.00', '11000.00', '12000.00', '120.00', NULL, '80.00', '120.00', NULL, '120000.00', NULL, NULL, NULL, 1, '2020-11-07 20:35:21', '2020-11-08 20:41:32'),
(3, 5, 'Belt', 'Belt', '05250', 'black', 'xm', '10', '120.00', '150.00', '130.00', '147.00', '0.00', 'upcoming product', '50.00', '100.00', 'hfghgdfgfdg', '1500.00', NULL, NULL, NULL, 1, '2020-11-08 05:38:16', '2020-11-08 07:42:52'),
(4, 6, 'samsung young', 'samsung young', '3520', 'black', 'xm', '11', '1200.00', '1500.00', '1300.00', '1500.00', '0.00', 'just for you', NULL, NULL, 'yjhgfhfghf', '16500.00', NULL, NULL, NULL, 1, '2020-11-08 05:42:41', '2020-11-08 07:11:24'),
(5, 3, 'iPhone Xs Max 64GB', 'iPhone Xs Max 64GB', '3520', 'yellow', 'm', '5', '12000.00', '15000.00', '13000.00', '15000.00', '0.00', 'just for you', NULL, NULL, 'gfdsfds', '165000.00', NULL, NULL, NULL, 1, '2020-11-08 05:43:38', '2020-11-11 10:44:41'),
(6, 6, 'Note 10s', 'Note 10s', '4fgfdf', 'white', 'xl', '7', '12000.00', '15000.00', '14000.00', '15000.00', '0.00', 'just for you', NULL, NULL, 'ghffdgdf', '165000.00', NULL, NULL, NULL, 1, '2020-11-08 05:46:17', '2020-11-11 10:44:41'),
(7, 7, 'levis t-shirt', 'levis t-shirt', '2345', 'black', 'xl', '11', '130.00', '150.00', '140.00', NULL, NULL, NULL, NULL, NULL, 'gfhgfhfdg', '1650.00', NULL, NULL, NULL, 1, '2020-11-08 05:48:41', '2020-11-08 05:48:41'),
(8, 7, 'levis t-shirt 1', 'levis t-shirt 1', 'dsfdfd', 'color', 'xll', '11', '160.00', '200.00', '190.00', NULL, NULL, NULL, NULL, NULL, 'hgfhfghfg', '2200.00', NULL, NULL, NULL, 1, '2020-11-08 05:49:41', '2020-11-08 05:49:41'),
(9, 6, 'Fold z2', 'Fold z2', '4fgfdf', 'yellow', 'x', '11', '170.00', '190.00', '180.00', '190.00', '0.00', 'upcoming product', NULL, NULL, 'hgffdgfdg', '2090.00', NULL, NULL, NULL, 1, '2020-11-08 05:50:31', '2020-11-08 07:09:41'),
(10, 5, 'bata shoes', 'bata shoes', '05250', 'white', 'x', '4', '1600.00', '1900.00', '1800.00', '1862.00', '0.00', 'upcoming product', '50.00', '100.00', 'gsdfgdfg', '20900.00', NULL, NULL, NULL, 1, '2020-11-08 05:51:24', '2020-11-11 12:17:55'),
(11, 5, 'Bata wallet', 'Bata wallet', '456rgfgfd', 'yellow', 'x', '9', '1200.00', '1500.00', '1300.00', '1455.00', '0.00', 'upcoming product', '50.00', '100.00', 'gsfdgd', '15000.00', NULL, NULL, NULL, 1, '2020-11-07 08:43:34', '2020-11-11 12:17:55'),
(12, 8, 'Apple iphone 11 (32 GB)', 'Apple iphone 11 (32 GB)', 'App03', 'black', 'm', '50', '3000.00', '5000.00', '4500.00', NULL, NULL, NULL, NULL, NULL, 'Kubi valo', '250000.00', NULL, NULL, NULL, 1, '2020-11-09 18:58:54', '2020-11-09 18:58:54'),
(13, 9, 'Jeans H &M', 'Jeans H &M', 'hm022', 'blue', 'xll', '100', '350.00', '700.00', '650.00', '686.00', '3.50', 'just for you', '50.00', '100.00', NULL, '70000.00', NULL, NULL, NULL, 1, '2020-11-09 20:17:23', '2020-11-09 20:19:03'),
(14, 11, 'Wall Mount White Towel', 'Wall Mount White Towel', 'T12', 'white', 'm', '100', '100.00', '200.00', '150.00', '190.00', '2.00', 'upcoming product', '50.00', '100.00', NULL, '20000.00', NULL, NULL, NULL, 1, '2020-11-09 20:44:38', '2020-11-09 20:46:41'),
(15, 12, 'Modern Towel', 'Modern Towel', 'T224', 'white', 'xll', '100', '150.00', '250.00', '220.00', '-312.50', '6.25', 'flash sale', NULL, NULL, NULL, '25000.00', NULL, NULL, 0, 1, '2020-11-09 20:48:59', '2020-11-09 23:09:09'),
(16, 13, 'Cotton Polo Shirt', 'Cotton Polo Shirt', '1245', 'yellow', 'xll', '100', '250.00', '375.00', '350.00', '356.25', '3.75', 'global product', '50.00', '100.00', NULL, '37500.00', NULL, NULL, NULL, 1, '2020-11-09 20:55:38', '2020-11-09 20:56:56'),
(17, 13, 'Mesh Cotton Polo Shirt', 'Mesh Cotton Polo Shirt', '5245', 'red', 'm', '100', '280.00', '420.00', '400.00', '399.00', '4.20', 'global product', '50.00', '100.00', NULL, '42000.00', NULL, NULL, NULL, 1, '2020-11-09 20:57:58', '2020-11-09 20:59:33'),
(18, 13, 'Polo Shirt', 'Polo Shirt', '554', 'blue', 'xl', '100', '220.00', '350.00', '320.00', '350.00', '0.00', 'global product', '50.00', '100.00', NULL, '35000.00', NULL, NULL, NULL, 1, '2020-11-09 21:01:38', '2020-11-09 21:02:38'),
(19, 14, 'Adidas R1', 'Adidas R1', '14521', 'white', 'm', '50', '800.00', '1200.00', '1100.00', '1200.00', '144.00', 'flash sale', '50.00', '100.00', NULL, '60000.00', NULL, NULL, 0, 1, '2020-11-09 21:13:20', '2020-11-13 18:18:18'),
(20, 14, 'Adidas Kry', 'Adidas Kry', '215', 'black', 'xll', '25', '1500.00', '1400.00', '1300.00', NULL, NULL, NULL, NULL, NULL, NULL, '35000.00', NULL, NULL, NULL, 1, '2020-11-09 21:14:07', '2020-11-09 21:14:07'),
(21, 15, 'Nike Red', 'Nike Red', '145', 'red', 'xm', '46', '180.00', '280.00', '250.00', NULL, '5.60', 'own mall', '50.00', '100.00', NULL, '14000.00', NULL, NULL, NULL, 1, '2020-11-09 21:18:40', '2020-11-11 11:54:26'),
(22, 15, 'Nike Gray', 'Nike Gray', '445', 'Gra', 'xl', '50', '300.00', '500.00', '450.00', '500.00', '0.00', 'upcoming product', NULL, NULL, NULL, '25000.00', NULL, NULL, NULL, 1, '2020-11-09 21:23:01', '2020-11-09 21:24:11'),
(23, 15, 'Nike R1', 'Nike R1', '454', 'color', 'xm', '50', '700.00', '1100.00', '1000.00', '1100.00', '0.00', 'just for you', '50.00', '100.00', NULL, '55000.00', NULL, NULL, NULL, 1, '2020-11-09 21:25:41', '2020-11-09 21:44:53'),
(24, 16, 'Colourful Tshart', 'Colourful Tshart', '125', 'white', 'xll', '48', '200.00', '350.00', '300.00', '332.50', '7.00', 'own mall', '50.00', '100.00', NULL, '17500.00', NULL, NULL, NULL, 1, '2020-11-09 21:40:02', '2020-11-12 08:04:55'),
(25, 16, 'Pubg Tshart', 'Pubg Tshart', '545', 'white', 'xll', '50', '150.00', '300.00', '250.00', '285.00', '6.00', 'own mall', '50.00', '100.00', NULL, '15000.00', NULL, NULL, NULL, 1, '2020-11-09 21:43:21', '2020-11-09 21:48:37'),
(26, 16, 'Pubg Black', 'Pubg Black', '54', 'black', 'xll', '50', '150.00', '300.00', '250.00', '300.00', '0.00', 'just for you', '50.00', '100.00', NULL, '15000.00', NULL, NULL, NULL, 1, '2020-11-09 21:57:19', '2020-11-09 21:58:15'),
(27, 16, 'Modern tshart', 'Modern tshart', '569', 'white', 'xll', '50', '150.00', '300.00', '250.00', '300.00', '0.00', 'upcoming product', NULL, NULL, NULL, '15000.00', NULL, NULL, NULL, 1, '2020-11-09 22:00:34', '2020-11-09 22:01:35'),
(28, 17, 'Nescafe 3 in 1', 'Nescafe 3 in 1', '256', 'black', 'xm', '100', '200.00', '300.00', '250.00', '300.00', '0.00', 'flash sale', NULL, NULL, NULL, '30000.00', NULL, '1605049682000', 0, 1, '2020-11-09 22:10:21', '2020-11-09 23:08:11'),
(29, 17, 'Nescafe 500 mg', 'Nescafe 500 mg', '54', 'black', 'xll', '50', '100.00', '200.00', '150.00', '200.00', '0.00', 'own mall', NULL, NULL, NULL, '10000.00', NULL, NULL, NULL, 1, '2020-11-09 22:11:32', '2020-11-09 22:12:01'),
(30, 17, 'Beru Instant', 'Beru Instant', '210', 'white', 'xll', '100', '150.00', '300.00', '250.00', '300.00', '0.00', 'upcoming product', NULL, NULL, NULL, '30000.00', NULL, NULL, NULL, 1, '2020-11-09 22:13:22', '2020-11-09 22:13:44'),
(31, 17, 'Moven pick', 'Moven pick', '2455', 'black', 'xll', '50', '150.00', '300.00', '250.00', '300.00', '0.00', 'just for you', NULL, NULL, NULL, '15000.00', NULL, NULL, NULL, 1, '2020-11-09 22:15:19', '2020-11-09 22:16:10'),
(32, 17, 'Nescafe stick', 'Nescafe stick', '147', 'black', 'xll', '100', '5.00', '20.00', '15.00', '20.00', '0.00', 'global product', NULL, NULL, NULL, '2000.00', NULL, NULL, NULL, 1, '2020-11-09 22:17:24', '2020-11-09 22:17:47'),
(33, 18, 'Body Massage Oil', 'Body Massage Oil', '14752', 'Golden', 'xll', '50', '100.00', '300.00', '250.00', '-600.00', '0.00', 'flash sale', NULL, NULL, NULL, '15000.00', NULL, NULL, 0, 1, '2020-11-09 22:31:19', '2020-11-13 18:18:37'),
(34, 19, 'Head & Sholder', 'Head & Sholder', '0012', 'white', 'xll', '100', '100.00', '200.00', '150.00', '200.00', '0.00', 'upcoming product', NULL, NULL, NULL, '20000.00', NULL, NULL, NULL, 1, '2020-11-09 22:34:27', '2020-11-09 22:34:48'),
(35, 19, 'CLEAR MEN', 'CLEAR MEN', 'A14', 'white', 'xll', '100', '200.00', '300.00', '250.00', '300.00', '0.00', 'just for you', NULL, NULL, NULL, '30000.00', NULL, NULL, NULL, 1, '2020-11-09 22:35:33', '2020-11-09 22:35:51'),
(36, 19, 'Dove Shampo', 'Dove Shampo', 'D123', 'white', 'xll', '100', '200.00', '300.00', '250.00', '300.00', '0.00', 'own mall', NULL, NULL, NULL, '30000.00', NULL, NULL, NULL, 1, '2020-11-09 22:36:44', '2020-11-09 22:37:01'),
(37, 16, 'Color Tshart', 'Color Tshart', 'a145', 'white', 'xll', '50', '200.00', '350.00', '300.00', '350.00', '0.00', 'global product', NULL, NULL, NULL, '17500.00', NULL, NULL, NULL, 1, '2020-11-09 22:49:16', '2020-11-09 22:56:19'),
(38, 20, 'Kappa Trends', 'Kappa Trends', '14', 'white', 'xm', '100', '50.00', '200.00', '150.00', '200.00', '0.00', 'flash sale', NULL, NULL, NULL, '20000.00', NULL, '1605049682000', 0, 1, '2020-11-09 22:54:30', '2020-11-09 23:08:11'),
(39, 21, 'TOSHIBA LED TV 40 Inch', 'TOSHIBA LED TV 40 Inch', '1439', 'blue', 'xll', '50', '200.00', '500.00', '400.00', '-2000.00', '0.00', 'own mall', NULL, NULL, NULL, '25000.00', NULL, NULL, NULL, 1, '2020-11-09 23:03:26', '2020-11-09 23:04:19'),
(40, 21, 'LG Full HD Led', 'LG Full HD Led', '14', 'color', 'xll', '50', '100.00', '300.00', '250.00', '300.00', '0.00', 'flash sale', NULL, NULL, NULL, '15000.00', NULL, '1605049682000', 0, 1, '2020-11-09 23:06:59', '2020-11-09 23:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_avatars`
--

CREATE TABLE `product_avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `front` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_avatars`
--

INSERT INTO `product_avatars` (`id`, `product_id`, `front`, `back`, `left`, `right`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1610883627.webp', '1369217212.jpg', '1807298788.jpg', '1742327610.jpg', '1610883627.webp', 1, '2020-11-07 20:29:57', '2020-11-09 21:52:46'),
(2, 2, '1354694551.jpg', '1005621400.jpg', '1802791523.jpg', '900235542.jpg', '1354694551.jpg', 1, '2020-11-07 20:41:12', '2020-11-07 20:41:12'),
(3, 3, '842634940.webp', '', '', '', '842634940.webp', 1, '2020-11-08 05:38:59', '2020-11-09 21:51:15'),
(4, 10, '1934754514.jpg', '', '', '', '1934754514.jpg', 1, '2020-11-08 07:03:10', '2020-11-09 08:01:50'),
(5, 11, '263061475.png', '', '', '', '263061475.png', 1, '2020-11-08 07:03:49', '2020-11-08 07:03:49'),
(6, 9, '159939239.jpg', '642790845.jpg', '140062762.jpg', '1133142969.webp', '159939239.jpg', 1, '2020-11-08 07:04:38', '2020-11-08 20:21:17'),
(7, 5, '1824364994.jpg', '', '', '', '1824364994.jpg', 1, '2020-11-08 07:05:21', '2020-11-08 07:05:21'),
(8, 7, '1017770901.jpg', '', '', '', '1017770901.jpg', 1, '2020-11-08 07:06:01', '2020-11-08 07:06:01'),
(9, 8, '343034758.jpg', '', '', '', '343034758.jpg', 1, '2020-11-08 07:06:31', '2020-11-08 07:06:31'),
(10, 6, '1253125940.jpeg', '', '', '', '1253125940.jpeg', 1, '2020-11-08 07:07:03', '2020-11-08 07:07:03'),
(11, 4, '2089931585.png', '', '', '', '2089931585.png', 1, '2020-11-08 07:07:44', '2020-11-09 21:55:02'),
(12, 12, '1139454034.jpg', '71889431.jpg', '1614465197.webp', '139481375.jpg', '1139454034.jpg', 1, '2020-11-09 19:00:48', '2020-11-09 19:00:48'),
(13, 13, '1039381511.jpg', '1977905876.jpg', '1528115499.jpg', '2129387072.jpg', '1039381511.jpg', 1, '2020-11-09 20:17:51', '2020-11-09 20:17:51'),
(14, 14, '99739098.jpg', '1619937761.jpg', '489678558.jpg', '922076141.jpg', '99739098.jpg', 1, '2020-11-09 20:45:10', '2020-11-09 20:45:10'),
(15, 15, '1413257423.jpg', '2021046561.jpg', '1845230079.jpg', '', '1413257423.jpg', 1, '2020-11-09 20:49:29', '2020-11-09 20:49:29'),
(16, 16, '1666328945.jpg', '641629848.jpg', '', '', '1666328945.jpg', 1, '2020-11-09 21:00:10', '2020-11-09 21:00:10'),
(17, 17, '1338629793.webp', '544783154.jpg', '1290901013.jpg', '1436892294.jpg', '1338629793.webp', 1, '2020-11-09 21:00:40', '2020-11-09 21:00:40'),
(18, 18, '1684936114.jpg', '310739102.jpg', '157672133.jpg', '2006993902.webp', '1684936114.jpg', 1, '2020-11-09 21:02:09', '2020-11-09 21:02:09'),
(19, 19, '1391994295.jpg', '1950609968.jpg', '432503171.jpg', '1643030838.jpg', '1391994295.jpg', 1, '2020-11-09 21:14:43', '2020-11-09 21:14:43'),
(20, 20, '2102709474.jpg', '32563085.jpg', '2007506386.jpg', '1213175031.webp', '2102709474.jpg', 1, '2020-11-09 21:15:19', '2020-11-09 21:15:19'),
(21, 21, '324810423.jpg', '962978701.jpg', '1910132154.jpg', '848942846.jpg', '324810423.jpg', 1, '2020-11-09 21:19:09', '2020-11-09 21:19:09'),
(22, 22, '1052405610.jpg', '496680573.jpg', '194838443.jpg', '370067157.jpg', '1052405610.jpg', 1, '2020-11-09 21:23:49', '2020-11-09 21:23:49'),
(23, 24, '1028112486.jpg', '944420637.jpg', '1431238866.jpg', '440413068.jpg', '1028112486.jpg', 1, '2020-11-09 21:41:09', '2020-11-09 21:41:09'),
(24, 23, '1313181563.jpg', '1612386107.jpg', '1909545502.jpg', '1195782879.jpg', '1313181563.jpg', 1, '2020-11-09 21:44:14', '2020-11-09 21:44:14'),
(25, 25, '53548193.jpg', '989216465.jpg', '1493154041.jpg', '857538843.jpg', '53548193.jpg', 1, '2020-11-09 21:48:10', '2020-11-09 21:48:10'),
(26, 27, '533167357.jpg', '978988367.jpg', '972501321.jpg', '62750897.jpg', '533167357.jpg', 1, '2020-11-09 22:04:09', '2020-11-09 22:04:09'),
(27, 26, '1236991152.jpg', '793357484.jpg', '593309155.jpg', '2070681188.jpg', '1236991152.jpg', 1, '2020-11-09 22:05:55', '2020-11-09 22:05:55'),
(28, 30, '315167081.jpg', '298113674.webp', '189656009.jpg', '1079414848.jpg', '315167081.jpg', 1, '2020-11-09 22:18:28', '2020-11-09 22:18:28'),
(29, 31, '929912868.jpg', '469918351.jpg', '1120280991.jpg', '286263267.jpg', '929912868.jpg', 1, '2020-11-09 22:19:45', '2020-11-09 22:19:45'),
(30, 28, '2004303905.webp', '335182931.jpg', '949342136.jpg', '1259540343.webp', '2004303905.webp', 1, '2020-11-09 22:20:45', '2020-11-09 22:20:45'),
(31, 29, '1011668126.jpg', '126447089.webp', '1828420613.jpg', '640550621.jpg', '1011668126.jpg', 1, '2020-11-09 22:21:22', '2020-11-09 22:21:22'),
(32, 32, '1066601672.jpg', '1918805122.jpg', '246646375.jpg', '1046759963.jpg', '1066601672.jpg', 1, '2020-11-09 22:21:57', '2020-11-09 22:21:57'),
(33, 33, '811369985.jpg', '2081293610.jpg', '1419824478.jpg', '985109399.jpg', '811369985.jpg', 1, '2020-11-09 22:38:36', '2020-11-09 22:38:36'),
(35, 36, '464284391.jpg', '1800791783.jpg', '665075460.jpg', '2015159724.jpg', '464284391.jpg', 1, '2020-11-09 22:41:27', '2020-11-09 22:41:27'),
(36, 34, '472398117.jpg', '1324887581.jpg', '1043325041.jpg', '746288443.jpg', '472398117.jpg', 1, '2020-11-09 22:42:05', '2020-11-09 22:42:05'),
(37, 35, '1897334946.jpg', '1395943242.jpg', '562803251.jpg', '145709503.jpg', '1897334946.jpg', 1, '2020-11-09 22:45:26', '2020-11-09 22:45:26'),
(38, 37, '1812806970.jpg', '2001194461.jpg', '850850333.webp', '', '1812806970.jpg', 1, '2020-11-09 22:57:00', '2020-11-09 22:57:00'),
(39, 38, '1003789970.jpg', '1054895304.jpg', '', '', '1003789970.jpg', 1, '2020-11-09 22:57:29', '2020-11-09 22:57:29'),
(40, 39, '1398393316.webp', '591824224.jpg', '476569276.webp', '2067178695.webp', '1398393316.webp', 1, '2020-11-09 23:05:38', '2020-11-09 23:05:38'),
(41, 40, '1447575221.jpg', '2091396042.jpg', '', '', '1447575221.jpg', 1, '2020-11-09 23:07:34', '2020-11-09 23:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `single_vendors`
--

CREATE TABLE `single_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `single_vendors`
--

INSERT INTO `single_vendors` (`id`, `user_id`, `vendor_id`, `brand_name`, `cat_name`, `banar`, `logo`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'SAMSUNG', NULL, '1995326787.png', '', 'sdfdsfsdfsdfdsf', 0, '2020-11-11 04:48:14', '2020-11-11 04:48:14'),
(2, 1, 3, 'Mac Book', NULL, '1603182156.jpg', '1614865696.jpg', 'sfsdfsdfsdfdsf', 0, '2020-11-11 05:20:29', '2020-11-11 05:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_child_categories`
--

CREATE TABLE `sub_child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `child_category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_child_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_child_categories`
--

INSERT INTO `sub_child_categories` (`id`, `category_id`, `child_category_id`, `sub_child_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Huawei Phone', 1, '2020-11-07 18:43:16', '2020-11-07 18:43:16'),
(2, 1, 2, 'Samsung', 1, '2020-11-07 18:44:02', '2020-11-07 18:44:02'),
(3, 1, 2, 'Realme', 1, '2020-11-07 18:46:13', '2020-11-07 18:46:13'),
(4, 1, 2, 'Xiaomi', 1, '2020-11-07 18:47:13', '2020-11-07 18:47:13'),
(5, 1, 2, 'Nokia', 1, '2020-11-07 18:47:37', '2020-11-07 18:47:37'),
(6, 1, 2, 'Oppo', 1, '2020-11-07 18:47:47', '2020-11-07 18:47:47'),
(7, 1, 2, 'Vivo', 1, '2020-11-07 18:48:09', '2020-11-07 18:48:09'),
(8, 1, 2, 'iPhone', 1, '2020-11-07 18:48:28', '2020-11-07 18:48:28'),
(9, 1, 6, 'DSLR', 1, '2020-11-07 18:50:22', '2020-11-07 18:50:22'),
(10, 1, 6, 'Bridge', 1, '2020-11-07 18:51:13', '2020-11-07 18:51:13'),
(11, 1, 6, 'Car Camera', 1, '2020-11-07 18:51:32', '2020-11-07 18:51:32'),
(12, 1, 6, 'Action / Video Camera', 1, '2020-11-07 18:52:08', '2020-11-07 18:52:08'),
(13, 1, 5, 'Laptop & Notebooks', 1, '2020-11-07 18:56:10', '2020-11-07 18:56:10'),
(14, 1, 5, 'Gaming Laptops', 1, '2020-11-07 18:56:59', '2020-11-07 18:56:59'),
(15, 1, 5, 'MacBook', 1, '2020-11-07 19:16:05', '2020-11-07 19:16:05'),
(16, 1, 4, 'Whirlpool', 1, '2020-11-07 19:17:18', '2020-11-07 19:17:18'),
(17, 1, 4, 'LG (Korea)', 1, '2020-11-07 19:18:16', '2020-11-07 19:18:16'),
(18, 1, 4, 'Electrolux (Sweden)', 1, '2020-11-07 19:18:44', '2020-11-07 19:18:44'),
(19, 1, 4, 'Samsung (Korea)', 1, '2020-11-07 19:20:17', '2020-11-07 19:20:17'),
(20, 1, 3, 'LG', 1, '2020-11-07 19:30:32', '2020-11-07 19:30:32'),
(21, 1, 3, 'LG.', 1, '2020-11-07 19:32:10', '2020-11-07 19:32:10'),
(22, 1, 3, 'Samsung.', 1, '2020-11-07 19:33:15', '2020-11-07 19:33:15'),
(23, 1, 3, 'Maytag', 1, '2020-11-07 19:38:55', '2020-11-07 19:38:55'),
(24, 1, 3, 'Hitachi', 1, '2020-11-07 19:39:09', '2020-11-07 19:39:09'),
(25, 2, 8, 'Headphones & Headset', 1, '2020-11-08 19:48:13', '2020-11-08 19:48:13'),
(26, 2, 8, 'Home Entertainment', 1, '2020-11-08 19:48:42', '2020-11-08 19:48:42'),
(27, 2, 8, 'Bluetooth Speaker', 1, '2020-11-08 19:49:14', '2020-11-08 19:49:14'),
(28, 2, 9, 'Printers', 1, '2020-11-08 19:50:18', '2020-11-08 19:50:25'),
(29, 2, 9, 'Ink & Toners', 1, '2020-11-08 19:51:08', '2020-11-08 19:51:08'),
(30, 2, 9, 'Printer Stands', 1, '2020-11-08 19:51:25', '2020-11-08 19:51:25'),
(31, 2, 10, 'PC Game', 1, '2020-11-08 20:12:38', '2020-11-08 20:12:38'),
(32, 2, 10, 'Security Software', 1, '2020-11-08 20:13:55', '2020-11-08 20:13:55'),
(33, 2, 10, 'Operating System', 1, '2020-11-08 20:14:19', '2020-11-08 20:14:19'),
(34, 3, 15, 'Smart Television', 1, '2020-11-08 20:32:54', '2020-11-08 20:32:54'),
(35, 3, 15, 'LED Television', 1, '2020-11-08 20:33:38', '2020-11-08 20:33:38'),
(36, 3, 15, 'Other Television', 1, '2020-11-08 20:34:25', '2020-11-08 20:34:25'),
(37, 3, 15, 'OLED Television', 1, '2020-11-08 20:34:59', '2020-11-08 20:34:59'),
(38, 3, 16, 'Soundbars', 1, '2020-11-08 20:36:13', '2020-11-08 20:36:13'),
(39, 3, 16, 'Portable Players', 1, '2020-11-08 20:37:05', '2020-11-08 20:37:05'),
(40, 3, 18, 'Fryer', 1, '2020-11-08 20:39:11', '2020-11-08 20:39:11'),
(41, 3, 18, 'Coffee Machin', 1, '2020-11-08 20:39:44', '2020-11-08 20:39:44'),
(42, 3, 18, 'Toaster', 1, '2020-11-08 20:40:15', '2020-11-08 20:40:15'),
(43, 4, 22, 'Body & Message oil', 1, '2020-11-09 18:16:43', '2020-11-09 18:16:43'),
(44, 4, 22, 'Foot Care', 1, '2020-11-09 19:16:40', '2020-11-09 19:16:40'),
(45, 4, 22, 'Hand Care', 1, '2020-11-09 19:17:30', '2020-11-09 19:17:30'),
(46, 4, 22, 'Sun-care For Body', 1, '2020-11-09 19:18:14', '2020-11-09 19:18:14'),
(47, 4, 23, 'Hair Dryer', 1, '2020-11-09 19:19:40', '2020-11-09 19:19:40'),
(48, 4, 23, 'Shampoo', 1, '2020-11-09 19:28:41', '2020-11-09 19:28:41'),
(49, 4, 23, 'Hear Coloring', 1, '2020-11-09 19:30:40', '2020-11-09 19:30:40'),
(50, 7, 42, 'Bathroom & Scales', 1, '2020-11-09 19:36:59', '2020-11-09 19:36:59'),
(51, 7, 43, 'Mattress Pad', 1, '2020-11-09 19:39:32', '2020-11-09 19:39:32'),
(52, 7, 43, 'Towel Rails & Warmers', 1, '2020-11-09 19:43:18', '2020-11-09 19:43:18'),
(53, 7, 45, 'Bedroom', 1, '2020-11-09 19:45:45', '2020-11-09 19:45:45'),
(54, 7, 45, 'Living', 1, '2020-11-09 19:46:04', '2020-11-09 19:46:04'),
(55, 7, 45, 'Home Office', 1, '2020-11-09 19:46:26', '2020-11-09 19:46:26'),
(56, 7, 44, 'Cooks', 1, '2020-11-09 19:48:20', '2020-11-09 19:48:20'),
(57, 7, 44, 'Candles & Candles Holders', 1, '2020-11-09 19:48:56', '2020-11-09 19:48:56'),
(58, 7, 46, 'Coffee & Tea', 1, '2020-11-09 19:49:47', '2020-11-09 19:49:47'),
(59, 7, 46, 'cookware', 1, '2020-11-09 19:50:13', '2020-11-09 19:50:13'),
(60, 7, 46, 'Diner Ware', 1, '2020-11-09 19:50:40', '2020-11-09 19:50:40'),
(61, 9, 52, 'Polo', 1, '2020-11-09 20:03:36', '2020-11-09 20:03:36'),
(62, 9, 52, 'Easy', 1, '2020-11-09 20:04:19', '2020-11-09 20:04:19'),
(63, 9, 52, 'Kappa', 1, '2020-11-09 20:04:39', '2020-11-09 20:04:39'),
(64, 9, 52, 'Crocodile', 1, '2020-11-09 20:04:56', '2020-11-09 20:04:56'),
(65, 9, 53, 'Casual', 1, '2020-11-09 20:06:02', '2020-11-09 20:06:02'),
(66, 9, 53, 'Formal', 1, '2020-11-09 20:06:16', '2020-11-09 20:06:16'),
(67, 9, 53, 'Rich Man', 1, '2020-11-09 20:06:38', '2020-11-09 20:06:38'),
(68, 9, 53, 'Catseye', 1, '2020-11-09 20:06:54', '2020-11-09 20:06:54'),
(69, 9, 56, 'Bata', 1, '2020-11-09 20:07:20', '2020-11-09 20:07:20'),
(70, 9, 56, 'Apex', 1, '2020-11-09 20:07:33', '2020-11-09 20:07:33'),
(71, 9, 56, 'Lotto', 1, '2020-11-09 20:07:51', '2020-11-09 20:07:51'),
(72, 9, 56, 'Adidas', 1, '2020-11-09 20:08:11', '2020-11-09 20:08:11'),
(73, 9, 58, 'levies', 1, '2020-11-09 20:08:40', '2020-11-09 20:08:40'),
(74, 9, 58, 'Diesel', 1, '2020-11-09 20:10:12', '2020-11-09 20:10:12'),
(75, 9, 58, 'H & M', 1, '2020-11-09 20:10:50', '2020-11-09 20:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_money` decimal(8,2) NOT NULL DEFAULT 0.00,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phn`, `address`, `avatar`, `e_money`, `role`, `status`, `verification_token`, `verified`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234567890', 'dhaka', NULL, '0.00', 'super_admin', 0, '', 1, NULL, '$2y$10$WpbIdDluTU3lHsmqX.R0QuE6Ej4oLVPBXq5WY1BRUUoQTcWup44u.', NULL, '2020-11-07 12:43:04', '2020-11-12 08:06:04'),
(2, 'test', 'test@test.com', '1234567890', 'dhaka', NULL, '0.00', 'user', 0, 'RZPypiE8PERhAz1wEdJrTqJO4J3UzEyC', 0, NULL, '$2y$10$a.68Wx/z07txHUdDhoOdKe7nXQFNImBZwOU2gFwo8pVoJztQSOAUS', NULL, '2020-11-09 05:03:05', '2020-11-09 05:03:05'),
(3, 'vendor', 'vendor@gmail.com', '1234567890', 'dhaka', NULL, '0.00', 'vendor', 0, '', 1, NULL, '$2y$10$BxvM5gilgafUTu24Ia8NJO4oIf8hKgjuEO0Ln3DGYsj5h5ZDy0vpO', NULL, '2020-11-09 05:06:49', '2020-11-09 05:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `multi_vendor` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `user_id`, `brand_name`, `logo`, `slug`, `status`, `multi_vendor`, `created_at`, `updated_at`) VALUES
(2, 1, 'SAMSUNG', '1602173855.png', 'SAMSUNG', 1, 0, '2020-11-10 11:27:59', '2020-11-10 11:29:03'),
(3, 1, 'Apple', '43498465.jpg', 'Apple', 1, 1, '2020-11-11 05:18:32', '2020-11-11 05:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_products`
--

CREATE TABLE `vendor_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `single_vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pur_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `promo_price` decimal(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `admin_percent` decimal(8,2) DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indoor_charge` decimal(8,2) DEFAULT NULL,
  `outdoor_charge` decimal(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` decimal(8,2) DEFAULT NULL,
  `shipp_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_products`
--

INSERT INTO `vendor_products` (`id`, `single_vendor_id`, `vendor_id`, `product_name`, `slug`, `product_code`, `color`, `size`, `qty`, `pur_price`, `sale_price`, `promo_price`, `discount`, `admin_percent`, `position`, `indoor_charge`, `outdoor_charge`, `description`, `total_price`, `shipp_des`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 'samsung young', 'samsung-young', '3520', 'white', 'm', '7', '220.00', '1200.00', '1300.00', '1164.00', '6.00', 'vendor', '80.00', '100.00', 'dfgfdgfdgfdg', '13200.00', NULL, 1, '2020-11-11 05:34:57', '2020-11-11 10:44:41'),
(2, NULL, 2, 'samsung a51', 'samsung a51', '4fgfdf', 'white', 'm', '11', '1200.00', '1400.00', '1500.00', NULL, NULL, 'vendor', NULL, NULL, 'sdfgdsfgdfsg', '16800.00', NULL, 1, '2020-11-11 06:05:48', '2020-11-12 08:06:04'),
(3, 2, 3, 'Mac Pro book', 'Mac Pro book', '3520', 'black', 'small', '10', '12000.00', '13000.00', '14000.00', NULL, NULL, 'vendor', NULL, NULL, 'gbnggfdgdfdsrfrd', '143000.00', NULL, 1, '2020-11-11 07:51:15', '2020-11-11 11:54:26'),
(4, 2, 3, 'Mac 2020 edition', 'Mac 2020 edition', '2345', 'yellow', '15\"', '11', '13000.00', '1500.00', '1600.00', NULL, NULL, 'vendor', NULL, NULL, 'dfgdfgdfgdf', '16500.00', NULL, 1, '2020-11-11 07:53:11', '2020-11-11 07:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_avatars`
--

CREATE TABLE `vendor_product_avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `front` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_product_avatars`
--

INSERT INTO `vendor_product_avatars` (`id`, `vendor_product_id`, `front`, `back`, `left`, `right`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1421535827.webp', '', '', '', '1421535827.webp', 1, '2020-11-11 05:35:28', '2020-11-11 05:35:28'),
(2, 2, '781354611.jpeg', '', '', '', '781354611.jpeg', 1, '2020-11-11 06:06:09', '2020-11-11 06:06:09'),
(3, 3, '2041429025.jpg', '', '', '', '2041429025.jpg', 1, '2020-11-11 07:52:00', '2020-11-11 07:52:00'),
(4, 4, '1337045013.jpg', '', '', '', '1337045013.jpg', 1, '2020-11-11 07:53:36', '2020-11-11 07:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_managers`
--
ALTER TABLE `ad_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banars`
--
ALTER TABLE `banars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_category_id_foreign` (`category_id`),
  ADD KEY `brands_child_category_id_foreign` (`child_category_id`),
  ADD KEY `brands_sub_child_category_id_foreign` (`sub_child_category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_vendor_product_id_foreign` (`vendor_product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_vendor_product_id_foreign` (`vendor_product_id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_avatars`
--
ALTER TABLE `product_avatars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_avatars_product_id_foreign` (`product_id`);

--
-- Indexes for table `single_vendors`
--
ALTER TABLE `single_vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `single_vendors_user_id_foreign` (`user_id`),
  ADD KEY `single_vendors_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `sub_child_categories`
--
ALTER TABLE `sub_child_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_child_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_child_categories_child_category_id_foreign` (`child_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_user_id_foreign` (`user_id`);

--
-- Indexes for table `vendor_products`
--
ALTER TABLE `vendor_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_products_single_vendor_id_foreign` (`single_vendor_id`),
  ADD KEY `vendor_products_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `vendor_product_avatars`
--
ALTER TABLE `vendor_product_avatars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_product_avatars_vendor_product_id_foreign` (`vendor_product_id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_lists_product_id_foreign` (`product_id`),
  ADD KEY `wish_lists_vendor_product_id_foreign` (`vendor_product_id`),
  ADD KEY `wish_lists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_managers`
--
ALTER TABLE `ad_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banars`
--
ALTER TABLE `banars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_avatars`
--
ALTER TABLE `product_avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `single_vendors`
--
ALTER TABLE `single_vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_child_categories`
--
ALTER TABLE `sub_child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_products`
--
ALTER TABLE `vendor_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_product_avatars`
--
ALTER TABLE `vendor_product_avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `brands_child_category_id_foreign` FOREIGN KEY (`child_category_id`) REFERENCES `child_categories` (`id`),
  ADD CONSTRAINT `brands_sub_child_category_id_foreign` FOREIGN KEY (`sub_child_category_id`) REFERENCES `sub_child_categories` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_vendor_product_id_foreign` FOREIGN KEY (`vendor_product_id`) REFERENCES `vendor_products` (`id`);

--
-- Constraints for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD CONSTRAINT `child_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_details_vendor_product_id_foreign` FOREIGN KEY (`vendor_product_id`) REFERENCES `vendor_products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `product_avatars`
--
ALTER TABLE `product_avatars`
  ADD CONSTRAINT `product_avatars_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `single_vendors`
--
ALTER TABLE `single_vendors`
  ADD CONSTRAINT `single_vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `single_vendors_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `sub_child_categories`
--
ALTER TABLE `sub_child_categories`
  ADD CONSTRAINT `sub_child_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `sub_child_categories_child_category_id_foreign` FOREIGN KEY (`child_category_id`) REFERENCES `child_categories` (`id`);

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vendor_products`
--
ALTER TABLE `vendor_products`
  ADD CONSTRAINT `vendor_products_single_vendor_id_foreign` FOREIGN KEY (`single_vendor_id`) REFERENCES `single_vendors` (`id`),
  ADD CONSTRAINT `vendor_products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `vendor_product_avatars`
--
ALTER TABLE `vendor_product_avatars`
  ADD CONSTRAINT `vendor_product_avatars_vendor_product_id_foreign` FOREIGN KEY (`vendor_product_id`) REFERENCES `vendor_products` (`id`);

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wish_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wish_lists_vendor_product_id_foreign` FOREIGN KEY (`vendor_product_id`) REFERENCES `vendor_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
