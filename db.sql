-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para kscvcddf_ksc_iis
CREATE DATABASE IF NOT EXISTS `kscvcddf_ksc_iis` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kscvcddf_ksc_iis`;

-- Volcando estructura para tabla kscvcddf_ksc_iis.gallery_ksc
CREATE TABLE IF NOT EXISTS `gallery_ksc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `initial` varchar(50) NOT NULL DEFAULT '0',
  `group` int(11) NOT NULL DEFAULT '0',
  `gallery` varchar(255) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK1Group` (`group`),
  CONSTRAINT `FK1Group` FOREIGN KEY (`group`) REFERENCES `groups_ksc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla kscvcddf_ksc_iis.gallery_ksc: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `gallery_ksc` DISABLE KEYS */;
REPLACE INTO `gallery_ksc` (`id`, `initial`, `group`, `gallery`, `description`, `status`) VALUES
	(1, 'AP', 1, 'Sales Team Contact Information', 'Sales Team Contact Information', '1');
/*!40000 ALTER TABLE `gallery_ksc` ENABLE KEYS */;

-- Volcando estructura para tabla kscvcddf_ksc_iis.groups_ksc
CREATE TABLE IF NOT EXISTS `groups_ksc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `initial` varchar(10) DEFAULT NULL,
  `description` varchar(255) DEFAULT '"Description"',
  `status` varchar(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla kscvcddf_ksc_iis.groups_ksc: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `groups_ksc` DISABLE KEYS */;
REPLACE INTO `groups_ksc` (`id`, `name`, `initial`, `description`, `status`) VALUES
	(1, 'OVERVIEW', 'OV', 'OVERVIEW', '1'),
	(2, 'UPGRADES', 'UP', 'UPGRADES', '1'),
	(3, 'ATTRACTIONS', 'AT', 'ATTRACTIONS', '1'),
	(4, 'GROUPS', 'GR', 'ATTRACTIONS', '1'),
	(5, 'INTERNATIONAL', 'INT', 'INTERNATIONAL', '1');
/*!40000 ALTER TABLE `groups_ksc` ENABLE KEYS */;

-- Volcando estructura para tabla kscvcddf_ksc_iis.log_ksc
CREATE TABLE IF NOT EXISTS `log_ksc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_media` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `state` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla kscvcddf_ksc_iis.log_ksc: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `log_ksc` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_ksc` ENABLE KEYS */;

-- Volcando estructura para tabla kscvcddf_ksc_iis.media_ksc
CREATE TABLE IF NOT EXISTS `media_ksc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `subhead` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `format` varchar(30) NOT NULL,
  `size` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `url_LD` varchar(255) NOT NULL,
  `url_thumb` varchar(255) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `gallery` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `date_created` date NOT NULL,
  `date_object` date NOT NULL,
  `color` varchar(10) NOT NULL,
  `resolution` int(3) DEFAULT NULL,
  `external_url` varchar(255) DEFAULT NULL,
  `copy` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `state` varchar(30) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK1_user` (`id_user`),
  KEY `FK2Gallery` (`gallery`),
  CONSTRAINT `FK1_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK2Gallery` FOREIGN KEY (`gallery`) REFERENCES `gallery_ksc` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla kscvcddf_ksc_iis.media_ksc: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `media_ksc` DISABLE KEYS */;
