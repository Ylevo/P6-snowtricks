-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: snowtricks
-- ------------------------------------------------------
-- Server version	8.0.32

USE snowtricks;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `trick_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CB281BE2E` (`trick_id`),
  KEY `IDX_9474526CA76ED395` (`user_id`),
  CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_9474526CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1326 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1205,210,45,'Earum vel itaque perspiciatis corporis.','2010-12-19 17:20:04'),(1206,210,45,'Itaque porro adipisci asperiores quas.','1995-11-21 03:23:40'),(1207,210,46,'Ut quo ut facilis quia.','1998-09-29 16:34:06'),(1208,210,46,'Eum natus dolore eius sint.','2015-08-16 10:20:25'),(1209,210,46,'Et quo qui accusamus.','1975-04-06 08:06:33'),(1210,210,46,'Provident omnis quia sint porro rerum.','1981-03-01 03:59:25'),(1211,210,46,'Sequi nihil ea dicta.','2006-10-28 17:44:42'),(1212,210,45,'Hic qui quae aperiam quo eaque earum.','1998-04-06 07:39:51'),(1213,211,46,'Eos in perferendis est voluptatem.','1984-10-18 08:49:00'),(1214,211,45,'Sit autem ut dignissimos quas delectus.','1977-03-09 22:43:37'),(1215,211,45,'Eos fuga non alias nam.','1975-10-24 16:10:22'),(1216,211,45,'Quis et dolorum ut fugit et.','1992-05-19 19:58:57'),(1217,211,45,'Nisi delectus et qui minus.','1993-02-10 11:42:57'),(1218,211,46,'Cupiditate qui at mollitia.','1997-03-25 10:17:27'),(1219,211,45,'Sunt unde et itaque libero nobis.','1977-06-08 13:23:34'),(1220,211,45,'Ut voluptas sit iure voluptatem vel.','2004-07-08 18:55:03'),(1221,212,45,'Dolor dolorem in doloribus.','1998-05-01 10:11:51'),(1222,212,45,'Ut maxime qui molestias.','1983-06-21 17:25:31'),(1223,212,45,'Nesciunt facere explicabo ad quae.','1992-03-01 07:32:02'),(1224,212,46,'Velit tempore quam vel error magni.','2007-06-29 01:25:14'),(1225,212,45,'Repellat perspiciatis magni aut cumque.','2019-07-31 04:09:51'),(1226,212,46,'Fugiat dolores quia dolor quibusdam.','1976-03-30 09:23:28'),(1227,212,46,'Ea est est sed et.','2013-11-01 12:11:59'),(1228,212,45,'Laborum tempora ratione eos et.','1995-05-30 23:18:30'),(1229,213,46,'Cupiditate ratione sit omnis similique.','1996-01-03 18:48:37'),(1230,213,45,'Possimus est atque et omnis.','1985-01-04 09:03:01'),(1231,213,46,'Et et ad dolorum occaecati excepturi.','1992-10-08 11:57:35'),(1232,213,45,'Quo ut et labore esse.','1974-01-28 05:39:31'),(1233,213,45,'Nihil enim at recusandae aliquid iusto.','2012-12-21 00:20:19'),(1234,213,46,'Et corporis dolores omnis.','1979-05-29 21:06:38'),(1235,213,45,'Et qui suscipit ab cumque.','2002-06-11 09:30:03'),(1236,213,45,'Omnis nemo sit vel tempore omnis.','1988-10-16 05:17:58'),(1237,214,46,'Sit vero qui recusandae quibusdam.','2007-11-14 09:22:09'),(1238,214,45,'Et est et corrupti ex quae sint.','2011-04-07 12:22:47'),(1239,214,46,'Laboriosam ad assumenda et.','2018-08-31 01:40:11'),(1240,214,46,'Error quasi et fugit voluptas.','1975-06-27 21:13:45'),(1241,214,46,'Quia et sed necessitatibus dolor.','1975-05-23 22:58:20'),(1242,214,45,'Dolorem aut id distinctio ut.','1982-12-07 23:11:50'),(1243,214,45,'Quasi odit nesciunt et sed.','2000-05-17 06:54:30'),(1244,214,46,'Magni placeat non quasi laborum.','2022-10-07 00:34:29'),(1245,215,45,'Est iste dolor ipsa ullam facere autem.','2018-04-08 00:27:48'),(1246,215,46,'Iusto ut est a rerum.','2012-02-12 17:27:40'),(1247,215,45,'Illo qui alias reiciendis quo.','2017-03-27 04:45:51'),(1248,215,45,'Voluptas ut fugit corporis in.','1972-04-26 00:04:44'),(1249,215,45,'Omnis voluptatem ullam iste odit.','2003-11-28 00:16:15'),(1250,215,46,'Et cupiditate harum consequatur.','2002-02-05 05:36:55'),(1251,215,45,'Quas libero quia ipsa voluptas dolorum.','2021-03-23 03:33:29'),(1252,215,45,'Ut et doloremque ratione aut neque.','1993-07-11 08:20:57'),(1253,216,45,'Impedit et dolores error id eius neque.','1989-03-14 21:01:59'),(1254,216,45,'Autem assumenda rerum in.','1975-07-20 16:07:45'),(1255,216,45,'Impedit earum error aut minima.','2001-06-22 02:39:20'),(1256,216,46,'Et consectetur quis aut.','1979-04-25 11:22:04'),(1257,216,45,'Ducimus numquam dignissimos sunt aut.','1995-07-21 02:54:19'),(1258,216,46,'Officia recusandae ab et quae et totam.','2013-10-15 21:40:08'),(1259,216,46,'Et omnis eveniet labore aut.','2013-07-22 16:50:19'),(1260,216,46,'Officiis molestiae impedit est qui.','2010-09-12 16:03:53'),(1261,217,45,'Voluptatem eum eius illum ipsum.','1993-10-30 19:09:32'),(1262,217,46,'Tempora cumque ullam enim.','1992-04-18 20:35:52'),(1263,217,46,'Rerum dicta cumque consequuntur.','1998-06-14 13:01:21'),(1264,217,46,'Ad modi rem est et aut aut.','2000-12-13 04:23:28'),(1265,217,45,'Consequatur facere rem maxime illum.','1978-01-22 01:00:20'),(1266,217,46,'Harum omnis veritatis et quia.','2002-03-01 00:56:53'),(1267,217,45,'Ut quae quas totam facilis.','1975-03-24 13:56:48'),(1268,217,46,'Voluptatem nobis minima recusandae quo.','1993-07-06 04:11:34'),(1269,218,45,'Debitis error a vero dignissimos.','2021-06-26 03:11:59'),(1270,218,45,'Deleniti est voluptates harum.','2014-10-22 09:53:35'),(1271,218,45,'Est nostrum illum sit voluptas.','1997-06-12 01:11:11'),(1272,218,45,'Sequi veritatis magni sit.','1999-08-18 02:35:09'),(1273,218,46,'Hic rerum culpa et aperiam.','2008-12-28 07:04:13'),(1274,218,46,'Autem odio provident dicta.','1982-04-12 22:50:58'),(1275,218,46,'Omnis autem at omnis distinctio.','2015-08-29 04:29:01'),(1276,218,46,'Et quis libero aut aut veritatis unde.','1994-08-27 01:26:09'),(1277,219,45,'Nihil omnis qui vero aut.','1979-06-04 01:09:22'),(1278,219,46,'Non illum voluptatem eum autem.','1979-11-05 01:13:51'),(1279,219,45,'Et earum dignissimos qui molestias.','1994-01-17 04:49:59'),(1280,219,45,'Placeat vel et molestiae sunt vitae.','2005-02-20 16:48:44'),(1281,219,45,'Porro rerum eos sit nihil.','1979-09-23 07:34:37'),(1282,219,45,'Ut sit et maiores possimus et.','1998-01-19 19:22:36'),(1283,219,46,'Ipsam quidem quia non.','2009-04-12 07:36:30'),(1284,219,45,'Minima magni cum illum rem incidunt.','1970-11-28 13:57:31'),(1285,220,45,'Harum qui soluta aliquam.','1997-03-27 10:36:49'),(1286,220,45,'Rerum suscipit reiciendis eos.','1974-05-14 02:30:05'),(1287,220,46,'Aut voluptatem maiores iusto.','2022-06-30 11:29:18'),(1288,220,45,'Laudantium maxime ratione maxime vel.','1975-12-04 04:22:55'),(1289,220,46,'Et quia est aspernatur odio.','2011-05-30 00:54:40'),(1290,220,45,'Non quis corrupti et vel.','1981-08-22 16:57:42'),(1291,220,45,'Ipsa id porro sequi neque veniam.','1971-01-21 10:58:22'),(1292,220,46,'Voluptatem quae ipsa maxime sed.','1993-08-22 10:27:48'),(1293,221,46,'Corporis ab sunt in ut et.','2010-06-16 14:56:44'),(1294,221,45,'Quia autem eum quam molestiae harum.','2017-03-01 14:05:52'),(1295,221,46,'Rerum dolorem laboriosam facilis rerum.','1982-03-03 20:55:56'),(1296,221,45,'Odit aut eum sit delectus autem.','2015-11-02 22:06:00'),(1297,221,45,'Deserunt qui velit natus numquam.','2022-06-24 11:31:26'),(1298,221,46,'Numquam odit error optio sunt ea rerum.','1996-10-28 20:22:20'),(1299,221,46,'Est et cum sint veritatis ut.','2008-11-25 08:36:35'),(1300,221,46,'Et dicta et magni.','2012-07-04 02:03:45'),(1301,222,45,'Iste quia doloribus beatae.','1991-07-19 18:28:34'),(1302,222,46,'Voluptas libero deserunt eum est.','1984-06-15 03:50:16'),(1303,222,45,'A voluptas occaecati sit ex.','1994-01-16 19:03:33'),(1304,222,46,'Molestiae optio quia temporibus.','1997-10-26 09:35:48'),(1305,222,45,'Occaecati aut sit voluptas iusto unde.','1973-04-15 10:12:50'),(1306,222,45,'Tempore quia suscipit tenetur.','1970-12-23 21:10:59'),(1307,222,46,'Ipsam voluptatem est iusto.','1985-10-28 00:16:03'),(1308,222,46,'Voluptas repudiandae qui est.','1974-09-10 03:40:18'),(1309,223,46,'Ut ea et quibusdam incidunt.','1973-08-29 13:03:40'),(1310,223,45,'Deserunt quo autem enim libero ea qui.','1993-12-06 06:11:41'),(1311,223,46,'Voluptas animi dignissimos fugiat vel.','2013-12-19 17:30:33'),(1312,223,46,'Corrupti et amet quas deleniti a ea.','1982-12-09 17:18:45'),(1313,223,46,'Quaerat impedit nihil aut repellat.','2002-12-15 15:46:13'),(1314,223,46,'Qui dolore officia iusto qui et.','1970-06-24 23:00:40'),(1315,223,45,'Repudiandae et est laudantium sunt.','2011-07-17 10:02:06'),(1316,223,46,'Dolores eum perferendis eum fugit.','1997-11-05 10:59:30'),(1317,224,46,'Eveniet perferendis ad enim ea.','2017-04-01 04:30:38'),(1318,224,46,'Quo cumque quia voluptatem ex voluptas.','2012-09-06 07:45:04'),(1319,224,46,'Nemo accusamus dolores possimus.','2015-10-15 17:52:59'),(1320,224,46,'Temporibus aut nostrum est labore.','1976-04-23 12:56:10'),(1321,224,45,'Omnis quaerat voluptas rerum.','1984-03-14 22:09:19'),(1322,224,46,'Omnis enim earum quo placeat.','2005-06-10 18:41:03'),(1323,224,46,'Est beatae quasi excepturi.','2005-09-24 12:52:54'),(1324,224,45,'Id nihil enim iure.','2018-11-29 15:13:45');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230323032207','2023-03-23 04:22:16',76),('DoctrineMigrations\\Version20230323033431','2023-03-23 04:34:42',16),('DoctrineMigrations\\Version20230323035103','2023-03-23 04:51:16',706),('DoctrineMigrations\\Version20230323040314','2023-03-23 05:03:19',19),('DoctrineMigrations\\Version20230323181135','2023-03-23 19:11:43',157),('DoctrineMigrations\\Version20230406023905','2023-04-06 04:39:17',37),('DoctrineMigrations\\Version20230418230000','2023-04-19 01:00:11',90),('DoctrineMigrations\\Version20230505004147','2023-05-05 02:42:12',145),('DoctrineMigrations\\Version20230529043510','2023-05-29 06:35:27',168),('DoctrineMigrations\\Version20230529044134','2023-05-29 06:41:43',147),('DoctrineMigrations\\Version20230529044804','2023-05-29 06:48:08',85);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_id` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6A2CA10CC54C8C93` (`type_id`),
  CONSTRAINT `FK_6A2CA10CC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `media_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=337 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (319,57,'default_cover.jpg','Vero provident.','1997-05-17 02:26:20','2023-05-30 07:22:41'),(320,57,'flip_back.jpg','Reprehenderit.','1990-08-24 20:38:56','2023-05-30 07:22:41'),(321,57,'flip_front.jpg','Et fugiat et.','1986-12-30 15:17:49','2023-05-30 07:22:41'),(322,57,'grab_indy.jpg','Velit.','2017-07-26 00:48:31','2023-05-30 07:22:41'),(323,57,'grab_japan.jpg','Aut saepe in.','2003-08-04 02:25:25','2023-05-30 07:22:41'),(324,57,'grab_mute.jpg','Doloremque.','1993-08-14 03:47:07','2023-05-30 07:22:41'),(325,57,'grab_nose.jpg','A quaerat.','1985-01-21 07:13:47','2023-05-30 07:22:41'),(326,57,'grab_sad.jpg','Fuga aut.','2020-11-03 21:06:42','2023-05-30 07:22:41'),(327,57,'grab_stalefish.jpg','Culpa.','2005-02-11 06:50:39','2023-05-30 07:22:41'),(328,57,'grab_tail.jpg','Vero ut labore.','1978-06-13 19:33:47','2023-05-30 07:22:41'),(329,57,'slide_tail.jpg','Eveniet.','2014-05-23 07:37:03','2023-05-30 07:22:41'),(330,55,'https://youtube.com/watch?v=C-GPosr76KU','Sed debitis.','1998-07-06 17:08:33','2023-05-30 07:22:41'),(331,55,'https://youtube.com/watch?v=Yi3138Dslyc','Aut beatae.','2017-01-26 20:20:03','2023-05-30 07:22:41'),(332,55,'https://youtube.com/watch?v=8xAgsOaW1JM','Dolores atque.','1993-04-27 08:06:58','2023-05-30 07:22:41'),(333,55,'https://youtube.com/watch?v=iFnNqEo0F_U','Nihil.','1984-11-03 21:02:06','2023-05-30 07:22:41'),(334,55,'https://youtube.com/watch?v=B10BxYZqa1Q','Sed est.','1979-11-03 08:37:53','2023-05-30 07:22:41'),(335,57,'banner2-64758879b2893.jpg','qdz','2023-05-30 07:24:10','2023-05-30 07:24:10'),(336,55,'https://youtube.com/watch?v=C-GPosr76KU','qzd','2023-05-30 07:24:10','2023-05-30 07:24:10');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_type`
--

DROP TABLE IF EXISTS `media_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_type`
--

LOCK TABLES `media_type` WRITE;
/*!40000 ALTER TABLE `media_type` DISABLE KEYS */;
INSERT INTO `media_type` VALUES (55,'youtube'),(56,'vimeo'),(57,'image');
/*!40000 ALTER TABLE `media_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
INSERT INTO `messenger_messages` VALUES (1,'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:41:\\\"registration/confirmation_email.html.twig\\\";i:1;N;i:2;a:3:{s:9:\\\"signedUrl\\\";s:169:\\\"http://127.0.0.1:8000/verify/email?expires=1679634418&signature=Xeg%2F%2BcoD28A9NmXxB9PNVjSgVGyNfgvldMYOYpxqy8w%3D&token=iZGHO0SlkNjbvcEb9w%2BMDtvfc14MJEZfBg617coHe6Q%3D\\\";s:19:\\\"expiresAtMessageKey\\\";s:26:\\\"%count% hour|%count% hours\\\";s:20:\\\"expiresAtMessageData\\\";a:1:{s:7:\\\"%count%\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"yoann.levrel@posteo.de\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:23:\\\"Snowtricks Registration\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:15:\\\"ylev@posteo.net\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:25:\\\"Please Confirm your Email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}','[]','default','2023-03-24 05:06:58','2023-03-24 05:06:58',NULL),(2,'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:41:\\\"registration/confirmation_email.html.twig\\\";i:1;N;i:2;a:3:{s:9:\\\"signedUrl\\\";s:167:\\\"http://127.0.0.1:8000/verify/email?expires=1679635456&signature=zicut7xvOWXnQDrQIT2IxHakAHfjGG2z2Kn1K1t9g%2FA%3D&token=gpYtHpwgyZhm8%2BKK5zzdls92RLaFaYlqyn0122Vc4Us%3D\\\";s:19:\\\"expiresAtMessageKey\\\";s:26:\\\"%count% hour|%count% hours\\\";s:20:\\\"expiresAtMessageData\\\";a:1:{s:7:\\\"%count%\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"yoann.levrel@posteo.de\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:23:\\\"Snowtricks Registration\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:15:\\\"ylev@posteo.net\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:25:\\\"Please Confirm your Email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}','[]','default','2023-03-24 05:24:16','2023-03-24 05:24:16',NULL);
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reset_password_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`),
  CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_password_request`
