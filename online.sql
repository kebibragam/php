-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2022 at 09:02 AM
-- Server version: 10.8.3-MariaDB
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(5) NOT NULL,
  `aname` char(15) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `adminphoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `password`, `email`, `adminphoto`) VALUES
(1, 'bibek', 'admin', 'bibekmagar@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(12) NOT NULL,
  `pname` varchar(35) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `quantityAvailable` int(10) DEFAULT NULL,
  `productimg` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `price`, `quantityAvailable`, `productimg`, `description`) VALUES
(1, 'Samsung Galaxy s22', 100000, 2, 'img/product/s22.jpg', 'Dynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nSize 	6.1 inches, 90.1 cm2 (~87.4% screen-to-body ratio)\r\nResolution 	1080 x 2340 pixels, 19.5:9 ratio (~425 ppi density)\r\nProtection 	Corning Gorilla Glass Victus+\r\n 	Always-on display'),
(2, 'Redmi Note 11 pro', 40000, 4, 'img/product/redminote11.jpg', '164.2 x 76.1 x 8.1 mm (6.46 x 3.00 x 0.32 in)Weight 	202 g (7.13 oz)Build 	Glass front (Gorilla Glass 5), glass backSIM 	Hybrid Dual SIM (Nano-SIM, dual stand-by) 	IP53, dust and splash resistant'),
(7, 'product', 100, 12, 'img/product/product.jpg', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(16) DEFAULT NULL,
  `Email` varchar(40) NOT NULL,
  `userphoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `Username`, `Password`, `Email`, `userphoto`) VALUES
(1, 'Bibek', 'password', 'bibek@email.com', ''),
(2, 'hello', 'world', 'world@email.com', ''),
(3, 'prabhat', 'pass', 'prabhat@gmail.com', ''),
(7, 'user1', '11111', 'user@email.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
