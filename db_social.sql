-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 02:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(12) NOT NULL,
  `send` varchar(256) NOT NULL,
  `receive` varchar(256) NOT NULL,
  `time` time(6) NOT NULL,
  `text` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_auth`
--

CREATE TABLE `history_auth` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_auth`
--

INSERT INTO `history_auth` (`id`, `email`, `ip`, `date_login`) VALUES
(1, 'poomzaza@hotmail.com', '127.0.0.1', '2020-11-10'),
(2, 'poomzaza@hotmail.com', '127.0.0.1', '2020-11-10'),
(3, 'poomzaza@hotmail.com', '127.0.0.1', '2020-11-10'),
(4, 'poomzaza@hotmail.com', '127.0.0.1', '2020-11-10'),
(5, 'poomzaza@hotmail.com', '127.0.0.1', '2020-11-10'),
(6, 'poomzaza@hotmail.com', '127.0.0.1', '2020-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `posted`
--

CREATE TABLE `posted` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `owners_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `img` varchar(256) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posted`
--

INSERT INTO `posted` (`id`, `description`, `owners_id`, `date`, `img`, `type`) VALUES
(1, 'ทดสอบเนื้อหา', 23, '2020-11-10', 'Test.jpg', 'text'),
(3, '', 23, '2020-11-10', 'feed_5faa8f8b1b75c.jpg', 'img'),
(4, '', 23, '2020-11-10', 'feed_5faa9078e4fbd.jpg', 'img');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `session_login` int(11) NOT NULL COMMENT '0 = offline, 1 = online',
  `avatar` varchar(256) NOT NULL DEFAULT 'fox.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `tel`, `session_login`, `avatar`) VALUES
(19, 'kunaun6789@gmail.com', 'ce73e46004aaf5baaa11072c6de42044', 'Thanawit', 'Tantrawat', '', 0, 'fox.jpg'),
(20, 'poomz0962@hotmail.com', '89f76a680ad44ad1e989aa06a4aab781', 'poom', 'z', '0962342804', 0, 'fox.jpg'),
(22, 'opal@opal.com', '1a3372d3a3b947620e8414c635051f46', 'Lucky', 'Thongaram', '0837645655', 0, 'fox.jpg'),
(23, 'poomzaza@hotmail.com', '89f76a680ad44ad1e989aa06a4aab781', 'PoomZ', 'XX', '0999999999', 1, 'profile_5faa867fa0e86.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_auth`
--
ALTER TABLE `history_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posted`
--
ALTER TABLE `posted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_auth`
--
ALTER TABLE `history_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posted`
--
ALTER TABLE `posted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
