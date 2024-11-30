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
-- Database: `eavg_gatepass`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_gatepass`
--

CREATE TABLE `employee_gatepass` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(80) NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `employee_number` varchar(20) NOT NULL,
  `date_log` date NOT NULL,
  `time_log` time NOT NULL,
  `department` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_gatepass`
--

INSERT INTO `employee_gatepass` (`id`, `employee_name`, `employee_email`, `employee_number`, `date_log`, `time_log`, `department`, `type`) VALUES
(2, 'employee', 'employee@gmail.com', '09233472871', '2024-11-24', '21:55:00', 'HR', 'Enter');

-- --------------------------------------------------------

--
-- Table structure for table `guest_gatepass`
--

CREATE TABLE `guest_gatepass` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(80) NOT NULL,
  `guest_email` varchar(100) NOT NULL,
  `guest_number` varchar(20) NOT NULL,
  `date_log` date NOT NULL,
  `time_log` time NOT NULL,
  `department` varchar(40) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_gatepass`
--

INSERT INTO `guest_gatepass` (`id`, `guest_name`, `guest_email`, `guest_number`, `date_log`, `time_log`, `department`, `type`) VALUES
(1, 'guest', 'guest@gmail.com', '092387461', '2024-11-27', '22:08:00', 'IT', 'Enter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_gatepass`
--
ALTER TABLE `employee_gatepass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_gatepass`
--
ALTER TABLE `guest_gatepass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_gatepass`
--
ALTER TABLE `employee_gatepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guest_gatepass`
--
ALTER TABLE `guest_gatepass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
