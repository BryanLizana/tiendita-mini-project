-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2017 a las 03:11:00
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `store_mini`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `pro_id` int(11) NOT NULL,
  `pro_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_description` longtext COLLATE utf8mb4_unicode_ci,
  `pro_precio_unidad` decimal(10,2) NOT NULL,
  `pro_precio_mayor` decimal(10,2) NOT NULL,
  `pro_cant_pro_precio_mayor` int(10) DEFAULT NULL,
  `pro_stock_general` int(11) DEFAULT NULL,
  `pro_stock_venta` int(11) DEFAULT NULL,
  `pro_stock_almacen` int(11) DEFAULT NULL,
  `pro_stock_temp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`pro_id`, `pro_code`, `pro_name`, `pro_description`, `pro_precio_unidad`, `pro_precio_mayor`, `pro_cant_pro_precio_mayor`, `pro_stock_general`, `pro_stock_venta`, `pro_stock_almacen`, `pro_stock_temp`) VALUES
(7, 'CODE', 'Camara Simple', 'Camara Simple para tomar actividades con familia', '20.50', '20.00', 10, 20, 15, 3, 15),
(8, 'CODE', 'manzana', 'Manzana Roja de la selva', '0.65', '0.45', 12, 120, 32, 85, 32),
(9, 'CODE', 'Mouse', 'Mouse Gamer basic', '30.00', '30.00', 1, 10, 7, 2, 7),
(10, 'CODE', 'Pera', 'Pera verde , traído del extranjero.', '0.50', '0.40', 12, 300, 196, 102, 196),
(13, 'CODE', 'Botas para mujer', 'Botas para mujer color negro', '30.00', '30.00', 30, 30, 29, 0, 29),
(14, 'CODE', 'Elmo tamaño real', 'Un Elmo tamaño real ( 1m )', '13.60', '13.60', 10, 10, 9, 0, 9),
(15, 'CODE', 'mini Penguin ', 'Peluche mini Penguin  ', '4.90', '4.50', 12, 5, 3, 1, 3),
(16, 'CODE', 'Buho Blanco', 'Buho Blanco que brilla en la oscuridad', '5.40', '3.70', 4, 17, 15, 0, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_imgs`
--

CREATE TABLE `producto_imgs` (
  `img_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_imgs`
--

INSERT INTO `producto_imgs` (`img_id`, `pro_id`, `pro_img_path`) VALUES
(4, 8, 'manzana.jpg1717-04-120557.jpeg'),
(5, 9, 'mouse.jpg1717-04-120527.jpeg'),
(8, 13, 'b4.jpg1717-04-140144.jpeg'),
(9, 14, 'elmo.jpg1717-04-140129.jpeg'),
(10, 15, 'pinguin.jpg1717-04-140131.jpeg'),
(11, 16, 'buho.jpg1717-04-140159.jpeg'),
(13, 7, 'panasonic.jpg1717-04-140138.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_tags`
--

CREATE TABLE `producto_tags` (
  `pro_id` int(11) NOT NULL,
  `tag_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `us_id` int(11) NOT NULL,
  `us_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_dni` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_status` int(11) NOT NULL DEFAULT '1',
  `us_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`us_id`, `us_name`, `us_last_name`, `us_dni`, `us_password`, `us_status`, `us_type`) VALUES
(1, 'Bryan', 'Lizana', '74650330', 'admin', 1, 'ROOT'),
(2, 'Bryan Copy', 'Lizana Copy', '74650331', 'admincopy', 0, 'ADMIN'),
(3, 'ADMIN', 'ADMIN', '123456789', '123456789', 1, 'ADMIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ven_id` int(11) NOT NULL,
  `us_id_cliente` int(11) NOT NULL,
  `ven_fecha` date NOT NULL,
  `ven_status` int(11) NOT NULL,
  `ven_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ven_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_productos`
--

CREATE TABLE `venta_productos` (
  `ven_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `vp_cantidad_pro` int(11) NOT NULL,
  `vp_subtotal` decimal(10,2) NOT NULL,
  `vp_igv_sub_totak` decimal(10,2) NOT NULL,
  `vp_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indices de la tabla `producto_imgs`
--
ALTER TABLE `producto_imgs`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `FK_PRO_FILE` (`pro_id`);

--
-- Indices de la tabla `producto_tags`
--
ALTER TABLE `producto_tags`
  ADD KEY `FK_TAG_PRO` (`pro_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`us_id`),
  ADD UNIQUE KEY `us_dni` (`us_dni`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ven_id`),
  ADD KEY `FK_VEN_US_CLIENTE` (`us_id_cliente`);

--
-- Indices de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  ADD KEY `FK_VP_VENTA` (`ven_id`),
  ADD KEY `FK_VP_PRO` (`pro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `producto_imgs`
--
ALTER TABLE `producto_imgs`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto_imgs`
--
ALTER TABLE `producto_imgs`
  ADD CONSTRAINT `FK_PRO_FILE` FOREIGN KEY (`pro_id`) REFERENCES `productos` (`pro_id`);

--
-- Filtros para la tabla `producto_tags`
--
ALTER TABLE `producto_tags`
  ADD CONSTRAINT `FK_TAG_PRO` FOREIGN KEY (`pro_id`) REFERENCES `productos` (`pro_id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `FK_VEN_US_CLIENTE` FOREIGN KEY (`us_id_cliente`) REFERENCES `usuarios` (`us_id`);

--
-- Filtros para la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  ADD CONSTRAINT `FK_VP_PRO` FOREIGN KEY (`pro_id`) REFERENCES `productos` (`pro_id`),
  ADD CONSTRAINT `FK_VP_VENTA` FOREIGN KEY (`ven_id`) REFERENCES `ventas` (`ven_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
