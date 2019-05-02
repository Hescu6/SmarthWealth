-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price` (
  `stock` varchar(5) NOT NULL,
  `price_real` decimal(8,2) NOT NULL,
  PRIMARY KEY (`stock`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price`
--

LOCK TABLES `price` WRITE;
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
INSERT INTO `price` VALUES ('AMD',10.09),('AMZN',690.18),('ASUR',7.98),('GOOG',649.87),('MSFT',50.99),('NVDA',77.32),('ORCL',33.81),('SPY',180.16),('TSLA',234.39),('TWTR',11.09);
/*!40000 ALTER TABLE `price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(4) NOT NULL,
  `stock` varchar(5) NOT NULL,
  `shares_bought` int(11) DEFAULT NULL,
  `price_transaction` float DEFAULT NULL,
  `shares_sold` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'ORCL',300,44.02,NULL),(2,'SPY',20,234.89,NULL),(3,'AMD',400,13.13,NULL),(4,'TSLA',25,305.2,NULL),(5,'AMZN',10,898.68,NULL),(3,'SPY',30,234.59,NULL),(3,'ORCL',5,44.02,NULL),(3,'NVDA',50,100.68,NULL),(3,'AMD',100,13.13,NULL),(3,'AMD',300,13.13,NULL),(3,'AMD',-100,13.13,NULL),(3,'AMD',-200,13.13,NULL),(3,'AMD',-200,13.13,NULL),(3,'SPY',-5,234.59,NULL),(3,'ASUR',50,10.38,NULL),(3,'ASUR',50,10.38,NULL),(3,'TWTR',50,14.44,NULL),(3,'AMD',100,13.13,NULL),(3,'AMD',-200,13.13,NULL),(3,'AMD',-200,21.01,NULL),(3,'NVDA',-50,161.09,NULL),(3,'TWTR',-30,23.1,NULL),(3,'SPY',-5,375.34,NULL),(3,'NVDA',150,96.65,NULL),(3,'ASUR',-50,9.97,NULL),(3,'AMD',170,10.09,NULL),(3,'AMZN',3,690.18,NULL);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `buying_power` decimal(8,2) NOT NULL,
  `initial_buypower` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Becca',30000.00,30000),(2,'Richard',10000.00,10000),(3,'Shakir',25000.00,25000),(4,'Kia',15000.00,15000),(5,'Anna',35000.00,35000);
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

-- Dump completed on 2017-04-28  3:35:18
