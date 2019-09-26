/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - thanos_usuarios
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`thanos_usuarios` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `thanos_usuarios`;

/*Table structure for table `pago` */

DROP TABLE IF EXISTS `pago`;

CREATE TABLE `pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razonsocial` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ruc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(15) NOT NULL,
  `estado` int(1) NOT NULL,
  `total` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `seguridad` text COLLATE utf8_spanish2_ci NOT NULL,
  `session` text COLLATE utf8_spanish2_ci NOT NULL,
  `llave` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `pago` */

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
(10,'Victor Hugo','Campos Berumen','victor@gmail.com',999212121,'81dc9bdb52d04dc20036dbd8313ed055'),
(11,'Jesus','Villanueva','jvillanuevap@gmail.com',996615073,'81dc9bdb52d04dc20036dbd8313ed055'),
(12,'Percy','Minalaya','prminalaya29@gmail.com',996615073,'81dc9bdb52d04dc20036dbd8313ed055'),
(13,'Julio','Vizarreta','julio.vizarreta@gmail.com',996615073,'81dc9bdb52d04dc20036dbd8313ed055');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
