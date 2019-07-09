-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2019 at 03:49 PM
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
-- Database: `vavisa_masafah`
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
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `name`, `block`, `street`, `area`, `building`, `mobile`, `details`, `notes`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Home, office', '12, 13B', '12, 14A', 'Salmiya, Sharq', '14, 13Z', '12345678', '', 'Do not park vehicle infront of the gate', 48, 1, '2019-06-25 17:22:31', '2019-07-02 08:02:13'),
(6, 'Work, office', '12, 13B', '12, 14A', 'Salmiya, Sharq', '14, 13Z', '12345678', '', 'Do not park vehicle infront of the gate', 48, 1, '2019-06-25 17:22:49', '2019-07-02 08:02:20'),
(9, 'Peter Samuel', '12sh', 'Sharq', '12', '14, 13Z', '87654321', 'Al-Kuwait, near Hamra', 'Do not park vehicle infront of the gate', 47, 1, '2019-06-26 01:02:01', '2019-07-02 19:20:29'),
(14, 'Fvvv', 'Sharq', 'Gg', 'Jaber Al-Mubarak Street', 'Jaber Al-Mubarak Street', '12345678', 'Al Kuwayt', '', 47, 0, '2019-06-30 16:55:21', '2019-07-02 08:02:25'),
(15, 'Gdg', 'Sharq', 'Dg', 'Omar Ben Al Khattab Street', 'Al-Rayah Tower', '12345678', 'Al Kuwayt', '', 47, 0, '2019-06-30 16:56:05', '2019-07-02 08:02:28'),
(17, 'Home-Peter', '12, 13B', '12, 14A', 'Salmiya, Sharq', '14, 13Z', '12345678', 'Al-Kuwait, near Hamra', 'Do not park vehicle infront of the gate', 47, 1, '2019-06-30 17:30:04', '2019-07-02 08:02:30'),
(18, 'Office-Peter', '12B', '13A', 'Salmiya', '14, 13Z', '12345678', 'Near Marina Mall', 'No Notes', 47, 1, '2019-06-30 17:30:37', '2019-07-02 08:02:33'),
(19, 'Test address', 'Dasman', '4', 'Jasim Mohamad Al Bahar Street', 'Jawahar Palace', '12345678', 'Al Kuwayt', 'no notes for now', 47, 0, '2019-07-02 16:37:13', '2019-07-02 08:02:35'),
(20, 'new name', '12, 13B', '12, 14A', 'Salmiya, Sharq', '14, 13Z', '88432123', 'Al-Kuwait, near Hamra', 'Do not park vehicle infront of the gate', 47, 1, '2019-07-02 18:06:09', '2019-07-02 18:07:58'),
(21, 'Mobile', 'Sharq', 'V', 'Omar Ben Al Khattab Street', 'Al-Rayah Tower', '12365478', 'Al Kuwayt', '', 47, 1, '2019-07-02 19:23:44', '2019-07-02 19:23:44'),
(22, 'test1', 'Sharq', 'g', 'Al-Shuhada Street', 'AL Ghawali Tower', '85565563', 'Al Kuwayt', '', 51, 1, '2019-07-07 18:07:31', '2019-07-07 18:07:31'),
(23, 'test4', 'Sharq', '7', 'Jaber Al-Mubarak Street', 'Shorouq Tower', '85296314', 'Al Kuwayt', '', 51, 1, '2019-07-07 18:07:54', '2019-07-07 18:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(10) NOT NULL,
  `access_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1- User, 2- Company',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `access_token`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(3, '4888663456ZFNiTGJlU1V3MkV5TzUyZXVGU2VrazIwcTBVQnRZSE5ENHpQSHZGTDNiR0hmYktCSWI=5d10e53827ce9', 48, 1, '2019-06-25 00:59:04', '2019-06-25 00:59:04'),
(6, '4888663456RWNtcGI3QmtIcUs1cVVzemMwZ3JTejMwNlZvaXhCdlphdlpVT3B3ZzU3WmR6MnpxUzM=5d10e6c0c074f', 48, 1, '2019-06-25 01:05:36', '2019-06-25 01:05:36'),
(7, '4788888888WlZMcXVjZklBT3doOElkMnNNckROc2piTHNOQ0Y5YVc4bXV5Y1BrN0F6ZjJXemsxZzE=5d10e6e0a0725', 47, 1, '2019-06-25 01:06:08', '2019-06-25 01:06:08'),
(9, '4888663456VHo0N1VkNXhRcmtTV2RHdGtsOGRJMDJVaTR0NlVnOTJQYUVJeGN4eXoxdExJWDlkTFE=5d10e760940a0', 48, 1, '2019-06-25 01:08:16', '2019-06-25 01:08:16'),
(10, '4888663456WWhpMlNxVHVRSDNTNGhRbGs4aVV2d29OZ1lZTEd0QkZiMXJkSzd1ZGxBSnU1SUtta1E=5d10e8026e808', 48, 1, '2019-06-25 01:10:58', '2019-06-25 01:10:58'),
(11, '4711334466SDkwVlJIMkdtdUVQb0ZOYTljVWxRZE5yTkowbTAwa1F6VVJDWTRTeGJ0NHg0UFdHRzc=5d10e85ec2e39', 47, 1, '2019-06-25 01:12:30', '2019-06-25 01:12:30'),
(12, '4711334466aU1MdEx2S0dzd0dFUzllRlpiNDlSRUdyS29JZXBsdlRuRmdpN3NVdXFtaThoMVRXNGg=5d11bd0f5693d', 47, 1, '2019-06-25 16:19:59', '2019-06-25 16:19:59'),
(17, '4888663456dlpkb3FRYWZNY1pkaFJyTnI1TjNlc2xmN0NiRU5NTGw5SzVWZTJEQnhFa1JDZ2ZXSEE=5d11c5448e08f', 48, 1, '2019-06-25 16:55:00', '2019-06-25 16:55:00'),
(18, '4888663456ajJIMHpMb0xaUEVwUzhpcnFUTFhZR3RiQ1hKaE1SRFhSWTZtN3JIc01ScnhUaFpjaWM=5d11c5800f61a', 48, 1, '2019-06-25 16:56:00', '2019-06-25 16:56:00'),
(19, '4888663456Z0kzbEtpSG80eWVEQW1VSXVRTktna3pSUnp6Rm5zMEdTbTd1c3lsNXc2cmVnSFFxaWI=5d11c63fd293c', 48, 1, '2019-06-25 16:59:11', '2019-06-25 16:59:11'),
(20, '4888663456clVnU1Y0d3JNSGxhbmRhQjBFVUpDSFVFd0w5VENxMHFGQlBlRk9vMXBXSExQdDhCVXo=5d11c67221505', 48, 1, '2019-06-25 17:00:02', '2019-06-25 17:00:02'),
(21, '4888663456bFRMMVlNTXVTTHE0ZzZwMXk0dm1CV1ZDR2FHcnBXZTlJUE9TOU53Z3N2RFZENnBkajQ=5d11c6f793b46', 48, 1, '2019-06-25 17:02:15', '2019-06-25 17:02:15'),
(22, '4888663456T1BkVjE0WWp1YTFRM2lzcGp2VHJhRVFkMVRRaWtrUVExVWljQm1rN01Ob3JodnIxZnc=5d11c79926208', 48, 1, '2019-06-25 17:04:57', '2019-06-25 17:04:57'),
(23, '4888663456d1NjdWJjeGNYN29yZHRyM0pzMW9iQ0pqMnNaQTJzWm9NR1ZJS2tIY0FQQXhIQk9hTTI=5d11c7d28f8a2', 48, 1, '2019-06-25 17:05:54', '2019-06-25 17:05:54'),
(24, '4888663456WWg2V0w0QlV3WkhzQ2RzUDVZc0NYYmRVWjVGb2FiblZWaHhDUW9hNTU0SW5UWXRWSmI=5d11c8bf9594f', 48, 1, '2019-06-25 17:09:51', '2019-06-25 17:09:51'),
(26, '4711334466Y1hjWDZ3V3lZMHA4VVNSZE82U1dHbVBueHNUV2J5UzRRQUNlOVdMbmlzZVlhVFNnVFc=5d11cb06bd858', 47, 1, '2019-06-25 17:19:34', '2019-06-25 17:19:34'),
(28, '4888663456SGxoOG83bmF0TzY5U1JrQ1J2eUZ0cnUwd01wMzJIbFdySnRzVUFuRE9xNlhTU2Vxa20=5d11cd2e99106', 48, 1, '2019-06-25 17:28:46', '2019-06-25 17:28:46'),
(29, '4888663456N3RxaXRmYjU0MjFKTmNNTnFwVTlaVWRYM3lUWUF3Um5pZnNRckU5OE9KVlZQU3BGRkY=5d11cdba62d54', 48, 1, '2019-06-25 17:31:06', '2019-06-25 17:31:06'),
(31, '4888663456clhraWpHMFp4QmhHbEd6RVlEUWxTNG9uM01UZnBLYnBEdlNweWNSUmZzT1ZqYkVvZHg=5d11cf1ec6476', 48, 1, '2019-06-25 17:37:02', '2019-06-25 17:37:02'),
(32, '4888663456NWdNR1dPRGJoMnNPcTNjdDh2SW1FQXNCQnhqdGRzU0JNVFF2MzgxVGxPR2lrNTF6d0I=5d11cf6d785c6', 48, 1, '2019-06-25 17:38:21', '2019-06-25 17:38:21'),
(33, '4888663456Zk1ZSENWUkIxYWd1blRORW43QmRDVmpuTjdHR2ZZcjNNeWszWnJOQ2YySDFIUjVrbTk=5d11cfecced77', 48, 1, '2019-06-25 17:40:28', '2019-06-25 17:40:28'),
(34, '4888663456VjEzckYySXZERnJFaDlFdWVmV0Frb2M0OU5JaUVQNDkwU0x5clR1Q3Y0cjBIVE4yOWs=5d11cff8c3f06', 48, 1, '2019-06-25 17:40:40', '2019-06-25 17:40:40'),
(35, '4888663456dG5tTlhDUnBwTmRTcUd6dldVR0duODZrak1NOHROM01RTmVWMzRKQzJFM0FtVEhTYm4=5d11d2c6aa08d', 48, 1, '2019-06-25 17:52:38', '2019-06-25 17:52:38'),
(36, '4711334466YWliSXBRNzNEb2g1cWtGZUlrYk11T2FhN0RZaWRUNTY0V0VLVmI2Z25jUm4zZGRlM1Y=5d11d3236895b', 47, 1, '2019-06-25 17:54:11', '2019-06-25 17:54:11'),
(37, '4888663456aFZObHNHNmVtVWM4UWdYbjVvUUZOZlV1UkNBU1dCYzd1ZmhwMU91R3hQNFBiWElDeE0=5d11ddf50ae93', 48, 1, '2019-06-25 18:40:21', '2019-06-25 18:40:21'),
(39, '4888663456bW5NNjcyVXozWWxtUEJrS2xjeXFYTkFXM2h0ZVZ5QUdnWTBEWE9Vbm44SXhWVVkxeUE=5d11ec0aaec21', 48, 1, '2019-06-25 19:40:26', '2019-06-25 19:40:26'),
(40, '4888663456cjJXejlBQTVSZ3hFSWFFRmd3YkphdGlSZk5XUXF2MEpYNnlQMEU1UDAyQUJVZldKM0k=5d1205f3c3475', 48, 1, '2019-06-25 21:30:59', '2019-06-25 21:30:59'),
(41, '4888663456aXl0ZzNoWXRuRVNITDlWUWhaZkxjWm5Jc1cza2Q0c2pXYngzdFJqanJkYng1aFljYkI=5d120855a5df8', 48, 1, '2019-06-25 21:41:09', '2019-06-25 21:41:09'),
(42, '4888663456RTdaejczeXRucUE4ajYyVkMzM01ra2ZCcmZpYWZMTkt4cThDMDlGbGJRc1JKak8xT3U=5d1208a783570', 48, 1, '2019-06-25 21:42:31', '2019-06-25 21:42:31'),
(43, '4888663456TE5kR2tSSXVNREhrUXM5Q2RtZTZyaXJ5WFAzbEsxOEtwblFBcmlOYzkxeUhBd0l5NFE=5d12129e360a9', 48, 1, '2019-06-25 22:25:02', '2019-06-25 22:25:02'),
(44, '4888663456TzVGTVRhMjZKSUJHNHVEZnIxTUtzZmhxdG9sRkJqYk5GcW54VXlZcXllWU9zRTR1QjY=5d1214ec5f84f', 48, 1, '2019-06-25 22:34:52', '2019-06-25 22:34:52'),
(45, '4888663456U2V6Skl5QTcwMmlmSXBMSG9SdGJJSzB0RDRzTlAwaUx1cU51RjRDQ1ZFSUdONnZRclc=5d121ab094c04', 48, 1, '2019-06-25 22:59:28', '2019-06-25 22:59:28'),
(46, '4888663456ZUxMNEdXcFdDb3lJY1BMcWdhbUk2UUVkRWJpcFJIVGhmSWpBOEs4c09WaGhHWkEyUW8=5d121b43ad0ca', 48, 1, '2019-06-25 23:01:55', '2019-06-25 23:01:55'),
(47, '4888663456UGNwcEJxV25tWm1ZQ3JnQ3JJTzY1YnpoYzZhSUtyajV2QzdpOGNaZ2RqYm5taHFMQlM=5d12361589536', 48, 1, '2019-06-26 00:56:21', '2019-06-26 00:56:21'),
(48, '4888663456RG1uS1E3NXE2Njl4Sk5WMkZwYk1ZbWh6Z2xDdlJFaEJEdDVGTXc0NjZHbE53dWg0Z3Y=5d123bd4c4ee1', 48, 1, '2019-06-26 01:20:52', '2019-06-26 01:20:52'),
(49, '4888663456TUJTUWczRElxd2Nlblp0OTJEUmM3MnFpb3hwV2pqRk9Tb3NYNlZKUUNrcHBGWEo5c1A=5d123dec49fb0', 48, 1, '2019-06-26 01:29:48', '2019-06-26 01:29:48'),
(50, '4888663456Z0xRSEJiOXF5Q3pVeHdjYWdwSTJnakNldlc0clA5WlIwQjRWMDlsOEE4emo1S3Y2dzk=5d123e46d5050', 48, 1, '2019-06-26 01:31:18', '2019-06-26 01:31:18'),
(51, '4888663456NzNkR0FnVk9kemRNaHREb2xZd0RubFdaZ3pWQU5hSDh0QTRnUk9ZQVRPdUUwQlUwazk=5d1313d91eabb', 48, 1, '2019-06-26 16:42:33', '2019-06-26 16:42:33'),
(52, '4888663456MkZQSTVTazV0aThoV3BJMjF5RFhkWVFOajlaT242Q0o2ZVFiVnZGVFYwczhuZnFZVG0=5d131663f272e', 48, 1, '2019-06-26 16:53:24', '2019-06-26 16:53:24'),
(53, '4888663456QUlMS0F4a3lKZkZuQ0Zqd1hkWjlZNUR5NlVvNnBSRjRvSVp6S2lxVHFaaHg4cm5HSno=5d1317f003b28', 48, 1, '2019-06-26 17:00:00', '2019-06-26 17:00:00'),
(54, '4888663456WEdXeGhZZmxndU1obnpzajRWY0ZyNE5ER2JnUjZ0Q3ZGT3cyM2dhT2tOWnVHQWwya0o=5d1318493ccbf', 48, 1, '2019-06-26 17:01:29', '2019-06-26 17:01:29'),
(55, '4888663456U25NczZHZW84cEN6MUNKYTd3dlR0NGFJWmo2dTdLZThWZWhsSG1nOVk2cnl2RGJVNUw=5d131d52b4aef', 48, 1, '2019-06-26 17:22:58', '2019-06-26 17:22:58'),
(56, '4888663456dDNMR0V2MHJHUFJuYzlOZmZkMFhSOXJTUzJxcjk0a3NPWXprQnI2V25Ud0RYZkhkUkU=5d13212877a65', 48, 1, '2019-06-26 17:39:20', '2019-06-26 17:39:20'),
(57, '4888663456OXQ2Sk5QWjZTTENiQlF3VWlHZFFlTXhNZVlFNW5NOEFBUmpZb1RiZkV4bHJKeHBjMTQ=5d1321542c44c', 48, 1, '2019-06-26 17:40:04', '2019-06-26 17:40:04'),
(58, '4888663456S2g0b0p1elFrQ1lHRFRsSzJHMVhXUXdGYjJGbGZSeFdMM3BIOEphZ2QwRHRINGQwY0I=5d132166f1855', 48, 1, '2019-06-26 17:40:23', '2019-06-26 17:40:23'),
(59, '4888663456WWZCZFhNUVk0dW1FdlcwcVVmeGdFOGhEOVhTSFEzeUdLOXNPYnpaSEJJT0hLNWx4QWo=5d1321ca6e601', 48, 1, '2019-06-26 17:42:02', '2019-06-26 17:42:02'),
(60, '4888663456dXY1bU5vR2o2NXVFMTdHQnpidGdNZVZQQnVTeWVzQUh6aVM0OVFtSmx3U0tTNkcyd3U=5d13286aa44b0', 48, 1, '2019-06-26 18:10:18', '2019-06-26 18:10:18'),
(61, '4888663456RHVSWWVZbHNWZnZPNXRQNmt6U1lGZFhoZjFKc3NFeVhPeFRpWEt4eHBLaXljVm92QXU=5d132875a05be', 48, 1, '2019-06-26 18:10:29', '2019-06-26 18:10:29'),
(62, '4888663456WW5JeklDQjJYSFVTVHZhQWg4enZyZnM0N0FSMjZrcUlFalI2NkVxZ1dJVjM1cHFDVFE=5d13288f613b8', 48, 1, '2019-06-26 18:10:55', '2019-06-26 18:10:55'),
(63, '4888663456RmNNbThINEpCUDlWd1dwQzkxYjRLbFhtN0M3aENvdkRHV1Y1Znp5RWNBZGg0TkFqTVA=5d1328982082c', 48, 1, '2019-06-26 18:11:04', '2019-06-26 18:11:04'),
(64, '4888663456bkdobDJ0NWRrMzhJZ29Mdk1ySTlRYW9OV2REOTFSeEF4Wk15Z3VqZDNGb3h1eU5lVEk=5d1328c054b54', 48, 1, '2019-06-26 18:11:44', '2019-06-26 18:11:44'),
(65, '4888663456ZkZhSHM3MG9ReGFtQk5FdmJHMU5QTjJKNk1ucjZSSFdUS0ozWThSTjJGYjZadjI2TU8=5d1328d0b4c42', 48, 1, '2019-06-26 18:12:00', '2019-06-26 18:12:00'),
(66, '4888663456dDhjOXRBOFV5WUgwcW5KZFNXc0psa0xpN05YM0R1ajZJdzdqcDllbGFueTFNcGdiOTY=5d132a06222e4', 48, 1, '2019-06-26 18:17:10', '2019-06-26 18:17:10'),
(67, '4888663456bWxqdWNEcjFuQklXTVV0VVRVZzR4SkVXb2VKUFhWZFFscENUbkdRZlBhRUhLZ2VQTTc=5d132a0e8842d', 48, 1, '2019-06-26 18:17:18', '2019-06-26 18:17:18'),
(68, '4888663456RkU3dGpadVRNTm5sWE1vajRRNzNLYjVXUmVJbHRIWkNUTjQ1U0lIVVJjMmZaQlNMTW0=5d132a53b38e0', 48, 1, '2019-06-26 18:18:27', '2019-06-26 18:18:27'),
(69, '4888663456REpmaUg4MDJLT0p2U0ZGU0NnbEJFZVBwUVI5TWdnc3d4bXdsdmdtOW5RRlhZaEpmTVY=5d132a5aa936d', 48, 1, '2019-06-26 18:18:34', '2019-06-26 18:18:34'),
(70, '4888663456Nnl5Rm9kaG9ISm5pTEMwSVJBeVA4SUJPOXIyZVo0YmQ4VHFvRmlFYmQwTFVFNUZoUTc=5d132ab0ab987', 48, 1, '2019-06-26 18:20:00', '2019-06-26 18:20:00'),
(71, '4888663456cUh5SHhqMGRXbE5SM2xic1Z4SjNTSWtnNHlLZXJtVWE4QmpTZ2U0ZG1vanhxd2NIOHA=5d132ac6afa5b', 48, 1, '2019-06-26 18:20:22', '2019-06-26 18:20:22'),
(72, '4888663456dGdJZFZ6YnFPeWFreG1vTkZmNllKdThKYnRHYW84MWJRQkZ2d0x4S1JHTmw3OXg4dUE=5d132ad078e30', 48, 1, '2019-06-26 18:20:32', '2019-06-26 18:20:32'),
(73, '4888663456d1M0R2R5NVUxbTRDRzVWR3lIbk9aNFZOUUFxZ1FOOFRDdnJsQ1k0YmdoYnM0VkFGcjE=5d1345e65587a', 48, 1, '2019-06-26 20:16:06', '2019-06-26 20:16:06'),
(74, '4888663456UGhuMTMzWnRudllYYUNQSEZYVE1zUWFEdXIzdnZlOGdXQ2s5V2RZaVNnUnFFc1VJa2U=5d135b988c48c', 48, 1, '2019-06-26 21:48:40', '2019-06-26 21:48:40'),
(75, '4888663456RHNCOFlEZGRnYzF6bmIxTWxLUDdwY1kyRHRzaTNZMm5Db05CanhrQzJqSGhYaE5tWDg=5d135c0a3e447', 48, 1, '2019-06-26 21:50:34', '2019-06-26 21:50:34'),
(76, '4888663456eG9aT3FTZTE3YTNyMHYwdzRzOE1XaWFVWm1jOUJRUmI2UzJ1Nm1EbTBCc2NBc2M4Njg=5d14cd66e0181', 48, 1, '2019-06-28 00:06:30', '2019-06-28 00:06:30'),
(77, '4888663456T0ZCOGRlY0wxM25sczRKTVlhVEd3QkdsMVlTYm8yalJHbGxPa2xsekZoUGdJQlJ4cWM=5d14cdb516e54', 48, 1, '2019-06-28 00:07:49', '2019-06-28 00:07:49'),
(78, '4888663456TEdIRHpVMURUb21QampndVc1MnlzUFAzSVpqR1JvRkNEamZZQXFCY0dCWktCRjlZZDI=5d185ddb937e6', 48, 1, '2019-06-30 16:59:39', '2019-06-30 16:59:39'),
(79, '4888663456MG1pTTV4Z1pHN0lKaVZLNFV2eTZ0MVY2TGQ3UFVWSFp5ZjJDd09MdXlZeDZlNkpaeHk=5d185fec1bdd6', 48, 1, '2019-06-30 17:08:28', '2019-06-30 17:08:28'),
(80, '4888663456S1ViNmIyMkJpZ0tQbUN2ZExDTEZSSzdlVkNKSUZ1MTQ0YkdSaHh1OHFDOEdoQWhCZ0Q=5d18601c2c7c5', 48, 1, '2019-06-30 17:09:16', '2019-06-30 17:09:16'),
(81, '4888663456bWlXTjh5MUF2VG1CWlA3ZGl4WGlEQlJ1SlNWUEhaanY5RUVYWnlyNkNwUVA5ZUdROTA=5d186067a37f8', 48, 1, '2019-06-30 17:10:31', '2019-06-30 17:10:31'),
(82, '4888663456QlJENHd5V1pMYWV2b2dKZkVnR2lzR2FhT2VLMUN1OEZEa2I2UHdVS0VpbmV2Q1VLcDg=5d18684c9c03b', 48, 1, '2019-06-30 17:44:12', '2019-06-30 17:44:12'),
(83, '4888663456ejE4aklzYWpndmplZEZiT05Va2RsUHJ6MDl6eWdPTFNyRzRPQVdJck9VYkRsaEltVjc=5d18689c1114e', 48, 1, '2019-06-30 17:45:32', '2019-06-30 17:45:32'),
(84, '4888663456TzluV05zbVFIOGdxVkFRQ2tIMkNzcVRzS3NTcU1sQzIxazR0QXluMERjemVOaG9qWTg=5d186c391fdc9', 48, 1, '2019-06-30 18:00:57', '2019-06-30 18:00:57'),
(85, '4888663456ekh5dGVFSGIydlNrQXVRcWxHMGxETlFoWmljbW05TGE0OHJnUGtFUjhNNGllNzVmR1I=5d186d3b6f0c4', 48, 1, '2019-06-30 18:05:15', '2019-06-30 18:05:15'),
(86, '4888663456aXBsZnVWS243RHM0YkpKZ21xbEdtaVlRTHVGN2JiRDdSUFcxVjN5bXVya0xxZEd2VUQ=5d186e6a5426d', 48, 1, '2019-06-30 18:10:18', '2019-06-30 18:10:18'),
(87, '4888663456MTQzN0x3eUR4ZkRQbmRzRWk4SXVUMVBORkdOb3N1eXQ1bUVMV2RjYkRmODNXT3BQOEM=5d186e990f653', 48, 1, '2019-06-30 18:11:05', '2019-06-30 18:11:05'),
(88, '4888663456MnIycVFsTEdTZ2IweHFpdHpSTkk3UmdXbmJkbmVacXpJd2swVVhVakVta0U0UEtZQ2c=5d1878af611d5', 48, 1, '2019-06-30 18:54:07', '2019-06-30 18:54:07'),
(89, '4888663456ZzJMSFZ1S1lFbTBqeHZxWFJnT1pFYm05NWQ1ZzY3WUNyZFE4a1J3V3I4RXNvblpvVzA=5d1878ec32235', 48, 1, '2019-06-30 18:55:08', '2019-06-30 18:55:08'),
(90, '4888663456aEQ5SWhuZmVrZ3NyRTdXdXZEUkNRYks3VEpiV3ZBRTBhYURac0U3aGRTUDU2VGM1cTU=5d1879b99d23c', 48, 1, '2019-06-30 18:58:33', '2019-06-30 18:58:33'),
(91, '4888663456QkI3cXpwcVhhSWFkbERmZ1lEM0ZlU0RYTllSV3AwTUVHWjBYNFFpZm13NXJUQ3ZHa2I=5d1879ec9875b', 48, 1, '2019-06-30 18:59:24', '2019-06-30 18:59:24'),
(92, '4888663456eWRXVlR3RnhEUEJqQk5pRVdhSW5MQmR4Wk1Oa2dMTExiUUdldERRN1lScmo0YkpQOXE=5d187c3fbbe22', 48, 1, '2019-06-30 19:09:19', '2019-06-30 19:09:19'),
(93, '4888663456UnZMNmNkMWRhWTZ0NWZ4UGFyN0VmdGkyUWVPWGVFaWx2VXhGU1QzT0QwVzIzQTFqRng=5d187f436d19a', 48, 1, '2019-06-30 19:22:11', '2019-06-30 19:22:11'),
(94, '4888663456aVhsTFRUaWF0UHJNNHlwVlRJRU1WbVFKOG9KV1hTTW9EOUFQbzhKWXAzZjd0UTJXSm0=5d187f767f6f8', 48, 1, '2019-06-30 19:23:02', '2019-06-30 19:23:02'),
(95, '4888663456YjZhMk81cVQ4R1Zibm4xNXQ2cGVvdFc5eHR2c0swVUFudUdLaHZXMjhmdEhFRTZKR24=5d1882c2b5ee6', 48, 1, '2019-06-30 19:37:06', '2019-06-30 19:37:06'),
(96, '4888663456RzNQMHlHQTF2cWRjV29OcGhVdlc3S0dJa21Mck9NQmZOM3hWYXJFSVNMb2kwMXBoTlM=5d1883388f731', 48, 1, '2019-06-30 19:39:04', '2019-06-30 19:39:04'),
(97, '4888663456b1d5S2xvY0xLYWRXcUpKejBrdk1KQnNlcFQwcTE5SGVvQkJPWGROUkJaM09KalQ4dTI=5d1883b2c82db', 48, 1, '2019-06-30 19:41:06', '2019-06-30 19:41:06'),
(98, '4888663456eTF2a2EyNzVNcUh2NW50Rk5xUXhvMUJ0YmVTRXRibmQ0Vm84WTBwQzFCMlFaS2RMN2I=5d18840d13136', 48, 1, '2019-06-30 19:42:37', '2019-06-30 19:42:37'),
(99, '4888663456MVQ1M21GZHg2T0p0dnp6RG5WTDFOTlZ0TlE4dk1iOTBBeGllbldqTU5ITHVaSTFDRGg=5d1884d9b6815', 48, 1, '2019-06-30 19:46:01', '2019-06-30 19:46:01'),
(100, '4888663456QmFLYUYyZm5lb0dzaHJvYWpzR1k1UGlYR1p5QWlLY0ROZ0FROVlUNDZoQzFqU2ZuZTI=5d188523b08bd', 48, 1, '2019-06-30 19:47:15', '2019-06-30 19:47:15'),
(101, '4888663456bEJ5bWE4ZlpKU1g3SUh1Q2pzaGdVbm1FVHowRWZQNFF3OUQ0TWRZbVhRb0ttQklPVDY=5d18854f950dd', 48, 1, '2019-06-30 19:47:59', '2019-06-30 19:47:59'),
(102, '4888663456THZ0YXlOZUd0MUpHbnVuZkNLbWRldXk0MzV6YmIzS290UEZDREd5dVFQak9ZTXRQQkE=5d1885a78c6c8', 48, 1, '2019-06-30 19:49:27', '2019-06-30 19:49:27'),
(103, '4888663456ZjdPRWtidU1NYnVRWWFHbW5uRjJudTRpRlU0ME9pazVidEU4MlYzRjB4T1YweGdUckw=5d1885bbb1839', 48, 1, '2019-06-30 19:49:47', '2019-06-30 19:49:47'),
(104, '4888663456WVZCa0pyVGYzVzVNTW5mSHJXS3pOdkJjek4weHBLSjdKTFdXSGFNSzJzR0VSTDdIWm4=5d18873883747', 48, 1, '2019-06-30 19:56:08', '2019-06-30 19:56:08'),
(105, '4888663456V0RCbFZOTUN2MGF4b2s1d3p6ZGxrWW0wTmxTQnhEUUp2SGdtZnNTdXNxOHJrVVlObEY=5d1889d61644c', 48, 1, '2019-06-30 20:07:18', '2019-06-30 20:07:18'),
(106, '4888663456UnlicFEzQ0JSMGxZbnpaWWl4ZEx1Ym9vNm9TNUM2WWdTYTRBYnNtejVLWEVKYXJCM1Y=5d188adb2f117', 48, 1, '2019-06-30 20:11:39', '2019-06-30 20:11:39'),
(107, '4888663456R3ZoZk9DUFNUTzFZRG1MVENVbFA3WW1FRFU2MENnWFFMMVJaWm9Iamd4NFlaTHY4cno=5d188b085ec0a', 48, 1, '2019-06-30 20:12:24', '2019-06-30 20:12:24'),
(108, '4888663456cWZPOVB0bjhLWlFzelFDMGplQmduRWpnR2JmRFh1SEw1bm5iMkxpaGpObDNBTTFLWWY=5d19c02dd2047', 48, 1, '2019-07-01 18:11:25', '2019-07-01 18:11:25'),
(109, '4711223366YjhCTFJhRXJQMENSa2xqWWxsaUIwS2Z2TEplRnFqZnR6MXFSSzRxbkpoNHpwTlBYQkY=5d19ced2dd992', 47, 1, '2019-07-01 19:13:54', '2019-07-01 19:13:54'),
(111, '4888663456Tms2OEFZb21hVHh0blE3a1FiblNqWEQ5ODRXeFJ4MDhhZ1JudmJ4WnRNRFhaNzVQVnk=5d19d7d47f0d7', 48, 1, '2019-07-01 19:52:20', '2019-07-01 19:52:20'),
(112, '48886634555M3lremJvZ05jb25VOThlQnM2Mk1WUURDWHJsWUJkT2JqOWg0UUN2NEJKdW5aQ2JyMjE=5d19db316f5b2', 48, 1, '2019-07-01 20:06:41', '2019-07-01 20:06:41'),
(113, '48886634333QTNZampXa2g0REJmRnhGS20ybkN4RjQ3YkJPd21yS3BJZzJ0TnpZeEhid09kYVdUMTI=5d19dce428de1', 48, 1, '2019-07-01 20:13:56', '2019-07-01 20:13:56'),
(114, '5088663456ZWNKVFVWRTV1Y3pHSmRKRlBqWjJmcHdGOXUwNnByWHVxemhwaTdkSGVJd0JndnhORko=5d19f8afecf47', 50, 1, '2019-07-01 22:12:32', '2019-07-01 22:12:32'),
(115, '5088663456OE5kQUlNdFZobUUwQjdFcHRXT0pZTGZlZWFsNEUzenBVam9taWQxOWJLUVZuNnI5MUw=5d19f9ac4c1e9', 50, 1, '2019-07-01 22:16:44', '2019-07-01 22:16:44'),
(116, '5088663456NEFtRVJwRDZNSEJmZkgxWDBDdTZCOUJjaTE2NjVHbTlWVm9wajJ5c2hZN2tzMVl1a0U=5d19f9eb17555', 50, 1, '2019-07-01 22:17:47', '2019-07-01 22:17:47'),
(117, '4888663456bXRma3hiSHpCaXpJbG01VGkxVmhEek9pZVh6THRsUnE3TURGWThvSDYwb0lrNERkUmg=5d19fab132977', 48, 1, '2019-07-01 22:21:05', '2019-07-01 22:21:05'),
(118, '4888663456SmMxaGpOanpBOHVhNWh2d254M1QwR013aFlnV2xscXdhTWNQNGswM3NqT0xrWDE3VDA=5d19fb6366786', 48, 1, '2019-07-01 22:24:03', '2019-07-01 22:24:03'),
(119, '4888663456dFA4cGRGSlZETVFPTjNPeEFNcUtPaTZqeUszOFIzcnEzNkNFaEY2RXN4alZNS2x2ODg=5d19fef10b381', 48, 1, '2019-07-01 22:39:13', '2019-07-01 22:39:13'),
(120, '4888663456alVuanVZcUlnYzZ4c3dqNmFhbVp4elFvbVJkRmdMRWtjWEU3cUpZcUo0dGxRenM3bkI=5d19ff2c133f8', 48, 1, '2019-07-01 22:40:12', '2019-07-01 22:40:12'),
(121, '4888663456dmJacm5pVWpOb0xxdTEyalpEcVh3TEUxclFCeUlacld6TjM1blpZbVJ6cXg3MjZIaW0=5d19ff858a103', 48, 1, '2019-07-01 22:41:41', '2019-07-01 22:41:41'),
(122, '4888663456TTJ4TVRTNFllTW9HWWlCMlZ3VVN6cnZLN3IzamhDMGhsM2JJNmpyb1RBRlc3RjZna0U=5d19ffc1d4c37', 48, 1, '2019-07-01 22:42:41', '2019-07-01 22:42:41'),
(123, '4888663456Y2hJOGsyc1d6aU9LeUh4T2Ixa3J1ZmhDbUVEeElLczJVeGEzZTl4R2J6OGxacjBvbWo=5d19fff5dde9c', 48, 1, '2019-07-01 22:43:33', '2019-07-01 22:43:33'),
(124, '4888663456NGhPRTNQdms1aHpqVVZ2eWc2UFJWNjVuUzNZWnhQVHRtbTUwMExKWnFSc21iRGtCd20=5d1a00098cb9f', 48, 1, '2019-07-01 22:43:53', '2019-07-01 22:43:53'),
(125, '4888663456Q2dRNVp3M2J2SDZUUUJwejZpNGd4TUh5ejA2a0liWjZ3MzlEVXlySFNsN0xVUTF3Tko=5d1a0027ddef8', 48, 1, '2019-07-01 22:44:23', '2019-07-01 22:44:23'),
(126, '4888663456Sk1FNkdrWjZuUlB1UVBLU2VOVU9nWkhjYW1lOFlLZXhvME51UEF0VE0zcHBMNVRuRUk=5d1a00a26b685', 48, 1, '2019-07-01 22:46:26', '2019-07-01 22:46:26'),
(127, '4888663456c0E4OGthUzNrazJxOFJDZEVXTTBPNTdVUzZMNzRuQVo4SUp3UGlOaHc0TEV0TTVpVDg=5d1a00ab1a288', 48, 1, '2019-07-01 22:46:35', '2019-07-01 22:46:35'),
(128, '4888663456a1l1cXBEMmpMTEY5TkpEUlhsSXRGVzg5NnlGaVhtbkRqU2hoV2U1MTRxUVBHYlBubFA=5d1a0118a2744', 48, 1, '2019-07-01 22:48:24', '2019-07-01 22:48:24'),
(129, '4888663456akxGWWlkSndQS1hOblNSdjd2QWQ1MWtoMnhLNzhZZEVSMUp4d1c2Y3dQaUIwWFZLamc=5d1a0200d3606', 48, 1, '2019-07-01 22:52:16', '2019-07-01 22:52:16'),
(130, '4888663456Z3FkTnFKMUV6ejRxOFFENmNvb0NQZ2Y5MnF4Y1NNem1hRXJtMUpxTm40bXdURWMxeEY=5d1a15d0dc49c', 48, 1, '2019-07-02 00:16:48', '2019-07-02 00:16:48'),
(131, '4888663456bGIzaDZZVm1tTm5rcHZLbU9LenhwNUYzcVRoWGhQODhrVFVwVVlwUHZYQldZdDFEMlM=5d1a2075f106d', 48, 1, '2019-07-02 01:02:14', '2019-07-02 01:02:14'),
(132, '4888663456S3B2RXVvMW5xdnVybWF0Vk4xRWlacjNiZTUxemo0RkczM212ZHNkeWpHbWVQSDYzUlE=5d1b2e518b8c0', 48, 1, '2019-07-02 20:13:37', '2019-07-02 20:13:37'),
(135, '4888663456emZ4UGZCZVVpSHNJY2RJYTdQdXAxVEMyY3RsSTg0VzQxd2ZHeW5YMXZiU0N1Q1pWN20=5d1b4c1a80635', 48, 1, '2019-07-02 22:20:42', '2019-07-02 22:20:42'),
(136, '4888663456TUQ5SmtXbllXZW1ybWdRalNTZ0J0U1FEbnFBa3h0ajdNZjBMbUIxY2c1cFo1clVVcUM=5d1b4d2e14c1c', 48, 1, '2019-07-02 22:25:18', '2019-07-02 22:25:18'),
(137, '10AramexZU9zVEZnbG1sdXdlaDNyc2lNbE05aTNoMmtxTUE2Z2JIS2ZBVmY2bE9BSFdoeTZjcXg=5d1b530400913', 10, 2, '2019-07-02 22:50:13', '2019-07-02 22:50:13'),
(138, '4888663456a3hCSDF1WExHZXdMVERwUndQeXJrSmpnSm9SUzZwb1IwRkd6ODI0eXVXQmpyVTFrcXk=5d1c6abe72e2a', 48, 1, '2019-07-03 18:43:42', '2019-07-03 18:43:42'),
(139, '4888663456NzNDaEc4VmlOaWFwZ2x4ZUlNRjhXWnNjTHRpQU42QmFYSFZNNmcyRGZQQmRjSnJhano=5d1c76c50f618', 48, 1, '2019-07-03 19:35:01', '2019-07-03 19:35:01'),
(140, '4888663456cGZvTEhuWHFyRlhWMUxwWjhPdGRBcHR4dk01YkFaMkNUblVUWDIydnJDbmNGWnBGdjU=5d1c7849f1090', 48, 1, '2019-07-03 19:41:30', '2019-07-03 19:41:30'),
(141, '5155756071a05xSFNxUHRpRGw4UHVGbW5BS1BDb1Q1cWsxVEk1YVp0NmNXOXVQTjNEQTVVaktJMFA=5d1df008a1eb2', 51, 1, '2019-07-04 22:24:41', '2019-07-04 22:24:41'),
(142, '5155756071M21uMTJDVW4wN2taUkFvZHUwNk52T25oQk9ZeEpmT3ViNUF1VUJmaWdrajltMmZQczc=5d1df067bfd1c', 51, 1, '2019-07-04 22:26:16', '2019-07-04 22:26:16'),
(143, '5198539080ZHdWU2lOZHlJOXRQN1EzdHlnaDgxaUxSa2RCMk9lOWRWd0F1WWtoc01CUkRQMHdxNms=5d21a3d3cbb2d', 51, 1, '2019-07-07 17:48:35', '2019-07-07 17:48:35'),
(144, '5198539080TlU3VFd6djFQN1NQTWJpNzQxZnhvQnNrRUxPcWNSUnc4anFIdXVtd0hDTWpDTFFYWk0=5d21b8e4c5720', 51, 1, '2019-07-07 19:18:29', '2019-07-07 19:18:29'),
(145, '11peterUXV5ZjR4R2lmYVlOWmhwUmk0R2tWQ3kySWRFTm1FaFVHb010dGxrZGlQdVZXQUZXd3E=5d21c25f4e434', 11, 2, '2019-07-07 19:58:55', '2019-07-07 19:58:55'),
(146, '11peterM2VTc2wwSElDSTNMb3FaeDRIaXN4YU5rYXd2Z0F0eVBDVHpsZ09DUDZHTDF5c204clI=5d21e8d2d5f3f', 11, 2, '2019-07-07 22:42:58', '2019-07-07 22:42:58'),
(147, '11peterSkVGRWhrVFZFV3Z5RTlPZnFGSVJ4VGtUdkQzN2ExdmZaUVBRbFN6U2psS3lmQ0hEaGw=5d21e9324ec9e', 11, 2, '2019-07-07 22:44:34', '2019-07-07 22:44:34'),
(148, '11peterN2M4RDE2VkN3ZUpIczBqQlRQR1YyMk5lRGM2Z2hLZ2JPUDR4amluRTlxOVNwYnNNdFQ=5d21e98b2d57a', 11, 2, '2019-07-07 22:46:03', '2019-07-07 22:46:03'),
(149, '11peterM0Q2c01QVmg5eHE5anN3TXNhTEs4bmFnakU2bDB2UlNqeHphMUNyM1FhaGFMNUZUdWs=5d21e9ab980c6', 11, 2, '2019-07-07 22:46:35', '2019-07-07 22:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gift', NULL, NULL, 1, '2019-06-11 21:00:00', '2019-07-09 07:42:35'),
(2, 'Food', NULL, NULL, 1, '2019-06-11 21:00:00', '2019-06-09 21:00:00'),
(3, 'Electronics', NULL, NULL, 1, '2019-06-23 21:00:00', '2019-06-18 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_shipment`
--

CREATE TABLE `category_shipment` (
  `id` int(10) NOT NULL,
  `shipment_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_shipment`
--

INSERT INTO `category_shipment` (`id`, `shipment_id`, `category_id`, `quantity`, `created_at`, `updated_at`) VALUES
(21, 29, 1, 3, '2019-06-25 08:11:09', '2019-06-25 08:11:09'),
(20, 28, 1, 3, '2019-06-25 08:11:07', '2019-06-25 08:11:07'),
(19, 27, 1, 3, '2019-06-25 08:11:06', '2019-06-25 08:11:06'),
(17, 25, 1, 3, '2019-06-25 08:10:59', '2019-06-25 08:10:59'),
(18, 26, 1, 3, '2019-06-25 08:11:04', '2019-06-25 08:11:04'),
(16, 24, 2, 3, '2019-06-25 07:27:03', '2019-06-25 07:27:03'),
(15, 24, 1, 4, '2019-06-25 07:27:03', '2019-06-25 07:27:03'),
(14, 23, 1, 4, '2019-06-25 07:26:31', '2019-06-25 07:26:31'),
(22, 35, 1, 4, '2019-06-27 12:46:17', '2019-06-27 12:46:17'),
(23, 36, 1, 4, '2019-06-27 12:46:43', '2019-06-27 12:46:43'),
(24, 36, 2, 2, '2019-06-27 12:46:43', '2019-06-27 12:46:43'),
(25, 37, 1, 4, '2019-06-27 12:47:02', '2019-06-27 12:47:02'),
(26, 37, 2, 2, '2019-06-27 12:47:02', '2019-06-27 12:47:02'),
(27, 37, 3, 6, '2019-06-27 12:47:02', '2019-06-27 12:47:02'),
(28, 38, 1, 4, '2019-06-30 07:31:03', '2019-06-30 07:31:03'),
(29, 39, 1, 4, '2019-06-30 07:31:28', '2019-06-30 07:31:28'),
(30, 39, 3, 1, '2019-06-30 07:31:28', '2019-06-30 07:31:28'),
(31, 40, 3, 4, '2019-06-30 07:31:39', '2019-06-30 07:31:39'),
(32, 40, 2, 1, '2019-06-30 07:31:39', '2019-06-30 07:31:39'),
(33, 42, 2, 2, '2019-06-30 14:14:28', '2019-06-30 14:14:28'),
(34, 43, 2, 3, '2019-06-30 14:19:14', '2019-06-30 14:19:14'),
(35, 43, 3, 5, '2019-06-30 14:19:14', '2019-06-30 14:19:14'),
(36, 43, 1, 2, '2019-06-30 14:19:14', '2019-06-30 14:19:14'),
(37, 44, 3, 3, '2019-07-01 14:24:16', '2019-07-01 14:24:16'),
(38, 44, 1, 2, '2019-07-01 14:24:16', '2019-07-01 14:24:16'),
(39, 45, 3, 3, '2019-07-02 06:38:02', '2019-07-02 06:38:02'),
(40, 45, 2, 3, '2019-07-02 06:38:02', '2019-07-02 06:38:02'),
(41, 46, 3, 1, '2019-07-02 09:24:34', '2019-07-02 09:24:34'),
(46, 47, 2, 2, '2019-07-03 09:10:29', '2019-07-03 09:10:29'),
(43, 48, 2, 1, '2019-07-03 06:55:20', '2019-07-03 06:55:20'),
(44, 48, 3, 4, '2019-07-03 06:55:20', '2019-07-03 06:55:20'),
(47, 47, 3, 3, '2019-07-03 09:10:29', '2019-07-03 09:10:29'),
(48, 50, 1, 1, '2019-07-07 08:20:45', '2019-07-07 08:20:45'),
(49, 51, 2, 2, '2019-07-07 08:21:04', '2019-07-07 08:21:04'),
(50, 52, 3, 2, '2019-07-07 08:27:34', '2019-07-07 08:27:34'),
(51, 56, 1, 2, '2019-07-07 08:56:52', '2019-07-07 08:56:52'),
(52, 56, 2, 2, '2019-07-07 08:56:52', '2019-07-07 08:56:52'),
(53, 56, 3, 4, '2019-07-07 08:56:52', '2019-07-07 08:56:52'),
(54, 57, 2, 8, '2019-07-07 09:10:52', '2019-07-07 09:10:52'),
(55, 58, 2, 2, '2019-07-07 09:29:18', '2019-07-07 09:29:18'),
(56, 59, 2, 6, '2019-07-07 13:09:21', '2019-07-07 13:09:21'),
(57, 59, 3, 5, '2019-07-07 13:09:21', '2019-07-07 13:09:21');

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
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(10) NOT NULL,
  `percentage` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 20, '2019-06-13 11:40:40', '2019-07-08 15:13:13');

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
  `rating` float DEFAULT '0',
  `image` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `password`, `mobile`, `phone`, `description`, `rating`, `image`, `country_id`, `status`, `remember_token`, `approved`, `created_at`, `updated_at`) VALUES
