-- MySQL dump 10.13  Distrib 8.0.19, for macos10.15 (x86_64)
--
-- Host: localhost    Database: meddb
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Actions`
--

DROP TABLE IF EXISTS `Actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Actions` (
  `Action_ID` int NOT NULL AUTO_INCREMENT,
  `User_Type` enum('Admin','Patient','Nurse','Doctor') NOT NULL,
  `User_ID` bigint NOT NULL,
  `Action_Type` enum('Logged In','Logged Out','Created New User','Modified Record','Scheduled Appointment','Prescription Written') NOT NULL,
  `Record_Modified_ID` bigint DEFAULT NULL,
  `Action_Time` datetime NOT NULL,
  PRIMARY KEY (`Action_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Actions`
--

LOCK TABLES `Actions` WRITE;
/*!40000 ALTER TABLE `Actions` DISABLE KEYS */;
INSERT INTO `Actions` VALUES (1,'Doctor',3251567654,'Modified Record',234622,'2020-04-20 22:04:23'),(2,'Doctor',3251567654,'Modified Record',234622,'2020-04-20 22:05:16'),(3,'Doctor',3251567654,'Modified Record',325543,'2020-04-20 22:06:21'),(4,'Doctor',3251567654,'Modified Record',325543,'2020-04-20 22:17:36'),(5,'Doctor',3251567654,'Modified Record',325543,'2020-04-20 22:18:08'),(6,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-20 22:19:54'),(7,'Admin',1101,'Logged In',1101,'2020-04-20 22:20:01'),(8,'Admin',1101,'Logged Out',1101,'2020-04-20 22:24:50'),(9,'Patient',123124,'Logged In',123124,'2020-04-20 22:24:58'),(10,'Patient',123124,'Logged Out',123124,'2020-04-20 22:25:25'),(11,'Nurse',34534,'Logged In',34534,'2020-04-20 22:25:31'),(12,'Nurse',34534,'Logged Out',34534,'2020-04-20 22:25:38'),(13,'Patient',123124,'Logged In',123124,'2020-04-20 23:47:20'),(14,'Patient',123124,'Logged Out',123124,'2020-04-20 23:47:55'),(15,'Nurse',34534,'Logged In',34534,'2020-04-20 23:48:01'),(16,'Nurse',34534,'Logged Out',34534,'2020-04-20 23:48:40'),(17,'Doctor',3251567654,'Logged In',3251567654,'2020-04-20 23:48:49'),(18,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-20 23:50:14'),(19,'Admin',1101,'Logged In',1101,'2020-04-20 23:50:21'),(20,'Admin',1101,'Modified Record',3251567654,'2020-04-20 23:51:04'),(21,'Admin',1101,'Logged Out',1101,'2020-04-20 23:51:23'),(22,'Nurse',34534,'Logged In',34534,'2020-04-21 01:34:28'),(23,'Nurse',34534,'Scheduled Appointment',100005,'2020-04-21 01:47:24'),(24,'Nurse',34534,'Scheduled Appointment',0,'2020-04-21 02:05:04'),(25,'Nurse',34534,'Logged Out',34534,'2020-04-21 03:23:45'),(26,'Nurse',34534,'Logged In',34534,'2020-04-21 16:52:58'),(27,'Nurse',34534,'Logged Out',34534,'2020-04-21 16:56:49'),(28,'Admin',1101,'Logged In',1101,'2020-04-21 16:56:58'),(29,'Admin',1101,'Logged Out',1101,'2020-04-21 18:23:36'),(30,'Nurse',34534,'Logged In',34534,'2020-04-21 18:23:43'),(31,'Nurse',34534,'Logged Out',34534,'2020-04-21 18:24:04'),(32,'Patient',123124,'Logged In',123124,'2020-04-21 18:24:12'),(33,'Patient',123124,'Logged Out',123124,'2020-04-21 18:24:25'),(34,'Doctor',3251567654,'Logged In',3251567654,'2020-04-21 18:24:32'),(35,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-21 18:44:47'),(36,'Patient',123124,'Logged In',123124,'2020-04-21 18:44:54'),(37,'Patient',123124,'Logged Out',123124,'2020-04-21 18:47:05'),(38,'Nurse',34534,'Logged In',34534,'2020-04-21 18:47:13'),(39,'Nurse',34534,'Logged Out',34534,'2020-04-21 18:48:00'),(40,'Doctor',3251567654,'Logged In',3251567654,'2020-04-21 18:48:07'),(41,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-21 18:49:04'),(42,'Admin',1101,'Logged In',1101,'2020-04-21 18:49:11'),(43,'Admin',1101,'Logged Out',1101,'2020-04-21 18:51:33'),(44,'Doctor',3251567654,'Logged In',3251567654,'2020-04-21 18:51:39'),(45,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-21 22:00:47'),(46,'Admin',1101,'Logged In',1101,'2020-04-21 22:00:54'),(47,'Admin',1101,'Logged Out',1101,'2020-04-21 22:48:02'),(48,'Doctor',3251567654,'Logged In',3251567654,'2020-04-21 22:48:10'),(49,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-21 23:17:31'),(50,'Patient',786665,'Created New User',786665,'2020-04-21 23:18:39'),(51,'Patient',786665,'Logged In',786665,'2020-04-21 23:18:39'),(52,'Patient',786665,'Logged Out',786665,'2020-04-22 01:53:54'),(53,'Patient',198664,'Logged In',198664,'2020-04-22 01:54:17'),(54,'Patient',198664,'Logged Out',198664,'2020-04-22 01:59:39'),(55,'Admin',1101,'Logged In',1101,'2020-04-22 01:59:48'),(56,'Admin',1101,'Created New User',32132,'2020-04-22 02:04:37'),(57,'Admin',1101,'Created New User',88700,'2020-04-22 02:07:29'),(58,'Admin',1101,'Logged Out',1101,'2020-04-22 02:30:31'),(59,'Nurse',34534,'Logged In',34534,'2020-04-22 02:30:38'),(60,'Nurse',34534,'Logged Out',34534,'2020-04-22 02:36:50'),(61,'Admin',1101,'Logged In',1101,'2020-04-22 02:36:57'),(62,'Admin',1101,'Logged Out',1101,'2020-04-22 17:32:41'),(63,'Patient',123124,'Logged In',123124,'2020-04-22 17:34:25'),(64,'Patient',123124,'Modified Record',123124,'2020-04-22 17:37:36'),(65,'Patient',123124,'Scheduled Appointment',100006,'2020-04-22 17:40:26'),(66,'Patient',123124,'Scheduled Appointment',100007,'2020-04-22 17:41:07'),(67,'Patient',123124,'Logged Out',123124,'2020-04-22 17:41:14'),(68,'Patient',635273,'Created New User',635273,'2020-04-22 17:45:06'),(69,'Patient',635273,'Logged In',635273,'2020-04-22 17:45:06'),(70,'Patient',635273,'Scheduled Appointment',100008,'2020-04-22 17:48:18'),(71,'Patient',635273,'Logged Out',635273,'2020-04-22 17:48:28'),(72,'Patient',911168,'Created New User',911168,'2020-04-22 17:49:50'),(73,'Patient',911168,'Logged In',911168,'2020-04-22 17:49:50'),(74,'Patient',911168,'Logged Out',911168,'2020-04-22 17:50:25'),(75,'Admin',1101,'Logged In',1101,'2020-04-22 17:50:31'),(76,'Admin',1101,'Logged Out',1101,'2020-04-22 17:50:49'),(77,'Patient',123124,'Logged In',123124,'2020-04-22 17:50:57'),(78,'Patient',123124,'Logged Out',123124,'2020-04-22 17:55:56'),(79,'Admin',1101,'Logged In',1101,'2020-04-22 17:56:02'),(80,'Admin',1101,'Logged Out',1101,'2020-04-22 17:56:31'),(81,'Patient',635273,'Logged In',635273,'2020-04-22 17:56:40'),(82,'Patient',635273,'Logged Out',635273,'2020-04-22 18:09:46'),(83,'Nurse',34534,'Logged In',34534,'2020-04-22 18:12:45'),(84,'Nurse',34534,'Scheduled Appointment',100009,'2020-04-22 18:17:59'),(85,'Nurse',34534,'Scheduled Appointment',0,'2020-04-22 18:25:38'),(86,'Nurse',34534,'Logged Out',34534,'2020-04-22 18:25:47'),(87,'Doctor',3251567654,'Logged In',3251567654,'2020-04-22 18:26:01'),(88,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-22 18:32:17'),(89,'Admin',1101,'Logged In',1101,'2020-04-22 18:32:24'),(90,'Admin',1101,'Modified Record',125236,'2020-04-22 18:43:40'),(91,'Admin',1101,'Modified Record',12456,'2020-04-22 18:49:04'),(92,'Admin',1101,'Modified Record',12456,'2020-04-22 18:49:28'),(93,'Admin',1101,'Modified Record',34534,'2020-04-22 18:49:38'),(94,'Admin',1101,'Modified Record',125236,'2020-04-22 18:51:09'),(95,'Admin',1101,'Modified Record',125236,'2020-04-22 18:51:43'),(96,'Admin',1101,'Modified Record',3251567654,'2020-04-22 18:58:52'),(97,'Admin',1101,'Modified Record',3251567654,'2020-04-22 18:59:16'),(98,'Admin',1101,'Created New User',6767676767,'2020-04-22 19:06:32'),(99,'Admin',1101,'Created New User',1432149259,'2020-04-22 19:07:30'),(100,'Admin',1101,'Logged Out',1101,'2020-04-22 19:17:10'),(101,'Patient',123124,'Logged In',123124,'2020-04-22 19:17:18'),(102,'Patient',123124,'Modified Record',123124,'2020-04-22 19:19:07'),(103,'Patient',123124,'Modified Record',123124,'2020-04-22 19:19:52'),(104,'Patient',123124,'Logged Out',123124,'2020-04-22 19:22:39'),(105,'Nurse',34534,'Logged In',34534,'2020-04-22 19:23:05'),(106,'Nurse',34534,'Logged Out',34534,'2020-04-22 19:31:37'),(107,'Patient',123124,'Logged In',123124,'2020-04-22 19:31:43'),(108,'Patient',123124,'Logged Out',123124,'2020-04-22 19:32:20'),(109,'Admin',1101,'Logged In',1101,'2020-04-22 19:32:26'),(110,'Admin',1101,'Logged Out',1101,'2020-04-22 19:32:37'),(111,'Doctor',3251567654,'Logged In',3251567654,'2020-04-22 19:32:45'),(112,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-22 19:35:22'),(113,'Admin',1101,'Logged In',1101,'2020-04-22 19:35:28'),(114,'Admin',1101,'Logged Out',1101,'2020-04-22 14:43:34'),(115,'Admin',1101,'Logged In',1101,'2020-04-22 14:43:44'),(116,'Admin',1101,'Logged Out',1101,'2020-04-22 14:44:51'),(117,'Doctor',3251567654,'Logged In',3251567654,'2020-04-22 14:45:06'),(118,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-22 15:27:58'),(119,'Admin',1101,'Logged In',1101,'2020-04-22 15:28:08'),(120,'Admin',1101,'Logged Out',1101,'2020-04-22 16:14:40'),(121,'Doctor',3251567654,'Logged In',3251567654,'2020-04-22 16:14:45'),(122,'Doctor',3251567654,'Prescription Written',704,'2020-04-22 16:17:34'),(123,'Doctor',3251567654,'Modified Record',704,'2020-04-22 16:19:29'),(124,'Doctor',3251567654,'Modified Record',704,'2020-04-22 16:19:44'),(125,'Doctor',3251567654,'Modified Record',704,'2020-04-22 16:20:19'),(126,'Doctor',3251567654,'Modified Record',704,'2020-04-22 16:20:56'),(127,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-22 16:28:14'),(128,'Admin',1101,'Logged In',1101,'2020-04-22 16:28:27'),(129,'Admin',1101,'Logged Out',1101,'2020-04-22 18:25:51'),(130,'Admin',1101,'Logged In',1101,'2020-04-22 18:35:17'),(131,'Admin',1101,'Logged Out',1101,'2020-04-22 18:43:08'),(132,'Doctor',3251567654,'Logged In',3251567654,'2020-04-22 18:43:15'),(133,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-22 18:46:56'),(134,'Admin',1101,'Logged In',1101,'2020-04-22 19:19:29'),(135,'Admin',1101,'Created New User',4235424536,'2020-04-22 19:20:15'),(136,'Admin',1101,'Modified Record',4235424536,'2020-04-22 19:20:37'),(137,'Admin',1101,'Logged Out',1101,'2020-04-22 19:23:39'),(138,'Doctor',3251567654,'Logged In',3251567654,'2020-04-22 19:23:45'),(139,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-22 19:26:05'),(140,'Patient',123124,'Logged In',123124,'2020-04-22 19:26:12'),(141,'Patient',123124,'Modified Record',123124,'2020-04-22 19:27:02'),(142,'Patient',123124,'Modified Record',123124,'2020-04-22 19:27:42'),(143,'Patient',123124,'Scheduled Appointment',100010,'2020-04-22 19:27:52'),(144,'Patient',123124,'Logged Out',123124,'2020-04-22 19:27:55'),(145,'Nurse',34534,'Logged In',34534,'2020-04-22 19:28:01'),(146,'Nurse',34534,'Logged Out',34534,'2020-04-22 19:28:41'),(147,'Admin',1101,'Logged In',1101,'2020-04-22 19:32:11'),(148,'Admin',1101,'Logged Out',1101,'2020-04-22 19:33:25'),(149,'Nurse',34534,'Logged In',34534,'2020-04-22 19:34:02'),(150,'Nurse',34534,'Logged Out',34534,'2020-04-22 19:36:37'),(151,'Doctor',3251567654,'Logged In',3251567654,'2020-04-22 19:38:02'),(152,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-22 20:34:06'),(153,'Admin',1101,'Logged In',1101,'2020-04-23 11:47:01'),(154,'Admin',1101,'Modified Record',558998,'2020-04-23 11:47:31'),(155,'Admin',1101,'Created New User',12515,'2020-04-23 11:56:15'),(156,'Admin',1101,'Created New User',50117,'2020-04-23 11:56:37'),(157,'Admin',1101,'Modified Record',6767676767,'2020-04-23 12:06:22'),(158,'Admin',1101,'Logged Out',1101,'2020-04-23 12:17:43'),(159,'Doctor',3251567654,'Logged In',3251567654,'2020-04-23 12:17:52'),(160,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-23 12:38:19'),(161,'Patient',123124,'Logged In',123124,'2020-04-23 12:38:27'),(162,'Patient',123124,'Scheduled Appointment',100011,'2020-04-23 13:44:49'),(163,'Patient',123124,'Scheduled Appointment',100012,'2020-04-23 13:45:04'),(164,'Patient',123124,'Logged Out',123124,'2020-04-23 13:47:36'),(165,'Admin',1101,'Logged In',1101,'2020-04-23 13:47:42'),(166,'Admin',1101,'Modified Record',911168,'2020-04-23 14:26:11'),(167,'Admin',1101,'Modified Record',911168,'2020-04-23 14:26:57'),(168,'Admin',1101,'Modified Record',24933,'2020-04-23 14:27:21'),(169,'Admin',1101,'Modified Record',6767676767,'2020-04-23 14:27:41'),(170,'Admin',1101,'Logged Out',1101,'2020-04-23 14:27:46'),(171,'Patient',123124,'Logged In',123124,'2020-04-23 14:27:53'),(172,'Patient',123124,'Modified Record',123124,'2020-04-23 14:28:39'),(173,'Patient',123124,'Logged Out',123124,'2020-04-23 14:28:46'),(174,'Nurse',34534,'Logged In',34534,'2020-04-23 14:28:53'),(175,'Nurse',34534,'Logged Out',34534,'2020-04-23 14:29:01'),(176,'Doctor',3251567654,'Logged In',3251567654,'2020-04-23 14:29:08'),(177,'Doctor',3251567654,'Modified Record',123124,'2020-04-23 14:29:51'),(178,'Doctor',3251567654,'Modified Record',123124,'2020-04-23 14:30:03'),(179,'Doctor',3251567654,'Modified Record',123124,'2020-04-23 14:30:26'),(180,'Doctor',3251567654,'Modified Record',123124,'2020-04-23 14:30:39'),(181,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-23 14:30:44'),(182,'Admin',1101,'Logged In',1101,'2020-04-23 14:32:20'),(183,'Admin',1101,'Logged Out',1101,'2020-04-23 14:32:54'),(184,'Admin',1101,'Logged In',1101,'2020-04-23 14:33:28'),(185,'Admin',1101,'Created New User',1231423151,'2020-04-23 14:34:32'),(186,'Admin',1101,'Modified Record',1231423151,'2020-04-23 14:35:56'),(187,'Admin',1101,'Created New User',78063,'2020-04-23 14:36:56'),(188,'Admin',1101,'Modified Record',78063,'2020-04-23 14:38:20'),(189,'Admin',1101,'Logged Out',1101,'2020-04-23 14:41:35'),(190,'Doctor',3251567654,'Logged In',3251567654,'2020-04-23 14:41:42'),(191,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-23 14:45:12'),(192,'Patient',123124,'Logged In',123124,'2020-04-23 14:45:19'),(193,'Patient',123124,'Modified Record',123124,'2020-04-23 14:45:45'),(194,'Patient',123124,'Modified Record',123124,'2020-04-23 14:46:56'),(195,'Patient',123124,'Scheduled Appointment',100013,'2020-04-23 14:47:35'),(196,'Patient',123124,'Logged Out',123124,'2020-04-23 14:47:38'),(197,'Nurse',34534,'Logged In',34534,'2020-04-23 14:47:45'),(198,'Nurse',34534,'Scheduled Appointment',100014,'2020-04-23 14:48:20'),(199,'Nurse',34534,'Logged Out',34534,'2020-04-23 14:49:55'),(200,'Admin',1101,'Logged In',1101,'2020-04-23 14:52:52'),(201,'Admin',1101,'Logged Out',1101,'2020-04-23 14:53:14'),(202,'Patient',123124,'Logged In',123124,'2020-04-23 14:53:50'),(203,'Patient',123124,'Logged Out',123124,'2020-04-23 14:53:55'),(204,'Patient',566784,'Created New User',566784,'2020-04-23 14:54:55'),(205,'Patient',566784,'Logged In',566784,'2020-04-23 14:54:55'),(206,'Patient',962286,'Created New User',962286,'2020-04-23 14:55:20'),(207,'Patient',962286,'Logged In',962286,'2020-04-23 14:55:20'),(208,'Patient',630107,'Created New User',630107,'2020-04-23 14:55:26'),(209,'Patient',630107,'Logged In',630107,'2020-04-23 14:55:26'),(210,'Patient',630107,'Logged Out',630107,'2020-04-23 14:55:36'),(211,'Admin',1101,'Logged In',1101,'2020-04-23 14:55:43'),(212,'Admin',1101,'Logged Out',1101,'2020-04-23 14:56:01'),(213,'Patient',815436,'Created New User',815436,'2020-04-23 14:57:22'),(214,'Patient',815436,'Logged In',815436,'2020-04-23 14:57:22'),(215,'Patient',815436,'Modified Record',815436,'2020-04-23 14:57:45'),(216,'Patient',815436,'Logged Out',815436,'2020-04-23 14:58:16'),(217,'Patient',123124,'Logged In',123124,'2020-04-23 14:58:43'),(218,'Patient',123124,'Modified Record',123124,'2020-04-23 14:59:06'),(219,'Patient',123124,'Modified Record',123124,'2020-04-23 14:59:47'),(220,'Patient',123124,'Scheduled Appointment',100015,'2020-04-23 15:00:48'),(221,'Patient',123124,'Logged Out',123124,'2020-04-23 15:01:09'),(222,'Doctor',3251567654,'Logged In',3251567654,'2020-04-23 15:01:19'),(223,'Doctor',3251567654,'Modified Record',123124,'2020-04-23 15:02:56'),(224,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-23 15:04:57'),(225,'Admin',1101,'Logged In',1101,'2020-04-23 15:05:04'),(226,'Admin',1101,'Created New User',2342353253,'2020-04-23 15:06:23'),(227,'Admin',1101,'Modified Record',2342353253,'2020-04-23 15:06:39'),(228,'Admin',1101,'Logged Out',1101,'2020-04-23 15:09:25'),(229,'Nurse',34534,'Logged In',34534,'2020-04-23 15:09:32'),(230,'Nurse',34534,'Scheduled Appointment',100016,'2020-04-23 15:10:42'),(231,'Nurse',34534,'Logged Out',34534,'2020-04-23 15:12:36'),(232,'Patient',449657,'Created New User',449657,'2020-04-23 15:17:30'),(233,'Patient',449657,'Logged In',449657,'2020-04-23 15:17:30'),(234,'Patient',449657,'Modified Record',449657,'2020-04-23 15:18:07'),(235,'Patient',449657,'Modified Record',449657,'2020-04-23 15:19:06'),(236,'Patient',449657,'Scheduled Appointment',100017,'2020-04-23 15:19:18'),(237,'Patient',449657,'Logged Out',449657,'2020-04-23 15:19:34'),(238,'Nurse',34534,'Logged In',34534,'2020-04-23 15:19:42'),(239,'Nurse',34534,'Scheduled Appointment',0,'2020-04-23 15:21:16'),(240,'Nurse',34534,'Logged Out',34534,'2020-04-23 15:21:21'),(241,'Doctor',3251567654,'Logged In',3251567654,'2020-04-23 15:21:28'),(242,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-23 15:22:27'),(243,'Admin',1101,'Logged In',1101,'2020-04-23 15:22:34'),(244,'Admin',1101,'Logged Out',1101,'2020-04-23 15:27:30'),(245,'Doctor',3251567654,'Logged In',3251567654,'2020-04-23 15:27:38'),(246,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-23 15:27:43'),(247,'Admin',1101,'Logged In',1101,'2020-04-23 15:27:52'),(248,'Admin',1101,'Logged Out',1101,'2020-04-23 16:04:21'),(249,'Patient',679368,'Created New User',679368,'2020-04-23 16:05:38'),(250,'Patient',679368,'Logged In',679368,'2020-04-23 16:05:38'),(251,'Patient',679368,'Modified Record',679368,'2020-04-23 16:05:52'),(252,'Patient',679368,'Modified Record',679368,'2020-04-23 16:06:47'),(253,'Patient',679368,'Scheduled Appointment',100018,'2020-04-23 16:06:59'),(254,'Patient',679368,'Logged Out',679368,'2020-04-23 16:07:18'),(255,'Nurse',34534,'Logged In',34534,'2020-04-23 16:07:24'),(256,'Nurse',34534,'Scheduled Appointment',100019,'2020-04-23 16:07:56'),(257,'Nurse',34534,'Scheduled Appointment',0,'2020-04-23 16:08:25'),(258,'Nurse',34534,'Logged Out',34534,'2020-04-23 16:08:43'),(259,'Doctor',3251567654,'Logged In',3251567654,'2020-04-23 16:08:52'),(260,'Doctor',3251567654,'Prescription Written',705,'2020-04-23 16:12:31'),(261,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-23 16:13:10'),(262,'Admin',1101,'Logged In',1101,'2020-04-23 16:13:16'),(263,'Admin',1101,'Created New User',3464357374,'2020-04-23 16:14:00'),(264,'Admin',1101,'Modified Record',3464357374,'2020-04-23 16:14:15'),(265,'Admin',1101,'Logged Out',1101,'2020-04-23 16:15:29'),(266,'Patient',123124,'Logged In',123124,'2020-04-23 17:01:40'),(267,'Patient',123124,'Modified Record',123124,'2020-04-23 17:01:53'),(268,'Patient',123124,'Logged Out',123124,'2020-04-23 17:01:55'),(269,'Patient',123124,'Logged In',123124,'2020-04-23 17:03:17'),(270,'Patient',123124,'Modified Record',123124,'2020-04-23 17:03:37'),(271,'Patient',123124,'Logged Out',123124,'2020-04-23 17:03:40'),(272,'Patient',537096,'Created New User',537096,'2020-04-23 17:35:57'),(273,'Patient',537096,'Logged In',537096,'2020-04-23 17:35:57'),(274,'Patient',537096,'Logged Out',537096,'2020-04-23 17:36:00'),(275,'Patient',365057,'Created New User',365057,'2020-04-23 18:37:15'),(276,'Patient',365057,'Logged In',365057,'2020-04-23 18:37:15'),(277,'Patient',365057,'Modified Record',365057,'2020-04-23 18:39:49'),(278,'Patient',365057,'Scheduled Appointment',100020,'2020-04-23 18:40:05'),(279,'Patient',365057,'Logged Out',365057,'2020-04-23 18:40:27'),(280,'Doctor',3251567654,'Logged In',3251567654,'2020-04-23 18:40:42'),(281,'Doctor',3251567654,'Logged Out',3251567654,'2020-04-23 18:43:07'),(282,'Admin',1101,'Logged In',1101,'2020-04-23 18:43:13'),(283,'Admin',1101,'Created New User',4352346265,'2020-04-23 18:43:45'),(284,'Admin',1101,'Logged Out',1101,'2020-04-23 18:45:29'),(285,'Nurse',34534,'Logged In',34534,'2020-04-23 18:45:36'),(286,'Nurse',34534,'Scheduled Appointment',100021,'2020-04-23 18:46:02'),(287,'Nurse',34534,'Scheduled Appointment',0,'2020-04-23 18:46:27'),(288,'Nurse',34534,'Logged Out',34534,'2020-04-23 18:46:39'),(289,'Doctor',3251567654,'Logged In',3251567654,'2020-04-23 18:49:59'),(290,'Doctor',3251567654,'Modified Record',701,'2020-04-23 21:18:48');
/*!40000 ALTER TABLE `Actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Admin` (
  `Admin_ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Password` varchar(80) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admin`
