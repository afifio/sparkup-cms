-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2017 at 02:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparkup`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `resource_id`, `type`, `action`, `user_id`, `message`, `create_date`) VALUES
(1, 1, 'page', 'added', 1, 'new page was added (Meet Our Team)', '2017-07-22 17:42:28'),
(2, 2, 'page', 'added', 1, 'new page was added (FAQ)', '2017-07-22 17:53:18'),
(3, 3, 'page', 'added', 1, 'new page was added (Some Page)', '2017-07-22 17:56:15'),
(4, 0, 'page', 'updated', 1, 'page was updated (Meet Our Team)', '2017-07-22 18:08:58'),
(5, 0, 'page', 'deleted', 1, 'A page was deleted', '2017-07-22 18:11:12'),
(6, 1, 'user', 'added', 1, 'new user was added (qwerty)', '2017-07-22 20:59:33'),
(7, 0, 'user', 'updated', 1, 'A user was updated (qwerty)', '2017-07-23 04:21:02'),
(8, 0, 'user', 'deleted', 1, 'A user was deleted (qwerty)', '2017-07-23 04:24:19'),
(9, 2, 'user', 'added', 1, 'new user was added (username)', '2017-07-23 04:25:17'),
(10, 4, 'page', 'added', 1, 'new page was added (Welcome)', '2017-07-23 05:55:42'),
(11, 0, 'page', 'updated', 1, 'page was updated (FAQ)', '2017-07-23 05:57:45'),
(12, 0, 'page', 'updated', 1, 'page was updated (Meet Our Team)', '2017-07-23 05:58:04'),
(13, 0, 'page', 'deleted', 2, 'A page was deleted', '2017-07-23 06:25:01'),
(14, 0, 'page', 'deleted', 2, 'A page was deleted', '2017-07-23 06:25:02'),
(15, 0, 'page', 'deleted', 2, 'A page was deleted', '2017-07-23 06:25:04'),
(16, 5, 'page', 'added', 2, 'new page was added (Meet Our Team)', '2017-07-23 06:25:23'),
(17, 6, 'page', 'added', 2, 'new page was added (FAQ)', '2017-07-23 06:26:19'),
(18, 7, 'page', 'added', 2, 'new page was added (Welcome)', '2017-07-23 06:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `body` text COLLATE utf8mb4_bin NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `in_menu` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `user_id`, `slug`, `title`, `body`, `is_published`, `is_featured`, `in_menu`, `order`, `create_date`) VALUES
(5, 1, 2, 'meet-our-team', 'Meet Our Team', 'meet our team', 1, 1, 1, 0, '2017-07-23 06:25:23'),
(6, 0, 2, 'faq', 'FAQ', 'faq faq faq', 1, 1, 1, 0, '2017-07-23 06:26:19'),
(7, 0, 2, 'welcome', 'Welcome', 'welcome to my website', 1, 1, 1, 0, '2017-07-23 06:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `create_date`) VALUES
(1, 'Company', '2017-07-22 16:43:27'),
(2, 'About', '2017-07-22 16:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `create_date`) VALUES
(2, 'username', 'username', 'username', 'oktavian.galang.p@gmail.com', '14c4b06b824ec593239362517f538b29', '2017-07-23 04:25:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
