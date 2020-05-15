-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1:3306
-- Genereringstid: 14. 05 2020 kl. 07:05:26
-- Serverversion: 10.4.10-MariaDB
-- PHP-version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `squadtsamlet`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `comment` text COLLATE latin1_danish_ci NOT NULL,
  `comment_to` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `comment`
--

INSERT INTO `comment` (`id`, `author_id`, `comment`, `comment_to`, `date`) VALUES
(2, 2, 'Hello my friend', 1, '2020-05-03 21:58:56');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE latin1_danish_ci NOT NULL,
  `description` text COLLATE latin1_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'drengen', 'det er drengene');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `members`
--

INSERT INTO `members` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `message` text COLLATE latin1_danish_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `message`
--

INSERT INTO `message` (`id`, `author_id`, `message`, `time`) VALUES
(1, 2, 'hey bois', '2020-05-02 15:52:32');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `message_receiver`
--

DROP TABLE IF EXISTS `message_receiver`;
CREATE TABLE IF NOT EXISTS `message_receiver` (
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `group_id` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `message_receiver`
--

INSERT INTO `message_receiver` (`user_id`, `message_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groups_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(30) COLLATE latin1_danish_ci NOT NULL,
  `post` text COLLATE latin1_danish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `posts`
--

INSERT INTO `posts` (`id`, `groups_id`, `author_id`, `title`, `post`, `date`) VALUES
(2, 1, 3, ' sadma', 'hello', '2020-05-13 12:15:03'),
(3, 1, 1, ' jeff', 'numse', '2020-05-03 21:36:47'),
(4, 1, 1, ' title', 'text', '2020-05-03 22:11:55'),
(5, 1, 1, ' hello', 'my name jeff', '2020-05-04 07:28:20');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_danish_ci NOT NULL,
  `email` varchar(40) COLLATE latin1_danish_ci NOT NULL,
  `password` varchar(30) COLLATE latin1_danish_ci NOT NULL,
  `description` text COLLATE latin1_danish_ci NOT NULL,
  `name` text COLLATE latin1_danish_ci NOT NULL,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `description`, `name`) VALUES
(1, 'jeffstemos', 'Jeff@gmail.com', 'jeff1234', ' - ', ''),
(2, 'Magnus6969', 'magnus69@gmail.com', 'rasmuserdenbedste', ' - ', ''),
(3, 'mynamejeff', 'mynamejeff@gmail.com', '12345', 'asda', 'Anders and');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
