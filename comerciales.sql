-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-03-2024 a las 21:04:29
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comerciales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int NOT NULL,
  `des_cliente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `f_registro_cliente` date NOT NULL,
  `h_registro_cliente` time NOT NULL,
  `alter_cliente` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comerciales`
--

CREATE TABLE `comerciales` (
  `id_comercial` int NOT NULL,
  `id_fk_programa` int DEFAULT NULL,
  `id_fk_cliente` int DEFAULT NULL,
  `id_fk_tipo` int DEFAULT NULL,
  `pases` int DEFAULT NULL,
  `f_registro_comercial` date NOT NULL,
  `h_registro_comercial` time NOT NULL,
  `alter_comercial` datetime NOT NULL,
  `estado_comercial` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int NOT NULL,
  `id_fk_programa` int NOT NULL,
  `dia_semana` varchar(20) NOT NULL,
  `h_inicio` time NOT NULL,
  `h_fin` time NOT NULL,
  `f_registro_horario` date NOT NULL,
  `h_registro_horario` time NOT NULL,
  `alter_horario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pases_historial`
--

CREATE TABLE `pases_historial` (
  `id_pase_historial` int NOT NULL,
  `id_fk_comercial` int NOT NULL,
  `pase_estado` int DEFAULT NULL,
  `f_registro_pase` date NOT NULL,
  `h_registro_pase` time NOT NULL,
  `alter_pase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` int NOT NULL,
  `des_programa` varchar(255) NOT NULL,
  `f_registro_programa` date NOT NULL,
  `h_registro_programa` time NOT NULL,
  `alter_programa` datetime NOT NULL,
  `detalles` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id_tipo` int NOT NULL,
  `des_tipo` varchar(25) NOT NULL,
  `f_registro_tipo` date NOT NULL,
  `h_registro_tipo` time NOT NULL,
  `alter_tipo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `usuarios` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `usuarios`, `clave`) VALUES
(1, 'administrador', 'admin', 's1st3m4s@rtp'),
(2, 'switcher', 'switcher', 'switcher'),
(3, 'switcher', 'switcher1', 'switcher1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_comerciales`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_comerciales` (
`id_comercial` int
,`id_fk_programa` int
,`id_fk_cliente` int
,`id_fk_tipo` int
,`pases` int
,`f_registro_comercial` date
,`h_registro_comercial` time
,`alter_comercial` datetime
,`id_cliente` int
,`des_cliente` varchar(100)
,`f_registro_cliente` date
,`h_registro_cliente` time
,`alter_cliente` datetime
,`id_programa` int
,`des_programa` varchar(255)
,`f_registro_programa` date
,`h_registro_programa` time
,`alter_programa` datetime
,`id_tipo` int
,`des_tipo` varchar(25)
,`f_registro_tipo` date
,`h_registro_tipo` time
,`alter_tipo` datetime
,`estado_comercial` int
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_programas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_programas` (
`id_programa` int
,`des_programa` varchar(255)
,`f_registro_programa` date
,`h_registro_programa` time
,`alter_programa` datetime
,`id_horario` int
,`id_fk_programa` int
,`dia_semana` varchar(20)
,`h_inicio` time
,`h_fin` time
,`f_registro_horario` date
,`h_registro_horario` time
,`alter_horario` datetime
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_comerciales`
--
DROP TABLE IF EXISTS `vista_comerciales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_comerciales`  AS SELECT `id_comercial` AS `id_comercial`, `id_fk_programa` AS `id_fk_programa`, `id_fk_cliente` AS `id_fk_cliente`, `id_fk_tipo` AS `id_fk_tipo`, `pases` AS `pases`, `f_registro_comercial` AS `f_registro_comercial`, `h_registro_comercial` AS `h_registro_comercial`, `alter_comercial` AS `alter_comercial`, `clientes`.`id_cliente` AS `id_cliente`, `clientes`.`des_cliente` AS `des_cliente`, `clientes`.`f_registro_cliente` AS `f_registro_cliente`, `clientes`.`h_registro_cliente` AS `h_registro_cliente`, `clientes`.`alter_cliente` AS `alter_cliente`, `programas`.`id_programa` AS `id_programa`, `programas`.`des_programa` AS `des_programa`, `programas`.`f_registro_programa` AS `f_registro_programa`, `programas`.`h_registro_programa` AS `h_registro_programa`, `programas`.`alter_programa` AS `alter_programa`, `tipos`.`id_tipo` AS `id_tipo`, `tipos`.`des_tipo` AS `des_tipo`, `tipos`.`f_registro_tipo` AS `f_registro_tipo`, `tipos`.`h_registro_tipo` AS `h_registro_tipo`, `tipos`.`alter_tipo` AS `alter_tipo`, `estado_comercial` AS `estado_comercial` FROM (((`comerciales` left join `clientes` on((`id_fk_cliente` = `clientes`.`id_cliente`))) left join `programas` on((`id_fk_programa` = `programas`.`id_programa`))) left join `tipos` on((`id_fk_tipo` = `tipos`.`id_tipo`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_programas`
--
DROP TABLE IF EXISTS `vista_programas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_programas`  AS SELECT `programas`.`id_programa` AS `id_programa`, `programas`.`des_programa` AS `des_programa`, `programas`.`f_registro_programa` AS `f_registro_programa`, `programas`.`h_registro_programa` AS `h_registro_programa`, `programas`.`alter_programa` AS `alter_programa`, `horarios`.`id_horario` AS `id_horario`, `horarios`.`id_fk_programa` AS `id_fk_programa`, `horarios`.`dia_semana` AS `dia_semana`, `horarios`.`h_inicio` AS `h_inicio`, `horarios`.`h_fin` AS `h_fin`, `horarios`.`f_registro_horario` AS `f_registro_horario`, `horarios`.`h_registro_horario` AS `h_registro_horario`, `horarios`.`alter_horario` AS `alter_horario` FROM (`programas` left join `horarios` on((`programas`.`id_programa` = `horarios`.`id_fk_programa`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `comerciales`
--
ALTER TABLE `comerciales`
  ADD PRIMARY KEY (`id_comercial`),
  ADD KEY `id_fk_programa` (`id_fk_programa`),
  ADD KEY `id_fk_cliente` (`id_fk_cliente`),
  ADD KEY `id_fk_tipo` (`id_fk_tipo`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_fk_programa` (`id_fk_programa`);

--
-- Indices de la tabla `pases_historial`
--
ALTER TABLE `pases_historial`
  ADD PRIMARY KEY (`id_pase_historial`),
  ADD KEY `id_fk_comercial` (`id_fk_comercial`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comerciales`
--
ALTER TABLE `comerciales`
  MODIFY `id_comercial` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pases_historial`
--
ALTER TABLE `pases_historial`
  MODIFY `id_pase_historial` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comerciales`
--
ALTER TABLE `comerciales`
  ADD CONSTRAINT `comerciales_ibfk_1` FOREIGN KEY (`id_fk_programa`) REFERENCES `programas` (`id_programa`),
  ADD CONSTRAINT `comerciales_ibfk_2` FOREIGN KEY (`id_fk_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `comerciales_ibfk_3` FOREIGN KEY (`id_fk_tipo`) REFERENCES `tipos` (`id_tipo`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_fk_programa`) REFERENCES `programas` (`id_programa`);

--
-- Filtros para la tabla `pases_historial`
--
ALTER TABLE `pases_historial`
  ADD CONSTRAINT `pases_historial_ibfk_1` FOREIGN KEY (`id_fk_comercial`) REFERENCES `comerciales` (`id_comercial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
