-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-02-2009 a las 16:05:22
-- Versión del servidor: 5.0.67
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `illasaro_jquery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidades`
--

CREATE TABLE IF NOT EXISTS `comunidades` (
  `id` int(11) NOT NULL auto_increment,
  `comunidad` tinytext NOT NULL,
  `2008` int(11) NOT NULL default '0',
  `2007` int(11) NOT NULL default '0',
  `2006` int(11) NOT NULL default '0',
  `2005` int(11) NOT NULL default '0',
  `2004` int(11) NOT NULL default '0',
  `2003` int(11) NOT NULL default '0',
  `growth` decimal(11,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Volcar la base de datos para la tabla `comunidades`
--

INSERT INTO `comunidades` (`id`, `comunidad`, `2008`, `2007`, `2006`, `2005`, `2004`, `2003`, `growth`) VALUES
(1, 'Andaluc&iacute;a', 8202220, 8059461, 7975672, 7849799, 7687518, 7606848, '2.60'),
(2, 'Arag&oacute;n', 1326918, 1296655, 1277471, 1249584, 1230090, 1217514, '11.17'),
(3, 'Asturias', 1080138, 1074862, 1076896, 1076635, 1073761, 1075381, '9.73'),
(4, 'Baleares', 1072844, 1030650, 1030650, 983131, 955045, 947361, '8.97'),
(5, 'Canarias', 2075968, 2025951, 1995833, 1968280, 1915540, 1894868, '7.79'),
(6, 'Cantabria', 582138, 572824, 568091, 562309, 554784, 549690, '8.87'),
(7, 'Castilla y Le&oacute;n', 2557330, 2528417, 2523020, 2510849, 2493918, 2487646, '1.88'),
(8, 'Castilla La Mancha', 2043100, 1977304, 1932261, 1894667, 1848881, 1815781, '10.71'),
(9, 'Catalu&ntilde;a', 7364078, 7210508, 7134697, 6995206, 6813319, 6704146, '13.24'),
(10, 'Comunitat Valenciana ', 5029601, 4885029, 4806908, 4692449, 4543304, 4470885, '20.76'),
(11, 'Extremadura', 1097744, 1089990, 1086373, 1083879, 1075286, 1073904, '20.91'),
(12, 'Galicia', 2784169, 2772533, 2767524, 2762198, 2750985, 2751094, '12.82'),
(13, 'Madrid', 6271638, 6081689, 6008183, 5804829, 5718942, 5527152, '9.60'),
(14, 'Murcia', 1426109, 1392117, 1370306, 1335792, 1294694, 1269230, '5.93'),
(15, 'Navarra', 620377, 605876, 601874, 593472, 584734, 578210, '5.99'),
(16, 'Pa&iacute;s Vasco', 2157112, 2141860, 2133684, 2124846, 2115279, 2112204, '0.82'),
(17, 'Rioja', 317501, 308968, 306377, 301084, 293553, 287390, '5106.00');
