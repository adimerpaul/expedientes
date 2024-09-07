/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.28-MariaDB : Database - documentos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`documentos` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `documentos`;

/*Table structure for table `archivos` */

DROP TABLE IF EXISTS `archivos`;

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) NOT NULL,
  `idinstitucion` int(11) NOT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `numero` varchar(250) NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text NOT NULL,
  `miniatura` varchar(255) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `tamano` varchar(250) NOT NULL,
  `documento` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcategoria` (`idcategoria`),
  KEY `idinstitucion` (`idinstitucion`),
  CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`idinstitucion`) REFERENCES `instituciones` (`id`),
  CONSTRAINT `archivos_ibfk_3` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `archivos` */

insert  into `archivos`(`id`,`idcategoria`,`idinstitucion`,`motivo`,`nombre`,`numero`,`fecha`,`descripcion`,`miniatura`,`tipo`,`tamano`,`documento`) values (6,3,2,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,','JACINTO RAMIREZ','expediente /prueba1','2024-09-05','prueba 1 para verificación','','','','1725665326_Guia de pasos para comprar un inmueble.pdf');

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categorias` */

insert  into `categorias`(`id`,`nombre`,`descripcion`) values (1,'Alergología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (2,'Algología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (3,'Anestesiología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (4,'Angiología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (5,'Cardiología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (6,'Endocrinología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (7,'Estomatología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (8,'Farmacología Clínica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (9,'Foniatría','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (10,'Gastroenterología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (11,'Genética','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (12,'Geriatría','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (13,'Hematología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (14,'Hepatología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (15,'Infectología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (16,'Inmunología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (17,'Medicina aeroespacial','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (18,'Medicina del deporte','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (19,'Medicina familiar y comunitaria','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (20,'Medicina física y rehabilitación','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (21,'Medicina forense','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (22,'Medicina intensiva','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (23,'Medicina interna','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (24,'Medicina nuclear','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (25,'Medicina paliativa','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (26,'Medicina preventiva y salud pública','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (27,'Medicina del trabajo','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (28,'Nefrología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (29,'Neumología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (30,'Neurología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (31,'Nutriología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (32,'Oncología médica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (33,'Oncología radioterápica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (34,'Pediatría','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (35,'Psiquiatría','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (36,'Reumatología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (37,'Toxicología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (38,'Cirugía cardíaca','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (39,'Cirugía craneofacial','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (40,'Cirugía general','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (41,'Cirugía oral y maxilofacial','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (42,'Cirugía oncológica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (43,'Cirugía ortopédica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (44,'Cirugía pediátrica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (45,'Cirugía plástica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (46,'Cirugía torácica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (47,'Cirugía vascular','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (48,'Coloproctología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (49,'Neurocirugía','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (50,'Dermatología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (51,'Ginecología y obstetricia o tocología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (52,'Medicina de emergencia','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (53,'Odontología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (54,'Oftalmología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (55,'Otorrinolaringología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (56,'Traumatología y Ortopedia','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (57,'Urología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (58,'Análisis clínico','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (59,'Anatomía patológica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (60,'Bioquímica clínica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (61,'Embriología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (62,'Farmacología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (63,'Genética médica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (64,'Medicina nuclear','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (65,'Microbiología y parasitología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (66,'Neurofisiología clínica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (67,'Radiología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (68,'Administración en salud','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (69,'Auditoría médica','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (70,'Epidemiología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (71,'Salud pública','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (72,'Medicina Legal','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (73,'Patología','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (74,'Urgencias','');
insert  into `categorias`(`id`,`nombre`,`descripcion`) values (75,'Nefrología Pediátrica','');

/*Table structure for table `instituciones` */

DROP TABLE IF EXISTS `instituciones`;

CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `instituciones` */

insert  into `instituciones`(`id`,`nombre`,`descripcion`) values (1,'DF NORTE','');
insert  into `instituciones`(`id`,`nombre`,`descripcion`) values (2,'DF SUR','');
insert  into `instituciones`(`id`,`nombre`,`descripcion`) values (3,'EDO MEXICO PONIENTE','');
insert  into `instituciones`(`id`,`nombre`,`descripcion`) values (4,'EDO MEX ORIENTE','');
insert  into `instituciones`(`id`,`nombre`,`descripcion`) values (5,'JALISCO','');
insert  into `instituciones`(`id`,`nombre`,`descripcion`) values (6,'NIVEL CENTRAL','');

/*Table structure for table `mensajes` */

DROP TABLE IF EXISTS `mensajes`;

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mensajes` */

insert  into `mensajes`(`id`,`asunto`,`descripcion`,`idusuario`) values (4,'Reclamo de documentos','Necesito el documento indicado por favor',5);
insert  into `mensajes`(`id`,`asunto`,`descripcion`,`idusuario`) values (5,'NECESITO URGENTE','nada',13);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombres`,`usuario`,`password`,`correo`,`rol`) values (13,'Raul','raul','raul','raul@gmail.com',0);
insert  into `usuarios`(`id`,`nombres`,`usuario`,`password`,`correo`,`rol`) values (14,'JANET ','admin','admin','isajus9@gmail.com',1);
insert  into `usuarios`(`id`,`nombres`,`usuario`,`password`,`correo`,`rol`) values (15,'FERNANDO LICONA','doctor','admin','fernando.licona@gmail.com',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
