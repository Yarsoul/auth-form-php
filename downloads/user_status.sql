-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.29 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп структуры для таблица my_php_service.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`status_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы my_php_service.user_status: ~3 rows (приблизительно)
DELETE FROM `user_status`;
INSERT INTO `user_status` (`status_id`, `status`) VALUES
	(1, 'admin'),
	(2, 'moderator'),
	(3, 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
