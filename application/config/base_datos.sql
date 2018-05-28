-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.22-0ubuntu0.16.04.1 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla transfer.transferencia
CREATE TABLE IF NOT EXISTS `transferencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `nombre` text COLLATE utf8mb4_spanish2_ci,
  `cedula` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `creado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencia` (`referencia`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla transfer.transferencia: ~31 rows (aproximadamente)
/*!40000 ALTER TABLE `transferencia` DISABLE KEYS */;
INSERT INTO `transferencia` (`id`, `referencia`, `monto`, `nombre`, `cedula`, `fecha`, `creado`) VALUES
	(1, 'Ref-001', 10000.00, 'Judelvis', '17456121', '2018-08-24', '2018-05-26 17:58:39'),
	(2, '0001234', 20000.00, 'Nalalia', '2435363', '2018-08-24', '2018-05-27 16:23:35'),
	(3, '00324', 10000.00, 'Jose', '12415443', '2018-06-05', '2018-05-27 16:24:17'),
	(4, 'ref-00124', 124310.00, 'Leyton', '2344235', '2018-06-28', '2018-05-27 16:25:10'),
	(5, '345643', 90000.00, 'ANthony', '25475191', '2018-07-07', '2018-05-27 16:25:27'),
	(6, '4265423', 100000.00, 'JUDELVIS', '124314', '2018-08-03', '2018-05-27 16:25:45'),
	(7, '28734', 40000.00, 'Valeria', '246236', '2018-06-07', '2018-05-27 16:27:58'),
	(8, '145134', 10000.00, 'Yubraska', '1231', '2018-07-19', '2018-05-27 16:28:51'),
	(9, 'gda-35245', 123124.97, 'Pedro', '1213', '2018-07-04', '2018-05-27 16:29:51'),
	(10, '13245123', 97139.00, 'Oriana', '1341', '2018-05-19', '2018-05-27 16:30:39'),
	(11, '2958724', 190000.00, 'Teresa', '134324', '2018-06-09', '2018-05-27 16:31:25'),
	(12, '2352', 7000.00, 'Cartos', '173823', '2018-06-10', '2018-05-27 16:32:04'),
	(13, 'erw2342', 123412.00, 'Helio', '132', '2018-06-11', '2018-05-27 16:32:20'),
	(14, 'ear7688', 100009.00, 'Diana', '1231421', '2018-06-12', '2018-05-27 16:32:37'),
	(15, '132423', 90000.00, 'Hola', '134523', '2018-06-13', '2018-05-27 16:32:53'),
	(16, '1352', 77000.00, 'SOFIA', '1343', '2018-06-14', '2018-05-27 16:33:53'),
	(17, 'JHFA4325', 897988.00, 'DEINA', '13242', '2018-06-15', '2018-05-27 16:34:07'),
	(18, '132523', 231423.00, 'Cartos', '23452', '2018-06-16', '2018-05-27 16:34:30'),
	(19, 'ADFRT2342', 24352.00, 'jOSE', '342234', '2018-06-17', '2018-05-27 16:34:45'),
	(20, '23452', 10000.00, 'YUUAD', '2342', '2018-06-18', '2018-05-27 16:35:04'),
	(21, '12342', 23452.00, 'YENI', '233424', '2018-06-19', '2018-05-27 16:35:19'),
	(22, '23R23', 787889.00, 'RUBEN', '4325', '2018-05-21', '2018-05-27 16:35:54'),
	(23, '31243', 803000.00, 'FABIANA', '13224', '2018-05-22', '2018-05-27 16:36:22'),
	(24, '52452', 670800.00, 'VALENTINA', '312', '2018-05-23', '2018-05-27 16:36:42'),
	(25, '4238', 768000.00, 'HOLA', '57687', '2018-05-24', '2018-05-27 16:36:59'),
	(26, '6787', 68700.00, 'PETRA', '687700', '2018-05-23', '2018-05-27 16:37:46'),
	(27, 'TYU4335', 77600.00, 'TRAIPO', '99090', '2018-05-24', '2018-05-27 16:38:34'),
	(28, 'E25423', 67700.00, 'TEO', '871331', '2018-05-25', '2018-05-27 16:38:48'),
	(29, '7868', 9869.00, 'HOLA', '7865887', '2018-05-25', '2018-05-27 16:39:54'),
	(30, '24FF', 98798.00, 'AEFG', '2435', '2018-05-26', '2018-05-27 16:40:06'),
	(31, '23524', 67000.00, 'HADF', '875687', '2018-05-27', '2018-05-27 16:40:22');
/*!40000 ALTER TABLE `transferencia` ENABLE KEYS */;

-- Volcando estructura para tabla transfer.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `clave` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `login` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla transfer.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `clave`, `login`) VALUES
	(1, 'Leyton', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
