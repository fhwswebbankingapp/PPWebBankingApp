-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Jan 2019 um 04:03
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
-- Tabellenstruktur für Tabelle `accountactivation`
--

CREATE TABLE `accountactivation` (
  `ID` int(10) NOT NULL,
  `KUNDE_ID` int(10) NOT NULL,
  `EXPIRY` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabelle mit den Sekundärschlüsseln zur Aktivierung neuer Act';

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
(123433, '170.00', 1),
(123456, '410.00', 1),
(234567, '150.00', 2),
(234877, '132.00', 2),
(345678, '180.00', 3),
(456789, '200.00', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(20) CHARACTER SET latin1 NOT NULL,
  `VORNAME` varchar(20) CHARACTER SET latin1 NOT NULL,
  `PASSWORD` char(128) CHARACTER SET ascii NOT NULL,
  `EMAIL` varchar(128) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `EXPIRY` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`ID`, `NAME`, `VORNAME`, `PASSWORD`, `EMAIL`, `EXPIRY`) VALUES
(1, 'Meier', 'Hans', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86', '', '2019-01-19'),
(2, 'Schmidt', 'Lisa', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86', '', '2019-01-19'),
(3, 'Mustermann', 'Max', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86', '', '2019-01-19'),
(4, 'Hermann', 'Heinz', 'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86', '', '2019-01-19'),


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recovery`
--

CREATE TABLE `recovery` (
  `ID` int(10) NOT NULL,
  `RECOVERY_KEY` char(128) NOT NULL,
  `EXPIRY` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `KUNDE_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sessions`
--

CREATE TABLE `sessions` (
  `ses_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ses_time` int(11) DEFAULT NULL,
  `ses_value` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `sessions`
--

INSERT INTO `sessions` (`ses_id`, `ses_time`, `ses_value`) VALUES
('11', 15, '194');

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
(18, 123433, 123456, '400.00'),
(19, 345678, 123433, '10.00'),
(20, 123456, 123433, '10.00'),
(21, 123433, 123456, '10.00'),
(22, 123433, 123456, '10.00'),
(23, 123433, 123456, '10.00'),
(24, 234567, 345678, '0.00'),
(25, 123456, 345678, '0.00'),
(26, 345678, 234877, '0.00'),
(27, 234877, 234567, '0.00'),
(28, 345678, 234567, '0.00'),
(29, 234567, 234877, '0.00'),
(30, 234877, 234567, '0.00'),
(31, 456789, 345678, '0.00'),
(32, 345678, 123456, '0.00'),
(33, 456789, 234567, '0.00'),
(34, 456789, 123456, '0.00'),
(35, 456789, 345678, '0.00'),
(36, 234567, 456789, '0.00'),
(37, 123456, 345678, '0.00'),
(38, 234567, 234877, '0.00'),
(39, 234877, 345678, '0.00');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `accountactivation`
--
ALTER TABLE `accountactivation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `accountactivation_kunde_id__zu__kunde_id` (`KUNDE_ID`);

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
-- Indizes für die Tabelle `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `Zuordnung_kunde.ID_recovery.kunde_ID` (`KUNDE_ID`);

--
-- Indizes für die Tabelle `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`ses_id`);

--
-- Indizes für die Tabelle `ueberweisung`
--
ALTER TABLE `ueberweisung`
  ADD PRIMARY KEY (`UE_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `accountactivation`
--
ALTER TABLE `accountactivation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT für Tabelle `recovery`
--
ALTER TABLE `recovery`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT für Tabelle `ueberweisung`
--
ALTER TABLE `ueberweisung`
  MODIFY `UE_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `accountactivation`
--
ALTER TABLE `accountactivation`
  ADD CONSTRAINT `accountactivation_kunde_id__zu__kunde_id` FOREIGN KEY (`KUNDE_ID`) REFERENCES `kunde` (`ID`);

--
-- Constraints der Tabelle `konto`
--
ALTER TABLE `konto`
  ADD CONSTRAINT `Kundenbeziehung` FOREIGN KEY (`KUNDE_ID`) REFERENCES `kunde` (`ID`);

--
-- Constraints der Tabelle `recovery`
--
ALTER TABLE `recovery`
  ADD CONSTRAINT `Zuordnung_kunde.ID_recovery.kunde_ID` FOREIGN KEY (`KUNDE_ID`) REFERENCES `kunde` (`ID`);

DELIMITER $$
--
-- Ereignisse
--
CREATE DEFINER=`root`@`localhost` EVENT `DELETE_EXPIRED_RECOVERY` ON SCHEDULE EVERY 1 DAY STARTS '2019-01-27 00:00:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Dieser Task löscht täglich abgelaufene Password-Recoverys' DO DELETE FROM `recovery` WHERE `EXPIRY`<=CURRENT_TIMESTAMP()$$

CREATE DEFINER=`root`@`localhost` EVENT `(DISABLED) DELETE EXPIRED ACTIVATION KEYS` ON SCHEDULE EVERY 1 DAY STARTS '2019-01-28 00:00:00' ON COMPLETION NOT PRESERVE DISABLE DO DELETE FROM `accountactivation` WHERE `EXPIRY`<=CURRENT_DATE()$$

CREATE DEFINER=`root`@`localhost` EVENT `(DISABLED) DELETE EXPIRED USERS` ON SCHEDULE EVERY 1 DAY STARTS '2019-01-29 00:00:00' ON COMPLETION NOT PRESERVE DISABLE DO DELETE FROM `kunde` WHERE `kunde`.`EXPIRY` <= CURRENT_DATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
