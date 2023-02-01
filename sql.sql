-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.24 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных yii2_loc
CREATE DATABASE IF NOT EXISTS `yii2_loc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `yii2_loc`;

-- Дамп структуры для таблица yii2_loc.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yii2_loc.category: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`) VALUES
	(1, 0, 'Пицца', 'Пиццы на разный вкус', 'Пиццы от пекарей'),
	(8, 0, 'Напитки', NULL, NULL),
	(9, 8, 'Соки', '', ''),
	(14, 0, 'Блюда', '', ''),
	(15, 0, 'Салаты', '', ''),
	(16, 8, 'Коктейли', '', ''),
	(17, 8, 'Молочные коктейли', '', ''),
	(18, 0, 'Тестовая категория', '', '');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Дамп структуры для таблица yii2_loc.image
CREATE TABLE IF NOT EXISTS `image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filePath` varchar(400) NOT NULL,
  `itemId` int DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yii2_loc.image: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
	(13, 'Products/Product5/bc8e61.jpg', 5, 0, 'Product', '8d472ba8e1-2', ''),
	(14, 'Products/Product5/4dada6.jpg', 5, 1, 'Product', '2aa50b7a2a-1', ''),
	(15, 'Products/Product1/8e93da.jpg', 1, 1, 'Product', 'd01ccd967e-1', ''),
	(16, 'Products/Product1/cf7b7a.jpg', 1, NULL, 'Product', 'c9bc7abe8d-2', ''),
	(17, 'Products/Product10/c9e957.jpg', 10, 1, 'Product', 'd84863249d-1', ''),
	(18, 'Products/Product11/4d502a.jpg', 11, 1, 'Product', 'f0465a4b49-1', ''),
	(19, 'Products/Product12/463683.jpg', 12, 1, 'Product', 'd16ff9bfa6-1', ''),
	(20, 'Products/Product13/c3498b.jpg', 13, 1, 'Product', '1957223eba-1', ''),
	(21, 'Products/Product14/1c55fb.jpg', 14, 1, 'Product', '0f70a44833-1', ''),
	(22, 'Products/Product15/33cff3.jpg', 15, 1, 'Product', '0792adb8d1-1', ''),
	(23, 'Products/Product16/fb61af.jpg', 16, 1, 'Product', 'd25bbd99d1-1', ''),
	(25, 'Products/Product7/3d01bb.jpg', 7, 1, 'Product', '57fd034e98-1', ''),
	(26, 'Products/Product8/abec8b.jpg', 8, 1, 'Product', '72f4240faf-1', ''),
	(27, 'Products/Product9/5203db.jpg', 9, 1, 'Product', '00ab52e719-1', ''),
	(28, 'Products/Product17/66857c.jpg', 17, 1, 'Product', 'ba7a10f6c3-1', '');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;

-- Дамп структуры для таблица yii2_loc.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yii2_loc.migration: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1537252764),
	('m140622_111540_create_image_table', 1537252773),
	('m140622_111545_add_name_to_image_table', 1537252773);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица yii2_loc.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yii2_loc.order: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
	(26, '2018-09-11 11:48:06', '2018-09-11 11:48:06', 1, 12, '1', 'Рафкат ака', 'rafkataka@gmail.com', '912312312312', 'Лермонтова 12А2'),
	(29, '2018-09-11 15:32:28', '2018-09-11 15:32:28', 1, 335, '1', 'Рафкат ака', 'rafkat-karimov@mail.ru', '912312312312', 'Лермонтова 12А2'),
	(30, '2018-09-21 09:45:33', '2018-09-21 09:45:33', 3, 36, '0', 'Рафкат', '', '995112312312', '12312вфывфыв'),
	(31, '2018-09-21 15:39:15', '2022-09-21 15:39:15', 12, 144, '1', 'xZXZ', 'ZXZX@mail.ru', '123123', 'dassda'),
	(32, '2018-09-26 16:44:18', '2018-09-26 16:44:18', 4, 1340, '0', 'Василий ', 'dasda@gmail.com', '123123', 'dassda'),
	(34, '2022-09-01 13:23:59', '2022-09-01 13:23:59', 1, 400, '0', 'Андрей', 'integralal@mail.ru', '7-913-134-09-42', 'Островского 8, кв 44'),
	(35, '2022-09-06 17:40:47', '2022-09-06 17:40:47', 6, 1105, '0', 'Ларионов', '1@mail.com', '99-77-55', 'адрес');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Дамп структуры для таблица yii2_loc.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int NOT NULL,
  `sum_item` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yii2_loc.order_items: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
	(31, 25, 2, 'Уйгурская', 12, 1, 12),
	(32, 25, 8, 'Colla 1 litr', 30, 1, 30),
	(33, 26, 2, 'Уйгурская', 12, 1, 12),
	(34, 27, 7, 'Fanta 1 litr', 30, 1, 30),
	(35, 28, 2, 'Уйгурская', 12, 9, 108),
	(36, 28, 1, 'Мексиканская', 335, 3, 1005),
	(37, 29, 1, 'Мексиканская', 335, 1, 335),
	(38, 30, 2, 'Уйгурская', 12, 3, 36),
	(39, 31, 5, 'Нарынская', 12, 11, 132),
	(40, 31, 2, 'Уйгурская', 12, 1, 12),
	(41, 32, 1, '4 сыра', 335, 4, 1340),
	(42, 34, 10, 'Пицца восточная', 400, 1, 400),
	(43, 35, 7, 'Фанта 1 литр', 45, 3, 135),
	(44, 35, 1, '4 сыра', 335, 2, 670),
	(45, 35, 11, ' Пицца Итальянская', 300, 1, 300);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;

