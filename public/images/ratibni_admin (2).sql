-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2021 at 07:44 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.2.33-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hearcut', NULL, '2021-05-04 04:51:43'),
(2, 'Beautician', '2021-04-28 11:22:32', '2021-05-04 04:50:50'),
(3, 'Masage', '2021-05-04 04:52:15', '2021-05-04 04:52:15'),
(4, 'Carpenter', '2021-05-04 04:52:53', '2021-05-04 04:52:53'),
(5, 'Appliance Repair', '2021-05-04 04:54:36', '2021-05-04 04:54:36'),
(6, 'Plumber', '2021-05-04 04:55:18', '2021-05-04 04:55:18'),
(7, 'Cleaning Disinfection', '2021-05-04 04:56:13', '2021-05-04 04:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE `device_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `device_token` text,
  `device_type` int(11) DEFAULT NULL,
  `device_id` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

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
(3, '2021_04_23_072748_create_permission_tables', 2),
(4, '2021_04_23_072905_create_category_table', 3),
(5, '2021_04_28_100844_create_categories_table', 4),
(6, '2021_04_28_112328_create_services_table', 5),
(7, '2021_04_30_075206_create_notifications_table', 6),
(8, '2021_02_25_074208_create_basic_settings_table', 7),
(9, '2021_04_30_082507_create_device_tokens_table', 8),
(10, '2021_04_30_120216_create_service_providers_table', 9),
(11, '2021_04_30_132252_create_rating_and_reviews_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `star_count` int(11) DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_and_reviews`
--

INSERT INTO `rating_and_reviews` (`id`, `user_id`, `provider_id`, `service_id`, `star_count`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 4, 'Awesome Providers', '2021-04-30 13:53:00', '2021-04-30 13:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `discount_price` double(8,2) NOT NULL DEFAULT '0.00',
  `service_image` varchar(255) DEFAULT NULL,
  `time_duration` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `service_name`, `price`, `discount_price`, `service_image`, `time_duration`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'House Cleaning/Office Cleaning', 100.00, 90.00, 'service_1620121300.jpg', '2', 'House Cleaning/Office CleaningHouse Cleaning/Office CleaningHouse Cleaning/Office Cleaning', NULL, '2021-05-04 09:41:40'),
(2, 5, 'Test', 2000.00, 100.00, 'service_1620121280.jpg', '4hrs', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-04-29 05:24:59', '2021-05-04 09:41:20'),
(3, 7, 'Test Service', 500.00, 100.00, 'service_1620121225.jpg', '1day', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to', '2021-04-29 05:25:43', '2021-05-04 09:40:25'),
(4, 1, 'Testqqqq', 0.00, 100.00, 'service_1620106025.jpg', '4hrs', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC', '2021-04-29 06:05:11', '2021-05-04 05:27:05'),
(5, 1, 'Hearcut', 99.00, 100.00, 'service_1620105944.jpeg', '23', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-04-29 06:53:30', '2021-05-04 09:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `user_id`, `category_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-04-30 07:25:41', '2021-04-30 07:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `user_type` enum('0','1','2') NOT NULL DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 => Active 0 => Inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `country_code`, `phone_no`, `otp`, `image`, `email_verified_at`, `api_token`, `role_id`, `user_type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kundan', 'Kumar', 'admin@ratibani.com', '$2y$10$5pJuG3EcIUHSAhc6S2EUz.J6oPBBS10UpopCEZOg72No2/qrPudom', NULL, '8168149353', NULL, 'user_1620107420.jpeg', NULL, NULL, 0, '0', '0', NULL, '2021-05-02 00:29:16', '2021-05-04 05:50:20'),
(2, 'Kundan', 'Kumar', 'kundancse38@gmail.com', '$2y$10$5pJuG3EcIUHSAhc6S2EUz.J6oPBBS10UpopCEZOg72No2/qrPudom', NULL, '09632587410', NULL, 'user_1619975774.jpeg', NULL, NULL, 0, '0', '0', NULL, '2021-05-02 01:21:12', '2021-05-02 11:46:14'),
(3, 'Pradeep', 'Yadav', 'pradeep.kumar@adsandurl.com', '$2y$10$fe4Q2Z96v8tw7IWq5BUmE.PQyuFohZSw9EuI.LLIsJsYIkYsrCTPK', '91', '8178945620', 5389, NULL, NULL, 'crh6XFtocn2HTEngyGkxHmky4UZjvy73q7LrrPUvgPAc7MhR5q3cAPgoqxw5eOJqSIMpCGS9VxdRlErBKm3LckmthrCMMQRrmjl3rfWfjkuPOFYouPpBCGM3yccToU3S', 0, '1', '1', NULL, '2021-05-03 09:20:06', '2021-05-03 09:20:06'),
(4, 'kunal', 'singh', 'kunal.singh@gmail.com', '$2y$10$fyJ9T9F4hPI7zydz3uZXoOUF997Dgb/0/WjVjd7oEVFQacydyckr6', '91', '8523697410', 2493, NULL, NULL, 'MGP5lmb3eyGYJ0h4ENk0seyzOKC2soUcc2h5NIVGoEvPYZhrdibtZkaUU1HrZCeZJulfjI4rlckCnTDCKty07iq5SgcoBOsRLWvssqwfOMn4Awmj4EnRPyBc3dIplkZN', 0, '1', '1', NULL, '2021-05-03 09:25:16', '2021-05-03 09:25:16'),
(5, 'kunal', 'sing', 'kunal.singh@gmail.co', '$2y$10$8D7WS32M7Wi8s4vC7wHTyeGkYETjq8AkHTC7TMO.B75ymWnS4.hUC', '91', '852369741', 5632, NULL, NULL, 'zfaf3D4vlR5S7KqUQtvFRf2qADmuAB2hu9im0RVwVS2aHw9Zf9gPsbhrFCxFXxqWwkGcr9MNcIxs37nIV4AECVb90uiebziNjocM1w2HPGFgn8QT1Ac6oxwXZihOQiLG', 0, '1', '1', NULL, '2021-05-04 07:52:21', '2021-05-04 07:52:21'),
(6, 'kunal', 'sing', 'kunal.singh@gmail.c', '$2y$10$psO2TUQ31XzsHmhvL99G0.hHF5CWYqnRnRpkjMBJiZBr.bOUmg3Ma', '91', '8523', 9228, NULL, NULL, 'BlDb5f3QrCTFoRM0SKD2x4i3HZ75SpBbFyt68lryr8otqSmmMDT9Ok4Ikp75XWORIPV7OMTBkCBKsyLLV4pDWzzz2CW2NDSdaCUF3QDDKlmXM4UQJ25WHZQQxLxDVEOX', 0, '1', '1', NULL, '2021-05-04 10:37:11', '2021-05-04 10:37:11'),
(7, 'kunal', 'sing', 'kunal.singh@gmail.ca', '$2y$10$Gdq3by1agTI6UE/ns9OB7OSejXjZRJBpS3x0vjS3ifDTxvs2LnvG2', '91', '852', 9964, NULL, NULL, '6JSrKdJWS3rBYzDIa5mhyoMtrTpWaVWmH0J3K07nhzV8QNwgBlBIfWD5uUjt7ypHbLePSLQKl23W1Ma2rXY9hj5Q1VRiz58ABAucnwhnDR4fuki3X4FgLESpGgvPscJg', 0, '1', '1', NULL, '2021-05-04 10:37:23', '2021-05-04 10:37:23'),
(8, 'ku', NULL, 'kunal.singh@gmail.caa', '$2y$10$MsxyAczz8zC3CAKqxuZcKOSsYX0oR9SnDWrFiPk5Wb8qa4Clj7KRm', '91', '85222', 3370, NULL, NULL, 'yckTzexgSko0F4RqNFP7DqnL4mSAH6AhVEQboKn3gJC0UZlLfXNegm83PbPyq2xMUo9Sbynal6uk54zXUbfapxOZQijx5Umbt4bbpzByiWuI9y59mhPrB2dXtx0zGXk0', 0, '1', '1', NULL, '2021-05-04 11:11:44', '2021-05-04 11:11:44'),
(9, 'saf SFSU’s', NULL, 'afsgsdf@mail.co', '$2y$10$k2S8elsPt0cQjl8e67ThPee6WKq4myeTpFkBaB0pFFHEVhADhpKT6', '91', '4747', 3206, NULL, NULL, '9SYpgFNrBa0olRfATkdmXvouZVC4nMwoPodo9XxbgnocDuDqKOsGmonbylZ3JzAc4ulsNG1Jb37qget8zj02CbNVkKstuMNc9azlbjv9UBLHo7KPQBVI6tNwzQXzinVK', 0, '2', '1', NULL, '2021-05-04 11:27:06', '2021-05-04 11:27:06'),
(10, 'add fafd', NULL, 'afafa@fadf.co', '$2y$10$AG4F7e9Nk4hfxOmNDWcq/OOA7P5BZ37sSaLy879IJIHuvt3OAadL2', '91', '3543543', 9749, NULL, NULL, 'kb0F7iFfehhBTXu46A1Ud5wG4DAKWquVsKyt5708JMJAV7DS1oHOnhgj0yfTFnHtNKwiWMupTu5MfVneAkKJYKUSMWUcwc6DFjVRyGxuDVFNQE5gaoL5KsnLqkcZGNfB', 0, '2', '1', NULL, '2021-05-04 11:34:55', '2021-05-04 11:34:55'),
(11, 'sagg hih', NULL, 'gjgj@jgj.bjj', '$2y$10$m4DWVSJV8WNQpGNUdBvu8eCKVyzBetSlUd3vPHHxMCbWTdUdNcRLm', '91', '76767', 6989, NULL, NULL, 'kKRRECTSjqB6z2147VbUQ7LY6UKcStHok2NiisFyEeMsuswN99Sn0FOu7eu25Q50SdlarFqyQ3MqWS9Oig8HBWOOmnGPHNqzyxci97JcMB9oYt52Mn5ZhUOe3YRL5Z7n', 0, '2', '1', NULL, '2021-05-04 11:39:56', '2021-05-04 11:39:56'),
(12, 'high jgjjg', NULL, 'gjgjgj@ghfh.bn', '$2y$10$2sdstjDNHBN3JuTO2SF7bOIU0KbC8K9Rr7hkCnzGeJXdwW/nPF1eO', '91', '4444466', 4151, NULL, NULL, 'AGNT27U3nWhGEnKH7g4Eayv40AyqHYmVshBlgEuZIKfOy9zxRthLbns2nTrM79aBnNUT4kVq2rjIREOP5si5WPVbMcAe7TKWLO469WiW7ELgLj35AXlw2x60aq2VSCxL', 0, '2', '1', NULL, '2021-05-04 11:43:43', '2021-05-04 11:43:43'),
(13, 'rede afafa', NULL, 'afafa@afafa.afa', '$2y$10$VV0EgFrHBg2heQ7KdLfZKubOutIq6k2fvSrWiErUv/3iYPb.nN/di', '91', '12121233', 6363, NULL, NULL, 'pvkAVQpMsbAE6UQXvTXcCwZ6WXuDPQWApxdAYCwXBA67J9E8vdQcNbhjkJ1porBOaYX4y8xr0U8G1HyIBCiSnxGdEe77T7rgIivgfbCGS4KJQtQ3b701wlxfq7LwGopq', 0, '2', '1', NULL, '2021-05-04 19:39:22', '2021-05-04 19:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
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
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rating_and_reviews`
--
ALTER TABLE `rating_and_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
