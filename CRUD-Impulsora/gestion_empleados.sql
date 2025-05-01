-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2025 at 03:25 AM
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
-- Database: `gestion_empleados`
--

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `departamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `correo`, `departamento`) VALUES
(6, 'cuatro', 'cu@as', 'compras'),
(9, 'as', 'asljksndfik@gmail.com', 'asaaa'),
(13, 'as', 'asljksndfik@gmail.com', 'as'),
(16, 'as', 'asljksndfik@gmail.com', 'as'),
(17, 'adonis', 'adonis1@gamil.com', 'Sistemas'),
(18, 'adonis2', 'adonis2@gamil.com', 'Sistemas'),
(19, 'adonis3', 'adonis3@gamil.com', 'Sistemas'),
(20, 'adonis4', 'adonis4@gamil.com', 'Sistemas'),
(21, 'adonis5', 'adonis5@gamil.com', 'Sistemas'),
(22, 'adonis6', 'adonis6@gamil.com', 'Sistemas'),
(23, 'adonis6', 'adonis6@gamil.com', 'aa'),
(24, 'Empleado 1', 'asljksndfik@gmail.com', 'Sistemas'),
(25, 'aa', 'aa@aa', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre_equipo` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `numero_serie` varchar(100) NOT NULL,
  `empleado_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id`, `nombre_equipo`, `tipo`, `numero_serie`, `empleado_id`) VALUES
(3, 'equipo 2', 'we', '1234', 21),
(4, 'equipo 3', 'Turbio', '12', 23),
(6, 'equipo 3', 'Turbio', '12567a', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_serie` (`numero_serie`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
