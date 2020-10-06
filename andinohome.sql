-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-10-2020 a las 05:08:03
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `andinohome`
--
CREATE DATABASE IF NOT EXISTS `andinohome` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `andinohome`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributoproducto`
--

DROP TABLE IF EXISTS `atributoproducto`;
CREATE TABLE IF NOT EXISTS `atributoproducto` (
  `ATR_AtributoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `ATR_Nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ATR_AtributoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `atributoproducto`
--

INSERT INTO `atributoproducto` VALUES(1, 'Medidas');
INSERT INTO `atributoproducto` VALUES(2, 'Pintura');
INSERT INTO `atributoproducto` VALUES(3, 'Tela');
INSERT INTO `atributoproducto` VALUES(4, 'Tipo de tela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributoproducto_producto`
--

DROP TABLE IF EXISTS `atributoproducto_producto`;
CREATE TABLE IF NOT EXISTS `atributoproducto_producto` (
  `ATP_Atributoproducto` int(11) NOT NULL AUTO_INCREMENT,
  `ATP_ATR_Atributo` int(11) NOT NULL,
  `ATP_PRO_Producto` int(11) NOT NULL,
  `ATP_Descripcion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ATP_Atributoproducto`),
  KEY `fk_atributoproducto_has_producto_producto1_idx` (`ATP_PRO_Producto`),
  KEY `fk_atributoproducto_has_producto_atributoproducto1_idx` (`ATP_ATR_Atributo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `atributoproducto_producto`
--

INSERT INTO `atributoproducto_producto` VALUES(1, 1, 1, 'Largo: 182 Fondo: 90 Alto: 76, Largo: 224 Fondo: 90 Alto: 76');
INSERT INTO `atributoproducto_producto` VALUES(2, 2, 1, 'Azul');
INSERT INTO `atributoproducto_producto` VALUES(3, 3, 1, 'Telas de alta resistencia al desgaste');
INSERT INTO `atributoproducto_producto` VALUES(4, 4, 1, 'Dickens Tercipelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `CAT_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `CAT_Nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `CAT_Mensaje_Web` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `CAT_Ruta_Imagen` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `CAT_Estado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CAT_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` VALUES(1, 'SALA', 'Mensaje representativo para la categoría SALA', 'SALA/sala.jpg', 1);
INSERT INTO `categoria` VALUES(2, 'COMEDOR', 'Mensaje representativo para la categoría COMEDOR', 'SALA/sala.jpg', 1);
INSERT INTO `categoria` VALUES(3, 'CAMA', 'Mensaje representativo para la categoría CAMA', 'SALA/sala.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoproducto`
--

DROP TABLE IF EXISTS `fotoproducto`;
CREATE TABLE IF NOT EXISTS `fotoproducto` (
  `FOT_Fotoproducto` int(11) NOT NULL AUTO_INCREMENT,
  `FOT_PRO_Producto` int(11) NOT NULL,
  `FOT_Ruta` varchar(255) CHARACTER SET utf8 NOT NULL,
  `FOT_Estado` tinyint(4) NOT NULL DEFAULT '1',
  `FOT_Fecha_Creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`FOT_Fotoproducto`),
  KEY `FK_FOT_PRO_Producto_idx` (`FOT_PRO_Producto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotoproducto`
--

INSERT INTO `fotoproducto` VALUES(1, 1, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-09-28 04:52:29');
INSERT INTO `fotoproducto` VALUES(2, 1, 'SALA/Sofá/1/sofa2.jpg', 1, '2020-09-28 04:52:29');
INSERT INTO `fotoproducto` VALUES(3, 1, 'SALA/Sofá/1/sofa3.jpg', 1, '2020-09-28 04:52:29');
INSERT INTO `fotoproducto` VALUES(4, 2, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:35:17');
INSERT INTO `fotoproducto` VALUES(5, 3, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:35:17');
INSERT INTO `fotoproducto` VALUES(6, 4, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:35:17');
INSERT INTO `fotoproducto` VALUES(7, 5, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:35:17');
INSERT INTO `fotoproducto` VALUES(8, 6, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:35:17');
INSERT INTO `fotoproducto` VALUES(9, 7, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(10, 8, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(11, 9, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(12, 10, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(13, 11, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(14, 12, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(15, 13, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(16, 14, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(17, 15, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(18, 16, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(19, 17, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(20, 18, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');
INSERT INTO `fotoproducto` VALUES(21, 19, 'SALA/Sofá/1/sofa1.jpg', 1, '2020-10-06 04:37:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `LOG_Login` int(11) NOT NULL AUTO_INCREMENT,
  `LOG_USU_Usuario` int(11) NOT NULL,
  `LOG_Usuario` varchar(255) CHARACTER SET utf8 NOT NULL,
  `LOG_Contrasena` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`LOG_Login`),
  KEY `FK_LOG_USU_Usuario_idx` (`LOG_USU_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` VALUES(1, 1, 'Manu', 'fae8ccae08de442e881ae5c1616b611c19bd853f7f3ba48a6061aa7b1a79c5b0c08070646cf05574dd2cd4ac9aae3f648a8e5d86e608566cf9668af12391c852i9WLQDWml+W9idRQRB4Y8Y3JRgxZmddh1AfnIiZrrUE=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `PRO_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_SUB_Subcategoria` int(11) NOT NULL,
  `PRO_Nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `PRO_Descripcion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `PRO_Precio` int(11) NOT NULL,
  `PRO_Estado` tinyint(4) NOT NULL DEFAULT '1',
  `PRO_Fecha_Creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRO_Producto`),
  KEY `FK_PRO_SUB_Subcategoria_idx` (`PRO_SUB_Subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` VALUES(1, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-09-28 04:52:29');
INSERT INTO `producto` VALUES(2, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:34:15');
INSERT INTO `producto` VALUES(3, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:34:15');
INSERT INTO `producto` VALUES(4, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:34:15');
INSERT INTO `producto` VALUES(5, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:34:15');
INSERT INTO `producto` VALUES(6, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:34:15');
INSERT INTO `producto` VALUES(7, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(8, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(9, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(10, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(11, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(12, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(13, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(14, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(15, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(16, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(17, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(18, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');
INSERT INTO `producto` VALUES(19, 5, 'Sofá Cronos', 'Esté diseño crea una experiencia que va mucho más allá de lo que puedes ver. El Sofá Cronos une el alto diseño y el confort de los resortes encapsulados ofreciendo la sofisticación de un sofá tapizado en tela tipo velvet con cuadrados perfectos y el confort de un colchón acolchado con un estilo inigualable.', 1200000, 1, '2020-10-06 04:36:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolusuario`
--

DROP TABLE IF EXISTS `rolusuario`;
CREATE TABLE IF NOT EXISTS `rolusuario` (
  `ROL_Rolusuario` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_Nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ROL_Rolusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rolusuario`
--

INSERT INTO `rolusuario` VALUES(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

DROP TABLE IF EXISTS `subcategoria`;
CREATE TABLE IF NOT EXISTS `subcategoria` (
  `SUB_Subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `SUB_CAT_Categoria` int(11) NOT NULL,
  `SUB_Nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `SUB_Estado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`SUB_Subcategoria`),
  KEY `FK_SUB_CAT_Categoria_idx` (`SUB_CAT_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` VALUES(5, 1, 'Sofás', 1);
INSERT INTO `subcategoria` VALUES(6, 1, 'Sofás en L', 1);
INSERT INTO `subcategoria` VALUES(7, 1, 'Sofás camas', 1);
INSERT INTO `subcategoria` VALUES(8, 1, 'Reclinables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `USU_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `USU_ROL_Rolusuario` int(11) NOT NULL,
  `USU_Nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `USU_Apellido` varchar(255) CHARACTER SET utf8 NOT NULL,
  `USU_Correo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `USU_Estado` tinyint(4) NOT NULL DEFAULT '1',
  `USU_Fecha_Creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USU_Usuario`),
  KEY `FK_USU_Rol_Rolusuario_idx` (`USU_ROL_Rolusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` VALUES(1, 1, 'MANUEL FELIPE', 'CARDONA SUÁREZ', 'manuelfe9311@hotmail.com', 1, '2020-09-27 23:33:51');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atributoproducto_producto`
--
ALTER TABLE `atributoproducto_producto`
  ADD CONSTRAINT `FK_ATP_ATR_Atributo` FOREIGN KEY (`ATP_ATR_Atributo`) REFERENCES `atributoproducto` (`ATR_AtributoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ATP_PRO_Producto` FOREIGN KEY (`ATP_PRO_Producto`) REFERENCES `producto` (`PRO_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fotoproducto`
--
ALTER TABLE `fotoproducto`
  ADD CONSTRAINT `FK_FOT_PRO_Producto` FOREIGN KEY (`FOT_PRO_Producto`) REFERENCES `producto` (`PRO_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_LOG_USU_Usuario` FOREIGN KEY (`LOG_USU_Usuario`) REFERENCES `usuario` (`USU_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_PRO_SUB_Subcategoria` FOREIGN KEY (`PRO_SUB_Subcategoria`) REFERENCES `subcategoria` (`SUB_Subcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `FK_SUB_CAT_Categoria` FOREIGN KEY (`SUB_CAT_Categoria`) REFERENCES `categoria` (`CAT_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_USU_ROL_Rolusuario` FOREIGN KEY (`USU_ROL_Rolusuario`) REFERENCES `rolusuario` (`ROL_Rolusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