--

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;
INSERT INTO `Admin` VALUES (1101,'Tom Swiney','admin@admin.com','password');
/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Appointments`
--

DROP TABLE IF EXISTS `Appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Appointments` (
  `Appt_ID` int NOT NULL AUTO_INCREMENT,
  `Has_approval` enum('Yes','No') NOT NULL,
  `Appointment_time` datetime NOT NULL,
  `Doctor_ID` bigint NOT NULL,
  `Patient_ID` int NOT NULL,
  `Clinic_ID` int NOT NULL,
  PRIMARY KEY (`Appt_ID`),
  KEY `Doctor_ID` (`Doctor_ID`),
  KEY `Patient_ID` (`Patient_ID`),
  KEY `Clinic_ID` (`Clinic_ID`),
  CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`Doctor_ID`) REFERENCES `Doctors` (`NPI`) ON DELETE CASCADE,
  CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`Patient_ID`) REFERENCES `Patients` (`PID`) ON DELETE CASCADE,
  CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`Clinic_ID`) REFERENCES `Clinics` (`Clinic_ID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100022 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Appointments`
--

LOCK TABLES `Appointments` WRITE;
/*!40000 ALTER TABLE `Appointments` DISABLE KEYS */;
INSERT INTO `Appointments` VALUES (100001,'Yes','2020-01-01 10:00:00',3251567654,123124,901),(100002,'Yes','2020-03-24 09:30:00',2196832962,125236,901),(100003,'Yes','2020-02-28 03:30:00',6734223145,325543,902),(100011,'Yes','2020-12-01 08:00:00',3251567654,123124,901),(100012,'Yes','2020-07-01 08:00:00',5882941572,123124,902),(100013,'Yes','2020-06-01 11:00:00',3251567654,123124,901),(100014,'Yes','2020-08-01 08:00:00',2196832962,123124,901),(100015,'Yes','2020-08-23 08:00:00',2196832962,123124,902),(100019,'Yes','2020-08-26 12:00:00',3251567654,679368,901);
/*!40000 ALTER TABLE `Appointments` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `duplicateAppointment` BEFORE INSERT ON `Appointments` FOR EACH ROW BEGIN
	IF(EXISTS(SELECT 1 FROM Appointments WHERE
		Appointment_time = NEW.Appointment_time AND
		Doctor_ID = NEW.Doctor_ID AND
		Patient_ID = NEW.Patient_ID)) THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Appointment already exists on this data and time.';
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `no_insurance` BEFORE INSERT ON `Appointments` FOR EACH ROW BEGIN
	DECLARE test ENUM('Yes','No');

	SELECT Has_insurance INTO test
	FROM Demographics WHERE Demo_ID=(SELECT Demographics_ID FROM Patients WHERE PID=NEW.Patient_ID);

	IF test = 'No' THEN
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Cannot schedule an appointment without insurance.';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Clinics`
--

