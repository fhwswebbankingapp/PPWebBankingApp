-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jan 2019 um 14:03
-- Server-Version: 10.1.36-MariaDB
-- PHP-Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `onlinebanking`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `konto`
--

CREATE TABLE `konto` (
  `IBAN` int(30) NOT NULL,
  `BETRAG` decimal(10,2) NOT NULL,
  `KUNDE_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `konto`
--

INSERT INTO `konto` (`IBAN`, `BETRAG`, `KUNDE_ID`) VALUES
(123433, '180.00', 1),
(123456, '390.00', 1),
(234567, '150.00', 2),
(234877, '132.00', 2),
(345678, '190.00', 3),
(456789, '200.00', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `VORNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`ID`, `NAME`, `VORNAME`) VALUES
(1, 'Meier', 'Hans'),
(2, 'Schmidt', 'Lisa'),
(3, 'Mustermann', 'Max'),
(4, 'Hermann', 'Heinz');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ueberweisung`
--

CREATE TABLE `ueberweisung` (
  `UE_ID` int(20) NOT NULL,
  `V_IBAN` int(11) NOT NULL,
  `A_IBAN` int(11) NOT NULL,
  `BETRAG` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `ueberweisung`
--

INSERT INTO `ueberweisung` (`UE_ID`, `V_IBAN`, `A_IBAN`, `BETRAG`) VALUES
(12, 123433, 123456, '10.00'),
(13, 234567, 234877, '100.00'),
(14, 123433, 123456, '10.00'),
(15, 123433, 123456, '10.00'),
(16, 123433, 123456, '10.00'),
(17, 123456, 123433, '10.00'),
(18, 123433, 123456, '400.00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `konto`
--
ALTER TABLE `konto`
  ADD PRIMARY KEY (`IBAN`),
  ADD UNIQUE KEY `IBAN` (`IBAN`),
  ADD KEY `Kundenbeziehung` (`KUNDE_ID`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `ueberweisung`
--
ALTER TABLE `ueberweisung`
  ADD PRIMARY KEY (`UE_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `ueberweisung`
--
ALTER TABLE `ueberweisung`
  MODIFY `UE_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `konto`
--
ALTER TABLE `konto`
  ADD CONSTRAINT `Kundenbeziehung` FOREIGN KEY (`KUNDE_ID`) REFERENCES `kunde` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
