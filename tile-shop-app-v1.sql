/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - shop-tile-app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop-tile-app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `shop-tile-app`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2016_06_01_000001_create_oauth_auth_codes_table',2),
(6,'2016_06_01_000002_create_oauth_access_tokens_table',2),
(7,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),
(8,'2016_06_01_000004_create_oauth_clients_table',2),
(9,'2016_06_01_000005_create_oauth_personal_access_clients_table',2);

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values 
('0b71929117610a353ea744ebe076ab82659beea5e6b730e0510713df78f822607abed7535ea415e9',8,1,'MyApp','[]',0,'2024-05-24 11:46:12','2024-05-24 11:46:12','2025-05-24 11:46:12'),
('231b2371c9b37c0237f96099e78d8245980df13cf46c2759a83bb2b23bb18077a3b623edbf332941',7,1,'MyApp','[]',0,'2024-05-24 11:41:32','2024-05-24 11:41:32','2025-05-24 11:41:32'),
('3bf32ed1834fbcc725a7d23e271fd34f04d6230b1cc89cff252d392d57ded8a36febfb28f5d18982',8,1,'MyApp','[]',0,'2024-05-24 11:58:20','2024-05-24 11:58:20','2025-05-24 11:58:20'),
('3d610ff66f5974ebdc5e8db430bd8eab367a3be556945d1e62fc847d05de8bd410cc1b71761956ca',3,1,'MyApp','[]',0,'2024-05-24 11:38:12','2024-05-24 11:38:12','2025-05-24 11:38:12'),
('3f8125388b124a7b0c5f2d91bce7fdb45d603353dc44256d24f872f3afb8c4e8f0a328612d6f0bbe',8,1,'MyApp','[]',0,'2024-05-24 11:47:40','2024-05-24 11:47:40','2025-05-24 11:47:40'),
('475605009c80aad7b3749395187c297b5369a5f801e6420fbcaa57123535c26e4304cd32f6e6e847',8,1,'MyApp','[]',0,'2024-05-24 11:45:36','2024-05-24 11:45:36','2025-05-24 11:45:36'),
('477f65834a9ef205c1698d28e6ff68ada84e391570813ff906d5e9c8d34f4c958962bde3c93508bd',8,1,'MyApp','[]',0,'2024-05-24 11:53:01','2024-05-24 11:53:01','2025-05-24 11:53:01'),
('5b5748925b20c75a92592a7ee8df646866c591a6e0adcf3c227f7a357e144c5bf254d7f397856a1b',8,1,'MyApp','[]',0,'2024-05-24 11:51:45','2024-05-24 11:51:45','2025-05-24 11:51:45'),
('702c433f6bfcab023a7c549e35c4b4cc6950754701d33f0ac3b81bc337d176bc6da19dc79493dbe3',5,1,'MyApp','[]',0,'2024-05-24 11:40:53','2024-05-24 11:40:53','2025-05-24 11:40:53'),
('7591fd57b19defe4ffec4c4a9bd56ebbe4ca3f5a9752e065fb07f5a77b26b2bef20c8c9289a212ce',8,1,'MyApp','[]',0,'2024-05-24 11:44:25','2024-05-24 11:44:25','2025-05-24 11:44:25'),
('7842ff6c1fbad7feb4febadd5fd1a303158ca7c766f998bef2ddb8685757e4cd5a6f77836ec8958a',8,1,'MyApp','[]',0,'2024-05-24 11:54:10','2024-05-24 11:54:10','2025-05-24 11:54:10'),
('7d41f7a05e887b8acdcc4b06482a63c2b150577de48c27f2e5756a9926dd81c78f57796102b42f34',2,1,'MyApp','[]',0,'2024-05-24 11:37:53','2024-05-24 11:37:53','2025-05-24 11:37:53'),
('7f374f1d91326a8e209a7e91df3d6ef03bc7115f37519f926b2b36aa827d49a7208912616ec6f779',8,1,'MyApp','[]',0,'2024-05-24 11:50:51','2024-05-24 11:50:51','2025-05-24 11:50:51'),
('a429b1cedbbc4e5e47ca76d11fe0ae78c3acfa6463c11f063e46ba9c1117c0d68101de727e09d5ff',8,1,'MyApp','[]',0,'2024-05-24 11:50:52','2024-05-24 11:50:52','2025-05-24 11:50:52'),
('b1d8e275ee1d100ebb84f26e3465b44065fa9e105bf4d67d1c7455c11f4b8b1e434283485d1b3d05',8,1,'MyApp','[]',0,'2024-05-24 11:51:44','2024-05-24 11:51:44','2025-05-24 11:51:44'),
('b5e535feab06cb948b91e2128b920171d43b4de636fd1003c74cca8bea47b90bacc1c27e2873dac3',8,1,'MyApp','[]',0,'2024-05-24 11:45:55','2024-05-24 11:45:55','2025-05-24 11:45:55'),
('b5e976189ea762f05d8951eedb8c6198a4450ade5d1a4c272f80715f2df5de3bc6d02937045d3904',1,1,'MyApp','[]',0,'2024-05-24 11:37:29','2024-05-24 11:37:29','2025-05-24 11:37:29'),
('c98f35c95c4afe79d52e1b32e8ba0b34bb1bcafacc3ef0e127d369d4de36ca1c04b44a146868114b',8,1,'MyApp','[]',0,'2024-05-24 11:45:04','2024-05-24 11:45:04','2025-05-24 11:45:04'),
('d658343f1173a0ee9f4634b4293d2508a24d6ed0713dabd2bc9739e2803421fda8dab434f1756e87',8,1,'MyApp','[]',0,'2024-05-24 11:50:53','2024-05-24 11:50:53','2025-05-24 11:50:53'),
('d6f4b8c8aef2edd6b76974be61cdbb75f995d3c3811e3c068dcd8e7f0136cdb164928a736ad506eb',6,1,'MyApp','[]',0,'2024-05-24 11:41:01','2024-05-24 11:41:01','2025-05-24 11:41:01'),
('db4804abae6a6b90c0d8ff5a47592e823556a8f9af9c525009929db1b6b380d502a41fc321b1dfdc',8,1,'MyApp','[]',0,'2024-05-24 11:50:47','2024-05-24 11:50:47','2025-05-24 11:50:47'),
('ed37ccf1f1ae359857e1390d27f8f1659bd6233d977c563e29487783be4007f9e276c720a00333d3',8,1,'MyApp','[]',0,'2024-05-24 11:45:38','2024-05-24 11:45:38','2025-05-24 11:45:38'),
('f2e3695edad8c84213cf87ea5e6abcce0368cdd93b3325a5d8197b4ef2105e8e0a5d0c5e0a8924d8',8,1,'MyApp','[]',0,'2024-05-24 11:50:50','2024-05-24 11:50:50','2025-05-24 11:50:50'),
('f96b73085ad908629bbc6401243385db476258b674ea45ffd304159fde6680d7d85487cf23935ba2',8,1,'MyApp','[]',0,'2024-05-24 11:42:12','2024-05-24 11:42:12','2025-05-24 11:42:12');

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`provider`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values 
(1,NULL,'Laravel Personal Access Client','KDVesE2MmgN2Ak7fOKm3ebFW9jf9cOc3axtNTu4f',NULL,'http://localhost',1,0,0,'2024-05-24 11:21:22','2024-05-24 11:21:22'),
(2,NULL,'Laravel Password Grant Client','262AcKym7iA8pj3UKRImHL3DVWzk9C83laN5QKiS','users','http://localhost',0,1,0,'2024-05-24 11:21:22','2024-05-24 11:21:22');

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values 
(1,1,'2024-05-24 11:21:22','2024-05-24 11:21:22');

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `ts_category` */

