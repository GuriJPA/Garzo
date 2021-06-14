-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2021 a las 05:54:21
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

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
(11, 'Helado de Chocolate ', '3 bocha', 120, '../../public/img/carta/postre/helado_chocolate.jpg', 5, 'postre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