--

LOCK TABLES `reset_password_request` WRITE;
/*!40000 ALTER TABLE `reset_password_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `reset_password_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trick`
--

DROP TABLE IF EXISTS `trick`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trick` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `media_cover_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D8F0A91E989D9B62` (`slug`),
  KEY `IDX_D8F0A91E12469DE2` (`category_id`),
  KEY `IDX_D8F0A91EA76ED395` (`user_id`),
  KEY `IDX_D8F0A91E9D46085B` (`media_cover_id`),
  CONSTRAINT `FK_D8F0A91E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `trick_category` (`id`),
  CONSTRAINT `FK_D8F0A91E9D46085B` FOREIGN KEY (`media_cover_id`) REFERENCES `media` (`id`),
  CONSTRAINT `FK_D8F0A91EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trick`
--

LOCK TABLES `trick` WRITE;
/*!40000 ALTER TABLE `trick` DISABLE KEYS */;
INSERT INTO `trick` VALUES (210,74,45,'South Macstad','Voluptate laudantium esse inventore iste. Nisi tempora qui omnis nesciunt.','south-macstad','1978-07-30 09:15:02','2023-05-30 07:22:41',327),(211,75,46,'Connorside','Placeat quisquam natus cupiditate debitis pariatur hic cupiditate.','connorside','1984-09-16 01:49:51','2023-05-30 07:22:42',325),(212,76,46,'New Marquisland','Sequi consectetur omnis itaque ipsam aut velit.','new-marquisland','2000-07-01 09:00:06','2023-05-30 07:22:42',326),(213,76,45,'Samanthamouth','Suscipit quia incidunt illum rerum.','samanthamouth','2005-10-02 03:38:15','2023-05-30 07:22:42',323),(214,74,46,'Wintheiserborough','Quis ab enim consequatur aut.','wintheiserborough','1998-02-25 16:17:47','2023-05-30 07:22:42',324),(215,75,46,'Port Jada','A nihil asperiores labore ut aut quasi.','port-jada','2000-05-25 10:00:59','2023-05-30 07:22:42',328),(216,76,45,'Treutelshire','Asperiores qui reprehenderit quasi quis deleniti.','treutelshire','1989-06-21 09:52:05','2023-05-30 07:22:42',326),(217,75,45,'Larueberg','Enim nihil nemo velit et vero et corporis dicta.','larueberg','2004-11-04 16:00:05','2023-05-30 07:22:42',329),(218,75,45,'West Rahsaanberg','Sunt est quia fuga vel fuga aut at.','west-rahsaanberg','1984-08-09 04:52:21','2023-05-30 07:22:42',323),(219,76,45,'Kuphalshire','Esse deleniti sint itaque consectetur ea.','kuphalshire','2014-07-01 12:17:31','2023-05-30 07:22:42',329),(220,73,45,'South Merlinberg','Fugiat saepe enim a dicta. Quod maxime qui suscipit ipsam dolores.','south-merlinberg','2012-02-15 22:29:40','2023-05-30 07:22:42',326),(221,76,45,'Port Nayelifurt','Beatae itaque et at dolore dignissimos occaecati numquam.','port-nayelifurt','1992-07-19 00:21:58','2023-05-30 07:22:42',326),(222,74,46,'Budport','Modi accusamus nesciunt illo dolorum est est tempora.','budport','2003-09-08 04:23:58','2023-05-30 07:22:42',324),(223,76,45,'Lake Carlotta','Voluptate inventore aliquam vero odio.','lake-carlotta','1972-06-12 20:18:04','2023-05-30 07:22:43',329),(224,73,45,'Billyshire','Similique natus molestiae atque excepturi recusandae.','billyshire','1994-03-04 01:46:41','2023-05-30 07:22:43',327);
/*!40000 ALTER TABLE `trick` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trick_category`
--

DROP TABLE IF EXISTS `trick_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trick_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trick_category`
--

LOCK TABLES `trick_category` WRITE;
/*!40000 ALTER TABLE `trick_category` DISABLE KEYS */;
INSERT INTO `trick_category` VALUES (73,'Grab'),(74,'Rotation'),(75,'Flip'),(76,'Side');
/*!40000 ALTER TABLE `trick_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trick_media`
--

DROP TABLE IF EXISTS `trick_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trick_media` (
  `trick_id` int NOT NULL,
  `media_id` int NOT NULL,
  PRIMARY KEY (`trick_id`,`media_id`),
  KEY `IDX_A103A1B3B281BE2E` (`trick_id`),
  KEY `IDX_A103A1B3EA9FDD75` (`media_id`),
  CONSTRAINT `FK_A103A1B3B281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_A103A1B3EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trick_media`
--

LOCK TABLES `trick_media` WRITE;
/*!40000 ALTER TABLE `trick_media` DISABLE KEYS */;
INSERT INTO `trick_media` VALUES (210,319),(210,323),(210,326),(210,327),(210,330),(210,331),(210,333),(211,321),(211,324),(211,325),(211,326),(211,327),(211,329),(211,333),(212,321),(212,329),(212,331),(212,332),(213,322),(213,325),(213,327),(213,328),(214,324),(214,325),(215,319),(215,320),(215,322),(215,325),(215,327),(215,333),(216,319),(216,323),(217,324),(217,325),(217,330),(217,333),(218,319),(218,322),(218,328),(218,334),(219,319),(219,324),(219,330),(219,333),(220,330),(220,334),(221,327),(221,332),(222,322),(222,329),(223,320),(223,321),(223,322),(223,324),(223,329),(224,319),(224,324),(224,327);
/*!40000 ALTER TABLE `trick_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (45,'yoann.levrel@posteo.de','[]','$2y$13$L2UbTt7PDy027/vq0juGxuk.1yGcpmxlNAh95rnvKIyFoko6FO4oO','Zechariah','Howell',1),(46,'foobar@posteo.net','[]','$2y$13$PjOAnEiOR18qmFkLW31hBOqywZFvYMHIbMAJUKe1IrqoBz.it057.','Tyra','Hettinger',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-30  5:28:39
