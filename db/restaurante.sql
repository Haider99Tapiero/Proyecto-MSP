-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2018 a las 22:13:40
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

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

CREATE TABLE `categoriainsumo` (
  `idcategoria` int(11) NOT NULL COMMENT 'identificador unico',
  `descripcion` varchar(45) NOT NULL COMMENT 'nombre o descripcion de las categorias de los insumos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL COMMENT 'identificador unico',
  `nombre` varchar(45) NOT NULL COMMENT 'nombre del cliente',
  `apellido` varchar(45) NOT NULL COMMENT 'apellido del cliente',
  `documento` varchar(45) NOT NULL COMMENT 'numero de documento del cliente',
  `direccion` varchar(45) NOT NULL COMMENT 'direccion de residencia del cliente',
  `email` varchar(45) NOT NULL COMMENT 'correo electronico del cliente',
  `telefono` varchar(45) NOT NULL COMMENT 'numero de telefono del cliente',
  `contrasena` varchar(45) NOT NULL COMMENT 'contraseña de la cuenta del cliente',
  `tipodocumento_idtipodocumento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `numeroventa` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` text NOT NULL,
  `precio` varchar(50) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `subtotal` varchar(50) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_presencial`
--

CREATE TABLE `detalle_presencial` (
  `iddetalle_presencial` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `forma_pago_idforma_pago` int(11) NOT NULL,
  `mesas_idmesas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_presencial_has_plato`
--

CREATE TABLE `detalle_presencial_has_plato` (
  `detalle_presencial_iddetalle_presencial` int(11) NOT NULL,
  `plato_idPlato` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idempleados` int(11) NOT NULL COMMENT 'identificador unico',
  `nombre` varchar(45) NOT NULL COMMENT 'nombre del empleado',
  `apellido` varchar(45) NOT NULL COMMENT 'apellido del empleado',
  `documento` varchar(45) NOT NULL COMMENT 'numero de documento del empleado',
  `direccion` varchar(45) NOT NULL COMMENT 'direccion residencia del empleado',
  `email` varchar(45) NOT NULL COMMENT 'correo electronico del empleado',
  `telefono` varchar(45) NOT NULL COMMENT 'numero de telefono del empleado',
  `contrasena` varchar(45) NOT NULL COMMENT 'contraseña con la que el empleado ingresara el sistema',
  `tipodocumento_idtipodocumento` int(11) NOT NULL,
  `genero_idgenero` int(11) NOT NULL,
  `roles_idroles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `idforma_pago` int(11) NOT NULL COMMENT 'identificador unico',
  `descripcion` varchar(45) NOT NULL COMMENT 'forma de pago'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idgenero` int(11) NOT NULL COMMENT 'identificador unico',
  `descripcion` varchar(45) NOT NULL COMMENT 'nombre o descripcion del genero'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `idmesas` int(11) NOT NULL COMMENT 'identificador unico',
  `mesa` varchar(45) NOT NULL COMMENT 'numero de la mesa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `idobservacion` int(11) NOT NULL COMMENT 'identificador unico',
  `comentario` varchar(45) NOT NULL COMMENT 'un breve comentario acerca del estado del insumo pedido',
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_insumos`
--

CREATE TABLE `pedido_insumos` (
  `idpedidoInsumos` int(11) NOT NULL COMMENT 'identificador unico',
  `cantidad` varchar(45) NOT NULL COMMENT 'cantidad de insumos a pedir',
  `unidad_medida` varchar(45) NOT NULL COMMENT 'unidad de medida del insumo',
  `descripcion` varchar(45) NOT NULL COMMENT 'breve descripcion',
  `categoriainsumo_idcategoria` int(11) NOT NULL,
  `empleados_idempleados` int(11) NOT NULL,
  `proveedor_idproveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `idPlato` int(11) NOT NULL COMMENT 'identificador unico',
  `nombre` varchar(45) NOT NULL COMMENT 'nombre del plato',
  `descripcion` varchar(45) NOT NULL COMMENT 'breve descripcion del plato',
  `imagen` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(45) NOT NULL COMMENT 'precio del plato'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL COMMENT 'identificador unico',
  `nombre` varchar(45) NOT NULL COMMENT 'nombre del proveedor',
  `categoriainsumo_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL COMMENT 'identificador unico',
  `rol` varchar(45) NOT NULL COMMENT 'nombre del rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idtipodocumento` int(11) NOT NULL COMMENT 'identificador unico',
  `descripcion` varchar(45) NOT NULL COMMENT 'nombre o descripcion del tippo de documento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriainsumo`
--
ALTER TABLE `categoriainsumo`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_cliente_tipodocumento1_idx` (`tipodocumento_idtipodocumento`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compras_cliente1_idx` (`cliente_idcliente`);

--
-- Indices de la tabla `detalle_presencial`
--
ALTER TABLE `detalle_presencial`
  ADD PRIMARY KEY (`iddetalle_presencial`),
  ADD KEY `fk_detalle_presencial_forma_pago_idx` (`forma_pago_idforma_pago`),
  ADD KEY `fk_detalle_presencial_mesas1_idx` (`mesas_idmesas`);

--
-- Indices de la tabla `detalle_presencial_has_plato`
--
ALTER TABLE `detalle_presencial_has_plato`
  ADD PRIMARY KEY (`detalle_presencial_iddetalle_presencial`,`plato_idPlato`),
  ADD KEY `fk_detalle_presencial_has_plato_plato1_idx` (`plato_idPlato`),
  ADD KEY `fk_detalle_presencial_has_plato_detalle_presencial1_idx` (`detalle_presencial_iddetalle_presencial`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idempleados`),
  ADD KEY `fk_empleados_tipodocumento1_idx` (`tipodocumento_idtipodocumento`),
  ADD KEY `fk_empleados_genero1_idx` (`genero_idgenero`),
  ADD KEY `fk_empleados_roles1_idx` (`roles_idroles`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`idforma_pago`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`idmesas`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`idobservacion`),
  ADD KEY `fk_observacion_cliente1_idx` (`cliente_idcliente`);

--
-- Indices de la tabla `pedido_insumos`
--
ALTER TABLE `pedido_insumos`
  ADD PRIMARY KEY (`idpedidoInsumos`),
  ADD KEY `fk_pedido_insumos_categoriainsumo1_idx` (`categoriainsumo_idcategoria`),
  ADD KEY `fk_pedido_insumos_empleados1_idx` (`empleados_idempleados`),
  ADD KEY `fk_pedido_insumos_proveedor1_idx` (`proveedor_idproveedor`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`idPlato`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`),
  ADD KEY `fk_proveedor_categoriainsumo1_idx` (`categoriainsumo_idcategoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idtipodocumento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriainsumo`
--
ALTER TABLE `categoriainsumo`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico';

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico';

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_presencial`
--
ALTER TABLE `detalle_presencial`
  MODIFY `iddetalle_presencial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idempleados` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico';

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `idforma_pago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico';

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico';

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `idmesas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico';

--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `idobservacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico';

--
-- AUTO_INCREMENT de la tabla `pedido_insumos`
--
ALTER TABLE `pedido_insumos`
  MODIFY `idpedidoInsumos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico';

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `idPlato` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico';

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idtipodocumento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico', AUTO_INCREMENT=5;

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
