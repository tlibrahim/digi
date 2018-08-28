-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2018 at 01:19 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `admin_new_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nmoflikes` int(11) NOT NULL DEFAULT '0',
  `nmofshares` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_credential` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `company_id`, `address`, `location_name`, `location_credential`, `phone`, `email`, `facebook`, `twitter`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'First Branch', 1, 'our address', 'madiie', '78954 453464', '010011012', 'branch@branch.com', 'www.b.com', 'www.b.com', 'www.b.com', NULL, NULL),
(2, 'dddd', 2, 'dfgdfg', '', '', '23323232', 'mohab@gmail.com', 'jkjkjk.fjkjfk', 'twitter.com/digi-sail', 'instgram.com/digi-sail.com', '2018-07-15 18:52:22', '2018-07-15 18:52:22'),
(3, 'dddd', 2, 'dfgdfg', '', '', '23323232', 'mohab@gmail.com', 'jkjkjk.fjkjfk', 'twitter.com/digi-sail', 'instgram.com/digi-sail.com', '2018-07-15 18:55:11', '2018-07-15 18:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `branch__gallaries`
--

CREATE TABLE `branch__gallaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `image_url` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch__gallaries`
--

INSERT INTO `branch__gallaries` (`id`, `branch_id`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 3, 1531680911, '2018-07-15 18:55:11', '2018-07-15 18:55:11'),
(2, 3, 1531680911, '2018-07-15 18:55:11', '2018-07-15 18:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `isverified` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_id` int(10) UNSIGNED NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_credential` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverphoto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `progress` int(11) NOT NULL DEFAULT '15'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `isverified`, `name`, `industry_id`, `intro`, `address`, `location_credential`, `location_name`, `founded`, `hotline`, `email`, `website`, `facebook`, `twitter`, `instagram`, `googleplus`, `logo`, `coverphoto`, `open_from`, `open_to`, `created_at`, `updated_at`, `progress`) VALUES
(1, 1, 'Digi Sail', 3, NULL, NULL, NULL, NULL, NULL, NULL, 's8i1J4FM@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-15 17:58:20', '2018-08-01 11:31:46', 100),
(13, 1, 'Jumaira', 1, 'أفضل الخدمات العقاريةمن بيع و شراء و تشطيبات و تسويق عقارى  من خلال بحث شامل و دقيق من فريق بحث مختص فى المجال  العقارى لتقديم أفضل المتاح من شقق و محلات و أراضى فى الأكثر المناطق إستثمارا و تميزا. نحن شركة مسوقة لأفضل الكباوندز الشركات المساهمة المصرية و منها The pyramids    Maalem - Mousa cost  التجمع الخامس - العاصمة الادارية - الشروق - 6 اكتوبر - العين السخنة و مناطق اخرى ساحليه ,,,.تم تاسيس شركه اليازجى 1984 فى فلسطين غزة', '25 ش عبد الرازق السنهورى متفرع من عباس العقاد مدينه نصر Cairo, Egypt', '(30.0444196, 31.23571160000006)', NULL, '1984', '02 2275177', 'wyvTBH8y@gmail.com', NULL, 'https://www.facebook.com/pg/JumeirahYazg', '#', '#', '#', '1532057869.jpg', '1532057869.jpg', '09:00', '10:00', '2018-07-19 16:07:45', '2018-08-01 11:32:03', 100),
(17, 1, 'New Property', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'DoDiXkFZ@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-22 22:24:15', '2018-08-01 11:32:10', 100),
(21, 1, 'Get Way', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'en50e5em@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 05:37:46', '2018-08-01 11:32:25', 100),
(22, 1, 'مصابيح موفرة', 1, NULL, NULL, NULL, NULL, NULL, NULL, '46SjiYoU@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 05:39:59', '2018-08-01 11:32:31', 100),
(23, 0, 'Cornet Dore', 2, NULL, NULL, NULL, NULL, NULL, NULL, 'RRXHrMqk@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 05:51:35', '2018-08-01 11:32:36', 100),
(24, 0, 'اجيال', 5, NULL, NULL, NULL, NULL, NULL, NULL, 'AV93aipI@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 05:58:41', '2018-08-01 11:32:45', 100),
(25, 0, 'ريفى', 6, NULL, NULL, NULL, NULL, NULL, NULL, 'dAN9yaBE@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 06:04:45', '2018-08-01 11:32:53', 100),
(26, 0, 'المصرية الدولية', 5, NULL, NULL, NULL, NULL, NULL, NULL, 'Z2iPLK0R@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 06:09:44', '2018-08-01 11:33:00', 100),
(27, 0, 'icc', 7, NULL, NULL, NULL, NULL, NULL, NULL, 'UmbLScQi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 06:14:32', '2018-08-01 11:33:13', 100),
(28, 0, 'مجلة ألوان', 8, NULL, NULL, NULL, NULL, NULL, NULL, '2rUXU9FZ@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 06:30:30', '2018-08-07 07:53:08', 100),
(29, 0, 'الفا مصر تكنولوجى', 9, NULL, NULL, NULL, NULL, NULL, NULL, 'OXyg6gQu@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 06:36:12', '2018-08-07 07:44:16', 100),
(30, 0, 'أونلاين استور', 9, NULL, NULL, NULL, NULL, NULL, NULL, '5XJsfKkB@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 06:43:02', '2018-08-07 07:47:23', 100),
(31, 0, 'Medical Devices Center', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'xIxiLUrT@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 06:46:59', '2018-08-05 07:35:36', 100),
(32, 0, 'اسكوت', 3, NULL, NULL, NULL, NULL, NULL, NULL, '3OGODj99@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 06:50:46', '2018-08-07 07:45:37', 100),
(33, 0, 'اورسيا تورس', 2, NULL, NULL, NULL, NULL, NULL, NULL, 'IXycZoDq@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 19:15:19', '2018-08-02 12:25:56', 100),
(34, 0, 'ديار مصر', 1, NULL, NULL, NULL, NULL, NULL, NULL, '5kutwGLx@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 20:33:38', '2018-08-05 07:08:22', 100),
(35, 0, 'Chalmer Gal', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'oA8vRlNw@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 20:35:56', '2018-08-01 11:34:11', 45),
(36, 0, 'ميديا مكس جروب', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'XzBVINKs@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 20:59:19', '2018-08-02 11:00:32', 100),
(37, 0, 'Drissis', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'XOPWGCB4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:01:41', '2018-08-02 10:36:23', 100),
(38, 0, 'اتيلية محمد ندا', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'V3zGn8xu@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:07:52', '2018-08-01 11:34:31', 45),
(39, 0, 'مجموعة شركات', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'tHhB6dpK@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:09:50', '2018-08-01 11:34:38', 45),
(40, 0, 'سيتى لاب اليت', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'LjaingPe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:12:17', '2018-08-01 11:34:46', 45),
(41, 0, 'بايكر كود', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'KA2CwVgq@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:17:26', '2018-08-01 11:34:58', 45),
(42, 0, 'صلحنى', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'UNAMNDNe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:21:04', '2018-08-01 11:35:02', 45),
(43, 0, 'السبع', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'rwbxeeEM@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:24:52', '2018-08-01 11:35:08', 45),
(44, 0, 'I CAT', 1, NULL, NULL, NULL, NULL, NULL, NULL, '33TevtQL@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:31:08', '2018-08-01 11:35:13', 45),
(45, 0, 'M Real Estate', 1, NULL, NULL, NULL, NULL, NULL, NULL, '08gGYogj@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:32:46', '2018-08-01 11:35:19', 45),
(46, 1, 'سيف', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'X2jNP7Hv@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:34:35', '2018-08-01 11:35:24', 100),
(47, 0, 'الخضار . كوم', 1, NULL, NULL, NULL, NULL, NULL, NULL, '7B0ZNIZh@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-23 21:36:59', '2018-08-01 11:35:32', 45),
(69, 1, 'East Cairo', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Yn1Um4SM@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26 02:37:40', '2018-08-01 11:35:42', 100),
(71, 0, 'Concept', 10, NULL, NULL, NULL, NULL, NULL, NULL, 'szo0BMJt@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26 03:02:56', '2018-08-01 11:35:48', 45),
(72, 0, 'شركة شحن', 11, NULL, NULL, NULL, NULL, NULL, NULL, '40YM2FLS@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26 03:10:37', '2018-08-01 11:35:53', 45),
(73, 0, 'كورينى تورينبد', 2, NULL, NULL, NULL, NULL, NULL, NULL, 'cSZ21X4E@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26 03:16:34', '2018-08-01 11:36:00', 45),
(74, 0, 'تحت الانشاء', 12, NULL, NULL, NULL, NULL, NULL, NULL, 'wbL1RYmz@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26 03:55:14', '2018-08-01 11:36:06', 45),
(75, 0, 'PFS', 13, NULL, NULL, NULL, NULL, NULL, NULL, 'aFFnQaDv@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26 16:38:14', '2018-08-02 10:58:43', 100),
(76, 0, 'Metro', 14, NULL, NULL, NULL, NULL, NULL, NULL, 'PZ4Tayff@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26 16:45:35', '2018-08-01 11:36:18', 45),
(77, 0, 'دريسيس', 15, NULL, NULL, NULL, NULL, NULL, NULL, 'bBg3qzGh@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26 17:05:34', '2018-08-01 11:36:26', 45),
(78, 0, 'Supplies', 16, NULL, NULL, NULL, NULL, NULL, NULL, 'c9F6YiEM@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-26 17:08:46', '2018-08-01 11:36:33', 45),
(79, 0, 'just for test', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Q55kjopD@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-01 06:05:49', '2018-08-07 07:35:09', 45),
(80, 1, 'qwdqwdqwdqwdqwd', 1, NULL, NULL, NULL, NULL, NULL, NULL, '5gvONmSJ@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-01 08:02:02', '2018-08-01 11:36:44', 100),
(81, 0, 'qwdqwdqwd', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'pDE8zZgb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-01 09:15:05', '2018-08-26 09:15:48', 100),
(82, 0, 'qwdqwd', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'fFvXV71L@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-01 09:28:56', '2018-08-07 07:38:06', 100),
(83, 0, 'test', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'aMrUpZdp@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-02 11:02:02', '2018-08-02 11:03:12', 100);

-- --------------------------------------------------------

--
-- Table structure for table `companies_moderators`
--

CREATE TABLE `companies_moderators` (
  `id` int(10) UNSIGNED NOT NULL,
  `crm_user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `start` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies_moderators`
--

INSERT INTO `companies_moderators` (`id`, `crm_user_id`, `company_id`, `start`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-07-15 18:01:15', '2018-07-15 19:16:06'),
(2, 2, 3, 0, '2018-07-16 09:45:24', '2018-07-16 09:45:30'),
(3, 2, 1, 0, '2018-07-19 11:12:22', '2018-07-19 14:46:52'),
(4, 7, 10, 0, '2018-07-19 14:46:19', '2018-07-19 14:46:28'),
(5, 7, 1, 0, '2018-07-20 20:36:51', '2018-07-20 20:46:29'),
(6, 7, 1, 1, '2018-07-22 16:58:13', '2018-07-22 16:58:13'),
(7, 7, 13, 1, '2018-07-22 16:58:13', '2018-07-22 16:58:13'),
(8, 7, 17, 1, '2018-07-22 22:35:04', '2018-07-22 22:35:04'),
(9, 4, 1, 1, '2018-07-23 23:41:45', '2018-07-24 00:44:33'),
(10, 4, 13, 1, '2018-07-23 23:41:46', '2018-07-23 23:41:46'),
(11, 4, 17, 1, '2018-07-23 23:41:48', '2018-07-23 23:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `company__users`
--

CREATE TABLE `company__users` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `privlage_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` int(11) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company__users`
--

