/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.11-MariaDB : Database - wellness
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wellness` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `wellness`;

/*Table structure for table `appointment_payments` */

DROP TABLE IF EXISTS `appointment_payments`;

CREATE TABLE `appointment_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `appointment_id` bigint(20) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unpaid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` datetime NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `appointment_payments` */

/*Table structure for table `appointments` */

DROP TABLE IF EXISTS `appointments`;

CREATE TABLE `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `room_id` bigint(20) NOT NULL,
  `practitionner_id` bigint(20) NOT NULL,
  `machine_id` bigint(20) DEFAULT NULL,
  `hand_id` bigint(20) DEFAULT NULL,
  `service_id` bigint(20) NOT NULL,
  `setting_id` bigint(20) DEFAULT NULL,
  `pack_id` bigint(20) DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_service_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_out` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('taken','checkin','cancelled','confirmed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `unpaid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_start` datetime NOT NULL,
  `appointment_end` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `appointments` */

insert  into `appointments`(`id`,`user_id`,`client_id`,`room_id`,`practitionner_id`,`machine_id`,`hand_id`,`service_id`,`setting_id`,`pack_id`,`zone`,`type`,`session`,`session_price`,`promotion`,`total_service_amount`,`room_time`,`check_in`,`check_out`,`status`,`note`,`paid`,`unpaid`,`appointment_start`,`appointment_end`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,1,1,NULL,NULL,1,NULL,2,'1,2','pack','2','100','1','198','50min','14:03','14:53','confirmed','asd1','0','198','2022-06-06 14:03:00','2022-06-06 14:53:00','1','1','2022-06-04 00:00:00','2022-06-04 14:49:37',NULL),(2,1,1,2,4,2,3,1,2,NULL,'1,2','service','5','1398','10','1258.2','50min','14:16','15:06','confirmed','dsaaa','0','1258.2','2022-06-06 14:16:00','2022-06-06 15:06:00','1','1','2022-06-04 00:00:00','2022-06-04 00:00:00',NULL),(3,1,1,2,1,2,3,1,2,NULL,'1','service','3','699','0','699','20min','16:13','16:33','taken','xcxzc','0','699','2022-06-06 16:13:00','2022-06-06 16:33:00','1',NULL,'2022-06-16 00:00:00','2022-06-16 16:14:19',NULL),(4,1,2,3,3,2,3,1,2,NULL,'1','service','3','699','0','699','20min','16:14','16:34','taken','xzcxzcxz','0','699','2022-06-06 16:14:00','2022-06-06 16:34:00','1',NULL,'2022-06-16 00:00:00','2022-06-16 16:14:42',NULL);

/*Table structure for table `center_timings` */

DROP TABLE IF EXISTS `center_timings`;

CREATE TABLE `center_timings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `practitioner_day_id` bigint(20) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `center_timings` */

insert  into `center_timings`(`id`,`user_id`,`practitioner_day_id`,`start_time`,`end_time`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,2,1,'12:00:00','18:00:00','2',NULL,'2022-06-01 00:00:00','2022-06-01 20:39:55',NULL),(2,2,2,'12:00:00','14:00:00','2',NULL,'2022-06-01 00:00:00','2022-06-01 20:39:55',NULL),(3,2,3,'12:00:00','14:00:00','2',NULL,'2022-06-01 00:00:00','2022-06-01 20:39:55',NULL);

/*Table structure for table `client_document` */

DROP TABLE IF EXISTS `client_document`;

CREATE TABLE `client_document` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `client_document` */

insert  into `client_document`(`id`,`client_id`,`user_id`,`file_name`,`path`,`size`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,'1',1,'ng-thumb-1.png','uploads/client/1/1651772758ng-thumb-1.png','3595','1',NULL,'2022-05-05 02:57:01',NULL,NULL),(2,'1',1,'1625213953_PB FSD.pdf','uploads/client/1/16517728241625213953_PB FSD.pdf','1096658','1',NULL,'2022-05-05 02:57:01',NULL,NULL),(3,'2',1,'recording.conf','uploads/client/2/1651955317recording.conf','127','1',NULL,'2022-05-07 08:28:37',NULL,NULL);

/*Table structure for table `client_notes` */

DROP TABLE IF EXISTS `client_notes`;

