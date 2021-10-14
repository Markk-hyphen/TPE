-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 04:09 AM
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
-- Table structure for table `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `duracion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre`, `duracion`) VALUES
(1, 'Ingenieria en Sistemas', 5),
(2, 'TUDAI', 2.5),
(3, 'TUPAR', 2.5),
(4, 'TUARI', 2.5),
(5, 'DUIA', 0.7),
(6, 'Profesorado en Informatica', 4),
(7, 'Dota2', 10),
(11, 'DUGAR', 0.5),
(21, 'Experiencias Digitales', 2);

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `profesor` varchar(45) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre`, `profesor`, `id_carrera`) VALUES
(1, 'Algebra Lineal', 'Karina Paz', 2),
(2, 'POO', 'Luis Berdun', 1),
(6, 'Web2', 'Javier Romero', 2),
(7, 'Deep learning', 'Giru', 5),
(8, 'Integracion continua', 'Roco el Barbaro', 3),
(9, 'Procesamiento del lenguaje natural', 'Andres Dias Pace', 5),
(10, 'Tecnologias Web', 'Pollo Lopez', 4),
(11, 'Comunicacion de Datos', 'Hugo Curti', 1),
(12, 'Programacion 3', 'Laura Felice', 2),
(13, 'POO', 'Luis Berdun', 2),
(14, 'Web1', 'Roco Miraginai', 3),
(15, 'Web2', 'Javier Romario', 4),
(16, 'Comunicacion de Datos', 'El pimpollo feroz', 2),
(17, 'Programacion 3', 'Laura Felice', 4),
(28, 'Pickoff', 'Necro phos', 7),
(29, 'Maps awareness', 'BSJ', 7),
(30, 'Itemization', 'D bowie', 7),
(31, 'Ingenieria de Software', 'Quirque', 1),
(44, 'Redes hogareñas', 'Rolo Carretto', 11),
(45, 'Soporte previsorio', 'Epicuro Gomez', 11),
(48, 'Tecnologia educativa', 'Guillermo Conti', 6),
(50, 'Matematica discreta', 'Emilio Alfaro', 6),
(64, 'Web1', 'Javier Dottori', 2),
(65, 'Ergonomia', 'Aldo Rico', 21),
(66, 'Accesibilidad WEB', 'Michael Jackson', 21),
(71, 'BEST BAND', 'Queen', 2);

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
('krymer', 'admin', '$2y$10$dJfQnf3EyyTUzCHogH.2wu3h1oOXOMTA8dfJBxuVHfHE/AipM/1fG', 'agus.hero@hotmail.com'),
('pollo', 'admin', '$2y$10$D6f0/ovqeRLQJ0IcmLoLT.USm9lN9JZTgbkSMR2xVeOxwn5OPli.G', 'asd@hotmail.com'),
('rolo', 'usuario', '$2y$10$GtFUyHIlKMf1aM2hOfjn5OGKdwmc5w10h2sKqkPJ69FkM/ssv.fJ6', 'cromo@eh.com'),
('asdq', 'usuario', '$2y$10$hAFnaKOQtxn4F5UrYg9mBOM19mLyw8BNtcXiFYCC6ztso4lkj2Nty', 'cromo@ehh.com'),
('gigadomo', 'usuario', '$2y$10$UGri8Imc/Vk5iwfMGG57l.5M24v5ZX9ALMIF6ZNi/VSb2YO8ZJwWm', 'elperro@gmail.com'),
('asdasd', 'usuario', '$2y$10$rsSC2WklwUvAMVQD8DFL9OoymK2vnN4dP9MZb92N3SVu9VbRCJ8.2', 'hybrid@hotmail.com'),
('pollos', 'usuario', '$2y$10$O0.7iUYkzGkx/SY2aKPyruAMvgBvXRjFYf31dmp/G4H6C6OlF0izK', 'paky.rdsaock_@hotmail.com'),
('prueba', 'usuario', '$2y$10$qyCGnyaZeQ2YLX2/joUta.eQ7CBR95QP/gGanU.AWiU6zYK2AS81O', 'prueba@gmail.com'),
('q2', 'admin', '$2y$10$XcDkqVZfS9QLpSd5R70GyeSR.fr92fNEYHGorF0vjIBHVtRy2u6bG', 'q1'),
('wqwqwwww', 'usuario', '$2y$10$y7Dym5Plve9GB0d2C7Gov.JWTnQkvYn24CoQ7.cbsP.HZY84u1mwW', 'qwqwq'),
('richardo', 'usuario', '$2y$10$kgCo913Y5ab0bN0VTzX4SeRFuSwsnEzdmLzg.FoK.RQJXZXnx9/0m', 'richard@hotmail.com'),
('hyper', 'usuario', '$2y$10$Pub4wJv0HP.mmKBIx75VQ.ZGnq31awUmNAsoZcMGpmO535HE5DeN2', 'rocko'),
('Remo', 'admin', '$2y$10$uALEzHn0srLpG7UEYkKuIenzRIe3DvZMLX2G8OULNk46moOJ71llq', 'romulo@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `fk_carrera_materia` (`id_carrera`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_carrera_materia` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
