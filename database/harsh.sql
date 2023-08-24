-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 03:18 PM
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
-- Database: `harsh`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `aid` int(255) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `apassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`aid`, `aname`, `apassword`) VALUES
(1, 'harsh', 'harsh'),
(2, 'prince', 'prince');

-- --------------------------------------------------------

--
-- Table structure for table `ecomadincat`
--

CREATE TABLE `ecomadincat` (
  `tid` int(255) NOT NULL,
  `catid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ecomadincat`
--

INSERT INTO `ecomadincat` (`tid`, `catid`) VALUES
(1, 'Dell'),
(2, 'HP'),
(3, 'Lenovo'),
(5, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `ecomadinprd`
--

CREATE TABLE `ecomadinprd` (
  `prdid` int(255) NOT NULL,
  `catid` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `ssize` varchar(255) NOT NULL,
  `hdsize` varchar(255) NOT NULL,
  `cpspeed` varchar(255) NOT NULL,
  `opsystem` varchar(255) NOT NULL,
  `img1` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ecomadinprd`
--

INSERT INTO `ecomadinprd` (`prdid`, `catid`, `bname`, `mname`, `price`, `stock`, `ssize`, `hdsize`, `cpspeed`, `opsystem`, `img1`) VALUES
(1, '1', 'Dell', 'Vostro', '40000', 'InStock', '16.1', '512', '200', 'windows 11', 'dimg/hp.jpg'),
(2, '5', 'Apple', 'MacBook', '150000', 'InStock', '15', '512', '200', 'IOS', 'dimg/apple.jpg'),
(3, '5', 'Apple', 'MacBook Air', '200000', 'InStock', '15.1', '256', '300', 'MAC os', 'dimg/download.jpg'),
(4, '2', 'HP', 'Victus', '60000', 'InStock', '15.1', '256', '200', 'windows', 'dimg/asus.jpg'),
(5, '3', 'Lenovo', 'IdeaPad', '50000', 'InStock', '12.1', '256', '150', 'Windows', 'dimg/images.jpg'),
(6, '1', 'Dell', 'Inspiron', '60000', 'InStock', '15.1', '512', '200', 'Windows', 'dimg/img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ecomcart`
--

CREATE TABLE `ecomcart` (
  `id` int(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ecomcart`
--

INSERT INTO `ecomcart` (`id`, `pid`, `uid`) VALUES
(3, '10', '6');

-- --------------------------------------------------------

--
-- Table structure for table `inquirydata`
--

CREATE TABLE `inquirydata` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquirydata`
--

INSERT INTO `inquirydata` (`id`, `name`, `email`, `number`, `address`) VALUES
(3, 'harsh', 'h@gmail.com', '6457474', '500 bag');

-- --------------------------------------------------------

--
-- Table structure for table `prodorder`
--

CREATE TABLE `prodorder` (
  `oid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `monumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `datetime1` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrationclient`
--

CREATE TABLE `registrationclient` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrationclient`
--

INSERT INTO `registrationclient` (`id`, `name`, `password`, `email`, `mobile`, `address`) VALUES
(1, 'harsh', 'harsh', 'h@gmail.com', '9687688662', 'rajkot'),
(6, 'prince', 'prince', 'p@gmail.com', '4535454353', 'rajkot');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `uid` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `ecomadincat`
--
ALTER TABLE `ecomadincat`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `ecomadinprd`
--
ALTER TABLE `ecomadinprd`
  ADD PRIMARY KEY (`prdid`);

--
-- Indexes for table `ecomcart`
--
ALTER TABLE `ecomcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquirydata`
--
ALTER TABLE `inquirydata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodorder`
--
ALTER TABLE `prodorder`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `registrationclient`
--
ALTER TABLE `registrationclient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ecomadincat`
--
ALTER TABLE `ecomadincat`
  MODIFY `tid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ecomadinprd`
--
ALTER TABLE `ecomadinprd`
  MODIFY `prdid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ecomcart`
--
ALTER TABLE `ecomcart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inquirydata`
--
ALTER TABLE `inquirydata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prodorder`
--
ALTER TABLE `prodorder`
  MODIFY `oid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrationclient`
--
ALTER TABLE `registrationclient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
