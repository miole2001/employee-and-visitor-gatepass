-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2024 at 03:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eavg_logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activity` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `email`, `activity`, `user_type`, `timestamp`) VALUES
(1, 'admin@gmail.com', 'Login', 'admin', '2024-11-24 04:54:05'),
(2, 'admin@gmail.com', 'Logout', 'admin', '2024-11-24 04:54:15'),
(4, 'admin@gmail.com', 'Login', 'admin', '2024-11-24 06:52:42'),
(6, 'admin@gmail.com', 'Login', 'admin', '2024-11-24 07:32:44'),
(7, 'admin@gmail.com', 'Logout', 'admin', '2024-11-24 07:33:08'),
(9, 'admin@gmail.com', 'Login', 'admin', '2024-11-24 11:59:29'),
(10, 'admin@gmail.com', 'Logout', 'admin', '2024-11-24 14:07:24'),
(11, 'admin@gmail.com', 'Login', 'admin', '2024-11-24 14:07:39'),
(12, 'admin@gmail.com', 'Logout', 'admin', '2024-11-24 14:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `employee_logs`
--

CREATE TABLE `employee_logs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activity` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_logs`
--

INSERT INTO `employee_logs` (`id`, `email`, `activity`, `user_type`, `timestamp`) VALUES
(1, 'employee@gmail.com', 'Login', 'user', '2024-11-24 04:54:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_logs`
--
ALTER TABLE `employee_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_logs`
--
ALTER TABLE `employee_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
