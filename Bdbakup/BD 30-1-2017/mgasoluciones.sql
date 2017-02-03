-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-02-2017 a las 03:14:22
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mgasoluciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbaccount`
--

CREATE TABLE `tbaccount` (
  `idAccount` int(11) NOT NULL,
  `typeAccount` varchar(40) NOT NULL,
  `numberCard` varchar(20) NOT NULL,
  `DateExpiration` date NOT NULL,
  `CSC` varchar(5) NOT NULL,
  `idClient` int(11) NOT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbaccount`
--

INSERT INTO `tbaccount` (`idAccount`, `typeAccount`, `numberCard`, `DateExpiration`, `CSC`, `idClient`, `active`) VALUES
(1, 'tipocuenta', '234', '2017-01-01', 'csc33', 1, b'0'),
(2, 'csc', '234', '2017-01-01', 'csc', 2, b'0'),
(3, 'tipocuenta', '8765', '2017-01-12', 'csc4', 1, b'0'),
(4, 'tipocuenta', '4334', '2017-01-30', 'csc', 1, b'1'),
(5, 'VISA', '899889898989', '2017-01-30', '085', 1, b'0'),
(6, 'visa', '889899889', '2017-01-31', '098', 1, b'0'),
(7, 'visa', '123456789', '2017-01-04', '987', 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbadministrator`
--

CREATE TABLE `tbadministrator` (
  `idAdministrator` int(11) NOT NULL,
  `nameAdministrator` varchar(30) NOT NULL,
  `surname1Administrator` varchar(30) NOT NULL,
  `surname2Administrator` varchar(30) NOT NULL,
  `emailAdministrator` varchar(100) NOT NULL,
  `userAdministrator` varchar(39) NOT NULL,
  `passwordAdministrator` varchar(30) NOT NULL,
  `idStore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcanceledsales`
--

CREATE TABLE `tbcanceledsales` (
  `idcanceledsales` int(11) NOT NULL,
  `idclient` int(11) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcanton`
--

CREATE TABLE `tbcanton` (
  `idCanton` int(11) NOT NULL,
  `nameCanton` varchar(50) NOT NULL,
  `idProvince` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcanton`
--

INSERT INTO `tbcanton` (`idCanton`, `nameCanton`, `idProvince`) VALUES
(1, 'Jimenez', 3),
(2, 'Turrialba', 3),
(3, 'Desamparados', 1),
(4, 'Perez zeledon', 1),
(5, 'San Carlos', 2),
(6, 'Upala', 2),
(7, 'Barva', 4),
(8, 'Santa barbara', 4),
(9, 'Santa cruz', 5),
(10, 'Bagaces', 5),
(11, 'Golfito', 6),
(12, 'Buenos aires', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbclient`
--

CREATE TABLE `tbclient` (
  `idClient` int(11) NOT NULL,
  `nameClient` varchar(30) NOT NULL,
  `surname1Client` varchar(30) NOT NULL,
  `surname2Client` varchar(30) NOT NULL,
  `emailClient` varchar(40) NOT NULL,
  `userClient` varchar(40) NOT NULL,
  `passwordClient` varchar(40) NOT NULL,
  `addressClient` varchar(100) NOT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbclient`
--

INSERT INTO `tbclient` (`idClient`, `nameClient`, `surname1Client`, `surname2Client`, `emailClient`, `userClient`, `passwordClient`, `addressClient`, `active`) VALUES
(1, 'Gustavo', 'Najera', 'Najera', 'tavo.nn.20@hotmail.es', 'tavin', '1234', 'AltoVaras', b'1'),
(2, 'Andres', 'Najera', 'Pereira', 'tavinchi.com@gmail.com', 'AndresUser', '12345', 'Cartago3', b'1'),
(3, 'asd', 'asdx', 'asd', 'asd@gmail', 'asd', 'asd', 'sd', b'0'),
(4, 'Michael', 'Melendez', 'Mesen', 'michael.melendez@gmail.com', 'mmm', '1234', 'Juan Vinas', b'1'),
(5, 'Admin', 'Admin', 'Admin', 'admin@gamil.com', 'admin', 'admin', 'admin', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcomment`
--

CREATE TABLE `tbcomment` (
  `idComment` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `commentProduct` varchar(200) NOT NULL,
  `idClient` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcomment`
--

INSERT INTO `tbcomment` (`idComment`, `idProduct`, `commentProduct`, `idClient`, `date`) VALUES
(1, 10, 'Son las mejores computadoras Toshiba', 1, '2017-01-29'),
(2, 10, 'Son las mas baratas', 1, '2017-01-29'),
(3, 3, 'fcsafas', 1, '2017-01-30'),
(4, 10, 'fvdsfsd', 1, '2017-01-30'),
(5, 10, 'prueba', 1, '2017-01-30'),
(6, 10, 'prueba1', 1, '2017-01-30'),
(7, 10, 'prueba2', 1, '2017-01-30'),
(8, 10, 'prueba3', 1, '2017-01-30'),
(9, 10, 'prueba4', 1, '2017-01-30'),
(10, 10, 'prueba5', 1, '2017-01-30'),
(11, 1, 'prueba1', 1, '2017-01-30'),
(12, 1, 'prueba 2', 1, '2017-01-30'),
(13, 1, 'prueba 4', 1, '2017-01-31'),
(14, 0, '', 1, '2017-01-31'),
(15, 0, 'prueba', 1, '2017-01-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconcretesales`
--

CREATE TABLE `tbconcretesales` (
  `idconcretesales` int(11) NOT NULL,
  `idclient` int(11) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `idSale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbconcretesales`
--

INSERT INTO `tbconcretesales` (`idconcretesales`, `idclient`, `idproduct`, `idSale`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 1, 2),
(5, 1, 1, 3),
(6, 1, 1, 4),
(7, 1, 1, 5),
(8, 1, 3, 6),
(9, 1, 4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcustomershopping`
--

CREATE TABLE `tbcustomershopping` (
  `idSale` int(11) NOT NULL,
  `idClient` int(11) DEFAULT NULL,
  `dateSale` date NOT NULL,
  `totalSale` int(11) NOT NULL,
  `active` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcustomershopping`
--

INSERT INTO `tbcustomershopping` (`idSale`, `idClient`, `dateSale`, `totalSale`, `active`) VALUES
(1, 1, '2017-01-27', 1234567, b'0'),
(2, 2, '2017-01-27', 78787878, b'1'),
(3, 1, '2017-01-27', 44444, b'0'),
(4, 1, '2017-01-30', 1200, b'1'),
(5, 1, '2017-01-30', 1200, b'0'),
(6, 1, '2017-01-30', 1111, b'0'),
(7, 1, '2017-01-31', 23456, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdistrict`
--

CREATE TABLE `tbdistrict` (
  `idDistrict` int(11) NOT NULL,
  `nameDistrict` varchar(30) NOT NULL,
  `idCanton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbdistrict`
--

INSERT INTO `tbdistrict` (`idDistrict`, `nameDistrict`, `idCanton`) VALUES
(1, 'Juan Vinas', 1),
(2, 'La suiza', 2),
(3, 'San Miguel', 3),
(4, 'San isidro', 4),
(5, 'Ciudad quesada', 5),
(6, 'Aguas claras', 6),
(7, 'Santo domingo', 7),
(8, 'San Juan', 8),
(9, 'Tenerife', 9),
(10, 'Monte bagaces', 10),
(11, 'Golfito', 11),
(12, 'Flores', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfrecuency`
--

CREATE TABLE `tbfrecuency` (
  `idfrecuency` int(11) NOT NULL,
  `date` date NOT NULL,
  `idClient` int(11) NOT NULL,
  `participationwall` int(11) NOT NULL,
  `viewproduct` int(11) NOT NULL,
  `searchproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbfrecuency`
--

INSERT INTO `tbfrecuency` (`idfrecuency`, `date`, `idClient`, `participationwall`, `viewproduct`, `searchproduct`) VALUES
(1, '2017-01-29', 1, 3, 0, 0),
(2, '2017-01-29', 1, 2, 0, 0),
(3, '2017-01-29', 1, 0, 0, 4),
(4, '2017-01-29', 1, 0, 2, 2),
(5, '2017-01-29', 1, 3, 1, 1),
(6, '2017-01-29', 1, 4, 13, 3),
(7, '2017-01-30', 1, 6, 9, 2),
(8, '2017-01-30', 1, 2, 2, 2),
(9, '2017-01-30', 1, 0, 3, 2),
(10, '2017-01-30', 1, 3, 3, 3),
(11, '2017-01-31', 1, 0, 0, 0),
(12, '2017-02-01', 4, 0, 2, 2),
(13, '2017-02-01', 1, 0, 0, 0),
(14, '2017-02-01', 1, 0, 0, 0),
(15, '2017-02-01', 5, 0, 0, 0),
(16, '2017-02-01', 5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbimageproduct`
--

CREATE TABLE `tbimageproduct` (
  `idImage` int(11) NOT NULL,
  `pathImage` varchar(100) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbimageproduct`
--

INSERT INTO `tbimageproduct` (`idImage`, `pathImage`, `idProduct`) VALUES
(6, '../../images/59.jpg', 11),
(7, '../../images/1.jpg', 12),
(8, '../../images/Playaespadilla.jpg', 13),
(9, '../../images/15941007_2023133364389877_1554708251087100836_n.jpg', 13),
(10, '../../images/pintura.jpg', 14),
(11, '../../images/1.jpg', 15),
(26, '../../images/configuracion.PNG', 16),
(27, '../../images/p8.jpg', 1),
(28, '../../images/p81.jpg', 1),
(29, '../../images/p802.jpg', 1),
(30, '../../images/p803.jpg', 1),
(31, '../../images/p901.jpg', 5),
(32, '../../images/p902.jpeg', 5),
(33, '../../images/p903.jpg', 5),
(34, '../../images/p904.jpg', 5),
(35, '../../images/p905.jpg', 5),
(36, '../../images/iph1.jpg', 3),
(37, '../../images/iph2.jpg', 3),
(38, '../../images/iph3.jpg', 3),
(39, '../../images/iph4.jpg', 3),
(40, '../../images/lk01.jpg', 4),
(41, '../../images/lk02.jpg', 4),
(42, '../../images/lk03.jpg', 4),
(43, '../../images/lk04.jpg', 4),
(44, '../../images/s701.jpg', 2),
(45, '../../images/s702.jpg', 2),
(46, '../../images/s703.jpg', 2),
(47, '../../images/s705.jpg', 2),
(48, '../../images/tsh01.jpg', 10),
(49, '../../images/tsh02.jpg', 10),
(50, '../../images/tsh03.jpg', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tboffer`
--

CREATE TABLE `tboffer` (
  `idOffer` int(11) NOT NULL,
  `descriptionOffer` varchar(100) NOT NULL,
  `discountPercentage` int(11) NOT NULL,
  `dateStar` date NOT NULL,
  `dateEnd` date NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproduct`
--

CREATE TABLE `tbproduct` (
  `idProduct` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `idStore` int(11) NOT NULL DEFAULT '1',
  `idTypeProduct` int(11) DEFAULT NULL,
  `color` varchar(20) NOT NULL,
  `nameProduct` varchar(40) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproduct`
--

INSERT INTO `tbproduct` (`idProduct`, `brand`, `model`, `price`, `description`, `idStore`, `idTypeProduct`, `color`, `nameProduct`, `active`) VALUES
(1, 'Huawei', 'P8', 111110, 'Descripcion2', 1, 1, 'Negro', 'Celular', b'1'),
(2, 'Samsung', 'S7', 128000, 'Descripcion8', 1, 1, 'Gris', 'Celular', b'1'),
(3, 'Iphone', '6s', 300000, 'Descripcion4', 1, 1, 'Dorado', 'Celular', b'1'),
(4, 'LG', 'LG1', 300000, 'Descripcion5', 1, 1, 'verde', 'Celular', b'1'),
(5, 'Huawei', 'P9', 345000, 'Descripcion3', 1, 1, 'Negro', 'Celular', b'1'),
(10, 'Toshiba', 'satellite', 123400, 'Descripcion9', 1, 2, 'Negro', 'Computadora', b'1'),
(11, 'hhhhhhh', 'hhhhhhhh', 3456789, 'hhhhhhhhhhh', 1, 1, 'hhhhhhhhh5', 'hhhhhhh', b'0'),
(12, 'ooooi', 'ioioioiio', 787878, 'Descripcion6', 1, 1, 'Negro', 'Celular', b'0'),
(13, 'yuyuyu', 'yuyuyu', 7777, 'jhjhjjh', 1, 1, 'yuyuyu', 'yyuuy', b'0'),
(14, 'dfgfdg', 'dfgdf', 11111, 'Descripcion1', 1, 1, 'Negro', 'ggdgfd', b'0'),
(15, 'prueba', 'prueba', 11111, 'Descripcion7', 1, 1, 'prueba', 'prueba', b'0'),
(16, 'priueba', 'prueba', 2147483647, 'iuhdufiherifhue', 1, 2, 'ioejfrhuvberb', 'prueba', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductdesired`
--

CREATE TABLE `tbproductdesired` (
  `iddesired` int(11) NOT NULL,
  `idclient` int(11) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `active` bit(1) NOT NULL,
  `dateactive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproductdesired`
--

INSERT INTO `tbproductdesired` (`iddesired`, `idclient`, `idproduct`, `active`, `dateactive`) VALUES
(1, 1, 14, b'0', '2017-01-29'),
(2, 1, 10, b'1', '2017-01-30'),
(3, 1, 1, b'1', '2017-01-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbprovince`
--

CREATE TABLE `tbprovince` (
  `idProvince` int(11) NOT NULL,
  `nameProvince` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbprovince`
--

INSERT INTO `tbprovince` (`idProvince`, `nameProvince`) VALUES
(1, 'San Jose'),
(2, 'Alajuela'),
(3, 'Cartago'),
(4, 'Heredia'),
(5, 'Guanacaste'),
(6, 'Puntarenas'),
(7, 'Limon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpurchasingsupplier`
--

CREATE TABLE `tbpurchasingsupplier` (
  `idPurchases` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `datePurchases` date NOT NULL,
  `descriptionPurchases` varchar(200) NOT NULL,
  `product` varchar(100) NOT NULL,
  `totalPurchases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsearch`
--

CREATE TABLE `tbsearch` (
  `idSearch` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbsearch`
--

INSERT INTO `tbsearch` (`idSearch`, `idProduct`, `idClient`) VALUES
(1, 3, 1),
(2, 10, 1),
(3, 1, 1),
(4, 5, 1),
(5, 1, 1),
(6, 5, 1),
(7, 1, 1),
(8, 5, 1),
(9, 1, 1),
(10, 5, 1),
(11, 1, 1),
(12, 5, 1),
(13, 1, 1),
(14, 5, 1),
(15, 1, 1),
(16, 5, 1),
(17, 1, 1),
(18, 5, 1),
(19, 1, 1),
(20, 5, 1),
(21, 1, 1),
(22, 5, 1),
(23, 1, 1),
(24, 5, 1),
(25, 1, 1),
(26, 2, 1),
(27, 3, 1),
(28, 4, 1),
(29, 5, 1),
(30, 1, 1),
(31, 5, 1),
(32, 1, 1),
(33, 5, 1),
(34, 4, 1),
(35, 1, 1),
(36, 2, 1),
(37, 3, 1),
(38, 4, 1),
(39, 5, 1),
(40, 4, 1),
(41, 1, 1),
(42, 2, 1),
(43, 3, 1),
(44, 4, 1),
(45, 5, 1),
(46, 1, 1),
(47, 2, 1),
(48, 3, 1),
(49, 4, 1),
(50, 5, 1),
(51, 4, 1),
(52, 4, 1),
(53, 4, 1),
(54, 4, 1),
(55, 4, 1),
(56, 10, 1),
(57, 1, 1),
(58, 2, 1),
(59, 3, 1),
(60, 4, 1),
(61, 5, 1),
(62, 1, 1),
(63, 2, 1),
(64, 3, 1),
(65, 4, 1),
(66, 5, 1),
(67, 1, 1),
(68, 2, 1),
(69, 3, 1),
(70, 4, 1),
(71, 5, 1),
(72, 14, 1),
(73, 10, 1),
(74, 10, 1),
(75, 1, 1),
(76, 5, 1),
(77, 1, 1),
(78, 5, 1),
(79, 1, 1),
(80, 5, 1),
(81, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbstore`
--

CREATE TABLE `tbstore` (
  `idStore` int(11) NOT NULL,
  `nameStore` varchar(40) NOT NULL,
  `telephoneStore` varchar(30) NOT NULL,
  `emailStore` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbstore`
--

INSERT INTO `tbstore` (`idStore`, `nameStore`, `telephoneStore`, `emailStore`) VALUES
(1, 'MGASoluciones', '25342314', 'mgs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsupplier`
--

CREATE TABLE `tbsupplier` (
  `idSupplier` int(11) NOT NULL,
  `nameSupplier` varchar(40) NOT NULL,
  `emailSupplier` varchar(100) NOT NULL,
  `telephonoSupplier` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsuppliertypeproduct`
--

CREATE TABLE `tbsuppliertypeproduct` (
  `idTypeProduct` int(11) NOT NULL,
  `idSupplierty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsupplierxproduct`
--

CREATE TABLE `tbsupplierxproduct` (
  `idSupplierty` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtypeproduct`
--

CREATE TABLE `tbtypeproduct` (
  `idTypeProduct` int(11) NOT NULL,
  `nameTypeProduct` varchar(100) NOT NULL,
  `active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtypeproduct`
--

INSERT INTO `tbtypeproduct` (`idTypeProduct`, `nameTypeProduct`, `active`) VALUES
(1, 'Celulares', b'1'),
(2, 'Computadoras', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbaccount`
--
ALTER TABLE `tbaccount`
  ADD PRIMARY KEY (`idAccount`),
  ADD UNIQUE KEY `idAccount` (`idAccount`),
  ADD KEY `idClient` (`idClient`);

--
-- Indices de la tabla `tbadministrator`
--
ALTER TABLE `tbadministrator`
  ADD PRIMARY KEY (`idAdministrator`),
  ADD UNIQUE KEY `idAdministrator` (`idAdministrator`),
  ADD KEY `idTienda` (`idStore`);

--
-- Indices de la tabla `tbcanceledsales`
--
ALTER TABLE `tbcanceledsales`
  ADD PRIMARY KEY (`idcanceledsales`),
  ADD KEY `idclient` (`idclient`),
  ADD KEY `idproduct` (`idproduct`);

--
-- Indices de la tabla `tbcanton`
--
ALTER TABLE `tbcanton`
  ADD PRIMARY KEY (`idCanton`),
  ADD KEY `idProvince` (`idProvince`);

--
-- Indices de la tabla `tbclient`
--
ALTER TABLE `tbclient`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `idClient` (`idClient`);

--
-- Indices de la tabla `tbcomment`
--
ALTER TABLE `tbcomment`
  ADD PRIMARY KEY (`idComment`);

--
-- Indices de la tabla `tbconcretesales`
--
ALTER TABLE `tbconcretesales`
  ADD PRIMARY KEY (`idconcretesales`),
  ADD KEY `idclient` (`idclient`),
  ADD KEY `idproduct` (`idproduct`),
  ADD KEY `FK_CS` (`idSale`);

--
-- Indices de la tabla `tbcustomershopping`
--
ALTER TABLE `tbcustomershopping`
  ADD PRIMARY KEY (`idSale`);

--
-- Indices de la tabla `tbdistrict`
--
ALTER TABLE `tbdistrict`
  ADD PRIMARY KEY (`idDistrict`),
  ADD KEY `idCanton` (`idCanton`);

--
-- Indices de la tabla `tbfrecuency`
--
ALTER TABLE `tbfrecuency`
  ADD PRIMARY KEY (`idfrecuency`);

--
-- Indices de la tabla `tbimageproduct`
--
ALTER TABLE `tbimageproduct`
  ADD PRIMARY KEY (`idImage`),
  ADD UNIQUE KEY `idImage` (`idImage`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indices de la tabla `tboffer`
--
ALTER TABLE `tboffer`
  ADD PRIMARY KEY (`idOffer`),
  ADD UNIQUE KEY `idOffer` (`idOffer`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indices de la tabla `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idStore` (`idStore`),
  ADD KEY `tbproduct_ibfk_2` (`idTypeProduct`);

--
-- Indices de la tabla `tbproductdesired`
--
ALTER TABLE `tbproductdesired`
  ADD PRIMARY KEY (`iddesired`),
  ADD KEY `idclient` (`idclient`),
  ADD KEY `idproduct` (`idproduct`);

--
-- Indices de la tabla `tbprovince`
--
ALTER TABLE `tbprovince`
  ADD PRIMARY KEY (`idProvince`),
  ADD UNIQUE KEY `idProvince` (`idProvince`);

--
-- Indices de la tabla `tbpurchasingsupplier`
--
ALTER TABLE `tbpurchasingsupplier`
  ADD PRIMARY KEY (`idPurchases`);

--
-- Indices de la tabla `tbsearch`
--
ALTER TABLE `tbsearch`
  ADD PRIMARY KEY (`idSearch`),
  ADD KEY `fKSearch` (`idProduct`),
  ADD KEY `fKClient` (`idClient`);

--
-- Indices de la tabla `tbstore`
--
ALTER TABLE `tbstore`
  ADD PRIMARY KEY (`idStore`),
  ADD UNIQUE KEY `idStore` (`idStore`);

--
-- Indices de la tabla `tbsupplier`
--
ALTER TABLE `tbsupplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indices de la tabla `tbsuppliertypeproduct`
--
ALTER TABLE `tbsuppliertypeproduct`
  ADD PRIMARY KEY (`idTypeProduct`,`idSupplierty`);

--
-- Indices de la tabla `tbsupplierxproduct`
--
ALTER TABLE `tbsupplierxproduct`
  ADD PRIMARY KEY (`idSupplierty`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indices de la tabla `tbtypeproduct`
--
ALTER TABLE `tbtypeproduct`
  ADD PRIMARY KEY (`idTypeProduct`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbaccount`
--
ALTER TABLE `tbaccount`
  ADD CONSTRAINT `tbaccount_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `tbclient` (`idClient`);

--
-- Filtros para la tabla `tbadministrator`
--
ALTER TABLE `tbadministrator`
  ADD CONSTRAINT `tbadministrator_ibfk_1` FOREIGN KEY (`idStore`) REFERENCES `tbstore` (`idStore`);

--
-- Filtros para la tabla `tbcanceledsales`
--
ALTER TABLE `tbcanceledsales`
  ADD CONSTRAINT `tbcanceledsales_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tbclient` (`idClient`),
  ADD CONSTRAINT `tbcanceledsales_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Filtros para la tabla `tbcanton`
--
ALTER TABLE `tbcanton`
  ADD CONSTRAINT `tbcanton_ibfk_1` FOREIGN KEY (`idProvince`) REFERENCES `tbprovince` (`idProvince`);

--
-- Filtros para la tabla `tbconcretesales`
--
ALTER TABLE `tbconcretesales`
  ADD CONSTRAINT `FK_CS` FOREIGN KEY (`idSale`) REFERENCES `tbcustomershopping` (`idSale`),
  ADD CONSTRAINT `tbconcretesales_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tbclient` (`idClient`),
  ADD CONSTRAINT `tbconcretesales_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Filtros para la tabla `tbdistrict`
--
ALTER TABLE `tbdistrict`
  ADD CONSTRAINT `tbdistrict_ibfk_1` FOREIGN KEY (`idCanton`) REFERENCES `tbcanton` (`idCanton`);

--
-- Filtros para la tabla `tbimageproduct`
--
ALTER TABLE `tbimageproduct`
  ADD CONSTRAINT `tbimageproduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Filtros para la tabla `tboffer`
--
ALTER TABLE `tboffer`
  ADD CONSTRAINT `tboffer_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Filtros para la tabla `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD CONSTRAINT `tbproduct_ibfk_1` FOREIGN KEY (`idStore`) REFERENCES `tbstore` (`idStore`),
  ADD CONSTRAINT `tbproduct_ibfk_2` FOREIGN KEY (`idTypeProduct`) REFERENCES `tbtypeproduct` (`idTypeProduct`);

--
-- Filtros para la tabla `tbproductdesired`
--
ALTER TABLE `tbproductdesired`
  ADD CONSTRAINT `tbproductdesired_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `tbclient` (`idClient`),
  ADD CONSTRAINT `tbproductdesired_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `tbproduct` (`idProduct`);

--
-- Filtros para la tabla `tbsearch`
--
ALTER TABLE `tbsearch`
  ADD CONSTRAINT `fKsearchClient` FOREIGN KEY (`idClient`) REFERENCES `tbclient` (`idClient`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fKsearchProduct` FOREIGN KEY (`idProduct`) REFERENCES `tbproduct` (`idProduct`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbsupplierxproduct`
--
ALTER TABLE `tbsupplierxproduct`
  ADD CONSTRAINT `tbsupplierxproduct_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `tbproduct` (`idProduct`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
