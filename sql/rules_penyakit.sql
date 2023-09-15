-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 03:13 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nagaimame`
--

-- --------------------------------------------------------

--
-- Table structure for table `rules_penyakit`
--

CREATE TABLE `rules_penyakit` (
  `id_rules` int(9) NOT NULL,
  `id_penyakit` char(3) NOT NULL,
  `id_gejala` char(3) NOT NULL,
  `keyakinan` float DEFAULT NULL,
  `ketidakyakinan` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules_penyakit`
--

INSERT INTO `rules_penyakit` (`id_rules`, `id_penyakit`, `id_gejala`, `keyakinan`, `ketidakyakinan`) VALUES
(5, 'P02', 'G07', 0.8, 0.1),
(6, 'P02', 'G08', 0.7, 0.14),
(7, 'P02', 'G09', 0.8, 0.1),
(8, 'P02', 'G11', 0.8, 0.06),
(9, 'P02', 'G12', 0.9, 0.1),
(10, 'P03', 'G04', 0.6, 0.11),
(11, 'P03', 'G10', 0.7, 0.12),
(12, 'P03', 'G11', 0.6, 0.14),
(13, 'P04', 'G08', 0.5, 0.13),
(14, 'P04', 'G11', 0.7, 0.13),
(15, 'P04', 'G12', 0.8, 0.05),
(16, 'P04', 'G13', 0.9, 0.06),
(17, 'P05', 'G06', 0.8, 0.05),
(18, 'P05', 'G11', 0.5, 0.14),
(19, 'P05', 'G16', 0.7, 0.1),
(20, 'P05', 'G17', 0.9, 0.07),
(21, 'P05', 'G18', 0.7, 0.08),
(22, 'P06', 'G03', 0.9, 0.06),
(23, 'P06', 'G05', 0.9, 0.06),
(24, 'P06', 'G14', 0.8, 0.07),
(25, 'P06', 'G15', 0.8, 0.07),
(50, 'P01', 'G01', 0.9, 0.07),
(51, 'P01', 'G02', 0.8, 0.09),
(52, 'P01', 'G03', 0.8, 0.12),
(53, 'P01', 'G18', 0.7, 0.13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rules_penyakit`
--
ALTER TABLE `rules_penyakit`
  ADD PRIMARY KEY (`id_rules`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rules_penyakit`
--
ALTER TABLE `rules_penyakit`
  MODIFY `id_rules` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
