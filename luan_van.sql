-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2023 lúc 08:49 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `luan_van`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tinh / Thanh pho',
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Quan / Huyen',
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Phuong / Xa',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Dia chi nha',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id`, `user_id`, `city`, `town`, `village`, `address`, `created_at`, `updated_at`) VALUES
(1, 12, 'Can Tho', 'Ninh Kieu', 'Hung Loi', '173/3 Nguyen Van Cu noi dai', '2023-03-28 08:58:52', '2023-03-29 11:19:47'),
(2, 12, 'TPHCm', 'Quan 1', 'APT', '560 Nguyen Trai', '2023-04-01 14:29:26', '2023-04-01 14:29:26'),
(3, 7, 'Can Tho', 'Cai Rang', 'Binh Thuy', '123 duong abc', '2023-04-01 15:43:50', '2023-04-01 15:43:50'),
(4, 10, 'Can Tho', 'Ninh Kieu', 'An Phu', '172/3 duong Nguyen Viet Hong', '2023-04-08 02:44:45', '2023-04-08 02:44:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authority`
--

CREATE TABLE `authority` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pro` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'quyen truy cap san pham',
  `user` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'quyen truy cap user',
  `enter` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'quyen truy cap phieu nhap',
  `order` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'quyen truy cap don hang',
  `brand` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'quyen truy cap thuong hieu',
  `cate` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'quyen truy cap san danh muc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `authority`
--

INSERT INTO `authority` (`id`, `user_id`, `pro`, `user`, `enter`, `order`, `brand`, `cate`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL),
(2, 3, 1, 1, 0, 0, 1, 0, NULL, '2023-03-26 10:51:58'),
(4, 4, 0, 0, 0, 0, 1, 1, NULL, '2023-03-26 10:46:17'),
(5, 5, 1, 0, 1, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `image`, `category`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 'The Personality Trait That Makes People Happier', 'blog-1.jpg', 'TRAVEL', '', NULL, NULL),
(2, 3, 'This was one of our first days in Hawaii last week.', 'blog-2.jpg', 'CodeLeanON', '', NULL, NULL),
(3, 3, 'Last week I had my first work trip of the year to Sonoma Valley', 'blog-3.jpg', 'TRAVEL', '', NULL, NULL),
(4, 3, 'Happppppy New Year! I know I am a little late on this post', 'blog-4.jpg', 'CodeLeanON', '', NULL, NULL),
(5, 3, 'Absolue collection. The Lancome team has been one…', 'blog-5.jpg', 'MODEL', '', NULL, NULL),
(6, 3, 'Writing has always been kind of therapeutic for me', 'blog-6.jpg', 'CodeLeanON', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Calvin Klein', NULL, NULL),
(2, 'Diesel', NULL, NULL),
(3, 'Polo', NULL, NULL),
(4, 'Tommy Hilfiger', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enter_coupon`
--

CREATE TABLE `enter_coupon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `enter_price` double NOT NULL,
  `enter_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `enter_coupon`
--

