-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour atitodb3
CREATE DATABASE IF NOT EXISTS `atitodb3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `atitodb3`;

-- Listage de la structure de table atitodb3. communes
CREATE TABLE IF NOT EXISTS `communes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `communes_ville_id_foreign` (`ville_id`),
  CONSTRAINT `communes_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.communes : ~10 rows (environ)
INSERT INTO `communes` (`id`, `nom_commune`, `ville_id`, `created_at`, `updated_at`) VALUES
	(21, 'COCODY', 31, '2023-12-01 13:14:37', '2024-02-16 15:14:23'),
	(23, 'ABOBO', 31, '2024-02-16 15:09:54', '2024-02-16 15:09:54'),
	(24, 'ADJAME', 31, '2024-02-16 15:10:21', '2024-02-16 15:10:21'),
	(25, 'ATTECOUBE', 31, '2024-02-16 15:10:55', '2024-02-16 15:10:55'),
	(27, 'KOUMASSI', 31, '2024-02-16 15:11:25', '2024-02-16 15:11:25'),
	(28, 'MARCORY', 31, '2024-02-16 15:11:39', '2024-02-16 15:11:39'),
	(29, 'PLATEAU', 31, '2024-02-16 15:11:53', '2024-02-16 15:11:53'),
	(30, 'PORT-BOUET', 31, '2024-02-16 15:12:15', '2024-02-16 15:12:15'),
	(31, 'TREICHVILLE', 31, '2024-02-16 15:12:32', '2024-02-16 15:12:32'),
	(32, 'YOPOUGON', 31, '2024-02-16 15:12:45', '2024-02-16 15:12:45');

-- Listage de la structure de table atitodb3. comodites
CREATE TABLE IF NOT EXISTS `comodites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comodite_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.comodites : ~4 rows (environ)
INSERT INTO `comodites` (`id`, `libel`, `comodite_icon`, `created_at`, `updated_at`) VALUES
	(10, 'Éclairage adéquat', 'fas fa-lightbulb', '2024-02-09 11:52:20', '2024-02-09 11:52:20'),
	(11, 'Systèmes de ventilation', 'fas fa-fan', '2024-02-09 11:52:57', '2024-02-15 18:24:47'),
	(12, 'Accès à internet', 'fas fa-globe', '2024-02-09 11:53:36', '2024-02-09 11:53:36'),
	(13, 'Mobilier confortable', 'fas fa-bed-empty', '2024-02-09 11:56:57', '2024-02-09 11:56:57');

