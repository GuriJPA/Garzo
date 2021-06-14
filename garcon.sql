-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 04:19 PM
-- Server version: 5.5.39
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `garcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
`id_estado` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
(1, 'Pendiente a Tomar'),
(2, 'En preparacion'),
(3, 'Listo'),
(4, 'Pidio Cuenta'),
(5, 'Finalizado');

-- --------------------------------------------------------

--
-- Table structure for table `mesa`
--

CREATE TABLE IF NOT EXISTS `mesa` (
`id_mesa` int(20) NOT NULL,
  `numeroMesa` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `numeroMesa`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
`id_pedido` int(10) NOT NULL,
  `id_subpedido` int(10) NOT NULL,
  `id_producto` int(20) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `id_mesa` int(50) NOT NULL,
  `id_restaurante` int(50) NOT NULL,
  `id_estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
`id_persona` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `foto` varchar(80) DEFAULT NULL COMMENT 'se va guardar la ruta del folder dond estan las imagenes'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id_persona`, `usuario`, `nombre`, `apellidos`, `edad`, `descripcion`, `email`, `contrasena`, `foto`) VALUES
(1, 'admin', '', '', 0, '', '', '81dc9bdb52d04dc20036dbd8313ed055', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`id_producto` int(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` int(20) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `stock` int(10) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `producto`
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
(10, 'Flan', 'Vainilla', 150, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
(11, 'Helado de Chocolate ', '3 bocha', 120, '../../public/img/carta/postre/helado_chocolate.jpg', 5, 'postre');

-- --------------------------------------------------------

--
-- Table structure for table `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
`id_restaurante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `foto` varbinary(200) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `restaurante`
--

INSERT INTO `restaurante` (`id_restaurante`, `nombre`, `foto`, `id_persona`) VALUES
(1, 'Antares', 0x666f746f5f416e7461726573, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
 ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `mesa`
--
ALTER TABLE `mesa`
 ADD PRIMARY KEY (`id_mesa`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
 ADD PRIMARY KEY (`id_pedido`), ADD KEY `id_producto` (`id_producto`), ADD KEY `id_mesa` (`id_mesa`), ADD KEY `id_restaurante` (`id_restaurante`), ADD KEY `id_mesa_2` (`id_mesa`), ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `restaurante`
--
ALTER TABLE `restaurante`
 ADD PRIMARY KEY (`id_restaurante`), ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
MODIFY `id_estado` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mesa`
--
ALTER TABLE `mesa`
MODIFY `id_mesa` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
MODIFY `id_pedido` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
MODIFY `id_persona` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
MODIFY `id_producto` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `restaurante`
--
ALTER TABLE `restaurante`
MODIFY `id_restaurante` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