INSERT INTO `enter_coupon` (`id`, `user_id`, `product_id`, `enter_price`, `enter_qty`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 500, 50, '2023-04-12 05:52:48', NULL),
(2, 2, 3, 20, 15, '2023-04-15 05:00:01', '2023-04-15 05:00:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_29_063045_create_orders_table', 1),
(6, '2022_09_29_063421_create_order_details_table', 1),
(7, '2022_09_29_063504_create_products_table', 1),
(8, '2022_09_29_064345_create_brands_table', 1),
(9, '2022_09_29_064530_create_product_categories_table', 1),
(10, '2022_09_29_064650_create_product_images_table', 1),
(11, '2022_09_29_064846_create_product_details_table', 1),
(12, '2022_09_29_064929_create_product_comments_table', 1),
(13, '2022_09_29_070005_create_blogs_table', 1),
(14, '2022_09_29_070145_create_blog_comments_table', 1),
(15, '2023_03_15_110930_create_payments_table', 2),
(16, '2023_03_25_143817_create_authority_table', 3),
(17, '2023_03_25_143924_create_enter_coupon_table', 3),
(18, '2023_03_27_180519_create_address_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` int(3) NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `company_name`, `country`, `address`, `street_address`, `postcode_zip`, `town_city`, `email`, `phone`, `payment_type`, `status`, `created_at`, `updated_at`) VALUES
(27, 8, 'Test 1', 'esafae', 'CTU', 'Viet Nam', 1, 'Nguyen Van Cu', '123', 'Can Tho', 'test1@gmail.com', '0900100222', 'pay_later', 1, '2023-03-16 07:37:45', '2023-03-16 00:37:45'),
(39, 7, 'Test', 'fad', 'CodeGym', 'Viet Nam', 1, 'Nguyen Van Cu, Ninh Kieu', '1000', 'Can Tho', 'test@gmail.com', '0123456789', 'pay_later', 0, '2023-03-16 10:32:47', '2023-03-16 03:33:03'),
(41, 7, 'Test', 'werew', 'CodeGym', 'Viet Nam', 0, 'Nguyen Van Cu, Ninh Kieu', '1000', 'Can Tho', 'test@gmail.com', '0123456789', 'online_payment', 0, '2023-03-16 10:35:54', '2023-03-23 08:59:58'),
(82, 7, 'Test', 'efef', 'CodeGym', 'Viet Nam', 0, 'Nguyen Van Cu, Ninh Kieu', '1000', 'Can Tho', 'test@gmail.com', '0123456789', 'online_payment', 0, '2023-03-23 11:50:32', '2023-04-09 08:37:41'),
(83, 10, 'Vuu', 'afaf', 'CTU', 'Viet Nam', 0, 'Nguyen Van Cu', '123', 'Can Tho', 'vub1910179@student.ctu.edu.vn', '0907104902', 'online_payment', 6, '2023-03-23 14:34:30', '2023-03-23 07:41:34'),
(84, 11, 'Trieu', 'Nguyen', 'CTU', 'Viet Nam', 0, 'Cai Rang', '123', 'Can Tho', 'trieub1910165@student.ctu.edu.vn', '0966333222', 'online_payment', 6, '2023-03-23 15:34:56', '2023-03-23 08:37:39'),
(85, 7, 'Test', 'assa', 'CodeGym', 'Viet Nam', 0, 'Nguyen Van Cu, Ninh Kieu', '1000', 'Can Tho', 'test@gmail.com', '0123456789', 'online_payment', 1, '2023-03-23 16:07:43', '2023-03-23 09:07:43'),
(86, 10, 'Vuu', 'qe', 'CTU', 'Viet Nam', 0, 'Nguyen Van Cu - Ninh kieu', '123', 'Can Tho', 'vub1910179@student.ctu.edu.vn', '0900100222', 'online_payment', 1, '2023-03-26 15:08:37', '2023-03-26 08:08:37'),
(87, 12, 'Test 2', 'sad', 'ads', 'Viet Nam', 1, NULL, NULL, NULL, 'test2@gmail.com', '0966333222', 'pay_later', 1, '2023-04-01 22:30:46', '2023-04-01 15:30:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `size`, `amount`, `total`, `created_at`, `updated_at`) VALUES
(8, 6, 1, 1, 'S', 495, 495, '2023-03-05 17:00:00', '2023-03-06 01:12:45'),
(9, 7, 1, 1, 'S', 495, 495, '2023-03-05 17:00:00', '2023-03-06 01:12:54'),
(10, 8, 1, 1, 'S', 495, 495, '2023-03-05 17:00:00', '2023-03-06 01:13:12'),
(31, 27, 2, 1, 'XS', 13, 13, '2023-03-15 17:00:00', '2023-03-16 00:37:45'),
(32, 27, 5, 1, '', 35, 35, '2023-03-15 17:00:00', '2023-03-16 00:37:45'),
(44, 39, 1, 4, 'XS', 495, 1980, '2023-03-15 17:00:00', '2023-03-16 03:32:47'),
(46, 41, 1, 1, 'S', 495, 495, '2023-03-15 17:00:00', '2023-03-16 03:35:54'),
(87, 82, 2, 1, 'XS', 13, 13, '2023-03-22 17:00:00', '2023-03-23 04:50:32'),
(88, 83, 1, 2, 'S', 495, 990, '2023-03-22 17:00:00', '2023-03-23 07:34:30'),
(89, 83, 5, 3, '', 35, 105, '2023-03-22 17:00:00', '2023-03-23 07:34:30'),
(90, 84, 1, 1, 'S', 495, 495, '2023-03-22 17:00:00', '2023-03-23 08:34:56'),
(91, 85, 1, 1, 'XS', 495, 495, '2023-03-22 17:00:00', '2023-03-23 09:07:43'),
(92, 86, 2, 1, 'XS', 13, 13, '2023-03-25 17:00:00', '2023-03-26 08:08:37'),
(93, 87, 2, 1, 'XS', 13, 13, '2023-03-31 17:00:00', '2023-04-01 15:30:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_category_id`, `name`, `description`, `content`, `price`, `qty`, `discount`, `weight`, `sku`, `featured`, `tag`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Pure Pineapple', 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor', '', 629.99, 17, 495, 1.3, '00012', 1, 'Clothing', NULL, '2023-03-23 09:07:43'),
(2, 2, 2, 'Guangzhou sweater', NULL, NULL, 35, 3, 13, NULL, NULL, 1, 'Clothing', NULL, '2023-04-09 08:37:41'),
(3, 3, 2, 'Green OverCoat', NULL, NULL, 35, 15, 34, NULL, NULL, 1, 'Clothing', NULL, '2023-03-23 04:49:59'),
(4, 4, 1, 'Microfiber Wool Scarf', NULL, NULL, 64, 20, 35, NULL, NULL, 1, 'Accessories', NULL, NULL),
(5, 1, 3, 'Men\'s Painted Hat', '<p>dsada</p>', 'asasas', 44, 14, 40, 0.5, '233', 0, 'Accessories', NULL, '2023-03-23 09:49:36'),
(6, 1, 2, 'Converse Shoes', NULL, NULL, 35, 20, 34, NULL, NULL, 1, 'Clothing', NULL, NULL),
(7, 1, 1, 'Pure Pineapple', NULL, NULL, 64, 20, 35, NULL, NULL, 1, 'HandBag', NULL, NULL),
(8, 1, 1, '2 Layer Windbreaker', NULL, NULL, 44, 20, 35, NULL, NULL, 1, 'Clothing', NULL, NULL),
(9, 1, 1, 'Converse Shoes', NULL, NULL, 35, 16, 34, NULL, NULL, 1, 'Shoes', NULL, '2023-03-22 00:17:11'),
(10, 3, 3, 'ttt', 'Descrip', 'sdsd', 50, 0, 10, 2, '74521', 1, 'Cl', '2022-11-25 03:01:24', '2022-11-25 03:01:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Men', NULL, NULL),
(2, 'Women', NULL, NULL),
(3, 'Kids', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `email`, `name`, `messages`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'BrandonKelley@gmail.com', 'Brandon Kelley', 'Nice !', 4, NULL, NULL),
(2, 1, 5, 'RoyBanks@gmail.com', 'Roy Banks', 'Nice !', 4, NULL, NULL),
(3, 7, 2, 'luulinhvu123456789@gmail.com', 'Vu', 'adada', 3, '2022-11-05 06:15:13', '2022-11-05 06:15:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `size`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 'S', 1, NULL, '2023-03-23 08:59:58'),
(2, 1, 'M', 2, NULL, NULL),
(3, 1, 'L', 10, NULL, '2023-03-23 07:23:09'),
(4, 1, 'XS', 4, NULL, '2023-03-23 09:07:43'),
(8, 2, 'XS', 3, '2022-12-02 03:26:10', '2023-04-09 08:37:41'),
(9, 3, 'XS', 15, '2022-12-02 03:27:26', '2023-03-23 04:49:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'product-1.jpg', NULL, NULL),
(4, 2, 'product-2.jpg', NULL, NULL),
(5, 3, 'product-3.jpg', NULL, NULL),
(6, 4, 'product-4.jpg', NULL, NULL),
(7, 5, 'product-5.jpg', NULL, NULL),
(8, 6, 'product-6.jpg', NULL, NULL),
(9, 7, 'product-7.jpg', NULL, NULL),
(10, 8, 'product-8.jpg', NULL, NULL),
(11, 9, 'product-9.jpg', NULL, NULL),
(13, 3, 'thumb-2_230408_101129.jpg', '2023-04-08 03:11:29', '2023-04-08 03:11:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `level`, `description`, `company_name`, `country`, `street_address`, `postcode_zip`, `town_city`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'CodeLean', 'CodeLean@gmail.com', NULL, '$2y$10$B3fNcVexom1i3sGglDrIVut2E/Ukcj4KLx73xrlRHuV3guP1JCIa2', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$mpAgKoB5V3wW6FCPkRJ6TeO9ImxLKHJUDEnvAdNMWCYEy1A0PTcRq', 'swUDhezVyreMktxEIanzThbetjtFFNkpZAgWWd0gaELrsLL3xSoqZZd5ZRnN', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Shane Lynch', 'ShaneLynch@gmail.com', NULL, '$2y$10$Y8JQqW/wKKnacSOOurdhWeyf0gNMH5KUJQ1znZ.Mk0mPRJpH0EKGa', NULL, 'avatar-0.png', 1, NULL, 'CTU', 'Viet Nam', 'Nguyen Van Cu', '123', 'Can Tho', '0966333222', NULL, '2023-03-26 10:29:02'),
(4, 'Brandon Kelley', 'BrandonKelley@gmail.com', NULL, '$2y$10$rX.nl4DQgvhpsa2RWGWQlO9KxbsEULBS7vPAN8oVUlo5Le1ynEYx6', NULL, 'avatar-1.png', 1, NULL, 'Biggest Company', 'England', 'King Street', '156112', 'London', '0123456667', NULL, '2023-03-26 10:41:27'),
(5, 'Roy Banks', 'RoyBanks@gmail.com', NULL, '$2y$10$Bzq4PnfyGaImK8r0HgDfQuvdW3oHIHpgdKYaI/48tUufwsfYvhor.', NULL, 'avatar-2.png', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Linh vu', 'linhvu29112001@gmail.com', NULL, '$2y$10$e29ZQlMkP6vhh7tB5jCjBebNVaChpz9SQEPlZPl.4.kCaQObAteHy', NULL, 'spm_221203_080405.jpg', 0, NULL, 'CTU', 'Viet Nam', 'Nguyen Van Cu - Ninh kieu', '123', 'Can Tho', '0907104902', NULL, '2022-12-03 01:04:05'),
(7, 'Test', 'test@gmail.com', NULL, '$2y$10$5MSb3F62I9QKvTr7naCVr.PAZcZ9myu0x0YkxIwtBIm0AhDplhegC', NULL, 'avatar-0.png', 2, NULL, 'CodeGym', 'Viet Nam', 'Nguyen Van Cu, Ninh Kieu', '1000', 'Can Tho', '0123456789  ', NULL, NULL),
(8, 'Test 1', 'test1@gmail.com', NULL, '$2y$10$kHgOfkuXH.DrbuXz2ZV7zOLHlaE4uCEMZPOHk98hqdPtoFUjNBG4G', NULL, NULL, 2, 'alo alo alo alo', 'CTU', 'Viet Nam', 'Nguyen Van Cu', '123', 'Can Tho', '0900100222', '2022-11-03 02:10:49', '2022-11-03 02:10:49'),
(10, 'Vuu', 'vub1910179@student.ctu.edu.vn', NULL, '$2y$10$frWOg8/zKPQroX15aShsb.BvSpArCmEJX0m6.cmGtSQDmJ0QYrQOe', NULL, NULL, 2, 'abc', 'CTU', 'Viet Nam', 'Nguyen Van Cu - Ninh kieu', '123', 'Can Tho', '0900100222', '2023-03-23 06:55:53', '2023-03-23 12:25:00'),
(11, 'Trieu', 'trieub1910165@student.ctu.edu.vn', NULL, '$2y$10$3PoiDMPhYMPQWJgaDaiGaeDwgyMJXjii99L/q46ziq5yk2Rm3W6Ve', 'TKjj8xRY1Tb2BcKVqyMNxENLMUTWE0UjRpyNsG3jojh8l6ObdcUwymf7nr0g', 'spm-221203-080405_230323_033859.jpg', 2, 'abcxyz', 'CTU', 'Viet Nam', 'Cai Rang', '123', 'Can Tho', '0966333222', '2023-03-23 08:34:27', '2023-03-23 08:38:59'),
(12, 'Test 2', 'test2@gmail.com', NULL, '$2y$10$0vbSqH8WqwNNNC61Z7nE8.qtHrSnYH/SP2AUtQORodeESZGC/8kEe', NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, '0966333222', '2023-03-28 08:58:52', '2023-03-28 08:58:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `enter_coupon`
--
ALTER TABLE `enter_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `authority`
--
ALTER TABLE `authority`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `enter_coupon`
--
ALTER TABLE `enter_coupon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