(8, 'Fedex', 'fedex@gmail.com', '$2y$10$xTrFsSRfC0MPnTN3/l1rte.3GO85XBECj3HF2dEYpgaQMTLR8VjZO', '11443322', NULL, NULL, 3, 'company_image_1560331455.png', 1, 1, NULL, 1, '2019-06-12 09:24:15', '2019-07-03 19:35:31'),
(9, 'DHL', 'info@dhl.com', 'qqqqqq', '88554433', NULL, NULL, 3, 'company_image_1557746290.png', 1, 1, NULL, 1, '2019-06-25 09:52:32', '2019-07-03 19:36:51'),
(10, 'Aramex', 'in@vas.com', '$2y$10$nAAXJ6F1mb.SgCMJVh2HDOnguIZjQPMLZRLFOAGhh9dMYnq97TFa2', '88663456', NULL, NULL, 0, 'company_image_1562071812.png', 4, 0, NULL, 0, '2019-07-02 22:50:12', '2019-07-02 22:50:12'),
(11, 'peter', 'peter@gmail.com', '$2y$10$TFl7OrBvX580nf0zQv1OdeE9Wpgg98MuDiddT3Dl3AJ3lB7NiV2/e', '66778899', NULL, NULL, 0, 'company_image_1562493535.png', 1, 1, NULL, 1, '2019-07-07 19:58:55', '2019-07-07 12:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) NOT NULL,
  `name_en` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name_ar` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `digits` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_en`, `name_ar`, `country_code`, `status`, `digits`, `created_at`, `updated_at`) VALUES
