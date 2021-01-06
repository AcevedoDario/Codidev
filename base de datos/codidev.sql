-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2020 a las 04:23:43
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `codidev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `nombre_libro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `path_libro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `nombre_libro`, `path_libro`, `logo`, `descripcion`) VALUES
(1, 'Java', './pdf/Java.pdf', './img/logos_libros/java.png', 'Java ofrece la funcionalidad de un lenguaje potente. Hoy en dia Java es uno de los lenguajes de programacion mas usados para programar en todo el mundo.'),
(2, 'C++', './pdf/C++ingenieria_ciencias_Bronson_2ed.pdf', './img/logos_libros/c++.png', 'C++ es un lenguaje de programacion que permite manipular objetos. Su gran potencia lo convierte en uno de los lenguajes de programacion mas demandados en 2019.'),
(3, 'ASP.NET', './pdf/ASP.pdf', './img/logos_libros/asp.png', 'ASP.NET es un framework de Microsoft sucesor de ASP.\r\nUtiliza una tecnologia de uso gratuito para la construccion de sitios web con paginas dinamicas.'),
(4, 'JavaScript', './pdf/Javascript.pdf', './img/logos_libros/javascript.png', 'JavaScript es un lenguaje de programacion o de secuencias de comandos que te permite implementar funciones complejas en paginas web.'),
(5, 'C#', './pdf/C#-Guia-Total-del-Programador.pdf', './img/logos_libros/csharp.png', 'C# es considerado como una evolucion y necesidad de ciertas circunstancias. Evolucion por sus lenguajes antecesores (C y C++).'),
(6, 'Python', './pdf/Python.pdf', './img/logos_libros/python.png', 'Python es un lenguaje de programacion muy simple y facil de entender. Ideal para quien se inicia en la programacion.'),
(7, 'Laravel', './pdf/Laravel-5.pdf', './img/logos_libros/laravel.png', 'Laravel es un framework PHP. Es uno de los frameworks mas utilizados y de mayor comunidad en el mundo de Internet.'),
(8, 'PHP', './pdf/PHP.pdf', './img/logos_libros/php.png', 'PHP es un lenguaje de codigo abierto muy popular, adecuado para desarrollo web y que puede ser incrustado en HTML.'),
(9, 'Angular', './pdf/angular.pdf', './img/logos_libros/angular.png', 'Angular es un framework opensource desarrollado por Google para facilitar la creacion y programacion de aplicaciones web.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `name_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`name_user`, `mail`, `password`, `id_user`) VALUES
('Dario', 'dario_acevedo_1990@hotmail.com', 'asdasdasd', 30),
('Dario', 'dario_acevedo_1990@hotmail.com', 'asdasdasd', 31),
('Dario', 'dario_acevedo_1990@hotmail.com', 'asdasdasd', 32),
('sass', 'asd@asd.asd', 'asdasdasd', 33),
('Dario', 'dario__1990@hotmail.com', 'asdasdasd', 34),
('Dario', 'qeqe@qeqe.com', 'asdasdasd', 35),
('Dario', 'dario_acevedo_1990@Gmail.com', 'asdasdasd', 36),
('martin', 'mnoguerasistemas@gmail.com', 'mnoguera123', 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_libros`
--

CREATE TABLE `usuarios_libros` (
  `id_libro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `finalizado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_libros`
--

INSERT INTO `usuarios_libros` (`id_libro`, `id_usuario`, `finalizado`) VALUES
(8, 37, 1),
(7, 37, 0),
(6, 37, 0),
(9, 37, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_usuarios_libros`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_usuarios_libros` (
`id_usuario` int(11)
,`finalizado` tinyint(1)
,`id_libro` int(11)
,`nombre_libro` varchar(50)
,`path_libro` varchar(100)
,`logo` text
,`descripcion` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_usuarios_libros`
--
DROP TABLE IF EXISTS `vw_usuarios_libros`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_usuarios_libros`  AS SELECT `ul`.`id_usuario` AS `id_usuario`, `ul`.`finalizado` AS `finalizado`, `l`.`id_libro` AS `id_libro`, `l`.`nombre_libro` AS `nombre_libro`, `l`.`path_libro` AS `path_libro`, `l`.`logo` AS `logo`, `l`.`descripcion` AS `descripcion` FROM ((`usuarios_libros` `ul` left join `usuario` `u` on(`u`.`id_user` = `ul`.`id_usuario`)) left join `libro` `l` on(`l`.`id_libro` = `ul`.`id_libro`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
