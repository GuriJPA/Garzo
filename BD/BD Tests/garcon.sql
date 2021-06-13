-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2021 a las 23:33:05
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `garcon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
(1, 'Pendiente a Tomar'),
(2, 'En preparacion'),
(3, 'Listo'),
(4, 'Pidio Cuenta'),
(5, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(20) NOT NULL,
  `numeroMesa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `numeroMesa`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(10) NOT NULL,
  `id_subpedido` int(10) NOT NULL,
  `id_producto` int(20) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `id_mesa` int(50) NOT NULL,
  `id_restaurante` int(50) NOT NULL,
  `id_estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_subpedido`, `id_producto`, `cantidad`, `fecha`, `id_mesa`, `id_restaurante`, `id_estado`) VALUES
(1, 1, 1, 5, '', 3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `foto` varchar(80) DEFAULT NULL COMMENT 'se va guardar la ruta del folder dond estan las imagenes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `usuario`, `nombre`, `apellidos`, `edad`, `descripcion`, `email`, `contrasena`, `foto`) VALUES
(1, 'admin', '', '', 0, '', '', '81dc9bdb52d04dc20036dbd8313ed055', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` int(20) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `stock` int(10) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `precio`, `foto`, `stock`, `categoria`) VALUES
(1, 'Cerveza Ipa', 'doble lopulo', 150, '../../public/img/carta/bebidas/cerveza_ipa.jpg', 32, 'bebida'),
(2, 'Muzzarella', 'queso muzzarella', 400, '../../public/img/carta/pizza/muzzarella.jpg', 32, 'pizza'),
(3, 'Hamburguesa Doble', 'Descripcion: 2 medallones, queso, pan', 349, '../../public/img/carta/burger/burger_1.jpg', 10, 'hamburguesa'),
(4, 'Hamburguesa Triple', 'Descripcion: 3 medallones, queso, pan', 400, '../../public/img/carta/burger/burger_2.jpg', 11, 'hamburguesa'),
(5, 'Hamburguesa Premium', 'descripcion premium', 500, '../../public/img/carta/burger/burger_3.jpg', 5, 'hamburguesa'),
(6, 'Hamburguesa Garzon', 'descripcion de garzon', 400, '../../public/img/carta/burger/burger_4.jpg', 7, 'hamburguesa'),
(7, 'Zingarella', 'flan con manzanas y bizcochuelo', 90, '../../public/img/carta/postre/zingarella.jpg', 28, 'postre'),
(8, 'CocaCola 1L', 'Light', 150, '../../public/img/carta/bebidas/coca_cola.jpg', 10, 'bebida'),
(9, 'Fugazzeta', 'Pizza de cebolla', 600, '../../public/img/carta/pizza/fugazzeta.jpg', 10, 'pizza'),
(10, 'Flan', 'Vainilla', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(11, 'Helado de Chocolate ', '3 bocha', 120, '../../public/img/carta/postre/helado_chocolate.jpg', 5, 'postre'),
(13, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(14, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(15, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(16, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(17, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(18, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(19, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(20, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(21, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(22, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(23, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(24, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(25, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(26, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(27, 'Flan2', 'Vainilla2', 151, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE `restaurante` (
  `id_restaurante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `foto` varbinary(200) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restaurante`
--

INSERT INTO `restaurante` (`id_restaurante`, `nombre`, `foto`, `id_persona`) VALUES
(1, 'Antares', 0x666f746f5f416e7461726573, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_restaurante` (`id_restaurante`),
  ADD KEY `id_mesa_2` (`id_mesa`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id_restaurante`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id_restaurante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
