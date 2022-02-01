-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 20. 01 2022 kl. 12:22:00
-- Serverversion: 10.4.22-MariaDB
-- PHP-version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nodemcu_rfidir522_mysql`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `rfid_log`
--

CREATE TABLE `rfid_log` (
  `id` int(11) NOT NULL,
  `hex` varchar(100) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `rfid_log`
--

INSERT INTO `rfid_log` (`id`, `hex`, `date_time`) VALUES
(21, 'BCE9D537', '19/01/2022 11:13:55am'),
(22, 'BCE9D537', '19/01/2022 11:13:56am'),
(23, 'BCE9D537', '19/01/2022 11:13:58am'),
(24, 'BCE9D537', '19/01/2022 11:16:44am'),
(25, 'BCE9D537', '19/01/2022 12:01:20pm'),
(26, 'BCE9D537', '19/01/2022 12:01:22pm'),
(27, 'BCE9D537', '19/01/2022 12:01:23pm'),
(28, 'BCE9D537', '19/01/2022 12:22:21pm'),
(29, 'BCE9D537', '19/01/2022 12:22:51pm'),
(30, 'BCE9D537', '19/01/2022 12:22:52pm'),
(31, 'BCE9D537', '19/01/2022 12:22:53pm');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tabe_door`
--

CREATE TABLE `tabe_door` (
  `door` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `tabe_door`
--

INSERT INTO `tabe_door` (`door`) VALUES
('locked');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `table_nodemcu_rfidirc522_mysql`
--

CREATE TABLE `table_nodemcu_rfidirc522_mysql` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `table_nodemcu_rfidirc522_mysql`
--

INSERT INTO `table_nodemcu_rfidirc522_mysql` (`id`, `name`, `gender`, `email`, `mobile`) VALUES
('ABCD123', 'Bob', 'Male', 'foo@gmail.com', '29591883'),
('BCE9D537', 'Nick', 'Male', 'nkkh93@gmail.com', '28247193');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `rfid_log`
--
ALTER TABLE `rfid_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `tabe_door`
--
ALTER TABLE `tabe_door`
  ADD PRIMARY KEY (`door`);

--
-- Indeks for tabel `table_nodemcu_rfidirc522_mysql`
--
ALTER TABLE `table_nodemcu_rfidirc522_mysql`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `rfid_log`
--
ALTER TABLE `rfid_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
