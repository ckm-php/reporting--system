-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2022 at 06:41 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `township` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(350) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `report_details` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `user_id`, `date`, `report_details`, `created_date`, `updated_date`) VALUES
(2, 1, '2022-02-14', 'zz', '2022-02-01 07:00:46', '2022-02-01 10:47:47'),
(3, 1, '2022-02-03', 'a', '2022-02-01 08:35:42', '2022-02-01 08:35:42'),
(4, 1, '2022-02-04', 'b', '2022-02-01 08:35:59', '2022-02-01 08:35:59'),
(9, 1, '2022-02-09', 'g', '2022-02-01 08:37:06', '2022-02-01 08:37:06'),
(10, 1, '2022-02-10', 'h', '2022-02-01 08:37:15', '2022-02-01 08:37:15'),
(11, 1, '2022-02-11', 'i', '2022-02-01 08:37:27', '2022-02-01 08:37:27'),
(13, 1, '2027-10-14', 'ccccccccc', '2022-02-01 09:54:13', '2022-03-07 03:12:50'),
(15, 1, '2022-11-17', 'e', '2022-02-01 09:54:43', '2022-02-01 09:54:43'),
(16, 1, '2022-08-17', 'f', '2022-02-01 09:54:57', '2022-02-01 09:54:57'),
(17, 1, '2024-11-10', 'j', '2022-02-01 09:55:12', '2022-02-01 09:55:12'),
(18, 1, '2022-05-12', 'k', '2022-02-01 09:55:26', '2022-02-01 09:55:26'),
(19, 5, '2022-02-11', 'aaa', '2022-02-01 16:44:15', '2022-02-01 16:44:15'),
(20, 7, '2022-02-01', 'Today report\r\nEccube', '2022-02-16 02:05:34', '2022-02-16 02:07:30'),
(21, 1, '2022-03-01', 'a\r\nb', '2022-03-06 21:46:35', '2022-03-06 21:46:35'),
(22, 1, '2022-03-06', 'Hello\r\nNice to meet u', '2022-03-06 21:53:24', '2022-03-06 21:53:24'),
(23, 1, '2022-03-06', 'Hello\r\nHi', '2022-03-06 21:54:01', '2022-03-06 21:54:01'),
(25, 1, '2022-03-18', 'G\r\nB', '2022-03-06 22:07:38', '2022-03-06 22:07:38'),
(26, 1, '2022-03-31', 'Hello\r\nWorld', '2022-03-06 22:51:58', '2022-03-06 22:51:58'),
(27, 1, '2022-03-25', 'Happy\r\nBirthday', '2022-03-06 22:54:00', '2022-03-06 22:54:00'),
(28, 1, '2022-03-10', 'ohayou\r\nnihon', '2022-03-06 22:55:53', '2022-03-06 22:55:53'),
(29, 1, '2022-03-17', 'have\r\na\r\nnice\r\nday', '2022-03-06 22:57:20', '2022-03-06 22:57:20'),
(30, 2, '2022-03-01', 'BOBBY', '2022-03-07 03:18:28', '2022-03-07 03:18:28'),
(31, 2, '2022-03-09', 'bobby', '2022-03-07 03:22:00', '2022-03-07 03:28:14'),
(32, 2, '2022-03-02', '&lt;b&gt;12345&lt;/b&gt;', '2022-03-07 03:34:49', '2022-03-07 03:36:31'),
(33, 2, '2022-03-01', '<b>ABCD<b> <br/> 12345', '2022-03-07 03:35:46', '2022-03-07 03:35:46'),
(34, 1, '2022-03-01', '(1) report\r\n(2) jp\r\n(3) eng', '2022-03-07 04:54:07', '2022-03-07 04:54:07'),
(35, 1, '2022-03-11', 'aa\r\nddd\r\nggg', '2022-03-07 05:06:15', '2022-03-07 05:06:15'),
(36, 1, '2022-03-07', '(1)\r\na\r\nb\r\n', '2022-03-07 05:10:01', '2022-03-07 05:10:01'),
(37, 1, '2022-03-02', 'm\r\na\r\ny', '2022-03-07 05:15:12', '2022-03-07 05:15:12'),
(39, 1, '2022-03-12', 's<br />a<br />w<br /><br />n<br />a<br />n', '2022-03-07 05:23:28', '2022-03-07 05:23:28'),
(40, 1, '2022-03-08', '(1)test<br />(2)pjj<br />3)case', '2022-03-07 05:24:20', '2022-03-07 05:27:10'),
(41, 1, '2022-03-04', 'a<br />b<br />c', '2022-03-07 05:27:26', '2022-03-07 05:27:26'),
(42, 1, '2022-03-01', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbabbbaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-03-07 05:27:59', '2022-03-07 05:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `status`, `created_date`, `updated_date`) VALUES
(1, 'wady', 'wady@gmail.com', '$2y$10$iUtCNyh2y/TDmgL/iR2ZHuYGEyOBRIQh3GAnvq/wzDiI.hko2nTRS', 'admin', 'active', '2022-02-01 05:34:51', '2022-02-01 05:34:51'),
(2, 'bobby', 'bobby@gmail.com', '$2y$10$CPusK.Lzzm1aM.EAQKkHIuNJ3LKOUXrec39dhcU07aHzFbEELIqyq', 'user', 'active', '2022-02-01 05:39:42', '2022-02-01 05:39:42'),
(3, 'kento', 'kento@gmail.com', '$2y$10$xnvre/i5VZRsJT7I.x7oTOgP4sdudRDlmayi6B4RZF61UjzmbNm3C', 'user', 'deactivate', '2022-02-01 16:27:12', '2022-02-01 16:27:12'),
(4, 'test', 'test@gmail.com', '$2y$10$7hnaBHiDLzZ/izL/ZPTy.uZLVoam2cPoEf.JVRfVAcUaimLs4xlDO', 'user', 'deactivate', '2022-02-01 16:38:16', '2022-02-01 16:38:16'),
(5, 'admin', 'admin@gmail.com', '$2y$10$yJjdPBy2AeBEzB/KIEf2Ruc0jAUm0y.rdp0ze4yEZgLha.dnrOCFS', 'admin', 'active', '2022-02-01 16:43:54', '2022-02-01 16:43:54'),
(7, 'marry', 'marry@gmail.com', '$2y$10$PQzu632E4aO78C5QOWzlgOeH2eB8rEnqtIocqobpyEtx15Dxna7Ny', 'user', 'deactivate', '2022-02-16 02:01:10', '2022-03-08 09:17:59'),
(8, 'user', 'user@gmail.com', '$2y$10$wX24TY5ke7zOfozQ4lz4QOHgzS.aXEzlBqgK9AxfUKx8dvVvcJipy', 'user', 'active', '2022-02-16 02:14:28', '2022-02-16 02:14:28'),
(9, 'momo', 'momo@gmail.com', '$2y$10$iUtCNyh2y/TDmgL/iR2ZHuYGEyOBRIQh3GAnvq/wzDiI.hko2nTRS', 'admin', 'active', '2022-02-01 05:34:51', '2022-02-01 05:34:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
