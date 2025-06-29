-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 29-06-2025 a las 23:06:00
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
-- Base de datos: `ferreteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `dni` varchar(250) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `rela_provincia` int(11) NOT NULL,
  `localidad` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `cuit` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telefono` varchar(250) NOT NULL,
  `rela_condicioniva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombre`, `apellido`, `dni`, `fechanacimiento`, `rela_provincia`, `localidad`, `direccion`, `cuit`, `email`, `telefono`, `rela_condicioniva`) VALUES
(2, 'Ana Sofia', 'Rodriguez', '38541886', '1994-02-12', 1, 'Formosa', 'Barrio Eva Perón', '20385418869', 'sofia853@gmail.com', '3704925944', 2),
(3, 'Martín Hernan', 'Gómez', '34125678', '1990-12-08', 3, 'Río Cuarto', 'San Martín 456', '20341256786', 'martin.gomez@hotmail.com', '3512345678', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

CREATE TABLE `condicion` (
  `id_condicioniva` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `condicion`
--

INSERT INTO `condicion` (`id_condicioniva`, `descripcion`) VALUES
(1, 'Responsable Inscripto'),
(2, 'Monotributista'),
(3, 'Consumidor Final'),
(4, 'Responsable No Inscripto'),
(5, 'Exento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marcas` int(11) NOT NULL,
  `marcas_descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marcas`, `marcas_descripcion`) VALUES
(1, 'Stanley'),
(2, 'Acindar'),
(3, '3M'),
(4, 'Bosch'),
(5, 'Milwaukee'),
(6, 'DeWalt'),
(7, 'Black & Decker');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id_medida` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `abreviatura` varchar(250) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id_medida`, `descripcion`, `abreviatura`, `activo`) VALUES
(1, 'Centímetros', 'cm', 1),
(2, 'Pulgadas', 'in', 1),
(3, 'Gramos', 'g', 1),
(4, 'Metros cúbicos', 'm3', 0),
(5, 'Milímetros', 'mm', 1),
(6, 'Kilogramos', 'kg', 1),
(7, 'Litros', 'l', 1),
(8, 'Unidad', 'u', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `rela_marcas` int(11) NOT NULL,
  `rela_medidas` int(11) NOT NULL,
  `rela_rubro` int(11) DEFAULT NULL,
  `cantidad_actual` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL COMMENT 'es igual al porcentaje de utilizdad al precio de compra',
  `precio_compra` int(11) NOT NULL,
  `porcentaje_utilidad` int(11) NOT NULL,
  `rela_proveedor` int(11) NOT NULL,
  `cantidad_minima` int(11) NOT NULL COMMENT 'informar valor menor a este'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `descripcion`, `rela_marcas`, `rela_medidas`, `rela_rubro`, `cantidad_actual`, `precio_venta`, `precio_compra`, `porcentaje_utilidad`, `rela_proveedor`, `cantidad_minima`) VALUES
(1, 'Llave inglesa 8”', 1, 2, 0, 20, 4000, 2000, 50, 2, 3),
(2, 'Pegamento de contacto', 3, 3, 0, 100, 2500, 1200, 40, 4, 2),
(3, 'Taladro eléctrico inalámbrico 18V con batería incluida', 6, 8, NULL, 12, 25000, 20000, 12, 2, 1),
(4, 'Tornillo Phillips 5mm por caja de 200 u', 2, 8, NULL, 12, 6700, 4200, 12, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedores` int(11) NOT NULL,
  `razon_social` varchar(250) NOT NULL,
  `telefono_contacto` varchar(250) NOT NULL,
  `persona_contacto` varchar(250) NOT NULL,
  `cuit` varchar(250) NOT NULL,
  `rela_condicioniva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedores`, `razon_social`, `telefono_contacto`, `persona_contacto`, `cuit`, `rela_condicioniva`) VALUES
(1, 'Electricidad Norte SRL', '3812345678', 'Laura Sorazola', '27234567895', 2),
(2, 'Construcciones Argentinas SA', '1145678901', 'Ignacio Bernachelli', '30123456789', 1),
(3, 'Ferretería Central', '3411234567', 'Diego Gómez', '20345678902', 1),
(4, 'Bernachea Group', '2612233445', 'Camila Ramírez', '20890123456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `descripcion`) VALUES
(1, 'Formosa'),
(2, 'Catamarca'),
(3, 'Córdoba'),
(4, 'Santa Fe'),
(5, 'Mendoza'),
(6, 'Buenos Aires'),
(7, 'Jujuy'),
(8, 'Neuquén'),
(9, 'Río Negro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indices de la tabla `condicion`
--
ALTER TABLE `condicion`
  ADD PRIMARY KEY (`id_condicioniva`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marcas`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id_medida`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedores`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `condicion`
--
ALTER TABLE `condicion`
  MODIFY `id_condicioniva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marcas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
