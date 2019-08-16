-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2019 at 07:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertyconsultancy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `title`) VALUES
(1, 'Admin'),
(2, 'Agent');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `floor_area` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `arrangement` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `b_room` varchar(255) NOT NULL,
  `c_room` varchar(255) NOT NULL,
  `p_space` varchar(255) NOT NULL,
  `image_src` longblob NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `unit_name`, `type`, `floor_area`, `availability`, `price`, `arrangement`, `address`, `b_room`, `c_room`, `p_space`, `image_src`, `created_at`, `updated_at`) VALUES
(9, 'Resorts World Manila', 'Room 396 RWM', 'Hotel', '1234', '1234', '30000', 'Sale', 'zxcvasdfqwerzxcv', '5', '3', '2', '', '2019-08-16 02:47:27', '2019-08-16 12:48:28'),
(10, 'Remington Hotel', 'Room 641-B Sky Tower', 'Hotel', '', '', '35,000', 'Lease', '123zxcv456asdf789qwer', '', '', '', '', '2019-08-16 03:00:37', '2019-08-16 13:55:38'),
(11, 'Solaire Resort And Hotel Casino', 'Bay Tower Room 961', 'Hotel', '', '', '35,000', 'Lease', 'Lease', '', '', '', '', '2019-08-16 03:09:26', '2019-08-16 13:55:26'),
(12, 'Solaire Resort And Hotel Casino', 'Bay Tower Room 961', 'Hotel', '', '', '35,000', 'Lease', 'zxcv123asdf456', '', '', '', '', '2019-08-16 03:10:00', '2019-08-16 03:10:00'),
(13, 'Solaire Resort And Hotel Casino', 'Bay Tower Room 961', 'Hotel', '', '', '35,000', 'Sale', 'zxcv123asdf456', '', '', '', '', '2019-08-16 03:12:30', '2019-08-16 03:12:30'),
(14, 'Filinvest Cyberzone', 'Bay Tower Room 961', 'Hotel', '', '', '35,000', 'Lease', 'zxcv123asdf456', '', '', '', '', '2019-08-16 03:18:59', '2019-08-16 03:18:59'),
(15, 'Filinvest Cyberzone', 'Bay Tower Room 961', 'Hotel', '', '', '35,000', 'Sale', 'zxcv123asdf456', '', '', '', '', '2019-08-16 03:19:00', '2019-08-16 13:55:51'),
(16, 'Filinvest Cyberzone', 'Bay Tower Room 961', 'Hotel', '', '', '35,000', 'Lease', 'zxcv123asdf456', '', '', '', '', '2019-08-16 03:19:00', '2019-08-16 03:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `position_id` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `f_name`, `l_name`, `gender`, `birthdate`, `email`, `username`, `password`, `contact_number`, `phone_number`, `address`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 'Kelscey', 'Ortiz', 'Male', '1994-11-22', 'kelscey90@gmail.com', '', 'Helloworld', '09957321017', '4401023', '41 June Street Congressional Avenue, Quezon City', '1', '2019-08-15 21:10:53', '2019-08-15 21:10:53'),
(2, 'User', 'One', 'Female', '2000-02-02', 'user1@gmail.com', '', '', '123456789123', '1234567', 'qwerasdfzxcvasdfqwerzxcvasdf', '1', '2019-08-15 21:26:08', '2019-08-15 21:30:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
