-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2022 a las 23:51:48
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
-- Base de datos: `usdp`
--

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
(1, 'Francisco Montoya Diaz de leon ', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'fmontoya@usdp.mx', '2022-07-19', '12:11:25');

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
  `estatus` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usdp_usuarios`
--

INSERT INTO `usdp_usuarios` (`id_usuario`, `nombre`, `perfil`, `email`, `telefono`, `estatus`, `fecha_ingreso`, `hora_ingreso`) VALUES
(1, 'Francisco Montoya Diaz de leon', 'Administrador', 'fmontoya@usdp.mx', '3311093428', 1, '2022-07-19', '14:33:08'),
(2, 'Francisco Montoya Diaz de leon2\r\n', 'Administrador', 'fmontoya@usdp.mx', '3311093428', 1, '2022-07-19', '14:33:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usdp_usuarios2`
--

CREATE TABLE `usdp_usuarios2` (
  `id_usuario` int(11) NOT NULL,
  `nombre_proyecto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usdp_usuarios2`
--

INSERT INTO `usdp_usuarios2` (`id_usuario`, `nombre_proyecto`, `responsable`, `contacto`, `fecha_ingreso`, `hora_ingreso`) VALUES
(1, 'COFEPRIS Instagram', 'Sofia M. Farias Perez', 'DESTILADORA DEL VALLE DE TEQUILA, S.A. DE .C.V.', '2022-07-19', '14:33:08'),
(2, 'COFEPRIS Instagram', 'Sofia M. Farias Perez', 'DESTILADORA DEL VALLE DE TEQUILA, S.A. DE .C.V.', '2022-07-19', '14:33:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usdp_login`
--
ALTER TABLE `usdp_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `usdp_usuarios`
--
ALTER TABLE `usdp_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usdp_usuarios2`
--
ALTER TABLE `usdp_usuarios2`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usdp_login`
--
ALTER TABLE `usdp_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usdp_usuarios`
--
ALTER TABLE `usdp_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usdp_usuarios2`
--
ALTER TABLE `usdp_usuarios2`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