-- Listage de la structure de table atitodb3. comodite_salle
CREATE TABLE IF NOT EXISTS `comodite_salle` (
  `salle_id` bigint unsigned NOT NULL,
  `comodite_id` bigint unsigned NOT NULL,
  KEY `comodite_salle_salle_id_foreign` (`salle_id`),
  KEY `comodite_salle_comodite_id_foreign` (`comodite_id`),
  CONSTRAINT `comodite_salle_comodite_id_foreign` FOREIGN KEY (`comodite_id`) REFERENCES `comodites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comodite_salle_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.comodite_salle : ~2 rows (environ)
INSERT INTO `comodite_salle` (`salle_id`, `comodite_id`) VALUES
	(16, 10),
	(16, 12),
	(16, 11);

-- Listage de la structure de table atitodb3. comptes
CREATE TABLE IF NOT EXISTS `comptes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_compte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_compte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation_compte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siteweb_compte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activite_compte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_compte` text COLLATE utf8mb4_unicode_ci,
  `logo_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comptes_user_id_foreign` (`user_id`),
  CONSTRAINT `comptes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.comptes : ~1 rows (environ)
INSERT INTO `comptes` (`id`, `nom_compte`, `prenom_compte`, `telephone_compte`, `whatsapp_compte`, `adresse_compte`, `localisation_compte`, `nom_entreprise`, `siteweb_compte`, `activite_compte`, `description_compte`, `logo_entreprise`, `photo`, `user_id`, `created_at`, `updated_at`) VALUES
	(6, 'Gohore', 'Thiery M', '0749402879', '0749402879', 'Abobo cote stade', NULL, 'ATITO GROUP', 'www.monsite.com', 'Infographe', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi nostrum magnam nihil velit culpa porro atque fugit, totam, facere ex nam et laborum, ducimus tenetur aspernatur delectus facilis consectetur vero.', 'public/FC89kdwgZkbaRxq5dfuXcHUwJTYLaq30oPBOrK0z.png', 'public/AcUOl8FKrnxWnqpoJmnGKYGDvTADu5bKQtN4Lhsy.png', 2, '2023-12-01 14:32:07', '2024-02-03 14:11:29'),
	(8, 'TCHIMOU', 'Junior', '+2250747687857', '0707070808', 'Riviera 2', NULL, 'IZI GROUP', 'https://otakufr.co/episode/chiyu-mahou-no-machigatta-tsukaikata-05-vostfr/', 'Demarcheur Maison', NULL, 'public/1UJH8YubI7zJCpIJwfMRH6GLSJKz960bUM1VbBuz.png', 'public/2GHHodxfxJu1VfX5c9nm5D0EJH3euCkzPiFWijJC.png', 13, '2024-02-08 20:08:39', '2024-02-09 09:45:04'),
	(9, 'Jathniel', 'Achi', '0708839761', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/cover.jpg', 'public/profile.png', 14, '2024-02-09 09:41:14', '2024-02-09 09:41:14'),
	(10, 'GOHORE', 'THIERY', '0749402879', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/cover.jpg', 'public/profile.png', 15, '2024-02-09 17:45:34', '2024-02-09 17:45:34');

-- Listage de la structure de table atitodb3. contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nom_prenom_c` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `compte_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_compte_id_foreign` (`compte_id`),
  CONSTRAINT `contacts_compte_id_foreign` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.contacts : ~4 rows (environ)
INSERT INTO `contacts` (`id`, `message`, `nom_prenom_c`, `phone`, `email`, `compte_id`, `created_at`, `updated_at`) VALUES
	(9, 'Okay', 'GIKI', '+23425456256325', 'giki@gmial.com', 6, '2024-02-08 10:35:06', '2024-02-08 10:35:06'),
	(10, NULL, NULL, NULL, 'tchimouj66@gmail.com', NULL, '2024-02-08 15:40:31', '2024-02-08 15:40:31'),
	(11, 'je voulais prendre du pain, je voulais prendre du pain, je voulais prendre du pain, je voulais prendre du pain,je voulais prendre du pain je voulais prendre du pain,je voulais prendre du pain,je voulais prendre du pain', 'MARKO POLO', '0707070708', 'mark@gm.co', 8, '2024-02-09 16:21:11', '2024-02-09 16:21:11'),
	(12, 'JE SUIS INTERESSE', 'Junior Medard Vianney TCHIMOU', '+2250103705463', 'tchimouj77@gmail.com', 6, '2024-02-16 11:23:00', '2024-02-16 11:23:00');

-- Listage de la structure de table atitodb3. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.failed_jobs : ~0 rows (environ)

-- Listage de la structure de table atitodb3. info_user_quartier
CREATE TABLE IF NOT EXISTS `info_user_quartier` (
  `quartier_id` bigint unsigned NOT NULL,
  `info_user_id` bigint unsigned NOT NULL,
  KEY `info_user_quartier_quartier_id_foreign` (`quartier_id`),
  KEY `info_user_quartier_info_user_id_foreign` (`info_user_id`),
  CONSTRAINT `info_user_quartier_info_user_id_foreign` FOREIGN KEY (`info_user_id`) REFERENCES `comptes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `info_user_quartier_quartier_id_foreign` FOREIGN KEY (`quartier_id`) REFERENCES `quartiers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.info_user_quartier : ~0 rows (environ)

-- Listage de la structure de table atitodb3. info_user_salle
CREATE TABLE IF NOT EXISTS `info_user_salle` (
  `info_user_id` bigint unsigned NOT NULL,
  `salle_id` bigint unsigned NOT NULL,
  KEY `info_user_salle_info_user_id_foreign` (`info_user_id`),
  KEY `info_user_salle_salle_id_foreign` (`salle_id`),
  CONSTRAINT `info_user_salle_info_user_id_foreign` FOREIGN KEY (`info_user_id`) REFERENCES `comptes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `info_user_salle_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.info_user_salle : ~3 rows (environ)
INSERT INTO `info_user_salle` (`info_user_id`, `salle_id`) VALUES
	(8, 16);

-- Listage de la structure de table atitodb3. info_user_ville
CREATE TABLE IF NOT EXISTS `info_user_ville` (
  `ville_id` bigint unsigned NOT NULL,
  `info_user_id` bigint unsigned NOT NULL,
  KEY `info_user_ville_ville_id_foreign` (`ville_id`),
  KEY `info_user_ville_info_user_id_foreign` (`info_user_id`),
  CONSTRAINT `info_user_ville_info_user_id_foreign` FOREIGN KEY (`info_user_id`) REFERENCES `comptes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `info_user_ville_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.info_user_ville : ~0 rows (environ)

-- Listage de la structure de table atitodb3. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.migrations : ~0 rows (environ)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_11_10_000001_create_communes_table', 1),
	(6, '2023_11_10_000002_create_comptes_table', 1),
	(7, '2023_11_10_000003_create_info_user_quartier_table', 1),
	(8, '2023_11_10_000004_create_info_user_salle_table', 1),
	(9, '2023_11_10_000005_create_info_user_ville_table', 1),
	(10, '2023_11_10_000006_create_photos_salles_table', 1),
	(11, '2023_11_10_000007_create_photos_salle_salle_table', 1),
	(12, '2023_11_10_000008_create_quartiers_table', 1),
	(13, '2023_11_10_000009_create_salles_table', 1),
	(14, '2023_11_10_000010_create_salle_type_salle_table', 1),
	(15, '2023_11_10_000011_create_salle_video_salle_table', 1),
	(16, '2023_11_10_000012_create_texte_jours_table', 1),
	(17, '2023_11_10_000013_create_type_salles_table', 1),
	(18, '2023_11_10_000014_create_video_salles_table', 1),
	(19, '2023_11_10_000015_create_villes_table', 1),
	(20, '2023_11_10_009001_add_foreigns_to_communes_table', 1),
	(21, '2023_11_10_009002_add_foreigns_to_comptes_table', 1),
	(22, '2023_11_10_009003_add_foreigns_to_info_user_quartier_table', 1),
	(23, '2023_11_10_009004_add_foreigns_to_info_user_salle_table', 1),
	(24, '2023_11_10_009005_add_foreigns_to_info_user_ville_table', 1),
	(25, '2023_11_10_009006_add_foreigns_to_photos_salle_salle_table', 1),
	(26, '2023_11_10_009007_add_foreigns_to_quartiers_table', 1),
	(27, '2023_11_10_009008_add_foreigns_to_salles_table', 1),
	(28, '2023_11_10_009009_add_foreigns_to_salle_type_salle_table', 1),
	(29, '2023_11_10_009010_add_foreigns_to_salle_video_salle_table', 1),
	(30, '2023_11_28_135000_create_sessions_table', 1),
	(31, '2023_11_28_135040_create_permission_tables', 1);

-- Listage de la structure de table atitodb3. model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.model_has_permissions : ~0 rows (environ)

-- Listage de la structure de table atitodb3. model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.model_has_roles : ~5 rows (environ)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(2, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 2),
	(3, 'App\\Models\\User', 13),
	(3, 'App\\Models\\User', 14),
	(3, 'App\\Models\\User', 15);

-- Listage de la structure de table atitodb3. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.password_resets : ~0 rows (environ)

-- Listage de la structure de table atitodb3. permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.permissions : ~60 rows (environ)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'list communes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(2, 'view communes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(3, 'create communes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(4, 'update communes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(5, 'delete communes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(6, 'list comptes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(7, 'view comptes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(8, 'create comptes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(9, 'update comptes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(10, 'delete comptes', 'web', '2023-11-28 14:12:11', '2023-11-28 14:12:11'),
	(11, 'list photossalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(12, 'view photossalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(13, 'create photossalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(14, 'update photossalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(15, 'delete photossalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(16, 'list quartiers', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(17, 'view quartiers', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(18, 'create quartiers', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(19, 'update quartiers', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(20, 'delete quartiers', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(21, 'list salles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(22, 'view salles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(23, 'create salles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(24, 'update salles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(25, 'delete salles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(26, 'list textejours', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(27, 'view textejours', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(28, 'create textejours', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(29, 'update textejours', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(30, 'delete textejours', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(31, 'list typesalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(32, 'view typesalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(33, 'create typesalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(34, 'update typesalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(35, 'delete typesalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(36, 'list videosalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(37, 'view videosalles', 'web', '2023-11-28 14:12:12', '2023-11-28 14:12:12'),
	(38, 'create videosalles', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(39, 'update videosalles', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(40, 'delete videosalles', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(41, 'list villes', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(42, 'view villes', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(43, 'create villes', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(44, 'update villes', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(45, 'delete villes', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(46, 'list roles', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(47, 'view roles', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(48, 'create roles', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(49, 'update roles', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(50, 'delete roles', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(51, 'list permissions', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(52, 'view permissions', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(53, 'create permissions', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(54, 'update permissions', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(55, 'delete permissions', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(56, 'list users', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(57, 'view users', 'web', '2023-11-28 14:12:14', '2023-11-28 14:12:14'),
	(58, 'create users', 'web', '2023-11-28 14:12:14', '2023-11-28 14:12:14'),
	(59, 'update users', 'web', '2023-11-28 14:12:14', '2023-11-28 14:12:14'),
	(60, 'delete users', 'web', '2023-11-28 14:12:14', '2023-11-28 14:12:14'),
	(61, 'view comodites', 'web', '2024-01-18 13:10:12', '2024-01-18 13:10:12'),
	(62, 'create comodites', 'web', '2024-01-18 13:10:13', '2024-01-18 13:10:13'),
	(63, 'update comodites', 'web', '2024-01-18 13:10:13', '2024-01-18 13:10:13'),
	(64, 'delete comodites', 'web', '2024-01-18 13:10:13', '2024-01-18 13:10:13');

-- Listage de la structure de table atitodb3. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.personal_access_tokens : ~0 rows (environ)

-- Listage de la structure de table atitodb3. photos_salles
CREATE TABLE IF NOT EXISTS `photos_salles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.photos_salles : ~13 rows (environ)
INSERT INTO `photos_salles` (`id`, `titre_image`, `description_image`, `photo`, `user_id`, `created_at`, `updated_at`) VALUES
	(6, 'Bella salle', 'Différentiel de durabilité', 'public/GAnZSk9ZL4ZnHAfdYrvMJsTibeAbgVEmqryAINwI.jpg', NULL, '2023-12-01 14:09:17', '2023-12-01 14:09:17'),
	(7, 'Room principal', 'Une fois que vous avez installé le client Zoom, cliquez ci-dessous sur', 'public/vz8LUnzdSAxyW4cdVIRroOQzyY9i1t1AbDGyNek0.jpg', NULL, '2023-12-01 14:11:41', '2023-12-01 14:11:41'),
	(8, 'Room secondaire', 'Une fois que vous avez installé le client Zoom, cliquez ci-dessous sur', 'public/eaCFMjbWFB3jzFARpWtMpHFAbKgiWT0Vc7OGo0Ng.jpg', NULL, '2023-12-01 14:13:04', '2023-12-01 14:13:04'),
	(9, 'Room tertiaire', 'Une fois que vous avez installé le client Zoom, cliquez ci-dessous sur', 'public/sXybLKX6dLxbyeIomb4Ar8vgiBmsdiPO4hQSZThZ.jpg', NULL, '2023-12-01 14:17:36', '2023-12-01 14:17:36'),
	(10, 'Image 23', 'Image 1', 'public/NLvxApgvLuWWLEXbCcocI7FCycTFBJY6c482fie1.png', NULL, '2024-01-27 13:36:38', '2024-01-27 13:36:38'),
	(12, 'Image 26', 'Image 26', 'public/5XGO8miY9zvB1HfWvuKevFhyKD36wk5a6L4i93Yi.png', NULL, '2024-01-27 13:42:30', '2024-01-27 13:42:30'),
	(13, 'Image 26', 'Image 26', 'public/cLLJT9SmWbvuWWvZ7wmOV4jXNGrDr4Up2qcA003k.png', NULL, '2024-01-27 13:43:20', '2024-01-27 13:43:20'),
	(14, 'Image 26', 'Image 26', 'public/ElOEDwZ9fGBWKdzr3fmDTLUCHn57l8IM87Za4dm5.png', NULL, '2024-01-27 13:43:37', '2024-01-27 13:43:37'),
	(16, 'Image 27', 'Image 27', 'public/mJNWGoIkMv9YiHGUMDLsql5fhJFIWiDUTI9EipRN.png', NULL, '2024-01-27 13:45:16', '2024-01-27 13:45:16'),
	(17, 'Image 266', 'Ok', 'public/JBGNpoHK2VUZN8R8idMNCtadKakva0N4y6uecsfk.jpg', NULL, '2024-01-27 17:44:19', '2024-01-27 17:44:19'),
	(18, 'IMG2', 'premiere 1', 'public/m4HCj3WEyaDVMsi5jKop0NjcttYdRXZrQN82ByQi.jpg', NULL, '2024-02-09 11:43:05', '2024-02-09 11:43:05'),
	(19, 'IMG3', 'premiere 2', 'public/flpY6VOdnCEdU78I0NrFI30s7icPjiDtcDAoSRwn.jpg', NULL, '2024-02-09 11:43:33', '2024-02-09 11:43:33'),
	(20, 'IMG4', 'premiere 4', 'public/KjC5ftC9tfZtd0nmz8EVjpCWl7kKQQHvk9pK7OdV.jpg', NULL, '2024-02-09 11:43:57', '2024-02-09 11:43:57');

-- Listage de la structure de table atitodb3. photos_salle_salle
CREATE TABLE IF NOT EXISTS `photos_salle_salle` (
  `photos_salle_id` bigint unsigned NOT NULL,
  `salle_id` bigint unsigned NOT NULL,
  KEY `photos_salle_salle_photos_salle_id_foreign` (`photos_salle_id`),
  KEY `photos_salle_salle_salle_id_foreign` (`salle_id`),
  CONSTRAINT `photos_salle_salle_photos_salle_id_foreign` FOREIGN KEY (`photos_salle_id`) REFERENCES `photos_salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `photos_salle_salle_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.photos_salle_salle : ~2 rows (environ)
INSERT INTO `photos_salle_salle` (`photos_salle_id`, `salle_id`) VALUES
	(18, 16),
	(19, 16),
	(20, 16);

-- Listage de la structure de table atitodb3. quartiers
CREATE TABLE IF NOT EXISTS `quartiers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_quartier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quartiers_commune_id_foreign` (`commune_id`),
  CONSTRAINT `quartiers_commune_id_foreign` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.quartiers : ~0 rows (environ)
INSERT INTO `quartiers` (`id`, `nom_quartier`, `commune_id`, `created_at`, `updated_at`) VALUES
	(11, 'Riviera 2', 21, '2023-12-01 13:15:11', '2023-12-01 13:15:11');

-- Listage de la structure de table atitodb3. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.roles : ~2 rows (environ)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'user', 'web', '2023-11-28 14:12:13', '2023-11-28 14:12:13'),
	(2, 'super-admin', 'web', '2023-11-28 14:12:14', '2023-11-28 14:12:14'),
	(3, 'PosterUserAccess', 'web', '2024-01-17 17:43:47', '2024-02-03 14:07:49');

-- Listage de la structure de table atitodb3. role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.role_has_permissions : ~129 rows (environ)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(9, 2),
	(10, 2),
	(11, 2),
	(12, 2),
	(13, 2),
	(14, 2),
	(15, 2),
	(16, 2),
	(17, 2),
	(18, 2),
	(19, 2),
	(20, 2),
	(21, 2),
	(22, 2),
	(23, 2),
	(24, 2),
	(25, 2),
	(26, 2),
	(27, 2),
	(28, 2),
	(29, 2),
	(30, 2),
	(31, 2),
	(32, 2),
	(33, 2),
	(34, 2),
	(35, 2),
	(36, 2),
	(37, 2),
	(38, 2),
	(39, 2),
	(40, 2),
	(41, 2),
	(42, 2),
	(43, 2),
	(44, 2),
	(45, 2),
	(46, 2),
	(47, 2),
	(48, 2),
	(49, 2),
	(50, 2),
	(51, 2),
	(52, 2),
	(53, 2),
	(54, 2),
	(55, 2),
	(56, 2),
	(57, 2),
	(58, 2),
	(59, 2),
	(60, 2),
	(8, 3),
	(9, 3),
	(11, 3),
	(12, 3),
	(13, 3),
	(14, 3),
	(15, 3),
	(21, 3),
	(22, 3),
	(23, 3),
	(24, 3),
	(25, 3),
	(31, 3),
	(32, 3),
	(33, 3),
	(36, 3),
	(37, 3),
	(38, 3),
	(39, 3),
	(40, 3),
	(58, 3),
	(59, 3),
	(61, 3),
	(62, 3);

-- Listage de la structure de table atitodb3. salles
CREATE TABLE IF NOT EXISTS `salles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_salle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_salle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation_salle` text COLLATE utf8mb4_unicode_ci,
  `capacite_salle` int NOT NULL,
  `tarif_salle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acces_salle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logistique_salle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_salle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_salle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_internet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_salle` datetime DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `commune_id` bigint unsigned DEFAULT NULL,
  `ville_id` bigint unsigned DEFAULT NULL,
  `quartier_id` bigint unsigned DEFAULT NULL,
  `validated` int NOT NULL DEFAULT '0',
  `promoted` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `salles_commune_id_foreign` (`commune_id`),
  KEY `salles_ville_id_foreign` (`ville_id`),
  KEY `salles_quartier_id_foreign` (`quartier_id`),
  CONSTRAINT `salles_commune_id_foreign` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `salles_quartier_id_foreign` FOREIGN KEY (`quartier_id`) REFERENCES `quartiers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `salles_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.salles : ~1 rows (environ)
INSERT INTO `salles` (`id`, `type`, `nom_salle`, `adresse_salle`, `presentation_salle`, `capacite_salle`, `tarif_salle`, `acces_salle`, `logistique_salle`, `telephone`, `tel_whatsapp`, `email_salle`, `facebook_salle`, `site_internet`, `photo`, `date_salle`, `user_id`, `commune_id`, `ville_id`, `quartier_id`, `validated`, `promoted`, `created_at`, `updated_at`) VALUES
	(16, NULL, 'Odace Consulting', '@Odace Consult Abidjan - Plateau Face BGFI BanK', '𝐍𝐄𝐅𝐄𝐑𝐓𝐈𝐓𝐈 - Son aura vous porte, vous transcende lors de vos speechs… \r\nElle porte bien son nom, 𝐍𝐄𝐅𝐄𝐑𝐓𝐈𝐓𝐈. Reine ou Roi, elle offre à votre auditoire une vue pleine sur vos présentations ou formations afin qu’il ne s’en détourne pas.', 150, '200000', NULL, NULL, '+225 07 89 41 42 42', '+225 07 89 41 42 42', 'contact@odaceconsulting.com', 'https://www.facebook.com/odaceconsulting', 'https://www.facebook.com/odaceconsulting', NULL, '2024-02-16 00:00:00', NULL, 21, 31, 11, 1, 0, '2024-02-09 11:33:51', '2024-02-16 18:59:21');

-- Listage de la structure de table atitodb3. salle_type_salle
CREATE TABLE IF NOT EXISTS `salle_type_salle` (
  `type_salle_id` bigint unsigned NOT NULL,
  `salle_id` bigint unsigned NOT NULL,
  KEY `salle_type_salle_type_salle_id_foreign` (`type_salle_id`),
  KEY `salle_type_salle_salle_id_foreign` (`salle_id`),
  CONSTRAINT `salle_type_salle_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `salle_type_salle_type_salle_id_foreign` FOREIGN KEY (`type_salle_id`) REFERENCES `type_salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.salle_type_salle : ~7 rows (environ)
INSERT INTO `salle_type_salle` (`type_salle_id`, `salle_id`) VALUES
	(8, 16),
	(9, 16),
	(10, 16),
	(12, 16),
	(11, 16);

-- Listage de la structure de table atitodb3. salle_video_salle
CREATE TABLE IF NOT EXISTS `salle_video_salle` (
  `video_salle_id` bigint unsigned NOT NULL,
  `salle_id` bigint unsigned NOT NULL,
  KEY `salle_video_salle_video_salle_id_foreign` (`video_salle_id`),
  KEY `salle_video_salle_salle_id_foreign` (`salle_id`),
  CONSTRAINT `salle_video_salle_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `salle_video_salle_video_salle_id_foreign` FOREIGN KEY (`video_salle_id`) REFERENCES `video_salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.salle_video_salle : ~1 rows (environ)
INSERT INTO `salle_video_salle` (`video_salle_id`, `salle_id`) VALUES
	(6, 16);

-- Listage de la structure de table atitodb3. sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.sessions : ~4 rows (environ)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('6cInctVd6MzodSpynmIDqDT4BoTsOaBd772vcSCc', NULL, '192.168.1.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFhsZkZTZ1R6Sk4ycWd3TzZmSFlWendNc2FTSkNUdEUzWm55QUFOciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly8xOTIuMTY4LjEuNjozMDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1708186904),
	('hsGKHf9hXsJajr0quLK96dmN6dLpJN8PkiOGT1sF', 2, '192.168.1.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicEdzM2xlWWJ6Y3lXWllZblJibjVMSW94ZlVNREVQUHQyUEJBMEpHUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xOTIuMTY4LjEuNjozMDAwL3VzZXItZGFzaGJvYXJkLXByb2ZpbCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1708192761),
	('IJkiGCjL79N66jdYI9S6nJMqcKrvT6V2MmPCZN3Z', NULL, '192.168.1.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWc2UDR3bkdEUm90YkNaZGpNcG11NU5xVjBTdzFId2N6OTZsVUQ1NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly8xOTIuMTY4LjEuNjozMDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1708189835),
	('UZnQythz0kMghEMS9npf0K0iEkG3oVhoWEyT0NzF', 1, '192.168.1.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid3RITTdtRHI4NE5GZFRRbk5acDF3YTA3RmJWWkZlZ2lEZm9nSTNtaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xOTIuMTY4LjEuNjozMDAwL3NhbGxlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1708192950);

-- Listage de la structure de table atitodb3. texte_jours
CREATE TABLE IF NOT EXISTS `texte_jours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonction_texte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.texte_jours : ~1 rows (environ)
INSERT INTO `texte_jours` (`id`, `libelle`, `texte`, `photo`, `fonction_texte`, `user_id`, `created_at`, `updated_at`) VALUES
	(6, 'Gohore Thierry', 'our website is fully responsive so visitors can view your content from their choice of device.', 'public/amqHj4712KoUSoZVswK7Pa1pJ1h8vp9YkNS0zrM0.jpg', 'CEO ATITO GROUP', NULL, '2023-12-01 14:20:22', '2023-12-01 14:20:22'),
	(7, 'Gohore Thierry', 'our website is fully responsive so visitors can view your content from their choice of device.', 'public/amqHj4712KoUSoZVswK7Pa1pJ1h8vp9YkNS0zrM0.jpg', 'CEO ATITO GROUP', NULL, '2023-12-01 14:20:22', '2023-12-01 14:20:22');

-- Listage de la structure de table atitodb3. type_salles
CREATE TABLE IF NOT EXISTS `type_salles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comodite_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'fas fa-eye',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.type_salles : ~8 rows (environ)
INSERT INTO `type_salles` (`id`, `libelle`, `comodite_icon`, `description`, `photo`, `created_at`, `updated_at`) VALUES
	(8, 'Réunions', 'fas fa-eye', 'Pour les Réunions', 'public/SnWvZ4ZNRONeenhLwyE14fXxF6Pns62t7yHTCLOg.jpg', '2023-12-01 14:24:41', '2024-02-09 10:08:00'),
	(9, 'Ateliers', 'fas fa-eye', 'Pour les Ateliers', 'public/h5D1pJt2ItF30ji7NgTpL5pqVIrygICai7i0PBVh.jpg', '2023-12-01 14:25:05', '2024-02-09 10:09:47'),
	(10, 'Séminaires', 'fas fa-eye', 'Pour les Séminaires', 'public/h5D1pJt2ItF30ji7NgTpL5pqVIrygICai7i0PBVh.jpg', '2023-12-01 14:25:05', '2024-02-09 10:08:27'),
	(11, 'Formations', 'fas fa-eye', 'pour les Formations', 'public/h5D1pJt2ItF30ji7NgTpL5pqVIrygICai7i0PBVh.jpg', '2023-12-01 14:25:05', '2024-02-09 10:07:35'),
	(12, 'Bureaux & Coworking', 'fas fa-eye', 'Pour les Coworking', 'public/L5g7dgLWaiBT4INrNNOu0TaUm5mXKU6MpIBdlfYj.jpg', '2024-02-09 10:12:41', '2024-02-16 14:52:47'),
	(13, 'Colloques', 'fas fa-eye', 'Pour les Colloques', 'public/ApUaq7kwpFkAdkEHFlZn7MKUv4zbud0ZnS0RTEkY.jpg', '2024-02-09 10:13:22', '2024-02-09 10:13:22'),
	(14, 'Mariages', 'fas fa-ring', 'Les ceremonie de mariage', 'public/3HZkNhipuT49SiWlFZlOBO79IMYIqbdUuZMvmEMO.jpg', '2024-02-16 10:17:43', '2024-02-16 10:17:43');

-- Listage de la structure de table atitodb3. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.users : ~5 rows (environ)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'M Brou', 'admin@admin.com', '2023-11-28 14:12:11', '$2y$10$IEyru7R76F0xiIDEmf0aAuCqOVFNIkgDU6IAjzL.9gnMypx2ulTxy', 'svfZeZJEWTaduTicNHSF3d8Pdy4cClBpLMc7WO09bB47j3S4K0NXcFzmop47', '2023-11-28 14:12:11', '2023-12-05 11:47:00'),
	(2, 'Gohoure', 'usertest@dom.test', '2023-11-28 14:12:14', '$2y$10$IEyru7R76F0xiIDEmf0aAuCqOVFNIkgDU6IAjzL.9gnMypx2ulTxy', 'nWEtWK86ZZPBsuUPyJghKtCbCEO9adL0d2NudmDxJTf60ral1Dn5z9KUzcV4', '2023-11-28 14:12:14', '2024-02-03 14:08:18'),
	(13, 'TCHIMOU Junior', 'tchimouj66@gmail.com', NULL, '$2y$10$9YiHnxGTAW8I4zwi2Fis8eORz/1qOjyTo8MvM8AmRBTwyBIL6.CKK', '6p75wqF1hCLBpWCfG2gPAysxerFTlBJqj48xgqIolZy7U24EuqA3pKKjEelU', '2024-02-08 20:08:39', '2024-02-08 20:08:39'),
	(14, 'Jathniel Achi', 'achijathi@gmail.com', NULL, '$2y$10$paUMnIk.raYGxbh2We7OjOjzhjvHghG2.AmJGsr14IusLWyTTB4cq', NULL, '2024-02-09 09:41:14', '2024-02-09 09:41:14'),
	(15, 'GOHORE THIERY', 'goorebis@gmail.com', NULL, '$2y$10$zaulQMQIyVuaTze8.sgd9.P5r73RK02I5JF9aTgaVrPjNB7ZyYiYm', 'PMtAhEhZblHpFA58sTBViofbc9eGBm4vHAUKg00oudOPmQUbHyvuMRK8jmXf', '2024-02-09 17:45:34', '2024-02-09 17:45:34');

-- Listage de la structure de table atitodb3. video_salles
CREATE TABLE IF NOT EXISTS `video_salles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lien_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.video_salles : ~1 rows (environ)
INSERT INTO `video_salles` (`id`, `lien_video`, `photo`, `user_id`, `created_at`, `updated_at`) VALUES
	(6, 'https://youtu.be/KVgHVUa_Vvk?si=PE67BjwXRhk9wyh_', 'public/dPJdjYLyvz9QYgba0rCHASIk1oZKPau1zKlmUgMB.jpg', NULL, '2023-12-01 14:30:12', '2023-12-01 14:30:12');

-- Listage de la structure de table atitodb3. villes
CREATE TABLE IF NOT EXISTS `villes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.villes : ~59 rows (environ)
INSERT INTO `villes` (`id`, `nom_ville`, `created_at`, `updated_at`) VALUES
	(31, 'ABIDJAN', '2023-12-01 13:13:38', '2024-02-16 15:37:25'),
	(33, 'BOUAKE', '2024-02-16 15:22:03', '2024-02-16 15:22:03'),
	(34, 'DALOA', '2024-02-16 15:30:01', '2024-02-16 15:30:01'),
	(35, 'KORHOGO', '2024-02-16 15:30:14', '2024-02-16 15:30:14'),
	(36, 'YAMOUSSOUKRO', '2024-02-16 15:30:24', '2024-02-16 15:30:24'),
	(37, 'SAN-PEDRO', '2024-02-16 15:30:39', '2024-02-16 15:30:45'),
	(38, 'GAGNOA', '2024-02-16 15:31:17', '2024-02-16 15:31:17'),
	(39, 'MAN', '2024-02-16 15:31:28', '2024-02-16 15:31:28'),
	(40, 'DIVO', '2024-02-16 15:31:39', '2024-02-16 15:31:39'),
	(41, 'ANYAMA', '2024-02-16 15:31:54', '2024-02-16 15:31:54'),
	(42, 'SOUBRÉ', '2024-02-16 15:32:04', '2024-02-16 15:32:04'),
	(43, 'ABENGOUROU', '2024-02-16 15:32:17', '2024-02-16 15:32:17'),
	(44, 'BONON', '2024-02-16 15:32:27', '2024-02-16 15:32:27'),
	(45, 'DUEKOUÉ', '2024-02-16 15:32:43', '2024-02-16 15:32:43'),
	(46, 'SINFRA', '2024-02-16 15:32:52', '2024-02-16 15:32:52'),
	(47, 'BOUAFLÉ', '2024-02-16 15:33:01', '2024-02-16 15:33:01'),
	(49, 'GRAND-BASSAM', '2024-02-16 15:33:19', '2024-02-16 15:33:19'),
	(50, 'VAVOUA', '2024-02-16 15:33:26', '2024-02-16 15:33:26'),
	(51, 'BINGERVILLE', '2024-02-16 15:33:36', '2024-02-16 15:33:36'),
	(52, 'DABOU', '2024-02-16 15:33:45', '2024-02-16 15:33:45'),
	(53, 'DANANÉ', '2024-02-16 15:33:54', '2024-02-16 15:33:54'),
	(54, 'ADZOPÉ', '2024-02-16 15:34:01', '2024-02-16 15:34:01'),
	(55, 'MÉAGUI', '2024-02-16 15:34:10', '2024-02-16 15:34:10'),
	(56, 'FERKESSÉDOUGOU', '2024-02-16 15:34:22', '2024-02-16 15:34:22'),
	(57, 'ISSIA', '2024-02-16 15:34:32', '2024-02-16 15:34:32'),
	(59, 'AGBOVILLE', '2024-02-16 15:34:48', '2024-02-16 15:34:48'),
	(60, 'OUME', '2024-02-16 15:35:32', '2024-02-16 15:35:32'),
	(61, 'BONGOUANOU', '2024-02-16 15:35:57', '2024-02-16 15:35:57'),
	(62, 'ARRAH', '2024-02-16 15:36:04', '2024-02-16 15:36:04'),
	(63, 'LAKOTA', '2024-02-16 15:38:01', '2024-02-16 15:38:01'),
	(64, 'SEGUELA', '2024-02-16 15:39:06', '2024-02-16 15:39:06'),
	(65, 'BONDOUKOU', '2024-02-16 15:39:15', '2024-02-16 15:39:15'),
	(66, 'DIMBOKRO', '2024-02-16 15:39:42', '2024-02-16 15:39:42'),
	(67, 'ODIENNE', '2024-02-16 15:39:50', '2024-02-16 15:39:50'),
	(68, 'SASSANDRA', '2024-02-16 15:39:58', '2024-02-16 15:39:58'),
	(69, 'TENGRELA', '2024-02-16 15:41:22', '2024-02-16 15:41:22'),
	(70, 'GUIGLO', '2024-02-16 15:41:28', '2024-02-16 15:41:28'),
	(71, 'BOUNDIALI', '2024-02-16 15:41:48', '2024-02-16 15:41:48'),
	(72, 'DAOUKRO', '2024-02-16 15:41:58', '2024-02-16 15:41:58'),
	(73, 'GRAND-LAHOU', '2024-02-16 15:42:13', '2024-02-16 15:42:13'),
	(74, 'JACQUEVILLE', '2024-02-16 15:43:22', '2024-02-16 15:43:22'),
	(75, 'ZUENOULA', '2024-02-16 15:43:51', '2024-02-16 15:43:51'),
	(76, 'AKOUPE', '2024-02-16 15:45:04', '2024-02-16 15:45:04'),
	(77, 'ABOISSO', '2024-02-16 15:45:11', '2024-02-16 15:45:11'),
	(78, 'TAABO', '2024-02-16 15:45:29', '2024-02-16 15:45:29'),
	(79, 'TOUBA', '2024-02-16 15:45:44', '2024-02-16 15:45:44'),
	(80, 'BOUNA', '2024-02-16 15:45:49', '2024-02-16 15:45:49'),
	(81, 'BIANKOUMA', '2024-02-16 15:47:16', '2024-02-16 15:47:16'),
	(82, 'MANKONO', '2024-02-16 15:47:28', '2024-02-16 15:47:28'),
	(83, 'TOULEPLEU', '2024-02-16 15:47:52', '2024-02-16 15:47:52'),
	(84, 'ADIAKE', '2024-02-16 15:48:03', '2024-02-16 15:48:03'),
	(85, 'GRAND-BEREBY', '2024-02-16 15:48:45', '2024-02-16 15:48:45'),
	(86, 'SAKASSOU', '2024-02-16 15:49:43', '2024-02-16 15:49:43'),
	(87, 'DIEGONEFLA', '2024-02-16 15:50:03', '2024-02-16 15:50:03'),
	(88, 'DIDIEVI', '2024-02-16 15:50:15', '2024-02-16 15:50:15'),
	(89, 'BONOUA', '2024-02-16 15:50:50', '2024-02-16 15:50:50'),
	(90, 'ASSINIE', '2024-02-16 15:51:24', '2024-02-16 15:51:24'),
	(91, 'ALEPE', '2024-02-16 15:51:51', '2024-02-16 15:51:51'),
	(92, 'BOCANDA', '2024-02-16 15:54:07', '2024-02-16 15:54:07'),
	(93, 'SOUBRE', '2024-02-16 15:54:38', '2024-02-16 15:54:53'),
	(94, 'AYAME', '2024-02-16 15:55:12', '2024-02-16 15:55:12'),
	(95, 'TOUMODI', '2024-02-16 15:55:26', '2024-02-16 15:55:26'),
	(96, 'TOUBA', '2024-02-16 16:02:30', '2024-02-16 16:02:50'),
	(97, 'MBATTO', '2024-02-16 16:03:03', '2024-02-16 16:03:03');

-- Listage de la structure de table atitodb3. visites
CREATE TABLE IF NOT EXISTS `visites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `counter` int NOT NULL DEFAULT '0',
  `salle_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `visites_salle_id_foreign` (`salle_id`),
  CONSTRAINT `visites_salle_id_foreign` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table atitodb3.visites : ~3 rows (environ)
INSERT INTO `visites` (`id`, `counter`, `salle_id`, `created_at`, `updated_at`) VALUES
	(10, 4, 16, '2024-02-16 16:29:44', '2024-02-17 17:55:12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
