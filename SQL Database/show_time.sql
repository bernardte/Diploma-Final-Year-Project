-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 12:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `showId` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `showTime` varchar(128) NOT NULL,
  `showDate` varchar(128) NOT NULL,
  `hall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`showId`, `name`, `showTime`, `showDate`, `hall`) VALUES
(1, 'Deadpool', '11:00AM', '10 JUL', 1),
(2, 'Deadpool', '13:30PM', '10 JUL', 1),
(3, 'Deadpool', '16:00PM', '10 JUL', 1),
(4, 'Kung Fu Panda ', '11:00AM', '10 JUL', 2),
(5, 'Kung Fu Panda ', '13:00PM', '10 JUL', 2),
(6, 'Kung Fu Panda ', '15:00PM', '10 JUL', 2),
(7, 'Kung Fu Panda ', '17:00PM', '10 JUL', 2),
(8, 'Marvels: Antman', '11:00AM', '10 JUL', 3),
(9, 'Marvels: Antman', '13:30PM', '10 JUL', 3),
(10, 'Marvels: Antman', '16:00PM', '10 JUL', 3),
(11, 'Evil Dead Rise', '19:00PM', '10 JUL', 2),
(12, 'Evil Dead Rise', '21:00PM', '10 JUL', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`showId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `showId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
