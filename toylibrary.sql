-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 02:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toylibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `product` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL,
  `kg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cust_reg`
--

CREATE TABLE `cust_reg` (
  `name` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `phone` bigint(20) NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `cust_reg`
--

INSERT INTO `cust_reg` (`name`, `address`, `phone`, `username`, `password`) VALUES
('kirti salunhe', 'Bhagirathi Nagar,Hadapsar,pune-411028', 8329475676, 'kirti', '1234'),
('kanchan', 'bhopal', 1234567891, 'kanchna', 'kanchan123'),
('sanchita', 'kolhapur', 3541546767, 'sanchita', 'sanchita'),
('komal', 'karve Nagar', 1234567891, 'Komal', '123456'),
('manali', 'kalewadi', 1234567891, 'manali', 'manali12'),
('komal', 'Satara', 1243568790, 'Komal12', '123456'),
('sneha', 'Satara', 567898989, 'sneha@', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `owner` int(11) NOT NULL,
  `pro_name` varchar(350) COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(340) COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(900) COLLATE utf8mb4_bin NOT NULL,
  `year` int(11) NOT NULL,
  `color` varchar(350) COLLATE utf8mb4_bin NOT NULL,
  `discount` int(11) NOT NULL,
  `Model` varchar(350) COLLATE utf8mb4_bin NOT NULL,
  `stock` varchar(350) COLLATE utf8mb4_bin NOT NULL,
  `filename` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`owner`, `pro_name`, `price`, `brand`, `description`, `year`, `color`, `discount`, `Model`, `stock`, `filename`) VALUES
(2, 'Puzzle', 6, 'xyz', 'Barbie is a fashion doll manufactured by the American toy company Mattel, Inc. and launched in March 1959. ', 2, 'red', 65, '134ER4', 'Available', 'images/puzzle.jpg'),
(2, 'Barbie', 100, 'xyz', 'Barbie is a fashion doll manufactured by the American toy company Mattel, Inc. and launched in March 1959. ', 2, 'red', 65, '134ER4', 'Available', 'images/barbie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `toyowner`
--

CREATE TABLE `toyowner` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `city` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `toyowner`
--

INSERT INTO `toyowner` (`id`, `name`, `city`, `username`, `password`) VALUES
(1, 'Shantabai', 'Jalgaon', 'Shanta@123', '123'),
(2, 'Kajol Pawar', 'Satara', 'kaju', 'kaju1234'),
(3, 'Ramlal gopal', 'Nagpur', 'ramlal', '1234'),
(4, 'jamunabai kumbhar', 'Nagpiur', 'jamuna', 'jamun123'),
(5, 'divya varpe', 'bhosari', 'divya123', '1234'),
(7, 'Shanta koyale', 'indor', 'koyal', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toyowner`
--
ALTER TABLE `toyowner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toyowner`
--
ALTER TABLE `toyowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
