-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-10-2018 a las 01:20:48
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriainsumo`
--

DROP TABLE IF EXISTS `categoriainsumo`;
CREATE TABLE IF NOT EXISTS `categoriainsumo` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `descripcion` varchar(45) NOT NULL COMMENT 'nombre o descripcion de las categorias de los insumos',
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `nombre` varchar(45) NOT NULL COMMENT 'nombre del cliente',
  `apellido` varchar(45) NOT NULL COMMENT 'apellido del cliente',
  `documento` varchar(45) NOT NULL COMMENT 'numero de documento del cliente',
  `direccion` varchar(45) NOT NULL COMMENT 'direccion de residencia del cliente',
  `email` varchar(45) NOT NULL COMMENT 'correo electronico del cliente',
  `telefono` varchar(45) NOT NULL COMMENT 'numero de telefono del cliente',
  `contrasena` varchar(45) NOT NULL COMMENT 'contraseña de la cuenta del cliente',
  `tipodocumento_idtipodocumento` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `fk_cliente_tipodocumento1_idx` (`tipodocumento_idtipodocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroventa` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` text NOT NULL,
  `precio` varchar(50) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `subtotal` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `numeroventa`, `nombre`, `imagen`, `precio`, `cantidad`, `subtotal`) VALUES
(1, 1, 'camara', 'camara.jpg', '3211321', '1', '3211321'),
(2, 1, 'camara', 'camara.jpg', '3211321', '1', '3211321'),
(3, 2, 'cebolla', 'cebolla.jpg', '12222', '3', '36666'),
(4, 3, 'camara', 'camara.jpg', '3211321', '1', '3211321'),
(5, 3, 'cebolla', 'cebolla.jpg', '12222', '1', '12222'),
(6, 4, 'cebolla', 'cebolla.jpg', '12222', '6', '73332'),
(7, 4, 'camara', 'camara.jpg', '3211321', '6', '19267926');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_presencial`
--

DROP TABLE IF EXISTS `detalle_presencial`;
CREATE TABLE IF NOT EXISTS `detalle_presencial` (
  `iddetalle_presencial` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date NOT NULL,
  `forma_pago_idforma_pago` int(11) NOT NULL,
  `mesas_idmesas` int(11) NOT NULL,
  PRIMARY KEY (`iddetalle_presencial`),
  KEY `fk_detalle_presencial_forma_pago_idx` (`forma_pago_idforma_pago`),
  KEY `fk_detalle_presencial_mesas1_idx` (`mesas_idmesas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_presencial_has_plato`
--

DROP TABLE IF EXISTS `detalle_presencial_has_plato`;
CREATE TABLE IF NOT EXISTS `detalle_presencial_has_plato` (
  `detalle_presencial_iddetalle_presencial` int(11) NOT NULL,
  `plato_idPlato` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`detalle_presencial_iddetalle_presencial`,`plato_idPlato`),
  KEY `fk_detalle_presencial_has_plato_plato1_idx` (`plato_idPlato`),
  KEY `fk_detalle_presencial_has_plato_detalle_presencial1_idx` (`detalle_presencial_iddetalle_presencial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `idempleados` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `nombre` varchar(45) NOT NULL COMMENT 'nombre del empleado',
  `apellido` varchar(45) NOT NULL COMMENT 'apellido del empleado',
  `documento` varchar(45) NOT NULL COMMENT 'numero de documento del empleado',
  `direccion` varchar(45) NOT NULL COMMENT 'direccion residencia del empleado',
  `email` varchar(45) NOT NULL COMMENT 'correo electronico del empleado',
  `telefono` varchar(45) NOT NULL COMMENT 'numero de telefono del empleado',
  `contrasena` varchar(45) NOT NULL COMMENT 'contraseña con la que el empleado ingresara el sistema',
  `tipodocumento_idtipodocumento` int(11) NOT NULL,
  `genero_idgenero` int(11) NOT NULL,
  `roles_idroles` int(11) NOT NULL,
  PRIMARY KEY (`idempleados`),
  KEY `fk_empleados_tipodocumento1_idx` (`tipodocumento_idtipodocumento`),
  KEY `fk_empleados_genero1_idx` (`genero_idgenero`),
  KEY `fk_empleados_roles1_idx` (`roles_idroles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

DROP TABLE IF EXISTS `forma_pago`;
CREATE TABLE IF NOT EXISTS `forma_pago` (
  `idforma_pago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `descripcion` varchar(45) NOT NULL COMMENT 'forma de pago',
  PRIMARY KEY (`idforma_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `idgenero` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `descripcion` varchar(45) NOT NULL COMMENT 'nombre o descripcion del genero',
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE IF NOT EXISTS `mesas` (
  `idmesas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `mesa` varchar(45) NOT NULL COMMENT 'numero de la mesa',
  PRIMARY KEY (`idmesas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

DROP TABLE IF EXISTS `observacion`;
CREATE TABLE IF NOT EXISTS `observacion` (
  `idobservacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `comentario` varchar(45) NOT NULL COMMENT 'un breve comentario acerca del estado del insumo pedido',
  `cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idobservacion`),
  KEY `fk_observacion_cliente1_idx` (`cliente_idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_insumos`
--

DROP TABLE IF EXISTS `pedido_insumos`;
CREATE TABLE IF NOT EXISTS `pedido_insumos` (
  `idpedidoInsumos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `cantidad` varchar(45) NOT NULL COMMENT 'cantidad de insumos a pedir',
  `unidad_medida` varchar(45) NOT NULL COMMENT 'unidad de medida del insumo',
  `descripcion` varchar(45) NOT NULL COMMENT 'breve descripcion',
  `proveedor_idproveedor` int(11) NOT NULL,
  `categoriainsumo_idcategoria` int(11) NOT NULL,
  `empleados_idempleados` int(11) NOT NULL,
  PRIMARY KEY (`idpedidoInsumos`),
  KEY `fk_pedido_insumos_proveedor1_idx` (`proveedor_idproveedor`),
  KEY `fk_pedido_insumos_categoriainsumo1_idx` (`categoriainsumo_idcategoria`),
  KEY `fk_pedido_insumos_empleados1_idx` (`empleados_idempleados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

DROP TABLE IF EXISTS `plato`;
CREATE TABLE IF NOT EXISTS `plato` (
  `idPlato` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `nombre` varchar(45) NOT NULL COMMENT 'nombre del plato',
  `descripcion` varchar(45) NOT NULL COMMENT 'breve descripcion del plato',
  `imagen` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(45) NOT NULL COMMENT 'precio del plato',
  PRIMARY KEY (`idPlato`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`idPlato`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES
(1, 'cebolla', 'gfgfgfgfgd', 'cebolla.jpg', '12222'),
(2, 'camara', 'gfgfdgdffddg', 'camara.jpg', '3211321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `nombre` varchar(45) NOT NULL COMMENT 'nombre del proveedor',
  `categoriainsumo_idcategoria` int(11) NOT NULL,
  PRIMARY KEY (`idproveedor`),
  KEY `fk_proveedor_categoriainsumo1_idx` (`categoriainsumo_idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idroles` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `rol` varchar(45) NOT NULL COMMENT 'nombre del rol',
  PRIMARY KEY (`idroles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

DROP TABLE IF EXISTS `tipodocumento`;
CREATE TABLE IF NOT EXISTS `tipodocumento` (
  `idtipodocumento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico',
  `descripcion` varchar(45) NOT NULL COMMENT 'nombre o descripcion del tippo de documento',
  PRIMARY KEY (`idtipodocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_tipodocumento1` FOREIGN KEY (`tipodocumento_idtipodocumento`) REFERENCES `tipodocumento` (`idtipodocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_presencial`
--
ALTER TABLE `detalle_presencial`
  ADD CONSTRAINT `fk_detalle_presencial_forma_pago` FOREIGN KEY (`forma_pago_idforma_pago`) REFERENCES `forma_pago` (`idforma_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_presencial_mesas1` FOREIGN KEY (`mesas_idmesas`) REFERENCES `mesas` (`idmesas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_presencial_has_plato`
--
ALTER TABLE `detalle_presencial_has_plato`
  ADD CONSTRAINT `fk_detalle_presencial_has_plato_detalle_presencial1` FOREIGN KEY (`detalle_presencial_iddetalle_presencial`) REFERENCES `detalle_presencial` (`iddetalle_presencial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_presencial_has_plato_plato1` FOREIGN KEY (`plato_idPlato`) REFERENCES `plato` (`idPlato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_empleados_genero1` FOREIGN KEY (`genero_idgenero`) REFERENCES `genero` (`idgenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleados_roles1` FOREIGN KEY (`roles_idroles`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleados_tipodocumento1` FOREIGN KEY (`tipodocumento_idtipodocumento`) REFERENCES `tipodocumento` (`idtipodocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD CONSTRAINT `fk_observacion_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido_insumos`
--
ALTER TABLE `pedido_insumos`
  ADD CONSTRAINT `fk_pedido_insumos_categoriainsumo1` FOREIGN KEY (`categoriainsumo_idcategoria`) REFERENCES `categoriainsumo` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_insumos_empleados1` FOREIGN KEY (`empleados_idempleados`) REFERENCES `empleados` (`idempleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_insumos_proveedor1` FOREIGN KEY (`proveedor_idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_proveedor_categoriainsumo1` FOREIGN KEY (`categoriainsumo_idcategoria`) REFERENCES `categoriainsumo` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
