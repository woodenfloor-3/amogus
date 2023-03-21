-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 05:01 PM
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
  `category_name` varchar(600) NOT NULL,
  `category_description` varchar(600) NOT NULL,
  `created` datetime NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`, `image_path`) VALUES
(43, 'hgcvcghf', 'rdfzx', '2023-03-20 12:46:22', 'uploads/userimage.png'),
(44, 'paimon as a food source', 'lumine on her way to use paimon as emergency food', '2023-03-21 20:08:29', 'uploads/1114887.jpg'),
(47, 'Ganyu Build', 'Ganyu has a general artifact set recommendation, which is the Wanderer\'s Troupe. However there are other options for her. In theory, you can mix and match any of these 3 artifact sets as long as you get 2 sets of 2 pieces.', '2023-03-21 20:49:12', 'uploads/1130246.jpg'),
(48, 'Hu tao', 'Hu Tao is a strong Pyro carry, capable of continuous Pyro application with her Elemental Skill. She does have a high risk, high reward gameplay so she does have her drawbacks, but overall, she\'s one of the top Pyro characters in the current meta.', '2023-03-21 20:49:52', 'uploads/1129086.png'),
(49, 'seseran gif', 'seseran \r\nhttps://twitter.com/Seseren_kr', '2023-03-21 20:52:16', 'uploads/szr_arknights230306.gif'),
(51, 'Dorothy\'s Vision', 'Dorothy\'s Vision expands the story of Rhine Lab for the first time, featuring the eponymous character conducting an ethically questionable science experiment that will soon go haywire and the behind-the-scenes actions among R.L.\'s superiors such as political involvement by the Columbian military.', '2023-03-21 21:16:23', 'uploads/425b8a851b6de1d32e54a8c55776fa7a.png');

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
(1, 'jyhgfcxj vnb', 117, '2023-03-20 12:48:05', 132),
(2, 'gc bhnm j', 117, '2023-03-20 12:48:29', 130),
(3, 'gc bhnm j', 117, '2023-03-20 12:49:37', 130);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_path`) VALUES
('announcements/1123013.jpg'),
('announcements/ganyu.jpg'),
('announcements/wp10165064.png'),
('announcements/wp7487214.jpg'),
('announcements/wp9660709.jpg'),
('announcements/wp9999057.jpg');

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
(118, 'based', 'based', 44, 1, '2023-03-21 21:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `srn` int(8) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `timestamp` datetime NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`srn`, `user_email`, `user_password`, `timestamp`, `is_admin`, `user_image`) VALUES
(1, 'woodenfloor', '123', '2023-03-20 09:53:04', 1, 'userimgs/userimage.png'),
(129, 'user1', '12345678', '2023-03-20 09:54:19', 0, 'userimgs/eula.png'),
(130, 'user2', '12345', '2023-03-20 09:54:31', 0, 'userimgs/ganyu.png'),
(131, 'user3', '1234fasg', '2023-03-20 09:55:00', 0, 'userimgs/keqing.png'),
(132, 'wow', '123', '2023-03-20 12:47:43', 0, 'userimgs/Screenshot 2022-04-11 001750.png');

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
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD UNIQUE KEY `image_path` (`image_path`);

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
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `srn` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
