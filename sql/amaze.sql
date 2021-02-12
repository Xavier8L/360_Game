-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 feb 2021 om 15:46
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amaze`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210212133309', '2021-02-12 14:34:40', 158),
('DoctrineMigrations\\Version20210212142626', '2021-02-12 15:26:33', 105),
('DoctrineMigrations\\Version20210212143228', '2021-02-12 15:32:33', 28),
('DoctrineMigrations\\Version20210212143838', '2021-02-12 15:38:42', 92);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `spel`
--

CREATE TABLE `spel` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speler_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `spel`
--

INSERT INTO `spel` (`id`, `naam`, `type`, `speler_id`) VALUES
(1, 'Game 1', '16+', 1),
(3, 'Game 2', '18+', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `speler`
--

CREATE TABLE `speler` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leeftijd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `speler`
--

INSERT INTO `speler` (`id`, `naam`, `leeftijd`, `spel_id`) VALUES
(1, 'Xavier', '18', 1),
(2, 'Chen', '28', 3),
(3, 'Jorid', '13', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `spel`
--
ALTER TABLE `spel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_50B10AAF2C2B5A45` (`speler_id`);

--
-- Indexen voor tabel `speler`
--
ALTER TABLE `speler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2E128484F2ECB4AD` (`spel_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `spel`
--
ALTER TABLE `spel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `speler`
--
ALTER TABLE `speler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `spel`
--
ALTER TABLE `spel`
  ADD CONSTRAINT `FK_50B10AAF2C2B5A45` FOREIGN KEY (`speler_id`) REFERENCES `speler` (`id`);

--
-- Beperkingen voor tabel `speler`
--
ALTER TABLE `speler`
  ADD CONSTRAINT `FK_2E128484F2ECB4AD` FOREIGN KEY (`spel_id`) REFERENCES `spel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
