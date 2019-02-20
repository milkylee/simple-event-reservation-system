-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2018 at 05:16 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.31-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `face_beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_fname` varchar(60) NOT NULL,
  `employee_lname` varchar(60) NOT NULL,
  `phone` int(11) NOT NULL,
  `employee_address` varchar(100) NOT NULL,
  `employee_email` varchar(60) NOT NULL,
  `designation` varchar(60) NOT NULL,
  `employee_start` time DEFAULT NULL,
  `employee_end` time DEFAULT NULL,
  `image` varchar(60) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_fname`, `employee_lname`, `phone`, `employee_address`, `employee_email`, `designation`, `employee_start`, `employee_end`, `image`, `sid`) VALUES
(1, 'Hello', 'Hello', 25124, 'Hello', 'hello@email.com', 'Hair Stylist', NULL, NULL, 'team1.jpg', 1),
(2, 'Yeah', 'Yeah', 25124, 'Yeah', 'yeah@email.com', 'Make up Artist', NULL, NULL, 'team2.jpg', 2),
(3, 'New', 'New', 212345, 'New', 'new@email.com', 'Make Up Artist', NULL, NULL, 'team3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_schedule`
--

CREATE TABLE `employee_schedule` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_schedule`
--

INSERT INTO `employee_schedule` (`id`, `eid`, `start_time`, `end_time`, `available`) VALUES
(1, 1, '09:00:00', '10:00:00', 1),
(2, 1, '11:00:00', '12:00:00', 1),
(3, 3, '09:00:00', '10:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `total` int(15) DEFAULT NULL,
  `date` varchar(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(11) NOT NULL,
  `validated` int(2) NOT NULL,
  `booked` int(11) NOT NULL,
  `emp_id_makeup` int(11) NOT NULL,
  `emp_id_hair` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `service_id`, `total`, `date`, `start_time`, `end_time`, `fname`, `lname`, `phone`, `address`, `email`, `password`, `validated`, `booked`, `emp_id_makeup`, `emp_id_hair`) VALUES
(1, 4, 25000, '13/10/2018', '09:00:00', '00:00:00', 'edit', 'edit', 25124, 'edit', 'edit@email.com', 'edit', 0, 0, 0, 0),
(2, 2, 25000, '13/10/2018', '09:00:00', '00:00:00', 'date', 'date', 25124, 'date', 'date@email.com', 'date', 0, 0, 0, 0),
(3, 2, 25000, '13/10/2018', '09:00:00', '00:00:00', 'over', 'over', 12212, 'over', 'test@email.com', 'over', 0, 0, 0, 0),
(4, 4, 25000, '13/10/2018', '09:00:00', '00:00:00', 'home', 'home', 212345, 'home', 'home@email.com', 'home', 0, 0, 0, 0),
(5, 1, 18000, '13/10/2018', '09:00:00', '00:00:00', 'dad', 'dad', 25124, 'dad', 'test@email.com', 'dad', 1, 0, 0, 0),
(6, 1, 18000, '13/10/2018', '09:00:00', '00:00:00', 'hay', 'hay', 212345, 'hay', 'test@email.com', 'hay', 1, 0, 0, 0),
(7, 2, 25000, '13/10/2018', '09:00:00', '00:00:00', 'val', 'val', 25124, 'val', 'milkylorejo@gmail.com', 'val', 0, 0, 0, 0),
(8, 2, 25000, '13/10/2018', '09:00:00', '00:00:00', 'confirm', 'confirm', 25124, 'confirm', 'milkylorejo@gmail.com', 'confirm', 0, 0, 0, 0),
(9, 2, 25000, '13/10/2018', '09:00:00', '00:00:00', 'machine', 'machine', 12212, 'machine', 'milkylorejo@gmail.com', 'machine', 0, 0, 0, 0),
(10, 3, 51000, '13/10/2018', '09:00:00', '00:00:00', 'index', 'index', 25124, 'index', 'milkylorejo@gmail.com', 'index', 1, 0, 0, 0),
(11, 1, 18000, '15/10/2018', '09:00:00', '10:00:00', 'Phone', 'Phone', 25124, 'phone', 'milkylorejo@gmail.com', 'phone', 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`) VALUES
(1, 'Package A'),
(2, 'Package B'),
(3, 'Package C'),
(4, 'Package D'),
(5, 'Package E'),
(7, 'Package G'),
(8, 'Package H');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(60) DEFAULT NULL,
  `service_desc` varchar(500) DEFAULT NULL,
  `service_img_name` varchar(60) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_desc`, `service_img_name`, `qty`, `price`, `package_id`) VALUES
(1, 'Bride + Groom', '-Make up and Hair for the Bride and Groom \n-FREE airbrush upgrade for the bride -UNLIMITED retouch for the bride until she leaves her hotel for the church \n- FREE retouch kit for the bride - Free grooming for the Groom(only if he is at the same preparation venue)', 'package-1.jpg', 1, '18000.00', 1),
(2, 'Bride + Groom + 2 Female Heads', '-Make up and Hair for the Bride and Groom + 2 heads -FREE airbrush upgrade for the bride + 2 heads -UNLIMITED retouch for the bride until she leaves her hotel for the church - FREE retouch kit for the bride - Free grooming for the Groom(only if he is at the same preparation venue)', 'package-2.jpg', 1, '25000.00', 2),
(3, 'Bride + Groom + 2 Female Heads //Free Trials', '-Make up and Hair for the Bride and Groom + 2 heads -FREE airbrush upgrade for the bride + 2 heads -Retouch or 2nd look before reception - Trial hair and makeup - Free grooming for the Groom(only if he is at the same preparation venue) - Hair and makeup for prenup/engagement shoot with UNLIMITED retouch for the bride(*weekdays only)', 'package-3.jpg', 1, '51000.00', 3),
(4, 'Debutante', 'Debutante only', 'package-4.jpg', 1, '25000.00', 3),
(5, 'Test', 'Test', 'bg1.jpg', 1, '20000.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `email`, `password`, `type`, `status`) VALUES
(3, 'Sample', 'Me', 'ABC', 'admin@email.com', 'admin', 'admin', '1'),
(4, 'Sample', 'Sample', 'Sample', 'sample@email.com', 'sample', 'user', '0'),
(5, 'book', 'book', 'book', 'test@email.com', 'book', 'user', '0'),
(6, 'Hey', 'hey', 'hey', 'hey@email.com', 'hey', 'user', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_schedule`
--
ALTER TABLE `employee_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_schedule`
--
ALTER TABLE `employee_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
