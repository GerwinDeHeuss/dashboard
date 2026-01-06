-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 06 jan 2026 om 12:43
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
-- Tabelstructuur voor tabel `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `options`
--

INSERT INTO `options` (`id`, `key`, `value`) VALUES
(1, 'dashboard_url', 'http://dashboard.nl/');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pagecontent`
--

DROP TABLE IF EXISTS `pagecontent`;
CREATE TABLE IF NOT EXISTS `pagecontent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pagecontent`
--

INSERT INTO `pagecontent` (`id`, `title`, `description`, `meta_title`, `meta_description`) VALUES
(2, 'Home', '', 'Home', 'testt1'),
(3, 'Home', '', '', ''),
(4, 'joooo', '', 'joo', 'jooo'),
(5, 'joe', '', '', ''),
(6, 'test', '', '', ''),
(7, 'test', '', '', ''),
(8, 'joo', '', 'joeeee', ''),
(9, 'test', '', 'jooo', 'jooooo'),
(10, 'joee', '', '', ''),
(11, 'test12345', '', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `template_id` int DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `pagecontent_id` int DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `template_id` (`template_id`),
  KEY `fk_pagecontent` (`pagecontent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`id`, `template_id`, `url`, `status`, `created_at`, `pagecontent_id`, `isDeleted`) VALUES
(20, 8, '', 1, '2025-08-01', 2, 0),
(21, 6, 'home12', 1, '2025-08-01', 3, 1),
(22, 6, 'joooo', 1, '2025-08-01', 4, 1),
(23, 5, 'joee', 0, '2025-08-01', 5, 0),
(24, 5, 'test1', 0, '2025-08-04', 6, 1),
(25, 6, 'test', 0, '2025-08-04', 7, 1),
(26, 6, 'joo', 1, '2025-08-04', 8, 1),
(27, 7, 'jooooosd', 1, '2025-08-04', 9, 0),
(28, 6, 'joee', 0, '2025-08-05', 10, 1),
(29, 8, 'test12345', 0, '2025-08-08', 11, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pagewidgets`
--

DROP TABLE IF EXISTS `pagewidgets`;
CREATE TABLE IF NOT EXISTS `pagewidgets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `page_id` int NOT NULL,
  `widget_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_page_widget` (`page_id`,`widget_id`),
  KEY `widget_id` (`widget_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pagewidgets`
--

INSERT INTO `pagewidgets` (`id`, `page_id`, `widget_id`) VALUES
(1, 20, 1),
(2, 20, 2),
(3, 20, 3),
(4, 20, 4),
(5, 20, 5),
(6, 27, 1),
(7, 27, 2),
(8, 27, 3),
(9, 27, 4),
(10, 27, 5),
(14, 20, 7),
(13, 20, 6),
(15, 20, 8),
(16, 20, 9),
(17, 20, 10),
(18, 20, 11),
(19, 20, 12),
(20, 20, 13);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `templates`
--

INSERT INTO `templates` (`id`, `filename`, `title`) VALUES
(8, 'template.homepage.php', 'Homepage'),
(7, 'template.fullwidth.php', 'Fullwidth');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `widget`
--

DROP TABLE IF EXISTS `widget`;
CREATE TABLE IF NOT EXISTS `widget` (
  `id` int NOT NULL AUTO_INCREMENT,
  `widgetcontent_id` int NOT NULL,
  `created_at` date DEFAULT NULL,
  `last_edit` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `widgetcontent_id` (`widgetcontent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `widget`
--

INSERT INTO `widget` (`id`, `widgetcontent_id`, `created_at`, `last_edit`) VALUES
(1, 1, '2025-08-07', '2025-08-07'),
(2, 2, '2025-08-08', '2025-10-21'),
(3, 3, '2025-08-08', '2025-08-08'),
(4, 4, '2025-08-08', '2025-08-08'),
(5, 5, '2025-08-08', '2025-08-08'),
(13, 13, '2025-10-17', '2025-10-21');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `widgetcontent`
--

DROP TABLE IF EXISTS `widgetcontent`;
CREATE TABLE IF NOT EXISTS `widgetcontent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `widgetcontent`
--

INSERT INTO `widgetcontent` (`id`, `title`, `description`, `text`) VALUES
(1, 'Webdesign', '4+ jaar ervaring', 'Bij HKUnlimited creëren we op maat gemaakt webdesign dat snel laadt, mobielvriendelijk is en goed scoort in SEO. Laat jouw website opvallen en draag bij aan je succes. Neem contact op voor een vrijblijvende offerte!'),
(2, 'Webdevelopment', '4+ jaar ervaring', 'Bij HKUnlimited bieden we webdevelopment op maat, van webapplicaties tot complexe oplossingen. We zorgen voor schaalbare, veilige en gebruiksvriendelijke resultaten. Neem contact op voor een vrijblijvende offerte!'),
(3, 'Webapplicaties', '2+ jaar ervaring', 'Bij HKUnlimited ontwikkelen we webapplicaties die perfect passen bij jouw bedrijf. We leveren schaalbare, gebruiksvriendelijke oplossingen die optimale prestaties bieden. Neem contact op voor een vrijblijvende offerte!'),
(4, 'joo', 'joo', 'joo'),
(5, 'joe', 'joe', 'joe'),
(6, 'test', 'test', 'test'),
(7, 'test', 'test', 'test'),
(8, 'test', 'test', 'test'),
(9, 'stet', 'ste', 'set'),
(10, 'test', 'ste', 'est'),
(11, 'test', 'test', 'test'),
(12, 'test', 'test', 'ets'),
(13, 'test', 'test', 'est');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pagecontent` FOREIGN KEY (`pagecontent_id`) REFERENCES `pagecontent` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
