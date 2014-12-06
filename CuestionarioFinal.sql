/*
SQLyog Ultimate v9.02 
MySQL - 5.6.16 : Database - cuestionario
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cuestionario` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cuestionario`;

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `Preguntas` varchar(90) DEFAULT NULL,
  `idr` int(11) DEFAULT NULL,
  PRIMARY KEY (`idp`),
  KEY `idr` (`idr`),
  CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`idr`) REFERENCES `respuestas` (`idr`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `preguntas` */

LOCK TABLES `preguntas` WRITE;

insert  into `preguntas`(`idp`,`Preguntas`,`idr`) values (1,'¿Dia de la independencia de México?',1),(2,'¿Lugar de la batalla de los pasteles?',2),(3,'¿Nombre de los fuertes de Puebla?',3),(4,'¿Capital de Argentina?',4),(5,'¿Que se celebra el 24 de Febrero?',5),(6,'Seleciona un personaje de la Revolucion Méxicana',6),(7,'¿Nombre del primer presidente de México?',7),(8,'¿Nombre del primer gobernador del Estado de México?',8),(9,'¿Estado mas grande de México?',9),(10,'¿Cual es la capital de Morelos?',10);

UNLOCK TABLES;

/*Table structure for table `repetidas` */

DROP TABLE IF EXISTS `repetidas`;

CREATE TABLE `repetidas` (
  `id_repetidas` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `idu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_repetidas`)
) ENGINE=InnoDB AUTO_INCREMENT=451 DEFAULT CHARSET=latin1;

/*Data for the table `repetidas` */

LOCK TABLES `repetidas` WRITE;

UNLOCK TABLES;

/*Table structure for table `respuestas` */

DROP TABLE IF EXISTS `respuestas`;

CREATE TABLE `respuestas` (
  `idr` int(11) NOT NULL AUTO_INCREMENT,
  `Respuestas` varchar(900) DEFAULT NULL,
  PRIMARY KEY (`idr`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `respuestas` */

LOCK TABLES `respuestas` WRITE;

insert  into `respuestas`(`idr`,`Respuestas`) values (1,'16 de Septiembre'),(2,'Veracruz'),(3,'Loreto y Guadalupe'),(4,'Buenos Aires'),(5,'Dia de la Bandera'),(6,'Emiliano Zapata'),(7,'Guadalupe Victoria'),(8,'Melchor Muzquis'),(9,'Chihuahua'),(10,'Cuernavaca');

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) DEFAULT NULL,
  `app` varchar(50) DEFAULT NULL,
  `apm` varchar(50) DEFAULT NULL,
  `usuario` varchar(70) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `estatus` varchar(10) NOT NULL DEFAULT 'Activo',
  `aciertos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`idu`,`Nombre`,`app`,`apm`,`usuario`,`contrasena`,`estatus`,`aciertos`) values (1,'Jose Alfredo','Hernandez','Serrano','fredy','123','Activo',3);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
