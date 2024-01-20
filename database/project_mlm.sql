-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2024 at 09:44 PM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashifraz_mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `income_history`
--

CREATE TABLE `income_history` (
  `srno` int(10) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `amt` float NOT NULL,
  `desp` varchar(100) NOT NULL,
  `datee` varchar(255) NOT NULL,
  `dtime` varchar(255) NOT NULL,
  `cr_dr` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income_history`
--

INSERT INTO `income_history` (`srno`, `user_id`, `amt`, `desp`, `datee`, `dtime`, `cr_dr`) VALUES
(590, '730478', 400, 'Level Income', '2024-01-20', '15:24:09', 0),
(591, '119896', 300, 'Level Income', '2024-01-20', '15:24:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pair_count`
--

CREATE TABLE `pair_count` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `no_of_pair` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pair_count`
--

INSERT INTO `pair_count` (`id`, `user_id`, `date`, `no_of_pair`, `status`) VALUES
(31, 119896, '2024-01-20', 1, 0),
(32, 119896, '2024-01-20', 1, 0),
(33, 730478, '2024-01-20', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `trans_status` varchar(255) NOT NULL,
  `trans_amt` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `trans_id` varchar(255) NOT NULL,
  `trans_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `pin_value` bigint(10) NOT NULL,
  `allcote_user` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pin_transfer_history`
--

CREATE TABLE `pin_transfer_history` (
  `sr_no` int(10) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `pin_count` int(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `panno` varchar(100) NOT NULL,
  `aadharno` varchar(1000) NOT NULL,
  `position` tinyint(1) NOT NULL DEFAULT 0,
  `sponsor_id` int(10) NOT NULL,
  `left_count` int(10) NOT NULL,
  `right_count` int(10) NOT NULL,
  `placement_id` int(10) NOT NULL,
  `right_side` int(10) DEFAULT NULL,
  `left_side` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_status` int(2) NOT NULL,
  `member_type` int(11) NOT NULL,
  `registration_date` date NOT NULL,
  `id_card` int(2) NOT NULL,
  `id_img` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL,
  `account_no` int(30) DEFAULT NULL,
  `ifsc` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `name`, `password`, `mobile`, `dob`, `gender`, `address`, `panno`, `aadharno`, `position`, `sponsor_id`, `left_count`, `right_count`, `placement_id`, `right_side`, `left_side`, `status`, `user_status`, `member_type`, `registration_date`, `id_card`, `id_img`, `bank_name`, `account_holder`, `account_no`, `ifsc`, `branch`) VALUES
(1, 119896, 'example@gmail.com', 'Ashif', '7c4a8d09ca3762af61e59520943dc26494f8941b', '8596478485', '1999-01-05', 1, 'fhdfhdgjhdgjd', 'DUMMY0000A', '123456789101', 0, 0, 3, 1, 0, 497447, 730478, 0, 1, 1, '2020-09-12', 0, 'image/download11.png', NULL, NULL, NULL, NULL, NULL),
(105, 497447, 'boosterseo691@gmail.com', 'Muskan', 'b47d926911d4e6b8201f801a151f5b82d513cf09', '9687964589', '0000-00-00', 0, '', '', '', 1, 119896, 0, 0, 119896, NULL, NULL, 0, 0, 0, '2024-01-20', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 730478, 'lelohost@gmail.com', 'Shahrukh Khan', '37001739cdb344c957ed10739fba523c4f43a16e', '8374655326', '0000-00-00', 1, '', '', '', 0, 119896, 1, 1, 119896, 506581, 269742, 0, 0, 0, '2024-01-20', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 269742, 'boosterseo690@gmail.com', 'Salman Khan', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', '8765432234', '0000-00-00', 1, '', '', '', 0, 119896, 0, 0, 730478, NULL, NULL, 0, 0, 0, '2024-01-20', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 506581, 'mlmproject098@gmail.com', 'Test Account', '3314137e9a1d89beb3956ede3e11d5be5eaaefa3', '9988776655', '0000-00-00', 1, '', '', '', 1, 730478, 0, 0, 730478, NULL, NULL, 0, 1, 1, '2024-01-20', 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `amount`, `date`, `status`) VALUES
(19, 497447, 0, '2024-01-20', 0),
(20, 119896, 300, '2024-01-20', 0),
(21, 730478, 400, '2024-01-20', 0),
(22, 269742, 0, '2024-01-20', 0),
(23, 506581, 0, '2024-01-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `witdrawl`
--

CREATE TABLE `witdrawl` (
  `id` int(10) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `amt` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `request_date` date NOT NULL,
  `approve_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_history`
--
ALTER TABLE `income_history`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `pair_count`
--
ALTER TABLE `pair_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin_transfer_history`
--
ALTER TABLE `pin_transfer_history`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `witdrawl`
--
ALTER TABLE `witdrawl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income_history`
--
ALTER TABLE `income_history`
  MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=592;

--
-- AUTO_INCREMENT for table `pair_count`
--
ALTER TABLE `pair_count`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2557;

--
-- AUTO_INCREMENT for table `pin_transfer_history`
--
ALTER TABLE `pin_transfer_history`
  MODIFY `sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `witdrawl`
--
ALTER TABLE `witdrawl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
