-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 12:17 PM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `usersId` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL,
  `movieTitle` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `usersId`, `date`, `message`, `movieTitle`) VALUES
(10, '3', '2024-06-05 21:38:26', 'hhahaahaha', 'Evil Dead Rise'),
(12, '3', '2024-06-05 23:20:43', 'Hello there. This is a testing comment, this is the first comment   ', 'Evil Dead Rise'),
(13, '4', '2024-06-06 00:11:24', 'hahahahahahaha', 'Evil Dead Rise'),
(15, '3', '2024-06-06 00:54:20', 'test', 'Ant-Man and the wasp: Quantumania'),
(16, '3', '2024-06-06 11:27:48', 'asdasds', 'Evil Dead Rise'),
(17, '3', '2024-06-06 11:27:52', 'Aas', 'Evil Dead Rise'),
(18, '3', '2024-06-06 11:28:00', 'asdasggg', 'Evil Dead Rise'),
(19, '3', '2024-06-06 11:37:48', 'hahahahahahaha', 'Ant-Man and the wasp: Quantumania'),
(22, '3', '2024-06-08 00:57:30', 'asdas\r\nasdasdasd', 'Evil Dead Rise'),
(23, '3', '2024-06-08 00:57:30', 'asdas\r\nasdasdasd', 'Evil Dead Rise'),
(24, '3', '2024-06-08 01:02:08', 'asdasd\r\nasdasdsad', 'Evil Dead Rise'),
(25, '3', '2024-06-08 01:02:17', 'asdasdsad\r\nasdasdasd\r\nsadsa', 'Evil Dead Rise'),
(30, '3', '2024-06-10 14:56:27', 'sADSA\r\nASDASD\r\nAS\r\nD', 'Evil Dead Rise'),
(36, '7', '2024-06-11 02:11:30', 'qeqweqeqweqwewrer', 'Evil Dead Rise'),
(37, '7', '2024-06-11 02:11:37', 'erewr\r\nwe\r\nr\r\nwer\r\nw\r\ner\r\nwe\r\nrwe\r\nr\r\newr\r\newr', 'Evil Dead Rise'),
(39, '8', '2024-06-19 22:06:07', 'acacscsac', 'Evil Dead Rise'),
(41, '8', '2024-06-30 00:35:41', 'ZZXZx', 'Deadpool'),
(45, '8', '2024-06-30 18:00:42', 'xcxcxd\r\nsf\r\nsd\r\nf\r\nds\r\nf\r\nsd\r\nf\r\nsd\r\nf\r\ns\r\ndf\r\ns\r\ndf\r\nsd\r\nf\r\ns\r\nf\r\nsd\r\nf\r\ns\r\nf\r\nsd\r\nf\r\nsd\r\nf\r\nds\r\nf\r\ns', 'Kung Fu Panda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
