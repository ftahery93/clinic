-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2019 at 05:34 PM
-- Server version: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.1.29-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vavisa_aaraa`
--

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_application_users`
--

CREATE TABLE `aaraa_application_users` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Male, Female',
  `age` int(4) DEFAULT NULL,
  `terms_conditions` tinyint(1) NOT NULL,
  `notification` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_application_users`
--

INSERT INTO `aaraa_application_users` (`id`, `name`, `email`, `password`, `photo`, `gender`, `age`, `terms_conditions`, `notification`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('031d14b4-e222-4bde-a770-b44fcaeba49f', 'Mohammed Jhosawa', 'mjhosawa@vavisa-kw.com', '$2y$10$jQg45nn0SAHlFQsAanw/bOQWak/yIHvUO41ShjS41/AXqiTG35tEG', '', 'Male', 24, 1, 1, 1, NULL, '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-13 09:30:38', '2019-06-16 05:34:53'),
('335e6aeb-91c4-11e9-bb87-8cec4ba57079', 'Carla ', 'carla@vavisa-kw.com', '*89FA6EAF8B6264AC8D6E84759027252505A3EAEE', '', 'Female', 28, 1, 1, 1, NULL, '', '2019-06-13 09:30:38', '2019-06-16 05:34:53'),
('354db5ef-08a9-4024-870b-936013820508', 'Hashim Sagir', 'hashim@vavisa-kw.com', '$2y$10$VSVpGqcM24hsozVE1rOIMuNokvvfiEsJuanQ1NnUmqn7czypSp9T2', '', 'M', 33, 1, 1, 1, NULL, NULL, '2019-06-19 13:19:43', '2019-06-19 13:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_application_users_category`
--

CREATE TABLE `aaraa_application_users_category` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_users_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_application_users_category`
--

INSERT INTO `aaraa_application_users_category` (`id`, `category_id`, `application_users_id`, `created_at`, `updated_at`) VALUES
('', 'c5a31d68-9337-11e9-bb87-8cec4ba57079', '031d14b4-e222-4bde-a770-b44fcaeba49f', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_application_users_password_resets`
--

CREATE TABLE `aaraa_application_users_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_application_users_password_resets`
--

