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
-- Table structure for table `now_showing_movie`
--

CREATE TABLE `now_showing_movie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `now_showing_movie`
--

INSERT INTO `now_showing_movie` (`id`, `name`, `duration`, `category`, `description`, `image`, `price`) VALUES
(9, 'Deadpool', 135, 'Adventure', '\"Deadpool\" is a comedic and irreverent superhero film featuring the wisecracking and self-aware mercenary Wade Wilson, known as Deadpool, as he seeks revenge against those who disfigured him.\r\n', 'Deadpool&Wolverine_nowshowing.jpg', 15.00),
(10, 'Kung Fu Panda ', 150, 'Comedy', '\"Kung Fu Panda\" is an animated film about a clumsy panda named Po who becomes a martial arts hero destined to save his village from an evil villain.', 'kungfupanda4_nowshowing.jpg', 12.00),
(12, 'Marvels: Antman', 135, 'Adventure', '\"Ant-Man\" is a superhero film following Scott Lang, a thief turned miniature hero who can shrink in size while increasing in strength, as he teams up with Dr. Hank Pym to pull off a heist that could save the world.', 'Marvels movie.jpg', 8.00),
(14, 'Evil Dead Rise', 150, ' Horror', '\"Evil Dead Rise\" is a terrifying horror film where two estranged sisters must confront a demonic force after discovering a mysterious book in their high-rise apartment, unleashing a fight for survival.', 'Evil Dead Rise movie.jpg', 10.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `now_showing_movie`
--
ALTER TABLE `now_showing_movie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `now_showing_movie`
--
ALTER TABLE `now_showing_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
