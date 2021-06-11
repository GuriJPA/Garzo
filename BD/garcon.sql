-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 04:37 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `numeroMesa`) VALUES
(1, 1),
(2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_subpedido`, `id_producto`, `cantidad`, `fecha`, `id_mesa`, `id_restaurante`, `id_estado`) VALUES
(1, 1, 5, 1, '30-05-21 20:13:47', 1, 1, 5),
(2, 1, 30, 2, '30-05-21 20:13:47', 1, 1, 5),
(3, 2, 40, 1, '30-05-21 20:30:27', 1, 1, 5),
(4, 2, 6, 4, '30-05-21 20:30:27', 1, 1, 5),
(11, 1, 4, 2, '30-05-21 20:45:19', 2, 1, 1),
(12, 3, 3, 3, '', 1, 1, 5),
(13, 3, 0, 4, '', 1, 1, 5),
(14, 3, 40, 4, '', 1, 1, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id_persona`, `usuario`, `nombre`, `apellidos`, `edad`, `descripcion`, `email`, `contrasena`, `foto`) VALUES
(1, 'yocristian21', 'Cristian Yamil', 'Ortega', 18, 'Dueño de del restorante "la nueva esquina"', 'yocristian21@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'img/yocristian21/foto1.jpg'),
(2, 'admin', 'fabricio', 'recchini', 25, 'Dueño del resto bar Antares.', 'fabri@gmail.com', 'd6b0ab7f1c8ab8f514db9a6d85de160a', 'img/fabri21/perfil2.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `precio`, `foto`, `stock`, `categoria`) VALUES
(1, 'cerveza ipa', 'doble lopulo', 150, 'asd', 32, 'bebida'),
(3, 'hamburguesa doblee', 'Descripcion: 2 medallones, queso, pan', 349, '../../public/img/carta/burger/burger_1.jpg', 0, 'hamburguesa'),
(4, 'hamburguesa triplee', 'Descripcion: 3 medallones, queso, pan', 400, '../../public/img/carta/burger/burger_2.jpg', 11, 'hamburguesa'),
(5, 'hamburguesa premium', 'descripcion premium', 500, '../../public/img/carta/burger/burger_3.jpg', 5, 'hamburguesa'),
(6, 'hamburguesa garzon', 'descripcion de garzon', 400, '../../public/img/carta/burger/burger_4.jpg', 7, 'hamburguesa'),
(30, 'muzzarela', 'queso muzzarela', 400, 'img/pizza/foto1.jpg', 32, 'pizza'),
(40, 'zingarella', 'flan con manzanas y bizcochuelo', 90, 'img/postres/foto1.jpg', 28, 'postre');

-- --------------------------------------------------------

--
-- Table structure for table `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
`id_restaurante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `foto` varbinary(200) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `restaurante`
--

INSERT INTO `restaurante` (`id_restaurante`, `nombre`, `foto`, `id_persona`) VALUES
(1, 'Antares', 0x666f746f5f416e7461726573, 1),
(2, 'Temple', '', 2);

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
MODIFY `id_mesa` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
MODIFY `id_pedido` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
MODIFY `id_producto` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `restaurante`
--
ALTER TABLE `restaurante`
MODIFY `id_restaurante` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id_mesa`) ON UPDATE CASCADE,
ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id_restaurante`) ON UPDATE CASCADE,
ADD CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE;

--
-- Constraints for table `restaurante`
--
ALTER TABLE `restaurante`
ADD CONSTRAINT `restaurante_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