DROP TABLE IF EXISTS `ts_category`;

CREATE TABLE `ts_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `create_by` varchar(36) NOT NULL,
  `create_date` varchar(36) NOT NULL,
  `update_by` varchar(36) NOT NULL DEFAULT 'sss',
  `update_date` varchar(36) NOT NULL DEFAULT 'sss',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1011025 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ts_category` */

insert  into `ts_category`(`id`,`name`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values 
(1011000,'Category One',1,'ADMIN','2024-05-22 17:49:30','ADMIN','2024-05-22 17:59:24'),
(1011003,'Category 3',1,'ADMIN','2024-05-22 17:52:55','',''),
(1011004,'Category 2',1,'ADMIN','2024-05-22 17:53:05','',''),
(1011006,'Test22',1,'Test','122233','sss','sss'),
(1011008,'Test22',1,'Test','122233','sss','sss'),
(1011010,'Test22',1,'Test','122233','sss','sss'),
(1011011,'Test22',1,'Test','122233','sss','sss'),
(1011013,'Test22',1,'Test','122233','sss','sss'),
(1011014,'Test22',1,'Test','122233','sss','sss'),
(1011015,'Test22',1,'Test','122233','sss','sss'),
(1011016,'Test22',1,'Test','122233','sss','sss'),
(1011017,'Test22',1,'Test','122233','sss','sss'),
(1011018,'Test22',1,'Test','122233','sss','sss'),
(1011019,'Test22',1,'Test','122233','sss','sss'),
(1011020,'Test22',1,'Test','122233','sss','sss'),
(1011021,'Test22',1,'Test','122233','sss','sss'),
(1011022,'Test22',1,'Test','122233','sss','sss'),
(1011023,'Test22',1,'Test','122233','sss','sss'),
(1011024,'22222',1,'Test','122233','sss','sss');

/*Table structure for table `ts_item` */

DROP TABLE IF EXISTS `ts_item`;

CREATE TABLE `ts_item` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` bigint(10) NOT NULL,
  `category_id` bigint(10) DEFAULT NULL,
  `subcategory_id` bigint(10) DEFAULT NULL,
  `size_id` bigint(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `details` varchar(250) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(15) DEFAULT 'null',
  `create_date` varchar(20) DEFAULT 'null',
  `update_by` varchar(15) DEFAULT 'null',
  `update_date` varchar(20) DEFAULT 'null',
  PRIMARY KEY (`id`),
  KEY `subcategory_id` (`subcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1071003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ts_item` */

insert  into `ts_item`(`id`,`type_id`,`category_id`,`subcategory_id`,`size_id`,`name`,`details`,`item_code`,`grade`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values 
(1071000,1013001,1011004,1012003,1014004,'Test iTeam','Test Item Detatls','DAS-2323','A','1','8','2024-05-25 17:00:54','null','null'),
(1071001,1013001,1011004,1012003,1014004,'Iteam Test','Iteam Test info Detatls','DAS-2323','A','1','8','2024-05-25 17:01:23','null','null');

/*Table structure for table `ts_itemsize` */

DROP TABLE IF EXISTS `ts_itemsize`;

CREATE TABLE `ts_itemsize` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `create_by` varchar(36) NOT NULL DEFAULT '1',
  `create_date` varchar(36) NOT NULL DEFAULT '1',
  `update_by` varchar(36) NOT NULL DEFAULT '1',
  `update_date` varchar(36) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1014007 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ts_itemsize` */

insert  into `ts_itemsize`(`id`,`name`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values 
(1014001,'Test1',1,'ADMIN','2024-05-22 18:56:25','',''),
(1014002,'test 2',1,'ADMIN','2024-05-22 19:17:40','',''),
(1014004,'Dummy',1,'8','2024-05-24 17:38:31','1','1'),
(1014006,'Dummy12',1,'8','2024-05-24 17:40:56','1','1');

/*Table structure for table `ts_itemtype` */

DROP TABLE IF EXISTS `ts_itemtype`;

CREATE TABLE `ts_itemtype` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `create_by` varchar(36) NOT NULL DEFAULT '1',
  `create_date` varchar(36) NOT NULL DEFAULT '1',
  `update_by` varchar(36) NOT NULL DEFAULT '1',
  `update_date` varchar(36) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1013009 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ts_itemtype` */

insert  into `ts_itemtype`(`id`,`name`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values 
(1013000,'Dummy112',1,'8','2024-05-24 18:21:57','1','1'),
(1013001,'Iteam Test',1,'8','2024-05-24 18:22:27','8','2024-05-25 17:02:59'),
(1013002,'Dummy 1',1,'8','2024-05-24 18:22:30','1','1'),
(1013003,'Dummy 2',1,'8','2024-05-24 18:22:48','1','1'),
(1013004,'Dummy 22',1,'8','2024-05-24 18:23:27','1','1'),
(1013005,'Dummy 2',1,'8','2024-05-24 18:23:35','1','1'),
(1013007,'Dummy 2',1,'8','2024-05-24 18:23:47','1','1'),
(1013008,'Dummy 2',1,'8','2024-05-25 16:56:01','1','1');

/*Table structure for table `ts_subcategory` */

DROP TABLE IF EXISTS `ts_subcategory`;

CREATE TABLE `ts_subcategory` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoryid` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `create_by` varchar(36) NOT NULL DEFAULT '1',
  `create_date` varchar(36) NOT NULL DEFAULT '1',
  `update_by` varchar(36) NOT NULL DEFAULT '1',
  `update_date` varchar(36) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1012012 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ts_subcategory` */

insert  into `ts_subcategory`(`id`,`categoryid`,`name`,`status`,`create_by`,`create_date`,`update_by`,`update_date`) values 
(1012001,1011000,'test 2',1,'ADMIN','2024-05-22 18:31:40','',''),
(1012002,1011003,'Test22',1,'1','1','1','1'),
(1012003,1011004,'Test212',1,'8','1','1','1'),
(1012004,1011004,'Test1111',1,'8','1','1','1'),
(1012005,1011004,'Test111441',1,'8','1','1','1'),
(1012006,1011004,'Test111441',1,'8','1','1','1'),
(1012007,1011004,'Test111441',1,'8','1','1','1'),
(1012008,1011004,'Test111441',1,'8','2024-05-24 13:22:19','1','1'),
(1012009,1011005,'Test Data',2,'8','2024-05-24 13:22:29','8','2024-05-24 16:42:31'),
(1012010,1011004,'Test111441',1,'8','2024-05-24 13:22:31','1','1'),
(1012011,1011005,'Dummy Data',2,'8','2024-05-24 16:43:28','8','2024-05-24 16:43:54');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(8,'Dhali Abir','dhaliabir@gmail.com',NULL,'$2y$10$pUR5t7XmBVPVOkcWrqfezO6x048Zo82RfO6cOgWpHcKNJxciW/lYa',NULL,'2024-05-24 11:42:12','2024-05-24 11:42:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
