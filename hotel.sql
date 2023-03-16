-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Jan 2023 um 23:53
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hotel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `date`, `image`, `content`) VALUES
(1, 'room ', '2023-01-15 16:35:55', 'hotel.jpg', 'room for 3'),
(2, 'room ', '2023-01-15 16:37:26', 'hotel.jpg', 'room for 2'),
(3, 'Room', '2023-01-15 17:00:33', 'hotel.jpg', 'Test upload'),
(4, 'Master Suite', '2023-01-15 22:40:12', 'HVJ-Hamburg-Alsterblick-Doppelzimmer-Beletage-01-4dfe8c79.jpg', 'The best. The most.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservations`
--

CREATE TABLE `reservations` (
  `res_id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `room_ID` int(11) NOT NULL,
  `from_date` varchar(20) NOT NULL,
  `until_date` varchar(20) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `pets` varchar(10) DEFAULT NULL,
  `parking` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `reservations`
--

INSERT INTO `reservations` (`res_id`, `user_ID`, `room_ID`, `from_date`, `until_date`, `notes`, `pets`, `parking`, `status`) VALUES
(2, 1, 6, '2023-01-16', '2023-01-17', 'flowers', NULL, 'option2', 'new'),
(3, 2, 1, '2023-01-18', '2023-01-19', 'beer', 'pets', 'parking', 'new'),
(40, 5, 4, '2023-01-18', '2023-01-19', 'sss', 'pets', NULL, 'accepted'),
(41, 5, 2, '2023-01-25', '2023-01-26', 'veg food', 'pets', NULL, 'canceled');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_nr` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_nr`, `size`, `type`, `price`) VALUES
(1, 101, 1, 'norm', 50),
(2, 102, 2, 'norm', 50),
(3, 103, 2, 'norm', 50),
(4, 104, 1, 'norm', 50),
(5, 105, 2, 'norm', 50),
(6, 201, 4, 'king', 150),
(7, 202, 4, 'king', 150),
(8, 203, 3, 'king', 150),
(9, 204, 4, 'king', 150),
(10, 205, 2, 'king', 150),
(11, 301, 6, 'empr', 800);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `title`, `firstname`, `lastname`, `status`) VALUES
(1, 'elias_real', '$2y$10$WI40m9mbJf3kFgfL8Bejne7nVpXfBw0RyX9wEHMIoUQJq1oDEE4.2', 'if22b171@technikum-wien.at', 'Herr', 'Elias', 'Karner', 'active'),
(2, 'hiep_real', '$2y$10$6N/CxD/8nIRvC/So2hmvAOCPcZHoZEIHH3tSHbkRs3kgNhqLMJOnq', 'if22b057@technikum-wien.at', 'Herr', 'Hiep', 'Le Duy', 'active'),
(4, 'user_1', '$2y$10$VLL.V7w9j/g9luxBWAVwqORlCPg06tyj9uDmxhurq5IsSlLzGE8j6', 'huber@gmx.at', 'Herr', 'Huber', 'Arno', 'active'),
(5, 'user_2', '$2y$10$AngkOpFKWbNLQq1Wznz1J.M3tjCtkqpJH1BtMAZoWR1Yl0uQznp5e', 'berner@lerna.at', 'Frau', 'Margit', 'Berner', 'inactive'),
(6, 'user_3', '$2y$10$.06ZMSW0e.UQw50Ml.AZnOzj08HFWS0pt/GpUYGeJJVP4EH5FfNy.', 'muster@max.com', 'Herr', 'Max', 'Mustermann', 'active');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `room_ID` (`room_ID`);

--
-- Indizes für die Tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `reservations`
--
ALTER TABLE `reservations`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT für Tabelle `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`room_ID`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
