-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2025 a las 16:34:00
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro_seguimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolidados`
--

CREATE TABLE `consolidados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(15) NOT NULL,
  `apellidos` varchar(15) NOT NULL,
  `edad` date NOT NULL,
  `cedula` int(8) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `ocupacion` varchar(60) NOT NULL,
  `profesion` varchar(60) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `invitado_por` varchar(30) NOT NULL,
  `estatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `cedula` int(8) NOT NULL,
  `tipo_evento` varchar(25) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hcm`
--

CREATE TABLE `hcm` (
  `id` int(11) NOT NULL,
  `nombre_lugar` varchar(25) NOT NULL,
  `cedula` int(11) NOT NULL,
  `responsable` varchar(30) NOT NULL,
  `ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hcm_asignado_consolidado`
--

CREATE TABLE `hcm_asignado_consolidado` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_hcm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hcm_asignado_nuevo`
--

CREATE TABLE `hcm_asignado_nuevo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_hcm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerios`
--

CREATE TABLE `ministerios` (
  `id` int(11) NOT NULL,
  `departamentos` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministerio_asignado`
--

CREATE TABLE `ministerio_asignado` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_ministerio` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevos`
--

CREATE TABLE `nuevos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(15) NOT NULL,
  `apellidos` varchar(15) NOT NULL,
  `edad` date NOT NULL,
  `cedula` int(8) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `ocupacion` varchar(60) NOT NULL,
  `profesion` varchar(60) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `invitado_por` varchar(30) NOT NULL,
  `estatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cedula` int(10) NOT NULL,
  `tipo_peticion` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_seguridad`
--

CREATE TABLE `preguntas_seguridad` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_identificador` int(1) NOT NULL,
  `pregunta` varchar(30) NOT NULL,
  `respuesta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `cedula` int(8) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `identificador` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cedula`, `correo`, `pass`, `nombre`, `apellido`, `identificador`, `status`, `codigo`) VALUES
(1, 299522623, 'visiondefamiliaoficial@gmail.com', '$2y$10$UzkQWZ.ZR6l8EJMyHQGMeOYaX.20F0vXxxmoL1ArqcEkSeaNJOKCa', 'Jose', 'Aldana', 1, 1, 'a300ffe7fa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consolidados`
--
ALTER TABLE `consolidados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hcm`
--
ALTER TABLE `hcm`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hcm_asignado_consolidado`
--
ALTER TABLE `hcm_asignado_consolidado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hcm_asignado` (`id_usuario`),
  ADD KEY `hcm_consolidado` (`id_hcm`);

--
-- Indices de la tabla `hcm_asignado_nuevo`
--
ALTER TABLE `hcm_asignado_nuevo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hcm_asignado_nuevo` (`id_usuario`),
  ADD KEY `hcm` (`id_hcm`);

--
-- Indices de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ministerio_asignado`
--
ALTER TABLE `ministerio_asignado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ministerio_consolidado_id` (`id_usuario`),
  ADD KEY `id_ministerio` (`id_ministerio`);

--
-- Indices de la tabla `nuevos`
--
ALTER TABLE `nuevos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas_seguridad`
--
ALTER TABLE `preguntas_seguridad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consolidados`
--
ALTER TABLE `consolidados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hcm`
--
ALTER TABLE `hcm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hcm_asignado_consolidado`
--
ALTER TABLE `hcm_asignado_consolidado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hcm_asignado_nuevo`
--
ALTER TABLE `hcm_asignado_nuevo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ministerios`
--
ALTER TABLE `ministerios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ministerio_asignado`
--
ALTER TABLE `ministerio_asignado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nuevos`
--
ALTER TABLE `nuevos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas_seguridad`
--
ALTER TABLE `preguntas_seguridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hcm_asignado_consolidado`
--
ALTER TABLE `hcm_asignado_consolidado`
  ADD CONSTRAINT `hcm_asignado` FOREIGN KEY (`id_usuario`) REFERENCES `consolidados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hcm_consolidado` FOREIGN KEY (`id_hcm`) REFERENCES `hcm` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `hcm_asignado_nuevo`
--
ALTER TABLE `hcm_asignado_nuevo`
  ADD CONSTRAINT `hcm` FOREIGN KEY (`id_hcm`) REFERENCES `hcm` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hcm_asignado_nuevo` FOREIGN KEY (`id_usuario`) REFERENCES `nuevos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ministerio_asignado`
--
ALTER TABLE `ministerio_asignado`
  ADD CONSTRAINT `ministerio_asignado_ibfk_1` FOREIGN KEY (`id_ministerio`) REFERENCES `ministerios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ministerio_consolidado_id` FOREIGN KEY (`id_usuario`) REFERENCES `consolidados` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
