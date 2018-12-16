CREATE DATABASE  IF NOT EXISTS `bitter-rf` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bitter-rf`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bitter-rf
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `FK_follows` (`from_id`),
  KEY `FK_follows2` (`to_id`),
  CONSTRAINT `FK_follows` FOREIGN KEY (`from_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `FK_follows2` FOREIGN KEY (`to_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (65,142,140),(66,142,110),(67,64,65),(68,131,137),(69,131,138),(70,131,129),(71,65,131),(72,137,143),(73,137,131),(74,137,144),(75,137,110),(76,137,140),(77,137,139),(78,137,128),(79,137,129),(80,139,138),(81,139,137),(82,145,142),(83,145,143),(84,145,65),(85,127,145),(86,127,137),(87,127,142),(88,145,131),(89,146,142),(90,146,129),(91,146,128),(92,65,146),(93,139,127),(94,139,131),(95,147,129),(96,147,127),(97,147,142),(98,147,139),(99,147,128),(100,65,147),(101,148,142),(102,148,129),(103,148,131),(104,65,148),(105,147,148),(106,65,129),(107,64,142),(108,65,145),(109,65,144),(110,65,110),(111,65,132),(112,65,142),(113,142,65),(114,142,148),(115,142,139),(116,142,132),(117,65,139),(118,65,65),(119,65,127),(120,65,140),(121,64,127),(122,65,64),(123,128,143),(124,128,65),(125,127,65),(126,147,65),(127,65,128),(128,153,143),(129,153,65),(130,153,146),(131,153,145),(132,153,127),(133,65,153),(134,65,137),(135,65,152);
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `tweet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`like_id`),
  KEY `FK_tweet_id_idx` (`tweet_id`),
  KEY `FK_user_id_idx` (`user_id`),
  CONSTRAINT `FK_tweet_id` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`tweet_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=495 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (482,146,65,'2018-11-27 18:19:41'),(483,143,65,'2018-11-27 18:19:43'),(484,152,153,'2018-12-05 20:41:46'),(485,149,153,'2018-12-05 20:41:50'),(486,146,153,'2018-12-05 20:41:53'),(488,155,65,'2018-12-05 23:12:13'),(491,152,65,'2018-12-05 23:12:24'),(492,129,65,'2018-12-05 23:15:43');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message_text` varchar(255) NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_toid_idx` (`id`,`from_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (7,64,65,'It works ','2018-11-27 15:06:18'),(8,140,65,'Success!','2018-11-27 15:06:21'),(9,65,64,'zcxv','2018-11-27 10:53:55'),(10,65,153,'Nine Nine','2018-12-05 10:37:45'),(11,65,142,'You are Spiderman','2018-12-05 10:51:48'),(12,65,127,'assaf','2018-12-07 05:33:20'),(13,65,127,'Hey Nick!\r\n\r\nThis was a Great Project I really enjoyed it','2018-12-07 05:37:32');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tweets` (
  `tweet_id` int(11) NOT NULL AUTO_INCREMENT,
  `tweet_text` varchar(280) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `original_tweet_id` int(11) NOT NULL DEFAULT '0',
  `reply_to_tweet_id` int(11) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tweet_id`),
  KEY `FK_tweets` (`user_id`),
  CONSTRAINT `FK_tweets` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
