-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 03:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_oto`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_social`
--

CREATE TABLE `account_social` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` tinyint(4) DEFAULT 0,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `address`, `age`, `avatar`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'doantotnghiep@gmail.com', NULL, NULL, 0, NULL, '$2y$10$diDOgZLBCVc0h562OXkQ/uvLl2o0nYz4TRcSn0uKuNMbXD8Jj8/j.', 1, NULL, NULL, NULL),
(2, 'Tran Van B', 'tranvanb@gmail.com', NULL, NULL, 0, NULL, '$2y$10$LAuvUT6Cd/hpqgWlXwLok.f7la7VABZwobJqq5hkhyV7op.9t/E4u', 1, NULL, '2021-12-15 16:10:18', '2021-12-15 16:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `a_title` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_menu_id` int(11) DEFAULT 0,
  `a_description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_admin_id` int(11) DEFAULT 0,
  `a_auth_id` int(11) DEFAULT 0,
  `a_view` int(11) DEFAULT 0,
  `a_active` tinyint(4) DEFAULT 1,
  `a_hot` tinyint(4) DEFAULT 0,
  `a_point_rating` int(11) DEFAULT 0,
  `a_total_ratings` int(11) DEFAULT 0,
  `a_title_seo` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_keyword_seo` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_description_seo` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `a_title`, `a_slug`, `a_menu_id`, `a_description`, `a_avatar`, `a_content`, `a_admin_id`, `a_auth_id`, `a_view`, `a_active`, `a_hot`, `a_point_rating`, `a_total_ratings`, `a_title_seo`, `a_keyword_seo`, `a_description_seo`, `created_at`, `updated_at`) VALUES
