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
-- Database: `eavg_accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `image`, `name`, `email`, `password`, `user_type`, `date_registered`) VALUES
(1, 'profile1.png', 'admin', 'admin@gmail.com', '$2y$10$ExL/HP1r3YQGw91dGKF7POnFOILQWTktWMFyjS17F4jgDAlN2yOLa', 'admin', '2024-11-24 00:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `employee_accounts`
--

CREATE TABLE `employee_accounts` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`id`, `image`, `name`, `email`, `contact_number`, `password`, `user_type`, `date_registered`) VALUES
(1, 'profile1.png', 'employee', 'employee@gmail.com', '09233472871', '$2y$10$ExL/HP1r3YQGw91dGKF7POnFOILQWTktWMFyjS17F4jgDAlN2yOLa', 'employee', '2024-11-24 12:47:41'),
(2, 'profile1.png', 'employee1', 'employee1@gmail.com', '09233472871', '$2y$10$ExL/HP1r3YQGw91dGKF7POnFOILQWTktWMFyjS17F4jgDAlN2yOLa', 'employee', '2024-11-24 12:47:50'),
(3, 'profile2.png', 'test', 'test@gmail.com', '09233472871', '$2y$10$2zwrFmsPgn7AAnlp5e1ZxOaNIuBcZkdaMLSpKReJc117c/wdLB8Tq', 'employee', '2024-11-24 13:51:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
