-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2020 a las 00:21:30
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
  `fCarga` varchar(20) NOT NULL,
  `fComprobante` varchar(20) NOT NULL,
  `movimientos` varchar(20) NOT NULL,
  `cuit` varchar(20) NOT NULL,
  `total` float NOT NULL,
  `ven` varchar(20) NOT NULL,
  `saldo` float NOT NULL,
  `tipoComprobante` varchar(10) NOT NULL,
  `tipoFactura` varchar(10) NOT NULL,
  `formaPago` varchar(20) NOT NULL,
  `fContab` varchar(10) NOT NULL,
  `puntoVenta` int(4) NOT NULL,
  `Condicion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `altacompra`
--

INSERT INTO `altacompra` (`comprobante`, `fCarga`, `fComprobante`, `movimientos`, `cuit`, `total`, `ven`, `saldo`, `tipoComprobante`, `tipoFactura`, `formaPago`, `fContab`, `puntoVenta`, `Condicion`) VALUES
(1, '2020-05-30', '2020-05-30', 'Producto', '20-32389919-4', 494, '2020-05-30', 494, '[FAC]', '[A]', 'Cuenta corriente', '2020-05-30', 1, 'Pendiente'),
(1, '2020-05-30', '2020-05-01', 'Producto', '20-32659874-4', 987, '2020-05-21', 987, '[FAC]', '[A]', 'Cuenta corriente', '2020-05-30', 1, 'Pendiente'),
(2, '2020-05-30', '2020-05-30', 'Producto', '20-32389919-4', 1382.39, '2020-05-30', 1382.39, '[FAC]', '[A]', 'Cuenta corriente', '2020-05-30', 1, 'Pendiente'),
(2, '2020-06-03', '2020-05-21', 'Producto', '20-32659874-4', 532.75, '2020-06-27', 532.75, '[FAC]', '[A]', 'Cuenta corriente', '2020-06-04', 1, 'Pendiente'),
(3, '2020-05-30', '2020-05-30', 'Producto', '20-32389919-4', 547, '2020-05-30', 547, '[FAC]', '[A]', 'Cuenta corriente', '2020-05-30', 1, 'Pendiente'),
(4, '2020-05-30', '2020-05-30', 'Producto', '20-32389919-4', 963, '2020-05-30', 963, '[FAC]', '[A]', 'Contado', '2020-05-30', 1, 'Pendiente');

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
  `cuit` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `pUni` float(10,0) NOT NULL,
  `alicuota` varchar(10) NOT NULL,
  `subTotal` float(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`id_c`, `cuit`, `descripcion`, `cantidad`, `pUni`, `alicuota`, `subTotal`) VALUES
(1, '20-32389919-4', 'muslo', 1, 125, 'No Gravado', 125),
(1, '20-32389919-4', 'pata', 1, 369, 'No Gravado', 369),
(1, '20-32659874-4', 'pata', 1, 987, 'No Gravado', 987),
(2, '20-32389919-4', 'pechuga', 1, 368, 'No Gravado', 368),
(2, '20-32389919-4', 'muslo', 1, 789, '10,5%', 789),
(2, '20-32389919-4', 'alitas', 1, 129, '10,5%', 129),
(1, '20-32389919-4', 'pata', 1, 345, 'No Gravado', 345),
(3, '20-32389919-4', 'alitas', 1, 547, 'No Gravado', 547),
(4, '20-32389919-4', 'pata', 1, 963, 'No Gravado', 963),
(2, '20-32659874-4', 'pata', 1, 125, 'No Gravado', 125),
(2, '20-32659874-4', 'muslo', 1, 369, '10,5%', 369);

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
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idUsuario` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idUsuario`, `usuario`, `pass`) VALUES
(1, 'mauroac32', 'lala'),
(2, 'fran2019', 'pepe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosproveedor`
--

CREATE TABLE `movimientosproveedor` (
  `cuit` varchar(20) NOT NULL,
  `fechaCarga` varchar(10) NOT NULL,
  `fechaComprobante` varchar(10) NOT NULL,
  `movimientos` varchar(20) NOT NULL,
  `comprobante` int(10) NOT NULL,
  `debe` float NOT NULL,
  `haber` float NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimientosproveedor`
--

INSERT INTO `movimientosproveedor` (`cuit`, `fechaCarga`, `fechaComprobante`, `movimientos`, `comprobante`, `debe`, `haber`, `saldo`) VALUES
('20-32389919-4', '25/03/219', '22/03/2019', '[FAC] [A]', 12659879, 0, 0, 0),
('20-32389919-4', '25/03/219', '22/03/2019', '[FAC] [A]', 12659879, 0, 0, 0),
('20-32389919-4', '25/03/219', '22/03/2019', '[FAC] [A]', 12659879, 0, 0, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `cuit` varchar(20) NOT NULL,
  `apeynom` varchar(20) NOT NULL,
  `domicilio` varchar(20) NOT NULL,
  `localidad` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`cuit`, `apeynom`, `domicilio`, `localidad`, `telefono`) VALUES
('', '', '', '', ''),
('20-123654987-4', 'Manuel Sanchez', 'Laprida 1256', 'Rio Tercero', '03571-15236598'),
('20-31698125-4', 'Juan Perez', 'borwn 156', 'Rio Tercero', '0358-986521'),
('20-32389919-4', 'Mauro Campani', 'Vandor 1562', 'Rio Tercero ', '03571-610102'),
('20-32659874-4', 'Pedro Lacalle', 'Esperanza 1245', 'Rio Tercero', '3571-326598'),
('undefined', 'undefined', 'undefined', 'undefined', 'undefined');

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `altacompra`
--
ALTER TABLE `altacompra`
  ADD PRIMARY KEY (`comprobante`,`cuit`);

--
-- Indices de la tabla `codigofacilito`
--
ALTER TABLE `codigofacilito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`cuit`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
