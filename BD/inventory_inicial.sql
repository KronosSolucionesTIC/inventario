-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2020 a las 20:58:05
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventory`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nombre_area` varchar(45) DEFAULT NULL,
  `fkID_territorial` int(11) NOT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cetap`
--

CREATE TABLE `cetap` (
  `id_cetap` int(11) NOT NULL,
  `nombre_cetap` varchar(45) DEFAULT NULL,
  `fkID_territorial` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `serial_equipo` varchar(45) NOT NULL,
  `fkID_tipo_equpo` int(11) NOT NULL,
  `fkID_marca` int(11) NOT NULL,
  `fkID_sistema_operativo` int(11) NOT NULL,
  `fkID_memoria` int(11) NOT NULL,
  `fkID_procesador` int(11) NOT NULL,
  `fkID_estado` int(11) NOT NULL,
  `fkID_modelo` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_equipo`
--

CREATE TABLE `estado_equipo` (
  `id_estado_equipo` int(11) NOT NULL,
  `nombre_estado_equipo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_equipo`
--

CREATE TABLE `historico_equipo` (
  `id_historico_equipo` int(11) NOT NULL,
  `fecha_historico_equipo` date NOT NULL,
  `fkID_equipo` int(11) NOT NULL,
  `fkID_persona_entrega` int(11) NOT NULL,
  `fkID_persona_recibe` int(11) NOT NULL,
  `fkID_tipo_movimiento` int(11) NOT NULL,
  `fkID_area` int(11) NOT NULL,
  `url_historico_equipo` varchar(45) DEFAULT NULL,
  `obs_historico_equipo` longtext DEFAULT NULL,
  `conse_historico_equipo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `fkID_equipo` int(11) NOT NULL,
  `fkID_persona_a_cargo` int(11) NOT NULL,
  `fkID_area` int(11) NOT NULL,
  `fkID_proyecto` int(11) DEFAULT NULL,
  `fkID_territorial` int(11) DEFAULT NULL,
  `fkID_cetap` int(11) DEFAULT NULL,
  `obs_inventario` longtext DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memoria`
--

CREATE TABLE `memoria` (
  `id_memoria` int(11) NOT NULL,
  `nombre_memoria` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nombre_modelo` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre_modulo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL,
  `fkID_rol` int(11) NOT NULL,
  `fkID_modulo` int(11) NOT NULL,
  `creacion` int(11) DEFAULT NULL,
  `edicion` int(11) DEFAULT NULL,
  `consulta` int(11) DEFAULT NULL,
  `eliminacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombres_persona` varchar(45) DEFAULT NULL,
  `apellidos_persona` varchar(45) DEFAULT NULL,
  `documento_persona` varchar(45) DEFAULT NULL,
  `telefono_persona` varchar(45) DEFAULT NULL,
  `celular_persona` varchar(45) DEFAULT NULL,
  `email_persona` varchar(45) DEFAULT NULL,
  `fkID_territorial` int(11) DEFAULT NULL,
  `fkID_cetap` int(11) DEFAULT NULL,
  `fkID_cargo` int(11) DEFAULT NULL,
  `fkID_area` int(11) DEFAULT NULL,
  `fkID_tipo_persona` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesador`
--

CREATE TABLE `procesador` (
  `id_procesador` int(11) NOT NULL,
  `nombre_procesador` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_operativo`
--

CREATE TABLE `sistema_operativo` (
  `id_sistema_operativo` int(11) NOT NULL,
  `nombre_sistema_operativo` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `territorial`
--

CREATE TABLE `territorial` (
  `id_territorial` int(11) NOT NULL,
  `nombre_territorial` varchar(45) DEFAULT NULL,
  `direccion_territorial` varchar(45) DEFAULT NULL,
  `fkID_proyecto` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `id_tipo_equipo` int(11) NOT NULL,
  `nombre_tipo_equipo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `id_tipo_movimiento` int(11) NOT NULL,
  `inicial_tipo_movimiento` varchar(45) DEFAULT NULL,
  `conse_tipo_movimieneto` varchar(45) DEFAULT NULL,
  `nombre_tipo_movimiento` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`id_tipo_movimiento`, `inicial_tipo_movimiento`, `conse_tipo_movimieneto`, `nombre_tipo_movimiento`, `estado`) VALUES
(1, 'AL', '0', 'ASIGNACION POR LOTES', 1),
(2, 'AT', '0', 'ASIGNACION TERRITORIAL', 1),
(3, 'AE', '0', 'ASIGNACION EMPLEADO (TECNICO)', 1),
(4, 'AF', '0', 'ASIGNACION FUNCIONARIO', 1),
(5, 'DE', '0', 'DEVOLUCIÓN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `id_tipo_persona` int(11) NOT NULL,
  `nombre_tipo_persona` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`id_tipo_persona`, `nombre_tipo_persona`, `estado`) VALUES
(1, 'CONTRATISTA', 1),
(2, 'PLANTA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `pass_usuario` varchar(45) DEFAULT NULL,
  `fkID_rol` int(11) NOT NULL,
  `fkID_persona` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `fkID_territorial_idx` (`fkID_territorial`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `cetap`
--
ALTER TABLE `cetap`
  ADD PRIMARY KEY (`id_cetap`),
  ADD KEY `fkID_territorial_idx` (`fkID_territorial`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `fkID_marca_idx` (`fkID_marca`),
  ADD KEY `fkID_sistema_operativo_idx` (`fkID_sistema_operativo`),
  ADD KEY `fkID_estado_idx` (`fkID_estado`),
  ADD KEY `fkID_procesador_idx` (`fkID_procesador`),
  ADD KEY `fkID_memoria_idx` (`fkID_memoria`),
  ADD KEY `fkID_tipo_equipo_idx` (`fkID_tipo_equpo`),
  ADD KEY `fkID_modelo_idx` (`fkID_modelo`);

--
-- Indices de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  ADD PRIMARY KEY (`id_estado_equipo`);

--
-- Indices de la tabla `historico_equipo`
--
ALTER TABLE `historico_equipo`
  ADD PRIMARY KEY (`id_historico_equipo`,`fecha_historico_equipo`),
  ADD KEY `fkID_equipo_idx` (`fkID_equipo`),
  ADD KEY `fkID_persona_entrega_idx` (`fkID_persona_entrega`),
  ADD KEY `fkID_persona_recibe_idx` (`fkID_persona_recibe`),
  ADD KEY `fkID_tipo_movimiento_idx` (`fkID_tipo_movimiento`),
  ADD KEY `fkID_area_idx` (`fkID_area`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `fkID_equipo_idx` (`fkID_equipo`),
  ADD KEY `fkID_persona_a_cargo_idx` (`fkID_persona_a_cargo`),
  ADD KEY `fkID_proyecto_idx` (`fkID_proyecto`),
  ADD KEY `fkID_territorial_idx` (`fkID_territorial`),
  ADD KEY `fkID_cetap_idx` (`fkID_cetap`),
  ADD KEY `fkID_area_idx` (`fkID_area`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `memoria`
--
ALTER TABLE `memoria`
  ADD PRIMARY KEY (`id_memoria`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permisos`),
  ADD KEY `fkID_rol_idx` (`fkID_rol`),
  ADD KEY `fkID_modulo_idx` (`fkID_modulo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fkID_territorial_idx` (`fkID_territorial`),
  ADD KEY `fkID_cetap_idx` (`fkID_cetap`),
  ADD KEY `fkID_cargo_idx` (`fkID_cargo`),
  ADD KEY `fkID_area_idx` (`fkID_area`),
  ADD KEY `fkID_tipo_persona_idx` (`fkID_tipo_persona`);

--
-- Indices de la tabla `procesador`
--
ALTER TABLE `procesador`
  ADD PRIMARY KEY (`id_procesador`,`estado`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sistema_operativo`
--
ALTER TABLE `sistema_operativo`
  ADD PRIMARY KEY (`id_sistema_operativo`);

--
-- Indices de la tabla `territorial`
--
ALTER TABLE `territorial`
  ADD PRIMARY KEY (`id_territorial`),
  ADD KEY `fkID_proyecto_idx` (`fkID_proyecto`);

--
-- Indices de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  ADD PRIMARY KEY (`id_tipo_equipo`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`id_tipo_movimiento`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`id_tipo_persona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fkID_persona_idx` (`fkID_persona`),
  ADD KEY `fkID_rol_idx` (`fkID_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cetap`
--
ALTER TABLE `cetap`
  MODIFY `id_cetap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  MODIFY `id_estado_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historico_equipo`
--
ALTER TABLE `historico_equipo`
  MODIFY `id_historico_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `memoria`
--
ALTER TABLE `memoria`
  MODIFY `id_memoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `procesador`
--
ALTER TABLE `procesador`
  MODIFY `id_procesador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sistema_operativo`
--
ALTER TABLE `sistema_operativo`
  MODIFY `id_sistema_operativo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `territorial`
--
ALTER TABLE `territorial`
  MODIFY `id_territorial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  MODIFY `id_tipo_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `id_tipo_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `id_tipo_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