REPLACE INTO `media_ksc` (`id`, `name`, `subhead`, `type`, `format`, `size`, `duration`, `url`, `url_LD`, `url_thumb`, `tags`, `gallery`, `description`, `date_created`, `date_object`, `color`, `resolution`, `external_url`, `copy`, `id_user`, `state`) VALUES
	(1, 'Cumpleaños', 'Celebration', 'images', 'jpeg', '4608  x  3456 px', 'null', 'files/KSC_I/KSC_I5982882d304dd/1501726765.jpeg', 'KSC_I5982882d304dd/google.com', 'KSC_I5982882d304dd/thumbs.com', 'chrome,firefox', 1, 'Cumpleñ', '2017-08-03', '2017-08-03', 'CMYK', 1, NULL, '2', 1, '1'),
	(2, '1', '1', 'images', 'jpeg', '4608  x  3456 px', 'null', 'files/KSC_I/KSC_I598a741641c96/1502245910.jpeg', 'KSC_I598a741641c96/google.com', 'KSC_I598a741641c96/thumbs.com', 'chrome,firefox', 1, '1', '2017-08-09', '2017-08-09', 'CMYK', 2, NULL, '1', 1, '1'),
	(3, 'Fransue', '1', 'images', 'jpeg', '4608  x  3456 px', 'null', 'files/KSC_I/KSC_I598a754cb0a85/1502246220.jpeg', 'KSC_I598a754cb0a85/google.com', 'KSC_I598a754cb0a85/thumbs.com', 'chrome,firefox', 1, '1', '2017-08-09', '2017-08-09', 'CMYK', 3, NULL, '1', 1, '1'),
	(4, 'Bucaramangfa', 'aaa', 'images', 'jpeg', '4608  x  3456 px', 'null', 'files/KSC_I/KSC_I598a7567523cc/1502246247.jpeg', 'KSC_I598a7567523cc/google.com', 'KSC_I598a7567523cc/thumbs.com', 'chrome,firefox', 1, '1', '2017-08-09', '2017-08-09', 'CMYK', 3, NULL, '1', 1, '1'),
	(5, 'Parapente', 'Parapente', 'images', 'jpeg', '4608  x  3456 px', 'null', 'files/KSC_I/KSC_I598a790d6b045/1502247181.jpeg', 'KSC_I598a790d6b045/google.com', 'KSC_I598a790d6b045/thumbs.com', 'chrome,firefox', 1, '2', '2017-08-09', '2017-08-09', 'CMYK', 1, NULL, '2', 1, '1'),
	(6, 'Parapente', 'Parapente', 'images', 'jpeg', '4608  x  3456 px', 'null', 'files/KSC_I/KSC_I598a791b29a7e/1502247195.jpeg', 'KSC_I598a791b29a7e/google.com', 'KSC_I598a791b29a7e/thumbs.com', 'chrome,firefox', 1, '2', '2017-08-09', '2017-08-09', 'CMYK', 1, NULL, '2', 1, '1'),
	(7, 'Word', 'Word', 'Document', 'words', 'Null', 'No data', 'assets/thumbs/MSW_thumbs.jpg', 'files/KSC_D/KSC_D598bc22a3b1ed/1502331434.docx', 'assets/thumbs/MSW_thumbs.jpg', 'chrome,firefox', 1, 'Word', '2017-08-10', '2017-08-10', 'No Info.', 1, 'none', 'Word', 1, '1'),
	(8, 'pdf', 'pd', 'Document', 'pdfs', 'Null', 'No data', 'assets/thumbs/PDF_thumbs.jpg', 'files/KSC_D/KSC_D598bc3164bcba/1502331670.pdf', 'assets/thumbs/PDF_thumbs.jpg', 'chrome,firefox', 1, 'pdfpdfpdfpdfpdf', '2017-08-10', '2017-08-10', 'No Info.', 1, 'none', 'pdf', 1, '1'),
	(9, 'Robin', 'Robin', 'videos', 'mp4', 'Null', '00:00:00', 'files/KSC_V/KSC_V598bc6dfc60f1/thumb.jpeg', 'files/KSC_V/KSC_V598bc6dfc60f1/1502332639.mp4', 'assets/thumbs/V_thumbs.jpg', 'chrome,firefox', 1, 'Robin', '2017-08-10', '2017-08-10', 'No Info.', 2, 'none', 'Robin', 1, '1');
/*!40000 ALTER TABLE `media_ksc` ENABLE KEYS */;

-- Volcando estructura para tabla kscvcddf_ksc_iis.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT '0',
  `salt` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `state` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla kscvcddf_ksc_iis.user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `username`, `name`, `surname`, `role`, `salt`, `password`, `email`, `state`) VALUES
	(1, 'admin@gmail.com', 'Andes', 'Montealegre', 'ROLE_SUPER_ADMIN', '0', '$2a$04$At8pmLnTPvRrOSB93G/HseCPzy16OPctucEFbFwzEIrOt8/C6NJZC', 'admin@gmail.com', '1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
