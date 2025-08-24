-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2025 at 11:05 PM
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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `appointment_status` enum('pending','accepted','rejected','completed','cancelled') DEFAULT 'pending',
  `booker_id` int(11) NOT NULL,
  `booker_name` varchar(100) DEFAULT NULL,
  `booker_email` varchar(255) DEFAULT NULL,
  `booker_address` varchar(255) DEFAULT NULL,
  `booker_schedule` datetime DEFAULT NULL,
  `booker_message` text DEFAULT NULL,
  `booked_lawyer` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `appointment_status`, `booker_id`, `booker_name`, `booker_email`, `booker_address`, `booker_schedule`, `booker_message`, `booked_lawyer`) VALUES
(1, 'cancelled', 1, 'Sheikh Ali', 'ali@gmail.com', 'R 43 Pioneer Park City', '2025-09-12 12:30:00', 'Need help in a criminal issuse', 1),
(2, 'accepted', 1, 'Sheikh Ali', 'ali@gmail.com', 'R 43 Pioneer Park City Gulistan E Johar', '2025-09-04 12:30:00', 'Need some help to discus about criminal acts\r\n', 1);

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
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'New York'),
(2, 'London'),
(3, 'Tokyo'),
(4, 'Paris'),
(5, 'Dubai'),
(6, 'Sydney'),
(7, 'Singapore'),
(8, 'Toronto'),
(9, 'Hong Kong'),
(10, 'Los Angeles');

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
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `lawyer_name` varchar(255) NOT NULL,
  `lawyer_email` varchar(255) NOT NULL,
  `lawyer_password` varchar(255) NOT NULL,
  `lawyer_picture` varchar(255) DEFAULT NULL,
  `lawyer_document` varchar(255) DEFAULT NULL,
  `lawyer_category` int(11) DEFAULT NULL,
  `lawyer_city` int(11) DEFAULT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'lawyer',
  `lawyer_status` enum('pending','active') DEFAULT 'pending',
  `is_lawyer_promoted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`lawyer_id`, `lawyer_name`, `lawyer_email`, `lawyer_password`, `lawyer_picture`, `lawyer_document`, `lawyer_category`, `lawyer_city`, `role`, `lawyer_status`, `is_lawyer_promoted`, `created_at`, `updated_at`) VALUES
(1, 'David Bombal', 'david@gmail.com', '$2y$10$o4GSySZ4O3U4BOffYankleILHffpuwJpbWouZukHCavQvIDJ1V7DC', 'david@gmail.com.jpg', 'david@gmail.com.pdf', 1, 1, 'lawyer', 'active', 1, '2025-08-24 19:12:35', '2025-08-24 19:14:33'),
(2, 'Sarah Kim', 'sarah@gmail.com', '$2y$10$uRjf4uLGHF15HsMRB4nVWeJHOJBFhvClvphxvwVt.FlIDPBR1uiDG', 'sarah@gmail.com.jpg', 'sarah@gmail.com.pdf', 2, 2, 'lawyer', 'active', 1, '2025-08-24 19:33:04', '2025-08-24 19:36:06'),
(3, 'John', 'john@gmail.com', '$2y$10$HPb0qslWSzdPBhwcLN.Af.3KtIGWq5CFy0z4kh1f/EC1H7Q0QLkTm', 'john@gmail.com.jpg', 'john@gmail.com.pdf', 3, 3, 'lawyer', 'active', 1, '2025-08-24 19:52:26', '2025-08-24 19:52:55'),
(4, 'Emily Watson', 'emily@gmail.com', '$2y$10$GOrY9sD6b3zaJAzA8hCWMOe6nCqaA24uGs/vL1k5mJPoLKZ7dudPm', 'emily@gmail.com.jpg', 'emily@gmail.com.pdf', 4, 4, 'lawyer', 'active', 1, '2025-08-24 20:27:46', '2025-08-24 20:29:49'),
(5, 'Usman', 'usman@gmail.com', '$2y$10$CjpD6hfzSj6rwLlk.Bpcs.fBi6WxvSRQud8UMB8alfZAjXK.z/zQS', 'usman@gmail.com.jpg', 'usman@gmail.com.pdf', 5, 5, 'lawyer', 'active', 1, '2025-08-24 20:31:45', '2025-08-24 20:32:21');

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
(1, 'Sheikh Ali', 'ali@gmail.com', '$2y$10$KAhcwyd/RL5gqppYz1Cj8eZk9ykHqNaBswqr9lh78T2TVPPITg742', '2025-08-25 00:06:31', '2025-08-25 00:06:31', 'user'),
(2, 'Kataki', 'kataki@gmail.com', '$2y$10$lv3UGk.8eFXMNx0gWa6CwudRDVS9j9zzLQEj.nhxXeJP.SuHo2aIm', '2025-08-25 00:40:59', '2025-08-25 00:40:59', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `booked_lawyer` (`booked_lawyer`),
  ADD KEY `fk_booker` (`booker_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

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
  ADD KEY `fk_lawyer_category` (`lawyer_category`),
  ADD KEY `fk_lawyer_city` (`lawyer_city`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complainer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `lawyer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`booked_lawyer`) REFERENCES `lawyers` (`lawyer_id`),
  ADD CONSTRAINT `fk_booker` FOREIGN KEY (`booker_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD CONSTRAINT `fk_lawyer_category` FOREIGN KEY (`lawyer_category`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lawyer_city` FOREIGN KEY (`lawyer_city`) REFERENCES `cities` (`city_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
