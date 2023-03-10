-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para dawblogger_ci4
CREATE DATABASE IF NOT EXISTS `dawblogger_ci4` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dawblogger_ci4`;

-- Volcando estructura para tabla dawblogger_ci4.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `slug` varchar(128) NOT NULL,
  `published_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla dawblogger_ci4.news: ~4 rows (aproximadamente)
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `body`, `slug`, `published_at`, `updated_at`) VALUES
	(1, 'Susanna Griso no ha utilizado Photoshop: su retrato para desear felices fiestas se ha creado con inteligencia artificial', 'La inteligencia artificial está arrasando entre la sociedad. Muchos la usan en su día a día para realizar sus labores cotidianas. Una de sus funciones que más llama la atención es la manera en la que logra hacer retratos animados que parecen fotografías reales. test', 'susanna-griso-no-ha-utilizado-photoshop-su-retrato-para-desear-felices-fiestas-se-ha-creado-con-inteligencia-artificial', '2023-01-31 16:47:00', '2023-01-31 17:34:15'),
	(2, 'Eficiencia de Mascaras', 'FFP1: Es el nivel de protección más bajo.\\r\\n      Estas máscaras no son eficientes contra gases venenosos ni fibrogénicas de po', 'eficiencia-de-mascaras', '2023-01-31 15:13:34', '2023-01-31 15:13:34'),
	(3, 'Los 6 ciberataques que serán más habituales en 2023', '<b>Ransomware</b> Más sofisticados y rescates más caros. Los ciberatacantes actuales utilizan formas sofisticadas para evadir las medidas de detección de ransomware tradicionales y se aprovechan de los procesos comunes para introducirse en los sistemas. De esta manera, se mueven por la red buscando la sustracción y el cifrado de datos. Una vez que tienen lo que necesitan, amenazan con vender o filtrar los datos exfiltrados o la información de autenticación si no se paga el rescate.', 'los-6-ciberataques-que-serán-más-habituales-en-2023', '2023-02-21 15:39:13', '2023-02-21 15:39:13'),
	(4, 'Crean detectores de texto artificial para los profesores como respuesta al uso de IA para hacer trabajos académicos', 'Esta herramienta apenas recibe actualizaciones. Esta herramienta apenas recibe actualizaciones.GPT-2\r\nChatGPT es toda una revolución por la capacidad que tiene su inteligencia artificial (IA) de escribir textos, contestar a mensajes o redactar. Hace escasos días informábamos en 20Bits que dicha IA se empezó a colar en Twitter, pero actualmente, esta tecnología está presente en los trabajos académicos.\r\n\r\nLos profesores pueden evitar la trampa si utilizan este detector creado por OpenAI. En este caso, los maestros solo tendrán que introducir la redacción y la herramienta mostrará el porcentaje de lo que es real y falso.\r\n\r\nDesafortunadamente, el detector está anticuado porque apenas recibe actualizaciones, por lo tanto, hay veces que la inteligencia artificial engaña a los usuarios cuando se escriben textos complejos.', 'crean-detectores-de-texto-artificial-para-los-profesores-como-respuesta-al-uso-de-ia-para-hacer-trabajos-académicos', '2023-02-21 15:39:26', '2023-02-21 15:39:26');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