INSERT INTO `company__users` (`id`, `company_id`, `privlage_id`, `name`, `email`, `password`, `phone`, `confirmed`, `confirmation_code`, `verification_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 'Safe', 'safee@gmail.com', '$2y$10$cQCo2QlNQauHTHJIDrcdLeqsbReGfGNM4AmnPz8jSOaslxrmo0rCa', NULL, 0, NULL, NULL, NULL, '2018-07-15 19:08:41', '2018-07-15 19:08:41'),
(4, 4, 1, 'xxx', 'mhassan@digis.co', '$2y$10$UpLwD7YrQFxacehZSWh5..nRWPv.bZWJqnHkLyWgmxwO/TO8dFNEO', '01001281110', 0, NULL, NULL, NULL, '2018-07-15 19:42:08', '2018-07-15 19:42:08'),
(6, 3, 0, 'Mohammed Saqer', 'saqer@digi-sail.com', '$2y$10$Fu3sOupXhipawh5AE.cUSeQej7SW7UpkYhW/IpxTtd.31BfzCaCgi', '01234567890', 0, 'f6zh10utUmJNyPZnw4UBW3U41tAG3G', 'j1fL4csJ', NULL, '2018-07-17 13:30:46', '2018-07-17 13:30:46'),
(7, 5, 1, 'qweqwe', 'mhasd@ddo.com', '$2y$10$VmbB26BDQdwra6AZkSRXEeZh6a7VTOzIwqx8tQujZvJj745YMI.ue', '9123123', 0, NULL, NULL, NULL, '2018-07-18 09:07:16', '2018-07-18 09:07:16'),
(8, 6, 1, 'asdasdasd', 'asd@dasd.co', '$2y$10$VFggM3I.7fYpHR9AaCYp2OTS0LGNGh1q.lZXkABDUtT.pmYFDXqFq', '12312424654', 0, NULL, NULL, NULL, '2018-07-18 13:39:49', '2018-07-18 13:39:49'),
(9, 7, 1, 'asdkhasjd', 'asd@asd.com', '$2y$10$iASII3MjMhoP7AWmOMznxek4M7iZebkED08OJhTwJqwOxY/Si0LQO', '1928381273', 0, NULL, NULL, NULL, '2018-07-18 18:24:51', '2018-07-18 18:24:51'),
(18, 12, 1, 'asdasd@asd.com', 'asdasd@asd.com', '$2y$10$puelvxPd.uvcU7JMP5hSzeQuHNEvTfGv2B8BEiQI4Lx0XbnQtNGTm', '011111111111', 0, NULL, NULL, 'Bb6T2QIwlnhPw0GBeZcAIVaK0OQ78NdOTwvUXRLWcTqQYZV50LxVRZzc2clW', '2018-07-19 14:08:19', '2018-07-19 14:08:19'),
(19, 13, 1, 'Salim Mazin', 'sleemm@gmail.com', '$2y$10$lUzbI.MDOTlwwtlOejJkeeEDx0GN4NmW.LY5KCQfJRncfmoiQ/yRW', '01028138380', 1, 'XN8IaQ1xLHHqjyojf34PN1pGVDgTBD', '6OlC218D', 'ozRLQ7X0G7Tqsf18BfdTtYBgcJcbreFalITfxnXD6xLan6WMQHrfgclnZEPw', '2018-07-19 16:10:18', '2018-07-22 21:23:45'),
(20, 1, 0, 'Mohamed', 'mhassan@digi-sail.com', '$2y$10$ojtVhOcFZ94cX.eMDmKaSOMhx41VEsWyqJZyuPN/YNsgbKlo0FhS2', '01001281110', 0, 'q7ruTKDAyNibFkdsi8EgxUSs7GiQwY', 'FBQxeEaB', NULL, '2018-07-19 16:38:59', '2018-07-19 16:38:59'),
(21, 1, 1, 'Yara', 'yara@digi-sail.com', '$2y$10$eyAvFGG1Gt61AurU/88WguygvMcVQFkx5nOEAfZPM0hytpAuqdX0y', '01001281110', 0, 'acFjDSehZW5FpbpRzPn4yML1hom8IX', 'QxqBoOBu', NULL, '2018-07-20 20:29:22', '2018-07-22 23:10:47'),
(23, 14, 1, 'Digi Sale', 'developer@devloper.com', '$2y$10$t/b0FXWCGVUaoUgGGKU5Qe.mjIqlacQnn1UaVa25jp5VQifz7FSoG', '011111111111', 1, 'acFjDSehZW5FpbpRzPn4yML1hom8Ia', 'QxqBoOBu', '5ts1xTQLKtdhSOZ8uJG9xXFBdMCn5eSLA0eh0Lf6xhwUQAfjAE6HRJsb5alh', '2018-07-21 01:33:43', '2018-07-21 01:33:43'),
(24, 15, 1, 'asdasdasd', 'asdasdasd@asdasdasd.co', '$2y$10$7bfRP8n6Jgwy/4XiwK0B4.R2y219qqRE4tJq3Qv2QemyQRsX6hhzO', 'asd', 0, NULL, NULL, NULL, '2018-07-22 06:39:12', '2018-07-22 06:39:12'),
(25, 16, 1, 'Hassan', 'hassan.anwer26@gmail.com', '$2y$10$grr8XEUNxyRLTqjdSUlFB.DKzz4ZkIrA4EZGGAwLoqAeD8FSRcvcq', '01004340013', 0, NULL, NULL, NULL, '2018-07-22 13:22:12', '2018-07-22 13:22:12'),
(27, 13, 2, 'nermeenyazgy@gmail.com', 'nermeenyazgy@gmail.com', '$2y$10$OIcp6vva70yYXQmPNskZoOzd17ron9hHlmjmLEC9qmtJqVz.m853K', NULL, 0, NULL, NULL, NULL, '2018-07-22 22:23:35', '2018-07-22 22:23:35'),
(28, 13, 2, 'nermeanasamyazgy@gmail.com', 'nermeanasamyazgy@gmail.com', '$2y$10$A1BHtML7CdBHJTY0iCgVDOGFUFCNfJ/RJv2zpLQ.Z/S2.RwQeG3ee', NULL, 0, NULL, NULL, NULL, '2018-07-22 22:26:01', '2018-07-22 22:26:01'),
(29, 17, 1, 'Ahmed', 'info@np-egypt.com', '$2y$10$Jx1fgsiQ7cn1mUiAWSFp4uNBMTJlDnJPdd3R15youe8xfYtvQ5Bue', '01008916141', 0, 'RHS2KWpjZWB6nUNOB2F28TQESEe19k', 'VI8WLkih', NULL, '2018-07-22 22:30:38', '2018-07-22 22:30:38'),
(30, 13, 2, 'digisaileg@gmail.com', 'digisaileg@gmail.com', '$2y$10$W0Xui6lqW8wb5Gj0aLeYDemevT/SMZxP64hSNUfXsJUJpj8z/CRga', NULL, 0, NULL, NULL, NULL, '2018-07-22 22:43:14', '2018-07-22 22:43:14'),
(38, 19, 1, 'Kamel Maklad', 'kamel.maklad@hotmail.com', '$2y$10$1gfKMedctm8DAMpkrgNsE.8rEVqKD8L/4bRaFxZQ4kI2shZNIz40y', '01003307564', 0, '0rzGfOZ37xvxfwMDE1DPkJb2rp5hEY', 'GhOKc5KD', NULL, '2018-07-23 05:28:37', '2018-07-23 05:28:37'),
(39, 20, 1, 'Mohammed Amer Al-Mollawee', 'rubellamarket@yahoo.com', '$2y$10$hoKZd3QKqdVM2VcN2v/W9uj4G2Ph1Bb3BTYQsqVVas7KkTX/ALozG', '01092324249', 0, 'qFyoUzM0RTpMfdaAI073UpkkTYOCIP', 'XpqTKYZ8', NULL, '2018-07-23 05:30:57', '2018-07-23 05:30:57'),
(40, 23, 1, 'Ayman Fragalla', 'aymanfragalla@gmail.com', '$2y$10$b3ZplgGg61O.Qqx0BTNImeSjm6PuF.qfA5XaGxruz2tXXpaxHHAiq', '01006660193', 0, 'T3NMJhfz6s7AqmBQte7RqQuWPbwuax', 'Ng2Ipl7q', NULL, '2018-07-23 05:51:59', '2018-07-23 05:51:59'),
(41, 24, 1, 'Wael Ibrahim', 'wael_07@hotmail.com', '$2y$10$DekxMJbEvh3hKV8Qf3PNcuLjV63p/ocodiHrS1GYbJncfQfc9PO9S', '01221749808', 0, 'Ykk9sp9prKxir9i6v71XPLAgdYqmZB', 'RRPOfYRT', NULL, '2018-07-23 05:59:35', '2018-07-23 05:59:35'),
(42, 25, 1, 'Youssef Essam El-Din', 'youssefaly2003@gmail.com', '$2y$10$2NKJAswbaSk1WBUqtM4h.Ozsm7C8KscNMV7.4VfdO.aSelBVgnxv2', '01003324559', 0, 'cWWOqWjs3mQ602n4dBS36TFDTNiwZS', 'ANcUXHsI', NULL, '2018-07-23 06:05:09', '2018-07-23 06:05:09'),
(43, 26, 1, 'Ayman Mohammed Ali', 'ayman.moha.ali@gmail.com', '$2y$10$75VlP3lhF4ZUGzya7pRlDO4En333RHbdInS.cpKV.L0p3j1Ohv0/2', '01028240501', 0, 'ltNnR7WjY4oPHGtdqKkmTaU4d4DfgC', 'jRvKWUAA', NULL, '2018-07-23 06:10:12', '2018-07-23 06:10:12'),
(44, 27, 1, 'Mohamed Abdel Hamid', 'm.abdelhamidegypt@iccgroup.org', '$2y$10$ftrDYifGoQ9rz6KBrlLcbujAbIAzd9eKuLndAdgpxtsipGcAB.B.O', '01117009621', 0, 'pyVloLTFw1Gn45FXpOdXdxNxaD9qVq', '2AeLWtDT', NULL, '2018-07-23 06:14:49', '2018-07-23 06:14:49'),
(45, 28, 1, 'Basma Aziz', 'x@d.com', '$2y$10$njbTI7r2d82c3x1pD7tS/OlPIufmxQ4RegiNJDoUHBx4BuW2ypoH6', '01012933962', 0, 'VyPWpzYwmdqE8udLYOqOhf7OoA2jBd', '1XRc61cY', NULL, '2018-07-23 06:32:00', '2018-07-23 06:32:00'),
(46, 29, 1, 'Emad Samir', 'x@gmail.com', '$2y$10$pG7D7kiUcp4hKOgb3OnTPuOEFdBFEir6N.ry88pV162epzyZ9EBfK', '01146953007', 0, 'Ol5D5rCObsvXm4mBbGkgHet497vm7Y', 'Ua8V8U86', NULL, '2018-07-23 06:36:35', '2018-07-23 06:36:35'),
(47, 31, 1, 'Khaled M. Salamah', 'xx@gmail.com', '$2y$10$klPAdSPv10CIrg44GdHVI.h1n.QVDSywdOWC.68tOIsLn8zkuhcm2', '01000007175', 0, 'nQNLPI8a4HARt1I3mNENwDH66zSPOh', '7xmBS2OS', NULL, '2018-07-23 06:48:39', '2018-07-23 06:48:39'),
(48, 32, 1, 'Asmaa Yahia', 'asmaayahia796@yahoo.com', '$2y$10$uhdbBlAK0MKXf.BfQf5j8ul3vgVuJG6/U1tNwR05IHRouXrTiLBQi', '01097071738', 0, 'AdoBfy3YF2qqxnbeHEavoAwh31pQP0', 'UEMXhMCK', NULL, '2018-07-23 06:51:09', '2018-07-23 06:51:09'),
(49, 33, 1, 'Mohamed Moftah', 'mohamed@eurasiatours-eg.com', '$2y$10$H5uXLWt7NTNxJcpj0wpz1Ocl/0oMQxqClcCaXcyqQyY6aKXxFuxM6', '201101311110', 0, 'qt073zcN5Tz84eOti6mIij4lsofe7P', 'skF1qx0C', NULL, '2018-07-23 19:24:25', '2018-07-23 19:24:25'),
(50, 34, 1, 'Hossam Hamdy Abdel Kader', 'hh.abdelkader@gmail.com', '$2y$10$1pUKdCkxF/7nIYR1ICfl2.q.shXvM8VEmki3xt1qo0om1OpIZTW7W', '01006888914', 0, 'wTCSryq6gCijgtL3vIuXd92lVuLLMG', 'NX0wjQ5v', NULL, '2018-07-23 20:34:29', '2018-07-26 03:08:36'),
(51, 35, 1, 'Ali Omar', 'aliomar31@hotmail.com', '$2y$10$5hy10zGAs4.EKKGNQbecaO/ity8Sno67frsERsOcv3w9rDvJP4xte', '201146955590', 0, 'NjmrdWslXRXJSAtkhafUfWQmQq6xD0', '3F3Qmcww', NULL, '2018-07-23 20:37:32', '2018-07-23 20:37:32'),
(52, 36, 1, 'Osama Atef Yassin', 'osaatef@yahoo.com', '$2y$10$Rw9qEdah/7rxeoaE6Hg83Ou42FxocEY6Xp5bQ2iC.ZTwKXamXD.fu', '201282408283', 0, 'Jr5c07rf96BJr9MC0UQ1bOM3u9X4ls', 'YgnJpSl1', NULL, '2018-07-23 21:00:10', '2018-07-23 21:00:10'),
(53, 1, 1, 'Omar Samy', 'moromark@yahoo.com', '$2y$10$8V2qEyv.kPmJDUQFKMfn0eGTST20FxGhvjHb01TTSn0jcqWuPDYm6', '201022262989', 0, 'KRMRwQfqdiJJN4dqRDRzvjRD2Y11sH', '7XxlsDB0', NULL, '2018-07-23 21:02:49', '2018-07-23 21:02:49'),
(54, 38, 1, 'Mohamed Nada', 'mohamednada015@gmail.com', '$2y$10$e6eOdUDmkfszHpNjofhztesYDuHsr0V.XRfBtQpjb.6QIVK0iw/9S', '201098450450', 0, 'lCgj0bpj48r6XQHgXY9k9IVOzvhTZW', 'wLB31Y25', NULL, '2018-07-23 21:08:39', '2018-07-23 21:08:39'),
(55, 39, 1, 'Mohamed Fathy Khattab', 'it@concord-s.com', '$2y$10$PzAI1pHbgO1EAZFV.qzS2uj0JSDmAcAbiFBxK6RAI0Co51qcNQ22C', '201001251474', 0, 'd4TpyWU3F9quhstAbGlLTMX59ifiPf', 'zwNF7Vre', NULL, '2018-07-23 21:11:14', '2018-07-23 21:11:14'),
(56, 40, 1, 'Mohamed El Mahdy', 'moo7amedz@gmail.com', '$2y$10$P94OETBuHWUXhwdbt5XMGOO./jnybZftPLGlUTvgVcECMi8372e/y', '201097448899', 0, 'vIAwx7rk82P2hqeV3MMlc24QCXddoX', 'ZUQJm4a5', NULL, '2018-07-23 21:14:09', '2018-07-23 21:14:09'),
(57, 41, 1, 'Sherif Abdul Aziz', 'sherif.6666@yahoo.com', '$2y$10$t5IeAsiksMlMtImTUCTC3.187pAqHrvK1P7Uw8oF8P5l42FYzgONO', '201000777776', 0, 'iM0WA40tiDrBHn91jgy6ixE4U7zFKQ', 'IDQZz7Xd', NULL, '2018-07-23 21:18:53', '2018-07-23 21:18:53'),
(58, 42, 1, 'Mahmoud Cupo', 'Mahmoudcupo12@gmail.com', '$2y$10$s91sZlNmsCyo4UOYPQX8t.oTNZz9z77vdLeA1rcNmuMdYu0Dor2Su', '201288709898', 0, 'tfwd1EzKkFgITN90ygCrEkjQWVdTeP', 'mndxGAFt', NULL, '2018-07-23 21:23:49', '2018-07-23 21:23:49'),
(59, 43, 1, 'مهندس حسام', 'hah1582017@gmail.com', '$2y$10$PZBEx//mxJ9QMu.1afk6..Ml6dQBKHRrUHDF9zNtLciqCYg1IcZ5m', '201002428018', 0, '6ajJhNffJ8fBF0F55Ytb6YQ6cDNxqG', 'mOGt6Ww3', NULL, '2018-07-23 21:27:17', '2018-07-23 21:27:17'),
(60, 44, 1, 'Mohamed Jomaa', 'maly_gomaa1@yahoo.com', '$2y$10$8sNzNQtqEL87trMD8/E4ru8wJAM8TGYFyLTpSRQx52x3Ag/ZNQtsm', '201094419007', 0, 'BRKdK7csx7BjIOEQnrG1OHUF0IOKgf', 'p1CLc6IV', NULL, '2018-07-23 21:31:53', '2018-07-23 21:31:53'),
(61, 45, 1, 'Mina Brandy', 'mina1i11@hotmail.com', '$2y$10$jbueIpkawviCNjTg/DEP4eAKeL6Z31VPoRijW.E5JUxP/PEyAwy5K', '201274902244', 0, 'P0rfnCgoW0sGHMajMdPxKhHG9ZjJO4', 'EvijhY87', NULL, '2018-07-23 21:33:36', '2018-07-23 21:33:36'),
(62, 46, 1, 'Sayed Saif', 'xxxxxxxx@com', '$2y$10$dSa0yRnSMrnVLeiGOMnoOe9.piihPu01upjW0ChsMcJhv57D0czn2', '٠١٠٢٨٦٣٣٣٠٩', 0, 'cEDHsdTLlAFIaCQI3BVQzxci2pM6mv', 'h0iyT0ng', NULL, '2018-07-23 21:36:01', '2018-07-23 21:36:01'),
(63, 47, 1, 'Walid Nasr', 'engwalidnasr@hotmail.com', '$2y$10$JWEe9949nSHq0EtJsmTkE.O9n95RBCdYbhJFnWHyNstQBFRvtda/W', '201006055320', 0, 'hSXZElofwcFzmgCRbIJoGVx2EfHUbt', 'T1jm8WAR', NULL, '2018-07-23 21:37:52', '2018-07-23 21:37:52'),
(64, 48, 1, 'Mina Halim', 'mgm_comeback@yahoo.com', '$2y$10$K/SLMZgruFpkJlH2/uuquO9HhQhiBenfytk0uRvONBaOmYx02T8Wy', '2001013178418', 0, 'r0jbRXRgcCAuYk2NTb160QgBXQ5sZy', 'UIwUFpvt', NULL, '2018-07-23 21:41:55', '2018-07-23 21:41:55'),
(65, 49, 1, 'Sky Fall', 'beshoy_desperado@hotmail.com', '$2y$10$J3r6jqgogvEMchlcd8cutOJaF/O6TKC5EWZW/rb/F.3aj5dEHOln6', '201111106868', 0, 'AIgN2c2JtKdNA8lNGShJx2IRk2HMID', 'vPRXLhFA', NULL, '2018-07-23 21:44:50', '2018-07-23 21:44:50'),
(66, 50, 1, 'asdasd', 'sadqwdqsd@dasd.com', '$2y$10$yZAMjXvmMthERklFIGMetO/JW3gsdg5X25QDMwi48AcnrOs.k4.0G', '123123123123123', 0, NULL, NULL, NULL, '2018-07-24 01:43:18', '2018-07-24 01:43:18'),
(67, 51, 1, 'Mahmoud Samer', 'madmoudsamir@gmail.com', '$2y$10$YPqh8K9//5RacP5.g6ri7e0a4O/IRxk/o2M4sDWQ2JCBHkl1WrKhS', '010045062', 0, '7EmUtcAibOUqf9osOYN2KMQumkJ5Js', '457tnCYA', NULL, '2018-07-24 16:12:30', '2018-07-24 16:12:30'),
(68, 51, 1, 'Mohamed Salah', 'mohamedsalah12456090@gmail.com', '$2y$10$8judDSMru.acebeZ4yObPeKF5SZlfzF3vvniknZM3B.6UivVLAgk.', '01225609956', 0, 'XXcwYKPTLbJ0XzvFjY0HeAWEfy7SLh', 'vCFsFS4v', NULL, '2018-07-24 16:13:45', '2018-07-24 16:13:45'),
(73, 51, 1, 'Tharwat Ahmed', 'tharwat_acc@hotmail.com', '$2y$10$0ySKljU38iMlTFrXIT3OGOEnbTIxcHIQ76k1r6lQmpF8GtaBXnSlW', '01001534079', 0, 'gQyOkwRofEYIc9N0X60c5n9RHLl1L1', 'ej5fzJ0Y', NULL, '2018-07-24 16:56:38', '2018-07-24 16:56:38'),
(74, 53, 1, 'asdasd', 'asdsa@asd.com', '$2y$10$/Yh5VMCwJkUDNfICo.A7LO7hjgaGGsHJjFDOX2AYZ5.7puvl3RJlq', '19823812371', 0, NULL, NULL, NULL, '2018-07-24 17:13:40', '2018-07-24 17:13:40'),
(77, 52, 1, 'qwd', 'qwdqwd@qadwq.qwdqwd', '$2y$10$YBgranetHvUJJZuEzD5XA.TrjHgs44jWdkKiFeJCHSl/NEY9i1Qey', '01234567890', 0, 'ihAWAgDHNoC4ivOjYLACoVZokLiOY0', 'OLxHBHBH', NULL, '2018-07-24 18:11:51', '2018-07-24 18:11:51'),
(82, 65, 1, 'just', 'just@just.just', '$2y$10$DqD3T.t5wnJiYUUY5g.1B.CHSQrCHZTVDdxkHOzi/8zzs86Q3So4.', '01234567890', 0, 'iBLnUmliiQPrFqIUIX1kQJQoPkxFz5', 'jG5OPaJP', NULL, '2018-07-24 21:31:18', '2018-07-24 21:31:18'),
(83, 1, 2, 'Ahmed Hesham', 'a.hesham@digi-sail.com', '$2y$10$I0Gd5H7EGnYJckvy9HmIFe1OJ01RZkSi.OKYycXGAYFvZhE0LGKti', '01145618685', 0, 'HRxo9xhOsqhiAJ9PtqbtZjPqwS0k6v', 'ekdadzc5', NULL, '2018-07-25 15:48:45', '2018-07-25 15:48:45'),
(84, 69, 1, 'Tharwat Ahmed', 'tharwat.ahmed@gmail.com', '$2y$10$gtJWDlqOjVTwKJYJnFfBRukTyD4lB7fu.cRO0m5ixM5sEhhyp38Si', '01001534079', 0, 'IDl2Z9DGhwbmnqtO9sUwwn3khkrSKh', 'xZ7S05XW', NULL, '2018-07-26 02:40:08', '2018-07-26 02:40:33'),
(85, 72, 1, 'Mario Ashraf Fahmy', 'asd@asds.com', '$2y$10$k/bEEc.j4k/ngZluSrUjQ.H3dAYhr8mxbzZ0Z2h5ZeTuNMCDbP9hS', '01202250044', 0, 'G8rBalHe0d8kcaAKmb3Ldxw4sCROTA', 'EnIRevKO', NULL, '2018-07-26 03:14:26', '2018-07-26 03:14:26'),
(86, 73, 1, 'Ayman Fragalla', 'aymanfragalla@2gmail.com', '$2y$10$WLc1O9e9xDAXDnCiB5pBdOMxJeBMfYrxm6GbQSPC4Aqsmfq5zHfDu', '01006660193', 0, 'NM1OfAG634mGB7cpEAJI07j56nyA1m', 'c6o9PXUC', NULL, '2018-07-26 03:17:13', '2018-07-26 03:17:13'),
(87, 74, 1, 'Mina Samir Louiz', 'minasamir007@gmail.com', '$2y$10$JXp278E.T5q9GcrsQAqYCed9XigKg54fpGx1kUNknbUt/AD7igp6q', '01282742242', 0, '71XONhWyyPLeuD16exgAU7Lkb9X2iP', 'x3EPGYSj', NULL, '2018-07-26 03:55:34', '2018-07-26 03:55:34'),
(88, 22, 1, 'Mohammed Amer Al-Mollawee', 'Info@shmyiwu.com', '$2y$10$34BMGDOl3tRLYbtNztg21uuE/aEmMcFDr0FhgJh5NCOtOYMawDmi2', '01092324249', 0, 'k0pGlVylZkOrCJ62fw9TGlwyE3JWAm', 'WMhfsTQd', NULL, '2018-07-26 03:57:41', '2018-07-26 03:58:13'),
(89, 75, 1, 'Sky Fall', 'beshoy_desperado@2hotmail.com', '$2y$10$ETwE5E.P5CuyPI6ADKUkIuHIEP.TR17OR5/9KsFCF4nWRzZfaejW.', '01111106868', 0, '9iqrzreTh1olw4iBaud7SO2NzUISe9', 'YXA0u8b5', NULL, '2018-07-26 16:40:36', '2018-07-26 16:40:36'),
(90, 76, 1, 'Mina Halim', 'mgm_comeback@2yahoo.com', '$2y$10$IypM9e6b6lsyS0OEckIt9uiOOSd3aey5N/91eQzlBerzApZZaZ1wm', '01013178418', 0, 'UL9aLpJpUtkNDGnEqOiHajn1EPYiYw', 'WngqQSYY', NULL, '2018-07-26 16:46:40', '2018-07-26 16:46:40'),
(91, 77, 1, 'Omar Samy', 'moromark@2yahoo.com', '$2y$10$X94xrH0jeXssABxsKVHNae5Xs/tj5yPtpLnOJstuHoQnnwGe5zg/G', '01022262989', 0, 'oL84pNyQ15uCeQFdxA4ZpgsuxPnWYk', 'MgKxDhO6', NULL, '2018-07-26 17:06:47', '2018-07-26 17:06:47'),
(92, 78, 1, 'Gamal Hafez', 'gamal_hafez@hotmail.com', '$2y$10$5qGVdDVCKxK0w5J5J.oEwuy.BFeVHMH/IUA/m07ZpMtVdyhcntWyS', '01210322137', 0, 'pZnPHxiNZHAk63hZKUk3Xpw6AIJdz5', 'mv0zm8Ed', NULL, '2018-07-26 17:09:26', '2018-07-26 17:09:26'),
(93, 79, 1, 'Mohamed Hamdy', 'asdasd@asdasd.com', '$2y$10$5knj8MHKgHDmfsq1/s7BPukF49Ae2xVsckZfM5wcGXLha4eaOaz/y', '01000808900', 0, 'rjoOPcYvFHNKak6Kt8e885o3WaTAwW', 'HnhYgoxE', NULL, '2018-07-26 17:37:26', '2018-07-26 17:37:26'),
(94, 71, 1, 'dqwdqwd', 'jjj@jjj.jjj', '$2y$10$bkZhBQbaxHsgwKapdfbfQOyVfa7Ko4ed.FqTql93MnqgCIWisqWHO', '01234567890', 0, 'kLZIR3pg5dCbvANDAHHUFrxUZuLE44', 'fs6XXBfW', NULL, '2018-07-31 08:15:16', '2018-07-31 08:15:16'),
(95, 1, 2, 'Ahmed Hesham', 'aa.hesham@digi-sail.com', '$2y$10$9otdzBBPMJ.0ldRRAQpnYudONUj6HQflQ9Zh1MFnNVMkAjYGEvyu2', '01234567890', 0, 'snebJRAlL46fZ6TJsKyBZxTzErCt46', 'bG8KrMQN', NULL, '2018-08-01 06:10:58', '2018-08-01 06:10:58'),
(96, 21, 1, 'Add', 'asd@asd.asd', '$2y$10$205iBuT0N7AzcZ2cSa28Zu9oATR6Nzb/oLxxrxU6js8.SA0T3NOZO', '01234567890', 0, 'vIyyILrhizsW7rsUb6QhznnLh37WfR', 'yzyCWsAX', NULL, '2018-08-01 07:35:59', '2018-08-01 07:38:52'),
(97, 80, 1, 'qwd', 'qwd@qwdqwd.qwd', '$2y$10$ZGE4uo9tZeUWzxW1YkLqJ.3X7dWg/X/39CXR70dpGVyBSRtiZF/oa', '01234567890', 0, 'd07QY0IvZRxQUgawIRmnF1PLPcssSd', 'SMqNAqIV', NULL, '2018-08-01 08:02:59', '2018-08-01 08:02:59'),
(98, 24, 1, 'Add', 'asd@asd.asdqwd', '$2y$10$aLcy/2PQpVgxdD9viM/56.HnDgjp48gpw/v.REO26MxKr4B06vxQy', '01234567890', 0, 'yBAenwAMjb8BdtXF0FzaTXAA7OAcA0', 'IWbI41Xs', NULL, '2018-08-01 08:33:44', '2018-08-01 08:33:44'),
(99, 81, 1, 'qwd', 'qwd2@qwd.qwd', '$2y$10$MzLMu.a2dTI2MgPAOnYdeORzj32M1p94qHEV3W17DFDA9Jq5x8XM.', '001122334455', 0, 'LAsYUHcPNpNsm76mubSy4DuDPiSBEp', 'QCvILeZ1', NULL, '2018-08-01 09:15:35', '2018-08-01 09:15:35'),
(100, 82, 1, 'qwd', 'a.hesham@digi-sail.comqwd', '$2y$10$3YYNHJjFWMRcfuJgw7B1o.B/hsVkP2wKG/LhVN0G3qYYBSTyaKABq', '01234567890', 0, 'G8p5Dr1tVpNSDLyvJNzDu3naowuxDw', 'PdIYZjOb', NULL, '2018-08-01 09:29:07', '2018-08-01 09:29:07'),
(101, 37, 1, 'Add', 'a.hesham@digi-sail.comasd', '$2y$10$.jSpWZT2jX0AKV70.Mvqte6SiBtZQJxNbsRLnryz1rwjp6I9weYku', '01234567890', 0, 'Kyt6XkmhgoMMvRZGZ2AamPN9vt5LSm', 'l0iNubGh', NULL, '2018-08-02 10:35:41', '2018-08-02 10:35:41'),
(102, 83, 1, 'test', 'test@test.comtest', '$2y$10$NG94fB4/xTbX9W9Gn32dvecl/yhxAfsRG5W2WldvGBytUArR9CgHC', '01234567890', 0, 'cCDOTKDhqh0lVilqbLzfC7vQVvrNyT', 'XZtFVOzX', NULL, '2018-08-02 11:02:17', '2018-08-02 11:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(10) UNSIGNED NOT NULL,
  `quotation_id` int(10) UNSIGNED NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_signed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `quotation_id`, `pdf`, `is_signed`, `created_at`, `updated_at`) VALUES
(1, 8, 'nQ6JLwcE-contract-pdf.pdf', 1, '2018-08-01 12:13:58', '2018-08-01 13:00:33'),
(2, 12, 'O80oyLiL-contract-pdf.pdf', 1, '2018-08-01 13:01:37', '2018-08-01 13:01:44'),
(3, 14, 'zjYMdxo9-contract-pdf.pdf', 1, '2018-08-01 13:02:48', '2018-08-02 06:40:17'),
(4, 25, 'JgzTq8Kp-contract-pdf.pdf', 1, '2018-08-02 06:43:27', '2018-08-02 07:25:28'),
(5, 21, '2EJoBWK6-contract-pdf.pdf', 1, '2018-08-02 07:37:20', '2018-08-02 07:37:32'),
(6, 24, 'VwAMCWr5-contract-pdf.pdf', 1, '2018-08-02 10:59:00', '2018-08-02 10:59:14'),
(7, 26, 'NEqno4r9-contract-pdf.pdf', 0, '2018-08-02 11:04:41', '2018-08-26 12:05:53'),
(8, 27, 'SRM7uDMg-contract-pdf.pdf', 1, '2018-08-02 12:26:44', '2018-08-02 12:26:57'),
(9, 22, 'oB3KeBpO-contract-pdf.pdf', 1, '2018-08-05 07:36:26', '2018-08-05 07:36:28'),
(10, 32, 'rUXToWdo-contract-pdf.pdf', 1, '2018-08-05 07:37:23', '2018-08-05 07:37:25'),
(11, 31, 'mfVaSicq-contract-pdf.pdf', 1, '2018-08-05 07:37:32', '2018-08-05 07:37:33'),
(12, 37, 'ny79l5HU-contract-pdf.pdf', 1, '2018-08-07 07:54:03', '2018-08-07 07:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `crm_users`
--

CREATE TABLE `crm_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `http_cred` longtext COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crm_users`
--

INSERT INTO `crm_users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `http_cred`, `ip_address`, `added_by`, `edited_by`) VALUES
(2, 'Ahmed Hesham', 'a.hesham@digi-sail.com', '$2y$10$aDDiCo3yA41K7mIRIq.4gu7DL4Mn7rJC21oov7ukA9WX6qOIS3s4.', 'wOOpB5wj6ezEj2RGLGpaZge1Dc3Eb4VoYRIsH7gHOOYBauSkur86JXYeIqtt', '2018-07-15 17:55:53', '2018-08-07 11:12:28', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '::1', NULL, 4),
(4, 'Mohamed Hassan', 'mhassan@digi-sail.com', '$2y$10$RxDWFCC8oMDK4Vs7whUYe.393DT0GTR.9ZgaTfb7Lp9.RuTppabJW', '8CGtFiyy8FO2KaYwOfWrmzav6xWlpq6lzumMjAkZvNaEhrlUch3Q1vjjH8ER', '2018-07-18 09:24:22', '2018-08-08 06:34:07', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '::1', NULL, 4),
(7, 'Mahmoud Omar', 'm.omar@digi-sail.com', '$2y$10$SS7RIXGMsh8x0z3yWGp0BuSQRqjTIXeVX7xVO5RCzbZCSU4Z7N3xK', 'nH6dcJ1reHW6aQZKtwRsMaNOC2Ig5WYaWpMtL4rmDfr4Lca7tGbePz5wnPVQ', '2018-07-19 10:36:43', '2018-07-25 21:47:38', NULL, NULL, NULL, NULL),
(8, 'Mohamed Mohsen', 'm.mohsen@digi-sail.com', '$2y$10$2pn24AIV4fpJjhp6iQyeauLWN1biJ4JuXBQyu1yhTtO9eer2RJarS', 'bCwkQiaIOcjV67f2uITvz0bFqWpVwZHaIcWfLmi3WLRjmLNvIsFjWSj7nCzB', '2018-07-19 11:32:31', '2018-07-25 21:47:53', NULL, NULL, NULL, NULL),
(9, 'Ibrahim', 'ibrahim@digi-sail.com', '$2y$10$6N5ygGC5sjL76vcv723as.4XyIE5Qi7DpgZ8lGFjLUzdDufnqN2mu', 'fjVG0eHXR1c847srOyR0s1ajcaLS8ZYFOVOT1IcffFuFXM6XBPUhGRTi4Snz', '2018-07-19 11:33:09', '2018-07-26 02:29:11', NULL, NULL, NULL, NULL),
(10, 'Yara', 'yara@digi-sail.com', '$2y$10$Bv3mEqO4C.LsXcfaV3ipGuofSoDVuSLRWAJUwrQZ6KydSTCq8wPsG', NULL, '2018-07-24 06:58:17', '2018-07-26 17:22:12', NULL, NULL, NULL, NULL),
(11, 'Gamal', 'g.mahmoud@digi-sail.com', '$2y$10$dfW5rSNtrhbATqrdF9g9sOmebH4SagDRWBn1nCTZ6ulCDkCoVLblG', NULL, '2018-07-24 10:03:17', '2018-07-24 10:03:17', NULL, NULL, NULL, NULL),
(12, 'Mostafa', 'm.gamal@digi-sail.com', '$2y$10$24996dI.iqn5nQnhsxQKxOPmkJM3RlQN2cDE0LbRPksS1RZlTbzNS', NULL, '2018-07-24 10:04:34', '2018-07-25 21:48:16', NULL, NULL, NULL, NULL),
(13, 'Mohamed Hegazy', 'm.hegazy@digi-sail.com', '$2y$10$5nkyyvwi.Ky2OwGo64hCzOwMvuGozO1oE1hJ6g1Y./9YSQqw1CKZC', NULL, '2018-07-24 10:05:34', '2018-07-25 21:47:48', NULL, NULL, NULL, NULL),
(14, 'Ahmed Refaat', 'a.refaat@digi-sail.com', '$2y$10$c78ag/XBmVX8.j4z0WwZ3eIfUIP2Rs0YGj4XO0SfneyJ.l7np/W36', NULL, '2018-07-24 10:06:06', '2018-07-24 10:06:06', NULL, NULL, NULL, NULL),
(15, 'Mohamed', 'm.accountant@digi-sail.com', '$2y$10$MRjMIzAsCPw3353y04xP0OQsHVLHPi7YKn57HAKnFz0sWS6d0wuq6', '4EX8oaYnr7OisIbmodh0zdrhBxX6BsOHLR4PtW4lzvedkmxf5bOkscvBRlm8', '2018-07-24 10:06:41', '2018-07-26 02:55:41', NULL, NULL, NULL, NULL),
(16, 'Seif Helmy', 's.helmy@digi-sail.com', '$2y$10$0U6kwiKUuLtISCkR6Fe5HOg1ygURzLcu1eYDOAgFLEe3Bp5sZ9spq', NULL, '2018-07-24 10:07:40', '2018-07-25 21:48:14', NULL, NULL, NULL, NULL),
(17, 'Mohamed Refaay', 'm.refaay@digi-sail.com', '$2y$10$MrGpn.i4w7LYsWxe968tHeTUhPweZvD18VdfaGYjMGm8SJ2MOLnMK', NULL, '2018-07-24 10:08:30', '2018-07-25 21:48:26', NULL, NULL, NULL, NULL),
(18, 'Mohamed Saqr', 'm.saqr@digi-sail.com', '$2y$10$0nEsxtZUqEP1eSQ2Af1foe7IVs.xdqdHXotsUGsbVYmTlon0xYvMy', NULL, '2018-07-24 10:39:06', '2018-07-25 21:48:23', NULL, NULL, NULL, NULL),
(19, 'Basma', 'basma@digi-sail.com', '$2y$10$vH6rJqzEVcJ/LYV4IM5MsupVYYTbYV3EbS6jCnmjWuvkCsEz7rBvC', NULL, '2018-07-24 10:40:26', '2018-07-25 21:53:12', NULL, NULL, NULL, NULL),
(20, 'test', 'test@test.com', '$2y$10$zUcmgSlc6L79WkvJPA4Oc.cg.L1FypiwN9pj2G5Qa/uRu/SbGgjvq', 'W0HnDftfUcx4wqhZjdyWXHBGV1g0nfVD7yd5UPGEutMKoztoyhDiBmiEuEWP', '2018-07-25 20:40:54', '2018-07-25 21:48:10', NULL, NULL, NULL, NULL),
(21, 'Hashed User', 'hash@hash.hash', '$2y$10$xqRd8Pt8FboAi8YzRAaJ5.LSBVU8gnQxvG3.AlBV1SKsTY/MUZXu6', NULL, '2018-07-30 12:18:57', '2018-07-30 12:18:57', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '::1', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cron_jobs`
--

CREATE TABLE `cron_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_leads`
--

CREATE TABLE `customer_leads` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `company_user_id` int(10) UNSIGNED NOT NULL,
  `lead_source_id` int(10) UNSIGNED NOT NULL,
  `need_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_leads`
--

INSERT INTO `customer_leads` (`id`, `company_id`, `project_id`, `company_user_id`, `lead_source_id`, `need_type`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'Request a Call', 'first customer', '011', 'customer@customer.com', 'Hey i am here', NULL, NULL),
(2, 2, 2, 3, 2, 'Need Support', 'sdxsad', '23323232', 'ibrahim.mahmoude@yahoo.com', 'cxzcxzc', '2018-07-15 19:10:07', '2018-07-15 19:10:07'),
(3, 1, 1, 0, 3, 'Request a call', 'Digi Sail', '0123456789', 'bd@bd.com', 'qwd', '2018-07-16 09:44:51', '2018-07-16 09:44:51'),
(4, 1, 1, 0, 1, 'Request a call', 'Digi Sail', '0123456789', 'bd@bd.com', 'qwdqwd', '2018-07-16 09:45:09', '2018-07-16 09:45:09'),
(5, 1, 1, 0, 1, 'Request a call', 'Mostafa Hosny', '01001374096', 'asd@asd.com', '123123', '2018-07-20 20:46:46', '2018-07-20 20:46:46'),
(6, 1, 1, 0, 4, 'Request a call', 'Mahmoud Azab', '01113994443', 'azab.share@gmail.com', NULL, '2018-07-20 20:55:42', '2018-07-20 20:55:42'),
(7, 14, 3, 0, 1, 'Request a call', 'Digi Sale', '23323232', 'admin@digisail.com', 'dfdsfsdfsdf', '2018-07-21 02:43:10', '2018-07-21 02:43:10'),
(8, 13, 5, 0, 4, 'Request a call', 'Walaa Elsayed Maraie', '2001119874444', 'wmaraie@gmail.com', NULL, '2018-07-22 21:58:47', '2018-07-22 21:58:47'),
(9, 13, 5, 0, 4, 'Request a call', 'Mohamed Thabet', '966567685939', 'mohamed2thabet@hotmail.com', NULL, '2018-07-22 21:59:27', '2018-07-22 21:59:27'),
(10, 13, 5, 0, 4, 'Request a call', 'Shereen Saleh El-laithy', '201226799977', 'dr_shery2382@hotmail.com', NULL, '2018-07-22 22:00:18', '2018-07-22 22:00:18'),
(11, 13, 5, 0, 4, 'Request a call', 'Soldato Vero', '2001154913383', 'raoof_it@yahoo.com', NULL, '2018-07-22 22:00:56', '2018-07-22 22:00:56'),
(12, 13, 5, 0, 4, 'Request a call', 'Bahaha Elden Hassan', '201122665178', 'dewedarbahaa@yahoo.com', NULL, '2018-07-22 22:01:23', '2018-07-22 22:01:23'),
(13, 13, 5, 0, 4, 'Request a call', 'Hesham Abd El Rahman', '201001077722', 'h777a@hotmail.com', NULL, '2018-07-22 22:02:08', '2018-07-22 22:02:08'),
(14, 13, 5, 0, 4, 'Request a call', 'مدام/سهام حامد', '2001159321999', 'tarekkhattab1960@gmail.com', NULL, '2018-07-22 22:02:33', '2018-07-22 22:02:33'),
(15, 13, 5, 0, 4, 'Request a call', 'Hanan Elfiky', '201228702072', 'hananelfiky64@gmail.com', NULL, '2018-07-22 22:02:54', '2018-07-22 22:02:54'),
(16, 13, 5, 0, 4, 'Request a call', 'Ebrahiem Aly', '201008142403', 'ebrabdalla58@gmail.com', NULL, '2018-07-22 22:03:16', '2018-07-22 22:03:16'),
(17, 13, 5, 0, 4, 'Request a call', 'Moheeb Megahed Hegazy', '201005550248', 'd_moheeb@hotmail.com', NULL, '2018-07-22 22:03:32', '2018-07-22 22:03:32'),
(18, 13, 5, 0, 4, 'Request a call', 'Hany Sedky Aziz', '201005009670', 'hanysedkyaziz@gmail.com', NULL, '2018-07-22 22:03:54', '2018-07-22 22:03:54'),
(19, 13, 5, 0, 4, 'Request a call', 'سمير الجمل', '3901029192000', 'Samir+elgaml@yahoo.com', NULL, '2018-07-22 22:04:16', '2018-07-22 22:04:16'),
(20, 13, 5, 0, 4, 'Request a call', 'Maged Samir', '2001224009449', 'mgsamir2020@gmail.com', NULL, '2018-07-22 22:04:43', '2018-07-22 22:04:43'),
(21, 13, 5, 0, 4, 'Request a call', 'Maged Eltorkey', '2001001788747', 'maged_turky@yahoo.com', NULL, '2018-07-22 22:05:04', '2018-07-22 22:05:04'),
(22, 13, 5, 0, 4, 'Request a call', 'Ahmed Bitar', '201012823031', 'bita-import@hotmail.com', NULL, '2018-07-22 22:05:29', '2018-07-22 22:05:29'),
(23, 13, 5, 0, 4, 'Request a call', 'Hanoon Elhelw', '201124187262', 'hanoon.elhelw@yahoo.com', NULL, '2018-07-22 22:05:49', '2018-07-22 22:05:49'),
(24, 13, 5, 0, 4, 'Request a call', 'Samar Mosaad', '201146048088', 'samarmosaad121@yahoo.com', NULL, '2018-07-22 22:06:11', '2018-07-22 22:06:11'),
(25, 13, 5, 0, 4, 'Request a call', 'Hesham Saleh', '201006074251', 'hesham.ahmed@rashpetco.com', NULL, '2018-07-22 22:06:31', '2018-07-22 22:06:31'),
(26, 13, 5, 0, 4, 'Request a call', 'Mohamed Gamal', '201006521230', 'mohamed99995010@gmail.com', NULL, '2018-07-22 22:06:49', '2018-07-22 22:06:49'),
(27, 13, 5, 0, 4, 'Request a call', 'Mohamed Hussin', '201118066566', 'poys55555@yahoo.com', NULL, '2018-07-22 22:07:09', '2018-07-22 22:07:09'),
(28, 13, 5, 0, 2, 'Request a call', 'Tamer Azoz Ahmed', '201001549343', 'none@none', NULL, '2018-07-22 22:08:30', '2018-07-22 22:08:30'),
(29, 13, 5, 0, 4, 'Request a call', 'Mourad Solaiman', '201017365652', 'mourad.yahia.1966@gmail.com', NULL, '2018-07-22 22:29:35', '2018-07-22 22:29:35'),
(30, 17, 6, 0, 4, 'Request a call', 'Omayma Kamal', '201001521206', 'okamal68@gmail.com', NULL, '2018-07-22 22:35:41', '2018-07-22 22:35:41'),
(31, 17, 6, 0, 4, 'Request a call', 'Mustafa Haddad', '201009217741', 'mustafa_e@hotmail.com', NULL, '2018-07-22 22:36:09', '2018-07-22 22:36:09'),
(32, 17, 6, 0, 4, 'Request a call', 'Hebatalla Said', '201095556529', 'hobabebo82_900@yahoo.com', NULL, '2018-07-22 22:36:38', '2018-07-22 22:36:38'),
(33, 17, 6, 0, 4, 'Request a call', 'Mohamed Abdellah', '201006843333', 'hamadaabdellah@yahoo.com', NULL, '2018-07-22 22:36:58', '2018-07-22 22:36:58'),
(34, 17, 6, 0, 4, 'Request a call', 'Hamis Elkorashy', '201281302228', 'hamis.elkorashy@yahoo.com', NULL, '2018-07-22 22:37:18', '2018-07-22 22:37:18'),
(35, 17, 6, 0, 4, 'Request a call', 'Abdelaziz Ahmed', '201000020124', 'ahmed.abdelaziz777@yahoo.com', NULL, '2018-07-22 22:37:40', '2018-07-22 22:37:40'),
(36, 17, 6, 0, 4, 'Request a call', 'Gehan Edrees', '201001193777', 'gehan.edrees@yahoo.com', NULL, '2018-07-22 22:37:59', '2018-07-22 22:37:59'),
(37, 17, 6, 0, 4, 'Request a call', 'Maged Tawfek', '201283819999', 'albatalgroup@yahoo.com', NULL, '2018-07-22 22:38:54', '2018-07-22 22:38:54'),
(38, 17, 6, 0, 4, 'Request a call', 'Mohamed M. Maisara', '201001155511', 'mmaisara@yahoo.com', NULL, '2018-07-22 22:39:14', '2018-07-22 22:39:14'),
(39, 17, 6, 0, 4, 'Request a call', 'Hassan Easa', '97450488515', 'hoptmf@yahoo.com', NULL, '2018-07-22 22:39:35', '2018-07-22 22:39:35'),
(40, 17, 6, 0, 4, 'Request a call', 'Mohammad Yehia Elsherif', '201222367525', 'melsherif2004@yahoo.com', NULL, '2018-07-22 22:39:52', '2018-07-22 22:39:52'),
(41, 17, 6, 0, 4, 'Request a call', 'Sasa Kamel', '201063030733', 'sasa_kamel@yahoo.com', NULL, '2018-07-22 22:40:09', '2018-07-22 22:40:09'),
(42, 17, 6, 0, 4, 'Request a call', 'Abdel Rahman El Gemey', '201006760600', 'bidou66@yahoo.com', NULL, '2018-07-22 22:40:29', '2018-07-22 22:40:29'),
(43, 17, 6, 0, 4, 'Request a call', 'Eman Fouad', '201222271783', 'eman.fouad0@gmail.com', NULL, '2018-07-22 22:40:49', '2018-07-22 22:40:49'),
(44, 17, 6, 0, 4, 'Request a call', 'Mohamed Ekramy', '201001000038', 'mekramy@hotmail.com', NULL, '2018-07-22 22:41:07', '2018-07-22 22:41:07'),
(45, 17, 6, 0, 4, 'Request a call', 'Ehab Houssain Abdo', '966556220030', 'none@none', NULL, '2018-07-22 22:41:43', '2018-07-22 22:41:43'),
(46, 17, 6, 0, 4, 'Request a call', 'Mohamed Abbas', '201065141037', 'none@none', NULL, '2018-07-22 22:42:05', '2018-07-22 22:42:05'),
(47, 17, 6, 0, 4, 'Request a call', 'Aziza Ibrahim', '201060004341', 'none@none', NULL, '2018-07-22 22:42:24', '2018-07-22 22:42:24'),
(48, 17, 6, 0, 4, 'Request a call', 'Doaa Mostafa', '201023914558', 'none@none', NULL, '2018-07-22 22:42:45', '2018-07-22 22:42:45'),
(49, 17, 6, 0, 4, 'Request a call', 'Adel Shabaan', '201159665553', 'none@none', NULL, '2018-07-22 22:43:07', '2018-07-22 22:43:07'),
(50, 17, 6, 0, 4, 'Request a call', 'Hamdy ZiZo', '201228901189', 'hamdyzizo3@gmail.com', NULL, '2018-07-22 22:43:28', '2018-07-22 22:43:28'),
(51, 17, 6, 0, 4, 'Request a call', 'Gerges Sliem', '201200224865', 'Gogomalak101@hotmail.com', NULL, '2018-07-22 22:43:47', '2018-07-22 22:43:47'),
(52, 17, 6, 0, 4, 'Request a call', 'Hani Saeed', '966533543355', 'hanisaeed94@gmail.com', NULL, '2018-07-22 22:44:06', '2018-07-22 22:44:06'),
(53, 17, 6, 0, 4, 'Request a call', 'Mohsen M.gamel', '201001573077', 'mohsenmgamel@yahoo.com', NULL, '2018-07-22 22:44:24', '2018-07-22 22:44:24'),
(54, 17, 6, 0, 4, 'Request a call', 'Mohammed Nasr', '201009702322', 'mohammed_nasr4@yahoo.com', NULL, '2018-07-22 22:44:41', '2018-07-22 22:44:41'),
(55, 17, 6, 0, 4, 'Request a call', 'Mahmoud refai', '201028284349', 'Mahmoud.Refai82@gmail.com', NULL, '2018-07-22 22:44:59', '2018-07-22 22:44:59'),
(56, 17, 6, 0, 4, 'Request a call', 'Ehab Hassan', '201222131038', 'ehabhassan77@yahoo.com', NULL, '2018-07-22 22:45:16', '2018-07-22 22:45:16'),
(57, 17, 6, 0, 4, 'Request a call', 'El Wansh', '201282224848', 'gergeswensh@jamil.com', NULL, '2018-07-22 22:45:35', '2018-07-22 22:45:35'),
(58, 17, 6, 0, 4, 'Request a call', 'Hamada Elgen', '201117688577', 'aelsaady@hotmail.com', NULL, '2018-07-22 22:45:55', '2018-07-22 22:45:55'),
(59, 17, 6, 0, 4, 'Request a call', 'Abdelfatah Attia Atawia', '966506997469', 'abdelfatah_atawia@yahoo.com', NULL, '2018-07-22 22:46:13', '2018-07-22 22:46:13'),
(60, 17, 6, 0, 4, 'Request a call', 'Mohamed Ahmed Mostafa', '201098837109', 'muhammed.amustafa@gmail.com', NULL, '2018-07-22 22:47:26', '2018-07-22 22:47:26'),
(61, 17, 6, 0, 4, 'Request a call', 'احمد خضر', '201060656688', 'akhedr2010@yahoo.com', NULL, '2018-07-22 22:47:54', '2018-07-22 22:47:54'),
(62, 17, 6, 0, 4, 'Request a call', 'Fathy A. Hammoud', '201008329923', 'fathy.a.hammoud@gmail.com', NULL, '2018-07-22 22:48:28', '2018-07-22 22:48:28'),
(63, 17, 6, 0, 4, 'Request a call', 'Mohamed Abdelatty', '201004702104', 'mohamed_e_moslim@yahoo.com', NULL, '2018-07-22 22:48:45', '2018-07-22 22:48:45'),
(64, 17, 6, 0, 4, 'Request a call', 'Khalid Samir Afifi', '201224323810', 'khalid.afifi6@gmail.com', NULL, '2018-07-22 22:49:04', '2018-07-22 22:49:04'),
(65, 17, 6, 0, 4, 'Request a call', 'Mahmoud Ibrahim', '201115558208', 'modyz_89@hotmail.com', NULL, '2018-07-22 22:49:24', '2018-07-22 22:49:24'),
(66, 17, 6, 0, 4, 'Request a call', 'Alaa Kassem', '201001997799', 'mavricf16@yahoo.com', NULL, '2018-07-22 22:49:42', '2018-07-22 22:49:42'),
(67, 17, 6, 0, 4, 'Request a call', 'Hisham Aly', '201000060103', 'eng_hisham2003@yahoo.com', NULL, '2018-07-22 22:50:21', '2018-07-22 22:50:21'),
(68, 17, 6, 0, 4, 'Request a call', 'Nermeen Ali', '201005887253', 'nermeen.ali88@yahoo.com', NULL, '2018-07-22 22:50:51', '2018-07-22 22:50:51'),
(69, 17, 6, 0, 4, 'Request a call', 'Azza Khairy', '201201218167', 'Zozo7_1@ghyuj.com', NULL, '2018-07-22 22:51:12', '2018-07-22 22:51:12'),
(70, 17, 6, 0, 4, 'Request a call', 'Emil Halim', '201122698548', 'emil_halim@yahoo.com', NULL, '2018-07-22 22:51:28', '2018-07-22 22:51:28'),
(71, 17, 6, 0, 4, 'Request a call', 'Maged Hanna', '201277477179', 'maged_h_w@yahoo.com', NULL, '2018-07-22 22:51:55', '2018-07-22 22:51:55'),
(72, 17, 6, 0, 4, 'Request a call', 'Ashgan Hosny', '201060000560', 'sweatyg@yahoo.com', NULL, '2018-07-22 22:52:09', '2018-07-22 22:52:09'),
(73, 17, 6, 0, 4, 'Request a call', 'Hossam Nagy Gad', '201001667791', 'housamnagy_26@yahoo.com', NULL, '2018-07-22 22:52:28', '2018-07-22 22:52:28'),
(74, 17, 6, 0, 4, 'Request a call', 'Ashraf Shouman', '96597632167', 'as959ll@gmail.com', NULL, '2018-07-22 22:52:46', '2018-07-22 22:52:46'),
(75, 17, 6, 0, 4, 'Request a call', 'Mahmoud Keshk', '2001207207243', 'mahmoud_motamed@yahoo.com', NULL, '2018-07-22 22:53:04', '2018-07-22 22:53:04'),
(76, 17, 6, 0, 4, 'Request a call', 'Mahmoud Elkassas', '201223918458', 'mahmoudelkassass@gmail.com', NULL, '2018-07-22 22:53:22', '2018-07-22 22:53:22'),
(77, 17, 6, 0, 4, 'Request a call', 'Hamada Ahmed', '201008518551', 'mokapopa12@yahoo.com', NULL, '2018-07-22 22:53:43', '2018-07-22 22:53:43'),
(78, 17, 6, 0, 1, 'Request a call', 'Nabila Nasr', '٠١٢٢٢٥١٧٧١٠', 'none@none', NULL, '2018-07-22 22:54:11', '2018-07-22 22:54:11'),
(79, 1, 1, 0, 1, 'Request a call', 'xxxx', '23323232', 'admin@digisail.com', 'dfdsfsdfsdf', '2018-07-22 23:16:47', '2018-07-22 23:16:47'),
(80, 1, 1, 0, 1, 'Request a call', 'xczx', 'zxcxc', 'admin@admin.com', 'zcxczcxc', '2018-07-23 00:47:52', '2018-07-23 00:47:52'),
(81, 13, 5, 0, 4, 'Request a call', 'Yasser Eldawy', '2001005432100', 'yeldawy@icloud.com', NULL, '2018-07-24 00:22:30', '2018-07-24 00:22:30'),
(82, 13, 5, 0, 4, 'Request a call', 'Lina Soliman', '2001002429960', 'louly_4sea@hotmail.com', NULL, '2018-07-24 00:22:52', '2018-07-24 00:22:52'),
(83, 13, 5, 0, 4, 'Request a call', 'خالد محمد علي', '2001155720777', 'khaled_sabasa@yahoo.com', NULL, '2018-07-24 00:23:11', '2018-07-24 00:23:11'),
(84, 13, 5, 0, 4, 'Request a call', 'Hebatallah Mohamed', '201090901374', 'bebe12ga@yahoo.com', NULL, '2018-07-24 00:23:30', '2018-07-24 00:23:30'),
(85, 13, 5, 0, 4, 'Request a call', 'Ehab William', '201288042228', 'en_ehab254@yahoo.com', NULL, '2018-07-24 00:23:48', '2018-07-24 00:23:48'),
(86, 13, 5, 0, 4, 'Request a call', 'Samir El Badawy', '201013385008', 'eng.samir_2010@yahoo.com', NULL, '2018-07-24 00:24:03', '2018-07-24 00:24:03'),
(87, 13, 5, 0, 4, 'Request a call', 'Akhna Ton Masr', '201113331373', 'onabil_osman2000@yahoo.com', NULL, '2018-07-24 00:24:19', '2018-07-24 00:24:19'),
(88, 13, 5, 0, 4, 'Request a call', 'Maged Mohsen Omar', '201001008865', 'maged_omar45@yahoo.com', NULL, '2018-07-24 00:24:36', '2018-07-24 00:24:36'),
(89, 13, 5, 0, 4, 'Request a call', 'Nabil Bergas', '201002559032', 'nbergas@hotmail.com', NULL, '2018-07-24 00:24:53', '2018-07-24 00:24:53'),
(90, 13, 5, 0, 4, 'Request a call', 'Mohamed Ali', '2001015444203', 'niallimo1@gamil.com', NULL, '2018-07-24 00:25:09', '2018-07-24 00:25:09'),
(91, 13, 5, 0, 4, 'Request a call', 'Mohammed Allam', '96597445405', 'ma_allam@hotmail.com', NULL, '2018-07-24 00:25:26', '2018-07-24 00:25:26'),
(92, 13, 5, 0, 4, 'Request a call', 'ياسينو محمد محمود اسليم', '2001010334249', 'Yasino123@yahoo.com', NULL, '2018-07-24 00:26:20', '2018-07-24 00:26:20'),
(93, 13, 5, 0, 2, 'Request a call', 'Reham Hendam', '966597992400', 'none@none', NULL, '2018-07-24 00:34:02', '2018-07-24 00:34:02'),
(94, 13, 5, 0, 1, 'Request a call', 'Mohamed Abdul-Ghany', '00965-60096111', 'm1@1', NULL, '2018-07-24 00:38:22', '2018-07-24 00:38:22'),
(95, 13, 5, 0, 4, 'Request a call', 'Mohammed Sallam', '201002337303', 'sallam_15@hotmail.com', NULL, '2018-07-24 16:43:16', '2018-07-24 16:43:16'),
(96, 13, 5, 0, 4, 'Request a call', 'Abdel Raouf Elshamy', '201229198756', 'raoufshamy@gmail.com', NULL, '2018-07-24 16:44:22', '2018-07-24 16:44:22'),
(97, 13, 5, 0, 4, 'Request a call', 'Yasmeen Abdelghaffar', '201066154452', 'yasmeenabdelghaffar@yahoo.com', NULL, '2018-07-24 16:44:53', '2018-07-24 16:44:53'),
(98, 17, 6, 0, 1, 'Request a call', 'Mai Abu Mhadi', '201007247970', 'none@none', NULL, '2018-07-24 16:56:08', '2018-07-24 16:56:08'),
(99, 17, 6, 0, 1, 'Request a call', 'Mohamed Elkhshab', '201005233072', 'none@none', NULL, '2018-07-24 16:56:35', '2018-07-24 16:56:35'),
(100, 17, 6, 0, 1, 'Request a call', 'Madiha Hussein', '٠١٢٢٧١٠٢٢٧٠', 'none@none', NULL, '2018-07-24 16:58:22', '2018-07-24 16:58:22'),
(101, 17, 6, 0, 1, 'Request a call', 'Islam Saber', '201066690286', 'none@none', NULL, '2018-07-24 16:58:38', '2018-07-24 16:58:38'),
(102, 17, 6, 0, 1, 'Request a call', 'Ahmed Salah', '201005233072', 'none@none', NULL, '2018-07-24 16:59:21', '2018-07-24 16:59:21'),
(103, 17, 6, 0, 1, 'Request a call', 'Nehal Mohamed', '201090610081', 'none@none', NULL, '2018-07-24 16:59:50', '2018-07-24 16:59:50'),
(104, 17, 6, 0, 4, 'Request a call', 'Mohamed Desouky', '2001121122214', 'totiii_desouky@hotmail.com', NULL, '2018-07-24 17:00:31', '2018-07-24 17:00:31'),
(105, 17, 6, 0, 1, 'Request a call', 'Ramy Elashkar', '٠١٠٠٤٣٣٣٥٢٥', 'none@none', NULL, '2018-07-24 17:00:58', '2018-07-24 17:00:58'),
(106, 17, 6, 0, 4, 'Request a call', 'Ramy Elashkar', '201004333525', 'ramyashkar@hotmail.com', NULL, '2018-07-24 17:01:17', '2018-07-24 17:01:17'),
(107, 17, 6, 0, 1, 'Request a call', 'Mohamed Abo Yassin', '201224660444', 'none@none', NULL, '2018-07-24 17:01:40', '2018-07-24 17:01:40'),
(108, 17, 6, 0, 4, 'Request a call', 'Sohair Makhlof', '96594910583', 'sohair_makhlof@hotmail.com', NULL, '2018-07-24 17:01:59', '2018-07-24 17:01:59'),
(109, 17, 6, 0, 4, 'Request a call', 'Mona Mokhtar', '201145759001', 'monamokhtar238@hotmail.com', NULL, '2018-07-24 17:02:24', '2018-07-24 17:02:24'),
(110, 17, 6, 0, 4, 'Request a call', 'Amr Elmelegy', '2001003430374', 'amr-elmelegy@hotmail.com', NULL, '2018-07-24 17:02:44', '2018-07-24 17:02:44'),
(111, 17, 6, 0, 4, 'Request a call', 'Eman EL-erian', '201090331515', 'eman_elerian@yahoo.com', NULL, '2018-07-24 17:03:30', '2018-07-24 17:03:30'),
(112, 17, 6, 0, 4, 'Request a call', 'Mohamed MohAmady', '201060333874', 'muhamed.elmuhamady@gmail.com', NULL, '2018-07-24 17:03:49', '2018-07-24 17:03:49'),
(113, 17, 6, 0, 4, 'Request a call', 'محمد صلاح عزاز', '201099322145', 'moh_tagus@yahoo.com', NULL, '2018-07-24 17:04:10', '2018-07-24 17:04:10'),
(114, 17, 6, 0, 4, 'Request a call', 'Sherif Oudah', '201026293131', 'sherif-oudah@hotmail.com', NULL, '2018-07-24 17:04:31', '2018-07-24 17:04:31'),
(115, 17, 6, 0, 4, 'Request a call', 'ابراهيم اسماعيل ابراهيم', '201155586134', 'ibrahim.ismail77@yahoo.com', NULL, '2018-07-24 17:04:52', '2018-07-24 17:04:52'),
(116, 17, 6, 0, 4, 'Request a call', 'Khaled Elgohary', '201001715855', 'khaled_elgohary_2006@yahoo.com', NULL, '2018-07-24 17:05:12', '2018-07-24 17:05:12'),
(117, 17, 6, 0, 4, 'Request a call', 'Hany Amin', '201273649152', 'hany.amin81@icloud.com', NULL, '2018-07-24 17:05:41', '2018-07-24 17:05:41'),
(118, 17, 6, 0, 4, 'Request a call', 'Ahmed Ans', '201003562280', 'Image.print1@hotmail.com', NULL, '2018-07-24 17:06:04', '2018-07-24 17:06:04'),
(119, 17, 6, 0, 4, 'Request a call', 'Samah Ahmed Safwat', '201007878078', 'samahelbeh@yahoo.com', NULL, '2018-07-24 17:06:21', '2018-07-24 17:06:21'),
(120, 17, 6, 0, 4, 'Request a call', 'محمود محے الدين', '201064064008', 'mahmoud.mohie@yahoo.com', NULL, '2018-07-24 17:06:44', '2018-07-24 17:06:44'),
(121, 17, 6, 0, 4, 'Request a call', 'Mai Aly Amin', '201091110802', 'eng_mai09@yahoo.com', NULL, '2018-07-24 17:07:01', '2018-07-24 17:07:01'),
(122, 17, 6, 0, 4, 'Request a call', 'Amr Abo Treka', '201095541115', 'amrabotreka22@hotmail.com', NULL, '2018-07-24 17:07:19', '2018-07-24 17:07:19'),
(123, 17, 6, 0, 4, 'Request a call', 'Ahmed Haytham', '201021572715', 'haytham_shams76@yahoo.com', NULL, '2018-07-24 17:07:41', '2018-07-24 17:07:41'),
(124, 17, 6, 0, 4, 'Request a call', 'Ghada M Zarrouk', '201002809465', 'ghadamzarrouk@gmail.com', NULL, '2018-07-24 17:07:59', '2018-07-24 17:07:59'),
(125, 17, 6, 0, 1, 'Request a call', 'Nehad Alsyed', '201159826720', 'none@none', NULL, '2018-07-24 17:08:19', '2018-07-24 17:08:19'),
(126, 17, 6, 0, 1, 'Request a call', 'Wesam Mohamed', '201220020347', 'none@none', NULL, '2018-07-24 17:08:35', '2018-07-24 17:08:35'),
(127, 17, 6, 0, 1, 'Request a call', 'Maro NC Doc', '201001755482', 'none@none', NULL, '2018-07-24 17:08:53', '2018-07-24 17:08:53'),
(128, 17, 6, 0, 1, 'Request a call', 'Tahia Moaawad', '201008404098', 'none@none', NULL, '2018-07-24 17:09:11', '2018-07-24 17:09:11'),
(129, 17, 6, 0, 4, 'Request a call', 'Sanaa Abdallah', '2001222426052', 'sanaaabdallah@hotmail.com', NULL, '2018-07-24 17:18:06', '2018-07-24 17:18:06'),
(130, 17, 6, 0, 1, 'Request a call', 'Rabie Elenipsy', '201278363629', 'none@none', NULL, '2018-07-24 17:18:31', '2018-07-24 17:18:31'),
(131, 17, 6, 0, 4, 'Request a call', 'Ahmed Yahia Darwish', '2001001333721', 'ahmed.yahia.darwish@gmail.com', NULL, '2018-07-24 17:18:51', '2018-07-24 17:18:51'),
(132, 17, 6, 0, 4, 'Request a call', 'Mohamed AL-khodairy', '201111115552', 'mohamed_alkhodairy@yahoo.com', NULL, '2018-07-24 17:19:17', '2018-07-24 17:19:17'),
(133, 17, 6, 0, 4, 'Request a call', 'tarek amin', '2001223110766', 'autocross.2008@Hotmail.com', NULL, '2018-07-24 17:19:35', '2018-07-24 17:19:35'),
(134, 17, 6, 0, 4, 'Request a call', 'amr sedik', '2001095541115', 'an4ever257@yahoo.com', NULL, '2018-07-24 17:19:58', '2018-07-24 17:19:58'),
(135, 17, 6, 0, 4, 'Request a call', 'Emad Mohamed', '201003595067', 'aminemad2004@yahoo.co.uk', NULL, '2018-07-24 17:20:12', '2018-07-24 17:20:12'),
(136, 17, 6, 0, 4, 'Request a call', 'Mostafa Naguib', '201022123217', 'mnaguib89@yahoo.com', NULL, '2018-07-24 17:20:28', '2018-07-24 17:20:28'),
(137, 17, 6, 0, 4, 'Request a call', 'Taher Elwishy', '201003414229', 'taher_wishy@live.com', NULL, '2018-07-24 17:20:43', '2018-07-24 17:20:43'),
(138, 17, 6, 0, 4, 'Request a call', 'Anas Abo Mota', '201090065656', 'anas_mota@yahoo.com', NULL, '2018-07-24 17:20:59', '2018-07-24 17:20:59'),
(139, 17, 6, 0, 4, 'Request a call', 'Mohamed Elansary', '201006912292', 'mano.me22@yahoo.com', NULL, '2018-07-24 17:21:19', '2018-07-24 17:21:19'),
(140, 17, 6, 0, 4, 'Request a call', 'Mohamed Eladly', '201020009692', 'eladlymohamed1@gmail.com', NULL, '2018-07-24 17:22:07', '2018-07-24 17:22:07'),
(141, 17, 6, 0, 1, 'Request a call', 'Hla Make Up', '٠١١١١١٠٠٩٧٠', 'none@none', NULL, '2018-07-24 17:22:30', '2018-07-24 17:22:30'),
(142, 17, 6, 0, 1, 'Request a call', 'Ahmed Hassan', '٠١٠٣٢٢٠٠١٥٠', 'none@none', NULL, '2018-07-24 17:22:54', '2018-07-24 17:22:54'),
(143, 17, 6, 0, 1, 'Request a call', 'Lamiaa Ragab', '201112760100', 'none@none', NULL, '2018-07-24 17:23:34', '2018-07-24 17:23:34'),
(144, 17, 6, 0, 1, 'Request a call', 'Sherif Maged', '96597288209', 'none@none', NULL, '2018-07-24 17:23:48', '2018-07-24 17:23:48'),
(145, 17, 6, 0, 1, 'Request a call', 'Ahmed Tawfik', '01002006272    -    01002006262', 'none@none', NULL, '2018-07-24 17:24:15', '2018-07-24 17:24:15'),
(146, 17, 6, 0, 1, 'Request a call', 'Sherin Elsherif', '201009299494', 'none@none', NULL, '2018-07-24 17:24:33', '2018-07-24 17:24:33'),
(147, 17, 6, 0, 1, 'Request a call', 'Ehab Wagih', '٠١٢٢٧٥٣٥٠٩٢', 'none@none', NULL, '2018-07-24 17:24:51', '2018-07-24 17:24:51'),
(148, 17, 6, 0, 1, 'Request a call', 'Wiseness Kg', '201147696069', 'none@none', NULL, '2018-07-24 17:25:07', '2018-07-24 17:25:07'),
(149, 17, 6, 0, 4, 'Request a call', 'Amr El Sherif', '2001000001707', 'amrfawzyelsherif@gmail.com', NULL, '2018-07-24 17:25:26', '2018-07-24 17:25:26'),
(150, 17, 6, 0, 4, 'Request a call', 'Hussein Shazly', '201113344414', 'atrichworld@gmail.com', NULL, '2018-07-24 17:25:46', '2018-07-24 17:25:46'),
(151, 17, 6, 0, 1, 'Request a call', 'Mohamed Halawa', '201288323288', 'none@none', NULL, '2018-07-24 17:26:07', '2018-07-24 17:26:07'),
(152, 17, 6, 0, 1, 'Request a call', 'Gasser A Salem', '201124248888', 'none@none', NULL, '2018-07-24 17:26:25', '2018-07-24 17:26:25'),
(153, 17, 6, 0, 1, 'Request a call', 'Mohamed Abdel-Rahman Khalifa', '201002809738', 'Khalifa_mohamed@ymail.com', NULL, '2018-07-24 17:27:54', '2018-07-24 17:27:54'),
(154, 17, 6, 0, 4, 'Request a call', 'د.محمد اﻻنصارى', '201276814814', 'dr.mohamedansary@gmail.com', NULL, '2018-07-24 17:28:16', '2018-07-24 17:28:16'),
(155, 17, 6, 0, 4, 'Request a call', 'Remon Magdy Philip', '201271110113', 'remon.faith@hotmail.com', NULL, '2018-07-24 17:28:51', '2018-07-24 17:28:51'),
(156, 17, 6, 0, 4, 'Request a call', 'Sameh Raouf', '201115729873', 'Samehraof74@gmail.com', NULL, '2018-07-24 17:29:31', '2018-07-24 17:29:31'),
(157, 17, 6, 0, 4, 'Request a call', 'Ahmed Abd Elnaby', '201000623880', 'madamezo_115@yahoo.com', NULL, '2018-07-24 17:29:51', '2018-07-24 17:29:51'),
(158, 17, 6, 0, 4, 'Request a call', 'Khaled Rabeaa', '201098886888', 'khaled_ibrahim2008@yahoo.com', NULL, '2018-07-24 17:30:19', '2018-07-24 17:30:19'),
(159, 17, 6, 0, 4, 'Request a call', 'Mohamed Shahen', '201225987400', 'mshahen111@yahoo.com', NULL, '2018-07-24 17:30:38', '2018-07-24 17:30:38'),
(160, 17, 6, 0, 4, 'Request a call', 'Salma Awadallah', '201001440311', 'salmaawadallah@hotmail.com', NULL, '2018-07-24 17:30:55', '2018-07-24 17:30:55'),
(161, 17, 6, 0, 4, 'Request a call', 'Ahmed Ezz', '201220900032', 'ezz.ateb@gmail.com', NULL, '2018-07-24 17:31:17', '2018-07-24 17:31:17'),
(162, 17, 6, 0, 4, 'Request a call', 'Ashraf Ragab', '201005227400', 'ashrafalialex@yahoo.com', NULL, '2018-07-24 17:31:34', '2018-07-24 17:31:34'),
(163, 17, 6, 0, 4, 'Request a call', 'Maha Kelej', '201004441025', 'maha_kelej@hotmail.com', NULL, '2018-07-24 17:31:51', '2018-07-24 17:31:51'),
(164, 17, 6, 0, 4, 'Request a call', 'Fathala Badr', '201277583029', 'fathallabadr@gmail.com', NULL, '2018-07-24 17:32:09', '2018-07-24 17:32:09'),
(165, 17, 6, 0, 4, 'Request a call', 'هدير فريد', '2001205803536', 'h.elkazon@gmail.com', NULL, '2018-07-24 17:32:28', '2018-07-24 17:32:28'),
(166, 17, 6, 0, 4, 'Request a call', 'Abdelmageed Mohamed', '201119000032', 'Bedooo119@gmail.com', NULL, '2018-07-24 17:32:46', '2018-07-24 17:32:46'),
(167, 17, 6, 0, 4, 'Request a call', 'Ehab Mohamed', '201090004786', 'ehab.mohamed70@yahoo.com', NULL, '2018-07-24 17:33:04', '2018-07-24 17:33:04'),
(168, 17, 6, 0, 4, 'Request a call', 'Khaled Mansour', '9660569933366', 'Kmfayek@gmail.com', NULL, '2018-07-24 17:34:53', '2018-07-24 17:34:53'),
(169, 17, 6, 0, 4, 'Request a call', 'Islam Elsayed', '201065762200', 'engislam1982@gmail.com', NULL, '2018-07-24 17:35:49', '2018-07-24 17:35:49'),
(170, 17, 6, 0, 4, 'Request a call', 'Wael Elsayed', '201011938115', 'Wael7730@yahoo.com', NULL, '2018-07-24 17:36:06', '2018-07-24 17:36:06'),
(171, 17, 6, 0, 4, 'Request a call', 'Zamzam Hashem', '201222577413', 'amanda24_7@hotmail.com', NULL, '2018-07-24 17:36:28', '2018-07-24 17:36:28'),
(172, 17, 6, 0, 4, 'Request a call', 'Mohamed Monged', '201066602828', 'mohamed.monged@egic.com.eg', NULL, '2018-07-24 17:36:51', '2018-07-24 17:36:51'),
(173, 17, 6, 0, 4, 'Request a call', 'Omar Sabra', '201114413466', 'omar.sabra.711@gmail.com', NULL, '2018-07-24 17:37:11', '2018-07-24 17:37:11'),
(174, 17, 6, 0, 4, 'Request a call', 'Hossam Sharara', '2001097400975', 'hossamsharara@gmail.com', NULL, '2018-07-24 17:37:29', '2018-07-24 17:37:29'),
(175, 17, 6, 0, 4, 'Request a call', 'Mohamed Atea', '201102003344', 'mohamed.atea2014@gmail.com', NULL, '2018-07-24 17:37:49', '2018-07-24 17:37:49'),
(176, 17, 6, 0, 4, 'Request a call', 'Ahmed Taha', '201288015119', 'ahmed_taha1999@yahoo.com', NULL, '2018-07-24 17:38:04', '2018-07-24 17:38:04'),
(177, 17, 6, 0, 4, 'Request a call', 'Michael Elgawly', '201114800004', 'mikelgawly@gmail.com', NULL, '2018-07-24 17:38:20', '2018-07-24 17:38:20'),
(178, 17, 6, 0, 4, 'Request a call', 'Ahmed Youssef', '201062225565', 'yousefahmed336@yahoo.com', NULL, '2018-07-24 17:38:39', '2018-07-24 17:38:39'),
(179, 17, 6, 0, 4, 'Request a call', 'Mido Youssef', '2001000883132', 'xxf_troy_xxf@hotmail.com', NULL, '2018-07-24 17:39:00', '2018-07-24 17:39:00'),
(180, 17, 6, 0, 4, 'Request a call', 'Ahmed El Kady', '2001226668582', 'elkadybrothers@yahoo.com', NULL, '2018-07-24 17:39:18', '2018-07-24 17:39:18'),
(181, 17, 6, 0, 4, 'Request a call', 'Hazem Hassan', '201111676545', 'zoom5_2004@hotmail.com', NULL, '2018-07-24 17:39:37', '2018-07-24 17:39:37'),
(182, 17, 6, 0, 4, 'Request a call', 'Ahmed Salah', '2001014595060', 'abo.dodo2010@yahoo.com', NULL, '2018-07-24 17:39:56', '2018-07-24 17:39:56'),
(183, 17, 6, 0, 4, 'Request a call', 'Ahmed El Sawaf', '2001098870001', 'ahmed_el_sawaf@hotmail.com', NULL, '2018-07-24 17:40:17', '2018-07-24 17:40:17'),
(184, 17, 6, 0, 1, 'Request a call', 'Mohamed Mansour', '٠٠٩٦٥٩٩٨٤٣١٨٢', 'none@none', NULL, '2018-07-24 17:40:34', '2018-07-24 17:40:34'),
(185, 17, 6, 0, 1, 'Request a call', 'Ashraf Bakr', '96551205335', 'none@none', NULL, '2018-07-24 17:40:48', '2018-07-24 17:40:48'),
(186, 17, 6, 0, 1, 'Request a call', 'Nody Kamal', '٠١٠٠٧٧٩٩١١٦', 'none@none', NULL, '2018-07-24 17:41:03', '2018-07-24 17:41:03'),
(187, 17, 6, 0, 1, 'Request a call', 'Fatma ElKashef', '٠١٢٢٣٤٩٦٤٧٤', 'none@none', NULL, '2018-07-24 17:41:15', '2018-07-24 17:41:15'),
(188, 17, 6, 0, 1, 'Request a call', 'Ahmed Hassan', '٠١٠٣٠٣٣٤٣٣٣', 'none@none', NULL, '2018-07-24 17:41:29', '2018-07-24 17:41:29'),
(189, 17, 6, 0, 1, 'Request a call', 'Manal Rady', '٠١١١٠٩٩٦١٢٢', 'none@none', NULL, '2018-07-24 17:41:53', '2018-07-24 17:41:53'),
(190, 17, 6, 0, 1, 'Request a call', 'Ahmed Abdelfatah Elborgy', '966567605169', 'none@none', NULL, '2018-07-24 17:42:09', '2018-07-24 17:42:09'),
(191, 17, 6, 0, 1, 'Request a call', 'Mahmoud Al Azzeh', '965-99418417', 'none@none', NULL, '2018-07-24 17:42:27', '2018-07-24 17:42:27'),
(192, 17, 6, 0, 1, 'Request a call', 'Asmaa Abdelmoez', '966500959787', 'none@none', NULL, '2018-07-24 17:42:45', '2018-07-24 17:42:45'),
(193, 17, 6, 0, 1, 'Request a call', 'Yasmine Mohamed', '01011996838', 'none@none', NULL, '2018-07-24 17:43:04', '2018-07-24 17:43:04'),
(194, 17, 6, 0, 1, 'Request a call', 'Mostafa Sayed Mohamed', '٠١٢٠٣٨٢٢٢٨٠', 'none@none', NULL, '2018-07-24 17:43:17', '2018-07-24 17:43:17'),
(195, 17, 6, 0, 1, 'Request a call', 'Eman Badawy', '٢٤٣٠٥٧٦٥', 'none@none', NULL, '2018-07-24 17:43:36', '2018-07-24 17:43:36'),
(196, 17, 6, 0, 1, 'Request a call', 'Kamilia Abbas', '٠١٢٧٢٠٨٠٦١٩', 'none@none', NULL, '2018-07-24 17:43:49', '2018-07-24 17:43:49'),
(197, 17, 6, 0, 1, 'Request a call', 'Ehab Mosafer', '201000083207', 'none@none', NULL, '2018-07-24 17:44:03', '2018-07-24 17:44:03'),
(198, 1, 1, 0, 4, 'Request a call', 'Naeem Sam', '970599908249', 'naeemcam2013@gmail.com', NULL, '2018-07-24 18:27:35', '2018-07-24 18:27:35'),
(199, 1, 1, 0, 4, 'Request a call', 'Eslam Gamal Mostafa', '201282101123', 'es1990m@gmail.com', NULL, '2018-07-24 18:28:02', '2018-07-24 18:28:02'),
(200, 1, 1, 0, 4, 'Request a call', 'Mahmoud Gamal', '201220064555', 'mr.mahmoudgamal0@gmail.com', NULL, '2018-07-24 18:28:20', '2018-07-24 18:28:20'),
(201, 1, 1, 0, 1, 'Request a call', 'Ashraf El-ghanam', '201149754782', 'none@none', NULL, '2018-07-24 18:28:42', '2018-07-24 18:28:42'),
(202, 1, 1, 0, 1, 'Request a call', 'Mario Ashraf Fahmy', '201202250044', 'none@none', NULL, '2018-07-24 18:28:57', '2018-07-24 18:28:57'),
(203, 1, 1, 0, 4, 'Request a call', 'Ahmèd Yousry', '201068530999', 'ahmed.y.elsawy@gmail.com', NULL, '2018-07-24 18:29:16', '2018-07-24 18:29:16'),
(204, 1, 1, 0, 4, 'Request a call', 'Hossam Hamdy Abdel Kader', '201006888914', 'hh.abdelkader@gmail.com', NULL, '2018-07-24 18:29:38', '2018-07-24 18:29:38'),
(205, 1, 1, 0, 4, 'Request a call', 'Sky Fall', '201111106868', 'beshoy_desperado@hotmail.com', NULL, '2018-07-24 18:33:42', '2018-07-24 18:33:42'),
(206, 1, 1, 0, 4, 'Request a call', 'Gamal Hafez', '2001210322137', 'gamal_hafez@hotmail.com', NULL, '2018-07-24 18:34:07', '2018-07-24 18:34:07'),
(207, 1, 1, 0, 4, 'Request a call', 'Mina Samir Louiz', '201282742242', 'minasamir007@gmail.com', NULL, '2018-07-24 18:34:33', '2018-07-24 18:34:33'),
(208, 1, 1, 0, 4, 'Request a call', 'Hassan Mohamed Helmy Hosny', '201004340013', 'hassan.anwer26@gmail.com', NULL, '2018-07-24 18:35:08', '2018-07-24 18:35:08'),
(209, 1, 1, 0, 4, 'Request a call', 'Alaa Assan', '201063387071', 'none@none', NULL, '2018-07-24 18:35:57', '2018-07-24 18:35:57'),
(210, 1, 1, 0, 1, 'Request a call', 'Mohamed El-esnawy', '201001623406', 'none@none', NULL, '2018-07-24 18:36:23', '2018-07-24 18:36:23'),
(211, 1, 1, 0, 2, 'Request a call', 'Hamed Grand Adv	none', '201007193003', 'none@none', NULL, '2018-07-24 18:36:43', '2018-07-24 18:36:43'),
(212, 1, 1, 0, 2, 'Request a call', 'Nassim Wadea', '201223614360', 'none@none', NULL, '2018-07-24 18:37:16', '2018-07-24 18:37:16'),
(213, 1, 1, 0, 4, 'Request a call', 'Mahmoud Al Kadi', '201015145008', 'mahmoud.kadi.87@gmail.com', NULL, '2018-07-24 18:37:36', '2018-07-24 18:37:36'),
(214, 1, 1, 0, 1, 'Request a call', 'Emad Slama', '201271782936', 'none@none', NULL, '2018-07-24 18:37:58', '2018-07-24 18:37:58'),
(215, 1, 1, 0, 4, 'Request a call', 'Muhammad Gaafar', '201013710997', 'muhammadgaafar85@gmail.com', NULL, '2018-07-24 18:38:22', '2018-07-24 18:38:22'),
(216, 1, 1, 0, 1, 'Request a call', 'Mohamed Omar El-farouk', '201009198284', 'none@none', NULL, '2018-07-24 18:38:47', '2018-07-24 18:38:47'),
(217, 1, 1, 0, 4, 'Request a call', 'Mohamed Fouad', '201111727627', 'mohamed@safeway-eg.com', NULL, '2018-07-24 18:39:06', '2018-07-24 18:39:06'),
(218, 1, 1, 0, 1, 'Request a call', 'Ahmed Abdel Hameed Attia', '201063063098', 'ahmateya@gmail.com', NULL, '2018-07-24 18:39:21', '2018-07-24 18:39:21'),
(219, 1, 1, 0, 4, 'Request a call', 'Mohamed El-Naggar', '201000273523', 'mohamedesmail2000@gmail.com', NULL, '2018-07-24 18:39:43', '2018-07-24 18:39:43'),
(220, 1, 1, 0, 4, 'Request a call', 'ابراهيم الحفناوى', '201012479865', 'hemaasd@yahoo.com', NULL, '2018-07-24 18:40:04', '2018-07-24 18:40:04'),
(221, 1, 1, 0, 3, 'Need Support', 'qwd', 'qwd', 'qwdqwd@qadwq.qwdqwd', 'qwd', '2018-07-29 09:16:41', '2018-07-29 09:16:41'),
(222, 1, 1, 0, 4, 'Need Support', 'qwd', 'qwd', 'qwdqwd@qadwq.qwdqwd', 'qwdqwdqwd', '2018-07-29 09:17:07', '2018-07-29 09:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `customer_lead__feedbacks`
--

CREATE TABLE `customer_lead__feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_lead_id` int(10) UNSIGNED NOT NULL,
  `company_user_id` int(10) UNSIGNED NOT NULL,
  `lead_status_feedback_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_lead__feedbacks`
--

INSERT INTO `customer_lead__feedbacks` (`id`, `customer_lead_id`, `company_user_id`, `lead_status_feedback_id`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '08/08/2008', 'lol', NULL, NULL),
(2, 2, 1, 2, '2018-07-19 14:50', 'dfgdfgdfg', '2018-07-15 19:10:31', '2018-07-15 19:10:31'),
(3, 6, 20, 2, NULL, 'Owned by traffic media - Dokantak website, (E-commerce retail), sent him our portofolio, will check it and get back to us.', '2018-07-20 20:56:16', '2018-07-20 20:56:16'),
(4, 6, 20, 2, '2018-07-20 15:55', 'Owned by traffic media - Dokantak website, (E-commerce retail), sent him our portofolio, will check it and get back to us.', '2018-07-20 20:58:14', '2018-07-20 20:58:14'),
(5, 80, 21, 2, '2018-07-11 14:50', 'dfgdfgdfg', '2018-07-23 00:48:31', '2018-07-23 00:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_proposal` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `is_proposal`) VALUES
(1, 'Business Development', '2018-07-15 17:48:47', '2018-07-15 17:48:47', 0),
(2, 'Software Development', NULL, '2018-07-31 07:30:39', 0),
(3, 'Digital & Social Media', NULL, '2018-07-31 07:30:22', 1),
(5, 'Marketing', '2018-07-18 15:31:40', '2018-07-31 07:30:33', 1),
(6, 'Advertising', '2018-07-18 15:32:10', '2018-07-31 07:30:16', 1),
(7, 'Admin', '2018-07-18 15:32:27', '2018-07-18 15:32:27', 0),
(8, 'CEO', '2018-07-24 04:53:11', '2018-07-31 12:22:12', 0),
(9, 'Production House', '2018-07-24 08:01:54', '2018-07-24 08:01:54', 0);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `potential_id` int(10) UNSIGNED NOT NULL,
  `feedback_form_id` int(10) UNSIGNED NOT NULL,
  `values` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `potential_id`, `feedback_form_id`, `values`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'comment : <span>wdqwdqwd</span>;date : <span>11-07-2018</span>;', '2018-07-16 10:26:47', '2018-07-16 10:26:47'),