-- Дамп структуры для таблица yii2_loc.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `price` float NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `hit` enum('0','1') NOT NULL,
  `new` enum('0','1') NOT NULL,
  `sale` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yii2_loc.product: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `category_id`, `name`, `content`, `price`, `keywords`, `description`, `img`, `hit`, `new`, `sale`) VALUES
	(1, 1, '4 сыра', '<p>Пармезан, сулугуни, моцарелла,&nbsp; голандский, соус.&nbsp;</p>\r\n', 335, 'Пицца 4 сыра', '<h3><strong>Пицца 4 сыра&nbsp; это превосходное пицца, которые включает себя </strong></h3>\r\n\r\n<h3><strong>следующие сыры:</strong></h3>\r\n\r\n<ul>\r\n	<li><span style="font-size:16px"><span style="font-family:tahoma,geneva,sans-serif">​Моцарелла&nbsp;(Mozzarella)- молодой мягкий итальянский сыр в виде белых шариков, однако здесь мы будем использовать твердую разновидность этого сыра, так называемую моцареллу для пиццы. Этот сыр не солёный, имеет нейтральный вкус, очень хорошо плавится, красиво запекается и отлично тянется при откусывании пиццы. Вместо него можно взять несолёный Сулугуни, они очень похожи с твёрдой Моцареллой.</span></span></li>\r\n	<li><span style="font-size:16px"><span style="font-family:tahoma,geneva,sans-serif">&nbsp;Пармезан&nbsp;(Parmigiano Reggiano) &mdash; твёрдый выдержанный сыр, имеет насыщенный пикантный вкус и ломкую текстуру. Его можно заменить на другой твёрдый выдержанный сыр.</span></span></li>\r\n</ul>\r\n\r\n<p><span style="font-size:18px"><span style="font-family:tahoma,geneva,sans-serif">&nbsp; &nbsp;&nbsp;</span></span></p>\r\n', 'img1.jpg', '1', '0', '0'),
	(7, 9, 'Фанта 1 литр', '<p><span style="color:rgb(0, 0, 0); font-family:arial,sans-serif">вода, сахар, концентрированный апельсиновый сок, диоксид углерода, регулятор кислотности лимонная кислота, витамин С, консервант сорбат калия, натуральные ароматизаторы, стабилизаторы эфиры глицерина и смоляных кислот, гуаровая камедь, краситель бета-каротин. Допускается выпадение осадка натуральных компонентов.</span></p>\r\n\r\n<p><span style="color:rgb(0, 0, 0); font-family:arial,sans-serif"><img alt="" src="/yii2shop/files/Nature___Islands_Earthy_heaven_005341_10.jpg" style="height:320px; width:400px" /></span></p>\r\n', 45, 'Фанта 1 литр', '<p><span style="font-size:20px"><span style="color:rgb(0, 0, 0); font-family:arial,sans-serif">Безалкогольный газированный витаминизированный.</span></span></p>\r\n', 'fanta1.jpg', '0', '0', '1'),
	(8, 9, 'Coca - Cola 1 литр', '<p>вода, сахар, диоксид углерода, краситель сахарный колер IV, регулятор кислотности ортофосфорная кислота, натуральные ароматизаторы, кофеин.</p>\r\n', 45, 'Coca - Cola', '<p><span style="font-size:18px"><span style="color:rgb(0, 0, 0); font-family:roboto">Безалкогольный газированный. Без консервантов.</span></span></p>\r\n', 'cola.jpg', '0', '0', '0'),
	(9, 9, 'Sprite 1 литр', '<p>Вода, сахар, регуляторы кислотности (лимонная кислота, цитрат натрия), натуральные ароматизаторы, подсластители (ацесульфам калия, аспартам, неогесперидин дигидрохалкон), консервант бензоат натрия, носитель глицерин. Продукт содержит источник фенилаланина.</p>\r\n', 45, 'Sprite 1 литр', '<p><span style="font-size:18px"><span style="color:rgb(0, 0, 0); font-family:roboto">Безалкогольный, газированный.</span></span></p>\r\n', '00ab52e719-1.jpg', '0', '0', '0'),
	(10, 1, 'Пицца восточная', '<p>Баранина без жира, соус, помидоры, сыр, болгарский перец</p>\r\n', 400, 'Пицца восточная', '<h3>&nbsp;</h3>\r\n\r\n<h3><strong>&nbsp;</strong><span style="color:rgb(75, 75, 75); font-family:open sans,sans-serif; font-size:16px">Восточная кухня &ndash; это настоящее искусство! Она многогранна и притягательна, но при этом не похожа ни на какие другие. </span></h3>\r\n\r\n<h3><strong>&nbsp;Пицца восточная&nbsp;</strong></h3>\r\n', '0792adb8d1-1.jpg', '1', '0', '0'),
	(11, 1, ' Пицца Итальянская', '<p>Соус, болгарский перец, помидоры, шампиньоны,колбаса,сыр, маслины</p>\r\n', 300, 'Пицца Итальянская', '<p>фывфыв</p>\r\n', 'd84863249d-1.jpg', '1', '0', '0'),
	(12, 1, 'Пицца Классическая', '<p>Соус, болгарский перец, помидоры, шампиньоны, сыр</p>\r\n', 270, 'Пицца Классическая', '<p>фывфыв</p>\r\n', 'd16ff9bfa6-1.jpg', '1', '1', '0'),
	(13, 1, 'Пицца Пепперони', '<p>Копченая колбаса, сыр, перец <strong>чили, </strong>помидоры, орегано, чеснок</p>\r\n', 300, 'Пицца Пепперони', '<p>ффывфыфв</p>\r\n', '', '1', '0', '0'),
	(14, 1, 'Пицца Особая', '<p>копченая курица, говядина, шампиньоны, соус, сыр, моцарелла, зелень</p>\r\n', 350, 'Пицца особая', '<p>фывфыв</p>\r\n', 'f0465a4b49-1.jpg', '1', '1', '0'),
	(15, 1, 'Пицца Чили', '<p>Сыр, фарш, перец чили, соус,&nbsp;</p>\r\n', 300, 'Пицца Чили', '<p>фывфы</p>\r\n', '0f70a44833-1.jpg', '1', '0', '0'),
	(16, 1, 'Пицца Маргарита', '<p>Соус, сыр моцарелла, помидоры</p>\r\n', 250, 'Пицца Маргарита', '<p>Тест</p>\r\n', '', '1', '0', '0'),
	(17, 9, 'Pepsi 1 литр', '<p>вода, сахар, комплексная пищевая добавка (краситель Е150d, регулятор кислотности Е338, вода, кофеин (103-110 мг/л)), ароматизатор натуральный (в составе стабилизатор гуммиарабик, регулятор кислотности лимонная кислота).</p>\r\n', 45, 'Pepsi 1 литр', '<p><span style="font-size:18px"><span style="color:rgb(0, 0, 0); font-family:roboto">Безалкогольный на ароматах &quot;Пепси-Кола&quot;.</span></span></p>\r\n', '', '0', '0', '0');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Дамп структуры для таблица yii2_loc.uploads_images
CREATE TABLE IF NOT EXISTS `uploads_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yii2_loc.uploads_images: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `uploads_images` DISABLE KEYS */;
INSERT INTO `uploads_images` (`id`, `product_id`, `img`) VALUES
	(1, 1, 'img1.jpg'),
	(3, 1, 'img1.jpg');
/*!40000 ALTER TABLE `uploads_images` ENABLE KEYS */;

-- Дамп структуры для таблица yii2_loc.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы yii2_loc.user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
	(1, 'admin', '$2y$13$EpNAb/8KbhJcRZjq/p7W9OE8hsU6hYWWFdZzqpuJrQkfmqLEvmDBK', 'I9QuwUmu7EVHrZzc-nrZxutF9IIgoLm6');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
