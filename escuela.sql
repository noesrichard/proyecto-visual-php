-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2021 a las 02:28:56
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `ced_alu` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_alu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ape_alu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel_alu` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dir_alu` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `ced_rep_alu` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_mat` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nom_mat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `des_mat` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `ced_pro_mat` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_mat_not` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `uno_not` double DEFAULT NULL,
  `dos_not` double DEFAULT NULL,
  `ced_alu_not` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `ced_pro` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_pro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ape_pro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel_pro` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dir_pro` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `ced_rep` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_rep` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ape_rep` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel_rep` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dir_rep` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nom_rol` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `des_rol` tinytext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nom_rol`, `des_rol`) VALUES
(0, 'admin', 'permisos de crear eliminar y actualizar todo '),
(1, 'profesor', 'permisos de crear notas'),
(2, 'alumno', 'solo ver'),
(3, 'representante', 'ver notas del representado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_rol_usu` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD UNIQUE KEY `ced_alu` (`ced_alu`),
  ADD KEY `ced_rep_alu` (`ced_rep_alu`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_mat`),
  ADD KEY `ced_pro_mat` (`ced_pro_mat`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD KEY `ced_alu_not` (`ced_alu_not`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD UNIQUE KEY `ced_pro` (`ced_pro`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD UNIQUE KEY `ced_rep` (`ced_rep`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_rol_usu` (`id_rol_usu`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`ced_rep_alu`) REFERENCES `representante` (`ced_rep`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`ced_alu`) REFERENCES `usuario` (`username`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`ced_pro_mat`) REFERENCES `profesor` (`ced_pro`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`ced_alu_not`) REFERENCES `alumno` (`ced_alu`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`ced_pro`) REFERENCES `usuario` (`username`);

--
-- Filtros para la tabla `representante`
--
ALTER TABLE `representante`
  ADD CONSTRAINT `representante_ibfk_1` FOREIGN KEY (`ced_rep`) REFERENCES `usuario` (`username`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol_usu`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
