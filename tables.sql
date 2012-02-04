-- MySQL dump 10.11
--
-- Host: localhost    Database: isiomann_a
-- ------------------------------------------------------
-- Server version	5.0.67-community

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
-- Table structure for table `Listserv`
--

DROP TABLE IF EXISTS `Listserv`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `Listserv` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `Listserv`
--

LOCK TABLES `Listserv` WRITE;
/*!40000 ALTER TABLE `Listserv` DISABLE KEYS */;
/*!40000 ALTER TABLE `Listserv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,404),(2,1,NULL,NULL,'Administration',2,7),(3,2,NULL,NULL,'admin_index',3,4),(4,2,NULL,NULL,'isAuthorized',5,6),(5,1,NULL,NULL,'Categories',8,31),(6,5,NULL,NULL,'manager_index',9,10),(7,5,NULL,NULL,'manager_add',11,12),(8,5,NULL,NULL,'manager_edit',13,14),(9,5,NULL,NULL,'manager_view',15,16),(10,5,NULL,NULL,'manager_delete',17,18),(11,5,NULL,NULL,'admin_index',19,20),(12,5,NULL,NULL,'admin_add',21,22),(13,5,NULL,NULL,'admin_edit',23,24),(14,5,NULL,NULL,'admin_view',25,26),(15,5,NULL,NULL,'admin_delete',27,28),(16,5,NULL,NULL,'isAuthorized',29,30),(17,1,NULL,NULL,'Content',32,41),(18,17,NULL,NULL,'index',33,34),(19,17,NULL,NULL,'home',35,36),(20,17,NULL,NULL,'display',37,38),(21,17,NULL,NULL,'isAuthorized',39,40),(22,1,NULL,NULL,'Contents',42,65),(23,22,NULL,NULL,'manager_forceUnlock',43,44),(24,22,NULL,NULL,'manager_index',45,46),(25,22,NULL,NULL,'manager_add',47,48),(26,22,NULL,NULL,'manager_edit',49,50),(27,22,NULL,NULL,'manager_view',51,52),(28,22,NULL,NULL,'manager_delete',53,54),(29,22,NULL,NULL,'admin_add',55,56),(30,22,NULL,NULL,'admin_edit',57,58),(31,22,NULL,NULL,'admin_view',59,60),(32,22,NULL,NULL,'admin_delete',61,62),(33,22,NULL,NULL,'isAuthorized',63,64),(34,1,NULL,NULL,'Errors',66,71),(35,34,NULL,NULL,'fourofour',67,68),(36,34,NULL,NULL,'isAuthorized',69,70),(37,1,NULL,NULL,'Events',72,113),(38,37,NULL,NULL,'index',73,74),(39,37,NULL,NULL,'view',75,76),(40,37,NULL,NULL,'add',77,78),(41,37,NULL,NULL,'edit',79,80),(42,37,NULL,NULL,'delete',81,82),(43,37,NULL,NULL,'calendar',83,84),(44,37,NULL,NULL,'isCurrent',85,86),(45,37,NULL,NULL,'authorize',87,88),(46,37,NULL,NULL,'manager_index',89,90),(47,37,NULL,NULL,'manager_view',91,92),(48,37,NULL,NULL,'manager_add',93,94),(49,37,NULL,NULL,'manager_edit',95,96),(50,37,NULL,NULL,'manager_delete',97,98),(51,37,NULL,NULL,'user_index',99,100),(52,37,NULL,NULL,'user',101,102),(53,37,NULL,NULL,'user_view',103,104),(54,37,NULL,NULL,'user_add',105,106),(55,37,NULL,NULL,'user_edit',107,108),(56,37,NULL,NULL,'user_delete',109,110),(57,37,NULL,NULL,'isAuthorized',111,112),(58,1,NULL,NULL,'Fields',114,127),(59,58,NULL,NULL,'index',115,116),(60,58,NULL,NULL,'view',117,118),(61,58,NULL,NULL,'add',119,120),(62,58,NULL,NULL,'edit',121,122),(63,58,NULL,NULL,'delete',123,124),(64,58,NULL,NULL,'isAuthorized',125,126),(65,1,NULL,NULL,'Galleries',128,147),(66,65,NULL,NULL,'index',129,130),(67,65,NULL,NULL,'view',131,132),(68,65,NULL,NULL,'manager_index',133,134),(69,65,NULL,NULL,'manager_view',135,136),(70,65,NULL,NULL,'manager_add',137,138),(71,65,NULL,NULL,'manager_edit',139,140),(72,65,NULL,NULL,'manager_delete',141,142),(73,65,NULL,NULL,'facebook',143,144),(74,65,NULL,NULL,'isAuthorized',145,146),(75,1,NULL,NULL,'Groups',148,163),(76,75,NULL,NULL,'delete',149,150),(77,75,NULL,NULL,'admin_index',151,152),(78,75,NULL,NULL,'admin_add',153,154),(79,75,NULL,NULL,'admin_edit',155,156),(80,75,NULL,NULL,'admin_view',157,158),(81,75,NULL,NULL,'admin_delete',159,160),(82,75,NULL,NULL,'isAuthorized',161,162),(83,1,NULL,NULL,'Logs',164,177),(84,83,NULL,NULL,'index',165,166),(85,83,NULL,NULL,'view',167,168),(86,83,NULL,NULL,'add',169,170),(87,83,NULL,NULL,'edit',171,172),(88,83,NULL,NULL,'delete',173,174),(89,83,NULL,NULL,'isAuthorized',175,176),(90,1,NULL,NULL,'Management',178,185),(91,90,NULL,NULL,'manager_index',179,180),(92,90,NULL,NULL,'manager_member_groups',181,182),(93,90,NULL,NULL,'isAuthorized',183,184),(94,1,NULL,NULL,'MediaFiles',186,199),(95,94,NULL,NULL,'manager_index',187,188),(96,94,NULL,NULL,'manager_add',189,190),(97,94,NULL,NULL,'manager_edit',191,192),(98,94,NULL,NULL,'manager_view',193,194),(99,94,NULL,NULL,'manager_delete',195,196),(100,94,NULL,NULL,'isAuthorized',197,198),(101,1,NULL,NULL,'MemberGroups',200,217),(102,101,NULL,NULL,'view',201,202),(103,101,NULL,NULL,'manager_index',203,204),(104,101,NULL,NULL,'manager_add',205,206),(105,101,NULL,NULL,'manager_edit',207,208),(106,101,NULL,NULL,'manager_view',209,210),(107,101,NULL,NULL,'manager_delete',211,212),(108,101,NULL,NULL,'user_index',213,214),(109,101,NULL,NULL,'isAuthorized',215,216),(110,1,NULL,NULL,'Members',218,245),(111,110,NULL,NULL,'index',219,220),(112,110,NULL,NULL,'view',221,222),(113,110,NULL,NULL,'add',223,224),(114,110,NULL,NULL,'edit',225,226),(115,110,NULL,NULL,'delete',227,228),(116,110,NULL,NULL,'manager_add',229,230),(117,110,NULL,NULL,'manager_edit',231,232),(118,110,NULL,NULL,'manager_delete',233,234),(119,110,NULL,NULL,'manager_index',235,236),(120,110,NULL,NULL,'user_index',237,238),(121,110,NULL,NULL,'user_view',239,240),(122,110,NULL,NULL,'user_edit',241,242),(123,110,NULL,NULL,'isAuthorized',243,244),(124,1,NULL,NULL,'Menus',246,259),(125,124,NULL,NULL,'index',247,248),(126,124,NULL,NULL,'view',249,250),(127,124,NULL,NULL,'add',251,252),(128,124,NULL,NULL,'edit',253,254),(129,124,NULL,NULL,'delete',255,256),(130,124,NULL,NULL,'isAuthorized',257,258),(131,1,NULL,NULL,'Pages',260,265),(132,131,NULL,NULL,'display',261,262),(133,131,NULL,NULL,'isAuthorized',263,264),(134,1,NULL,NULL,'Permissions',266,273),(135,134,NULL,NULL,'admin_index',267,268),(136,134,NULL,NULL,'admin_setPermissions',269,270),(137,134,NULL,NULL,'isAuthorized',271,272),(138,1,NULL,NULL,'ProfileLayouts',274,285),(139,138,NULL,NULL,'manager_index',275,276),(140,138,NULL,NULL,'manager_add',277,278),(141,138,NULL,NULL,'manager_edit',279,280),(142,138,NULL,NULL,'manager_delete',281,282),(143,138,NULL,NULL,'isAuthorized',283,284),(144,1,NULL,NULL,'Profiles',286,307),(145,144,NULL,NULL,'admin_index',287,288),(146,144,NULL,NULL,'index',289,290),(147,144,NULL,NULL,'view',291,292),(148,144,NULL,NULL,'manager_add',293,294),(149,144,NULL,NULL,'manager_edit',295,296),(150,144,NULL,NULL,'manager_view',297,298),(151,144,NULL,NULL,'user_index',299,300),(152,144,NULL,NULL,'user_view',301,302),(153,144,NULL,NULL,'user_edit',303,304),(154,144,NULL,NULL,'isAuthorized',305,306),(155,1,NULL,NULL,'Services',308,315),(156,155,NULL,NULL,'mailinglist',309,310),(157,155,NULL,NULL,'contact',311,312),(158,155,NULL,NULL,'isAuthorized',313,314),(159,1,NULL,NULL,'Settings',316,337),(160,159,NULL,NULL,'admin_index',317,318),(161,159,NULL,NULL,'admin_databases',319,320),(162,159,NULL,NULL,'admin_database',321,322),(163,159,NULL,NULL,'admin_csvdatabase',323,324),(164,159,NULL,NULL,'admin_mysqldatabase',325,326),(165,159,NULL,NULL,'admin_config',327,328),(166,159,NULL,NULL,'admin_routes',329,330),(167,159,NULL,NULL,'admin_variables',331,332),(168,159,NULL,NULL,'admin_variable',333,334),(169,159,NULL,NULL,'isAuthorized',335,336),(170,1,NULL,NULL,'SiteLayouts',338,351),(171,170,NULL,NULL,'manager_index',339,340),(172,170,NULL,NULL,'manager_add',341,342),(173,170,NULL,NULL,'manager_edit',343,344),(174,170,NULL,NULL,'manager_view',345,346),(175,170,NULL,NULL,'manager_delete',347,348),(176,170,NULL,NULL,'isAuthorized',349,350),(177,1,NULL,NULL,'Themes',352,365),(178,177,NULL,NULL,'index',353,354),(179,177,NULL,NULL,'view',355,356),(180,177,NULL,NULL,'add',357,358),(181,177,NULL,NULL,'edit',359,360),(182,177,NULL,NULL,'delete',361,362),(183,177,NULL,NULL,'isAuthorized',363,364),(184,1,NULL,NULL,'UserManagement',366,371),(185,184,NULL,NULL,'user_index',367,368),(186,184,NULL,NULL,'isAuthorized',369,370),(187,1,NULL,NULL,'Users',372,401),(188,187,NULL,NULL,'login',373,374),(189,187,NULL,NULL,'logout',375,376),(190,187,NULL,NULL,'user_login',377,378),(191,187,NULL,NULL,'manager_login',379,380),(192,187,NULL,NULL,'admin_login',381,382),(193,187,NULL,NULL,'manager_logout',383,384),(194,187,NULL,NULL,'user_logout',385,386),(195,187,NULL,NULL,'admin_logout',387,388),(196,187,NULL,NULL,'admin_index',389,390),(197,187,NULL,NULL,'admin_add',391,392),(198,187,NULL,NULL,'admin_edit',393,394),(199,187,NULL,NULL,'admin_view',395,396),(200,187,NULL,NULL,'admin_delete',397,398),(201,187,NULL,NULL,'isAuthorized',399,400),(202,1,NULL,NULL,'AclExtras',402,403);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `aros`
--

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` VALUES (1,NULL,'Group',1,NULL,1,4),(2,NULL,'Group',2,NULL,5,6),(3,NULL,'Group',3,NULL,7,8),(4,1,'User',1,NULL,2,3);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL auto_increment,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL default '0',
  `_read` varchar(2) NOT NULL default '0',
  `_update` varchar(2) NOT NULL default '0',
  `_delete` varchar(2) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM AUTO_INCREMENT=266 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `aros_acos`
--

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (1,1,1,'1','1','1','1'),(2,2,1,'-1','-1','-1','-1'),(3,2,3,'-1','-1','-1','-1'),(4,2,4,'-1','-1','-1','-1'),(5,2,6,'1','1','1','1'),(6,2,7,'1','1','1','1'),(7,2,8,'1','1','1','1'),(8,2,9,'1','1','1','1'),(9,2,10,'1','1','1','1'),(10,2,11,'-1','-1','-1','-1'),(11,2,12,'-1','-1','-1','-1'),(12,2,13,'-1','-1','-1','-1'),(13,2,14,'-1','-1','-1','-1'),(14,2,15,'-1','-1','-1','-1'),(15,2,16,'-1','-1','-1','-1'),(16,2,18,'-1','-1','-1','-1'),(17,2,19,'-1','-1','-1','-1'),(18,2,20,'-1','-1','-1','-1'),(19,2,21,'-1','-1','-1','-1'),(20,2,23,'1','1','1','1'),(21,2,24,'1','1','1','1'),(22,2,25,'1','1','1','1'),(23,2,26,'1','1','1','1'),(24,2,27,'1','1','1','1'),(25,2,28,'1','1','1','1'),(26,2,29,'-1','-1','-1','-1'),(27,2,30,'-1','-1','-1','-1'),(28,2,31,'-1','-1','-1','-1'),(29,2,32,'-1','-1','-1','-1'),(30,2,33,'-1','-1','-1','-1'),(31,2,38,'-1','-1','-1','-1'),(32,2,39,'-1','-1','-1','-1'),(33,2,40,'-1','-1','-1','-1'),(34,2,41,'-1','-1','-1','-1'),(35,2,42,'-1','-1','-1','-1'),(36,2,43,'-1','-1','-1','-1'),(37,2,44,'-1','-1','-1','-1'),(38,2,45,'-1','-1','-1','-1'),(39,2,46,'1','1','1','1'),(40,2,47,'1','1','1','1'),(41,2,48,'1','1','1','1'),(42,2,49,'1','1','1','1'),(43,2,50,'1','1','1','1'),(44,2,51,'-1','-1','-1','-1'),(45,2,52,'-1','-1','-1','-1'),(46,2,53,'-1','-1','-1','-1'),(47,2,54,'-1','-1','-1','-1'),(48,2,55,'-1','-1','-1','-1'),(49,2,56,'-1','-1','-1','-1'),(50,2,57,'-1','-1','-1','-1'),(51,2,59,'-1','-1','-1','-1'),(52,2,60,'-1','-1','-1','-1'),(53,2,61,'-1','-1','-1','-1'),(54,2,62,'-1','-1','-1','-1'),(55,2,63,'-1','-1','-1','-1'),(56,2,64,'-1','-1','-1','-1'),(57,2,66,'-1','-1','-1','-1'),(58,2,67,'-1','-1','-1','-1'),(59,2,68,'1','1','1','1'),(60,2,69,'1','1','1','1'),(61,2,70,'1','1','1','1'),(62,2,71,'1','1','1','1'),(63,2,72,'1','1','1','1'),(64,2,73,'-1','-1','-1','-1'),(65,2,74,'-1','-1','-1','-1'),(66,2,91,'1','1','1','1'),(67,2,92,'1','1','1','1'),(68,2,93,'-1','-1','-1','-1'),(69,2,95,'1','1','1','1'),(70,2,96,'1','1','1','1'),(71,2,97,'1','1','1','1'),(72,2,98,'1','1','1','1'),(73,2,99,'1','1','1','1'),(74,2,100,'-1','-1','-1','-1'),(75,2,102,'-1','-1','-1','-1'),(76,2,103,'1','1','1','1'),(77,2,104,'1','1','1','1'),(78,2,105,'1','1','1','1'),(79,2,106,'1','1','1','1'),(80,2,107,'1','1','1','1'),(81,2,108,'-1','-1','-1','-1'),(82,2,109,'-1','-1','-1','-1'),(83,2,111,'-1','-1','-1','-1'),(84,2,112,'-1','-1','-1','-1'),(85,2,113,'-1','-1','-1','-1'),(86,2,114,'-1','-1','-1','-1'),(87,2,115,'-1','-1','-1','-1'),(88,2,116,'1','1','1','1'),(89,2,117,'1','1','1','1'),(90,2,118,'1','1','1','1'),(91,2,119,'1','1','1','1'),(92,2,120,'-1','-1','-1','-1'),(93,2,121,'-1','-1','-1','-1'),(94,2,122,'-1','-1','-1','-1'),(95,2,123,'-1','-1','-1','-1'),(96,2,125,'-1','-1','-1','-1'),(97,2,126,'-1','-1','-1','-1'),(98,2,127,'-1','-1','-1','-1'),(99,2,128,'-1','-1','-1','-1'),(100,2,129,'-1','-1','-1','-1'),(101,2,130,'-1','-1','-1','-1'),(102,2,139,'1','1','1','1'),(103,2,140,'1','1','1','1'),(104,2,141,'1','1','1','1'),(105,2,142,'1','1','1','1'),(106,2,143,'-1','-1','-1','-1'),(107,2,145,'-1','-1','-1','-1'),(108,2,146,'-1','-1','-1','-1'),(109,2,147,'-1','-1','-1','-1'),(110,2,148,'1','1','1','1'),(111,2,149,'1','1','1','1'),(112,2,150,'1','1','1','1'),(113,2,151,'-1','-1','-1','-1'),(114,2,152,'-1','-1','-1','-1'),(115,2,153,'-1','-1','-1','-1'),(116,2,154,'-1','-1','-1','-1'),(117,2,156,'-1','-1','-1','-1'),(118,2,157,'-1','-1','-1','-1'),(119,2,158,'-1','-1','-1','-1'),(120,2,171,'1','1','1','1'),(121,2,172,'1','1','1','1'),(122,2,173,'1','1','1','1'),(123,2,174,'1','1','1','1'),(124,2,175,'1','1','1','1'),(125,2,176,'-1','-1','-1','-1'),(126,2,178,'-1','-1','-1','-1'),(127,2,179,'-1','-1','-1','-1'),(128,2,180,'-1','-1','-1','-1'),(129,2,181,'-1','-1','-1','-1'),(130,2,182,'-1','-1','-1','-1'),(131,2,183,'-1','-1','-1','-1'),(132,2,185,'-1','-1','-1','-1'),(133,2,186,'-1','-1','-1','-1'),(134,3,1,'-1','-1','-1','-1'),(135,3,3,'-1','-1','-1','-1'),(136,3,4,'-1','-1','-1','-1'),(137,3,6,'-1','-1','-1','-1'),(138,3,7,'-1','-1','-1','-1'),(139,3,8,'-1','-1','-1','-1'),(140,3,9,'-1','-1','-1','-1'),(141,3,10,'-1','-1','-1','-1'),(142,3,11,'-1','-1','-1','-1'),(143,3,12,'-1','-1','-1','-1'),(144,3,13,'-1','-1','-1','-1'),(145,3,14,'-1','-1','-1','-1'),(146,3,15,'-1','-1','-1','-1'),(147,3,16,'-1','-1','-1','-1'),(148,3,18,'-1','-1','-1','-1'),(149,3,19,'-1','-1','-1','-1'),(150,3,20,'-1','-1','-1','-1'),(151,3,21,'-1','-1','-1','-1'),(152,3,23,'-1','-1','-1','-1'),(153,3,24,'-1','-1','-1','-1'),(154,3,25,'-1','-1','-1','-1'),(155,3,26,'-1','-1','-1','-1'),(156,3,27,'-1','-1','-1','-1'),(157,3,28,'-1','-1','-1','-1'),(158,3,29,'-1','-1','-1','-1'),(159,3,30,'-1','-1','-1','-1'),(160,3,31,'-1','-1','-1','-1'),(161,3,32,'-1','-1','-1','-1'),(162,3,33,'-1','-1','-1','-1'),(163,3,38,'-1','-1','-1','-1'),(164,3,39,'-1','-1','-1','-1'),(165,3,40,'-1','-1','-1','-1'),(166,3,41,'-1','-1','-1','-1'),(167,3,42,'-1','-1','-1','-1'),(168,3,43,'-1','-1','-1','-1'),(169,3,44,'-1','-1','-1','-1'),(170,3,45,'-1','-1','-1','-1'),(171,3,46,'-1','-1','-1','-1'),(172,3,47,'-1','-1','-1','-1'),(173,3,48,'-1','-1','-1','-1'),(174,3,49,'-1','-1','-1','-1'),(175,3,50,'-1','-1','-1','-1'),(176,3,51,'-1','-1','-1','-1'),(177,3,52,'-1','-1','-1','-1'),(178,3,53,'-1','-1','-1','-1'),(179,3,54,'-1','-1','-1','-1'),(180,3,55,'-1','-1','-1','-1'),(181,3,56,'-1','-1','-1','-1'),(182,3,57,'-1','-1','-1','-1'),(183,3,59,'-1','-1','-1','-1'),(184,3,60,'-1','-1','-1','-1'),(185,3,61,'-1','-1','-1','-1'),(186,3,62,'-1','-1','-1','-1'),(187,3,63,'-1','-1','-1','-1'),(188,3,64,'-1','-1','-1','-1'),(189,3,66,'-1','-1','-1','-1'),(190,3,67,'-1','-1','-1','-1'),(191,3,68,'-1','-1','-1','-1'),(192,3,69,'-1','-1','-1','-1'),(193,3,70,'-1','-1','-1','-1'),(194,3,71,'-1','-1','-1','-1'),(195,3,72,'-1','-1','-1','-1'),(196,3,73,'-1','-1','-1','-1'),(197,3,74,'-1','-1','-1','-1'),(198,3,91,'-1','-1','-1','-1'),(199,3,92,'-1','-1','-1','-1'),(200,3,93,'-1','-1','-1','-1'),(201,3,95,'-1','-1','-1','-1'),(202,3,96,'-1','-1','-1','-1'),(203,3,97,'-1','-1','-1','-1'),(204,3,98,'-1','-1','-1','-1'),(205,3,99,'-1','-1','-1','-1'),(206,3,100,'-1','-1','-1','-1'),(207,3,102,'-1','-1','-1','-1'),(208,3,103,'-1','-1','-1','-1'),(209,3,104,'-1','-1','-1','-1'),(210,3,105,'-1','-1','-1','-1'),(211,3,106,'-1','-1','-1','-1'),(212,3,107,'-1','-1','-1','-1'),(213,3,108,'-1','-1','-1','-1'),(214,3,109,'-1','-1','-1','-1'),(215,3,111,'-1','-1','-1','-1'),(216,3,112,'-1','-1','-1','-1'),(217,3,113,'-1','-1','-1','-1'),(218,3,114,'-1','-1','-1','-1'),(219,3,115,'-1','-1','-1','-1'),(220,3,116,'-1','-1','-1','-1'),(221,3,117,'-1','-1','-1','-1'),(222,3,118,'-1','-1','-1','-1'),(223,3,119,'-1','-1','-1','-1'),(224,3,120,'-1','-1','-1','-1'),(225,3,121,'-1','-1','-1','-1'),(226,3,122,'-1','-1','-1','-1'),(227,3,123,'-1','-1','-1','-1'),(228,3,125,'-1','-1','-1','-1'),(229,3,126,'-1','-1','-1','-1'),(230,3,127,'-1','-1','-1','-1'),(231,3,128,'-1','-1','-1','-1'),(232,3,129,'-1','-1','-1','-1'),(233,3,130,'-1','-1','-1','-1'),(234,3,139,'-1','-1','-1','-1'),(235,3,140,'-1','-1','-1','-1'),(236,3,141,'-1','-1','-1','-1'),(237,3,142,'-1','-1','-1','-1'),(238,3,143,'-1','-1','-1','-1'),(239,3,145,'-1','-1','-1','-1'),(240,3,146,'-1','-1','-1','-1'),(241,3,147,'-1','-1','-1','-1'),(242,3,148,'-1','-1','-1','-1'),(243,3,149,'-1','-1','-1','-1'),(244,3,150,'-1','-1','-1','-1'),(245,3,151,'-1','-1','-1','-1'),(246,3,152,'-1','-1','-1','-1'),(247,3,153,'-1','-1','-1','-1'),(248,3,154,'-1','-1','-1','-1'),(249,3,156,'-1','-1','-1','-1'),(250,3,157,'-1','-1','-1','-1'),(251,3,158,'-1','-1','-1','-1'),(252,3,171,'-1','-1','-1','-1'),(253,3,172,'-1','-1','-1','-1'),(254,3,173,'-1','-1','-1','-1'),(255,3,174,'-1','-1','-1','-1'),(256,3,175,'-1','-1','-1','-1'),(257,3,176,'-1','-1','-1','-1'),(258,3,178,'-1','-1','-1','-1'),(259,3,179,'-1','-1','-1','-1'),(260,3,180,'-1','-1','-1','-1'),(261,3,181,'-1','-1','-1','-1'),(262,3,182,'-1','-1','-1','-1'),(263,3,183,'-1','-1','-1','-1'),(264,3,185,'-1','-1','-1','-1'),(265,3,186,'-1','-1','-1','-1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'navigation','2011-12-05 00:32:02','2011-12-05 00:32:02',NULL),(2,'footer','2011-12-05 00:43:02','2011-12-05 00:43:02',NULL),(3,'administrator','2011-12-06 15:02:55','2011-12-06 15:02:55',NULL),(4,'uncategorized','2011-12-07 20:38:10','2011-12-07 20:38:10',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `contents` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `html` text,
  `js` text,
  `css` text,
  `css_files` text,
  `js_files` text,
  `alias` varchar(255) default NULL,
  `category_id` int(11) default NULL,
  `redirect` text,
  `parent` int(11) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `ordering` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `events` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `start_time` datetime default NULL,
  `end_time` datetime default NULL,
  `full_description` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `location` varchar(255) NOT NULL default '',
  `picture` varchar(255) default NULL,
  `featured_event` tinyint(4) NOT NULL,
  `banner_image` varchar(255) default NULL,
  `categories` varchar(255) default NULL,
  `has_registration` enum('1','0') NOT NULL default '0',
  `registration_expiration_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `galleries` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `variables` text,
  `description` varchar(255) default NULL,
  `source` varchar(255) default NULL,
  `picture` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'root','2011-12-01 18:31:36','2011-12-13 18:25:18','System administrators'),(2,'managers','2011-12-01 18:31:56','2011-12-01 18:32:24','System users '),(3,'disabled users','2011-12-13 17:09:36','2011-12-13 17:09:36','Disabled Users');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_entries`
--

DROP TABLE IF EXISTS `log_entries`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `log_entries` (
  `id` int(11) NOT NULL auto_increment,
  `log_id` int(11) NOT NULL,
  `level` enum('error','informational','user_login','user_logout') default NULL,
  `source` varchar(255) default NULL,
  `message` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `log_entries`
--

LOCK TABLES `log_entries` WRITE;
/*!40000 ALTER TABLE `log_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'User','This Log documents all user model events','2011-12-08 17:17:09','2011-12-08 21:26:28'),(2,'Uncategorized','Uncategorized log messages','2011-12-08 17:22:18','2011-12-08 21:26:21'),(3,'Security','Lists events regarding system security','2011-12-08 21:26:14','2011-12-08 21:26:14');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_files`
--

DROP TABLE IF EXISTS `media_files`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `media_files` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `fileType` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `media_files`
--

LOCK TABLES `media_files` WRITE;
/*!40000 ALTER TABLE `media_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_groups`
--

DROP TABLE IF EXISTS `member_groups`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `member_groups` (
  `id` int(11) NOT NULL auto_increment,
  `group_id` int(11) NOT NULL,
  `profile_layout_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `member_groups`
--

LOCK TABLES `member_groups` WRITE;
/*!40000 ALTER TABLE `member_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `members` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `avatar` text NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `member_group_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_layouts`
--

DROP TABLE IF EXISTS `profile_layouts`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `profile_layouts` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `css_files` text,
  `js_files` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `profile_layouts`
--

LOCK TABLES `profile_layouts` WRITE;
/*!40000 ALTER TABLE `profile_layouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL auto_increment,
  `member_id` int(11) default NULL,
  `fields` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_layouts`
--

DROP TABLE IF EXISTS `site_layouts`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `site_layouts` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) default NULL,
  `js_files` varchar(255) default NULL,
  `css_files` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `site_layouts`
--

LOCK TABLES `site_layouts` WRITE;
/*!40000 ALTER TABLE `site_layouts` DISABLE KEYS */;
INSERT INTO `site_layouts` VALUES (1,'administrator','The default layout for the configuration pages',NULL,NULL,'2011-12-17 20:28:37','2012-01-22 22:31:20'),(2,'main','The default layout for the main site',NULL,NULL,'2011-12-17 20:59:30','2012-01-29 11:57:17'),(3,'management','The default layout for the management pages',NULL,NULL,'2011-12-28 19:02:46','2012-01-22 22:31:54'),(4,'user_management','The default layout for the user management pages',NULL,NULL,'2012-01-22 19:02:22','2012-01-22 19:03:00');
/*!40000 ALTER TABLE `site_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `last_login` datetime default NULL,
  `full_name` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'root','cd4cf863eb24671d90eae3da9b146af39c5ad606',1,'2011-12-01 18:40:35','2012-02-04 16:59:00',NULL,'toasty','toast@toasty.om');
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