CREATE TABLE `client_notes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','completed','inprocess') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `client_notes` */

insert  into `client_notes`(`id`,`client_id`,`note`,`user_id`,`user_name`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,'1','sdasd',1,'Sad','completed','1','1','2022-05-05 00:00:00','2022-05-05 15:53:13',NULL),(2,'1','hi dawn',1,'Sad','inprocess','1','1','2022-05-05 00:00:00','2022-05-05 00:00:00',NULL);

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clients` */

insert  into `clients`(`id`,`user_id`,`first_name`,`last_name`,`email`,`phone_number`,`profile_pic`,`age`,`source`,`neighborhood`,`city`,`zip_code`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'sadsdsa','gill','darwingill6@gmail.com','020320','uploads/client/1651956104screenshot.png','1','sad','sad','asdas','dsa','1','1','2022-05-05 20:00:00','2022-05-07 20:41:44',NULL),(2,1,'wqe','gill','hr@gmail.com','0341111151',NULL,'1','sad','dsa','sad','dsa','1','1','2022-05-07 00:00:00','2022-05-07 00:00:00',NULL),(3,1,'dawn','sad','elizabethtoherphotography@gmail.com','03232132','uploads/client/1651956088screenshot-legacy.png','1','sad','sa','dsa','dsa','1','1','2022-05-07 00:00:00','2022-05-07 00:00:00',NULL),(4,1,'dawn','asd','darwingill6@gmail.com','020320',NULL,'12','sad','sad','dsa','wqe','1',NULL,'2022-05-28 00:00:00','2022-05-28 17:07:47',NULL),(5,1,'sad','sad','darwingill6@gmail.com','020320',NULL,'2','sad','dsa','sad','wqe','1',NULL,'2022-05-28 00:00:00','2022-05-28 20:31:27',NULL),(6,1,'sad','gill','hr@gmail.com','020320',NULL,'1','12sad','sad','1','sad','1',NULL,'2022-05-28 00:00:00','2022-05-28 21:13:20',NULL),(7,1,'sad','sad','elizabethtoherphotography@gmail.com','020320','uploads/client/1653773248amin-avatar.jpeg','78','as','sad','sad','3','1',NULL,'2022-05-28 00:00:00','2022-05-28 21:27:28',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `hand_settings` */

DROP TABLE IF EXISTS `hand_settings`;

CREATE TABLE `hand_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `machine_id` bigint(20) NOT NULL,
  `hand_id` bigint(20) NOT NULL,
  `setting_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hand_settings` */

insert  into `hand_settings`(`id`,`user_id`,`machine_id`,`hand_id`,`setting_name`,`min`,`max`,`start`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,1,'hiu','12','21','3','1','1','2022-05-04 00:00:00','2022-05-04 00:00:00',NULL),(2,1,2,3,'hiuqqqqqqqqqqq','1','21','3','1','1','2022-05-04 00:00:00','2022-05-04 00:00:00',NULL),(3,1,2,4,'a','1','2','3','1',NULL,'2022-05-04 00:00:00','2022-05-04 22:56:23',NULL);

/*Table structure for table `hands` */

DROP TABLE IF EXISTS `hands`;

CREATE TABLE `hands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `machine_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hands` */

insert  into `hands`(`id`,`user_id`,`machine_id`,`name`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,1,'hahha','1',NULL,'2022-05-04 00:00:00','2022-05-04 12:10:25',NULL),(2,1,1,'hehehehe','1',NULL,'2022-05-04 00:00:00','2022-05-04 12:10:33',NULL),(3,1,2,'hhahahaaaaaa','1','1','2022-05-04 00:00:00','2022-05-04 00:00:00',NULL),(4,1,2,'aaaaaaa','1',NULL,'2022-05-04 00:00:00','2022-05-04 22:56:15',NULL);

/*Table structure for table `machines` */

DROP TABLE IF EXISTS `machines`;

CREATE TABLE `machines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `machines` */

insert  into `machines`(`id`,`user_id`,`name`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'dawn','1',NULL,'2022-05-04 00:00:00','2022-05-04 14:50:47','2022-05-04 14:50:47'),(2,1,'dawna','1','1','2022-05-04 00:00:00','2022-06-03 00:00:00',NULL),(3,1,'asdsad','1',NULL,'2022-05-04 00:00:00','2022-05-04 14:45:56',NULL),(4,1,'hi','1',NULL,'2022-05-04 00:00:00','2022-05-04 14:50:50','2022-05-04 14:50:50'),(5,1,'awd','1','1','2022-05-04 00:00:00','2022-05-04 00:00:00',NULL),(6,2,'IPL','2',NULL,'2022-06-01 00:00:00','2022-06-01 20:40:41',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_04_11_114638_create_user_roles_table',1),(6,'2022_04_12_173054_create_settings_table',1),(7,'2022_05_03_001316_create_rooms_table',2),(9,'2022_05_03_001347_create_practitioners_table',3),(10,'2022_05_03_001222_create_machines_table',4),(11,'2022_04_13_220743_add_profile_picture_to_users_table',5),(12,'2022_04_14_174526_add_contact_no_to_users_table',6),(13,'2022_05_04_102934_create_hands_table',7),(14,'2022_05_04_112446_create_hand_settings_table',8),(16,'2022_05_03_000945_create_clients_table',9),(17,'2022_05_05_145143_create_client_notes_table',10),(18,'2022_05_05_173817_create_client_document_table',11),(19,'2022_05_05_191546_zone',12),(20,'2022_05_03_001302_create_services_table',13),(21,'2022_05_03_113053_create_appointments_table',14),(22,'2022_05_07_191854_appointment_payment',15),(23,'2022_05_29_103936_create_center_timing_table',16),(24,'2022_05_29_135650_alter_services_table',17),(25,'2022_05_29_140104_create_service_zones_table',18),(26,'2022_06_04_081350_create_packs_table',19);

/*Table structure for table `packs` */

DROP TABLE IF EXISTS `packs`;

CREATE TABLE `packs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pack_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `packs` */

insert  into `packs`(`id`,`pack_name`,`services_id`,`session`,`pack_price`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`,`user_id`) values (1,'adssa','1,2,3','40','20',NULL,NULL,NULL,'2022-06-04 09:52:21','2022-06-04 09:52:21','1'),(2,'aaaa','1,2','2','100','1','1','2022-06-04 00:00:00','2022-06-04 12:15:11',NULL,'1'),(5,'aaa','1,2','1','1','1',NULL,'2022-06-04 00:00:00','2022-06-04 11:53:44','2022-06-04 11:53:44','1'),(6,'aaa','1,3','111','111','1',NULL,'2022-06-04 00:00:00','2022-06-04 11:53:47','2022-06-04 11:53:47','1'),(7,'aaa2','1,2','1','23','1',NULL,'2022-06-04 00:00:00','2022-06-04 11:54:21',NULL,'1');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `practitioners` */

DROP TABLE IF EXISTS `practitioners`;

CREATE TABLE `practitioners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `practitioners` */

insert  into `practitioners`(`id`,`user_id`,`first_name`,`last_name`,`email`,`phone_number`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'sad','sad','darwingill6@gmail.com','020320','1',NULL,'2022-05-07 00:00:00','2022-05-07 12:22:31',NULL),(2,1,'daw','gill','dawngill08@gmail.com','020320','1',NULL,'2022-05-04 00:17:55','2022-05-04 00:18:49','2022-05-04 00:18:49'),(3,1,'dawn','gill','darwingill6@gmail.com','020320','1',NULL,'2022-05-07 00:00:00','2022-05-07 12:22:29',NULL),(4,2,'sad','sad','darwingill6@gmail.com','020320','2',NULL,'2022-06-01 20:40:19','2022-06-01 20:40:19',NULL);

/*Table structure for table `practitioners_days` */

DROP TABLE IF EXISTS `practitioners_days`;

CREATE TABLE `practitioners_days` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `practitioners_days` */

insert  into `practitioners_days`(`id`,`day`,`deleted_at`) values (1,'monday',NULL),(2,'tuesday',NULL),(3,'wednesday',NULL),(4,'thursday',NULL),(5,'friday',NULL),(6,'saturday',NULL),(7,'sunday',NULL);

/*Table structure for table `practitioners_time` */

DROP TABLE IF EXISTS `practitioners_time`;

CREATE TABLE `practitioners_time` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `practitioner_id` bigint(20) DEFAULT NULL,
  `practitioner_day_id` bigint(20) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `practitioners_time` */

insert  into `practitioners_time`(`id`,`practitioner_id`,`practitioner_day_id`,`start_time`,`end_time`,`deleted_at`) values (1,1,1,'07:00:00','17:00:00',NULL),(2,1,2,'12:00:00','18:15:00',NULL),(3,2,2,'12:00:00','16:00:00',NULL),(4,2,1,'12:00:00','12:00:00',NULL),(5,3,1,'07:00:00','20:00:00',NULL),(6,3,2,'10:00:00','18:00:00',NULL),(7,4,1,'12:00:00','17:00:00',NULL);

/*Table structure for table `rooms` */

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rooms` */

insert  into `rooms`(`id`,`user_id`,`name`,`color`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'hi hi a','#ffb61a','2','1',NULL,'2022-05-04 00:00:00',NULL),(2,1,'daw','#ffb61a','1',NULL,'2022-05-03 00:00:00','2022-05-03 15:54:18',NULL),(3,1,'daw','#463f30','1',NULL,'2022-05-03 00:00:00','2022-05-03 15:55:52',NULL),(4,1,'dawn','#7c5050','1',NULL,'2022-05-03 00:00:00','2022-05-03 16:09:21',NULL),(5,1,'sadsad','#000000','1',NULL,'2022-05-03 00:00:00','2022-05-03 16:20:03',NULL),(6,1,'sadsa','#5a2626','1',NULL,'2022-05-03 00:00:00','2022-05-03 19:29:41',NULL),(7,1,'aaa','#000000','1',NULL,'2022-05-03 00:00:00','2022-05-03 22:50:23',NULL),(8,1,'daw','#000000','1',NULL,'2022-05-04 00:00:00','2022-05-04 14:43:55',NULL),(9,1,'kkkkkkkkkkk','#751f1f','1','1','2022-05-04 00:00:00','2022-05-04 00:00:00',NULL),(10,2,'room1','#000000','2',NULL,'2022-06-01 00:00:00','2022-06-01 20:40:32',NULL);

/*Table structure for table `service_zones` */

DROP TABLE IF EXISTS `service_zones`;

CREATE TABLE `service_zones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `service_zones` */

insert  into `service_zones`(`id`,`service_id`,`session`,`time_limit`,`price`,`zone`,`user_id`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'4','20','233','leg',1,'1','1','2022-06-04 11:50:39','2022-08-18 08:11:28',NULL),(2,1,'2','30','233','face',1,'1',NULL,'2022-06-04 11:50:48','2022-06-04 11:50:48',NULL),(3,1,'1','1','111','er',1,'1','1','2022-08-18 08:11:37','2022-08-21 06:52:02',NULL),(4,1,'1','20','122','aa',1,'1',NULL,'2022-08-21 06:52:13','2022-08-21 18:52:13',NULL);

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `machine_id` bigint(20) NOT NULL,
  `hand_id` bigint(20) NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_limit` varchar(277) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `services` */

insert  into `services`(`id`,`user_id`,`machine_id`,`hand_id`,`service_name`,`session`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`,`zone`,`time_limit`,`price`) values (1,1,2,3,'sadsad',NULL,'1',NULL,'2022-06-04 11:50:24','2022-06-04 11:50:24',NULL,NULL,NULL,NULL),(2,1,1,3,'hjhkhkhkhksadsad',NULL,'1',NULL,'2022-06-04 11:53:59','2022-06-04 11:53:59',NULL,NULL,NULL,NULL);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_roles` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blank.png',
  `updated_by` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`contact_no`,`user_type`,`email`,`email_verified_at`,`password`,`profile_picture`,`updated_by`,`created_by`,`remember_token`,`deleted_at`,`created_at`,`updated_at`) values (1,'Sad','Sad','213213111','1','dawngill08@gmail.com',NULL,'$2y$10$wfMRSjxG.6EtKz8LNJkVNeMevQRI91ZCQb7cV07jmCQ3fFrx/YIn6','1.jpg',NULL,NULL,NULL,NULL,'2022-05-02 22:07:41','2022-05-04 01:21:34'),(2,'daw','sad',NULL,'1','dawngill09@gmail.com',NULL,'$2y$10$JJlqoe4Kd6ng3pVkzqdKjOkhbOJJBKfETPHnNhvE2l6ec2BFWn2Au','blank.png',NULL,NULL,NULL,NULL,'2022-06-01 20:37:37','2022-06-01 20:37:37');

/*Table structure for table `zone` */

DROP TABLE IF EXISTS `zone`;

CREATE TABLE `zone` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `zone` */

insert  into `zone`(`id`,`zone_name`,`user_id`,`created_by`,`updated_by`,`created_at`,`updated_at`,`deleted_at`) values (1,'leg',1,NULL,NULL,NULL,NULL,NULL),(2,'face',1,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
