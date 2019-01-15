-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 15. Jan 2019 um 14:38
-- Server-Version: 5.5.62-0+deb8u1
-- PHP-Version: 7.0.32-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `prognose`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `transaktionen`
--

CREATE TABLE `transaktionen` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `betrag` float NOT NULL,
  `start` date NOT NULL,
  `wiederholung` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `typ` text NOT NULL,
  `steuersatz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `transaktionen`
--

INSERT INTO `transaktionen` (`id`, `userid`, `name`, `betrag`, `start`, `wiederholung`, `typ`, `steuersatz`) VALUES
(1, 1, 'Autokauf', 25000, '2018-12-24', 'jährlich', 'Ausgang', 19),
(19, 1, 'auto', 10, '2019-02-07', 'monatlich', 'Eingang', 19),
(21, 1, 'hgzhuh', 0.04, '2019-01-17', 'vierteljährlich', 'Eingang', 19);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `transaktionen`
--
ALTER TABLE `transaktionen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `transaktionen`
--
ALTER TABLE `transaktionen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
