-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2019 at 05:56 PM
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

INSERT INTO `addresses` (`id`, `name`, `block`, `street`, `area`, `building`, `details`, `notes`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Home, office', '12, 13B', '12, 14A', 'Salmiya, Sharq', '14, 13Z', '', 'Do not park vehicle infront of the gate', 48, 1, '2019-06-25 17:22:31', '2019-06-25 17:22:31'),
(6, 'Work, office', '12, 13B', '12, 14A', 'Salmiya, Sharq', '14, 13Z', '', 'Do not park vehicle infront of the gate', 48, 1, '2019-06-25 17:22:49', '2019-06-25 17:22:49'),
(9, 'Peter Samuel', 'Sharq', '12', '12sh', '14, 13Z', 'Al-Kuwait, near Hamra', 'Do not park vehicle infront of the gate', 47, 1, '2019-06-26 01:02:01', '2019-06-28 01:01:59'),
(14, 'Fvvv', 'Sharq', 'Gg', 'Jaber Al-Mubarak Street', 'Jaber Al-Mubarak Street', 'Al Kuwayt', '', 47, 1, '2019-06-30 16:55:21', '2019-06-30 16:55:21'),
(15, 'Gdg', 'Sharq', 'Dg', 'Omar Ben Al Khattab Street', 'Al-Rayah Tower', 'Al Kuwayt', '', 47, 1, '2019-06-30 16:56:05', '2019-06-30 16:56:05'),
(17, 'Home-Peter', '12, 13B', '12, 14A', 'Salmiya, Sharq', '14, 13Z', 'Al-Kuwait, near Hamra', 'Do not park vehicle infront of the gate', 47, 1, '2019-06-30 17:30:04', '2019-06-30 17:30:04'),
(18, 'Office-Peter', '12B', '13A', 'Salmiya', '14, 13Z', 'Near Marina Mall', 'No Notes', 47, 1, '2019-06-30 17:30:37', '2019-06-30 17:30:37');

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
(38, '4711334466SWNHb3VpdkxXT1Zwc09hQVlBbTdSam1iY0FjclJoSkFJaGVmeUZlY3Yza1NHMkQxUjE=5d11e76430606', 47, 1, '2019-06-25 19:20:36', '2019-06-25 19:20:36'),
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
(83, '4888663456ejE4aklzYWpndmplZEZiT05Va2RsUHJ6MDl6eWdPTFNyRzRPQVdJck9VYkRsaEltVjc=5d18689c1114e', 48, 1, '2019-06-30 17:45:32', '2019-06-30 17:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
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
(1, 'Gift', NULL, NULL, NULL, 1, '2019-06-11 21:00:00', '2019-06-18 21:00:00'),
(2, 'Food', NULL, NULL, NULL, 1, '2019-06-11 21:00:00', '2019-06-09 21:00:00'),
(3, 'Electronics', NULL, NULL, NULL, 1, '2019-06-23 21:00:00', '2019-06-18 21:00:00');

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
(32, 40, 2, 1, '2019-06-30 07:31:39', '2019-06-30 07:31:39');

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
(1, 10, '2019-06-13 11:40:40', '2019-06-13 11:40:40');

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
  `player_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `password`, `mobile`, `phone`, `description`, `rating`, `image`, `player_id`, `otp`, `country_id`, `status`, `approved`, `created_at`, `updated_at`) VALUES
(8, 'Fedex', 'fedex@gmail.com', '$2y$10$xTrFsSRfC0MPnTN3/l1rte.3GO85XBECj3HF2dEYpgaQMTLR8VjZO', '11443322', NULL, NULL, 0, 'company_image_1560331455.png', NULL, '62853', 1, 1, 1, '2019-06-12 09:24:15', '2019-06-27 12:54:44'),
(9, 'DHL', 'info@dhl.com', 'qqqqqq', '88554433', NULL, NULL, 0, 'company_image_1557746290.png', NULL, NULL, 1, 1, 1, '2019-06-25 09:52:32', '2019-06-25 09:52:32');

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
(44, 'Address deleted successfully', 'delete_address_success', 'Address deleted successfully', 'تم حذف العنوان بنجاح\r\n', 1, NULL, NULL);

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
(14, 47, 'f6f91bfb-e63a-4854-a900-db8de31d08ac', 2, '2019-06-25 17:23:42', '2019-06-25 17:23:42'),
(15, 49, '124987655838376490473s', 2, '2019-06-25 17:40:24', '2019-06-25 17:40:24'),
(16, 47, '0752b6b8-6db5-49a7-9ef2-aec6e31b681c', 2, '2019-06-25 19:20:07', '2019-06-25 19:20:07');

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
(1, 8, 0, 0, 0, 1, '2019-06-25 07:30:40', '2019-06-25 07:30:40');

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
(19, '77332211', '97634', '2019-06-25 17:40:24', '2019-06-25 17:40:24'),
(17, '88663456', '46203', '2019-06-25 00:59:02', '2019-06-30 17:45:26'),
(18, '11334466', '57819', '2019-06-25 01:07:44', '2019-06-25 19:20:07');

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
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `view_status`, `add_status`, `edit_status`, `delete_status`, `analytics_status`, `notifications_status`, `countries_status`, `polls_status`, `categories_status`, `appusers_status`, `settings_status`, `webmaster_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Webmaster', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54'),
(2, 'Website Manager', 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54');

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
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `player_id` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `fullname`, `email`, `password`, `original_password`, `mobile`, `image`, `status`, `remember_token`, `country_id`, `address`, `location`, `phone`, `player_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(47, 'Peter samuel', 'peter@tyu.com', '', '', '11334466', 'user_image_1561389671.png', 1, NULL, 1, NULL, NULL, NULL, NULL, '2019-06-25 00:58:40', '2019-06-25 01:22:24', NULL),
(48, NULL, '', '', '', '88663456', NULL, 1, NULL, 4, NULL, NULL, NULL, NULL, '2019-06-25 00:59:02', '2019-06-25 00:59:02', NULL),
(49, NULL, '', '', '', '77332211', NULL, 1, NULL, 4, NULL, NULL, NULL, NULL, '2019-06-25 17:40:24', '2019-06-25 17:40:24', NULL);

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
('1', 'http://localhost/internal/aaraa/public', 'Poll Survey App', 'استطلاع التطبيق المسح', 2, 5, '1.4', '1.4', 0, 'الخدمة غير متوفرة في هذه اللحظة. أعود بعد وقت ما', 'Service unavailable at this moment. Come back after sometime', '1', '1', '2017-03-06 11:06:23', '2019-06-24 14:00:23');

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
  `pickup_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL COMMENT '1 - Pending, 2- Accepted, 3- picked Up, 4 - Delivered',
  `payment_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '1- Knet, 2- Wallet, 3- COD',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `name`, `description`, `image`, `price`, `address_from_id`, `address_to_id`, `user_id`, `company_id`, `pickup_time`, `status`, `payment_type`, `created_at`, `updated_at`) VALUES
(24, NULL, NULL, NULL, 10, 5, 6, 48, 8, '1', 2, '1', '2019-06-25 17:27:03', '2019-06-25 07:30:06'),
(29, NULL, NULL, NULL, 10, 5, 6, 48, NULL, '1', 1, '1', '2019-06-25 18:11:09', '2019-06-25 18:11:09'),
(33, NULL, NULL, NULL, 10, 5, 6, 48, NULL, '1', 1, '1', '2019-06-26 16:46:26', '2019-06-26 16:46:26'),
(38, NULL, NULL, NULL, 10, 17, 18, 47, NULL, '1', 1, '1', '2019-06-30 17:31:03', '2019-06-30 17:31:03'),
(39, NULL, NULL, NULL, 10, 18, 17, 47, NULL, '1', 1, '1', '2019-06-30 17:31:28', '2019-06-30 17:31:28'),
(40, NULL, NULL, NULL, 10, 18, 17, 47, 8, '1', 2, '1', '2019-06-30 17:31:39', '2019-06-30 07:32:01');

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
('1', 'admin', 'mjhosawa@vavisa-kw.com', '$2y$10$vCYpyjX68hKYbzsAUZS4vuLCodSrXukCOHorulIwREO70hNgv6J5q', NULL, 1, 1, 'AeYAHkotjdHEssWQ1be3u23ym04KzJXXEDEssm29t9TfR3tBqrU6EZ0eYC9l', '1', NULL, '2017-11-08 13:25:54', '2017-11-08 13:25:54');

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
(1, 50, 2, '2019-05-16 11:46:14', '2019-05-16 11:46:14'),
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
-- Dumping data for table `webmaster_settings`
--

INSERT INTO `webmaster_settings` (`id`, `ar_box_status`, `en_box_status`, `analytics_status`, `polls_status`, `categories_status`, `appusers_status`, `countries_status`, `notifications_status`, `settings_status`, `default_currency_id`, `languages_count`, `header_menu_id`, `footer_menu_id`, `links_status`, `register_status`, `permission_group`, `api_status`, `api_key`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 2, 1, 2, 0, 0, 3, 1, '571775002564288', 1, 1, '2017-11-08 13:25:54', '2017-11-09 18:55:04');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_shipment`
--
ALTER TABLE `category_shipment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `free_deliveries`
--
ALTER TABLE `free_deliveries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `knet_payments`
--
ALTER TABLE `knet_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_management`
--
ALTER TABLE `language_management`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
-- AUTO_INCREMENT for table `notification_specific_user`
--
ALTER TABLE `notification_specific_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `one_signal_company_users`
--
ALTER TABLE `one_signal_company_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `one_signal_users`
--
ALTER TABLE `one_signal_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `versions`
--
ALTER TABLE `versions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet_offers`
--
ALTER TABLE `wallet_offers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
