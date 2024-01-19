-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 09:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `password`) VALUES
(1, 'deepak', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `income_history`
--

CREATE TABLE `income_history` (
  `srno` int(10) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `amt` float NOT NULL,
  `desp` varchar(100) NOT NULL,
  `cr_dr` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income_history`
--

INSERT INTO `income_history` (`srno`, `user_id`, `amt`, `desp`, `cr_dr`) VALUES
(1, '12345678', 20, 'Level Income', 0),
(2, '69878504', 100, 'PAIR INCOME', 0),
(3, '69878504', 50, 'withdraw', 1),
(4, '69878504', 10, 'withdraw', 1),
(5, '69878504', 30, 'withdraw', 1),
(6, '12345678', 100, 'withdraw', 1),
(7, '12345678', 20, 'Level Income', 0),
(8, '12345678', 20, 'Level Income', 0),
(9, '12345678', 20, 'Level Income', 0),
(10, '12345678', 20, 'Level Income', 0),
(11, '12345678', 20, 'Level Income', 0),
(12, '12345678', 20, 'Level Income', 0),
(13, '12345678', 20, 'Level Income', 0),
(14, '12345678', 20, 'Level Income', 0),
(15, '12345678', 20, 'Level Income', 0),
(16, '12345678', 20, 'Level Income', 0),
(17, '12345678', 20, 'Level Income', 0),
(18, '12345678', 20, 'Level Income', 0),
(19, '12345678', 20, 'Level Income', 0),
(20, '12345678', 20, 'Level Income', 0),
(21, '12345678', 20, 'Level Income', 0),
(22, '12345678', 20, 'Level Income', 0),
(23, '12345678', 20, 'Level Income', 0),
(24, '12345678', 20, 'Level Income', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pair_count`
--

INSERT INTO `pair_count` (`id`, `user_id`, `date`, `no_of_pair`, `status`) VALUES
(8, 12345678, '2021-02-08', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `pin_value` bigint(10) NOT NULL,
  `allcote_user` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`id`, `pin_value`, `allcote_user`, `status`) VALUES
(1, 55555, 12345678, 1),
(2, 36465, 12345678, 1),
(3, 23449, 12345678, 1),
(4, 20300, 12345678, 1),
(5, 24208, 12345678, 1),
(6, 27346, 12345678, 1),
(7, 20450, 12345678, 1),
(8, 39135, 12345678, 1),
(9, 21098, 12345678, 1),
(10, 35121, 12345678, 1),
(11, 40880, 12345678, 1),
(12, 51341, 12345678, 1),
(13, 17764, 12345678, 1),
(14, 26389, 12345678, 1),
(15, 14987, 12345678, 1),
(16, 15506, 12345678, 1),
(17, 47242, 12345678, 1),
(18, 49531, 12345678, 1),
(19, 54588, 12345678, 1),
(20, 12108, 12345678, 0),
(21, 40401, 12345678, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pin_transfer_history`
--

CREATE TABLE `pin_transfer_history` (
  `sr_no` int(10) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `pin_count` int(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pin_transfer_history`
--

INSERT INTO `pin_transfer_history` (`sr_no`, `agent_id`, `pin_count`, `time`) VALUES
(1, 12345678, 5, '2021-01-12 20:22:50'),
(2, 12345678, 10, '2021-01-12 20:27:13'),
(3, 0, 0, '2021-01-30 21:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` int(10) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `panno` varchar(100) NOT NULL,
  `aadharno` varchar(1000) NOT NULL,
  `position` tinyint(1) NOT NULL DEFAULT 0,
  `sponsor_id` int(10) NOT NULL,
  `wallet` float NOT NULL,
  `left_count` int(10) NOT NULL,
  `right_count` int(10) NOT NULL,
  `placement_id` int(10) NOT NULL,
  `right_side` int(10) NOT NULL,
  `left_side` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `password`, `mobile`, `dob`, `gender`, `address`, `panno`, `aadharno`, `position`, `sponsor_id`, `wallet`, `left_count`, `right_count`, `placement_id`, `right_side`, `left_side`, `status`, `registration_date`) VALUES
(1, 12345678, 'deep', 789632, 1425363625, '2021-01-05', 0, 'fhdfhdgjhdgjd', 'ASDFG1425H', '142536362514', 0, 0, 388, 2, 2, 0, 95450540, 11489314, 0, '2020-09-12'),
(48, 11489314, 'DDEPSS', 154521, 7410741014, '0000-00-00', 0, '', '', '', 0, 12345678, 0, 1, 0, 12345678, 0, 98116531, 0, '0000-00-00'),
(49, 98116531, 'HFDHDHD', 14253652, 8545424242, '0000-00-00', 0, '', '', '', 0, 12345678, 0, 0, 0, 11489314, 0, 0, 0, '0000-00-00'),
(50, 95450540, 'DEEPAK', 1215245, 7410741010, '0000-00-00', 0, '', '', '', 1, 12345678, 0, 0, 1, 12345678, 61426095, 0, 0, '0000-00-00'),
(51, 61426095, 'FGHRTGJHDF', 4655698, 5665656565, '0000-00-00', 0, '', '', '', 1, 12345678, 0, 0, 0, 95450540, 0, 0, 0, '0000-00-00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `witdrawl`
--

INSERT INTO `witdrawl` (`id`, `user_id`, `amt`, `status`, `request_date`, `approve_date`) VALUES
(1, '69878504', 50, 1, '2021-01-31', '2021-01-31'),
(2, '69878504', 10, 0, '2021-01-31', '0000-00-00'),
(3, '69878504', 30, 0, '2021-01-31', '0000-00-00'),
(4, '12345678', 100, 0, '2021-02-08', '0000-00-00');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pair_count`
--
ALTER TABLE `pair_count`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pin_transfer_history`
--
ALTER TABLE `pin_transfer_history`
  MODIFY `sr_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `witdrawl`
--
ALTER TABLE `witdrawl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
