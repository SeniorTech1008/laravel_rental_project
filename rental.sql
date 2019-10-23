/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.5.5-10.3.16-MariaDB : Database - rental
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`rental` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `rental`;

/*Table structure for table `checklist_item` */

DROP TABLE IF EXISTS `checklist_item`;

CREATE TABLE `checklist_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `checklist_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `checklist_item_checklist_id_foreign` (`checklist_id`),
  KEY `checklist_item_item_id_foreign` (`item_id`),
  CONSTRAINT `checklist_item_checklist_id_foreign` FOREIGN KEY (`checklist_id`) REFERENCES `checklists` (`id`) ON DELETE CASCADE,
  CONSTRAINT `checklist_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checklist_item` */

insert  into `checklist_item`(`id`,`checklist_id`,`item_id`) values (1,1,1),(3,1,4),(5,1,2),(6,1,3);

/*Table structure for table `checklists` */

DROP TABLE IF EXISTS `checklists`;

CREATE TABLE `checklists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `checklists` */

insert  into `checklists`(`id`,`name`,`start_date`,`end_date`,`created_at`,`updated_at`) values (1,'Checklist1','2019-10-21','2019-10-27','2019-10-21 10:43:27','2019-10-21 10:43:27');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `item_task` */

DROP TABLE IF EXISTS `item_task`;

CREATE TABLE `item_task` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) unsigned NOT NULL,
  `checklist_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_checklist_item_task_id_foreign` (`task_id`),
  KEY `task_checklist_item_checklist_id_foreign` (`checklist_id`),
  KEY `task_checklist_item_item_id_foreign` (`item_id`),
  CONSTRAINT `task_checklist_item_checklist_id_foreign` FOREIGN KEY (`checklist_id`) REFERENCES `checklists` (`id`) ON DELETE CASCADE,
  CONSTRAINT `task_checklist_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `task_checklist_item_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `item_task` */

insert  into `item_task`(`id`,`task_id`,`checklist_id`,`item_id`) values (1,1,1,1),(2,1,1,4);

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `items` */

insert  into `items`(`id`,`name`,`created_at`,`updated_at`) values (1,'Item1','2019-10-21 10:24:04','2019-10-21 10:24:04'),(2,'Item2','2019-10-21 10:41:35','2019-10-21 10:41:35'),(3,'Item3','2019-10-21 10:41:41','2019-10-21 10:41:41'),(4,'Item4','2019-10-21 10:41:51','2019-10-21 10:41:51');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_10_21_103047_create_roles_table',1),(5,'2019_10_21_103316_create_role_user_table',1),(6,'2019_10_21_103426_create_items_table',1),(7,'2019_10_21_103457_create_checklists_table',1),(8,'2019_10_21_103520_create_checklist_item_table',1),(9,'2019_10_21_134810_create_tasks_table',2),(10,'2019_10_21_141059_create_task_checklist_item_table',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`role_id`,`user_id`) values (1,8,1),(2,5,2),(3,7,3),(4,8,4);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`description`,`created_at`,`updated_at`) values (5,'property-owner','Property Owner','2019-10-20 21:30:00','2019-10-20 21:30:00'),(6,'property-manager','Property Manager','2019-10-20 21:30:00','2019-10-20 21:30:00'),(7,'renter','Renter','2019-10-20 21:30:00','2019-10-20 21:30:00'),(8,'cleaning-company','Cleaning company','2019-10-20 21:30:00','2019-10-20 21:30:00');

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `checklist_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_user_id_foreign` (`user_id`),
  KEY `tasks_checklist_id_foreign` (`checklist_id`),
  CONSTRAINT `tasks_checklist_id_foreign` FOREIGN KEY (`checklist_id`) REFERENCES `checklists` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tasks` */

insert  into `tasks`(`id`,`user_id`,`checklist_id`,`created_at`,`updated_at`) values (1,2,1,'2019-10-21 14:37:49','2019-10-21 14:37:49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'admin','admin@example.com',NULL,'$2y$10$7xvMZZHU50Yt9xKaYh.OJOrbuo8.h3MkvROASzkzVRRRYS59ItUha','0ajPdQjGyogRSSLCVv0sUd2TCf8uhID1OYkDAvwOuJjJ8QyWVYguFRZiJ3Uk','2019-10-21 09:31:15','2019-10-21 09:31:15'),(2,'owner','owner@example.com',NULL,'$2y$10$lvKBEj2mHCDII/5WYgcbXOyGX36R.j4EEnjN0fSMxIxg0dIpHIJBO',NULL,'2019-10-21 11:07:40','2019-10-21 11:07:40'),(3,'renter','renter@gmail.com',NULL,'$2y$10$Rt6dcsZxhWP7yXN39gFTFuI4KvcaYKqB7XP979FIQYbQX6o2AZtOi',NULL,'2019-10-23 06:53:59','2019-10-23 06:53:59'),(4,'cleaner','cleaner@gmail.com',NULL,'$2y$10$c1WymDazcmlN.MPv3YEhS.dDRICvND6zWMZt2k2VNqSUR3tZ0svfq',NULL,'2019-10-23 06:56:39','2019-10-23 06:56:39');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
