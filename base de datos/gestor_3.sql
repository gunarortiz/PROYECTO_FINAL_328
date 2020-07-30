-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2020 a las 05:12:30
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Supervisor'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_archivos`
--

CREATE TABLE `t_archivos` (
  `id_archivos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_p` varchar(200) NOT NULL,
  `paterno_p` varchar(200) NOT NULL,
  `materno_p` varchar(200) NOT NULL,
  `carnet` varchar(250) NOT NULL,
  `fecha_nac` varchar(50) NOT NULL,
  `num_resolucion` varchar(100) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_archivos`
--

INSERT INTO `t_archivos` (`id_archivos`, `id_usuario`, `id_categoria`, `nombre_p`, `paterno_p`, `materno_p`, `carnet`, `fecha_nac`, `num_resolucion`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(12, 6, 7, '', '', '', '', '', '', 'CamScanner 06-08-2020 15.03.47.pdf', 'pdf', '../../archivos/6/CamScanner 06-08-2020 15.03.47.pdf', '2020-06-11 20:30:22'),
(13, 6, 7, '', '', '', '', '', '', 'ImprimirForlumario.pdf', 'pdf', '../../archivos/6/ImprimirForlumario.pdf', '2020-06-16 15:44:16'),
(14, 6, 9, '', '', '', '', '', '', 'ImprimirForlumario.pdf', 'pdf', '../../archivos/6/ImprimirForlumario.pdf', '2020-06-16 17:52:18'),
(15, 6, 8, '', '', '', '', '', '', 'ImprimirCertificado.pdf', 'pdf', '../../archivos/6/ImprimirCertificado.pdf', '2020-06-16 17:55:15'),
(17, 8, 10, '', '', '', '', '', '', 'ImprimirCertificado.pdf', 'pdf', '../../archivos/8/ImprimirCertificado.pdf', '2020-06-16 21:17:36'),
(18, 8, 10, '', '', '', '123456', '', '', 'ImprimirCertificado.pdf', 'pdf', '../../archivos/8/ImprimirCertificado.pdf', '2020-06-16 21:46:49'),
(19, 8, 10, 'edwin ', 'mamani', 'chambi', '8262558', '01/09/1988', '4521-bf', '2. Inf. Esp. Endodoncia  2020 - 2021.pdf', 'pdf', '../../archivos/8/2. Inf. Esp. Endodoncia  2020 - 2021.pdf', '2020-06-16 22:09:53'),
(20, 8, NULL, 'HERNESTO', 'CRUZ', 'APAZA', '854552', '15/05/1980', '548-BF', '1. INF. Programa GRAL. 2020.pdf', 'pdf', '../../archivos/8/1. INF. Programa GRAL. 2020.pdf', '2020-06-16 22:23:40'),
(21, 8, NULL, 'HAROL ', 'QUIROGA', 'MACHACA', '587552', '15/05/2020', '5421-FG', 'POSTULACION A PROGRAMAS DE ESPECIALIDADES EN REHABILITACION ORAL MENCION PROTESIS.pdf', 'pdf', '../../archivos/8/POSTULACION A PROGRAMAS DE ESPECIALIDADES EN REHABILITACION ORAL MENCION PROTESIS.pdf', '2020-06-16 22:39:52'),
(22, 8, NULL, 'GONZALO ', 'MAMANI', 'CHAMBI', '856222', '15/05/1990', '455-GF', 'CARNET DE IDENTIDAD .pdf', 'pdf', '../../archivos/8/CARNET DE IDENTIDAD .pdf', '2020-06-16 22:40:39'),
(23, 8, NULL, 'RAUL', 'QUISPE', 'TANCARA', '85621', '15/08/1988', '547-DF', '2. Inf. Esp. Endodoncia  2020 - 2021.pdf', 'pdf', '../../archivos/8/2. Inf. Esp. Endodoncia  2020 - 2021.pdf', '2020-06-16 22:41:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categorias`
--

CREATE TABLE `t_categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_categorias`
--

INSERT INTO `t_categorias` (`id_categoria`, `id_usuario`, `nombre`, `fechaInsert`) VALUES
(7, 6, 'maquinas', '2020-06-11 19:02:06'),
(8, 6, 'bicicletas', '2020-06-16 17:50:54'),
(9, 6, 'computadoras', '2020-06-16 17:51:32'),
(10, 8, 'laptos', '2020-06-16 21:17:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `carnet` varchar(250) NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `trabajo` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usuario` varchar(200) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `insert` datetime NOT NULL DEFAULT current_timestamp(),
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `nombre`, `carnet`, `fechaNacimiento`, `trabajo`, `email`, `usuario`, `password`, `insert`, `rol`) VALUES
(6, 'idven edwin ', '12345678', '2020-06-02', 'DNSTA', 'nevdi@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2020-06-11 18:35:58', 1),
(8, 'jise ponce quispe', '8877545', '2020-06-10', 'SEGIP', 'jisse@gmail.com', 'jisse', '44ea50aefc1e842916235279f7b2986c5e8cd86d', '2020-06-11 21:39:04', 3),
(11, 'edwin mamani', '548754', '2020-06-03', 'DNSTA', 'edwin@gmail.com', 'pamela', '44ea50aefc1e842916235279f7b2986c5e8cd86d', '2020-06-16 19:06:16', 2),
(12, 'rolando poma ticona', '452145', '2020-06-10', 'TRANSITO', 'rolando@rolando', 'rolando', 'f9c9f08887216ecda36ebaad460b99f67d8579a7', '2020-06-16 19:45:10', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD PRIMARY KEY (`id_archivos`),
  ADD KEY `fkarchivosCategorias_idx` (`id_categoria`),
  ADD KEY `fkUsuariosArchivos_idx` (`id_usuario`);

--
-- Indices de la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fkCategoriaUsuario_idx` (`id_usuario`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  MODIFY `id_archivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD CONSTRAINT `fkArchivosCategorias` FOREIGN KEY (`id_categoria`) REFERENCES `t_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkUsuariosArchivos` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD CONSTRAINT `fkCategoriaUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `t_usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
