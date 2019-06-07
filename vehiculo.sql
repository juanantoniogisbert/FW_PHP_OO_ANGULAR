-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-06-2019 a las 08:54:58
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
  `gama` varchar(255) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `tipo`, `matricula`, `marca`, `modelo`, `fabricante`, `combus`, `extra`, `color`, `puertas`, `caballos`, `marchas`, `velocidad`, `motor`, `date_fabric`, `hora`, `fecha`, `imagen`, `imagen2`, `imagen3`, `precio`, `gama`, `lat`, `lon`) VALUES
(1, 'Deportivo', '8645HCX', 'Mercedes', 'GLA', 'mercedes', 'hybrid', 'Ruedas', 'verde', '3', '290', '6', '250', 'v12', '2018-01-02', NULL, NULL, 'assets/img/images/mercedes.png', 'assets/img/images/mercedes2.png', 'assets/img/images/mercedes3.png', '27400', 'alta', '', ''),
(2, 'turismo', '8492KRF', 'Seat', 'Leon', 'Auvi', 'Diesel', 'Ruedas', 'azul', '5', '130', '6', '260', 'v6', '03/10/2018', NULL, NULL, 'assets/img/images/seat.png', '', '', '16700', 'alta', '', ''),
(3, 'Deportivo', '2005GJK', 'Alfa Romeo', 'Mito', 'alfa', 'Gasolina', 'WIFI', 'rojo', '3', '150', '6', '140', 'v2', '04/10/2018', NULL, NULL, 'assets/img/images/mito.png', '', '', '16700', 'alta', '', ''),
(4, 'turismo', '4879JKL', 'Ford', 'Focus', 'ford', 'Diesel', 'Ruedas', 'gris', '5', '110', '5', '120', 'v1', '03/12/2018', NULL, NULL, 'assets/img/images/ford.png', '', '', '1000', 'baja', '', ''),
(5, 'Turismo', '0000BCD', 'Ferrari', 'LaFerrari2', 'ferrari', 'hybrid', 'llantas,ruedas,cristal,', 'rojo', '3', '200', '8', '370', 'v8', '2019-03-22', NULL, NULL, 'assets/img/images/ferrari.png', '', '', '16700', 'media', '', ''),
(6, 'turismo', '8477CFD', 'Ford', 'Mondeo', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'assets/img/images/ford.png', '', '', '13700', 'baja', '', ''),
(7, 'Todoterreno', '4851CDF', 'Audi', 'A3', 'VW', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'assets/img/images/seat.png', '', '', '13700', 'baja', '', ''),
(8, 'Deportivo', '9634FTG', 'Citroen', 'C4', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'assets/img/images/mercedes.png', '', '', '13700', 'media', '', ''),
(9, 'Turismo', '0321CDT', 'Skoda', 'Favia', 'Ford', 'hybrid', '', 'Azul', '5', '120', '5', '175', 'v6', '', NULL, NULL, 'assets/img/images/ferrari.png', '', '', '13700', 'alta', '', ''),
(10, 'Todoterreno', '7984LNP', 'BMW', 'm4', 'Ford', 'Gasolina', 'WIFI', 'Azul', '5', '120', '5', '175', 'v6', '05/05/2015', NULL, NULL, 'assets/img/images/ford1.png', '', '', '13700', 'alta', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_car`
--

CREATE TABLE `like_car` (
  `token` varchar(100) NOT NULL,
  `user_car` varchar(100) NOT NULL,
  `mat_car` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `like_car`
--

INSERT INTO `like_car` (`token`, `user_car`, `mat_car`) VALUES
('589566b364c195da3aab38ca807c4ddf', 'adrian', '2005GJK'),
('52063dcab1ed0cfbc93c5e79e50248a3', 'S_juanantoniogisbert', '2005GJK'),
('594580c71a3cffffb73f0ccf306b98a6', 'adrian', '8492KRF'),
('dc8ec586f4720fe7361e0ee3f964e30d', 'Array', 'Array');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `activate` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `tokenlog` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `fnac` varchar(100) DEFAULT NULL,
  `pais` varchar(120) NOT NULL,
  `provincia` varchar(120) NOT NULL,
  `ciudad` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `password`, `type`, `avatar`, `activate`, `token`, `tokenlog`, `nombre`, `apellido`, `fnac`, `pais`, `provincia`, `ciudad`) VALUES
(1, 'aaaaaa', 'hola@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/fd9ac7ea15014247f55cbad5141bab55?s=80&d=identicon&r=g', '0', 'a4fa729e10589ea7ed07c74a7e76a0ea', '61898cfc2b0bfa10292a0360dd2015d9', '', '', '', '', '', ''),
(2, 'aaaaaa', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', '920301f1a110391a1a4674868702720f', '5885a4e5d39a4e094ead980383e57d8f', '', '', '', '', '', ''),
(3, 'bbbbbbbb', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', 'aca9be439fbc93cb52cd687afaa64d55', 'f63c91c83f10489a1bc799c8c44069d6', '', '', '', '', '', ''),
(4, 'clarin', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'eea76004021825da0881fb3e49b9f7ba', 'c4957d2696bdf1a76497999ec3bc0ed6', '', '', '', '', '', ''),
(5, 'clarinisreal', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', '05b72f2ef5d26ffb1f69afd053825552', '487e827f5c5eb388bc327febe4587986', '', '', '', '', '', ''),
(6, 'asdsadas', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', '3b478d81bffaed52b55a0201bc96d9da', '58d2a46cd35063435d1663099a6079e5', '', '', '', '', '', ''),
(7, 'adasdaqwqdq', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', 'f194cb66ad5f1d2f8a42865320474ae4', 'bac4a52ccf73ca3ced80835b6db092b9', '', '', '', '', '', ''),
(8, 'eeeeeee', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', '07ecc4335df1301d53891a8d412dcea3', '8f9579bc7a272cdf17e8db9361c74ce0', '', '', '', '', '', ''),
(9, 'frfrrfr', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', '3b1e0d0dac9910e2dcdd308af012a45f', '3e626bb5c70d732f81d6fb5ee3800af8', '', '', '', '', '', ''),
(10, 'gbgbbg', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', '9f825f59414cb427ff3ad1b656b76854', 'ffdb278569310b6b317b11e4fc4aa3b8', '', '', '', '', '', ''),
(11, 'root', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', '21f8dce621c136b5c00c295727c23e64', '07f52a7e1d18a780ea636b325e3ce938', '', '', '', '', '', ''),
(12, 'aaaaaaaaaaaaaaa', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '34c23c3357632a6b9db79a3a85642616', '33f8482519ee5d47a4bd2c88406f288c', '', '', '', '', '', ''),
(13, 'bcbcbcbcbc', 'juagisla@gmail.com', '$1$rasmusle$1VxHqziCth9QpNTgYc8/S1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '6287e564', NULL, '', '', '', '', '', ''),
(14, 'qqqqq', 'juagisla@gmail.com', '$1$rasmusle$kNXL4FUY5CZj/OYIrNacl1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '374ad5ed77365ccfc9cf', NULL, '', '', '', '', '', ''),
(15, 'wwqwqwqw', 'juagisla@gmail.com', '$1$rasmusle$dOUHaJR6P8/LDKhvOwEqr.', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'e20ed92e8e0c9c9dcc2a', NULL, '', '', '', '', '', ''),
(16, 'paco', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '0', '6ef6006037064f72769e', NULL, '', '', '', '', '', ''),
(17, 'adasdsaa', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '4d315b81384517a08b90', NULL, '', '', '', '', '', ''),
(18, 'juanan', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'ba7af9f5720c980af3cb', NULL, '', '', '', '', '', ''),
(19, 'juanan1', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'c15f6db0ddc45cfdff3f', '1cf06e571f8784d8eb2d', '', '', '', '', '', ''),
(20, 'juanan2', 'juagisla@gmail.com', '$1$rasmusle$XsyDc.ybvzpDArYvgwTpY1', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'a216cf6b6147b26a85e6', '91a0a5563bba812652bd', '', '', '', '', '', ''),
(21, 'juanan3', 'juagisla@gmail.com', 'aaaaaa', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '7e91e4a827496d23851a', 'fb516d56948598cec1eb', '', '', '', '', '', ''),
(22, 'juanang', 'juagisla@gmail.com', 'aaaaaa', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'faab47e9413168904ab7', '35bb4aeb03c1fcc475dd', '', '', '', '', '', ''),
(23, 'juagisla', 'juagisla@gmail.com', 'aaaaaa', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '3be9da7fba58fb07d6c6', '6247b7f4c265f1584514', '', '', '', '', '', ''),
(24, 'juanangisbert', 'juagisla@gmail.com', 'aaaaaa', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '650134b6a3b53c16c72a', '5dd5475f023b87ae10ff', '', '', '', '', '', ''),
(25, 'aaaaaaaaaaaaaaaaaaaa', 'juagisla@gmail.com', 'aaaaaa', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'b3767880cb58d3c1aab4', '427ec842a6769bca6681', '', '', '', '', '', ''),
(26, 'juagislara', 'juagisla@gmail.com', '$1$h61.WB2.$4voDvK6K0ID3qzvFuulVQ.', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '7766d6c3f9ac75dbde29', '66a5653c01683b6e13aa', '', '', '', '', '', ''),
(27, 'elcompare', 'juagisla@gmail.com', '$2y$10$0xumZ4sZotSmp61RJGYm8eWV9JWocMKfMVBLrXtVqec6K2beGFlda', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'd9a0c3407d5751aa6303', '', '', '', '', '', '', ''),
(28, 'juanantonio', 'juagisla@gmail.com', '$2y$10$b8d/gZ1z/y5ecVKte6KhIugXpV2Sq9WD4hkxBp1LE62DSB5TxdUXO', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '7369143192d0cae550b7', '', '', '', '', '', '', ''),
(29, 'alba', 'juagisla@gmail.com', '$2y$10$DopvjN3mh7WznoLDSh0Tn.PmsDvzBAE49sHNTcizFFzsh8MAcGVEa', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'cd49f9b31142ad4cdb96', '', '', '', '', '', '', ''),
(30, 'adrian', 'juagisla@gmail.com', '$1$rasmusle$1VxHqziCth9QpNTgYc8/S1', 'user', 'http://localhost/www/FW_PHP_OO_ANGULAR/cardoor/backend/media/flowers.png', '1', 'fadc1af71c1b9a03b60b', 'e22a5926a9de478da5fe', 'elbobo', 'asdasd', '', 'Spain', 'Valencia', 'Val De La Sabina'),
(33, 'S_juanantoniogisbert', 'juagisla@gmail.com', NULL, 'user', 'https://avatars1.githubusercontent.com/u/46688139?v=4', '1', NULL, 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6U19qdWFuYW50b25pb2dpc2JlcnQNCgkJfQ.RG', '', '', '', '', '', ''),
(34, 'elruven', 'juagisla@gmail.com', '$2y$10$eoGEd2icaKGjCwlTZLDhKOnyz6GmIeG7a2mQRR.tsm3NeQPswJH0u', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', 'fb896d12d3763c7bf41a', '', '', '', '', '', '', ''),
(35, 'eladri', 'juagisla@gmail.com', '$2y$10$./8hoE0mhTKFbxOUDrtrWuloRoQF7zVo1OM4tpCu8t9jbtOnEpGny', 'user', 'https://www.gravatar.com/avatar/169c07f107dd25f695f18e6ae9dade4c?s=80&d=identicon&r=g', '1', '650dbbe9a0bfc8aa33ca', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6ZWxhZHJpDQoJCX0.1u9nZyN_xNa6hcV7gVo4h', '', '', '', '', '', ''),
(36, 'yomogan', 'juagisla@gmail.com', '$1$rasmusle$eroHj20TyIl3fFo/w8g03/', 'user', 'http://localhost/www/FW_PHP_OO_ANGULAR/cardoor/backend/media/flowers.png', '1', '808fe9594c8062f19358', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6eW9tb2dhbg0KCQl9.kl2gvcOGdUGGt-v2xblW', 'yomogan', 'yomogan', '', 'Spain', 'Badajoz', 'Bacoco');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`reference`);

--
-- Indices de la tabla `like_car`
--
ALTER TABLE `like_car`
  ADD PRIMARY KEY (`mat_car`,`user_car`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
