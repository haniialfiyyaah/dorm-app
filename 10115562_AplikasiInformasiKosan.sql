/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.33-MariaDB : Database - 10115562_aplikasiinformasikosan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`10115562_aplikasiinformasikosan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `10115562_aplikasiinformasikosan`;

/*Table structure for table `_datapengelola` */

DROP TABLE IF EXISTS `_datapengelola`;

CREATE TABLE `_datapengelola` (
  `F_Email` varchar(200) NOT NULL,
  `F_Password` varchar(500) DEFAULT NULL,
  `F_Nama` varchar(25) DEFAULT NULL,
  `F_No_HP` varchar(14) DEFAULT NULL,
  `F_Tanggal` date DEFAULT NULL,
  `F_Time` time DEFAULT NULL,
  PRIMARY KEY (`F_Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `_messageus` */

DROP TABLE IF EXISTS `_messageus`;

CREATE TABLE `_messageus` (
  `ID_PESAN` varchar(100) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Message` varchar(2500) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  PRIMARY KEY (`ID_PESAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `_msgpengelola` */

DROP TABLE IF EXISTS `_msgpengelola`;

CREATE TABLE `_msgpengelola` (
  `ID_PESAN_P` varchar(100) NOT NULL,
  `Nama` varchar(25) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `No_Tlp` varchar(100) DEFAULT NULL,
  `Kepada` varchar(100) DEFAULT NULL,
  `Pesan` varchar(2500) DEFAULT NULL,
  `Tanggal_` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  PRIMARY KEY (`ID_PESAN_P`),
  KEY `_msgpengelola_ibfk_1` (`Kepada`),
  CONSTRAINT `_msgpengelola_ibfk_1` FOREIGN KEY (`Kepada`) REFERENCES `_datapengelola` (`F_Email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*Table structure for table `_datakosan` */

DROP TABLE IF EXISTS `_datakosan`;

CREATE TABLE `_datakosan` (
  `ID_KOSAN` varchar(10) NOT NULL,
  `F_Email` varchar(100) DEFAULT NULL,
  `Provinsi` varchar(100) DEFAULT NULL,
  `Kota` varchar(50) DEFAULT NULL,
  `Judul` varchar(500) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL,
  `Deskripsi` varchar(5000) DEFAULT NULL,
  `Jenis_Kost` varchar(20) DEFAULT NULL,
  `Alamat_Lengkap` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_KOSAN`),
  KEY `_datakosan_ibfk_1` (`F_Email`),
  CONSTRAINT `_datakosan_ibfk_1` FOREIGN KEY (`F_Email`) REFERENCES `_datapengelola` (`F_Email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
