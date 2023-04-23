-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2022 at 09:49 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 7.3.33-2+ubuntu21.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratibni_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `about_title` varchar(255) DEFAULT NULL COMMENT 'About Title',
  `about_image` varchar(255) DEFAULT NULL COMMENT 'About Image',
  `about_description` longtext COMMENT 'About Content',
  `term_and_condition` longtext COMMENT 'Terms Conditions',
  `privacy_policy` longtext COMMENT 'Privacy Policy',
  `our_story` longtext COMMENT 'Our Story',
  `mail_driver` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_from_name` varchar(255) DEFAULT NULL COMMENT 'RatiBani',
  `mail_from_address` varchar(255) DEFAULT NULL COMMENT 'RatiBani',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `about_title`, `about_image`, `about_description`, `term_and_condition`, `privacy_policy`, `our_story`, `mail_driver`, `mail_host`, `mail_port`, `mail_encryption`, `mail_username`, `mail_password`, `mail_from_name`, `mail_from_address`, `created_at`, `updated_at`) VALUES
(1, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32', 'ASFzdvfxb', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'smtp', 'smtp.gmail.com', '587', 'tls', 'kundan.adsandurl@gmail.com', 'kundan19935', 'RATIBANI', NULL, NULL, '2021-05-03 08:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `booking_requests`
--

CREATE TABLE `booking_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `services_id` int DEFAULT NULL,
  `promocode_id` int DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time NOT NULL,
  `provider_id` int DEFAULT NULL,
  `user_requirement` text,
  `requirement_image` text,
  `status` enum('0','1','2','3','4','5') CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL DEFAULT '0' COMMENT '1=>Accepted 2=>On the way 3=>Stared 4=>Completed 5->cancled',
  `payment_status` enum('0','1') CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL DEFAULT '0' COMMENT '1 => Paid 0 => Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `booking_requests`
--