(2, 1, 10, 'date time : <span>2018-07-27 19:30</span>;', '2018-07-19 13:08:19', '2018-07-19 13:08:19'),
(3, 1, 5, 'comment : <span>qwdqwd</span>;date time : <span>2018-07-11 14:30</span>;', '2018-07-19 13:27:46', '2018-07-19 13:27:46'),
(10, 19, 3, 'date time : <span>2018-07-25 02:00</span>;', '2018-07-23 05:29:35', '2018-07-23 05:29:35'),
(11, 19, 2, 'comment : <span>sending location on WhatsApp</span>;date : <span>22-07-2018</span>;', '2018-07-23 05:31:49', '2018-07-23 05:31:49'),
(12, 20, 11, 'comment : <span>عايز بورتوفليو ضروري جدا النهارده بخصوص: الويب سايتس اللي احنا عملناها، وشغل السوشيال ميديا .. وهيتارجت العراق: والايميل بتاعه اهو: Info@shmyiwu.com .. ولو عجبه الشغل هيجلنا التجمع</span>;date : <span>23-07-2018</span>;', '2018-07-23 05:32:50', '2018-07-23 05:32:50'),
(13, 20, 2, 'comment : <span>العميل مهتم جدا، واشتغل مع ايجنسي قبل كده وفي انتظار بورتوفليو - واتفقت معاه علي الباكديج 2: 7000 جنيه</span>;date : <span>22-07-2018</span>;', '2018-07-23 05:34:20', '2018-07-23 05:34:20'),
(14, 21, 3, 'date time : <span>2018-07-25 02:00</span>;comment : <span>Sending location on Whatsapp</span>;', '2018-07-23 05:39:35', '2018-07-23 05:39:35'),
(15, 22, 11, 'comment : <span>عاوز يفتح في العراق\r\nالعميل مهتم جدا، واشتغل مع ايجنسي قبل كده وفي انتظار بورتوفليو - واتفقت معاه علي الباكديج 2: 7000 جنيه</span>;', '2018-07-23 05:43:05', '2018-07-23 05:43:05'),
(16, 22, 11, 'comment : <span>عايز بورتوفليو ضروري جدا النهارده بخصوص: الويب سايتس اللي احنا عملناها، وشغل السوشيال ميديا .. وهيتارجت العراق: والايميل بتاعه اهو: Info@shmyiwu.com .. ولو عجبه الشغل هيجلنا التجمع</span>;', '2018-07-23 05:43:52', '2018-07-23 05:43:52'),
(17, 1, 13, 'quotation : <span>on</span>;', '2018-07-23 05:44:11', '2018-07-23 05:44:11'),
(18, 1, 3, 'date time : <span>2018-07-23 00:45</span>;comment : <span></span>;', '2018-07-23 05:46:17', '2018-07-23 05:46:17'),
(19, 23, 2, 'comment : <span>Call him back after 20 Mins because of a meeting</span>;date : <span>22-07-2018</span>;', '2018-07-23 05:53:10', '2018-07-23 05:53:10'),
(20, 24, 14, 'date : <span></span>;comment : <span>Call him back to set meeting</span>;', '2018-07-23 06:01:56', '2018-07-23 06:01:56'),
(21, 25, 3, 'date time : <span>2018-07-25 11:00</span>;comment : <span>منتظر follow up عشان ميتنج يوم الاربعاء</span>;', '2018-07-23 06:05:46', '2018-07-23 06:05:46'),
(22, 26, 14, 'date : <span>25-07-2018</span>;comment : <span>عايز كامبين ليدز فيسبوك .. ومحتاج حد يتابع معاه عشان ميتنج يوم الإربعاء</span>;', '2018-07-23 06:12:32', '2018-07-23 06:12:32'),
(23, 27, 14, 'date : <span></span>;comment : <span>Call him back to set meeting</span>;', '2018-07-23 06:15:35', '2018-07-23 06:15:35'),
(24, 28, 3, 'date time : <span>2018-07-23 03:00</span>;comment : <span>مقالتش هي عايزة انهي باكديج .. بس تقريبا هينفع ليها الأولي والتانية</span>;', '2018-07-23 06:31:09', '2018-07-23 06:31:09'),
(25, 28, 3, 'date time : <span>2018-07-23 03:00</span>;comment : <span>جايلنا ميتنج هنا يوم الاتنين الساعة 3 .. حد يتابع معاه بس</span>;', '2018-07-23 06:32:52', '2018-07-23 06:32:52'),
(26, 29, 3, 'date time : <span>2018-07-25 02:00</span>;comment : <span>Follow up for Wednesday to meet the client</span>;', '2018-07-23 06:38:14', '2018-07-23 06:38:14'),
(27, 30, 14, 'date : <span></span>;comment : <span>عايز حد يكلمه يعمل معاه ميتنج في منطقة قريبة عشان صعبة عليه التجمع ومعندوش مقر .. وده عميل بيبع الكترونيكات أونلاين بس مش محدد ايه نوع الالكترونيات اللي بيركز عليها .. بيأخد منتجات من علي امازون واي باي وبيتشغل تسويق بالعمولة فعايزنها نساعد في تسويق لده عن طريق السوشيال ميديا</span>;', '2018-07-23 06:43:54', '2018-07-23 06:43:54'),
(28, 31, 14, 'date : <span></span>;comment : <span>MBA Holder opens a Medical equipment company. He needs a full online identity and I recommend to benefit him through SEO, Adwords Cam. and Social Media Campaigns</span>;', '2018-07-23 06:49:20', '2018-07-23 06:49:20'),
(29, 32, 11, 'comment : <span>مجلة عن رواد الأعمال .. مستنية تستقبل اسعار الباكدجات عن طريق الواتساب</span>;', '2018-07-23 06:51:41', '2018-07-23 06:51:41'),
(30, 1, 15, 'comment : <span>test</span>;', '2018-07-23 18:27:26', '2018-07-23 18:27:26'),
(31, 28, 3, 'date time : <span>2018-07-24 15:00</span>;comment : <span></span>;', '2018-07-23 19:13:50', '2018-07-23 19:13:50'),
(32, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:25', '2018-07-23 20:51:25'),
(33, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:26', '2018-07-23 20:51:26'),
(34, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:26', '2018-07-23 20:51:26'),
(35, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:26', '2018-07-23 20:51:26'),
(36, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:27', '2018-07-23 20:51:27'),
(37, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:27', '2018-07-23 20:51:27'),
(38, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:27', '2018-07-23 20:51:27'),
(39, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:28', '2018-07-23 20:51:28'),
(40, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:28', '2018-07-23 20:51:28'),
(41, 35, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 20:51:28', '2018-07-23 20:51:28'),
(42, 36, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:00:27', '2018-07-23 21:00:27'),
(43, 1, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:03:12', '2018-07-23 21:03:12'),
(44, 36, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:15:03', '2018-07-23 21:15:03'),
(45, 37, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:15:41', '2018-07-23 21:15:41'),
(46, 42, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:24:06', '2018-07-23 21:24:06'),
(47, 43, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:27:46', '2018-07-23 21:27:46'),
(48, 38, 16, 'date : <span></span>;comment : <span>الساعة 8 مساءا فى اى يوم</span>;', '2018-07-23 21:30:11', '2018-07-23 21:30:11'),
(49, 44, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:32:07', '2018-07-23 21:32:07'),
(50, 45, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:33:55', '2018-07-23 21:33:55'),
(51, 46, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:36:20', '2018-07-23 21:36:20'),
(52, 47, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:38:22', '2018-07-23 21:38:22'),
(53, 48, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:42:14', '2018-07-23 21:42:14'),
(54, 48, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:43:01', '2018-07-23 21:43:01'),
(55, 49, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:43:43', '2018-07-23 21:43:43'),
(56, 49, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-23 21:45:08', '2018-07-23 21:45:08'),
(57, 52, 3, 'comment : <span>qwdqwdqwd</span>;', '2018-07-24 16:51:17', '2018-07-24 16:51:17'),
(58, 52, 3, 'comment : <span>qwd</span>;', '2018-07-24 17:58:17', '2018-07-24 17:58:17'),
(59, 52, 13, 'quotation : <span>on</span>;', '2018-07-24 17:59:11', '2018-07-24 17:59:11'),
(60, 65, 2, 'comment : <span></span>;date : <span>03-07-2018</span>;', '2018-07-24 21:51:16', '2018-07-24 21:51:16'),
(61, 65, 2, 'comment : <span></span>;date : <span>03-07-2018</span>;', '2018-07-24 21:52:21', '2018-07-24 21:52:21'),
(62, 65, 3, 'comment : <span>qwdqwdqwd</span>;', '2018-07-24 21:56:43', '2018-07-24 21:56:43'),
(63, 65, 3, 'comment : <span>qwdqwdqwd</span>;', '2018-07-24 21:57:01', '2018-07-24 21:57:01'),
(64, 65, 2, 'comment : <span>qwd</span>;date : <span>11-07-2018</span>;', '2018-07-24 22:02:30', '2018-07-24 22:02:30'),
(65, 1, 8, 'comment : <span>qwdqwd</span>;date time : <span>2018-07-26 10:30</span>;', '2018-07-25 15:49:35', '2018-07-25 15:49:35'),
(66, 17, 2, 'comment : <span>qwdqwd</span>;date : <span>25-07-2018</span>;', '2018-07-25 18:23:25', '2018-07-25 18:23:25'),
(67, 21, 3, 'comment : <span>qwdqwdqwd</span>;', '2018-07-25 18:25:16', '2018-07-25 18:25:16'),
(68, 70, 14, 'date : <span>05-07-2018</span>;comment : <span></span>;', '2018-07-26 02:43:54', '2018-07-26 02:43:54'),
(69, 70, 3, 'comment : <span></span>;', '2018-07-26 02:44:22', '2018-07-26 02:44:22'),
(70, 69, 2, 'date time : <span>2018-07-17 10:00</span>;comment : <span>call tomorrow morning  Tuesday at 10:00 am</span>;', '2018-07-26 02:51:00', '2018-07-26 02:51:00'),
(71, 69, 1, 'date time : <span></span>;', '2018-07-26 02:51:24', '2018-07-26 02:51:24'),
(72, 69, 14, 'date time : <span>2018-07-22 10:00</span>;comment : <span>call on  next Sunday morning to set a meeting</span>;', '2018-07-26 02:52:15', '2018-07-26 02:52:15'),
(73, 69, 3, 'date time : <span>2018-07-24 10:00</span>;location : <span>tagam3 l awal gmb mdrast l andalus shre3 fared l atrash villa 12 mgmu3a 11/12 bgwar mdrst l andalus</span>;Feedback : <span>Thursday at 3 to 4 :00 pm</span>;', '2018-07-26 02:52:59', '2018-07-26 02:52:59'),
(74, 72, 17, 'comment : <span>هيفكر ويكلمني</span>;', '2018-07-26 03:15:36', '2018-07-26 03:15:36'),
(75, 73, 2, 'date time : <span>2018-07-25 18:15</span>;comment : <span>Call him back after 20 Mins because of a meeting</span>;', '2018-07-26 03:17:54', '2018-07-26 03:17:54'),
(76, 29, 3, 'date time : <span>2018-07-26 02:00</span>;location : <span>2 share3 abo el soud motafare3 mn share3 doc lasheen marrioteya faisal, door 1</span>;Feedback : <span>follow up for wendesday meeting</span>;', '2018-07-26 03:24:11', '2018-07-26 03:24:11'),
(77, 26, 3, 'date time : <span>2018-07-28 02:00</span>;location : <span>Office</span>;Feedback : <span>Meeting at officeعايز كامبين ليدز فيسبوك</span>;', '2018-07-26 03:25:46', '2018-07-26 03:25:46'),
(78, 25, 3, 'date time : <span>2018-07-29 10:00</span>;location : <span>Office</span>;Feedback : <span></span>;', '2018-07-26 03:27:18', '2018-07-26 03:27:18'),
(79, 24, 3, 'date time : <span>2018-07-25 09:30</span>;location : <span>Office</span>;Feedback : <span></span>;', '2018-07-26 03:29:47', '2018-07-26 03:29:47'),
(80, 21, 3, 'date time : <span>2018-07-29 01:00</span>;location : <span>5th Statement</span>;Feedback : <span>Sending location on whatsapp</span>;', '2018-07-26 03:37:03', '2018-07-26 03:37:03'),
(81, 74, 1, 'date time : <span></span>;', '2018-07-26 03:56:08', '2018-07-26 03:56:08'),
(82, 74, 11, 'comment : <span>عايز حد يبعتله عناصر الباكدج الاولي متضمنة كذا وكذا علي الايميل .. وده عميل عايز يعمل وسايت لحجز الرحلات زي أوبر وكريم اونلاين كده</span>;', '2018-07-26 03:56:53', '2018-07-26 03:56:53'),
(83, 22, 11, 'comment : <span>عايز بورتوفليو ضروري جدا النهارده بخصوص: الويب سايتس اللي احنا عملناها، وشغل السوشيال ميديا .. وهيتارجت العراق: والايميل بتاعه اهو: Info@shmyiwu.com .. ولو عجبه الشغل هيجلنا التجمع</span>;', '2018-07-26 03:58:07', '2018-07-26 03:58:07'),
(84, 75, 17, 'comment : <span>Asks for Whatsapp communication instead of phone</span>;', '2018-07-26 16:41:36', '2018-07-26 16:41:36'),
(85, 76, 17, 'comment : <span>couldn\'t remember the offer.</span>;', '2018-07-26 16:46:18', '2018-07-26 16:46:18'),
(86, 38, 3, 'date time : <span>2018-07-26 20:00</span>;location : <span>Hillioples</span>;Feedback : <span>meeting at 8:00 pm 131 marghany street udam macdonald w shawermer</span>;', '2018-07-26 16:52:19', '2018-07-26 16:52:19'),
(87, 77, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-26 17:07:03', '2018-07-26 17:07:03'),
(88, 78, 16, 'date : <span></span>;comment : <span>ضرورى</span>;', '2018-07-26 17:09:46', '2018-07-26 17:09:46'),
(89, 33, 16, 'date : <span></span>;comment : <span></span>;', '2018-07-26 17:11:35', '2018-07-26 17:11:35'),
(90, 79, 3, 'date time : <span>2018-07-26 13:00</span>;location : <span>Helioples</span>;Feedback : <span>Tuesday at 1:00 pm , 21 share3 hussein khedr mutfre3 n share3 abdelaziz fahmy , medan helioples msr l gdeda , gmb l m7kma yemen , tane tkatu3 , m3ml l mukhtbr talt tkatu3 , l dur l tane</span>;', '2018-07-26 17:38:21', '2018-07-26 17:38:21'),
(91, 27, 2, 'date time : <span></span>;comment : <span>he is in beirut will call us when he returns to egypt</span>;', '2018-07-26 21:32:20', '2018-07-26 21:32:20'),
(92, 23, 14, 'date time : <span>2018-07-30 13:00</span>;comment : <span>call to set meeting for the same day , he wants to meet us in his place to discuss , he works in chocolate and sweets for weddings</span>;', '2018-07-26 21:39:18', '2018-07-26 21:39:18'),
(93, 23, 14, 'date time : <span>2018-07-30 13:00</span>;comment : <span>call to set meeting for the same day , he wants to meet us in his place to discuss , he works in chocolate and sweets for weddings</span>;', '2018-07-26 21:39:25', '2018-07-26 21:39:25'),
(94, 1, 17, 'comment : <span>qwdqwdqwdqwd</span>;', '2018-07-29 09:09:13', '2018-07-29 09:09:13'),
(95, 80, 3, 'date time : <span>2018-07-26 18:30</span>;location : <span>qwdqwdqwd</span>;Feedback : <span>qwdqwdqwdqwd</span>;', '2018-07-29 09:09:53', '2018-07-29 09:09:53'),
(96, 80, 13, 'quotation : <span>on</span>;', '2018-07-29 09:11:18', '2018-07-29 09:11:18'),
(97, 13, 3, 'date time : <span>2018-07-19 18:30</span>;location : <span>qwdqwd</span>;Feedback : <span>qwdqwdqwd</span>;', '2018-07-31 06:49:12', '2018-07-31 06:49:12'),
(98, 13, 3, 'date time : <span>2018-07-26 10:50</span>;location : <span>qdqwd</span>;Feedback : <span>qwdqdw</span>;', '2018-07-31 06:50:45', '2018-07-31 06:50:45'),
(99, 13, 13, 'quotation : <span>on</span>;', '2018-07-31 06:51:26', '2018-07-31 06:51:26'),
(100, 1, 18, 'proposal : <span>on</span>;', '2018-07-31 09:11:13', '2018-07-31 09:11:13'),
(101, 17, 18, 'proposal : <span>on</span>;', '2018-07-31 09:14:48', '2018-07-31 09:14:48'),
(102, 22, 18, 'proposal : <span>on</span>;', '2018-07-31 09:17:22', '2018-07-31 09:17:22'),
(103, 22, 13, 'quotation : <span>on</span>;', '2018-07-31 09:17:41', '2018-07-31 09:17:41'),
(104, 23, 3, 'date time : <span>2018-07-27 14:30</span>;location : <span>qwdqwd</span>;Feedback : <span>qwdqwdqwd</span>;', '2018-07-31 09:18:50', '2018-07-31 09:18:50'),
(105, 27, 18, 'proposal : <span>on</span>;', '2018-07-31 12:24:55', '2018-07-31 12:24:55'),
(106, 27, 3, 'date time : <span>2018-07-25 18:30</span>;location : <span>qwddddddddddd</span>;Feedback : <span>qwddddddddddd</span>;', '2018-07-31 12:25:28', '2018-07-31 12:25:28'),
(107, 26, 1, 'date time : <span>2018-07-25 14:30</span>;', '2018-08-01 06:12:33', '2018-08-01 06:12:33'),
(108, 26, 3, 'date time : <span>2018-07-26 14:30</span>;location : <span>qwdqwd</span>;Feedback : <span>qwdqwdqwd</span>;', '2018-08-01 06:12:44', '2018-08-01 06:12:44'),
(109, 26, 1, 'date time : <span>2018-07-04 06:30</span>;', '2018-08-01 06:12:59', '2018-08-01 06:12:59'),
(110, 28, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:13:38', '2018-08-01 06:13:38'),
(111, 28, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:16:03', '2018-08-01 06:16:03'),
(112, 28, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:16:13', '2018-08-01 06:16:13'),
(113, 28, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:18:59', '2018-08-01 06:18:59'),
(114, 29, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:19:07', '2018-08-01 06:19:07'),
(115, 30, 2, 'date time : <span>2018-07-27 19:30</span>;comment : <span>qwdqwd</span>;', '2018-08-01 06:19:15', '2018-08-01 06:19:15'),
(116, 31, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:19:24', '2018-08-01 06:19:24'),
(117, 32, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:19:31', '2018-08-01 06:19:31'),
(118, 33, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:19:38', '2018-08-01 06:19:38'),
(119, 34, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:19:47', '2018-08-01 06:19:47'),
(120, 35, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:19:54', '2018-08-01 06:19:54'),
(121, 36, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:20:03', '2018-08-01 06:20:03'),
(122, 37, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:20:14', '2018-08-01 06:20:14'),
(123, 38, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:20:24', '2018-08-01 06:20:24'),
(124, 39, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:20:32', '2018-08-01 06:20:32'),
(125, 40, 2, 'date time : <span>2018-08-01 14:30</span>;comment : <span>qwdqwdqwd</span>;', '2018-08-01 06:21:13', '2018-08-01 06:21:13'),
(126, 41, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:21:19', '2018-08-01 06:21:19'),
(127, 42, 1, 'date time : <span>2018-07-26 14:30</span>;', '2018-08-01 06:21:26', '2018-08-01 06:21:26'),
(128, 43, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:21:32', '2018-08-01 06:21:32'),
(129, 44, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:21:39', '2018-08-01 06:21:39'),
(130, 45, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:21:44', '2018-08-01 06:21:44'),
(131, 46, 2, 'date time : <span>2018-07-25 14:30</span>;comment : <span>qwdqwd</span>;', '2018-08-01 06:21:50', '2018-08-01 06:21:50'),
(132, 47, 1, 'date time : <span>2018-07-04 06:30</span>;', '2018-08-01 06:21:56', '2018-08-01 06:21:56'),
(133, 69, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:22:17', '2018-08-01 06:22:17'),
(134, 71, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:22:26', '2018-08-01 06:22:26'),
(135, 72, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:22:34', '2018-08-01 06:22:34'),
(136, 73, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:22:43', '2018-08-01 06:22:43'),
(137, 74, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:22:49', '2018-08-01 06:22:49'),
(138, 75, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:22:56', '2018-08-01 06:22:56'),
(139, 76, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 06:23:02', '2018-08-01 06:23:02'),
(140, 77, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 06:23:10', '2018-08-01 06:23:10'),
(141, 78, 1, 'date time : <span>2018-07-25 14:30</span>;', '2018-08-01 06:23:19', '2018-08-01 06:23:19'),
(142, 17, 3, 'date time : <span>2018-07-17 13:45</span>;location : <span>qwdqwd</span>;Feedback : <span>qwdqwdqwd</span>;', '2018-08-01 07:29:08', '2018-08-01 07:29:08'),
(143, 69, 18, 'proposal : <span>on</span>;', '2018-08-01 07:32:07', '2018-08-01 07:32:07'),
(144, 21, 18, 'proposal : <span>on</span>;', '2018-08-01 07:34:58', '2018-08-01 07:34:58'),
(145, 80, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 08:02:12', '2018-08-01 08:02:12'),
(146, 46, 3, 'date time : <span>2018-07-27 19:30</span>;location : <span>qwdqwd</span>;Feedback : <span>qwdqwdqwd</span>;', '2018-08-01 08:09:18', '2018-08-01 08:09:18'),
(147, 24, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 08:34:38', '2018-08-01 08:34:38'),
(148, 34, 3, 'date time : <span>2018-07-27 19:30</span>;location : <span>qwdqwd</span>;Feedback : <span>qwdqwdqwdqwd</span>;', '2018-08-01 08:41:22', '2018-08-01 08:41:22'),
(149, 28, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 08:43:38', '2018-08-01 08:43:38'),
(150, 30, 1, 'date time : <span>2018-07-18 14:50</span>;', '2018-08-01 09:01:06', '2018-08-01 09:01:06'),
(151, 30, 3, 'date time : <span>2018-07-25 14:30</span>;location : <span>qwdqwdqwd</span>;Feedback : <span>qwdqwdqwdqwdqwd</span>;', '2018-08-01 09:01:25', '2018-08-01 09:01:25'),
(152, 23, 13, 'quotation : <span>on</span>;', '2018-08-01 09:22:33', '2018-08-01 09:22:33'),
(153, 25, 18, 'proposal : <span>on</span>;', '2018-08-01 09:23:24', '2018-08-01 09:23:24'),
(154, 26, 3, 'date time : <span>2018-07-17 13:45</span>;location : <span>qwd</span>;Feedback : <span>qwdqwd</span>;', '2018-08-01 09:24:01', '2018-08-01 09:24:01'),
(155, 26, 18, 'proposal : <span>on</span>;', '2018-08-01 09:24:41', '2018-08-01 09:24:41'),
(156, 27, 18, 'proposal : <span>on</span>;', '2018-08-01 09:26:09', '2018-08-01 09:26:09'),
(157, 27, 13, 'quotation : <span>on</span>;', '2018-08-01 09:26:18', '2018-08-01 09:26:18'),
(158, 29, 18, 'proposal : <span>on</span>;', '2018-08-01 09:57:11', '2018-08-01 09:57:11'),
(159, 37, 3, 'date time : <span>2018-07-25 14:30</span>;location : <span>qwd</span>;Feedback : <span>qwdqwd</span>;', '2018-08-01 10:03:32', '2018-08-01 10:03:32'),
(160, 37, 13, 'quotation : <span>on</span>;', '2018-08-01 10:04:04', '2018-08-01 10:04:04'),
(161, 31, 13, 'quotation : <span>on</span>;', '2018-08-01 10:04:41', '2018-08-01 10:04:41'),
(162, 32, 13, 'quotation : <span>on</span>;', '2018-08-01 10:07:04', '2018-08-01 10:07:04'),
(163, 75, 13, 'quotation : <span>on</span>;', '2018-08-01 10:08:18', '2018-08-01 10:08:18'),
(164, 75, 18, 'proposal : <span>on</span>;', '2018-08-01 10:08:34', '2018-08-01 10:08:34'),
(165, 34, 13, 'quotation : <span>on</span>;', '2018-08-01 11:14:29', '2018-08-01 11:14:29'),
(166, 1, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:31:46', '2018-08-01 11:31:46'),
(167, 13, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:32:03', '2018-08-01 11:32:03'),
(168, 17, 1, 'date time : <span>2018-07-25 14:30</span>;', '2018-08-01 11:32:10', '2018-08-01 11:32:10'),
(169, 21, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 11:32:25', '2018-08-01 11:32:25'),
(170, 22, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:32:31', '2018-08-01 11:32:31'),
(171, 23, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 11:32:36', '2018-08-01 11:32:36'),
(172, 24, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:32:45', '2018-08-01 11:32:45'),
(173, 25, 1, 'date time : <span>2018-07-25 14:30</span>;', '2018-08-01 11:32:53', '2018-08-01 11:32:53'),
(174, 26, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:33:00', '2018-08-01 11:33:00'),
(175, 27, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:33:13', '2018-08-01 11:33:13'),
(176, 28, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:33:20', '2018-08-01 11:33:20'),
(177, 29, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 11:33:26', '2018-08-01 11:33:26'),
(178, 30, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 11:33:33', '2018-08-01 11:33:33'),
(179, 31, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:33:47', '2018-08-01 11:33:47'),
(180, 32, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:33:52', '2018-08-01 11:33:52'),
(181, 33, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:33:59', '2018-08-01 11:33:59'),
(182, 34, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:34:04', '2018-08-01 11:34:04'),
(183, 35, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 11:34:11', '2018-08-01 11:34:11'),
(184, 36, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:34:17', '2018-08-01 11:34:17'),
(185, 37, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:34:25', '2018-08-01 11:34:25'),
(186, 38, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 11:34:31', '2018-08-01 11:34:31'),
(187, 39, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:34:38', '2018-08-01 11:34:38'),
(188, 40, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 11:34:46', '2018-08-01 11:34:46'),
(189, 41, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:34:58', '2018-08-01 11:34:58'),
(190, 42, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:35:02', '2018-08-01 11:35:02'),
(191, 43, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:35:08', '2018-08-01 11:35:08'),
(192, 44, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:35:13', '2018-08-01 11:35:13'),
(193, 45, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:35:19', '2018-08-01 11:35:19'),
(194, 46, 1, 'date time : <span>2018-07-17 13:45</span>;', '2018-08-01 11:35:24', '2018-08-01 11:35:24'),
(195, 47, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:35:32', '2018-08-01 11:35:32'),
(196, 69, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:35:42', '2018-08-01 11:35:42'),
(197, 71, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:35:48', '2018-08-01 11:35:48'),
(198, 72, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:35:53', '2018-08-01 11:35:53'),
(199, 73, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:00', '2018-08-01 11:36:00'),
(200, 74, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:06', '2018-08-01 11:36:06'),
(201, 75, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:11', '2018-08-01 11:36:11'),
(202, 76, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:18', '2018-08-01 11:36:18'),
(203, 77, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:26', '2018-08-01 11:36:26'),
(204, 78, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:33', '2018-08-01 11:36:33'),
(205, 79, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:39', '2018-08-01 11:36:39'),
(206, 80, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:44', '2018-08-01 11:36:44'),
(207, 81, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:50', '2018-08-01 11:36:50'),
(208, 82, 1, 'date time : <span>2018-07-27 19:30</span>;', '2018-08-01 11:36:55', '2018-08-01 11:36:55'),
(209, 36, 13, 'quotation : <span>on</span>;', '2018-08-02 06:28:23', '2018-08-02 06:28:23'),
(210, 36, 18, 'proposal : <span>on</span>;', '2018-08-02 11:00:22', '2018-08-02 11:00:22'),
(211, 83, 13, 'quotation : <span>on</span>;', '2018-08-02 11:02:42', '2018-08-02 11:02:42'),
(212, 83, 18, 'proposal : <span>on</span>;', '2018-08-02 11:03:06', '2018-08-02 11:03:06'),
(213, 33, 13, 'quotation : <span>on</span>;', '2018-08-02 12:24:16', '2018-08-02 12:24:16'),
(214, 33, 18, 'proposal : <span>on</span>;', '2018-08-02 12:25:46', '2018-08-02 12:25:46'),
(215, 34, 18, 'proposal : <span>on</span>;', '2018-08-05 07:08:13', '2018-08-05 07:08:13'),
(216, 31, 18, 'proposal : <span>on</span>;', '2018-08-05 07:35:30', '2018-08-05 07:35:30'),
(217, 24, 18, 'proposal : <span>on</span>;', '2018-08-05 07:44:31', '2018-08-05 07:44:31'),
(218, 29, 13, 'quotation : <span>on</span>;', '2018-08-07 07:26:28', '2018-08-07 07:26:28'),
(219, 30, 13, 'quotation : <span>on</span>;', '2018-08-07 07:27:11', '2018-08-07 07:27:11'),
(220, 30, 13, 'quotation : <span>on</span>;', '2018-08-07 07:34:28', '2018-08-07 07:34:28'),
(221, 79, 13, 'quotation : <span>on</span>;', '2018-08-07 07:35:09', '2018-08-07 07:35:09'),
(222, 28, 13, 'quotation : <span>on</span>;', '2018-08-07 07:36:27', '2018-08-07 07:36:27'),
(223, 82, 13, 'quotation : <span>on</span>;', '2018-08-07 07:37:50', '2018-08-07 07:37:50'),
(224, 81, 18, 'proposal : <span>on</span>;', '2018-08-07 07:50:03', '2018-08-07 07:50:03'),
(225, 81, 3, 'date time : <span>2018-07-17 13:45</span>;location : <span>qwd</span>;Feedback : <span>qwdqwdqwd</span>;', '2018-08-07 07:50:28', '2018-08-07 07:50:28'),
(226, 35, 4, 'comment : <span>qwdqwd</span>;date time : <span>2018-07-04 06:30</span>;', '2018-08-07 08:00:03', '2018-08-07 08:00:03'),
(227, 81, 13, 'quotation : <span>on</span>;', '2018-08-26 09:15:19', '2018-08-26 09:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_forms`
--

CREATE TABLE `feedback_forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_html` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback_forms`
--

INSERT INTO `feedback_forms` (`id`, `name`, `form_html`, `created_at`, `updated_at`) VALUES
(1, 'No Answer', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Date / Time</label>\r\n<input style=\"width:100%\" class=\"form-control date_time\" name=\"date_time\"/>\r\n</div>', '2018-07-15 18:05:37', '2018-07-15 18:05:37'),
(2, 'Call Back', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Date / Time</label>\r\n<input style=\"width:100%\" class=\"form-control date_time\" name=\"date_time\"/>\r\n</div>\r\n<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>', '2018-07-15 18:05:49', '2018-07-26 02:49:00'),
(3, 'Meeting', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Date / Time</label>\r\n<input style=\"width:100%\" class=\"form-control date_time\" name=\"date_time\"/>\r\n</div>\r\n<div class=\"form-group\" style=\"width:100%\">\r\n<label>Location</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"location\"></textarea>\r\n</div>\r\n<div class=\"form-group\" style=\"width:100%\">\r\n<label>Feedback</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"Feedback\"></textarea>\r\n</div>', '2018-07-15 18:06:03', '2018-07-26 02:50:29'),
(4, 'Number Busy', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>\r\n<div class=\"\" style=\"width:100%\">\r\n<label>Date / Time</label>\r\n<input style=\"width:100%\" class=\"form-control date_time\" name=\"date_time\"/>\r\n</div>', '2018-07-15 18:06:22', '2018-07-25 21:46:40'),
(5, 'Sweiched Off', '<div></div>', '2018-07-15 18:06:35', '2018-07-24 10:46:08'),
(6, 'Wrong Number', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>', '2018-07-15 18:07:00', '2018-07-24 10:47:05'),
(7, 'Wrong Approach', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>', '2018-07-15 18:07:09', '2018-07-24 10:46:45'),
(8, 'Not Intersted', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>\r\n<div class=\"form-group\" style=\"width:100%\">\r\n<label>Date / Time</label>\r\n<input style=\"width:100%\" class=\"form-control date_time\" name=\"date_time\"/>\r\n</div>', '2018-07-15 18:07:23', '2018-07-15 18:07:23'),
(9, 'Another Agency', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>', '2018-07-15 18:07:35', '2018-07-23 05:37:11'),
(10, 'Lost', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Date / Time</label>\r\n<input style=\"width:100%\" class=\"form-control date_time\" name=\"date_time\"/>\r\n</div>', '2018-07-15 18:07:48', '2018-07-15 18:07:48'),
(11, 'Sending Portifolio', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>', '2018-07-15 18:08:11', '2018-07-23 05:41:55'),
(13, 'Quotation', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Quotation</label>\r\n<input name=\"quotation\" type=\"checkbox\"/>\r\n</div>', '2018-07-19 13:32:41', '2018-07-19 13:34:11'),
(14, 'Set Meeting', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Date / Time</label>\r\n<input style=\"width:100%\" class=\"form-control date_time\" name=\"date_time\"/>\r\n</div>\r\n<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>', '2018-07-23 06:01:15', '2018-07-26 02:49:26'),
(15, 'Take a general idea', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>', '2018-07-23 06:09:12', '2018-07-23 06:09:12'),
(16, 'Technical Call', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Date</label>\r\n<input style=\"width:100%\" class=\"form-control date\" name=\"date\"/>\r\n</div>\r\n<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>', '2018-07-23 20:47:05', '2018-07-23 20:48:36'),
(17, 'Follow Up', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Comment</label>\r\n<textarea style=\"width:100%\" class=\"form-control\" name=\"comment\"></textarea>\r\n</div>', '2018-07-26 03:15:15', '2018-07-26 03:15:15'),
(18, 'Proposal', '<div class=\"form-group\" style=\"width:100%\">\r\n<label>Proposal</label>\r\n<input name=\"proposal\" type=\"checkbox\"/>\r\n</div>', '2018-07-31 09:11:03', '2018-07-31 09:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `f_a_qs`
--

CREATE TABLE `f_a_qs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_sliders`
--

CREATE TABLE `image_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `imageurl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ismaster` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Realestate', '2018-07-15 17:58:14', '2018-07-15 17:58:14'),
(2, 'Candy', NULL, '2018-07-23 05:52:22'),
(3, 'Magazine', NULL, '2018-07-23 06:50:31'),
(5, 'Agricultural Investment', '2018-07-23 05:55:22', '2018-07-23 05:55:22'),
(6, 'Healthy foods and food supplements', '2018-07-23 06:03:15', '2018-07-23 06:03:15'),
(7, 'Organize Conferences', '2018-07-23 06:14:08', '2018-07-23 06:14:08'),
(8, 'Coloration', '2018-07-23 06:30:00', '2018-07-23 06:30:00'),
(9, 'Electronics & Mobile Phones', '2018-07-23 06:34:27', '2018-07-23 06:34:27'),
(10, 'Filters', '2018-07-26 03:02:40', '2018-07-26 03:02:40'),
(11, 'Transportation', '2018-07-26 03:10:25', '2018-07-26 03:10:25'),
(12, 'Rental of cars for trips', '2018-07-26 03:54:56', '2018-07-26 03:54:56'),
(13, 'Cash counting machines', '2018-07-26 16:37:37', '2018-07-26 16:37:37'),
(14, 'Securities', '2018-07-26 16:44:11', '2018-07-26 16:44:11'),
(15, 'Dresses and clothes', '2018-07-26 17:05:14', '2018-07-26 17:05:14'),
(16, 'Medical Supplies & Supplies', '2018-07-26 17:08:10', '2018-07-26 17:08:10'),
(17, 'Import and Export', '2018-07-26 17:12:35', '2018-07-26 17:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `input_names`
--

CREATE TABLE `input_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `input_names`
--

INSERT INTO `input_names` (`id`, `name`, `created_at`, `updated_at`, `code`, `type`) VALUES
(1, 'Radio Button', '2018-07-15 17:48:47', '2018-07-15 17:48:47', '<input required type=\"radio\" name=\"input-name\">', 'input'),
(2, 'Checkbox', '2018-07-15 17:48:47', '2018-07-15 17:48:47', '<input required type=\"checkbox\" name=\"input-name\">', 'input'),
(3, 'Text', '2018-07-15 17:48:47', '2018-07-15 17:48:47', '<input required type=\"text\" class=\"form-control\" name=\"input-name\">', 'input'),
(4, 'Long Text', '2018-07-15 17:48:47', '2018-07-15 17:48:47', '<textarea required class=\"form-control\" name=\"input-name\" rows=\"4\"></textarea>', 'textarea'),
(5, 'File', '2018-07-15 17:48:47', '2018-07-15 17:48:47', '<input type=\"file\" name=\"input-name\">', 'file'),
(6, 'Multiple Files', '2018-07-15 17:48:47', '2018-07-15 17:48:47', '<input type=\"file\" name=\"input-name[]\" multiple>', 'file'),
(7, 'Number', '2018-07-15 17:48:47', '2018-07-15 17:48:47', '<input required type=\"number\" class=\"form-control\" name=\"input-name\">', 'input'),
(8, 'Date', '2018-07-15 17:48:47', '2018-07-15 17:48:47', '<input required type=\"text\" class=\"form-control date\" name=\"input-name\">', 'input'),
(9, 'Date Range', '2018-07-15 17:48:47', '2018-07-15 17:48:47', '<input required type=\"text\" class=\"form-control date-range\" name=\"input-name\">', 'input');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead__sources`
--

CREATE TABLE `lead__sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead__sources`
--

INSERT INTO `lead__sources` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'FB Message', NULL, NULL),
(2, 'FB Comment', NULL, NULL),
(3, 'Live chat', NULL, NULL),
(4, 'Website form', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead__status__feedbacks`
--

CREATE TABLE `lead__status__feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead__status__feedbacks`
--

INSERT INTO `lead__status__feedbacks` (`id`, `name`, `form`, `created_at`, `updated_at`) VALUES
(1, 'No Answer', '<div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\">Feedback Date</label> 	<div class=\"col-md-7\"> 		<input class=\"form-control form_datetime\" type=\"text\" id=\"date\" name=\"date\" placeholder=\"Date\"> 	</div> </div> <div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\"></label> 	<div class=\"col-md-7\"> 		<a class=\"form-control btn btn-sm btn-primary\" id=\"test\" data-dismiss=\"modal\" href=\"#\">Save</a> 	</div> </div>', NULL, NULL),
(2, 'Call Back', '<div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\">Feedback Date</label> 	<div class=\"col-md-7\"> 		<input class=\"form-control form_datetime\" type=\"text\" id=\"date\" name=\"date\" placeholder=\"Date\"> 	</div> </div> <div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\">Feedback Description</label> 	<div class=\"col-md-7\"> 		<input class=\"form-control\" type=\"text\" id=\"decs\" name=\"decs\" placeholder=\"Description\"> 	</div> </div> <div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\"></label> 	<div class=\"col-md-7\"> 		<a class=\"form-control btn btn-sm btn-primary\" id=\"test\" data-dismiss=\"modal\" href=\"#\">Save</a> 	</div> </div>', NULL, NULL),
(3, 'Wrong Number', '<div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\">Feedback Date</label> 	<div class=\"col-md-7\"> 		<input class=\"form-control form_datetime\" type=\"text\" id=\"date\" name=\"date\" placeholder=\"Date\"> 	</div> </div> <div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\"></label> 	<div class=\"col-md-7\"> 		<a class=\"form-control btn btn-sm btn-primary\" id=\"test\" data-dismiss=\"modal\" href=\"#\">Save</a> 	</div> </div>', NULL, NULL),
(4, 'Not interested', '<div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\">Feedback Date</label> 	<div class=\"col-md-7\"> 		<input class=\"form-control form_datetime\" type=\"text\" id=\"date\" name=\"date\" placeholder=\"Date\"> 	</div> </div> <div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\">Feedback Description</label> 	<div class=\"col-md-7\"> 		<input class=\"form-control\" type=\"text\" id=\"decs\" name=\"decs\" placeholder=\"Description\"> 	</div> </div> <div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\"></label> 	<div class=\"col-md-7\"> 		<a class=\"form-control btn btn-sm btn-primary\" id=\"test\" data-dismiss=\"modal\" href=\"#\">Save</a> 	</div> </div>', NULL, NULL),
(5, 'Another Project', '<div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\">Feedback Date</label> 	<div class=\"col-md-7\"> 		<input class=\"form-control form_datetime\" type=\"text\" id=\"date\" name=\"date\" placeholder=\"Date\"> 	</div> </div> <div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\">Feedback Description</label> 	<div class=\"col-md-7\"> 		<input class=\"form-control\" type=\"text\" id=\"decs\" name=\"decs\" placeholder=\"Description\"> 	</div> </div> <div class=\"form-group\"><label class=\"col-md-3 control-label\" for=\"example-hf-email\"></label> 	<div class=\"col-md-7\"> 		<a class=\"form-control btn btn-sm btn-primary\" id=\"test\" data-dismiss=\"modal\" href=\"#\">Save</a> 	</div> </div>', NULL, NULL),
(6, 'Appointment', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like__posts`
--

CREATE TABLE `like__posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `look_and_feels`
--

CREATE TABLE `look_and_feels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managements`
--

CREATE TABLE `managements` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_feedbacks`
--

CREATE TABLE `meeting_feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_feedbacks`
--

INSERT INTO `meeting_feedbacks` (`id`, `company_id`, `date_time`, `notes`, `type`, `created_at`, `updated_at`) VALUES
(2, 1, '2018-07-04 06:30', 'qwdqwdqwd', 'Proposal', '2018-07-23 05:46:39', '2018-07-25 17:06:35'),
(3, 52, '2018-07-27 19:30', 'qwdqwd', 'Proposal', '2018-07-24 16:51:51', '2018-07-24 17:59:47'),
(4, 69, '2018-07-24 10:00', 'the client interested', 'Quotation', '2018-07-26 02:53:42', '2018-07-26 02:53:42'),
(5, 79, '28-July-2018', 'Emirates restaurant located in Dubai and will open in Egypt - Korba  , it\'s name Arabian Tea House , they want quotation for digital budget 20 K , and quotation for menus with good quality , soset (direction signs)', 'Proposal', '2018-07-26 19:27:42', '2018-07-26 19:27:42'),
(6, 79, '28-July-2018', 'Emirates restaurant located in Dubai and will open in Egypt - Korba  , it\'s name Arabian Tea House , they want quotation for digital budget 20 K , and quotation for menus with good quality , soset (direction signs)', 'Proposal', '2018-07-26 19:27:43', '2018-07-26 19:27:43'),
(7, 79, '28-July-2018', 'Emirates restaurant located in Dubai and will open in Egypt - Korba  , it\'s name Arabian Tea House , they want quotation for digital budget 20 K , and quotation for menus with good quality , soset (direction signs)', 'Proposal', '2018-07-26 19:27:43', '2018-07-26 19:27:43'),
(8, 79, '28-July-2018', 'Emirates restaurant located in Dubai and will open in Egypt - Korba  , it\'s name Arabian Tea House , they want quotation for digital budget 20 K , and quotation for menus with good quality , soset (direction signs)', 'Proposal', '2018-07-26 19:27:43', '2018-07-26 19:27:43'),
(9, 80, '2018-07-17 13:45', 'qwdqwdqwd', 'Proposal', '2018-07-29 09:10:05', '2018-07-29 09:10:57'),
(10, 13, '2018-07-04 06:30', 'qwdqwdqwd', 'Proposal', '2018-07-31 06:49:26', '2018-07-31 06:50:10'),
(11, 21, '2018-07-26 14:30', 'qwdqwd', 'Quotation', '2018-07-31 09:21:33', '2018-08-01 07:34:49'),
(12, 23, '2018-07-26 14:30', 'qwdqwd', 'Proposal', '2018-07-31 09:21:52', '2018-08-01 09:22:13'),
(13, 24, '2018-08-29 10:30', 'qwdqwd', 'Quotation', '2018-08-01 06:12:15', '2018-08-01 08:34:46'),
(14, 25, '2018-08-22 10:50', 'qwdqwd', 'Quotation', '2018-08-01 06:12:25', '2018-08-01 06:12:25'),
(15, 26, '2018-07-27 19:30', 'qwdqwdqwd', 'Quotation', '2018-08-01 06:13:29', '2018-08-01 09:24:08'),
(16, 17, '2018-07-27 19:30', 'qwdqwdqwd', 'Quotation', '2018-08-01 07:29:25', '2018-08-01 07:29:25'),
(17, 46, '2018-07-27 19:30', 'qwdqwdqwd qwd', 'Quotation', '2018-08-01 08:09:28', '2018-08-01 08:17:05'),
(18, 28, '2018-07-27 19:30', 'qwdqwd', 'Proposal', '2018-08-01 08:43:54', '2018-08-01 08:43:54'),
(19, 30, '2018-07-12 10:50', 'qwdqwdqwdqwd', 'Proposal', '2018-08-01 09:01:37', '2018-08-01 09:01:37'),
(20, 37, '2018-07-27 19:30', 'qwdqwdqwd', 'Proposal', '2018-08-01 10:03:40', '2018-08-01 10:03:40'),
(21, 81, '2018-07-27 19:30', 'wdqwd', 'Proposal', '2018-08-07 07:50:48', '2018-08-07 07:50:48');

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
(1, '2014_10_12_000000_create_crm_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_31_113810_create_blogs_table', 1),
(4, '2018_05_31_120339_create_jobs_table', 1),
(5, '2018_05_31_125532_create_blog_comments_table', 1),
(6, '2018_05_31_132132_create_careers_table', 1),
(7, '2018_06_05_123037_create_departments_table', 1),
(8, '2018_06_05_124425_create_positions_table', 1),
(9, '2018_06_06_121925_create_input_names_table', 1),
(10, '2018_06_06_121940_create_tasks_table', 1),
(11, '2018_06_06_121943_create_task_inputs_table', 1),
(12, '2018_06_07_095648_create_services_table', 1),
(13, '2018_06_07_095656_create_service_tasks_table', 1),
(14, '2018_06_07_122934_add_approved_to_tasks', 1),
(15, '2018_06_07_123735_create_user_positions_table', 1),
(16, '2018_06_12_112429_create_contactuses_table', 1),
(17, '2018_06_13_102328_create_website_user_plans_table', 1),
(18, '2018_06_13_132552_create_image_sliders_table', 1),
(19, '2018_06_22_094250_create_questions__categories_table', 1),
(20, '2018_06_23_080659_create_industries_table', 1),
(21, '2018_06_23_090736_create_f_a_qs_table', 1),
(22, '2018_06_23_125230_create_permissions_table', 1),
(23, '2018_06_23_132656_create_companies_table', 1),
(24, '2018_06_23_132665_create_privlages_table', 1),
(25, '2018_06_23_132666_create_company__users_table', 1),
(26, '2018_06_24_102337_create_levels_table', 1),
(27, '2018_06_24_103338_create_technologies_table', 1),
(28, '2018_06_24_104017_create_look_and_feels_table', 1),
(29, '2018_06_24_104558_create_contents_table', 1),
(30, '2018_06_24_105203_create_post_types_table', 1),
(31, '2018_06_24_105705_create_promote_statuses_table', 1),
(32, '2018_06_24_110537_create_managements_table', 1),
(33, '2018_06_24_114444_create_profilings_table', 1),
(34, '2018_06_24_114450_create_profiling_refs_table', 1),
(35, '2018_06_24_114456_create_profiling_prods_table', 1),
(36, '2018_06_24_114505_create_profiling_sites_table', 1),
(37, '2018_06_24_114517_create_profiling_socials_table', 1),
(38, '2018_06_25_122018_create_feedback_forms_table', 1),
(39, '2018_06_25_132808_create_feedbacks_table', 1),
(40, '2018_06_27_085417_create_permission_positions_table', 1),
(41, '2018_07_03_092201_create_task_positions_table', 1),
(42, '2018_07_03_092215_create_task_services_table', 1),
(43, '2018_07_03_092720_add_cols_to_tasks_table', 1),
(44, '2018_07_03_104913_create_task_assigns_table', 1),
(45, '2018_07_03_134439_create_plans_table', 1),
(46, '2018_07_03_134445_create_plan_services_table', 1),
(47, '2018_07_04_104027_create_plans_histories_table', 1),
(48, '2018_07_04_104043_create_plan_services_histories_table', 1),
(49, '2018_07_04_135111_add_trigger_category_to_permissions_table', 1),
(50, '2018_07_10_083044_create_unit__types_table', 1),
(51, '2018_07_10_083119_create_projects_table', 1),
(52, '2018_07_10_083149_create_branches_table', 1),
(53, '2018_07_10_083216_create_project__unit__types_table', 1),
(54, '2018_07_10_083302_create_lead__sources_table', 1),
(55, '2018_07_10_083332_create_lead__status__feedbacks_table', 1),
(56, '2018_07_10_083349_create_roles_table', 1),
(57, '2018_07_10_083412_create_role__privlages_table', 1),
(58, '2018_07_10_083504_create_customer_leads_table', 1),
(59, '2018_07_10_083517_create_customer_lead__feedbacks_table', 1),
(60, '2018_07_11_124935_create_branch__gallaries_table', 1),
(61, '2018_07_11_124957_create_project__gallaries_table', 1),
(62, '2018_07_12_133517_create_companies_moderators_table', 1),
(63, '2018_07_16_143924_create_cron_jobs_table', 1),
(64, '2018_07_16_143936_create_failed_jobs_table', 1),
(65, '2018_07_19_094622_add_type_to_positions_table', 1),
(66, '2018_07_19_132011_create_quotations_table', 1),
(67, '2018_07_19_132021_create_proposals_table', 1),
(68, '2018_07_22_110321_create_meeting_feedbacks_table', 1),
(69, '2018_07_22_115300_create_quotation_services_table', 1),
(70, '2018_07_26_103629_add_cols_to_crm_users', 1),
(71, '2018_07_29_142457_add_service_id_to_tasks_table', 1),
(72, '2018_07_30_110737_create_like__posts_table', 1),
(73, '2018_07_30_110737_create_share__posts_table', 1),
(74, '2018_07_31_092426_add_is_proposal_to_departments', 1),
(75, '2018_07_31_093515_add_departement_id_to_proposals', 1),
(77, '2018_07_31_094938_add_with_contract_to_quotations', 2),
(78, '2018_07_31_100912_delete_foreign_keys_from_profiling', 3),
(79, '2018_07_31_101251_change_levels_id_in_profiling', 4),
(82, '2018_08_01_080138_add_progress_to_companies', 5),
(83, '2018_08_01_132839_create_contracts_table', 5),
(84, '2018_08_02_095424_add_cols_to_quotations', 6),
(86, '2018_08_02_110308_add_collect_date_to_quotations', 7),
(87, '2018_08_07_091130_change_proposal_to_linked_to_quotation', 8),
(88, '2018_08_08_103923_change_structure_of_task_assigns', 9),
(89, '2018_08_09_094241_add_code_to_input_names_table', 10),
(92, '2018_08_12_084829_create_task_executions_table', 11),
(96, '2018_08_12_124606_add_type_to_input_names_table', 12),
(97, '2018_08_14_140747_add_cols_to_task_assigns_table', 13),
(99, '2018_08_15_085958_create_task_approve_comments_table', 14),
(100, '2018_08_15_113418_add_qnt_lvl_to_task_assigns_table', 15),
(101, '', 16),
(102, '', 17),
(103, '', 18),
(104, '', 19),
(105, '2018_08_12_132327_add_status_to_quotations', 20),
(106, '2018_08_15_122142_create_quotation_service_quantities_table', 20),
(107, '2018_08_15_122210_create_quotation_service_quantity_comments_table', 20),
(108, '2018_08_15_124938_add_q_q_s_id_to_task_assigns_table', 20),
(109, '2018_08_15_132612_remove_qnt_lvl_col_from_task_assigns_table', 21),
(110, '2018_08_15_140702_add_director_apprve_to_task_assigns_table', 22),
(111, '2018_08_15_143807_add_type_to_task_approve_comments_table', 23),
(112, '2018_08_16_090522_add_is_director_declined_to_task_assigns_table', 24),
(114, '2018_08_26_135503_add_is_proposal_completed_to_quotations_table', 25),
(115, '2018_08_28_082512_add_is_complete_to_proposals_table', 26);

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
  `trigger` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trigger_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `trigger`, `name`, `created_at`, `updated_at`, `trigger_category`) VALUES
(1, 'moderator', 'Moderation', '2018-07-15 17:52:50', '2018-07-23 23:57:27', 'customers'),
(2, 'add_lead', 'Add Leads', '2018-07-16 08:56:50', '2018-07-16 08:56:50', 'customers'),
(4, 'add_potential', 'Add Potential', '2018-07-16 09:01:01', '2018-07-16 09:01:01', 'potential'),
(6, 'add_customer', 'Add Customer', '2018-07-16 09:02:03', '2018-07-16 09:02:03', 'customers'),
(8, 'edit_potential', 'Edit Potential', '2018-07-16 09:03:19', '2018-07-16 09:03:19', 'potential'),
(10, 'add_strategy', 'Add Strategy', '2018-07-18 15:41:20', '2018-07-24 04:50:50', 'proposal'),
(11, 'admin', 'Admin', '2018-07-19 11:22:18', '2018-07-19 11:22:18', 'admin'),
(12, 'add_quotation', 'Add Quotation', '2018-07-19 14:06:03', '2018-07-19 14:06:17', 'potential'),
(13, 'add_meeting', 'Add Meeting', '2018-07-22 18:18:14', '2018-07-22 18:18:14', 'potential'),
(14, 'add_proposal', 'Add Proposal', '2018-07-22 20:17:04', '2018-07-22 20:17:04', 'potential'),
(15, 'first_feedback', 'First Feedback To DIGI-SAIL Customer', '2018-07-24 04:40:22', '2018-07-24 04:43:01', 'potential'),
(16, 'technical_call', 'Technical Call', '2018-07-24 04:44:57', '2018-07-24 04:44:57', 'potential'),
(17, 'add_meeting_feedback', 'Add Meeting Feedback', '2018-07-24 04:45:56', '2018-07-30 10:25:16', 'potential'),
(18, 'update_profile', 'Update Profile', '2018-07-24 04:47:48', '2018-07-24 04:47:48', 'potential'),
(20, 'add_connection', 'Add Connection', '2018-07-24 04:52:48', '2018-07-24 04:52:48', 'potential'),
(21, 'add', 'Add', '2018-07-25 20:04:10', '2018-07-25 20:04:10', 'departement'),
(22, 'edit', 'Edit', '2018-07-25 20:04:18', '2018-07-25 20:04:18', 'departement'),
(23, 'delete', 'Delete', '2018-07-25 20:04:27', '2018-07-25 20:04:27', 'departement'),
(24, 'add', 'Add', '2018-07-25 20:04:43', '2018-07-25 20:04:43', 'positions'),
(25, 'edit', 'Edit', '2018-07-25 20:04:54', '2018-07-25 20:04:54', 'positions'),
(26, 'delete', 'Delete', '2018-07-25 20:05:06', '2018-07-25 20:05:06', 'positions'),
(27, 'add', 'Add', '2018-07-25 20:06:15', '2018-07-25 20:06:15', 'permissions'),
(28, 'edit', 'Edit', '2018-07-25 20:06:24', '2018-07-25 20:06:24', 'permissions'),
(29, 'delete', 'Delete', '2018-07-25 20:06:32', '2018-07-25 20:06:32', 'permissions'),
(30, 'add', 'Add', '2018-07-25 20:06:51', '2018-07-25 20:06:51', 'industries'),
(31, 'edit', 'Edit', '2018-07-25 20:07:02', '2018-07-25 20:07:02', 'industries'),
(32, 'delete', 'Delete', '2018-07-25 20:07:11', '2018-07-25 20:07:11', 'industries'),
(33, 'add', 'Add', '2018-07-25 20:07:27', '2018-07-25 20:07:27', 'users'),
(34, 'edit', 'Edit', '2018-07-25 20:07:39', '2018-07-25 20:07:39', 'users'),
(35, 'delete', 'Delete', '2018-07-25 20:07:53', '2018-07-25 20:07:53', 'users'),
(36, 'add', 'Add', '2018-07-25 20:08:12', '2018-07-25 20:08:12', 'tasks_generator'),
(37, 'edit', 'Edit', '2018-07-25 20:08:19', '2018-07-25 20:08:19', 'tasks_generator'),
(38, 'delete', 'Delete', '2018-07-25 20:08:29', '2018-07-25 20:08:29', 'tasks_generator'),
(39, 'assign', 'Assign', '2018-07-25 20:08:40', '2018-08-07 10:32:51', 'tasks_assign'),
(42, 'add', 'Add', '2018-07-25 20:09:06', '2018-07-25 20:09:06', 'services'),
(43, 'edit', 'Edit', '2018-07-25 20:09:13', '2018-07-25 20:09:13', 'services'),
(44, 'delete', 'Delete', '2018-07-25 20:09:23', '2018-07-25 20:09:23', 'services'),
(45, 'add', 'Add', '2018-07-25 20:09:35', '2018-07-25 20:09:35', 'plans'),
(46, 'edit', 'Edit', '2018-07-25 20:09:46', '2018-07-25 20:09:46', 'plans'),
(47, 'delete', 'Delete', '2018-07-25 20:09:56', '2018-07-25 20:09:56', 'plans'),
(48, 'add', 'Add', '2018-07-25 20:10:13', '2018-07-25 20:10:13', 'levels'),
(49, 'edit', 'Edit', '2018-07-25 20:10:20', '2018-07-25 20:10:20', 'levels'),
(50, 'delete', 'Delete', '2018-07-25 20:10:31', '2018-07-25 20:10:31', 'levels'),
(51, 'add', 'Add', '2018-07-25 20:10:43', '2018-07-25 20:10:43', 'technologies'),
(52, 'edit', 'Edit', '2018-07-25 20:10:50', '2018-07-25 20:10:50', 'technologies'),
(53, 'delete', 'Delete', '2018-07-25 20:10:58', '2018-07-25 20:10:58', 'technologies'),
(54, 'add', 'Add', '2018-07-25 20:11:13', '2018-07-25 20:11:13', 'look_and_feels'),
(55, 'edit', 'Edit', '2018-07-25 20:11:19', '2018-07-25 20:11:19', 'look_and_feels'),
(56, 'delete', 'Delete', '2018-07-25 20:11:26', '2018-07-25 20:11:26', 'look_and_feels'),
(57, 'add', 'Add', '2018-07-25 20:11:42', '2018-07-25 20:11:42', 'content'),
(58, 'edit', 'Edit', '2018-07-25 20:11:50', '2018-07-25 20:11:50', 'content'),
(59, 'delete', 'Delete', '2018-07-25 20:11:57', '2018-07-25 20:11:57', 'content'),
(60, 'add', 'Add', '2018-07-25 20:12:07', '2018-07-25 20:12:07', 'post_types'),
(61, 'edit', 'Edit', '2018-07-25 20:12:15', '2018-07-25 20:12:15', 'post_types'),
(62, 'delete', 'Delete', '2018-07-25 20:12:24', '2018-07-25 20:12:24', 'post_types'),
(63, 'add', 'Add', '2018-07-25 20:12:44', '2018-07-25 20:12:44', 'promote_status'),
(64, 'edit', 'Edit', '2018-07-25 20:12:56', '2018-07-25 20:12:56', 'promote_status'),
(65, 'delete', 'Delete', '2018-07-25 20:13:05', '2018-07-25 20:13:05', 'promote_status'),
(66, 'add', 'Add', '2018-07-25 20:13:22', '2018-07-25 20:13:22', 'management'),
(67, 'edit', 'Edit', '2018-07-25 20:13:33', '2018-07-25 20:13:33', 'management'),
(68, 'delete', 'Delete', '2018-07-25 20:14:36', '2018-07-25 20:14:36', 'management'),
(69, 'add', 'Add', '2018-07-25 20:15:55', '2018-07-25 20:15:55', 'feedback_forms'),
(70, 'edit', 'Edit', '2018-07-25 20:16:05', '2018-07-25 20:16:05', 'feedback_forms'),
(71, 'delete', 'Delete', '2018-07-25 20:16:16', '2018-07-25 20:16:16', 'feedback_forms'),
(72, 'view_lead', 'View Lead', '2018-07-30 08:23:16', '2018-07-30 08:23:16', 'customers'),
(74, 'delete_potential', 'Delete Potential', '2018-07-30 10:26:29', '2018-07-30 10:26:29', 'potential'),
(75, 'verify_potential', 'Verify Potential', '2018-07-30 10:26:51', '2018-07-30 10:26:51', 'potential'),
(76, 'edit_connection', 'Edit Connection', '2018-07-30 10:27:20', '2018-07-30 10:27:20', 'potential'),
(77, 'delete_connection', 'Delete Connection', '2018-07-30 10:27:36', '2018-07-30 10:27:36', 'potential'),
(78, 'add_feedback', 'Add Feedback', '2018-07-30 10:28:48', '2018-07-30 10:28:48', 'potential'),
(79, 'add_contract', 'Add', '2018-08-01 11:54:06', '2018-08-01 11:54:06', 'contracts'),
(80, 'edit_contract', 'Edit', '2018-08-01 11:54:35', '2018-08-01 11:54:35', 'contracts'),
(81, 'collect_money', 'Collect Money', '2018-08-02 08:03:08', '2018-08-02 08:03:08', 'finance'),
(82, 'task_approve', 'Task Approve', '2018-08-14 09:45:29', '2018-08-14 09:45:29', 'task_approve'),
(83, 'director_task_approve', 'Director Task Approve', '2018-08-15 12:14:53', '2018-08-15 12:14:53', 'director_task_approve'),
(84, 'complete_proposal', 'Complete Proposal', '2018-08-26 12:30:30', '2018-08-26 12:30:30', 'complete_proposal');

-- --------------------------------------------------------

--
-- Table structure for table `permission_positions`
--

CREATE TABLE `permission_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_positions`
--

INSERT INTO `permission_positions` (`id`, `permission_id`, `position_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '2018-07-16 08:56:50', '2018-07-16 08:56:50'),
(7, 6, 1, '2018-07-16 09:02:03', '2018-07-16 09:02:03'),
(8, 6, 2, '2018-07-16 09:02:03', '2018-07-16 09:02:03'),
(10, 8, 1, '2018-07-16 09:03:19', '2018-07-16 09:03:19'),
(16, 11, 1, '2018-07-19 12:59:25', '2018-07-19 12:59:25'),
(17, 11, 15, '2018-07-19 12:59:25', '2018-07-19 12:59:25'),
(20, 12, 1, '2018-07-19 14:06:17', '2018-07-19 14:06:17'),
(21, 12, 15, '2018-07-19 14:06:17', '2018-07-19 14:06:17'),
(24, 14, 1, '2018-07-22 20:17:04', '2018-07-22 20:17:04'),
(25, 14, 15, '2018-07-22 20:17:04', '2018-07-22 20:17:04'),
(28, 15, 16, '2018-07-24 04:43:01', '2018-07-24 04:43:01'),
(29, 16, 17, '2018-07-24 04:44:57', '2018-07-24 04:44:57'),
(32, 18, 1, '2018-07-24 04:47:48', '2018-07-24 04:47:48'),
(34, 13, 1, '2018-07-24 04:49:14', '2018-07-24 04:49:14'),
(35, 13, 16, '2018-07-24 04:49:14', '2018-07-24 04:49:14'),
(36, 13, 17, '2018-07-24 04:49:14', '2018-07-24 04:49:14'),
(37, 13, 15, '2018-07-24 04:49:14', '2018-07-24 04:49:14'),
(38, 10, 14, '2018-07-24 04:50:50', '2018-07-24 04:50:50'),
(39, 10, 13, '2018-07-24 04:50:50', '2018-07-24 04:50:50'),
(45, 21, 15, '2018-07-25 20:04:10', '2018-07-25 20:04:10'),
(46, 22, 15, '2018-07-25 20:04:18', '2018-07-25 20:04:18'),
(47, 23, 15, '2018-07-25 20:04:27', '2018-07-25 20:04:27'),
(48, 24, 15, '2018-07-25 20:04:43', '2018-07-25 20:04:43'),
(49, 25, 15, '2018-07-25 20:04:54', '2018-07-25 20:04:54'),
(50, 26, 15, '2018-07-25 20:05:06', '2018-07-25 20:05:06'),
(51, 27, 15, '2018-07-25 20:06:15', '2018-07-25 20:06:15'),
(52, 28, 15, '2018-07-25 20:06:24', '2018-07-25 20:06:24'),
(53, 29, 15, '2018-07-25 20:06:32', '2018-07-25 20:06:32'),
(54, 30, 15, '2018-07-25 20:06:51', '2018-07-25 20:06:51'),
(55, 31, 15, '2018-07-25 20:07:02', '2018-07-25 20:07:02'),
(56, 32, 15, '2018-07-25 20:07:11', '2018-07-25 20:07:11'),
(57, 33, 15, '2018-07-25 20:07:27', '2018-07-25 20:07:27'),
(58, 34, 15, '2018-07-25 20:07:39', '2018-07-25 20:07:39'),
(59, 35, 15, '2018-07-25 20:07:53', '2018-07-25 20:07:53'),
(60, 36, 15, '2018-07-25 20:08:12', '2018-07-25 20:08:12'),
(61, 37, 15, '2018-07-25 20:08:19', '2018-07-25 20:08:19'),
(62, 38, 15, '2018-07-25 20:08:29', '2018-07-25 20:08:29'),
(66, 42, 15, '2018-07-25 20:09:06', '2018-07-25 20:09:06'),
(67, 43, 15, '2018-07-25 20:09:13', '2018-07-25 20:09:13'),
(68, 44, 15, '2018-07-25 20:09:23', '2018-07-25 20:09:23'),
(69, 45, 15, '2018-07-25 20:09:35', '2018-07-25 20:09:35'),
(70, 46, 15, '2018-07-25 20:09:46', '2018-07-25 20:09:46'),
(71, 47, 15, '2018-07-25 20:09:56', '2018-07-25 20:09:56'),
(72, 48, 15, '2018-07-25 20:10:13', '2018-07-25 20:10:13'),
(73, 49, 15, '2018-07-25 20:10:20', '2018-07-25 20:10:20'),
(74, 50, 15, '2018-07-25 20:10:31', '2018-07-25 20:10:31'),
(75, 51, 15, '2018-07-25 20:10:43', '2018-07-25 20:10:43'),
(76, 52, 15, '2018-07-25 20:10:50', '2018-07-25 20:10:50'),
(77, 53, 15, '2018-07-25 20:10:58', '2018-07-25 20:10:58'),
(78, 54, 15, '2018-07-25 20:11:13', '2018-07-25 20:11:13'),
(79, 55, 15, '2018-07-25 20:11:19', '2018-07-25 20:11:19'),
(80, 56, 15, '2018-07-25 20:11:26', '2018-07-25 20:11:26'),
(81, 57, 15, '2018-07-25 20:11:42', '2018-07-25 20:11:42'),
(82, 58, 15, '2018-07-25 20:11:50', '2018-07-25 20:11:50'),
(83, 59, 15, '2018-07-25 20:11:57', '2018-07-25 20:11:57'),
(84, 60, 15, '2018-07-25 20:12:07', '2018-07-25 20:12:07'),
(85, 61, 15, '2018-07-25 20:12:15', '2018-07-25 20:12:15'),
(86, 62, 15, '2018-07-25 20:12:24', '2018-07-25 20:12:24'),
(87, 63, 15, '2018-07-25 20:12:44', '2018-07-25 20:12:44'),
(88, 64, 15, '2018-07-25 20:12:56', '2018-07-25 20:12:56'),
(89, 65, 15, '2018-07-25 20:13:05', '2018-07-25 20:13:05'),
(90, 66, 15, '2018-07-25 20:13:22', '2018-07-25 20:13:22'),
(91, 67, 15, '2018-07-25 20:13:33', '2018-07-25 20:13:33'),
(92, 68, 15, '2018-07-25 20:14:36', '2018-07-25 20:14:36'),
(93, 69, 15, '2018-07-25 20:15:55', '2018-07-25 20:15:55'),
(94, 70, 15, '2018-07-25 20:16:05', '2018-07-25 20:16:05'),
(95, 71, 15, '2018-07-25 20:16:16', '2018-07-25 20:16:16'),
(96, 1, 2, '2018-07-25 21:45:34', '2018-07-25 21:45:34'),
(97, 1, 14, '2018-07-25 21:45:34', '2018-07-25 21:45:34'),
(98, 1, 21, '2018-07-25 21:45:34', '2018-07-25 21:45:34'),
(99, 20, 1, '2018-07-25 21:45:58', '2018-07-25 21:45:58'),
(100, 20, 16, '2018-07-25 21:45:58', '2018-07-25 21:45:58'),
(101, 20, 17, '2018-07-25 21:45:58', '2018-07-25 21:45:58'),
(102, 20, 15, '2018-07-25 21:45:58', '2018-07-25 21:45:58'),
(103, 20, 2, '2018-07-25 21:45:58', '2018-07-25 21:45:58'),
(104, 20, 24, '2018-07-25 21:45:58', '2018-07-25 21:45:58'),
(108, 72, 2, '2018-07-30 08:23:16', '2018-07-30 08:23:16'),
(109, 17, 1, '2018-07-30 10:25:16', '2018-07-30 10:25:16'),
(111, 74, 1, '2018-07-30 10:26:29', '2018-07-30 10:26:29'),
(112, 75, 1, '2018-07-30 10:26:51', '2018-07-30 10:26:51'),
(114, 77, 1, '2018-07-30 10:27:36', '2018-07-30 10:27:36'),
(115, 78, 1, '2018-07-30 10:28:48', '2018-07-30 10:28:48'),
(117, 4, 1, '2018-07-30 11:11:01', '2018-07-30 11:11:01'),
(118, 4, 32, '2018-07-30 11:11:01', '2018-07-30 11:11:01'),
(119, 76, 17, '2018-08-01 07:38:42', '2018-08-01 07:38:42'),
(120, 76, 15, '2018-08-01 07:38:42', '2018-08-01 07:38:42'),
(121, 79, 15, '2018-08-01 11:54:06', '2018-08-01 11:54:06'),
(122, 79, 18, '2018-08-01 11:54:06', '2018-08-01 11:54:06'),
(123, 80, 15, '2018-08-01 11:54:35', '2018-08-01 11:54:35'),
(124, 80, 18, '2018-08-01 11:54:35', '2018-08-01 11:54:35'),
(125, 81, 15, '2018-08-02 08:03:08', '2018-08-02 08:03:08'),
(126, 81, 18, '2018-08-02 08:03:08', '2018-08-02 08:03:08'),
(128, 39, 15, '2018-08-07 11:13:12', '2018-08-07 11:13:12'),
(129, 39, 32, '2018-08-07 11:13:12', '2018-08-07 11:13:12'),
(134, 82, 15, '2018-08-14 11:24:57', '2018-08-14 11:24:57'),
(135, 82, 9, '2018-08-14 11:24:57', '2018-08-14 11:24:57'),
(139, 83, 15, '2018-08-16 08:05:18', '2018-08-16 08:05:18'),
(140, 83, 9, '2018-08-16 08:05:18', '2018-08-16 08:05:18'),
(142, 84, 15, '2018-08-28 06:48:27', '2018-08-28 06:48:27'),
(143, 84, 35, '2018-08-28 06:48:27', '2018-08-28 06:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `title`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Silver', 'asdasdasd', '4,000', '2018-07-24 09:50:52', '2018-07-25 21:41:32'),
(2, 'Video Animation', 'asdasd', '3,000', '2018-07-24 09:52:24', '2018-07-25 21:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `plans_histories`
--

CREATE TABLE `plans_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `transaction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans_histories`
--

INSERT INTO `plans_histories` (`id`, `title`, `description`, `price`, `plan_id`, `transaction`, `transaction_date`, `created_at`, `updated_at`) VALUES
(1, 'Silver', 'asdasdasd', '4,000', 1, 'edit', '2018-07-24 02:50:52', '2018-07-25 21:41:32', '2018-07-25 21:41:32'),
(2, 'Video Animation', 'asdasd', '3,000', 2, 'edit', '2018-07-24 02:52:24', '2018-07-25 21:41:38', '2018-07-25 21:41:38'),
(3, 'just for test', 'just for test', '5000', 3, 'edit', '2018-07-29 11:39:21', '2018-07-29 09:39:30', '2018-07-29 09:39:30'),
(4, 'just for test', 'just for test', '5000', 3, 'delete', '2018-07-29 11:39:30', '2018-07-29 09:39:34', '2018-07-29 09:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `plan_services`
--

CREATE TABLE `plan_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_services`
--

INSERT INTO `plan_services` (`id`, `plan_id`, `service_id`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 1, 13, 13, '2018-07-25 21:41:32', '2018-07-25 21:41:32'),
(4, 2, 19, 1, '2018-07-25 21:41:38', '2018-07-25 21:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `plan_services_histories`
--

CREATE TABLE `plan_services_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_history_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_services_histories`
--

INSERT INTO `plan_services_histories` (`id`, `plan_history_id`, `service_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '13', '2018-07-25 21:41:32', '2018-07-25 21:41:32'),
(2, 2, 1, '1', '2018-07-25 21:41:38', '2018-07-25 21:41:38'),
(3, 3, 4, '5', '2018-07-29 09:39:30', '2018-07-29 09:39:30'),
(4, 4, 4, '5', '2018-07-29 09:39:34', '2018-07-29 09:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `departement_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `departement_id`, `name`, `created_at`, `updated_at`, `type`) VALUES
(1, 1, 'Business Development Manager', '2018-07-15 17:48:47', '2018-07-22 18:56:35', 'Team Leader'),
(2, 3, 'Moderator', '2018-07-15 17:50:01', '2018-07-24 04:55:38', 'Team Member'),
(4, 3, 'Media Buying', '2018-07-18 15:33:02', '2018-07-24 04:55:32', 'Team Member'),
(5, 6, 'Content Creator', '2018-07-18 15:34:09', '2018-07-24 04:54:48', 'Team Member'),
(6, 3, 'Digital Executive', '2018-07-18 15:34:41', '2018-07-24 04:55:15', 'Team Member'),
(7, 8, 'Community Managment', '2018-07-18 15:35:19', '2018-07-25 21:53:53', 'Team Member'),
(8, 6, 'Copy Writer', '2018-07-18 15:36:38', '2018-07-24 04:54:54', 'Team Member'),
(9, 6, 'Art Director', '2018-07-18 15:36:58', '2018-08-08 08:44:58', 'Team Leader'),
(10, 6, 'Illistrator', '2018-07-18 15:37:34', '2018-07-24 04:55:24', 'Team Member'),
(11, 6, 'Motion Graphic', '2018-07-18 15:37:50', '2018-07-24 04:55:54', 'Team Member'),
(12, 6, 'Photographer', '2018-07-18 15:38:08', '2018-07-24 04:53:56', 'Team Member'),
(13, 6, 'Creative Director', '2018-07-18 15:38:26', '2018-07-24 04:55:03', 'Team Leader'),
(14, 3, 'Digital Performance', '2018-07-18 15:39:18', '2018-08-08 06:34:17', 'Team Leader'),
(15, 2, 'System Admin', '2018-07-19 11:20:53', '2018-07-24 10:25:45', 'Team Leader'),
(16, 1, 'Tele Sales', '2018-07-23 23:55:13', '2018-07-23 23:55:13', 'Team Member'),
(17, 1, 'Technical Call', '2018-07-24 04:43:45', '2018-07-24 04:43:45', 'Team Member'),
(18, 8, 'CEO', '2018-07-24 04:53:27', '2018-07-24 04:53:27', 'Team Leader'),
(19, 8, 'Personal Assistant', '2018-07-24 04:56:54', '2018-07-24 04:56:54', 'Team Member'),
(20, 7, 'Accountant', '2018-07-24 04:57:17', '2018-07-24 04:57:17', 'Team Leader'),
(21, 7, 'Human Resource', '2018-07-24 04:57:37', '2018-07-24 04:57:37', 'Team Leader'),
(22, 7, 'Legel', '2018-07-24 04:58:14', '2018-07-24 04:58:14', 'Team Leader'),
(23, 7, 'Office Boy', '2018-07-24 05:39:11', '2018-07-24 05:39:11', 'Team Leader'),
(24, 6, '3D Designer', '2018-07-24 07:57:44', '2018-07-24 07:57:44', 'Team Member'),
(25, 9, 'Booth Production', '2018-07-24 08:02:08', '2018-07-24 08:05:53', 'Team Member'),
(26, 9, 'Video Production', '2018-07-24 08:05:21', '2018-07-24 08:05:21', 'Team Member'),
(27, 9, 'Signage Production', '2018-07-24 08:05:35', '2018-07-24 08:05:35', 'Team Member'),
(28, 9, 'Branch production', '2018-07-24 08:12:26', '2018-07-24 08:12:26', 'Team Member'),
(29, 2, 'User Experience', '2018-07-24 10:23:57', '2018-07-24 10:23:57', 'Team Member'),
(30, 2, 'User Interface', '2018-07-24 10:24:14', '2018-07-24 10:24:14', 'Team Member'),
(31, 2, 'Front End', '2018-07-24 10:24:29', '2018-07-24 10:24:29', 'Team Member'),
(32, 2, 'BackEnd', '2018-07-24 10:24:41', '2018-08-07 11:12:41', 'Team Leader'),
(33, 2, 'Quality Control', '2018-07-24 10:25:01', '2018-07-24 10:25:01', 'Team Member'),
(34, 2, 'React Native', '2018-07-24 10:28:47', '2018-07-24 10:28:47', 'Team Member'),
(35, 5, 'Just Funny', '2018-08-28 06:48:11', '2018-08-28 06:48:11', 'Team Leader');

-- --------------------------------------------------------

--
-- Table structure for table `post_types`
--

CREATE TABLE `post_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privlages`
--

CREATE TABLE `privlages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privlages`
--

INSERT INTO `privlages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Owner', NULL, NULL),
(2, 'Call Center', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profilings`
--

CREATE TABLE `profilings` (
  `id` int(10) UNSIGNED NOT NULL,
  `potential_id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` longtext COLLATE utf8mb4_unicode_ci,
  `seo_check` tinyint(1) NOT NULL DEFAULT '0',
  `seo_level_id` int(11) DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `sem_check` tinyint(1) NOT NULL DEFAULT '0',
  `sem_level_id` int(11) DEFAULT NULL,
  `sem_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `gdn_check` tinyint(1) NOT NULL DEFAULT '0',
  `gdn_level_id` int(11) DEFAULT NULL,
  `gdn_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profilings`
--

INSERT INTO `profilings` (`id`, `potential_id`, `logo`, `approach`, `intro`, `seo_check`, `seo_level_id`, `seo_keywords`, `sem_check`, `sem_level_id`, `sem_keywords`, `gdn_check`, `gdn_level_id`, `gdn_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'unZTKV7C-logo.jpeg', 'Brief', 'qwdqwdqwd', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '2018-07-16 10:40:27', '2018-07-29 09:04:26'),
(2, 3, '4Eek0B14-logo.jpeg', 'Brief', NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '2018-07-16 11:09:09', '2018-07-16 11:09:10'),
(3, 13, 'x6F0E0sc-logo.jpeg', 'Brief', NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '2018-07-25 17:51:11', '2018-07-25 17:51:11'),
(4, 69, '9GVatkEz-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-07-31 08:14:19', '2018-07-31 08:14:19'),
(5, 30, 'gYGCTtnf-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-07-31 08:17:32', '2018-07-31 08:17:32'),
(6, 34, 'kNfVoe5d-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-07-31 08:18:11', '2018-07-31 08:18:11'),
(7, 22, 'saX46dac-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-07-31 09:18:27', '2018-07-31 09:18:27'),
(8, 24, 'hMLawlFU-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-08-01 08:34:26', '2018-08-01 08:34:26'),
(9, 37, 'pqV35eMP-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-08-01 09:10:19', '2018-08-01 09:10:20'),
(10, 81, 'Rvh5JVmt-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-08-01 09:15:43', '2018-08-01 09:15:44'),
(11, 82, 'D2beovzI-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-08-01 09:29:16', '2018-08-01 09:29:16'),
(12, 36, '0jR5a2un-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-08-02 11:00:00', '2018-08-02 11:00:00'),
(13, 83, '3elbM2ab-logo.png', 'Brief', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2018-08-02 11:02:27', '2018-08-02 11:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `profiling_prods`
--

CREATE TABLE `profiling_prods` (
  `id` int(10) UNSIGNED NOT NULL,
  `profiling_id` int(10) UNSIGNED NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiling_prods`
--

INSERT INTO `profiling_prods` (`id`, `profiling_id`, `product`, `created_at`, `updated_at`) VALUES
(4, 1, 'qwdqwd', '2018-07-29 09:04:26', '2018-07-29 09:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `profiling_refs`
--

CREATE TABLE `profiling_refs` (
  `id` int(10) UNSIGNED NOT NULL,
  `profiling_id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `providing` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiling_refs`
--

INSERT INTO `profiling_refs` (`id`, `profiling_id`, `reference`, `providing`, `created_at`, `updated_at`) VALUES
(7, 1, 'qwdqwd', 'qwdqwdqwd', '2018-07-29 09:04:26', '2018-07-29 09:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `profiling_sites`
--

CREATE TABLE `profiling_sites` (
  `id` int(10) UNSIGNED NOT NULL,
  `profiling_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `technology_id` int(10) UNSIGNED NOT NULL,
  `look_id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiling_socials`
--

CREATE TABLE `profiling_socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `profiling_id` int(10) UNSIGNED NOT NULL,
  `management_id` int(10) UNSIGNED NOT NULL,
  `post_type_id` int(10) UNSIGNED NOT NULL,
  `promote_status_id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `location_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_credential` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `downpayment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_price` double NOT NULL,
  `to_price` double NOT NULL,
  `from_space` int(11) NOT NULL,
  `to_space` int(11) NOT NULL,
  `paymentfacility` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `company_id`, `location_name`, `location_credential`, `about`, `logo`, `downpayment`, `from_price`, `to_price`, `from_space`, `to_space`, `paymentfacility`, `created_at`, `updated_at`) VALUES
(1, 'First Project', 1, 'madiie', '78954 453464', 'my about', 'logo.png', 'cash', 700, 7000, 60, 250, '7', NULL, NULL),
(2, 'Digi Sale', 2, '', '', 'sdfasd\r\nedasdas', '1531680640.png', '20%', 30000, 100000, 100, 500, '7', '2018-07-15 18:50:40', '2018-07-15 18:50:40'),
(3, 'Software Developing', 14, 'Maadi Grand Mall, Maadi as Sarayat Al Gharbeyah, Al Maadi, Egypt', '', 'ssssss\r\nssss', '1532111949BuB2.png', '20%', 30000, 100000, 100, 500, '7', '2018-07-21 01:39:09', '2018-07-21 01:39:09'),
(4, 'asdasd', 15, 'Cairo, Egypt', '', 'asdasd', '1532216518MDsU.jpg', '22%', 123123, 123123123, 22, 213, '7', '2018-07-22 06:41:58', '2018-07-22 06:43:58'),
(5, 'Tagamo3', 13, 'new cairo', '', 'x', '1532270480SKbA.jpg', '0%', 4800, 7000, 111, 320, '4', '2018-07-22 21:41:20', '2018-07-22 21:44:22'),
(6, 'Sea View', 17, 'New Cairo City, Egypt', '', 'asdasd', '15322736073mGj.png', '%', 123123, 123123, 111, 333, '7', '2018-07-22 22:33:27', '2018-07-22 22:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `project__gallaries`
--

CREATE TABLE `project__gallaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `image_url` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project__unit__types`
--

CREATE TABLE `project__unit__types` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_type_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project__unit__types`
--

INSERT INTO `project__unit__types` (`id`, `unit_type_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 2, '2018-07-15 18:50:40', '2018-07-15 18:50:40'),
(4, 1, 3, '2018-07-21 01:39:09', '2018-07-21 01:39:09'),
(5, 2, 3, '2018-07-21 01:39:09', '2018-07-21 01:39:09'),
(6, 1, 4, '2018-07-22 06:41:58', '2018-07-22 06:41:58'),
(7, 1, 4, '2018-07-22 06:43:58', '2018-07-22 06:43:58'),
(8, 1, 5, '2018-07-22 21:41:20', '2018-07-22 21:41:20'),
(9, 1, 5, '2018-07-22 21:42:08', '2018-07-22 21:42:08'),
(10, 1, 5, '2018-07-22 21:44:22', '2018-07-22 21:44:22'),
(11, 1, 6, '2018-07-22 22:33:27', '2018-07-22 22:33:27'),
(12, 2, 6, '2018-07-22 22:33:27', '2018-07-22 22:33:27'),
(13, 1, 6, '2018-07-22 22:34:27', '2018-07-22 22:34:27'),
(14, 2, 6, '2018-07-22 22:34:27', '2018-07-22 22:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `promote_statuses`
--

CREATE TABLE `promote_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departement_id` int(10) UNSIGNED NOT NULL,
  `quotation_id` int(10) UNSIGNED NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `created_at`, `updated_at`, `departement_id`, `quotation_id`, `is_complete`) VALUES
(32, '2018-08-07 07:39:48', '2018-08-07 07:41:33', 5, 33, 0),
(33, '2018-08-07 07:45:37', '2018-08-07 07:45:37', 5, 23, 0),
(34, '2018-08-07 07:53:30', '2018-08-07 07:53:30', 5, 37, 0),
(35, '2018-08-07 07:57:31', '2018-08-07 07:57:31', 6, 38, 0),
(36, '2018-08-07 08:00:48', '2018-08-07 08:00:48', 5, 15, 0),
(37, '2018-08-26 10:57:08', '2018-08-26 10:57:29', 6, 35, 0),
(38, '2018-08-26 12:21:13', '2018-08-26 12:21:13', 5, 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions__categories`
--

CREATE TABLE `questions__categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `total` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `with_contract` tinyint(1) NOT NULL DEFAULT '0',
  `is_collected` tinyint(1) NOT NULL DEFAULT '0',
  `total_offer` double(8,2) NOT NULL DEFAULT '0.00',
  `collect_date` date DEFAULT NULL,
  `quotation_status` tinyint(1) NOT NULL DEFAULT '0',
  `is_proposal_completed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `company_id`, `total`, `created_at`, `updated_at`, `with_contract`, `is_collected`, `total_offer`, `collect_date`, `quotation_status`, `is_proposal_completed`) VALUES
(8, 1, 100000.00, '2018-07-23 05:44:34', '2018-08-02 10:06:01', 1, 1, 0.00, NULL, 0, 0),
(9, 69, 8000.00, '2018-07-26 02:54:40', '2018-08-02 08:32:17', 0, 1, 10.00, NULL, 0, 0),
(10, 80, 300030.00, '2018-07-29 09:10:50', '2018-08-02 09:14:25', 0, 1, 50.00, NULL, 0, 0),
(11, 13, 50000.00, '2018-07-31 06:49:48', '2018-08-02 09:15:06', 0, 1, 10.00, NULL, 0, 0),
(12, 22, 50000.00, '2018-07-31 09:18:17', '2018-08-07 08:01:16', 1, 1, 20.00, '2018-08-31', 0, 0),
(13, 21, 2000.00, '2018-08-01 07:37:03', '2018-08-07 08:01:23', 0, 1, 5.00, '2018-08-16', 0, 0),
(14, 46, 123.00, '2018-08-01 08:17:16', '2018-08-07 08:01:29', 1, 1, 0.00, '2018-08-02', 0, 0),
(15, 17, 1414.00, '2018-08-01 08:23:10', '2018-08-07 08:01:37', 0, 1, 0.00, '2018-08-02', 0, 0),
(16, 24, 4242.00, '2018-08-01 08:34:56', '2018-08-02 10:12:01', 0, 1, 0.00, NULL, 0, 0),
(17, 25, 15000.00, '2018-08-01 09:00:44', '2018-08-07 08:01:42', 0, 1, 0.00, NULL, 0, 0),
(18, 23, 6000.00, '2018-08-01 09:22:41', '2018-08-07 08:01:53', 0, 1, 0.00, '2018-08-02', 0, 0),
(19, 26, 50000.00, '2018-08-01 09:24:21', '2018-08-07 08:01:47', 0, 1, 0.00, '2018-08-02', 0, 0),
(20, 27, 10000.00, '2018-08-01 09:26:28', '2018-08-02 10:06:42', 0, 1, 10.00, NULL, 0, 0),
(21, 37, 10000.00, '2018-08-01 10:04:13', '2018-08-02 10:36:44', 1, 1, 0.00, NULL, 0, 0),
(22, 31, 1222.00, '2018-08-01 10:04:57', '2018-08-05 07:36:40', 1, 1, 0.00, NULL, 0, 0),
(23, 32, 50000.00, '2018-08-01 10:07:16', '2018-08-05 07:25:12', 1, 0, 0.00, NULL, 0, 0),
(24, 75, 50000.00, '2018-08-01 10:08:47', '2018-08-07 08:01:58', 1, 1, 0.00, '2018-08-29', 0, 0),
(25, 36, 10000.00, '2018-08-02 06:28:41', '2018-08-02 06:28:41', 1, 0, 0.00, NULL, 0, 0),
(26, 83, 500.00, '2018-08-02 11:02:55', '2018-08-02 11:04:59', 1, 0, 0.00, NULL, 0, 1),
(27, 33, 50000.00, '2018-08-02 12:25:03', '2018-08-08 09:31:53', 1, 1, 50.00, '2018-08-04', 0, 0),
(28, 34, 60000.00, '2018-08-05 07:05:02', '2018-08-05 07:11:52', 0, 1, 0.00, NULL, 0, 0),
(29, 1, 60000.00, '2018-08-05 07:07:30', '2018-08-05 07:13:17', 0, 1, 0.00, NULL, 0, 0),
(30, 1, 0.00, '2018-08-05 07:13:42', '2018-08-05 07:13:55', 0, 1, 0.00, NULL, 0, 0),
(31, 31, 111111.00, '2018-08-05 07:37:03', '2018-08-05 07:37:53', 1, 1, 0.00, NULL, 0, 0),
(32, 13, 111111.00, '2018-08-05 07:37:15', '2018-08-05 07:38:00', 1, 1, 0.00, NULL, 0, 0),
(33, 82, 6000.00, '2018-08-07 07:38:06', '2018-08-07 07:38:06', 0, 0, 0.00, NULL, 0, 0),
(34, 29, 50000.00, '2018-08-07 07:44:16', '2018-08-07 07:44:16', 0, 0, 0.00, NULL, 0, 0),
(35, 24, 60000.00, '2018-08-07 07:45:14', '2018-08-26 11:00:27', 0, 1, 0.00, '2018-08-29', 0, 0),
(36, 30, 50000.00, '2018-08-07 07:47:23', '2018-08-07 07:47:23', 1, 0, 0.00, NULL, 0, 0),
(37, 28, 50000.00, '2018-08-07 07:53:08', '2018-08-07 07:54:22', 1, 1, 0.00, '2018-08-07', 0, 0),
(38, 28, 50000.00, '2018-08-07 07:54:47', '2018-08-07 07:54:47', 0, 0, 0.00, NULL, 0, 0),
(39, 81, 50000.00, '2018-08-26 09:15:48', '2018-08-26 09:15:48', 0, 0, 0.00, NULL, 0, 0),
(40, 24, 5000.00, '2018-08-26 11:05:01', '2018-08-26 11:05:30', 0, 1, 0.00, '2018-08-31', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_services`
--

CREATE TABLE `quotation_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotation_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_services`
--

INSERT INTO `quotation_services` (`id`, `service_id`, `quantity`, `quotation_id`, `created_at`, `updated_at`) VALUES
(95, 2, '4000', 9, '2018-08-02 08:58:41', '2018-08-02 08:58:41'),
(102, 3, '2', 10, '2018-08-02 09:14:50', '2018-08-02 09:14:50'),
(103, 1, '10', 10, '2018-08-02 09:14:50', '2018-08-02 09:14:50'),
(105, 1, '1', 11, '2018-08-02 09:15:06', '2018-08-02 09:15:06'),
(107, 1, '2', 8, '2018-08-02 10:06:01', '2018-08-02 10:06:01'),
(108, 2, '3', 20, '2018-08-02 10:06:42', '2018-08-02 10:06:42'),
(109, 1, '30', 20, '2018-08-02 10:06:42', '2018-08-02 10:06:42'),
(110, 1, '3', 16, '2018-08-02 10:12:01', '2018-08-02 10:12:01'),
(113, 1, '1', 21, '2018-08-02 10:36:44', '2018-08-02 10:36:44'),
(116, 1, '5', 26, '2018-08-02 11:04:59', '2018-08-02 11:04:59'),
(131, 1, '4', 28, '2018-08-05 07:11:52', '2018-08-05 07:11:52'),
(132, 2, '4', 28, '2018-08-05 07:11:52', '2018-08-05 07:11:52'),
(135, 1, '4', 29, '2018-08-05 07:13:17', '2018-08-05 07:13:17'),
(136, 2, '4', 29, '2018-08-05 07:13:17', '2018-08-05 07:13:17'),
(138, 1, '600', 30, '2018-08-05 07:13:55', '2018-08-05 07:13:55'),
(140, 2, '33', 23, '2018-08-05 07:25:12', '2018-08-05 07:25:12'),
(141, 1, '1', 22, '2018-08-05 07:36:40', '2018-08-05 07:36:40'),
(144, 3, '500', 31, '2018-08-05 07:37:53', '2018-08-05 07:37:53'),
(145, 1, '11', 32, '2018-08-05 07:38:00', '2018-08-05 07:38:00'),
(146, 1, '3', 33, '2018-08-07 07:38:06', '2018-08-07 07:38:06'),
(147, 2, '5', 34, '2018-08-07 07:44:16', '2018-08-07 07:44:16'),
(149, 4, '50', 36, '2018-08-07 07:47:23', '2018-08-07 07:47:23'),
(151, 2, '5', 37, '2018-08-07 07:54:22', '2018-08-07 07:54:22'),
(155, 1, '60', 38, '2018-08-07 07:56:31', '2018-08-07 07:56:31'),
(156, 3, '3', 12, '2018-08-07 08:01:16', '2018-08-07 08:01:16'),
(157, 2, '3', 13, '2018-08-07 08:01:23', '2018-08-07 08:01:23'),
(158, 1, '3', 14, '2018-08-07 08:01:29', '2018-08-07 08:01:29'),
(159, 1, '3', 15, '2018-08-07 08:01:37', '2018-08-07 08:01:37'),
(160, 1, '3', 17, '2018-08-07 08:01:42', '2018-08-07 08:01:42'),
(161, 2, '3', 19, '2018-08-07 08:01:47', '2018-08-07 08:01:47'),
(162, 2, '1', 18, '2018-08-07 08:01:53', '2018-08-07 08:01:53'),
(163, 1, '33', 24, '2018-08-07 08:01:58', '2018-08-07 08:01:58'),
(164, 2, '3', 25, '2018-08-07 10:23:14', '2018-08-07 10:23:14'),
(165, 1, '5', 25, '2018-08-07 10:23:14', '2018-08-07 10:23:14'),
(166, 5, '6', 25, '2018-08-07 10:23:14', '2018-08-07 10:23:14'),
(170, 5, '4', 27, '2018-08-08 09:31:53', '2018-08-08 09:31:53'),
(171, 6, '44', 27, '2018-08-08 09:31:53', '2018-08-08 09:31:53'),
(172, 2, '5', 27, '2018-08-08 09:31:53', '2018-08-08 09:31:53'),
(173, 1, '3', 27, '2018-08-08 09:31:53', '2018-08-08 09:31:53'),
(174, 1, '3', 39, '2018-08-26 09:15:48', '2018-08-26 09:15:48'),
(176, 1, '60', 35, '2018-08-26 11:00:27', '2018-08-26 11:00:27'),
(178, 9, '6', 40, '2018-08-26 11:05:30', '2018-08-26 11:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_service_quantities`
--

CREATE TABLE `quotation_service_quantities` (
  `id` int(10) UNSIGNED NOT NULL,
  `quotation_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `qnt_lvl` int(11) DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_service_quantities`
--

INSERT INTO `quotation_service_quantities` (`id`, `quotation_id`, `service_id`, `qnt_lvl`, `completed`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 29, 1, 0, 1, 1, '2018-08-15 11:13:18', '2018-08-16 10:26:50'),
(2, 29, 1, 1, 0, 0, '2018-08-15 11:13:18', '2018-08-15 11:13:18'),
(3, 29, 1, 2, 0, 0, '2018-08-15 11:13:18', '2018-08-15 11:13:18'),
(4, 29, 1, 3, 0, 0, '2018-08-15 11:13:18', '2018-08-15 11:13:18'),
(5, 29, 2, 0, 0, 0, '2018-08-15 11:13:18', '2018-08-15 11:13:18'),
(6, 29, 2, 1, 0, 0, '2018-08-15 11:13:18', '2018-08-15 11:13:18'),
(7, 29, 2, 2, 0, 0, '2018-08-15 11:13:18', '2018-08-15 11:13:18'),
(8, 29, 2, 3, 0, 0, '2018-08-15 11:13:18', '2018-08-15 11:13:18'),
(9, 40, 9, 0, 0, 0, '2018-08-26 11:11:03', '2018-08-26 11:11:03'),
(10, 40, 9, 1, 0, 0, '2018-08-26 11:11:03', '2018-08-26 11:11:03'),
(11, 40, 9, 2, 0, 0, '2018-08-26 11:11:03', '2018-08-26 11:11:03'),
(12, 40, 9, 3, 0, 0, '2018-08-26 11:11:03', '2018-08-26 11:11:03'),
(13, 40, 9, 4, 0, 0, '2018-08-26 11:11:03', '2018-08-26 11:11:03'),
(14, 40, 9, 5, 0, 0, '2018-08-26 11:11:03', '2018-08-26 11:11:03'),
(15, 8, 1, 0, 0, 0, '2018-08-26 11:22:21', '2018-08-26 11:22:21'),
(16, 8, 1, 1, 0, 0, '2018-08-26 11:22:21', '2018-08-26 11:22:21'),
(17, 11, 1, 0, 0, 0, '2018-08-26 11:22:26', '2018-08-26 11:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_service_quantity_comments`
--

CREATE TABLE `quotation_service_quantity_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `q_q_s_id` int(10) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_service_quantity_comments`
--

INSERT INTO `quotation_service_quantity_comments` (`id`, `q_q_s_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'wqdqwdqwdqwdqwdqwdqwd', '2018-08-22 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `span` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `url`, `span`, `created_at`, `updated_at`) VALUES
(1, 'Timeline', 'timeline', 'si si-calendar', NULL, NULL),
(2, 'Strategy', 'strategy', 'si si-chemistry', NULL, NULL),
(3, 'Campaigns', 'campaigns', 'si si-rocket', NULL, NULL),
(4, 'Customer', 'customers', 'si si-users', NULL, NULL),
(5, 'Profile', 'company', 'si si-home', NULL, NULL),
(6, 'Settings', 'users', 'si si-settings', NULL, NULL),
(7, 'Invoice', 'invoice', 'si si-chemistry', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role__privlages`
--

CREATE TABLE `role__privlages` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `privlage_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role__privlages`
--

INSERT INTO `role__privlages` (`id`, `role_id`, `privlage_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 4, 2, NULL, NULL),
(8, 1, 3, NULL, NULL),
(9, 2, 3, NULL, NULL),
(10, 3, 3, NULL, NULL),
(11, 4, 4, NULL, NULL),
(12, 1, 5, NULL, NULL),
(13, 2, 5, NULL, NULL),
(14, 3, 5, NULL, NULL),
(15, 7, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Video Animation', '2018-07-18 15:49:38', '2018-07-24 07:45:47'),
(2, 'Social Media Moderation', '2018-07-18 16:11:01', '2018-07-24 07:27:23'),
(3, 'Outdoor', '2018-07-18 16:17:17', '2018-07-18 16:17:43'),
(4, 'PressAd', '2018-07-18 16:19:21', '2018-07-18 16:19:21'),
(5, 'Admin Task', '2018-07-24 05:08:19', '2018-07-24 05:08:19'),
(6, 'Admin Requests', '2018-07-24 05:11:07', '2018-07-24 05:11:07'),
(7, 'Websites', '2018-07-24 07:27:02', '2018-07-24 07:27:02'),
(8, 'Social Media Campaign', '2018-07-24 07:27:39', '2018-07-24 07:27:39'),
(9, 'SEO', '2018-07-24 07:27:47', '2018-07-24 07:27:47'),
(10, 'Google Ads', '2018-07-24 07:27:57', '2018-07-24 07:27:57'),
(12, 'Email Marketing', '2018-07-24 07:40:52', '2018-07-24 07:40:52'),
(13, 'Digital Campaigns / Strategies', '2018-07-24 07:43:51', '2018-07-24 07:49:36'),
(14, 'Corporate Identity Logo', '2018-07-24 07:44:27', '2018-07-24 07:44:27'),
(15, 'Stationary', '2018-07-24 07:45:08', '2018-07-24 07:45:08'),
(16, 'Video Production', '2018-07-24 07:46:12', '2018-07-24 07:46:12'),
(17, 'SMS Campaigns', '2018-07-24 07:46:26', '2018-07-24 07:46:26'),
(18, 'Mobile App', '2018-07-24 07:47:56', '2018-07-24 07:47:56'),
(19, 'System', '2018-07-24 07:48:10', '2018-07-24 07:48:10'),
(22, 'Creative Campaign', '2018-07-24 07:49:55', '2018-07-24 07:49:55'),
(23, 'Signage', '2018-07-24 07:50:27', '2018-07-24 07:50:27'),
(24, 'Booth', '2018-07-24 07:51:17', '2018-07-24 07:51:17'),
(25, 'Branch Branding', '2018-07-24 07:51:56', '2018-07-24 07:51:56'),
(26, 'Social Media Execution Plan', '2018-07-24 09:33:29', '2018-07-24 09:33:58'),
(27, 'Digital Execution', '2018-07-24 09:39:31', '2018-07-24 09:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `service_tasks`
--

CREATE TABLE `service_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_tasks`
--

INSERT INTO `service_tasks` (`id`, `task_id`, `service_id`, `created_at`, `updated_at`) VALUES
(18, 1, 1, '2018-07-24 07:45:47', '2018-07-24 07:45:47'),
(19, 2, 1, '2018-07-24 07:45:47', '2018-07-24 07:45:47'),
(20, 3, 1, '2018-07-24 07:45:47', '2018-07-24 07:45:47'),
(23, 1, 16, '2018-07-24 08:08:02', '2018-07-24 08:08:02'),
(24, 2, 16, '2018-07-24 08:08:02', '2018-07-24 08:08:02'),
(25, 21, 16, '2018-07-24 08:08:02', '2018-07-24 08:08:02'),
(29, 22, 15, '2018-07-24 08:10:58', '2018-07-24 08:10:58'),
(62, 34, 10, '2018-07-24 08:53:26', '2018-07-24 08:53:26'),
(63, 35, 10, '2018-07-24 08:53:26', '2018-07-24 08:53:26'),
(64, 31, 3, '2018-07-24 08:54:06', '2018-07-24 08:54:06'),
(65, 40, 4, '2018-07-24 08:55:10', '2018-07-24 08:55:10'),
(73, 41, 17, '2018-07-24 09:04:53', '2018-07-24 09:04:53'),
(74, 42, 17, '2018-07-24 09:04:53', '2018-07-24 09:04:53'),
(76, 43, 23, '2018-07-24 09:12:46', '2018-07-24 09:12:46'),
(77, 44, 23, '2018-07-24 09:12:46', '2018-07-24 09:12:46'),
(78, 34, 9, '2018-07-24 09:16:59', '2018-07-24 09:16:59'),
(79, 45, 9, '2018-07-24 09:16:59', '2018-07-24 09:16:59'),
(84, 17, 8, '2018-07-24 09:20:23', '2018-07-24 09:20:23'),
(85, 30, 8, '2018-07-24 09:20:23', '2018-07-24 09:20:23'),
(86, 34, 8, '2018-07-24 09:20:23', '2018-07-24 09:20:23'),
(87, 36, 8, '2018-07-24 09:20:23', '2018-07-24 09:20:23'),
(88, 47, 8, '2018-07-24 09:20:23', '2018-07-24 09:20:23'),
(89, 4, 2, '2018-07-24 09:20:36', '2018-07-24 09:20:36'),
(90, 5, 2, '2018-07-24 09:20:36', '2018-07-24 09:20:36'),
(91, 6, 2, '2018-07-24 09:20:36', '2018-07-24 09:20:36'),
(92, 37, 2, '2018-07-24 09:20:36', '2018-07-24 09:20:36'),
(93, 46, 2, '2018-07-24 09:20:36', '2018-07-24 09:20:36'),
(107, 4, 26, '2018-07-24 09:36:04', '2018-07-24 09:36:04'),
(108, 5, 26, '2018-07-24 09:36:04', '2018-07-24 09:36:04'),
(109, 6, 26, '2018-07-24 09:36:04', '2018-07-24 09:36:04'),
(110, 37, 26, '2018-07-24 09:36:04', '2018-07-24 09:36:04'),
(111, 50, 26, '2018-07-24 09:36:04', '2018-07-24 09:36:04'),
(112, 35, 27, '2018-07-24 09:39:31', '2018-07-24 09:39:31'),
(113, 41, 27, '2018-07-24 09:39:31', '2018-07-24 09:39:31'),
(114, 45, 27, '2018-07-24 09:39:31', '2018-07-24 09:39:31'),
(115, 46, 27, '2018-07-24 09:39:31', '2018-07-24 09:39:31'),
(116, 9, 5, '2018-07-24 09:43:51', '2018-07-24 09:43:51'),
(117, 10, 5, '2018-07-24 09:43:51', '2018-07-24 09:43:51'),
(118, 14, 5, '2018-07-24 09:43:51', '2018-07-24 09:43:51'),
(119, 48, 5, '2018-07-24 09:43:51', '2018-07-24 09:43:51'),
(120, 49, 5, '2018-07-24 09:43:51', '2018-07-24 09:43:51'),
(121, 51, 5, '2018-07-24 09:43:51', '2018-07-24 09:43:51'),
(129, 3, 6, '2018-07-25 21:41:57', '2018-07-25 21:41:57'),
(130, 5, 6, '2018-07-25 21:41:57', '2018-07-25 21:41:57'),
(131, 33, 6, '2018-07-25 21:41:57', '2018-07-25 21:41:57'),
(132, 45, 6, '2018-07-25 21:41:57', '2018-07-25 21:41:57'),
(133, 50, 6, '2018-07-25 21:41:57', '2018-07-25 21:41:57'),
(134, 18, 24, '2018-07-25 21:42:19', '2018-07-25 21:42:19'),
(135, 49, 24, '2018-07-25 21:42:19', '2018-07-25 21:42:19'),
(136, 51, 24, '2018-07-25 21:42:19', '2018-07-25 21:42:19'),
(137, 1, 25, '2018-07-25 21:42:33', '2018-07-25 21:42:33'),
(138, 10, 25, '2018-07-25 21:42:33', '2018-07-25 21:42:33'),
(139, 36, 25, '2018-07-25 21:42:33', '2018-07-25 21:42:33'),
(140, 50, 25, '2018-07-25 21:42:33', '2018-07-25 21:42:33'),
(141, 2, 14, '2018-07-25 21:42:47', '2018-07-25 21:42:47'),
(142, 5, 14, '2018-07-25 21:42:47', '2018-07-25 21:42:47'),
(143, 31, 14, '2018-07-25 21:42:47', '2018-07-25 21:42:47'),
(144, 50, 14, '2018-07-25 21:42:47', '2018-07-25 21:42:47'),
(145, 51, 14, '2018-07-25 21:42:47', '2018-07-25 21:42:47'),
(146, 1, 22, '2018-07-25 21:43:00', '2018-07-25 21:43:00'),
(147, 33, 22, '2018-07-25 21:43:00', '2018-07-25 21:43:00'),
(148, 36, 22, '2018-07-25 21:43:00', '2018-07-25 21:43:00'),
(149, 41, 22, '2018-07-25 21:43:00', '2018-07-25 21:43:00'),
(150, 2, 13, '2018-07-25 21:43:12', '2018-07-25 21:43:12'),
(151, 4, 13, '2018-07-25 21:43:12', '2018-07-25 21:43:12'),
(152, 41, 13, '2018-07-25 21:43:12', '2018-07-25 21:43:12'),
(153, 51, 13, '2018-07-25 21:43:12', '2018-07-25 21:43:12'),
(154, 1, 12, '2018-07-25 21:43:27', '2018-07-25 21:43:27'),
(155, 37, 12, '2018-07-25 21:43:27', '2018-07-25 21:43:27'),
(156, 33, 12, '2018-07-25 21:43:27', '2018-07-25 21:43:27'),
(157, 38, 12, '2018-07-25 21:43:27', '2018-07-25 21:43:27'),
(158, 44, 12, '2018-07-25 21:43:27', '2018-07-25 21:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `share__posts`
--

CREATE TABLE `share__posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `button_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `serialize_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `position_id`, `created_at`, `updated_at`, `approved`, `button_title`, `button_icon`, `service_id`, `serialize_level`) VALUES
(1, 'Video Script', 0, '2018-07-18 16:08:47', '2018-08-08 09:32:21', 0, 'Add Video Script', 'asd', 1, 1),
(2, 'Video Story B', 0, '2018-07-18 16:09:28', '2018-07-18 16:15:46', 0, 'Add', 'asd', 0, NULL),
(3, 'Video Copy', 0, '2018-07-18 16:10:23', '2018-07-18 16:15:27', 0, 'Add', 'asd', 0, NULL),
(4, 'Content Calendar', 0, '2018-07-18 16:12:05', '2018-07-18 16:12:05', 0, 'Add Content', 'asd', 0, NULL),
(5, 'Designs Calendar', 0, '2018-07-18 16:12:51', '2018-07-18 16:12:51', 0, 'Upload Posts Design', 'asd', 0, NULL),
(6, 'Schedule Calendar', 0, '2018-07-18 16:14:42', '2018-07-18 16:14:42', 0, 'schedule', 'asd', 0, NULL),
(9, 'Collect Money', 0, '2018-07-24 05:05:19', '2018-07-24 05:05:19', 0, 'Collect Money', 'collect', 0, NULL),
(10, 'Approve Contract', 0, '2018-07-24 05:08:40', '2018-08-07 12:17:58', 0, 'Approve Contract', 'Approve', 6, 1),
(11, 'Day Off', 0, '2018-07-24 05:14:28', '2018-08-07 12:17:34', 0, 'Day Off', 'off', 6, 1),
(12, 'Vacation', 0, '2018-07-24 05:17:52', '2018-07-24 05:17:52', 0, 'Select Range', 'range', 0, NULL),
(13, 'Advance payment', 0, '2018-07-24 05:30:42', '2018-08-07 08:31:54', 0, 'Advance payment', 'Advance payment', 5, 1),
(14, 'Calling Customers', 0, '2018-07-24 05:35:18', '2018-07-24 05:35:18', 0, 'Calling Customers', 'phone_out', 0, NULL),
(15, 'Take a Drink', 0, '2018-07-24 05:41:52', '2018-07-24 05:41:52', 0, 'Take a Drink', 'break', 0, NULL),
(16, 'Emergency', 0, '2018-07-24 07:26:32', '2018-07-24 07:26:32', 0, 'Emergency', 'emergency', 0, NULL),
(17, 'Competitive analysis', 0, '2018-07-24 07:34:19', '2018-07-24 07:34:19', 0, 'Set Competitive analysis', 'competitive', 0, NULL),
(18, 'Booth Design', 0, '2018-07-24 07:55:55', '2018-08-08 09:19:59', 0, 'Upload Design', 'booth', 5, 2),
(19, 'Booth Production Sizes', 0, '2018-07-24 07:57:20', '2018-07-24 08:09:07', 0, 'Upload Sizes', 'production', 0, NULL),
(20, 'Booth Production', 0, '2018-07-24 08:00:16', '2018-07-24 08:00:16', 0, 'Booth Production', 'production', 0, NULL),
(21, 'Video Production', 0, '2018-07-24 08:07:17', '2018-07-24 08:07:17', 0, 'Upload Video', 'camera', 0, NULL),
(22, 'Stationary', 0, '2018-07-24 08:10:39', '2018-07-24 08:10:39', 0, 'Upload Stationary', 'stationary', 0, NULL),
(23, 'Branch Sizes', 0, '2018-07-24 08:12:07', '2018-07-24 08:12:07', 0, 'Upload Sizes', 'size', 0, NULL),
(24, 'Branch Internal Design', 0, '2018-07-24 08:14:02', '2018-07-24 08:14:02', 0, 'Upload Design', 'photo', 0, NULL),
(25, 'Branch Confirmation', 0, '2018-07-24 08:15:39', '2018-07-24 08:15:39', 0, 'Branch Confirmation', 'confirmation', 0, NULL),
(26, 'Corporate Identity / Logo', 0, '2018-07-24 08:16:49', '2018-07-24 08:16:49', 0, 'Upload C.I', 'identity', 0, NULL),
(27, 'Creative Campaign | Intro', 0, '2018-07-24 08:19:09', '2018-07-24 08:33:49', 0, 'Creative Strategy intro', 'creative', 0, NULL),
(28, 'Sample Post Content', 0, '2018-07-24 08:20:23', '2018-07-24 08:20:23', 0, 'Upload Content', 'content', 0, NULL),
(29, 'Sample Post Design', 0, '2018-07-24 08:22:02', '2018-07-24 08:22:02', 0, 'Upload Design', 'photo', 0, NULL),
(30, 'Master Visual Social Media', 0, '2018-07-24 08:23:33', '2018-08-08 08:43:25', 0, 'Upload visual', 'photo', 2, 2),
(31, 'Master Visual Outdoor', 0, '2018-07-24 08:24:21', '2018-07-24 08:24:21', 0, 'Upload Visual', 'photo', 0, NULL),
(32, 'Create Slogan', 0, '2018-07-24 08:25:21', '2018-07-24 08:25:21', 0, 'Wirte Slogan', 'text', 0, NULL),
(33, 'Target Market', 0, '2018-07-24 08:29:41', '2018-07-24 08:29:41', 0, 'Set Target Market', 'market', 0, NULL),
(34, 'Strategy', 0, '2018-07-24 08:36:49', '2018-07-24 08:36:49', 0, 'Set Strategy', 'chart', 0, NULL),
(35, 'Master Visual Google Ads', 0, '2018-07-24 08:38:40', '2018-07-24 08:38:40', 0, 'Upload Design', 'photo', 0, NULL),
(36, 'Tone Of Voice', 0, '2018-07-24 08:42:08', '2018-07-24 08:42:08', 0, 'Set TOV Settings', 'voice', 0, NULL),
(37, 'Calendar Settings', 0, '2018-07-24 08:50:36', '2018-08-09 08:02:16', 0, 'Set Calendar Settings', 'calendar', 1, 1),
(38, 'Email Design', 0, '2018-07-24 08:51:55', '2018-07-24 08:51:55', 0, 'Upload Design', 'photo', 0, NULL),
(39, 'Email Content', 0, '2018-07-24 08:52:33', '2018-07-24 08:52:33', 0, 'Wirte Content', 'email', 0, NULL),
(40, 'Master Visual PressAd', 0, '2018-07-24 08:54:53', '2018-07-24 08:54:53', 0, 'Upload Design', 'photo', 0, NULL),
(41, 'Confirmation Sent Messages', 0, '2018-07-24 09:03:31', '2018-07-24 09:03:31', 0, 'Confirm', 'phone', 0, NULL),
(42, 'Content Sent Messages', 0, '2018-07-24 09:04:18', '2018-07-24 09:04:18', 0, 'Wirte Content', 'phone_out', 0, NULL),
(43, 'Signage Design', 0, '2018-07-24 09:11:41', '2018-07-24 09:11:41', 0, 'Upload Design', 'photo', 0, NULL),
(44, 'Signage Construction Photo', 0, '2018-07-24 09:12:32', '2018-07-24 09:12:32', 0, 'Upload Photo', 'photo', 0, NULL),
(45, 'SEO Status Updates', 0, '2018-07-24 09:15:56', '2018-08-26 11:06:34', 0, 'Confirmation Updates', 'keywords', 9, 1),
(46, 'Social Media Moderation Updates', 0, '2018-07-24 09:18:16', '2018-08-08 06:26:52', 0, 'Set Moderation Status', 'clock', 2, 1),
(47, 'Campaign Status', 0, '2018-07-24 09:19:58', '2018-07-24 09:19:58', 0, 'Set Campaign Status', 'chart', 0, NULL),
(48, 'Technical Call', 0, '2018-07-24 09:27:41', '2018-07-24 09:27:41', 0, 'Set Feedback', 'phone_out', 0, NULL),
(49, 'Meeting Feedback', 0, '2018-07-24 09:29:02', '2018-07-24 09:29:02', 0, 'Meeting Feedback', 'meeting', 0, NULL),
(50, 'Profile Settings', 0, '2018-07-24 09:34:08', '2018-07-24 09:34:08', 0, 'Upload Designs', 'photo', 0, NULL),
(51, 'Quotation', 0, '2018-07-24 09:42:29', '2018-07-24 09:42:29', 0, 'Choosing Services', 'file', 0, NULL),
(55, 'just for test', 0, '2018-07-29 12:29:44', '2018-07-29 12:29:44', 0, 'asd', 'asd', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_approve_comments`
--

CREATE TABLE `task_approve_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_assign_id` int(10) UNSIGNED NOT NULL,
  `user_decline_id` int(10) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_approve_comments`
--

INSERT INTO `task_approve_comments` (`id`, `task_assign_id`, `user_decline_id`, `comment`, `created_at`, `updated_at`, `type`) VALUES
(1, 1, 4, 'qwdqwdqwd', '2018-08-15 11:34:29', '2018-08-15 11:34:29', NULL),
(2, 1, 4, NULL, '2018-08-15 11:46:07', '2018-08-15 11:46:07', NULL),
(3, 2, 4, 'error in logic', '2018-08-15 12:46:30', '2018-08-15 12:46:30', 'T.L. Comment'),
(4, 1, 4, 'director error', '2018-08-15 12:46:56', '2018-08-15 12:46:56', 'Director Comment'),
(5, 1, 4, 'asd director', '2018-08-15 12:56:02', '2018-08-15 12:56:02', 'Director Comment'),
(6, 1, 4, 'just for test', '2018-08-16 06:56:59', '2018-08-16 06:56:59', 'T.L. Comment'),
(7, 2, 4, 'just for test', '2018-08-16 06:57:06', '2018-08-16 06:57:06', 'T.L. Comment'),
(8, 1, 4, 'testing', '2018-08-16 07:16:55', '2018-08-16 07:16:55', 'Director Comment'),
(9, 1, 4, 'tttttttttttt', '2018-08-16 07:25:20', '2018-08-16 07:25:20', 'Director Comment'),
(10, 1, 4, 'qwdqwd', '2018-08-16 07:32:53', '2018-08-16 07:32:53', 'T.L. Comment'),
(11, 1, 4, 'uuuuuuu', '2018-08-16 07:41:43', '2018-08-16 07:41:43', 'T.L. Comment'),
(12, 1, 4, 'qwdqwdqwdqwd', '2018-08-16 07:42:50', '2018-08-16 07:42:50', 'T.L. Comment'),
(13, 1, 4, 'rerererererererererer', '2018-08-16 07:44:54', '2018-08-16 07:44:54', 'Director Comment'),
(14, 1, 4, 'wwwwwwww', '2018-08-16 08:07:40', '2018-08-16 08:07:40', 'Director Comment'),
(15, 1, 4, 'qqqqqqqq', '2018-08-16 08:08:20', '2018-08-16 08:08:20', 'T.L. Comment');

-- --------------------------------------------------------

--
-- Table structure for table `task_assigns`
--

CREATE TABLE `task_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `end_date` date DEFAULT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `quotation_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `serialize_level` int(11) DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `user_approved_id` int(11) DEFAULT NULL,
  `q_q_s_id` int(10) UNSIGNED NOT NULL,
  `director_approve` tinyint(1) NOT NULL DEFAULT '0',
  `is_director_declined` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_assigns`
--

INSERT INTO `task_assigns` (`id`, `end_date`, `task_id`, `user_id`, `created_at`, `updated_at`, `is_done`, `quotation_id`, `service_id`, `serialize_level`, `is_approved`, `user_approved_id`, `q_q_s_id`, `director_approve`, `is_director_declined`) VALUES
(1, '2018-08-31', 1, 2, '2018-08-15 11:13:18', '2018-08-16 10:26:50', 1, 29, 1, 1, 1, 4, 1, 1, 0),
(2, '2018-08-31', 37, 2, '2018-08-15 11:13:18', '2018-08-16 09:52:00', 1, 29, 1, 1, 1, 4, 1, 1, 0),
(3, '2018-08-31', 1, 2, '2018-08-15 11:13:18', '2018-08-16 08:58:20', 0, 29, 1, 1, 0, NULL, 2, 0, 0),
(4, '2018-08-31', 37, 2, '2018-08-15 11:13:18', '2018-08-15 11:32:43', 0, 29, 1, 1, 0, NULL, 2, 0, 0),
(5, '2018-08-31', 1, 2, '2018-08-15 11:13:18', '2018-08-15 11:32:43', 0, 29, 1, 1, 0, NULL, 3, 0, 0),
(6, '2018-08-31', 37, 2, '2018-08-15 11:13:18', '2018-08-15 11:32:43', 0, 29, 1, 1, 0, NULL, 3, 0, 0),
(7, '2018-08-08', 1, 2, '2018-08-15 11:13:18', '2018-08-15 11:13:18', 0, 29, 1, 1, 0, NULL, 4, 0, 0),
(8, '2018-08-08', 37, 2, '2018-08-15 11:13:18', '2018-08-15 11:13:18', 0, 29, 1, 1, 0, NULL, 4, 0, 0),
(9, '2018-08-08', 30, 2, '2018-08-15 11:13:18', '2018-08-15 11:13:18', 0, 29, 2, 2, 0, NULL, 5, 0, 0),
(10, '2018-08-08', 46, 8, '2018-08-15 11:13:18', '2018-08-15 11:32:43', 0, 29, 2, 1, 0, NULL, 5, 0, 0),
(11, '2018-08-08', 30, 2, '2018-08-15 11:13:18', '2018-08-15 11:13:18', 0, 29, 2, 2, 0, NULL, 6, 0, 0),
(12, '2018-08-08', 46, 7, '2018-08-15 11:13:18', '2018-08-15 11:13:18', 0, 29, 2, 1, 0, NULL, 6, 0, 0),
(13, '2018-08-08', 30, 2, '2018-08-15 11:13:18', '2018-08-15 11:13:18', 0, 29, 2, 2, 0, NULL, 7, 0, 0),
(14, '2018-08-08', 46, 7, '2018-08-15 11:13:18', '2018-08-15 11:13:18', 0, 29, 2, 1, 0, NULL, 7, 0, 0),
(15, '2018-08-08', 30, 2, '2018-08-15 11:13:18', '2018-08-15 11:13:18', 0, 29, 2, 2, 0, NULL, 8, 0, 0),
(16, '2018-08-08', 46, 7, '2018-08-15 11:13:18', '2018-08-15 11:13:18', 0, 29, 2, 1, 0, NULL, 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_executions`
--

CREATE TABLE `task_executions` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_assign_id` int(10) UNSIGNED NOT NULL,
  `input` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_executions`
--

INSERT INTO `task_executions` (`id`, `task_assign_id`, `input`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Video_Script', 'data', 'just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny just for funny ', '2018-08-15 11:33:26', '2018-08-15 11:33:26'),
(2, 1, 'sound', 'file', 'http://localhost:8888/admin/public/storage/task-manager/1534340006-2CKoY1Xq.png', '2018-08-15 11:33:26', '2018-08-15 11:33:26'),
(3, 2, 'Type_Of_Post', 'data', 'asd', '2018-08-15 11:34:03', '2018-08-15 11:34:03'),
(4, 2, 'Objective', 'data', 'asd', '2018-08-15 11:34:03', '2018-08-15 11:34:03'),
(5, 2, 'Budget_Spending', 'data', '231', '2018-08-15 11:34:03', '2018-08-15 11:34:03'),
(6, 2, '#Tags', 'data', 'asd', '2018-08-15 11:34:03', '2018-08-15 11:34:03'),
(7, 2, 'Launching_Date', 'data', '08/29/2018', '2018-08-15 11:34:03', '2018-08-15 11:34:03'),
(8, 2, 'File_Test', 'array', '[\"http://localhost:8888/admin/public/storage/task-manager/1534340043-VbLvYx7w.ai\",\"http://localhost:8888/admin/public/storage/task-manager/1534340043-fgcVThae.png\"]', '2018-08-15 11:34:03', '2018-08-15 11:34:03'),
(9, 3, 'Video_Script', 'data', 'poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka poleka ', '2018-08-16 08:58:14', '2018-08-16 08:58:14'),
(10, 3, 'sound', 'file', 'http://localhost:8888/admin/public/storage/task-manager/1534417094-yaftGJBs.png', '2018-08-16 08:58:14', '2018-08-16 08:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `task_inputs`
--

CREATE TABLE `task_inputs` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `input_name_id` int(10) UNSIGNED NOT NULL,
  `input_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_inputs`
--

INSERT INTO `task_inputs` (`id`, `task_id`, `input_name_id`, `input_title`, `created_at`, `updated_at`) VALUES
(4, 4, 3, 'Add Content', '2018-07-18 16:12:05', '2018-07-18 16:12:05'),
(5, 5, 5, 'Upload Posts Design', '2018-07-18 16:13:17', '2018-07-18 16:13:17'),
(6, 6, 8, 'schedule', '2018-07-18 16:14:42', '2018-07-18 16:14:42'),
(8, 3, 5, 'Video Copies', '2018-07-18 16:15:27', '2018-07-18 16:15:27'),
(9, 2, 6, 'Story B', '2018-07-18 16:15:46', '2018-07-18 16:15:46'),
(18, 9, 6, 'Upload Documents', '2018-07-24 05:09:05', '2018-07-24 05:09:05'),
(19, 12, 9, 'Select Range', '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(24, 15, 9, 'Rules', '2018-07-24 07:23:21', '2018-07-24 07:23:21'),
(27, 17, 3, 'Company Name', '2018-07-24 07:34:19', '2018-07-24 07:34:19'),
(28, 17, 3, 'Strength', '2018-07-24 07:34:19', '2018-07-24 07:34:19'),
(29, 17, 3, 'Weekness', '2018-07-24 07:34:19', '2018-07-24 07:34:19'),
(30, 17, 7, 'Market Share %', '2018-07-24 07:34:19', '2018-07-24 07:34:19'),
(31, 17, 7, 'Engagement Rate %', '2018-07-24 07:34:19', '2018-07-24 07:34:19'),
(32, 17, 3, 'Social Linkes', '2018-07-24 07:34:19', '2018-07-24 07:34:19'),
(37, 20, 6, 'Upload Construction Update', '2018-07-24 08:04:02', '2018-07-24 08:04:02'),
(38, 20, 6, 'Upload Final Photos', '2018-07-24 08:04:02', '2018-07-24 08:04:02'),
(39, 21, 6, 'Upload Materials', '2018-07-24 08:07:17', '2018-07-24 08:07:17'),
(40, 21, 6, 'Upload Copy', '2018-07-24 08:07:17', '2018-07-24 08:07:17'),
(42, 19, 5, 'Upload Sizes', '2018-07-24 08:09:07', '2018-07-24 08:09:07'),
(43, 22, 6, 'Upload Stationary', '2018-07-24 08:10:39', '2018-07-24 08:10:39'),
(45, 23, 6, 'Upload Sizes', '2018-07-24 08:13:07', '2018-07-24 08:13:07'),
(46, 24, 6, 'Upload Design', '2018-07-24 08:14:02', '2018-07-24 08:14:02'),
(47, 25, 6, 'Upload Construction Update', '2018-07-24 08:15:39', '2018-07-24 08:15:39'),
(48, 25, 6, 'Upload Final Photos', '2018-07-24 08:15:39', '2018-07-24 08:15:39'),
(49, 26, 6, 'Upload C.I', '2018-07-24 08:16:49', '2018-07-24 08:16:49'),
(51, 29, 6, 'Upload Design', '2018-07-24 08:22:02', '2018-07-24 08:22:02'),
(52, 28, 4, 'Wirte Content', '2018-07-24 08:22:30', '2018-07-24 08:22:30'),
(54, 31, 6, 'Upload Visual', '2018-07-24 08:24:21', '2018-07-24 08:24:21'),
(55, 32, 3, 'Wirte Slogan', '2018-07-24 08:25:21', '2018-07-24 08:25:21'),
(56, 33, 3, 'Jobs', '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(57, 33, 3, 'Family Status', '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(58, 33, 3, 'Life Style', '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(59, 33, 9, 'Income Average', '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(60, 33, 9, 'Demographics', '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(61, 27, 4, 'Introduction', '2018-07-24 08:33:49', '2018-07-24 08:33:49'),
(62, 27, 4, 'USP', '2018-07-24 08:33:49', '2018-07-24 08:33:49'),
(63, 27, 4, 'Mission', '2018-07-24 08:33:49', '2018-07-24 08:33:49'),
(64, 27, 3, 'Slogan', '2018-07-24 08:33:49', '2018-07-24 08:33:49'),
(65, 27, 3, 'Season Factor', '2018-07-24 08:33:49', '2018-07-24 08:33:49'),
(66, 27, 4, 'Rational', '2018-07-24 08:33:49', '2018-07-24 08:33:49'),
(67, 27, 4, 'Concept', '2018-07-24 08:33:49', '2018-07-24 08:33:49'),
(68, 34, 9, 'Duration', '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(69, 34, 3, 'Objective', '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(70, 34, 3, 'Category', '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(71, 34, 3, 'Advertising', '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(72, 34, 3, 'Community', '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(73, 36, 3, 'Do\'s', '2018-07-24 08:42:08', '2018-07-24 08:42:08'),
(79, 38, 6, 'Upload Design', '2018-07-24 08:51:55', '2018-07-24 08:51:55'),
(80, 39, 4, 'Wirte Content', '2018-07-24 08:52:33', '2018-07-24 08:52:33'),
(81, 40, 6, 'Upload Design', '2018-07-24 08:54:53', '2018-07-24 08:54:53'),
(82, 41, 8, 'Confirm', '2018-07-24 09:03:31', '2018-07-24 09:03:31'),
(83, 42, 4, 'Wirte Content', '2018-07-24 09:04:18', '2018-07-24 09:04:18'),
(84, 14, 8, 'No Answer', '2018-07-24 09:10:33', '2018-07-24 09:10:33'),
(85, 14, 4, 'Not Interested', '2018-07-24 09:10:33', '2018-07-24 09:10:33'),
(86, 14, 8, 'Meeting', '2018-07-24 09:10:33', '2018-07-24 09:10:33'),
(87, 43, 6, 'Upload Design', '2018-07-24 09:11:41', '2018-07-24 09:11:41'),
(88, 44, 6, 'Upload Photo', '2018-07-24 09:12:32', '2018-07-24 09:12:32'),
(91, 47, 7, 'Daily Budget', '2018-07-24 09:19:58', '2018-07-24 09:19:58'),
(92, 16, 9, 'Request Emergency', '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(93, 16, 7, 'Rules | Maximum 4 hours', '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(96, 50, 5, 'Profile Picture', '2018-07-24 09:35:50', '2018-07-24 09:35:50'),
(97, 51, 1, 'Choosing Services', '2018-07-24 09:43:30', '2018-07-24 09:43:30'),
(98, 51, 3, 'Sending by mail', '2018-07-24 09:43:30', '2018-07-24 09:43:30'),
(99, 51, 2, 'Download', '2018-07-24 09:43:30', '2018-07-24 09:43:30'),
(103, 49, 4, 'Not Interested', '2018-07-24 10:44:21', '2018-07-24 10:44:21'),
(104, 49, 2, 'Quotation', '2018-07-24 10:44:21', '2018-07-24 10:44:21'),
(105, 49, 3, 'Sending Portifolio', '2018-07-24 10:44:21', '2018-07-24 10:44:21'),
(106, 49, 3, 'Industry Status', '2018-07-24 10:44:21', '2018-07-24 10:44:21'),
(107, 49, 3, 'Business Scale', '2018-07-24 10:44:21', '2018-07-24 10:44:21'),
(108, 49, 3, 'Business Status', '2018-07-24 10:44:21', '2018-07-24 10:44:21'),
(109, 49, 4, 'Feedback', '2018-07-24 10:44:21', '2018-07-24 10:44:21'),
(127, 55, 1, 'asd', '2018-07-29 12:30:54', '2018-07-29 12:30:54'),
(128, 55, 2, 'qwe', '2018-07-29 12:30:54', '2018-07-29 12:30:54'),
(129, 13, 7, 'Request | Expectation', '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(130, 13, 9, 'Rules | Maximum Range of Salary', '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(131, 10, 6, 'Upload Contract', '2018-08-07 12:17:58', '2018-08-07 12:17:58'),
(133, 30, 6, 'Upload Design', '2018-08-08 08:43:25', '2018-08-08 08:43:25'),
(135, 18, 6, 'Task | Upload Design', '2018-08-08 09:19:59', '2018-08-08 09:19:59'),
(154, 37, 3, 'Type Of Post', '2018-08-12 08:20:11', '2018-08-12 08:20:11'),
(155, 37, 3, 'Objective', '2018-08-12 08:20:11', '2018-08-12 08:20:11'),
(156, 37, 7, 'Budget Spending', '2018-08-12 08:20:11', '2018-08-12 08:20:11'),
(157, 37, 3, '#Tags', '2018-08-12 08:20:11', '2018-08-12 08:20:11'),
(158, 37, 8, 'Launching Date', '2018-08-12 08:20:11', '2018-08-12 08:20:11'),
(159, 37, 6, 'File Test', '2018-08-12 08:20:11', '2018-08-12 08:20:11'),
(164, 1, 4, 'Video Script', '2018-08-14 11:17:52', '2018-08-14 11:17:52'),
(165, 1, 5, 'sound', '2018-08-14 11:17:52', '2018-08-14 11:17:52'),
(166, 45, 8, 'Confirmation Updates', '2018-08-26 11:06:34', '2018-08-26 11:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `task_positions`
--

CREATE TABLE `task_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_positions`
--

INSERT INTO `task_positions` (`id`, `task_id`, `position_id`, `created_at`, `updated_at`) VALUES
(4, 4, 5, '2018-07-18 16:12:05', '2018-07-18 16:12:05'),
(8, 5, 10, '2018-07-18 16:13:17', '2018-07-18 16:13:17'),
(9, 5, 11, '2018-07-18 16:13:17', '2018-07-18 16:13:17'),
(10, 5, 12, '2018-07-18 16:13:17', '2018-07-18 16:13:17'),
(11, 6, 7, '2018-07-18 16:14:42', '2018-07-18 16:14:42'),
(13, 3, 11, '2018-07-18 16:15:27', '2018-07-18 16:15:27'),
(14, 2, 10, '2018-07-18 16:15:46', '2018-07-18 16:15:46'),
(20, 9, 20, '2018-07-24 05:09:05', '2018-07-24 05:09:05'),
(42, 12, 1, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(43, 12, 16, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(44, 12, 17, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(45, 12, 15, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(46, 12, 2, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(47, 12, 4, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(48, 12, 6, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(49, 12, 7, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(50, 12, 14, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(51, 12, 5, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(52, 12, 8, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(53, 12, 9, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(54, 12, 10, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(55, 12, 11, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(56, 12, 12, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(57, 12, 13, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(58, 12, 20, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(59, 12, 21, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(60, 12, 22, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(61, 12, 19, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(105, 17, 4, '2018-07-24 07:34:19', '2018-07-24 07:34:19'),
(110, 20, 25, '2018-07-24 08:04:02', '2018-07-24 08:04:02'),
(111, 21, 26, '2018-07-24 08:07:17', '2018-07-24 08:07:17'),
(113, 19, 24, '2018-07-24 08:09:07', '2018-07-24 08:09:07'),
(114, 22, 9, '2018-07-24 08:10:39', '2018-07-24 08:10:39'),
(115, 23, 28, '2018-07-24 08:13:07', '2018-07-24 08:13:07'),
(116, 24, 24, '2018-07-24 08:14:02', '2018-07-24 08:14:02'),
(117, 25, 28, '2018-07-24 08:15:39', '2018-07-24 08:15:39'),
(118, 26, 9, '2018-07-24 08:16:49', '2018-07-24 08:16:49'),
(121, 29, 9, '2018-07-24 08:22:02', '2018-07-24 08:22:02'),
(122, 29, 10, '2018-07-24 08:22:02', '2018-07-24 08:22:02'),
(123, 29, 11, '2018-07-24 08:22:02', '2018-07-24 08:22:02'),
(124, 29, 12, '2018-07-24 08:22:02', '2018-07-24 08:22:02'),
(125, 29, 24, '2018-07-24 08:22:02', '2018-07-24 08:22:02'),
(126, 28, 5, '2018-07-24 08:22:30', '2018-07-24 08:22:30'),
(128, 31, 9, '2018-07-24 08:24:21', '2018-07-24 08:24:21'),
(129, 32, 8, '2018-07-24 08:25:21', '2018-07-24 08:25:21'),
(130, 33, 14, '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(131, 33, 13, '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(132, 27, 13, '2018-07-24 08:33:49', '2018-07-24 08:33:49'),
(133, 34, 14, '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(134, 34, 13, '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(135, 35, 10, '2018-07-24 08:38:40', '2018-07-24 08:38:40'),
(136, 35, 11, '2018-07-24 08:38:40', '2018-07-24 08:38:40'),
(137, 35, 12, '2018-07-24 08:38:40', '2018-07-24 08:38:40'),
(138, 35, 24, '2018-07-24 08:38:40', '2018-07-24 08:38:40'),
(139, 36, 14, '2018-07-24 08:42:08', '2018-07-24 08:42:08'),
(141, 38, 9, '2018-07-24 08:51:55', '2018-07-24 08:51:55'),
(142, 39, 8, '2018-07-24 08:52:33', '2018-07-24 08:52:33'),
(143, 40, 9, '2018-07-24 08:54:53', '2018-07-24 08:54:53'),
(144, 41, 4, '2018-07-24 09:03:31', '2018-07-24 09:03:31'),
(145, 42, 5, '2018-07-24 09:04:18', '2018-07-24 09:04:18'),
(146, 14, 16, '2018-07-24 09:10:33', '2018-07-24 09:10:33'),
(147, 43, 9, '2018-07-24 09:11:41', '2018-07-24 09:11:41'),
(148, 44, 27, '2018-07-24 09:12:32', '2018-07-24 09:12:32'),
(153, 47, 4, '2018-07-24 09:19:58', '2018-07-24 09:19:58'),
(154, 16, 1, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(155, 16, 16, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(156, 16, 17, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(157, 16, 15, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(158, 16, 2, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(159, 16, 4, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(160, 16, 6, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(161, 16, 7, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(162, 16, 14, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(163, 16, 5, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(164, 16, 8, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(165, 16, 9, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(166, 16, 10, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(167, 16, 11, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(168, 16, 12, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(169, 16, 13, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(170, 16, 24, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(171, 16, 20, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(172, 16, 21, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(173, 16, 22, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(174, 16, 23, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(175, 16, 19, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(176, 16, 25, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(177, 16, 26, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(178, 16, 27, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(179, 16, 28, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(180, 48, 17, '2018-07-24 09:27:41', '2018-07-24 09:27:41'),
(182, 50, 9, '2018-07-24 09:35:50', '2018-07-24 09:35:50'),
(183, 50, 10, '2018-07-24 09:35:50', '2018-07-24 09:35:50'),
(184, 50, 11, '2018-07-24 09:35:50', '2018-07-24 09:35:50'),
(185, 50, 12, '2018-07-24 09:35:50', '2018-07-24 09:35:50'),
(186, 50, 24, '2018-07-24 09:35:50', '2018-07-24 09:35:50'),
(188, 51, 1, '2018-07-24 09:43:30', '2018-07-24 09:43:30'),
(190, 49, 1, '2018-07-24 10:44:21', '2018-07-24 10:44:21'),
(201, 55, 17, '2018-07-29 12:30:54', '2018-07-29 12:30:54'),
(202, 13, 1, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(203, 13, 16, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(204, 13, 17, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(205, 13, 15, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(206, 13, 2, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(207, 13, 4, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(208, 13, 6, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(209, 13, 14, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(210, 13, 5, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(211, 13, 8, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(212, 13, 9, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(213, 13, 10, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(214, 13, 11, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(215, 13, 12, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(216, 13, 13, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(217, 13, 20, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(218, 13, 21, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(219, 13, 22, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(220, 13, 7, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(221, 13, 18, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(222, 13, 19, '2018-08-07 08:31:54', '2018-08-07 08:31:54'),
(223, 10, 22, '2018-08-07 12:17:58', '2018-08-07 12:17:58'),
(224, 46, 2, '2018-08-08 06:29:09', '2018-08-08 06:29:09'),
(226, 30, 9, '2018-08-08 08:43:25', '2018-08-08 08:43:25'),
(228, 18, 24, '2018-08-08 09:19:59', '2018-08-08 09:19:59'),
(241, 37, 9, '2018-08-12 08:20:11', '2018-08-12 08:20:11'),
(242, 37, 7, '2018-08-12 08:20:11', '2018-08-12 08:20:11'),
(243, 37, 27, '2018-08-12 08:20:11', '2018-08-12 08:20:11'),
(247, 1, 8, '2018-08-14 11:17:52', '2018-08-14 11:17:52'),
(248, 1, 9, '2018-08-14 11:17:52', '2018-08-14 11:17:52'),
(249, 45, 15, '2018-08-26 11:06:34', '2018-08-26 11:06:34'),
(250, 45, 6, '2018-08-26 11:06:34', '2018-08-26 11:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `task_services`
--

CREATE TABLE `task_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_services`
--

INSERT INTO `task_services` (`id`, `task_id`, `service_id`, `created_at`, `updated_at`) VALUES
(4, 4, 2, '2018-07-18 16:12:05', '2018-07-18 16:12:05'),
(6, 5, 2, '2018-07-18 16:13:17', '2018-07-18 16:13:17'),
(7, 6, 2, '2018-07-18 16:14:42', '2018-07-18 16:14:42'),
(9, 3, 1, '2018-07-18 16:15:27', '2018-07-18 16:15:27'),
(10, 2, 1, '2018-07-18 16:15:46', '2018-07-18 16:15:46'),
(13, 9, 5, '2018-07-24 05:09:05', '2018-07-24 05:09:05'),
(14, 12, 6, '2018-07-24 05:17:52', '2018-07-24 05:17:52'),
(19, 15, 6, '2018-07-24 07:23:21', '2018-07-24 07:23:21'),
(21, 17, 8, '2018-07-24 07:34:19', '2018-07-24 07:34:19'),
(28, 20, 24, '2018-07-24 08:04:02', '2018-07-24 08:04:02'),
(29, 21, 16, '2018-07-24 08:07:17', '2018-07-24 08:07:17'),
(31, 19, 24, '2018-07-24 08:09:07', '2018-07-24 08:09:07'),
(32, 22, 15, '2018-07-24 08:10:39', '2018-07-24 08:10:39'),
(34, 23, 25, '2018-07-24 08:13:07', '2018-07-24 08:13:07'),
(35, 24, 25, '2018-07-24 08:14:02', '2018-07-24 08:14:02'),
(36, 25, 25, '2018-07-24 08:15:39', '2018-07-24 08:15:39'),
(37, 26, 14, '2018-07-24 08:16:49', '2018-07-24 08:16:49'),
(42, 29, 2, '2018-07-24 08:22:02', '2018-07-24 08:22:02'),
(43, 29, 22, '2018-07-24 08:22:02', '2018-07-24 08:22:02'),
(44, 28, 2, '2018-07-24 08:22:30', '2018-07-24 08:22:30'),
(45, 28, 22, '2018-07-24 08:22:30', '2018-07-24 08:22:30'),
(47, 31, 3, '2018-07-24 08:24:21', '2018-07-24 08:24:21'),
(48, 32, 3, '2018-07-24 08:25:21', '2018-07-24 08:25:21'),
(49, 33, 2, '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(50, 33, 8, '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(51, 33, 13, '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(52, 33, 22, '2018-07-24 08:29:41', '2018-07-24 08:29:41'),
(53, 27, 22, '2018-07-24 08:33:49', '2018-07-24 08:33:49'),
(54, 34, 8, '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(55, 34, 13, '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(56, 34, 20, '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(57, 34, 22, '2018-07-24 08:36:49', '2018-07-24 08:36:49'),
(58, 35, 10, '2018-07-24 08:38:40', '2018-07-24 08:38:40'),
(59, 36, 2, '2018-07-24 08:42:08', '2018-07-24 08:42:08'),
(60, 36, 8, '2018-07-24 08:42:08', '2018-07-24 08:42:08'),
(61, 36, 13, '2018-07-24 08:42:08', '2018-07-24 08:42:08'),
(62, 36, 20, '2018-07-24 08:42:08', '2018-07-24 08:42:08'),
(64, 38, 12, '2018-07-24 08:51:55', '2018-07-24 08:51:55'),
(65, 39, 12, '2018-07-24 08:52:33', '2018-07-24 08:52:33'),
(66, 40, 4, '2018-07-24 08:54:53', '2018-07-24 08:54:53'),
(67, 41, 17, '2018-07-24 09:03:31', '2018-07-24 09:03:31'),
(68, 42, 17, '2018-07-24 09:04:18', '2018-07-24 09:04:18'),
(69, 14, 5, '2018-07-24 09:10:33', '2018-07-24 09:10:33'),
(70, 43, 23, '2018-07-24 09:11:41', '2018-07-24 09:11:41'),
(71, 44, 23, '2018-07-24 09:12:32', '2018-07-24 09:12:32'),
(75, 47, 8, '2018-07-24 09:19:58', '2018-07-24 09:19:58'),
(76, 47, 13, '2018-07-24 09:19:58', '2018-07-24 09:19:58'),
(77, 16, 6, '2018-07-24 09:23:32', '2018-07-24 09:23:32'),
(78, 48, 5, '2018-07-24 09:27:41', '2018-07-24 09:27:41'),
(80, 50, 26, '2018-07-24 09:35:50', '2018-07-24 09:35:50'),
(82, 51, 5, '2018-07-24 09:43:30', '2018-07-24 09:43:30'),
(84, 49, 5, '2018-07-24 10:44:21', '2018-07-24 10:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit__types`
--

CREATE TABLE `unit__types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit__types`
--

INSERT INTO `unit__types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'flat', NULL, NULL),
(2, 'villa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_positions`
--

CREATE TABLE `user_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_positions`
--

INSERT INTO `user_positions` (`id`, `position_id`, `user_id`, `created_at`, `updated_at`) VALUES
(40, 14, 11, '2018-07-24 10:03:17', '2018-07-24 10:03:17'),
(41, 5, 11, '2018-07-24 10:03:17', '2018-07-24 10:03:17'),
(49, 21, 14, '2018-07-24 10:06:06', '2018-07-24 10:06:06'),
(50, 22, 14, '2018-07-24 10:06:06', '2018-07-24 10:06:06'),
(80, 2, 7, '2018-07-25 21:47:38', '2018-07-25 21:47:38'),
(91, 10, 13, '2018-07-25 21:47:48', '2018-07-25 21:47:48'),
(92, 24, 13, '2018-07-25 21:47:48', '2018-07-25 21:47:48'),
(94, 2, 8, '2018-07-25 21:47:53', '2018-07-25 21:47:53'),
(98, 16, 20, '2018-07-25 21:48:10', '2018-07-25 21:48:10'),
(99, 1, 16, '2018-07-25 21:48:14', '2018-07-25 21:48:14'),
(100, 16, 16, '2018-07-25 21:48:14', '2018-07-25 21:48:14'),
(101, 17, 16, '2018-07-25 21:48:14', '2018-07-25 21:48:14'),
(102, 16, 12, '2018-07-25 21:48:16', '2018-07-25 21:48:16'),
(103, 12, 12, '2018-07-25 21:48:16', '2018-07-25 21:48:16'),
(104, 27, 12, '2018-07-25 21:48:16', '2018-07-25 21:48:16'),
(105, 32, 18, '2018-07-25 21:48:23', '2018-07-25 21:48:23'),
(106, 2, 17, '2018-07-25 21:48:26', '2018-07-25 21:48:26'),
(107, 23, 17, '2018-07-25 21:48:26', '2018-07-25 21:48:26'),
(117, 33, 19, '2018-07-25 21:53:12', '2018-07-25 21:53:12'),
(118, 18, 19, '2018-07-25 21:53:12', '2018-07-25 21:53:12'),
(122, 1, 9, '2018-07-26 02:29:11', '2018-07-26 02:29:11'),
(123, 15, 9, '2018-07-26 02:29:11', '2018-07-26 02:29:11'),
(142, 20, 15, '2018-07-26 02:55:41', '2018-07-26 02:55:41'),
(143, 1, 10, '2018-07-26 17:22:12', '2018-07-26 17:22:12'),
(144, 16, 10, '2018-07-26 17:22:12', '2018-07-26 17:22:12'),
(145, 19, 10, '2018-07-26 17:22:12', '2018-07-26 17:22:12'),
(159, 17, 21, '2018-07-30 12:18:57', '2018-07-30 12:18:57'),
(171, 1, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(172, 15, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(173, 29, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(174, 30, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(175, 2, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(176, 14, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(177, 9, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(178, 11, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(179, 22, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(180, 7, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(181, 18, 4, '2018-08-08 06:56:48', '2018-08-08 06:56:48'),
(182, 32, 2, '2018-08-08 08:44:23', '2018-08-08 08:44:23'),
(183, 9, 2, '2018-08-08 08:44:23', '2018-08-08 08:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `website_user_plans`
--

CREATE TABLE `website_user_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `website_user_id` int(11) DEFAULT NULL,
  `plan_section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_leads` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_user_plans`
--

INSERT INTO `website_user_plans` (`id`, `plan_id`, `website_user_id`, `plan_section`, `plan_title`, `plan_leads`, `plan_price`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Seo Plans', 'Basic', NULL, NULL, '2018-07-15 18:32:32', '2018-07-15 18:32:32'),
(2, NULL, 5, 'Seo Plans', 'Basic', NULL, '00,000 LE', '2018-07-18 10:30:18', '2018-07-18 10:30:18'),
(3, NULL, 5, 'Seo Plans', 'Gold', NULL, '00,000 LE', '2018-07-18 10:31:32', '2018-07-18 10:31:32'),
(4, NULL, 5, 'Seo Plans', 'Platinum', NULL, '00,000 LE', '2018-07-18 10:31:32', '2018-07-18 10:31:32'),
(5, NULL, 5, 'Seo Plans', 'Basic', NULL, '00,000 LE', '2018-07-18 10:32:01', '2018-07-18 10:32:01'),
(6, NULL, 5, 'Seo Plans', 'Silver', NULL, '00,000 LE', '2018-07-18 10:32:01', '2018-07-18 10:32:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_company_id_foreign` (`company_id`);

--
-- Indexes for table `branch__gallaries`
--
ALTER TABLE `branch__gallaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch__gallaries_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `careers_job_id_foreign` (`job_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `companies_moderators`
--
ALTER TABLE `companies_moderators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_moderators_crm_user_id_foreign` (`crm_user_id`),
  ADD KEY `companies_moderators_company_id_foreign` (`company_id`);

--
-- Indexes for table `company__users`
--
ALTER TABLE `company__users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company__users_email_unique` (`email`),
  ADD KEY `company__users_company_id_foreign` (`company_id`),
  ADD KEY `company__users_privlage_id_foreign` (`privlage_id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_quotation_id_foreign` (`quotation_id`);

--
-- Indexes for table `crm_users`
--
ALTER TABLE `crm_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `crm_users_email_unique` (`email`);

--
-- Indexes for table `cron_jobs`
--
ALTER TABLE `cron_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cron_jobs_queue_index` (`queue`);

--
-- Indexes for table `customer_leads`
--
ALTER TABLE `customer_leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_leads_company_id_foreign` (`company_id`),
  ADD KEY `customer_leads_project_id_foreign` (`project_id`),
  ADD KEY `customer_leads_company_user_id_foreign` (`company_user_id`),
  ADD KEY `customer_leads_lead_source_id_foreign` (`lead_source_id`);

--
-- Indexes for table `customer_lead__feedbacks`
--
ALTER TABLE `customer_lead__feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_lead__feedbacks_customer_lead_id_foreign` (`customer_lead_id`),
  ADD KEY `customer_lead__feedbacks_company_user_id_foreign` (`company_user_id`),
  ADD KEY `customer_lead__feedbacks_lead_status_feedback_id_foreign` (`lead_status_feedback_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_potential_id_foreign` (`potential_id`),
  ADD KEY `feedbacks_feedback_form_id_foreign` (`feedback_form_id`);

--
-- Indexes for table `feedback_forms`
--
ALTER TABLE `feedback_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_a_qs_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `image_sliders`
--
ALTER TABLE `image_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `input_names`
--
ALTER TABLE `input_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead__sources`
--
ALTER TABLE `lead__sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead__status__feedbacks`
--
ALTER TABLE `lead__status__feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like__posts`
--
ALTER TABLE `like__posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `look_and_feels`
--
ALTER TABLE `look_and_feels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managements`
--
ALTER TABLE `managements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_feedbacks`
--
ALTER TABLE `meeting_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_feedbacks_company_id_foreign` (`company_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_positions`
--
ALTER TABLE `permission_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_positions_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_positions_position_id_foreign` (`position_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans_histories`
--
ALTER TABLE `plans_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plans_histories_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `plan_services`
--
ALTER TABLE `plan_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_services_plan_id_foreign` (`plan_id`),
  ADD KEY `plan_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `plan_services_histories`
--
ALTER TABLE `plan_services_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_services_histories_plan_history_id_foreign` (`plan_history_id`),
  ADD KEY `plan_services_histories_service_id_foreign` (`service_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_departement_id_foreign` (`departement_id`);

--
-- Indexes for table `post_types`
--
ALTER TABLE `post_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privlages`
--
ALTER TABLE `privlages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilings`
--
ALTER TABLE `profilings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profilings_potential_id_foreign` (`potential_id`),
  ADD KEY `profilings_seo_level_id_foreign` (`seo_level_id`),
  ADD KEY `profilings_sem_level_id_foreign` (`sem_level_id`),
  ADD KEY `profilings_gdn_level_id_foreign` (`gdn_level_id`);

--
-- Indexes for table `profiling_prods`
--
ALTER TABLE `profiling_prods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiling_prods_profiling_id_foreign` (`profiling_id`);

--
-- Indexes for table `profiling_refs`
--
ALTER TABLE `profiling_refs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiling_refs_profiling_id_foreign` (`profiling_id`);

--
-- Indexes for table `profiling_sites`
--
ALTER TABLE `profiling_sites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiling_sites_profiling_id_foreign` (`profiling_id`),
  ADD KEY `profiling_sites_content_id_foreign` (`content_id`),
  ADD KEY `profiling_sites_technology_id_foreign` (`technology_id`),
  ADD KEY `profiling_sites_look_id_foreign` (`look_id`);

--
-- Indexes for table `profiling_socials`
--
ALTER TABLE `profiling_socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiling_socials_profiling_id_foreign` (`profiling_id`),
  ADD KEY `profiling_socials_management_id_foreign` (`management_id`),
  ADD KEY `profiling_socials_post_type_id_foreign` (`post_type_id`),
  ADD KEY `profiling_socials_promote_status_id_foreign` (`promote_status_id`),
  ADD KEY `profiling_socials_content_id_foreign` (`content_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_company_id_foreign` (`company_id`);

--
-- Indexes for table `project__gallaries`
--
ALTER TABLE `project__gallaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project__gallaries_project_id_foreign` (`project_id`);

--
-- Indexes for table `project__unit__types`
--
ALTER TABLE `project__unit__types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project__unit__types_unit_type_id_foreign` (`unit_type_id`),
  ADD KEY `project__unit__types_project_id_foreign` (`project_id`);

--
-- Indexes for table `promote_statuses`
--
ALTER TABLE `promote_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_departement_id_foreign` (`departement_id`),
  ADD KEY `proposals_quotation_id_foreign` (`quotation_id`);

--
-- Indexes for table `questions__categories`
--
ALTER TABLE `questions__categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotations_company_id_foreign` (`company_id`);

--
-- Indexes for table `quotation_services`
--
ALTER TABLE `quotation_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_services_service_id_foreign` (`service_id`),
  ADD KEY `quotation_services_quotation_id_foreign` (`quotation_id`);

--
-- Indexes for table `quotation_service_quantities`
--
ALTER TABLE `quotation_service_quantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_service_quantities_quotation_id_foreign` (`quotation_id`),
  ADD KEY `quotation_service_quantities_service_id_foreign` (`service_id`);

--
-- Indexes for table `quotation_service_quantity_comments`
--
ALTER TABLE `quotation_service_quantity_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_service_quantity_comments_q_q_s_id_foreign` (`q_q_s_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role__privlages`
--
ALTER TABLE `role__privlages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role__privlages_role_id_foreign` (`role_id`),
  ADD KEY `role__privlages_privlage_id_foreign` (`privlage_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_tasks`
--
ALTER TABLE `service_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_tasks_task_id_foreign` (`task_id`),
  ADD KEY `service_tasks_service_id_foreign` (`service_id`);

--
-- Indexes for table `share__posts`
--
ALTER TABLE `share__posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_position_id_foreign` (`position_id`),
  ADD KEY `tasks_service_id_foreign` (`service_id`);

--
-- Indexes for table `task_approve_comments`
--
ALTER TABLE `task_approve_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_approve_comments_task_assign_id_foreign` (`task_assign_id`),
  ADD KEY `task_approve_comments_user_decline_id_foreign` (`user_decline_id`);

--
-- Indexes for table `task_assigns`
--
ALTER TABLE `task_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_assigns_task_id_foreign` (`task_id`),
  ADD KEY `task_assigns_user_id_foreign` (`user_id`),
  ADD KEY `task_assigns_quotation_id_foreign` (`quotation_id`),
  ADD KEY `task_assigns_service_id_foreign` (`service_id`),
  ADD KEY `task_assigns_q_q_s_id_foreign` (`q_q_s_id`);

--
-- Indexes for table `task_executions`
--
ALTER TABLE `task_executions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_executions_task_assign_id_foreign` (`task_assign_id`);

--
-- Indexes for table `task_inputs`
--
ALTER TABLE `task_inputs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_inputs_task_id_foreign` (`task_id`),
  ADD KEY `task_inputs_input_name_id_foreign` (`input_name_id`);

--
-- Indexes for table `task_positions`
--
ALTER TABLE `task_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_positions_task_id_foreign` (`task_id`),
  ADD KEY `task_positions_position_id_foreign` (`position_id`);

--
-- Indexes for table `task_services`
--
ALTER TABLE `task_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_services_task_id_foreign` (`task_id`),
  ADD KEY `task_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit__types`
--
ALTER TABLE `unit__types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_positions`
--
ALTER TABLE `user_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_positions_position_id_foreign` (`position_id`),
  ADD KEY `user_positions_user_id_foreign` (`user_id`);

--
-- Indexes for table `website_user_plans`
--
ALTER TABLE `website_user_plans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch__gallaries`
--
ALTER TABLE `branch__gallaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `companies_moderators`
--
ALTER TABLE `companies_moderators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company__users`
--
ALTER TABLE `company__users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `crm_users`
--
ALTER TABLE `crm_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cron_jobs`
--
ALTER TABLE `cron_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_leads`
--
ALTER TABLE `customer_leads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `customer_lead__feedbacks`
--
ALTER TABLE `customer_lead__feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `feedback_forms`
--
ALTER TABLE `feedback_forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_sliders`
--
ALTER TABLE `image_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `input_names`
--
ALTER TABLE `input_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead__sources`
--
ALTER TABLE `lead__sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lead__status__feedbacks`
--
ALTER TABLE `lead__status__feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like__posts`
--
ALTER TABLE `like__posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `look_and_feels`
--
ALTER TABLE `look_and_feels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managements`
--
ALTER TABLE `managements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_feedbacks`
--
ALTER TABLE `meeting_feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `permission_positions`
--
ALTER TABLE `permission_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plans_histories`
--
ALTER TABLE `plans_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan_services`
--
ALTER TABLE `plan_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan_services_histories`
--
ALTER TABLE `plan_services_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post_types`
--
ALTER TABLE `post_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privlages`
--
ALTER TABLE `privlages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profilings`
--
ALTER TABLE `profilings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profiling_prods`
--
ALTER TABLE `profiling_prods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profiling_refs`
--
ALTER TABLE `profiling_refs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiling_sites`
--
ALTER TABLE `profiling_sites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiling_socials`
--
ALTER TABLE `profiling_socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project__gallaries`
--
ALTER TABLE `project__gallaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project__unit__types`
--
ALTER TABLE `project__unit__types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `promote_statuses`
--
ALTER TABLE `promote_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `questions__categories`
--
ALTER TABLE `questions__categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `quotation_services`
--
ALTER TABLE `quotation_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `quotation_service_quantities`
--
ALTER TABLE `quotation_service_quantities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `quotation_service_quantity_comments`
--
ALTER TABLE `quotation_service_quantity_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role__privlages`
--
ALTER TABLE `role__privlages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `service_tasks`
--
ALTER TABLE `service_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `share__posts`
--
ALTER TABLE `share__posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `task_approve_comments`
--
ALTER TABLE `task_approve_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `task_assigns`
--
ALTER TABLE `task_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `task_executions`
--
ALTER TABLE `task_executions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `task_inputs`
--
ALTER TABLE `task_inputs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `task_positions`
--
ALTER TABLE `task_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `task_services`
--
ALTER TABLE `task_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit__types`
--
ALTER TABLE `unit__types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_positions`
--
ALTER TABLE `user_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `website_user_plans`
--
ALTER TABLE `website_user_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`);

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `branch__gallaries`
--
ALTER TABLE `branch__gallaries`
  ADD CONSTRAINT `branch__gallaries_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `careers_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`);

--
-- Constraints for table `companies_moderators`
--
ALTER TABLE `companies_moderators`
  ADD CONSTRAINT `companies_moderators_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `companies_moderators_crm_user_id_foreign` FOREIGN KEY (`crm_user_id`) REFERENCES `crm_users` (`id`);

--
-- Constraints for table `company__users`
--
ALTER TABLE `company__users`
  ADD CONSTRAINT `company__users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `company__users_privlage_id_foreign` FOREIGN KEY (`privlage_id`) REFERENCES `privlages` (`id`);

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`);

--
-- Constraints for table `customer_leads`
--
ALTER TABLE `customer_leads`
  ADD CONSTRAINT `customer_leads_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `customer_leads_company_user_id_foreign` FOREIGN KEY (`company_user_id`) REFERENCES `company__users` (`id`),
  ADD CONSTRAINT `customer_leads_lead_source_id_foreign` FOREIGN KEY (`lead_source_id`) REFERENCES `lead__sources` (`id`),
  ADD CONSTRAINT `customer_leads_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `customer_lead__feedbacks`
--
ALTER TABLE `customer_lead__feedbacks`
  ADD CONSTRAINT `customer_lead__feedbacks_company_user_id_foreign` FOREIGN KEY (`company_user_id`) REFERENCES `company__users` (`id`),
  ADD CONSTRAINT `customer_lead__feedbacks_customer_lead_id_foreign` FOREIGN KEY (`customer_lead_id`) REFERENCES `customer_leads` (`id`),
  ADD CONSTRAINT `customer_lead__feedbacks_lead_status_feedback_id_foreign` FOREIGN KEY (`lead_status_feedback_id`) REFERENCES `lead__status__feedbacks` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_feedback_form_id_foreign` FOREIGN KEY (`feedback_form_id`) REFERENCES `feedback_forms` (`id`),
  ADD CONSTRAINT `feedbacks_potential_id_foreign` FOREIGN KEY (`potential_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  ADD CONSTRAINT `f_a_qs_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `questions__categories` (`id`);

--
-- Constraints for table `meeting_feedbacks`
--
ALTER TABLE `meeting_feedbacks`
  ADD CONSTRAINT `meeting_feedbacks_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `permission_positions`
--
ALTER TABLE `permission_positions`
  ADD CONSTRAINT `permission_positions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_positions_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);

--
-- Constraints for table `plans_histories`
--
ALTER TABLE `plans_histories`
  ADD CONSTRAINT `plans_histories_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`);

--
-- Constraints for table `plan_services`
--
ALTER TABLE `plan_services`
  ADD CONSTRAINT `plan_services_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `plan_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `plan_services_histories`
--
ALTER TABLE `plan_services_histories`
  ADD CONSTRAINT `plan_services_histories_plan_history_id_foreign` FOREIGN KEY (`plan_history_id`) REFERENCES `plans_histories` (`id`),
  ADD CONSTRAINT `plan_services_histories_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `profilings`
--
ALTER TABLE `profilings`
  ADD CONSTRAINT `profilings_potential_id_foreign` FOREIGN KEY (`potential_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `profiling_prods`
--
ALTER TABLE `profiling_prods`
  ADD CONSTRAINT `profiling_prods_profiling_id_foreign` FOREIGN KEY (`profiling_id`) REFERENCES `profilings` (`id`);

--
-- Constraints for table `profiling_refs`
--
ALTER TABLE `profiling_refs`
  ADD CONSTRAINT `profiling_refs_profiling_id_foreign` FOREIGN KEY (`profiling_id`) REFERENCES `profilings` (`id`);

--
-- Constraints for table `profiling_sites`
--
ALTER TABLE `profiling_sites`
  ADD CONSTRAINT `profiling_sites_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`),
  ADD CONSTRAINT `profiling_sites_look_id_foreign` FOREIGN KEY (`look_id`) REFERENCES `look_and_feels` (`id`),
  ADD CONSTRAINT `profiling_sites_profiling_id_foreign` FOREIGN KEY (`profiling_id`) REFERENCES `profilings` (`id`),
  ADD CONSTRAINT `profiling_sites_technology_id_foreign` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`);

--
-- Constraints for table `profiling_socials`
--
ALTER TABLE `profiling_socials`
  ADD CONSTRAINT `profiling_socials_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`),
  ADD CONSTRAINT `profiling_socials_management_id_foreign` FOREIGN KEY (`management_id`) REFERENCES `managements` (`id`),
  ADD CONSTRAINT `profiling_socials_post_type_id_foreign` FOREIGN KEY (`post_type_id`) REFERENCES `post_types` (`id`),
  ADD CONSTRAINT `profiling_socials_profiling_id_foreign` FOREIGN KEY (`profiling_id`) REFERENCES `profilings` (`id`),
  ADD CONSTRAINT `profiling_socials_promote_status_id_foreign` FOREIGN KEY (`promote_status_id`) REFERENCES `promote_statuses` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `project__gallaries`
--
ALTER TABLE `project__gallaries`
  ADD CONSTRAINT `project__gallaries_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `project__unit__types`
--
ALTER TABLE `project__unit__types`
  ADD CONSTRAINT `project__unit__types_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project__unit__types_unit_type_id_foreign` FOREIGN KEY (`unit_type_id`) REFERENCES `unit__types` (`id`);

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `proposals_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`);

--
-- Constraints for table `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `quotations_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `quotation_services`
--
ALTER TABLE `quotation_services`
  ADD CONSTRAINT `quotation_services_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`),
  ADD CONSTRAINT `quotation_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `quotation_service_quantities`
--
ALTER TABLE `quotation_service_quantities`
  ADD CONSTRAINT `quotation_service_quantities_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`),
  ADD CONSTRAINT `quotation_service_quantities_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `quotation_service_quantity_comments`
--
ALTER TABLE `quotation_service_quantity_comments`
  ADD CONSTRAINT `quotation_service_quantity_comments_q_q_s_id_foreign` FOREIGN KEY (`q_q_s_id`) REFERENCES `quotation_service_quantities` (`id`);

--
-- Constraints for table `role__privlages`
--
ALTER TABLE `role__privlages`
  ADD CONSTRAINT `role__privlages_privlage_id_foreign` FOREIGN KEY (`privlage_id`) REFERENCES `privlages` (`id`),
  ADD CONSTRAINT `role__privlages_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `service_tasks`
--
ALTER TABLE `service_tasks`
  ADD CONSTRAINT `service_tasks_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `service_tasks_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `tasks_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `task_approve_comments`
--
ALTER TABLE `task_approve_comments`
  ADD CONSTRAINT `task_approve_comments_task_assign_id_foreign` FOREIGN KEY (`task_assign_id`) REFERENCES `task_assigns` (`id`),
  ADD CONSTRAINT `task_approve_comments_user_decline_id_foreign` FOREIGN KEY (`user_decline_id`) REFERENCES `crm_users` (`id`);

--
-- Constraints for table `task_assigns`
--
ALTER TABLE `task_assigns`
  ADD CONSTRAINT `task_assigns_q_q_s_id_foreign` FOREIGN KEY (`q_q_s_id`) REFERENCES `quotation_service_quantities` (`id`),
  ADD CONSTRAINT `task_assigns_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`),
  ADD CONSTRAINT `task_assigns_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `task_assigns_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `task_assigns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `crm_users` (`id`);

--
-- Constraints for table `task_executions`
--
ALTER TABLE `task_executions`
  ADD CONSTRAINT `task_executions_task_assign_id_foreign` FOREIGN KEY (`task_assign_id`) REFERENCES `task_assigns` (`id`);

--
-- Constraints for table `task_inputs`
--
ALTER TABLE `task_inputs`
  ADD CONSTRAINT `task_inputs_input_name_id_foreign` FOREIGN KEY (`input_name_id`) REFERENCES `input_names` (`id`),
  ADD CONSTRAINT `task_inputs_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `task_positions`
--
ALTER TABLE `task_positions`
  ADD CONSTRAINT `task_positions_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `task_positions_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `task_services`
--
ALTER TABLE `task_services`
  ADD CONSTRAINT `task_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `task_services_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Constraints for table `user_positions`
--
ALTER TABLE `user_positions`
  ADD CONSTRAINT `user_positions_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `user_positions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `crm_users` (`id`);
