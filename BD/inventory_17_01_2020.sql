-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2020 a las 21:41:28
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

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
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre_area`, `estado`) VALUES
(1, 'N/A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`, `estado`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'COORDINADOR', 1),
(3, 'TÉCNICO', 1),
(4, 'GERENCIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cetap`
--

CREATE TABLE `cetap` (
  `id_cetap` int(11) NOT NULL,
  `nombre_cetap` varchar(45) DEFAULT NULL,
  `fkID_territorial` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cetap`
--

INSERT INTO `cetap` (`id_cetap`, `nombre_cetap`, `fkID_territorial`) VALUES
(1, 'N/A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `serial_equipo` varchar(45) NOT NULL,
  `fkID_tipo_equipo` int(11) NOT NULL,
  `fkID_marca` int(11) NOT NULL,
  `fkID_sistema_operativo` int(11) NOT NULL,
  `fkID_memoria` int(11) NOT NULL,
  `fkID_procesador` int(11) NOT NULL,
  `fkID_estado` int(11) NOT NULL,
  `fkID_modelo` int(11) NOT NULL,
  `observacion` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `serial_equipo`, `fkID_tipo_equipo`, `fkID_marca`, `fkID_sistema_operativo`, `fkID_memoria`, `fkID_procesador`, `fkID_estado`, `fkID_modelo`, `observacion`, `estado`) VALUES
(1, 'JHKJJHJH', 1, 2, 2, 3, 4, 5, 4, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_equipo`
--

CREATE TABLE `estado_equipo` (
  `id_estado_equipo` int(11) NOT NULL,
  `nombre_estado_equipo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_equipo`
--

INSERT INTO `estado_equipo` (`id_estado_equipo`, `nombre_estado_equipo`, `estado`) VALUES
(1, 'SIN ASIGNAR', 1),
(2, 'ASIGNADO', 1),
(3, 'EN REPARACION', 1),
(4, 'DE BAJA', 1);

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

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`, `estado`) VALUES
(1, 'APPLE', 1),
(2, 'ASUS', 1),
(3, 'BENQ', 1),
(4, 'DELL', 1),
(5, 'EPSON', 1),
(6, 'HEWLETT-PACKARD', 1),
(7, 'HITACHI', 1),
(8, 'INFOCUS', 1),
(9, 'IRULU', 1),
(10, 'LENOVO', 1),
(11, 'LENOVO ', 1),
(12, 'LEXMARK', 1),
(13, 'PANASONIC', 1),
(14, 'RICOH', 1),
(15, 'SAMSUNG', 1),
(16, 'SIMPLY', 1);

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

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`, `estado`) VALUES
(1, '14-AC115LA', 1),
(2, '240 G6', 1),
(3, '240 G7', 1),
(4, '2400MP', 1),
(5, '241 G6', 1),
(6, '242 G6', 1),
(7, '243 G6', 1),
(8, '244 G6', 1),
(9, '245 G6', 1),
(10, '280 G3 SFF BUSINESS PC', 1),
(11, '4210U', 1),
(12, '7000 S2', 1),
(13, 'A555L', 1),
(14, 'B40-70', 1),
(15, 'COMPAQ 4300 SFF', 1),
(16, 'COMPAQ 8200', 1),
(17, 'COMPAQ 8200 ELITE SFF', 1),
(18, 'COMPAQ 8600 ELITE SFF', 1),
(19, 'COMPAQ PRO 4300 SFF', 1),
(20, 'COMPAQ PRO 6300 ', 1),
(21, 'CP-X2521WN', 1),
(22, 'DELL OPTIPLEX 3020', 1),
(23, 'ELITEBOOK 840', 1),
(24, 'EMP-62', 1),
(25, 'EMP7800', 1),
(26, 'EMP-83', 1),
(27, 'EPSON H552A', 1),
(28, 'GALAXY TAB 4', 1),
(29, 'H552A', 1),
(30, 'HP COMPAQ 8100 ELITE SFF', 1),
(31, 'HP COMPAQ PRO 4300', 1),
(32, 'HP COMPAQ PRO 6300', 1),
(33, 'HP LASERJET P3015DN', 1),
(34, 'IMAC', 1),
(35, 'IRULU', 1),
(36, 'LASERJET P3015', 1),
(37, 'LATITUDE 3440', 1),
(38, 'LATITUDE 5490', 1),
(39, 'LEXMARK MS415DN', 1),
(40, 'LEXMARK MS811DN', 1),
(41, 'LP260', 1),
(42, 'MODELO 20392', 1),
(43, 'MODELO 4210U', 1),
(44, 'MS415DN', 1),
(45, 'MS811 DN', 1),
(46, 'MS811DN', 1),
(47, 'MULTIXPRESS M5370LX', 1),
(48, 'MX613ST', 1),
(49, 'NOTEBOOK 14-AN009LA', 1),
(50, 'OPTIPLEX 3020', 1),
(51, 'P3015', 1),
(52, 'P3015 DN', 1),
(53, 'P3015DN', 1),
(54, 'POWER LITE S18', 1),
(55, 'POWERLITE 18+', 1),
(56, 'POWERLITE S+', 1),
(57, 'POWERLITE S+18', 1),
(58, 'POWERLITE S12+', 1),
(59, 'POWERLITE S18+ 3000 LUMENS', 1),
(60, 'PRO 3000 SFF', 1),
(61, 'PRO 6300 ', 1),
(62, 'PRO 6300 SFF', 1),
(63, 'PRO2500 F1 ', 1),
(64, 'PROBOOK 440 G1', 1),
(65, 'PROBOOK 440 G2', 1),
(66, 'PROBOOK 4440S', 1),
(67, 'PROBOOK G2', 1),
(68, 'PRODESK 400 G1 SFF', 1),
(69, 'PRODESK 600 G1 SFF', 1),
(70, 'PROXPRESS M4070FR', 1),
(71, 'PT-LB51U', 1),
(72, 'SCANFLOW 7000S2', 1),
(73, 'SCANJET ENTERPRISE FLOW 7000 S2', 1),
(74, 'SCANJET PRO 2500 F1', 1),
(75, 'T654DN', 1),
(76, 'TABLETS', 1),
(77, 'THINKCENTRE E73', 1),
(78, 'THINKPAD 13', 1),
(79, 'THINKPAD T440', 1),
(80, 'V520S', 1),
(81, 'W2100', 1),
(82, 'X230', 1),
(83, 'X260', 1),
(84, 'YOGA 60046', 1);

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
  `fkID_proyecto` int(11) NOT NULL,
  `fkID_territorial` int(11) DEFAULT NULL,
  `fkID_cetap` int(11) DEFAULT NULL,
  `fkID_cargo` int(11) DEFAULT NULL,
  `fkID_area` int(11) DEFAULT NULL,
  `fkID_tipo_persona` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombres_persona`, `apellidos_persona`, `documento_persona`, `telefono_persona`, `celular_persona`, `email_persona`, `fkID_proyecto`, `fkID_territorial`, `fkID_cetap`, `fkID_cargo`, `fkID_area`, `fkID_tipo_persona`, `estado`) VALUES
(1, 'prueba', 'desarrollo', '1098778675', '5677654', '3209086544', 'prueba@gmail.com', 1, 1, 1, 1, 1, 1, 1),
(2, 'BART', 'SIMPSON', '10105676', '7866554', '3128907654', 'BART@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(3, 'HOMERO ', 'SIMPSON', '65454466', '5433425', '3209086754', 'HOMERO@GMAIL.COM', 1, 2, 1, 3, 1, 1, 1),
(4, 'LUIS', 'HENRIQUE', '98797879789', '65443234', '312245676', 'LUIS@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(5, 'ANA', 'LUZ', '31245617', '76878987', '3108019988', 'LUZ@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(6, 'HJJ', 'JHHJHJ', '122334', 'JHJHJHJ', 'hjhjjhjh', 'HJHJJHJH', 1, 2, 1, 3, 1, 1, 1),
(7, 'HOMERO', 'SIMPSON', '233243', '765332', '3122345432', 'HOMERO@GMAIL.COM', 1, 2, 1, 3, 1, 1, 1),
(9, 'LISSA', 'SIMPSONS', '78889877', '4566554', '312789987', 'LISSA@GMAIL.COM', 1, 2, 1, 2, 1, 1, 1),
(10, 'MIL', 'HOUSE', '765678', '31245678', '312234565', 'HOUSE@GMAIL.COM', 1, 2, 1, 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesador`
--

CREATE TABLE `procesador` (
  `id_procesador` int(11) NOT NULL,
  `nombre_procesador` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `procesador`
--

INSERT INTO `procesador` (`id_procesador`, `nombre_procesador`, `estado`) VALUES
(1, 'CORE I5', 1),
(2, 'CORE I6', 1),
(3, 'CORE I7', 1),
(4, 'CORE I8', 1),
(5, 'CORE I9', 1),
(6, 'CORE I10', 1),
(7, 'N/A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `nombre_proyecto`, `estado`) VALUES
(1, 'PROYECTO LUNEL-IE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `estado`) VALUES
(1, 'ADMINISTRADOR', 1);

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
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `territorial`
--

INSERT INTO `territorial` (`id_territorial`, `nombre_territorial`, `estado`) VALUES
(1, 'ANTIOQUIA', 1),
(2, 'BARRANQUILLA', 1),
(3, 'BOGOTÁ', 1),
(4, 'CARTAGENA', 1),
(5, 'TUNJA', 1),
(6, 'MANIZALES', 1),
(7, 'POPAYÁN', 1),
(8, 'FUSA', 1),
(9, 'NEIVA', 1),
(10, 'VILLAVICENCIO', 1),
(11, 'PASTO', 1),
(12, 'CÚCUTA', 1),
(13, 'PEREIRA', 1),
(14, 'BUCARAMANGA', 1),
(15, 'IBAGUÉ', 1),
(16, 'CALI', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `territorial_proyecto`
--

CREATE TABLE `territorial_proyecto` (
  `id_territorial_proyecto` int(11) NOT NULL,
  `fkID_territorial` int(11) DEFAULT NULL,
  `direccion_territorial` varchar(45) DEFAULT NULL,
  `fkID_proyecto` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `territorial_proyecto`
--

INSERT INTO `territorial_proyecto` (`id_territorial_proyecto`, `fkID_territorial`, `direccion_territorial`, `fkID_proyecto`, `estado`) VALUES
(1, 2, 'carrera', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `id_tipo_equipo` int(11) NOT NULL,
  `nombre_tipo_equipo` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`id_tipo_equipo`, `nombre_tipo_equipo`, `estado`) VALUES
(1, 'ESCRITORIO', 1),
(2, 'IMPRESORA', 1),
(3, 'MAC', 1),
(4, 'PORTATIL', 1),
(5, 'SCANNER', 1),
(6, 'TABLET', 1),
(7, 'VIDEO BEAM', 1);

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
(1, 'N/A', 1),
(2, 'CONTRATISTA', 1),
(3, 'PLANTA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `pass_usuario` varchar(45) DEFAULT NULL,
  `fkID_persona` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `pass_usuario`, `fkID_persona`, `estado`) VALUES
(1, 'prueba', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1),
(37, 'prueba20', '8cb2237d0679ca88db6464eac60da96345513964', 1, 2),
(38, 'retro', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 2),
(39, '109877867', '0d623eb642caf5755f4b02f5a1bbc6f0237912e9', 1, 2),
(40, '1098778675', '0d623eb642caf5755f4b02f5a1bbc6f0237912e9', 1, 2),
(41, '10987786', '0d623eb642caf5755f4b02f5a1bbc6f0237912e9', 1, 2),
(42, '1098778675', '0d623eb642caf5755f4b02f5a1bbc6f0237912e9', 1, 2),
(43, '1098778675', '0d623eb642caf5755f4b02f5a1bbc6f0237912e9', 1, 2),
(44, '1098778675', '0d623eb642caf5755f4b02f5a1bbc6f0237912e9', 1, 2),
(45, '1098778675', '0d623eb642caf5755f4b02f5a1bbc6f0237912e9', 1, 2),
(46, '1098778675', '0d623eb642caf5755f4b02f5a1bbc6f0237912e9', 1, 2),
(47, '1098778675', '0d623eb642caf5755f4b02f5a1bbc6f0237912e9', 1, 2),
(48, '233243', 'a70276e7a4e7e28a9801165795770446991c489c', 7, 1),
(49, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 8, 2),
(50, '765678', '398a9ddb4e98f2e388895bb1a92838904a91bd9b', 10, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

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
  ADD KEY `fkID_tipo_equipo_idx` (`fkID_tipo_equipo`),
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
  ADD PRIMARY KEY (`id_territorial`);

--
-- Indices de la tabla `territorial_proyecto`
--
ALTER TABLE `territorial_proyecto`
  ADD PRIMARY KEY (`id_territorial_proyecto`),
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
  ADD KEY `fkID_persona_idx` (`fkID_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cetap`
--
ALTER TABLE `cetap`
  MODIFY `id_cetap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  MODIFY `id_estado_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `memoria`
--
ALTER TABLE `memoria`
  MODIFY `id_memoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `procesador`
--
ALTER TABLE `procesador`
  MODIFY `id_procesador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sistema_operativo`
--
ALTER TABLE `sistema_operativo`
  MODIFY `id_sistema_operativo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `territorial`
--
ALTER TABLE `territorial`
  MODIFY `id_territorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `territorial_proyecto`
--
ALTER TABLE `territorial_proyecto`
  MODIFY `id_territorial_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  MODIFY `id_tipo_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `id_tipo_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `id_tipo_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
