-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2015 a las 23:12:32
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `truco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartas`
--

CREATE TABLE IF NOT EXISTS `cartas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carta` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `palo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `image` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `cartas`
--

INSERT INTO `cartas` (`id`, `carta`, `palo`, `valor`, `image`) VALUES
(1, '1', 'basto', 1, '1_basto.jpg'),
(2, '2', 'basto', 2, '2_basto.jpg'),
(3, '3', 'basto', 3, '3_basto.jpg'),
(4, '4', 'basto', 4, '4_basto.jpg'),
(5, '5', 'basto', 5, '5_basto.jpg'),
(6, '6', 'basto', 6, '6_basto.jpg'),
(7, '7', 'basto', 0, '7_basto.jpg'),
(8, '1', 'espada', 0, '1_espada.jpg'),
(9, '2', 'espada', 0, '2_espada.jpg'),
(10, '3', 'espada', 0, '3_espada.jpg'),
(11, '4', 'espada', 0, '4_espada.jpg'),
(12, '5', 'espada', 0, '5_espada.jpg'),
(13, '6', 'espada', 0, '6_espada.jpg'),
(14, '7', 'espada', 0, '7_espada.jpg'),
(15, '1', 'copa', 0, '1_copa.jpg'),
(16, '2', 'copa', 0, '2_copa.jpg'),
(17, '3', 'copa', 0, '3_copa.jpg'),
(18, '4', 'copa', 0, '4_copa.jpg'),
(19, '5', 'copa', 0, '5_copa.jpg'),
(20, '6', 'copa', 0, '6_copa.jpg'),
(21, '7', 'copa', 0, '7_copa.jpg'),
(22, '1', 'oro', 0, '1_oro.jpg'),
(23, '2', 'oro', 0, '2_oro.jpg'),
(24, '3', 'oro', 0, '3_oro.jpg'),
(25, '4', 'oro', 0, '4_oro.jpg'),
(26, '5', 'oro', 0, '5_oro.jpg'),
(27, '6', 'oro', 0, '6_oro.jpg'),
(28, '7', 'oro', 0, '7_oro.jpg'),
(29, '10', 'oro', 0, '10_oro.jpg'),
(30, '11', 'oro', 0, '11_oro.jpg'),
(31, '12', 'oro', 0, '12_oro.jpg'),
(32, '12', 'copa', 0, '12_copa.jpg'),
(33, '11', 'copa', 0, '11_copa.jpg'),
(34, '10', 'copa', 0, '10_copa.jpg'),
(35, '10', 'basto', 0, '10_basto.jpg'),
(36, '11', 'basto', 0, '11_basto.jpg'),
(37, '12', 'basto', 0, '12_basto.jpg'),
(38, '12', 'espada', 0, '12_espada.jpg'),
(39, '11', 'espada', 0, '11_espada.jpg'),
(40, '10', 'espada', 0, '10_espada.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartas_tiradas1`
--

CREATE TABLE IF NOT EXISTS `cartas_tiradas1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cartas_tiradas1`
--

