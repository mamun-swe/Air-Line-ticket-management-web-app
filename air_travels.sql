-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 10:18 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `air_travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `air_lines`
--

CREATE TABLE `air_lines` (
  `id` int(11) NOT NULL,
  `package_id` int(50) NOT NULL,
  `air_line_name` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lines`
--

INSERT INTO `air_lines` (`id`, `package_id`, `air_line_name`, `start_time`) VALUES
(1, 1, 'Revel', '10:00:00'),
(2, 1, 'Prodip', '01:00:00'),
(3, 1, 'Agnee Bina', '12:00:00'),
(4, 1, 'Akash Bina', '12:12'),
(5, 2, 'Air-line 1', '10:00:00'),
(6, 3, 'Air-line 31', '01:00:00'),
(7, 9, 'abc air-line', '10:00');

-- --------------------------------------------------------

--
-- Table structure for table `air_lines_seats`
--

CREATE TABLE `air_lines_seats` (
  `id` int(11) NOT NULL,
  `air_line_id` int(10) NOT NULL,
  `seat` varchar(10) NOT NULL,
  `category` int(5) NOT NULL,
  `seat_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `air_lines_seats`
--

INSERT INTO `air_lines_seats` (`id`, `air_line_id`, `seat`, `category`, `seat_status`) VALUES
(1, 2, 'A', 1, 1),
(2, 2, 'A', 1, 1),
(3, 2, 'B', 2, 1),
(4, 2, 'B', 2, 1),
(5, 1, 'A', 2, 1),
(6, 1, 'A', 1, 1),
(7, 1, 'B', 2, 0),
(8, 1, 'B', 1, 0),
(9, 2, 'B', 1, 0),
(10, 2, 'A', 2, 1),
(11, 2, 'B', 1, 1),
(12, 2, 'A', 1, 1),
(13, 2, 'B', 1, 0),
(14, 2, 'A', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_text`) VALUES
(1, 'Package 1', '1st class Package'),
(2, 'Package 2', '2nd class Package'),
(3, 'Package 3', '3rd class Package'),
(4, 'Package 4', 'local Package'),
(5, 'Package 5', 'Lorem Ipsum is simply dummy text. '),
(6, 'Package 6', 'Lorem Ipsum is simply dummy text. '),
(7, 'Package 7', 'Lorem Ipsum is simply dummy text. '),
(8, 'Package 8', 'Lorem Ipsum is simply dummy text. '),
(9, 'package 9', 'sdfgsdg');

-- --------------------------------------------------------

--
-- Table structure for table `regis_users`
--

CREATE TABLE `regis_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regis_users`
--

INSERT INTO `regis_users` (`id`, `user_name`, `user_mail`, `user_pass`) VALUES
(1, 'Dip', 'dip@gmail.com', 'c2d838580b3d58800f15ac54f32c668d'),
(2, 'alif', 'alif@gmail.com', '099a147c0c6bcd34009896b2cc88633c'),
(3, 'Mamun', 'mamun@gmail.com', '6872edadd43c2a34f3ce1284f425a2f0');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `request_email` varchar(50) NOT NULL,
  `seatId` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request_email`, `seatId`, `status`) VALUES
(1, 'alif@gmail.com', 11, 1),
(2, 'alif@gmail.com', 12, 1),
(3, 'dip@gmail.com', 11, 1),
(4, 'dip@gmail.com', 14, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lines`
--
ALTER TABLE `air_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_lines_seats`
--
ALTER TABLE `air_lines_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regis_users`
--
ALTER TABLE `regis_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `air_lines`
--
ALTER TABLE `air_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `air_lines_seats`
--
ALTER TABLE `air_lines_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `regis_users`
--
ALTER TABLE `regis_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
