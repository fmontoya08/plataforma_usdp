-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2022 a las 21:48:40
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usdp2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(2, 'prueba 2', '2022-08-10 00:00:00', '2022-08-14 00:00:00'),
(3, 'prueba 3', '2022-08-10 00:00:00', '2022-08-11 00:00:00'),
(5, 'prueba 3', '2022-08-11 00:00:00', '2022-08-13 00:00:00'),
(6, 'No asistire', '2022-08-09 00:00:00', '2022-08-10 00:00:00'),
(7, 'krjfkf', '2022-08-17 00:00:00', '2022-08-21 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usdp_clientes`
--

CREATE TABLE `usdp_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `no_cliente` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rfc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `web` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `agregado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usdp_clientes`
--

INSERT INTO `usdp_clientes` (`id_cliente`, `nombre`, `no_cliente`, `direccion`, `rfc`, `telefono`, `email`, `web`, `titulo`, `agregado`, `estatus`, `fecha_ingreso`, `hora_ingreso`) VALUES
(1, 'Francisco Montoya', 112, 'Valle de texcoco226', 'AVI100111D89', '3311093428', '', 'usdp.mx', '', 'Administrador', 1, '2022-08-08', '05:32:19'),
(2, 'Carlos Diaz de leon', 112, 'Francisco de quevedo', 'AVI100111D89', '32145879', '', '', '', 'Francisco Montoya Diaz de leon ', 1, '2022-08-12', '12:25:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usdp_documentos`
--

CREATE TABLE `usdp_documentos` (
  `id_documento` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `tamanio` int(11) NOT NULL,
  `tipo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_archivo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usdp_documentos`
--

INSERT INTO `usdp_documentos` (`id_documento`, `titulo`, `descripcion`, `tamanio`, `tipo`, `nombre_archivo`) VALUES
(1, 'Francisco', 'franksnake08@gmail.com', 75554, 'image/jpeg', '2.jpg'),
(2, 'Eustolia Diaz de leon', 'toli@gmail.com', 7157, 'image/png', '1.png'),
(3, 'Eustolia Diaz de leon', 'toli@gmail.com', 7157, 'image/png', '1.png'),
(4, 'Julieta Sarai Aguas Diaz de leon', 'franksnake08@gmail.com', 23280, 'image/png', '2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usdp_empleados`
--

CREATE TABLE `usdp_empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `puesto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `agregado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usdp_empleados`
--

INSERT INTO `usdp_empleados` (`id_empleado`, `nombre`, `direccion`, `telefono`, `email`, `departamento`, `puesto`, `agregado`, `estatus`, `fecha_ingreso`, `hora_ingreso`) VALUES
(4, 'Julieta Sarai Aguas Diaz de leon', 'Francisco de quevedo', '3311093428', 'julieta@gmail.com', 'taller', 'Desarrollador', 'Francisco Montoya Diaz de leon ', 1, '2022-08-12', '10:46:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usdp_login`
--

CREATE TABLE `usdp_login` (
  `id_login` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `hora_registro` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usdp_login`
--

INSERT INTO `usdp_login` (`id_login`, `nombre`, `contrasena`, `email`, `fecha_registro`, `hora_registro`) VALUES
(1, 'Francisco Montoya Diaz de leon ', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'fmontoya@usdp.mx', '2022-07-19', '12:11:25'),
(7, 'Julieta Sarai Aguas Diaz de leon', 'f350d780ea8aaa48030b4db64f790c14dbcd757f', 'julieta@gmail.com', '2022-08-12', '10:46:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usdp_marcas`
--

CREATE TABLE `usdp_marcas` (
  `id_marca` int(11) NOT NULL,
  `cliente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `titular` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_marca` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `n_expediente` int(11) NOT NULL,
  `n_registro` int(11) NOT NULL,
  `agregado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usdp_marcas`
--

INSERT INTO `usdp_marcas` (`id_marca`, `cliente`, `titular`, `descripcion`, `tipo_marca`, `n_expediente`, `n_registro`, `agregado`, `estatus`, `fecha_ingreso`, `hora_ingreso`) VALUES
(1, 'Francisco Montoya', 'usdp', 'usdp', 'Mixta', 12345, 123456, 'Administrador', 1, '2022-08-08', '06:10:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usdp_proyectos`
--

CREATE TABLE `usdp_proyectos` (
  `id_usuario` int(11) NOT NULL,
  `nombre_proyecto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usdp_proyectos`
--

INSERT INTO `usdp_proyectos` (`id_usuario`, `nombre_proyecto`, `responsable`, `contacto`, `fecha_ingreso`, `hora_ingreso`) VALUES
(1, 'COFEPRIS Instagram', 'Sofia M. Farias Perez', 'DESTILADORA DEL VALLE DE TEQUILA, S.A. DE .C.V.', '2022-07-19', '14:33:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usdp_usuarios`
--

CREATE TABLE `usdp_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `agregado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usdp_usuarios`
--

INSERT INTO `usdp_usuarios` (`id_usuario`, `nombre`, `perfil`, `email`, `telefono`, `agregado`, `estatus`, `fecha_ingreso`, `hora_ingreso`) VALUES
(11, 'Julieta Sarai Aguas Diaz de leon', 'Educadora', 'julieta@gmail.com', '3311093428', 'Francisco Montoya Diaz de leon ', 1, '2022-08-12', '10:46:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usdp_clientes`
--
ALTER TABLE `usdp_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `usdp_documentos`
--
ALTER TABLE `usdp_documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `usdp_empleados`
--
ALTER TABLE `usdp_empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `usdp_login`
--
ALTER TABLE `usdp_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `usdp_marcas`
--
ALTER TABLE `usdp_marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `usdp_proyectos`
--
ALTER TABLE `usdp_proyectos`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usdp_usuarios`
--
ALTER TABLE `usdp_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usdp_clientes`
--
ALTER TABLE `usdp_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usdp_documentos`
--
ALTER TABLE `usdp_documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usdp_empleados`
--
ALTER TABLE `usdp_empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usdp_login`
--
ALTER TABLE `usdp_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usdp_marcas`
--
ALTER TABLE `usdp_marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usdp_proyectos`
--
ALTER TABLE `usdp_proyectos`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usdp_usuarios`
--
ALTER TABLE `usdp_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
