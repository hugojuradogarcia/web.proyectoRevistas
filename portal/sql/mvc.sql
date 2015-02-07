-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.12-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para mvc
CREATE DATABASE IF NOT EXISTS `mvc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mvc`;


-- Volcando estructura para tabla mvc.auditor
CREATE TABLE IF NOT EXISTS `auditor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `route` varchar(200) NOT NULL DEFAULT '0',
  `page` varchar(100) NOT NULL DEFAULT '0',
  `browser` varchar(100) NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mvc.auditor: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `auditor` DISABLE KEYS */;
INSERT INTO `auditor` (`id`, `user`, `date`, `route`, `page`, `browser`, `ip`) VALUES
	(1, '1', '2015-02-05 14:50:04', '/web.proyectoRevistas/portal/indexp.php', 'INICIO', '', ''),
	(2, '1', '2015-02-05 14:50:25', '/web.proyectoRevistas/portal/indexp.php', 'INICIO', '', '');
/*!40000 ALTER TABLE `auditor` ENABLE KEYS */;


-- Volcando estructura para tabla mvc.session
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT '0',
  `browser` varchar(100) DEFAULT '0',
  `ip` varchar(100) DEFAULT '0',
  `date` date DEFAULT '0000-00-00',
  `flag` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mvc.session: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` (`id`, `user`, `session_id`, `browser`, `ip`, `date`, `flag`) VALUES
	(5, 'hjurado@gmail.com', 'r58u40uspp1r9254m5aeba6me0', 'firefox', '192.168.10.5', '2015-02-05', 1);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;


-- Volcando estructura para tabla mvc.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `account` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla mvc.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `name`, `last_name`, `email`, `password`, `state`, `account`) VALUES
	(1, 'HUGO', 'JURADO GARCIA', 'hjurado@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'ENABLED', 'ADMINISTRATOR'),
	(2, 'CESAR', 'OCHOA', 'ochoa@gmail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'ENABLED', 'USER'),
	(3, 'JULIO', 'BOLADO', 'jbolado@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'DISABLED', 'USER'),
	(4, 'CHRISTIAN', 'LAZO', 'clazo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'DISABLED', 'USER'),
	(5, 'KAREN', 'NUÃ‘EZ', 'knuÃ±ez@gmail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'ENABLED', 'USER');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
