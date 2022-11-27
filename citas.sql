-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2021 a las 22:33:01
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `expediente` int(20) NOT NULL,
  `lugar` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `registro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `tel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `start` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `end` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_servicio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `servicio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_ser` int(50) NOT NULL,
  `accion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `title`, `inicio_normal`, `final_normal`, `expediente`, `lugar`, `registro`, `class`, `tel`, `cel`, `start`, `end`, `url`, `nombre_servicio`, `servicio`, `id_ser`, `accion`) VALUES
(4, 'Sandra Ruiz Lopez', '25/08/2021 21:24:00', '25/08/2021 21:24:00', 1, 'oriente', 'bri', 'event-important', '2147483647', '2147483647', '1629941040000', '1629941040000', 'http://localhost/Chabely/descripcion_citas.php?id=4', 'Dra. Margarita', 'Doctora', 4, ''),
(6, 'No agenda de 7 am 8 pm', '26/08/2021 19:18:00', '26/08/2021 19:18:00', 1, 'null', 'null', 'event-palevioletred', '1', '1', '1630019880000', '1630019880000', 'http://localhost/Chabely/descripcion_notas.php?id=6', 'Dra. Margarita', 'Doctora', 4, ''),
(7, 'Luis Romero', '26/08/2021 20:36:00', '26/08/2021 20:36:00', 123, 'oriente', 'bri', 'event-info', '1222311223', '1213323', '1630023780000', '1630023780000', 'http://localhost/Chabely/descripcion_citas.php?id=7', 'Dra. Margarita', 'Doctora', 4, 'Registrada'),
(8, 'ssss', '28/08/2021 07:55:00', '28/08/2021 07:55:00', 12, 'oriente', 'ddd', 'event-info', '2121222', '332312', '1630151700000', '1630151700000', 'http://localhost/Chabely/descripcion_citas.php?id=8', 'Dra. Margarita', 'Doctora', 4, 'Registrada'),
(9, 'dcdc', '26/08/2021 20:43:00', '26/08/2021 20:43:00', 111, 'eddd', 'bri', 'event-info', '2121222', '22121122', '1630024980000', '1630024980000', 'http://localhost/Chabely/descripcion_citas.php?id=9', 'Dra. Margarita', 'Doctora', 4, 'Registrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(50) NOT NULL,
  `nombre_servicio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `servicio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre_servicio`, `apellido`, `servicio`, `estado`) VALUES
(1, 'Pdgo. Andrés de Jesús', 'Narvaez', 'Podologo', 1),
(3, 'Dra. Yazmín ', 'Valdespino', 'Doctora', 1),
(4, 'Dra. Margarita', 'Rodríguez', 'Doctora', 1),
(5, 'L.N. Alma', 'Enríquez', 'Nutriologa', 1),
(6, 'L.N. Verónica', 'Méndez', 'Nutriologa', 1),
(7, 'Psc. Yara', 'Álcantara', 'Psicologa', 1),
(8, 'Psc. Lupita ', 'Jiménez', 'Psicologa', 1),
(10, 'Pdgo. Esmeralda', 'Narvaez', 'Podologa', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inicio_normal` (`inicio_normal`),
  ADD UNIQUE KEY `final_normal` (`final_normal`),
  ADD KEY `id_ser` (`id_ser`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_ser`) REFERENCES `servicios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
