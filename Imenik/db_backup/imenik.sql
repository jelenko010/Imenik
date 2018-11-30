-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 11:16 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imenik`
--

-- --------------------------------------------------------

--
-- Table structure for table `podaci`
--

CREATE TABLE `podaci` (
  `id` int(100) NOT NULL,
  `ime` varchar(250) NOT NULL,
  `prezime` varchar(250) NOT NULL,
  `telefonski_broj` bigint(250) NOT NULL,
  `grad` varchar(250) NOT NULL,
  `ulica` varchar(250) NOT NULL,
  `br` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podaci`
--

INSERT INTO `podaci` (`id`, `ime`, `prezime`, `telefonski_broj`, `grad`, `ulica`, `br`) VALUES
(1, 'Nemanja', 'Jelenkovic', 631034795, 'Pirot', 'Pobede', '7a'),
(2, 'Kristina', 'Jelenkovic', 6455231, 'Beograd', 'Bulevar Revolucije', '166');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `last_login` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `last_login`) VALUES
(1, 'Nemanja', 'Jelenkovic', 'Korisnik', '81dc9bdb52d04dc20036dbd8313ed055', '16 November 2018 10:03 AM'),
(2, 'Kristina', 'Jelenkovic', 'Kiki', '81dc9bdb52d04dc20036dbd8313ed055', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `podaci`
--
ALTER TABLE `podaci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `podaci`
--
ALTER TABLE `podaci`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
