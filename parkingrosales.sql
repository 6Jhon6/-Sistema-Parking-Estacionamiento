-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2025 a las 20:56:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parkingrosales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `id_conductor` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`id_conductor`, `dni`, `nombre`, `apellido`, `telefono`) VALUES
(16, '12345678A', 'Juan', 'Pérez', '555-1234'),
(17, '23456789B', 'Ana', 'Gómez', '555-2345'),
(18, '34567890C', 'Carlos', 'Ruiz', '555-3456'),
(19, '45678901D', 'Laura', 'Díaz', '555-4567'),
(20, '56789012E', 'Miguel', 'Torres', '555-5678'),
(21, '67890123F', 'Sofía', 'López', '555-6789'),
(22, '78901234G', 'David', 'Martínez', '555-7890'),
(23, '89012345H', 'Elena', 'Sánchez', '555-8901'),
(24, '90123456I', 'Jorge', 'Fernández', '555-9012'),
(25, '01234567J', 'Carmen', 'Jiménez', '555-0123'),
(26, '12345098K', 'Alejandro', 'Morales', '555-0987'),
(27, '23456109L', 'Patricia', 'Castro', '555-1098'),
(28, '34567210M', 'Ricardo', 'Ortega', '555-2109'),
(29, '45678321N', 'Isabel', 'Navarro', '555-3210'),
(30, '56789432O', 'Francisco', 'Molina', '555-4321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_conductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `color` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `placa`, `color`, `marca`) VALUES
(1, 'ABC123', 'Rojo', 'Toyota'),
(2, 'DEF456', 'Azul', 'Honda'),
(3, 'GHI789', 'Verde', 'Ford'),
(4, 'JKL012', 'Blanco', 'Chevrolet'),
(5, 'MNO345', 'Negro', 'Nissan'),
(6, 'PQR678', 'Gris', 'Hyundai'),
(7, 'STU901', 'Amarillo', 'Kia'),
(8, 'VWX234', 'Rojo', 'Mazda'),
(9, 'YZA567', 'Azul', 'Subaru'),
(10, 'BCD890', 'Verde', 'Volkswagen'),
(11, 'EFG123', 'Blanco', 'BMW'),
(12, 'HIJ456', 'Negro', 'Mercedes-Benz'),
(13, 'KLM789', 'Gris', 'Audi'),
(14, 'NOP012', 'Amarillo', 'Lexus'),
(15, 'QRS345', 'Rojo', 'Tesla');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id_conductor`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_conductor` (`id_conductor`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `placa` (`placa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id_conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id_conductor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
