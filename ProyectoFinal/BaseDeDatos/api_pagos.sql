/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - api_pagos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`api_pagos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `api_pagos`;

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
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=745345 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `pago` */

insert  into `pago`(`id`,`razonsocial`,`ruc`,`email`,`telefono`,`estado`,`total`,`seguridad`,`session`,`llave`) values 
(1,'Pepita','20373697720','jvillanuevap@gmail.com',996615073,0,'170.00','eyJraWQiOiJmWk1tV3pZR0RBckxHektvalNCK2w3SjFhMnNPXC9zQnNwOTlNNmNuM3F5MD0iLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJjNTAxNjYyOS04Zjc2LTQ1M2QtYjhlNC01MGJjZDI5YjI2NTAiLCJldmVudF9pZCI6IjgxMTY5YjE4LWMyNjMtNDAxMC1iMDRlLTE3ZmFjMmMxMWMzNSIsInRva2VuX3VzZSI6ImFjY2VzcyIsInNjb3BlIjoiYXdzLmNvZ25pdG8uc2lnbmluLnVzZXIuYWRtaW4iLCJhdXRoX3RpbWUiOjE1Njk1MzkwODMsImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC51cy1lYXN0LTEuYW1hem9uYXdzLmNvbVwvdXMtZWFzdC0xXzJjSjFTZTFmSSIsImV4cCI6MTU2OTU0MjY4MywiaWF0IjoxNTY5NTM5MDgzLCJqdGkiOiJiNzBhYTAyYi1lZTI1LTRiMWQtOTVhMi03NTRjOGEyOGJkZjciLCJjbGllbnRfaWQiOiIxMGx2MDYxN281ZGljNTFlYnNucWVpaWpiNyIsInVzZXJuYW1lIjoiaW50ZWdyYWNpb25lcy52aXNhbmV0QG5lY29tcGx1cy5jb20ifQ.YSI8BO6e3vb0hKppPqErLu07DQYujDPcYPwhY8vK_Ody1jekBC_i3Z6-wGdmrVp5jQW6fwowolwhMcphBZJLkPwtA4ipee0i8N0tXHnq1U8e7zxZsxpoDfiByRz-_yWWdbPmyLljnlImzRaAXmws1qGeWWwpMRgxunKo8nxJTuyR21-NWnsaDOHIbVjlw_rHLOqBAVhcUJpLx5AGisMJ0lRskbTVnjHHVngKlS3tOk_4M0K-ovZ11M9ecgOzkk-9IOXioS0DUIH8yZMkWr9nlQgf3GUAotxG77WX2Y9pCtzewCxLI7FguEMeIUiyoG0T56vqgtzs9qkbFQ2xAPyyjw','0e76afc8c9fc29ef3ba0c0b21189d89512e76bfdbb36044e1ee24ddca1f9381f',342062522);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
