-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 jun 2024 om 16:01
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixelplaygroundd`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `badges`
--

CREATE TABLE `badges` (
  `id` int(10) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `badge_condition` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE `games` (
  `id` int(10) NOT NULL,
  `game_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `games`
--

INSERT INTO `games` (`id`, `game_name`) VALUES
(1, 'wordle'),
(2, 'connect 4'),
(3, 'galgje'),
(4, 'tictactoe');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(10) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `wachtwoord`) VALUES
(10, '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikerss`
--

CREATE TABLE `gebruikerss` (
  `Id` int(11) NOT NULL,
  `gebruikers` varchar(200) DEFAULT NULL,
  `wachtwoord` varchar(200) DEFAULT NULL,
  `geheimevraag` varchar(200) DEFAULT NULL,
  `antw_vraag` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikerss`
--

INSERT INTO `gebruikerss` (`Id`, `gebruikers`, `wachtwoord`, `geheimevraag`, `antw_vraag`) VALUES
(1, 'arda vetje', '123', 'wie ben ik?', 'arda vetje'),
(2, 'diego vetklepje', '123', 'wie ben ik', 'diego vetjeklepje'),
(3, 'test', 'test', NULL, NULL),
(4, 'diego', '123', 'wie ben ik?', 'diego'),
(5, 'test', '123', 'wie ben ik?', 'test'),
(6, 'motje broodje', '123', 'wie ben ik?', 'motje broodje'),
(7, 'GamerDiego070', 'fortnite', 'wie ben ik?', 'diego'),
(8, 'CutsByArda', 'YesKingAlmir', 'wie ben ik?', 'almir zn hondje'),
(9, 'AlmirKoning', '123', 'wie ben ik?', 'koning'),
(10, 'arda guler', '123', 'wie ben ik?', 'slechtste speler'),
(11, 'ardaboy23', '123', 'wie ben ik?', 'arda uit elazig'),
(12, 'almirboy', '123', 'wie ben ik?', 'almir'),
(13, 'diego2007', '123', 'wie ben ik?', 'diego'),
(14, 'diegoboy12', '123', 'wie ben ik?', 'diego'),
(15, 'ali ahmed', '123', 'wie ben ik?', 'diego');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker_badge`
--

CREATE TABLE `gebruiker_badge` (
  `gebruiker_id` int(10) NOT NULL,
  `badge_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker_toernooien`
--

CREATE TABLE `gebruiker_toernooien` (
  `gebruiker_id` int(10) NOT NULL,
  `toernooi_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `highscores`
--

CREATE TABLE `highscores` (
  `game_id` int(10) NOT NULL,
  `gebruiker_id` int(10) NOT NULL,
  `highscore` int(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `highscores`
--

INSERT INTO `highscores` (`game_id`, `gebruiker_id`, `highscore`, `timestamp`) VALUES
(1, 1, 100, '2024-04-15 09:48:35'),
(1, 1, 100, '2024-04-15 09:48:35'),
(1, 1, 1050, '2024-04-15 09:48:35'),
(1, 1, 1750, '2024-04-15 09:48:35'),
(1, 1, 2250, '2024-04-15 09:48:35'),
(1, 1, 2000, '2024-04-15 09:48:35'),
(1, 1, 1450, '2024-04-15 09:48:35'),
(1, 1, 1250, '2024-04-15 09:48:35'),
(1, 1, 900, '2024-04-15 09:48:35'),
(1, 1, 600, '2024-04-15 09:48:35'),
(1, 1, -500, '2024-04-15 09:48:35'),
(1, 1, 2250, '2024-04-15 09:48:35'),
(1, 1, 1100, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 850, '2024-04-15 09:48:35'),
(1, 0, 2080, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2220, '2024-04-15 09:48:35'),
(1, 0, 2060, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2100, '2024-04-15 09:48:35'),
(1, 0, 1880, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(1, 1, 2000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:48:35'),
(3, 1, 1000, '2024-04-15 09:48:35'),
(2, 1, 1000, '2024-04-15 09:48:35'),
(4, 1, 1000, '2024-04-15 09:48:35'),
(3, 1, 1000, '2024-04-15 09:48:35'),
(3, 1, 1000, '2024-04-15 09:48:35'),
(1, 0, 2000, '2024-04-15 09:51:22'),
(2, 0, 1000, '2024-04-15 09:52:31');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `toernooien`
--

CREATE TABLE `toernooien` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vrienden`
--

CREATE TABLE `vrienden` (
  `gebruiker_id` int(10) NOT NULL,
  `vriend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gebruikersnaam` (`gebruikersnaam`);

--
-- Indexen voor tabel `gebruikerss`
--
ALTER TABLE `gebruikerss`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `toernooien`
--
ALTER TABLE `toernooien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `gebruikerss`
--
ALTER TABLE `gebruikerss`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `toernooien`
--
ALTER TABLE `toernooien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
