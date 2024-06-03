-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 03, 2024 alle 20:45
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
-- Struttura della tabella `classifica`
--

CREATE TABLE `classifica` (
  `CodPilota` int(11) NOT NULL,
  `CodLuogo` varchar(50) NOT NULL,
  `CodAnno` int(11) NOT NULL,
  `Punti` int(11) DEFAULT NULL,
  `PosizioniGuadagnate` int(11) DEFAULT NULL,
  `Posizione` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `classifica`
--

INSERT INTO `classifica` (`CodPilota`, `CodLuogo`, `CodAnno`, `Punti`, `PosizioniGuadagnate`, `Posizione`) VALUES
(1, 'Arabia Saudita', 2024, 25, NULL, 1),
(1, 'Australia', 2024, 0, NULL, 19),
(1, 'Bahrein', 2024, 26, NULL, 1),
(1, 'Cina', 2024, 25, NULL, 1),
(1, 'Emilia-Romagna', 2024, 25, NULL, 1),
(1, 'Giappone', 2024, 26, NULL, 1),
(1, 'Miami', 2024, 18, NULL, 2),
(1, 'Monaco', 2024, 8, NULL, 6),
(2, 'Arabia Saudita', 2024, 0, NULL, 15),
(2, 'Bahrein', 2024, 0, NULL, 20),
(2, 'Cina', 2024, 0, NULL, 19),
(2, 'Emilia-Romagna', 2024, 0, NULL, 17),
(2, 'Giappone', 2024, 0, NULL, 17),
(2, 'Miami', 2024, 0, NULL, 20),
(2, 'Monaco', 2024, 0, NULL, 15),
(3, 'Arabia Saudita', 2024, 0, NULL, 16),
(3, 'Australia', 2024, 0, NULL, 12),
(3, 'Bahrein', 2024, 0, NULL, 13),
(3, 'Cina', 2024, 0, NULL, 16),
(3, 'Emilia-Romagna', 2024, 0, NULL, 13),
(3, 'Giappone', 2024, 0, NULL, 15),
(3, 'Miami', 2024, 0, NULL, 15),
(3, 'Monaco', 2024, 0, NULL, 12),
(4, 'Arabia Saudita', 2024, 4, NULL, 8),
(4, 'Australia', 2024, 15, NULL, 3),
(4, 'Bahrein', 2024, 8, NULL, 6),
(4, 'Cina', 2024, 18, NULL, 2),
(4, 'Emilia-Romagna', 2024, 18, NULL, 2),
(4, 'Giappone', 2024, 10, NULL, 5),
(4, 'Miami', 2024, 25, NULL, 1),
(4, 'Monaco', 2024, 12, NULL, 4),
(10, 'Arabia Saudita', 2024, 0, NULL, 20),
(10, 'Australia', 2024, 0, NULL, 13),
(10, 'Bahrein', 2024, 0, NULL, 18),
(10, 'Cina', 2024, 0, NULL, 13),
(10, 'Emilia-Romagna', 2024, 0, NULL, 16),
(10, 'Giappone', 2024, 0, NULL, 16),
(10, 'Miami', 2024, 0, NULL, 12),
(10, 'Monaco', 2024, 1, NULL, 10),
(11, 'Arabia Saudita', 2024, 18, NULL, 2),
(11, 'Australia', 2024, 10, NULL, 5),
(11, 'Bahrein', 2024, 18, NULL, 2),
(11, 'Cina', 2024, 15, NULL, 3),
(11, 'Emilia-Romagna', 2024, 4, NULL, 8),
(11, 'Giappone', 2024, 18, NULL, 2),
(11, 'Miami', 2024, 12, NULL, 4),
(11, 'Monaco', 2024, 0, NULL, 18),
(14, 'Arabia Saudita', 2024, 10, NULL, 5),
(14, 'Australia', 2024, 4, NULL, 8),
(14, 'Bahrein', 2024, 2, NULL, 9),
(14, 'Cina', 2024, 7, NULL, 7),
(14, 'Emilia-Romagna', 2024, 0, NULL, 19),
(14, 'Giappone', 2024, 8, NULL, 6),
(14, 'Miami', 2024, 2, NULL, 9),
(14, 'Monaco', 2024, 0, NULL, 11),
(16, 'Arabia Saudita', 2024, 16, NULL, 3),
(16, 'Australia', 2024, 19, NULL, 2),
(16, 'Bahrein', 2024, 12, NULL, 4),
(16, 'Cina', 2024, 12, NULL, 4),
(16, 'Emilia-Romagna', 2024, 15, NULL, 3),
(16, 'Giappone', 2024, 12, NULL, 4),
(16, 'Miami', 2024, 15, NULL, 3),
(16, 'Monaco', 2024, 25, NULL, 1),
(18, 'Arabia Saudita', 2024, 0, NULL, 19),
(18, 'Australia', 2024, 8, NULL, 6),
(18, 'Bahrein', 2024, 1, NULL, 10),
(18, 'Cina', 2024, 0, NULL, 15),
(18, 'Emilia-Romagna', 2024, 2, NULL, 9),
(18, 'Giappone', 2024, 0, NULL, 12),
(18, 'Miami', 2024, 0, NULL, 17),
(18, 'Monaco', 2024, 0, NULL, 14),
(20, 'Arabia Saudita', 2024, 0, NULL, 12),
(20, 'Australia', 2024, 1, NULL, 10),
(20, 'Bahrein', 2024, 0, NULL, 12),
(20, 'Cina', 2024, 0, NULL, 18),
(20, 'Emilia-Romagna', 2024, 0, NULL, 12),
(20, 'Giappone', 2024, 0, NULL, 13),
(20, 'Miami', 2024, 0, NULL, 19),
(20, 'Monaco', 2024, 0, NULL, 20),
(22, 'Arabia Saudita', 2024, 0, NULL, 14),
(22, 'Australia', 2024, 6, NULL, 7),
(22, 'Bahrein', 2024, 0, NULL, 14),
(22, 'Cina', 2024, 0, NULL, 20),
(22, 'Emilia-Romagna', 2024, 1, NULL, 10),
(22, 'Giappone', 2024, 1, NULL, 10),
(22, 'Miami', 2024, 6, NULL, 7),
(22, 'Monaco', 2024, 4, NULL, 8),
(23, 'Arabia Saudita', 2024, 0, NULL, 11),
(23, 'Australia', 2024, 0, NULL, 11),
(23, 'Bahrein', 2024, 0, NULL, 15),
(23, 'Cina', 2024, 0, NULL, 12),
(23, 'Emilia-Romagna', 2024, 0, NULL, 20),
(23, 'Giappone', 2024, 0, NULL, 19),
(23, 'Miami', 2024, 0, NULL, 18),
(23, 'Monaco', 2024, 2, NULL, 9),
(24, 'Arabia Saudita', 2024, 0, NULL, 18),
(24, 'Australia', 2024, 0, NULL, 15),
(24, 'Bahrein', 2024, 0, NULL, 11),
(24, 'Cina', 2024, 0, NULL, 14),
(24, 'Emilia-Romagna', 2024, 0, NULL, 15),
(24, 'Giappone', 2024, 0, NULL, 18),
(24, 'Miami', 2024, 0, NULL, 14),
(24, 'Monaco', 2024, 0, NULL, 16),
(27, 'Arabia Saudita', 2024, 1, NULL, 10),
(27, 'Australia', 2024, 2, NULL, 9),
(27, 'Bahrein', 2024, 0, NULL, 16),
(27, 'Cina', 2024, 1, NULL, 10),
(27, 'Emilia-Romagna', 2024, 0, NULL, 11),
(27, 'Giappone', 2024, 0, NULL, 11),
(27, 'Miami', 2024, 0, NULL, 11),
(27, 'Monaco', 2024, 0, NULL, 19),
(31, 'Arabia Saudita', 2024, 0, NULL, 13),
(31, 'Australia', 2024, 0, NULL, 16),
(31, 'Bahrein', 2024, 0, NULL, 17),
(31, 'Cina', 2024, 0, NULL, 11),
(31, 'Emilia-Romagna', 2024, 0, NULL, 14),
(31, 'Miami', 2024, 1, NULL, 10),
(31, 'Monaco', 2024, 0, NULL, 17),
(38, 'Arabia Saudita', 2024, 6, NULL, 7),
(44, 'Arabia Saudita', 2024, 2, NULL, 9),
(44, 'Australia', 2024, 0, NULL, 18),
(44, 'Bahrein', 2024, 6, NULL, 7),
(44, 'Cina', 2024, 2, NULL, 9),
(44, 'Emilia-Romagna', 2024, 8, NULL, 6),
(44, 'Giappone', 2024, 2, NULL, 9),
(44, 'Miami', 2024, 8, NULL, 6),
(44, 'Monaco', 2024, 7, NULL, 7),
(55, 'Australia', 2024, 25, NULL, 1),
(55, 'Bahrein', 2024, 15, NULL, 3),
(55, 'Cina', 2024, 10, NULL, 5),
(55, 'Emilia-Romagna', 2024, 10, NULL, 5),
(55, 'Giappone', 2024, 15, NULL, 3),
(55, 'Miami', 2024, 10, NULL, 5),
(55, 'Monaco', 2024, 15, NULL, 3),
(63, 'Arabia Saudita', 2024, 8, NULL, 6),
(63, 'Australia', 2024, 0, NULL, 17),
(63, 'Bahrein', 2024, 10, NULL, 5),
(63, 'Cina', 2024, 8, NULL, 6),
(63, 'Emilia-Romagna', 2024, 7, NULL, 7),
(63, 'Giappone', 2024, 6, NULL, 7),
(63, 'Miami', 2024, 4, NULL, 8),
(63, 'Monaco', 2024, 10, NULL, 5),
(77, 'Arabia Saudita', 2024, 0, NULL, 17),
(77, 'Australia', 2024, 0, NULL, 14),
(77, 'Bahrein', 2024, 0, NULL, 19),
(77, 'Cina', 2024, 0, NULL, 17),
(77, 'Emilia-Romagna', 2024, 0, NULL, 18),
(77, 'Giappone', 2024, 0, NULL, 14),
(77, 'Miami', 2024, 0, NULL, 16),
(77, 'Monaco', 2024, 0, NULL, 13),
(81, 'Arabia Saudita', 2024, 12, NULL, 4),
(81, 'Australia', 2024, 12, NULL, 4),
(81, 'Bahrein', 2024, 4, NULL, 8),
(81, 'Cina', 2024, 4, NULL, 8),
(81, 'Emilia-Romagna', 2024, 12, NULL, 4),
(81, 'Giappone', 2024, 4, NULL, 8),
(81, 'Miami', 2024, 0, NULL, 13),
(81, 'Monaco', 2024, 18, NULL, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `gara`
--

CREATE TABLE `gara` (
  `Anno` int(11) NOT NULL,
  `Luogo` varchar(50) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `gara`
--

INSERT INTO `gara` (`Anno`, `Luogo`, `Nome`, `Data`) VALUES
(2024, 'Arabia Saudita', 'Gran Premio d\'Arabia Saudita\r\n', '2024-03-09'),
(2024, 'Australia', 'Gran Premio d\'Australia\r\n', '2024-03-24'),
(2024, 'Bahrein', 'Gran Premio del Bahrein 2024', '2024-03-02'),
(2024, 'Cina', 'Gran Premio di Cina\r\n', '2024-04-21'),
(2024, 'Emilia-Romagna', 'Gran Premio dell\'Emilia-Romagna\r\n', '2024-05-19'),
(2024, 'Giappone', 'Gran Premio del Giappone', '2024-04-07'),
(2024, 'Miami', 'Gran Premio di Miami', '2024-05-05'),
(2024, 'Monaco', 'Gran Premio di Monaco\r\n', '2024-05-26');

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
  `Punti` int(11) NOT NULL,
  `FantaPunti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `pilota`
--

INSERT INTO `pilota` (`Numero`, `Nome`, `Cognome`, `Punti`, `FantaPunti`) VALUES
(1, 'Max', 'Verstappen', 169, 0),
(2, 'Logan', 'Sargeant', 0, 0),
(3, 'Daniel', 'Ricciardo', 5, 0),
(4, 'Lando', 'Norris', 113, 0),
(10, 'Pierre', 'Gasly', 1, 0),
(11, 'Sergio', 'Perez', 107, 0),
(14, 'Fernando', 'Alonso', 33, 0),
(16, 'Charles', 'Leclerc', 138, 0),
(18, 'Lance', 'Stroll', 11, 0),
(20, 'Kevin', 'Magnussen', 1, 0),
(22, 'Yuki', 'Tsunoda', 19, 0),
(23, 'Alex', 'Albon', 2, 0),
(24, 'Guanyu', 'Zhou', 0, 0),
(27, 'Nico', 'Hülkenberg', 6, 0),
(31, 'Esteban', 'Ocon', 1, 0),
(38, 'Oliver', 'Bearman', 6, 0),
(44, 'Lewis', 'Hamilton', 42, 0),
(55, 'Carlos', 'Sainz', 108, 0),
(63, 'George', 'Russel', 54, 0),
(77, 'Valtteri', 'Bottas', 0, 0),
(81, 'Oscar', 'Piastri', 71, 0);

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
-- Indici per le tabelle `classifica`
--
ALTER TABLE `classifica`
  ADD PRIMARY KEY (`CodPilota`,`CodLuogo`,`CodAnno`),
  ADD KEY `CodLuogo` (`CodLuogo`,`CodAnno`);

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
-- Limiti per la tabella `classifica`
--
ALTER TABLE `classifica`
  ADD CONSTRAINT `classifica_ibfk_1` FOREIGN KEY (`CodPilota`) REFERENCES `pilota` (`Numero`),
  ADD CONSTRAINT `classifica_ibfk_2` FOREIGN KEY (`CodLuogo`,`CodAnno`) REFERENCES `gara` (`Luogo`, `Anno`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
