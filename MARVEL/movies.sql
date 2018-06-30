-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2018 at 03:17 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `marvel`
--

CREATE TABLE `marvel` (
  `movie_ID` int(11) NOT NULL,
  `movie_Title` varchar(99) NOT NULL,
  `movie_Rating` float NOT NULL,
  `movie_Budget` int(11) NOT NULL,
  `movie_Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marvel`
--

INSERT INTO `marvel` (`movie_ID`, `movie_Title`, `movie_Rating`, `movie_Budget`, `movie_Year`) VALUES
(1, 'Thor: Ragnarok', 8, 18000000, 2017),
(2, 'Captain America: The First Avenger', 7, 14000000, 2011),
(3, 'Iron Man', 8, 14000000, 2008),
(4, 'The Incredible Hulk', 7, 15000000, 2008),
(5, 'Iron Man 2', 7, 20000000, 20010),
(6, 'The Avengers', 8, 22000000, 2012),
(7, 'Iron Man 3', 7, 20000000, 2013),
(8, 'Thor: The Dark World', 7, 152000000, 2013),
(9, 'Captain America: The Winter Soldier', 8, 17000000, 2014),
(10, 'Guardians of the Galaxy', 8, 20000000, 2014),
(11, 'Guardians of the Galaxy Vol. 2', 8, 20000000, 2017),
(12, 'Avengers: Age of Ultron', 7, 365000000, 2015),
(13, 'Ant-Man', 7, 130000000, 2015),
(14, 'Captain America: Civil War', 8, 250000000, 2016),
(15, 'Spider-Man: Homecoming', 8, 175000000, 2017),
(16, 'Doctor Strange', 8, 165000000, 2016),
(17, 'Thor: Ragnarok', 8, 180000000, 2017),
(18, 'Black Panther', 8, 200000000, 2018),
(19, 'Avengers: Infinity War', 9, 400000000, 2018),
(20, 'Fantastic Four', 4, 155000000, 2015);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marvel`
--
ALTER TABLE `marvel`
  ADD PRIMARY KEY (`movie_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marvel`
--
ALTER TABLE `marvel`
  MODIFY `movie_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
