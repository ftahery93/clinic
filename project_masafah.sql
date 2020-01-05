-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2019 at 02:48 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_masafah`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `block` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `building` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `name`, `block`, `street`, `area`, `building`, `notes`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', '1', '1', 'Salmiya', '2', NULL, 26, '2019-05-16 08:34:21', '2019-05-16 08:34:21'),
(2, 'Work', '2', '2', 'Sharq', '11', NULL, 26, '2019-05-16 08:34:41', '2019-05-16 08:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `admin_modules`
--

CREATE TABLE `admin_modules` (
  `id` int(11) NOT NULL,
  `module` text COLLATE utf8_unicode_ci NOT NULL,
  `module_prefix` text COLLATE utf8_unicode_ci NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:display',
  `created` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:display',
  `edit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:display',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:display',
  `upload` tinyint(1) DEFAULT '0' COMMENT '1:display',
  `print` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:display',
  `status` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL,
  `reports` tinyint(1) NOT NULL DEFAULT '0',
  `report_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:vendor,trainer:1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_modules`
--

INSERT INTO `admin_modules` (`id`, `module`, `module_prefix`, `view`, `created`, `edit`, `deleted`, `upload`, `print`, `status`, `sort_order`, `reports`, `report_type`) VALUES
(1, 'users', 'users', 1, 1, 1, 1, 0, 0, 1, 1, 0, 0),
(2, 'master records', 'master', 1, 1, 1, 1, 0, 0, 1, 2, 0, 0),
(3, 'dashboard', 'dashboard', 1, 0, 0, 0, 0, 0, 1, 20, 0, 0),
(4, 'permissions', 'permissions', 1, 1, 1, 1, 0, 0, 1, 3, 0, 0),
(5, 'banner images', 'bannerImages', 1, 1, 1, 1, 0, 0, 1, 4, 0, 0),
(6, 'logActivity', 'logActivity', 1, 0, 0, 0, 0, 0, 1, 21, 0, 0),
(7, 'registered Users', 'registeredUsers', 1, 1, 1, 1, 0, 0, 1, 5, 0, 0),
(8, 'cms Pages', 'cmsPages', 1, 0, 1, 0, 0, 0, 1, 12, 0, 0),
(9, 'packages', 'packages', 1, 1, 1, 1, 0, 0, 0, 7, 0, 0),
(10, 'contactus', 'contactus', 1, 0, 0, 0, 0, 0, 1, 22, 0, 0),
(11, 'language Management', 'languageManagement', 1, 1, 1, 1, 0, 0, 1, 8, 0, 0),
(12, 'quotation Request', 'quotationRequest', 1, 0, 0, 0, 0, 0, 1, 19, 0, 0),
(17, 'notifications', 'notifications', 1, 1, 1, 1, 0, 0, 1, 9, 0, 0),
(19, 'settings', 'settings', 0, 0, 0, 0, 0, 0, 0, 19, 0, 0),
(21, 'Service Provider', 'serviceProviders', 1, 1, 1, 1, 0, 0, 1, 6, 0, 0),
(24, 'faq', 'faq', 1, 1, 1, 1, 0, 0, 0, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `access_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`access_token`, `user_id`, `created_at`, `updated_at`) VALUES
('2687988798ZzlHUHFJajdsQkJXNDc4QUl1Sk8zWkFzUVN0eE40OEdlWmxPY1VkNTc4OEVVOU1wSEw=5cdc0d5757c9a', 26, '2019-05-15 13:00:07', '2019-05-15 13:00:07'),
('4DHLR2tlTjhWY1htQjV5N0pHM0hHWERLek5md3R1MXIxWDVvS1EyQjc2NzVhOHBsOWtUTmQ=5cdbcd4068196', 4, '2019-05-15 08:26:40', '2019-05-15 08:26:40'),
('5AramexdUR0NEU3aDQ4UXY2UGVoVXd4QTAzVWQxV3Q5RGVMYlZvVXlrcFVMMVZSbkRINDA0TFk=5cdbea0b40813', 5, '2019-05-15 10:29:31', '2019-05-15 10:29:31'),
('5AramexMlhKNHZoQUkzc3FabjBCVXBTUUFneUNlNjFZTlZYQ2F1dnBwaG5BNjNRTHAxZVVEVHo=5cdd2b75d2047', 5, '2019-05-16 09:20:54', '2019-05-16 09:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `backup_lists`
--

CREATE TABLE `backup_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` text COLLATE utf8_unicode_ci NOT NULL,
  `file_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `backup_lists`
--

INSERT INTO `backup_lists` (`id`, `file_name`, `file_size`, `created_at`, `updated_at`) VALUES
(6, '2018-08-04-161103.zip', '11006', '2018-08-04 13:11:11', '2018-08-04 13:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1530088267.png', '2018-06-27 08:31:08', '2018-06-27 08:31:08'),
(2, '1530088287.jpg', '2018-06-27 08:31:27', '2018-06-27 08:31:27'),
(3, '1532348229.png', '2018-07-23 12:17:10', '2018-07-23 12:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `parent_id` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gift', NULL, NULL, NULL, 1, NULL, NULL),
(2, 'Food', NULL, NULL, NULL, 1, NULL, NULL),
(3, 'Electronics', NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_additional_applyquotation_fields`
--

CREATE TABLE `category_additional_applyquotation_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `json_data` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_additional_applyquotation_fields`
--

INSERT INTO `category_additional_applyquotation_fields` (`id`, `category_id`, `json_data`, `created_at`, `updated_at`) VALUES
(1, 1, '[{\"order\":1,\"name\":\"Description\",\"type\":\"text\"}]', '2018-06-30 12:18:02', '2018-07-19 10:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `category_additional_quotation_fields`
--

CREATE TABLE `category_additional_quotation_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `json_data` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_additional_quotation_fields`
--

INSERT INTO `category_additional_quotation_fields` (`id`, `category_id`, `json_data`, `created_at`, `updated_at`) VALUES
(1, 1, '[{\"name\":\"checkbox\",\"required\":false,\"order\":1,\"type\":\"checkboxes\",\"options\":[{\"order\":1,\"name\":\"main branch\",\"value\":\"1\"}],\"value\":{}},{\"order\":2,\"name\":\"radio\",\"required\":true,\"type\":\"radio\",\"options\":[{\"order\":1,\"name\":\"Male\",\"value\":\"1\"},{\"order\":2,\"name\":\"Female\",\"value\":\"2\"}]}]', '2018-06-30 12:18:02', '2018-07-01 13:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `cc_payments`
--

CREATE TABLE `cc_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_no` int(10) UNSIGNED NOT NULL,
  `response_code` bigint(20) DEFAULT NULL,
  `response_desc` text COLLATE utf8_unicode_ci,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt_no` bigint(20) DEFAULT NULL,
  `transaction_no` bigint(20) DEFAULT NULL,
  `acquirer_response_code` bigint(20) DEFAULT NULL,
  `auth_id` bigint(20) DEFAULT NULL,
  `batch_no` bigint(20) DEFAULT NULL,
  `card_type` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cmspages`
--

CREATE TABLE `cmspages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_ar` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cmspages`
--

INSERT INTO `cmspages` (`id`, `name_en`, `name_ar`, `description_en`, `description_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'about', 'about', '<p>aboutfsadfsa</p>\r\n', '<p>aboutdfasf</p>\r\n', 1, '2018-06-25 13:21:14', '2018-06-25 13:21:14'),
(2, 'Terms & Conditions', 'Terms & Conditions', '<p>aboutfsadfsa</p>\r\n', '<p>aboutdfasf</p>\r\n', 1, '2018-06-25 13:21:14', '2018-06-25 13:21:14'),
(3, 'Privacy & Policy', 'Privacy & Policy', '<p>aboutfsadfsa</p>\r\n', '<p>aboutdfasf</p>\r\n', 1, '2018-06-25 13:21:14', '2018-06-25 13:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `image` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `player_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `password`, `mobile`, `phone`, `description`, `rating`, `image`, `player_id`, `otp`, `status`, `approved`, `created_at`, `updated_at`) VALUES
(4, 'DHL', 'test@gmail.com', '$2y$10$SBKXO6vwhwHhYCUu/DpzM.bfgE0eO8lLdM2WovR0KGr7Od28eo3/m', '12345678', NULL, NULL, NULL, 'company_image_1557908800.png', NULL, '14802', 1, 1, '2019-05-15 08:26:40', '2019-05-16 09:19:51'),
(5, 'Aramex', 'aramextest123@gmail.com', '$2y$10$Wqohj3VJTzWEq2OBd4KH7ekv0vNyA/OJzpS7YpMaCoE0Qjmlm7Jdi', '11223344', NULL, NULL, NULL, 'company_image_1557916171.png', NULL, '36879', 1, 1, '2019-05-15 10:29:31', '2019-05-16 09:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `company_payments`
--

CREATE TABLE `company_payments` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `payment_type` int(1) NOT NULL COMMENT '1- Card, 2- Wallet, 3- Cash',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name_en` varchar(128) NOT NULL,
  `name_ar` varchar(250) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_en`, `name_ar`, `country_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KUWAIT', 'الكويت', '965', 1, '2017-12-23 21:00:00', '2019-04-15 08:34:17'),
(4, 'UAE', 'الامارات', '971', 1, '2018-02-15 17:14:01', '2018-03-20 08:46:19'),
(5, 'SAUDI ARABIA', 'السعودية', '966', 1, '2018-02-15 17:15:13', '2018-03-20 08:46:14'),
(6, 'BAHRAIN', 'البحرين', '973', 1, '2018-02-15 17:17:37', '2018-03-20 08:46:01'),
(7, 'QATAR', 'القطر', '974', 1, '2018-02-15 17:19:23', '2018-03-20 08:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_en` text COLLATE utf8_unicode_ci,
  `question_ar` text COLLATE utf8_unicode_ci,
  `answer_en` text COLLATE utf8_unicode_ci,
  `answer_ar` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_ar` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `name_en`, `name_ar`, `description_en`, `description_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Building Contract', 'Building Contract', '<p>Building Contract</p>\r\n', '<p>Building Contract</p>\r\n', 1, '2018-06-25 13:21:14', '2018-07-17 08:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `knet_payments`
--

CREATE TABLE `knet_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,3) NOT NULL,
  `track_id` bigint(20) DEFAULT NULL,
  `transaction_id` bigint(20) DEFAULT NULL,
  `auth` bigint(20) DEFAULT NULL,
  `reference_id` bigint(20) DEFAULT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language_management`
--

CREATE TABLE `language_management` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `label_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language_management`
--

INSERT INTO `language_management` (`id`, `name`, `title`, `label_en`, `label_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Register success', 'text_successRegistered', 'Successfully registered !', 'سجلت بنجاح !', 1, '2019-04-14 12:36:47', '2019-04-14 12:56:40'),
(2, 'Error mobile', 'text_errorMobile', 'Your have enter wrong mobile number', 'لديك أدخل رقم الجوال خاطئ', 1, '2019-04-14 12:37:16', '2019-04-14 12:56:28'),
(3, 'Account deactivated', 'text_accountDeactivated', 'Your account has been deactivated, Kindly contact Administrator.', 'تم إلغاء تنشيط حسابك ، يرجى الاتصال بالمسؤول.', 1, '2019-04-14 12:37:41', '2019-04-14 12:56:15'),
(4, 'Logged out successfully', 'text_successLoggout', 'Successfully logged out', 'تم تسجيل الخروج بنجاح', 1, '2019-04-14 12:38:00', '2019-04-14 12:55:45'),
(5, 'Token mismatch', 'text_tokenMismatch', 'Token Mismatch', 'عدم تطابق الرمز', 1, '2019-04-14 12:38:39', '2019-04-14 12:55:28'),
(6, 'OTP required', 'text_OTPrequired', 'OTP required', 'مكتب المدعي العام المطلوبة', 1, '2019-04-14 12:39:09', '2019-04-14 12:55:06'),
(7, 'Invalid OTP', 'text_wrongOTP', 'Your have enter wrong OTP!', 'لديك أدخل خطأ مكتب المدعي العام!', 1, '2019-04-14 12:39:42', '2019-04-14 12:54:00'),
(8, 'Language error', 'text_languageError', 'Language parameter required', 'معلمة اللغة المطلوبة', 1, '2019-04-14 14:22:16', '2019-04-14 14:22:42'),
(9, 'Mobile 8 digit required', 'text_errorMobile8Digit', 'Either you have enter wrong mobile number or number not equal to 8 digits', 'إما أن تدخل رقم هاتف خاطئ أو رقمًا لا يساوي 8 أرقام', 1, '2019-04-15 07:40:23', '2019-04-15 07:40:23'),
(10, 'Unauthorized', 'text_unauthorized', 'Unauthorized', 'غير مصرح', 1, '2019-04-15 08:01:11', '2019-04-15 08:01:11'),
(11, 'Error in name', 'text_errorName', 'The name field is required.', 'حقل الاسم مطلوب.', 1, '2019-04-15 08:08:54', '2019-04-15 08:13:51'),
(12, 'Error in country', 'text_errorCountry', 'The country field is required.', 'حقل البلد مطلوب.', 1, '2019-04-15 08:10:01', '2019-04-15 08:19:59'),
(13, 'Error in email', 'text_errorEmail', 'Either email address already exist or invalid.', 'إما أن عنوان البريد الإلكتروني موجود بالفعل أو غير صالح.', 1, '2019-04-15 08:14:40', '2019-04-15 08:19:10'),
(14, 'Updated successfully', 'text_successUpdated', 'Profile Successfully Updated', 'تم تحديث الملف الشخصي بنجاح', 1, '2019-04-15 08:25:28', '2019-04-15 08:25:28'),
(15, 'Mobile number already exist', 'text_mobileNumberExist', 'The mobile number is already registered', 'رقم الجوال مسجل بالفعل', 1, NULL, NULL),
(16, 'Account is not approved', 'text_accountNotApproved', 'Your account is not approved from Masafah', 'حسابك غير معتمد من مصافح', 1, NULL, NULL),
(17, 'Invalid credentials', 'invalid_crendentials', 'Invalid email or password', 'البريد الإلكتروني أو كلمة السر خاطئة', 1, NULL, NULL),
(18, 'Shipment placed success', 'add_shipment_success', 'Shipment has been placed successfully', 'تم وضع الشحنة بنجاح', 1, NULL, NULL),
(19, 'shipment_booked_already', 'Shipment Already booked', 'The shipment is already booked', 'تم حجز الشحنة بالفعل', 1, NULL, NULL),
(20, 'booked', 'Booked', 'Booked', 'حجز', 1, NULL, NULL),
(21, 'picked_up', 'Picked Up', 'Picked up', 'التقط', 1, NULL, NULL),
(22, 'delivered', 'Delivered', 'Delivered', 'تم التوصيل', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` tinyint(1) DEFAULT NULL COMMENT 'Admin:0,Vendor:1,Trainer:2',
  `vendor_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `user_type`, `vendor_id`, `trainer_id`, `created_at`, `updated_at`) VALUES
(1, 'User - afreen has been created by admin', 'http://localhost/quickapp/admin/users', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 12:59:20', '2018-06-25 12:59:20'),
(2, 'Package - Free Package has been created by admin', 'http://localhost/quickapp/admin/packages', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 13:13:29', '2018-06-25 13:13:29'),
(3, 'Package - Free Package has been updated by admin', 'http://localhost/quickapp/admin/packages/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 13:17:31', '2018-06-25 13:17:31'),
(4, 'Package - Free Package has been updated by admin', 'http://localhost/quickapp/admin/packages/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 13:18:27', '2018-06-25 13:18:27'),
(5, 'Package - Free Package has been updated by admin', 'http://localhost/quickapp/admin/packages/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 13:18:49', '2018-06-25 13:18:49'),
(6, 'Package - Free Package has been updated by admin', 'http://localhost/quickapp/admin/packages/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 13:19:02', '2018-06-25 13:19:02'),
(7, 'CmsPage - about has been created by admin', 'http://localhost/quickapp/admin/cmsPages', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 13:21:14', '2018-06-25 13:21:14'),
(8, 'Notification - General has been created by admin', 'http://localhost/quickapp/admin/notifications', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 13:36:23', '2018-06-25 13:36:23'),
(9, 'Country - KUWAITt has been updated by admin', 'http://localhost/quickapp/admin/countries/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 14:19:45', '2018-06-25 14:19:45'),
(10, 'Country - Kuwaitiii has been created by admin', 'http://localhost/quickapp/admin/countries', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 14:23:11', '2018-06-25 14:23:11'),
(11, 'Country - [\"Kuwaitiii\"] has been deleted by admin', 'http://localhost/quickapp/admin/masters/countries/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-25 14:23:21', '2018-06-25 14:23:21'),
(12, 'Category - construction has been created by admin', 'http://localhost/quickapp/admin/categories', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 06:20:08', '2018-06-26 06:20:08'),
(13, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 06:30:03', '2018-06-26 06:30:03'),
(14, 'Category - Sub Const has been created by admin', 'http://localhost/quickapp/admin/categories', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 07:38:37', '2018-06-26 07:38:37'),
(15, 'Category - Sub Sub Constr has been created by admin', 'http://localhost/quickapp/admin/categories', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 07:39:44', '2018-06-26 07:39:44'),
(16, 'Category - Sub Const has been updated by admin', 'http://localhost/quickapp/admin/categories/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 09:35:52', '2018-06-26 09:35:52'),
(17, 'Category - Sub Const has been updated by admin', 'http://localhost/quickapp/admin/categories/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 09:36:36', '2018-06-26 09:36:36'),
(18, 'Category - Sub Sub Constr has been updated by admin', 'http://localhost/quickapp/admin/categories/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 09:53:51', '2018-06-26 09:53:51'),
(19, 'Category - Sub Sub Constr has been updated by admin', 'http://localhost/quickapp/admin/categories/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 09:55:57', '2018-06-26 09:55:57'),
(20, 'Category - Sub Sub Constr has been updated by admin', 'http://localhost/quickapp/admin/categories/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 09:56:15', '2018-06-26 09:56:15'),
(21, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 10:45:38', '2018-06-26 10:45:38'),
(22, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 10:46:49', '2018-06-26 10:46:49'),
(23, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 10:49:42', '2018-06-26 10:49:42'),
(24, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 10:52:18', '2018-06-26 10:52:18'),
(25, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 10:53:53', '2018-06-26 10:53:53'),
(26, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 10:57:04', '2018-06-26 10:57:04'),
(27, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:01:22', '2018-06-26 11:01:22'),
(28, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:02:08', '2018-06-26 11:02:08'),
(29, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:05:03', '2018-06-26 11:05:03'),
(30, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:09:44', '2018-06-26 11:09:44'),
(31, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:10:07', '2018-06-26 11:10:07'),
(32, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:10:31', '2018-06-26 11:10:31'),
(33, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:10:55', '2018-06-26 11:10:55'),
(34, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:11:43', '2018-06-26 11:11:43'),
(35, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:12:51', '2018-06-26 11:12:51'),
(36, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:13:50', '2018-06-26 11:13:50'),
(37, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:14:12', '2018-06-26 11:14:12'),
(38, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:15:37', '2018-06-26 11:15:37'),
(39, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 11:54:26', '2018-06-26 11:54:26'),
(40, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 12:02:54', '2018-06-26 12:02:54'),
(41, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 12:06:04', '2018-06-26 12:06:04'),
(42, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 12:07:27', '2018-06-26 12:07:27'),
(43, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 12:07:56', '2018-06-26 12:07:56'),
(44, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 12:12:16', '2018-06-26 12:12:16'),
(45, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 12:13:45', '2018-06-26 12:13:45'),
(46, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 12:22:33', '2018-06-26 12:22:33'),
(47, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 12:22:55', '2018-06-26 12:22:55'),
(48, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 12:30:51', '2018-06-26 12:30:51'),
(49, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:04:11', '2018-06-26 13:04:11'),
(50, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:11:25', '2018-06-26 13:11:25'),
(51, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:16:36', '2018-06-26 13:16:36'),
(52, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:23:50', '2018-06-26 13:23:50'),
(53, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:26:43', '2018-06-26 13:26:43'),
(54, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:28:54', '2018-06-26 13:28:54'),
(55, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:36:07', '2018-06-26 13:36:07'),
(56, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:36:29', '2018-06-26 13:36:29'),
(57, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:41:55', '2018-06-26 13:41:55'),
(58, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:42:45', '2018-06-26 13:42:45'),
(59, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:46:24', '2018-06-26 13:46:24'),
(60, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:48:01', '2018-06-26 13:48:01'),
(61, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-26 13:48:23', '2018-06-26 13:48:23'),
(62, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 06:50:56', '2018-06-27 06:50:56'),
(63, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 06:53:35', '2018-06-27 06:53:35'),
(64, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 06:53:59', '2018-06-27 06:53:59'),
(65, 'Category - construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 06:54:19', '2018-06-27 06:54:19'),
(66, 'Category - Furniture and Wood Work has been created by admin', 'http://localhost/quickapp/admin/categories', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:00:16', '2018-06-27 07:00:16'),
(67, 'Category - Furniture and Wood Work has been updated by admin', 'http://localhost/quickapp/admin/categories/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:00:53', '2018-06-27 07:00:53'),
(68, 'Category - Eng and Co. has been updated by admin', 'http://localhost/quickapp/admin/categories/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:01:28', '2018-06-27 07:01:28'),
(69, 'Category - Furniture and Wood Work has been updated by admin', 'http://localhost/quickapp/admin/categories/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:02:21', '2018-06-27 07:02:21'),
(70, 'Category - Painters has been updated by admin', 'http://localhost/quickapp/admin/categories/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:02:45', '2018-06-27 07:02:45'),
(71, 'Category - Plumber Work has been created by admin', 'http://localhost/quickapp/admin/categories', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:04:27', '2018-06-27 07:04:27'),
(72, 'Category - Plumber Work has been created by admin', 'http://localhost/quickapp/admin/categories', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:05:00', '2018-06-27 07:05:00'),
(73, 'Category - Plumber Work has been created by admin', 'http://localhost/quickapp/admin/categories', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:06:11', '2018-06-27 07:06:11'),
(74, 'Category - Plumber Work has been created by admin', 'http://localhost/quickapp/admin/categories', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:06:39', '2018-06-27 07:06:39'),
(75, 'Category - Sanitary has been updated by admin', 'http://localhost/quickapp/admin/categories/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:07:18', '2018-06-27 07:07:18'),
(76, 'Category - Sanitary has been updated by admin', 'http://localhost/quickapp/admin/categories/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:07:34', '2018-06-27 07:07:34'),
(77, 'Category - Air Conditioning has been updated by admin', 'http://localhost/quickapp/admin/categories/7', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:08:03', '2018-06-27 07:08:03'),
(78, 'Category - Air Conditioning has been updated by admin', 'http://localhost/quickapp/admin/categories/7', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:08:19', '2018-06-27 07:08:19'),
(79, 'Category - Ready Mix concrete has been updated by admin', 'http://localhost/quickapp/admin/categories/8', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:08:49', '2018-06-27 07:08:49'),
(80, 'Category - Ready Mix concrete has been updated by admin', 'http://localhost/quickapp/admin/categories/8', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:09:03', '2018-06-27 07:09:03'),
(81, 'Category - Plumber Work has been updated by admin', 'http://localhost/quickapp/admin/categories/5', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:09:29', '2018-06-27 07:09:29'),
(82, 'Category - Sanitary has been updated by admin', 'http://localhost/quickapp/admin/categories/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:09:42', '2018-06-27 07:09:42'),
(83, 'Category - Painters has been updated by admin', 'http://localhost/quickapp/admin/categories/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:20:58', '2018-06-27 07:20:58'),
(84, 'Category - Construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:24:51', '2018-06-27 07:24:51'),
(85, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:58:45', '2018-06-27 07:58:45'),
(86, 'Banner Images has been deleted by admin', 'http://localhost/quickapp/admin/bannerImages/deleteImage/1', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:59:38', '2018-06-27 07:59:38'),
(87, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 07:59:54', '2018-06-27 07:59:54'),
(88, 'Banner Images has been deleted by admin', 'http://localhost/quickapp/admin/bannerImages/deleteImage/2', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:01:12', '2018-06-27 08:01:12'),
(89, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:01:18', '2018-06-27 08:01:18'),
(90, 'Banner Images has been deleted by admin', 'http://localhost/quickapp/admin/bannerImages/deleteImage/3', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:01:52', '2018-06-27 08:01:52'),
(91, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:02:04', '2018-06-27 08:02:04'),
(92, 'Banner Images has been deleted by admin', 'http://localhost/quickapp/admin/bannerImages/deleteImage/4', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:02:17', '2018-06-27 08:02:17'),
(93, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:02:26', '2018-06-27 08:02:26'),
(94, 'Banner Images has been deleted by admin', 'http://localhost/quickapp/admin/bannerImages/deleteImage/5', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:02:55', '2018-06-27 08:02:55'),
(95, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:04:24', '2018-06-27 08:04:24'),
(96, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:04:43', '2018-06-27 08:04:43'),
(97, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:05:03', '2018-06-27 08:05:03'),
(98, 'Banner Images has been deleted by admin', 'http://localhost/quickapp/admin/bannerImages/deleteImage/8', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:06:46', '2018-06-27 08:06:46'),
(99, 'Banner Images has been deleted by admin', 'http://localhost/quickapp/admin/bannerImages/deleteImage/7', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:06:48', '2018-06-27 08:06:48'),
(100, 'Banner Images has been deleted by admin', 'http://localhost/quickapp/admin/bannerImages/deleteImage/6', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:07:10', '2018-06-27 08:07:10'),
(101, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:07:21', '2018-06-27 08:07:21'),
(102, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:08:07', '2018-06-27 08:08:07'),
(103, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:09:19', '2018-06-27 08:09:19'),
(104, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:09:37', '2018-06-27 08:09:37'),
(105, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:18:07', '2018-06-27 08:18:07'),
(106, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:18:52', '2018-06-27 08:18:52'),
(107, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:19:10', '2018-06-27 08:19:10'),
(108, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:31:08', '2018-06-27 08:31:08'),
(109, 'Banner Images has been uploaded by admin', 'http://localhost/quickapp/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 08:31:27', '2018-06-27 08:31:27'),
(110, 'RegisteredUser -  has been created by admin', 'http://localhost/quickapp/admin/registeredUsers', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 09:38:59', '2018-06-27 09:38:59'),
(111, 'RegisteredUser -  has been updated by admin', 'http://localhost/quickapp/admin/registeredUsers/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 09:49:33', '2018-06-27 09:49:33'),
(112, 'RegisteredUser -  has been updated by admin', 'http://localhost/quickapp/admin/registeredUsers/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 09:50:06', '2018-06-27 09:50:06'),
(113, 'RegisteredUser -  has been updated by admin', 'http://localhost/quickapp/admin/registeredUsers/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 09:58:18', '2018-06-27 09:58:18'),
(114, 'RegisteredUser -  has been created by admin', 'http://localhost/quickapp/admin/serviceProviders', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 14:00:45', '2018-06-27 14:00:45'),
(115, 'RegisteredUser - Shams has been updated by admin', 'http://localhost/quickapp/admin/serviceProviders/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 14:39:12', '2018-06-27 14:39:12'),
(116, 'RegisteredUser - Shams has been updated by admin', 'http://localhost/quickapp/admin/serviceProviders/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 14:40:17', '2018-06-27 14:40:17'),
(117, 'RegisteredUser - Shams has been updated by admin', 'http://localhost/quickapp/admin/serviceProviders/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 14:40:54', '2018-06-27 14:40:54'),
(118, 'RegisteredUser - [null] has been trashed by admin', 'http://localhost/quickapp/admin/serviceProviders/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 14:41:57', '2018-06-27 14:41:57'),
(119, 'RegisteredUser -  has been restore by admin', 'http://localhost/quickapp/admin/registeredUsers/trashed/2/restore', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-27 14:42:14', '2018-06-27 14:42:14'),
(120, 'RegisteredUser - Mintra has been created by admin', 'http://localhost/quickapp/admin/serviceProviders', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 07:10:21', '2018-06-28 07:10:21'),
(121, 'RegisteredUser -  has been created by admin', 'http://localhost/quickapp/admin/registeredUsers', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 07:35:24', '2018-06-28 07:35:24'),
(122, 'Service Provider -Mintra Image has been uploaded by admin', 'http://localhost/quickapp/admin/serviceProviders/3/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 09:08:07', '2018-06-28 09:08:07'),
(123, 'Service Provider -Mintra Image has been uploaded by admin', 'http://localhost/quickapp/admin/serviceProviders/3/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 09:10:20', '2018-06-28 09:10:20'),
(124, 'Service Provider -Mintra Image has been uploaded by admin', 'http://localhost/quickapp/admin/serviceProviders/3/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 09:12:50', '2018-06-28 09:12:50'),
(125, 'Service Provider -Mintra Image has been uploaded by admin', 'http://localhost/quickapp/admin/serviceProviders/3/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 09:13:40', '2018-06-28 09:13:40'),
(126, 'Service Provider -Mintra Image has been deleted by admin', 'http://localhost/quickapp/admin/serviceProviders/deleteImage/3', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 09:13:59', '2018-06-28 09:13:59'),
(127, 'Service Provider -Mintra Image has been uploaded by admin', 'http://localhost/quickapp/admin/serviceProviders/3/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 09:14:53', '2018-06-28 09:14:53'),
(128, 'Service Provider -Mintra Image has been deleted by admin', 'http://localhost/quickapp/admin/serviceProviders/deleteImage/4', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 09:15:54', '2018-06-28 09:15:54'),
(129, 'Service Provider -Mintra Image has been uploaded by admin', 'http://localhost/quickapp/admin/serviceProviders/3/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 09:16:11', '2018-06-28 09:16:11'),
(130, 'Service Provider -Mintra Image has been deleted by admin', 'http://localhost/quickapp/admin/serviceProviders/deleteImage/5', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-06-28 09:16:24', '2018-06-28 09:16:24'),
(131, 'RegisteredUser -  has been created by admin', 'http://localhost/quickapp/admin/registeredUsers', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-02 09:08:21', '2018-07-02 09:08:21'),
(132, 'Category - Construction has been updated by admin', 'http://localhost/quickapp/admin/categories/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:11:07', '2018-07-03 13:11:07'),
(133, 'RegisteredUser - Mintra has been updated by admin', 'http://localhost/quickapp/admin/serviceProviders/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:14:28', '2018-07-03 13:14:28'),
(134, 'RegisteredUser - Mintra has been updated by admin', 'http://localhost/quickapp/admin/serviceProviders/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:15:08', '2018-07-03 13:15:08'),
(135, 'RegisteredUser - Mintra has been updated by admin', 'http://localhost/quickapp/admin/serviceProviders/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:19:53', '2018-07-03 13:19:53'),
(136, 'RegisteredUser - Shams has been updated by admin', 'http://localhost/quickapp/admin/serviceProviders/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:20:06', '2018-07-03 13:20:06'),
(137, 'RegisteredUser - Makaan has been created by admin', 'http://localhost/quickapp/admin/serviceProviders', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:38:30', '2018-07-03 13:38:30'),
(138, 'RegisteredUser - fda has been created by admin', 'http://localhost/quickapp/admin/serviceProviders', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:44:19', '2018-07-03 13:44:19'),
(139, 'RegisteredUser - [null] has been trashed by admin', 'http://localhost/quickapp/admin/serviceProviders/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:44:30', '2018-07-03 13:44:30'),
(140, 'RegisteredUser - [\"Arshad\"] has been trashed by admin', 'http://localhost/quickapp/admin/registeredUsers/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:51:26', '2018-07-03 13:51:26'),
(141, 'RegisteredUser - Arshad has been restore by admin', 'http://localhost/quickapp/admin/registeredUsers/trashed/1/restore', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-03 13:53:25', '2018-07-03 13:53:25'),
(142, 'Service Provider -Shams Image has been uploaded by admin', 'http://localhost/benabase/admin/serviceProviders/2/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-04 12:19:29', '2018-07-04 12:19:29'),
(143, 'Service Provider -Shams Image has been uploaded by admin', 'http://localhost/benabase/admin/serviceProviders/2/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-04 12:19:31', '2018-07-04 12:19:31'),
(144, 'Service Provider -Shams Image has been uploaded by admin', 'http://localhost/benabase/admin/serviceProviders/2/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-04 12:19:33', '2018-07-04 12:19:33'),
(145, 'Information - Building Contract has been updated by admin', 'http://localhost/benabase/admin/information/1', 'PATCH', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 08:29:39', '2018-07-17 08:29:39'),
(146, 'Service - Service1 has been created by admin', 'http://localhost/benabase/admin/services/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 12:13:43', '2018-07-17 12:13:43'),
(147, 'Service - service has been created by admin', 'http://localhost/benabase/admin/services/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 12:18:19', '2018-07-17 12:18:19'),
(148, 'Service - Service2 has been created by admin', 'http://localhost/benabase/admin/services/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 12:20:45', '2018-07-17 12:20:45'),
(149, 'Service - Service21 has been updated by admin', 'http://localhost/benabase/admin/services/1', 'PATCH', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 12:29:28', '2018-07-17 12:29:28'),
(150, 'Service - Service2 has been updated by admin', 'http://localhost/benabase/admin/services/1/1', 'PATCH', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 12:31:38', '2018-07-17 12:31:38'),
(151, 'Service - [\"Service2\"] has been deleted by admin', 'http://localhost/benabase/admin/services/delete/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 12:36:10', '2018-07-17 12:36:10'),
(152, 'Service - service3 has been created by admin', 'http://localhost/benabase/admin/services/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 12:36:39', '2018-07-17 12:36:39'),
(153, 'Service - [\"service3\"] has been deleted by admin', 'http://localhost/benabase/admin/services/delete/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 12:36:59', '2018-07-17 12:36:59'),
(154, 'Service - Materials Supply has been created by admin', 'http://localhost/benabase/admin/services/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-17 14:01:50', '2018-07-17 14:01:50'),
(155, 'Service - Bricks has been created by admin', 'http://localhost/benabase/admin/services/2', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 06:35:43', '2018-07-18 06:35:43'),
(156, 'RegisteredUser - Makaan has been updated by admin', 'http://localhost/benabase/admin/serviceProviders/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 09:39:34', '2018-07-18 09:39:34'),
(157, 'RegisteredUser - Mintra has been updated by admin', 'http://localhost/benabase/admin/serviceProviders/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 09:40:03', '2018-07-18 09:40:03'),
(158, 'RegisteredUser - Makaan has been updated by admin', 'http://localhost/benabase/admin/serviceProviders/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 09:40:28', '2018-07-18 09:40:28'),
(159, 'RegisteredUser - Shams has been updated by admin', 'http://localhost/benabase/admin/serviceProviders/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 09:42:36', '2018-07-18 09:42:36'),
(160, 'Service Provider -Shams Service - Bricks has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 11:51:43', '2018-07-18 11:51:43'),
(161, 'Service Provider -Shams Service - Bricks has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 11:56:08', '2018-07-18 11:56:08'),
(162, 'Service Provider -Shams Service - Brick has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:11:00', '2018-07-18 12:11:00'),
(163, 'Service Provider -Shams Service - Brick has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:13:52', '2018-07-18 12:13:52'),
(164, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:14:46', '2018-07-18 12:14:46'),
(165, 'Service Provider -Shams Service - Bricks has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:15:02', '2018-07-18 12:15:02'),
(166, 'Service Provider -Shams Service - Bricks has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:15:03', '2018-07-18 12:15:03'),
(167, 'Service Provider -Shams Service - Bricksdd has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:15:17', '2018-07-18 12:15:17'),
(168, 'Service Provider -Shams Service - Bricksdd has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:15:17', '2018-07-18 12:15:17'),
(169, 'Service Provider -Shams Service - Bricksdd has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:15:17', '2018-07-18 12:15:17'),
(170, 'Service Provider -Shams Service - Bricks has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:15:59', '2018-07-18 12:15:59'),
(171, 'Service Provider -Shams Service - Bricks has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:15:59', '2018-07-18 12:15:59'),
(172, 'Service Provider -Shams Service - Bricks has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:15:59', '2018-07-18 12:15:59'),
(173, 'Service Provider -Shams Service - Bricks has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:15:59', '2018-07-18 12:15:59'),
(174, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:16:31', '2018-07-18 12:16:31'),
(175, 'Service Provider -Shams Service - Bricks has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:17:17', '2018-07-18 12:17:17'),
(176, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:17:29', '2018-07-18 12:17:29'),
(177, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:17:29', '2018-07-18 12:17:29'),
(178, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:20:40', '2018-07-18 12:20:40'),
(179, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:21:42', '2018-07-18 12:21:42'),
(180, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:25:42', '2018-07-18 12:25:42'),
(181, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:25:54', '2018-07-18 12:25:54'),
(182, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:25:54', '2018-07-18 12:25:54'),
(183, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:26:06', '2018-07-18 12:26:06'),
(184, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:26:06', '2018-07-18 12:26:06'),
(185, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:26:06', '2018-07-18 12:26:06'),
(186, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:28:02', '2018-07-18 12:28:02');
INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `user_type`, `vendor_id`, `trainer_id`, `created_at`, `updated_at`) VALUES
(187, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:28:09', '2018-07-18 12:28:09'),
(188, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:28:10', '2018-07-18 12:28:10'),
(189, 'Service Provider -Shams Service - Cement has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:31:30', '2018-07-18 12:31:30'),
(190, 'Service Provider -Shams Service - Tools has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:37:41', '2018-07-18 12:37:41'),
(191, 'Service Provider -Shams Service - Tools has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:40:31', '2018-07-18 12:40:31'),
(192, 'Service Provider -Shams Service - Tools has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:40:31', '2018-07-18 12:40:31'),
(193, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:42:30', '2018-07-18 12:42:30'),
(194, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:44:28', '2018-07-18 12:44:28'),
(195, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:45:28', '2018-07-18 12:45:28'),
(196, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:46:11', '2018-07-18 12:46:11'),
(197, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:46:20', '2018-07-18 12:46:20'),
(198, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:46:20', '2018-07-18 12:46:20'),
(199, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:46:28', '2018-07-18 12:46:28'),
(200, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:46:28', '2018-07-18 12:46:28'),
(201, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:46:28', '2018-07-18 12:46:28'),
(202, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:51:45', '2018-07-18 12:51:45'),
(203, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:51:54', '2018-07-18 12:51:54'),
(204, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:52:01', '2018-07-18 12:52:01'),
(205, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:52:41', '2018-07-18 12:52:41'),
(206, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:53:10', '2018-07-18 12:53:10'),
(207, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:53:31', '2018-07-18 12:53:31'),
(208, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:53:39', '2018-07-18 12:53:39'),
(209, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:55:01', '2018-07-18 12:55:01'),
(210, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:57:38', '2018-07-18 12:57:38'),
(211, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 12:58:19', '2018-07-18 12:58:19'),
(212, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:01:01', '2018-07-18 13:01:01'),
(213, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:02:49', '2018-07-18 13:02:49'),
(214, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:02:56', '2018-07-18 13:02:56'),
(215, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:04:45', '2018-07-18 13:04:45'),
(216, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:07:47', '2018-07-18 13:07:47'),
(217, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:08:32', '2018-07-18 13:08:32'),
(218, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:11:44', '2018-07-18 13:11:44'),
(219, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:14:08', '2018-07-18 13:14:08'),
(220, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:14:48', '2018-07-18 13:14:48'),
(221, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:15:11', '2018-07-18 13:15:11'),
(222, 'Service Provider -Shams Service - Brickss has been created by admin', 'http://localhost/benabase/admin/serviceProviders/2/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:15:23', '2018-07-18 13:15:23'),
(223, 'Service Provider -Shams Services - Shams has been deleted by admin', 'http://localhost/benabase/admin/serviceProviders/2/service/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:32:58', '2018-07-18 13:32:58'),
(224, 'Service Provider -Makaan Service - Tools has been created by admin', 'http://localhost/benabase/admin/serviceProviders/6/addService', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:33:53', '2018-07-18 13:33:53'),
(225, 'Service Provider -Makaan Services - Makaan has been deleted by admin', 'http://localhost/benabase/admin/serviceProviders/6/service/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 13:34:04', '2018-07-18 13:34:04'),
(226, 'RegisteredUser - Shams has been updated by admin', 'http://localhost/benabase/admin/serviceProviders/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 14:14:34', '2018-07-18 14:14:34'),
(227, 'RegisteredUser - Shams has been updated by admin', 'http://localhost/benabase/admin/serviceProviders/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 14:15:35', '2018-07-18 14:15:35'),
(228, 'RegisteredUser - Makaan has been updated by admin', 'http://localhost/benabase/admin/serviceProviders/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-07-18 14:19:31', '2018-07-18 14:19:31'),
(229, 'Banner Images has been uploaded by admin', 'http://localhost/benabase/admin/bannerImages/images', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', 1, 0, 0, 0, '2018-07-23 12:17:10', '2018-07-23 12:17:10'),
(230, 'RegisteredUser - Makaan has been updated by admin', 'http://localhost/benabase/admin/serviceProviders/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', 1, 0, 0, 0, '2018-07-29 12:18:34', '2018-07-29 12:18:34'),
(231, 'RegisteredUser - Makaan has been updated by admin', 'http://localhost/benabase/admin/serviceProviders/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', 1, 0, 0, 0, '2018-07-29 12:19:50', '2018-07-29 12:19:50'),
(232, 'User - afreen has been updated by admin', 'http://localhost/benabase/admin/users/5', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 10:28:53', '2018-08-04 10:28:53'),
(233, 'User - sheikh has been updated by admin', 'http://localhost/benabase/admin/users/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 11:46:50', '2018-08-04 11:46:50'),
(234, 'User - salman has been updated by admin', 'http://localhost/benabase/admin/users/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 11:47:37', '2018-08-04 11:47:37'),
(235, 'User - admin has been updated profile by admin', 'http://localhost/benabase/admin/user/profile', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 11:59:22', '2018-08-04 11:59:22'),
(236, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:22:11', '2018-08-04 12:22:11'),
(237, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:29:29', '2018-08-04 12:29:29'),
(238, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:46:19', '2018-08-04 12:46:19'),
(239, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:46:37', '2018-08-04 12:46:37'),
(240, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:50:11', '2018-08-04 12:50:11'),
(241, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:50:27', '2018-08-04 12:50:27'),
(242, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:50:45', '2018-08-04 12:50:45'),
(243, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:53:22', '2018-08-04 12:53:22'),
(244, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:54:22', '2018-08-04 12:54:22'),
(245, 'Permission - Supervisor has been updated by admin', 'http://localhost/benabase/admin/permissions/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 12:57:46', '2018-08-04 12:57:46'),
(246, 'Information - [\"Building Contract\"] has been deleted by admin', 'http://localhost/benabase/admin/information/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', 1, 0, 0, 0, '2018-08-04 13:07:16', '2018-08-04 13:07:16'),
(247, 'User - [\"afreen\",\"narendra\",\"salman\",\"sheikh\"] has been deleted by admin', 'http://localhost/events/admin/users/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 1, 0, 0, 0, '2018-12-26 09:13:51', '2018-12-26 09:13:51'),
(248, 'User - hashim has been created by admin', 'http://localhost/events/admin/users', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 1, 0, 0, 0, '2018-12-26 09:14:40', '2018-12-26 09:14:40'),
(249, 'User - hashim has been updated by admin', 'http://localhost/events/admin/users/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 1, 0, 0, 0, '2018-12-26 09:14:50', '2018-12-26 09:14:50'),
(250, 'User - hashim has been updated by admin', 'http://localhost/events/admin/users/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 1, 0, 0, 0, '2018-12-26 09:14:58', '2018-12-26 09:14:58'),
(251, 'User - admin has been change password by admin', 'http://localhost/events/admin/user/changepassword', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 1, 0, 0, 0, '2018-12-26 09:16:31', '2018-12-26 09:16:31'),
(252, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/5', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 07:53:30', '2019-04-08 07:53:30'),
(253, 'RegisteredUser -  has been created by admin', 'http://localhost/masafah/admin/registeredUsers', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 08:01:18', '2019-04-08 08:01:18'),
(254, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/8', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 08:52:01', '2019-04-08 08:52:01'),
(255, 'RegisteredUser -  has been created by admin', 'http://localhost/masafah/admin/registeredUsers', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 08:55:05', '2019-04-08 08:55:05'),
(256, 'RegisteredUser - [null,null,null,\"dfasf\"] has been trashed by admin', 'http://localhost/masafah/admin/registeredUsers/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 08:55:15', '2019-04-08 08:55:15'),
(257, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/8', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:38:21', '2019-04-08 09:38:21'),
(258, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/8', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:38:49', '2019-04-08 09:38:49'),
(259, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/8', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:46:09', '2019-04-08 09:46:09'),
(260, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/8', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:46:35', '2019-04-08 09:46:35'),
(261, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/5', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:46:53', '2019-04-08 09:46:53'),
(262, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/5', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:47:09', '2019-04-08 09:47:09'),
(263, 'RegisteredUser -  has been created by admin', 'http://localhost/masafah/admin/registeredUsers', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:54:34', '2019-04-08 09:54:34'),
(264, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/10', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:55:10', '2019-04-08 09:55:10'),
(265, 'RegisteredUser - [\"taher\"] has been trashed by admin', 'http://localhost/masafah/admin/registeredUsers/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:58:42', '2019-04-08 09:58:42'),
(266, 'RegisteredUser -  has been created by admin', 'http://localhost/masafah/admin/registeredUsers', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 09:59:48', '2019-04-08 09:59:48'),
(267, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/11', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 10:00:14', '2019-04-08 10:00:14'),
(268, 'RegisteredUser -  has been created by admin', 'http://localhost/masafah/admin/registeredUsers', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 10:01:01', '2019-04-08 10:01:01'),
(269, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/12', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 10:01:20', '2019-04-08 10:01:20'),
(270, 'RegisteredUser - [\"teatea\",\"tagee\"] has been trashed by admin', 'http://localhost/masafah/admin/registeredUsers/delete', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-08 10:01:42', '2019-04-08 10:01:42'),
(271, 'LanguageManagement - Successfully registered ! has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:36:47', '2019-04-14 12:36:47'),
(272, 'LanguageManagement - Your have enter wrong mobile number has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:37:16', '2019-04-14 12:37:16'),
(273, 'LanguageManagement - Your account has been deactivated, Kindly contact Administrator. has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:37:41', '2019-04-14 12:37:41'),
(274, 'LanguageManagement - Successfully logged out has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:38:00', '2019-04-14 12:38:00'),
(275, 'LanguageManagement - Token Mismatch has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:38:39', '2019-04-14 12:38:39'),
(276, 'LanguageManagement - OTP required has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:39:09', '2019-04-14 12:39:09'),
(277, 'LanguageManagement - Your have enter wrong OTP! has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:39:42', '2019-04-14 12:39:42'),
(278, 'LanguageManagement - Your have enter wrong OTP! has been updated by admin', 'http://localhost/masafah/admin/languageManagement/7', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:52:06', '2019-04-14 12:52:06'),
(279, 'LanguageManagement - Your have enter wrong OTP! has been updated by admin', 'http://localhost/masafah/admin/languageManagement/7', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:52:29', '2019-04-14 12:52:29'),
(280, 'LanguageManagement - Your have enter wrong OTP! has been updated by admin', 'http://localhost/masafah/admin/languageManagement/7', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:54:00', '2019-04-14 12:54:00'),
(281, 'LanguageManagement - Your have enter wrong OTP! has been updated by admin', 'http://localhost/masafah/admin/languageManagement/7', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:54:10', '2019-04-14 12:54:10'),
(282, 'LanguageManagement - OTP required has been updated by admin', 'http://localhost/masafah/admin/languageManagement/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:55:06', '2019-04-14 12:55:06'),
(283, 'LanguageManagement - Token Mismatch has been updated by admin', 'http://localhost/masafah/admin/languageManagement/5', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:55:28', '2019-04-14 12:55:28'),
(284, 'LanguageManagement - Successfully logged out has been updated by admin', 'http://localhost/masafah/admin/languageManagement/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:55:45', '2019-04-14 12:55:45'),
(285, 'LanguageManagement - Your account has been deactivated, Kindly contact Administrator. has been updated by admin', 'http://localhost/masafah/admin/languageManagement/3', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:56:15', '2019-04-14 12:56:15'),
(286, 'LanguageManagement - Your have enter wrong mobile number has been updated by admin', 'http://localhost/masafah/admin/languageManagement/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:56:28', '2019-04-14 12:56:28'),
(287, 'LanguageManagement - Successfully registered ! has been updated by admin', 'http://localhost/masafah/admin/languageManagement/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 12:56:40', '2019-04-14 12:56:40'),
(288, 'LanguageManagement - Language parameter required has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 14:22:16', '2019-04-14 14:22:16'),
(289, 'LanguageManagement - Language parameter required has been updated by admin', 'http://localhost/masafah/admin/languageManagement/8', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-14 14:22:42', '2019-04-14 14:22:42'),
(290, 'LanguageManagement - Either you have enter wrong mobile number or number not equal to 8 digits has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 07:40:23', '2019-04-15 07:40:23'),
(291, 'LanguageManagement - Unauthorized has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:01:11', '2019-04-15 08:01:11'),
(292, 'LanguageManagement - Name is required has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:08:54', '2019-04-15 08:08:54'),
(293, 'LanguageManagement - Country is required has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:10:01', '2019-04-15 08:10:01'),
(294, 'LanguageManagement - The name field is required. has been updated by admin', 'http://localhost/masafah/admin/languageManagement/11', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:13:51', '2019-04-15 08:13:51'),
(295, 'LanguageManagement - The country id field is required. has been updated by admin', 'http://localhost/masafah/admin/languageManagement/12', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:14:14', '2019-04-15 08:14:14'),
(296, 'LanguageManagement - The email field is required. has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:14:40', '2019-04-15 08:14:40'),
(297, 'LanguageManagement - Either email address already exist or invalid. has been updated by admin', 'http://localhost/masafah/admin/languageManagement/13', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:19:10', '2019-04-15 08:19:10'),
(298, 'LanguageManagement - The country field is required. has been updated by admin', 'http://localhost/masafah/admin/languageManagement/12', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:19:59', '2019-04-15 08:19:59'),
(299, 'LanguageManagement - Profile Successfully Updated has been created by admin', 'http://localhost/masafah/admin/languageManagement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:25:28', '2019-04-15 08:25:28'),
(300, 'Country - KUWAIT has been updated by admin', 'http://localhost/masafah/admin/countries/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:34:17', '2019-04-15 08:34:17'),
(301, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/26', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:34:28', '2019-04-15 08:34:28'),
(302, 'RegisteredUser -  has been updated by admin', 'http://localhost/masafah/admin/registeredUsers/26', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1, 0, 0, 0, '2019-04-15 08:39:25', '2019-04-15 08:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_to` tinyint(1) DEFAULT NULL COMMENT 'All Application Users:0,Registered Users:1,Non-Register Users:2',
  `subject` text COLLATE utf8_unicode_ci,
  `subject_ar` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci,
  `message_ar` text COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci,
  `notification_date` datetime DEFAULT NULL,
  `sent_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `send_to`, `subject`, `subject_ar`, `message`, `message_ar`, `link`, `notification_date`, `sent_status`, `created_at`, `updated_at`) VALUES
(1, 0, 'General', 'General', 'General', 'General', '', '2018-06-26 16:35:00', 0, '2018-06-25 13:36:23', '2018-06-25 13:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0459104bd0ac8658eb3ff0e43fb9be0fd46f2dc8b2f4d8dcc4745a744660aaadd40a4ef75001222e', 26, 1, '87988798', '[\"*\"]', 0, '2019-04-14 12:28:36', '2019-04-14 12:28:36', '2029-04-14 15:28:36'),
('185219c7162633e2ebde5982df4b816ef21f344f4482c1943c40f8c7979d5f18f242a481f391e2fd', 2, 1, '25725725', '[\"*\"]', 1, '2019-04-14 08:32:24', '2019-04-14 08:32:24', '2029-04-14 11:32:24'),
('261e34eea89e24841b6d0f1009db47ba3d2517675dc6c9a4a6389110edea71d325716315f68778b2', 32, 3, '88877766', '[\"*\"]', 0, '2019-04-30 12:03:28', '2019-04-30 12:03:28', '2029-04-30 15:03:28'),
('456f6e395762f0cc1f9d705eb1c28486dc2379aa2ee299d2f933d67ab25ecfdb05f82662a8a4027d', 2, 1, '25725725', '[\"*\"]', 1, '2019-04-14 10:18:11', '2019-04-14 10:18:11', '2029-04-14 13:18:11'),
('469a33c0fafc9a9c16d678ab794a12551debb6fdd47483fe3a3e5cdb858e7aa321d75cd418aeac05', 1, 3, 'Masafah', '[]', 0, '2019-05-13 11:18:10', '2019-05-13 11:18:10', '2020-05-13 14:18:10'),
('57970b6114e0a9e0ffda50e65abaa153f9cda3af435e2cebc1ca6ec58ffa081015d18c8e4fd26858', 1, 3, 'Masafah', '[]', 0, '2019-05-13 13:02:38', '2019-05-13 13:02:38', '2020-05-13 16:02:38'),
('6ea575a97eec78005c3314e03c7dc488ddfd2233856d80ff32431bc26cbd06302b7d27b08a4b9729', 26, 3, '87988798', '[\"*\"]', 0, '2019-05-13 12:30:57', '2019-05-13 12:30:57', '2020-05-13 15:30:57'),
('7fcf23f65869f701a7d621b0dcb56b6678d1d3b49948549d3d64f84aeed38a08fea9cc1ae8b358a5', 2, 1, '25725725', '[\"*\"]', 0, '2019-04-14 08:29:28', '2019-04-14 08:29:28', '2029-04-14 11:29:28'),
('877381cca0122f6f7511727d2a66625b65daff1f3d8b3b973075a9853d9ea92c2fe2dcb894333706', 26, 1, '87988798', '[\"*\"]', 0, '2019-04-14 14:16:16', '2019-04-14 14:16:16', '2029-04-14 17:16:16'),
('a980c95025f907bd5bf4dca7a144ed61724dc1312c78df4a90d0e5c0a9f94fbd6d1c8377dae771be', 32, 3, '88877766', '[\"*\"]', 0, '2019-04-30 11:35:03', '2019-04-30 11:35:03', '2029-04-30 14:35:03'),
('b2618b623fe9f9ddd3382885555c5aec555eb7195ba52d8f21fc8b6f973b6ee395d430498d5dd241', 26, 1, '87988798', '[\"*\"]', 0, '2019-04-14 14:19:17', '2019-04-14 14:19:17', '2029-04-14 17:19:17'),
('b2f0f41efde71b627aa2f1c8ce3707989a1e6e2cb0d0a29eb6e0e0c6a7250302520b47f71943eb24', 2, 3, 'Masafah', '[]', 0, '2019-05-13 11:25:52', '2019-05-13 11:25:52', '2020-05-13 14:25:52'),
('c44aac173841b2cd7b5e406881616e54b7d1d2f0a0d500dd2a42fd922c56ac51a24d5a3a17b32a5d', 26, 1, '87988798', '[\"*\"]', 0, '2019-04-14 12:27:34', '2019-04-14 12:27:34', '2029-04-14 15:27:34'),
('c7414d245e0740b04b2ec1446d9e6dfe9794c2794919fe06e5c4871b6f4f8a3b09c7ba0a31445617', 2, 1, '25725725', '[\"*\"]', 1, '2019-04-14 10:47:03', '2019-04-14 10:47:03', '2029-04-14 13:47:03'),
('cb0bb79ac44a0427dc7bd223fcc1b63a776453c9d860ef555392eac61ab5fe8a6f0fd209f19c3f84', 2, 1, '25725725', '[\"*\"]', 0, '2019-04-14 10:52:01', '2019-04-14 10:52:01', '2029-04-14 13:52:01'),
('d2a2483a32b198c3e9cc6732bd8ece599995f058b268a0584b3718cf9e34a776e894805bb48fd47e', 2, 1, '25725725', '[\"*\"]', 0, '2019-04-14 10:35:37', '2019-04-14 10:35:37', '2029-04-14 13:35:37'),
('e2e32d42048a06a61feef7062f90dea7be77aaa80944459294ad31e734d918c8a6cbad65ae18fc5e', 2, 1, '25725725', '[\"*\"]', 0, '2019-04-14 10:35:10', '2019-04-14 10:35:10', '2029-04-14 13:35:10'),
('f1995ad0d4dc84582ebb0e20821bc6123dc4eb9dca6b047bd5324a8b04db83de27677b092b1d5c84', 2, 1, '25725725', '[\"*\"]', 0, '2019-04-14 12:24:33', '2019-04-14 12:24:33', '2029-04-14 15:24:33'),
('fb93d7191ee388d5cd37dede5f5fc68cc2f9b99e10a715af93663de3f5a3faac476bd922a57b5102', 2, 1, '25725725', '[\"*\"]', 1, '2019-04-14 10:50:53', '2019-04-14 10:50:53', '2029-04-14 13:50:53'),
('fdca82a12c43375b3a7da11b2590db3846310d90c68a6593ae5c8511ff1f4c7fc801c3262681e907', 2, 3, 'Masafah', '[]', 0, '2019-05-13 11:20:24', '2019-05-13 11:20:24', '2020-05-13 14:20:24'),
('ff599ec915d863d77aeeeadd77d114efaeafcc54f92fa33e0bf4aa8a5a7010f86510a345e2bfa8be', 26, 1, '87988798', '[\"*\"]', 0, '2019-04-14 14:23:08', '2019-04-14 14:23:08', '2029-04-14 17:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Events Personal Access Client', '5pdRmfhcMabEhfCntzIvall40pMGAImOhzvfDM7n', 'http://localhost', 1, 0, 0, '2019-04-10 11:51:17', '2019-04-10 11:51:17'),
(2, NULL, 'Events Password Grant Client', '1FQXRRgJp0WJQSMmNtOyA5NVR9LYegYtBl1Uhzxu', 'http://localhost', 0, 1, 0, '2019-04-10 11:51:17', '2019-04-10 11:51:17'),
(3, NULL, 'Events Personal Access Client', 'qsfcd7sWPSfxLFExTjyqX4tGnuFS7UcIVWzqudgJ', 'http://localhost', 1, 0, 0, '2019-04-30 11:33:47', '2019-04-30 11:33:47'),
(4, NULL, 'Events Password Grant Client', 'b31LtLbqRuaM6gwctCpDVFwWCuzCzyL7N7ZjceXe', 'http://localhost', 0, 1, 0, '2019-04-30 11:33:47', '2019-04-30 11:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-04-10 21:00:00', '2019-04-10 21:00:00'),
(2, 3, '2019-04-30 11:33:47', '2019-04-30 11:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_points` int(11) NOT NULL COMMENT 'Unlimited Inquires :0',
  `price` decimal(10,3) NOT NULL,
  `num_days` int(11) NOT NULL,
  `expired_notify_duration` int(11) NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_ar` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `has_offer` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = No, 1 = Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name_en`, `name_ar`, `num_points`, `price`, `num_days`, `expired_notify_duration`, `description_en`, `description_ar`, `status`, `has_offer`, `created_at`, `updated_at`) VALUES
(1, 'Free Package', 'Free Package', 0, '0.000', 365, 5, 'Free Package', 'Free Package', 1, 0, '2018-06-25 13:13:29', '2018-06-25 13:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions', 'These are our terms and conditions. Here the privacy policy will be written as well.This is just a short description of it', '2019-05-05 08:12:44', '2019-05-05 08:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `subscriber_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `reference_id` bigint(20) DEFAULT NULL,
  `amount` decimal(10,3) NOT NULL,
  `post_date` date DEFAULT NULL,
  `result` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payid` bigint(20) UNSIGNED DEFAULT NULL,
  `card_type` tinyint(1) DEFAULT NULL COMMENT 'KNET:1,CC:2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `groupname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `groupname`, `permissions`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Supervisor', '[\"master-view\",\"permissions-view\",\"bannerImages-view\",\"languageManagement-view\",\"cmsPages-view\",\"dashboard-view\",\"contactus-view\"]', 1, '2018-02-05 15:00:00', '2018-08-04 12:54:22'),
(2, 'Manager', '[\"users-create\"]', 1, '2018-02-14 00:36:10', '2018-02-17 03:42:16'),
(3, 'users', '[\"master-view\",\"master-create\",\"master-edit\",\"master-delete\"]', 1, '2018-02-14 03:36:41', '2018-02-14 23:59:44'),
(4, 'Accountant', '[\"users-view\"]', 1, '2018-02-15 00:00:14', '2018-02-15 00:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(10) NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `created_at`, `updated_at`) VALUES
(1, 10, '2019-05-16 08:40:57', '2019-05-16 08:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `push_registration`
--

CREATE TABLE `push_registration` (
  `id` int(11) NOT NULL,
  `user_id` text COLLATE utf8_unicode_ci NOT NULL,
  `gcm_id` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `imei` text COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `push_report`
--

CREATE TABLE `push_report` (
  `id` int(11) NOT NULL,
  `push_id` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` text COLLATE utf8_unicode_ci NOT NULL,
  `gcm_status` text COLLATE utf8_unicode_ci NOT NULL,
  `new_registration_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `delivered_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) NOT NULL,
  `rating` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `original_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `profile_image` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `player_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `fullname`, `email`, `password`, `original_password`, `mobile`, `profile_image`, `status`, `remember_token`, `country_id`, `address`, `location`, `phone`, `otp`, `player_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Arshad', 'arshad@gmail.com', '6297787ba54529df693c9b80e2820259cf4dd3ea', '25825825', '99353599', NULL, 1, NULL, 4, NULL, NULL, NULL, '', '', '2018-06-27 09:38:59', '2018-07-03 13:53:26', NULL),
(2, NULL, 'shams@gmail.com', '786177b28e32c85e26c3129fe3849433af909f85', '258258', '25725725', NULL, 1, NULL, 5, 'fdaf', NULL, '', '', '', '2018-06-27 14:00:45', '2019-04-08 08:55:15', '2019-04-08 08:55:15'),
(3, NULL, 'mintra@gmail.com', '43a366ca2d7b7babf54ec2e8c210370136f95665', '254254', '55885588', NULL, 1, NULL, 1, 'Kuwait City', NULL, '', '', '', '2018-06-28 07:10:20', '2019-04-08 08:55:15', '2019-04-08 08:55:15'),
(4, 'Noor Mohammed', 'noor@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '89789785', NULL, 1, NULL, 1, NULL, NULL, NULL, '', '', '2018-06-28 07:35:24', '2018-06-28 07:35:24', NULL),
(5, 'Salim', 'salim@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '12345678', '1554716813.jpg', 1, NULL, 1, NULL, NULL, NULL, '', '', '2018-07-02 09:08:20', '2019-04-08 09:46:53', NULL),
(6, NULL, 'makaan@gmal.com', '7c222fb2927d828af22f592134e8932480637c0d', '12345678', '25252525', NULL, 1, NULL, 1, 'Khaian', NULL, '', '', '', '2018-07-03 13:38:29', '2019-04-08 08:55:15', '2019-04-08 08:55:15'),
(7, NULL, 'adm@g.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '25252578', NULL, 1, NULL, 1, 'd', NULL, '', '', '', '2018-07-03 13:44:19', '2018-07-03 13:44:30', '2018-07-03 13:44:30'),
(8, 'Mohammed', 'Mohammed@g.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '55555555', '', 1, NULL, 1, NULL, NULL, NULL, '', '', '2019-04-08 08:01:18', '2019-04-08 09:46:09', NULL),
(9, 'dfasf', 'fdsaf@g.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '78787878', NULL, 1, NULL, 1, NULL, NULL, NULL, '', '', '2019-04-08 08:55:05', '2019-04-08 08:55:15', '2019-04-08 08:55:15'),
(10, 'taher', 'ytahe@g.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '85859598', '', 1, NULL, 1, NULL, NULL, NULL, '', '', '2019-04-08 09:54:34', '2019-04-08 09:58:43', '2019-04-08 09:58:43'),
(11, 'teatea', 'daf@g.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '32323232', '', 1, NULL, 1, NULL, NULL, NULL, '', '', '2019-04-08 09:59:48', '2019-04-08 10:01:42', '2019-04-08 10:01:42'),
(12, 'tagee', 'ta@g.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '89898989', '', 1, NULL, 1, NULL, NULL, NULL, '82140', '', '2019-04-08 10:01:01', '2019-04-14 12:04:59', '2019-04-08 10:01:42'),
(26, 'testing', 'fakhriwild@gmail.com', '', '', '87988798', '1555317654.jpg', 1, NULL, 1, NULL, NULL, NULL, '80945', '', '2019-04-14 12:26:56', '2019-04-15 08:40:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider_images`
--

CREATE TABLE `serviceprovider_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `serviceprovider_images`
--

INSERT INTO `serviceprovider_images` (`id`, `user_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, '1530706768.jpg', '2018-07-04 12:19:28', '2018-07-04 12:19:28'),
(2, 2, '1530706770.jpg', '2018-07-04 12:19:31', '2018-07-04 12:19:31'),
(3, 2, '1530706772.jpg', '2018-07-04 12:19:32', '2018-07-04 12:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT '0',
  `service_provider_id` int(11) UNSIGNED DEFAULT '0',
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `service_provider_id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Materials Supply', 'Materials Supply', 1, '2018-07-17 14:01:50', '2018-07-17 14:01:50'),
(2, 0, 2, 'Brickss', 'Bricks', 1, '2018-07-18 06:35:43', '2018-07-18 06:35:43'),
(5, 0, 2, 'Cement', 'Cement', 1, '2018-07-18 12:31:30', '2018-07-18 12:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_additional_quotation_fields`
--

CREATE TABLE `service_provider_additional_quotation_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_provider_id` int(10) DEFAULT NULL,
  `json_data` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_provider_additional_quotation_fields`
--

INSERT INTO `service_provider_additional_quotation_fields` (`id`, `service_provider_id`, `json_data`, `created_at`, `updated_at`) VALUES
(1, 3, '[{\"name\":\"civil id\",\"order\":1,\"type\":\"text\"}]', '2018-07-18 21:00:00', '2018-07-19 10:39:20'),
(2, 2, '[{\"name\":\"CivilID\",\"required\":true,\"order\":1,\"type\":\"text\"}]', '2018-07-19 07:32:07', '2018-07-19 07:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_quotations_applied`
--

CREATE TABLE `service_provider_quotations_applied` (
  `id` int(10) UNSIGNED NOT NULL,
  `quotation_id` int(10) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `service_provider_id` text COLLATE utf8_unicode_ci,
  `category_id` int(10) DEFAULT NULL,
  `duration` int(10) DEFAULT NULL COMMENT 'in Days',
  `price` decimal(10,3) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `images` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `additional_fields` text COLLATE utf8_unicode_ci,
  `approved_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:Approved',
  `approved_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_provider_quotations_applied`
--

INSERT INTO `service_provider_quotations_applied` (`id`, `quotation_id`, `user_id`, `service_provider_id`, `category_id`, `duration`, `price`, `description`, `images`, `files`, `additional_fields`, `approved_status`, `approved_date`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2', 1, 365, '5000.000', 'Construction', '[{\"1\":\"1527494592.png\",\"2\":\"1527494648.png\"}]', '[{\"1\":\"1527575687.xlsx\",\"2\":\"1527575717.png\"}]', NULL, 1, '2018-07-04', '2018-07-02 21:00:00', '2018-07-02 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `left_menu_label_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `left_menu_label_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `left_menu_label_en`, `left_menu_label_ar`, `created_at`, `updated_at`) VALUES
(1, 'Masafah ', 'Inforamtion', 'Inforamtion', '2018-04-01 18:00:00', '2018-04-01 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `category_id` int(10) NOT NULL,
  `price` float NOT NULL,
  `address_from_id` int(10) NOT NULL,
  `address_to_id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) DEFAULT NULL,
  `pickup_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL COMMENT '1 - Pending, 2- Accepted, 3- picked Up, 4 - Delivered',
  `payment_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '1- Knet, 2- Wallet, 3- CC , 4- COD',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `name`, `description`, `image`, `quantity`, `category_id`, `price`, `address_from_id`, `address_to_id`, `user_id`, `company_id`, `pickup_time`, `status`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 3, 1, 10, 1, 2, 26, 5, '2019-28-05 08:00:00', 4, '', '2019-05-16 08:54:43', '2019-05-16 11:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers_package_details`
--

CREATE TABLE `subscribers_package_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `subscriber_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_ar` text COLLATE utf8_unicode_ci,
  `num_days` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `notification_date` date DEFAULT NULL,
  `price` decimal(10,3) NOT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `num_points` int(10) DEFAULT '0' COMMENT 'Unlimited:0',
  `num_inquiry_received` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `active_status` tinyint(1) DEFAULT '0' COMMENT '0:new package;1:active;2:expired',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribers_package_details`
--

INSERT INTO `subscribers_package_details` (`id`, `subscriber_id`, `package_id`, `name_en`, `name_ar`, `description_en`, `description_ar`, `num_days`, `start_date`, `end_date`, `notification_date`, `price`, `payment_id`, `num_points`, `num_inquiry_received`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'free package', 'free package', 'free package', 'free package', 365, '2018-07-18', '2019-07-18', '2019-07-13', '0.000', NULL, NULL, 0, 1, '2018-07-18 14:15:34', '2018-07-18 14:15:34'),
(2, 6, 1, 'free package', 'free package', 'free package', 'free package', 365, '2018-07-18', '2019-07-18', '2019-07-13', '0.000', NULL, 0, 0, 1, '2018-07-18 14:19:31', '2018-07-18 14:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `civilid` text COLLATE utf8_unicode_ci,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `original_password`, `civilid`, `mobile`, `user_role_id`, `permission_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'admin', 'sagirhashim@gmail.com', '$2y$10$/SSSo/hc.7L9VCxw8Vu6PuZ1MIB.XAaybdc5FuZ9fzLvV66OmZPGe', '123456', NULL, '12345678', 1, 2, 1, 'UVlyWUwRb08kc3kc4O57xdMQdX2O6wJH5QBvh8oNreRao7ZylZKBMkpR79FI', NULL, '2019-04-17 14:32:48'),
(6, 'hashim', 'hashim', 'hashimvavisa@gmail.com', '$2y$10$vtZdXUgTjTVKUQbEkxxEpOqkTcFZ4WKXWsVP3fisHW2DXGrzmF8dq', '123456', NULL, '93969696', 5, 1, 1, NULL, '2018-12-26 09:14:40', '2018-12-26 09:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_request_quotations`
--

CREATE TABLE `user_request_quotations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `service_provider_ids` text COLLATE utf8_unicode_ci,
  `service_id` int(255) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `location` text COLLATE utf8_unicode_ci,
  `submission_date` date DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `additional_fields` text COLLATE utf8_unicode_ci,
  `images` text COLLATE utf8_unicode_ci,
  `files` text COLLATE utf8_unicode_ci,
  `request_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:All;2:Individual',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_request_quotations`
--

INSERT INTO `user_request_quotations` (`id`, `user_id`, `service_provider_ids`, `service_id`, `category_id`, `location`, `submission_date`, `description`, `additional_fields`, `images`, `files`, `request_type`, `created_at`, `updated_at`) VALUES
(1, 5, '[\"2\",\"3\"]', 1, 1, 'Salmiya', '2018-07-02', 'Construction', NULL, '[{\"1\":\"1527494592.png\",\"2\":\"1527494648.png\"}]', '[{\"1\":\"1527575687.xlsx\",\"2\":\"1527575717.png\"}]', 1, '2018-07-01 21:00:00', '2018-07-01 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `status`) VALUES
(1, 'superadmin', 1),
(2, 'supervisor', 1),
(3, 'manager', 1),
(4, 'viewer', 0),
(5, 'Employee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `balance` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_in`
--

CREATE TABLE `wallet_in` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_offers`
--

CREATE TABLE `wallet_offers` (
  `id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `offer_amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallet_offers`
--

INSERT INTO `wallet_offers` (`id`, `amount`, `offer_amount`, `created_at`, `updated_at`) VALUES
(1, 50, 2, '2019-05-16 11:46:14', '2019-05-16 11:46:14'),
(2, 100, 4, '2019-05-16 11:46:14', '2019-05-16 11:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_out`
--

CREATE TABLE `wallet_out` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `admin_modules`
--
ALTER TABLE `admin_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD UNIQUE KEY `authentication_access_token` (`access_token`);

--
-- Indexes for table `backup_lists`
--
ALTER TABLE `backup_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_additional_applyquotation_fields`
--
ALTER TABLE `category_additional_applyquotation_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_additional_quotation_fields`
--
ALTER TABLE `category_additional_quotation_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cc_payments`
--
ALTER TABLE `cc_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmspages`
--
ALTER TABLE `cmspages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_payments`
--
ALTER TABLE `company_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knet_payments`
--
ALTER TABLE `knet_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_management`
--
ALTER TABLE `language_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`),
  ADD KEY `oauth_access_tokens_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_details_subscriber_id_index` (`subscriber_id`),
  ADD KEY `payment_details_package_id_index` (`package_id`),
  ADD KEY `payment_details_payid_index` (`payid`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registered_users_mobile_unique` (`mobile`),
  ADD KEY `registered_users_email_unique` (`email`) USING BTREE;

--
-- Indexes for table `serviceprovider_images`
--
ALTER TABLE `serviceprovider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `service_provider_additional_quotation_fields`
--
ALTER TABLE `service_provider_additional_quotation_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_provider_quotations_applied`
--
ALTER TABLE `service_provider_quotations_applied`
  ADD PRIMARY KEY (`id`),
  ADD KEY `v2_bookings_subscriber_id_index` (`user_id`),
  ADD KEY `v2_bookings_module_id_index` (`duration`),
  ADD KEY `v2_bookings_vendor_id_index` (`price`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_user_id_foreign` (`user_id`),
  ADD KEY `shipments_company_id_foreign` (`company_id`);

--
-- Indexes for table `subscribers_package_details`
--
ALTER TABLE `subscribers_package_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_package_details_subscriber_id_index` (`subscriber_id`),
  ADD KEY `subscribers_package_details_package_id_index` (`package_id`),
  ADD KEY `subscribers_package_details_payment_id_index` (`payment_id`),
  ADD KEY `subscribers_package_details_notification_date_index` (`notification_date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_request_quotations`
--
ALTER TABLE `user_request_quotations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `v2_bookings_subscriber_id_index` (`user_id`),
  ADD KEY `v2_bookings_module_id_index` (`service_id`),
  ADD KEY `v2_bookings_vendor_id_index` (`category_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_company_id_foreign` (`company_id`);

--
-- Indexes for table `wallet_in`
--
ALTER TABLE `wallet_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_in_company_id_foreign` (`company_id`);

--
-- Indexes for table `wallet_offers`
--
ALTER TABLE `wallet_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_out`
--
ALTER TABLE `wallet_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_out_company_id_foreign` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_modules`
--
ALTER TABLE `admin_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `backup_lists`
--
ALTER TABLE `backup_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_additional_applyquotation_fields`
--
ALTER TABLE `category_additional_applyquotation_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_additional_quotation_fields`
--
ALTER TABLE `category_additional_quotation_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cc_payments`
--
ALTER TABLE `cc_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cmspages`
--
ALTER TABLE `cmspages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_payments`
--
ALTER TABLE `company_payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `knet_payments`
--
ALTER TABLE `knet_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_management`
--
ALTER TABLE `language_management`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `serviceprovider_images`
--
ALTER TABLE `serviceprovider_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_provider_additional_quotation_fields`
--
ALTER TABLE `service_provider_additional_quotation_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_provider_quotations_applied`
--
ALTER TABLE `service_provider_quotations_applied`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers_package_details`
--
ALTER TABLE `subscribers_package_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_request_quotations`
--
ALTER TABLE `user_request_quotations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_in`
--
ALTER TABLE `wallet_in`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_offers`
--
ALTER TABLE `wallet_offers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet_out`
--
ALTER TABLE `wallet_out`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `registered_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `registered_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wallet_in`
--
ALTER TABLE `wallet_in`
  ADD CONSTRAINT `wallet_in_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wallet_out`
--
ALTER TABLE `wallet_out`
  ADD CONSTRAINT `wallet_out_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