INSERT INTO `aaraa_application_users_password_resets` (`email`, `token`, `created_at`) VALUES
('mjhosawa@vavisa-kw.com', '$2y$10$WktlukYUgv3mPoxFG8heZu6a8ZrRRRTo2z1k8eWZtpEyE5060ZiTq', '2019-06-24 11:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_application_users_poll`
--

CREATE TABLE `aaraa_application_users_poll` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_users_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_application_users_poll`
--

INSERT INTO `aaraa_application_users_poll` (`id`, `poll_id`, `application_users_id`, `created_at`, `updated_at`) VALUES
('e75ae868-fb86-4221-9b38-0df2fa448caa', '1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-20 07:44:23', '2019-06-20 07:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_categories`
--

CREATE TABLE `aaraa_categories` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci,
  `title_en` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_categories`
--

INSERT INTO `aaraa_categories` (`id`, `title_ar`, `title_en`, `photo`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'فنون', 'Arts', '14889022842486.jpg', 1, '27', '27', '2019-06-11 20:36:00', '2019-06-11 20:36:00'),
('b448a332-9337-11e9-bb87-8cec4ba57079', 'يسافر', 'Travels', '14889022842486.jpg', 1, '27', '27', '2019-06-11 20:36:00', '2019-06-11 20:36:00'),
('c5a31d68-9337-11e9-bb87-8cec4ba57079', 'اعمال', 'Business', '14889022842486.jpg', 1, '27', '27', '2019-06-11 20:36:00', '2019-06-11 20:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_category_poll`
--

CREATE TABLE `aaraa_category_poll` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_category_poll`
--

INSERT INTO `aaraa_category_poll` (`id`, `poll_id`, `category_id`, `created_at`, `updated_at`) VALUES
('09c8a998-3f73-4129-995a-ac04bc732d4a', '92588104-3c5e-4e77-90dc-f1d3a377d1b8', '1', '2019-06-16 16:54:59', '2019-06-16 16:54:59'),
('0dcb3b05-ba89-45bb-bb81-5c689a82e0df', '846489c3-37de-4a39-817f-86083cb3140e', '1', '2019-06-18 05:23:10', '2019-06-18 05:23:10'),
('17e9c8aa-37be-49a2-a3e3-966a35ebd32a', '244dd386-b7e1-440e-a9a5-4a8589fce177', '1', '2019-06-16 16:57:40', '2019-06-16 16:57:40'),
('1c992019-ae76-4fd5-8f98-6cf2341647c6', '9356d484-8fd8-4f4d-a517-fd7bb4b46369', '1', '2019-06-16 16:58:50', '2019-06-16 16:58:50'),
('37ee2002-0a5a-40df-b038-4d8b76aa26c8', '56fce4c7-9860-4ad3-a264-3f546a490da4', '1', '2019-06-18 11:54:29', '2019-06-18 11:54:29'),
('6ff8d496-d778-4dec-a460-9cb074c16841', '8757daf5-f68e-463b-a39c-2c46d331f8db', '1', '2019-06-16 16:45:43', '2019-06-16 16:45:43'),
('71bf1c15-e9ac-4f0e-b98f-c1959f85c868', '7017a944-d280-417a-8b36-ea8790003af5', '1', '2019-06-16 16:47:02', '2019-06-16 16:47:02'),
('78e036f6-a1c2-4358-8f17-2434b71d763e', '9524e140-9e95-4417-b96e-5db73a8d5b90', '1', '2019-06-16 16:45:29', '2019-06-16 16:45:29'),
('844a2991-3577-44de-93c7-796cdd92c53f', 'c7c5c6aa-294b-4625-b679-68901bdf1992', '1', '2019-06-16 16:44:04', '2019-06-16 16:44:04'),
('949569f9-8f7e-4891-8347-a01ef93afbb5', 'd8d5c159-d683-412a-89ee-c70ca21e44c4', '1', '2019-06-16 16:32:50', '2019-06-16 16:32:50'),
('9833ab50-02d4-46bd-8f00-bcfdc5024c82', '84b46d74-c1af-436c-b236-2f3b844bf659', '1', '2019-06-16 16:42:40', '2019-06-16 16:42:40'),
('9a57beee-2692-4375-9ab6-604e6fcef417', '932c08db-3355-4a7c-87c9-489503b7ac7c', '1', '2019-06-16 17:00:01', '2019-06-16 17:00:01'),
('a1e54d9f-c501-4939-aa9e-0d1e5585330a', '3d76cd1f-2529-499b-9419-1608bf03689e', '1', '2019-06-16 16:38:29', '2019-06-16 16:38:29'),
('aa528052-ab2c-4ad3-bb5f-6ba39a6b57bb', 'fe9d2dec-4fe2-44ff-b043-983a5f1552a5', '1', '2019-06-16 16:48:55', '2019-06-16 16:48:55'),
('b60de1e4-f877-4632-a4b9-9a2c6546a512', 'a573d145-095d-4dd7-8372-e6596f13bccb', '1', '2019-06-16 16:51:32', '2019-06-16 16:51:32'),
('ba44e78a-e761-4446-a038-89ad4afcd18d', 'd21c70cf-4c4f-4e88-a12e-091829ca677e', '1', '2019-06-18 05:58:24', '2019-06-18 05:58:24'),
('bb84b3d6-8c0b-4fa6-92ed-f8e490734d0e', '205a627b-3135-47b7-b924-41cadc02d7fb', '1', '2019-06-16 17:30:15', '2019-06-16 17:30:15'),
('bcd990b8-f695-465f-9d38-5e0c28670f35', '1cdd4bc5-1195-4309-b52e-6afeab837c78', '1', '2019-06-16 16:46:34', '2019-06-16 16:46:34'),
('bf7e77c4-aec7-4e63-a596-90a0bb928fb6', 'a2ff7e79-3d5e-4378-866e-262a2f3f51bc', '1', '2019-06-18 05:23:42', '2019-06-18 05:23:42'),
('c9f33d6f-24c9-4682-8739-2cc60549a7d3', '6c621270-0c59-493d-85ac-0d6b1a347c7c', '1', '2019-06-18 12:25:22', '2019-06-18 12:25:22'),
('ea881fcb-b5cf-49b4-a02b-156366edccc3', 'd2ac42e9-7a25-4e3d-9931-f7def8c04634', '1', '2019-06-16 16:58:29', '2019-06-16 16:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_comments`
--

CREATE TABLE `aaraa_comments` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_comments`
--

INSERT INTO `aaraa_comments` (`id`, `date`, `comment`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', '2017-03-06 15:55:21', 'Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti.', NULL, NULL, '2017-03-06 13:55:21', '2017-03-06 13:55:21'),
('2', '2017-03-06 15:55:59', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.', NULL, NULL, '2017-03-06 13:55:59', '2017-03-06 13:55:59'),
('3e5f0c7f-ac77-4ebe-bd27-0809483c46db', '2019-06-16 23:33:48', 'No more options to these polls', 31, 31, '2019-06-16 18:03:48', '2019-06-16 18:03:48'),
('66d9a14c-ca0c-4241-94e0-5a8382f43e88', '2019-06-20 10:48:34', 'Test Comment', 31, 31, '2019-06-20 07:48:34', '2019-06-20 07:48:34'),
('802e3764-4472-41e4-93fc-f36a16477474', '2019-06-17 11:58:36', 'Test Comment', 31, 31, '2019-06-17 08:58:36', '2019-06-17 08:58:36'),
('dbe04979-ac3c-444d-9542-2dbe0c397c5a', '2019-06-16 23:29:20', 'Hi there! This is just a comment', 31, 31, '2019-06-16 17:59:20', '2019-06-16 17:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_comment_poll`
--

CREATE TABLE `aaraa_comment_poll` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_comment_poll`
--

INSERT INTO `aaraa_comment_poll` (`id`, `poll_id`, `comment_id`, `created_at`, `updated_at`) VALUES
('1', '1', '1', '2019-06-16 18:30:00', '2019-06-16 18:30:00'),
('6968da42-5820-4931-ab23-2eebe75bd07f', '1', 'dbe04979-ac3c-444d-9542-2dbe0c397c5a', '2019-06-16 17:59:20', '2019-06-16 17:59:20'),
('39edf504-3fc9-462c-acaf-6553ab4b112e', '1', '3e5f0c7f-ac77-4ebe-bd27-0809483c46db', '2019-06-16 18:03:49', '2019-06-16 18:03:49'),
('c0e9b48d-944f-4005-a76d-fa77868ea0ec', '1', '802e3764-4472-41e4-93fc-f36a16477474', '2019-06-17 08:58:36', '2019-06-17 08:58:36'),
('2460b479-dc38-4759-9407-cd4b39cf6e46', '1', '66d9a14c-ca0c-4241-94e0-5a8382f43e88', '2019-06-20 07:48:34', '2019-06-20 07:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_countries`
--

CREATE TABLE `aaraa_countries` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_countries`
--

INSERT INTO `aaraa_countries` (`id`, `code`, `title_ar`, `title_en`, `photo`, `tel`, `sort_order`, `created_at`, `updated_at`) VALUES
('103', 'KW', 'الكويت', 'Kuwait', '14889022842486.jpg', '965', 1, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('104', 'KG', 'قيرغيزستان', 'Kyrgyzstan', NULL, '996', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('105', 'LV', 'لاتفيا', 'Latvia', NULL, '371', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('106', 'LB', 'لبنان', 'Lebanon', NULL, '961', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('107', 'LS', 'ليسوتو', 'Lesotho', NULL, '266', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('108', 'LR', 'ليبيريا', 'Liberia', NULL, '231', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('109', 'LY', 'ليبيا', 'Libya', NULL, '218', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('11', 'AT', 'النمسا', 'Austria', NULL, '43', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('110', 'LI', 'ليشتنشتاين', 'Liechtenstein', NULL, '423', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('111', 'LT', 'ليتوانيا', 'Lithuania', NULL, '370', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('112', 'LU', 'لوكسمبورغ', 'Luxembourg', NULL, '352', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('113', 'MK', 'مقدونيا، جمهورية', 'Macedonia', NULL, '389', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('114', 'MG', 'مدغشقر', 'Madagascar', NULL, '261', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('115', 'MW', 'ملاوي', 'Malawi', NULL, '265', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('116', 'MY', 'ماليزيا', 'Malaysia', NULL, '60', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('117', 'MV', 'جزر المالديف', 'Maldives', NULL, '960', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('118', 'ML', 'مالي', 'Mali', NULL, '223', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('119', 'MT', 'مالطا', 'Malta', NULL, '356', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('12', 'AZ', 'أذربيجان', 'Azerbaijan', NULL, '994', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('120', 'MH', 'جزر مارشال', 'Marshall Islands', NULL, '692', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('121', 'MR', 'موريتانيا', 'Mauritania', NULL, '222', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('122', 'MU', 'موريشيوس', 'Mauritius', NULL, '230', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('123', 'YT', 'مايوت', 'Mayotte', NULL, '262', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('124', 'MX', 'المكسيك', 'Mexico', NULL, '52', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('125', 'FM', 'ولايات ميكرونيزيا الموحدة', 'Micronesia', NULL, '691', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('126', 'MD', 'مولدوفا', 'Moldova', NULL, '373', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('127', 'MC', 'موناكو', 'Monaco', NULL, '377', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('128', 'MN', 'منغوليا', 'Mongolia', NULL, '976', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('129', 'ME', 'الجبل الأسود', 'Montenegro', NULL, '382', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('13', 'BS', 'جزر البهاما', 'Bahamas', NULL, '1-242', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('130', 'MS', 'مونتسيرات', 'Montserrat', NULL, '1-664', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('131', 'MA', 'المغرب', 'Morocco', NULL, '212', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('132', 'MZ', 'موزمبيق', 'Mozambique', NULL, '258', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('133', 'MM', 'ميانمار', 'Myanmar', NULL, '95', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('134', 'NA', 'ناميبيا', 'Namibia', NULL, '264', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('135', 'NR', 'ناورو', 'Nauru', NULL, '674', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('136', 'NP', 'نيبال', 'Nepal', NULL, '977', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('137', 'NL', 'هولندا', 'Netherlands', NULL, '31', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('138', 'AN', 'جزر الأنتيل الهولندية', 'Netherlands Antilles', NULL, '599', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('139', 'NC', 'كاليدونيا الجديدة', 'New Caledonia', NULL, '687', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('14', 'BH', 'البحرين', 'Bahrain', NULL, '973', 2, '2017-11-08 13:25:54', '2019-06-23 14:44:50'),
('140', 'NZ', 'نيوزيلندا', 'New Zealand', NULL, '64', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('141', 'NI', 'نيكاراغوا', 'Nicaragua', NULL, '505', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('142', 'NE', 'النيجر', 'Niger', NULL, '227', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('143', 'NG', 'نيجيريا', 'Nigeria', NULL, '234', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('144', 'NU', 'نيوي', 'Niue', NULL, '683', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('145', 'NO', 'النرويج', 'Norway', NULL, '47', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('146', 'OM', 'عمان', 'Oman', NULL, '968', 3, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('147', 'PK', 'باكستان', 'Pakistan', NULL, '92', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('148', 'PW', 'بالاو', 'Palau', NULL, '680', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('149', 'PS', 'فلسطين', 'Palestinian', NULL, '972', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('15', 'BD', 'بنغلاديش', 'Bangladesh', NULL, '880', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('150', 'PA', 'بناما', 'Panama', NULL, '507', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('151', 'PY', 'باراغواي', 'Paraguay', NULL, '595', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('152', 'PE', 'بيرو', 'Peru', NULL, '51', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('153', 'PH', 'الفلبين', 'Philippines', NULL, '63', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('154', 'PN', 'بيتكيرن', 'Pitcairn', NULL, '870', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('155', 'PL', 'بولندا', 'Poland', NULL, '48', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('156', 'PT', 'البرتغال', 'Portugal', NULL, '351', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('157', 'PR', 'بويرتو ريكو', 'Puerto Rico', NULL, '1-787', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('158', 'QA', 'قطر', 'Qatar', NULL, '974', 4, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('159', 'RO', 'رومانيا', 'Romania', NULL, '40', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('16', 'BB', 'بربادوس', 'Barbados', NULL, '1-246', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('160', 'RU', 'الفيدرالية الروسية', 'Russian Federation', NULL, '7', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('161', 'RW', 'رواندا', 'Rwanda', NULL, '250', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('162', 'SH', 'سانت هيلينا', 'Saint Helena', NULL, '290', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('163', 'KN', 'سانت كيتس ونيفيس', 'Saint Kitts and Nevis', NULL, '1-869', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('164', 'LC', 'سانت لوسيا', 'Saint Lucia', NULL, '1-758', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('165', 'PM', 'سان بيار وميكلون', 'Saint Pierre and Miquelon', NULL, '508', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('166', 'VC', 'سانت فنسنت وجزر غرينادين', 'Saint Vincent and Grenadines', NULL, '1-784', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('167', 'WS', 'ساموا', 'Samoa', NULL, '685', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('168', 'SM', 'سان مارينو', 'San Marino', NULL, '378', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('169', 'ST', 'ساو تومي وبرينسيبي', 'Sao Tome and Principe', NULL, '239', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('17', 'BY', 'روسيا البيضاء', 'Belarus', NULL, '375', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('170', 'SA', 'المملكة العربية السعودية', 'Saudi Arabia', NULL, '966', 5, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('171', 'SN', 'السنغال', 'Senegal', NULL, '221', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('172', 'RS', 'صربيا', 'Serbia', NULL, '381', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('173', 'SC', 'سيشيل', 'Seychelles', NULL, '248', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('174', 'SL', 'سيرا ليون', 'Sierra Leone', NULL, '232', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('175', 'SG', 'سنغافورة', 'Singapore', NULL, '65', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('176', 'SK', 'سلوفاكيا', 'Slovakia', NULL, '421', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('1767cbf6-f79b-4ecd-8be9-1e6194709044', 'KZ', 'كازاخستان', 'Kazakhstan', NULL, '7', 0, '2017-11-08 13:25:54', '2019-06-26 10:50:21'),
('177', 'SI', 'سلوفينيا', 'Slovenia', NULL, '386', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('178', 'SB', 'جزر سليمان', 'Solomon Islands', NULL, '677', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('179', 'SO', 'الصومال', 'Somalia', NULL, '252', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('18', 'BE', 'بلجيكا', 'Belgium', NULL, '32', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('180', 'ZA', 'جنوب أفريقيا', 'South Africa', NULL, '27', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('181', 'ES', 'إسبانيا', 'Spain', NULL, '34', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('182', 'LK', 'سيريلانكا', 'Sri Lanka', NULL, '94', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('183', 'SD', 'السودان', 'Sudan', NULL, '249', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('184', 'SR', 'سورينام', 'Suriname', NULL, '597', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('185', 'SJ', 'جزر سفالبارد وجان ماين', 'Svalbard and Jan Mayen Islands', NULL, '47', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('186', 'SZ', 'سوازيلاند', 'Swaziland', NULL, '268', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('187', 'SE', 'السويد', 'Sweden', NULL, '46', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('188', 'CH', 'سويسرا', 'Switzerland', NULL, '41', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('189', 'SY', 'سوريا', 'Syrian Arab Republic', NULL, '963', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('19', 'BZ', 'بليز', 'Belize', NULL, '501', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('190', 'TW', 'تايوان، جمهورية الصين', 'Taiwan, Republic of China', NULL, '886', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('191', 'TJ', 'طاجيكستان', 'Tajikistan', NULL, '992', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('192', 'TZ', 'تنزانيا', 'Tanzania', NULL, '255', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('193', 'TH', 'تايلاند', 'Thailand', NULL, '66', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('194', 'TG', 'توغو', 'Togo', NULL, '228', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('195', 'TK', 'توكيلاو', 'Tokelau', NULL, '690', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('196', 'TO', 'تونغا', 'Tonga', NULL, '676', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('197', 'TT', 'ترينداد وتوباغو', 'Trinidad and Tobago', NULL, '1-868', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('198', 'TN', 'تونس', 'Tunisia', NULL, '216', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('199', 'TR', 'تركيا', 'Turkey', NULL, '90', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('2', 'DZ', 'الجزائر', 'Algeria', NULL, '213', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('20', 'BJ', 'بنين', 'Benin', NULL, '229', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('200', 'TM', 'تركمانستان', 'Turkmenistan', NULL, '993', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('201', 'TC', 'جزر تركس وكايكوس', 'Turks and Caicos Islands', NULL, '1-649', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('202', 'TV', 'توفالو', 'Tuvalu', NULL, '688', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('203', 'UG', 'أوغندا', 'Uganda', NULL, '256', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('204', 'UA', 'أوكرانيا', 'Ukraine', NULL, '380', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('205', 'AE', 'الإمارات العربية المتحدة', 'United Arab Emirates', NULL, '971', 6, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('206', 'GB', 'المملكة المتحدة', 'United Kingdom', NULL, '44', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('207', 'US', 'الولايات المتحدة الأمريكية', 'United States of America', NULL, '1', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('208', 'UY', 'أوروغواي', 'Uruguay', NULL, '598', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('209', 'UZ', 'أوزبكستان', 'Uzbekistan', NULL, '998', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('21', 'BM', 'برمودا', 'Bermuda', NULL, '1-441', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('210', 'VU', 'فانواتو', 'Vanuatu', NULL, '678', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('211', 'VE', 'فنزويلا', 'Venezuela', NULL, '58', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('212', 'VN', 'فيتنام', 'Viet Nam', NULL, '84', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('213', 'WF', 'واليس وفوتونا', 'Wallis and Futuna Islands', NULL, '681', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('214', 'YE', 'اليمن', 'Yemen', NULL, '967', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('215', 'ZM', 'زامبيا', 'Zambia', NULL, '260', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('216', 'ZW', 'زيمبابوي', 'Zimbabwe', NULL, '263', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('22', 'BT', 'بوتان', 'Bhutan', NULL, '975', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('23', 'BO', 'بوليفيا', 'Bolivia', NULL, '591', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('24', 'BA', 'البوسنة والهرسك', 'Bosnia and Herzegovina', NULL, '387', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('25', 'BW', 'بوتسوانا', 'Botswana', NULL, '267', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('26', 'BR', 'البرازيل', 'Brazil', NULL, '55', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('27', 'VG', 'جزر فيرجن البريطانية', 'British Virgin Islands', NULL, '1-284', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('28', 'IO', 'إقليم المحيط الهندي البريطاني', 'British Indian Ocean Territory', NULL, '246', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('29', 'BN', 'بروناي دار السلام', 'Brunei Darussalam', NULL, '673', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('3', 'AS', 'ساموا الأمريكية', 'American Samoa', NULL, '1-684', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('30', 'BG', 'بلغاريا', 'Bulgaria', NULL, '359', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('31', 'BF', 'بوركينا فاسو', 'Burkina Faso', NULL, '226', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('32', 'BI', 'بوروندي', 'Burundi', NULL, '257', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('33', 'KH', 'كمبوديا', 'Cambodia', NULL, '855', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('34', 'CM', 'الكاميرون', 'Cameroon', NULL, '237', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('35', 'CA', 'كندا', 'Canada', NULL, '1', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('36', 'CV', 'الرأس الأخضر', 'Cape Verde', NULL, '238', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('37', 'KY', 'جزر كايمان', 'Cayman Islands', NULL, '1-345', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('38', 'CF', 'افريقيا الوسطى', 'Central African Republic', NULL, '236', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('39', 'TD', 'تشاد', 'Chad', NULL, '235', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('4', 'AD', 'أندورا', 'Andorra', NULL, '376', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('40', 'CL', 'تشيلي', 'Chile', NULL, '56', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('41', 'CN', 'الصين', 'China', NULL, '86', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('42', 'HK', 'هونغ كونغ', 'Hong Kong', NULL, '852', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('43', 'MO', 'ماكاو', 'Macao', NULL, '853', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('44', 'CX', 'جزيرة الكريسماس', 'Christmas Island', NULL, '61', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('45', 'CC', 'جزر كوكوس (كيلينغ)', 'Cocos (Keeling) Islands', NULL, '61', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('46', 'CO', 'كولومبيا', 'Colombia', NULL, '57', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('47', 'KM', 'جزر القمر', 'Comoros', NULL, '269', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('48', 'CK', 'جزر كوك', 'Cook Islands', NULL, '682', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('49', 'CR', 'كوستا ريكا', 'Costa Rica', NULL, '506', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('5', 'AO', 'أنغولا', 'Angola', NULL, '244', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('50', 'HR', 'كرواتيا', 'Croatia', NULL, '385', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('51', 'CU', 'كوبا', 'Cuba', NULL, '53', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('52', 'CY', 'قبرص', 'Cyprus', NULL, '357', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('53', 'CZ', 'الجمهورية التشيكية', 'Czech Republic', NULL, '420', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('54', 'DK', 'الدنمارك', 'Denmark', NULL, '45', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('55', 'DJ', 'جيبوتي', 'Djibouti', NULL, '253', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('56', 'DM', 'دومينيكا', 'Dominica', NULL, '1-767', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('57', 'DO', 'جمهورية الدومينيكان', 'Dominican Republic', NULL, '1-809', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('58', 'EC', 'الاكوادور', 'Ecuador', NULL, '593', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('59', 'EG', 'مصر', 'Egypt', NULL, '20', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('6', 'AI', 'أنغيلا', 'Anguilla', NULL, '1-264', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('60', 'SV', 'السلفادور', 'El Salvador', NULL, '503', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('61', 'GQ', 'غينيا الاستوائية', 'Equatorial Guinea', NULL, '240', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('62', 'ER', 'إريتريا', 'Eritrea', NULL, '291', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('63', 'EE', 'استونيا', 'Estonia', NULL, '372', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('64', 'ET', 'أثيوبيا', 'Ethiopia', NULL, '251', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('65', 'FO', 'جزر فارو', 'Faroe Islands', NULL, '298', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('66', 'FJ', 'فيجي', 'Fiji', NULL, '679', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('67', 'FI', 'فنلندا', 'Finland', NULL, '358', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('67e848f3-26b1-4d96-bfaa-a2c0564a3c1a', 'AU', 'أستراليا', 'Australia', NULL, '61', 0, '2017-11-08 13:25:54', '2019-06-26 10:50:21'),
('67ee72c4-3533-4154-b05a-f7a9535675f6', 'KI', 'كيريباس', 'Kiribati', NULL, '686', 0, '2017-11-08 13:25:54', '2019-06-26 10:50:21'),
('68', 'FR', 'فرنسا', 'France', NULL, '33', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('69', 'GF', 'جيانا الفرنسية', 'French Guiana', NULL, '689', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('7', 'AR', 'الأرجنتين', 'Argentina', NULL, '54', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('70', 'GA', 'الغابون', 'Gabon', NULL, '241', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('71', 'GM', 'غامبيا', 'Gambia', NULL, '220', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('72', 'GE', 'جورجيا', 'Georgia', NULL, '995', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('73', 'DE', 'ألمانيا', 'Germany', NULL, '49', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('74', 'GH', 'غانا', 'Ghana', NULL, '233', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('75', 'GI', 'جبل طارق', 'Gibraltar', NULL, '350', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('76', 'GR', 'يونان', 'Greece', NULL, '30', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('77', 'GL', 'غرينلاند', 'Greenland', NULL, '299', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('78', 'GD', 'غرينادا', 'Grenada', NULL, '1-473', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('79', 'GU', 'غوام', 'Guam', NULL, '1-671', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('8', 'AM', 'أرمينيا', 'Armenia', NULL, '374', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('80', 'GT', 'غواتيمالا', 'Guatemala', NULL, '502', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('81', 'GN', 'غينيا', 'Guinea', NULL, '224', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('82', 'GW', 'غينيا-بيساو', 'Guinea-Bissau', NULL, '245', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('83', 'GY', 'غيانا', 'Guyana', NULL, '592', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('84', 'HT', 'هايتي', 'Haiti', NULL, '509', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('85', 'HN', 'هندوراس', 'Honduras', NULL, '504', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('86', 'HU', 'هنغاريا', 'Hungary', NULL, '36', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('87', 'IS', 'أيسلندا', 'Iceland', NULL, '354', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('88', 'IN', 'الهند', 'India', NULL, '91', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('882bb191-27fd-44db-823a-acb64002f536', 'AL', 'ألبانيا', 'Albania', NULL, '355', 0, '2017-11-08 13:25:54', '2019-06-26 10:50:21'),
('89', 'ID', 'أندونيسيا', 'Indonesia', NULL, '62', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('9', 'AW', 'أروبا', 'Aruba', NULL, '297', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('90', 'IR', 'جمهورية إيران الإسلامية', 'Iran, Islamic Republic of', NULL, '98', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('91', 'IQ', 'العراق', 'Iraq', NULL, '964', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('92', 'IE', 'أيرلندا', 'Ireland', NULL, '353', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('93', 'IM', 'جزيرة مان', 'Isle of Man', NULL, '44-1624', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('94', 'IL', 'إسرائيل', 'Israel', NULL, '972', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('95', 'IT', 'إيطاليا', 'Italy', NULL, '39', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('96', 'JM', 'جامايكا', 'Jamaica', NULL, '1-876', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('97', 'JP', 'اليابان', 'Japan', NULL, '81', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('98', 'JE', 'جيرسي', 'Jersey', NULL, '44-1534', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('99', 'JO', 'الأردن', 'Jordan', NULL, '962', 0, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('db7656f4-084a-4611-be5c-6ef85e18c935', 'KE', 'كينيا', 'Kenya', NULL, '254', 0, '2017-11-08 13:25:54', '2019-06-26 10:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_country_poll`
--

CREATE TABLE `aaraa_country_poll` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_country_poll`
--

INSERT INTO `aaraa_country_poll` (`id`, `poll_id`, `country_id`, `created_at`, `updated_at`) VALUES
('1', '1', '25', '2019-06-11 22:43:00', '2019-06-11 22:43:00'),
('2', '1', '103', '2019-06-11 20:36:00', '2019-06-11 20:36:00'),
('3', '2', '103', '2019-06-11 20:36:00', '2019-06-11 20:36:00'),
('d3d7f1c1-1c2a-42a9-8d41-0b85971af3f8', 'd21c70cf-4c4f-4e88-a12e-091829ca677e', '103', '2019-06-18 05:58:25', '2019-06-18 05:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_ltm_translations`
--

CREATE TABLE `aaraa_ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_ltm_translations`
--

INSERT INTO `aaraa_ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, 'en', 'backLang', 'APIKeyGenerate', NULL, '2017-11-09 18:52:11', '2017-11-09 18:52:11'),
(2, 0, 'en', 'validation', 'custom.subscribe_name.required', NULL, '2017-11-12 02:57:33', '2017-11-12 02:57:33'),
(3, 0, 'en', 'validation', 'attributes', NULL, '2017-11-12 02:57:33', '2017-11-12 02:57:33'),
(4, 0, 'en', 'validation', 'custom.subscribe_email.required', NULL, '2017-11-12 02:57:33', '2017-11-12 02:57:33'),
(5, 0, 'en', 'validation', 'custom.api_key.required', NULL, '2017-11-12 02:59:17', '2017-11-12 02:59:17'),
(6, 0, 'en', 'validation', 'custom.subscribe_email.email', NULL, '2017-11-12 03:00:18', '2017-11-12 03:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_migrations`
--

CREATE TABLE `aaraa_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_migrations`
--

INSERT INTO `aaraa_migrations` (`id`, `migration`, `batch`) VALUES
(282, '2014_04_02_193005_create_translations_table', 1),
(283, '2014_10_12_000000_create_users_table', 1),
(284, '2014_10_12_100000_create_password_resets_table', 1),
(285, '2017_09_14_194216_create_webmaster_settings_table', 1),
(286, '2017_09_14_194251_create_webmaster_sections_table', 1),
(287, '2017_09_14_194259_create_webmaster_banners_table', 1),
(288, '2017_09_14_194307_create_webmails_groups_table', 1),
(289, '2017_09_14_194314_create_webmails_files_table', 1),
(290, '2017_09_14_194321_create_webmails_table', 1),
(291, '2017_09_14_194328_create_topics_table', 1),
(292, '2017_09_14_194334_create_settings_table', 1),
(293, '2017_09_14_194342_create_sections_table', 1),
(294, '2017_09_14_194349_create_photos_table', 1),
(295, '2017_09_14_194356_create_permissions_table', 1),
(296, '2017_09_14_194403_create_menus_table', 1),
(297, '2017_09_14_194409_create_maps_table', 1),
(298, '2017_09_14_194417_create_events_table', 1),
(299, '2017_09_14_194424_create_countries_table', 1),
(300, '2017_09_14_194431_create_contacts_groups_table', 1),
(301, '2017_09_14_194438_create_contacts_table', 1),
(302, '2017_09_14_194444_create_comments_table', 1),
(303, '2017_09_14_194452_create_banners_table', 1),
(304, '2017_09_14_194506_create_attach_files_table', 1),
(305, '2017_09_14_194514_create_analytics_visitors_table', 1),
(306, '2017_09_14_194521_create_analytics_pages_table', 1),
(307, '2017_10_06_113629_create_related_topics_table', 1),
(308, '2017_10_07_184011_create_topic_categories_table', 1),
(309, '2017_10_24_194251_create_webmaster_section_fields_table', 1),
(310, '2017_10_24_194304_create_topic_fields_table', 1),
(311, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(312, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(313, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(314, '2016_06_01_000004_create_oauth_clients_table', 2),
(315, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_notifications`
--

CREATE TABLE `aaraa_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `father_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `date` datetime NOT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_cc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_bcc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `flag` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_notifications`
--

INSERT INTO `aaraa_notifications` (`id`, `cat_id`, `group_id`, `contact_id`, `father_id`, `title`, `details`, `date`, `from_email`, `from_name`, `from_phone`, `to_email`, `to_name`, `to_cc`, `to_bcc`, `status`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 2, NULL, NULL, 'ORDER , Qty=12, Nullam mollis dolor', 'dfdfd', '2017-03-07 15:21:20', 'eng_m_mondy@hotmail.com', 'mohamed mondi', '01221485486', 'info@sitename.com', 'aaraa Laravel Site Preview', NULL, NULL, 0, 0, NULL, NULL, '2017-03-07 13:21:20', '2017-03-07 17:37:48'),
(2, 0, NULL, NULL, NULL, 'Need your help', 'Dear sir,\r\nI need your help to subscribe to your team. Please contact me as soon as possible.\r\n\r\nBest Regards', '2017-03-07 16:04:16', 'ayamen@site.com', 'Amar Yamen', '8378-475-466', 'info@sitename.com', 'aaraa Laravel Site Preview', NULL, NULL, 0, 0, NULL, NULL, '2017-03-07 14:04:16', '2017-03-07 14:04:16'),
(3, 0, 3, NULL, NULL, 'My test message to this site', 'I just test sending messages\r\nThanks', '2017-03-07 16:05:32', 'email@site.com', 'Donyo Hawa', '343423-543', 'info@sitename.com', 'aaraa Laravel Site Preview', NULL, NULL, 0, 0, NULL, NULL, '2017-03-07 14:05:32', '2017-03-07 14:11:59'),
(4, 0, 1, NULL, NULL, 'Contact me for support any time', 'This is a test message', '2017-03-07 16:10:29', 'email@site.com', 'MMondi', '7363758', 'info@sitename.com', 'aaraa Laravel Site Preview', NULL, NULL, 0, 0, NULL, NULL, '2017-03-07 14:10:29', '2017-03-07 14:11:54'),
(5, 0, NULL, NULL, NULL, 'Test mail delivery message', 'Dear team,\r\nThis is a Test mail delivery message\r\nThank you', '2017-03-07 21:06:41', 'email@site.com', 'Ramy Adams', '87557home', 'support@smartfordesign.com', 'aaraa Laravel Site Preview', NULL, NULL, 1, 0, NULL, NULL, '2017-03-08 02:06:41', '2019-06-18 08:42:04'),
(6, 0, NULL, NULL, NULL, 'Test mail delivery message', 'Dear team,\r\nThis is a Test mail delivery message\r\nThank you', '2017-03-07 21:08:54', 'email@site.com', 'Adam Ali', '3432423', 'support@smartfordesign.com', 'aaraa Laravel Site Preview', NULL, NULL, 1, 0, NULL, NULL, '2017-03-08 02:08:54', '2019-06-18 08:41:50'),
(7, 1, NULL, NULL, NULL, 'Hi Gabru', '<p>This is just a test mail.</p>', '2019-06-18 11:42:47', 'support@smartfordesign.com', 'aaraa Laravel Site Preview', NULL, 'agabru@vavisa-kw.com', NULL, NULL, NULL, 1, 0, 1, NULL, '2019-06-18 08:42:47', '2019-06-18 08:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_oauth_access_tokens`
--

CREATE TABLE `aaraa_oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_oauth_access_tokens`
--

INSERT INTO `aaraa_oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('05bc56197abc1d1da2338ff34d92784de1b683c1c3c70960a9b8a801d303f26503a5b4cdc8bda39c', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-13 09:30:38', '2019-06-13 09:30:38', '2019-12-13 12:30:38'),
('2b93bea531cb54fe61c35cfa05f047a24f093300e3a7f8fad574dc17cedb8a42891c508b37f92481', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Aaraa', '[]', 0, '2019-06-24 11:42:09', '2019-06-24 11:42:09', '2019-12-24 14:42:09'),
('35f3b0ace26a72931c98089b13f6431e5de49f93679501ad124632b9c7ae47aab105174894f2216f', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 18:42:34', '2019-06-17 18:42:34', '2019-12-18 00:12:34'),
('60fcb45d2b455c58d5964edcf04d8521cb0309cf96cc0b161bb7423555489ef8c4ba4f9537081d46', '354db5ef-08a9-4024-870b-936013820508', 9, 'Aaraa', '[]', 0, '2019-06-19 13:19:43', '2019-06-19 13:19:43', '2019-12-19 16:19:43'),
('66227e6911ebd60d68e006c92680c237ff06e3a41a14c473467181fc0739b9b03607f50efb3cb97d', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 1, '2019-06-17 05:45:13', '2019-06-17 05:45:13', '2019-12-17 08:45:13'),
('8cf04e3d132aa3b88a937073f631422e0b012c00fb63a26444236b75ada67dc9be35d165c48c6f98', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 10:02:26', '2019-06-17 10:02:26', '2019-12-17 13:02:26'),
('9897c645511b27db90b76f9bedbbd0b67e45af47fd17bf8b6bc37fc5612c34a020c73ec20b6843c5', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 16:51:25', '2019-06-17 16:51:25', '2019-12-17 22:21:24'),
('abae02367a381fca4af0df21105d85b337b15ca0252ec6519b4f4887573ec250f5c594b2293f8395', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Aaraa', '[]', 0, '2019-06-26 08:57:21', '2019-06-26 08:57:21', '2019-12-26 11:57:21'),
('bc539ca309bcb116e3ddf5994126b5a704e2262e47fd919d4aaa62b1844f90d7a5839380f2ac3e99', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 18:42:21', '2019-06-17 18:42:21', '2019-12-18 00:12:20'),
('caf3e37b8730dfbb3c2fea2a3f717796cfe409df18e2ebf60b20df40c6a969ed9ad9243929103ab6', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 18:43:43', '2019-06-17 18:43:43', '2019-12-18 00:13:43'),
('d42c58aebaf12be62b72e0f95072d7194f718f251dc73da5248ad641284e21be68c3ba74d27b79a6', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Aaraa', '[]', 0, '2019-06-24 12:09:00', '2019-06-24 12:09:00', '2019-12-24 15:09:00'),
('db237d98c245ae3922f446c47373e58708fd5a9f7848c77bb646865a909da1df9a013a744d259634', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Aaraa', '[]', 0, '2019-06-24 11:31:21', '2019-06-24 11:31:21', '2019-12-24 14:31:21'),
('e3ea6bd012c1d6490ba93eec25ed68b2cf438003a337d35dfa649bc0d03c2ae94aac9fb50d2e6af0', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-13 09:31:22', '2019-06-13 09:31:22', '2019-12-13 12:31:22'),
('e563ecb03a59fd81d173b19524c4e35b8b8e1e47e0a2a2ff712d09d8b9a24de8fba78800b1be45a5', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-16 15:12:57', '2019-06-16 15:12:57', '2019-12-16 20:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_oauth_auth_codes`
--

CREATE TABLE `aaraa_oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_oauth_clients`
--

CREATE TABLE `aaraa_oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_oauth_clients`
--

INSERT INTO `aaraa_oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(9, NULL, 'Laravel Personal Access Client', 'TCN1sFau07EcYhTanmBOK0bTID0H43fQJwQMT1ZP', 'http://localhost', 1, 0, 0, '2019-06-11 05:13:06', '2019-06-11 05:13:06'),
(10, NULL, 'Laravel Password Grant Client', 'AggisW2G8udSvovddqUZfYye6gOQn07AqTRPoAjA', 'http://localhost', 0, 1, 0, '2019-06-11 05:13:06', '2019-06-11 05:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_oauth_personal_access_clients`
--

CREATE TABLE `aaraa_oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_oauth_personal_access_clients`
--

INSERT INTO `aaraa_oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(5, 9, '2019-06-11 05:13:06', '2019-06-11 05:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_oauth_refresh_tokens`
--

CREATE TABLE `aaraa_oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_one_signal_application_users`
--

CREATE TABLE `aaraa_one_signal_application_users` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_users_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_one_signal_application_users`
--

INSERT INTO `aaraa_one_signal_application_users` (`id`, `application_users_id`, `player_id`, `device_type`, `created_at`, `updated_at`) VALUES
('78c30f9f-3468-4b1f-b324-2fa5d3d99524', '031d14b4-e222-4bde-a770-b44fcaeba49f', 'test', 'iOS', '2019-06-17 18:43:43', '2019-06-17 18:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_options`
--

CREATE TABLE `aaraa_options` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_options`
--

INSERT INTO `aaraa_options` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('12b4e764-b00c-4394-af04-8049cad7f3db', 'Test1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:58:29', '2019-06-16 16:58:29'),
('191151d2-de23-4102-9c30-fa3a6fbd8c26', 'Test1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:57:40', '2019-06-16 16:57:40'),
('296501ba-0c1a-47fb-8dc5-fd9feea4553a', 'Test1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:58:51', '2019-06-16 16:58:51'),
('2c110825-cd34-47b1-ad58-aa54c6235145', ' Test2', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:58:29', '2019-06-16 16:58:29'),
('3838da83-c205-488b-831c-0333521a9c82', 'test1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:23:42', '2019-06-18 05:23:42'),
('38a723a2-69b3-4654-8960-cb510150b6ba', ' Test3', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 17:00:01', '2019-06-16 17:00:01'),
('4af79c08-8ba4-4c9f-b68b-e05a729de36b', 'test11', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:58:24', '2019-06-18 05:58:24'),
('531cd406-af9a-449b-83d1-73cea329f716', ' Test2', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 17:00:01', '2019-06-16 17:00:01'),
('5b48b035-a437-4300-a14a-5670ce29646e', 'test21', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:58:24', '2019-06-18 05:58:24'),
('8749d37c-0c08-4d54-80f5-c4ed2a3bd896', 'Test1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:55:00', '2019-06-16 16:55:00'),
('8ddb3117-4cd7-45cd-8b1d-998295eff237', 'test2', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:23:42', '2019-06-18 05:23:42'),
('9076c1ba-bdfe-4bdb-b808-b3dfe4115d04', ' Test3', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:57:40', '2019-06-16 16:57:40'),
('91689a03-457b-4534-be0b-4bc1740cc3f7', 'test11', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 12:25:22', '2019-06-18 12:25:22'),
('9697331d-b2c5-4858-9580-d5d1438350e8', 'test11', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 11:54:29', '2019-06-18 11:54:29'),
('9b45a52c-93e9-4249-aeb0-32e75d5b9f08', ' Test3', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:58:51', '2019-06-16 16:58:51'),
('ac10e38b-4f4e-4de6-bb14-38fbe48f95fc', ' Test2', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:58:51', '2019-06-16 16:58:51'),
('c1f10dc7-1c87-4d71-8822-9f94ba4ed376', 'Test1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 17:00:01', '2019-06-16 17:00:01'),
('c2e59d2d-2114-4640-8a8f-c9865838f1b7', 'Test1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:51:32', '2019-06-16 16:51:32'),
('d88efd81-d311-4802-83df-2160ca42fa76', 'test21', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 12:25:22', '2019-06-18 12:25:22'),
('dcd195b1-b1e6-4b24-a8df-28db9d507bbf', ' Test3', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:58:29', '2019-06-16 16:58:29'),
('e5778010-1bc1-4f72-a4e9-33c0425a57a6', 'test21', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 11:54:29', '2019-06-18 11:54:29'),
('e65c65c4-08a2-4e3e-bf2a-fb55caf94aff', ' Test2', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:57:40', '2019-06-16 16:57:40'),
('eee39539-f776-4393-97d5-e036e9796bb4', 'Test1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:48:55', '2019-06-16 16:48:55'),
('f52b24c2-58c6-4e16-be43-6295ca9d0a5e', 'Test1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 17:30:15', '2019-06-16 17:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_option_poll`
--

CREATE TABLE `aaraa_option_poll` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_option_poll`
--

INSERT INTO `aaraa_option_poll` (`id`, `poll_id`, `option_id`, `created_at`, `updated_at`) VALUES
('00dc4601-13dd-4f31-b573-409148bb4978', 'd21c70cf-4c4f-4e88-a12e-091829ca677e', '5b48b035-a437-4300-a14a-5670ce29646e', '2019-06-18 05:58:25', '2019-06-18 05:58:25'),
('03e6a0d7-9150-11e9-96b7-30d16bf2233d', '1', '2c110825-cd34-47b1-ad58-aa54c6235145', '2019-06-17 18:30:00', '2019-06-17 18:30:00'),
('0c26e0c0-bf07-4c84-a3f0-9b23efac7e94', 'd21c70cf-4c4f-4e88-a12e-091829ca677e', '4af79c08-8ba4-4c9f-b68b-e05a729de36b', '2019-06-18 05:58:24', '2019-06-18 05:58:24'),
('0cb942d3-9150-11e9-96b7-30d16bf2233d', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '2019-06-17 18:30:00', '2019-06-17 18:30:00'),
('303e433d-3be3-462f-a639-aef332d3e7bc', '56fce4c7-9860-4ad3-a264-3f546a490da4', 'e5778010-1bc1-4f72-a4e9-33c0425a57a6', '2019-06-18 11:54:29', '2019-06-18 11:54:29'),
('4b97ee61-e51c-4404-af55-92994d2935d1', '56fce4c7-9860-4ad3-a264-3f546a490da4', '9697331d-b2c5-4858-9580-d5d1438350e8', '2019-06-18 11:54:29', '2019-06-18 11:54:29'),
('57bd5c68-bbfe-49a9-a394-169ff749e2d7', 'a2ff7e79-3d5e-4378-866e-262a2f3f51bc', '3838da83-c205-488b-831c-0333521a9c82', '2019-06-18 05:23:42', '2019-06-18 05:23:42'),
('78591d64-f2ed-489e-be2d-5e9bb745500a', 'a2ff7e79-3d5e-4378-866e-262a2f3f51bc', '8ddb3117-4cd7-45cd-8b1d-998295eff237', '2019-06-18 05:23:42', '2019-06-18 05:23:42'),
('a0b1abcf-914f-11e9-96b7-30d16bf2233d', '1', '12b4e764-b00c-4394-af04-8049cad7f3db', '2019-06-17 18:30:00', '2019-06-17 18:30:00'),
('a6461d83-e1d7-4ca9-a766-511e5ebefdef', '6c621270-0c59-493d-85ac-0d6b1a347c7c', '91689a03-457b-4534-be0b-4bc1740cc3f7', '2019-06-18 12:25:22', '2019-06-18 12:25:22'),
('d0b48144-ca84-4d51-ad17-a9b3dce19e4b', '6c621270-0c59-493d-85ac-0d6b1a347c7c', 'd88efd81-d311-4802-83df-2160ca42fa76', '2019-06-18 12:25:22', '2019-06-18 12:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_pages`
--

CREATE TABLE `aaraa_pages` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` longtext COLLATE utf8mb4_unicode_ci,
  `details_en` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_pages`
--

INSERT INTO `aaraa_pages` (`id`, `name`, `title_ar`, `title_en`, `details_ar`, `details_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('2089b346-9340-11e9-bb87-8cec4ba57079', 'terms_conditions', 'الشروط والأحكام', 'Terms & Conditions', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.', 'It is a long established fact that a reader will be distracted by the readable content of a page.', 1, NULL, NULL, '2019-06-19 21:00:00', '2019-06-19 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_password_resets`
--

CREATE TABLE `aaraa_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_password_resets`
--

INSERT INTO `aaraa_password_resets` (`email`, `token`, `created_at`) VALUES
('mjhosawa@vavisa-kw.com', '$2y$10$oXOpxI55BqE83TIvEJqsYO7xWxPd6nTbqZzmmDTQy7w7Fsahj4DYy', '2019-06-24 10:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_permissions`
--

CREATE TABLE `aaraa_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_status` tinyint(4) NOT NULL DEFAULT '0',
  `add_status` tinyint(4) NOT NULL DEFAULT '0',
  `edit_status` tinyint(4) NOT NULL DEFAULT '0',
  `delete_status` tinyint(4) NOT NULL DEFAULT '0',
  `analytics_status` tinyint(4) NOT NULL DEFAULT '0',
  `notifications_status` tinyint(4) NOT NULL DEFAULT '0',
  `countries_status` tinyint(4) NOT NULL DEFAULT '0',
  `polls_status` tinyint(4) NOT NULL,
  `categories_status` tinyint(4) NOT NULL,
  `appusers_status` tinyint(4) NOT NULL,
  `settings_status` tinyint(4) NOT NULL DEFAULT '0',
  `webmaster_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_permissions`
--

INSERT INTO `aaraa_permissions` (`id`, `name`, `view_status`, `add_status`, `edit_status`, `delete_status`, `analytics_status`, `notifications_status`, `countries_status`, `polls_status`, `categories_status`, `appusers_status`, `settings_status`, `webmaster_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Webmaster', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
(2, 'Website Manager', 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_polls`
--

CREATE TABLE `aaraa_polls` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `start_datetime` timestamp NULL DEFAULT NULL,
  `end_datetime` timestamp NULL DEFAULT NULL,
  `enable_comments` tinyint(4) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_polls`
--

INSERT INTO `aaraa_polls` (`id`, `name`, `photo`, `status`, `start_datetime`, `end_datetime`, `enable_comments`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'Who is the best football player in the world?', NULL, 1, '2019-06-11 20:36:00', '2019-06-27 21:00:00', 1, '1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-11 20:36:00', '2019-06-11 20:36:00'),
('1cdd4bc5-1195-4309-b52e-6afeab837c78', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:46:34', '2019-06-16 16:46:34'),
('2', 'Who is the worst football player in the world?', NULL, 1, '2019-06-11 20:36:00', '2019-06-27 21:00:00', 1, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-11 20:36:00', '2019-06-11 20:36:00'),
('205a627b-3135-47b7-b924-41cadc02d7fb', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 17:30:15', '2019-06-16 17:30:15'),
('244dd386-b7e1-440e-a9a5-4a8589fce177', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:57:39', '2019-06-16 16:57:39'),
('3d76cd1f-2529-499b-9419-1608bf03689e', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:38:29', '2019-06-16 16:38:29'),
('483ef500-abc9-4783-b61f-087610db247b', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:30:05', '2019-06-16 16:30:05'),
('56fce4c7-9860-4ad3-a264-3f546a490da4', 'Test1', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 11:54:29', '2019-06-18 11:54:29'),
('6aa2d723-5c1c-465a-8c5d-7afffd34d847', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:20:52', '2019-06-16 16:20:52'),
('6c621270-0c59-493d-85ac-0d6b1a347c7c', 'Test1', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 12:25:22', '2019-06-18 12:25:22'),
('7017a944-d280-417a-8b36-ea8790003af5', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:47:02', '2019-06-16 16:47:02'),
('846489c3-37de-4a39-817f-86083cb3140e', 'Test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:23:10', '2019-06-18 05:23:10'),
('84b46d74-c1af-436c-b236-2f3b844bf659', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:42:40', '2019-06-16 16:42:40'),
('8757daf5-f68e-463b-a39c-2c46d331f8db', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:45:43', '2019-06-16 16:45:43'),
('92588104-3c5e-4e77-90dc-f1d3a377d1b8', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:54:58', '2019-06-16 16:54:58'),
('932c08db-3355-4a7c-87c9-489503b7ac7c', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 17:00:00', '2019-06-16 17:00:00'),
('9356d484-8fd8-4f4d-a517-fd7bb4b46369', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:58:49', '2019-06-16 16:58:49'),
('9524e140-9e95-4417-b96e-5db73a8d5b90', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:45:29', '2019-06-16 16:45:29'),
('a2ff7e79-3d5e-4378-866e-262a2f3f51bc', 'Test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:23:42', '2019-06-18 05:23:42'),
('a573d145-095d-4dd7-8372-e6596f13bccb', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:51:31', '2019-06-16 16:51:31'),
('c09f5ff2-5ad3-4b7c-bc79-43cc59e20dc8', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:20:29', '2019-06-16 16:20:29'),
('c7c5c6aa-294b-4625-b679-68901bdf1992', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:44:04', '2019-06-16 16:44:04'),
('d21c70cf-4c4f-4e88-a12e-091829ca677e', 'Test1', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:58:24', '2019-06-18 05:58:24'),
('d2ac42e9-7a25-4e3d-9931-f7def8c04634', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:58:29', '2019-06-16 16:58:29'),
('d8d5c159-d683-412a-89ee-c70ca21e44c4', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:32:50', '2019-06-16 16:32:50'),
('fe9d2dec-4fe2-44ff-b043-983a5f1552a5', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:48:55', '2019-06-16 16:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_poll_durations`
--

CREATE TABLE `aaraa_poll_durations` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `is_hour` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_poll_durations`
--

INSERT INTO `aaraa_poll_durations` (`id`, `duration`, `is_hour`) VALUES
('a580108f-90e3-11e9-bb87-8cec4ba57079', 1, 1),
('af9cff84-90e3-11e9-bb87-8cec4ba57079', 2, 1),
('d514dc08-90e3-11e9-bb87-8cec4ba57079', 3, 1),
('e155ff15-90e3-11e9-bb87-8cec4ba57079', 4, 1),
('ea232aab-90e3-11e9-bb87-8cec4ba57079', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_poll_results`
--

CREATE TABLE `aaraa_poll_results` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_poll_results`
--

INSERT INTO `aaraa_poll_results` (`id`, `user_id`, `poll_id`, `option_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('0cb39cf1-0d0f-4578-9a61-34c7f3e1dc6a', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '12b4e764-b00c-4394-af04-8049cad7f3db', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 16:55:09', '2019-06-17 16:55:09'),
('10c74efe-3cd6-4458-9c87-601987ba41af', '335e6aeb-91c4-11e9-bb87-8cec4ba57079', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:14:20', '2019-06-18 05:14:20'),
('2cb16c48-2778-4848-83d3-d9f3eb9ad96d', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '2c110825-cd34-47b1-ad58-aa54c6235145', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:50:06', '2019-06-17 17:50:06'),
('34944da9-4fbf-4e0c-b702-cfccdfcc343a', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 04:38:43', '2019-06-18 04:38:43'),
('3acefb28-e2f3-41ff-a563-4fff9016bb77', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:37:55', '2019-06-17 17:37:55'),
('3bc4ce02-0a93-4003-a235-a1063805676a', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:09:05', '2019-06-18 05:09:05'),
('3d251893-7827-4286-808c-f8d0e1a2a2eb', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:37:44', '2019-06-17 17:37:44'),
('47fe07f5-6ebe-476a-8280-3823ad24d06c', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:08:29', '2019-06-18 05:08:29'),
('4c77e596-3c90-4eaa-bb3f-1cb12a77b975', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:37:59', '2019-06-17 17:37:59'),
('4e733b28-ad62-43bc-9f60-0110977aab90', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '2c110825-cd34-47b1-ad58-aa54c6235145', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:44:56', '2019-06-17 17:44:56'),
('67db85f6-2c49-471a-a801-a54004b92810', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 04:38:53', '2019-06-18 04:38:53'),
('6fc16cae-aa16-4d89-b2ae-091e84f702c8', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:35:07', '2019-06-17 17:35:07'),
('82f28733-fd3c-4430-9367-4aa0134cc32a', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '2c110825-cd34-47b1-ad58-aa54c6235145', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:50:09', '2019-06-17 17:50:09'),
('864e3ac8-ab96-4ed5-955c-c5c8f4846379', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:38:02', '2019-06-17 17:38:02'),
('993f1103-1b6d-4737-8796-814adcc8265f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 04:43:04', '2019-06-18 04:43:04'),
('a4e7add4-d70f-4934-b7a9-e359fd71e330', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 04:38:49', '2019-06-18 04:38:49'),
('a55cbc4e-d480-4928-8365-682218d8b434', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '2c110825-cd34-47b1-ad58-aa54c6235145', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:48:03', '2019-06-17 17:48:03'),
('b9f13752-4284-4c3e-a19c-de7a25a8ad9a', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-17 17:43:04', '2019-06-17 17:43:04'),
('fff14cff-ccdb-4be7-aa3f-e2ba58efec40', '031d14b4-e222-4bde-a770-b44fcaeba49f', '1', '38a723a2-69b3-4654-8960-cb510150b6ba', '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-18 05:17:02', '2019-06-18 05:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_settings`
--

CREATE TABLE `aaraa_settings` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_options` int(11) NOT NULL,
  `max_options` int(11) NOT NULL,
  `ios_version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `android_version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_mode` tinyint(1) NOT NULL,
  `maintenance_message_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_message_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_settings`
--

INSERT INTO `aaraa_settings` (`id`, `site_url`, `site_title_en`, `site_title_ar`, `min_options`, `max_options`, `ios_version`, `android_version`, `maintenance_mode`, `maintenance_message_en`, `maintenance_message_ar`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'http://localhost/internal/aaraa/public', 'Poll Survey App', 'استطلاع التطبيق المسح', 2, 5, '1.4', '1.4', 0, 'الخدمة غير متوفرة في هذه اللحظة. أعود بعد وقت ما', 'Service unavailable at this moment. Come back after sometime', '1', '1', '2017-03-06 11:06:23', '2019-06-24 14:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_users`
--

CREATE TABLE `aaraa_users` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_users`
--

INSERT INTO `aaraa_users` (`id`, `name`, `email`, `password`, `photo`, `permissions_id`, `status`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'admin', 'mjhosawa@vavisa-kw.com', '$2y$10$vCYpyjX68hKYbzsAUZS4vuLCodSrXukCOHorulIwREO70hNgv6J5q', NULL, 1, 1, 'AjM5qEYoSHZHobjhooR5Kj1XKWHAgPjtEOCizDunWWRVdK2xh5SaVzJUVNG7', '1', NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('2', 'manager', 'manager@site.com', '$2y$10$uwYocVmPgnGGxhW/ITU46ePqFEdsIyj87OXkYrRidYtuvvQR2Y6Yq', NULL, 2, 1, NULL, '1', NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('3', 'user', 'user@site.com', '$2y$10$JFfZ4nfOHNJlzEefZk9Oq.QcHzqaIOCM7kU0/0fltjptMrU4hj7UO', NULL, 3, 1, NULL, '1', NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_webmaster_settings`
--

CREATE TABLE `aaraa_webmaster_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_box_status` tinyint(4) NOT NULL,
  `en_box_status` tinyint(4) NOT NULL,
  `analytics_status` tinyint(4) NOT NULL,
  `polls_status` tinyint(4) NOT NULL,
  `categories_status` tinyint(4) NOT NULL,
  `appusers_status` tinyint(4) NOT NULL,
  `countries_status` tinyint(4) NOT NULL,
  `notifications_status` tinyint(4) NOT NULL,
  `settings_status` tinyint(4) NOT NULL,
  `default_currency_id` int(11) NOT NULL,
  `languages_count` int(11) NOT NULL,
  `header_menu_id` int(11) NOT NULL,
  `footer_menu_id` int(11) NOT NULL,
  `links_status` tinyint(4) NOT NULL,
  `register_status` tinyint(4) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `api_status` tinyint(4) NOT NULL,
  `api_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_webmaster_settings`
--

INSERT INTO `aaraa_webmaster_settings` (`id`, `ar_box_status`, `en_box_status`, `analytics_status`, `polls_status`, `categories_status`, `appusers_status`, `countries_status`, `notifications_status`, `settings_status`, `default_currency_id`, `languages_count`, `header_menu_id`, `footer_menu_id`, `links_status`, `register_status`, `permission_group`, `api_status`, `api_key`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 2, 1, 2, 0, 0, 3, 1, '571775002564288', 1, 1, '2017-11-08 13:25:54', '2017-11-09 18:55:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aaraa_application_users`
--
ALTER TABLE `aaraa_application_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `aaraa_application_users_category`
--
ALTER TABLE `aaraa_application_users_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aaraa_poll_application_users_user_id_fk` (`application_users_id`),
  ADD KEY `aaraa_poll_application_users_category_id_fk` (`category_id`);

--
-- Indexes for table `aaraa_application_users_password_resets`
--
ALTER TABLE `aaraa_application_users_password_resets`
  ADD KEY `application_users_password_resets_email_index` (`email`);

--
-- Indexes for table `aaraa_application_users_poll`
--
ALTER TABLE `aaraa_application_users_poll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aaraa_poll_application_users_user_id_fk` (`application_users_id`),
  ADD KEY `aaraa_poll_application_users_poll_id_fk` (`poll_id`);

--
-- Indexes for table `aaraa_categories`
--
ALTER TABLE `aaraa_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_category_poll`
--
ALTER TABLE `aaraa_category_poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_comments`
--
ALTER TABLE `aaraa_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_comment_poll`
--
ALTER TABLE `aaraa_comment_poll`
  ADD KEY `aaraa_comment_poll_comment_id_fk` (`comment_id`),
  ADD KEY `aaraa_comment_poll_poll_id_fk` (`poll_id`);

--
-- Indexes for table `aaraa_countries`
--
ALTER TABLE `aaraa_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_country_poll`
--
ALTER TABLE `aaraa_country_poll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aaraa_country_poll_poll_id_fk` (`poll_id`),
  ADD KEY `aaraa_country_poll_country_id_fk` (`country_id`);

--
-- Indexes for table `aaraa_ltm_translations`
--
ALTER TABLE `aaraa_ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_migrations`
--
ALTER TABLE `aaraa_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_notifications`
--
ALTER TABLE `aaraa_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_oauth_access_tokens`
--
ALTER TABLE `aaraa_oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`) USING BTREE;

--
-- Indexes for table `aaraa_oauth_auth_codes`
--
ALTER TABLE `aaraa_oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_oauth_clients`
--
ALTER TABLE `aaraa_oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `aaraa_oauth_personal_access_clients`
--
ALTER TABLE `aaraa_oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `aaraa_oauth_refresh_tokens`
--
ALTER TABLE `aaraa_oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `aaraa_one_signal_application_users`
--
ALTER TABLE `aaraa_one_signal_application_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_options`
--
ALTER TABLE `aaraa_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_option_poll`
--
ALTER TABLE `aaraa_option_poll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aaraa_option_poll_option_id_fk` (`option_id`),
  ADD KEY `aaraa_option_poll_poll_id_fk` (`poll_id`);

--
-- Indexes for table `aaraa_pages`
--
ALTER TABLE `aaraa_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_password_resets`
--
ALTER TABLE `aaraa_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `aaraa_permissions`
--
ALTER TABLE `aaraa_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_polls`
--
ALTER TABLE `aaraa_polls`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `aaraa_poll_durations`
--
ALTER TABLE `aaraa_poll_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_poll_results`
--
ALTER TABLE `aaraa_poll_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_settings`
--
ALTER TABLE `aaraa_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_users`
--
ALTER TABLE `aaraa_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `aaraa_webmaster_settings`
--
ALTER TABLE `aaraa_webmaster_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aaraa_ltm_translations`
--
ALTER TABLE `aaraa_ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aaraa_migrations`
--
ALTER TABLE `aaraa_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `aaraa_notifications`
--
ALTER TABLE `aaraa_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `aaraa_oauth_clients`
--
ALTER TABLE `aaraa_oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `aaraa_oauth_personal_access_clients`
--
ALTER TABLE `aaraa_oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aaraa_permissions`
--
ALTER TABLE `aaraa_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aaraa_webmaster_settings`
--
ALTER TABLE `aaraa_webmaster_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aaraa_application_users_category`
--
ALTER TABLE `aaraa_application_users_category`
  ADD CONSTRAINT `aaraa_category_application_users_category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `aaraa_categories` (`id`),
  ADD CONSTRAINT `aaraa_category_application_users_user_id_fk` FOREIGN KEY (`application_users_id`) REFERENCES `aaraa_application_users` (`id`);

--
-- Constraints for table `aaraa_application_users_poll`
--
ALTER TABLE `aaraa_application_users_poll`
  ADD CONSTRAINT `aaraa_poll_application_users_poll_id_fk` FOREIGN KEY (`poll_id`) REFERENCES `aaraa_polls` (`id`),
  ADD CONSTRAINT `aaraa_poll_application_users_user_id_fk` FOREIGN KEY (`application_users_id`) REFERENCES `aaraa_application_users` (`id`);

--
-- Constraints for table `aaraa_comment_poll`
--
ALTER TABLE `aaraa_comment_poll`
  ADD CONSTRAINT `aaraa_comment_poll_comment_id_fk` FOREIGN KEY (`comment_id`) REFERENCES `aaraa_comments` (`id`),
  ADD CONSTRAINT `aaraa_comment_poll_poll_id_fk` FOREIGN KEY (`poll_id`) REFERENCES `aaraa_polls` (`id`);

--
-- Constraints for table `aaraa_country_poll`
--
ALTER TABLE `aaraa_country_poll`
  ADD CONSTRAINT `aaraa_country_poll_country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `aaraa_countries` (`id`),
  ADD CONSTRAINT `aaraa_country_poll_poll_id_fk` FOREIGN KEY (`poll_id`) REFERENCES `aaraa_polls` (`id`);

--
-- Constraints for table `aaraa_option_poll`
--
ALTER TABLE `aaraa_option_poll`
  ADD CONSTRAINT `aaraa_option_poll_option_id_fk` FOREIGN KEY (`option_id`) REFERENCES `aaraa_options` (`id`),
  ADD CONSTRAINT `aaraa_option_poll_poll_id_fk` FOREIGN KEY (`poll_id`) REFERENCES `aaraa_polls` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
