-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 03, 2024 alle 15:03
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
-- Struttura della tabella `gara`
--

CREATE TABLE `gara` (
  `Anno` int(11) NOT NULL,
  `Luogo` varchar(50) NOT NULL,
  `Nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(54, 'adad'),
(44, 'FerrariVince'),
(49, 'FerrariVinced'),
(50, 'FerrariVinceds'),
(51, 'FerrariVincedsd'),
(55, 'gdgfdg'),
(57, 'sasso'),
(52, 'sdfsdf'),
(53, 'ssss');

-- --------------------------------------------------------

--
-- Struttura della tabella `partecipazione`
--

CREATE TABLE `partecipazione` (
  `CodUtente` int(11) DEFAULT NULL,
  `CodLega` int(11) NOT NULL,
  `CodPilota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(27, 'Nico', 'HÃ¼lkenberg', 6),
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
  `Nome` varchar(100) DEFAULT NULL,
  `Monete` int(11) DEFAULT 100,
  `Punteggio` int(11) DEFAULT NULL,
  `CodUtente` int(11) NOT NULL,
  `CodLega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `squadra`
--

INSERT INTO `squadra` (`Nome`, `Monete`, `Punteggio`, `CodUtente`, `CodLega`) VALUES
('DigioRSds', 100, NULL, 18, 50),
('DigioRSdsd', 100, NULL, 18, 51),
('sdfsf', 100, NULL, 18, 52),
('dsfsdfsewe', 100, NULL, 25, 50),
('dasda', 100, NULL, 25, 53),
('qwdwad', 100, NULL, 25, 54),
('dfgdfg', 100, NULL, 25, 55);

-- --------------------------------------------------------

--
-- Struttura della tabella `statistiche`
--

CREATE TABLE `statistiche` (
  `Punti` int(11) DEFAULT NULL,
  `CodAnno` int(11) DEFAULT NULL,
  `CodLuogo` varchar(50) DEFAULT NULL,
  `CodPilota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `User` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Id`, `Nome`, `Cognome`, `Email`, `Password`, `User`) VALUES
(18, 'Fabio', 'Di Giovanni', 'fabiodigiovanni77@gmail.com', 'fabio', 'Digio'),
(25, 'Filippo', 'Catozzi', 'cato@email.com', 'cato', 'Fillo_Cato'),
(26, 'Utente', 'utente', 'utente@gmail.com', 'utente', 'utente');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `gara`
--
ALTER TABLE `gara`
  ADD PRIMARY KEY (`Luogo`,`Anno`);

--
-- Indici per le tabelle `lega`
--
ALTER TABLE `lega`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `NomeSquadra` (`NomeLega`);

--
-- Indici per le tabelle `partecipazione`
--
ALTER TABLE `partecipazione`
  ADD PRIMARY KEY (`CodPilota`,`CodLega`),
  ADD KEY `CodUtente` (`CodUtente`,`CodLega`);

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
  ADD KEY `CodLega` (`CodLega`);

--
-- Indici per le tabelle `statistiche`
--
ALTER TABLE `statistiche`
  ADD KEY `CodLuogo` (`CodLuogo`,`CodAnno`),
  ADD KEY `CodPilota` (`CodPilota`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `partecipazione`
--
ALTER TABLE `partecipazione`
  ADD CONSTRAINT `partecipazione_ibfk_1` FOREIGN KEY (`CodUtente`,`CodLega`) REFERENCES `squadra` (`CodUtente`, `CodLega`),
  ADD CONSTRAINT `partecipazione_ibfk_2` FOREIGN KEY (`CodPilota`) REFERENCES `pilota` (`Numero`);

--
-- Limiti per la tabella `squadra`
--
ALTER TABLE `squadra`
  ADD CONSTRAINT `squadra_ibfk_1` FOREIGN KEY (`CodUtente`) REFERENCES `utente` (`Id`),
  ADD CONSTRAINT `squadra_ibfk_2` FOREIGN KEY (`CodLega`) REFERENCES `lega` (`Id`);

--
-- Limiti per la tabella `statistiche`
--
ALTER TABLE `statistiche`
  ADD CONSTRAINT `statistiche_ibfk_1` FOREIGN KEY (`CodLuogo`,`CodAnno`) REFERENCES `gara` (`Luogo`, `Anno`),
  ADD CONSTRAINT `statistiche_ibfk_2` FOREIGN KEY (`CodPilota`) REFERENCES `pilota` (`Numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
