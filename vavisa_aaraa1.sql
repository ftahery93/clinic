-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2019 at 05:51 PM
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
-- Table structure for table `aaraa_analytics_pages`
--

CREATE TABLE `aaraa_analytics_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `query` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `load_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_analytics_pages`
--

INSERT INTO `aaraa_analytics_pages` (`id`, `visitor_id`, `ip`, `title`, `name`, `query`, `load_time`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, '::1', 'aaraa Laravel Site Preview', 'unknown', 'http://localhost/internal/aaraa/public/', '0.16211796', '2019-06-09', '11:54:15', '2019-06-09 08:54:15', '2019-06-09 08:54:15'),
(2, 1, '::1', 'http://localhost/internal/aaraa/public/login', 'unknown', 'http://localhost/internal/aaraa/public/login', '0.01087403', '2019-06-09', '11:55:09', '2019-06-09 08:55:09', '2019-06-09 08:55:09'),
(3, 1, '::1', 'http://localhost/internal/aaraa/public/admin', 'unknown', 'http://localhost/internal/aaraa/public/admin', '0.02783513', '2019-06-09', '11:55:54', '2019-06-09 08:55:54', '2019-06-09 08:55:54'),
(4, 1, '::1', 'http://localhost/internal/aaraa/public/admin/find', 'unknown', 'http://localhost/internal/aaraa/public/admin/find', '0.02313113', '2019-06-09', '11:56:30', '2019-06-09 08:56:30', '2019-06-09 08:56:30'),
(5, 1, '::1', 'http://localhost/internal/aaraa/public/admin?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin?_pjax=%23view', '0.03236413', '2019-06-09', '11:56:35', '2019-06-09 08:56:35', '2019-06-09 08:56:35'),
(6, 1, '::1', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', '0.05014801', '2019-06-09', '11:57:32', '2019-06-09 08:57:32', '2019-06-09 08:57:32'),
(7, 1, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/sent', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/sent', '0.02020621', '2019-06-09', '11:57:34', '2019-06-09 08:57:34', '2019-06-09 08:57:34'),
(8, 1, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/draft', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/draft', '0.04344201', '2019-06-09', '11:57:34', '2019-06-09 08:57:34', '2019-06-09 08:57:34'),
(9, 1, '::1', 'http://localhost/internal/aaraa/public/admin/webmails', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails', '0.06159091', '2019-06-09', '11:57:35', '2019-06-09 08:57:35', '2019-06-09 08:57:35'),
(10, 1, '::1', 'http://localhost/internal/aaraa/public/admin/contacts?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts?_pjax=%23view', '0.04518294', '2019-06-09', '11:57:36', '2019-06-09 08:57:36', '2019-06-09 08:57:36'),
(11, 1, '::1', 'http://localhost/internal/aaraa/public/admin/contacts/2', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts/2', '0.02933121', '2019-06-09', '11:57:38', '2019-06-09 08:57:38', '2019-06-09 08:57:38'),
(12, 1, '::1', 'http://localhost/internal/aaraa/public/admin/2/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/2/topics?_pjax=%23view', '0.04770899', '2019-06-09', '11:58:00', '2019-06-09 08:58:00', '2019-06-09 08:58:00'),
(13, 1, '::1', 'http://localhost/internal/aaraa/public/admin/9/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/9/topics?_pjax=%23view', '0.04171205', '2019-06-09', '11:58:02', '2019-06-09 08:58:02', '2019-06-09 08:58:02'),
(14, 1, '::1', 'http://localhost/internal/aaraa/public/admin/8/sections?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/8/sections?_pjax=%23view', '0.05325389', '2019-06-09', '11:58:18', '2019-06-09 08:58:18', '2019-06-09 08:58:18'),
(15, 1, '::1', 'http://localhost/internal/aaraa/public/admin/8/sections/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/8/sections/create', '0.08109689', '2019-06-09', '11:58:20', '2019-06-09 08:58:20', '2019-06-09 08:58:20'),
(16, 1, '::1', 'http://localhost/internal/aaraa/public/admin/8/sections', 'unknown', 'http://localhost/internal/aaraa/public/admin/8/sections', '0.023875', '2019-06-09', '11:58:27', '2019-06-09 08:58:27', '2019-06-09 08:58:27'),
(17, 1, '::1', 'http://localhost/internal/aaraa/public/admin/9/topics/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/9/topics/create', '0.05869699', '2019-06-09', '11:58:44', '2019-06-09 08:58:44', '2019-06-09 08:58:44'),
(18, 1, '::1', 'http://localhost/internal/aaraa/public/admin/9/topics', 'unknown', 'http://localhost/internal/aaraa/public/admin/9/topics', '0.01861405', '2019-06-09', '11:58:47', '2019-06-09 08:58:47', '2019-06-09 08:58:47'),
(19, 1, '::1', 'http://localhost/internal/aaraa/public/admin/6/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/6/topics?_pjax=%23view', '0.02473402', '2019-06-09', '11:58:49', '2019-06-09 08:58:49', '2019-06-09 08:58:49'),
(20, 1, '::1', 'aaraa Laravel Site Preview', 'unknown', 'http://localhost/internal/aaraa/public/home', '0.04378796', '2019-06-09', '11:58:49', '2019-06-09 08:58:49', '2019-06-09 08:58:49'),
(21, 1, '::1', 'http://localhost/internal/aaraa/public/admin/7/sections?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/7/sections?_pjax=%23view', '0.06875205', '2019-06-09', '11:58:51', '2019-06-09 08:58:51', '2019-06-09 08:58:51'),
(22, 1, '::1', 'http://localhost/internal/aaraa/public/admin/7/sections/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/7/sections/create', '0.04828191', '2019-06-09', '11:58:52', '2019-06-09 08:58:52', '2019-06-09 08:58:52'),
(23, 1, '::1', 'http://localhost/internal/aaraa/public/admin/7/sections', 'unknown', 'http://localhost/internal/aaraa/public/admin/7/sections', '0.0608561', '2019-06-09', '11:58:54', '2019-06-09 08:58:54', '2019-06-09 08:58:54'),
(24, 1, '::1', 'http://localhost/internal/aaraa/public/admin/7/sections/1/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/7/sections/1/edit', '0.07851005', '2019-06-09', '11:58:56', '2019-06-09 08:58:56', '2019-06-09 08:58:56'),
(25, 1, '::1', 'http://localhost/internal/aaraa/public/admin/banners?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/banners?_pjax=%23view', '0.05004597', '2019-06-09', '11:59:04', '2019-06-09 08:59:04', '2019-06-09 08:59:04'),
(26, 1, '::1', 'http://localhost/internal/aaraa/public/admin/banners/create/1', 'unknown', 'http://localhost/internal/aaraa/public/admin/banners/create/1', '0.0222609', '2019-06-09', '11:59:05', '2019-06-09 08:59:05', '2019-06-09 08:59:05'),
(27, 1, '::1', 'http://localhost/internal/aaraa/public/admin/banners/3/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/banners/3/edit', '0.05598712', '2019-06-09', '11:59:09', '2019-06-09 08:59:09', '2019-06-09 08:59:09'),
(28, 1, '::1', 'http://localhost/internal/aaraa/public/admin/4/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/4/topics?_pjax=%23view', '0.05228114', '2019-06-09', '11:59:16', '2019-06-09 08:59:16', '2019-06-09 08:59:16'),
(29, 1, '::1', 'http://localhost/internal/aaraa/public/admin/3/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/3/topics?_pjax=%23view', '0.01914597', '2019-06-09', '11:59:17', '2019-06-09 08:59:17', '2019-06-09 08:59:17'),
(30, 1, '::1', 'http://localhost/internal/aaraa/public/admin/3/topics/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/3/topics/create', '0.05803108', '2019-06-09', '11:59:19', '2019-06-09 08:59:19', '2019-06-09 08:59:19'),
(31, 1, '::1', 'http://localhost/internal/aaraa/public/admin/2/topics/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/2/topics/create', '0.04717803', '2019-06-09', '11:59:26', '2019-06-09 08:59:26', '2019-06-09 08:59:26'),
(32, 1, '::1', 'http://localhost/internal/aaraa/public/admin/contacts', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts', '0.020823', '2019-06-09', '11:59:33', '2019-06-09 08:59:33', '2019-06-09 08:59:33'),
(33, 1, '::1', 'http://localhost/internal/aaraa/public/admin/settings?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/settings?_pjax=%23view', '0.03373098', '2019-06-09', '11:59:44', '2019-06-09 08:59:44', '2019-06-09 08:59:44'),
(34, 1, '::1', 'http://localhost/internal/aaraa/public/admin/settings', 'unknown', 'http://localhost/internal/aaraa/public/admin/settings', '0.1633141', '2019-06-09', '11:59:44', '2019-06-09 08:59:44', '2019-06-09 08:59:44'),
(35, 1, '::1', 'http://localhost/internal/aaraa/public/password/reset', 'unknown', 'http://localhost/internal/aaraa/public/password/reset', '0.02835584', '2019-06-09', '12:18:38', '2019-06-09 09:18:38', '2019-06-09 09:18:38'),
(36, 1, '::1', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', 'unknown', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', '0.00915599', '2019-06-09', '12:30:10', '2019-06-09 09:30:10', '2019-06-09 09:30:10'),
(37, 1, '::1', 'http://localhost/internal/aaraa/public/register', 'unknown', 'http://localhost/internal/aaraa/public/register', '0.06262398', '2019-06-09', '13:02:11', '2019-06-09 10:02:11', '2019-06-09 10:02:11'),
(38, 1, '::1', 'http://localhost/internal/aaraa/public/admin/admin', 'unknown', 'http://localhost/internal/aaraa/public/admin/admin', '0.01205993', '2019-06-09', '14:14:38', '2019-06-09 11:14:38', '2019-06-09 11:14:38'),
(39, 1, '::1', 'http://localhost/internal/aaraa/public/admin/home', 'unknown', 'http://localhost/internal/aaraa/public/admin/home', '0.01156211', '2019-06-09', '14:15:35', '2019-06-09 11:15:35', '2019-06-09 11:15:35'),
(40, 1, '::1', 'http://localhost/internal/aaraa/public/admin/dashboard', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard', '0.01948714', '2019-06-09', '14:16:15', '2019-06-09 11:16:15', '2019-06-09 11:16:15'),
(41, 1, '::1', 'http://localhost/internal/aaraa/public/admin/dashboard?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard?_pjax=%23view', '0.04812193', '2019-06-09', '14:44:28', '2019-06-09 11:44:28', '2019-06-09 11:44:28'),
(42, 1, '::1', 'http://localhost/internal/aaraa/public/admin/1/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/1/topics?_pjax=%23view', '0.04415607', '2019-06-09', '14:44:29', '2019-06-09 11:44:29', '2019-06-09 11:44:29'),
(43, 1, '::1', 'http://localhost/internal/aaraa/public/admin/calendar?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/calendar?_pjax=%23view', '0.12415695', '2019-06-09', '14:44:30', '2019-06-09 11:44:30', '2019-06-09 11:44:30'),
(44, 1, '::1', 'http://localhost/internal/aaraa/public/admin/calendar', 'unknown', 'http://localhost/internal/aaraa/public/admin/calendar', '0.10340405', '2019-06-09', '14:44:30', '2019-06-09 11:44:30', '2019-06-09 11:44:30'),
(45, 1, '::1', 'http://localhost/internal/aaraa/public/admin/3/topics', 'unknown', 'http://localhost/internal/aaraa/public/admin/3/topics', '0.05529904', '2019-06-09', '15:07:05', '2019-06-09 12:07:05', '2019-06-09 12:07:05'),
(46, 2, '::1', 'http://localhost/internal/aaraa/public/login', 'unknown', 'http://localhost/internal/aaraa/public/login', '0.01853013', '2019-06-10', '06:37:33', '2019-06-10 03:37:33', '2019-06-10 03:37:33'),
(47, 2, '::1', 'http://localhost/internal/aaraa/public/admin/users/1/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/users/1/edit', '0.01853395', '2019-06-10', '06:37:42', '2019-06-10 03:37:42', '2019-06-10 03:37:42'),
(48, 2, '::1', 'http://localhost/internal/aaraa/public/admin/dashboard', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard', '0.067101', '2019-06-10', '06:37:46', '2019-06-10 03:37:46', '2019-06-10 03:37:46'),
(49, 2, '::1', 'http://localhost/internal/aaraa/public/admin/menus?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/menus?_pjax=%23view', '0.03111506', '2019-06-10', '06:38:09', '2019-06-10 03:38:09', '2019-06-10 03:38:09'),
(50, 2, '::1', 'http://localhost/internal/aaraa/public/admin/settings?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/settings?_pjax=%23view', '0.03203511', '2019-06-10', '06:38:10', '2019-06-10 03:38:10', '2019-06-10 03:38:10'),
(51, 2, '::1', 'http://localhost/internal/aaraa/public/admin/settings', 'unknown', 'http://localhost/internal/aaraa/public/admin/settings', '0.02677679', '2019-06-10', '06:38:10', '2019-06-10 03:38:10', '2019-06-10 03:38:10'),
(52, 2, '::1', 'http://localhost/internal/aaraa/public/admin/users?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/users?_pjax=%23view', '0.04184222', '2019-06-10', '06:40:27', '2019-06-10 03:40:27', '2019-06-10 03:40:27'),
(53, 2, '::1', 'http://localhost/internal/aaraa/public/admin/dashboard?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard?_pjax=%23view', '0.03767991', '2019-06-10', '06:41:33', '2019-06-10 03:41:33', '2019-06-10 03:41:33'),
(54, 2, '::1', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', 'unknown', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', '0.01145196', '2019-06-10', '06:42:37', '2019-06-10 03:42:37', '2019-06-10 03:42:37'),
(55, 2, '::1', 'http://localhost/internal/aaraa/public/admin/webmails', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails', '0.0585649', '2019-06-10', '06:43:40', '2019-06-10 03:43:40', '2019-06-10 03:43:40'),
(56, 2, '::1', 'http://localhost/internal/aaraa/public/admin/users', 'unknown', 'http://localhost/internal/aaraa/public/admin/users', '0.0216608', '2019-06-10', '06:56:53', '2019-06-10 03:56:53', '2019-06-10 03:56:53'),
(57, 2, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/date', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/date', '0.02299094', '2019-06-10', '07:04:30', '2019-06-10 04:04:30', '2019-06-10 04:04:30'),
(58, 2, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/city', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/city', '0.01753283', '2019-06-10', '07:04:31', '2019-06-10 04:04:31', '2019-06-10 04:04:31'),
(59, 2, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/country', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/country', '0.04594207', '2019-06-10', '07:04:32', '2019-06-10 04:04:32', '2019-06-10 04:04:32'),
(60, 2, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/referrer', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/referrer', '0.01804113', '2019-06-10', '07:04:36', '2019-06-10 04:04:36', '2019-06-10 04:04:36'),
(61, 2, '::1', 'http://localhost/internal/aaraa/public/admin/contacts?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts?_pjax=%23view', '0.03815389', '2019-06-10', '07:04:37', '2019-06-10 04:04:37', '2019-06-10 04:04:37'),
(62, 2, '::1', 'http://localhost/internal/aaraa/public/admin/calendar?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/calendar?_pjax=%23view', '0.0392859', '2019-06-10', '07:04:38', '2019-06-10 04:04:38', '2019-06-10 04:04:38'),
(63, 2, '::1', 'http://localhost/internal/aaraa/public/admin/calendar', 'unknown', 'http://localhost/internal/aaraa/public/admin/calendar', '0.02212405', '2019-06-10', '07:04:38', '2019-06-10 04:04:38', '2019-06-10 04:04:38'),
(64, 2, '::1', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', '0.02583694', '2019-06-10', '07:04:42', '2019-06-10 04:04:42', '2019-06-10 04:04:42'),
(65, 2, '::1', 'http://localhost/internal/aaraa/public/admin/appusers', 'unknown', 'http://localhost/internal/aaraa/public/admin/appusers', '0.00961614', '2019-06-10', '08:07:59', '2019-06-10 05:07:59', '2019-06-10 05:07:59'),
(66, 2, '::1', 'http://localhost/internal/aaraa/public/admin/appusers?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/appusers?_pjax=%23view', '0.02744699', '2019-06-10', '08:08:04', '2019-06-10 05:08:04', '2019-06-10 05:08:04'),
(67, 2, '::1', 'http://localhost/internal/aaraa/public/admin/users/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/users/create', '0.0652082', '2019-06-10', '08:29:23', '2019-06-10 05:29:23', '2019-06-10 05:29:23'),
(68, 2, '::1', 'http://localhost/internal/aaraa/public/api/app/users/create', 'unknown', 'http://localhost/internal/aaraa/public/api/app/users/create', '0.0086031', '2019-06-10', '08:38:07', '2019-06-10 05:38:07', '2019-06-10 05:38:07'),
(69, 2, '::1', 'http://localhost/internal/aaraa/public/api/users/create', 'unknown', 'http://localhost/internal/aaraa/public/api/users/create', '0.0088501', '2019-06-10', '08:38:52', '2019-06-10 05:38:52', '2019-06-10 05:38:52'),
(70, 2, '::1', 'http://localhost/internal/aaraa/public/admin/9/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/9/topics?_pjax=%23view', '0.03397918', '2019-06-10', '10:09:40', '2019-06-10 07:09:40', '2019-06-10 07:09:40'),
(71, 2, '::1', 'http://localhost/internal/aaraa/public/admin/banners?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/banners?_pjax=%23view', '0.04028678', '2019-06-10', '10:09:40', '2019-06-10 07:09:40', '2019-06-10 07:09:40'),
(72, 2, '::1', 'http://localhost/internal/aaraa/public/admin/9/topics/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/9/topics/create', '0.01955199', '2019-06-10', '10:09:49', '2019-06-10 07:09:49', '2019-06-10 07:09:49'),
(73, 2, '::1', 'http://localhost/internal/aaraa/public/admin/9/topics', 'unknown', 'http://localhost/internal/aaraa/public/admin/9/topics', '0.04299307', '2019-06-10', '10:09:51', '2019-06-10 07:09:51', '2019-06-10 07:09:51'),
(74, 2, '::1', 'http://localhost/internal/aaraa/public/admin/8/sections?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/8/sections?_pjax=%23view', '0.03213906', '2019-06-10', '10:13:56', '2019-06-10 07:13:56', '2019-06-10 07:13:56'),
(75, 2, '::1', 'http://localhost/internal/aaraa/public/admin/8/sections/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/8/sections/create', '0.05677485', '2019-06-10', '10:13:59', '2019-06-10 07:13:59', '2019-06-10 07:13:59'),
(76, 2, '::1', 'http://localhost/internal/aaraa/public/admin/8/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/8/topics?_pjax=%23view', '0.0586369', '2019-06-10', '10:16:38', '2019-06-10 07:16:38', '2019-06-10 07:16:38'),
(77, 2, '::1', 'http://localhost/internal/aaraa/public/admin/4/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/4/topics?_pjax=%23view', '0.04877996', '2019-06-10', '10:16:48', '2019-06-10 07:16:48', '2019-06-10 07:16:48'),
(78, 2, '::1', 'http://localhost/internal/aaraa/public/admin/5/sections?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/5/sections?_pjax=%23view', '0.05869198', '2019-06-10', '10:16:50', '2019-06-10 07:16:50', '2019-06-10 07:16:50'),
(79, 2, '::1', 'http://localhost/internal/aaraa/public/admin/5/sections/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/5/sections/create', '0.05477309', '2019-06-10', '10:16:52', '2019-06-10 07:16:52', '2019-06-10 07:16:52'),
(80, 2, '::1', 'http://localhost/internal/aaraa/public/admin/8/sections', 'unknown', 'http://localhost/internal/aaraa/public/admin/8/sections', '0.02467108', '2019-06-10', '10:21:51', '2019-06-10 07:21:51', '2019-06-10 07:21:51'),
(81, 2, '::1', 'http://localhost/internal/aaraa/public/admin/5/sections/create?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/5/sections/create?_pjax=%23view', '0.0283289', '2019-06-10', '11:33:30', '2019-06-10 08:33:30', '2019-06-10 08:33:30'),
(82, 2, '::1', 'http://localhost/internal/aaraa/public/admin/5/sections', 'unknown', 'http://localhost/internal/aaraa/public/admin/5/sections', '0.07615995', '2019-06-10', '11:33:31', '2019-06-10 08:33:31', '2019-06-10 08:33:31'),
(83, 2, '::1', 'http://localhost/internal/aaraa/public/admin/8/sections/create?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/8/sections/create?_pjax=%23view', '0.04889584', '2019-06-10', '11:33:32', '2019-06-10 08:33:32', '2019-06-10 08:33:32'),
(84, 2, '::1', 'http://localhost/internal/aaraa/public/post/create', 'unknown', 'http://localhost/internal/aaraa/public/post/create', '0.02535796', '2019-06-10', '13:53:11', '2019-06-10 10:53:11', '2019-06-10 10:53:11'),
(85, 3, '::1', 'http://localhost/portals/vavisa/aaraa/public/login', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/login', '0.41822314', '2019-06-11', '07:32:39', '2019-06-11 02:02:39', '2019-06-11 02:02:39'),
(86, 3, '::1', 'http://localhost/portals/vavisa/aaraa/public/admin/dashboard', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/admin/dashboard', '0.56686687', '2019-06-11', '07:33:20', '2019-06-11 02:03:20', '2019-06-11 02:03:20'),
(87, 3, '::1', 'http://localhost/portals/vavisa/aaraa/public/api/user/login', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/api/user/login', '0.12590098', '2019-06-11', '09:55:04', '2019-06-11 04:25:04', '2019-06-11 04:25:04'),
(88, 3, '::1', 'http://localhost/portals/vavisa/aaraa/public/admin', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/admin', '0.22863722', '2019-06-11', '20:46:15', '2019-06-11 15:16:15', '2019-06-11 15:16:15'),
(89, 3, '::1', 'http://localhost/portals/vavisa/aaraa/public/api/users/profile/edit/27', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/api/users/profile/edit/27', '0.06529903', '2019-06-11', '20:55:01', '2019-06-11 15:25:01', '2019-06-11 15:25:01'),
(90, 3, '::1', 'http://localhost/portals/vavisa/aaraa/public/api/users/delete/26', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/api/users/delete/26', '0.05502915', '2019-06-11', '21:18:35', '2019-06-11 15:48:35', '2019-06-11 15:48:35'),
(91, 4, '::1', 'http://localhost/internal/aaraa/public/login', 'unknown', 'http://localhost/internal/aaraa/public/login', '0.00686598', '2019-06-13', '10:26:25', '2019-06-13 07:26:25', '2019-06-13 07:26:25'),
(92, 4, '::1', 'http://localhost/internal/aaraa/public/api/users/fetch', 'unknown', 'http://localhost/internal/aaraa/public/api/users/fetch', '0.01109195', '2019-06-13', '10:28:45', '2019-06-13 07:28:45', '2019-06-13 07:28:45'),
(93, 4, '::1', 'http://localhost/internal/aaraa/public/admin/dashboard', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard', '0.27263093', '2019-06-13', '14:19:09', '2019-06-13 11:19:09', '2019-06-13 11:19:09'),
(94, 4, '::1', 'http://localhost/internal/aaraa/public/admin/4/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/4/topics?_pjax=%23view', '0.02829003', '2019-06-13', '14:19:15', '2019-06-13 11:19:15', '2019-06-13 11:19:15'),
(95, 4, '::1', 'http://localhost/internal/aaraa/public/admin/4/topics', 'unknown', 'http://localhost/internal/aaraa/public/admin/4/topics', '0.01724696', '2019-06-13', '14:19:23', '2019-06-13 11:19:23', '2019-06-13 11:19:23'),
(96, 4, '::1', 'http://localhost/internal/aaraa/public/admin/4/topics/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/4/topics/create', '0.10150409', '2019-06-13', '14:21:29', '2019-06-13 11:21:29', '2019-06-13 11:21:29'),
(97, 5, '::1', 'http://localhost/internal/aaraa/public/login', 'unknown', 'http://localhost/internal/aaraa/public/login', '0.401196', '2019-06-16', '06:41:30', '2019-06-16 03:41:30', '2019-06-16 03:41:30'),
(98, 5, '::1', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', 'unknown', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', '0.13599896', '2019-06-16', '06:41:31', '2019-06-16 03:41:31', '2019-06-16 03:41:31'),
(99, 5, '::1', 'http://localhost/portals/vavisa/aaraa/public/login', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/login', '0.17407489', '2019-06-16', '20:28:54', '2019-06-16 14:58:54', '2019-06-16 14:58:54'),
(100, 5, '::1', 'http://localhost/portals/vavisa/aaraa/public/api/mypolls', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/api/mypolls', '0.05626297', '2019-06-16', '20:43:48', '2019-06-16 15:13:48', '2019-06-16 15:13:48'),
(101, 5, '::1', 'http://localhost/portals/vavisa/aaraa/public/api/polls/create', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/api/polls/create', '0.06614208', '2019-06-16', '21:01:10', '2019-06-16 15:31:10', '2019-06-16 15:31:10'),
(102, 5, '::1', 'http://localhost/portals/vavisa/aaraa/public/api/polls/comments', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/api/polls/comments', '0.06033802', '2019-06-16', '23:13:33', '2019-06-16 17:43:33', '2019-06-16 17:43:33'),
(103, 6, '::1', 'http://localhost/internal/aaraa/public/login', 'unknown', 'http://localhost/internal/aaraa/public/login', '0.01778388', '2019-06-17', '06:53:02', '2019-06-17 03:53:02', '2019-06-17 03:53:02'),
(104, 6, '::1', 'http://localhost/internal/aaraa/public/api/comments/1', 'unknown', 'http://localhost/internal/aaraa/public/api/comments/1', '0.01329398', '2019-06-17', '11:57:16', '2019-06-17 08:57:16', '2019-06-17 08:57:16'),
(105, 6, '::1', 'http://localhost/internal/aaraa/public/api/comments/2', 'unknown', 'http://localhost/internal/aaraa/public/api/comments/2', '0.01016402', '2019-06-17', '11:57:20', '2019-06-17 08:57:20', '2019-06-17 08:57:20'),
(106, 6, '::1', 'http://localhost/internal/aaraa/public/api/polls/results/1', 'unknown', 'http://localhost/internal/aaraa/public/api/polls/results/1', '0.01052499', '2019-06-17', '12:05:55', '2019-06-17 09:05:55', '2019-06-17 09:05:55'),
(107, 6, '::1', 'http://localhost/internal/aaraa/public/api/poll/results/1', 'unknown', 'http://localhost/internal/aaraa/public/api/poll/results/1', '0.01203084', '2019-06-17', '12:06:32', '2019-06-17 09:06:32', '2019-06-17 09:06:32'),
(108, 6, '::1', 'http://localhost/portals/vavisa/aaraa/public/login', 'unknown', 'http://localhost/portals/vavisa/aaraa/public/login', '0.38282108', '2019-06-17', '21:58:01', '2019-06-17 16:28:01', '2019-06-17 16:28:01'),
(109, 7, '::1', 'http://localhost/internal/aaraa/public/login', 'unknown', 'http://localhost/internal/aaraa/public/login', '0.08658099', '2019-06-18', '10:30:21', '2019-06-18 07:30:21', '2019-06-18 07:30:21'),
(110, 7, '::1', 'http://localhost/internal/aaraa/public/password/reset', 'unknown', 'http://localhost/internal/aaraa/public/password/reset', '0.05300498', '2019-06-18', '10:30:24', '2019-06-18 07:30:24', '2019-06-18 07:30:24'),
(111, 7, '::1', 'http://localhost/internal/aaraa/public/password/reset/f09d7a895f8d03e9d58d40a4b6fb361130d00480f27657b7b0c7e120048c89c9', 'unknown', 'http://localhost/internal/aaraa/public/password/reset/f09d7a895f8d03e9d58d40a4b6fb361130d00480f27657b7b0c7e120048c89c9', '0.02915096', '2019-06-18', '10:43:59', '2019-06-18 07:43:59', '2019-06-18 07:43:59'),
(112, 7, '::1', 'http://localhost/internal/aaraa/public/password/reset/20308602ae96198783261dd9ce87fb6ca372db410c6f46987a06b69ee237c855', 'unknown', 'http://localhost/internal/aaraa/public/password/reset/20308602ae96198783261dd9ce87fb6ca372db410c6f46987a06b69ee237c855', '0.03489208', '2019-06-18', '11:00:58', '2019-06-18 08:00:58', '2019-06-18 08:00:58'),
(113, 7, '::1', 'http://localhost/internal/aaraa/public/admin/dashboard', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard', '0.54036903', '2019-06-18', '11:41:37', '2019-06-18 08:41:37', '2019-06-18 08:41:37'),
(114, 7, '::1', 'http://localhost/internal/aaraa/public/admin/webmails', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails', '0.09479117', '2019-06-18', '11:41:50', '2019-06-18 08:41:50', '2019-06-18 08:41:50'),
(115, 7, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/sent', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/sent', '0.01995397', '2019-06-18', '11:41:54', '2019-06-18 08:41:54', '2019-06-18 08:41:54'),
(116, 7, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/create', '0.02160001', '2019-06-18', '11:41:57', '2019-06-18 08:41:57', '2019-06-18 08:41:57'),
(117, 7, '::1', 'http://localhost/internal/aaraa/public/admin/calendar', 'unknown', 'http://localhost/internal/aaraa/public/admin/calendar', '0.055305', '2019-06-18', '11:43:17', '2019-06-18 08:43:17', '2019-06-18 08:43:17'),
(118, 7, '::1', 'http://localhost/internal/aaraa/public/admin/calendar?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/calendar?_pjax=%23view', '0.07223296', '2019-06-18', '11:43:17', '2019-06-18 08:43:17', '2019-06-18 08:43:17'),
(119, 7, '::1', 'http://localhost/internal/aaraa/public/admin/contacts?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts?_pjax=%23view', '0.06214499', '2019-06-18', '11:43:21', '2019-06-18 08:43:21', '2019-06-18 08:43:21'),
(120, 7, '::1', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', '0.02723694', '2019-06-18', '11:43:25', '2019-06-18 08:43:25', '2019-06-18 08:43:25'),
(121, 7, '::1', 'http://localhost/internal/aaraa/public/admin/ip?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/ip?_pjax=%23view', '0.05680919', '2019-06-18', '11:43:28', '2019-06-18 08:43:28', '2019-06-18 08:43:28'),
(122, 7, '::1', 'http://localhost/internal/aaraa/public/admin/dashboard?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard?_pjax=%23view', '0.06018496', '2019-06-18', '11:43:29', '2019-06-18 08:43:29', '2019-06-18 08:43:29'),
(123, 7, '::1', 'http://localhost/internal/aaraa/public/api/results/1', 'unknown', 'http://localhost/internal/aaraa/public/api/results/1', '0.03359604', '2019-06-18', '11:46:23', '2019-06-18 08:46:23', '2019-06-18 08:46:23'),
(124, 7, '::1', 'http://localhost/internal/aaraa/public/admin/403', 'unknown', 'http://localhost/internal/aaraa/public/admin/403', '0.02662086', '2019-06-18', '13:54:36', '2019-06-18 10:54:36', '2019-06-18 10:54:36'),
(125, 8, '::1', 'http://localhost/internal/aaraa/public/admin', 'unknown', 'http://localhost/internal/aaraa/public/admin', '0.33575702', '2019-06-19', '10:03:12', '2019-06-19 07:03:12', '2019-06-19 07:03:12'),
(126, 8, '::1', 'http://localhost/internal/aaraa/public/login', 'unknown', 'http://localhost/internal/aaraa/public/login', '0.03238702', '2019-06-19', '10:03:16', '2019-06-19 07:03:16', '2019-06-19 07:03:16'),
(127, 8, '::1', 'http://localhost/internal/aaraa/public/admin/dashboard', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard', '0.04137278', '2019-06-19', '10:04:42', '2019-06-19 07:04:42', '2019-06-19 07:04:42'),
(128, 8, '::1', 'http://localhost/internal/aaraa/public/admin/dashboard?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard?_pjax=%23view', '0.05125809', '2019-06-19', '10:04:49', '2019-06-19 07:04:49', '2019-06-19 07:04:49'),
(129, 8, '::1', 'http://localhost/internal/aaraa/public/admin/settings?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/settings?_pjax=%23view', '0.04799604', '2019-06-19', '10:09:13', '2019-06-19 07:09:13', '2019-06-19 07:09:13'),
(130, 8, '::1', 'http://localhost/internal/aaraa/public/admin/settings', 'unknown', 'http://localhost/internal/aaraa/public/admin/settings', '0.0423131', '2019-06-19', '10:09:13', '2019-06-19 07:09:13', '2019-06-19 07:09:13'),
(131, 8, '::1', 'http://localhost/internal/aaraa/public/admin/2/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/2/topics?_pjax=%23view', '0.02572918', '2019-06-19', '10:13:46', '2019-06-19 07:13:46', '2019-06-19 07:13:46'),
(132, 8, '::1', 'http://localhost/internal/aaraa/public/admin/1/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/1/topics?_pjax=%23view', '0.0460031', '2019-06-19', '10:14:07', '2019-06-19 07:14:07', '2019-06-19 07:14:07'),
(133, 8, '::1', 'http://localhost/internal/aaraa/public/admin/1/topics', 'unknown', 'http://localhost/internal/aaraa/public/admin/1/topics', '0.0213089', '2019-06-19', '10:14:15', '2019-06-19 07:14:15', '2019-06-19 07:14:15'),
(134, 8, '::1', 'http://localhost/internal/aaraa/public/admin/5/sections?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/5/sections?_pjax=%23view', '0.05186296', '2019-06-19', '10:14:28', '2019-06-19 07:14:28', '2019-06-19 07:14:28'),
(135, 8, '::1', 'http://localhost/internal/aaraa/public/admin/5/sections', 'unknown', 'http://localhost/internal/aaraa/public/admin/5/sections', '0.02780914', '2019-06-19', '10:14:30', '2019-06-19 07:14:30', '2019-06-19 07:14:30'),
(136, 8, '::1', 'http://localhost/internal/aaraa/public/admin/2/topics', 'unknown', 'http://localhost/internal/aaraa/public/admin/2/topics', '0.07582092', '2019-06-19', '10:14:54', '2019-06-19 07:14:54', '2019-06-19 07:14:54'),
(137, 8, '::1', 'http://localhost/internal/aaraa/public/admin/banners?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/banners?_pjax=%23view', '0.05148387', '2019-06-19', '10:28:56', '2019-06-19 07:28:56', '2019-06-19 07:28:56'),
(138, 8, '::1', 'http://localhost/internal/aaraa/public/admin/menus?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/menus?_pjax=%23view', '0.09520316', '2019-06-19', '10:29:08', '2019-06-19 07:29:08', '2019-06-19 07:29:08'),
(139, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster/translations?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster/translations?_pjax=%23view', '0.01370096', '2019-06-19', '10:29:11', '2019-06-19 07:29:11', '2019-06-19 07:29:11'),
(140, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster/translations', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster/translations', '0.01831889', '2019-06-19', '10:29:12', '2019-06-19 07:29:12', '2019-06-19 07:29:12'),
(141, 8, '::1', 'http://localhost/internal/aaraa/public/admin/menus', 'unknown', 'http://localhost/internal/aaraa/public/admin/menus', '0.07803321', '2019-06-19', '10:29:13', '2019-06-19 07:29:13', '2019-06-19 07:29:13'),
(142, 8, '::1', 'http://localhost/internal/aaraa/public/admin/users?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/users?_pjax=%23view', '0.06245708', '2019-06-19', '10:29:19', '2019-06-19 07:29:19', '2019-06-19 07:29:19'),
(143, 8, '::1', 'http://localhost/internal/aaraa/public/admin/users', 'unknown', 'http://localhost/internal/aaraa/public/admin/users', '0.04853392', '2019-06-19', '10:29:23', '2019-06-19 07:29:23', '2019-06-19 07:29:23'),
(144, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster/banners?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster/banners?_pjax=%23view', '0.02174592', '2019-06-19', '10:29:28', '2019-06-19 07:29:28', '2019-06-19 07:29:28'),
(145, 8, '::1', 'http://localhost/internal/aaraa/public/admin/users/1/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/users/1/edit', '0.07522893', '2019-06-19', '10:29:34', '2019-06-19 07:29:34', '2019-06-19 07:29:34'),
(146, 8, '::1', 'http://localhost/internal/aaraa/public/admin/users/permissions/1/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/users/permissions/1/edit', '0.0189631', '2019-06-19', '10:29:40', '2019-06-19 07:29:40', '2019-06-19 07:29:40'),
(147, 8, '::1', 'http://localhost/internal/aaraa/public/admin/1/topics/1/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/1/topics/1/edit', '0.06493902', '2019-06-19', '10:33:37', '2019-06-19 07:33:37', '2019-06-19 07:33:37'),
(148, 8, '::1', 'http://localhost/internal/aaraa/public/admin/1/topics/3/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/1/topics/3/edit', '0.0497539', '2019-06-19', '10:34:58', '2019-06-19 07:34:58', '2019-06-19 07:34:58'),
(149, 8, '::1', 'http://localhost/internal/aaraa/public/admin/1/topics/4/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/1/topics/4/edit', '0.06506801', '2019-06-19', '10:35:18', '2019-06-19 07:35:18', '2019-06-19 07:35:18'),
(150, 8, '::1', 'http://localhost/internal/aaraa/public/admin/2/topics/5/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/2/topics/5/edit', '0.04774404', '2019-06-19', '10:35:24', '2019-06-19 07:35:24', '2019-06-19 07:35:24'),
(151, 8, '::1', 'http://localhost/internal/aaraa/public/admin/9/topics?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/9/topics?_pjax=%23view', '0.04779506', '2019-06-19', '10:36:59', '2019-06-19 07:36:59', '2019-06-19 07:36:59'),
(152, 8, '::1', 'http://localhost/internal/aaraa/public/admin/banners/create/2', 'unknown', 'http://localhost/internal/aaraa/public/admin/banners/create/2', '0.03932095', '2019-06-19', '10:37:06', '2019-06-19 07:37:06', '2019-06-19 07:37:06'),
(153, 8, '::1', 'http://localhost/internal/aaraa/public/admin/banners', 'unknown', 'http://localhost/internal/aaraa/public/admin/banners', '0.05722404', '2019-06-19', '10:37:08', '2019-06-19 07:37:08', '2019-06-19 07:37:08'),
(154, 8, '::1', 'http://localhost/internal/aaraa/public/home', 'unknown', 'http://localhost/internal/aaraa/public/home', '0.01462412', '2019-06-19', '10:57:08', '2019-06-19 07:57:08', '2019-06-19 07:57:08'),
(155, 8, '::1', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', 'unknown', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', '0.00925899', '2019-06-19', '11:04:57', '2019-06-19 08:04:57', '2019-06-19 08:04:57'),
(156, 8, '::1', 'http://localhost/internal/aaraa/public/admin/categories', 'unknown', 'http://localhost/internal/aaraa/public/admin/categories', '0.05589294', '2019-06-19', '11:07:21', '2019-06-19 08:07:21', '2019-06-19 08:07:21'),
(157, 8, '::1', 'http://localhost/internal/aaraa/public/admin/banners/1/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/banners/1/edit', '0.02479792', '2019-06-19', '11:13:07', '2019-06-19 08:13:07', '2019-06-19 08:13:07'),
(158, 8, '::1', 'http://localhost/internal/aaraa/public/admin/categories?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/categories?_pjax=%23view', '0.02088189', '2019-06-19', '11:17:03', '2019-06-19 08:17:03', '2019-06-19 08:17:03'),
(159, 8, '::1', 'http://localhost/internal/aaraa/public/admin/polls', 'unknown', 'http://localhost/internal/aaraa/public/admin/polls', '0.02538204', '2019-06-19', '11:23:26', '2019-06-19 08:23:26', '2019-06-19 08:23:26'),
(160, 8, '::1', 'http://localhost/internal/aaraa/public/admin/polls?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/polls?_pjax=%23view', '0.02660084', '2019-06-19', '12:17:01', '2019-06-19 09:17:01', '2019-06-19 09:17:01'),
(161, 8, '::1', 'http://localhost/internal/aaraa/public/admin/9/topics', 'unknown', 'http://localhost/internal/aaraa/public/admin/9/topics', '0.04818296', '2019-06-19', '14:33:16', '2019-06-19 11:33:16', '2019-06-19 11:33:16'),
(162, 8, '::1', 'http://localhost/internal/aaraa/public/admin/9/topics/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/9/topics/create', '0.10326791', '2019-06-19', '14:33:21', '2019-06-19 11:33:21', '2019-06-19 11:33:21'),
(163, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', '0.04866004', '2019-06-19', '14:34:06', '2019-06-19 11:34:06', '2019-06-19 11:34:06'),
(164, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/create', '0.01863599', '2019-06-19', '14:34:14', '2019-06-19 11:34:14', '2019-06-19 11:34:14'),
(165, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/sent', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/sent', '0.02108908', '2019-06-19', '14:34:18', '2019-06-19 11:34:18', '2019-06-19 11:34:18'),
(166, 8, '::1', 'http://localhost/internal/aaraa/public/admin/contacts?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts?_pjax=%23view', '0.05724597', '2019-06-19', '14:34:21', '2019-06-19 11:34:21', '2019-06-19 11:34:21'),
(167, 8, '::1', 'http://localhost/internal/aaraa/public/admin/contacts', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts', '0.07532215', '2019-06-19', '14:34:42', '2019-06-19 11:34:42', '2019-06-19 11:34:42'),
(168, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster/banners/2/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster/banners/2/edit', '0.07221818', '2019-06-19', '14:34:50', '2019-06-19 11:34:50', '2019-06-19 11:34:50'),
(169, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster/banners', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster/banners', '0.01884198', '2019-06-19', '14:34:53', '2019-06-19 11:34:53', '2019-06-19 11:34:53'),
(170, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster/sections?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster/sections?_pjax=%23view', '0.06663895', '2019-06-19', '14:34:55', '2019-06-19 11:34:55', '2019-06-19 11:34:55'),
(171, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster/sections/5/edit', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster/sections/5/edit', '0.08199501', '2019-06-19', '14:34:58', '2019-06-19 11:34:58', '2019-06-19 11:34:58'),
(172, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster/sections/create', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster/sections/create', '0.02140713', '2019-06-19', '14:35:15', '2019-06-19 11:35:15', '2019-06-19 11:35:15'),
(173, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster/sections', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster/sections', '0.02136087', '2019-06-19', '14:35:20', '2019-06-19 11:35:20', '2019-06-19 11:35:20'),
(174, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster?_pjax=%23view', '0.13600802', '2019-06-19', '14:35:25', '2019-06-19 11:35:25', '2019-06-19 11:35:25'),
(175, 8, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/date', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/date', '0.13387108', '2019-06-19', '15:04:13', '2019-06-19 12:04:13', '2019-06-19 12:04:13'),
(176, 8, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/country', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/country', '0.0185101', '2019-06-19', '15:04:15', '2019-06-19 12:04:15', '2019-06-19 12:04:15'),
(177, 8, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/city', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/city', '0.01926994', '2019-06-19', '15:04:17', '2019-06-19 12:04:17', '2019-06-19 12:04:17'),
(178, 8, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/os', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/os', '0.08308792', '2019-06-19', '15:04:18', '2019-06-19 12:04:18', '2019-06-19 12:04:18'),
(179, 8, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/browser', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/browser', '0.05699992', '2019-06-19', '15:04:19', '2019-06-19 12:04:19', '2019-06-19 12:04:19'),
(180, 8, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/referrer', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/referrer', '0.01961112', '2019-06-19', '15:04:20', '2019-06-19 12:04:20', '2019-06-19 12:04:20'),
(181, 8, '::1', 'http://localhost/internal/aaraa/public/admin/ip?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/ip?_pjax=%23view', '0.0685699', '2019-06-19', '15:04:22', '2019-06-19 12:04:22', '2019-06-19 12:04:22'),
(182, 8, '::1', 'http://localhost/internal/aaraa/public/admin/calendar?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/calendar?_pjax=%23view', '0.04171705', '2019-06-19', '15:05:33', '2019-06-19 12:05:33', '2019-06-19 12:05:33'),
(183, 8, '::1', 'http://localhost/internal/aaraa/public/admin/calendar', 'unknown', 'http://localhost/internal/aaraa/public/admin/calendar', '0.02560782', '2019-06-19', '15:05:33', '2019-06-19 12:05:33', '2019-06-19 12:05:33'),
(184, 8, '::1', 'http://localhost/internal/aaraa/public/admin/contacts/2', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts/2', '0.02076387', '2019-06-19', '15:07:42', '2019-06-19 12:07:42', '2019-06-19 12:07:42'),
(185, 8, '::1', 'http://localhost/internal/aaraa/public/admin/contacts/search', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts/search', '0.02197599', '2019-06-19', '15:07:51', '2019-06-19 12:07:51', '2019-06-19 12:07:51'),
(186, 8, '::1', 'http://localhost/internal/aaraa/public/admin/contacts/1', 'unknown', 'http://localhost/internal/aaraa/public/admin/contacts/1', '0.06125116', '2019-06-19', '15:07:57', '2019-06-19 12:07:57', '2019-06-19 12:07:57'),
(187, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmails', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails', '0.06217313', '2019-06-19', '15:08:38', '2019-06-19 12:08:38', '2019-06-19 12:08:38'),
(188, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/1', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/1', '0.04191995', '2019-06-19', '15:09:12', '2019-06-19 12:09:12', '2019-06-19 12:09:12'),
(189, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/2', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/2', '0.06488895', '2019-06-19', '15:09:14', '2019-06-19 12:09:14', '2019-06-19 12:09:14'),
(190, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/3', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/3', '0.02189207', '2019-06-19', '15:09:15', '2019-06-19 12:09:15', '2019-06-19 12:09:15'),
(191, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmaster', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmaster', '0.02132511', '2019-06-19', '15:19:26', '2019-06-19 12:19:26', '2019-06-19 12:19:26'),
(192, 8, '::1', 'http://localhost/internal/aaraa/public/admin/webmails/draft', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails/draft', '0.05645895', '2019-06-19', '17:25:02', '2019-06-19 14:25:02', '2019-06-19 14:25:02'),
(193, 8, '::1', 'http://localhost/internal/aaraa/public/admin/appusers', 'unknown', 'http://localhost/internal/aaraa/public/admin/appusers', '0.01580119', '2019-06-19', '17:37:47', '2019-06-19 14:37:47', '2019-06-19 14:37:47'),
(194, 8, '::1', 'http://localhost/internal/aaraa/public/admin/appusers?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/appusers?_pjax=%23view', '0.01821899', '2019-06-19', '17:41:08', '2019-06-19 14:41:08', '2019-06-19 14:41:08'),
(195, 8, '::1', 'http://localhost/internal/aaraa/public/admin/menus/create/1', 'unknown', 'http://localhost/internal/aaraa/public/admin/menus/create/1', '0.03587604', '2019-06-19', '17:53:39', '2019-06-19 14:53:39', '2019-06-19 14:53:39'),
(196, 8, '::1', 'http://localhost/internal/aaraa/public/admin/menus/1', 'unknown', 'http://localhost/internal/aaraa/public/admin/menus/1', '0.0584209', '2019-06-19', '17:53:41', '2019-06-19 14:53:41', '2019-06-19 14:53:41'),
(197, 9, '::1', 'http://localhost/internal/aaraa/public/login', 'unknown', 'http://localhost/internal/aaraa/public/login', '0.018574', '2019-06-20', '09:40:05', '2019-06-20 06:40:05', '2019-06-20 06:40:05'),
(198, 9, '::1', 'http://localhost/internal/aaraa/public/admin', 'unknown', 'http://localhost/internal/aaraa/public/admin', '0.01595092', '2019-06-20', '09:46:32', '2019-06-20 06:46:32', '2019-06-20 06:46:32'),
(199, 9, '::1', 'http://localhost/internal/aaraa/public/admin/polls', 'unknown', 'http://localhost/internal/aaraa/public/admin/polls', '0.0329721', '2019-06-20', '09:46:46', '2019-06-20 06:46:46', '2019-06-20 06:46:46'),
(200, 9, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/date', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/date', '0.02778387', '2019-06-20', '09:46:57', '2019-06-20 06:46:57', '2019-06-20 06:46:57'),
(201, 9, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/country', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/country', '0.056849', '2019-06-20', '09:46:58', '2019-06-20 06:46:58', '2019-06-20 06:46:58'),
(202, 9, '::1', 'http://localhost/internal/aaraa/public/admin/analytics/city', 'unknown', 'http://localhost/internal/aaraa/public/admin/analytics/city', '0.04893804', '2019-06-20', '09:46:58', '2019-06-20 06:46:58', '2019-06-20 06:46:58'),
(203, 9, '::1', 'http://localhost/internal/aaraa/public/admin/polls?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/polls?_pjax=%23view', '0.04222703', '2019-06-20', '09:46:59', '2019-06-20 06:46:59', '2019-06-20 06:46:59'),
(204, 9, '::1', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails?_pjax=%23view', '0.02570605', '2019-06-20', '09:47:04', '2019-06-20 06:47:04', '2019-06-20 06:47:04'),
(205, 9, '::1', 'http://localhost/internal/aaraa/public/admin/webmails', 'unknown', 'http://localhost/internal/aaraa/public/admin/webmails', '0.02330995', '2019-06-20', '09:47:07', '2019-06-20 06:47:07', '2019-06-20 06:47:07'),
(206, 9, '::1', 'http://localhost/internal/aaraa/public/api/categories/polls', 'unknown', 'http://localhost/internal/aaraa/public/api/categories/polls', '0.0164268', '2019-06-20', '10:42:29', '2019-06-20 07:42:29', '2019-06-20 07:42:29'),
(207, 9, '::1', 'http://localhost/internal/aaraa/public/api/users/favourites', 'unknown', 'http://localhost/internal/aaraa/public/api/users/favourites', '0.01314306', '2019-06-20', '10:47:43', '2019-06-20 07:47:43', '2019-06-20 07:47:43'),
(208, 9, '::1', 'http://localhost/internal/aaraa/public/admin/403', 'unknown', 'http://localhost/internal/aaraa/public/admin/403', '0.01856899', '2019-06-20', '14:46:22', '2019-06-20 11:46:22', '2019-06-20 11:46:22');
INSERT INTO `aaraa_analytics_pages` (`id`, `visitor_id`, `ip`, `title`, `name`, `query`, `load_time`, `date`, `time`, `created_at`, `updated_at`) VALUES
(209, 9, '::1', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', 'unknown', 'http://localhost/internal/aaraa/public/backEnd/assets/bootstrap/dist/css/bootstrap.min.css.map', '0.00919414', '2019-06-20', '17:23:38', '2019-06-20 14:23:38', '2019-06-20 14:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_analytics_visitors`
--