INSERT INTO `cartas_tiradas1` (`id`, `carta_id`) VALUES
(1, 22),
(2, 27),
(3, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartas_tiradas2`
--

CREATE TABLE IF NOT EXISTS `cartas_tiradas2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cartas_tiradas2`
--

INSERT INTO `cartas_tiradas2` (`id`, `carta_id`) VALUES
(1, 2),
(2, 6),
(3, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manoj1`
--

CREATE TABLE IF NOT EXISTS `manoj1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carta_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `partida_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=70 ;

--
-- Volcado de datos para la tabla `manoj1`
--

INSERT INTO `manoj1` (`id`, `carta_id`, `estado`, `partida_id`) VALUES
(1, 37, 1, 1),
(2, 21, 0, 1),
(3, 34, 0, 1),
(4, 36, 1, 2),
(5, 29, 1, 2),
(6, 19, 1, 2),
(7, 16, 0, 3),
(8, 2, 1, 3),
(9, 18, 1, 3),
(10, 31, 1, 4),
(11, 39, 0, 4),
(12, 23, 0, 4),
(13, 10, 1, 5),
(14, 40, 1, 5),
(15, 34, 1, 5),
(16, 5, 0, 6),
(17, 6, 0, 6),
(18, 4, 0, 6),
(19, 19, 0, 7),
(20, 16, 1, 7),
(21, 1, 0, 7),
(22, 18, 0, 8),
(23, 6, 0, 8),
(24, 36, 0, 8),
(25, 18, 0, 9),
(26, 19, 1, 9),
(27, 31, 1, 9),
(28, 8, 0, 10),
(29, 12, 0, 10),
(30, 29, 0, 10),
(31, 37, 0, 11),
(32, 38, 0, 11),
(33, 8, 0, 11),
(34, 24, 0, 12),
(35, 12, 0, 12),
(36, 32, 0, 12),
(37, 27, 0, 13),
(38, 22, 0, 13),
(39, 29, 0, 13),
(40, 4, 0, 14),
(41, 39, 0, 14),
(42, 17, 0, 14),
(43, 40, 0, 15),
(44, 4, 0, 15),
(45, 13, 0, 15),
(46, 31, 0, 16),
(47, 3, 0, 16),
(48, 6, 0, 16),
(49, 31, 1, 17),
(50, 12, 1, 17),
(51, 15, 1, 17),
(52, 27, 0, 18),
(53, 1, 0, 18),
(54, 37, 0, 18),
(55, 28, 0, 19),
(56, 16, 0, 19),
(57, 11, 0, 19),
(58, 26, 0, 20),
(59, 13, 0, 20),
(60, 19, 1, 20),
(61, 20, 1, 21),
(62, 24, 1, 21),
(63, 28, 1, 21),
(64, 16, 1, 22),
(65, 7, 1, 22),
(66, 34, 1, 22),
(67, 16, 1, 23),
(68, 22, 1, 23),
(69, 27, 1, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manoj2`
--

CREATE TABLE IF NOT EXISTS `manoj2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carta_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `partida_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=70 ;

--
-- Volcado de datos para la tabla `manoj2`
--

INSERT INTO `manoj2` (`id`, `carta_id`, `estado`, `partida_id`) VALUES
(1, 10, 1, 1),
(2, 39, 1, 1),
(3, 9, 1, 1),
(4, 11, 1, 2),
(5, 25, 1, 2),
(6, 22, 1, 2),
(7, 10, 1, 3),
(8, 30, 0, 3),
(9, 22, 1, 3),
(10, 18, 1, 4),
(11, 28, 0, 4),
(12, 10, 0, 4),
(13, 35, 1, 5),
(14, 33, 1, 5),
(15, 3, 1, 5),
(16, 9, 0, 6),
(17, 30, 0, 6),
(18, 7, 0, 6),
(19, 5, 1, 7),
(20, 4, 1, 7),
(21, 20, 0, 7),
(22, 9, 0, 8),
(23, 21, 0, 8),
(24, 26, 0, 8),
(25, 36, 1, 9),
(26, 20, 0, 9),
(27, 12, 1, 9),
(28, 33, 0, 10),
(29, 11, 0, 10),
(30, 4, 0, 10),
(31, 39, 0, 11),
(32, 13, 0, 11),
(33, 30, 0, 11),
(34, 27, 0, 12),
(35, 7, 0, 12),
(36, 11, 0, 12),
(37, 34, 0, 13),
(38, 2, 0, 13),
(39, 32, 0, 13),
(40, 18, 0, 14),
(41, 6, 0, 14),
(42, 12, 0, 14),
(43, 39, 0, 15),
(44, 1, 0, 15),
(45, 16, 0, 15),
(46, 36, 0, 16),
(47, 10, 0, 16),
(48, 35, 0, 16),
(49, 5, 1, 17),
(50, 26, 1, 17),
(51, 19, 1, 17),
(52, 33, 0, 18),
(53, 7, 0, 18),
(54, 39, 0, 18),
(55, 29, 0, 19),
(56, 4, 0, 19),
(57, 32, 0, 19),
(58, 30, 1, 20),
(59, 14, 1, 20),
(60, 18, 1, 20),
(61, 34, 1, 21),
(62, 38, 1, 21),
(63, 26, 1, 21),
(64, 2, 1, 22),
(65, 11, 1, 22),
(66, 20, 1, 22),
(67, 2, 1, 23),
(68, 6, 1, 23),
(69, 39, 1, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE IF NOT EXISTS `partidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jugador1` int(11) DEFAULT NULL,
  `jugador2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`id`, `fecha`, `jugador1`, `jugador2`) VALUES
(1, '0000-00-00 00:00:00', 1, 2),
(2, '0000-00-00 00:00:00', 2, 1),
(3, '0000-00-00 00:00:00', 1, 2),
(4, '0000-00-00 00:00:00', 1, 2),
(5, '0000-00-00 00:00:00', 1, 2),
(6, '0000-00-00 00:00:00', 1, 2),
(7, '0000-00-00 00:00:00', 2, 1),
(8, '0000-00-00 00:00:00', 2, 1),
(9, '0000-00-00 00:00:00', 1, 2),
(10, '0000-00-00 00:00:00', 1, NULL),
(11, '0000-00-00 00:00:00', 1, NULL),
(12, '0000-00-00 00:00:00', 2, NULL),
(13, '0000-00-00 00:00:00', 1, 1),
(14, '0000-00-00 00:00:00', 2, NULL),
(15, '0000-00-00 00:00:00', 2, NULL),
(16, '0000-00-00 00:00:00', 2, NULL),
(17, '0000-00-00 00:00:00', 1, 2),
(18, '0000-00-00 00:00:00', 1, NULL),
(19, '0000-00-00 00:00:00', 1, 1),
(20, '0000-00-00 00:00:00', 1, 1),
(21, '0000-00-00 00:00:00', 1, 1),
(22, '0000-00-00 00:00:00', 1, 2),
(23, '0000-00-00 00:00:00', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntajes`
--

CREATE TABLE IF NOT EXISTS `puntajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `puntos` int(11) NOT NULL,
  `user_id` int(1) NOT NULL,
  `partida_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'user2', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
