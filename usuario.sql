-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 07:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_carreras`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(45) NOT NULL DEFAULT 'NOT NULL',
  `rol` varchar(20) DEFAULT NULL,
  `passwd` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`nombre`, `rol`, `passwd`, `email`) VALUES
('pollo', NULL, '$2y$10$D6f0/ovqeRLQJ0IcmLoLT.USm9lN9JZTgbkSMR2xVeOxwn5OPli.G', 'asd@hotmail.com'),
('pollo', NULL, '$2y$10$.oBJdC7RPN4H4sGaEFDrte7SoCcf6zYMKfNP51xoiqMCUs8yumlOW', 'asda@spectro.com'),
('rolo', NULL, '$2y$10$GtFUyHIlKMf1aM2hOfjn5OGKdwmc5w10h2sKqkPJ69FkM/ssv.fJ6', 'cromo@eh.com'),
('gigadomo', NULL, '$2y$10$UGri8Imc/Vk5iwfMGG57l.5M24v5ZX9ALMIF6ZNi/VSb2YO8ZJwWm', 'elperro@gmail.com'),
('pollos', NULL, '$2y$10$O0.7iUYkzGkx/SY2aKPyruAMvgBvXRjFYf31dmp/G4H6C6OlF0izK', 'paky.rdsaock_@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
