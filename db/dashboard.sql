-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 10 jan 2026 om 14:34
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
-- Tabelstructuur voor tabel `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `order_position` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `page_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu_page` (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `menu_items`
--

INSERT INTO `menu_items` (`id`, `title`, `url`, `order_position`, `is_active`, `page_id`) VALUES
(7, 'Home', '/', 1, 1, 20),
(9, 'test', '/test', 2, 1, 33),
(10, 'test2', '/test2', 3, 0, 34);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pagecontent`
--

INSERT INTO `pagecontent` (`id`, `title`, `description`, `meta_title`, `meta_description`) VALUES
(2, 'Home', '', 'Home', 'testt23'),
(15, 'test', '', '', ''),
(16, 'test2', '', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`id`, `template_id`, `url`, `status`, `created_at`, `pagecontent_id`, `isDeleted`) VALUES
(20, 18, '', 1, '2025-08-01', 2, 0),
(33, 17, 'test', 0, '2026-01-09', 15, 0),
(34, 17, 'test2', 0, '2026-01-09', 16, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(20, 20, 13),
(21, 27, 6),
(22, 27, 7),
(23, 27, 8),
(24, 27, 9),
(25, 27, 10),
(26, 27, 11),
(27, 27, 12),
(28, 27, 13),
(29, 33, 1),
(30, 33, 2),
(31, 33, 3),
(32, 33, 4),
(33, 33, 5),
(34, 33, 6),
(35, 33, 7),
(36, 33, 8),
(37, 33, 9),
(38, 33, 10),
(39, 33, 11),
(40, 33, 12),
(41, 33, 13),
(42, 20, 14);

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `templates`
--

INSERT INTO `templates` (`id`, `filename`, `title`) VALUES
(18, 'template.homepage.php', 'Homepage'),
(17, 'template.fullwidth.php', 'Fullwidth');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userIsActive` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPassword`, `userIsActive`) VALUES
(1, 'Gerwin de Heus', 'Gerwindeheus@outlook.com', '$2y$10$A.wsBbBAJf1bao8TFgfPKOuxlgJ/D7BIjQvpd9Eh6sgXrt/NWGDMG', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `widget`
--

INSERT INTO `widget` (`id`, `widgetcontent_id`, `created_at`, `last_edit`) VALUES
(14, 14, '2026-01-10', '2026-01-10');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `widgetcontent`
--

INSERT INTO `widgetcontent` (`id`, `title`, `description`, `text`) VALUES
(14, '<h1 class=\"main-title\">\n                  Ontdek Unlimited\n                  <span class=\"title-highlight\">Mogelijkheden</span>\n                  <span class=\"title-normal\">met HKunlimited</span>\n                </h1>', 'Banner tekst', 'Wij brengen jouw digitale ambities tot leven. HKunlimited combineert technische innovatie met creativiteit om unieke oplossingen te bouwen die jouw bedrijf laten groeien. Samen maken we van elke uitdaging');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `fk_menu_page` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pagecontent` FOREIGN KEY (`pagecontent_id`) REFERENCES `pagecontent` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