INSERT INTO `tweets` VALUES (1,'',NULL,0,0,'2018-10-22 02:46:09'),(4,'This Assignment is a Challenge! ',127,0,0,'2018-10-22 03:14:40'),(5,'This is Working!',65,0,0,'2018-10-22 03:21:12'),(6,'Time To make the Tweets Appear!',65,0,0,'2018-10-22 03:21:33'),(8,'We have no problem wearing the same socks all day, but once they come off for one second, itâ€™s gross to put them back on.',65,0,0,'2018-10-22 18:36:29'),(9,'WILMA!!!',128,0,0,'2018-10-22 18:39:08'),(14,'Wow! What a great site!',127,0,0,'2018-10-22 19:38:20'),(15,'YABADA DOO!',128,0,0,'2018-10-22 19:39:24'),(17,'Pass Me The Butter',64,0,0,'2018-10-22 19:48:55'),(18,'I do not have dreams, I Have Goals.',65,0,0,'2018-10-22 19:52:22'),(19,'Check out The Late Show! Tonight at 11!',129,0,0,'2018-10-22 21:24:56'),(20,'Have a Great Monday Everyone!',131,0,0,'2018-10-22 21:26:08'),(21,' I am the liquor',138,0,0,'2018-10-22 22:07:17'),(22,'I will build a great, great wall on our southern border, and I will have Mexico pay for that wall. Mark my words',137,0,0,'2018-10-22 22:08:50'),(23,'The king being â€œpoisonedâ€ was probably sometimes just a reaction to a food allergy.',139,0,0,'2018-10-22 22:43:05'),(24,'\"Short, sweet, and to the point\" is a long way of saying \"concise\".',139,0,0,'2018-10-22 22:44:54'),(25,'The more bad guys that a hero is facing in a movie, the better their chance of survival; 1v5 is no problem but 1v1 will see the hero messed up pretty bad.',139,0,0,'2018-10-22 22:44:58'),(26,'Harry Potter is way too emotionally stable for a kid raised by a family who hates him.',64,0,0,'2018-10-22 22:45:35'),(27,'I Refuse To Quit',140,0,0,'2018-10-23 13:41:07'),(30,'Wuba Luba Dub Dub!!',64,0,0,'2018-10-24 15:01:28'),(31,'If you\'re 25 and single in 2018, nobody bats an eye. If you\'re 25 and single in 1818, people worry you\'ll die an old maid. If you\'re 25 and single in 1418, it\'s because your third husband just died of the plague.',64,0,0,'2018-10-24 15:04:08'),(33,'Woo my webpage is filed with Objects!!',65,0,0,'2018-10-31 18:13:29'),(40,'I Refuse To Quit',65,140,0,'2018-11-01 17:03:46'),(43,'\"Short, sweet, and to the point\" is a long way of saying \"concise\".',64,139,0,'2018-11-01 17:06:33'),(44,'It is outrageous what the Democrats are doing to our Country. Vote Republican now! \r\n',137,0,0,'2018-11-01 17:13:02'),(45,'The king being â€œpoisonedâ€ was probably sometimes just a reaction to a food allergy.',65,139,0,'2018-11-01 17:15:15'),(46,'Telling someone they look better with a beard is basically saying they look better the less you can see their face.',65,0,0,'2018-11-01 17:16:00'),(47,'YABADA DOO!',65,128,0,'2018-11-01 17:34:46'),(49,'I\'m Still Getting Use To This Bitter Business',142,0,0,'2018-11-02 01:27:56'),(74,'What a Rainy Friday',131,0,0,'2018-11-02 17:03:48'),(75,'Check out The Late Show! Tonight at 11!',131,129,0,'2018-11-02 17:04:02'),(82,'I watch him every Morning!',65,129,75,'2018-11-02 08:34:34'),(83,'That Guy is FAKE NEWS',137,129,75,'2018-11-02 08:48:51'),(89,'What\'s Up, Everyone!',145,0,0,'2018-11-03 16:41:15'),(90,'I Just Started Dude!',145,0,49,'2018-11-03 07:43:12'),(92,'You\'ll have to speak up, I\'m wearing a towel.',146,0,0,'2018-11-03 17:17:55'),(95,'YABADA DOO!',146,128,0,'2018-11-03 17:21:18'),(101,'Huzzah!',65,128,95,'2018-11-03 08:34:09'),(103,'YABADA DOO!',65,146,0,'2018-11-05 15:18:09'),(105,'Hey Zack',127,0,89,'2018-11-05 07:27:11'),(107,'It is outrageous what the Democrats are doing to our Country. Vote Republican now! \r\n',65,137,0,'2018-11-05 15:29:58'),(108,'\"Short, sweet, and to the point\" is a long way of saying \"concise\".',65,64,0,'2018-11-05 15:30:14'),(110,'Monday Funday',139,0,0,'2018-11-05 15:34:40'),(115,'Monday Funday',65,139,0,'2018-11-05 18:01:44'),(118,'it is a challenge',127,0,49,'2018-11-05 10:30:41'),(119,'Monday Funday',147,139,0,'2018-11-05 22:37:45'),(120,'LOL',147,0,15,'2018-11-05 14:38:11'),(121,'Did we meet?',147,0,49,'2018-11-05 14:38:34'),(122,'A Great Day',65,139,119,'2018-11-06 16:44:19'),(123,'Booth in Bitter!',148,0,49,'2018-11-07 07:34:54'),(124,'What\'s all this Bitter stuff about?',148,0,0,'2018-11-07 15:35:09'),(125,'Have a Great Monday Everyone!',148,131,0,'2018-11-07 15:38:25'),(126,'Check out The Late Show! Tonight at 11!',148,131,0,'2018-11-07 15:38:33'),(127,'Lunch was Great',65,0,0,'2018-11-07 17:26:10'),(128,'I love Chicken Wings!',148,0,0,'2018-11-07 17:26:35'),(129,'I love Chicken Wings!',147,148,0,'2018-11-07 17:27:00'),(130,'Have you tried buffalo wings? they are huge',147,0,128,'2018-11-07 09:27:25'),(131,'always Test You Code!',127,0,0,'2018-11-07 17:28:20'),(132,'Always Test Your code*',127,0,131,'2018-11-07 09:28:58'),(133,'Did you pass the butter?',64,0,127,'2018-11-07 09:44:58'),(134,'Did you pass the butter?',65,64,0,'2018-11-07 17:49:50'),(139,'Me too! So Good!',65,148,129,'2018-11-07 10:40:01'),(140,'Have you tried buffalo wings? they are huge',65,147,0,'2018-11-07 18:40:05'),(141,'That \"No alcohol beyond this point\" might as well say, \"Bet you can\'t chug that whole beer.\".',64,0,0,'2018-11-10 20:19:15'),(142,'Hand driers are a really good way to waste 5 minutes before you wipe your hands on your pants',142,0,0,'2018-11-10 20:21:45'),(143,'Gunpowder is just angry sand.',147,0,0,'2018-11-10 20:31:57'),(144,'There is no reason for these massive, deadly and costly forest fires in California except that forest management is so poor. Billions of dollars are given each year, with so many lives lost, all because of gross mismanagement of the forests. Remedy now, or no more Fed payments!\r\n',137,0,0,'2018-11-10 21:48:03'),(145,'It\'s so cold that I\'m shooting web-sicles',142,0,0,'2018-11-11 16:14:05'),(146,'Gunpowder is just angry sand.',65,147,0,'2018-11-26 20:12:21'),(148,'What did you have',64,0,127,'2018-12-04 08:41:09'),(149,'So much work and So little time',65,0,0,'2018-12-04 16:42:26'),(150,'So much work and So little time',128,65,0,'2018-12-04 16:42:52'),(151,'Keep Grinding',128,0,149,'2018-12-04 08:43:03'),(152,'So much work and So little time',127,65,0,'2018-12-04 17:11:04'),(153,'So much work and So little time',147,65,0,'2018-12-04 17:11:32'),(154,'What are you working on?',65,65,153,'2018-12-04 13:14:50'),(155,'I have a hairline fracture in my thumb. Mankind\'s least important finger, am I right?',153,0,0,'2018-12-05 20:41:41'),(156,'So much work and So little time',153,65,0,'2018-12-05 20:41:56'),(157,'Nine Nine!',153,0,149,'2018-12-05 12:42:09');
/*!40000 ALTER TABLE `tweets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `screen_name` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(200) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `contact_number` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `description` varchar(160) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(200) DEFAULT 'default.jfif',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (64,'Rick','Sanchez','PickleRick','$2y$10$kUP3JKWSoe4XuHCZdxhCjeWPZthIVWKMjLN6MwwsNosVFwS71Oo6S','Earth C19','Newfoundland and Labrador','T9K 4L4','5556548745','wubaluba@DubDub.ca','','You Pass Butter','Gander','2018-10-20 20:58:10','Rick.jpg'),(65,'Ryan','Feener','Feener','$2y$10$TXVt9SuuFLFDnn3x8dZ6a.aYjhmk/OaT9wmvO8Ty7hYdzj3xNlAZi','205 york street','New Brunswick','E3B 3N9','5062610134','ryanfeener@gmail.com','','works','Fredericton','2018-10-20 20:59:20','Working.jpg'),(110,'Joe','Rogan','JRogan','$2y$10$pvU4CFdSdrJ9WHb0ixQxWu0zsfAaK3.hGBvE5hzTtWHptRxx62sX.','22 LateNight Street','Newfoundland and Labrador','T9K 4L4','1112223333','JRE@JRE.ca','','be the hero of your story','Gander','2018-10-21 02:24:05','220px-The_Joe_Rogan_Experience_logo.jpg'),(127,'Nick','Taggart','nick','$2y$10$OO9.w0lS/brjyGJWIL/u9OtzqabUddXPL/JmTcUsm5lQq.FgIwKfu','26 duffey drive','New Brunswick','E2V 4K5','5556548745','Nick.Taggart@nbcc.ca','','giving Ryan an A','Edmonton','2018-10-21 03:52:59','nick.jpg'),(128,'Fred','Flintstone','FredFlintstone','$2y$10$jIEMvXUp3fpDEKWS8Ls.feV6aVCqW2wJ.QOuft3bB8jusTCxcBmrW','723 Cobblestone Way','Alberta','E2V 4K5','5556548745','YabaDaba@Doo.ca','','Making Rocks and Taking Names','Edmonton','2018-10-21 03:55:21','characterArt_FL_Fred.png'),(129,'Stephen','Colbert','SColbert','$2y$10$gdTsrmA9l/wI6j/Vlq8C/OlQwx8eCFliEqkoZyAXcBWucD0K2Yvqq','22 LateNight Street','Newfoundland and Labrador','T9K 4L4','5556548745','SC@colbertreport.com','','Beating on Trump','Gander','2018-10-21 03:56:56','download.jpg'),(131,'Rachal','Riley','RRiley','$2y$10$O4wdJXdFd8gnDqiZA4UT/ecA7Z.TUgrlWwmWdeeQfuX9EXKBhVvyC','Londen','Ontario','E2V 4K5','5556667777','Riley@Countdown.com','','Maths','Toronto','2018-10-21 18:04:56','220px-Rachel_Riley_2011.JPG'),(132,'Laura','Bird','La_sweets','$2y$10$dT6OcgJea0MPNesAj4CdMe5Ewwqs3O3Ry/Q48SKBuGoVKqoLOWz0y','Trump Tower','Ontario','E2V 4K5','7806073710','LBird@gmail.com','','works','Toronto','2018-10-21 21:54:36','Laura.jpg'),(137,'Donald','Trump','TheRealDonaldTrump','$2y$10$Uecr/Z3ILal29PEKgwFU8OrVjRoMGdOjVmtot5OFD3mJTS/0wBMLu','Trump Tower','Ontario','E2V 4K5','5556667777','DTrump@trump.com','','I have the biggest Brain','Toronto','2018-10-22 21:56:18','download (1).jpg'),(138,'Jim','Lahey','OfficerLahey','$2y$10$Dn2TcuaqLEdpE9j8u.WzM.OBnwA3bN7Mi2qUyM3jL7t4Sy5wKCnLq','8 Sunnyvale Drive','Nova Scotia','B4N 4K1','5558741977','Supervisor@sunnyvale.com','','A liquor captain never abandons his sinking shit ship, Randy.','','2018-10-22 22:04:13','Lahey.jpg'),(139,'Scott','Summers','Cyclops','$2y$10$QUg4XxYxm1Xl6LwidytuseY7T1XDGXPzPom5Bs4Dk0gummi2PWx26','1963 marvel lane','Newfoundland and Labrador','T9K 4L4','5556548745','S.Sum@xmen.com','','Dont mess with the Xmen','Gander','2018-10-22 22:40:27','cyc.jpg'),(140,'Harvey','Specter','TheChamp','$2y$10$vnVbS9lKlWNK2Xroh74TQu4/HVbuzloxW8mqHuqZvIf55aP2GY8Di','12 PearsonSpecterLitt','Alberta','E2V 4K5','4333334444','H.Specter@PearsonSpecterLitt.com','','Winners Do Not Make Excuses','Edmonton','2018-10-23 12:35:31','dB0QdPId_400x400.jpg'),(142,'Peter','Parker','NotSpiderman','$2y$10$iJcr3ZdCIzyECcJTWqOPNe1qY.cN.ZS/7jIrBWQMADdDih38J5gIq','205 york street','Manitoba','E3B 3N9','5062610134','peter.Parker@DailyBugle.com','https://www.youtube.com/watch?v=SUtziaZlDeE','I\'m definitely not your friendly neighborhood spider-man','Fredericton','2018-10-26 16:17:49','images.jpg'),(143,'Elroy','Jetson','LilElroy','$2y$10$20xRJyWBkmQcOQfd8zwq/uM.XPtuJ0COqr7pAQ6Ev5WYMLtCDL7AK','14 High road','British Columbia','Y6N4M3','3339992222','E.Jetson@Jetco.com','','MEet The JEtsons','','2018-10-26 16:59:33','Nbcc.PNG'),(144,'Peyton','Feener','Princess','$2y$10$6LgJptHClcm4P4nMvjxByOrX1jVeW9f0iyNVCHcicZJ..PjmaeEtO','205 york street','New Brunswick','E3B 3N9','5062610134','ryanfeener@gmail.com','','xzxcddslkoiatrewqqqolnuiooo','Fredericton','2018-10-27 23:22:38','Pey.jpg'),(145,'Zack','MacLaan','ZackAttack!','$2y$10$Hh17ER8WtYvLKa/roTItYOT5LLvK82JiGXybnV03U9BkQ9hJeAv3C','Trump Tower','Ontario','E2V 4K5','5556667777','Z.Maclean@gmail.com','','RIP','Toronto','2018-11-03 16:17:30','zack.PNG'),(146,'Homer','Simpson','Max Power','$2y$10$qDPdtWvJPRJhS8UPBNOKqu0Qzkqsvq9AO6F2wNIpsf8PRGrsqLbom','742 Evergreen Terrance','Quebec','T9K 4L4','1111555999','HSimp@gmail.com','','Doh!','Toronto','2018-11-03 17:16:47','4wx8EcIA_400x400.jpg'),(147,'Peter','Griffen','Peatear_Gryffin','$2y$10$Yfzxs4kkCEtSyZ9gPnINm.KkC/OEqIVwzOVIYpJUoQS4fY4DXqAIi','205 york street','Manitoba','E3B 3N9','5062610134','PeterGriffen@family.guy','','Roadhouse','Fredericton','2018-11-05 22:35:40','peter.PNG'),(148,'Seely','Booth','Booth','$2y$10$KXjuYOmD.n2lQ2Du/P6I4.JCK2atg94cWJng61GrJ2eEf5o5OANwK','123 Jeffersonian drive','Ontario','T3K 6M4','5554443213','AgentBooth@FBI.com','','Someone Find Bones!','Jeffersonian','2018-11-07 15:33:28','Booth.PNG'),(152,'Colson','Baker','MGK','$2y$10$tSfNasrIeBBXtlYIjXH.FOj/yCZdIsgKlPJWQ/mvWCkyqXCYYp2w.','Trump Tower','NF','A1A1A1','5556667777','Baker@MGK.com','','I am the Gunner','Everywhere','2018-11-16 00:22:57','default.jfif'),(153,'Jake','Peralta','OfficerJake','$2y$10$MoxLMzF8AJsxck04co311eSCoTfXY.0ASb8swFP1erYMHCJKqO1bK','33 Troling lane','ON','M4B 1B3','9998887777','JP@99.com','https://www.youtube.com/watch?v=7BF_NUn6bH0','NINE NINE','Toronto','2018-12-05 20:37:57','jp.jpg');
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

-- Dump completed on 2018-12-07 13:43:07
