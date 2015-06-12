-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2015 a las 08:31:40
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hcv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopciones`
--

CREATE TABLE IF NOT EXISTS `adopciones` (
`id` int(11) NOT NULL,
  `nombre_mascota` varchar(255) COLLATE utf8_bin NOT NULL,
  `contacto` varchar(255) COLLATE utf8_bin NOT NULL,
  `edad` int(11) NOT NULL,
  `desparacitado` int(11) NOT NULL,
  `tipo_mascota` int(11) NOT NULL,
  `raza` int(11) DEFAULT NULL,
  `nota` varchar(255) COLLATE utf8_bin NOT NULL,
  `vacunas_dia` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `aprobado` int(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `adopciones`
--

INSERT INTO `adopciones` (`id`, `nombre_mascota`, `contacto`, `edad`, `desparacitado`, `tipo_mascota`, `raza`, `nota`, `vacunas_dia`, `imagen`, `aprobado`) VALUES
(1, 'Chucky', '', 1, 0, 0, 0, 'Chiquito y peligroso', 0, NULL, 1),
(2, 'Rene', '', 4, 1, 0, 0, 'Linda y verde', 1, 'BatmanPose.png', 1),
(3, 'Kato', '', 3, 0, 0, 0, '', 0, '1767_picture.png', 1),
(4, 'Lolita', '', 4, 0, 0, 0, 'Viene con moÃ±itos', 0, '055907Ep3TOIB.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desparacitantes`
--

CREATE TABLE IF NOT EXISTS `desparacitantes` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `ingredienteactivo` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `desparacitantes`
--

