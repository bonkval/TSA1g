
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `task_date` date NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (19,'Networking 2: SW 2','completed','2026-09-29','2026-09-29 02:42:24');
INSERT INTO `tasks` VALUES (20,'Networking 2: Formative 2','completed','2026-09-29','2026-09-29 02:42:24');
INSERT INTO `tasks` VALUES (21,'Networking 2: Technical Assessment 4','completed','2026-09-29','2026-09-29 02:42:24');
INSERT INTO `tasks` VALUES (22,'Networking 2: Technical Assessment 5','completed','2026-09-29','2026-09-29 02:42:24');
INSERT INTO `tasks` VALUES (23,'Networking 2: AI-Assisted Module 4-5','completed','2026-09-29','2026-09-29 02:42:24');
INSERT INTO `tasks` VALUES (24,'IT0049: TSA1','pending','2026-09-30','2026-09-29 02:42:24');
INSERT INTO `tasks` VALUES (25,'IT0037: Title Proposal','pending','2026-10-05','2026-09-29 02:42:24');
INSERT INTO `tasks` VALUES (26,'IT0035: Summative Assessment 1','pending','2026-09-29','2026-09-29 02:42:24');
INSERT INTO `tasks` VALUES (27,'Networking 2: Summative Assessment 2','pending','2026-10-01','2026-09-29 02:42:24');
INSERT INTO `tasks` VALUES (28,'Networking 2: CCST','pending','2026-10-05','2026-09-29 02:42:24');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'MrDemoGuy','Demo Guy','cedrickvales1111@gmail.com','$2y$10$GGLwt51Vhc2t4xOHDmhNS.xV0MPXJqDCkpvL7oxA2Y9eOqpT6k87m','2026-09-29 02:26:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

