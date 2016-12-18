-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2016 a las 04:04:10
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `icap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `car_codigo` int(11) NOT NULL,
  `car_descrip` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`car_codigo`, `car_descrip`) VALUES
(2, 'COORDINADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_exp`
--

CREATE TABLE `estado_exp` (
  `estxp_codigo` int(11) NOT NULL,
  `estxp_descrip` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `estado_exp`
--

INSERT INTO `estado_exp` (`estxp_codigo`, `estxp_descrip`) VALUES
(1, 'SUSTENTACION'),
(2, 'CONSEJO'),
(3, 'ARCHIVO'),
(4, 'PROCURADURIA'),
(5, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `esta_codigo` int(11) NOT NULL,
  `esta_descrip` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`esta_codigo`, `esta_descrip`) VALUES
(1, 'CERRADO POR FALTA DE ELEMENTOS'),
(2, 'ASISTENCIA VOLUNTARIA'),
(3, 'ASISTENCIA OBLIGATORIA'),
(4, 'PROCEDIMIENTOS DE DESTITUCION'),
(5, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `exp_codigo` int(11) NOT NULL,
  `exp_num` varchar(50) COLLATE utf8_bin DEFAULT '0',
  `exp_fecexp` date DEFAULT NULL,
  `exp_estatus` int(11) DEFAULT '0',
  `exp_hechos` varchar(300) COLLATE utf8_bin DEFAULT '0',
  `exp_fecdili` date NOT NULL,
  `exp_especif` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `exp_estadoxp` int(11) DEFAULT '0',
  `exp_observotro` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `exp_archivo` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`exp_codigo`, `exp_num`, `exp_fecexp`, `exp_estatus`, `exp_hechos`, `exp_fecdili`, `exp_especif`, `exp_estadoxp`, `exp_observotro`, `exp_archivo`) VALUES
(4, 'asdasdas', '2016-11-12', 3, 'asdasd', '2016-12-02', 'asdasd', 5, 'asdasd', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `fun_codigo` int(11) NOT NULL,
  `fun_nacionalidad` set('V','E') COLLATE utf8_bin NOT NULL,
  `fun_cedula` int(9) NOT NULL DEFAULT '0',
  `fun_fecnac` date NOT NULL,
  `fun_nombre` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `fun_apellido` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `fun_genero` int(11) NOT NULL,
  `fun_fecingreso` date NOT NULL,
  `fun_fecegreso` date DEFAULT NULL,
  `fun_motivegreso` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `fun_fecreingreso` date NOT NULL,
  `fun_anosserv` int(11) NOT NULL,
  `fun_estcivil` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `fun_telefonom` varchar(50) COLLATE utf8_bin DEFAULT '0',
  `fun_telefonoc` varchar(50) COLLATE utf8_bin DEFAULT '0',
  `fun_direccion` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `fun_nom_madre` varchar(200) COLLATE utf8_bin DEFAULT '0',
  `fun_cargafam` int(11) NOT NULL DEFAULT '0',
  `fun_nom_padre` varchar(200) COLLATE utf8_bin DEFAULT '0',
  `fun_placa` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `fun_rango` int(11) NOT NULL DEFAULT '0',
  `fun_nivel` int(11) NOT NULL DEFAULT '0',
  `fun_procedencia` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `fun_adscrito` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `fun_nivelacad` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `fun_profesion` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `fun_cursos` varchar(500) COLLATE utf8_bin DEFAULT '0',
  `fun_talleres` varchar(500) COLLATE utf8_bin DEFAULT '0',
  `fun_reportesserv` int(11) DEFAULT '0',
  `fun_retirado` set('Si','No') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`fun_codigo`, `fun_nacionalidad`, `fun_cedula`, `fun_fecnac`, `fun_nombre`, `fun_apellido`, `fun_genero`, `fun_fecingreso`, `fun_fecegreso`, `fun_motivegreso`, `fun_fecreingreso`, `fun_anosserv`, `fun_estcivil`, `fun_telefonom`, `fun_telefonoc`, `fun_direccion`, `fun_nom_madre`, `fun_cargafam`, `fun_nom_padre`, `fun_placa`, `fun_rango`, `fun_nivel`, `fun_procedencia`, `fun_adscrito`, `fun_nivelacad`, `fun_profesion`, `fun_cursos`, `fun_talleres`, `fun_reportesserv`, `fun_retirado`) VALUES
(16, 'V', 19191492, '1989-06-15', 'Gabriel A', 'Rojas.', 1, '2016-10-01', '0000-00-00', '', '0000-00-00', 2, 'soltero', '0412-4289536', '0273-5350116', 'sdasd', 'lilia amanda rojas', 2, 'no aplica', '19191493', 2, 2, 'gobernacion', 'dtsi', 'ingomasld', 'programador', 'sadas', 'asdasd', 0, 'No'),
(18, 'V', 19191493, '1989-06-15', 'helde', 'Rojas', 2, '1989-06-15', '0000-00-00', '', '0000-00-00', 5, 'soltero', '0412-4289536', '0273-5350116', 'SDA', 'lilia amanda rojas', 3, 'no aplica', '19191493', 2, 4, 'gobernacion', 'dtsi', 'SDAS', 'programador', 'SADAS', 'SAAS', 0, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_emp_sub`
--

CREATE TABLE `menu_emp_sub` (
  `id` int(11) NOT NULL,
  `enlace` int(11) NOT NULL DEFAULT '0',
  `enlacesub` char(3) DEFAULT NULL,
  `Act` char(1) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `menu` varchar(250) DEFAULT NULL,
  `conex` varchar(250) DEFAULT NULL,
  `Url_1` varchar(100) NOT NULL,
  `Url_2` varchar(100) NOT NULL,
  `Url_3` varchar(100) NOT NULL,
  `Url_4` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Url_5` varchar(100) NOT NULL,
  `Url_6` varchar(100) DEFAULT NULL,
  `Url_7` varchar(100) DEFAULT NULL,
  `Url_8` varchar(100) DEFAULT NULL,
  `Url_9` varchar(100) DEFAULT NULL,
  `Url_10` varchar(100) DEFAULT NULL,
  `Inserte` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Updated` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Deleted` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Acciones` varchar(80) NOT NULL,
  `Ejecutar` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `conexd` varchar(200) DEFAULT NULL,
  `funcion` varchar(100) DEFAULT NULL,
  `nivel` text,
  `CA` char(2) DEFAULT NULL,
  `CAdmin` int(1) DEFAULT NULL,
  `CssColor` varchar(50) NOT NULL,
  `CssImagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu_emp_sub`
--

INSERT INTO `menu_emp_sub` (`id`, `enlace`, `enlacesub`, `Act`, `orden`, `menu`, `conex`, `Url_1`, `Url_2`, `Url_3`, `Url_4`, `Url_5`, `Url_6`, `Url_7`, `Url_8`, `Url_9`, `Url_10`, `Inserte`, `Updated`, `Deleted`, `Acciones`, `Ejecutar`, `conexd`, `funcion`, `nivel`, `CA`, `CAdmin`, `CssColor`, `CssImagen`) VALUES
(33, 54, NULL, NULL, 21, 'Inicio', 'index.php', 'sistema/index.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(55, 54, NULL, NULL, 21, 'Crear Usuario', 'conf_usuario/crear_usuario.php', 'sistema/usuario.php', 'conf_usuario/crear_usuario.php', '', '', '', NULL, NULL, NULL, NULL, NULL, 'conf_usuario/crear_usuario.php', 'conf_usuario/crear_usuario.php', 'conf_usuario/crear_usuario.php', 'cargas/acciones/acciones.php', '', '', '', '', NULL, NULL, '', ''),
(56, 54, NULL, NULL, 21, 'Oficinas', 'oficinas.php', 'sistema/oficinas.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(57, 54, NULL, NULL, 21, 'Cargos', 'cargos.php', 'sistema/cargos.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(58, 54, NULL, NULL, 21, 'Rangos', 'rangos.php', 'sistema/rangos.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(59, 54, 'fun', NULL, 21, 'Administrar Perfiles', 'admin/perfiles.php', 'admin_perfil/conf_perfil.php', 'admin_perfil/conf_menu_list.php', 'admin_perfil/conf_menu_accion.php', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, '', '', NULL, NULL, '', ''),
(60, 54, NULL, NULL, 21, 'Funcionarios', 'funcionarios.php', 'sistema/funcionarios.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(61, 54, NULL, NULL, 21, 'Niveles', 'niveles.php', 'sistema/niveles.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(62, 54, NULL, NULL, 21, 'Expedientes', 'expediente.php', 'sistema/expediente.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(63, 54, NULL, NULL, 21, 'desiciones', 'desiciones.php', 'sistema/desiciones.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_menu_emp_menj`
--

CREATE TABLE `m_menu_emp_menj` (
  `id` int(11) NOT NULL,
  `orden` int(11) DEFAULT NULL,
  `menu` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conex` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `funcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Imagen` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ancho` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alto` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nivel` text COLLATE utf8_unicode_ci,
  `CA` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAdmin` char(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `m_menu_emp_menj`
--

INSERT INTO `m_menu_emp_menj` (`id`, `orden`, `menu`, `conex`, `funcion`, `Imagen`, `ancho`, `alto`, `nivel`, `CA`, `CAdmin`) VALUES
(54, NULL, 'Administrador', 'menu.php', NULL, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_menu_emp_sub_menj`
--

CREATE TABLE `m_menu_emp_sub_menj` (
  `id` int(11) NOT NULL,
  `enlace` int(11) NOT NULL DEFAULT '0',
  `enlacesub` char(3) DEFAULT NULL,
  `Act` char(1) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `menu` varchar(250) DEFAULT NULL,
  `conex` varchar(250) DEFAULT NULL,
  `Url_1` varchar(100) NOT NULL,
  `Url_2` varchar(100) NOT NULL,
  `Url_3` varchar(100) NOT NULL,
  `Url_4` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Url_5` varchar(100) NOT NULL,
  `Inserte` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Updated` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Deleted` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Acciones` varchar(80) NOT NULL,
  `Ejecutar` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `conexd` varchar(200) DEFAULT NULL,
  `funcion` varchar(100) DEFAULT NULL,
  `nivel` text,
  `CA` char(2) DEFAULT NULL,
  `CAdmin` int(1) DEFAULT NULL,
  `CssColor` varchar(50) NOT NULL,
  `CssImagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `m_menu_emp_sub_menj`
--

INSERT INTO `m_menu_emp_sub_menj` (`id`, `enlace`, `enlacesub`, `Act`, `orden`, `menu`, `conex`, `Url_1`, `Url_2`, `Url_3`, `Url_4`, `Url_5`, `Inserte`, `Updated`, `Deleted`, `Acciones`, `Ejecutar`, `conexd`, `funcion`, `nivel`, `CA`, `CAdmin`, `CssColor`, `CssImagen`) VALUES
(33, 54, NULL, NULL, NULL, 'Inicio', 'menu.php', 'sistema/index.php', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(55, 54, NULL, NULL, NULL, 'Asignar Usuarios', 'menu.php', 'sistema/usuario.php', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(56, 54, NULL, NULL, NULL, 'Oficinas', 'menu.php', 'sistema/oficinas.php', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(57, 54, NULL, NULL, NULL, 'Cargos', 'menu.php', 'sistema/cargos.php', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(58, 54, NULL, NULL, NULL, 'Rangos', 'menu.php', 'sistema/rangos.php', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(59, 54, NULL, NULL, NULL, 'Administrar Perfiles', 'menu.php', 'admin_perfil/conf_perfil.php', 'admin_perfil/conf_menu_list.php', 'admin_perfil/conf_menu_accion.php', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(60, 54, NULL, NULL, NULL, 'Funcionarios', 'menu.php', 'sistema/funcionarios.php', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(61, 54, NULL, NULL, NULL, 'Niveles', 'menu.php', 'sistema/niveles.php', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(62, 54, NULL, NULL, NULL, 'Expedientes', 'menu.php', 'sistema/expediente.php', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
(63, 54, NULL, NULL, NULL, 'Decisiones', 'menu.php', 'sistema/desiciones.php', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `niv_codigo` int(11) NOT NULL,
  `niv_descrip` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`niv_codigo`, `niv_descrip`) VALUES
(2, 'OPERACIONAL'),
(3, 'TACTICO'),
(4, 'ESTRATEGICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinas`
--

CREATE TABLE `oficinas` (
  `ofic_codigo` int(11) NOT NULL,
  `ofic_descrip` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `oficinas`
--

INSERT INTO `oficinas` (`ofic_codigo`, `ofic_descrip`) VALUES
(3, 'RECURSOS HUMANOS'),
(4, 'CORPUMA'),
(6, 'ICAP'),
(7, 'SETPOL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `CodPerfil` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`CodPerfil`, `Nombre`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles_det`
--

CREATE TABLE `perfiles_det` (
  `id` int(11) NOT NULL,
  `IdPerfil` int(11) NOT NULL DEFAULT '0',
  `Submenu` int(11) NOT NULL DEFAULT '0',
  `Menu` int(11) NOT NULL DEFAULT '0',
  `S` tinyint(4) NOT NULL,
  `U` tinyint(4) NOT NULL,
  `D` tinyint(4) NOT NULL,
  `I` tinyint(4) NOT NULL,
  `P` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles_det`
--

INSERT INTO `perfiles_det` (`id`, `IdPerfil`, `Submenu`, `Menu`, `S`, `U`, `D`, `I`, `P`) VALUES
(1, 1, 59, 54, 1, 1, 1, 1, 0),
(2, 1, 56, 54, 1, 1, 1, 1, 1),
(113, 1, 55, 54, 1, 1, 1, 1, 0),
(116, 1, 57, 54, 1, 1, 1, 1, 1),
(117, 1, 58, 54, 1, 1, 1, 1, 1),
(118, 1, 60, 54, 1, 1, 1, 1, 1),
(119, 1, 61, 54, 1, 1, 1, 1, 1),
(121, 1, 62, 54, 1, 1, 1, 1, 1),
(122, 1, 63, 54, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos`
--

CREATE TABLE `rangos` (
  `rang_codigo` int(11) NOT NULL,
  `rang_descrip` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rangos`
--

INSERT INTO `rangos` (`rang_codigo`, `rang_descrip`) VALUES
(2, 'OFICIAL AGREGADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recargar`
--

CREATE TABLE `recargar` (
  `id` int(11) NOT NULL,
  `URL` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `actd` int(1) NOT NULL,
  `Accion` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recargar`
--

INSERT INTO `recargar` (`id`, `URL`, `actd`, `Accion`) VALUES
(1, 'uploader/receiver.php', 0, ''),
(2, 'recargar/recargar.php', 0, ''),
(3, 'recargar/recargar.php', 0, ''),
(351, 'sistema/index.php', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `id` int(11) NOT NULL,
  `nacionalidad` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Usuario` int(11) NOT NULL,
  `cedula` int(11) NOT NULL DEFAULT '0',
  `Nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`id`, `nacionalidad`, `Usuario`, `cedula`, `Nombres`, `Apellidos`, `sexo`, `correo`) VALUES
(16, 'V', 0, 19191493, 'Gabriel Anatoly', 'Rojas', '', 'karpofv.89@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Sexo';

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `Nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Usuario` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `CodSede` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Nivel` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Stilo` int(1) NOT NULL,
  `theme_color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Codigo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Registro` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Observacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Cedula`, `Usuario`, `contrasena`, `CodSede`, `Tipo`, `Nivel`, `Stilo`, `theme_color`, `Codigo`, `Registro`, `Fecha`, `Observacion`) VALUES
(25, 19191493, 'ROJASGB', 'a1b995eb2627f17bfd5fcb1de8533c62', '0', 'Valido', '1', 0, '', NULL, NULL, '2016-10-31 22:15:21', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`car_codigo`);

--
-- Indices de la tabla `estado_exp`
--
ALTER TABLE `estado_exp`
  ADD PRIMARY KEY (`estxp_codigo`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`esta_codigo`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`exp_codigo`),
  ADD KEY `FK__estatus` (`exp_estatus`),
  ADD KEY `FK__estado_exp` (`exp_estadoxp`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`fun_codigo`),
  ADD KEY `FK_funcionarios_rangos` (`fun_rango`),
  ADD KEY `FK_funcionarios_niveles` (`fun_nivel`),
  ADD KEY `FK_funcionarios_sexo` (`fun_genero`);

--
-- Indices de la tabla `menu_emp_sub`
--
ALTER TABLE `menu_emp_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enlace` (`enlace`);

--
-- Indices de la tabla `m_menu_emp_menj`
--
ALTER TABLE `m_menu_emp_menj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden` (`orden`);

--
-- Indices de la tabla `m_menu_emp_sub_menj`
--
ALTER TABLE `m_menu_emp_sub_menj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enlace` (`enlace`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`niv_codigo`);

--
-- Indices de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  ADD PRIMARY KEY (`ofic_codigo`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`CodPerfil`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `perfiles_det`
--
ALTER TABLE `perfiles_det`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IdPerfil_2` (`IdPerfil`,`Submenu`,`Menu`),
  ADD KEY `IdPerfil` (`IdPerfil`),
  ADD KEY `Submenu` (`Submenu`),
  ADD KEY `Menu` (`Menu`);

--
-- Indices de la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD PRIMARY KEY (`rang_codigo`);

--
-- Indices de la tabla `recargar`
--
ALTER TABLE `recargar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `car_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado_exp`
--
ALTER TABLE `estado_exp`
  MODIFY `estxp_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `esta_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `exp_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `fun_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `menu_emp_sub`
--
ALTER TABLE `menu_emp_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `m_menu_emp_menj`
--
ALTER TABLE `m_menu_emp_menj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `m_menu_emp_sub_menj`
--
ALTER TABLE `m_menu_emp_sub_menj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `niv_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  MODIFY `ofic_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `perfiles_det`
--
ALTER TABLE `perfiles_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `rang_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `recargar`
--
ALTER TABLE `recargar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;
--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `FK__estado_exp` FOREIGN KEY (`exp_estadoxp`) REFERENCES `estado_exp` (`estxp_codigo`),
  ADD CONSTRAINT `FK__estatus` FOREIGN KEY (`exp_estatus`) REFERENCES `estatus` (`esta_codigo`);

--
-- Filtros para la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `FK_funcionarios_niveles` FOREIGN KEY (`fun_nivel`) REFERENCES `niveles` (`niv_codigo`),
  ADD CONSTRAINT `FK_funcionarios_rangos` FOREIGN KEY (`fun_rango`) REFERENCES `rangos` (`rang_codigo`),
  ADD CONSTRAINT `FK_funcionarios_sexo` FOREIGN KEY (`fun_genero`) REFERENCES `sexo` (`id`);

--
-- Filtros para la tabla `perfiles_det`
--
ALTER TABLE `perfiles_det`
  ADD CONSTRAINT `perfiles_det_ibfk_1` FOREIGN KEY (`IdPerfil`) REFERENCES `perfiles` (`CodPerfil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perfiles_det_ibfk_2` FOREIGN KEY (`Menu`) REFERENCES `m_menu_emp_menj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perfiles_det_ibfk_3` FOREIGN KEY (`Submenu`) REFERENCES `m_menu_emp_sub_menj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
