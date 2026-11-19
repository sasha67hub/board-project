-- Дамп базы данных для доски объявлений
CREATE TABLE `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `ads` (`title`, `price`, `image`) VALUES
('Продам велосипед', 12000, 'img/img1.webp'),
('Сдам квартиру', 25000, 'img/img2.webp'),
('iPhone 13', 45000, 'img/img3.webp');