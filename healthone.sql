-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 mrt 2022 om 21:24
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--
CREATE DATABASE IF NOT EXISTS `healthone` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `healthone`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`id`, `name`, `Password`, `email`) VALUES
(1, 'Test', 'Test123', '302817823@student.rocmondriaan.nl'),
(2, 'Mark', 'SD345', 'Mark@gmail.com'),
(3, 'Test4', 'Test567', 'test4@rocmondriaan.nl'),
(4, 'Test5', 'Test789', 'test5@rocmondriaan.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`, `description`) VALUES
(1, 'roeitrainer', 'img/categories/roeitrainer.jpg', ''),
(2, 'crosstrainer', 'img/categories/crosstrainer.jpg', ''),
(3, 'hometrainer', 'img/categories/hometrainer.jpg', ''),
(4, 'loopband', 'img/categories/loopband.jpg', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bericht` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `picture`, `description`, `categories_id`) VALUES
(1, 'Roeitrainer 1', 'img/products/Roeitrainer1.jpg', 'Roeitrainer om lekker fit ermee te worden, door te roeien.', 1),
(2, 'Roeitrainer 2', 'img/products/Roeitrainer2.jpg', 'Roeitrainer om lekker fit ermee te worden, door te roeien.', 1),
(3, 'Roeitrainer 3', 'img/products/Roeitrainer3.jpg', 'Roeitrainer om lekker fit ermee te worden, door te roeien.', 1),
(4, 'Roeitrainer 4', 'img/products/Roeitrainer4.jpg', 'Roeitrainer om lekker fit ermee te worden, door te roeien.', 1),
(5, 'Crosstrainer 1', 'img/products/Crosstrainer1.jpg', 'Dit is de crosstrainer om lekker je conditie te trainen.', 2),
(6, 'Crosstrainer 2', 'img/products/Crosstrainer2.jfif', 'Dit is de crosstrainer om lekker je conditie te trainen.', 2),
(7, 'Crosstrainer 3', 'img/products/Crosstrainer3.jfif', 'Dit is de crosstrainer om lekker je conditie te trainen.', 2),
(8, 'Crosstrainer 4', 'img/products/Crosstrainer4.jpg', 'Dit is de crosstrainer om lekker je conditie te trainen.', 2),
(9, 'Hometrainer 1', 'img/products/Hometrainer1.jpg', 'Dit is de hometrainer om ook lekker je conditie te trainen.', 3),
(10, 'Hometrainer 2', 'img/products/Hometrainer2.jfif', 'Dit is de hometrainer om ook lekker je conditie te trainen.', 3),
(11, 'Hometrainer 3', 'img/products/Hometrainer3.jfif', 'Dit is de hometrainer om ook lekker je conditie te trainen.', 3),
(12, 'Hometrainer 4', 'img/products/Hometrainer4.jpg', 'Dit is de hometrainer om ook lekker je conditie te trainen.', 3),
(13, 'Loopband 1', 'img/products/Loopband1.jfif', 'Dit is de loopband om ook lekker te sprinten of om te joggen.', 4),
(14, 'Loopband 2', 'img/products/Loopband2.jfif', 'Dit is de loopband om ook lekker te sprinten of om te joggen.', 4),
(15, 'Loopband 3', 'img/products/Loopband3.jfif', 'Dit is de loopband om ook lekker te sprinten of om te joggen.', 4),
(16, 'Loopband 4', 'img/products/Loopband4.jfif', 'Dit is de loopband om ook lekker te sprinten of om te joggen.', 4),
(17, 'Test', 'img/products/fitness.png', 'gdgffgdfgd', 1),
(25, 'test', './img/categories/roeitrainer/4e130bf6db627a7bf8a17e68943d627e.png', 'Test', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `review`
--

INSERT INTO `review` (`id`, `name`, `email`, `comment`, `product_id`) VALUES
(1, 'Jan', 'test@rocmondriaan.nl', 'Jan test comment!', 1),
(2, 'Job', 'Job@rocmondriaan.nl', 'Job test comment!', 1),
(3, 'Mark', 'Mark@rocmondriaan.nl', 'Mark test comment!', 1),
(4, 'test', 'test@rocmondriaan.nl', 'Test roeitrainer 4', 4),
(5, 'Sem Aard', 'Sem@gmail.com', 'De roeitrainer is geweldig!', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` enum('member','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, '302817823@student.rocmondriaan.nl', 'Test123', 'Test', 'User', 'admin'),
(2, 'Mark@gmail.com', 'SD345', 'Mark', 'Kramer', 'member'),
(3, 'Sem@gmail.com', 'Serd', 'Sem', 'Aard', 'member');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product` (`categories_id`);

--
-- Indexen voor tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT voor een tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_product` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

--
-- Beperkingen voor tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
