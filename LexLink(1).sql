-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2025 at 01:13 PM
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
(2, 'completed', 1, 'Sheikh Ali', 'ali@gmail.com', 'R 43 Pioneer Park City Gulistan E Johar', '2025-09-04 12:30:00', 'Need some help to discus about criminal acts\r\n', 1),
(3, 'rejected', 3, 'Itachi', 'itachi@gmail.com', 'R 43 Pioneer Park City Gulistan E Johar', '2025-10-12 11:20:00', 'need some help', 6),
(4, 'completed', 3, 'Itachi', 'itachi@gmail.com', 'R 43 Pioneer Park City Gulistan E Johar', '2025-10-12 12:40:00', 'need some info related to my employees', 7),
(5, 'cancelled', 1, 'Sheikh Ali', 'ali@gmail.com', 'R 43 Pioneer Park City', '2025-08-30 12:12:00', 'need some help in car acident', 12),
(6, 'rejected', 4, 'Areeb', 'areeb@gmail.com', 'jauhar', '2025-02-16 22:00:00', 'good', 6),
(7, 'pending', 5, 'Tayyab', 'tayyab@gmail.com', 'fkdjfck', '2025-08-11 12:00:00', 'kdsjckjhcj', 1);

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
(10, 'Los Angeles'),
(11, 'Italy'),
(12, 'Seoul Korea');

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
(1, 'David Bombal', 'david@gmail.com', '$2y$10$1NKtY35jFgdABVVXTS2saOQb2f7pmyWQ7FFivpSp4asB3uAa.TNkS', 'david@gmail.com.jpg', 'david@gmail.com.pdf', 1, 1, 'lawyer', 'active', 1, '2025-08-24 19:12:35', '2025-08-25 11:20:37'),
(2, 'Sarah Kim', 'sarah@gmail.com', '$2y$10$0kxKq2j6M/eRau3xr.P0KeiUuvqvFVHLt5HCyHRHvJg4uFO/pcEce', 'sarah@gmail.com.jpg', 'sarah@gmail.com.pdf', 2, 2, 'lawyer', 'active', 1, '2025-08-24 19:33:04', '2025-08-25 11:19:28'),
(3, 'John Wick', 'johnwick@gmail.com', '$2y$10$fU.qxsCNvds08eGOFj4ile0RsQYbRB.oQzLUembzPESsF0x/RxV8q', 'john@gmail.com.jpg', 'john@gmail.com.pdf', 3, 3, 'lawyer', 'active', 1, '2025-08-24 19:52:26', '2025-08-26 07:11:28'),
(4, 'Emily Watson', 'emily@gmail.com', '$2y$10$AP12VKHiW7noO2iBn6bk..iLOlupwz3locO2ugjd/ugkR2khuoyTa', 'emily@gmail.com.jpg', 'emily@gmail.com.pdf', 4, 4, 'lawyer', 'active', 1, '2025-08-24 20:27:46', '2025-08-26 07:12:18'),
(5, 'Usman Khan', 'usman@gmail.com', '$2y$10$RqCf6zIi/Ixr.agMucFcZulWe7j2r7Lq/unWgjrG7zlpHBXbQV/v2', 'usman@gmail.com.jpg', 'usman@gmail.com.pdf', 5, 5, 'lawyer', 'active', 1, '2025-08-24 20:31:45', '2025-08-26 07:13:21'),
(6, 'Vincenzo Casano', 'vincenzocasano@gmail.com', '$2y$10$80JVnk/7xynpzoKU5D1z3OmBeKp70DtfVx04nM3RbUcMH3RP/S6Nq', 'vincenzocasano@gmail.com.jpeg', 'vincenzo@gmail.com.pdf', 6, 4, 'lawyer', 'active', 1, '2025-08-25 11:39:48', '2025-08-26 10:35:09'),
(7, 'Futaba', 'futaba@gmail.com', '$2y$10$hoNUdjosTgP0Iwy8p4Tma.YwEojM/WMDkVYUyUxegEbKe3h64dYM2', 'futaba@gmail.com.jpg', 'futaba@gmail.com.pdf', 7, 3, 'lawyer', 'active', 0, '2025-08-25 11:56:11', '2025-08-26 08:10:52'),
(8, 'Park Hoon', 'parkhoon@gmail.com', '$2y$10$zrlPyILemKmx.fu2fA/fyOxXY7R5mLo6ihJgBazQRdJkQz9wR8mA.', 'parkhoon@gmail.com.jpg', 'parkhoon@gmail.com.pdf', 9, 12, 'lawyer', 'active', 0, '2025-08-25 15:05:59', '2025-08-26 08:33:57'),
(9, 'Thomas', 'thomas@gmail.com', '$2y$10$3TFjD3INJ4WQq9kAfVx1I.YJYDQ3RthZ95n.cgXvox31irwPyl7Y6', 'thomas@gmail.com.jpeg', 'thomas@gmail.com.pdf', 9, 10, 'lawyer', 'pending', 0, '2025-08-25 15:17:01', '2025-08-25 15:17:01'),
(10, 'Maria Rose', 'maria@gmail.com', '$2y$10$aZmQPv5O9xk2GuE4FQNMteB/m9tpZDdOfHFUcHtT7fk.rJFnkD7L.', 'maria@gmail.com.jpeg', 'maria@gmail.com.pdf', 8, 10, 'lawyer', 'active', 0, '2025-08-25 15:21:29', '2025-08-26 08:10:11'),
(11, 'Kevin', 'kevin@gmail.com', '$2y$10$sGpGYnoZaso8QemQ7Or9nuWAw.gLtOcQh5RVEf3acDEELjyzjoEiq', 'kevin@gmail.com.jpeg', 'kevin@gmail.com.pdf', 8, 8, 'lawyer', 'active', 0, '2025-08-25 16:06:23', '2025-08-26 08:09:55'),
(12, 'Jin Ha', 'jinha@gmail.com', '$2y$10$mi93b8MNP8XHfVlKDvSTEemIRxUgQFlJHK/Xz7LMP5KmBNnzLGRT.', 'jinha@gmail.com.jpg', 'jinha@gmail.com.pdf', 6, 12, 'lawyer', 'active', 0, '2025-08-25 17:06:09', '2025-08-26 08:09:40'),
(13, 'Jack Brown', 'jack@gmail.com', '$2y$10$qQruemHFwOCPomFvjRW6DOI2WMZyeWYpxpoc7yXN3WTFzbOiKEiQ2', 'jack@gmail.com.jpeg', 'jack@gmail.com.pdf', 8, 10, 'lawyer', 'active', 0, '2025-08-25 17:09:01', '2025-08-26 10:36:59'),
(14, 'Emma', 'emma@gmail.com', '$2y$10$PUxoE3pTryoFGYQ6HYhJ9O/gglI1poHPlLX4t0mXBVSxyiVJayNQq', 'emma@gmail.com.jpeg', 'emma@gmail.com.pdf', 4, 10, 'lawyer', 'active', 0, '2025-08-26 08:18:53', '2025-08-26 08:19:46');

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
(2, 'Kataki', 'kataki@gmail.com', '$2y$10$lv3UGk.8eFXMNx0gWa6CwudRDVS9j9zzLQEj.nhxXeJP.SuHo2aIm', '2025-08-25 00:40:59', '2025-08-25 00:40:59', 'user'),
(3, 'Itachi', 'itachi@gmail.com', '$2y$10$0u.UBusBVCSH3UCVMxZcaOKrA/scYyEDXjvu6KXEaRwzTkv9lRzDO', '2025-08-25 19:48:50', '2025-08-25 19:48:50', 'user'),
(4, 'Areeb', 'areeb@gmail.com', '$2y$10$wmqCW/harAY8n1SW0YdobeJdlUbFwE400dJ.CBtsOsSePX6wzKETe', '2025-08-26 15:21:12', '2025-08-26 15:21:12', 'user'),
(5, 'Tayyab', 'tayyab@gmail.com', '$2y$10$hAUQj9.SbkpIkTf2vaLYVO36BDraexS2DIQW2qHyHwF31IeLsRRU2', '2025-08-26 15:55:07', '2025-08-26 15:55:07', 'user');

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
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complainer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `lawyer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