INSERT INTO `desparacitantes` (`id`, `nombre`, `ingredienteactivo`, `descripcion`) VALUES
(1, 'Desparacitante1', 'IngredienteActivo1', 'Descripción1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duenos`
--

CREATE TABLE IF NOT EXISTS `duenos` (
`id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `foto` text COLLATE utf8_bin NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `duenos`
--

INSERT INTO `duenos` (`id`, `username`, `password`, `nombre`, `correo`, `foto`, `tipo_usuario`) VALUES
(1, 'Ximena', '$2a$10$mCOHE2fGsRyb8Hhh62NcQOhP10RrQTasB10A8nagllh2ZUsypygoe', 'Ximena', NULL, '', 0),
(3, 'Sunako2709', '$2a$10$7x7sQTaucVmLD5WAilIlHOSaeGg37UcXNfb38ZDojfwKw/pUiRs9e', 'Christell RomÃ¡n', 'sunako2709@gmail.com', '', 0),
(4, 'pepe', '$2a$10$ztdhd0XU9mS7P1anvCon/eDqDimh2aZB7itMnm386fI1TsY.STDuG', 'pepe', 'pepe@pepe.com', 'DeadpoolPose_1.jpeg', 0),
(5, '', NULL, NULL, NULL, '004854DeadpoolPose_1.jpeg', 0),
(8, 'a', '$2a$10$/ff.NPYAGzo/i1GkRhxF.uDpxcEPOU3iVVDNdutBpjDbM3a2HWk4a', 'PedroLuis', 'peter_310@hotmail.com', '', 1),
(9, 'Tass', '$2a$10$mxFsaVixKTHHCDBzLkAVlevDni1TCZAeau672nSsflEKhNlBi/oB2', 'Manuel', 'manuelms11@gmail.com', '', 1),
(10, 'tass', '$2a$10$eQ9jnO91rhiNy1imsxtn..IzYxe9K/6y9XXq37IvnMUzPTXjfpAty', 'Manuel', 'manuelms11@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE IF NOT EXISTS `mascotas` (
`id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `sexo` tinyint(1) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `especie` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `raza` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `longitud` int(11) DEFAULT NULL,
  `foto` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `idusuario`, `sexo`, `edad`, `nombre`, `especie`, `raza`, `peso`, `longitud`, `foto`) VALUES
(1, 1, NULL, 6, 'logan', NULL, NULL, NULL, NULL, 'logan.jpg'),
(2, 10, NULL, 10, 'domino', NULL, NULL, NULL, NULL, ''),
(3, 9, NULL, 10, 'Domino', NULL, NULL, NULL, NULL, ''),
(4, 9, NULL, 5, 'Fifo', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroconsultas`
--

CREATE TABLE IF NOT EXISTS `registroconsultas` (
`id` int(11) NOT NULL,
  `idmascota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `longitud` int(11) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrodesparacitaciones`
--

CREATE TABLE IF NOT EXISTS `registrodesparacitaciones` (
`id` int(11) NOT NULL,
  `idmascota` int(11) NOT NULL,
  `iddesparasitante` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrovacunas`
--

CREATE TABLE IF NOT EXISTS `registrovacunas` (
`id` int(11) NOT NULL,
  `idmascota` int(11) NOT NULL,
  `idvacuna` int(11) NOT NULL,
  `fechavacuna` date NOT NULL,
  `pesoanimal` int(11) DEFAULT NULL,
  `edadanimal` int(11) DEFAULT NULL,
  `longitudanimal` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `registrovacunas`
--

INSERT INTO `registrovacunas` (`id`, `idmascota`, `idvacuna`, `fechavacuna`, `pesoanimal`, `edadanimal`, `longitudanimal`) VALUES
(1, 3, 1, '1111-11-11', 2, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE IF NOT EXISTS `vacunas` (
`id` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`id`, `tipo`, `descripcion`) VALUES
(1, 'tipo1', 'tipo1 descripción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinarias`
--

CREATE TABLE IF NOT EXISTS `veterinarias` (
`id_veterinaria` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `Provincia` varchar(255) COLLATE utf8_bin NOT NULL,
  `Canton` varchar(255) COLLATE utf8_bin NOT NULL,
  `Direccion` varchar(255) COLLATE utf8_bin NOT NULL,
  `Contacto` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `veterinarias`
--

INSERT INTO `veterinarias` (`id_veterinaria`, `Nombre`, `Provincia`, `Canton`, `Direccion`, `Contacto`) VALUES
(1, 'Veterinaria del pueblo', 'Heredia', 'La aurora', 'Del musmanni 500mts norte', '224313434/87865765'),
(2, 'Clinica Dr.Arnoldo Redondo', 'San Jose', 'San Antonio', '300mts este del Banco Nacional', '876456674'),
(3, 'Veterinaria del pueblo', 'Heredia', 'La aurora', 'Del musmanni 500mts norte', '224313434/87865765'),
(4, 'Clinica Dr.Arnoldo Redondo', 'San Jose', 'San Antonio', '300mts este del Banco Nacional', '876456674');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopciones`
--
ALTER TABLE `adopciones`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `desparacitantes`
--
ALTER TABLE `desparacitantes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `duenos`
--
ALTER TABLE `duenos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_MU` (`idusuario`);

--
-- Indices de la tabla `registroconsultas`
--
ALTER TABLE `registroconsultas`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_RCM` (`idmascota`);

--
-- Indices de la tabla `registrodesparacitaciones`
--
ALTER TABLE `registrodesparacitaciones`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_RDP` (`iddesparasitante`), ADD KEY `FK_RMM` (`idmascota`);

--
-- Indices de la tabla `registrovacunas`
--
ALTER TABLE `registrovacunas`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_RVM` (`idmascota`), ADD KEY `FK_RVT` (`idvacuna`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `veterinarias`
--
ALTER TABLE `veterinarias`
 ADD PRIMARY KEY (`id_veterinaria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopciones`
--
ALTER TABLE `adopciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `desparacitantes`
--
ALTER TABLE `desparacitantes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `duenos`
--
ALTER TABLE `duenos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `registroconsultas`
--
ALTER TABLE `registroconsultas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `registrodesparacitaciones`
--
ALTER TABLE `registrodesparacitaciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `registrovacunas`
--
ALTER TABLE `registrovacunas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `veterinarias`
--
ALTER TABLE `veterinarias`
MODIFY `id_veterinaria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
ADD CONSTRAINT `FK_MU` FOREIGN KEY (`idusuario`) REFERENCES `duenos` (`id`);

--
-- Filtros para la tabla `registroconsultas`
--
ALTER TABLE `registroconsultas`
ADD CONSTRAINT `FK_RCM` FOREIGN KEY (`idmascota`) REFERENCES `mascotas` (`id`);

--
-- Filtros para la tabla `registrodesparacitaciones`
--
ALTER TABLE `registrodesparacitaciones`
ADD CONSTRAINT `FK_RDP` FOREIGN KEY (`iddesparasitante`) REFERENCES `desparacitantes` (`id`),
ADD CONSTRAINT `FK_RMM` FOREIGN KEY (`idmascota`) REFERENCES `mascotas` (`id`);

--
-- Filtros para la tabla `registrovacunas`
--
ALTER TABLE `registrovacunas`
ADD CONSTRAINT `FK_RVM` FOREIGN KEY (`idmascota`) REFERENCES `mascotas` (`id`),
ADD CONSTRAINT `FK_RVT` FOREIGN KEY (`idvacuna`) REFERENCES `vacunas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
