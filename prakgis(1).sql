-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 05:29 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prak_gis`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_location`
--

CREATE TABLE `data_location` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `max_cap` int(100) NOT NULL,
  `curr_cap` int(100) NOT NULL DEFAULT '0',
  `lat` float(10,6) NOT NULL,
  `lon` float(10,6) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_location`
--

INSERT INTO `data_location` (`id`, `nama`, `max_cap`, `curr_cap`, `lat`, `lon`, `last_update`) VALUES
(12, 'Bukit Delight', 100, 19, -7.953494, 112.600807, '2020-05-12 11:10:49'),
(16, 'Labore coffee eatery', 2, 0, -7.962299, 112.615517, '2020-05-12 11:10:49'),
(17, 'Vosco Coffee', 11, 0, -7.940180, 112.635529, '2020-05-12 11:10:49'),
(18, 'Bataputi Cafe', 11, 0, -7.940263, 112.661987, '2020-05-12 11:10:49'),
(19, '8 Oz Coffee Studio', 11, 1, -7.957064, 112.641167, '2020-05-12 11:10:49'),
(20, 'Simpang Luwe Cafe & Resto', 11, 0, -7.964456, 112.633102, '2020-05-12 11:10:49'),
(21, 'Sky Room Dining Lounge', 11, 0, -7.967958, 112.632950, '2020-05-12 11:10:49'),
(22, 'Cafe Andika Malang', 11, 0, -7.973658, 112.632309, '2020-05-12 11:10:49'),
(23, 'Java Dancer Coffee - Majapahit', 11, 0, -7.978035, 112.630791, '2020-05-12 11:10:49'),
(24, 'MMMM Coffee', 11, 0, -7.979547, 112.627327, '2020-05-12 11:10:49'),
(25, 'Illy Cafe Lai Lai', 11, 0, -7.976749, 112.625511, '2020-05-12 11:10:49'),
(26, 'Coffee And Chef Pusat', 11, 0, -7.965266, 112.615829, '2020-05-12 11:10:49'),
(27, 'Alice Tea Room', 11, 0, -7.970370, 112.619102, '2020-05-12 11:10:49'),
(28, 'Java Dancer Coffee Roaster', 11, 0, -7.965448, 112.618164, '2020-05-12 11:10:49'),
(29, 'GOLDEN HERITAGE KOFFIE', 11, 0, -7.965825, 112.606529, '2020-05-12 11:10:49'),
(30, 'Colony Cafe', 11, 0, -7.964778, 112.601814, '2020-05-12 11:10:49'),
(31, 'Sarijan Coffee Simpang Gajayana', 11, 0, -7.946932, 112.603828, '2020-05-12 11:10:49'),
(32, 'Setunggal Coffe - LA Zone', 11, 0, -7.947641, 112.602921, '2020-05-12 11:10:49'),
(33, 'Oase Cafe & Literacy', 11, 0, -7.945689, 112.602806, '2020-05-12 11:10:49'),
(34, 'Kopi Lanang', 11, 0, -7.947880, 112.603737, '2020-05-12 11:10:49'),
(35, 'Kidjang Coffee 99', 11, 0, -7.951479, 112.604637, '2020-05-12 11:10:49'),
(36, 'Warung Kopi GIRAS WAHYU 1', 11, 0, -7.951472, 112.601295, '2020-05-12 11:10:49'),
(37, 'Candi Resto', 11, 0, -7.952626, 112.601196, '2020-05-12 11:10:49'),
(38, 'Kedai Kopi Omah Kayu', 11, 0, -7.954827, 112.605934, '2020-05-12 11:10:49'),
(39, 'kriwul coffee and pool', 11, 0, -7.954311, 112.607353, '2020-05-12 11:10:49'),
(40, 'Rumah Kopi Redjo Oetomo 2', 11, 0, -7.952714, 112.606621, '2020-05-12 11:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
('1', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_location`
--
ALTER TABLE `data_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_location`
--
ALTER TABLE `data_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
