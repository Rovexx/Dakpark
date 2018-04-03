-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 apr 2018 om 12:12
-- Serverversie: 10.1.28-MariaDB
-- PHP-versie: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muziekpraktijk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `user_id` int(8) NOT NULL,
  `user_leraar` tinyint(1) NOT NULL,
  `user_voornaam` varchar(256) NOT NULL,
  `user_achternaam` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_gebruikersnaam` varchar(256) NOT NULL,
  `user_wachtwoord` varchar(256) NOT NULL,
  `user_laatste_les` date NOT NULL DEFAULT '1970-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`user_id`, `user_leraar`, `user_voornaam`, `user_achternaam`, `user_email`, `user_gebruikersnaam`, `user_wachtwoord`, `user_laatste_les`) VALUES
(16, 1, 'Admin', 'Admin', 'admin@webmaster.nl', 'admin', '$2y$10$ugm.QR9c0jItJFP58PiFnOD0bZFJpYbXM1OjDuG7q4EoIqgpavaoy', '0000-00-00'),
(23, 0, 'Test', 'Test', 'test1@email.com', 'test1', '$2y$10$wiwO7W5JRT3G79xODnbiuOdjpkgL46Dom.c5cMhtOsv5/Tydrk8P2', '2018-04-09'),
(24, 0, 'Test', 'Test', 'test2@test.nl', 'test2', '$2y$10$EUHY6MOi8RiJa0zAIQk9QO0Jo2voZSObC0b7DVPEqgIY4m9TIoNDy', '2018-02-19'),
(25, 0, 'Test', 'Test', 'test3@email.nl', 'test3', '$2y$10$QyIx.APkU9vehyVh1zFcxejSv6joqyCQ1BxyNw2M8bOnbY3nz239u', '2018-02-19'),
(26, 0, 'Test', 'Test', 'test4@test.nl', 'test4', '$2y$10$55JH8V7aIIdGC5pYZpWaJuVUV90hLsAgHfGA1LxDKlyAbbetmN3La', '2018-02-19');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerlinglessen`
--

CREATE TABLE `leerlinglessen` (
  `id` int(255) NOT NULL,
  `user_id` int(8) NOT NULL,
  `les_datum` date NOT NULL,
  `les_tijd` varchar(5) NOT NULL,
  `les_nummer` varchar(10) NOT NULL,
  `les_betaal_methode` varchar(20) NOT NULL,
  `les_betaald` tinyint(1) NOT NULL DEFAULT '0',
  `les_instrument` varchar(255) NOT NULL,
  `les_deelgenomen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `leerlinglessen`
--

INSERT INTO `leerlinglessen` (`id`, `user_id`, `les_datum`, `les_tijd`, `les_nummer`, `les_betaal_methode`, `les_betaald`, `les_instrument`, `les_deelgenomen`) VALUES
(316, 23, '2018-01-22', '08:00', '1 van 5', 'Per bank', 0, 'Piano', 0),
(317, 23, '2018-01-29', '08:00', '2 van 5', 'Per bank', 0, 'Piano', 0),
(318, 23, '2018-02-05', '08:00', '3 van 5', 'Per bank', 0, 'Piano', 0),
(319, 23, '2018-02-12', '08:00', '4 van 5', 'Per bank', 0, 'Piano', 0),
(320, 23, '2018-02-19', '08:00', '5 van 5', 'Per bank', 0, 'Piano', 0),
(321, 23, '2018-02-26', '12:00', '1 van 5', 'Per bank', 0, 'Zang', 0),
(322, 23, '2018-03-05', '12:00', '2 van 5', 'Per bank', 0, 'Zang', 0),
(323, 23, '2018-03-12', '12:00', '3 van 5', 'Per bank', 0, 'Zang', 0),
(324, 23, '2018-03-19', '12:00', '4 van 5', 'Per bank', 0, 'Zang', 0),
(325, 23, '2018-03-26', '12:00', '5 van 5', 'Per bank', 0, 'Zang', 0),
(326, 24, '2018-01-22', '14:00', '1 van 5', 'Per bank', 0, 'Ukelele', 0),
(327, 24, '2018-01-29', '14:00', '2 van 5', 'Per bank', 0, 'Ukelele', 0),
(328, 24, '2018-02-05', '14:00', '3 van 5', 'Per bank', 0, 'Ukelele', 0),
(329, 24, '2018-02-12', '14:00', '4 van 5', 'Per bank', 0, 'Ukelele', 0),
(330, 24, '2018-02-19', '14:00', '5 van 5', 'Per bank', 0, 'Ukelele', 0),
(331, 25, '2018-01-22', '12:00', '1 van 5', 'Per bank', 0, 'Basgitaar', 0),
(332, 25, '2018-01-29', '12:00', '2 van 5', 'Per bank', 0, 'Basgitaar', 0),
(333, 25, '2018-02-05', '12:00', '3 van 5', 'Per bank', 0, 'Basgitaar', 0),
(334, 25, '2018-02-12', '12:00', '4 van 5', 'Per bank', 0, 'Basgitaar', 0),
(335, 25, '2018-02-19', '12:00', '5 van 5', 'Per bank', 0, 'Basgitaar', 0),
(336, 26, '2018-01-22', '20:00', '1 van 5', 'Per bank', 0, 'Cachon', 0),
(337, 26, '2018-01-29', '20:00', '2 van 5', 'Per bank', 0, 'Cachon', 0),
(338, 26, '2018-02-05', '20:00', '3 van 5', 'Per bank', 0, 'Cachon', 0),
(339, 26, '2018-02-12', '20:00', '4 van 5', 'Per bank', 0, 'Cachon', 0),
(340, 26, '2018-02-19', '20:00', '5 van 5', 'Per bank', 0, 'Cachon', 0),
(341, 23, '2018-04-02', '08:00', '1 van 2', 'Per bank', 0, 'Piano', 0),
(342, 23, '2018-04-09', '08:00', '2 van 2', 'Per bank', 0, 'Piano', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `leerlinglessen`
--
ALTER TABLE `leerlinglessen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT voor een tabel `leerlinglessen`
--
ALTER TABLE `leerlinglessen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
