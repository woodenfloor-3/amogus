-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 03:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`, `image_path`) VALUES
(1, 'MCA', 'MCA FORUM', '2022-05-25 08:52:14', ''),
(2, 'MMS', 'MMS FORUM', '2022-05-25 08:54:22', ''),
(3, 'NIL TEACHING SESSION', 'THIS IS WHERE NILADRI SAHA TEACHES THE STUDENTS', '2023-03-15 13:09:12', ''),
(4, 'ARIF TEACHING ', 'TEACHER', '2023-03-15 13:10:13', ''),
(5, 'dd', 'aaa', '0000-00-00 00:00:00', ''),
(6, 'htis testsd', 'dasdas', '0000-00-00 00:00:00', ''),
(8, 'Category Name', 'Category Description', '0000-00-00 00:00:00', '/uploads/'),
(29, 'y', 'y', '0000-00-00 00:00:00', ''),
(30, 'sas', 'as', '0000-00-00 00:00:00', ''),
(32, 'ss', 'asd', '0000-00-00 00:00:00', 'uploads/Untitled.png'),
(33, 'new img ', 'sess', '0000-00-00 00:00:00', 'uploads/Screenshot_2022.10.21_20.56.54.680.png'),
(34, 'arknights', 'arknights', '0000-00-00 00:00:00', 'uploads/Screenshot_2022.11.06_14.44.57.970.png'),
(35, 'essex', 'best shipfu', '0000-00-00 00:00:00', 'uploads/ess_azurlane230209.gif'),
(36, 'gi', 'dehya', '0000-00-00 00:00:00', 'uploads/dhy_genshin230301.gif'),
(37, 'arknights', 'suzuran', '0000-00-00 00:00:00', 'uploads/szr_arknights230306.gif'),
(38, 'ss', 'ganyu', '2023-03-19 18:14:57', 'uploads/99d43befb3df2d6293974cfc7313d7e0.gif'),
(39, 'ss', 'ganyu', '2023-03-19 18:16:23', 'uploads/99d43befb3df2d6293974cfc7313d7e0.gif'),
(40, 'gggg', 'ggg', '2023-03-19 18:19:55', 'uploads/pwrgzplk5ad71.gif');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_time` datetime NOT NULL,
  `comment_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES
(1, 'Hello\r\nThis is Comment', 1, '2022-05-30 07:37:43', 28),
(22, 'jQuery is a library', 104, '2022-06-19 15:11:34', 44),
(23, 'jQuery is a library not a framework', 104, '2022-06-19 15:12:37', 44),
(24, 'answer bta to bs\r\n', 106, '2022-06-20 10:22:23', 44),
(25, 'answer bta to bs\r\n', 106, '2022-06-20 10:33:34', 44),
(26, '&lt;alert&gt;Hello&lt;/alert&gt;', 106, '2022-06-20 11:18:54', 47);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to use Python in MAC OS', 'Hello\r\nI have MAC Book and want to learn Python but the problem is, My laptop shows an error when I tried to execute the programs.', 1, 28, '2022-05-27 08:57:41'),
(10, 'demo for javascript', 'description', 2, 38, '2022-05-29 22:42:37'),
(94, 'this is question', 'description', 3, 45, '2022-06-19 10:17:35'),
(105, 'testing', 'description', 2, 44, '2022-06-19 17:35:01'),
(108, 'Hello Help me', 'No', 1, 41, '2023-03-15 16:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `srn` int(8) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `timestamp` datetime NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`srn`, `user_email`, `user_password`, `timestamp`, `is_admin`) VALUES
(28, 'nbarshan2000@gmail.c', '$2y$10$aC95z1qOZ65re', '2022-06-03 07:50:05', 0),
(29, 'abc@aa.in', '$2y$10$I6nAR8AdCWb.H', '2022-06-03 08:01:41', 0),
(30, 'rohan@asl.ljk', '$2y$10$cx0HDJPh.0ma3', '2022-06-03 08:07:22', 0),
(31, 'exp@api.in', '$2y$10$Xp90Fndnxg2k8', '2022-06-03 11:23:10', 0),
(32, 'abc@gmail.com', '$2y$10$DRi0UCFQdnsyl', '2022-06-03 12:04:55', 0),
(33, 'am@gmail.com', '$2y$10$Zj6Sliz359/Ub', '2022-06-03 12:32:20', 0),
(34, 'hello@world.in', '123', '2022-06-03 12:41:36', 0),
(35, 'good@morning.in', 'jj', '2022-06-04 07:49:09', 0),
(38, 'neeraj@mail.in', '111', '2022-06-06 12:25:38', 0),
(40, 'good@night.in', '111', '2022-06-06 22:58:37', 0),
(41, 'rahul@com.com', '1234', '2022-06-06 23:18:49', 0),
(42, 'hello@mail.in', '111', '2022-06-11 22:57:18', 0),
(43, 'demo@abc.in', '111', '2022-06-12 15:16:48', 0),
(44, 'abc1234@gmail.com', '1234', '2022-06-18 10:53:01', 0),
(45, 'neeraj@abc.in', '111', '2022-06-19 10:16:28', 0),
(46, 'JAIRAMCM@GMAIL.COM', 'JAIRAM123', '2022-06-20 10:17:32', 0),
(47, 'neeraj', '111', '2022-06-20 10:34:11', 0),
(99, 'NIL', 'NIL', '2023-03-19 08:29:39', 0),
(100, 'admin', 'admin', '2023-03-19 14:24:08', 1),
(101, 'adduser', 'adduser', '2023-03-19 14:53:40', 0),
(102, 'woodenfloortestadmin', '123', '2023-03-19 14:59:33', 0),
(103, 'woodenfloorsdsadfas', '123', '2023-03-19 15:44:21', 0),
(104, 'woodenfloor', '123', '2023-03-19 18:09:20', 0),
(105, 'woodenfloorssada', '123', '2023-03-19 18:18:35', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`srn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `srn` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
