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
-- Table structure for table `upcoming_movie`
--

CREATE TABLE `upcoming_movie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upcoming_movie`
--

INSERT INTO `upcoming_movie` (`id`, `name`, `duration`, `category`, `description`, `image`) VALUES
(4, 'Archer', 160, 'Adventure', '\"Archer\" is an animated television series following the misadventures of the suave yet incompetent spy Sterling Archer and his colleagues at a dysfunctional intelligence agency.', 'Archer.jpg'),
(5, 'Dune', 160, 'Adventure', '\"Dune\" is a sci-fi epic that follows Paul Atreides as he navigates political intrigue and desert warfare on the planet Arrakis, home to a valuable resource known as spice.', 'Dune.jpg'),
(6, 'Fast and Furious', 135, 'Action', '\"Fast & Furious\" is a high-octane film series centered around street racing, heists, and international espionage, featuring a diverse cast of characters and adrenaline-fueled action sequences.', 'Fast and Furious.jpg'),
(7, 'Ghost Busters', 120, 'Adventure', '\"Ghostbusters\" is a supernatural comedy film where a team of eccentric scientists-turned-ghost hunters save New York City from paranormal threats using their advanced technology and quirky charm.', 'Ghost Busters movie.jpg'),
(8, 'Luca', 150, 'Adventure', '\"Luca\" is a heartwarming animated film by Pixar about a young sea monster named Luca who experiences an unforgettable summer adventure on the Italian Riviera, where he forms a deep friendship while hiding his true identity.', 'Luca.jpg'),
(9, 'Jaws', 120, ' thriller', '\"Jaws\" is a classic thriller film directed by Steven Spielberg, revolving around a small coastal town terrorized by a great white shark, prompting a trio of unlikely heroes to embark on a dangerous mission to stop it.', 'Jaws.jpg'),
(10, 'Mission Impossible', 170, 'Action', '\"Mission: Impossible\" is a thrilling action film series following IMF agent Ethan Hunt as he undertakes daring missions around the world, often defying the odds and battling against formidable adversaries.', 'Mission Impossible movie.jpg'),
(11, 'The Nun', 140, 'Horror', '\"The Nun\" is a horror film in \"The Conjuring\" universe, focusing on a demonic entity terrorizing a convent in Romania and the investigation led by a priest and a novitiate before the events of \"The Conjuring 2.\"', 'The Nun.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `upcoming_movie`
--
ALTER TABLE `upcoming_movie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upcoming_movie`
--
ALTER TABLE `upcoming_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
