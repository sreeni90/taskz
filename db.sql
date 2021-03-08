--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `status` enum('pending','done') NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'Design the solution','Identify resources to be monitored.\nDefine users and workflow\nIdentify event sources by resource type.\nDefine the relationship between resources and business systems.\nIdentify tasks and URLs by resource type.\nDefine the server configuration.','done','2021-03-08 02:37:33','2021-03-08 09:11:07'),(2,'Prepare for implementation','Identify the implementation team.\nOrder the server hardware for production as well as test/quality assurance (QA).\nOrder console machines.\nOrder prerequisite software.\nIdentify the test LPAR.\nIdentify production LPARs.\nSchedule changes as required.\nCreate user IDs and groups.\nTivoli Business Systems Manager operators and administrators\nTivoli OMEGAMON(R) logins and profiles\nSecurity changes as required.\nSAF\nFirewall','pending','2021-03-08 02:48:57','2021-03-08 02:49:08'),(3,'Prepare the test/QA environment','Install test and QA servers and prerequisite software.\nInstall console machines and prerequisite software.\nVerify connectivity from test and QA servers to test LPAR, Tivoli Enterprise Console(R) server, and console machines.','pending','2021-03-08 02:49:28',NULL),(4,'Install the product in the test/QA environment.','Install Tivoli Business Systems Manager and appropriate patches on test or QA servers.\nInstall Tivoli Business Systems Manager on console machines.','done','2021-03-08 02:52:38','2021-03-08 02:55:27'),(5,'Implement distributed data feeds (this can be done','For each resource type, do the following tasks:\nExtend the data model.\nConfigure the instance placement.\nConfigure the Tivoli Enterprise Console rules to send events.\nAssociate tasks and URLs with object types.','pending','2021-03-08 02:53:38','2021-03-08 03:30:59'),(6,'Implement Source/390 data feeds on the test LPAR','For each resource type, do the following tasks:\nConfigure filtering, if appropriate.','done','2021-03-08 02:53:58','2021-03-08 03:07:26'),(7,'Schedule job','Tivoli Business Systems Manager SQL server jobs\nSource\nBatch schedule download/process\nDatabase backup and maintenance','pending','2021-03-08 02:55:01','2021-03-08 09:12:30'),(8,'Install the history server.','Create databases on the history server.\nSet up and test jobs on the database server to produce the database backup.\nSet up and test jobs to copy backup databases to the history server.\nSet up and test jobs to replicate events to the history server.','done','2021-03-08 02:59:45','2021-03-08 03:30:24'),(9,'Implement Source/390 data','Implement Source/390 data feeds on the test LPAR Description','pending','2021-03-08 03:31:33','2021-03-08 04:04:17'),(10,'Implement Source/390 data','Implement Source/390 data Test','pending','2021-03-08 04:04:45','2021-03-08 08:56:41');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sreenivas','sreeni','admin');
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

-- Dump completed on 2021-03-08  9:18:14
