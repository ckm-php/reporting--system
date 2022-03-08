-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2022 at 09:39 AM
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
(12, 2, '2022-02-23', 'Hello', '2022-02-01 09:11:29', '2022-02-01 09:11:29'),
(13, 1, '2027-10-14', 'c', '2022-02-01 09:54:13', '2022-02-01 09:54:13'),
(14, 1, '2022-03-04', 'd', '2022-02-01 09:54:31', '2022-02-01 09:54:31'),
(15, 1, '2022-11-17', 'e', '2022-02-01 09:54:43', '2022-02-01 09:54:43'),
(16, 1, '2022-08-17', 'f', '2022-02-01 09:54:57', '2022-02-01 09:54:57'),
(17, 1, '2024-11-10', 'j', '2022-02-01 09:55:12', '2022-02-01 09:55:12'),
(18, 1, '2022-05-12', 'k', '2022-02-01 09:55:26', '2022-02-01 09:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_date`, `updated_date`) VALUES
(1, 'wady', 'wady@gmail.com', '$2y$10$iUtCNyh2y/TDmgL/iR2ZHuYGEyOBRIQh3GAnvq/wzDiI.hko2nTRS', '2022-02-01 05:34:51', '2022-02-01 05:34:51'),
(2, 'bobby', 'bobby@gmail.com', '$2y$10$CPusK.Lzzm1aM.EAQKkHIuNJ3LKOUXrec39dhcU07aHzFbEELIqyq', '2022-02-01 05:39:42', '2022-02-01 05:39:42');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