DROP TABLE IF EXISTS `Clinics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Clinics` (
  `Clinic_ID` int NOT NULL AUTO_INCREMENT,
  `Clinic_name` varchar(50) NOT NULL,
  `Office_phone` varchar(15) NOT NULL,
  `Email` varchar(80) DEFAULT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` varchar(10) NOT NULL,
  PRIMARY KEY (`Clinic_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=903 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Clinics`
--

LOCK TABLES `Clinics` WRITE;
/*!40000 ALTER TABLE `Clinics` DISABLE KEYS */;
INSERT INTO `Clinics` VALUES (901,'West Clinic','423-123-6758',NULL,'342 Main St','Houston','TX','77002-1234'),(902,'East Clinic','423-231-5235',NULL,'1670 Richmond','Houston','TX','77076-6366');
/*!40000 ALTER TABLE `Clinics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Demographics`
--

DROP TABLE IF EXISTS `Demographics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Demographics` (
  `Demo_ID` int NOT NULL AUTO_INCREMENT,
  `Has_insurance` enum('Yes','No') NOT NULL,
  `Age` int NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Sex` enum('M','F','Other') NOT NULL,
  `Ethnicity` enum('Asian/Pacific Islander','African-American','Native American','White','Hispanic','Other') NOT NULL,
  `Marital_status` enum('Single','Married','Widowed','Divorced','Separated') NOT NULL,
  `Home_phone` varchar(15) NOT NULL,
  `Cell_phone` varchar(15) DEFAULT NULL,
  `Work_phone` varchar(15) DEFAULT NULL,
  `Email` varchar(80) DEFAULT NULL,
  `Allergies` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`Demo_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1018 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Demographics`
--

LOCK TABLES `Demographics` WRITE;
/*!40000 ALTER TABLE `Demographics` DISABLE KEYS */;
INSERT INTO `Demographics` VALUES (1001,'No',75,'1945-01-01','M','Other','Widowed','(713) 123-3645','(713) 888-8888','(713) 888-8888','takeshi@patient.com','Tree pollen'),(1002,'Yes',28,'1992-01-01','M','Hispanic','Single','(713) 123-1241','(712) 123-1231','','hou@patient.com','Peanuts'),(1003,'Yes',31,'1989-01-01','F','White','Divorced','(713) 123-5647','','','chantal@patient.com',''),(1004,'Yes',58,'1962-01-01','F','Native American','Married','(713) 123-7568','(423) 444-5555','','lucretia@patient.com',''),(1005,'Yes',18,'2002-01-01','M','African-American','Single','(713) 123-3465','','','jonathan@patient.com',''),(1006,'Yes',20,'2000-01-01','M','Asian/Pacific Islander','Single','(713) 123-7475','','','aleksei@patient.com','Cilantro'),(1007,'No',23,'1993-01-01','M','Other','Single','(123) 231-2123','(123) 233-2112','','test@test.com','N/A'),(1008,'Yes',17,'2003-01-01','M','Other','Single','(413) 123-1231','','','patient@pat.com',''),(1009,'No',34,'1986-01-01','M','White','Single','(123) 124-1346','','','noins@test.com',''),(1010,'No',23,'1997-01-01','M','White','Single','(412) 123-1241','','','email@email.com',''),(1011,'No',23,'1997-01-01','M','White','Single','(412) 123-1241','','','email@email.com',''),(1012,'No',23,'1997-01-01','M','White','Single','(412) 123-1241','','','email@email.com',''),(1013,'No',20,'2000-01-01','M','White','Single','(123) 123-1231','','','email@email.com','Peanut'),(1014,'Yes',20,'2000-01-01','M','White','Single','(234) 234-3123','','','email@email.com','Peanuts'),(1015,'Yes',20,'2000-01-01','M','White','Single','(678) 123-1234','','','james@email.com','Leafy greens'),(1016,'Yes',70,'1940-01-03','F','White','Single','(456) 123-2525','','','sam@pants.com',''),(1017,'Yes',20,'2020-01-01','M','White','Single','(123) 123-1231','','','email@email.com','Peanuts');
/*!40000 ALTER TABLE `Demographics` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `no_work_phone` BEFORE INSERT ON `Demographics` FOR EACH ROW BEGIN
	IF (NEW.Work_phone IS NULL) THEN 
      SET NEW.Work_phone = NEW.Cell_phone;
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `minor_patient` BEFORE INSERT ON `Demographics` FOR EACH ROW BEGIN
	IF NEW.age < 18 THEN
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='This patient is a minor and thus cannot set up an account';
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Doctor_clinic`
--

DROP TABLE IF EXISTS `Doctor_clinic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Doctor_clinic` (
  `Clinic_ID` int NOT NULL,
  `NPI` bigint NOT NULL,
  PRIMARY KEY (`Clinic_ID`,`NPI`),
  KEY `NPI` (`NPI`),
  CONSTRAINT `doctor_clinic_ibfk_1` FOREIGN KEY (`Clinic_ID`) REFERENCES `Clinics` (`Clinic_ID`) ON DELETE CASCADE,
  CONSTRAINT `doctor_clinic_ibfk_2` FOREIGN KEY (`NPI`) REFERENCES `Doctors` (`NPI`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Doctor_clinic`
--

LOCK TABLES `Doctor_clinic` WRITE;
/*!40000 ALTER TABLE `Doctor_clinic` DISABLE KEYS */;
INSERT INTO `Doctor_clinic` VALUES (901,1234567890),(901,1342523141),(902,2196832962),(901,3251567654),(902,3251567654),(902,5882941572),(901,6734223145),(901,6767676767),(902,6767676767);
/*!40000 ALTER TABLE `Doctor_clinic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Doctor_patient`
--

DROP TABLE IF EXISTS `Doctor_patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Doctor_patient` (
  `PID` int NOT NULL,
  `NPI` bigint NOT NULL,
  PRIMARY KEY (`PID`,`NPI`),
  UNIQUE KEY `PID` (`PID`,`NPI`),
  KEY `NPI` (`NPI`),
  CONSTRAINT `doctor_patient_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `Patients` (`PID`) ON DELETE CASCADE,
  CONSTRAINT `doctor_patient_ibfk_2` FOREIGN KEY (`NPI`) REFERENCES `Doctors` (`NPI`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Doctor_patient`
--

LOCK TABLES `Doctor_patient` WRITE;
/*!40000 ALTER TABLE `Doctor_patient` DISABLE KEYS */;
INSERT INTO `Doctor_patient` VALUES (125236,1342523141),(325543,1342523141),(125236,2196832962),(123124,3251567654),(198664,3251567654),(234622,3251567654),(558998,3251567654),(123124,5882941572),(198664,6734223145),(325543,6734223145);
/*!40000 ALTER TABLE `Doctor_patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Doctors`
--

DROP TABLE IF EXISTS `Doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Doctors` (
  `NPI` bigint NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Work_phone` varchar(15) NOT NULL,
  `Fax` varchar(15) DEFAULT NULL,
  `Email` varchar(80) NOT NULL,
  `Specialist` enum('Yes','No') NOT NULL,
  `Specialization` varchar(80) NOT NULL,
  PRIMARY KEY (`NPI`),
  UNIQUE KEY `NPI` (`NPI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Doctors`
--

LOCK TABLES `Doctors` WRITE;
/*!40000 ALTER TABLE `Doctors` DISABLE KEYS */;
INSERT INTO `Doctors` VALUES (1234567890,'James Jones','password','(713) 456-1232','(713) 446-7888','jjones@clinic.com','Yes','Orthopedic Surgeon'),(1342523141,'Samantha Levi','password','(713) 342-1232',NULL,'slevi@clinic.com','No','General Practitioner'),(2196832962,'Preston Gross','password','(713) 233-0098','(713) 443-3456','pgross@clinic.com','Yes','Endocrinologist'),(3251567654,'Ada Lovejoy','password','(512) 112-2425','','alovejoy@clinic.com','No','General Practitioner'),(5882941572,'Kara Williams','password','(512) 234-5568','(512) 354-6650','kwilliams@clinic.com','Yes','Dermatologist'),(6734223145,'Eugene Gray','password','(713) 324-5887',NULL,'egray@clinic.com','Yes','Oncologist'),(6767676767,'Doc Sportello','password','(123) 123-6757','','doc@sportello.com','Yes','Doctor\'s Assistant');
/*!40000 ALTER TABLE `Doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Family_history`
--

DROP TABLE IF EXISTS `Family_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Family_history` (
  `Fam_Hist_ID` int NOT NULL AUTO_INCREMENT,
  `Fam_History` varchar(225) NOT NULL,
  PRIMARY KEY (`Fam_Hist_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=516 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Family_history`
--

LOCK TABLES `Family_history` WRITE;
/*!40000 ALTER TABLE `Family_history` DISABLE KEYS */;
INSERT INTO `Family_history` VALUES (501,'Mother had lung cancer'),(502,'Father had Type 2 diabetes. Mother\'s health unknown'),(503,'Cancer on mother\'s side'),(504,'Grandfather had 4 strokes'),(505,'N/A'),(506,''),(507,'Father\'s condition'),(508,''),(509,''),(510,''),(511,''),(512,''),(513,''),(514,''),(515,'');
/*!40000 ALTER TABLE `Family_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Medical_history`
--

DROP TABLE IF EXISTS `Medical_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Medical_history` (
  `Med_Hist_ID` int NOT NULL AUTO_INCREMENT,
  `Prev_conditions` varchar(225) DEFAULT NULL,
  `Past_surgeries` varchar(225) DEFAULT NULL,
  `Blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `Past_prescriptions` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`Med_Hist_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Medical_history`
--

LOCK TABLES `Medical_history` WRITE;
/*!40000 ALTER TABLE `Medical_history` DISABLE KEYS */;
INSERT INTO `Medical_history` VALUES (301,'Type 1 Diabetes','Heart surgery','A+',''),(302,'Type 1 diabetic','','O+','30 ml insulin per day'),(303,'Asthma','Appendix surgery','B-',''),(304,'N/A','N/A','A+','N/A'),(305,'','','A+',''),(306,'','Knee surgery','O+',''),(307,'','','B+',''),(308,'','','B+',''),(309,'','','B+',''),(310,'','','A+',''),(311,'','','A-',''),(312,'','','A+',''),(313,'','Leg surgery','B+',''),(314,'','','B+','');
/*!40000 ALTER TABLE `Medical_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nurses`
--

DROP TABLE IF EXISTS `Nurses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Nurses` (
  `NID` int NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Job_description` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`NID`),
  UNIQUE KEY `NID` (`NID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nurses`
--

LOCK TABLES `Nurses` WRITE;
/*!40000 ALTER TABLE `Nurses` DISABLE KEYS */;
INSERT INTO `Nurses` VALUES (12456,'password','Amanda Kubrick','amanda@nurse.com',''),(15233,'password','Justin Gruber','justin@nurse.com',NULL),(24933,'password','Ellen Grant','ellen@nurse.com','Twenty years of experience. Her mother\'s clinic was grand!'),(34534,'password','Samuel Norse','sam@nurse.com','Knows how to do IVs'),(78063,'password','Alaster Johnson','alas@asal.com','sdasdasfasf'),(87680,'password','Caitlin Gomez','caitlin@nurse.com','First year nurse');
/*!40000 ALTER TABLE `Nurses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Patients`
--

DROP TABLE IF EXISTS `Patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Patients` (
  `PID` int NOT NULL,
  `Password` varchar(80) NOT NULL,
  `First_Name` varchar(80) NOT NULL,
  `Last_Name` varchar(80) NOT NULL,
  `Last_4_SSN` int DEFAULT NULL,
  `Demographics_ID` int NOT NULL,
  `Med_Hist_ID` int NOT NULL,
  `Fam_Hist_ID` int NOT NULL,
  `NID` int DEFAULT NULL,
  PRIMARY KEY (`PID`),
  UNIQUE KEY `PID` (`PID`),
  KEY `Demographics_ID` (`Demographics_ID`),
  KEY `Med_Hist_ID` (`Med_Hist_ID`),
  KEY `Fam_Hist_ID` (`Fam_Hist_ID`),
  KEY `NID` (`NID`),
  CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`Demographics_ID`) REFERENCES `Demographics` (`Demo_ID`) ON DELETE CASCADE,
  CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`Med_Hist_ID`) REFERENCES `Medical_history` (`Med_Hist_ID`) ON DELETE CASCADE,
  CONSTRAINT `patients_ibfk_3` FOREIGN KEY (`Fam_Hist_ID`) REFERENCES `Family_history` (`Fam_Hist_ID`) ON DELETE CASCADE,
  CONSTRAINT `patients_ibfk_4` FOREIGN KEY (`NID`) REFERENCES `Nurses` (`NID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patients`
--

LOCK TABLES `Patients` WRITE;
/*!40000 ALTER TABLE `Patients` DISABLE KEYS */;
INSERT INTO `Patients` VALUES (123124,'password','Hou','Hsiao',2314,1002,301,502,34534),(125236,'password','Chantal','Akerman',8760,1003,301,501,87680),(198664,'password','Takeshi','Kitano',9454,1001,303,504,24933),(234622,'password','Lucretia','Martel',4534,1004,303,503,12456),(325543,'password','Aleksei','German',8799,1006,302,503,12456),(365057,'password','Jon','Jones',3343,1017,314,515,NULL),(537096,'password','Sam','Pants',8989,1016,313,514,NULL),(558998,'password','Jonathan','Glazer',2603,1005,302,502,34534),(679368,'password','James','Jones',4567,1015,312,513,NULL),(911168,'password','Noins','Guy',3434,1009,306,507,NULL);
/*!40000 ALTER TABLE `Patients` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `minor_appointment` BEFORE INSERT ON `Patients` FOR EACH ROW BEGIN
	DECLARE test_age INT;

	SELECT Age INTO test_age
	FROM Demographics WHERE Demo_ID=(SELECT Demographics_ID FROM Patients WHERE PID=NEW.PID);
	IF test_age < 18 THEN
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='This patient is a minor and thus cannot set up an account';
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Prescriptions`
--

DROP TABLE IF EXISTS `Prescriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Prescriptions` (
  `Prescript_ID` int NOT NULL AUTO_INCREMENT,
  `Prescript_Name` varchar(100) NOT NULL,
  `Dosage` varchar(225) NOT NULL,
  `Refill` enum('Y','N') NOT NULL,
  `Prescribing_doc` bigint NOT NULL,
  `Patient` int NOT NULL,
  `Expiration_date` datetime NOT NULL,
  PRIMARY KEY (`Prescript_ID`),
  KEY `Prescribing_doc` (`Prescribing_doc`),
  KEY `Patient` (`Patient`),
  CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`Prescribing_doc`) REFERENCES `Doctors` (`NPI`) ON DELETE CASCADE,
  CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`Patient`) REFERENCES `Patients` (`PID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=706 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prescriptions`
--

LOCK TABLES `Prescriptions` WRITE;
/*!40000 ALTER TABLE `Prescriptions` DISABLE KEYS */;
INSERT INTO `Prescriptions` VALUES (701,'Penicillin','20 ml per every other day','Y',3251567654,123124,'2020-08-01 08:00:00'),(702,'Amoxicillin','2 pills every day','N',3251567654,234622,'2020-12-12 10:00:00'),(703,'Lung Steroid','1 pill every day','N',1342523141,325543,'2020-12-12 10:00:00'),(705,'Levemir','Daily','Y',3251567654,123124,'2021-04-04 12:00:00');
/*!40000 ALTER TABLE `Prescriptions` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `out_of_date_Script` BEFORE INSERT ON `Prescriptions` FOR EACH ROW BEGIN
	IF(NEW.Expiration_date < Now()) THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Prescription expiration date is in the past';
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `duplicate_Script` BEFORE INSERT ON `Prescriptions` FOR EACH ROW BEGIN
	IF(EXISTS(SELECT 1 from Prescriptions WHERE
		Prescript_Name = NEW.Prescript_Name AND
		Patient = NEW.Patient)) THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Patient is already taking medication.';
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-23 21:22:23
