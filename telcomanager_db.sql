-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2025 a las 00:35:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `telcomanager_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlaces`
--

CREATE TABLE `enlaces` (
  `id` int(11) NOT NULL,
  `nodo_origen_id` int(11) DEFAULT NULL,
  `nodo_destino_id` int(11) DEFAULT NULL,
  `tipo_enlace` varchar(50) DEFAULT NULL,
  `distancia_km` decimal(5,2) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enlaces`
--

INSERT INTO `enlaces` (`id`, `nodo_origen_id`, `nodo_destino_id`, `tipo_enlace`, `distancia_km`, `estado`) VALUES
(1, 1, 2, 'Simplex', 2.50, 'activo'),
(2, 3, 4, 'Duplex', 2.50, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `tipo_equipo` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `nodo_id` int(11) DEFAULT NULL,
  `estado` enum('operativo','fallando','reemplazo') DEFAULT 'operativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `tipo_equipo`, `modelo`, `marca`, `nodo_id`, `estado`) VALUES
(1, 'Router', 'MR30G (AC1200 Wirelss Dual Band Gigabit Router)', 'Mercusys', 1, 'operativo'),
(2, 'ONU', 'EG8141A5', 'EchoLife', 1, 'operativo'),
(3, 'Router', 'Deco E4 (TP-Link Mesh)', 'TP-Link', 2, 'operativo'),
(4, 'Router', 'Deco E4 (TP-Link Mesh)', 'TP-Link', 2, 'operativo'),
(5, 'ONU', 'EG816V78', 'Mercusys', 3, 'operativo'),
(6, 'Router', 'Deco E4 (TP-Link Mesh)', 'TP-Link', 3, 'operativo'),
(7, 'Router', 'MR30G (AC1200 Wirelss Dual Band Gigabit Router)', 'Mercusys', 4, 'operativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodos`
--

CREATE TABLE `nodos` (
  `id` int(11) NOT NULL,
  `nombre_nodo` varchar(100) NOT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nodos`
--

INSERT INTO `nodos` (`id`, `nombre_nodo`, `ubicacion`, `descripcion`, `estado`) VALUES
(1, 'Urb Obelisco', 'Calle 54A con carrera 23 y 24', 'Casa de dos pisos con un único router SIN repetidor y un único servicio de internet (FIBEX Telecom). En la planta baja existe un único dispositivo (teléfono celular), en el primer piso existe un aproximado de 9 dispositivos distribuidos entre teléfonos celulares, laptops y televisores.', 'activo'),
(2, 'Japon II', 'Carrera 30 entre calles 39 y 40', 'Casa de dos pisos con dos servicios de internet independientes: en planta baja puede encontrarse un router SIN repetidor (CANTV) junto con un repetidor y un amplificador de señal (Thundernet C.A); en el primer piso puede encontrarse el router principal (Thundernet C.A). Se estima la existencia de aproximadamente 20 dispositivos distribuidos entre el router principal, el repetidor y el amplificador de señal.', 'activo'),
(3, 'Urb Aguamiel', 'Sector La Rosaleda II, residencias Aguamiel. Casa #5', 'Casa de tres pisos con un único servicio de internet (Inter C.A) con un router principal y dos repetidores más un amplificador de señal. Existen aproximadamente 20 dispositivos distribuidos entre el router principal y ambos repetidores, variando desde teléfonos celulares hasta consolas de videojuegos y electrodomésticos (neveras). ', 'activo'),
(4, 'Urb Los Libertadores', 'Av Urdaneta con Av Bolivar y calle Pedro Leon Torres. Casa #89', 'Casa de dos pisos con un único servicio de internet (Inter C.A), un router principal y un repetidor. Existen aproximadamente 10 dispositivos distribuidos entre ellos incluyendo computadoras de escritorio conectadas por cables ethernet, impresoras y teléfonos móviles.', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `tipo_usuario` enum('admin','tecnico') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `usuario`, `clave`, `tipo_usuario`) VALUES
(1, 'Administrador Principal', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin'),
(2, 'Técnico Invitado', 'tecnico', 'b2b39d11f6adad79682eb4db5b92b6b76fcaff41', 'tecnico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nodo_origen_id` (`nodo_origen_id`),
  ADD KEY `nodo_destino_id` (`nodo_destino_id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nodo_id` (`nodo_id`);

--
-- Indices de la tabla `nodos`
--
ALTER TABLE `nodos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enlaces`
--
ALTER TABLE `enlaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nodos`
--
ALTER TABLE `nodos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `enlaces`
--
ALTER TABLE `enlaces`
  ADD CONSTRAINT `enlaces_ibfk_1` FOREIGN KEY (`nodo_origen_id`) REFERENCES `nodos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enlaces_ibfk_2` FOREIGN KEY (`nodo_destino_id`) REFERENCES `nodos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`nodo_id`) REFERENCES `nodos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
