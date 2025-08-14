-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2025 at 07:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LexLink`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Criminal Law'),
(2, 'Divorce Law'),
(3, 'Property Law'),
(4, 'Education Law'),
(5, 'Cyber Law'),
(6, 'Traffic Law'),
(7, 'Employment Law'),
(8, 'Business Law'),
(9, 'Affidavit Law'),
(10, 'Civil Law');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complainer_id` int(11) NOT NULL,
  `complainer_name` varchar(65) DEFAULT NULL,
  `complainer_email` varchar(65) DEFAULT NULL,
  `complain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `lawyer_id` int(11) NOT NULL,
  `lawyer_name` varchar(100) DEFAULT NULL,
  `lawyer_email` varchar(100) DEFAULT NULL,
  `lawyer_password` varchar(255) DEFAULT NULL,
  `lawyer_picture` varchar(255) DEFAULT NULL,
  `lawyer_category` int(11) DEFAULT NULL,
  `lawyer_status` varchar(100) NOT NULL DEFAULT '"pending"',
  `is_lawyer_promoted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(50) DEFAULT 'lawyer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`lawyer_id`, `lawyer_name`, `lawyer_email`, `lawyer_password`, `lawyer_picture`, `lawyer_category`, `lawyer_status`, `is_lawyer_promoted`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Ali Khan', 'ali@gmail.com', 'password1', 'ali@gmail.com.jpg', 1, 'active', 1, '2025-08-09 12:47:29', '2025-08-10 11:02:48', 'lawyer'),
(2, 'Sara Malik', 'sara@gmail.com', 'password2', 'sara@gmail.com.jpg', 2, 'active', 1, '2025-08-09 12:47:29', '2025-08-10 11:05:19', 'lawyer'),
(3, 'Ahmed Raza', 'ahmed@gmail.com', 'password3', 'ahmed@gmail.com.jpg', 3, 'active', 1, '2025-08-09 12:47:29', '2025-08-10 11:05:45', 'lawyer'),
(4, 'Nida Hussain', 'nida@gmail.com', 'password4', 'nida@gmail.com.jpg', 4, 'active', 1, '2025-08-09 12:47:29', '2025-08-10 11:06:22', 'lawyer'),
(5, 'Usman Shah', 'usman@gmail.com', 'password5', 'usman@gmail.com.jpg', 5, 'active', 1, '2025-08-09 12:47:29', '2025-08-10 11:06:57', 'lawyer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_created_at` datetime DEFAULT current_timestamp(),
  `user_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_created_at`, `user_updated_at`, `role`) VALUES
(1, 'Ali', 'ali@gmail.com', '$2y$10$RtlhQ.yPpLVcKq0v3v1UtOO6VWmwn7BT1TxKKXaDfzKVL4ntdi3p2', '2025-08-06 16:00:07', '2025-08-06 22:03:34', 'lawyer'),
(2, 'kataki uchiha', 'katakiuchiha@gmail.com', '$2y$10$q3LsqjwL/wGn/tekaaOP9OV2P/tOzXxet05SKxb./MaPhIjHb0xyu', '2025-08-06 17:58:51', '2025-08-06 17:58:51', 'user'),
(3, 'Sheikh Ali', 'Sheikhali@gmail.com', '$2y$10$6dgJQFOEYD/9.YMr87y5VO7W99FLQL9xGk7AyAlmqIdi8ZXXGDzSO', '2025-08-06 22:44:56', '2025-08-06 22:44:56', 'user'),
(4, 'Rayyan', 'rayyan@gmail.com', '$2y$10$qHhyhsZXzW2F9m83A3ST2OMIo4NmwF87w2KU/k1iyMKpofzdp.AYy', '2025-08-07 16:23:10', '2025-08-07 16:23:10', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complainer_id`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`lawyer_id`),
  ADD UNIQUE KEY `lawyer_email` (`lawyer_email`),
  ADD KEY `lawyer_category` (`lawyer_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complainer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `lawyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD CONSTRAINT `lawyers_ibfk_1` FOREIGN KEY (`lawyer_category`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
