-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 21, 2024 at 05:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `npm` varchar(12) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` char(1) NOT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`npm`, `nama`, `alamat`, `tgl_lhr`, `jk`, `email`) VALUES
('140810230008', 'ROBBY AZWAN SAPUTRA', 'Jl. Cisaladah, Hegarmanah, Kec. Jatinangor', '2004-09-17', 'L', 'robbyazwan@gmail.com'),
('140810240089', 'HOSEA DAVID ANDERSON', 'Jl. Sukawening, Kec. Jatinangor', '2006-01-14', 'L', 'hoseadave@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `npm` varchar(12) DEFAULT NULL,
  `level` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `npm`, `level`) VALUES
('francisco230001', '9f99bd4fe44959fa59307815bce1c266', NULL, '2'),
('hosea240001', '5968f73345582d555d0243f2ab541a4e', '140810240089', '1'),
('robby230001', 'a82a825ef5570ba11de8922488162c5a', '140810230008', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `npm` (`npm`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `identitas` (`npm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