INSERT INTO `booking_requests` (`id`, `booking_id`, `user_id`, `category_id`, `services_id`, `promocode_id`, `amount`, `booking_date`, `booking_time`, `provider_id`, `user_requirement`, `requirement_image`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'RATIBNI591486', 4, 1, 4, 3, 999.00, '2021-05-04', '18:11:53', 3, NULL, NULL, '1', '0', '2021-05-04 12:41:53', '2021-05-04 12:23:00'),
(2, 'RATIBNI594864', 4, 2, 5, 3, 999.00, '2021-05-04', '18:11:53', 8, NULL, NULL, '4', '0', '2021-05-04 12:41:53', '2021-05-04 12:25:05'),
(3, 'RATIBNI5948641', 4, 2, 5, 3, 30.00, '2021-05-04', '18:11:53', 3, NULL, NULL, '0', '0', '2021-05-04 12:41:53', '2021-05-12 07:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon_image`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, NULL, NULL, NULL),
(2, 'Cleaning', NULL, NULL, '2021-04-28 11:22:32', '2021-04-28 11:29:39'),
(3, 'Hearcut', NULL, NULL, NULL, '2021-05-03 23:21:43'),
(4, 'Beautician', NULL, NULL, '2021-04-28 05:52:32', '2021-05-03 23:20:50'),
(5, 'Masage', NULL, NULL, '2021-05-03 23:22:15', '2021-05-03 23:22:15'),
(6, 'Carpenter', NULL, NULL, '2021-05-03 23:22:53', '2021-05-03 23:22:53'),
(7, 'Appliance Repair', NULL, NULL, '2021-05-03 23:24:36', '2021-05-03 23:24:36'),
(8, 'Plumber', NULL, NULL, '2021-05-03 23:25:18', '2021-05-03 23:25:18'),
(9, 'Cleaning Disinfection', NULL, 'category_1622443252.png', '2021-05-03 23:26:13', '2021-05-31 01:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `company_providers`
--

CREATE TABLE `company_providers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `company_id` int NOT NULL DEFAULT '0',
  `booking_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_providers`
--

INSERT INTO `company_providers` (`id`, `user_id`, `company_id`, `booking_id`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 1, '2021-05-12 06:02:45', '2021-05-12 06:02:45'),
(2, 3, 3, 1, '2021-05-19 11:59:02', '2021-05-19 11:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE `device_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `device_token` text,
  `device_type` int DEFAULT NULL,
  `device_id` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

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
(3, '2021_04_23_072748_create_permission_tables', 2),
(4, '2021_04_23_072905_create_category_table', 3),
(5, '2021_04_28_100844_create_categories_table', 4),
(6, '2021_04_28_112328_create_services_table', 5),
(7, '2021_04_30_075206_create_notifications_table', 6),
(8, '2021_02_25_074208_create_basic_settings_table', 7),
(9, '2021_04_30_082507_create_device_tokens_table', 8),
(10, '2021_04_30_120216_create_service_providers_table', 9),
(11, '2021_04_30_132252_create_rating_and_reviews_table', 10),
(12, '2021_05_03_175026_create_user_details_table', 11),
(14, '2021_05_03_181605_create_booking_requests_table', 12),
(16, '2021_05_12_104419_create_company_providers_table', 13);

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
(1, 'App\\User', 1),
(14, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `deep_link` varchar(255) DEFAULT NULL,
  `is_read` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 => Read 0 => Unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kunalsingh@gmail.com', '$2y$10$6yW3HqmMz9I08Hk8zXXBxe.lurtCCsRpQ2AGqw6ZeSx.JQORPRUj.', '2021-04-23 01:32:21'),
('kundan.kumar@adsandurl.com', '$2y$10$XLDjU8qAr/C5Dv8pZ8AiBOnaF9VltjGuIofYAPfsIeRtId.wOTh6u', '2021-04-25 23:18:34');

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
(1, 'role-list', 'web', '2021-04-23 02:29:53', '2021-04-23 02:29:53'),
(2, 'role-create', 'web', '2021-04-23 02:29:53', '2021-04-23 02:29:53'),
(3, 'role-edit', 'web', '2021-04-23 02:29:53', '2021-04-23 02:29:53'),
(4, 'role-delete', 'web', '2021-04-23 02:29:53', '2021-04-23 02:29:53'),
(5, 'product-list', 'web', '2021-04-23 02:29:53', '2021-04-23 02:29:53'),
(6, 'product-create', 'web', '2021-04-23 02:29:53', '2021-04-23 02:29:53'),
(7, 'product-edit', 'web', '2021-04-23 02:29:53', '2021-04-23 02:29:53'),
(8, 'product-delete', 'web', '2021-04-23 02:29:53', '2021-04-23 02:29:53'),
(9, 'category-list', 'web', '2021-05-02 07:06:02', '2021-05-02 07:06:02'),
(10, 'category-create', 'web', '2021-05-02 07:06:02', '2021-05-02 07:06:02'),
(11, 'category-edit', 'web', '2021-05-02 07:06:02', '2021-05-02 07:06:02'),
(12, 'category-delete', 'web', '2021-05-02 07:06:02', '2021-05-02 07:06:02'),
(13, 'service-list', 'web', '2021-05-02 07:06:02', '2021-05-02 07:06:02'),
(14, 'service-create', 'web', '2021-05-02 07:06:02', '2021-05-02 07:06:02'),
(15, 'service-edit', 'web', '2021-05-02 07:06:02', '2021-05-02 07:06:02'),
(16, 'service-delete', 'web', '2021-05-02 07:06:02', '2021-05-02 07:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `rating_and_reviews`
--

CREATE TABLE `rating_and_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `provider_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `star_count` int DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_and_reviews`
--

INSERT INTO `rating_and_reviews` (`id`, `user_id`, `provider_id`, `service_id`, `star_count`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 1, 4, 'Awesome Providers', '2021-04-30 13:53:00', '2021-04-30 13:53:00');

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
(1, 'admin', 'web', '2021-05-02 06:38:51', '2021-05-02 06:38:51'),
(14, 'Super Admin', 'web', '2021-05-02 10:54:46', '2021-05-02 10:54:46');

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
(1, 14),
(2, 14),
(3, 14),
(4, 14),
(5, 14),
(6, 14),
(7, 14),
(8, 14),
(9, 14),
(10, 14),
(11, 14),
(12, 14);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `discount_price` double(8,2) NOT NULL DEFAULT '0.00',
  `service_image` varchar(255) DEFAULT NULL,
  `time_duration` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf16 COLLATE utf16_general_ci,
  `service_includes` text CHARACTER SET utf16 COLLATE utf16_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `service_name`, `price`, `discount_price`, `service_image`, `time_duration`, `description`, `service_includes`, `created_at`, `updated_at`) VALUES
(4, 1, 'Room Cleaning', 500.00, 100.00, 'service_1620030812.jpg', '4hrs', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', NULL, '2021-04-29 06:05:11', '2021-05-03 03:05:05'),
(5, 2, 'Car Repering', 1000.00, 990.00, 'service_1620030707.jpg', '4hrs', 'Urban Company (formerly known as Urban Clap) is an Indian gig marketplace that offers home installation,', NULL, '2021-04-29 06:53:30', '2021-05-03 03:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `user_id`, `category_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2021-04-30 07:25:41', '2021-05-04 05:13:19'),
(3, 6, 1, 4, '2021-05-10 04:28:53', '2021-05-10 04:28:53'),
(5, 7, 1, 4, '2021-05-10 04:28:53', '2021-05-10 04:28:53'),
(6, 8, 2, 4, '2021-05-13 06:10:49', '2021-05-20 13:20:55'),
(7, 16, 1, 1, '2021-05-13 06:10:49', '2021-05-13 06:10:49'),
(8, 22, 1, 1, '2021-05-13 06:10:49', '2021-05-13 06:10:49'),
(9, 9, 2, 4, '2021-05-14 08:23:29', '2021-05-19 12:00:33'),
(10, 10, 1, 5, '2021-05-20 12:56:19', '2021-05-20 12:56:19'),
(11, 11, 1, 5, '2021-05-20 13:00:05', '2021-05-20 13:00:05'),
(12, 12, 1, 5, '2021-05-20 13:01:39', '2021-05-20 13:01:39'),
(13, 13, 1, 5, '2021-05-20 13:03:56', '2021-05-20 13:03:56'),
(14, 14, 6, 5, '2021-05-20 13:04:56', '2021-05-20 13:48:01'),
(15, 15, 1, 5, '2021-05-20 13:50:03', '2021-05-20 13:50:03'),
(16, 16, 1, 5, '2021-05-20 13:51:46', '2021-05-20 13:51:46'),
(17, 17, 1, 5, '2021-05-20 13:53:25', '2021-05-20 13:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `country_code` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `phone_no` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `otp` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '0',
  `company_id` int DEFAULT '0',
  `user_type` enum('0','1','2') CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL DEFAULT '0',
  `status` enum('1','0') CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL DEFAULT '0' COMMENT '1 => Active 0 => Inactive',
  `remember_token` varchar(100) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `experience` varchar(120) DEFAULT NULL,
  `duty` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `country_code`, `phone_no`, `otp`, `image`, `email_verified_at`, `api_token`, `role_id`, `company_id`, `user_type`, `status`, `remember_token`, `created_at`, `updated_at`, `experience`, `duty`) VALUES
(1, 'Kunda', 'Kumar', 'admin@ratibani.com', '$2y$10$5pJuG3EcIUHSAhc6S2EUz.J6oPBBS10UpopCEZOg72No2/qrPudom', NULL, '8168143353', 5012, '', NULL, NULL, 0, NULL, '0', '0', NULL, '2021-05-02 00:29:16', '2021-07-14 02:40:50', NULL, '0'),
(2, 'Kundan', 'Kumar', 'kundancse38@gmail.com', '$2y$10$5pJuG3EcIUHSAhc6S2EUz.J6oPBBS10UpopCEZOg72No2/qrPudom', NULL, '09632587410', NULL, 'user_1619975774.jpeg', NULL, NULL, 0, NULL, '0', '0', NULL, '2021-05-02 01:21:12', '2021-05-02 11:46:14', NULL, '0'),
(3, 'Pradeep', 'Yadav', 'pradeep.kumar@adsandurl.com', '$2y$10$nFos/dhUc2J/FpdRykPGKuc6w/GTeFAsqtcn64uFWc.ke64826rbq', '91', '8168149353', 7834, 'user_1620294401.jpeg', NULL, 'HlLkM5HahllkqWbQHsTNxzOIcYgrLrvojwqpru4TRPiDCLkPoqNTxYbrrOpeLhLkoGZF0YyMDaeSmGIUEE09d9H01mFqTpzmFtvihbOX9o0AGL2lfWUHoNWw5mPFIljt', 0, NULL, '1', '1', NULL, '2021-05-03 03:50:17', '2021-05-06 07:33:38', NULL, '0'),
(4, 'Suresh', 'Yadav', 'suresh.kumar@adsandurl.com', '$2y$10$UngINEFYLscjpUzlVdjqVOtAzrHN/CwqKqEacNHP8baDpMfC6bJw.', '91', '5896321470', 9001, NULL, NULL, '9RgPVYlNGYfUCIGdg89UJxEtkrsJEeDu7bSmwXfGQ5n0wDCldAQ5YklCqRDHlI4jPm5x7tCutuySCewQErGf954vYlYRLqawNA91EhpYXutHDIJ7w9SZXv7CBTvW3GOP', 0, NULL, '0', '0', NULL, '2021-05-03 04:33:54', '2021-05-03 04:33:54', NULL, '0'),
(5, 'Yogesh', NULL, 'yogesh.kumar@adsandurl.com', '$2y$10$qGZis0b5Cp4Bu5nqN8XQpu4UXEXCqGDbSGfKfAPfpW1UWZB/GFyxW', '91', '7894563210', 7711, NULL, NULL, 'mPdu4TWe4vzkoWYifUymrFmGiOKVHjNQ8Htbjpxbm15lG72VXCzWmENfHv2n9dCH28n1rhELvPA8xUIwD7CrBJvQN3SpCcfXKGQtVrs7R0m3ZRZ4CNHUMWJdKwASt7Gf', 0, NULL, '0', '1', NULL, '2021-05-04 05:40:20', '2021-05-04 05:40:20', NULL, '0'),
(6, 'Aditya', 'Kumar', 'aditya@gmail.com', '$2y$10$DGKakEwAxVUJBkGXL3LK1uAgr.3gsrjxGrWSLyvfenlNI66PLrZS2', NULL, '1478523690', NULL, NULL, NULL, 'jfR8y9qnzQrg457EasoPf07sDflVt5AjbB0ExhInbddE6H0dlzx0CN55uvXXCvX6Nsi2JCjFBhLK4PfZV9xJ8vvfVOQdTYu5kxm2Yu5f3mzt3jHphYel1NRVDmYQhOTZ', 0, 8, '0', '1', NULL, '2021-05-10 04:28:53', '2021-05-10 04:28:53', '2', '0'),
(7, 'Aditya', 'Sahani', 'adity123a@gmail.com', '$2y$10$.peef8COLHkO1EBty/5CVelj8PtWo9sxDsOvRTuJZZnripZo9V1dm', '91', '8521324715', NULL, 'user_1620721565.jpeg', NULL, 'PwTksEY7hjssNcLOnTRrysSKJYCaot78GKpQjVBc8WHHDh9jiFfWWKQfS9AwhzPtKHeeNJa4DZ7wbY6X8iDLuxEGiHVo0daJiKq0vcBHnnMJyZS79VGstBAWSGg2XkGF', 0, 8, '0', '1', NULL, '2021-05-10 06:02:01', '2021-05-11 02:56:05', '4', '0'),
(8, 'Aditya', 'Sahani', 'adity1223a@gmail.com', '$2y$10$boPB2SoIxnva7XzVCEhb9.Ie6ORbOuPutO.M5PKMP/H1XN5BOBt6q', '91', '8521324717', 5046, 'user_1621536655.jpeg', NULL, 'zT7m12eaVBuPTsyQEDnvrvy7hL9pZmFC0AE3lFNSkMFbaMNjUoWBA9W5BvubusiRc8DFXF2gJKnTgDorienR2DHP33Hvi2x0zrZks1YeOlq2ujdLIa9sl1hKLYeuMULO', 0, 0, '2', '1', NULL, '2021-05-13 03:17:19', '2021-05-20 13:20:55', '4', '0'),
(9, 'Aditya', 'Sahani', 'adity12ww3a@gmail.com', '$2y$10$IXGq8OVE9HQxeUoQBAZRte5vxldVhfiax04SPyEEdJ4t12ArDGlGG', '91', '8521324723', NULL, 'user_1621445433.jpeg', NULL, 'fkfcAJjBzOBRTz22rW1BNHW9OqjdBF9OTw4N4cCgql7Jqk9Lqf2ArV3kWp0u1A1fnMVWu4An2PpMBGjrbW35l4F0hRndTlT6IxbkwbnH5cyJWTgqDGsCapYbx6qVtcXa', 0, 3, '1', '1', NULL, '2021-05-14 08:23:29', '2021-05-19 12:00:33', '4', '0'),
(10, 'Rakesh', 'Kumar', 'rakesh@gmail.com', '$2y$10$/FVc95XUbABdSQd/SpXuaObra1tIOgB1og/kh4bFu/NWzA5Zlo4yG', '91', '99963214724', NULL, 'user_1621535179.png', NULL, 'U9MvNvXnm8qQKfmsIcXmK715ZC3a6jpk6jJTDneaoTT05c0n1iBs84OO9HZKcqUz4wC7jnyRDYHvCHoOLbga7fkDa69BkcXA6ptsrbjE2TwOBrVSb6OB0pjpXrkkHyTD', 0, 8, '1', '1', NULL, '2021-05-20 12:56:19', '2021-05-20 12:56:19', '2', '0'),
(11, 'Ramesh', 'Kumar', 'ramesh@gmail.com', '$2y$10$ed3QOoH139oDMnN8vz9vD.ITFEb8lV67ZIZjoIjBsMJNz19eqVTqa', '91', '3698521470', NULL, 'user_1621535405.png', NULL, 'vjD7O28v9gURsfICSevzaPJsk0TV3Ja8DmKY5nOHLAGbZ38tauky5xrSLBnrVgT0TAv380M0GXu5uJxMr96yy2NAHnhfuWODnnQZg81VlES5O2EoOGtw3y9PhuaRvl8F', 0, 8, '1', '1', NULL, '2021-05-20 13:00:05', '2021-05-20 13:00:05', '2', '0'),
(12, 'Ramesh', 'Kumar', 'Santosh@gmail.com', '$2y$10$mdLgPif8o7xsX4BvDGLPXen4vQY/8XdsIR0EOv3UBpLNH8q.mCfsm', '91', '9875642350', NULL, 'user_1621535499.png', NULL, 'ruPpYXfjRSnT9IF0U8DSAx5EFEmjvFVCZnMIIucToSp5CIpXn5xB4EIBza6LNtH5VkyuuI0AMWgb25PyJgsbmxGEkV8FfuEOZOqRBPDCGCUTZdyyyyQgLQK66usCoOCn', 0, 8, '1', '1', NULL, '2021-05-20 13:01:39', '2021-05-20 13:01:39', '2', '0'),
(13, 'Ramesh', 'Kumar', 'sanjeet@gmail.com', '$2y$10$f5gTuOZubJfMUqFS4L.oNOOcyMvU..KXtatNuAe65OJ6YtUHGUsEy', '91', '9875632410', NULL, 'user_1621535636.png', NULL, 'yzyMCIFJmpanRjVRRPkORVTy9JDoUOCZq2WRrYDKASrCdj6xirfALZOmb9aQm2ZG8BzMQFnzo90RQ5TyYvKWfMwI3ndDFyGuN2Dof7wvSLazFSAbPDHCHwJWjGdVEMcp', 0, 8, '1', '1', NULL, '2021-05-20 13:03:56', '2021-05-20 13:03:56', '2', '0'),
(14, 'Chandan', 'Kumar', 'chnadan@gmail.com', '$2y$10$g0ip/IqLnBPWfrkTgDCGA.7RInMviRzWvk3ld.COtPWMBg9n2Oeb6', '91', '98789564123', NULL, 'user_1621538281.jpeg', NULL, 'uphhY7ZKxenRsf8WVX0AnXv0wBkoGt33Y1BKDaLB6HtAEiFJpkEa6B8d7ZPBzVN73kp5gMgvcCUcOwvh90o5U2F8aguEKiiyvvOsVT09x0GnpgKNJ0Yyk3DFgUgiszZW', 0, 8, '1', '1', NULL, '2021-05-20 13:04:56', '2021-05-20 13:48:01', '2', '0'),
(15, 'Chandan', 'Kumar', 'champa@gmail.com', '$2y$10$HEUOg8BI45l63zH0oSDYOuLZh06KFvZ6JJyyviGf9.f5OUEYycbz2', '91', '859687456987', NULL, 'user_1621538402.png', NULL, 'dTCMsor1UxbpsESj9AjWc99JsnncBoX1tAvHWRINp338OeYPYQjmnqYbfEee3afK5wiaOADtb4sE6Y1M7JTBGUfjGTy504ROpzf97sM8tmfp1RjF77dLa1Kttyj2TKwH', 0, 8, '1', '1', NULL, '2021-05-20 13:50:03', '2021-05-20 13:50:03', '2', '0'),
(16, 'Raunak', 'Kumar', 'raunak@gmail.com', '$2y$10$buZBZnQ1x5BbFPFAnrjpqOZWyhtjMoL7FI3APMVogi9YJs.aWUTJG', '91', '874587596874', NULL, 'user_1621538506.png', NULL, 'rLdTa1MXhIP9pRIIzpKtUwoq4JsxvqfgSj24ekLEWALpUxkIf8mWkBhebEqq1PeS037joPwffzDzJG0InWUsSfWdk6tPCxAifPgSbG7jSNic89iaKhLFxF0oY4uJI9ja', 0, 8, '1', '1', NULL, '2021-05-20 13:51:46', '2021-05-20 13:51:46', '2', '0'),
(17, 'Raunak', 'Kumar', 'rauna12k@gmail.com', '$2y$10$N5nxOSgShHj6rb3VHH.ldeAkoC9xZ2.E7SOJjdKmcqxzy7zoEnhx6', '91', '7895896875', NULL, 'user_1621538605.png', NULL, 'hlFvDIcItmh48OBe2HzSlAFkGqAKp7k8NdwVA3ycsGrb7VH7QG4VZUBnjTctzCFkGOOk0jhZWcu1cfY1mymExLckh5VaXnXWijmxm8Mn0LVQ7dr7HYUgtY2BiGgzNaaK', 0, 8, '1', '1', NULL, '2021-05-20 13:53:25', '2021-05-20 13:53:25', '2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `country`, `state`, `city`, `zipcode`, `address`, `landmark`, `created_at`, `updated_at`) VALUES
(1, 4, 'India', 'Delhi', 'New Delhi', '110085', '2nd Floor, 29, Shivaji Marg, Moti Nagar, Block C, Kirti Nagar, New Delhi, Delhi 110015', 'Shivaji Marg, Moti Nagar, Block C,', '2021-05-04 12:44:57', '2021-05-04 12:44:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_requests`
--
ALTER TABLE `booking_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_providers`
--
ALTER TABLE `company_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_tokens`
--
ALTER TABLE `device_tokens`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- Indexes for table `rating_and_reviews`
--
ALTER TABLE `rating_and_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_requests`
--
ALTER TABLE `booking_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company_providers`
--
ALTER TABLE `company_providers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rating_and_reviews`
--
ALTER TABLE `rating_and_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
