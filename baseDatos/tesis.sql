-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2020 a las 22:13:54
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `altacompra`
--

CREATE TABLE `altacompra` (
  `comprobante` int(10) NOT NULL,
  `fCarga` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fComprobante` date NOT NULL,
  `movimientos` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cuit` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `total` float NOT NULL,
  `ven` date NOT NULL,
  `tipoComprobante` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipoFactura` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `formaPago` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fContab` date NOT NULL,
  `puntoVenta` int(4) NOT NULL,
  `condicion` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_remito` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `altacompra`
--

INSERT INTO `altacompra` (`comprobante`, `fCarga`, `fComprobante`, `movimientos`, `cuit`, `total`, `ven`, `tipoComprobante`, `tipoFactura`, `formaPago`, `fContab`, `puntoVenta`, `condicion`, `id_remito`) VALUES
(1, '2020-12-10 20:52:08', '2020-12-10', 'Producto', '20-12345678-6', 7072, '2020-12-10', '[FAC]', '[A]', 'Cuenta corriente', '2020-12-10', 1, 'pagado', 1),
(1, '2020-12-09 23:30:43', '2020-12-09', 'Producto', '20-32389919-4', 1105, '2020-12-09', '[FAC]', '[A]', 'Cuenta corriente', '2020-12-09', 1, 'pagado', 1),
(2, '2020-12-10 20:54:00', '2020-12-10', 'Producto', '20-12345678-6', 2210, '2020-12-10', '[FAC]', '[A]', 'Cuenta corriente', '2020-12-10', 1, 'pagado', 0),
(2, '2020-12-09 23:33:04', '2020-12-09', 'Producto', '20-32389919-4', 2210, '2020-12-09', '[FAC]', '[A]', 'Cuenta corriente', '2020-12-09', 1, 'impaga', 2),
(3, '2020-12-10 20:46:59', '2020-12-10', 'Producto', '20-12345678-6', 884, '2020-12-10', '[FAC]', '[A]', 'Cuenta corriente', '2020-12-10', 1, 'impaga', 0),
(3, '2020-12-09 23:44:41', '2020-12-09', 'Producto', '20-32389919-4', 1105, '2020-12-03', '[FAC]', '[A]', 'Cuenta corriente', '2020-12-09', 1, 'impaga', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `cuit` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `comprobante` int(10) NOT NULL,
  `puntoVenta` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `movimientos` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `efectivo` float NOT NULL,
  `banco` float NOT NULL,
  `tarjeta` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`cuit`, `comprobante`, `puntoVenta`, `fecha`, `movimientos`, `efectivo`, `banco`, `tarjeta`, `total`) VALUES
('20-12345678-6', 2, 'ODP[B]0009', '2020-12-10 17:52:05', 'Pago', -7072, 0, 0, -7072),
('20-12345678-6', 6, 'ODP[B]0009', '2020-12-10 17:53:57', 'Pago', -3094, 0, 0, -3094),
('20-32389919-4', 1, '0001', '2020-12-09 20:30:39', 'Pago', -1105, 0, 0, -1105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `estado`) VALUES
(3, 'General', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cuit` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cuit`, `nombre`, `domicilio`) VALUES
('20-31987654-4', 'Jose Peralta', 'vandor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigofacilito`
--

CREATE TABLE `codigofacilito` (
  `id` int(8) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `edad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `id_c` int(10) NOT NULL,
  `cuit` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `subTotal` float(10,0) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `puni` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`id_c`, `cuit`, `subTotal`, `cantidad`, `id_producto`, `puni`) VALUES
(1, '20-32389919-4', 1000, 5, 133, 200),
(2, '20-32389919-4', 2000, 10, 133, 200),
(3, '20-32389919-4', 1000, 5, 133, 200),
(1, '20-12345678-6', 6400, 25, 134, 256),
(2, '20-12345678-6', 2000, 10, 134, 200),
(3, '20-12345678-6', 800, 4, 134, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleproveedor`
--

CREATE TABLE `detalleproveedor` (
  `cuit` varchar(20) CHARACTER SET latin1 NOT NULL,
  `comprobante` int(10) NOT NULL,
  `fechacomprobante` varchar(20) NOT NULL,
  `debe` float NOT NULL,
  `haber` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleremito`
--

CREATE TABLE `detalleremito` (
  `remito_comprobante` int(11) NOT NULL,
  `remito_cuit` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `imputar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleremito`
--

INSERT INTO `detalleremito` (`remito_comprobante`, `remito_cuit`, `id_producto`, `cantidad`, `imputar`) VALUES
(1, '20-32389919-4', 133, 5, 1),
(2, '20-32389919-4', 133, 10, 1),
(3, '20-32389919-4', 133, 5, 1),
(1, '20-12345678-6', 134, 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleremitoventa`
--

CREATE TABLE `detalleremitoventa` (
  `remito_comprobanteV` int(11) NOT NULL,
  `remito_cuitV` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `imputar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleremitoventa`
--

INSERT INTO `detalleremitoventa` (`remito_comprobanteV`, `remito_cuitV`, `id_producto`, `cantidad`, `imputar`) VALUES
(1, '20-31987654-4', 133, 6, 0),
(5, '20-31987654-4', 134, 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id_venta` int(10) NOT NULL,
  `cuit` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `subTotal` float NOT NULL,
  `cantidad` int(10) NOT NULL,
  `pesoUnitario` float NOT NULL,
  `id_producto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`id_venta`, `cuit`, `subTotal`, `cantidad`, `pesoUnitario`, `id_producto`) VALUES
(1, '20-31987654-4', 180, 6, 30, 133),
(4, '20-31987654-4', 650, 10, 65, 134);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idUsuario` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `rol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idUsuario`, `usuario`, `pass`, `rol`) VALUES
(1, 'mauroac32', 'lala', 1),
(2, 'fran2019', 'pepe', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `estado`) VALUES
(14, 'Cedal', 1),
(15, 'Granjerito', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosproveedor`
--

CREATE TABLE `movimientosproveedor` (
  `cuit` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaCarga` timestamp NOT NULL DEFAULT current_timestamp(),
  `comprobante` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `debe` float NOT NULL,
  `haber` float NOT NULL,
  `saldo` float NOT NULL,
  `tipoComp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimientosproveedor`
--

INSERT INTO `movimientosproveedor` (`cuit`, `fechaCarga`, `comprobante`, `debe`, `haber`, `saldo`, `tipoComp`) VALUES
('20-12345678-6', '2020-12-10 20:46:59', '[FAC][A]0001-00000003', 884, 0, 10166, 'fac'),
('20-12345678-6', '2020-12-10 20:45:44', '[FAC][A]000100000002', 2210, 0, 9282, 'fac'),
('20-12345678-6', '2020-12-10 20:31:23', '[FAC][A]1', 7072, 0, 7072, 'fac'),
('20-12345678-6', '2020-12-10 20:53:57', 'ODP[B]0009-00000006', 0, 3094, 0, 'odp'),
('20-12345678-6', '2020-12-10 20:52:05', 'ODP[B]0009-2', 0, 7072, 3094, 'odp'),
('20-32389919-4', '2020-12-09 23:25:18', '[FAC][A]1', 1105, 0, 1105, 'fac'),
('20-32389919-4', '2020-12-09 23:33:04', '[FAC][A]2', 2210, 0, 2210, 'fac'),
('20-32389919-4', '2020-12-09 23:44:41', '[FAC][A]3', 1105, 0, 3315, 'fac'),
('20-32389919-4', '2020-12-09 23:30:39', '000100000001', 0, 1105, 0, 'odp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `alicuota` varchar(20) NOT NULL,
  `stock` int(10) NOT NULL,
  `marca` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codInt` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codBarra` int(12) DEFAULT NULL,
  `moneda` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precioCompra` float NOT NULL,
  `margen` float NOT NULL,
  `precioVenta` float NOT NULL,
  `precioFinal` float NOT NULL,
  `afectaStock` tinyint(1) NOT NULL,
  `entregaStock` tinyint(1) NOT NULL,
  `minimo` int(10) NOT NULL,
  `critico` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `alicuota`, `stock`, `marca`, `categoria`, `descripcion`, `codInt`, `codBarra`, `moneda`, `precioCompra`, `margen`, `precioVenta`, `precioFinal`, `afectaStock`, `entregaStock`, `minimo`, `critico`) VALUES
(133, 'pechuga', '10.5', 14, '14', '3', '', 'pec', NULL, 'peso', 20, 10, 30, 33.15, 0, 0, 5, 2),
(134, 'Hamburguesas', '10.5', 29, '14', '3', '', 'ham', NULL, 'peso', 55, 10, 65, 71.83, 0, 0, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `cuit` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apeynom` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`cuit`, `apeynom`, `domicilio`, `localidad`, `telefono`, `saldo`) VALUES
('20-12345678-6', 'Martin lopez', 'qweqwe', 'rio tercero', '2313545', 0),
('20-123654987-4', 'Manuel Sanchez', 'Laprida 1256', 'Rio Tercero', '03571-15236598', 0),
('20-32389919-4', 'Mauro Campani', 'Augusto Vandor', 'Rio Tercero', '03571-610102', 3315);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebagraficos`
--

CREATE TABLE `pruebagraficos` (
  `id` int(10) NOT NULL,
  `total` float NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pruebagraficos`
--

INSERT INTO `pruebagraficos` (`id`, `total`, `fecha`) VALUES
(1, 256, '2020-01-02 19:10:03'),
(2, 320, '2020-01-09 19:10:03'),
(3, 100, '2020-03-11 19:10:47'),
(4, 100, '2020-05-02 19:10:47'),
(5, 100, '2020-05-14 19:10:47'),
(6, 100, '2020-08-06 19:10:47'),
(7, 100, '2020-08-20 19:10:47'),
(8, 100, '2020-10-08 19:10:47'),
(9, 100, '2020-10-23 19:12:28'),
(10, 100, '2020-10-27 19:12:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remito`
--

CREATE TABLE `remito` (
  `comprobante` int(11) NOT NULL,
  `cuit` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipoComprobante` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaRemito` date DEFAULT NULL,
  `totalCantidad` int(11) DEFAULT NULL,
  `puntoVenta` int(4) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `remito`
--

INSERT INTO `remito` (`comprobante`, `cuit`, `fecha`, `tipoComprobante`, `tipo`, `fechaRemito`, `totalCantidad`, `puntoVenta`, `observaciones`, `estado`) VALUES
(1, '20-12345678-6', '2020-12-10', '[REM]', '[R]', '2020-12-10', 25, 1, '', 1),
(1, '20-32389919-4', '2020-12-09', '[REM]', '[R]', '2020-12-09', 5, 1, '', 1),
(2, '20-32389919-4', '2020-12-09', '[REM]', '[R]', '2020-12-09', 10, 1, '', 1),
(3, '20-32389919-4', '2020-12-09', '[REM]', '[R]', '2020-12-09', 5, 1, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remitoventa`
--

CREATE TABLE `remitoventa` (
  `comprobante` int(11) NOT NULL,
  `cuit` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipoComprobante` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaRemito` date NOT NULL,
  `totalCantidad` int(10) NOT NULL,
  `puntoVenta` int(4) NOT NULL,
  `observaciones` text CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remitoventa`
--

INSERT INTO `remitoventa` (`comprobante`, `cuit`, `fecha`, `tipoComprobante`, `tipo`, `fechaRemito`, `totalCantidad`, `puntoVenta`, `observaciones`, `estado`) VALUES
(1, '20-31987654-4', '2020-12-09', '[REM]', '[R]', '2020-12-09', 6, 1, '', 1),
(5, '20-31987654-4', '2020-12-10', '[REM]', '[R]', '2020-12-10', 10, 1, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `email`, `telefono`, `foto`) VALUES
(1, 'Mauro', 'Campani', 'mauroac26@gmail.com', '2313545', 'foto1.jpg'),
(2, 'Franco', 'Marez', 'fran_m@hotmail.com', '23515123', 'foto2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `comprobante` int(10) NOT NULL,
  `cuit` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `vencimiento` datetime NOT NULL,
  `total` float NOT NULL,
  `puntoVenta` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `formaPago` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `condicion` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_remito` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`comprobante`, `cuit`, `fecha`, `vencimiento`, `total`, `puntoVenta`, `formaPago`, `condicion`, `id_remito`) VALUES
(1, '20-31987654-4', '2020-12-09 20:34:59', '2020-11-06 00:00:00', 198.9, '[FAC][B]0009', 'Cuenta corriente', 'no cobrado', 1),
(4, '20-31987654-4', '2020-12-10 17:32:45', '2020-11-06 00:00:00', 718.25, '[FAC][B]0009', 'Cuenta corriente', 'no cobrado', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `altacompra`
--
ALTER TABLE `altacompra`
  ADD PRIMARY KEY (`comprobante`,`cuit`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`cuit`,`comprobante`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cuit`);

--
-- Indices de la tabla `codigofacilito`
--
ALTER TABLE `codigofacilito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD KEY `id_c` (`id_c`),
  ADD KEY `cuit` (`cuit`);

--
-- Indices de la tabla `detalleremito`
--
ALTER TABLE `detalleremito`
  ADD KEY `fk_detalleRemito_remito_idx` (`remito_comprobante`,`remito_cuit`);

--
-- Indices de la tabla `detalleremitoventa`
--
ALTER TABLE `detalleremitoventa`
  ADD KEY `remito_comprobanteV` (`remito_comprobanteV`),
  ADD KEY `remito_cuitV` (`remito_cuitV`),
  ADD KEY `remito_comprobanteV_2` (`remito_comprobanteV`,`remito_cuitV`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD KEY `id_venta` (`id_venta`,`cuit`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientosproveedor`
--
ALTER TABLE `movimientosproveedor`
  ADD PRIMARY KEY (`cuit`,`comprobante`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`cuit`) USING BTREE;

--
-- Indices de la tabla `remito`
--
ALTER TABLE `remito`
  ADD PRIMARY KEY (`comprobante`,`cuit`);

--
-- Indices de la tabla `remitoventa`
--
ALTER TABLE `remitoventa`
  ADD PRIMARY KEY (`comprobante`,`cuit`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`comprobante`,`cuit`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `codigofacilito`
--
ALTER TABLE `codigofacilito`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `altacompra` (`comprobante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleremito`
--
ALTER TABLE `detalleremito`
  ADD CONSTRAINT `detalleremito_ibfk_1` FOREIGN KEY (`remito_comprobante`,`remito_cuit`) REFERENCES `remito` (`comprobante`, `cuit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleremitoventa`
--
ALTER TABLE `detalleremitoventa`
  ADD CONSTRAINT `detalleremitoventa_ibfk_1` FOREIGN KEY (`remito_comprobanteV`,`remito_cuitV`) REFERENCES `remitoventa` (`comprobante`, `cuit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`id_venta`,`cuit`) REFERENCES `venta` (`comprobante`, `cuit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
