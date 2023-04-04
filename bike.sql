-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 02:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` longtext NOT NULL,
  `status` varchar(110) NOT NULL DEFAULT '0',
  `fromm` varchar(110) NOT NULL,
  `too` varchar(100) NOT NULL,
  `vid` varchar(110) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `phone`, `address`, `status`, `fromm`, `too`, `vid`) VALUES
(5, 'kundan singh', 'kundansingh754285@gmail.com', '07542857907', 'patliputra colony patna, near cisf head quator, Confirmed\r\nConfirmed', '0', '2022-09-15T15:51', '2022-09-21T15:51', '7'),
(6, 'kundan singh', 'kundansingh754285@gmail.com', '07542857907', 'patliputra colony patna, near cisf head quator, Confirmed\r\nConfirmed', '0', '2022-09-15T15:51', '2022-09-21T15:51', '20'),
(7, '', '', '', '', '0', '', '', '20');

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `id` int(11) NOT NULL,
  `user` varchar(123) DEFAULT NULL,
  `password` varchar(123) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`id`, `user`, `password`) VALUES
(1, '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `price` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `image`, `name`, `description`, `price`, `model`, `created_at`, `quantity`) VALUES
(5, '3501431.png', 'Range Rover', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Image', '200', 'MMHM01', '2022-08-31 12:34:44', '2'),
(7, '368228b1.png', 'Yamaha', '  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Image', '350', 'JYHD01', '2022-08-31 12:36:16', '2'),
(19, '2355312.png', 'Audi Q0', '     Lorem Ipsum is simply dummy text of the printing and typesetting industry. Image.	', '200', 'SGY2', '2022-09-01 05:56:09', '2'),
(20, '319728Duke-Bike-PNG-Photos.png', 'DUKE', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Image	', '250', 'JFHG', '2022-09-01 10:06:01', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manage`
--
ALTER TABLE `manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
