-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-01-2019 a las 08:51:45
-- Versión del servidor: 5.6.38
-- Versión de PHP: 5.6.32-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-04-2019 a las 00:54:00
-- Versión del servidor: 5.6.38
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vehiculo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `reference` int(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `unidades` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`reference`, `marca`, `modelo`, `precio`, `unidades`, `total`, `fecha`, `user`) VALUES
(81, 'Ferrari', 'LaFerrari2', '16700', '3', '50100', '2019-03-12', 'admin'),
(82, 'Mercedes', 'GLA', '27400', '3', '82200', '2019-03-12', 'admin'),
(83, 'Mercedes', 'GLA', '1', '1', '1', '2019-03-12', 'admin'),
(84, 'Mercedes', 'GLA', '27400', '1', '27400', '2019-03-12', 'admin'),
(85, 'Mercedes', 'GLA', '27400', '1', '27400', '2019-03-12', 'admin'),
(86, 'Mercedes', 'GLA', '27400', '1', '27400', '2019-03-12', 'admin'),
(87, 'Mercedes', 'GLA', '27400', '1', '27400', '2019-03-12', 'admin'),
(88, 'Skoda', 'Favia', '13700', '1', '13700', '2019-03-12', 'admin'),
(89, 'Skoda', 'Favia', '13700', '1', '13700', '2019-03-12', 'admin'),
(90, 'Skoda', 'Favia', '13700', '1', '13700', '2019-03-12', 'admin'),
(91, 'Alfa Romeo', 'Mito', '16700', '1', '16700', '2019-03-12', 'admin'),
(92, 'Mercedes', 'GLA', '27400', '1', '27400', '2019-03-12', 'admin'),
(93, 'Skoda', 'Favia', '13700', '1', '13700', '2019-03-12', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `matricula` varchar(100) DEFAULT NULL,
  `marca` varchar(60) DEFAULT NULL,
  `modelo` varchar(200) DEFAULT NULL,
  `fabricante` varchar(200) DEFAULT NULL,
  `combus` varchar(200) DEFAULT NULL,
  `extra` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `puertas` varchar(200) DEFAULT NULL,
  `caballos` varchar(200) DEFAULT NULL,
  `marchas` varchar(200) DEFAULT NULL,
  `velocidad` varchar(200) DEFAULT NULL,
  `motor` varchar(200) DEFAULT NULL,
  `date_fabric` varchar(200) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `imagen` varchar(200) NOT NULL,
  `imagen2` varchar(200) NOT NULL,
  `imagen3` varchar(200) NOT NULL,
  `precio` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `gama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `tipo`, `matricula`, `marca`, `modelo`, `fabricante`, `combus`, `extra`, `color`, `puertas`, `caballos`, `marchas`, `velocidad`, `motor`, `date_fabric`, `hora`, `fecha`, `imagen`, `imagen2`, `imagen3`, `precio`, `gama`) VALUES
(1, 'Deportivo','8645HCX', 'Mercedes', 'GLA', 'mercedes', 'hybrid', 'Ruedas', 'verde', '3', '290', '6', '250', 'v12', '2018-01-02', NULL, NULL, 'assets/img/images/mercedes.png', 'assets/img/images/mercedes2.png', 'assets/img/images/mercedes3.png', '27400', 'alta'),
(2, 'turismo', '8492KRF', 'Seat', 'Leon', 'Auvi', 'Diesel', 'Ruedas', 'azul', '5', '130', '6', '260', 'v6', '03/10/2018', NULL, NULL, 'assets/img/images/seat.png', '', '', '16700', 'alta'),
(3, 'Deportivo', '2005GJK', 'Alfa Romeo', 'Mito', 'alfa', 'Gasolina', 'WIFI', 'rojo', '3', '150', '6', '140', 'v2', '04/10/2018', NULL, NULL, 'assets/img/images/mito.png', '', '', '16700', 'alta'),
(4, 'turismo', '4879JKL', 'Ford', 'Focus', 'ford', 'Diesel', 'Ruedas', 'gris', '5', '110', '5', '120', 'v1', '03/12/2018', NULL, NULL, 'assets/img/images/ford.png', '', '', '1000', 'baja'),
(5, 'Turismo', '0000BCD', 'Ferrari', 'LaFerrari2', 'ferrari', 'hybrid', 'llantas,ruedas,cristal,', 'rojo', '3', '200', '8', '370', 'v8', '2019-03-22', NULL, NULL, 'assets/img/images/ferrari.png', '', '', '16700', 'media'),
(6, 'turismo', '8477CFD', 'Ford', 'Mondeo', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'assets/img/images/ford.png', '', '', '13700', 'baja'),
(7, 'Todoterreno', '4851CDF', 'Audi', 'A3', 'VW', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'assets/img/images/seat.png', '', '', '13700', 'baja'),
(8, 'Deportivo', '9634FTG', 'Citroen', 'C4', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'assets/img/images/mercedes.png', '', '', '13700', 'media'),
(9, 'Turismo', '0321CDT', 'Skoda', 'Favia', 'Ford', 'hybrid', '', 'Azul', '5', '120', '5', '175', 'v6', '', NULL, NULL, 'assets/img/images/ferrari.png', '', '', '13700', 'alta'),
(10, 'Todoterreno', '7984LNP', 'BMW', 'm4', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'assets/img/images/ford1.png', '', '', '13700', 'alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fav`
--

CREATE TABLE `fav` (
  `matricula` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fav`
--

INSERT INTO `fav` (`matricula`, `marca`, `modelo`) VALUES
('8645HCX', 'Mercedes', 'GLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `username`, `passwd`, `email`, `country`, `province`, `city`, `tipo`, `avatar`) VALUES
(12, 'admin', '', 'admin1', '$2y$10$bhCeyQqhdzfrt9afJqpC5eowl0AoYaLMAXXy6JELjADZLjuRKPIY2', 'admin@admin.com', '', '', '', 'admin', 'https://api.adorable.io/avatars/40/admin@admin.com.png'),
(13, '', '', 'user', '$2y$10$NHW9x6UXHKyDf1MvT86FmedW1nuvFdge6Z/ilr2mzYmJ3Ctiotqyu', 'user@user.com', '', '', '', 'user', 'https://api.adorable.io/avatars/40/user@user.com.png'),
(14, 'ruven', 'amesqua', 'elruveh', 'elru', 'elru@tururu.axanr', 'spain', 'valencia', 'ontinyent', 'user', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`reference`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `reference` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vehiculo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `matricula` varchar(100) DEFAULT NULL,
  `marca` varchar(60) DEFAULT NULL,
  `modelo` varchar(200) DEFAULT NULL,
  `fabricante` varchar(200) DEFAULT NULL,
  `combus` varchar(200) DEFAULT NULL,
  `extra` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `puertas` varchar(200) DEFAULT NULL,
  `caballos` varchar(200) DEFAULT NULL,
  `marchas` varchar(200) DEFAULT NULL,
  `velocidad` varchar(200) DEFAULT NULL,
  `motor` varchar(200) DEFAULT NULL,
  `date_fabric` varchar(200) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `imagen` varchar(50) NOT NULL,
  `precio` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `gama` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `tipo`, `matricula`, `marca`, `modelo`, `fabricante`, `combus`, `extra`, `color`, `puertas`, `caballos`, `marchas`, `velocidad`, `motor`, `date_fabric`, `hora`, `fecha`, `imagen`, `imagen2`, `imagen3`, `precio`, `gama`) VALUES
(1, 'Deportivo', '8645HCX', 'Mercedes', 'GLA', 'mercedes', 'hybrid', 'Ruedas', 'verde', '3', '290', '6', '250', 'v12', '2018-01-02', NULL, NULL, 'view/assets/img/images/mercedes.png', 'view/assets/img/images/mercedes2.png', 'view/assets/img/images/mercedes3.png', '27400', 'alta'),
(2, 'turismo', '8492KRF', 'Seat', 'Leon', 'Auvi', 'Diesel', 'Ruedas', 'azul', '5', '130', '6', '260', 'v6', '03/10/2018', NULL, NULL, 'view/assets/img/images/seat.png', '16700', 'alta'),
(3, 'Deportivo', '8645HCX', 'Mercedes', 'GLA', 'mercedes', 'hybrid', 'Ruedas', 'verde', '3', '290', '6', '250', 'v12', '2018-01-02', NULL, NULL, 'view/assets/img/images/alfa.png', '9500', 'media'),
(4, 'Deportivo', '2005GJK', 'Alfa Romeo', 'Mito', 'alfa', 'Gasolina', 'WIFI', 'rojo', '3', '150', '6', '140', 'v2', '04/10/2018', NULL, NULL, 'view/assets/img/images/mito.png', '16700', 'alta'),
(5, 'turismo', '4879JKL', 'Ford', 'Focus', 'ford', 'Diesel', 'Ruedas', 'gris', '5', '110', '5', '120', 'v1', '03/12/2018', NULL, NULL, 'view/assets/img/images/ford.png', '1000', 'baja'),
(6, 'turismo', '0000BCD', 'Ferrari', 'LaFerrari', 'ferrari', 'Gasolina', 'Ruedas', 'rojo', '3', '650', '8', '370', 'v8', '03/02/2018', NULL, NULL, 'view/assets/img/images/ferrari.png', '16700', 'media'),
(7, 'turismo', '8477CFD', 'Ford', 'Mondeo', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'view/assets/img/images/ford.png', '13700', 'baja'),
(8, 'Todoterreno', '4851CDF', 'Audi', 'A3', 'VW', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'view/assets/img/images/seat.png', '13700', 'baja'),
(9, 'Deportivo', '9634FTG', 'Citroen', 'C4', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'view/assets/img/images/mercedes.png', '13700', 'media'),
(10, 'turismo', '0321CDT', 'Skoda', 'Favia', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'view/assets/img/images/ferrari.png', '13700', 'alta'),
(11, 'Todoterreno', '7984LNP', 'BMW', 'm4', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'view/assets/img/images/ford1.png', '13700', 'alta');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
