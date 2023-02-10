-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2023 at 01:41 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */; 
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel9ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `category_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mi', 1, 'mi', 1, '2022-08-09 02:09:15', '2022-08-09 02:09:15'),
(2, 'Motorola', 1, 'motorola', 1, '2022-08-09 02:09:39', '2022-08-09 02:09:39'),
(3, 'Nokia', 1, 'nokia', 1, '2022-08-09 02:09:59', '2022-08-09 02:09:59'),
(4, 'Samsung', 1, 'samsung', 1, '2022-08-09 02:10:15', '2022-08-09 02:10:15'),
(5, 'Vivo', 1, 'vivo', 1, '2022-08-09 02:10:37', '2022-08-09 02:10:37'),
(6, 'Asus', 2, 'asus', 1, '2022-08-09 02:13:05', '2022-08-09 02:13:05'),
(7, 'Lenovo', 2, 'lenovo', 1, '2022-08-09 02:13:28', '2022-08-09 02:13:28'),
(8, 'Hp', 2, 'hp', 1, '2022-08-09 02:13:44', '2022-08-09 02:13:44'),
(9, 'Dell', 2, 'dell', 1, '2022-08-09 02:14:06', '2022-08-09 02:14:06'),
(10, 'Acer', 2, 'acer', 1, '2022-08-09 02:14:46', '2022-08-09 02:14:51'),
(11, 'Titan', 3, 'titan', 1, '2022-08-09 02:39:16', '2022-08-09 02:39:16'),
(12, 'Sonata', 3, 'sonata', 1, '2022-08-09 02:39:32', '2022-08-09 02:39:32'),
(13, 'Fastrack', 3, 'fastrack', 1, '2022-08-09 02:39:50', '2022-08-09 02:39:50'),
(14, 'Adidas', 4, 'adidas', 1, '2022-08-09 02:40:34', '2022-08-09 02:40:34'),
(15, 'Puma', 4, 'puma', 1, '2022-08-09 02:40:48', '2022-08-09 02:40:48'),
(16, 'US POLO', 4, 'us-polo', 1, '2022-08-09 02:41:42', '2022-08-09 02:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=Hidden,1=Visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 'mobile', 'Mobile Description', 'uploads/category/1660033156.jpg', 'Mobiles', 'Mobile', 'Mobile', 1, '2022-08-09 01:51:51', '2022-08-09 02:49:16'),
(2, 'Laptops', 'laptops', 'Laptops Description', 'uploads/category/1660033113.jpg', 'Laptops', 'Laptops', 'Laptops', 1, '2022-08-09 01:52:35', '2022-08-09 02:48:33'),
(3, 'Watch', 'watch', 'Watch Description', 'uploads/category/1660033079.jpg', 'Watch', 'Watch', 'Watch', 1, '2022-08-09 01:53:52', '2022-08-09 02:47:59'),
(4, 'Fashion', 'fashion', 'Fashion Description', 'uploads/category/1660033034.jpg', 'Fashion', 'Fashion', 'Fashion', 1, '2022-08-09 01:54:44', '2022-08-09 02:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'Red', 1, '2022-08-09 02:34:03', '2022-08-09 02:34:03'),
(2, 'Green', 'Green', 1, '2022-08-09 02:34:18', '2022-08-09 02:34:18'),
(3, 'Black', 'Black', 1, '2022-08-09 02:34:35', '2022-08-09 02:34:35'),
(4, 'White', 'White', 1, '2022-08-09 02:34:49', '2022-08-09 02:34:49'),
(5, 'Orange', 'Orange', 1, '2022-08-09 02:35:02', '2022-08-09 02:35:02'),
(6, 'Purple', 'Purple', 1, '2022-08-09 02:35:19', '2022-08-09 02:35:19'),
(7, 'Pink', 'Pink', 1, '2022-08-09 02:35:38', '2022-08-09 02:35:38'),
(8, 'Blue', 'Blue', 1, '2022-08-09 02:36:03', '2022-08-09 02:36:03'),
(9, 'Grey', 'Grey', 1, '2022-08-09 02:36:22', '2022-08-09 02:36:22'),
(10, 'Yellow', 'Yellow', 1, '2022-08-09 02:36:55', '2022-08-09 02:36:55'),
(11, 'Maroon', 'Maroon', 1, '2022-08-09 02:37:45', '2022-08-09 02:37:45');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_02_154327_add_details_to_users_table', 2),
(6, '2022_08_03_005505_create_categories_table', 3),
(7, '2022_08_03_112251_create_brands_table', 4),
(8, '2022_08_03_160136_create_products_table', 5),
(9, '2022_08_03_161840_create_product_images_table', 5),
(11, '2022_08_04_145111_create_colors_table', 6),
(12, '2022_08_05_015817_create_product_colors_table', 7),
(13, '2022_08_05_073326_create_sliders_table', 8),
(14, '2022_08_06_080717_add_category_id_to_brands_table', 9),
(15, '2022_08_06_172543_create_wishlists_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `original_price` int NOT NULL,
  `selling_price` int NOT NULL,
  `quantity` int NOT NULL,
  `trending` tinyint NOT NULL DEFAULT '0' COMMENT '0=Not-Trending,1=Trending',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=\r\nHidden,1=Visible',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Redmi Note 11', 'redmi-note-11', 'Mi', 'Redmi Note 11', 'Redmi Note 11', 16000, 15499, 20, 1, 1, 'Redmi Note 11', 'Redmi Note 11', 'Redmi Note 11', '2022-08-09 02:57:21', '2022-08-09 02:57:21'),
(2, 2, 'Lenovo Yoga 6', 'lenovo-yoga-6', 'Lenovo', 'Lenovo Yoga 6', 'Lenovo Yoga 6', 85999, 82999, 23, 1, 1, 'Lenovo Yoga 6', 'Lenovo Yoga 6', 'Lenovo Yoga 6', '2022-08-09 03:04:41', '2022-08-09 03:04:41'),
(3, 3, 'Titan Neo Collection', 'titan-neo-collection', 'Titan', 'Titan Neo Collection', 'Titan Neo Collection', 8000, 7450, 11, 1, 1, 'Titan Neo Collection', 'Titan Neo Collection', 'Titan Neo Collection', '2022-08-09 03:12:13', '2022-08-09 03:12:13'),
(4, 4, 'Adidas Pant', 'adidas-pant', 'Adidas', 'Adidas Pant', 'Adidas Pant', 4000, 3899, 9, 1, 1, 'Adidas Pant', 'Adidas Pant', 'Adidas Pant', '2022-08-09 04:03:05', '2022-08-09 04:03:05'),
(5, 1, 'Motorola Edge 20', 'motorola-edge-20', 'Motorola', 'Motorola Edge 20', 'Motorola Edge 20', 25000, 23999, 5, 1, 1, 'Motorola Edge 20', 'Motorola Edge 20', 'Motorola Edge 20', '2022-08-09 05:04:54', '2022-08-09 05:04:54'),
(6, 2, 'Hp Envy', 'hp-envy', 'Hp', 'Hp Envy', 'Hp Envy', 36000, 35000, 6, 1, 1, 'Hp Envy', 'Hp Envy', 'Hp Envy', '2022-08-09 05:07:45', '2022-08-09 05:07:45'),
(7, 1, 'Nokia 5.1 Plus', 'nokia-51-plus', 'Nokia', 'Nokia 5.1 Plus', 'Nokia 5.1 Plus', 13000, 10499, 4, 1, 1, 'Nokia 5.1 Plus', 'Nokia 5.1 Plus', 'Nokia 5.1 Plus', '2022-08-09 05:11:43', '2022-08-09 05:11:43'),
(8, 4, 'Shirt', 'shirt', 'Mi', 'Shirt', 'Shirt', 1900, 1357, 14, 1, 1, 'Shirt', 'Shirt', 'Shirt', '2022-08-09 05:15:16', '2022-08-09 05:15:16'),
(9, 3, 'Sonata', 'sonata', 'Mi', 'Sonata', 'Sonata', 5000, 4199, 2, 1, 1, 'Sonata', 'Sonata', 'Sonata', '2022-08-09 05:16:53', '2022-08-09 05:16:53'),
(10, 2, 'Dell Laptop', 'dell-laptop', 'Mi', 'Dell Laptop', 'Dell Laptop', 48000, 45599, 3, 1, 1, 'Dell Laptop', 'Dell Laptop', 'Dell Laptop', '2022-08-09 05:19:06', '2022-08-09 05:19:06'),
(11, 4, 'T-Shirt', 't-shirt', 'US POLO', 'T-Shirt', 'T-Shirt', 900, 400, 12, 1, 1, 'T-Shirt', 'T-Shirt', 'T-Shirt', '2022-08-09 05:20:55', '2022-08-09 05:20:55'),
(12, 3, 'Fastrack', 'fastrack', 'Mi', 'Fastrack', 'Fastrack', 9000, 8500, 3, 1, 1, 'Fastrack', 'Fastrack', 'Fastrack', '2022-08-09 05:40:56', '2022-08-09 05:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2022-08-09 02:57:21', '2022-08-09 02:57:21'),
(2, 1, 4, 14, '2022-08-09 02:57:21', '2022-08-09 02:57:21'),
(3, 1, 6, 6, '2022-08-09 02:57:21', '2022-08-09 02:57:21'),
(4, 1, 9, 10, '2022-08-09 02:57:21', '2022-08-09 02:57:21'),
(5, 2, 3, 13, '2022-08-09 03:04:41', '2022-08-09 03:04:41'),
(6, 2, 4, 6, '2022-08-09 03:04:41', '2022-08-09 03:04:41'),
(7, 2, 5, 5, '2022-08-09 03:04:41', '2022-08-09 03:04:41'),
(8, 2, 6, 8, '2022-08-09 03:04:41', '2022-08-09 03:04:41'),
(9, 2, 10, 6, '2022-08-09 03:04:41', '2022-08-09 03:04:41'),
(10, 3, 3, 4, '2022-08-09 03:12:13', '2022-08-09 03:12:13'),
(11, 3, 4, 6, '2022-08-09 03:12:13', '2022-08-09 03:12:13'),
(12, 3, 9, 8, '2022-08-09 03:12:13', '2022-08-09 03:12:13'),
(13, 4, 2, 6, '2022-08-09 04:03:05', '2022-08-09 04:03:05'),
(14, 4, 3, 6, '2022-08-09 04:03:05', '2022-08-09 04:03:05'),
(15, 4, 4, 2, '2022-08-09 04:03:05', '2022-08-09 04:03:05'),
(16, 4, 8, 8, '2022-08-09 04:03:05', '2022-08-09 04:03:05'),
(17, 5, 2, 4, '2022-08-09 05:04:54', '2022-08-09 05:04:54'),
(18, 5, 3, 5, '2022-08-09 05:04:54', '2022-08-09 05:04:54'),
(19, 6, 3, 4, '2022-08-09 05:07:45', '2022-08-09 05:07:45'),
(20, 7, 1, 4, '2022-08-09 05:11:43', '2022-08-09 05:11:43'),
(21, 7, 2, 2, '2022-08-09 05:11:43', '2022-08-09 05:11:43'),
(22, 7, 9, 7, '2022-08-09 05:11:43', '2022-08-09 05:11:43'),
(23, 7, 11, 5, '2022-08-09 05:11:43', '2022-08-09 05:11:43'),
(24, 8, 3, 5, '2022-08-09 05:15:16', '2022-08-09 05:15:16'),
(25, 8, 7, 2, '2022-08-09 05:15:16', '2022-08-09 05:15:16'),
(26, 8, 11, 1, '2022-08-09 05:15:16', '2022-08-09 05:15:16'),
(27, 9, 2, 1, '2022-08-09 05:16:53', '2022-08-09 05:16:53'),
(28, 9, 3, 2, '2022-08-09 05:16:53', '2022-08-09 05:16:53'),
(29, 9, 8, 1, '2022-08-09 05:16:53', '2022-08-09 05:16:53'),
(30, 10, 1, 1, '2022-08-09 05:19:06', '2022-08-09 05:19:06'),
(31, 10, 3, 1, '2022-08-09 05:19:06', '2022-08-09 05:19:06'),
(32, 10, 4, 1, '2022-08-09 05:19:06', '2022-08-09 05:19:06'),
(33, 10, 9, 1, '2022-08-09 05:19:06', '2022-08-09 05:19:06'),
(34, 11, 1, 1, '2022-08-09 05:20:55', '2022-08-09 05:20:55'),
(35, 11, 4, 1, '2022-08-09 05:20:55', '2022-08-09 05:20:55'),
(36, 11, 5, 1, '2022-08-09 05:20:55', '2022-08-09 05:20:55'),
(37, 12, 3, 2, '2022-08-09 05:40:56', '2022-08-09 05:40:56'),
(38, 12, 4, 2, '2022-08-09 05:40:56', '2022-08-09 05:40:56'),
(39, 12, 10, 5, '2022-08-09 05:40:56', '2022-08-09 05:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/products/16600336411.jpg', '2022-08-09 02:57:21', '2022-08-09 02:57:21'),
(2, 1, 'uploads/products/16600336412.jpg', '2022-08-09 02:57:21', '2022-08-09 02:57:21'),
(3, 1, 'uploads/products/16600336413.jpg', '2022-08-09 02:57:21', '2022-08-09 02:57:21'),
(4, 2, 'uploads/products/16600340811.jpg', '2022-08-09 03:04:41', '2022-08-09 03:04:41'),
(5, 2, 'uploads/products/16600340812.jpg', '2022-08-09 03:04:41', '2022-08-09 03:04:41'),
(6, 2, 'uploads/products/16600340813.jpg', '2022-08-09 03:04:41', '2022-08-09 03:04:41'),
(7, 3, 'uploads/products/16600345331.jpg', '2022-08-09 03:12:13', '2022-08-09 03:12:13'),
(8, 3, 'uploads/products/16600345332.jpg', '2022-08-09 03:12:13', '2022-08-09 03:12:13'),
(9, 3, 'uploads/products/16600345333.jpg', '2022-08-09 03:12:13', '2022-08-09 03:12:13'),
(10, 4, 'uploads/products/16600375851.jpg', '2022-08-09 04:03:05', '2022-08-09 04:03:05'),
(11, 4, 'uploads/products/16600375852.jpg', '2022-08-09 04:03:05', '2022-08-09 04:03:05'),
(12, 4, 'uploads/products/16600375853.jpg', '2022-08-09 04:03:05', '2022-08-09 04:03:05'),
(13, 5, 'uploads/products/16600412941.jpg', '2022-08-09 05:04:54', '2022-08-09 05:04:54'),
(14, 5, 'uploads/products/16600412942.jpg', '2022-08-09 05:04:54', '2022-08-09 05:04:54'),
(15, 5, 'uploads/products/16600412943.jpg', '2022-08-09 05:04:54', '2022-08-09 05:04:54'),
(16, 6, 'uploads/products/16600414651.jpg', '2022-08-09 05:07:45', '2022-08-09 05:07:45'),
(17, 6, 'uploads/products/16600414652.jpg', '2022-08-09 05:07:45', '2022-08-09 05:07:45'),
(18, 6, 'uploads/products/16600414653.jpg', '2022-08-09 05:07:45', '2022-08-09 05:07:45'),
(19, 7, 'uploads/products/16600417031.jpg', '2022-08-09 05:11:43', '2022-08-09 05:11:43'),
(20, 7, 'uploads/products/16600417032.jpg', '2022-08-09 05:11:43', '2022-08-09 05:11:43'),
(21, 7, 'uploads/products/16600417033.jpg', '2022-08-09 05:11:43', '2022-08-09 05:11:43'),
(22, 8, 'uploads/products/16600419161.jpg', '2022-08-09 05:15:16', '2022-08-09 05:15:16'),
(23, 8, 'uploads/products/16600419162.jpg', '2022-08-09 05:15:16', '2022-08-09 05:15:16'),
(24, 8, 'uploads/products/16600419163.jpg', '2022-08-09 05:15:16', '2022-08-09 05:15:16'),
(25, 9, 'uploads/products/16600420131.jpg', '2022-08-09 05:16:53', '2022-08-09 05:16:53'),
(26, 9, 'uploads/products/16600420132.jpg', '2022-08-09 05:16:53', '2022-08-09 05:16:53'),
(27, 9, 'uploads/products/16600420133.jpg', '2022-08-09 05:16:53', '2022-08-09 05:16:53'),
(28, 10, 'uploads/products/16600421461.jpg', '2022-08-09 05:19:06', '2022-08-09 05:19:06'),
(29, 10, 'uploads/products/16600421462.jpg', '2022-08-09 05:19:06', '2022-08-09 05:19:06'),
(30, 10, 'uploads/products/16600421463.jpg', '2022-08-09 05:19:06', '2022-08-09 05:19:06'),
(31, 11, 'uploads/products/16600422551.jpg', '2022-08-09 05:20:55', '2022-08-09 05:20:55'),
(32, 11, 'uploads/products/16600422552.jpg', '2022-08-09 05:20:55', '2022-08-09 05:20:55'),
(33, 11, 'uploads/products/16600422553.jpg', '2022-08-09 05:20:55', '2022-08-09 05:20:55'),
(34, 12, 'uploads/products/16600434561.jpg', '2022-08-09 05:40:56', '2022-08-09 05:40:56'),
(35, 12, 'uploads/products/16600434562.jpg', '2022-08-09 05:40:56', '2022-08-09 05:40:56'),
(36, 12, 'uploads/products/16600434563.jpg', '2022-08-09 05:40:56', '2022-08-09 05:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '1=Visible,0=Hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'First Slider Title', 'First Slider Title Description', 'uploads/slider/1660043878.jpg', 1, '2022-08-09 05:47:58', '2022-08-09 05:47:58'),
(2, 'Second Slider Title', 'Second Slider Description', 'uploads/slider/1660043921.jpg', 1, '2022-08-09 05:48:41', '2022-08-09 05:48:41'),
(3, 'Slider Title three', 'Slider Three Description', 'uploads/slider/1660043974.jpg', 1, '2022-08-09 05:49:34', '2022-08-09 05:49:34');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint NOT NULL DEFAULT '0' COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'Shubham Kumar', 'shubhamkumar78767@gmail.com', NULL, '$2y$10$7IDXzYyjgzuOrFOwv0dygeInJ75FE9S8rpRKfMreDx4GG8CL5aBT.', NULL, '2022-08-02 09:11:13', '2022-08-02 09:11:13', 1),
(2, 'Sushila', 'sushila@gmail.com', NULL, '$2y$10$d6BYge9GyAyV6ad33.8CkOxEjHe73dshh7Ayj623GqSgwEFl.mmne', NULL, '2022-08-02 10:44:51', '2022-08-02 10:44:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
