-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2021 at 10:45 AM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `programmer1_maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `type` text NOT NULL,
  `model_number` int(11) NOT NULL,
  `model_case` text NOT NULL,
  `water_resistance` text NOT NULL,
  `movement` text NOT NULL,
  `caliber` text NOT NULL,
  `power_reserve` text NOT NULL,
  `bracelet` text NOT NULL,
  `dial` text NOT NULL,
  `large_title` text NOT NULL,
  `small_title` text NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pid`, `type`, `model_number`, `model_case`, `water_resistance`, `movement`, `caliber`, `power_reserve`, `bracelet`, `dial`, `large_title`, `small_title`, `description`, `price`) VALUES
(1, 0, 'cat', 0, '', '', '', '', '', '', '', 'top category', 'top category', 'top category description', 0),
(4, 1, 'cat', 0, '', '', '', '', '', '', '', 'Date Just', 'Date Just', 'Date Just Description', 0),
(5, 4, 'cat', 0, '', '', '', '', '', '', '', 'Date Just Pearl', 'Date Just Pearl', 'Date Just Pearl Description', 0),
(6, 1, 'cat', 0, '', '', '', '', '', '', '', 'Day-Date', 'Day-Date', 'Day-Date Description', 0),
(7, 4, 'item', 100001, 'Metal', '70m', 'Perpetualll', '3285', '72 Hours', 'Oyster', 'Black', 'Datejust 3600', 'Datejust 36', 'Oyster, 36 mm, Oystersteel', 45000),
(8, 4, 'item', 100002, 'Metal', '72m', 'Mechanical', '3285', '72 Hours', 'Oyster', 'Gold', 'Datejust 3767', 'Datejust 37', 'Oyster, 37 mm, Oystersteel', 4800),
(9, 4, 'item', 100003, 'Metal', '72mm', 'Mechanicallll', '3285', '72 Hours', 'Oyster', 'Black', 'Datejust 38', 'Datejust 38', 'Oyster, 38 mm, Oystersteel', 5000),
(10, 5, 'item', 100004, 'Gold', '72m', 'Perpetual', '3285', '72 Hours', 'Oyster', 'Black', 'Datejust 38', 'Datejust 38', 'Oyster, 38 mm, Oystersteel', 5100),
(11, 6, 'item', 100005, 'Gold', '72m', 'Perpetual', '3285', '72 Hours', 'Oyster', 'White', 'Day Date 4200', 'Day Date 42', 'Oyster, 42 mm, Oystersteel', 5500),
(12, 6, 'item', 100006, 'Gold', '72m', 'Perpetual', '3285', '72 Hours', 'Oyster', 'Black', 'Day Date 3800', 'Day Date 38', 'Oyster, 38 mm, Oystersteel', 5200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


