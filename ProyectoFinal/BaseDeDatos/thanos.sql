/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - thanos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`thanos` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `thanos`;

/*Table structure for table `pago` */

DROP TABLE IF EXISTS `pago`;

CREATE TABLE `pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaccion` text NOT NULL,
  `trace` text NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pago` */

/*Table structure for table `publicidad` */

DROP TABLE IF EXISTS `publicidad`;

CREATE TABLE `publicidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `telefono` int(10) NOT NULL,
  `paquete` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `total` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `publicidad` */

/*Table structure for table `upc_datacliente` */

DROP TABLE IF EXISTS `upc_datacliente`;

CREATE TABLE `upc_datacliente` (
  `id_cliente` int(50) NOT NULL AUTO_INCREMENT,
  `nombCliente` varchar(50) NOT NULL,
  `apell_Cliente` varchar(50) NOT NULL,
  `correo_cliente` varchar(50) NOT NULL,
  `telef_cliente` int(50) NOT NULL,
  `pass_cliente` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `upc_datacliente` */

insert  into `upc_datacliente`(`id_cliente`,`nombCliente`,`apell_Cliente`,`correo_cliente`,`telef_cliente`,`pass_cliente`) values 
(1,'Jose ','Hernández Hernández','jose@gmail.com',911324221,'81dc9bdb52d04dc20036dbd8313ed055'),
(2,'María','García García','maria@gmail.com',923112345,'81dc9bdb52d04dc20036dbd8313ed055'),
(3,'Juan Miguel','ABDO FRANCIS','juanmiguel@gmail.com',921133487,'81dc9bdb52d04dc20036dbd8313ed055'),
(4,'Carlos Alberto','Aguilar Encinas','carlosalberto@gmail.com',912345287,'81dc9bdb52d04dc20036dbd8313ed055'),
(5,'Hector Gerardo','Aguirre Gas','hectorgerardo@gmail.com',984457382,'81dc9bdb52d04dc20036dbd8313ed055'),
(6,'Jose Arturo','Berlanga Cisneros','josearturo@gmail.com',900123112,'f379eaf3c831b04de153469d1bec345e'),
(7,'Jaime','Favela Blanco','jaime@gmail.com',908788621,'f63f4fbc9f8c85d409f2f59f2b9e12d5'),
(8,'Rafael','Aburto Borja','rafael@gmail.com',987782123,'21218cca77804d2ba1922c33e0151105'),
(9,'Gabriela','Sanchez Borrayo','gabriela@gmail.com',998217654,'52c69e3a57331081823331c4e69d3f2e'),
(10,'Victor Hugo','Campos Berumen','victor@gmail.com',999212121,'81dc9bdb52d04dc20036dbd8313ed055');

/*Table structure for table `upc_dataempresa` */

DROP TABLE IF EXISTS `upc_dataempresa`;

CREATE TABLE `upc_dataempresa` (
  `id_Empresa` int(50) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(50) NOT NULL,
  `ruc_empresa` int(50) NOT NULL,
  `direc_empresa` varchar(50) NOT NULL,
  `email_empresa` varchar(50) NOT NULL,
  `telf_empresa` int(50) NOT NULL,
  `nombDepartamento` varchar(50) NOT NULL,
  `nombProvincia` varchar(50) NOT NULL,
  `nombDistrito` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `upc_dataempresa` */

insert  into `upc_dataempresa`(`id_Empresa`,`razon_social`,`ruc_empresa`,`direc_empresa`,`email_empresa`,`telf_empresa`,`nombDepartamento`,`nombProvincia`,`nombDistrito`,`contraseña`) values 
(1,'hola',2147483640,'AV. AREQUIPA Nº 908, ESQUINA CON JR. EMILIO FERNAN','espinoza@gmail.com',17080700,'Lima','Lima','Jesus maria','111111'),
(2,'S.A.C',2147483647,'AV. SEBASTIAN LORENTE N° 698','valtrading@gmail.com',13280381,'Lima','Lima','Cercado','222222'),
(3,'S.A.C',2147483647,'AV. OSCAR R. BENAVIDES NO. 2398','grifosa@gmail.com',13368593,'Lima','Lima','Cercado','333333'),
(4,'S.R.L',2147483647,'JR. ELVIRA GARCIA Y GARCIA Nº 2790, 2794, 2796.','nigara@gmail.com',15646973,'Lima','Lima','Cercado','444444'),
(5,'S.A.C',2147483647,'AV. REPUBLICA DE ARGENTINA N° 1830 - 1858, ESQUINA','energicas@gmail.com',981029008,'Lima','Lima','Cercado','555555'),
(6,'S.A.C',2147483647,'AV. NICOLAS DUEÑAS Nº 308 - 310 ESQ. CON AV. ENRIQ','terpel1@gmail.com',13365071,'Lima','Lima','Cercado','666666'),
(7,'S.A.C',2147483647,'AV. PETIT THOUARS N° 1148, URB. SANTA. BEATRIZ','terpel2@gmail.com',14715948,'Lima','Lima','Cercado','777777'),
(8,'S.A.C',2147483647,'AV. MARISCAL OSCAR R. BENAVIDES N° 1623 - 1657','procers@gmail.com',13370795,'Lima','Lima','Cercado','888888'),
(9,'S.A.C',2147483647,'CALLE SARGENTO VILLAR N° 308, 316, 318. ESQ. CON A','bencho@gmail.com',12658019,'Lima','Lima','Cercado','999999'),
(10,'S.A.C',2147483647,'AV. AREQUIPA Nº 908, ESQUINA CON JR. EMILIO FERNAN','espinoza@gmail.com',17080700,'Lima','Lima','Cercado','111112');

/*Table structure for table `upc_distrito` */

DROP TABLE IF EXISTS `upc_distrito`;

CREATE TABLE `upc_distrito` (
  `codDistrito` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `NomDistrito` varchar(100) NOT NULL,
  `Estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`codDistrito`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `upc_distrito` */

insert  into `upc_distrito`(`codDistrito`,`NomDistrito`,`Estado`) values 
(1,'Cercado de Lima','A'),
(2,'Ancón','A'),
(3,'Ate Vitarte','A'),
(4,'Barranco','A'),
(5,'Breña','A'),
(6,'Carabayllo','A'),
(7,'Comas','A'),
(8,'Chaclacayo','A'),
(9,'Chorrillos','A'),
(10,'El Agustino','A'),
(11,'Jesús María','A'),
(12,'La Molina','A'),
(13,'La Victoria','A'),
(14,'Lince','A'),
(15,'Lurigancho (Chosica)','A'),
(16,'Lurín','A'),
(17,'Magdalena del Mar','A'),
(18,'Miraflores','A'),
(19,'Pachacamac','A'),
(20,'Pucusana','A'),
(21,'Pueblo Libre','A'),
(22,'Puente Piedra','A'),
(23,'Punta Negra','A'),
(24,'Callao','A'),
(25,'Bellavista','A'),
(26,'Carmen de La Legua','A'),
(27,'La Perla','A'),
(28,'La Punta','A'),
(29,'Ventanilla','A'),
(30,'Punta Hermosa','A'),
(31,'Rímac','A'),
(32,'San Bartolo','A'),
(33,'San Isidro','A'),
(34,'Independencia','A'),
(35,'San Juan de Miraflores','A'),
(36,'San Luis','A'),
(37,'San Martín de Porres','A'),
(38,'San Miguel','A'),
(39,'Santiago de Surco','A'),
(40,'Surquillo','A'),
(41,'Villa María del Triunfo','A'),
(42,'San Juan de Lurigancho','A'),
(43,'Santa María del Mar','A'),
(44,'Santa Rosa','A'),
(45,'Los Olivos','A'),
(46,'Cieneguilla','A'),
(47,'San Borja','A'),
(48,'Villa El Salvador','A'),
(49,'Santa Anita','A'),
(50,'Ricardo Palma','A'),
(51,'Santa Eulalia','A'),
(55,'PuertoRico','A');

/*Table structure for table `upc_estaciones` */

DROP TABLE IF EXISTS `upc_estaciones`;

CREATE TABLE `upc_estaciones` (
  `idEstacion` int(11) NOT NULL AUTO_INCREMENT,
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
  `Estado` char(1) NOT NULL,
  `FechaUltMov` datetime NOT NULL,
  PRIMARY KEY (`idEstacion`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `upc_estaciones` */

insert  into `upc_estaciones`(`idEstacion`,`codDistrito`,`NomEstacion`,`Direccion`,`Telefono`,`gas84plus`,`gas90plus`,`gas95plus`,`gas97plus`,`gas98plus`,`dbs_s50_uv`,`Estado`,`FechaUltMov`) values 
(1,7,'GASOLINERAS KING S.A.C.','AV. 28 DE JULIO 159. ESQUINA CON AV. BRASIL','013261961/013261238',84.00,90.00,95.00,97.00,98.00,50.00,'A','0000-00-00 00:00:00'),
(2,1,'SERVICENTRO ALASPE S.A - COOP DE SERV ESP ALAS PER','ESQ. DE LA AV. VENEZUELA Nº 3343 ','015640120',84.00,11.59,13.91,16.65,18.71,21.15,'D','0000-00-00 00:00:00'),
(3,1,'VAL TRADING S.A.C.','AV. SEBASTIAN LORENTE N° 698','13280381',10.59,11.74,14.02,16.97,19.16,21.00,'D','0000-00-00 00:00:00'),
(4,1,'SERVICENTRO SHALOM SAC','AV. NACIONES UNIDAS 1222. ESQUINA CON JR. ALEMANIA','14256428',0.00,11.75,14.56,17.03,0.00,12.00,'D','0000-00-00 00:00:00'),
(5,1,'GRIFOSA SAC LIMA','AV. OSCAR R. BENAVIDES NO. 2398','013368593/013368590/ 994602463/964224245',0.00,0.00,0.00,0.00,0.00,12.00,'D','0000-00-00 00:00:00'),
(6,1,'ESTACION DE SERVICIO NIAGARA S.R.L.','JR. ELVIRA GARCIA Y GARCIA Nº 2790, 2794, 2796.','15646973',10.28,11.99,14.69,17.25,19.42,21.44,'D','0000-00-00 00:00:00'),
(7,1,'ENERGIGAS SAC','AV. REPUBLICA DE ARGENTINA N° 1830 - 1858, ESQUINA CON AV. NICOLAS DUEÑAS','012033001/981029008',10.90,12.01,14.05,16.67,19.55,22.30,'D','0000-00-00 00:00:00'),
(8,1,'TERPEL PERU S.A.C.','AV. NICOLAS DUEÑAS Nº 308 - 310 ESQ. CON AV. ENRIQUE MEIGGS','13365071',10.05,12.02,14.81,17.23,19.50,22.28,'D','0000-00-00 00:00:00'),
(9,1,'TERPEL PERU S.A.C.','AV. PETIT THOUARS N° 1148, URB. SANTA. BEATRIZ','014718878/014715948',10.47,12.05,14.26,16.34,18.94,21.13,'A','0000-00-00 00:00:00'),
(10,1,'PROCESADORA Y OPERADORA DE COMBUSTIBLES DEL PERU S','AV. MARISCAL OSCAR R. BENAVIDES N° 1623 - 1657','013370795/013370795',10.98,12.09,14.71,17.41,19.89,22.69,'A','0000-00-00 00:00:00'),
(11,1,'BEMCHO S.A.C.','CALLE SARGENTO VILLAR N° 308, 316, 318. ESQ. CON AV. PETIT THOUARS - URB. SANTA BEATRIZ','12658019',11.08,12.15,14.38,16.49,18.56,20.90,'A','0000-00-00 00:00:00'),
(12,1,'GRIFOS ESPINOZA S.A.','AV. AREQUIPA Nº 908, ESQUINA CON JR. EMILIO FERNANDEZ - URB. SANTA BEATRIZ','17080700',10.40,12.19,15.08,17.44,19.93,22.43,'A','0000-00-00 00:00:00'),
(13,1,'PERUANA DE ESTACIONES DE SERVICIOS S.A.C.','AV. OSCAR R. BENAVIDES N° 1380','014114600/996607247',10.96,12.29,14.39,16.94,19.21,22.20,'A','0000-00-00 00:00:00'),
(14,1,'EXPLORIUM S.A.C.','AV. VENEZUELA N° 1829 INTERSECCION AV. TINGO MARIA','13375123',10.37,12.32,14.47,16.73,19.68,22.45,'A','0000-00-00 00:00:00'),
(15,1,'ENERGIGAS SAC','AV. VENEZUELA N° 2180 ESQ. CON EL JR. YUNGAY','012033000/994254268',11.31,12.32,14.81,17.67,20.35,22.50,'A','0000-00-00 00:00:00'),
(16,1,'REPSOL COMERCIAL S.A.C.','AV. NICOLAS DUEÑAS N° 606, 610, 616 (ANTES AV. NICOLAS DUEÑAS N° 590. CDRA 17 DE LA AV. ARGENTINA)','13368395',10.79,12.35,15.23,17.52,20.32,23.20,'A','0000-00-00 00:00:00'),
(17,1,'COESTI S.A.','AV. GRAU N° 1308 ESQ JR. HUANUCO Nª 1101','12342322',10.95,12.49,15.22,17.52,20.20,22.56,'A','0000-00-00 00:00:00'),
(18,1,'COESTI S.A.','AV. TINGO MARIA N° 1172-1194, ESQ. CON RAUL PORRAS BARRENECHEA','015742750/015742727',10.92,12.59,14.84,16.89,19.03,21.91,'A','0000-00-00 00:00:00'),
(19,1,'REPSOL COMERCIAL S.A.C.','AV. TINGO MARIA N° 994, ESQUINA CON AV. REPUBLICA DE VENEZUELA N° 1820','012157530/012156225',11.55,12.59,14.89,17.48,19.79,22.06,'A','0000-00-00 00:00:00'),
(20,1,'FORMAS METALICAS S.A.','AV. ARGENTINA Nº 915','13305724',11.58,12.60,15.19,17.96,20.58,22.78,'A','0000-00-00 00:00:00'),
(21,1,'PERUANA DE ESTACIONES DE SERVICIOS S.A.C.','AV. COLONIAL N° 300 (ANTES AV. OSCAR R. BENAVIDES) ESQUINA CON JR. ASCOPE','014114600/996607247',11.57,12.69,14.92,17.28,19.46,21.68,'A','0000-00-00 00:00:00'),
(22,1,'COESTI S.A.','AV. MARISCAL OSCAR R. BENAVIDES Nº 871 (ANTES: AV. COLONIAL ESQ. AV. TINGO MARIA)','012033100/012249693',11.01,12.69,15.02,17.40,19.88,22.05,'A','0000-00-00 00:00:00'),
(23,2,'REPSOL COMERCIAL S.A.C.','AV. COLONIAL N° 1817 - 1821','012157530/012156225',11.59,12.75,15.74,17.89,20.17,10.12,'A','0000-00-00 00:00:00'),
(24,14,'REPSOL COMERCIAL S.A.C.','AV. UNIVERSITARIA SUR N° 546, CON FRENTE CALLE MATERIALES N° 156','012157530/012156225',11.05,12.75,15.60,18.19,21.02,23.93,'A','0000-00-00 00:00:00'),
(25,14,'APOLLOS MARKET S.A.C.','AV. PROLONGACION IQUITOS CDRA. 25 S/N.','012225795/999941175',15.69,12.75,15.20,17.67,20.42,23.37,'A','0000-00-00 00:00:00'),
(26,14,'AVS ASOCIADOS S.A.C.','AV. ARENALES Nº 1700','014727783/014727783',15.95,12.75,14.87,17.73,19.83,21.96,'A','0000-00-00 00:00:00'),
(27,14,'PERUANA DE ESTACIONES DE SERVICIOS S.A.C.','AV. AREQUIPA N° 1890 ESQUINA CON AV. JOSE PARDO DE ZELA','014114600/996607247',15.99,12.75,14.89,17.17,19.89,22.59,'A','0000-00-00 00:00:00'),
(28,14,'COESTI S.A.','AV. ARENALES N° 2100','012640035/996067486',16.69,12.75,15.67,18.59,21.21,23.57,'A','0000-00-00 00:00:00'),
(29,14,'COESTI S.A.','AV. CESAR CANEVARO Nº 1598','12033100',17.29,12.75,15.12,17.61,20.31,22.91,'A','0000-00-00 00:00:00'),
(54,6,'Lima Sur S.A.A','Av. Lima 2343','998654352',12.43,14.32,15.21,15.99,16.12,17.00,'A','0000-00-00 00:00:00'),
(55,16,'Malibu S.A.A','Av. Malibu 123','99961221',12.00,12.43,12.00,12.00,12.20,12.00,'A','0000-00-00 00:00:00'),
(56,8,'Carla','Av. resouce 1212','998212132',12.12,12.12,12.30,12.13,12.34,12.11,'A','0000-00-00 00:00:00'),
(57,2,'Tania Grif','Maria','996615073',12.12,12.23,32.12,42.12,123.12,12.12,'A','0000-00-00 00:00:00'),
(58,8,'yuyu','AV.DFFFF 345','9996765434',12.00,23.00,23.00,34.00,34.00,0.00,'A','0000-00-00 00:00:00'),
(59,3,'Floresta','Av. Maria torres 234','996615073',12.12,14.12,16.12,17.19,20.20,11.12,'A','0000-00-00 00:00:00'),
(60,4,'Rosas','Av. La Mar 1232','51996615073',11.12,12.33,14.22,15.12,16.12,12.34,'A','0000-00-00 00:00:00');

/*Table structure for table `upc_login` */

DROP TABLE IF EXISTS `upc_login`;

CREATE TABLE `upc_login` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `User` varchar(20) NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Estado` char(1) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`idUser`,`User`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `upc_login` */

insert  into `upc_login`(`idUser`,`User`,`Clave`,`Nombre`,`Estado`,`fecha`) values 
(1,'jvilla','jvilla','Jesus Villanueva','A','2019-08-18 02:14:33'),
(1,'pmina','','Percy Minalaya','A','0000-00-00 00:00:00'),
(2,'Fernando','','Fernando Lopez','D','0000-00-00 00:00:00'),
(2,'jviza','','Julio Vizarreta','A','2019-08-18 02:14:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
