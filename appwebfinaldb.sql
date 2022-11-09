-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2022 a las 03:37:36
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appwebfinaldb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pos` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`id`, `name`, `img`, `user`, `pos`) VALUES
(53, 'archeryrin', '1667958192Archer_Y_Rin.jpg', 'Chris45Z', 'NO'),
(54, 'wonderland', '1667958205Wonderland.jpg', 'Chris45Z', 'SI'),
(55, 'hero', '1667958230Hero.png', 'Chris45Z', 'NINGUNA'),
(56, 'mikasa', '1667958248attack-titan-theme.jpg', 'Chris45Z', 'NINGUNA'),
(57, 'fondo', '1667958323Fondo_Negro.jpg', 'samuel', 'NINGUNA'),
(58, 'yukino', '1667958337Yukino.jpg', 'samuel', 'NINGUNA'),
(59, 'guildhero', '1667958361Guild_hero.jpg', 'samuel', 'SI'),
(60, 'aotmiku', '1667958383attack_on_titan_hatsune_miku_.jpg', 'samuel', 'NINGUNA'),
(61, 'art', '1667958413artes.png', 'samuel', 'NINGUNA'),
(62, 'e404', '1667958482404Logo.jpg', 'gfl12', 'NINGUNA'),
(63, 'ump45', '1667958492UMP45_Squad.png', 'gfl12', 'SI'),
(64, 'squad404', '1667958512Squad_404_8.png', 'gfl12', 'NINGUNA'),
(65, 'squad4042', '1667958524Squad_404_4.jpg', 'gfl12', 'SI'),
(66, 'ump9', '1667958537UMP9_9.jpg', 'gfl12', 'NINGUNA'),
(67, 'artimg1', '1667958582asignatura-de-arte.png', 'admin', 'NINGUNA'),
(68, 'Code_art_online', '1667958603Code_Art_Online.png', 'admin', 'NO'),
(69, 'EYEART', '1667958619watercolor1.png', 'admin', 'SI'),
(75, 'Black Bat', '1667959932Black Bat Hi.jpg', 'Chris45Z', 'NO'),
(77, 'Batfamily', '1667960459Bat. Capture+_2017-11-27-19-09-36.png', 'admin', 'SI'),
(78, 'batfather', '1667960874Bat. Capture+_2017-07-19-09-52-48.png', 'admin', 'SI'),
(79, 'imagen 123', '1667960972Bat. Capture+_2017-11-17-22-21-58.png', 'Chris45Z', 'NINGUNA'),
(80, 'Una mas', '1667961333Oficial Black Bat.jpg', 'otrouser', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `password`) VALUES
(1, 'samuel', '5678'),
(18, 'Chris45Z', '12345'),
(19, 'gfl12', '1111'),
(20, 'ArmandoParedes', 'Armadaesta'),
(21, 'otrouser', 'aaaaa'),
(22, 'Cliente1', 'cdcdc');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