(1, 'Kuwait', 'الكويت', '+965', 1, NULL, '2019-06-10 07:20:16', '2019-06-19 11:37:16'),
(2, 'Qatar', 'القطر', '+974', 1, NULL, '2019-06-10 07:20:16', '2019-06-19 11:37:22'),
(3, 'Bahrain', ' البحرين', '+973', 1, NULL, '2019-06-10 07:20:16', '2019-06-19 11:37:26'),
(4, 'UAE', ' الامارات', '+971', 1, NULL, '2019-06-10 07:20:16', '2019-06-19 11:37:30'),
(5, 'Saudia', 'السعودية', '+966', 1, NULL, '2019-06-10 07:20:16', '2019-06-19 11:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `free_deliveries`
--

CREATE TABLE `free_deliveries` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `free_deliveries`
--

INSERT INTO `free_deliveries` (`id`, `company_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 10, 0, '2019-07-02 22:50:13', '2019-07-02 22:50:13'),
(3, 11, 0, '2019-07-07 19:58:55', '2019-07-07 19:58:55');

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
(19, 'Shipment Already booked', 'shipment_booked_already', 'The shipment(s) is already booked', 'تم حجز الشحنة بالفعل', 1, NULL, NULL),
(20, 'Booked', 'booked', 'BOOKED', 'حجز', 1, NULL, NULL),
(21, 'Picked Up', 'picked_up', 'PICKED', 'التقط', 1, NULL, NULL),
(22, 'Delivered', 'delivered', 'DELIVERED', 'تم التوصيل', 1, NULL, NULL),
(23, 'Insufficient Balance', 'insufficient_balance', 'Insufficient Balance in wallet', 'عدم كفاية الرصيد في المحفظة', 1, NULL, NULL),
(24, 'Mobile not found', 'mobile_not_found', 'Mobile number does not exist', 'رقم الجوال غير موجود', 1, NULL, NULL),
(25, 'Address not found', 'no_address_found', 'Address not found', 'لم يتم العثور على العنوان', 1, NULL, NULL),
(26, 'Shipment not found', 'no_shipment_found', 'Shipment not found', 'الشحنة غير موجودة', 1, NULL, NULL),
(27, 'User not found', 'no_user_found', 'User not found', 'المستخدم ليس موجود', 1, NULL, NULL),
(28, 'Company not found', 'no_company_found', 'Company not found', 'الشركة غير موجودة', 1, NULL, NULL),
(29, 'Email already exist', 'email_exist', 'Email already registered', 'البريد الإلكتروني مسجل مسبقا', 1, NULL, NULL),
(30, 'Shipment already accepted', 'shipment_booked_already', 'The shipment is already accepted', 'الشحنة مقبولة بالفعل', 1, NULL, NULL),
(31, 'Shipment deleted successfully', 'shipment_delete_success', 'Shipment deleted successfully', 'تم حذف الشحنة بنجاح', 1, NULL, NULL),
(32, 'Pending', 'pending', 'Pending', 'قيد الانتظار', 1, NULL, NULL),
(33, 'Shipment picked up successfully', 'picked_success', 'Shipment picked up successfully', 'التقطت الشحنة بنجاح', 1, NULL, NULL),
(34, 'Shipment delivered successfully', 'delivered_success', 'Shipment delivered successfully', 'شحنة تسليمها بنجاح', 1, NULL, NULL),
(35, 'Order not found', 'no_order_found', 'Order not found', 'لم يتم العثور على الطلب', 1, NULL, NULL),
(36, 'Shipment accepted successfully', 'shipment_accept_success', 'Shipment accepted successfully', 'شحنة مقبولة بنجاح', 1, NULL, NULL),
(37, 'Shipment not accepted', 'shipment_accept_failed', 'Shipment not accepted', 'شحنة غير مقبولة', 1, NULL, NULL),
(38, 'Shipment edited successfully', 'edit_shipment_success', 'Shipment edited successfully', 'تم تعديل الشحنة بنجاح', 1, NULL, NULL),
(39, 'Successfully rated', 'rated_successfully', 'Successfully rated', 'تم التقييم بنجاح', 1, NULL, NULL),
(40, 'Address updated successfully', 'address_update_success', 'Address updated successfully', 'تم تحديث العنوان بنجاح', 1, NULL, NULL),
(41, 'Country not found', 'no_country_found', 'Country not found', 'البلد غير موجود', 1, NULL, NULL),
(42, 'Category not found', 'no_category_found', 'Category not found', 'الفئة غير موجودة', 1, NULL, NULL),
(43, 'Invalid API request', 'invalid_api_request', 'Invalid API request', 'طلب API غير صالح', 1, NULL, NULL),
(44, 'Address deleted successfully', 'address_deleted_successfully', 'Address deleted successfully', 'تم حذف العنوان بنجاح', 1, NULL, '2019-07-01 18:20:20'),
(45, 'Rating not found', 'no_rating_found', 'Rating not found', 'التقييم غير موجود', 1, NULL, NULL);

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
  `send_to` tinyint(1) DEFAULT NULL COMMENT 'All Application Users:0,Registered Users:1,Specific Users:2,Android Users:3, iOS Users:4',
  `subject_en` text COLLATE utf8_unicode_ci,
  `subject_ar` text COLLATE utf8_unicode_ci,
  `message_en` text COLLATE utf8_unicode_ci,
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

INSERT INTO `notifications` (`id`, `send_to`, `subject_en`, `subject_ar`, `message_en`, `message_ar`, `link`, `notification_date`, `sent_status`, `created_at`, `updated_at`) VALUES
(1, 0, 'General', 'General', 'General', 'General', '', '2018-06-26 16:35:00', 0, '2018-06-25 13:36:23', '2018-06-25 13:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `notification_specific_user`
--

CREATE TABLE `notification_specific_user` (
  `id` int(10) NOT NULL,
  `notification_id` int(10) UNSIGNED NOT NULL,
  `user_ids` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `one_signal_company_users`
--

CREATE TABLE `one_signal_company_users` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `player_id` varchar(200) NOT NULL,
  `device_type` tinyint(4) NOT NULL COMMENT '1-iOS, 2-Android',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `one_signal_company_users`
--

INSERT INTO `one_signal_company_users` (`id`, `company_id`, `player_id`, `device_type`, `created_at`, `updated_at`) VALUES
(1, 11, '965789765456', 2, '2019-07-07 22:44:34', '2019-07-07 22:44:34'),
(2, 11, 'e8c0b418-106f-4ca4-994c-e0b0a4c2e830', 2, '2019-07-07 22:46:35', '2019-07-07 22:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `one_signal_users`
--

CREATE TABLE `one_signal_users` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `player_id` varchar(200) NOT NULL,
  `device_type` tinyint(4) NOT NULL COMMENT '1-iOS, 2-Android',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `one_signal_users`
--

INSERT INTO `one_signal_users` (`id`, `user_id`, `player_id`, `device_type`, `created_at`, `updated_at`) VALUES
(1, 36, '22818f0e-fb1f-43c8-ba73-46e6f574128c', 2, '2019-06-18 18:08:34', '2019-06-18 18:08:34'),
(2, 27, '124987655838376490473s', 1, '2019-06-18 19:58:59', '2019-06-18 19:58:59'),
(3, 39, '22818f0e-fb1f-43c8-ba73-46e6f574128c', 2, '2019-06-19 20:01:15', '2019-06-19 20:01:15'),
(4, 36, '22827617-6a9c-4b19-975a-61b4804607fe', 2, '2019-06-19 21:41:46', '2019-06-19 21:41:46'),
(5, 40, '22827617-6a9c-4b19-975a-61b4804607fe', 2, '2019-06-19 21:42:59', '2019-06-19 21:42:59'),
(7, 42, '124987655838376490473s', 2, '2019-06-19 21:49:15', '2019-06-19 21:49:15'),
(8, 43, '22827617-6a9c-4b19-975a-61b4804607fe', 2, '2019-06-19 21:49:55', '2019-06-19 21:49:55'),
(9, 44, '124987655838376490473s', 1, '2019-06-24 20:20:05', '2019-06-24 20:20:05'),
(10, 47, '22827617-6a9c-4b19-975a-61b4804607fe', 2, '2019-06-25 00:58:40', '2019-06-25 00:58:40'),
(11, 48, '124987655838376490473s', 1, '2019-06-25 00:59:02', '2019-06-25 00:59:02'),
(12, 47, '78cd6d7f-1789-48fc-af73-d07aa0b00d69', 2, '2019-06-25 16:19:24', '2019-06-25 16:19:24'),
(13, 47, '7282b17c-3e61-48bf-b01d-015bf8d142ce', 2, '2019-06-25 16:25:18', '2019-06-25 16:25:18'),
(20, 51, '124987655838376490473s', 2, '2019-07-03 23:30:00', '2019-07-03 23:30:00'),
(15, 49, '124987655838376490473s', 2, '2019-06-25 17:40:24', '2019-06-25 17:40:24'),
(22, 51, '0752b6b8-6db5-49a7-9ef2-aec6e31b681c', 2, '2019-07-04 18:35:06', '2019-07-04 18:35:06'),
(17, 50, '124987655838376490473s', 1, '2019-07-01 22:12:29', '2019-07-01 22:12:29'),
(21, 51, 'f6f91bfb-e63a-4854-a900-db8de31d08ac', 2, '2019-07-03 23:33:12', '2019-07-03 23:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `free_deliveries` int(5) NOT NULL,
  `wallet_amount` float NOT NULL,
  `card_amount` float NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0-pending, 1- Success, 2- failed, 3-cancelled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `company_id`, `free_deliveries`, `wallet_amount`, `card_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 0, 0, 1, '2019-06-25 07:30:40', '2019-07-08 13:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_shipment`
--

CREATE TABLE `order_shipment` (
  `order_id` int(10) NOT NULL,
  `shipment_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_shipment`
--

INSERT INTO `order_shipment` (`order_id`, `shipment_id`, `created_at`, `updated_at`) VALUES
(1, 29, '2019-07-08 13:51:15', '2019-07-08 13:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(10) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `mobile`, `otp`, `created_at`, `updated_at`) VALUES
(24, '88663451', '73894', '2019-07-01 17:54:23', '2019-07-01 17:54:23'),
(23, '88663453', '46921', '2019-07-01 17:51:15', '2019-07-01 17:51:15'),
(25, '88663450', '29150', '2019-07-01 18:08:22', '2019-07-01 18:08:22'),
(22, '88663459', '29745', '2019-07-01 17:49:59', '2019-07-01 17:49:59'),
(19, '77332211', '97634', '2019-06-25 17:40:24', '2019-06-25 17:40:24'),
(36, '88663456', '94028', '2019-07-01 20:13:52', '2019-07-03 19:41:25'),
(32, '11334466', '25394', '2019-07-01 19:14:34', '2019-07-02 21:53:55'),
(20, '88663457', '92653', '2019-07-01 17:25:09', '2019-07-01 17:25:09'),
(21, '88663458', '35061', '2019-07-01 17:46:52', '2019-07-01 17:46:52'),
(26, '88663454', '32905', '2019-07-01 18:36:39', '2019-07-01 18:36:39'),
(27, '88663455', '75821', '2019-07-01 18:39:38', '2019-07-01 18:39:38'),
(28, '88663499', '57842', '2019-07-01 18:41:57', '2019-07-01 18:41:57'),
(29, '886634564', '49827', '2019-07-01 18:48:16', '2019-07-01 18:48:16'),
(30, '886634563', '32164', '2019-07-01 18:50:35', '2019-07-01 18:50:35'),
(33, '886634567', '64529', '2019-07-01 19:56:08', '2019-07-01 19:56:08'),
(34, '88663999', '23091', '2019-07-01 19:57:00', '2019-07-01 19:57:00'),
(38, '55756071', '57618', '2019-07-03 23:30:00', '2019-07-04 18:35:06');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_status` tinyint(4) NOT NULL DEFAULT '0',
  `add_status` tinyint(4) NOT NULL DEFAULT '0',
  `edit_status` tinyint(4) NOT NULL DEFAULT '0',
  `delete_status` tinyint(4) NOT NULL DEFAULT '0',
  `notifications_status` tinyint(4) NOT NULL DEFAULT '0',
  `companyusers_status` tinyint(4) NOT NULL,
  `categories_status` tinyint(4) NOT NULL,
  `registeredusers_status` tinyint(4) NOT NULL,
  `settings_status` tinyint(4) NOT NULL DEFAULT '0',
  `shipments_status` tinyint(4) NOT NULL,
  `transactions_status` tinyint(4) NOT NULL,
  `webmaster_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `view_status`, `add_status`, `edit_status`, `delete_status`, `notifications_status`, `companyusers_status`, `categories_status`, `registeredusers_status`, `settings_status`, `shipments_status`, `transactions_status`, `webmaster_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Webmaster', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
(2, 'Website Manager', 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 1, 1, NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54');

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
(1, 10, '2019-05-16 08:40:57', '2019-07-08 15:19:31');

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

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `company_id`, `rating`, `created_at`, `updated_at`) VALUES
(6, 47, 8, 2, '2019-07-01 22:39:13', '2019-07-02 16:35:17'),
(7, 48, 8, 4, '2019-07-03 16:59:34', '2019-07-03 19:35:31'),
(8, 48, 9, 3, '2019-07-03 19:01:40', '2019-07-03 19:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `country_id` int(11) DEFAULT NULL,
  `player_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `fullname`, `email`, `password`, `mobile`, `image`, `status`, `country_id`, `player_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(47, 'Peter Samuel', 'Hello@vavisa-kw.com', '', '11334466', 'user_image_1561389671.png', 1, 1, NULL, '2019-06-25 00:58:40', '2019-07-07 19:26:41', NULL),
(48, 'Mario Gamal', 'mario@vavisa-kw.com', '', '88663456', 'user_image_1562146814.png', 1, 4, NULL, '2019-06-25 00:59:02', '2019-07-03 19:40:14', NULL),
(49, NULL, '', '', '77332211', NULL, 1, 4, NULL, '2019-06-25 17:40:24', '2019-06-25 17:40:24', NULL),
(51, 'Peter Samuel', 'Hello@vavisa.com', '', '98539080', NULL, 1, 1, NULL, '2019-07-03 23:30:00', '2019-07-07 19:27:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
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
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_url`, `site_title_en`, `site_title_ar`, `min_options`, `max_options`, `ios_version`, `android_version`, `maintenance_mode`, `maintenance_message_en`, `maintenance_message_ar`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'http://localhost/internal/aaraa/public', 'Shipment and Delivery Provider', 'استطلاع التطبيق المسح', 2, 5, '1.4', '1.4', 0, 'الخدمة غير متوفرة في هذه اللحظة. أعود بعد وقت ما', 'Service unavailable at this moment. Come back after sometime', '1', '1', '2017-03-06 11:06:23', '2019-07-04 14:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `address_from_id` int(10) NOT NULL,
  `address_to_id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) DEFAULT NULL,
  `is_today` tinyint(1) NOT NULL,
  `pickup_time_from` time DEFAULT NULL,
  `pickup_time_to` time DEFAULT NULL,
  `status` int(2) NOT NULL COMMENT '1 - Pending, 2- Accepted, 3- picked Up, 4 - Delivered',
  `payment_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '1- Knet, 2- Wallet, 3- COD',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `name`, `description`, `image`, `price`, `address_from_id`, `address_to_id`, `user_id`, `company_id`, `is_today`, `pickup_time_from`, `pickup_time_to`, `status`, `payment_type`, `created_at`, `updated_at`) VALUES
(24, NULL, NULL, NULL, 10, 5, 6, 48, 8, 0, '00:00:01', '00:00:00', 4, '1', '2019-06-25 17:27:03', '2019-07-01 14:34:09'),
(29, NULL, NULL, NULL, 10, 5, 6, 48, 9, 0, '00:00:01', '00:00:00', 2, '1', '2019-06-25 18:11:09', '2019-07-02 09:12:16'),
(33, NULL, NULL, NULL, 10, 5, 6, 48, NULL, 0, '00:00:01', '00:00:00', 1, '1', '2019-06-26 16:46:26', '2019-06-26 16:46:26'),
(38, NULL, NULL, NULL, 10, 17, 18, 47, NULL, 0, '00:00:01', '00:00:00', 1, '1', '2019-06-30 17:31:03', '2019-06-30 17:31:03'),
(39, NULL, NULL, NULL, 10, 18, 17, 47, NULL, 0, '00:00:01', '00:00:00', 1, '1', '2019-06-30 17:31:28', '2019-06-30 17:31:28'),
(40, NULL, NULL, NULL, 10, 18, 17, 47, 8, 0, '00:00:01', '00:00:00', 2, '1', '2019-06-30 17:31:39', '2019-06-30 07:32:01'),
(43, NULL, NULL, NULL, 10, 17, 18, 47, 9, 0, '02:18:00', '08:18:00', 4, '1', '2019-07-01 00:19:14', '2019-07-02 11:56:59'),
(44, NULL, NULL, NULL, 10, 17, 9, 47, 8, 0, '17:22:00', '02:10:00', 4, '1', '2019-07-02 00:24:16', '2019-07-02 11:57:07'),
(46, NULL, NULL, NULL, 10, 9, 21, 47, NULL, 0, '06:22:00', '12:22:00', 1, '1', '2019-07-02 19:24:34', '2019-07-02 19:24:34'),
(47, NULL, NULL, NULL, 10, 9, 9, 47, NULL, 0, '12:00:00', '01:00:00', 1, '1', '2019-07-02 22:21:59', '2019-07-03 19:10:29'),
(48, NULL, NULL, NULL, 10, 18, 9, 47, NULL, 0, '06:54:00', '04:54:00', 1, '1', '2019-07-03 16:55:20', '2019-07-03 16:55:20'),
(50, NULL, NULL, NULL, 10, 23, 23, 47, NULL, 1, NULL, NULL, 1, '1', '2019-07-07 18:20:45', '2019-07-07 18:20:45'),
(51, NULL, NULL, NULL, 10, 22, 23, 51, NULL, 1, NULL, NULL, 1, '1', '2019-07-07 18:21:04', '2019-07-07 18:21:04'),
(52, NULL, NULL, NULL, 10, 22, 23, 51, NULL, 0, '11:26:00', '06:26:00', 1, '1', '2019-07-07 18:27:34', '2019-07-07 18:27:34'),
(56, NULL, NULL, NULL, 10, 22, 23, 51, NULL, 1, NULL, NULL, 1, '1', '2019-07-07 18:56:52', '2019-07-07 18:56:52'),
(57, NULL, NULL, NULL, 10, 22, 23, 51, NULL, 0, '12:09:00', '05:09:00', 1, '1', '2019-07-07 19:10:52', '2019-07-07 19:10:52'),
(58, NULL, NULL, NULL, 10, 22, 23, 51, NULL, 1, NULL, NULL, 1, '1', '2019-07-07 19:29:18', '2019-07-07 19:29:18'),
(59, NULL, NULL, NULL, 10, 22, 23, 51, NULL, 0, '16:08:00', '08:45:00', 1, '1', '2019-07-07 23:09:21', '2019-07-07 23:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `permissions_id`, `status`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
('1', 'admin', 'mjhosawa@vavisa-kw.com', '$2y$10$vCYpyjX68hKYbzsAUZS4vuLCodSrXukCOHorulIwREO70hNgv6J5q', NULL, 1, 1, 'pBmPf15oBkWgAkOavQk0Y1rNQO2QjWu9rujxJExXbdufhDHoP9jjwlJ5qPDc', '1', NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE `versions` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `version` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`id`, `name`, `version`, `created_at`, `updated_at`) VALUES
(1, 'iOS', '5', '2019-06-25 13:34:14', '2019-06-25 14:27:42'),
(2, 'Android', '1', '2019-06-25 13:34:14', '2019-06-25 13:34:14');

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

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `company_id`, `balance`, `created_at`, `updated_at`) VALUES
(3, 10, 0, '2019-07-02 22:50:13', '2019-07-02 22:50:13'),
(4, 11, 0, '2019-07-07 19:58:55', '2019-07-07 19:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_offers`
--

CREATE TABLE `wallet_offers` (
  `id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `free_deliveries` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallet_offers`
--

INSERT INTO `wallet_offers` (`id`, `amount`, `free_deliveries`, `created_at`, `updated_at`) VALUES
(1, 50, 2, '2019-05-16 11:46:14', '2019-07-09 12:29:35'),
(2, 100, 4, '2019-05-16 11:46:14', '2019-05-16 11:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT 'true - In, false - out',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webmaster_settings`
--

CREATE TABLE `webmaster_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_box_status` tinyint(4) NOT NULL,
  `en_box_status` tinyint(4) NOT NULL,
  `registeredusers_status` tinyint(4) NOT NULL,
  `categories_status` tinyint(4) NOT NULL,
  `companyusers_status` tinyint(4) NOT NULL,
  `notifications_status` tinyint(4) NOT NULL,
  `settings_status` tinyint(4) NOT NULL,
  `default_currency_id` int(11) NOT NULL,
  `languages_count` int(11) NOT NULL,
  `shipments_status` tinyint(4) NOT NULL,
  `transactions_status` tinyint(4) NOT NULL,
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
-- Dumping data for table `webmaster_settings`
--

INSERT INTO `webmaster_settings` (`id`, `ar_box_status`, `en_box_status`, `registeredusers_status`, `categories_status`, `companyusers_status`, `notifications_status`, `settings_status`, `default_currency_id`, `languages_count`, `shipments_status`, `transactions_status`, `header_menu_id`, `footer_menu_id`, `links_status`, `register_status`, `permission_group`, `api_status`, `api_key`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 0, 2, 1, 1, 1, 2, 0, 0, 3, 1, '571775002564288', 1, 1, '2017-11-08 13:25:54', '2017-11-09 18:55:04');

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
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authentication_access_token` (`access_token`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_shipment`
--
ALTER TABLE `category_shipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cc_payments`
--
ALTER TABLE `cc_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_country_id_foreign` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_deliveries`
--
ALTER TABLE `free_deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `free_deliveries_company_id_foreign` (`company_id`);

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
-- Indexes for table `notification_specific_user`
--
ALTER TABLE `notification_specific_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_id_foreign_key` (`notification_id`);

--
-- Indexes for table `one_signal_company_users`
--
ALTER TABLE `one_signal_company_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `one_signal_users`
--
ALTER TABLE `one_signal_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_company_id_foreign_key` (`company_id`);

--
-- Indexes for table `order_shipment`
--
ALTER TABLE `order_shipment`
  ADD KEY `order_id_foreign_key` (`order_id`),
  ADD KEY `shipment_id_foreign_key` (`shipment_id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_mobile` (`mobile`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_company_id_foreign` (`company_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registered_users_mobile_unique` (`mobile`),
  ADD KEY `registered_users_email_unique` (`email`) USING BTREE;

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `versions`
--
ALTER TABLE `versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_company_id_foreign` (`company_id`);

--
-- Indexes for table `wallet_offers`
--
ALTER TABLE `wallet_offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `amount` (`amount`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_out_company_id_foreign` (`company_id`);

--
-- Indexes for table `webmaster_settings`
--
ALTER TABLE `webmaster_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_shipment`
--
ALTER TABLE `category_shipment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `cc_payments`
--
ALTER TABLE `cc_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `free_deliveries`
--
ALTER TABLE `free_deliveries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `knet_payments`
--
ALTER TABLE `knet_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_management`
--
ALTER TABLE `language_management`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
-- AUTO_INCREMENT for table `notification_specific_user`
--
ALTER TABLE `notification_specific_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `one_signal_company_users`
--
ALTER TABLE `one_signal_company_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `one_signal_users`
--
ALTER TABLE `one_signal_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `versions`
--
ALTER TABLE `versions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallet_offers`
--
ALTER TABLE `wallet_offers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webmaster_settings`
--
ALTER TABLE `webmaster_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `registered_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `free_deliveries`
--
ALTER TABLE `free_deliveries`
  ADD CONSTRAINT `free_deliveries_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification_specific_user`
--
ALTER TABLE `notification_specific_user`
  ADD CONSTRAINT `notification_id_foreign_key` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_company_id_foreign_key` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_shipment`
--
ALTER TABLE `order_shipment`
  ADD CONSTRAINT `order_id_foreign_key` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipment_id_foreign_key` FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `registered_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD CONSTRAINT `wallet_out_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
