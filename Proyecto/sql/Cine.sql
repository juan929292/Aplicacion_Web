-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-01-2015 a las 23:03:54
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Cine`
--
DROP DATABASE IF EXISTS `Cine`;
CREATE DATABASE IF NOT EXISTS `Cine`;
USE Cine;
-- --------------------------------------------------------



--
-- Estructura de tabla para la tabla `Directores`
--

CREATE TABLE IF NOT EXISTS `Directores` (
`id_director` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pais` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Dirigida_por`
--

CREATE TABLE IF NOT EXISTS `Dirigida_por` (
`id_director` int(10) NOT NULL,
`id_pelicula` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `Es`
--

CREATE TABLE IF NOT EXISTS `Es` (
`id_pelicula` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tienen`
--

CREATE TABLE IF NOT EXISTS `Tienen` (
`id_pelicula` int(10) NOT NULL,
  `id_comentario` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Valoraciones`
--

CREATE TABLE IF NOT EXISTS `Valoraciones` (
`id_valoracion` int(10) NOT NULL,
  `nota` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `Comentarios`
--

CREATE TABLE IF NOT EXISTS `Comentarios` (
`id_comentario` int(10) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_pelicula` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Posee`
--

CREATE TABLE IF NOT EXISTS `Posee` (
  `id_pelicula` int(10) NOT NULL,
  `id_valoracion` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Generos`
--

CREATE TABLE IF NOT EXISTS `Generos` (
`id_genero` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `Generos`
--

INSERT INTO `Generos` (`id_genero`, `nombre`) VALUES
(1, 'Acción'),
(2, 'Animación'),
(3, 'Drama & Romance'),
(4, 'Bélico'),
(5, 'Thriller'),
(6, 'Aventura'),
(7, 'Documental'),
(8, 'Terror'),
(9, 'Western'),
(10, 'Comedia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Peliculas`
--

CREATE TABLE IF NOT EXISTS `Peliculas` (
`id_pelicula` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `duracion` varchar(10) NOT NULL,
  `anio` int(10) NOT NULL,
  `nota_media` int(10),
  `imagen` varchar(300) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `Peliculas`
--

INSERT INTO `Peliculas` (`id_pelicula`, `titulo`, `duracion`, `anio`, `nota_media`, `imagen`) VALUES
(1, 'Pulp fiction', '153 min', 1994, '', '<img width=''200'' height=''300'' src=''img/pull.png''>'),
(2, 'Death Proof ', '114 min', 2007, '', '<img width=''200'' height=''300'' src=''img/deat.png''>'),
(3, 'Jackie Brown', '154 min', 1997, '', '<img width=''200'' height=''300'' src=''img/brown.png''>'),
(4, 'Malditos Bastardos', '153 min', 2009, '', '<img width=''200'' height=''300'' src=''img/malditos.png''>'),
(5, 'Kill Bill: Volumen 1', '110 min', 2003, '', '<img width=''200'' height=''300'' src=''img/kill_1.png''>'),
(6, 'Kill Bill: Volumen 2', '137 min', 2004, '', '<img width=''200'' height=''300'' src=''img/kill_2.png''>'),
(7, 'Memento', '115 min',  2000, '', '<img width=''200'' height=''300'' src=''img/memento.png''>'),
(8, 'Insomnio', '118 min', 2002, '', '<img width=''200'' height=''300'' src=''img/inso.png''>'),
(9, 'Batman Begins ', '140 min', 2005, '', '<img width=''200'' height=''300'' src=''img/begin.png''>'),
(10, 'La Guerra de los Mundos', '116 min', 2005, '', '<img width=''200'' height=''300'' src=''img/guerra_mundos.png''>'),
(11, 'Jurassic Park ', '120 min', 1993, '', '<img width=''200'' height=''300'' src=''img/jurasico.png''>'),
(12, 'Atrápame si puedes ', '120 min', 2002, '', '<img width=''200'' height=''300'' src=''img/atrapame.png''>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
`id_usuario` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


ALTER TABLE Peliculas MODIFY id_pelicula INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE Generos MODIFY id_genero INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE Comentarios MODIFY id_comentario INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE Valoraciones MODIFY id_valoracion INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE Usuarios MODIFY id_usuario INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE Directores MODIFY id_director INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE Dirigida_por ADD PRIMARY KEY (id_pelicula, id_director);

ALTER TABLE Tienen ADD PRIMARY KEY (id_pelicula, id_comentario);

ALTER TABLE Es ADD PRIMARY KEY (id_pelicula, id_genero);

ALTER TABLE Posee ADD PRIMARY KEY (id_pelicula, id_valoracion);

ALTER TABLE Es
ADD FOREIGN KEY (id_pelicula) REFERENCES Peliculas (id_pelicula),
ADD FOREIGN KEY (id_genero) REFERENCES Generos (id_genero);

ALTER TABLE Tienen
ADD FOREIGN KEY (id_pelicula) REFERENCES Peliculas (id_pelicula),
ADD FOREIGN KEY (id_comentario) REFERENCES Comentarios (id_comentario);

ALTER TABLE Posee
ADD FOREIGN KEY (id_pelicula) REFERENCES Peliculas (id_pelicula),
ADD FOREIGN KEY (id_valoracion) REFERENCES Valoraciones (id_valoracion);

ALTER TABLE Dirigida_por
ADD FOREIGN KEY (id_pelicula) REFERENCES Peliculas (id_pelicula),
ADD FOREIGN KEY (id_director) REFERENCES Directores (id_director);

ALTER TABLE Valoraciones
ADD FOREIGN KEY (id_usuario) REFERENCES Usuarios (id_usuario);

ALTER TABLE Comentarios
ADD FOREIGN KEY (id_usuario) REFERENCES Usuarios (id_usuario),
ADD FOREIGN KEY (id_pelicula) REFERENCES Peliculas (id_pelicula);

