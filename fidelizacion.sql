-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-06-2025 a las 13:29:49
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fidelizacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficios`
--

DROP TABLE IF EXISTS `beneficios`;
CREATE TABLE IF NOT EXISTS `beneficios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empresa` varchar(100) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `beneficios`
--

INSERT INTO `beneficios` (`id`, `empresa`, `descripcion`) VALUES
(1, 'Coca cola', 'Empresa de bebidas gaseosas y más');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canjeos`
--

DROP TABLE IF EXISTS `canjeos`;
CREATE TABLE IF NOT EXISTS `canjeos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `premio_id` int DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `canjeos`
--

INSERT INTO `canjeos` (`id`, `cliente_id`, `premio_id`, `fecha`) VALUES
(1, 2, 2, '2025-06-17 20:18:32'),
(2, 2, 2, '2025-06-18 07:17:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `telefono` varchar(15) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `puntos` int DEFAULT '0',
  `contrasena` varchar(255) DEFAULT NULL,
  `rol` enum('cliente','admin') DEFAULT 'cliente',
  PRIMARY KEY (`id`),
  UNIQUE KEY `telefono` (`telefono`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `telefono`, `nombre`, `apellidos`, `direccion`, `correo`, `estado`, `ciudad`, `puntos`, `contrasena`, `rol`) VALUES
(1, '9992000107', 'Manuel', 'Puc', 'calle 18 entre 6 y 8', 'manuel@gmail.com', 'Yucatán', 'Mexico', 0, '$2y$10$Pnhv5B5MWnI8Jac5D6/CXeE9OlQZpHufWHKwLuEKgC4AsXpWX.yD.', 'admin'),
(2, '9971271209', 'Antonio', 'Puc', 'calle 18 entre 6 y 8', 'antonio@gmail.com', 'Yucatán', 'Mexico', 160, '$2y$10$t0Qg2XMuLdxyef9xxHD6neV0ZmDO147bZOpt2mT1E4WkrwmSf3E6W', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

DROP TABLE IF EXISTS `premios`;
CREATE TABLE IF NOT EXISTS `premios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `puntos_necesarios` int DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`id`, `nombre`, `descripcion`, `puntos_necesarios`, `imagen`) VALUES
(2, 'Coca cola', '200 mil light sin azúcar', 50, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMHBhMTEBMVFhUWFBIVFRUVGBUWEhgSFhUZGR0VGBYYHyggGBwnHRcXITEhJTUrLi4uGx8zODUsNyguLisBCgoKDg0OGxAQGyslHyYvLS0tLTctLy8wLS0tLS4tLS0tMi0rLS8tLystLS0tLy0tLTAtLS0tLS0tLy0tLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/'),
(3, 'SAMSUNG Galaxy S24 Ultra', 'Celular inteligente ultima generación', 10000, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `puntos` int DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ventas`
-

INSERT INTO `ventas` (`id`, `cliente_id`, `monto`, `puntos`, `fecha`) VALUES
(1, 2, 100.00, 5, '2025-06-15 23:12:32'),
(2, 2, 5000.00, 250, '2025-06-15 23:14:17'),
(3, 3, 1000.00, 50, '2025-06-17 20:26:40'),
(4, 2, 100.00, 5, '2025-06-18 13:15:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

