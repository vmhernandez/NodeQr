-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-07-2016 a las 00:59:08
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `masisa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `correo` varchar(30) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`correo`, `contrasena`) VALUES
('admin@nodeqr.cl', '123456'),
('jisalzar@ing.ucsc.cl', ' p8DQNmA1n'),
('vefigueroa@ing.ucsc.cl', ' Go39FumdN87');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madera`
--

CREATE TABLE IF NOT EXISTS `madera` (
  `id_madera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `Empresa` varchar(40) NOT NULL,
  `uso` varchar(40) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  PRIMARY KEY (`id_madera`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `madera`
--

INSERT INTO `madera` (`id_madera`, `nombre`, `Empresa`, `uso`, `descripcion`) VALUES
(1, 'ECOPLAC', 'Masisa', 'Construccion/interior', 'Ecoplac es un tablero delgado de particulas finas de madera unidas entre si mediante un adhesivo ureico, fabricado en un proceso de prensa continua, con lo cual se obtiene un tablero con una amplia gama de formatos, y una superficie lisa y homogenea, especial para tabiques. (**) Formato Ecoplac solo disponible en 8 mm.\n\nEn caso de siniestros, los tabiques hechos de Ecoplac retiene el fuego por un lapso de 15 a 29 minutos, dependiendo de la intensidad.'),
(2, 'MDF', 'Masisa', 'Construccion/interior', 'Tablero de fibras de madera (MDF) de pino radiata unidas por adhesivos urea-formaldehído. Las fibras de madera son obtenidas mediante un proceso termo-mecánico y unidas con adhesivo que polimeriza mediante altas presiones y temperaturas.'),
(3, 'MDF RH', 'Masisa', 'Construccion/interior', ''),
(4, 'MDP', 'Masisa', 'Construccion/interior', ''),
(5, 'MDP RH', 'Masisa', 'Construccion/interior', ''),
(6, 'OLB', 'Masisa', 'Construccion/interior', ''),
(7, 'PB Grueso', 'Masisa', 'Construccion/interior', ''),
(8, 'Masisa Tricoya XB', 'Masisa', 'Construccion/exterior', ''),
(9, 'PB Cierre Perimetral', 'Masisa', 'Construccion/exterior', ''),
(10, 'Melamina', 'Masisa', 'Mobiliario', ''),
(11, 'Enchapado', 'Masisa', 'Mobiliario', ''),
(12, 'Laminado Alto Brillo', 'Masisa', 'Mobiliario', ''),
(13, 'Pintado', 'Masisa', 'Mobiliario', ''),
(14, 'Molduras Con Folio', 'Masisa', 'Revestimientos', ''),
(15, 'Molduras Prepintadas', 'Masisa', 'Revestimientos', ''),
(16, 'Rev. Enchapado Ranurado', 'Masisa', 'Revestimientos', ''),
(17, 'Rev. Pintado Ranuradado', 'Masisa', 'Revestimientos', ''),
(18, 'Rev. 3D Ranurado', 'Masisa', 'Revestimientos', ''),
(19, 'Rev. Uso Comercial', 'Masisa', 'Revestimientos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mueble`
--

CREATE TABLE IF NOT EXISTS `mueble` (
  `id_mueble` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(30) NOT NULL,
  `id_sticker` int(11) NOT NULL,
  `foto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `calificacion` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_mueble`),
  KEY `correo` (`correo`),
  KEY `id_sticker` (`id_sticker`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `mueble`
--

INSERT INTO `mueble` (`id_mueble`, `correo`, `id_sticker`, `foto`, `calificacion`, `tipo`) VALUES
(19, 'frafri@gmail.com', 1, 'dk323d.jpg', 5, 'BaÃ±o'),
(20, 'lbrown@gmail.com', 2, 'bfew89w.jpg', 5, 'Dormitorio'),
(22, 'frafri@gmail.com', 3, 'scat962678.jpeg', 4, 'Dormitorio'),
(23, 'frafri@gmail.com', 4, 'kdsn93w.jpg', 5, 'Comedor'),
(24, 'megan@gmail.com', 5, 'kjb3242.jpg', 4, 'Dormitorio'),
(25, '123123@gmail.com', 4, 'fondo5.jpg', 5, 'Comedor');

--
-- Disparadores `mueble`
--
DROP TRIGGER IF EXISTS `actualizar_mueble`;
DELIMITER //
CREATE TRIGGER `actualizar_mueble` AFTER UPDATE ON `mueble`
 FOR EACH ROW UPDATE mueblista 
SET calificacion=(
	SELECT truncate(avg(calificacion),0) 
        FROM mueble WHERE id_sticker=new.id_sticker and old.id_sticker=new.id_sticker) 
WHERE rut_mueblista=(
	SELECT rut_mueblista 
        FROM sticker 
        WHERE id_sticker=new.id_sticker and old.id_sticker=new.id_sticker)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `agregar_mueble`;
DELIMITER //
CREATE TRIGGER `agregar_mueble` AFTER INSERT ON `mueble`
 FOR EACH ROW UPDATE mueblista 
SET calificacion=(
	SELECT truncate(avg(calificacion),0) 
        FROM mueble WHERE id_sticker=new.id_sticker) 
WHERE rut_mueblista=(
	SELECT rut_mueblista 
        FROM sticker 
        WHERE id_sticker=new.id_sticker)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `eliminar_mueble`;
DELIMITER //
CREATE TRIGGER `eliminar_mueble` AFTER DELETE ON `mueble`
 FOR EACH ROW UPDATE mueblista 
SET calificacion=(
	SELECT truncate(avg(calificacion),0) 
        FROM mueble WHERE id_sticker=old.id_sticker) 
WHERE rut_mueblista=(
	SELECT rut_mueblista 
        FROM sticker 
        WHERE id_sticker=old.id_sticker)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mueblista`
--

CREATE TABLE IF NOT EXISTS `mueblista` (
  `rut_mueblista` int(11) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `calificacion` float(10,0) NOT NULL,
  PRIMARY KEY (`rut_mueblista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mueblista`
--

INSERT INTO `mueblista` (`rut_mueblista`, `contrasena`, `nombre`, `foto`, `correo`, `telefono`, `direccion`, `calificacion`) VALUES
(10200300, 'david123', 'David Polanco', '1137904130-36177.jpg', 'davidpolanco@gmail.com', 423216432, 'Paicavi 2003', 5),
(11665333, 'pato123', 'Patricio Villa', '1137904130-3678.jpg', 'villa@gmail.com', 423121, 'Bulnes 2144', 4),
(12333222, 'mon123l', 'Luis Montana', '1137904130-3631.jpg', 'lmontana@gmail.com', 412312312, 'villarica 123', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sticker`
--

CREATE TABLE IF NOT EXISTS `sticker` (
  `id_sticker` int(11) NOT NULL,
  `rut_mueblista` int(11) NOT NULL,
  `id_madera` int(11) NOT NULL,
  PRIMARY KEY (`id_sticker`),
  KEY `rut_mueblista` (`rut_mueblista`),
  KEY `id_madera` (`id_madera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sticker`
--

INSERT INTO `sticker` (`id_sticker`, `rut_mueblista`, `id_madera`) VALUES
(1, 10200300, 13),
(2, 10200300, 1),
(3, 11665333, 8),
(4, 12333222, 12),
(5, 12333222, 10),
(6, 10200300, 14),
(7, 11665333, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `correo` varchar(30) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `contrasena`, `nombre`, `apellido`, `foto`) VALUES
('123123@gmail.com', '123456', 'eMMa', 'Cha', 'woman.png'),
('frafri@gmail.com', 'fra1234', 'Francisca', 'Figueroa', '1137903156-3715.jpg'),
('lbrown@gmail.com', 'lisa123', 'Lisa', 'Brown', '1137903156-375.jpg'),
('megan@gmail.com', 'ruiz123', 'Megan', 'Ruiz', '1137903156-3720.jpg');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mueble`
--
ALTER TABLE `mueble`
  ADD CONSTRAINT `mueble_ibfk_1` FOREIGN KEY (`correo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mueble_ibfk_2` FOREIGN KEY (`id_sticker`) REFERENCES `sticker` (`id_sticker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sticker`
--
ALTER TABLE `sticker`
  ADD CONSTRAINT `sticker_ibfk_1` FOREIGN KEY (`rut_mueblista`) REFERENCES `mueblista` (`rut_mueblista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sticker_ibfk_2` FOREIGN KEY (`id_madera`) REFERENCES `madera` (`id_madera`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
