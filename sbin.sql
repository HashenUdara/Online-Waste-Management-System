-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 05:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bin`
--

CREATE TABLE `bin` (
  `bin_no` int(255) NOT NULL,
  `bin_height` int(255) NOT NULL,
  `bin_status` int(255) NOT NULL,
  `actual_value` int(255) NOT NULL,
  `collected_date` date NOT NULL,
  `truck_no` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bin`
--

INSERT INTO `bin` (`bin_no`, `bin_height`, `bin_status`, `actual_value`, `collected_date`, `truck_no`) VALUES
(61, 500, 0, 0, '2023-05-12', 0),
(64, 1000, 0, 0, '2023-05-11', 0),
(73, 5000, 0, 0, '2023-05-11', 0),
(74, 56, 0, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE `truck` (
  `truck_no` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`truck_no`, `user_id`) VALUES
('', 1002),
('1', 1002),
('1000', 1002),
('1004', 1002),
('1005', 1002),
('111', 1025),
('1111', 1046),
('12', 1002),
('1234', 1002),
('3456', 1002),
('4582', 1002),
('5782', 1002),
('6', 1002),
('6000', 1003),
('9632', 1047),
('999', 1005),
('9999', 1002),
('LM - 2569', 1002),
('WD4444', 1048);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` int(255) NOT NULL DEFAULT 0,
  `tel` varchar(255) NOT NULL,
  `otp` int(255) NOT NULL DEFAULT 0,
  `approve_status` int(255) NOT NULL DEFAULT 0,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `user_type`, `status`, `tel`, `otp`, `approve_status`, `passwd`) VALUES
(1002, 'admin', 'a@g.com', 'admin', 1, '12232', 12, 1, '123'),
(1025, 'Kamal', 'kamal@gmail.com', 'user', 0, '754865213', 922283, 1, '78945'),
(1046, 'Lakshan', 'duruthuautomation9@gmail.com', 'user', 0, '123455', 527234, 1, 'azaz'),
(1047, 'Chanaka', 'chanaka@gmail.com', 'user', 0, '758963254', 589991, 1, '123456'),
(1048, 'Dharshana', 'dharshan@gail.com', 'collector', 0, '776325698', 484451, 0, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `userbin`
--

CREATE TABLE `userbin` (
  `user_id` int(255) NOT NULL,
  `bin_no` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bin`
--
ALTER TABLE `bin`
  ADD PRIMARY KEY (`bin_no`);

--
-- Indexes for table `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`truck_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bin`
--
ALTER TABLE `bin`
  MODIFY `bin_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1049;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
