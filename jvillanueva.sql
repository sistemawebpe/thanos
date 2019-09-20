-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2019 a las 03:43:29
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jvillanueva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `transaccion` text NOT NULL,
  `trace` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `telefono` int(10) NOT NULL,
  `paquete` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `total` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upc_distrito`
--

CREATE TABLE `upc_distrito` (
  `codDistrito` int(5) NOT NULL,
  `NomDistrito` varchar(100) DEFAULT NULL,
  `Estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `upc_distrito`
--

INSERT INTO `upc_distrito` (`codDistrito`, `NomDistrito`, `Estado`) VALUES
(1, 'Cercado', 'A'),
(2, 'Ancón', 'A'),
(3, 'Ate Vitarte', 'A'),
(4, 'Barranco', 'A'),
(5, 'Breña', 'A'),
(6, 'Carabayllo', 'A'),
(7, 'Comas', 'A'),
(8, 'Chaclacayo', 'A'),
(9, 'Chorrillos', 'A'),
(10, 'El Agustino', 'A'),
(11, 'Jesús María', 'A'),
(12, 'La Molina', 'A'),
(13, 'La Victoria', 'A'),
(14, 'Lince', 'A'),
(15, 'Lurigancho (Chosica)', 'A'),
(16, 'Lurín', 'A'),
(17, 'Magdalena del Mar', 'A'),
(18, 'Miraflores', 'A'),
(19, 'Pachacamac', 'A'),
(20, 'Pucusana', 'A'),
(21, 'Pueblo Libre', 'A'),
(22, 'Puente Piedra', 'A'),
(23, 'Punta Negra', 'A'),
(24, 'Callao', 'A'),
(25, 'Bellavista', 'A'),
(26, 'Carmen de La Legua', 'A'),
(27, 'La Perla', 'A'),
(28, 'La Punta', 'A'),
(29, 'Ventanilla', 'A'),
(30, 'Punta Hermosa', 'A'),
(31, 'Rímac', 'A'),
(32, 'San Bartolo', 'A'),
(33, 'San Isidro', 'A'),
(34, 'Independencia', 'A'),
(35, 'San Juan de Miraflores', 'A'),
(36, 'San Luis', 'A'),
(37, 'San Martín de Porres', 'A'),
(38, 'San Miguel', 'A'),
(39, 'Santiago de Surco', 'A'),
(40, 'Surquillo', 'A'),
(41, 'Villa María del Triunfo', 'A'),
(42, 'San Juan de Lurigancho', 'A'),
(43, 'Santa María del Mar', 'A'),
(44, 'Santa Rosa', 'A'),
(45, 'Los Olivos', 'A'),
(46, 'Cieneguilla', 'A'),
(47, 'San Borja', 'A'),
(48, 'Villa El Salvador', 'A'),
(49, 'Santa Anita', 'A'),
(50, 'Ricardo Palma', 'A'),
(51, 'Santa Eulalia', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upc_estaciones`
--

CREATE TABLE `upc_estaciones` (
  `idEstacion` int(11) NOT NULL,
  `codDistrito` int(5) NOT NULL,
  `NomEstacion` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(150) NOT NULL,
  `gas84plus` float(5,2) NOT NULL,
  `gas90plus` float(5,2) NOT NULL,
  `gas95plus` float(5,2) NOT NULL,
  `gas97plus` float(5,2) NOT NULL,
  `gas98plus` float(5,2) NOT NULL,
  `dbs_s50_uv` float(5,2) NOT NULL,
  `Estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `upc_estaciones`
--

INSERT INTO `upc_estaciones` (`idEstacion`, `codDistrito`, `NomEstacion`, `Direccion`, `Telefono`, `gas84plus`, `gas90plus`, `gas95plus`, `gas97plus`, `gas98plus`, `dbs_s50_uv`, `Estado`) VALUES
(2, 1, 'SERVICENTRO ALASPE S.A - COOP DE SERV ESP ALAS PER', 'ESQ. DE LA AV. VENEZUELA Nº 3343 CON JR. ARISTIDES DEL CARPIO, URB. INDUSTRIAL PALOMINO', '15640120', 10.20, 11.59, 13.91, 16.65, 18.71, 21.15, 'A'),
(3, 1, 'VAL TRADING S.A.C.', 'AV. SEBASTIAN LORENTE N° 698', '13280381', 10.59, 11.74, 14.02, 16.97, 19.16, 21.43, 'A'),
(5, 1, 'GRIFOSA SAC LIMA', 'AV. OSCAR R. BENAVIDES NO. 2398', '013368593/013368590/ 994602463/964224245', 10.23, 11.95, 14.22, 16.86, 19.51, 21.69, 'A'),
(6, 1, 'ESTACION DE SERVICIO NIAGARA S.R.L.', 'JR. ELVIRA GARCIA Y GARCIA Nº 2790, 2794, 2796.', '15646973', 10.28, 11.99, 14.69, 17.25, 19.42, 21.44, 'A'),
(7, 1, 'ENERGIGAS', 'AV. REPUBLICA DE ARGENTINA N° 1830 - 1858, ESQUINA CON AV. NICOLAS DUEÑAS', '012033001/981029008', 10.90, 12.01, 14.05, 16.67, 19.55, 22.30, 'A'),
(8, 1, 'TERPEL PERU S.A.C.', 'AV. NICOLAS DUEÑAS Nº 308 - 310 ESQ. CON AV. ENRIQUE MEIGGS', '13365071', 10.05, 12.02, 14.81, 17.23, 19.50, 22.28, 'A'),
(9, 1, 'TERPEL PERU S.A.C.', 'AV. PETIT THOUARS N° 1148, URB. SANTA. BEATRIZ', '014718878/014715948', 10.47, 12.05, 14.26, 16.34, 18.94, 21.13, 'A'),
(10, 1, 'PROCESADORA Y OPERADORA DE COMBUSTIBLES DEL PERU S', 'AV. MARISCAL OSCAR R. BENAVIDES N° 1623 - 1657', '013370795/013370795', 10.98, 12.09, 14.71, 17.41, 19.89, 22.69, 'A'),
(11, 1, 'BEMCHO S.A.C.', 'CALLE SARGENTO VILLAR N° 308, 316, 318. ESQ. CON AV. PETIT THOUARS - URB. SANTA BEATRIZ', '12658019', 11.08, 12.15, 14.38, 16.49, 18.56, 20.90, 'A'),
(12, 1, 'GRIFOS ESPINOZA S.A.', 'AV. AREQUIPA Nº 908, ESQUINA CON JR. EMILIO FERNANDEZ - URB. SANTA BEATRIZ', '17080700', 10.40, 12.19, 15.08, 17.44, 19.93, 22.43, 'A'),
(13, 1, 'PERUANA DE ESTACIONES DE SERVICIOS S.A.C.', 'AV. OSCAR R. BENAVIDES N° 1380', '014114600/996607247', 10.96, 12.29, 14.39, 16.94, 19.21, 22.20, 'A'),
(14, 1, 'EXPLORIUM S.A.C.', 'AV. VENEZUELA N° 1829 INTERSECCION AV. TINGO MARIA', '13375123', 10.37, 12.32, 14.47, 16.73, 19.68, 22.45, 'A'),
(15, 1, 'ENERGIGAS SAC', 'AV. VENEZUELA N° 2180 ESQ. CON EL JR. YUNGAY', '012033000/994254268', 11.31, 12.32, 14.81, 17.67, 20.35, 22.50, 'A'),
(16, 1, 'REPSOL COMERCIAL S.A.C.', 'AV. NICOLAS DUEÑAS N° 606, 610, 616 (ANTES AV. NICOLAS DUEÑAS N° 590. CDRA 17 DE LA AV. ARGENTINA)', '13368395', 10.79, 12.35, 15.23, 17.52, 20.32, 23.20, 'A'),
(17, 1, 'COESTI S.A.', 'AV. GRAU N° 1308 ESQ JR. HUANUCO Nª 1101', '12342322', 10.95, 12.49, 15.22, 17.52, 20.20, 22.56, 'A'),
(18, 1, 'COESTI S.A.', 'AV. TINGO MARIA N° 1172-1194, ESQ. CON RAUL PORRAS BARRENECHEA', '015742750/015742727', 10.92, 12.59, 14.84, 16.89, 19.03, 21.91, 'A'),
(19, 1, 'REPSOL COMERCIAL S.A.C.', 'AV. TINGO MARIA N° 994, ESQUINA CON AV. REPUBLICA DE VENEZUELA N° 1820', '012157530/012156225', 11.55, 12.59, 14.89, 17.48, 19.79, 22.06, 'A'),
(20, 1, 'FORMAS METALICAS S.A.', 'AV. ARGENTINA Nº 915', '13305724', 11.58, 12.60, 15.19, 17.96, 20.58, 22.78, 'A'),
(21, 1, 'PERUANA DE ESTACIONES DE SERVICIOS S.A.C.', 'AV. COLONIAL N° 300 (ANTES AV. OSCAR R. BENAVIDES) ESQUINA CON JR. ASCOPE', '014114600/996607247', 11.57, 12.69, 14.92, 17.28, 19.46, 21.68, 'A'),
(22, 1, 'COESTI S.A.', 'AV. MARISCAL OSCAR R. BENAVIDES Nº 871 (ANTES: AV. COLONIAL ESQ. AV. TINGO MARIA)', '012033100/012249693', 11.01, 12.69, 15.02, 17.40, 19.88, 22.05, 'A'),
(23, 1, 'REPSOL COMERCIAL S.A.C.', 'AV. COLONIAL N° 1817 - 1821', '012157530/012156225', 11.59, 12.75, 15.74, 17.89, 20.17, 23.05, 'A'),
(24, 14, 'REPSOL COMERCIAL S.A.C.', 'AV. UNIVERSITARIA SUR N° 546, CON FRENTE CALLE MATERIALES N° 156', '012157530/012156225', 11.05, 12.75, 15.60, 18.19, 21.02, 23.93, 'A'),
(25, 14, 'APOLLOS MARKET S.A.C.', 'AV. PROLONGACION IQUITOS CDRA. 25 S/N.', '012225795/999941175', 15.69, 12.75, 15.20, 17.67, 20.42, 23.37, 'A'),
(26, 14, 'AVS ASOCIADOS S.A.C.', 'AV. ARENALES Nº 1700', '014727783/014727783', 15.95, 12.75, 14.87, 17.73, 19.83, 21.96, 'A'),
(27, 14, 'PERUANA DE ESTACIONES DE SERVICIOS S.A.C.', 'AV. AREQUIPA N° 1890 ESQUINA CON AV. JOSE PARDO DE ZELA', '014114600/996607247', 15.99, 12.75, 14.89, 17.17, 19.89, 22.59, 'A'),
(28, 14, 'COESTI S.A.', 'AV. ARENALES N° 2100', '012640035/996067486', 16.69, 12.75, 15.67, 18.59, 21.21, 23.57, 'A'),
(29, 14, 'COESTI S.A.', 'AV. CESAR CANEVARO Nº 1598', '12033100', 17.29, 12.75, 15.12, 17.61, 20.31, 22.91, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upc_login`
--

CREATE TABLE `upc_login` (
  `idUser` int(11) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Estado` char(1) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `upc_login`
--

INSERT INTO `upc_login` (`idUser`, `User`, `Clave`, `Nombre`, `Estado`, `fecha`) VALUES
(1, 'jvilla', 'jvilla', 'Jesus Villanueva', 'A', '2019-08-18 02:14:33'),
(1, 'pmina', '', 'Percy Minalaya', 'A', '0000-00-00 00:00:00'),
(2, 'Fernando', '', 'Fernando Lopez', 'D', '0000-00-00 00:00:00'),
(2, 'jviza', '', 'Julio Vizarreta', 'A', '2019-08-18 02:14:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `upc_distrito`
--
ALTER TABLE `upc_distrito`
  ADD PRIMARY KEY (`codDistrito`);

--
-- Indices de la tabla `upc_estaciones`
--
ALTER TABLE `upc_estaciones`
  ADD PRIMARY KEY (`idEstacion`);

--
-- Indices de la tabla `upc_login`
--
ALTER TABLE `upc_login`
  ADD PRIMARY KEY (`idUser`,`User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `upc_estaciones`
--
ALTER TABLE `upc_estaciones`
  MODIFY `idEstacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `upc_login`
--
ALTER TABLE `upc_login`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