(1, 'Bài viết hay', 'bai-viet-hay', 5, 'Bài viết hay', NULL, '<p>1212121</p>', 1, 0, 0, 1, 0, 0, 0, 'Bài viết hay', 'Bài viết hay', 'Bài viết hay', '2021-11-28 12:57:15', '2021-11-28 12:57:15'),
(2, 'CHƯƠNG TRÌNH HƯỚNG DẪN SỬ DỤNG XE AN TOÀN', 'chuong-trinh-huong-dan-su-dung-xe-an-toan', 5, 'CHƯƠNG TRÌNH HƯỚNG DẪN SỬ DỤNG XE AN TOÀN', '2021-12-05__fa80b31865278fc8325fc5eedcfa6854backdrop-25x5m.png', '<p>CHƯƠNG TR&Igrave;NH HƯỚNG DẪN SỬ DỤNG XE AN TO&Agrave;N</p>\r\n\r\n<p>Với mong muốn bổ trợ th&ecirc;m c&aacute;c th&ocirc;ng tin gi&uacute;p Kh&aacute;ch h&agrave;n<a href=\"http://127.0.0.1:8000/photos/1/fa80b31865278fc8325fc5eedcfa6854Backdrop 2.5x5m.png\"><img alt=\"\" src=\"http://127.0.0.1:8000/photos/1/fa80b31865278fc8325fc5eedcfa6854Backdrop 2.5x5m.png\" style=\"height:100%; width:100%\" /></a>g chưa nắm r&otilde; về t&iacute;nh năng xe, chế độ dịch vụ v&agrave; chăm s&oacute;c xe. Đại l&yacute; sẽ trực tiếp chủ động tiến h&agrave;nh tổ chức c&aacute;c chương tr&igrave;nh Hướng dẫn sử dụng xe an to&agrave;n định kỳ cho Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Chương tr&igrave;nh được giảng vi&ecirc;n đ&agrave;o tạo nội bộ Nguyễn Thế T&igrave;nh trực tiếp đứng lớp. C&ugrave;ng với kiến thức chuy&ecirc;n m&ocirc;n s&acirc;u rộng, hứa hẹn sẽ mang lại nhiều kiến thức thực tế v&agrave; bổ &iacute;ch đến với kh&aacute;ch h&agrave;ng</p>\r\n\r\n<p>Kỹ thuật vi&ecirc;n h&agrave;ng đầu hệ thống Hyundai Nguyễn Văn Chinh. Kỹ thuật vi&ecirc;n từng đạt giải thưởng cao trong c&aacute;c cuộc thi kỹ thuật của Hyundai to&agrave;n cầu</p>\r\n\r\n<p>Khi tham gia chương tr&igrave;nh Hyundai H&agrave; Đ&ocirc;ng chắc chắn sẽ mang lại cho qu&yacute; kh&aacute;ch h&agrave;ng một chương tr&igrave;nh ho&agrave;n thiện nhất với chương tr&igrave;nh s&aacute;t với thực tế. Gi&uacute;p qu&yacute; kh&aacute;ch c&oacute; kinh nghiệm xử l&yacute; c&aacute;c t&igrave;nh huống khẩn cấp v&agrave; &ldquo;lu&ocirc;n an to&agrave;n khi sử dụng xe&rdquo;</p>\r\n\r\n<p>NỘI DUNG Đ&Agrave;O TẠO:</p>\r\n\r\n<p>&bull; Bảo dưỡng &ndash; Bảo h&agrave;nh</p>\r\n\r\n<p>&bull; Chăm s&oacute;c xe v&agrave; xử l&yacute; c&aacute;c t&igrave;nh huống khẩn cấp</p>\r\n\r\n<p>&bull; Thực h&agrave;nh xử l&yacute; c&aacute;c t&igrave;nh huống khẩn cấp</p>\r\n\r\n<p>Rất nhiều Qu&agrave; tặng hấp dẫn d&agrave;nh cho kh&aacute;ch h&agrave;ng tham dự sự kiện</p>\r\n\r\n<p>THỜI GIAN &amp; ĐỊA ĐIỂM</p>\r\n\r\n<p>&bull; Bắt đầu từ 8h00 &ndash; 12h00 ng&agrave;y 13/11/2021</p>\r\n\r\n<p>&bull; Tại Ph&ograve;ng họp tầng 2 Đại L&yacute; Hyudai H&agrave; Đ&ocirc;ng</p>\r\n\r\n<p>&bull; SĐT hỗ trợ: 02433535455</p>', 1, 0, 0, 1, 0, 0, 0, 'CHƯƠNG TRÌNH HƯỚNG DẪN SỬ DỤNG XE AN TOÀN', 'CHƯƠNG TRÌNH HƯỚNG DẪN SỬ DỤNG XE AN TOÀN', 'CHƯƠNG TRÌNH HƯỚNG DẪN SỬ DỤNG XE AN TOÀN', '2021-12-05 09:27:00', '2021-12-05 09:31:37'),
(3, 'Grand I10 giờ ra sao ?', 'grand-i10-gio-ra-sao', 5, 'sadawfasfawrwewaedaw', NULL, '<p>rưertwerewrqwerwerwerwerw</p>', 1, 0, 0, 1, 0, 0, 0, 'Grand I10 giờ ra sao ?', 'Đánh giá chất lượng xe', 'sadawfasfawrwewaedaw', '2021-12-15 16:04:02', '2021-12-15 16:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `article_keywords`
--

CREATE TABLE `article_keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `ak_article_id` int(11) NOT NULL,
  `ak_keyword_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `atr_name` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atr_type` tinyint(4) DEFAULT 1,
  `atr_menu_id` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `av_name` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `av_slug` char(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `av_attribute_id` int(11) DEFAULT 0,
  `av_price` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commens`
--

CREATE TABLE `commens` (
  `id` int(10) UNSIGNED NOT NULL,
  `cm_content` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cm_user_id` int(11) DEFAULT NULL,
  `cm_admin_id` int(11) DEFAULT NULL,
  `cm_parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `com_user_id` int(11) NOT NULL,
  `com_user_type` tinyint(4) NOT NULL DEFAULT 0,
  `com_source_id` int(11) NOT NULL,
  `com_type` tinyint(4) NOT NULL DEFAULT 0,
  `com_parent_id` int(11) NOT NULL DEFAULT 0,
  `com_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `com_user_id`, `com_user_type`, `com_source_id`, `com_type`, `com_parent_id`, `com_message`, `created_at`, `updated_at`) VALUES
(25, 2, 0, 1, 1, 0, 'Đúng là hay quá đi à', '2021-11-28 12:58:09', '2021-11-28 12:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(10) UNSIGNED NOT NULL,
  `g_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_phone` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `im_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `im_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `im_type` tinyint(4) DEFAULT 0,
  `im_active` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_products`
--

CREATE TABLE `image_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_product_id` int(11) NOT NULL,
  `ip_image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `if_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_phone` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_fax` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_email_drive` char(20) COLLATE utf8mb4_unicode_ci DEFAULT 'smtp',
  `if_email_host` char(20) COLLATE utf8mb4_unicode_ci DEFAULT 'smtp.gmail.com',
  `if_email_port` char(20) COLLATE utf8mb4_unicode_ci DEFAULT '587',
  `if_email_encryption` char(20) COLLATE utf8mb4_unicode_ci DEFAULT 'tls',
  `if_time_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_seo` tinyint(4) DEFAULT 0,
  `if_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_youtobe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_email_send` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_email_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_google_map` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `if_company`, `if_phone`, `if_fax`, `if_address`, `if_email`, `if_email_drive`, `if_email_host`, `if_email_port`, `if_email_encryption`, `if_time_job`, `if_seo`, `if_logo`, `if_facebook`, `if_google`, `if_youtobe`, `if_email_send`, `if_email_password`, `if_meta_description`, `if_meta_title`, `if_meta_keywords`, `if_google_map`, `created_at`, `updated_at`) VALUES
(1, 'Xe ô tô', '0928817228', NULL, 'Xe ô tô', 'TranvanB@gmail.com', 'smtp', 'smtp.gmail.com', '587', 'tls', NULL, 0, NULL, NULL, NULL, NULL, 'doantotnghiep@gmail.com', '123456789', 'Nội dung bài viết', 'Website bán xe ô tô', NULL, NULL, NULL, '2021-12-15 16:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `k_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_name_slug` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_hit` int(11) DEFAULT 0,
  `k_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keyword_librarys`
--

CREATE TABLE `keyword_librarys` (
  `id` int(10) UNSIGNED NOT NULL,
  `kwl_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kwl_slug` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kwl_hit` int(11) DEFAULT 0,
  `kwl_admin_id` int(11) DEFAULT 0,
  `kwl_count_word` tinyint(4) DEFAULT 0,
  `kwl_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keyword_temps`
--

CREATE TABLE `keyword_temps` (
  `id` int(10) UNSIGNED NOT NULL,
  `kt_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kt_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kt_active` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `m_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_parent_id` tinyint(4) DEFAULT 0,
  `m_type` tinyint(4) DEFAULT 0,
  `m_active` tinyint(4) DEFAULT 1,
  `m_hot` tinyint(4) DEFAULT 0,
  `m_sort` tinyint(4) DEFAULT 0,
  `m_type_count` tinyint(4) DEFAULT 0,
  `m_type_seo` tinyint(4) DEFAULT 1,
  `m_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_keyword_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_description_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `m_title`, `m_slug`, `m_parent_id`, `m_type`, `m_active`, `m_hot`, `m_sort`, `m_type_count`, `m_type_seo`, `m_avatar`, `m_banner`, `m_title_seo`, `m_keyword_seo`, `m_description_seo`, `m_description`, `created_at`, `updated_at`) VALUES
(1, 'Hyundai I10', 'hyundai-i10', 3, 2, 1, 1, NULL, 0, 0, NULL, NULL, 'Hyundai I10', 'Hyundai I10', 'Hyundai I10', '<p>Hyundai I10</p>', NULL, '2021-12-13 16:43:42'),
(2, 'Hyundai Elantra', 'hyundai-elantra', 3, 2, 1, 1, NULL, 0, 0, NULL, NULL, 'Hyundai Elantra', 'Hyundai Elantra', 'Hyundai Elantra', '<p>Hyundai Elantra</p>', NULL, '2021-12-13 16:43:51'),
(3, 'Sản phẩm', 'san-pham', 0, 2, 1, 0, NULL, 0, 0, NULL, NULL, 'Sản phẩm', 'Sản phẩm', 'Sản phẩm', '<p>Sản phẩm</p>', NULL, NULL),
(5, 'Menu bài viết', 'menu-bai-viet', 0, 1, 1, 0, NULL, 0, 0, NULL, NULL, 'Menu bài viết', 'Menu bài viết', NULL, '<p>Menu b&agrave;i viết</p>', NULL, NULL),
(6, 'Xe hundai', 'xe-hundai', 1, 2, 1, 0, 1, 0, 1, '2021-12-05__20210122144140-b378-wm.jpg', NULL, 'Xe hundai', 'Xe hundai', 'Xe hundai', '<p>Xe hundai</p>', NULL, NULL),
(7, 'ƯU ĐÃI', 'uu-dai', 0, 3, 1, 0, 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(3, '2018_09_11_202016_create_admins_table', 1),
(4, '2018_09_13_171852_create_menus_table', 1),
(5, '2018_09_16_013655_create_articles_table', 1),
(6, '2018_09_16_014311_create_keywords_table', 1),
(7, '2018_09_16_014537_create_article_keywords_table', 1),
(8, '2018_09_21_050809_create_keyword_temps_table', 1),
(9, '2018_09_21_163200_entrust_setup_tables', 1),
(10, '2018_09_22_063710_create_keyword_librarys_table', 1),
(11, '2018_09_23_120817_create_images_table', 1),
(12, '2018_09_24_233909_create_products_table', 1),
(13, '2018_09_27_115033_create_cache_table', 1),
(14, '2018_09_27_152401_create_image_products_table', 1),
(15, '2018_09_28_154858_create_informations_table', 1),
(16, '2018_09_29_162032_create_slides_table', 1),
(17, '2018_09_30_231403_create_guests_table', 1),
(18, '2018_10_01_212941_create_orders_table', 1),
(19, '2018_10_07_223034_create_attributes_table', 1),
(20, '2018_10_07_223337_create_attribute_values_table', 1),
(21, '2018_10_08_002330_create_product_value_table', 1),
(22, '2018_10_09_232232_create_commens_table', 1),
(23, '2018_10_13_000845_create_comments_table', 1),
(24, '2018_10_14_075933_create_account_social_table', 1),
(25, '2018_10_18_165441_create_store_table', 1),
(26, '2018_10_25_203614_create_product_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `o_guest_id` int(11) DEFAULT NULL,
  `o_product_id` int(11) NOT NULL DEFAULT 0,
  `o_submit` tinyint(4) DEFAULT 0,
  `o_status` tinyint(4) DEFAULT 0,
  `o_messages` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_viewing_day` date DEFAULT NULL,
  `o_ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_menu_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `o_guest_id`, `o_product_id`, `o_submit`, `o_status`, `o_messages`, `car_viewing_day`, `o_ip`, `o_menu_id`, `created_at`, `updated_at`) VALUES
(6, 3, 1, 0, 1, '', '2021-12-16', '127.0.0.1', NULL, '2021-12-13 15:24:56', '2021-12-13 15:25:23'),
(7, 3, 1, 0, 0, 'Đổi lịch xem xe', '2021-12-25', '127.0.0.1', NULL, '2021-12-13 15:36:23', '2021-12-13 15:36:23'),
(8, 3, 1, 0, 0, 'Goi cho tôi để chốt lịch xem xe', '2021-12-17', '127.0.0.1', NULL, '2021-12-13 17:11:45', '2021-12-13 17:11:45'),
(9, 14, 2, 0, 0, 'adbfdgdfgdfgdfg', '2021-12-22', '127.0.0.1', NULL, '2021-12-15 15:17:30', '2021-12-15 15:17:30'),
(10, 15, 0, 0, 0, NULL, NULL, '127.0.0.1', 1, '2021-12-15 15:39:45', '2021-12-15 15:39:45'),
(11, 16, 0, 0, 0, NULL, NULL, '127.0.0.1', 3, '2021-12-15 15:40:16', '2021-12-15 15:40:16');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_permission` tinyint(4) DEFAULT 0,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_permission`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Quan ly bai viet', 1, NULL, 'Thêm, sửa, xóa bài viết', '2021-12-15 16:11:28', '2021-12-15 16:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_price` bigint(20) DEFAULT 0,
  `pro_menu_id` int(11) DEFAULT 0,
  `pro_type` tinyint(4) DEFAULT 0,
  `pro_active` tinyint(4) DEFAULT 0,
  `pro_position` tinyint(4) DEFAULT 0,
  `pro_source` tinyint(4) DEFAULT 0 COMMENT 'Nguồn gốc ,xuất xứ ',
  `pro_description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_year_output` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_specifications` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_title_seo` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_keyword_seo` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_description_seo` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_view` int(11) DEFAULT 0,
  `pro_admin_id` int(11) DEFAULT 0,
  `pro_point_rating` int(11) DEFAULT 0,
  `pro_total_ratings` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_slug`, `pro_price`, `pro_menu_id`, `pro_type`, `pro_active`, `pro_position`, `pro_source`, `pro_description`, `pro_year_output`, `pro_content`, `pro_specifications`, `pro_title_seo`, `pro_keyword_seo`, `pro_description_seo`, `pro_avatar`, `pro_view`, `pro_admin_id`, `pro_point_rating`, `pro_total_ratings`, `created_at`, `updated_at`) VALUES
(1, 'Hyundai i10 sedan bản đủ', 'hyundai-i10-sedan-ban-du', 120000, 1, 1, 1, 1, 1, 'Hyundai i10 sedan bản đủ', '2002', '<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\">Hyundai i10 sedan bản đủ - Niềm mơ ước của mọi nh&agrave;</span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><em><span style=\"font-size:14.0pt\">Để đ&aacute;p ứng nhu cầu của người d&ugrave;ng, c&aacute;c nh&agrave; sản xuất kh&ocirc;ng ngừng cải tiến v&agrave; cho ra đời những d&ograve;ng xe hơi với nhiều kiểu d&aacute;ng v&agrave; phong c&aacute;ch kh&aacute;c nhau. Tuy nhi&ecirc;n, kh&ocirc;ng phải ai cũng am hiểu về lĩnh vực n&agrave;y để c&oacute; thể lựa chọn được một chiếc xe ph&ugrave; hợp với mục đ&iacute;ch v&agrave; phong c&aacute;ch của m&igrave;nh. Nếu bạn l&agrave; người y&ecirc;u th&iacute;ch phong c&aacute;ch năng động v&agrave; c&aacute; t&iacute;nh th&igrave; một gợi &yacute; của ch&uacute;ng t&ocirc;i d&agrave;nh cho bạn l&agrave; chiếc <strong>hyundai</strong> <strong>i10 sedan bản đủ</strong> thuộc d&ograve;ng xe H</span></em><em><span style=\"font-size:14.0pt\">yundai chắc chắn sẽ khiến bạn h&agrave;i l&ograve;ng. Ch&uacute;ng ta h&atilde;y c&ugrave;ng t&igrave;m hiểu cụ thể về d&ograve;ng xe n&agrave;y trong b&agrave;i viết sau đ&acirc;y.</span></em></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\">1. Đ&ocirc;i n&eacute;t cơ bản về xe hyundai i10 sedan bản đủ</span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"color:null\"><img alt=\"i10 sedan bản đủ\" src=\"http://hyundaithanhcong.net/photos/15/i10 sedan ban du/i10-sedan-so-san.jpg\" style=\"width:100%\" /></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><em><span style=\"font-size:14.0pt\">Ngoại h&igrave;nh của Sedan bản đủ</span></em></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Đ&acirc;y l&agrave; d&ograve;ng xe tiếp nối theo d&ograve;ng chảy của Hyundai với những cải tiến vượt trội. Kh&aacute;c với bản thiếu, Hyundai i10 sedan bản đủ được t&iacute;ch hợp kh&aacute; nhiều chức năng ưu việt gi&uacute;p n&oacute; trở th&agrave;nh một trong những d&ograve;ng xe được ưa chuộng nhất trong c&ugrave;ng ph&acirc;n kh&uacute;c.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Với ngoại h&igrave;nh được thiết kế theo phong c&aacute;ch năng động, c&aacute; t&iacute;nh, trẻ trung c&ugrave;ng với những t&iacute;nh năng ưu việt d&ograve;ng xe n&agrave;y nhanh ch&oacute;ng chinh phục được l&ograve;ng tin của đ&ocirc;ng đảo kh&aacute;ch h&agrave;ng.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Hyundai tung ra 6 phi&ecirc;n bản xe i10 sedan bản đủ được lắp r&aacute;p tại Việt Nam, trong đ&oacute; bản đầy đủ được c&aacute;c chuy&ecirc;n gia về xe cũng như người d&ugrave;ng đ&aacute;nh gi&aacute; cao về cả ngoại h&igrave;nh lẫn t&iacute;nh ưu việt khi vận h&agrave;nh. V&igrave; vậy, chẳng c&oacute; l&yacute; do g&igrave; m&agrave; i10 sedan bản đủ lại kh&ocirc;ng trở th&agrave;nh d&ograve;ng xe được ưa chuộng nhất bởi n&oacute; ph&ugrave; hợp với thị hiếu cũng như khả năng kinh tế của đ&ocirc;ng đảo người d&ugrave;ng tại Việt Nam.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\">2. Ngoại thất của xe hyundai i10 sedan bản đủ</span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"color:null\"><img alt=\"ngoại thất i10 sedan bản đủ\" src=\"http://hyundaithanhcong.net/photos/15/i10 sedan ban du/ngoai-that-i10-sedan-so-san-ban-du.jpg\" style=\"width:100%\" /></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><em><span style=\"font-size:14.0pt\">Thiết kế hiện đại ph&ugrave; hợp với giới trẻ</span></em></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">D&ograve;ng xe n&agrave;y được thiết kế với ngoại h&igrave;nh cực phong c&aacute;ch, năng động v&agrave; trẻ trung nhưng kh&ocirc;ng l&agrave;m mất đi vẻ quyến rũ chắc chắn sẽ g&acirc;y ấn tượng mạnh với bạn ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n. </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\">- Tổng thể về diện t&iacute;ch xe</span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">D&ograve;ng xe n&agrave;y được đ&aacute;nh gi&aacute; c&oacute; kh&ocirc;ng gian nội thất rộng r&atilde;i v&agrave; thoải m&aacute;i với chiều d&agrave;i cơ sở l&ecirc;n tới 2.425 mm. Ghế ngồi ở cả ph&iacute;a trước v&agrave; ph&iacute;a sau được thiết kế với chất liệu da pha nỉ kết hợp với 2 t&ocirc;ng m&agrave;u đen trắng mang lại sự &ecirc;m &aacute;i nhưng cũng cực kỳ thời trang v&agrave; c&aacute; t&iacute;nh. </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Hyundai i10 sedan bản đủ được </span><span style=\"font-size:14.0pt\">lắp đặt hệ thống gương chỉnh điện v&agrave; gập điện t&iacute;ch hợp đ&egrave;n b&aacute;o rẽ gi&uacute;p chiếc xe trở n&ecirc;n gọn g&agrave;ng v&agrave; tiện lợi, tr&aacute;nh được những va chạm kh&ocirc;ng đ&aacute;ng c&oacute; khi di chuyển đến những đoạn đường c&oacute; mật độ xe đ&ocirc;ng đ&uacute;c. </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Nếu như </span><span style=\"font-size:14.0pt\">ở bản thiếu, lazang được trang bị bằng th&eacute;p th&igrave; ở bản đủ lazang được thiết kế bằng hợp kim nh&ocirc;m kh&ocirc;ng những c&oacute; c&ocirc;ng dụng chống m&ograve;n do t&aacute;c động của m&ocirc;i trường m&agrave; n&oacute; c&ograve;n tạo ra vẻ sang trọng cũng như thể hiện được phong c&aacute;ch của chủ xe, c&aacute; t&iacute;nh v&agrave; mạnh mẽ. </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Cụm đ&egrave;n ph&iacute;a trước được được trang bị t&iacute;ch hợp b</span><span style=\"font-size:14.0pt\">ộ 3 &nbsp;đ&egrave;n pha, đ&egrave;n xi nhan v&agrave; đ&egrave;n cốt với b&oacute;ng đ&egrave;n halogen cực s&aacute;ng gi&uacute;p t&agrave;i xế c&oacute; thể quan s&aacute;t với tầm nh&igrave;n xa hơn v&agrave; r&otilde; r&agrave;ng hơn cũng như gi&uacute;p c&aacute;c xe xung quanh c&oacute; thể quan s&aacute;t được xe đang c&oacute; &yacute; định rẽ đảm bảo an to&agrave;n cho qu&aacute; tr&igrave;nh di chuyển.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Kh&ocirc;ng chỉ vậy, Hyundai i10 sedan bản đủ c&ograve;n được trang bị th&ecirc;m đ&egrave;n </span><span style=\"font-size:14.0pt\">sương m&ugrave; m&agrave; bản thiếu kh&ocirc;ng c&oacute; gi&uacute;p t&agrave;i xế quan s&aacute;t được xa hơn, tốt hơn đảm bảo an to&agrave;n cho qu&aacute; tr&igrave;nh di chuyển, nhất l&agrave; khi di chuyển đến những cung đường phủ đầy sương m&ugrave; như: đường đồi, sườn n&uacute;i hay di chuyển trong điều kiện thời tiết xấu, d&agrave;y đặc sương m&ugrave;. Hệ thống lưới tải nhiệt c&oacute; t&aacute;c dụng l&agrave;m m&aacute;t động cơ hiệu quả tăng tuổi thọ cho xe. </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Tay nắm mở cửa được mạ Crom gi&uacute;p chiếc xe trở n&ecirc;n thật phong c&aacute;ch v&agrave; lịch l&atilde;m kết hợp với n&uacute;t bấm mở cửa điện tử gi&uacute;p người d&ugrave;ng c&oacute; thể mở cửa v&agrave;o xe một c&aacute;ch dễ d&agrave;ng chỉ bằng một thao t&aacute;c bấm n&uacute;t đơn giản.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\">3. Nội&nbsp;thất của xe hyundai i10 sedan bản đủ</span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"color:null\"><img alt=\"nội thất i10 sedan bản đủ\" src=\"http://hyundaithanhcong.net/photos/15/i10 sedan ban du/noi-that-i10-sedan-so-san-san-ban-du.jpg\" style=\"width:100%\" /></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:center\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><em><span style=\"font-size:14.0pt\">H&igrave;nh ảnh nội thất của Sedan bản đủ</span></em></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Kh&ocirc;ng chỉ vậy, ghế ngồi ở cả 2 h&agrave;ng ghế n&agrave;y c&ograve;n được thiết kế lưng tựa lớn v&agrave; c&oacute; cả tựa đầu &ecirc;m &aacute;i gi&uacute;p t&agrave;i xế cũng như h&agrave;nh kh&aacute;ch cảm thấy thoải m&aacute;i hơn trong qu&aacute; tr&igrave;nh di chuyển.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Nếu như bản thiếu chỉ được trang bị hệ thống &acirc;m thanh 4 loa th&igrave; ở bản đầy đủ hệ thống giải tr&iacute; được trang bị kh&aacute; tốt với đ&agrave;i Radio AM/FM, Bluetooth, d&agrave;n &acirc;m thanh 4 loa gi&uacute;p t&agrave;i xế c&oacute; thể thư gi&atilde;n cũng như nắm bắt được những tin tức, đặc biệt l&agrave; tin tức về giao th&ocirc;ng trong qu&aacute; tr&igrave;nh di chuyển.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Kh&ocirc;ng chỉ vậy, d&ograve;ng xe n&agrave;y c&ograve;n được lắp đặt m&agrave;n h&igrave;nh cảm ứng rộng 7 inch với độ ph&acirc;n giải h&igrave;nh ảnh cao, sắc n&eacute;t hiển thị bản đồ GPS ở Việt Nam gi&uacute;p t&agrave;i xế c&oacute; thể nắm bắt được mọi cung đường trong tầm tay v&agrave; tiết kiệm thời gian cho qu&aacute; tr&igrave;nh di chuyển.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Xe c&oacute; trang bị điều h&ograve;a 2 chiều n&oacute;ng v&agrave; lạnh gi&uacute;p đảm bảo sức khỏe cho t&agrave;i xế l&aacute;i xe cũng như những h&agrave;nh kh&aacute;ch ngồi ph&iacute;a sau. Với ch&igrave;a kh&oacute;a th&ocirc;ng minh c&oacute; thể điều khiển được từ xa gi&uacute;p t&agrave;i xế thuận tiện hơn trong việc điều khiển xe cũng như việc bảo đảm an to&agrave;n cho xe.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Xe được lắp đặt đồng hồ điều khiển c&oacute; k&iacute;ch thước lớn cho ph&eacute;p hiển thị tối đa c&aacute;c th&ocirc;ng tin. Với &aacute;nh s&aacute;ng m&agrave;u trắng xanh th&acirc;n thiện với mắt, c&aacute;c th&ocirc;ng số hiển thị v&ocirc; c&ugrave;ng dễ đọc gi&uacute;p xe trở n&ecirc;n th&acirc;n thiện v&agrave; ph&ugrave; hợp với mọi đối tượng.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Cũng trang bị v&ocirc;-lăng ba chấu như bản thiếu nhưng điểm kh&aacute;c biệt l&agrave; v&ocirc;-lăng ở bản đủ được bọc th&ecirc;m 1 lớp da cao cấp gi&uacute;p tăng t&iacute;nh thẩm mỹ cho xe. Chiếc v&ocirc;-lăng n&agrave;y c&oacute; thể điều khiển 2 hướng linh hoạt kết hợp với ghế l&aacute;i xoay được 6 hướng gi&uacute;p t&agrave;i xế c&oacute; được một tư thế ngồi thoải m&aacute;i nhất để chinh phục mọi cung đường. </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\">4. Cơ chế vận h&agrave;nh i10 sedan bản đủ</span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Ngay từ lần đầu ti&ecirc;n chạy thử chiếc xe n&agrave;y, nhiều người đ&atilde; nhận x&eacute;t đ&acirc;y l&agrave; chiếc xe c&oacute; động cơ v</span><span style=\"font-size:14.0pt\">ận h&agrave;nh v&ocirc; c&ugrave;ng &ecirc;m &aacute;i v&agrave; tiết kiệm nhi&ecirc;n liệu.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Hyundai I10 sedan bản đủ </span><span style=\"font-size:14.0pt\">sử dụng động cơ Kappa dung t&iacute;ch 1.2 l&iacute;t sử dụng vật liệu nhẹ để gia c&ocirc;ng gi&uacute;p giảm trọng lượng cũng như tăng t&iacute;nh thẩm mỹ cho xe một c&aacute;ch hiệu quả. </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Kh&ocirc;ng chỉ vậy, động cơ Kappa <span style=\"background-color:white\">kết hợp với c&ocirc;ng nghệ Dual VTVT c&ograve;n gi&uacute;p t&agrave;i xế tiết kiệm nhi&ecirc;n liệu một c&aacute;ch đ&aacute;ng kể cũng như bảo đảm sự bền bỉ của động cơ trong qu&aacute; tr&igrave;nh vận h&agrave;nh.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"background-color:white\">5. Đảm bảo t&iacute;nh an to&agrave;n </span></span></strong></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\">D&ograve;ng xe n&agrave;y được trang bị hệ thống t&uacute;i kh&iacute; đầy đủ ở h&agrave;ng ghế l&aacute;i gi&uacute;p bảo vệ t&agrave;i xế v&agrave; h&agrave;nh kh&aacute;ch giảm bớt những nguy hiểm khi gặp phải va chạm với những xe kh&aacute;c cũng như va chạm với những chướng ngại vật tr&ecirc;n đường trong qu&aacute; tr&igrave;nh di chuyển.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Xe được trang bị c&ocirc;ng nghệ chống b&oacute; cứng phanh để hạn chế cũng như ngăn ngừa việc trượt b&aacute;nh trong qu&aacute; tr&igrave;nh </span><span style=\"font-size:14.0pt\">vận h&agrave;nh g&acirc;y nguy hiểm. Kh&ocirc;ng chỉ vậy, hệ thống phanh n&agrave;y c&ograve;n gi&uacute;p xe ổn định v&agrave; hạn chế việc trong qu&aacute; tr&igrave;nh phanh gấp bị kh&oacute;a b&aacute;nh dẫn tới mất kiểm so&aacute;t hướng l&aacute;i.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\">Cảm biến l&ugrave;i được hiển thị tr&ecirc;n gương sẽ tự động được k&iacute;ch hoạt khi xe ỏ số l&ugrave;i. Đối với những người đang tập l&aacute;i xe cũng như kỹ năng điều khiển xe, l&ugrave;i xe c&ograve;n yếu th&igrave; cảm biến l&ugrave;i chắc chắn sẽ gi&uacute;p &iacute;ch nhiều cho bạn.</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"color:null\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\">Tr&ecirc;n đ&acirc;y l&agrave; những th&ocirc;ng tin cơ bản về d&ograve;ng xe i10 sedan bản đủ của H</span></span><span style=\"font-size:14.0pt\"><span style=\"background-color:white\">yundai. Hy vọng rằng với những th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i cung cấp sẽ gi&uacute;p c&aacute;c bạn hiểu r&otilde; hơn về d&ograve;ng xe n&agrave;y.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"color:null\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\">Nếu c&ograve;n thắc mắc về điều g&igrave; cũng như muốn sở hữu cho m&igrave;nh si&ecirc;u ph</span></span></span><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:null\">ẩm n&agrave;y với gi&aacute; th&agrave;nh hợp l&yacute; th&igrave; h&atilde;y nhấc m&aacute;y l&ecirc;n v&agrave; li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua đầu số hotline </span><a href=\"tel: 0985323555\"><span style=\"color:null\">0985.323.555</span></a><span style=\"color:null\"> hoặc truy cập v&agrave;o website </span><a href=\"http://hyundaithanhcong.net\"><span style=\"color:null\">hyundaithanhcong.net</span></a><span style=\"color:null\"> để được ch&uacute;ng t&ocirc;i tư vấn v&agrave; giải đ&aacute;p tận t&igrave;nh.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:14.0pt\"><span style=\"background-color:white\"><span style=\"color:null\">Tham khảo th&ecirc;m: c&aacute;c d&ograve;ng </span><a href=\"http://hyundaithanhcong.net/chuyen-muc/hyundai-i10-2\"><span style=\"color:null\">hyundai i10</span></a><span style=\"color:null\">.&nbsp;</span></span></span></span></span></p>', '<p style=\"margin-left:0cm; margin-right:0cm\">Đang cập nhật</p>', 'Hyundai i10 sedan bản đủ', 'Hyundai i10 sedan bản đủ', 'Hyundai i10 sedan bản đủ', '2021-11-24__sp-1.png', 0, 1, 0, 0, '2021-11-24 05:50:27', '2021-11-24 05:50:30'),
(2, 'Bán xe Ford Focus sản xuất năm 2016, xe đẹp', 'ban-xe-ford-focus-san-xuat-nam-2016-xe-dep', 575, 1, 1, 1, 2, 2, 'Bán xe Ford Focus sản xuất năm 2016, xe đẹp, xe gia đình', '2016', '<p>&nbsp;</p>\r\n\r\n<p>Xe đ&atilde; qua sử dụng, bao kiểm định tại h&atilde;ng - Đươc b&aacute;n tại Si&ecirc;u Thị &Ocirc; T&ocirc; H&agrave; Nội.<br />\r\n- Loại xe: Focus.<br />\r\n- Sản xuất: 2016.<br />\r\n- ĐK lần đầu: 07/2016.<br />\r\n- M&agrave;u: Ghi v&agrave;ng.<br />\r\n- BS: 81.<br />\r\n- Lăn b&aacute;nh: 43.000 Km (cam kết kh&ocirc;ng tua).<br />\r\n- Ph&aacute;p l&yacute;: Xe c&aacute; nh&acirc;n, 1 chủ từ đầu.<br />\r\n- Gi&aacute;: 575tr (c&ograve;n thương lượng), hỗ trợ vay ng&acirc;n h&agrave;ng l&atilde;i suất thấp tới 70% gi&aacute; trị xe.<br />\r\nXe được trang bị:<br />\r\n- Ghế da, m&agrave;n h&igrave;nh DVD, kết nối Bluetooth.<br />\r\n- Điều h&ograve;a tự động 2 v&ugrave;ng độc lập.<br />\r\n- Cửa sổ trời.<br />\r\n- Ch&igrave;a kh&oacute;a th&ocirc;ng minh, khởi động n&uacute;t bấm.<br />\r\n- Cảm biến trước sau, camera l&ugrave;i.<br />\r\nSi&ecirc;u Thị &Ocirc; T&ocirc; H&agrave; N&ocirc;i - Chuy&ecirc;n gia xe đ&atilde; qua sử dụng chất lượng cao: Kh&ocirc;ng đ&acirc;m đụng - Kh&ocirc;ng ngập nước - Đ&uacute;ng Km đồng hồ.<br />\r\nB&ecirc;n cạnh đ&oacute; ch&uacute;ng t&ocirc;i c&ograve;n c&oacute;:<br />\r\n- Ch&iacute;nh s&aacute;ch bảo h&agrave;nh tới 06 th&aacute;ng hoặc 10.000km cho từng xe b&aacute;n ra, hỗ trợ bảo tr&igrave;, sửa chữa trọn đời.<br />\r\n- Tặng 2 phiếu thay nhớt miễn ph&iacute; cho mỗi xe b&aacute;n ra.<br />\r\n- Thu mua xe đ&atilde; qua sử dụng với gi&aacute; cao.<br />\r\n- Đổi xe cũ mới với mức b&ugrave; đổi đặc biệt ư.</p>', NULL, 'Bán xe Ford Focus sản xuất năm 2016, xe đẹp', 'Bán xe Ford Focus sản xuất năm 2016, xe đẹp', NULL, '2021-12-05__20210122144140-a7bd-wm.jpg', 0, 1, 0, 0, '2021-12-05 08:54:47', '2021-12-05 08:55:32'),
(3, 'Xe BMW 428i đời 2013, màu trắng, nhập khẩu nguyên chiếc', 'xe-bmw-428i-doi-2013-mau-trang-nhap-khau-nguyen-chiec', 127900000, 2, 1, 1, 2, 1, 'Xe BMW 428i đời 2013, màu trắng, nhập khẩu nguyên chiếc', '2011', '<p>Nay l&ecirc;n s&oacute;ng em BMW 428i coupe trắng nội thất đen.<br />\r\n- Sx 2013 đklđ 2014.<br />\r\n- Odo 54.000 km hơn.<br />\r\n- Động cơ 2.0 turbo với 245 m&atilde;.<br />\r\n- Body M4 Performance.<br />\r\n- M&acirc;m 19 inch thể thao.<br />\r\n- Heo v&agrave; đĩa trước sau Brembo.<br />\r\n- Full p&ocirc; uy lực.<br />\r\n- Full LCI trước sau.<br />\r\n- Đồng hồ hiện thị số Cluster 6WD.<br />\r\n- M&agrave;n h&igrave;nh NBT.<br />\r\n- N&uacute;m lớn.<br />\r\n- Cần số M.<br />\r\n- Volang M.<br />\r\n- Loa Harman Kardon quanh xe.<br />\r\n- 4 chế độ chạy tuỳ chỉnh.<br />\r\n- C&ograve;n nhiều c&aacute;i linh tinh kh&aacute;c....<br />\r\n- Xe kh&ocirc;ng đ&acirc;m đụng, kh&ocirc;ng ngập nước v&agrave; kh&ocirc;ng thuỷ k&iacute;ch.<br />\r\n- Test h&atilde;ng thoải m&aacute;i.<br />\r\n- Gi&aacute; chỉ 1 tỷ 279tr.<br />\r\n- Hỗ trợ vay bank được 700-800 tr thoải m&aacute;i.</p>', NULL, 'Xe BMW 428i đời 2013, màu trắng, nhập khẩu nguyên chiếc', 'Xe BMW 428i đời 2013, màu trắng, nhập khẩu nguyên chiếc', 'Xe BMW 428i đời 2013, màu trắng, nhập khẩu nguyên chiếc', '2021-12-05__20211126154725-6456-wm.jpg', 0, 1, 0, 0, '2021-12-05 09:00:10', '2021-12-05 09:00:24'),
(4, 'HyunDai Accent', 'hyundai-accent', 400000000, 3, 1, 1, 0, 3, 'Động cơ: 123414\r\ndung tích :56456', '2021', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2021-12-15 15:58:01', '2021-12-15 15:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `pi_name` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_slug` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_product_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `pi_name`, `pi_slug`, `pi_product_id`, `created_at`, `updated_at`) VALUES
(1, '2021-11-24__sp-1.png', '2021-11-24-sp-1png', 1, '2021-11-24 05:51:37', '2021-11-24 05:51:37'),
(2, '2021-12-05__20210122144140-a7bd-wm.jpg', '2021-12-05-20210122144140-a7bd-wmjpg', 2, '2021-12-05 08:54:47', '2021-12-05 08:54:47'),
(3, '2021-12-05__20210122144140-b378-wm.jpg', '2021-12-05-20210122144140-b378-wmjpg', 2, '2021-12-05 08:54:47', '2021-12-05 08:54:47'),
(4, '2021-12-05__20210122144139-8f78-wm.jpg', '2021-12-05-20210122144139-8f78-wmjpg', 2, '2021-12-05 08:54:47', '2021-12-05 08:54:47'),
(5, '2021-12-05__20211126154725-475b-wm.jpg', '2021-12-05-20211126154725-475b-wmjpg', 3, '2021-12-05 09:00:11', '2021-12-05 09:00:11'),
(6, '2021-12-05__20211126154725-d351-wm.jpg', '2021-12-05-20211126154725-d351-wmjpg', 3, '2021-12-05 09:00:11', '2021-12-05 09:00:11'),
(7, '2021-12-05__20211126154725-3373-wm.jpg', '2021-12-05-20211126154725-3373-wmjpg', 3, '2021-12-05 09:00:11', '2021-12-05 09:00:11'),
(8, '2021-12-05__20211126154725-6456-wm.jpg', '2021-12-05-20211126154725-6456-wmjpg', 3, '2021-12-05 09:00:11', '2021-12-05 09:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_value`
--

CREATE TABLE `product_value` (
  `id` int(10) UNSIGNED NOT NULL,
  `pv_product_id` int(11) NOT NULL DEFAULT 0,
  `pv_value_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `sl_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl_type` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `sl_name`, `sl_link`, `sl_description`, `sl_avatar`, `sl_type`, `created_at`, `updated_at`) VALUES
(1, 'Sl1', NULL, NULL, '2021-11-24__sl1.png', 4, NULL, NULL),
(2, 'SL2', NULL, NULL, '2021-11-24__sl2.png', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `s_script` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_html` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_type` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` tinyint(4) DEFAULT 0,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `password` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'check veriemail chua',
  `confirmation_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token',
  `active` tinyint(4) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `city`, `age`, `avatar`, `admin_id`, `password`, `confirmed`, `confirmation_code`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'TrungPhuNA', 'doantotnghiep2@gmail.com', '0986420991', NULL, NULL, 0, NULL, NULL, '$2y$10$d/ahhe877XubBCp2JMRHe.1.docKofEH7P4MeEilMirTj4ThnZgZS', 0, NULL, 1, NULL, '2021-11-28 12:57:58', '2021-11-28 12:57:58'),
(3, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '0928817228', 'Địa chỉ', NULL, 0, NULL, NULL, '$2y$10$nnhyBFEVw48CgNynuCXhEeLMC/cAIsGaErrMzMvX9ioNsLaE/E5Ku', 0, NULL, 1, '7KMqSZd9u1BThDKQeFf6WuVTOgwos1u5EDzqIzN2OTprWApLQaVANPdRpaLb', '2021-12-05 09:05:29', '2021-12-19 10:32:32'),
(5, 'tran van b', 'tranvanb@gmail.com', '012344956', NULL, NULL, 0, NULL, NULL, '$2y$10$oHJKFhKXMTIizcQVweaoHOA/WIacQrYV6yrDOHS6g3ociQ9jJS2R.', 0, NULL, 1, 'fPPaQJrwDiGDtcU1IaGT9ex8uxsGWn3yl5jefgpfnkfiFbBmo1savGeIS5vB', '2021-12-05 09:54:29', '2021-12-05 09:54:29'),
(13, 'Trần tiến vũ', 'vu123@gmail.com', '123143245345', NULL, NULL, 0, NULL, NULL, '$2y$10$/b65mocI.CBhK/X1U4a9q.l7hZqYB.Gv65D/UKs0H/5A0IoE3VzV6', 0, NULL, 1, '56Zc4rmkeoAiBJD9S8S3jLmq4QM1sW4CpEREx7CXssjUdOfMnz7MhHiduX09', '2021-12-15 15:12:48', '2021-12-15 15:12:48'),
(14, 'tran van a', 'tranvana@gmail.com', '0123143565', NULL, NULL, 0, NULL, NULL, '$2y$10$TZ2.jlmA92TWPjT7/PZKYORsaYo3kmAE5kxzhfYV2CGyWhMJALanC', 0, NULL, 1, NULL, '2021-12-15 15:17:30', '2021-12-15 15:17:30'),
(15, 'nguyanvanb', 'haibabon@gmail.com', '10243245235', NULL, NULL, 0, NULL, NULL, '$2y$10$mGZpYe4100bEPFi0VANy4OdgTohQan4p5apAulyh4p.1JJ6/SW5MO', 0, NULL, 1, NULL, '2021-12-15 15:37:37', '2021-12-15 15:37:37'),
(16, 'sdfdsfsd', 'haibabson@gmail.com', '3453454', NULL, NULL, 0, NULL, NULL, '$2y$10$7lG6x95CWeBSAeM865IuHuOEGPzNjJaEKcErUrQ2Qu8Q4/reU/m7q', 0, NULL, 1, NULL, '2021-12-15 15:40:16', '2021-12-15 15:40:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_social`
--
ALTER TABLE `account_social`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_social_provider_user_id_index` (`provider_user_id`),
  ADD KEY `account_social_provider_index` (`provider`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_active_index` (`active`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_a_menu_id_index` (`a_menu_id`),
  ADD KEY `articles_a_admin_id_index` (`a_admin_id`),
  ADD KEY `articles_a_auth_id_index` (`a_auth_id`),
  ADD KEY `articles_a_active_index` (`a_active`),
  ADD KEY `articles_a_hot_index` (`a_hot`),
  ADD KEY `articles_a_point_rating_index` (`a_point_rating`),
  ADD KEY `articles_a_total_ratings_index` (`a_total_ratings`);

--
-- Indexes for table `article_keywords`
--
ALTER TABLE `article_keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_keywords_ak_article_id_ak_keyword_id_unique` (`ak_article_id`,`ak_keyword_id`),
  ADD KEY `article_keywords_ak_article_id_index` (`ak_article_id`),
  ADD KEY `article_keywords_ak_keyword_id_index` (`ak_keyword_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `commens`
--
ALTER TABLE `commens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_com_user_id_index` (`com_user_id`),
  ADD KEY `comments_com_source_id_index` (`com_source_id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guests_g_email_unique` (`g_email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_im_slug_index` (`im_slug`),
  ADD KEY `images_im_type_index` (`im_type`),
  ADD KEY `images_im_active_index` (`im_active`);

--
-- Indexes for table `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_products_ip_product_id_ip_image_id_unique` (`ip_product_id`,`ip_image_id`),
  ADD KEY `image_products_ip_product_id_index` (`ip_product_id`),
  ADD KEY `image_products_ip_image_id_index` (`ip_image_id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informations_if_seo_index` (`if_seo`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keywords_k_name_slug_unique` (`k_name_slug`),
  ADD KEY `keywords_k_active_index` (`k_active`);

--
-- Indexes for table `keyword_librarys`
--
ALTER TABLE `keyword_librarys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keyword_librarys_kwl_slug_unique` (`kwl_slug`),
  ADD KEY `keyword_librarys_kwl_hit_index` (`kwl_hit`),
  ADD KEY `keyword_librarys_kwl_active_index` (`kwl_active`);

--
-- Indexes for table `keyword_temps`
--
ALTER TABLE `keyword_temps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keyword_temps_kt_slug_unique` (`kt_slug`),
  ADD KEY `keyword_temps_kt_active_index` (`kt_active`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_m_parent_id_index` (`m_parent_id`),
  ADD KEY `menus_m_type_index` (`m_type`),
  ADD KEY `menus_m_active_index` (`m_active`),
  ADD KEY `menus_m_type_seo_index` (`m_type_seo`);

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
  ADD KEY `orders_o_guest_id_index` (`o_guest_id`);

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
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_pro_name_unique` (`pro_name`),
  ADD KEY `products_pro_menu_id_index` (`pro_menu_id`),
  ADD KEY `products_pro_type_index` (`pro_type`),
  ADD KEY `products_pro_active_index` (`pro_active`),
  ADD KEY `products_pro_admin_id_index` (`pro_admin_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_pi_product_id_index` (`pi_product_id`);

--
-- Indexes for table `product_value`
--
ALTER TABLE `product_value`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_value_pv_product_id_pv_value_id_unique` (`pv_product_id`,`pv_value_id`),
  ADD KEY `product_value_pv_product_id_index` (`pv_product_id`),
  ADD KEY `product_value_pv_value_id_index` (`pv_value_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_s_type_index` (`s_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_admin_id_index` (`admin_id`),
  ADD KEY `users_confirmed_index` (`confirmed`),
  ADD KEY `users_confirmation_code_index` (`confirmation_code`),
  ADD KEY `users_active_index` (`active`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_social`
--
ALTER TABLE `account_social`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `article_keywords`
--
ALTER TABLE `article_keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commens`
--
ALTER TABLE `commens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keyword_librarys`
--
ALTER TABLE `keyword_librarys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keyword_temps`
--
ALTER TABLE `keyword_temps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_value`
--
ALTER TABLE `product_value`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
