-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Vært: localhost
-- Genereringstid: 18. 05 2020 kl. 13:03:15
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `comment` text COLLATE latin1_danish_ci NOT NULL,
  `comment_to` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `comment`
--

INSERT INTO `comment` (`id`, `author_id`, `comment`, `comment_to`, `date`) VALUES
(2, 2, 'Hello my friend', 1, '2020-05-03 21:58:56');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE latin1_danish_ci NOT NULL,
  `description` text COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'drengen', 'det er drengene'),
(2, 'bentes Gruppe', '');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `members`
--

INSERT INTO `members` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `message` text COLLATE latin1_danish_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `message`
--

INSERT INTO `message` (`id`, `author_id`, `message`, `time`) VALUES
(1, 2, 'hey bois', '2020-05-02 15:52:32');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `message_receiver`
--

CREATE TABLE `message_receiver` (
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
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

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(30) COLLATE latin1_danish_ci NOT NULL,
  `post` text COLLATE latin1_danish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `posts`
--

INSERT INTO `posts` (`id`, `groups_id`, `author_id`, `title`, `post`, `date`) VALUES
(2, 1, 3, ' sadma', 'hello', '2020-05-13 12:15:03'),
(3, 1, 1, ' jeff', 'numse', '2020-05-03 21:36:47'),
(4, 1, 1, ' title', 'text', '2020-05-03 22:11:55'),
(5, 1, 1, ' hello', 'my name jeff', '2020-05-04 07:28:20'),
(6, 1, 1, ' Hej', 'Rasmus', '2020-05-14 07:14:56'),
(7, 2, 8, 'Bente er sej', 'hun squatter 500 kg', '2020-05-18 08:30:29'),
(8, 1, 1, ' Hej', 'dav', '2020-05-18 08:46:29'),
(9, 1, 1, ' Hejhej', 'Hej', '2020-05-18 09:06:31'),
(10, 1, 1, ' Hejhej', 'Hej', '2020-05-18 09:11:06'),
(11, 2, 8, ' goddav', 'goddav', '2020-05-18 09:14:11'),
(12, 2, 8, ' skjer der', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et pariatur quaerat possimus debitis dolores laboriosam repellendus similique voluptatibus, natus tempora doloribus, fugiat, mollitia aperiam laudantium non suscipit consequatur ab odit.', '2020-05-18 09:20:53'),
(13, 2, 8, ' hejhej', 'Hej', '2020-05-18 09:21:13');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE latin1_danish_ci NOT NULL,
  `email` varchar(40) COLLATE latin1_danish_ci NOT NULL,
  `upassword` longtext COLLATE latin1_danish_ci NOT NULL,
  `description` text COLLATE latin1_danish_ci NOT NULL,
  `name` text COLLATE latin1_danish_ci NOT NULL,
  `gym` varchar(40) COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `upassword`, `description`, `name`, `gym`) VALUES
(4, 'Hej', 'Hej@gmail.com', 'hej', '', 'Anders', ''),
(5, 'dav', 'dav@gmail.com', 'dav', '', 'Rasmus', ''),
(6, 'rasmus', '', 'rasmus', '', '', ''),
(7, 'thomas', '', '?', '', '', ''),
(8, 'bente', 'bente@gmail.com', '$2y$10$7DSqDvgzaPJO7qJR/BsQy.GfVlWbnjGaTtn/Dx.w82NE7BijyV5Mu', '', 'bente', 'sats'),
(9, 'anders42', 'anders@gmail.com', '$2y$10$30RzuN7WTjhpePIok8VuAuJMY5Tp5UaubyjQy7HKbMtXxlZz9vHza', 'larger calves', 'Anders', 'sats'),
(10, 'bente2', 'bente2@gmail.com', '$2y$10$5uTgcTIRyRgs4IyMbtNDiuZZEQhV3YQsdrpvIaoZzgjg9EHQoaaLi', 'bente2', 'bente2', 'bente2'),
(11, 'Spooph', 'simon@documentary.dk', '$2y$10$QXDyfOpHDpo5RhYq24bUA.HxGfq7qFZukl5ORkCFgNvsMTT2cC9Q2', 'Big arms', 'Simon Helsted Juul', 'Go2 Fitness'),
(12, 'bente3', 'bente3@gmail.com', '$2y$10$M7tGIjlH9wL.XQ69EGoypeJj0ZNQ.U879/0BVvI1ij47QFpvqsHwq', 'bente3', 'bente3', 'bente3'),
(13, 'bente4', 'bente4@gmail.com', '$2y$10$rTuczKUmftWbW8v.2y9ZweVz1LIDh8YmdoPiFiXER.zeXCAja5j/y', 'bente4', 'bente4', 'bente4'),
(14, 'hans', 'hans@gm.com', '$2y$10$QoTipBNiiItpOkbOtucUp.iPOWwQ1E/.uyih3FYYv1u31UqV.wsTa', 'hans', 'hans', 'hans'),
(15, 'hans2', 'hans2@g.com', '$2y$10$06DVTZaj7MPVsLqc.bJOpeNvGnZtAvoZHsvEnIyFJVk/WjSw5oY62', 'hans2', 'hans2', 'hans2'),
(16, 'hans3', 'hans3@h.com', '$2y$10$uiyNrG5Z0EGIvlqul.Gp6eqHmX2tcPEHtc3gIZq.dAh2NZImZW7LS', 'hans3', 'hans3', 'hans3'),
(17, 'hans43', 'hans43@gm.com', '$2y$10$IABlhp3qh0eG5UozILf9ZO7QJENnrX3IRatlR5Wvu9XwbbzKdmiZa', 'hans43', 'hans43', 'hans43'),
(18, 'hans112', 'hans112@g.com', '$2y$10$5tXmdAawMXvZ1ouSEEW2a.RpI8tDFyMWxtVWDCMowVhw6gfFQfObO', 'hans112', 'hans112', 'hans112'),
(19, 'hansmanden', 'hansmanden@g.com', '$2y$10$n3O4ndjen.iOAy.VL7fCYepifca8n0VoVUmCeKXpgL/xXga67.5fW', 'hansmanden', 'hansmanden', 'hansmanden'),
(20, 'hejsa', 'hejsa@gm.com', '$2y$10$PhxTrTCrmVaenY/oJiMYauckQwpizTQmbBb.UBd.PEMs7Zr1O9cpW', 'hejsa', 'hejsa', 'hejsa'),
(21, 'davRasmus', 'davRasmus@g.com', '$2y$10$BpJEVT6BajZxqXVWsrnn4.z80SvrDYUzqnxG8DkORk7NDmuawWKlO', 'davRasmus', 'davRasmus', 'davRasmus'),
(22, 'hejsa309', 'hejsa309@gm.com', '$2y$10$gkuabdch2kHvQNwGLyBbEO/AICIA2SEZr/bK5AE1Qi604NaKAwmp.', 'hejsa309', 'hejsa309', 'hejsa309'),
(23, 'hejsa3091', 'hejsa3091@gm.com', '$2y$10$PISaFNyTvBqnNlWSLAtQr.ZWl1.h3KBAbCl02DOwwO14ktn6n8W12', 'hejsa3091', 'hejsa3091', 'hejsa3091'),
(24, 'hejsa3092', 'hejsa3092@gm.com', '$2y$10$Xx2woZp5pQ5fO2WGl3O2l.cq4kJx9Z1GMhpphXs/wsoaWpDPue7va', 'hejsa3092', 'hejsa3092', 'hejsa3092'),
(25, 'hjk12', 'hjk12@gm.com', '$2y$10$UbfIRUvJd5aVP0MaVCU6IOTc4vZU3R9dsOKBttXf7uFQKWU.C4ncm', 'hjk12', 'hjk12', 'hjk12'),
(26, 'mn', 'mn@gm.com', '$2y$10$wus792zYyM3/rnhBrEkfn.j.g4nY2lMCaebE.5w/0mzjarYenYsZ6', 'mn', 'mn', 'mn'),
(27, 'ghjk', 'ghjk@gm.com', '$2y$10$rsOvFr9W5y5/Fjiq3Wmt8.5WQEhwNSQsuBh12SbqQNuOMuJZH8dei', 'ghjk', 'ghjk', 'ghjk'),
(28, 'bob', 'bob@g.com', '$2y$10$XyNgm1junN0M7HSBaKa8Jeg5gfFqVXr6cSXA7vXlha8Vb9G8oxkF.', 'bob', 'bob', 'bob'),
(29, 'anders10', 'andersbj1@gmail.com', '$2y$10$zby0yVE1idQhVFwHKuijQetnUqAEDE7AuJ0kdcCSXSi64bbMxWOvW', 'tabe fedt', 'Anders Øbro', 'Sats Nyborgvej '),
(30, 'jkl', 'jkl@g.com', '$2y$10$qTWdd6G9pk8qMaMM86Er3.d9Ueymsp/0c5G9ZaFsL.0W8c89QEE.W', 'jkl', 'jkl', 'jkl'),
(31, 'flottefyr', 'flottefyr@g.com', '$2y$10$GVY0Ii46bXDMlpwEqMoZseOaFH.ysNbh9uHtqhxuYIQapbV/b9xnG', 'flottefyr', 'flottefyr', 'flottefyr');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `members`
--
ALTER TABLE `members`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indeks for tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `message_receiver`
--
ALTER TABLE `message_receiver`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`message_id`);

--
-- Indeks for tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
