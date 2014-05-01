CREATE DATABASE  IF NOT EXISTS `stickynotes` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `stickynotes`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: stickynotes
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dailyexpenses`
--

DROP TABLE IF EXISTS `dailyexpenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dailyexpenses` (
  `date_created` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dailyexpenses`
--

LOCK TABLES `dailyexpenses` WRITE;
/*!40000 ALTER TABLE `dailyexpenses` DISABLE KEYS */;
INSERT INTO `dailyexpenses` VALUES ('0000-00-00 00:00:00',1,NULL,'test',1,NULL,0,3),('0000-00-00 00:00:00',2,NULL,'fast',1,NULL,0,3),('0000-00-00 00:00:00',3,NULL,'test',1,NULL,0,3),('0000-00-00 00:00:00',4,NULL,NULL,1,NULL,0,3),('0000-00-00 00:00:00',5,NULL,NULL,1,NULL,0,3),('0000-00-00 00:00:00',6,NULL,NULL,1,NULL,0,3),('0000-00-00 00:00:00',7,NULL,NULL,1,NULL,0,3),('2014-03-24 02:21:22',8,NULL,NULL,1,NULL,0,3),('2014-03-24 02:21:59',9,NULL,NULL,1,NULL,12,3),('2014-03-24 02:23:12',10,NULL,NULL,1,NULL,12,3),('2014-03-24 02:23:18',11,NULL,NULL,1,NULL,0,3),('2014-03-24 02:23:28',12,NULL,'adsf',1,NULL,123,3),('2014-03-24 02:28:12',13,NULL,'asdf',1,NULL,123,3),('2014-03-24 02:29:13',14,NULL,'asdf',1,NULL,123,3),('2014-03-24 02:29:37',15,NULL,'asdf',1,NULL,123,3),('2014-03-24 02:29:53',16,NULL,'asdf',1,NULL,123,3),('2014-03-24 03:49:10',17,NULL,'asdf',1,NULL,123,3),('0000-00-00 00:00:00',18,NULL,'af',1,NULL,12,3),('2014-04-30 01:04:33',19,NULL,'Look',1,NULL,12,3),('2014-04-30 01:05:13',20,NULL,'test',1,NULL,12.8,3),('2014-04-30 19:11:53',21,NULL,'test',1,NULL,12,3),('2014-04-30 19:41:58',22,NULL,'test',1,NULL,12,3),('2014-05-01 00:32:47',23,'test','test',1,NULL,12,5),('2014-05-01 00:33:11',24,'test','test',1,NULL,12345,1);
/*!40000 ALTER TABLE `dailyexpenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dailyexpensestype`
--

DROP TABLE IF EXISTS `dailyexpensestype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dailyexpensestype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dailyexpensestype`
--

LOCK TABLES `dailyexpensestype` WRITE;
/*!40000 ALTER TABLE `dailyexpensestype` DISABLE KEYS */;
INSERT INTO `dailyexpensestype` VALUES (1,'Food'),(2,'Traffic'),(3,'Clothes'),(4,'Finance and Insurance'),(5,'Healthcare'),(6,'Study'),(7,'Lesire'),(8,'Property');
/*!40000 ALTER TABLE `dailyexpensestype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','test');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-30 17:34:21
