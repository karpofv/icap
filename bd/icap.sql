-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.16-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para icap
CREATE DATABASE IF NOT EXISTS `icap` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `icap`;


-- Volcando estructura para tabla icap.asistencia_o
CREATE TABLE IF NOT EXISTS `asistencia_o` (
  `asis_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `asis_fecha` date DEFAULT NULL,
  `asis_expcodigo` int(11) DEFAULT NULL,
  `asis_funcedula` int(11) DEFAULT NULL,
  `asis_observacion` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `asis_tipor` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `asis_lugarr` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `asis_horas` int(11) DEFAULT '1',
  `asis_supervisor` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `asis_observaofic` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `asis_pondera` int(11) DEFAULT '1',
  `asis_tipo` varchar(50) COLLATE utf8_bin DEFAULT '1',
  PRIMARY KEY (`asis_codigo`),
  KEY `FK_asistencia_expediente` (`asis_expcodigo`),
  CONSTRAINT `FK_asistencia_expediente` FOREIGN KEY (`asis_expcodigo`) REFERENCES `expediente` (`exp_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.asistencia_o: ~0 rows (aproximadamente)
DELETE FROM `asistencia_o`;
/*!40000 ALTER TABLE `asistencia_o` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia_o` ENABLE KEYS */;


-- Volcando estructura para tabla icap.asistencia_v
CREATE TABLE IF NOT EXISTS `asistencia_v` (
  `asis_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `asis_fecha` date DEFAULT NULL,
  `asis_expcodigo` int(11) DEFAULT NULL,
  `asis_funcedula` int(11) DEFAULT NULL,
  `asis_observacion` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `asis_tipor` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `asis_lugarr` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `asis_horas` int(11) DEFAULT '1',
  `asis_supervisor` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `asis_observaofic` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `asis_pondera` int(11) DEFAULT '1',
  `asis_tipo` varchar(50) COLLATE utf8_bin DEFAULT '1',
  PRIMARY KEY (`asis_codigo`),
  KEY `FK_asistencia_expediente` (`asis_expcodigo`),
  CONSTRAINT `FK_asistencia_expediente_v` FOREIGN KEY (`asis_expcodigo`) REFERENCES `expediente` (`exp_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.asistencia_v: ~0 rows (aproximadamente)
DELETE FROM `asistencia_v`;
/*!40000 ALTER TABLE `asistencia_v` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia_v` ENABLE KEYS */;


-- Volcando estructura para tabla icap.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `car_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `car_descrip` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`car_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.cargos: ~0 rows (aproximadamente)
DELETE FROM `cargos`;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` (`car_codigo`, `car_descrip`) VALUES
	(2, 'COORDINADOR'),
	(3, 'SUSTANCIADOR');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;


-- Volcando estructura para tabla icap.denuncia
CREATE TABLE IF NOT EXISTS `denuncia` (
  `den_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `den_fecha` date NOT NULL,
  `den_hora` time NOT NULL,
  `den_nacional` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_cedula` int(11) NOT NULL DEFAULT '0',
  `den_nombres` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_apellidos` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_fecnac` date NOT NULL,
  `den_genero` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_grado` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_oficio` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_estadoc` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_direccion` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_exposicion` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_funcedula` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_funnombre` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_funapellido` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `den_funrango` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`den_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.denuncia: ~0 rows (aproximadamente)
DELETE FROM `denuncia`;
/*!40000 ALTER TABLE `denuncia` DISABLE KEYS */;
/*!40000 ALTER TABLE `denuncia` ENABLE KEYS */;


-- Volcando estructura para tabla icap.denuncia_func
CREATE TABLE IF NOT EXISTS `denuncia_func` (
  `denf_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `denf_dencodigo` int(11) DEFAULT NULL,
  `denf_funcedula` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `denf_funnombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `denf_funapellido` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `denf_funrango` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`denf_codigo`),
  KEY `FK_denuncia_func_denuncia` (`denf_dencodigo`),
  CONSTRAINT `FK_denuncia_func_denuncia` FOREIGN KEY (`denf_dencodigo`) REFERENCES `denuncia` (`den_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.denuncia_func: ~0 rows (aproximadamente)
DELETE FROM `denuncia_func`;
/*!40000 ALTER TABLE `denuncia_func` DISABLE KEYS */;
/*!40000 ALTER TABLE `denuncia_func` ENABLE KEYS */;


-- Volcando estructura para tabla icap.estado_civil
CREATE TABLE IF NOT EXISTS `estado_civil` (
  `estc_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `estc_descripcion` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`estc_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.estado_civil: ~4 rows (aproximadamente)
DELETE FROM `estado_civil`;
/*!40000 ALTER TABLE `estado_civil` DISABLE KEYS */;
INSERT INTO `estado_civil` (`estc_codigo`, `estc_descripcion`) VALUES
	(1, 'Soltero(a)'),
	(2, 'Casado(a)'),
	(3, 'Viudo(a)'),
	(4, 'Divorciado(a)');
/*!40000 ALTER TABLE `estado_civil` ENABLE KEYS */;


-- Volcando estructura para tabla icap.estado_exp
CREATE TABLE IF NOT EXISTS `estado_exp` (
  `estxp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `estxp_descrip` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`estxp_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.estado_exp: ~5 rows (aproximadamente)
DELETE FROM `estado_exp`;
/*!40000 ALTER TABLE `estado_exp` DISABLE KEYS */;
INSERT INTO `estado_exp` (`estxp_codigo`, `estxp_descrip`) VALUES
	(1, 'SUSTENTACION'),
	(2, 'CONSEJO'),
	(3, 'ARCHIVO'),
	(4, 'PROCURADURIA'),
	(5, 'OTROS');
/*!40000 ALTER TABLE `estado_exp` ENABLE KEYS */;


-- Volcando estructura para tabla icap.estatus
CREATE TABLE IF NOT EXISTS `estatus` (
  `esta_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `esta_descrip` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`esta_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.estatus: ~4 rows (aproximadamente)
DELETE FROM `estatus`;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` (`esta_codigo`, `esta_descrip`) VALUES
	(1, 'CERRADO POR FALTA DE ELEMENTOS'),
	(2, 'ASISTENCIA VOLUNTARIA'),
	(3, 'ASISTENCIA OBLIGATORIA'),
	(4, 'PROCEDIMIENTOS DE DESTITUCION');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;


-- Volcando estructura para tabla icap.expediente
CREATE TABLE IF NOT EXISTS `expediente` (
  `exp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `exp_num` varchar(50) COLLATE utf8_bin DEFAULT '0',
  `exp_fecexp` date DEFAULT NULL,
  `exp_estatus` int(11) DEFAULT '0',
  `exp_hechos` varchar(300) COLLATE utf8_bin DEFAULT '0',
  `exp_fecdili` date NOT NULL,
  `exp_especif` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `exp_estadoxp` int(11) DEFAULT '0',
  `exp_observotro` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `exp_archivo` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`exp_codigo`),
  KEY `FK__estatus` (`exp_estatus`),
  KEY `FK__estado_exp` (`exp_estadoxp`),
  CONSTRAINT `FK__estado_exp` FOREIGN KEY (`exp_estadoxp`) REFERENCES `estado_exp` (`estxp_codigo`),
  CONSTRAINT `FK__estatus` FOREIGN KEY (`exp_estatus`) REFERENCES `estatus` (`esta_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.expediente: ~1 rows (aproximadamente)
DELETE FROM `expediente`;
/*!40000 ALTER TABLE `expediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `expediente` ENABLE KEYS */;


-- Volcando estructura para tabla icap.expediente_func
CREATE TABLE IF NOT EXISTS `expediente_func` (
  `expf_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `expf_expcodigo` int(11) NOT NULL,
  `expf_funcedula` int(11) NOT NULL,
  `expf_funnombre` varchar(150) COLLATE utf8_bin NOT NULL,
  `expf_funapellido` varchar(150) COLLATE utf8_bin NOT NULL,
  `expf_funrango` varchar(100) COLLATE utf8_bin NOT NULL,
  `expf_destitucion` varchar(50) COLLATE utf8_bin NOT NULL,
  `expf_fecdest` date NOT NULL,
  `expf_descripcion` varchar(300) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`expf_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.expediente_func: ~0 rows (aproximadamente)
DELETE FROM `expediente_func`;
/*!40000 ALTER TABLE `expediente_func` DISABLE KEYS */;
/*!40000 ALTER TABLE `expediente_func` ENABLE KEYS */;


-- Volcando estructura para tabla icap.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `fun_codigo` int(11) NOT NULL AUTO_INCREMENT,
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
  `fun_retirado` set('Si','No') COLLATE utf8_bin NOT NULL,
  `fun_llamados` int(11) NOT NULL,
  `fun_denuncias` int(11) NOT NULL,
  `fun_asisvol` int(11) NOT NULL,
  `fun_asisobli` int(11) NOT NULL,
  `fun_numexp` int(11) NOT NULL,
  PRIMARY KEY (`fun_codigo`),
  KEY `FK_funcionarios_rangos` (`fun_rango`),
  KEY `FK_funcionarios_niveles` (`fun_nivel`),
  KEY `FK_funcionarios_sexo` (`fun_genero`),
  CONSTRAINT `FK_funcionarios_niveles` FOREIGN KEY (`fun_nivel`) REFERENCES `niveles` (`niv_codigo`),
  CONSTRAINT `FK_funcionarios_rangos` FOREIGN KEY (`fun_rango`) REFERENCES `rangos` (`rang_codigo`),
  CONSTRAINT `FK_funcionarios_sexo` FOREIGN KEY (`fun_genero`) REFERENCES `sexo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.funcionarios: ~0 rows (aproximadamente)
DELETE FROM `funcionarios`;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;


-- Volcando estructura para tabla icap.llamados
CREATE TABLE IF NOT EXISTS `llamados` (
  `llam_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `llam_fecha` date NOT NULL,
  `llam_funcedula` int(11) NOT NULL DEFAULT '0',
  `llam_motivo` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `llam_relacion` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `llam_cedfun` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`llam_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.llamados: ~0 rows (aproximadamente)
DELETE FROM `llamados`;
/*!40000 ALTER TABLE `llamados` DISABLE KEYS */;
/*!40000 ALTER TABLE `llamados` ENABLE KEYS */;


-- Volcando estructura para tabla icap.menu_emp
CREATE TABLE IF NOT EXISTS `menu_emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orden` int(11) DEFAULT NULL,
  `menu` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conex` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `funcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Imagen` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ancho` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alto` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nivel` text COLLATE utf8_unicode_ci,
  `CA` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAdmin` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ConexMenu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orden` (`orden`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla icap.menu_emp: ~7 rows (aproximadamente)
DELETE FROM `menu_emp`;
/*!40000 ALTER TABLE `menu_emp` DISABLE KEYS */;
INSERT INTO `menu_emp` (`id`, `orden`, `menu`, `conex`, `funcion`, `Imagen`, `ancho`, `alto`, `nivel`, `CA`, `CAdmin`, `ConexMenu`) VALUES
	(1, NULL, 'Configuracion', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(2, NULL, 'Administracion', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(3, NULL, 'Funcionarios', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(4, NULL, 'Expedientes', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(5, NULL, 'Asistencias', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(6, NULL, 'Llamados de Atencion', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(7, NULL, 'Destituciones', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
	(8, NULL, 'Denuncias', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `menu_emp` ENABLE KEYS */;


-- Volcando estructura para tabla icap.menu_emp_sub
CREATE TABLE IF NOT EXISTS `menu_emp_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `CssImagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enlace` (`enlace`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla icap.menu_emp_sub: ~0 rows (aproximadamente)
DELETE FROM `menu_emp_sub`;
/*!40000 ALTER TABLE `menu_emp_sub` DISABLE KEYS */;
INSERT INTO `menu_emp_sub` (`id`, `enlace`, `enlacesub`, `Act`, `orden`, `menu`, `conex`, `Url_1`, `Url_2`, `Url_3`, `Url_4`, `Url_5`, `Url_6`, `Url_7`, `Url_8`, `Url_9`, `Url_10`, `Inserte`, `Updated`, `Deleted`, `Acciones`, `Ejecutar`, `conexd`, `funcion`, `nivel`, `CA`, `CAdmin`, `CssColor`, `CssImagen`) VALUES
	(1, 0, NULL, NULL, NULL, 'Inicio', '', 'sistema/index.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '');
/*!40000 ALTER TABLE `menu_emp_sub` ENABLE KEYS */;


-- Volcando estructura para tabla icap.m_menu_emp_menj
CREATE TABLE IF NOT EXISTS `m_menu_emp_menj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ConexMenuMaster` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `menu` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conex` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `funcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Imagen` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ancho` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alto` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nivel` text COLLATE utf8_unicode_ci,
  `CA` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAdmin` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orden` (`orden`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla icap.m_menu_emp_menj: ~9 rows (aproximadamente)
DELETE FROM `m_menu_emp_menj`;
/*!40000 ALTER TABLE `m_menu_emp_menj` DISABLE KEYS */;
INSERT INTO `m_menu_emp_menj` (`id`, `ConexMenuMaster`, `orden`, `menu`, `conex`, `funcion`, `Imagen`, `ancho`, `alto`, `nivel`, `CA`, `CAdmin`) VALUES
	(1, NULL, 1, 'Configuracion', NULL, NULL, 'glyphicon glyphicon-cog', NULL, NULL, NULL, NULL, NULL),
	(2, NULL, 2, 'Administracion', NULL, NULL, 'fa fa-lg fa fa-wrench', NULL, NULL, NULL, NULL, NULL),
	(3, NULL, 3, 'Funcionarios', NULL, NULL, 'fa fa-lg fa-fw fa-inbox', NULL, NULL, NULL, NULL, NULL),
	(4, NULL, 4, 'Expedientes', NULL, NULL, 'glyphicon glyphicon-folder-open', NULL, NULL, NULL, NULL, NULL),
	(5, NULL, 5, 'Llamados de Atencion', NULL, NULL, 'glyphicon glyphicon-bullhorn', NULL, NULL, NULL, NULL, NULL),
	(6, NULL, 7, 'Destituciones', NULL, NULL, 'glyphicon glyphicon-new-window', NULL, NULL, NULL, NULL, NULL),
	(7, NULL, 8, 'Denuncias', NULL, NULL, 'glyphicon glyphicon-pushpin', NULL, NULL, NULL, NULL, NULL),
	(8, NULL, 1, 'Inicio', NULL, NULL, 'glyphicon glyphicon-home', NULL, NULL, NULL, NULL, NULL),
	(9, NULL, 6, 'Medidas de Asistencia', NULL, NULL, 'glyphicon glyphicon-book', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `m_menu_emp_menj` ENABLE KEYS */;


-- Volcando estructura para tabla icap.m_menu_emp_sub_menj
CREATE TABLE IF NOT EXISTS `m_menu_emp_sub_menj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `CssImagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enlace` (`enlace`),
  CONSTRAINT `FK_m_menu_emp_sub_menj_m_menu_emp_menj` FOREIGN KEY (`enlace`) REFERENCES `m_menu_emp_menj` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla icap.m_menu_emp_sub_menj: ~16 rows (aproximadamente)
DELETE FROM `m_menu_emp_sub_menj`;
/*!40000 ALTER TABLE `m_menu_emp_sub_menj` DISABLE KEYS */;
INSERT INTO `m_menu_emp_sub_menj` (`id`, `enlace`, `enlacesub`, `Act`, `orden`, `menu`, `conex`, `Url_1`, `Url_2`, `Url_3`, `Url_4`, `Url_5`, `Url_6`, `Url_7`, `Url_8`, `Url_9`, `Url_10`, `Inserte`, `Updated`, `Deleted`, `Acciones`, `Ejecutar`, `conexd`, `funcion`, `nivel`, `CA`, `CAdmin`, `CssColor`, `CssImagen`) VALUES
	(1, 2, NULL, NULL, NULL, 'Rangos', NULL, 'sistema/rangos.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(2, 2, NULL, NULL, NULL, 'Oficinas', NULL, 'sistema/oficinas.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(5, 2, NULL, NULL, NULL, 'Niveles', NULL, 'sistema/niveles.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(7, 2, NULL, NULL, NULL, 'Cargos', NULL, 'sistema/cargos.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(8, 2, NULL, NULL, NULL, 'Usuarios', NULL, 'sistema/usuario.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(9, 1, NULL, NULL, NULL, 'Administracion de Perfiles', 'admin_perfil/conf_perfil.php', 'admin_perfil/conf_perfil.php', 'admin_perfil/conf_menu_list.php', 'admin_perfil/conf_menu_accion.php', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(10, 3, NULL, NULL, NULL, 'Administrar Funcionarios', NULL, 'sistema/funcionarios.php', 'sistema/reportes/funcionarios.php', 'sistema/reportes/record_func.php', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(11, 4, NULL, NULL, 1, 'Expedientes', NULL, 'sistema/expediente.php', 'sistema/reportes/historico_exp.php', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(12, 6, NULL, NULL, NULL, 'Destitucion', NULL, 'sistema/destitucion.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(14, 7, NULL, NULL, NULL, 'Denuncias', NULL, 'sistema/denuncia.php', 'sistema/reportes/denuncias.php', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(16, 9, NULL, NULL, NULL, 'Asistencias Aplicadas', NULL, 'sistema/asistencia_aplic.php', 'sistema/reportes/asistencia_aplic.php', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(17, 9, NULL, NULL, NULL, 'Asistencia Voluntaria', NULL, 'sistema/asistenciav.php', 'sistema/reportes/asistencia_v.php', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(18, 9, NULL, NULL, NULL, 'Asistencia Obligatoria', NULL, 'sistema/asistenciao.php', 'sistema/reportes/asistencia_o.php', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(19, 5, NULL, NULL, 1, 'Lllamados de Atencion', NULL, 'sistema/llamado.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(21, 4, NULL, NULL, 2, 'Desiciones', NULL, 'sistema/desiciones.php', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', ''),
	(22, 5, NULL, NULL, 2, 'Llamados Realizados', NULL, 'sistema/llamados.php', 'sistema/reportes/llamados.php', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '');
/*!40000 ALTER TABLE `m_menu_emp_sub_menj` ENABLE KEYS */;


-- Volcando estructura para tabla icap.nacionalidad
CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `nac_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nac_descripcion` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`nac_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.nacionalidad: ~2 rows (aproximadamente)
DELETE FROM `nacionalidad`;
/*!40000 ALTER TABLE `nacionalidad` DISABLE KEYS */;
INSERT INTO `nacionalidad` (`nac_codigo`, `nac_descripcion`) VALUES
	(1, 'Venezolano(a)'),
	(2, 'Colombiano(a)');
/*!40000 ALTER TABLE `nacionalidad` ENABLE KEYS */;


-- Volcando estructura para tabla icap.niveles
CREATE TABLE IF NOT EXISTS `niveles` (
  `niv_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `niv_descrip` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`niv_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.niveles: ~3 rows (aproximadamente)
DELETE FROM `niveles`;
/*!40000 ALTER TABLE `niveles` DISABLE KEYS */;
INSERT INTO `niveles` (`niv_codigo`, `niv_descrip`) VALUES
	(2, 'OPERACIONAL'),
	(3, 'TACTICO'),
	(4, 'ESTRATEGICO');
/*!40000 ALTER TABLE `niveles` ENABLE KEYS */;


-- Volcando estructura para tabla icap.oficinas
CREATE TABLE IF NOT EXISTS `oficinas` (
  `ofic_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ofic_descrip` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`ofic_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.oficinas: ~5 rows (aproximadamente)
DELETE FROM `oficinas`;
/*!40000 ALTER TABLE `oficinas` DISABLE KEYS */;
INSERT INTO `oficinas` (`ofic_codigo`, `ofic_descrip`) VALUES
	(3, 'RECURSOS HUMANOS'),
	(4, 'RESIDENCIA DE GOBERNADORES'),
	(6, 'ICAP'),
	(7, 'SETPOL'),
	(8, 'COREPUMA'),
	(9, 'OIDP');
/*!40000 ALTER TABLE `oficinas` ENABLE KEYS */;


-- Volcando estructura para tabla icap.perfiles
CREATE TABLE IF NOT EXISTS `perfiles` (
  `CodPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CodPerfil`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla icap.perfiles: ~5 rows (aproximadamente)
DELETE FROM `perfiles`;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` (`CodPerfil`, `Nombre`) VALUES
	(1, 'Administrador'),
	(5, 'Coordinador 2'),
	(4, 'Coordinador RRHH'),
	(2, 'God'),
	(6, 'Invitado');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;


-- Volcando estructura para tabla icap.perfiles_det
CREATE TABLE IF NOT EXISTS `perfiles_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPerfil` int(11) NOT NULL DEFAULT '0',
  `Submenu` int(11) NOT NULL DEFAULT '0',
  `Menu` int(11) NOT NULL DEFAULT '0',
  `S` tinyint(4) NOT NULL,
  `U` tinyint(4) NOT NULL,
  `D` tinyint(4) NOT NULL,
  `I` tinyint(4) NOT NULL,
  `P` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IdPerfil_2` (`IdPerfil`,`Submenu`,`Menu`),
  KEY `IdPerfil` (`IdPerfil`),
  KEY `Submenu` (`Submenu`),
  KEY `Menu` (`Menu`),
  CONSTRAINT `FK_perfiles_det_m_menu_emp_menj` FOREIGN KEY (`Menu`) REFERENCES `m_menu_emp_menj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_perfiles_det_m_menu_emp_sub_menj` FOREIGN KEY (`Submenu`) REFERENCES `m_menu_emp_sub_menj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_perfiles_det_perfiles` FOREIGN KEY (`IdPerfil`) REFERENCES `perfiles` (`CodPerfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=444 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla icap.perfiles_det: ~61 rows (aproximadamente)
DELETE FROM `perfiles_det`;
/*!40000 ALTER TABLE `perfiles_det` DISABLE KEYS */;
INSERT INTO `perfiles_det` (`id`, `IdPerfil`, `Submenu`, `Menu`, `S`, `U`, `D`, `I`, `P`) VALUES
	(187, 2, 1, 2, 1, 1, 1, 1, 1),
	(188, 2, 2, 2, 1, 1, 1, 1, 1),
	(190, 2, 9, 1, 1, 1, 1, 1, 1),
	(191, 2, 10, 3, 1, 1, 1, 1, 1),
	(195, 2, 8, 2, 1, 1, 1, 1, 1),
	(228, 2, 7, 2, 1, 1, 1, 1, 1),
	(229, 2, 5, 2, 1, 1, 1, 1, 1),
	(240, 2, 14, 7, 1, 1, 1, 1, 1),
	(242, 2, 12, 6, 1, 1, 1, 1, 1),
	(248, 2, 11, 4, 1, 1, 1, 1, 1),
	(250, 2, 19, 5, 1, 1, 1, 1, 1),
	(260, 2, 18, 9, 1, 1, 1, 1, 1),
	(261, 2, 17, 9, 1, 1, 1, 1, 1),
	(262, 2, 16, 9, 1, 1, 1, 1, 1),
	(290, 1, 7, 2, 1, 1, 1, 1, 1),
	(291, 1, 5, 2, 1, 1, 1, 1, 1),
	(292, 1, 2, 2, 1, 1, 1, 1, 1),
	(293, 1, 1, 2, 1, 1, 1, 1, 1),
	(294, 1, 8, 2, 1, 1, 1, 1, 1),
	(295, 1, 14, 7, 1, 1, 1, 1, 1),
	(296, 1, 12, 6, 1, 1, 1, 1, 1),
	(297, 1, 10, 3, 1, 1, 1, 1, 1),
	(298, 1, 11, 4, 1, 1, 1, 1, 1),
	(300, 1, 19, 5, 1, 1, 1, 1, 1),
	(301, 1, 18, 9, 1, 1, 1, 1, 1),
	(302, 1, 17, 9, 1, 1, 1, 1, 1),
	(303, 1, 16, 9, 1, 1, 1, 1, 1),
	(361, 2, 21, 4, 1, 1, 1, 1, 1),
	(366, 1, 21, 4, 1, 1, 1, 1, 1),
	(371, 5, 14, 7, 1, 1, 1, 1, 1),
	(376, 5, 19, 5, 1, 1, 1, 1, 1),
	(381, 5, 12, 6, 1, 0, 0, 0, 1),
	(383, 5, 21, 4, 1, 0, 0, 0, 1),
	(384, 5, 11, 4, 1, 0, 0, 0, 1),
	(387, 5, 10, 3, 1, 0, 0, 0, 1),
	(389, 5, 18, 9, 1, 0, 0, 0, 1),
	(390, 5, 17, 9, 1, 0, 0, 0, 1),
	(391, 5, 16, 9, 1, 0, 0, 0, 1),
	(395, 4, 10, 3, 1, 1, 1, 1, 1),
	(400, 4, 19, 5, 1, 0, 0, 0, 1),
	(401, 4, 18, 9, 1, 0, 0, 0, 1),
	(402, 4, 17, 9, 1, 0, 0, 0, 1),
	(403, 4, 16, 9, 1, 0, 0, 0, 1),
	(404, 4, 11, 4, 1, 0, 0, 0, 1),
	(405, 4, 21, 4, 1, 0, 0, 0, 1),
	(406, 4, 12, 6, 1, 0, 0, 0, 1),
	(407, 4, 14, 7, 1, 0, 0, 0, 1),
	(416, 6, 16, 9, 1, 0, 0, 0, 1),
	(417, 6, 17, 9, 1, 0, 0, 0, 1),
	(418, 6, 18, 9, 1, 0, 0, 0, 1),
	(419, 6, 19, 5, 1, 0, 0, 0, 1),
	(420, 6, 10, 3, 1, 0, 0, 0, 1),
	(421, 6, 11, 4, 1, 0, 0, 0, 1),
	(422, 6, 21, 4, 1, 0, 0, 0, 1),
	(423, 6, 14, 7, 1, 0, 0, 0, 1),
	(424, 6, 12, 6, 1, 0, 0, 0, 1),
	(425, 6, 9, 1, 0, 0, 0, 0, 0),
	(426, 1, 22, 5, 1, 1, 1, 1, 1),
	(431, 5, 22, 5, 1, 1, 1, 1, 1),
	(436, 4, 22, 5, 1, 0, 0, 0, 1),
	(438, 2, 22, 5, 1, 1, 1, 1, 1),
	(443, 6, 22, 5, 1, 0, 0, 0, 1);
/*!40000 ALTER TABLE `perfiles_det` ENABLE KEYS */;


-- Volcando estructura para tabla icap.rangos
CREATE TABLE IF NOT EXISTS `rangos` (
  `rang_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `rang_descrip` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`rang_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla icap.rangos: ~6 rows (aproximadamente)
DELETE FROM `rangos`;
/*!40000 ALTER TABLE `rangos` DISABLE KEYS */;
INSERT INTO `rangos` (`rang_codigo`, `rang_descrip`) VALUES
	(2, 'OFICIAL AGREGADO'),
	(4, 'OFICIAL'),
	(5, 'OFICIAL JEFE'),
	(6, 'SUPERVISOR '),
	(7, 'SUPERVISOR AGREGADO'),
	(8, 'SUPERVISOR JEFE'),
	(9, 'COMISIONADO');
/*!40000 ALTER TABLE `rangos` ENABLE KEYS */;


-- Volcando estructura para tabla icap.recargar
CREATE TABLE IF NOT EXISTS `recargar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `URL` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `actd` int(1) NOT NULL,
  `Accion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=353 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla icap.recargar: ~4 rows (aproximadamente)
DELETE FROM `recargar`;
/*!40000 ALTER TABLE `recargar` DISABLE KEYS */;
INSERT INTO `recargar` (`id`, `URL`, `actd`, `Accion`) VALUES
	(1, 'uploader/receiver.php', 0, ''),
	(2, 'recargar/aggfunciona.php', 0, 'buscarfun'),
	(351, 'sistema/index.php', 0, ''),
	(352, 'recargar/recargar.php', 0, '');
/*!40000 ALTER TABLE `recargar` ENABLE KEYS */;


-- Volcando estructura para tabla icap.registrados
CREATE TABLE IF NOT EXISTS `registrados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nacionalidad` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Usuario` int(11) NOT NULL,
  `cedula` int(11) NOT NULL DEFAULT '0',
  `Nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla icap.registrados: ~5 rows (aproximadamente)
DELETE FROM `registrados`;
/*!40000 ALTER TABLE `registrados` DISABLE KEYS */;
INSERT INTO `registrados` (`id`, `nacionalidad`, `Usuario`, `cedula`, `Nombres`, `Apellidos`, `sexo`, `correo`) VALUES
	(17, 'V', 0, 19191492, 'PRUEBA', 'PRUEBA', '', 'PRUEBA@PRUEBA.COM'),
	(18, 'V', 0, 19191493, 'GABRIEL', 'ROJAS', '', 'HOLA@GMAIL.COM'),
	(20, 'V', 0, 12345, 'coordinador', 'ROJAS', '', 'HOLA@GMAIL.COM'),
	(21, 'V', 0, 23545263, 'adriana', 'rincon', '', 'adriana2611rincon@gmail.com'),
	(22, 'V', 0, 11974054, 'edilia', 'balaguera', '', 'ediliabalaguera@gmail.com');
/*!40000 ALTER TABLE `registrados` ENABLE KEYS */;


-- Volcando estructura para tabla icap.sexo
CREATE TABLE IF NOT EXISTS `sexo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Sexo';

-- Volcando datos para la tabla icap.sexo: ~2 rows (aproximadamente)
DELETE FROM `sexo`;
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` (`id`, `Nombre`) VALUES
	(1, 'Masculino'),
	(2, 'Femenino');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;


-- Volcando estructura para tabla icap.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `Observacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla icap.usuarios: ~5 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `Cedula`, `Usuario`, `contrasena`, `CodSede`, `Tipo`, `Nivel`, `Stilo`, `theme_color`, `Codigo`, `Registro`, `Fecha`, `Observacion`) VALUES
	(26, 19191492, 'PRUEBA', '827ccb0eea8a706c4c34a16891f84e7b', '0', 'Valido', '1', 0, '', NULL, NULL, '2016-12-18 16:20:25', NULL),
	(27, 19191493, 'ROJASGB', 'a1b995eb2627f17bfd5fcb1de8533c62', '0', 'Valido', '2', 0, '', NULL, NULL, '2017-01-02 12:42:44', NULL),
	(29, 12345, 'coordinadorh', '827ccb0eea8a706c4c34a16891f84e7b', '0', 'Valido', '4', 0, '', NULL, NULL, '2017-01-03 19:25:56', NULL),
	(30, 23545263, 'coordinador2', '827ccb0eea8a706c4c34a16891f84e7b', '0', 'Valido', '5', 0, '', NULL, NULL, '2017-01-07 17:14:12', NULL),
	(31, 11974054, 'edilia', '827ccb0eea8a706c4c34a16891f84e7b', '0', 'Valido', '6', 0, '', NULL, NULL, '2017-01-07 17:16:50', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
