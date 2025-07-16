-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 16 jul 2025 om 08:42
-- Serverversie: 8.0.21
-- PHP-versie: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `template_id` int DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `template_id` (`template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`id`, `title`, `template_id`, `url`, `status`, `created_at`) VALUES
(1, 'test', 2, '', 1, '2025-07-15'),
(2, 'jooooo', 1, '', 0, '2025-07-14'),
(3, 'Home', 1, '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE IF NOT EXISTS `templates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `templates`
--

INSERT INTO `templates` (`id`, `filename`, `title`) VALUES
(1, 'template.homepage.php', 'Homepage'),
(2, 'template.fullwidth.php', 'Fullwidth');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
