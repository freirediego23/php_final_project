-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 08:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escuela`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `passwords` varchar(250) DEFAULT NULL,
  `rol_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `passwords`, `rol_type`) VALUES
(1, 'admin@admin.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `passwords` varchar(250) DEFAULT NULL,
  `rol_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `email`, `passwords`, `rol_type`) VALUES
(1, 'Juan Gomez', 'juan@mail.com', 'juan', 'alumno'),
(2, 'Carlos Garcia', 'carlos3@mail.com', 'carlos3', 'admin'),
(44, 'Julio Ramos', 'julio@mail.com', 'jul3', 'alumno'),
(45, 'John Stefano', 'john@mail.com', 'john2', 'admin'),
(46, 'Ivan Ramirez', 'ivo@mail.com', 'ivo23', 'alumno'),
(47, 'Erick Calle', 'eric2@mail.com', 'eric1', 'alumno'),
(48, 'Francisco Rosa', 'fran5@mail.com', 'fran2', 'alumno'),
(49, 'Junior Sandoval', 'juni2@mail.com', 'jun2', 'alumno'),
(50, 'Samuel Castro', 'sam2@mail.com', 'sam2', 'alumno'),
(51, 'Gregorio Granja', 'greg2@mail.com', 'greg1', 'alumno');

-- --------------------------------------------------------

--
-- Table structure for table `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `nombre_clase` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clases`
--

INSERT INTO `clases` (`id`, `nombre_clase`) VALUES
(1, 'Matematica Avanzada 6'),
(2, 'Ciencias'),
(3, 'Cocina');

-- --------------------------------------------------------

--
-- Table structure for table `clases_alumnos`
--

CREATE TABLE `clases_alumnos` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clases_alumnos`
--

INSERT INTO `clases_alumnos` (`id`, `alumno_id`, `clase_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(15, 45, 2),
(16, 44, 1),
(17, 46, 2),
(18, 47, 3),
(19, 48, 1),
(20, 49, 2),
(21, 50, 3),
(22, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clases_maestros`
--

CREATE TABLE `clases_maestros` (
  `id` int(11) NOT NULL,
  `maestro_id` int(11) DEFAULT NULL,
  `clase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clases_maestros`
--

INSERT INTO `clases_maestros` (`id`, `maestro_id`, `clase_id`) VALUES
(8, 13, 3),
(13, 21, 2),
(17, 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `maestros`
--

CREATE TABLE `maestros` (
  `id` int(11) NOT NULL,
  `nombres` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `passwords` varchar(250) DEFAULT NULL,
  `rol_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maestros`
--

INSERT INTO `maestros` (`id`, `nombres`, `email`, `passwords`, `rol_type`) VALUES
(13, 'Carlos Castro', 'castro2@mail.com', 'cast2', 'maestro'),
(21, 'Kevin Parrales', 'parra@mail.com', 'parra1', 'maestro'),
(32, 'Alejandro Rezo', 'ale@mail.com', 'loja2', 'maestro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clases_alumnos_ibfk_1` (`alumno_id`),
  ADD KEY `clases_alumnos_ibfk_2` (`clase_id`);

--
-- Indexes for table `clases_maestros`
--
ALTER TABLE `clases_maestros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clases_maestros_ibfk_1` (`maestro_id`),
  ADD KEY `clases_maestros_ibfk_2` (`clase_id`);

--
-- Indexes for table `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `clases_maestros`
--
ALTER TABLE `clases_maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  ADD CONSTRAINT `clases_alumnos_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_alumnos_ibfk_2` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clases_maestros`
--
ALTER TABLE `clases_maestros`
  ADD CONSTRAINT `clases_maestros_ibfk_1` FOREIGN KEY (`maestro_id`) REFERENCES `maestros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_maestros_ibfk_2` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
