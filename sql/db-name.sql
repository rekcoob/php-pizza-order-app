-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost:3306
-- Čas generovania: Pi 20.Mar 2020, 17:28
-- Verzia serveru: 5.7.24
-- Verzia PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `weedle`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sťahujem dáta pre tabuľku `pizzas`
--

INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `email`, `created_at`) VALUES
(4, 'volcano', 'feferonies, cheese, bacon', 'fero@gmail.com', '2020-03-18 17:39:03'),
(7, 'oregano', 'oregano, corn, bacon', 'brad@gmail.com', '2020-03-18 18:03:01'),
(8, 'hell', 'onion, feferonies, chili', 'admin@admin.sk', '2020-03-18 18:06:54'),
(9, 'dracula', 'onion, chili, bacon', 'brad@gmail.com', '2020-03-18 18:07:28'),
(10, 'salieri', 'bacon, onion, cheese', 'brad@gmail.com', '2020-03-18 18:54:23');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

