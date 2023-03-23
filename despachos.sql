-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2023 a las 20:08:55
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `despachos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoclientes`
--

CREATE TABLE `catalogoclientes` (
  `id_cliente` int(11) NOT NULL,
  `nombres` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_cliente` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `dui` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogocolaboradores`
--

CREATE TABLE `catalogocolaboradores` (
  `id_colaborador` int(11) NOT NULL,
  `nombres` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `dui` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen_motorista` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `fecha_contratacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogomarcas`
--

CREATE TABLE `catalogomarcas` (
  `id_marca` int(11) NOT NULL,
  `descripcion_marca` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogomodelos`
--

CREATE TABLE `catalogomodelos` (
  `id_modelo` int(11) NOT NULL,
  `descripcion_modelo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoperfiles`
--

CREATE TABLE `catalogoperfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion_perfil` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogopresentaciones`
--

CREATE TABLE `catalogopresentaciones` (
  `id_presentacion` int(11) NOT NULL,
  `descripcion_presentacion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoproductos`
--

CREATE TABLE `catalogoproductos` (
  `id_producto` int(11) NOT NULL,
  `descripcion_producto` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `precio_producto` decimal(30,0) NOT NULL,
  `id_presentacion` int(11) NOT NULL,
  `imagen_producto` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogorutas`
--

CREATE TABLE `catalogorutas` (
  `id_ruta` int(11) NOT NULL,
  `descripcion_ruta` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogovehiculos`
--

CREATE TABLE `catalogovehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `codigo_vehiculo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `placa` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `capacidad_vehiculo` decimal(15,0) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_despachos`
--

CREATE TABLE `control_despachos` (
  `id_control` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_entrada` time NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_motorista` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` decimal(15,0) NOT NULL,
  `costo_unit` decimal(15,0) NOT NULL,
  `total_factura` decimal(15,0) NOT NULL,
  `numero_viaje` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `numero_factura` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogoclientes`
--
ALTER TABLE `catalogoclientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_ruta` (`id_ruta`);

--
-- Indices de la tabla `catalogocolaboradores`
--
ALTER TABLE `catalogocolaboradores`
  ADD PRIMARY KEY (`id_colaborador`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `catalogomarcas`
--
ALTER TABLE `catalogomarcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `catalogomodelos`
--
ALTER TABLE `catalogomodelos`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `catalogoperfiles`
--
ALTER TABLE `catalogoperfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `catalogopresentaciones`
--
ALTER TABLE `catalogopresentaciones`
  ADD PRIMARY KEY (`id_presentacion`);

--
-- Indices de la tabla `catalogoproductos`
--
ALTER TABLE `catalogoproductos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_presentacion` (`id_presentacion`);

--
-- Indices de la tabla `catalogorutas`
--
ALTER TABLE `catalogorutas`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indices de la tabla `catalogovehiculos`
--
ALTER TABLE `catalogovehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_modelo` (`id_modelo`);

--
-- Indices de la tabla `control_despachos`
--
ALTER TABLE `control_despachos`
  ADD PRIMARY KEY (`id_control`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogoclientes`
--
ALTER TABLE `catalogoclientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogocolaboradores`
--
ALTER TABLE `catalogocolaboradores`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogomarcas`
--
ALTER TABLE `catalogomarcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogomodelos`
--
ALTER TABLE `catalogomodelos`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogoperfiles`
--
ALTER TABLE `catalogoperfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogopresentaciones`
--
ALTER TABLE `catalogopresentaciones`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogoproductos`
--
ALTER TABLE `catalogoproductos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogorutas`
--
ALTER TABLE `catalogorutas`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogovehiculos`
--
ALTER TABLE `catalogovehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `control_despachos`
--
ALTER TABLE `control_despachos`
  MODIFY `id_control` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
