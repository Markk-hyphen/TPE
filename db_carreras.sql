-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 01:24 AM
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
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `fk_id_materia` int(11) NOT NULL,
  `fk_email_usuario` varchar(50) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `fk_nombre_usuario` varchar(45) NOT NULL,
  `fecha` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id`, `detalle`, `fk_id_materia`, `fk_email_usuario`, `puntaje`, `fk_nombre_usuario`, `fecha`) VALUES
(1, 'Alto comentario de prueba, hypercardo', 13, 'asd@hotmail.com', 5, 'pollo', '2021-11-17'),
(2, 'Segundo comentario', 13, 'asd@hotmail.com', 1, 'pollo', '2021-11-17'),
(3, 'DASJKJDSAJKLDASJLKASJLKDLJKASDJLKDASJLKDLJKSAJLKDSLJKALSJKDLJKADSLJLASJKDLJKASDJLKADSLJKLKJASDJLAJLSDLJKDSJLKDSJLKALJSKDLJKDALJKDSJKADSJLKLJKASDJLKDASLJKADSJLKALJSDLJK', 13, 'agus.hero@hotmail.com', 3, 'krymer', '2021-11-17'),
(4, 'Alto comentario insertado desde postman', 13, 'asd@hotmail.com', 5, 'pollo', '2021-11-17'),
(5, 'Alto comentario insertado desde postman', 13, 'asd@hotmail.com', 5, 'pollo', '2021-11-17'),
(17, 'dasdsa', 15, 'asd@hotmail.com', 1, 'pollo', '2021-11-17'),
(18, 'qqeee', 15, 'asd@hotmail.com', 2, 'pollo', '2021-11-17'),
(19, 'dsadas', 15, 'asd@hotmail.com', 5, 'pollo', '2021-11-17'),
(20, 'Rosemary', 15, 'asd@hotmail.com', 5, 'pollo', '2021-11-17'),
(21, 'A ver ahora pa', 15, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(22, 'A VER AHORA PAAAdreXxx', 15, 'asd@hotmail.com', 5, 'pollo', '2021-11-17'),
(23, 'Un infierno', 17, 'asd@hotmail.com', 2, 'pollo', '2021-11-17'),
(26, 'das', 2, 'asd@hotmail.com', 2, 'pollo', '2021-11-17'),
(84, 'Ahora vas a andar o andar', 28, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(85, 'TOMAAA', 28, 'asd@hotmail.com', 5, 'pollo', '2021-11-17'),
(98, 'sdd', 6, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(103, 'dsadsa', 6, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(104, 'dsadsa', 6, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(105, 'qwqwq', 6, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(106, 'ddd', 6, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(107, 'qww', 6, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(115, 'asdas', 2, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(122, 'dsadas', 2, 'prueba@gmail.com', 4, 'prueba', '2021-11-17'),
(125, '1212', 2, 'prueba@gmail.com', 3, 'prueba', '2021-11-17'),
(126, 'dsadas', 2, 'prueba@gmail.com', 5, 'prueba', '2021-11-17'),
(130, 'Solo existis para probar que mi paginacion anda perfecta', 93, 'asd@hotmail.com', 5, 'pollo', '2021-11-17'),
(132, 'dsad', 11, 'prueba@gmail.com', 2, 'prueba', '2021-11-17'),
(133, 'hola', 2, 'asd@hotmail.com', 2, 'pollo', '2021-11-17'),
(137, 'dsadaohola jej00x ', 1, 'asd@hotmail.com', 4, 'pollo', '2021-11-17'),
(144, 'adssadaaa', 1, 'asd@hotmail.com', 5, 'pollo', '2021-11-17'),
(146, 'materiaza', 1, 'prueba@gmail.com', 4, 'prueba', '2021-11-17'),
(147, 'rico', 2, 'asd@hotmail.com', 3, 'pollo', '2021-11-18'),
(148, 'a ver la hs', 2, 'asd@hotmail.com', 3, 'pollo', '2021-11-18'),
(149, 'a verr', 2, 'asd@hotmail.com', 3, 'pollo', '2021-11-18'),
(150, 'a ho raa', 2, 'asd@hotmail.com', 5, 'pollo', '2021-11-18'),
(151, 'vamo luiiiiss', 1, 'asd@hotmail.com', 4, 'pollo', '2021-11-18'),
(152, 'dale luis ahora si', 1, 'asd@hotmail.com', 3, 'pollo', '2021-11-18'),
(153, 'DALE LUIIIIIIIIIIIIIIIS', 1, 'asd@hotmail.com', 3, 'pollo', '2021-11-18'),
(154, 'la ultima luishi', 1, 'asd@hotmail.com', 1, 'pollo', '2021-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `profesor` varchar(45) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `modalidad` varchar(20) DEFAULT 'cuatrimestral'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre`, `profesor`, `id_carrera`, `imagen`, `modalidad`) VALUES
(1, 'Algebra Lineal', 'Karina Paz', 2, 'uploads/61969849bc399.png', 'cuatrimestral'),
(2, 'POO', 'Luis Berdun', 1, 'uploads/619afc4802f35.png', 'anual'),
(6, 'Web2', 'Javier Romero', 2, NULL, 'cuatrimestral'),
(7, 'Deep learning', 'Giru', 5, NULL, 'cuatrimestral'),
(8, 'Integracion continua', 'Roco el Barbaro', 3, NULL, 'anual'),
(9, 'Procesamiento del lenguaje natural', 'Andres Dias Pace', 5, NULL, 'anual'),
(10, 'Tecnologias Web', 'Pollo Lopez', 4, NULL, 'cuatrimestral'),
(11, 'Comunicacion de Datos', 'Hugo Curti', 1, NULL, 'cuatrimestral'),
(12, 'Programacion 3', 'Laura Felice', 2, NULL, 'cuatrimestral'),
(13, 'POO', 'Luis Berdun', 2, NULL, 'anual'),
(14, 'Web1', 'Roco Miraginai', 3, NULL, 'anual'),
(15, 'Web2', 'Javier Romario', 4, NULL, 'anual'),
(16, 'Comunicacion de Datos', 'El pimpollo feroz', 2, NULL, 'cuatrimestral'),
(17, 'Programacion 3', 'Laura Felice', 4, NULL, 'cuatrimestral'),
(28, 'Pickoff', 'Necro phos', 7, NULL, 'cuatrimestral'),
(29, 'Maps awareness', 'BSJ', 7, NULL, 'anual'),
(30, 'Itemization', 'D bowie', 7, NULL, 'cuatrimestral'),
(31, 'Ingenieria de Software', 'Quirque', 1, NULL, 'anual'),
(44, 'Redes hogareñas', 'Rolo Carretto', 11, NULL, 'cuatrimestral'),
(45, 'Soporte previsorio', 'Epicuro Gomez', 11, NULL, 'cuatrimestral'),
(48, 'Tecnologia educativa', 'Guillermo Conti', 6, NULL, 'anual'),
(50, 'Matematica discreta', 'Emilio Alfaro', 6, NULL, 'anual'),
(64, 'Web1', 'Javier Dottori', 2, NULL, 'cuatrimestral'),
(65, 'Ergonomia', 'Aldo Rico', 21, NULL, 'cuatrimestral'),
(66, 'Accesibilidad WEB', 'Michael Jackson', 21, NULL, 'cuatrimestral'),
(71, 'BEST BAND', 'Queen', 2, NULL, 'cuatrimestral'),
(80, 'Programacion exploratoria', 'Francisco Lavalle', 1, NULL, 'cuatrimestral'),
(82, 'Ingenieria en Software', 'Luis Pocollo', 1, NULL, 'cuatrimestral'),
(93, 'pollo', 'Javier Dottori', 1, NULL, 'cuatrimestral'),
(94, 'dqq', 'dsa', 1, NULL, 'cuatrimestral'),
(95, 'asdbbv', 'dd', 1, NULL, 'cuatrimestral'),
(96, 'Web design', 'Priscila Regner', 2, NULL, 'cuatrimestral'),
(97, 'Desarrollo de algoritmia trasversal', 'Rivaldo', 5, NULL, 'cuatrimestral');

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
('gigadomo', 'usuario', '$2y$10$UGri8Imc/Vk5iwfMGG57l.5M24v5ZX9ALMIF6ZNi/VSb2YO8ZJwWm', 'elperro@gmail.com'),
('asdasd', 'usuario', '$2y$10$rsSC2WklwUvAMVQD8DFL9OoymK2vnN4dP9MZb92N3SVu9VbRCJ8.2', 'hybrid@hotmail.com'),
('pollos', 'usuario', '$2y$10$O0.7iUYkzGkx/SY2aKPyruAMvgBvXRjFYf31dmp/G4H6C6OlF0izK', 'paky.rdsaock_@hotmail.com'),
('prueba', 'usuario', '$2y$10$qyCGnyaZeQ2YLX2/joUta.eQ7CBR95QP/gGanU.AWiU6zYK2AS81O', 'prueba@gmail.com'),
('richardo', 'usuario', '$2y$10$kgCo913Y5ab0bN0VTzX4SeRFuSwsnEzdmLzg.FoK.RQJXZXnx9/0m', 'richard@hotmail.com'),
('hyper', 'usuario', '$2y$10$Pub4wJv0HP.mmKBIx75VQ.ZGnq31awUmNAsoZcMGpmO535HE5DeN2', 'rocko'),
('bigger', 'usuario', '$2y$10$seALAZP5WfnxXgZufYNgguq.a.qkVDROST9KTh3J6xyIzX0U7vpkW', 'romario@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_email_usuario` (`fk_email_usuario`),
  ADD KEY `fk_id_materia` (`fk_id_materia`),
  ADD KEY `fk_nombre_usuario` (`fk_nombre_usuario`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD UNIQUE KEY `imagen` (`imagen`),
  ADD KEY `fk_carrera_materia` (`id_carrera`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`fk_email_usuario`) REFERENCES `usuario` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`fk_id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`fk_nombre_usuario`) REFERENCES `usuario` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_carrera_materia` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
