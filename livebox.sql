-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 08:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livebox`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `postid`, `userid`) VALUES
(6, 2, 4),
(7, 1, 4),
(10, 8, 1),
(11, 6, 9),
(13, 4, 4),
(14, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `profilepic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `pass`, `profilepic`) VALUES
(1, 'Jagdeep Singh', 'pbxmalhiofficial@gmail.com', 'pbx__malhi', '12341234', '1.png'),
(2, 'Pardeep singh', 'test@gmail.com', 'pardeep0001', '123123', '2.jpeg'),
(3, 'Sunny', 'againtest@gmail.com', 'again', '123', '3.jpeg'),
(4, 'Foo Fofo', 'fofo@gmail.com', 'foo_fofo', '1234', '4.jpg'),
(5, 'Akash', 'akash@gmail.com', 'akash0001', '123456', '5.jpg'),
(6, 'Sunny', 'sunny@gmail.com', 'sunny', '123', '6.png'),
(7, 'test1', 'test3@gmail.com', 'test3', '123', '7.png'),
(8, 'Pardeep singh', 'test4@gmail.com', 'test4', '123', '8.jpeg'),
(9, 'Ishant Narula', 'ishantnarula787@gmail.com', 'ishant.21', '12341234', '9.jpg'),
(10, 'KumKum', 'kumkum@gmail.com', 'aroraKumkum', '123123', '10.png');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postdesc` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `userid`, `postdesc`, `photo`, `visibility`, `views`) VALUES
(3, 4, 'It\'s not sweat, it\'s the post-workout glow.', '3.jpg', 'private', 7),
(4, 4, 'Hari Singh Nalwa was the Commander-in-chief at the most turbulent North West Frontier of Ranjit Singh\'s kingdom.', '4.jpg', 'public', 5),
(5, 1, 'I always feel my best after hitting the gym.', '5.jpg', 'public', 2),
(6, 1, 'Chasing an endorphin rush.', '6.jpg', 'public', 7),
(8, 4, 'On good days, work out. On bad days, work out harder', '8.jpg', 'public', 3),
(9, 4, 'Uploaded Test Post', '9.jpg', 'public', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
