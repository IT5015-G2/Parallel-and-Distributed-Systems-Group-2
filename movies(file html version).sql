-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 01:05 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(10) NOT NULL,
  `movie_title` varchar(256) NOT NULL,
  `movie_year` int(11) NOT NULL,
  `movie_pic` varchar(200) NOT NULL,
  `movie_wide_pic` varchar(200) NOT NULL,
  `movie_rating` varchar(10) NOT NULL,
  `movie_description` text NOT NULL,
  `movie_budget` varchar(50) NOT NULL,
  `movie_box_office` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `movie_year`, `movie_pic`, `movie_wide_pic`, `movie_rating`, `movie_description`, `movie_budget`, `movie_box_office`) VALUES
(16, 'The Avengers', 2012, 'https://pmcvariety.files.wordpress.com/2014/04/01-avengers-2012.jpg?w=1000&h=563&crop=1', 'https://jaysanalysis.files.wordpress.com/2015/04/the-avengers-wallimages1.jpg', '8.1/10', 'What do you expect when six mighty super heroes - Iron Man, Captain America, Thor, Black Widow, Hawkeye, Hulk - \'assemble\' together on the silver screen for one common purpose? Action unlimited. High voltage drama. Larger-than-life effects. Throw in some smart one liners (humorous of course) and you maybe in for some push button video gaming fantasy movie.', '$220 million', '$1.519 billion'),
(17, 'Avengers: Infinity War', 2018, 'https://cdn.theatlantic.com/assets/media/img/mt/2018/04/infinity_war_review_thanos/lead_720_405.jpg?mod=1524754858', 'https://cdn.arstechnica.net/wp-content/uploads/2018/04/aveng-infinwar-logo.jpg', '9/10', 'World-shaking events are kid stuff in â€œAvengers: Infinity War,â€ the first installment of a two-part sequel to â€œThe Avengersâ€ and â€œAvengers: Age of Ultron.â€ The whole universe is under attack from Thanos, an infinitely villainous villain sporting a multicleft, prognathous chin. Universe-shaking throwdowns succeed one another with truly stupefying regularity as the Avengers and their Guardians of the Galaxy allies take turns rising to the challenge. But moments that touch the heart are few and far between in this almost-culmination of a decade of Marvel Comics movies. The finale, scheduled for release in May 2019, may well bring the adventure to fittingly grand fruition. Whatâ€™s on screen now, however, is table-setting for events to come, a groaning board of superheroes, a superabundance of undifferentiated superpowers, and an ending thatâ€™s more exciting than anything that precedes it.', '$316â€“400 million', '$2.038 billion'),
(18, 'Captain America: The First Avenger', 2012, 'https://cdn3.whatculture.com/images/2017/07/701aabd22c770d51-600x400.jpg', 'https://i.pinimg.com/originals/4d/e1/15/4de1154d78fdb85230ef504cc46b011d.jpg', '6.9/10', 'The words \"The First Avenger\" are fraught with significance for Marvel fans. We have already had films inspired by Iron Man, the Hulk and Thor. Still to come, without doubt, are Ant-Man and Wasp. This film opens with the discovery of an enormous flying wing embedded in polar ice, and when a gloved hand reaches out to brush away the ice on a window, why, there\'s Captain America\'s shield! This film\'s plot involves his origin story and adventures during World War II, and I\'m sure we\'ll discover in sequels that he was revived after the cryogenic nap to crusade again in the new day.', '$140â€“216.7 million', '$370.6 million');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
