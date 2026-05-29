-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2026 at 02:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `online_users`
--

CREATE TABLE `online_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_users`
--

INSERT INTO `online_users` (`id`, `full_name`, `last_activity`) VALUES
(59, '', '2026-04-03 13:24:13'),
(60, '', '2026-04-03 13:24:26'),
(61, '', '2026-04-03 13:24:56'),
(62, '', '2026-04-03 13:25:26'),
(63, '', '2026-04-03 13:25:56'),
(64, '', '2026-04-03 13:26:26'),
(65, '', '2026-04-03 13:26:56'),
(66, '', '2026-04-03 13:27:26'),
(67, '', '2026-04-03 13:27:56'),
(68, '', '2026-04-03 13:28:30'),
(69, '', '2026-04-03 13:28:56'),
(70, '', '2026-04-03 13:29:26'),
(71, '', '2026-04-03 13:29:56'),
(72, '', '2026-04-03 13:30:26'),
(73, '', '2026-04-03 13:31:27'),
(74, '', '2026-04-03 13:32:28'),
(75, '', '2026-04-03 13:33:03'),
(76, '', '2026-04-03 13:33:06'),
(77, '', '2026-04-03 13:33:27'),
(78, '', '2026-04-03 13:33:57'),
(79, '', '2026-04-03 13:34:27'),
(80, '', '2026-04-03 13:34:57'),
(81, '', '2026-04-03 13:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `user_id`, `amount`, `type`, `category`, `date`, `notes`) VALUES
(1, 2, 500.00, 'expense', 'sales', '2026-04-01', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `type` enum('income','expense') DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `title`, `category`, `amount`, `type`, `created_at`) VALUES
(2, 2, 'none', 'none', 900.00, 'income', '2026-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `role`, `status`, `created_at`) VALUES
(2, 'arpit', 'ak@gmail.com', 'Admin', 'Active', '2026-04-02 07:56:18'),
(5, 'Pant', 'none@gmail.com', 'Analyst', 'Active', '2026-04-03 03:17:37'),
(8, 'Guest', 'Guest@gmail.com', 'Analyst', 'Active', '2026-04-04 09:03:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `online_users`
--
ALTER TABLE `online_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `online_users`
--
ALTER TABLE `online_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
