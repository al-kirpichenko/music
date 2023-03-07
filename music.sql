-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 07 2023 г., 21:22
-- Версия сервера: 10.4.12-MariaDB
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `music`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `category` int(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `cost`, `category`, `image`, `description`) VALUES
(4, 'Гитара', 12000, 1, '20230307/1678211717_6c5cc6eb365c71f897e7.jpeg', '1111'),
(5, 'Гитара', 9000, 1, '20230307/1678211776_306b8223e8262c77e447.jpeg', '66665'),
(6, 'Гитара', 6000, 1, '20230307/1678211810_5824934798dff3e50a92.jpeg', '14444'),
(7, 'Скртипка', 17000, 1, '20230307/1678212012_d670cbfdc63cbe07d7e3.jpeg', '7778'),
(8, 'Скрипка', 14000, 1, '20230307/1678212295_306a4c62c3e4a2a0a2bb.jpeg', '7824424'),
(9, 'Синтезатор 1', 7800, 2, '20230307/1678212378_e2f3dd0ea87809548acb.jpeg', '646465546'),
(10, 'Синтезатор 2', 14000, 2, '20230307/1678212486_bdbbc4e7186d1405ce3d.png', 'фапфаифваа'),
(11, 'Виолончель 1', 23111, 1, '20230307/1678212716_db63b415e80dec46f738.jpeg', '343223'),
(12, 'Синтезатор 3', 45550, 1, '20230307//1678212807_c11c2ca6af37485da52a.jpeg', '54245234,3'),
(13, 'Гитара', 51220, 1, '20230307/1678212881_aa9622e8ff36701af734.jpeg', '6536875637');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
