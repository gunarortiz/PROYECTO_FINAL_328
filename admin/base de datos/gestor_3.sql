-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2020 a las 08:25:56
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
-- Base de datos: `gestor_3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `autor` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `localidad` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `profecion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_ini` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `id_usuario`, `autor`, `localidad`, `telefono`, `profecion`, `fecha_ini`) VALUES
(16, 6, 'roberto carlos', 'la paz bolivia', 222222, 'escritor', '2020-07-30 00:26:43'),
(17, 6, 'enrique quisbert', 'peru puno', 2548525, 'quimico', '2020-07-30 00:27:29'),
(18, 6, 'jissela ponce quispe', 'la paz bolivia', 254875, 'farmaceutica', '2020-07-30 00:27:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_editorial` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `editorial` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `localidad` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_ini` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `id_usuario`, `editorial`, `localidad`, `telefono`, `descripcion`, `fecha_ini`) VALUES
(9, 6, 'Santillana', 'la paz bolivia', 8548545, 'editorial boliviano para el conocimiento de todas las personas', '2020-07-30 00:28:42'),
(10, 6, 'don bosco', 'la paz bolivia', 254125, 'creado para inculcar el conocimiento ', '2020-07-30 00:29:09');

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
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_temas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `temas` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_ini` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_temas`, `id_usuario`, `temas`, `descripcion`, `fecha_ini`) VALUES
(10, 6, 'Informatica II', 'Nivel de informatica avanzado para reforzar sus conocimientos', '2020-07-30 00:30:04'),
(11, 6, 'Introduccion a la quimica', 'conocimiento esencial para los estudiantes de quimica', '2020-07-30 00:30:51'),
(12, 6, 'educacion primaria', 'dedicado a los niños en general', '2020-07-30 00:34:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_archivos`
--

CREATE TABLE `t_archivos` (
  `id_archivos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_autor` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `id_temas` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `edicion` varchar(100) NOT NULL,
  `paginas` int(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_archivos`
--

INSERT INTO `t_archivos` (`id_archivos`, `id_usuario`, `id_categoria`, `id_autor`, `id_editorial`, `id_temas`, `titulo`, `edicion`, `paginas`, `descripcion`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(30, 6, 21, 17, 10, 11, 'quimica', 'primera edicion', 200, 'introduccion ala quimica para los estudiantes', 'ImprimirForlumario.pdf', 'pdf', '../../archivos/6/ImprimirForlumario.pdf', '2020-07-30 00:31:54'),
(31, 6, 21, 16, 9, 10, 'SQL y PHP con AJAX', 'primera edicion', 500, 'para desarrolladores que quieran aprender programacion', 'ImprimirCertificado.pdf', 'pdf', '../../archivos/6/ImprimirCertificado.pdf', '2020-07-30 00:33:12'),
(32, 6, 20, 18, 10, 12, 'educacion para niños', 'segunda edicion', 150, 'dedicado a los niños en general', 'ImprimirForlumario.pdf', 'pdf', '../../archivos/6/ImprimirForlumario.pdf', '2020-07-30 00:35:25'),
(33, 6, 21, 17, 9, 10, 'Informatica del saber ', 'tercera edicion', 200, 'es un libro dedicato a todos los estudiantes de la carrera de informatica', 'ImprimirForlumario.pdf', 'pdf', '../../archivos/6/ImprimirForlumario.pdf', '2020-07-30 02:21:16');

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
(20, 6, 'libros para niños', '2020-07-30 00:25:41'),
(21, 6, 'Libros Avanzados', '2020-07-30 00:25:55'),
(22, 6, 'Libros Educativos', '2020-07-30 00:26:03'),
(23, 6, 'Libros de Entretenimiento', '2020-07-30 00:26:13');

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
(15, 'edwin', '8262558', '2020-07-01', 'estudiante', 'nevdi@gmail.com', 'edwin', '3c7a591985b5e780ebcc40916fdeb443b8541c2a', '2020-07-30 00:36:53', 2),
(16, 'carlos vargas nina', '85524', '2020-07-02', 'estudiante', 'carlos@gmail.com', 'carlos', 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64', '2020-07-30 00:43:07', 2),
(17, 'gunar ortiz', '854555', '2020-07-02', 'empleado', 'gunar@gmail.com', 'gunar', 'e16849ae35bdd55833cd3b5a3d8c44eaa5184faf', '2020-07-30 00:52:12', 2),
(18, 'Roberto de la cruz', '58522', '2020-07-03', 'estudiante', 'roberto@gmail.com', 'roberto', '9d500263e1a3252bc63faaca4e2bd9b72da439c3', '2020-07-30 02:01:48', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_editorial`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_temas`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD PRIMARY KEY (`id_archivos`),
  ADD KEY `fkarchivosCategorias_idx` (`id_categoria`),
  ADD KEY `fkUsuariosArchivos_idx` (`id_usuario`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_editorial` (`id_editorial`),
  ADD KEY `id_temas` (`id_temas`);

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
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_temas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  MODIFY `id_archivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD CONSTRAINT `editorial_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `temas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD CONSTRAINT `fkArchivosCategorias` FOREIGN KEY (`id_categoria`) REFERENCES `t_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkUsuariosArchivos` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_archivos_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_archivos_ibfk_2` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_archivos_ibfk_4` FOREIGN KEY (`id_temas`) REFERENCES `temas` (`id_temas`) ON DELETE CASCADE ON UPDATE CASCADE;

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
