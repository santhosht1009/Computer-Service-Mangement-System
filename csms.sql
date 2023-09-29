-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 06:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'santhosh', 'santhosh@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `inv_id` int(11) NOT NULL,
  `inv_no` varchar(30) NOT NULL,
  `inv_cname` varchar(50) NOT NULL,
  `inv_date` varchar(30) NOT NULL,
  `inv_status` varchar(30) NOT NULL,
  `inv_total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`inv_id`, `inv_no`, `inv_cname`, `inv_date`, `inv_status`, `inv_total`) VALUES
(1, 'CRSINVNO001', 'santhosh', '2022-03-15', 'Done', 3500),
(2, 'CRSINVNO002', 'kotresh', '2022-03-16', 'Done', 4500),
(3, 'CRSINVNO001', 'santhosh', '2022-03-23', 'Done', 1000),
(4, 'CRSINVNO001', 'kotresh', '2022-03-23', 'Pending', 1000),
(5, 'CRSINVNO00-1', 'santhosh', '2022-03-23', 'Pending', 4500),
(6, 'CRSINVNO000+1', 'santhosh', '2022-03-16', 'Pending', 1000),
(7, 'CRSINVNO001', 'kotresh', '2022-03-23', 'Pending', 1000),
(8, 'CRSINVNO001', 'santhosh', '2022-03-16', 'Pending', 3500),
(9, 'CRSINVNO000', 'santhosh', '2022-03-22', 'Pending', 1000),
(10, 'CRSINVNO000', 'santhosh', '2022-03-16', 'Pending', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_services`
--

CREATE TABLE `invoice_services` (
  `inv_id` int(100) NOT NULL,
  `serv_name` varchar(100) NOT NULL,
  `serv_id` int(100) NOT NULL,
  `serv_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_services`
--

INSERT INTO `invoice_services` (`inv_id`, `serv_name`, `serv_id`, `serv_price`) VALUES
(1, 'Laptop Display', 1, 3500),
(2, 'Laptop Display', 1, 3500),
(2, 'OS Installation', 2, 1000),
(3, 'OS Installation', 2, 1000),
(4, 'OS Installation', 2, 1000),
(5, 'Laptop Display', 1, 3500),
(5, 'OS Installation', 2, 1000),
(6, 'OS Installation', 2, 1000),
(7, 'OS Installation', 2, 1000),
(8, 'Laptop Display', 1, 3500),
(9, 'OS Installation', 2, 1000),
(10, 'OS Installation', 2, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ser_id` int(20) NOT NULL,
  `ser_name` varchar(30) NOT NULL,
  `ser_description` varchar(200) NOT NULL,
  `ser_image` varchar(50) NOT NULL,
  `ser_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ser_id`, `ser_name`, `ser_description`, `ser_image`, `ser_price`) VALUES
(1, 'Laptop Display', 'Laptop screen got Broken', 'web3.jpg', 3500),
(2, 'OS Installation', 'install new os(WINDOWS/LINUX)  to system ', 'web1.jpg', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `address` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `image`, `address`, `password`) VALUES
(1, 'santhosh', 'santhosh@gmail.com', 1234567899, 'SANTHOSH T.jpg', 'Bangalore', '123456'),
(2, 'kotresh', 'kotresh@gmail.com', 1234567899, 'IMG_20190927_090606.jpg', 'Bangalore', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ser_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