CREATE TABLE `aaraa_analytics_visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_cor1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_cor2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resolution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_analytics_visitors`
--

INSERT INTO `aaraa_analytics_visitors` (`id`, `ip`, `city`, `country_code`, `country`, `region`, `full_address`, `location_cor1`, `location_cor2`, `os`, `browser`, `resolution`, `referrer`, `hostname`, `org`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, '::1', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown, unknown, unknown', 'unknown', 'unknown', 'Linux', 'Opera', 'unknown', 'http://localhost/internal/aaraa/', 'No Hostname', 'unknown', '2019-06-09', '11:54:15', '2019-06-09 08:54:15', '2019-06-09 08:54:15'),
(2, '::1', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown, unknown, unknown', 'unknown', 'unknown', 'Linux', 'Opera', 'unknown', 'http://localhost/internal/aaraa/public/admin/dashboard', 'No Hostname', 'unknown', '2019-06-10', '06:37:33', '2019-06-10 03:37:33', '2019-06-10 03:37:33'),
(3, '::1', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown, unknown, unknown', 'unknown', 'unknown', 'Linux', 'Opera', 'unknown', 'http://localhost/portals/vavisa/aaraa/', 'No Hostname', 'unknown', '2019-06-11', '07:32:39', '2019-06-11 02:02:39', '2019-06-11 02:02:39'),
(4, '::1', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown, unknown, unknown', 'unknown', 'unknown', 'unknown', NULL, 'unknown', 'http://localhost/internal/aaraa/public/api/users/profile', 'No Hostname', 'unknown', '2019-06-13', '10:26:25', '2019-06-13 07:26:25', '2019-06-13 07:26:25'),
(5, '::1', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown, unknown, unknown', 'unknown', 'unknown', 'Linux', 'Opera', 'unknown', 'http://localhost/internal/aaraa/', 'No Hostname', 'unknown', '2019-06-16', '06:41:30', '2019-06-16 03:41:30', '2019-06-16 03:41:30'),
(6, '::1', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown, unknown, unknown', 'unknown', 'unknown', 'Linux', 'Opera', 'unknown', 'http://localhost/internal/aaraa/', 'No Hostname', 'unknown', '2019-06-17', '06:53:02', '2019-06-17 03:53:02', '2019-06-17 03:53:02'),
(7, '::1', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown, unknown, unknown', 'unknown', 'unknown', 'Linux', 'Opera', 'unknown', 'unknown', 'No Hostname', 'unknown', '2019-06-18', '10:30:21', '2019-06-18 07:30:21', '2019-06-18 07:30:21'),
(8, '::1', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown, unknown, unknown', 'unknown', 'unknown', 'Linux', 'Opera', 'unknown', 'unknown', 'No Hostname', 'unknown', '2019-06-19', '10:03:12', '2019-06-19 07:03:12', '2019-06-19 07:03:12'),
(9, '::1', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown, unknown, unknown', 'unknown', 'unknown', 'Linux', 'Opera', 'unknown', 'http://localhost/internal/aaraa/', 'No Hostname', 'unknown', '2019-06-20', '09:40:05', '2019-06-20 06:40:05', '2019-06-20 06:40:05');

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
  `preferred_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_application_users`
--

INSERT INTO `aaraa_application_users` (`id`, `name`, `email`, `password`, `photo`, `gender`, `age`, `terms_conditions`, `notification`, `preferred_language`, `status`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('031d14b4-e222-4bde-a770-b44fcaeba49f', 'Mohammed Jhosawa', 'mjhosawa@vavisa-kw.com', '$2y$10$jQg45nn0SAHlFQsAanw/bOQWak/yIHvUO41ShjS41/AXqiTG35tEG', '', 'Male', 24, 1, 1, 'en', 1, NULL, NULL, '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-13 09:30:38', '2019-06-16 05:34:53'),
('335e6aeb-91c4-11e9-bb87-8cec4ba57079', 'Carla ', 'carla@vavisa-kw.com', '*89FA6EAF8B6264AC8D6E84759027252505A3EAEE', '', 'Female', 28, 1, 1, 'en', 1, NULL, NULL, '', '2019-06-13 09:30:38', '2019-06-16 05:34:53'),
('354db5ef-08a9-4024-870b-936013820508', 'Hashim Sagir', 'hashim@vavisa-kw.com', '$2y$10$VSVpGqcM24hsozVE1rOIMuNokvvfiEsJuanQ1NnUmqn7czypSp9T2', '', 'M', 33, 1, 1, '', 1, NULL, NULL, NULL, '2019-06-19 13:19:43', '2019-06-19 13:19:43');

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
('', '1', '031d14b4-e222-4bde-a770-b44fcaeba49f', NULL, NULL),
('5df8ef3f-51cd-40ea-aa7e-c6249cb2478e', 'b448a332-9337-11e9-bb87-8cec4ba57079', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-20 12:47:11', '2019-06-20 12:47:11'),
('aa96c27f-8279-484c-b25a-7028b238d5b7', 'c5a31d68-9337-11e9-bb87-8cec4ba57079', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-20 12:47:11', '2019-06-20 12:47:11'),
('b7703acc-307a-4c5e-ba68-753abfafda65', '1', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-20 12:47:11', '2019-06-20 12:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_application_users_password_resets`
--

CREATE TABLE `aaraa_application_users_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `aaraa_contacts`
--

CREATE TABLE `aaraa_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_contacts`
--

INSERT INTO `aaraa_contacts` (`id`, `group_id`, `first_name`, `last_name`, `company`, `email`, `password`, `phone`, `country_id`, `city`, `address`, `photo`, `notes`, `last_login`, `last_login_ip`, `facebook_id`, `twitter_id`, `google_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sara', 'Smith', 'HiMan Company', 'email@site.com', NULL, '234-245-5674', 68, NULL, NULL, '14889022279857.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2017-03-07 13:57:07', '2017-03-07 13:57:07'),
(2, 2, 'Maro', 'Faheed', 'Havway  Company', 'email@site.com', NULL, '386-755-7788', 30, NULL, NULL, '14889022842486.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2017-03-07 13:58:04', '2017-03-07 13:58:35'),
(3, 2, 'Adam', 'Ali', 'Trident company', 'email@site.com', NULL, '589-234-2342', 35, NULL, NULL, '14889023586327.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2017-03-07 13:59:08', '2017-03-07 13:59:18'),
(4, 2, 'Donal', 'Tashee', 'Hamer school', 'email@site.com', NULL, '674-274-8944', 41, NULL, NULL, '14889024177699.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2017-03-07 14:00:17', '2017-03-07 14:00:17'),
(5, NULL, 'Mona', 'Lamen', 'Troly Company', 'email@site.com', NULL, '324-674-4578', 10, 'Moco', NULL, '14889024974798.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2017-03-07 14:01:37', '2017-03-07 14:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_contacts_groups`
--

CREATE TABLE `aaraa_contacts_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_contacts_groups`
--

INSERT INTO `aaraa_contacts_groups` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Newsletter Emails', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(2, 'VIP', 1, NULL, '2017-03-07 13:56:11', '2017-03-07 13:56:11'),
(3, 'Customers', 1, NULL, '2017-03-07 13:56:24', '2017-03-07 13:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_countries`
--

CREATE TABLE `aaraa_countries` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_countries`
--

INSERT INTO `aaraa_countries` (`id`, `code`, `title_ar`, `title_en`, `tel`, `created_at`, `updated_at`) VALUES
('1', 'AL', 'ألبانيا', 'Albania', '355', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('10', 'AU', 'أستراليا', 'Australia', '61', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('100', 'KZ', 'كازاخستان', 'Kazakhstan', '7', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('101', 'KE', 'كينيا', 'Kenya', '254', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('102', 'KI', 'كيريباس', 'Kiribati', '686', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('103', 'KW', 'الكويت', 'Kuwait', '965', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('104', 'KG', 'قيرغيزستان', 'Kyrgyzstan', '996', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('105', 'LV', 'لاتفيا', 'Latvia', '371', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('106', 'LB', 'لبنان', 'Lebanon', '961', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('107', 'LS', 'ليسوتو', 'Lesotho', '266', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('108', 'LR', 'ليبيريا', 'Liberia', '231', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('109', 'LY', 'ليبيا', 'Libya', '218', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('11', 'AT', 'النمسا', 'Austria', '43', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('110', 'LI', 'ليشتنشتاين', 'Liechtenstein', '423', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('111', 'LT', 'ليتوانيا', 'Lithuania', '370', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('112', 'LU', 'لوكسمبورغ', 'Luxembourg', '352', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('113', 'MK', 'مقدونيا، جمهورية', 'Macedonia', '389', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('114', 'MG', 'مدغشقر', 'Madagascar', '261', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('115', 'MW', 'ملاوي', 'Malawi', '265', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('116', 'MY', 'ماليزيا', 'Malaysia', '60', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('117', 'MV', 'جزر المالديف', 'Maldives', '960', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('118', 'ML', 'مالي', 'Mali', '223', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('119', 'MT', 'مالطا', 'Malta', '356', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('12', 'AZ', 'أذربيجان', 'Azerbaijan', '994', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('120', 'MH', 'جزر مارشال', 'Marshall Islands', '692', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('121', 'MR', 'موريتانيا', 'Mauritania', '222', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('122', 'MU', 'موريشيوس', 'Mauritius', '230', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('123', 'YT', 'مايوت', 'Mayotte', '262', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('124', 'MX', 'المكسيك', 'Mexico', '52', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('125', 'FM', 'ولايات ميكرونيزيا الموحدة', 'Micronesia', '691', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('126', 'MD', 'مولدوفا', 'Moldova', '373', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('127', 'MC', 'موناكو', 'Monaco', '377', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('128', 'MN', 'منغوليا', 'Mongolia', '976', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('129', 'ME', 'الجبل الأسود', 'Montenegro', '382', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('13', 'BS', 'جزر البهاما', 'Bahamas', '1-242', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('130', 'MS', 'مونتسيرات', 'Montserrat', '1-664', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('131', 'MA', 'المغرب', 'Morocco', '212', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('132', 'MZ', 'موزمبيق', 'Mozambique', '258', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('133', 'MM', 'ميانمار', 'Myanmar', '95', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('134', 'NA', 'ناميبيا', 'Namibia', '264', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('135', 'NR', 'ناورو', 'Nauru', '674', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('136', 'NP', 'نيبال', 'Nepal', '977', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('137', 'NL', 'هولندا', 'Netherlands', '31', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('138', 'AN', 'جزر الأنتيل الهولندية', 'Netherlands Antilles', '599', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('139', 'NC', 'كاليدونيا الجديدة', 'New Caledonia', '687', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('14', 'BH', 'البحرين', 'Bahrain', '973', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('140', 'NZ', 'نيوزيلندا', 'New Zealand', '64', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('141', 'NI', 'نيكاراغوا', 'Nicaragua', '505', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('142', 'NE', 'النيجر', 'Niger', '227', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('143', 'NG', 'نيجيريا', 'Nigeria', '234', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('144', 'NU', 'نيوي', 'Niue', '683', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('145', 'NO', 'النرويج', 'Norway', '47', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('146', 'OM', 'عمان', 'Oman', '968', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('147', 'PK', 'باكستان', 'Pakistan', '92', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('148', 'PW', 'بالاو', 'Palau', '680', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('149', 'PS', 'فلسطين', 'Palestinian', '972', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('15', 'BD', 'بنغلاديش', 'Bangladesh', '880', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('150', 'PA', 'بناما', 'Panama', '507', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('151', 'PY', 'باراغواي', 'Paraguay', '595', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('152', 'PE', 'بيرو', 'Peru', '51', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('153', 'PH', 'الفلبين', 'Philippines', '63', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('154', 'PN', 'بيتكيرن', 'Pitcairn', '870', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('155', 'PL', 'بولندا', 'Poland', '48', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('156', 'PT', 'البرتغال', 'Portugal', '351', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('157', 'PR', 'بويرتو ريكو', 'Puerto Rico', '1-787', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('158', 'QA', 'قطر', 'Qatar', '974', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('159', 'RO', 'رومانيا', 'Romania', '40', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('16', 'BB', 'بربادوس', 'Barbados', '1-246', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('160', 'RU', 'الفيدرالية الروسية', 'Russian Federation', '7', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('161', 'RW', 'رواندا', 'Rwanda', '250', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('162', 'SH', 'سانت هيلينا', 'Saint Helena', '290', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('163', 'KN', 'سانت كيتس ونيفيس', 'Saint Kitts and Nevis', '1-869', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('164', 'LC', 'سانت لوسيا', 'Saint Lucia', '1-758', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('165', 'PM', 'سان بيار وميكلون', 'Saint Pierre and Miquelon', '508', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('166', 'VC', 'سانت فنسنت وجزر غرينادين', 'Saint Vincent and Grenadines', '1-784', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('167', 'WS', 'ساموا', 'Samoa', '685', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('168', 'SM', 'سان مارينو', 'San Marino', '378', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('169', 'ST', 'ساو تومي وبرينسيبي', 'Sao Tome and Principe', '239', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('17', 'BY', 'روسيا البيضاء', 'Belarus', '375', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('170', 'SA', 'المملكة العربية السعودية', 'Saudi Arabia', '966', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('171', 'SN', 'السنغال', 'Senegal', '221', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('172', 'RS', 'صربيا', 'Serbia', '381', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('173', 'SC', 'سيشيل', 'Seychelles', '248', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('174', 'SL', 'سيرا ليون', 'Sierra Leone', '232', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('175', 'SG', 'سنغافورة', 'Singapore', '65', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('176', 'SK', 'سلوفاكيا', 'Slovakia', '421', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('177', 'SI', 'سلوفينيا', 'Slovenia', '386', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('178', 'SB', 'جزر سليمان', 'Solomon Islands', '677', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('179', 'SO', 'الصومال', 'Somalia', '252', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('18', 'BE', 'بلجيكا', 'Belgium', '32', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('180', 'ZA', 'جنوب أفريقيا', 'South Africa', '27', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('181', 'ES', 'إسبانيا', 'Spain', '34', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('182', 'LK', 'سيريلانكا', 'Sri Lanka', '94', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('183', 'SD', 'السودان', 'Sudan', '249', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('184', 'SR', 'سورينام', 'Suriname', '597', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('185', 'SJ', 'جزر سفالبارد وجان ماين', 'Svalbard and Jan Mayen Islands', '47', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('186', 'SZ', 'سوازيلاند', 'Swaziland', '268', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('187', 'SE', 'السويد', 'Sweden', '46', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('188', 'CH', 'سويسرا', 'Switzerland', '41', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('189', 'SY', 'سوريا', 'Syrian Arab Republic', '963', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('19', 'BZ', 'بليز', 'Belize', '501', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('190', 'TW', 'تايوان، جمهورية الصين', 'Taiwan, Republic of China', '886', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('191', 'TJ', 'طاجيكستان', 'Tajikistan', '992', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('192', 'TZ', 'تنزانيا', 'Tanzania', '255', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('193', 'TH', 'تايلاند', 'Thailand', '66', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('194', 'TG', 'توغو', 'Togo', '228', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('195', 'TK', 'توكيلاو', 'Tokelau', '690', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('196', 'TO', 'تونغا', 'Tonga', '676', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('197', 'TT', 'ترينداد وتوباغو', 'Trinidad and Tobago', '1-868', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('198', 'TN', 'تونس', 'Tunisia', '216', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('199', 'TR', 'تركيا', 'Turkey', '90', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('2', 'DZ', 'الجزائر', 'Algeria', '213', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('20', 'BJ', 'بنين', 'Benin', '229', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('200', 'TM', 'تركمانستان', 'Turkmenistan', '993', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('201', 'TC', 'جزر تركس وكايكوس', 'Turks and Caicos Islands', '1-649', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('202', 'TV', 'توفالو', 'Tuvalu', '688', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('203', 'UG', 'أوغندا', 'Uganda', '256', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('204', 'UA', 'أوكرانيا', 'Ukraine', '380', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('205', 'AE', 'الإمارات العربية المتحدة', 'United Arab Emirates', '971', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('206', 'GB', 'المملكة المتحدة', 'United Kingdom', '44', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('207', 'US', 'الولايات المتحدة الأمريكية', 'United States of America', '1', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('208', 'UY', 'أوروغواي', 'Uruguay', '598', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('209', 'UZ', 'أوزبكستان', 'Uzbekistan', '998', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('21', 'BM', 'برمودا', 'Bermuda', '1-441', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('210', 'VU', 'فانواتو', 'Vanuatu', '678', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('211', 'VE', 'فنزويلا', 'Venezuela', '58', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('212', 'VN', 'فيتنام', 'Viet Nam', '84', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('213', 'WF', 'واليس وفوتونا', 'Wallis and Futuna Islands', '681', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('214', 'YE', 'اليمن', 'Yemen', '967', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('215', 'ZM', 'زامبيا', 'Zambia', '260', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('216', 'ZW', 'زيمبابوي', 'Zimbabwe', '263', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('22', 'BT', 'بوتان', 'Bhutan', '975', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('23', 'BO', 'بوليفيا', 'Bolivia', '591', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('24', 'BA', 'البوسنة والهرسك', 'Bosnia and Herzegovina', '387', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('25', 'BW', 'بوتسوانا', 'Botswana', '267', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('26', 'BR', 'البرازيل', 'Brazil', '55', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('27', 'VG', 'جزر فيرجن البريطانية', 'British Virgin Islands', '1-284', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('28', 'IO', 'إقليم المحيط الهندي البريطاني', 'British Indian Ocean Territory', '246', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('29', 'BN', 'بروناي دار السلام', 'Brunei Darussalam', '673', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('3', 'AS', 'ساموا الأمريكية', 'American Samoa', '1-684', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('30', 'BG', 'بلغاريا', 'Bulgaria', '359', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('31', 'BF', 'بوركينا فاسو', 'Burkina Faso', '226', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('32', 'BI', 'بوروندي', 'Burundi', '257', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('33', 'KH', 'كمبوديا', 'Cambodia', '855', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('34', 'CM', 'الكاميرون', 'Cameroon', '237', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('35', 'CA', 'كندا', 'Canada', '1', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('36', 'CV', 'الرأس الأخضر', 'Cape Verde', '238', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('37', 'KY', 'جزر كايمان', 'Cayman Islands', '1-345', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('38', 'CF', 'افريقيا الوسطى', 'Central African Republic', '236', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('39', 'TD', 'تشاد', 'Chad', '235', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('4', 'AD', 'أندورا', 'Andorra', '376', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('40', 'CL', 'تشيلي', 'Chile', '56', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('41', 'CN', 'الصين', 'China', '86', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('42', 'HK', 'هونغ كونغ', 'Hong Kong', '852', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('43', 'MO', 'ماكاو', 'Macao', '853', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('44', 'CX', 'جزيرة الكريسماس', 'Christmas Island', '61', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('45', 'CC', 'جزر كوكوس (كيلينغ)', 'Cocos (Keeling) Islands', '61', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('46', 'CO', 'كولومبيا', 'Colombia', '57', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('47', 'KM', 'جزر القمر', 'Comoros', '269', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('48', 'CK', 'جزر كوك', 'Cook Islands', '682', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('49', 'CR', 'كوستا ريكا', 'Costa Rica', '506', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('5', 'AO', 'أنغولا', 'Angola', '244', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('50', 'HR', 'كرواتيا', 'Croatia', '385', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('51', 'CU', 'كوبا', 'Cuba', '53', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('52', 'CY', 'قبرص', 'Cyprus', '357', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('53', 'CZ', 'الجمهورية التشيكية', 'Czech Republic', '420', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('54', 'DK', 'الدنمارك', 'Denmark', '45', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('55', 'DJ', 'جيبوتي', 'Djibouti', '253', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('56', 'DM', 'دومينيكا', 'Dominica', '1-767', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('57', 'DO', 'جمهورية الدومينيكان', 'Dominican Republic', '1-809', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('58', 'EC', 'الاكوادور', 'Ecuador', '593', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('59', 'EG', 'مصر', 'Egypt', '20', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('6', 'AI', 'أنغيلا', 'Anguilla', '1-264', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('60', 'SV', 'السلفادور', 'El Salvador', '503', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('61', 'GQ', 'غينيا الاستوائية', 'Equatorial Guinea', '240', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('62', 'ER', 'إريتريا', 'Eritrea', '291', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('63', 'EE', 'استونيا', 'Estonia', '372', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('64', 'ET', 'أثيوبيا', 'Ethiopia', '251', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('65', 'FO', 'جزر فارو', 'Faroe Islands', '298', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('66', 'FJ', 'فيجي', 'Fiji', '679', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('67', 'FI', 'فنلندا', 'Finland', '358', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('68', 'FR', 'فرنسا', 'France', '33', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('69', 'GF', 'جيانا الفرنسية', 'French Guiana', '689', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('7', 'AR', 'الأرجنتين', 'Argentina', '54', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('70', 'GA', 'الغابون', 'Gabon', '241', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('71', 'GM', 'غامبيا', 'Gambia', '220', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('72', 'GE', 'جورجيا', 'Georgia', '995', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('73', 'DE', 'ألمانيا', 'Germany', '49', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('74', 'GH', 'غانا', 'Ghana', '233', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('75', 'GI', 'جبل طارق', 'Gibraltar', '350', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('76', 'GR', 'يونان', 'Greece', '30', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('77', 'GL', 'غرينلاند', 'Greenland', '299', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('78', 'GD', 'غرينادا', 'Grenada', '1-473', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('79', 'GU', 'غوام', 'Guam', '1-671', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('8', 'AM', 'أرمينيا', 'Armenia', '374', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('80', 'GT', 'غواتيمالا', 'Guatemala', '502', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('81', 'GN', 'غينيا', 'Guinea', '224', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('82', 'GW', 'غينيا-بيساو', 'Guinea-Bissau', '245', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('83', 'GY', 'غيانا', 'Guyana', '592', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('84', 'HT', 'هايتي', 'Haiti', '509', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('85', 'HN', 'هندوراس', 'Honduras', '504', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('86', 'HU', 'هنغاريا', 'Hungary', '36', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('87', 'IS', 'أيسلندا', 'Iceland', '354', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('88', 'IN', 'الهند', 'India', '91', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('89', 'ID', 'أندونيسيا', 'Indonesia', '62', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('9', 'AW', 'أروبا', 'Aruba', '297', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('90', 'IR', 'جمهورية إيران الإسلامية', 'Iran, Islamic Republic of', '98', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('91', 'IQ', 'العراق', 'Iraq', '964', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('92', 'IE', 'أيرلندا', 'Ireland', '353', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('93', 'IM', 'جزيرة مان', 'Isle of Man', '44-1624', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('94', 'IL', 'إسرائيل', 'Israel', '972', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('95', 'IT', 'إيطاليا', 'Italy', '39', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('96', 'JM', 'جامايكا', 'Jamaica', '1-876', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('97', 'JP', 'اليابان', 'Japan', '81', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('98', 'JE', 'جيرسي', 'Jersey', '44-1534', '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('99', 'JO', 'الأردن', 'Jordan', '962', '2017-11-08 13:25:54', '2017-11-08 13:25:54');

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
-- Table structure for table `aaraa_events`
--

CREATE TABLE `aaraa_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_events`
--

INSERT INTO `aaraa_events` (`id`, `user_id`, `type`, `title`, `details`, `start_date`, `end_date`, `color`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'test note to my calendar', 'this is a test note to my calendar', '2017-12-07 00:00:00', '2017-12-07 00:00:00', NULL, 1, NULL, '2017-03-07 14:06:32', '2017-03-07 14:06:32'),
(2, 1, 1, 'meeting test for multi purposes', 'meeting test for multi purposes meeting test for multi purposes', '2017-11-07 16:03:00', '2017-11-07 16:03:00', NULL, 1, NULL, '2017-03-07 14:07:06', '2017-03-07 14:07:06'),
(3, 1, 2, 'Test the events on calendar', 'sample to test', '2017-12-07 16:00:00', '2017-12-07 18:00:00', NULL, 1, NULL, '2017-03-07 14:07:53', '2017-03-07 14:07:53'),
(4, 1, 3, 'Site task test will take half month', 'test task', '2017-11-07 00:00:00', '2017-11-22 00:00:00', NULL, 1, NULL, '2017-03-07 14:08:53', '2017-03-07 14:08:53'),
(5, 1, 0, 'my test note i just test', 'my test note i just test', '2017-09-22 00:00:00', '2017-09-22 00:00:00', NULL, 1, NULL, '2017-03-07 14:09:26', '2017-03-07 14:09:26');

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
-- Table structure for table `aaraa_maps`
--

CREATE TABLE `aaraa_maps` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci,
  `details_en` text COLLATE utf8mb4_unicode_ci,
  `icon` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_maps`
--

INSERT INTO `aaraa_maps` (`id`, `topic_id`, `longitude`, `latitude`, `title_ar`, `title_en`, `details_ar`, `details_en`, `icon`, `status`, `row_no`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, '39.639537564366684', '-101.953125', 'عنوان رئيسي هنا', 'Main Title here', 'Co Rd 6, Kanorado, KS 67741, USA', 'Co Rd 6, Kanorado, KS 67741, USA', 3, 1, 1, 1, 1, '2017-03-06 12:41:56', '2017-03-06 12:45:09'),
(4, 2, '40.136890695345905', '-100.689697265625', 'عنوان رئيسي هنا', 'Main title here', 'Rd 381, McCook, NE 69001, USA', 'Rd 381, McCook, NE 69001, USA', 2, 1, 2, 1, 1, '2017-03-06 12:44:21', '2017-03-06 12:45:30'),
(5, 2, '40.463666324587685', '-103.447265625', 'عنوان رئيسي هنا', 'Main title here', 'Co Rd 6, Merino, CO 80741, USA', 'Co Rd 6, Merino, CO 80741, USA', 5, 1, 3, 1, 1, '2017-03-06 12:44:29', '2017-03-06 12:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_menus`
--

CREATE TABLE `aaraa_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `row_no` int(11) NOT NULL,
  `father_id` int(11) NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_menus`
--

INSERT INTO `aaraa_menus` (`id`, `row_no`, `father_id`, `title_ar`, `title_en`, `status`, `type`, `cat_id`, `link`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'القائمة الرئيسية', 'Main Menu', 1, 0, 0, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(2, 2, 0, 'روابط سريعة', 'Quick Links', 1, 0, 0, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(3, 1, 1, 'الرئيسية', 'Home', 1, 1, 0, 'home', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(4, 2, 1, 'من نحن', 'About', 1, 1, 0, 'topic/about', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(5, 3, 1, 'خدماتنا', 'Services', 1, 3, 2, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(6, 4, 1, 'أخبارنا', 'News', 1, 2, 3, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(7, 5, 1, 'الصور', 'Photos', 1, 2, 4, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(8, 6, 1, 'الفيديو', 'Videos', 1, 3, 5, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(9, 7, 1, 'الصوتيات', 'Audio', 1, 3, 6, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(10, 8, 1, 'المنتجات', 'Products', 1, 3, 8, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(11, 9, 1, 'المدونة', 'Blog', 1, 2, 7, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(12, 10, 1, 'اتصل بنا', 'Contact', 1, 1, 0, 'contact', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(13, 1, 2, 'الرئيسية', 'Home', 1, 1, 0, 'home', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(14, 2, 2, 'من نحن', 'About Us', 1, 1, 0, 'topic/about', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(15, 3, 2, 'المدونة', 'Blog', 1, 2, 7, '', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(16, 4, 2, 'الخصوصية', 'Privacy', 1, 1, 0, 'topic/privacy', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(17, 5, 2, 'الشروط والأحكام', 'Terms & Conditions', 1, 1, 0, 'topic/terms', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(18, 6, 2, 'اتصل بنا', 'Contact Us', 1, 1, 0, 'contact', 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24');

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
('35f3b0ace26a72931c98089b13f6431e5de49f93679501ad124632b9c7ae47aab105174894f2216f', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 18:42:34', '2019-06-17 18:42:34', '2019-12-18 00:12:34'),
('60fcb45d2b455c58d5964edcf04d8521cb0309cf96cc0b161bb7423555489ef8c4ba4f9537081d46', '354db5ef-08a9-4024-870b-936013820508', 9, 'Aaraa', '[]', 0, '2019-06-19 13:19:43', '2019-06-19 13:19:43', '2019-12-19 16:19:43'),
('66227e6911ebd60d68e006c92680c237ff06e3a41a14c473467181fc0739b9b03607f50efb3cb97d', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 05:45:13', '2019-06-17 05:45:13', '2019-12-17 08:45:13'),
('8cf04e3d132aa3b88a937073f631422e0b012c00fb63a26444236b75ada67dc9be35d165c48c6f98', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 10:02:26', '2019-06-17 10:02:26', '2019-12-17 13:02:26'),
('9897c645511b27db90b76f9bedbbd0b67e45af47fd17bf8b6bc37fc5612c34a020c73ec20b6843c5', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 16:51:25', '2019-06-17 16:51:25', '2019-12-17 22:21:24'),
('bc539ca309bcb116e3ddf5994126b5a704e2262e47fd919d4aaa62b1844f90d7a5839380f2ac3e99', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 18:42:21', '2019-06-17 18:42:21', '2019-12-18 00:12:20'),
('caf3e37b8730dfbb3c2fea2a3f717796cfe409df18e2ebf60b20df40c6a969ed9ad9243929103ab6', '031d14b4-e222-4bde-a770-b44fcaeba49f', 9, 'Laravel', '[]', 0, '2019-06-17 18:43:43', '2019-06-17 18:43:43', '2019-12-18 00:13:43'),
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
('mjhosawa@vavisa-kw.com', '$2y$10$Em0ecIOP2.gpPtUHr7Jar.9tAHTjviMFFk4J.bbsC5zMlhQevwIpS', '2019-06-18 08:00:37');

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
  `newsletter_status` tinyint(4) NOT NULL DEFAULT '0',
  `calendar_status` tinyint(4) NOT NULL DEFAULT '0',
  `banners_status` tinyint(4) NOT NULL DEFAULT '0',
  `polls_status` tinyint(4) NOT NULL,
  `categories_status` tinyint(4) NOT NULL,
  `appusers_status` tinyint(4) NOT NULL,
  `settings_status` tinyint(4) NOT NULL DEFAULT '0',
  `webmaster_status` tinyint(4) NOT NULL DEFAULT '0',
  `data_sections` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_permissions`
--

INSERT INTO `aaraa_permissions` (`id`, `name`, `view_status`, `add_status`, `edit_status`, `delete_status`, `analytics_status`, `notifications_status`, `newsletter_status`, `calendar_status`, `banners_status`, `polls_status`, `categories_status`, `appusers_status`, `settings_status`, `webmaster_status`, `data_sections`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Webmaster', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1,2,3,4,5,6,7,8,9', 1, 1, NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
(2, 'Website Manager', 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, '1,2,3,4,5,6,7,8,9', 1, 1, NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
(3, 'Limited User', 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '1,2,3,4,5,6,7,8,9', 1, 1, NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_photos`
--

CREATE TABLE `aaraa_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_photos`
--

INSERT INTO `aaraa_photos` (`id`, `topic_id`, `file`, `title`, `row_no`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 9, '14888159357846.jpg', '14888146802295', 1, 1, NULL, '2017-03-06 13:58:55', '2017-03-06 13:58:55'),
(2, 9, '14888159356958.jpg', '14888146712437', 1, 1, NULL, '2017-03-06 13:58:55', '2017-03-06 13:58:55'),
(3, 9, '14888159357505.jpg', '14888155324481', 2, 1, NULL, '2017-03-06 13:58:55', '2017-03-06 13:58:55'),
(4, 12, '14888160421353.jpg', '14888159357505', 1, 1, NULL, '2017-03-06 14:00:42', '2017-03-06 14:00:42'),
(6, 12, '14888162827801.jpg', '14888159356958', 2, 1, NULL, '2017-03-06 14:04:42', '2017-03-06 14:04:42'),
(7, 23, '14888185569533.jpg', 'picjumbo.com_HNCK0183', 1, 1, NULL, '2017-03-06 14:42:36', '2017-03-06 14:42:36'),
(8, 23, '14888185564870.jpg', 'picjumbo.com_HNCK0210', 1, 1, NULL, '2017-03-06 14:42:36', '2017-03-06 14:42:36'),
(9, 23, '14888185567711.jpg', 'picjumbo.com_HNCK1748', 2, 1, NULL, '2017-03-06 14:42:36', '2017-03-06 14:42:36'),
(10, 23, '14888185565392.jpg', 'picjumbo.com_HNCK5322', 2, 1, NULL, '2017-03-06 14:42:36', '2017-03-06 14:42:36'),
(11, 23, '14888185563329.jpg', 'picjumbo.com_IMG_7167', 3, 1, NULL, '2017-03-06 14:42:36', '2017-03-06 14:42:36'),
(12, 23, '14888185566343.jpg', 'picjumbo.com_IMG_7172', 3, 1, NULL, '2017-03-06 14:42:36', '2017-03-06 14:42:36'),
(13, 23, '14888185561337.jpg', 'picjumbo.com_IMG_8868', 4, 1, NULL, '2017-03-06 14:42:36', '2017-03-06 14:42:36'),
(14, 23, '14888185564002.jpg', 'picjumbo.com_IMG_7961', 4, 1, NULL, '2017-03-06 14:42:36', '2017-03-06 14:42:36'),
(15, 24, '14888186143991.jpg', 'picjumbo.com_HNCK7801', 1, 1, NULL, '2017-03-06 14:43:34', '2017-03-06 14:43:34'),
(16, 24, '14888186147889.jpg', 'picjumbo.com_HNCK7784', 2, 1, NULL, '2017-03-06 14:43:34', '2017-03-06 14:43:34'),
(17, 24, '14888186147423.jpg', 'picjumbo.com_HNCK8360', 3, 1, NULL, '2017-03-06 14:43:34', '2017-03-06 14:43:34'),
(18, 24, '14888186141400.jpg', 'picjumbo.com_HNCK8458', 4, 1, NULL, '2017-03-06 14:43:34', '2017-03-06 14:43:34'),
(19, 24, '14888186147346.jpg', 'picjumbo.com_HNCK9016', 5, 1, NULL, '2017-03-06 14:43:34', '2017-03-06 14:43:34'),
(20, 24, '14888186141502.jpg', 'picjumbo.com_IMG_3212', 5, 1, NULL, '2017-03-06 14:43:34', '2017-03-06 14:43:34'),
(21, 24, '14888186143432.jpg', 'picjumbo.com_IMG_5992', 6, 1, NULL, '2017-03-06 14:43:34', '2017-03-06 14:43:34'),
(22, 24, '14888186147500.jpg', 'picjumbo.com_IMG_3640', 6, 1, NULL, '2017-03-06 14:43:34', '2017-03-06 14:43:34'),
(23, 25, '14888186704977.jpg', 'picjumbo.com_HNCK4011', 1, 1, NULL, '2017-03-06 14:44:30', '2017-03-06 14:44:30'),
(24, 25, '14888186701922.jpg', 'picjumbo.com_HNCK3988', 1, 1, NULL, '2017-03-06 14:44:30', '2017-03-06 14:44:30'),
(25, 25, '14888186716815.jpg', 'picjumbo.com_HNCK7802', 2, 1, NULL, '2017-03-06 14:44:31', '2017-03-06 14:44:31'),
(26, 25, '14888186711726.jpg', 'picjumbo.com_HNCK7775', 2, 1, NULL, '2017-03-06 14:44:31', '2017-03-06 14:44:31'),
(27, 25, '14888186715386.jpg', 'picjumbo.com_HNCK8404', 3, 1, NULL, '2017-03-06 14:44:31', '2017-03-06 14:44:31'),
(28, 25, '14888186717969.jpg', 'picjumbo.com_HNCK8478', 3, 1, NULL, '2017-03-06 14:44:31', '2017-03-06 14:44:31'),
(29, 25, '14888186717433.jpg', 'picjumbo.com_HNCK8495', 4, 1, NULL, '2017-03-06 14:44:31', '2017-03-06 14:44:31'),
(30, 25, '14888186717917.jpg', 'picjumbo.com_HNCK8991', 4, 1, NULL, '2017-03-06 14:44:31', '2017-03-06 14:44:31'),
(31, 26, '14888187058652.jpg', 'picjumbo.com_HNCK0210', 1, 1, NULL, '2017-03-06 14:45:05', '2017-03-06 14:45:05'),
(32, 26, '14888187054122.jpg', 'picjumbo.com_HNCK0183', 1, 1, NULL, '2017-03-06 14:45:05', '2017-03-06 14:45:05'),
(33, 26, '14888187065068.jpg', 'picjumbo.com_HNCK1748', 2, 1, NULL, '2017-03-06 14:45:06', '2017-03-06 14:45:06'),
(34, 26, '14888187067771.jpg', 'picjumbo.com_HNCK5322', 2, 1, NULL, '2017-03-06 14:45:06', '2017-03-06 14:45:06'),
(35, 26, '14888187065221.jpg', 'picjumbo.com_IMG_7167', 3, 1, NULL, '2017-03-06 14:45:06', '2017-03-06 14:45:06'),
(36, 26, '14888187065292.jpg', 'picjumbo.com_IMG_7172', 3, 1, NULL, '2017-03-06 14:45:06', '2017-03-06 14:45:06'),
(37, 26, '14888187061421.jpg', 'picjumbo.com_IMG_8868', 4, 1, NULL, '2017-03-06 14:45:06', '2017-03-06 14:45:06'),
(38, 26, '14888187063601.jpg', 'picjumbo.com_IMG_7961', 4, 1, NULL, '2017-03-06 14:45:06', '2017-03-06 14:45:06');

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
('1', 'Who is the best football player in the world?', NULL, 1, '2019-06-11 20:36:00', '2019-06-11 20:36:00', 1, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-11 20:36:00', '2019-06-11 20:36:00'),
('1cdd4bc5-1195-4309-b52e-6afeab837c78', 'test', '', 1, NULL, NULL, 0, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-16 16:46:34', '2019-06-16 16:46:34'),
('2', 'Who is the worst football player in the world?', NULL, 1, '2019-06-11 20:36:00', '2019-06-11 20:36:00', 1, '031d14b4-e222-4bde-a770-b44fcaeba49f', '031d14b4-e222-4bde-a770-b44fcaeba49f', '2019-06-11 20:36:00', '2019-06-11 20:36:00'),
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
-- Table structure for table `aaraa_related_topics`
--

CREATE TABLE `aaraa_related_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `topic2_id` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_sections`
--

CREATE TABLE `aaraa_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `visits` int(11) NOT NULL,
  `webmaster_id` int(11) NOT NULL,
  `father_id` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `seo_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_sections`
--

INSERT INTO `aaraa_sections` (`id`, `title_ar`, `title_en`, `photo`, `icon`, `status`, `visits`, `webmaster_id`, `father_id`, `row_no`, `seo_title_ar`, `seo_title_en`, `seo_description_ar`, `seo_description_en`, `seo_keywords_ar`, `seo_keywords_en`, `seo_url_slug_ar`, `seo_url_slug_en`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'تصميم المواقع', 'Web Design', NULL, 'fa-desktop', 1, 0, 7, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:11:25', '2017-03-06 14:11:25'),
(2, 'تطبيقات الهواتف', 'Mobile Applications', NULL, 'fa-apple', 1, 0, 7, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:11:50', '2017-03-06 14:11:50'),
(3, 'رسوم متحركة', 'Motion Draws', NULL, 'fa-motorcycle', 1, 0, 7, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:12:24', '2017-03-06 14:12:24'),
(4, 'تطوير الويب', 'Web Development', NULL, 'fa-html5', 1, 0, 7, 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:12:51', '2017-03-06 14:12:51'),
(5, 'تصميم المطبوعات', 'Publications Design', NULL, 'fa-connectdevelop', 1, 0, 7, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:13:41', '2017-03-06 14:13:41'),
(6, 'أرشفة المواقع', 'Search Engines Optmization', NULL, 'fa-line-chart', 1, 0, 7, 0, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:21:52', '2017-03-06 14:21:52'),
(7, 'تصميم ثلاثي اأبعاد', '3d Design', NULL, 'fa-modx', 1, 0, 7, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:22:50', '2017-03-06 14:22:50'),
(8, 'الطبيعة', 'Nature', NULL, 'fa-leaf', 1, 0, 5, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:48:06', '2017-03-06 14:48:06'),
(9, 'مدن وعواصم', 'Cities', NULL, 'fa-map-o', 1, 0, 5, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:48:43', '2017-03-06 14:48:43'),
(10, 'مغامرات', 'Adventures', NULL, 'fa-flag-checkered', 1, 0, 5, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:49:27', '2017-03-06 14:49:27'),
(12, 'فيديوهات يوتيوب', 'Youtube Videos', NULL, 'fa-youtube', 1, 0, 5, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 15:10:10', '2017-03-06 15:10:10'),
(13, 'فيديوهات فيميو', 'Vimeo videos', NULL, 'fa-vimeo', 1, 0, 5, 0, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 15:10:37', '2017-03-06 15:10:37'),
(14, 'فيديوهات محملة', 'Hosted videos', NULL, 'fa-database', 1, 0, 5, 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 15:11:22', '2017-03-06 15:11:22'),
(15, 'سولو', 'Solo', NULL, NULL, 1, 1, 6, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 16:44:08', '2017-11-08 19:51:42'),
(16, 'بوب ميوزك', 'POP', NULL, NULL, 1, 0, 6, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 16:44:24', '2017-03-06 16:44:24'),
(17, 'صوتيات متنوعة', 'Other Sounds', NULL, NULL, 1, 0, 6, 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 16:44:49', '2017-03-06 16:45:30'),
(18, 'اصوات موسيقية', 'Music Sounds', NULL, NULL, 1, 0, 6, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 16:45:19', '2017-03-06 16:45:30'),
(19, 'قسم منتجات ١', 'Product Category 1', NULL, NULL, 1, 2, 8, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 16:49:22', '2017-11-08 19:51:45'),
(20, 'قسم منتجات ٢', 'Product Category 2', NULL, NULL, 1, 0, 8, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 16:49:41', '2017-03-06 16:52:12'),
(21, 'قسم منتجات ٣', 'Product Category 3', NULL, NULL, 1, 0, 8, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 16:50:00', '2017-03-06 16:52:17'),
(22, 'قسم منتجات ٤', 'Product Category 4', NULL, NULL, 1, 0, 8, 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 16:50:25', '2017-03-06 16:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_settings`
--

CREATE TABLE `aaraa_settings` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_keywords_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_webmails` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notify_messages_status` tinyint(4) DEFAULT NULL,
  `notify_comments_status` tinyint(4) DEFAULT NULL,
  `notify_orders_status` tinyint(4) DEFAULT NULL,
  `site_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_status` tinyint(4) NOT NULL,
  `ios_version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `android_version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_options` int(11) NOT NULL,
  `max_options` int(11) NOT NULL,
  `close_msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link6` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link7` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link8` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link9` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link10` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t1_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t1_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t6` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t7_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_t7_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style_logo_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_logo_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_fav` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_apple` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_color1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_color2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_type` tinyint(4) DEFAULT NULL,
  `style_bg_type` tinyint(4) DEFAULT NULL,
  `style_bg_pattern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_bg_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_bg_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_subscribe` tinyint(4) DEFAULT NULL,
  `style_footer` tinyint(4) DEFAULT NULL,
  `style_footer_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_preload` tinyint(4) DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_settings`
--

INSERT INTO `aaraa_settings` (`id`, `site_title_ar`, `site_title_en`, `site_desc_ar`, `site_desc_en`, `site_keywords_ar`, `site_keywords_en`, `site_webmails`, `notify_messages_status`, `notify_comments_status`, `notify_orders_status`, `site_url`, `site_status`, `ios_version`, `android_version`, `min_options`, `max_options`, `close_msg`, `social_link1`, `social_link2`, `social_link3`, `social_link4`, `social_link5`, `social_link6`, `social_link7`, `social_link8`, `social_link9`, `social_link10`, `contact_t1_ar`, `contact_t1_en`, `contact_t3`, `contact_t4`, `contact_t5`, `contact_t6`, `contact_t7_ar`, `contact_t7_en`, `style_logo_ar`, `style_logo_en`, `style_fav`, `style_apple`, `style_color1`, `style_color2`, `style_type`, `style_bg_type`, `style_bg_pattern`, `style_bg_color`, `style_bg_image`, `style_subscribe`, `style_footer`, `style_footer_bg`, `style_preload`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'اسم وعنوان الموقع', 'aaraa Laravel Site Preview', 'وصف الموقع الإلكتروني ونبذة قصيره عنه', 'Website description and some little information about it', 'كلمات، دلالية، موقع، موقع إلكتروني', 'key, words, website, web', 'support@smartfordesign.com', 1, 1, 1, 'http://smartfordesign.net/aaraa/demo', 1, '1.4', '1.4', 2, 5, 'Website under maintenance \r\n<h1>Comming SOON</h1>', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', 'المبني - اسم الشارع - المدينة - الدولة', 'Building, Street name, City, Country', '+(00) 0123456789', '+(00) 0123456789', '+(00) 0123456789', 'info@sitename.com', 'من الأحد إلى الخميس 08:00 ص - 05:00 م', 'Sunday to Thursday 08:00 AM to 05:00 PM', '15609442269872.png', '15609442266788.png', '15609442269958.png', '15609442266095.png', '#de485d', '#242a37', 0, 0, NULL, '#2e3e4e', NULL, 1, 1, NULL, 0, '1', '1', '2017-03-06 11:06:23', '2019-06-19 11:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_topics`
--

CREATE TABLE `aaraa_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` longtext COLLATE utf8mb4_unicode_ci,
  `details_en` longtext COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `video_type` tinyint(4) DEFAULT NULL,
  `photo_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_file` text COLLATE utf8mb4_unicode_ci,
  `audio_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `visits` int(11) NOT NULL,
  `webmaster_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `seo_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_topics`
--

INSERT INTO `aaraa_topics` (`id`, `page_name`, `title_ar`, `title_en`, `details_ar`, `details_en`, `date`, `expire_date`, `video_type`, `photo_file`, `attach_file`, `video_file`, `audio_file`, `icon`, `status`, `visits`, `webmaster_id`, `section_id`, `row_no`, `seo_title_ar`, `seo_title_en`, `seo_description_ar`, `seo_description_en`, `seo_keywords_ar`, `seo_keywords_en`, `seo_url_slug_ar`, `seo_url_slug_en`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '', 'من نحن', 'About Us', '<h4 style=\"text-align: justify;\">رؤيتنا</h4>\r\n<p style=\"text-align: justify;\">أن نصبح الشركة الرائدة في هذا المجال على مستوى الشرق الأوسط والمستوي العالمي من خلال الاستفادة من الأفكار المتميزة، ونحن نعمل على تقديم حلول فريدة لعملائنا الكرام لتكون مطابقة لتوقعاتهم من خلال تقديم الخدمات الفعالة.أن نصبح الشركة الرائدة في هذا المجال على مستوى الشرق الأوسط والمستوي العالمي من خلال الاستفادة من الأفكار المتميزة، ونحن نعمل على تقديم حلول فريدة لعملائنا الكرام لتكون مطابقة لتوقعاتهم من خلال تقديم الخدمات الفعالة.</p><p style=\"text-align: justify;\"><br></p>\r\n<h4 style=\"text-align: justify;\">رسالتنا</h4>\r\n<p style=\"text-align: justify;\">رسالتنا هي تمكين عملائنا من تطوير أعمالهم من خلال الأفكار المتميزة، وتقديم الاستشارات الموثوقة والخدمة عالية الجودة، بالإضافة إلى تأسيس مكان رائع نعمل من أجله والذي يجذب الأشخاص المميزين ويعمل على تطويرهم والاحتفاظ بهم.رسالتنا هي تمكين عملائنا من تطوير أعمالهم من خلال الأفكار المتميزة، وتقديم الاستشارات الموثوقة والخدمة عالية الجودة، بالإضافة إلى تأسيس مكان رائع نعمل من أجله والذي يجذب الأشخاص المميزين ويعمل على تطويرهم والاحتفاظ بهم.</p><p style=\"text-align: justify;\"><br></p>\r\n<h4 style=\"text-align: justify;\">فريق العمل</h4>\r\n<p style=\"text-align: justify;\">إن فريق عملنا متنوع ونتفاعل مع بعضنا البعض باحترام متبادل بغض النظر عن الجنس أو الجنسية أو الدين أو العرق، كما نثق في بعضنا البعض ونؤمن بالعدالة والشفافية، نحن نخلق بيئة تعزز التعاون و الإنجازات المتميزة.إن فريق عملنا متنوع ونتفاعل مع بعضنا البعض باحترام متبادل بغض النظر عن الجنس أو الجنسية أو الدين أو العرق، كما نثق في بعضنا البعض ونؤمن بالعدالة والشفافية، نحن نخلق بيئة تعزز التعاون و الإنجازات المتميزة.</p>', '<h4 style=\"text-align: justify; \">Our Vision</h4>\r\n<p style=\"text-align: justify;\">Our vision is to become the leading Company in the region. Using innovative ideas, we provide best of breed solutions . Combining creative problem solving, solid service delivery model.Our vision is to become the leading Company in the region. Using innovative ideas, we provide best of breed solutions . Combining creative problem solving, solid service delivery model.</p><p style=\"text-align: justify;\"><br></p>\r\n<h4 style=\"text-align: justify; \">Our Mission</h4>\r\n<p style=\"text-align: justify;\">Our mission is to enable our clients to develop their business through innovative ideas, advice and quality of service. And to build a great place to work for, that develops and retains great people.Our mission is to enable our clients to develop their business through innovative ideas, advice and quality of service. And to build a great place to work for, that develops and retains great people.</p><p style=\"text-align: justify;\"><br></p>\r\n<h4 style=\"text-align: justify;\">Work Team</h4>\r\n<p style=\"text-align: justify;\">Our team is diversified and we interact with each other with mutual respect regardless of gender, nationality and background. We trust each other and believe in fairness and transparency.Our vision is to become the leading Company in the region. Using innovative ideas, we provide best of breed solutions . Combining creative problem solving, solid service delivery model.</p>', '2017-03-06', NULL, NULL, '14888121759700.jpg', NULL, '', NULL, NULL, 1, 33, 1, 0, 1, 'عن الموقع', 'About aaraa', 'وصف الصفحة الخاصة بمن نحن ليساعد على الأرشفة', 'Page description for good SEO', 'من نحن، نبذة عنا، وصف الموقع، كلمات ، دلالية', 'About, who us, kewords, aaraa', NULL, NULL, 1, 1, '2017-03-06 11:06:24', '2017-11-08 18:30:29'),
(2, '', 'اتصل بنا', 'Contact Us', NULL, NULL, '2017-03-06', NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 54, 1, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 11:06:24', '2017-11-13 12:31:10'),
(3, '', 'الخصوصية', 'Privacy', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.', 'It is a long established fact that a reader will be distracted by the readable content of a page.', '2017-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(4, '', 'الشروط والأحكام', 'Terms & Conditions', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.', 'It is a long established fact that a reader will be distracted by the readable content of a page.', '2017-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 11:06:24', '2017-03-06 11:06:24'),
(5, '', 'نص تجريبي لاختبار خدمة', 'Nullam mollis dolor', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"text-align: justify; font-size: 13.92px;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify; font-size: 13.92px;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify; font-size: 13.92px;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"text-align: justify; font-size: 13.92px;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify; font-size: 13.92px;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"text-align: justify; \">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"text-align: justify;\">&nbsp;</div><div style=\"text-align: justify;\"><br></div></div>', '2017-03-06', NULL, NULL, '14888139271255.jpg', NULL, '', NULL, 'fa-ambulance', 1, 20, 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 13:25:27', '2017-11-13 12:31:25'),
(6, '', 'عنوان تجريبي للخدمات', 'Sample Lorem Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"text-align: justify; \">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify; \">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"text-align: justify;\">&nbsp;</div><div style=\"text-align: justify;\"><br></div></div>', '2017-03-06', NULL, NULL, '14888139889647.jpg', NULL, '', NULL, 'fa-cart-plus', 1, 3, 2, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 13:26:28', '2017-11-13 12:31:21'),
(7, '', 'عنوان تجريبي من الخدمات', 'Gravida tellus suscipit', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"text-align: justify; \">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify; \">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"text-align: justify; \">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"text-align: justify;\">&nbsp;</div><div style=\"text-align: justify;\"><br></div></div>', '2017-03-06', NULL, NULL, '14888140236712.jpg', NULL, '', NULL, 'fa-pie-chart', 1, 4, 2, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 13:27:03', '2017-03-07 13:20:33'),
(8, '', 'نص تجريبي من النصوص', 'Curabitur sit amet era', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"text-align: justify; \">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"text-align: justify; \">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"text-align: justify; \">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"text-align: justify;\">&nbsp;</div><div style=\"text-align: justify;\"><br></div></div>', '2017-03-06', NULL, NULL, '14888140657735.jpg', NULL, '', NULL, 'fa-coffee', 1, 1, 2, 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 13:27:45', '2017-03-06 16:42:54'),
(9, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text, sed imperdiet nulla tellus ut diam.', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-06', NULL, NULL, '14888146415538.jpg', NULL, '', NULL, NULL, 1, 12, 3, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 13:37:21', '2017-03-07 13:24:05'),
(10, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Aliquam suscipit, lacus a iaculis adipiscing, Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-06', NULL, NULL, '14888146712437.jpg', NULL, '', NULL, NULL, 1, 3, 3, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 13:37:51', '2017-03-07 13:23:50'),
(11, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text.Suspendisse potenti. Vestibulum lacus', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-06', NULL, NULL, '14888146802295.jpg', NULL, '', NULL, NULL, 1, 0, 3, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 13:38:00', '2017-03-06 14:09:33');
INSERT INTO `aaraa_topics` (`id`, `page_name`, `title_ar`, `title_en`, `details_ar`, `details_en`, `date`, `expire_date`, `video_type`, `photo_file`, `attach_file`, `video_file`, `audio_file`, `icon`, `status`, `visits`, `webmaster_id`, `section_id`, `row_no`, `seo_title_ar`, `seo_title_en`, `seo_description_ar`, `seo_description_en`, `seo_keywords_ar`, `seo_keywords_en`, `seo_url_slug_ar`, `seo_url_slug_en`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(12, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Suspendisse potenti. Vestibulum lacus Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-06', NULL, NULL, '14888146896446.jpg', NULL, '', NULL, NULL, 1, 3, 3, 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 13:38:09', '2017-03-06 14:09:46'),
(13, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-06', NULL, NULL, '14888155135678.jpg', NULL, NULL, NULL, NULL, 1, 0, 3, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 13:51:53', '2017-03-06 13:51:53'),
(14, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-06', NULL, NULL, '14888155324481.jpg', NULL, NULL, NULL, NULL, 1, 0, 3, 0, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 13:52:12', '2017-03-06 13:52:12'),
(15, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div><br></div></div>', '2017-03-06', NULL, NULL, '14888170311535.jpg', NULL, '', NULL, NULL, 1, 2, 7, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:17:11', '2017-03-07 13:24:35'),
(16, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div><br></div></div>', '2017-03-06', NULL, NULL, '14888170546118.jpg', NULL, '', NULL, NULL, 1, 2, 7, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:17:34', '2017-03-06 16:14:40'),
(17, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div><br></div></div>', '2017-03-06', NULL, NULL, '14888170654620.jpg', NULL, '', NULL, NULL, 1, 0, 7, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:17:45', '2017-03-06 14:29:19'),
(18, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div><br></div></div>', '2017-03-06', NULL, NULL, '14888170745161.jpg', NULL, '', NULL, NULL, 1, 0, 7, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:17:54', '2017-03-06 14:29:33'),
(19, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text, sed imperdiet nulla tellus ut diam.', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div><br></div></div>', '2017-03-06', NULL, NULL, '14888170858180.jpg', NULL, NULL, NULL, NULL, 1, 0, 7, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:18:05', '2017-11-08 19:43:02');
INSERT INTO `aaraa_topics` (`id`, `page_name`, `title_ar`, `title_en`, `details_ar`, `details_en`, `date`, `expire_date`, `video_type`, `photo_file`, `attach_file`, `video_file`, `audio_file`, `icon`, `status`, `visits`, `webmaster_id`, `section_id`, `row_no`, `seo_title_ar`, `seo_title_en`, `seo_description_ar`, `seo_description_en`, `seo_keywords_ar`, `seo_keywords_en`, `seo_url_slug_ar`, `seo_url_slug_en`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(20, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text, sed imperdiet nulla tellus ut diam.', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div><br></div></div>', '2017-03-06', NULL, NULL, '14888170994430.jpg', NULL, NULL, NULL, NULL, 1, 2, 7, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:18:19', '2017-11-08 19:43:10'),
(21, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text, sed imperdiet nulla tellus ut diam.', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div><br></div></div>', '2017-03-06', NULL, NULL, '14888171106415.jpg', NULL, NULL, NULL, NULL, 1, 4, 7, 1, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:18:30', '2017-11-08 19:43:24'),
(22, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text, sed imperdiet nulla tellus ut diam.', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div><br></div></div>', '2017-03-06', NULL, NULL, '14888171164162.jpg', NULL, NULL, NULL, NULL, 1, 3, 7, 1, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:18:36', '2017-11-08 19:43:35'),
(23, '', 'جالري صور ١', 'Cars Gallery', NULL, NULL, '2017-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 4, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:42:03', '2017-03-06 14:42:03'),
(24, '', 'جالري صور ٢', 'Phones Gallery', NULL, NULL, '2017-03-06', NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 0, 4, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:43:18', '2017-03-06 14:43:47'),
(25, '', 'جالري صور 3', 'Laptops Gallery', NULL, NULL, '2017-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 4, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:44:17', '2017-03-06 14:44:17'),
(26, '', 'جالري صور 4', 'Other Gallery', NULL, NULL, '2017-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 0, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-03-06 14:44:54', '2017-03-06 14:45:22'),
(27, '', 'طبيعة فيديو ١', 'Nature Video 1', NULL, NULL, '2017-03-06', NULL, 1, NULL, NULL, 'https://www.youtube.com/watch?v=PCwL3-hkKrg', NULL, NULL, 1, 0, 5, 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:53:42', '2017-11-08 19:39:43'),
(28, '', 'فيدو معامرات ١', 'Video title here', NULL, NULL, '2017-03-06', NULL, 0, '14888196096249.jpg', NULL, '14888199269864.mp4', NULL, NULL, 1, 0, 5, 14, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 14:58:07', '2017-03-06 15:13:27'),
(29, '', 'مثال لفيديو من يوتيوب', 'Sample for youtube videos', NULL, NULL, '2017-03-06', NULL, 1, NULL, NULL, 'https://www.youtube.com/watch?v=fHfb5-7xLtc', NULL, NULL, 1, 0, 5, 12, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-06 15:12:20', '2017-11-08 19:40:15'),
(32, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-07', NULL, NULL, '14889008041514.jpg', NULL, NULL, NULL, NULL, 1, 0, 8, 19, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-07 13:33:24', '2017-11-08 19:44:13'),
(33, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-07', NULL, NULL, '14889008137532.jpg', NULL, NULL, NULL, NULL, 1, 0, 8, 19, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-07 13:33:33', '2017-11-08 19:44:23'),
(34, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-07', NULL, NULL, '14889008358884.jpg', NULL, NULL, NULL, NULL, 1, 0, 8, 20, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-07 13:33:55', '2017-11-08 19:44:30'),
(35, '', 'نص تجريبي لاختبار شكل و حجم النصوص', 'Sample Lorem Ipsum Text', '<div dir=\"rtl\"><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع&nbsp;</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">.يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div><div dir=\"rtl\" style=\"font-size: 13.92px; text-align: justify;\">هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع. هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة فقط وهو لا يعبر عن أي موضوع محدد انما لتحديد الشكل العام للقسم او الصفحة أو الموقع.</div></div>', '<div dir=\"ltr\"><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a nulla. Ut a orci. Curabitur dolor nunc, egestas at, accumsan at, malesuada nec, magna.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Nulla facilisi. Nunc volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet orci vel mauris blandit vehicula. Nullam quis enim. Integer dignissim viverra velit. Curabitur in odio. In hac habitasse platea dictumst. Ut consequat, tellus eu volutpat varius, justo orci elementum dolor, sed imperdiet nulla tellus ut diam. Vestibulum ipsum ante, malesuada quis, tempus ac, placerat sit amet, elit.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque aliquet lacus vitae pede. Nullam mollis dolor ac nisi. Phasellus sit amet urna. Praesent pellentesque sapien sed lacus. Donec lacinia odio in odio. In sit amet elit. Maecenas gravida interdum urna. Integer pretium, arcu vitae imperdiet facilisis, elit tellus tempor nisi, vel feugiat ante velit sit amet mauris. Vivamus arcu. Integer pharetra magna ac lacus. Aliquam vitae sapien in nibh vehicula auctor. Suspendisse leo mauris, pulvinar sed, tempor et, consequat ac, lacus. Proin velit. Nulla semper lobortis mauris. Duis urna erat, ornare et, imperdiet eu, suscipit sit amet, massa. Nulla nulla nisi, pellentesque at, egestas quis, fringilla eu, diam.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec semper, sem nec tristique tempus, justo neque commodo nisl, ut gravida sem tellus suscipit nunc. Aliquam erat volutpat. Ut tincidunt pretium elit. Aliquam pulvinar. Nulla cursus. Suspendisse potenti. Etiam condimentum hendrerit felis. Duis iaculis aliquam enim. Donec dignissim augue vitae orci. Curabitur luctus felis a metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius neque at enim. Suspendisse massa nulla, viverra in, bibendum vitae, tempor quis, lorem.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">Donec dapibus orci sit amet elit. Maecenas rutrum ultrices lectus. Aliquam suscipit, lacus a iaculis adipiscing, eros orci pellentesque nisl, non pharetra dolor urna nec dolor. Integer cursus dolor vel magna. Integer ultrices feugiat sem. Proin nec nibh. Duis eu dui quis nunc sagittis lobortis. Fusce pharetra, enim ut sodales luctus, lectus arcu rhoncus purus, in fringilla augue elit vel lacus. In hac habitasse platea dictumst. Aliquam erat volutpat. Fusce iaculis elit id tellus. Ut accumsan malesuada turpis. Suspendisse potenti. Vestibulum lacus augue, lobortis mattis, laoreet in, varius at, nisi. Nunc gravida. Phasellus faucibus. In hac habitasse platea dictumst. Integer tempor lacus eget lectus. Praesent fringilla augue fringilla dui.</div><div dir=\"ltr\" style=\"font-size: 13.92px; text-align: justify;\">&nbsp;</div><div style=\"text-align: justify; \"><br></div></div>', '2017-03-07', NULL, NULL, '14889008434898.jpg', NULL, NULL, NULL, NULL, 1, 0, 8, 20, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-07 13:34:03', '2017-11-08 19:44:44'),
(36, '', 'مثال لملف صوتي تجريبي', 'Audio files sample for test', NULL, NULL, '2017-03-07', NULL, NULL, '14889193305434.jpg', NULL, NULL, '14889192633715.mp3', NULL, 1, 2, 6, 15, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-08 01:41:04', '2017-11-08 19:41:32'),
(37, '', 'ملف موسيقى تجريبي', 'music audio file demo', NULL, NULL, '2017-03-07', NULL, NULL, NULL, NULL, NULL, '14889195178063.mp3', NULL, 1, 1, 6, 16, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-03-08 01:45:17', '2017-11-08 19:40:58'),
(38, '', 'عملائنا 1', 'Partener 1', NULL, NULL, '2017-11-08', NULL, NULL, '15101586286108.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 1, 'عملائنا 1', 'Partener 1', '', '', NULL, NULL, 'aamlaena-1', 'partener-1', 1, NULL, '2017-11-08 14:30:28', '2017-11-08 14:30:28'),
(39, '', 'عملائنا 2', 'Partener 2', NULL, NULL, '2017-11-08', NULL, NULL, '15101586454457.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 2, 'عملائنا 2', 'Partener 2', '', '', NULL, NULL, 'aamlaena-2', 'partener-2', 1, NULL, '2017-11-08 14:30:45', '2017-11-08 14:30:45'),
(40, '', 'عملائنا 3', 'Partener 3', NULL, NULL, '2017-11-08', NULL, NULL, '15101586557094.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 3, 'عملائنا 3', 'Partener 3', '', '', NULL, NULL, 'aamlaena-3', 'partener-3', 1, NULL, '2017-11-08 14:30:55', '2017-11-08 14:30:55'),
(41, '', 'عملائنا 4', 'Partener 4', NULL, NULL, '2017-11-08', NULL, NULL, '15101586647612.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 4, 'عملائنا 4', 'Partener 4', '', '', NULL, NULL, 'aamlaena-4', 'partener-4', 1, NULL, '2017-11-08 14:31:04', '2017-11-08 14:31:04'),
(42, '', 'عملائنا 5', 'Partener 5', NULL, NULL, '2017-11-08', NULL, NULL, '15101586746144.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 5, 'عملائنا 5', 'Partener 5', '', '', NULL, NULL, 'aamlaena-5', 'partener-5', 1, NULL, '2017-11-08 14:31:14', '2017-11-08 14:31:14'),
(43, '', 'عملائنا 6', 'Partener 6', NULL, NULL, '2017-11-08', NULL, NULL, '15101586835369.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 6, 'عملائنا 6', 'Partener 6', '', '', NULL, NULL, 'aamlaena-6', 'partener-6', 1, NULL, '2017-11-08 14:31:23', '2017-11-08 14:31:23'),
(44, '', 'عملائنا 7', 'Partener 7', NULL, NULL, '2017-11-08', NULL, NULL, '15101586994098.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 7, 'عملائنا 7', 'Partener 7', '', '', NULL, NULL, 'aamlaena-7', 'partener-7', 1, NULL, '2017-11-08 14:31:39', '2017-11-08 14:31:39'),
(45, '', 'عملائنا 8', 'Partener 8', NULL, NULL, '2017-11-08', NULL, NULL, '15101587089368.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 8, 'عملائنا 8', 'Partener 8', '', '', NULL, NULL, 'aamlaena-8', 'partener-8', 1, NULL, '2017-11-08 14:31:48', '2017-11-08 14:31:48'),
(46, '', 'عملائنا 9', 'Partener 9', NULL, NULL, '2017-11-08', NULL, NULL, '15101587164254.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 9, 'عملائنا 9', 'Partener 9', '', '', NULL, NULL, 'aamlaena-9', 'partener-9', 1, NULL, '2017-11-08 14:31:56', '2017-11-08 14:31:56'),
(47, '', 'عملائنا 10', 'Partener 10', NULL, NULL, '2017-11-08', NULL, NULL, '15101587316532.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 10, 'عملائنا 10', 'Partener 10', '', '', NULL, NULL, 'aamlaena-10', 'partener-10', 1, NULL, '2017-11-08 14:32:11', '2017-11-08 14:32:11'),
(48, '', 'عملائنا 11', 'Partener 11', NULL, NULL, '2017-11-08', NULL, NULL, '15101587452912.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 11, 'عملائنا 11', 'Partener 11', '', '', NULL, NULL, 'aamlaena-11', 'partener-11', 1, NULL, '2017-11-08 14:32:25', '2017-11-08 14:32:25'),
(49, '', 'عملائنا 12', 'Partener 12', NULL, NULL, '2017-11-08', NULL, NULL, '15101587542268.png', NULL, NULL, NULL, NULL, 1, 0, 9, 0, 12, 'عملائنا 12', 'Partener 12', '', '', NULL, NULL, 'aamlaena-12', 'partener-12', 1, NULL, '2017-11-08 14:32:34', '2017-11-08 14:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_topic_categories`
--

CREATE TABLE `aaraa_topic_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_topic_categories`
--

INSERT INTO `aaraa_topic_categories` (`id`, `topic_id`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 27, 8, '2017-11-08 19:39:43', '2017-11-08 19:39:43'),
(2, 27, 9, '2017-11-08 19:39:43', '2017-11-08 19:39:43'),
(3, 27, 12, '2017-11-08 19:39:43', '2017-11-08 19:39:43'),
(4, 28, 8, '2017-11-08 19:39:58', '2017-11-08 19:39:58'),
(5, 28, 9, '2017-11-08 19:39:58', '2017-11-08 19:39:58'),
(6, 28, 10, '2017-11-08 19:39:58', '2017-11-08 19:39:58'),
(7, 28, 14, '2017-11-08 19:39:58', '2017-11-08 19:39:58'),
(8, 29, 8, '2017-11-08 19:40:15', '2017-11-08 19:40:15'),
(9, 29, 9, '2017-11-08 19:40:15', '2017-11-08 19:40:15'),
(10, 29, 10, '2017-11-08 19:40:15', '2017-11-08 19:40:15'),
(11, 29, 12, '2017-11-08 19:40:15', '2017-11-08 19:40:15'),
(12, 36, 15, '2017-11-08 19:40:48', '2017-11-08 19:40:48'),
(13, 36, 16, '2017-11-08 19:40:48', '2017-11-08 19:40:48'),
(14, 36, 18, '2017-11-08 19:40:48', '2017-11-08 19:40:48'),
(15, 37, 16, '2017-11-08 19:40:58', '2017-11-08 19:40:58'),
(16, 37, 17, '2017-11-08 19:40:58', '2017-11-08 19:40:58'),
(17, 15, 1, '2017-11-08 19:42:12', '2017-11-08 19:42:12'),
(18, 15, 2, '2017-11-08 19:42:12', '2017-11-08 19:42:12'),
(19, 16, 5, '2017-11-08 19:42:26', '2017-11-08 19:42:26'),
(20, 16, 6, '2017-11-08 19:42:26', '2017-11-08 19:42:26'),
(21, 17, 3, '2017-11-08 19:42:35', '2017-11-08 19:42:35'),
(22, 18, 1, '2017-11-08 19:42:52', '2017-11-08 19:42:52'),
(23, 18, 6, '2017-11-08 19:42:52', '2017-11-08 19:42:52'),
(24, 19, 1, '2017-11-08 19:43:02', '2017-11-08 19:43:02'),
(25, 20, 3, '2017-11-08 19:43:10', '2017-11-08 19:43:10'),
(26, 21, 1, '2017-11-08 19:43:24', '2017-11-08 19:43:24'),
(27, 21, 2, '2017-11-08 19:43:24', '2017-11-08 19:43:24'),
(28, 21, 3, '2017-11-08 19:43:24', '2017-11-08 19:43:24'),
(29, 22, 2, '2017-11-08 19:43:35', '2017-11-08 19:43:35'),
(30, 22, 4, '2017-11-08 19:43:35', '2017-11-08 19:43:35'),
(42, 32, 19, '2017-11-08 19:47:30', '2017-11-08 19:47:30'),
(43, 32, 20, '2017-11-08 19:47:30', '2017-11-08 19:47:30'),
(44, 33, 22, '2017-11-08 19:48:03', '2017-11-08 19:48:03'),
(45, 34, 21, '2017-11-08 19:48:16', '2017-11-08 19:48:16'),
(46, 35, 19, '2017-11-08 19:48:32', '2017-11-08 19:48:32'),
(47, 35, 20, '2017-11-08 19:48:32', '2017-11-08 19:48:32'),
(48, 35, 21, '2017-11-08 19:48:32', '2017-11-08 19:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_topic_fields`
--

CREATE TABLE `aaraa_topic_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `field_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_topic_fields`
--

INSERT INTO `aaraa_topic_fields` (`id`, `topic_id`, `field_id`, `field_value`, `created_at`, `updated_at`) VALUES
(3, 32, 1, '50000 USD', '2017-11-08 19:47:30', '2017-11-08 19:47:30'),
(4, 32, 2, '1', '2017-11-08 19:47:30', '2017-11-08 19:47:30'),
(5, 33, 1, '20000 USD', '2017-11-08 19:48:03', '2017-11-08 19:48:03'),
(6, 33, 2, '2', '2017-11-08 19:48:03', '2017-11-08 19:48:03'),
(7, 34, 1, '30000 USD', '2017-11-08 19:48:17', '2017-11-08 19:48:17'),
(8, 34, 2, '1', '2017-11-08 19:48:17', '2017-11-08 19:48:17'),
(9, 35, 1, '4550 USD', '2017-11-08 19:48:32', '2017-11-08 19:48:32'),
(10, 35, 2, '1', '2017-11-08 19:48:32', '2017-11-08 19:48:32');

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
  `preferred_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `connect_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connect_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_users`
--

INSERT INTO `aaraa_users` (`id`, `name`, `email`, `password`, `photo`, `permissions_id`, `preferred_language`, `status`, `connect_email`, `connect_password`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'admin', 'mjhosawa@vavisa-kw.com', '$2y$10$vCYpyjX68hKYbzsAUZS4vuLCodSrXukCOHorulIwREO70hNgv6J5q', NULL, 1, '', 1, NULL, NULL, 'K2Fw9B23BIRrWmEEU1l7hcXuynQlEQDgzTwCWNQ1WFnPPi7neD6PmKdHPgtj', '1', NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('2', 'manager', 'manager@site.com', '$2y$10$uwYocVmPgnGGxhW/ITU46ePqFEdsIyj87OXkYrRidYtuvvQR2Y6Yq', NULL, 2, '', 1, NULL, NULL, NULL, '1', NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
('3', 'user', 'user@site.com', '$2y$10$JFfZ4nfOHNJlzEefZk9Oq.QcHzqaIOCM7kU0/0fltjptMrU4hj7UO', NULL, 3, '', 1, NULL, NULL, NULL, '1', NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `aaraa_webmaster_settings`
--

CREATE TABLE `aaraa_webmaster_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_box_status` tinyint(4) NOT NULL,
  `en_box_status` tinyint(4) NOT NULL,
  `seo_status` tinyint(4) NOT NULL,
  `analytics_status` tinyint(4) NOT NULL,
  `banners_status` tinyint(4) NOT NULL,
  `polls_status` tinyint(4) NOT NULL,
  `categories_status` tinyint(4) NOT NULL,
  `appusers_status` tinyint(4) NOT NULL,
  `notifications_status` tinyint(4) NOT NULL,
  `calendar_status` tinyint(4) NOT NULL,
  `settings_status` tinyint(4) NOT NULL,
  `newsletter_status` tinyint(4) NOT NULL,
  `members_status` tinyint(4) NOT NULL,
  `orders_status` tinyint(4) NOT NULL,
  `shop_status` tinyint(4) NOT NULL,
  `shop_settings_status` tinyint(4) NOT NULL,
  `default_currency_id` int(11) NOT NULL,
  `languages_count` int(11) NOT NULL,
  `latest_news_section_id` int(11) NOT NULL,
  `header_menu_id` int(11) NOT NULL,
  `footer_menu_id` int(11) NOT NULL,
  `home_banners_section_id` int(11) NOT NULL,
  `home_text_banners_section_id` int(11) NOT NULL,
  `side_banners_section_id` int(11) NOT NULL,
  `contact_page_id` int(11) NOT NULL,
  `newsletter_contacts_group` int(11) NOT NULL,
  `new_comments_status` tinyint(4) NOT NULL,
  `links_status` tinyint(4) NOT NULL,
  `register_status` tinyint(4) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `api_status` tinyint(4) NOT NULL,
  `api_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_content1_section_id` int(11) NOT NULL,
  `home_content2_section_id` int(11) NOT NULL,
  `home_content3_section_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aaraa_webmaster_settings`
--

INSERT INTO `aaraa_webmaster_settings` (`id`, `ar_box_status`, `en_box_status`, `seo_status`, `analytics_status`, `banners_status`, `polls_status`, `categories_status`, `appusers_status`, `notifications_status`, `calendar_status`, `settings_status`, `newsletter_status`, `members_status`, `orders_status`, `shop_status`, `shop_settings_status`, `default_currency_id`, `languages_count`, `latest_news_section_id`, `header_menu_id`, `footer_menu_id`, `home_banners_section_id`, `home_text_banners_section_id`, `side_banners_section_id`, `contact_page_id`, `newsletter_contacts_group`, `new_comments_status`, `links_status`, `register_status`, `permission_group`, `api_status`, `api_key`, `home_content1_section_id`, `home_content2_section_id`, `home_content3_section_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 2, 3, 1, 2, 1, 2, 3, 2, 1, 1, 0, 0, 3, 1, '571775002564288', 7, 4, 9, 1, 1, '2017-11-08 13:25:54', '2017-11-09 18:55:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aaraa_analytics_pages`
--
ALTER TABLE `aaraa_analytics_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_analytics_visitors`
--
ALTER TABLE `aaraa_analytics_visitors`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `aaraa_contacts`
--
ALTER TABLE `aaraa_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_contacts_groups`
--
ALTER TABLE `aaraa_contacts_groups`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `aaraa_events`
--
ALTER TABLE `aaraa_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_ltm_translations`
--
ALTER TABLE `aaraa_ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_maps`
--
ALTER TABLE `aaraa_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_menus`
--
ALTER TABLE `aaraa_menus`
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
-- Indexes for table `aaraa_photos`
--
ALTER TABLE `aaraa_photos`
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
-- Indexes for table `aaraa_related_topics`
--
ALTER TABLE `aaraa_related_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_sections`
--
ALTER TABLE `aaraa_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_settings`
--
ALTER TABLE `aaraa_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_topics`
--
ALTER TABLE `aaraa_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_topic_categories`
--
ALTER TABLE `aaraa_topic_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aaraa_topic_fields`
--
ALTER TABLE `aaraa_topic_fields`
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
-- AUTO_INCREMENT for table `aaraa_analytics_pages`
--
ALTER TABLE `aaraa_analytics_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `aaraa_analytics_visitors`
--
ALTER TABLE `aaraa_analytics_visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `aaraa_contacts`
--
ALTER TABLE `aaraa_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aaraa_contacts_groups`
--
ALTER TABLE `aaraa_contacts_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aaraa_events`
--
ALTER TABLE `aaraa_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aaraa_ltm_translations`
--
ALTER TABLE `aaraa_ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aaraa_maps`
--
ALTER TABLE `aaraa_maps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aaraa_menus`
--
ALTER TABLE `aaraa_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `aaraa_photos`
--
ALTER TABLE `aaraa_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `aaraa_related_topics`
--
ALTER TABLE `aaraa_related_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aaraa_sections`
--
ALTER TABLE `aaraa_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `aaraa_topics`
--
ALTER TABLE `aaraa_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `aaraa_topic_categories`
--
ALTER TABLE `aaraa_topic_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `aaraa_topic_fields`
--
ALTER TABLE `aaraa_topic_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
