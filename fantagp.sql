-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 02, 2024 alle 09:31
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fantagp`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `lega`
--

CREATE TABLE `lega` (
  `Id` int(11) NOT NULL,
  `NomeLega` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `lega`
--

INSERT INTO `lega` (`Id`, `NomeLega`) VALUES
(29, 'Formula1Test');

-- --------------------------------------------------------

--
-- Struttura della tabella `membro`
--

CREATE TABLE `membro` (
  `CodUtente` int(11) NOT NULL,
  `CodLega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `membro`
--

INSERT INTO `membro` (`CodUtente`, `CodLega`) VALUES
(18, 29),
(25, 29);

-- --------------------------------------------------------

--
-- Struttura della tabella `pilota`
--

CREATE TABLE `pilota` (
  `Numero` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Punti` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `pilota`
--

INSERT INTO `pilota` (`Numero`, `Nome`, `Cognome`, `Punti`) VALUES
(1, 'Max', 'Verstappen', 169),
(2, 'Logan', 'Sargeant', 0),
(3, 'Daniel', 'Ricciardo', 5),
(4, 'Lando', 'Norris', 113),
(10, 'Pierre', 'Gasly', 1),
(11, 'Sergio', 'Perez', 107),
(14, 'Fernando', 'Alonso', 33),
(16, 'Charles', 'Leclerc', 138),
(18, 'Lance', 'Stroll', 11),
(20, 'Kevin', 'Magnussen', 1),
(22, 'Yuki', 'Tsunoda', 19),
(23, 'Alex', 'Albon', 2),
(24, 'Guanyu', 'Zhou', 0),
(27, 'Nico', 'Hülkenberg', 6),
(31, 'Esteban', 'Ocon', 1),
(38, 'Oliver', 'Bearman', 6),
(44, 'Lewis', 'Hamilton', 42),
(55, 'Carlos', 'Sainz', 108),
(63, 'George', 'Russel', 54),
(77, 'Valtteri', 'Bottas', 0),
(81, 'Oscar', 'Piastri', 71);

-- --------------------------------------------------------

--
-- Struttura della tabella `squadra`
--

CREATE TABLE `squadra` (
  `CodUtente` int(11) NOT NULL,
  `CodLega` int(11) NOT NULL,
  `NomeSquadra` varchar(50) DEFAULT NULL,
  `Punteggio` int(11) DEFAULT NULL,
  `CodPilota1` int(11) DEFAULT NULL,
  `CodPilota2` int(11) DEFAULT NULL,
  `CodPilota3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `squadra`
--

INSERT INTO `squadra` (`CodUtente`, `CodLega`, `NomeSquadra`, `Punteggio`, `CodPilota1`, `CodPilota2`, `CodPilota3`) VALUES
(18, 29, 'DigioRS', NULL, NULL, NULL, NULL),
(25, 29, 'Catoz', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `User` varchar(50) NOT NULL,
  `Monete` int(11) DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Id`, `Nome`, `Cognome`, `Email`, `Password`, `User`, `Monete`) VALUES
(18, 'Fabio', 'Di Giovanni', 'fabiodigiovanni77@gmail.com', 'fabio777', 'Digio', 100),
(25, 'Filippo', 'Catozzi', 'cato@email.com', 'fabio777', 'Fillo_Cato', 50);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `lega`
--
ALTER TABLE `lega`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NomeSquadra` (`NomeLega`);

--
-- Indici per le tabelle `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`CodUtente`,`CodLega`),
  ADD KEY `CodLega` (`CodLega`);

--
-- Indici per le tabelle `pilota`
--
ALTER TABLE `pilota`
  ADD PRIMARY KEY (`Numero`);

--
-- Indici per le tabelle `squadra`
--
ALTER TABLE `squadra`
  ADD PRIMARY KEY (`CodUtente`,`CodLega`),
  ADD KEY `CodLega` (`CodLega`),
  ADD KEY `CodPilota1` (`CodPilota1`),
  ADD KEY `CodPilota2` (`CodPilota2`),
  ADD KEY `CodPilota3` (`CodPilota3`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `User` (`User`),
  ADD UNIQUE KEY `User_2` (`User`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `lega`
--
ALTER TABLE `lega`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `membro`
--
ALTER TABLE `membro`
  ADD CONSTRAINT `membro_ibfk_1` FOREIGN KEY (`CodUtente`) REFERENCES `utente` (`Id`),
  ADD CONSTRAINT `membro_ibfk_2` FOREIGN KEY (`CodLega`) REFERENCES `lega` (`Id`);

--
-- Limiti per la tabella `squadra`
--
ALTER TABLE `squadra`
  ADD CONSTRAINT `squadra_ibfk_1` FOREIGN KEY (`CodUtente`) REFERENCES `utente` (`Id`),
  ADD CONSTRAINT `squadra_ibfk_2` FOREIGN KEY (`CodLega`) REFERENCES `lega` (`Id`),
  ADD CONSTRAINT `squadra_ibfk_3` FOREIGN KEY (`CodPilota1`) REFERENCES `pilota` (`Numero`),
  ADD CONSTRAINT `squadra_ibfk_4` FOREIGN KEY (`CodPilota2`) REFERENCES `pilota` (`Numero`),
  ADD CONSTRAINT `squadra_ibfk_5` FOREIGN KEY (`CodPilota3`) REFERENCES `pilota` (`Numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
