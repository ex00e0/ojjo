-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 02 2024 г., 06:54
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ojjo_up`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(25) DEFAULT NULL,
  `category_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(1, 'кольца', 'available'),
(2, 'серьги', 'available'),
(3, 'колье', 'available'),
(4, 'подвески', 'deleted'),
(5, 'браслеты', 'available'),
(6, 'часы', 'available'),
(7, 'кольца премиум', 'available');

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `item_jew` int DEFAULT NULL,
  `item_order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`item_jew`, `item_order`) VALUES
(1, 1),
(2, 1),
(4, 1),
(3, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `jewelery`
--

CREATE TABLE `jewelery` (
  `jew_id` int NOT NULL,
  `jew_name` varchar(30) DEFAULT NULL,
  `jew_cat` int DEFAULT NULL,
  `jew_descr` varchar(200) DEFAULT NULL,
  `jew_img` varchar(100) DEFAULT NULL,
  `jew_price` int DEFAULT NULL,
  `jew_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `jewelery`
--

INSERT INTO `jewelery` (`jew_id`, `jew_name`, `jew_cat`, `jew_descr`, `jew_img`, `jew_price`, `jew_status`) VALUES
(1, 'серьги с рубином Tiffany', 2, 'дорогие богатые серьги, покупайте недорого', 'jew1.png', 1000000, 'available'),
(2, 'часы мужские SOKOLOV', 6, 'для важных встреч', 'jew2.png', 5000000, 'available'),
(3, 'подвеска Simaland', 4, 'красивое', 'jew3.png', 30, 'deleted'),
(4, 'колье с бриллиантами FB', 3, '?????????????', 'f33.png', 2302, 'available'),
(5, 'браслет от сглаза', 5, 'с глазами бегемота из турции', 'jew5.png', 9999999, 'available'),
(6, 'красивый браслет', 5, 'просто браслет', 'jew5.png', 5000, 'available'),
(7, 'кольца с бриллиантом', 1, 'идеальный подарок', 'f34.png', 35005, 'available'),
(8, 'ауоытла', 5, 'фтвлталвф', 'cc2.png', 3683, 'available'),
(9, 'кольцо с рубином', 1, 'идеальный подарок!!', 'Снимок экрана 2023-09-25 041100.png', 35005, 'deleted'),
(10, 'выталтлы', 3, 'авылав66', 'darkgreen.png', 73, 'deleted');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `order_user` int DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_get` date DEFAULT NULL,
  `order_sum` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_user`, `order_date`, `order_get`, `order_sum`) VALUES
(1, 1, '2024-02-09', '2024-02-10', 1200000),
(2, 3, '2021-02-02', '2024-02-09', 50),
(3, 1, '2024-02-01', '2024-02-02', 3500);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_login` varchar(30) DEFAULT NULL,
  `user_password` varchar(20) DEFAULT NULL,
  `user_birth` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `admin_status` int NOT NULL,
  `block` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_login`, `user_password`, `user_birth`, `admin_status`, `block`) VALUES
(1, 'Элиза', 'elka', 'elka444', '1999-12-07', 0, 'unblocked'),
(2, 'Арсений', 'popov', 'popov', '1999-12-07', 0, 'blocked'),
(3, 'Мэри', 'krovavaya', 'krovavaya', '1999-12-07', 0, 'blocked'),
(5, 'name', 'phone', 'pass', '1999-12-07', 0, 'unblocked'),
(10, 'admin', 'admin', 'admin', NULL, 1, 'unblocked'),
(11, 'лорпавыф', 'суыул', 'ысыусусыу', NULL, 1, 'blocked'),
(12, 'sabjdbjasbjassjd', 'nkd,na ,ldnlaskn', 'sajbdkandbkjas', NULL, 0, 'blocked'),
(13, 'refee', '79256312485', 'refee', NULL, 0, 'unblocked'),
(14, 'dbajkndaslns', '79875432111', 'dksdk', NULL, 0, 'unblocked'),
(15, 'namename', '77755757575', 'hfiukfnsdldm', NULL, 0, 'blocked'),
(16, 'hbdfsj', '79670009889', 'iufsidkndk', NULL, 0, 'blocked');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD KEY `item_jew` (`item_jew`),
  ADD KEY `item_order` (`item_order`);

--
-- Индексы таблицы `jewelery`
--
ALTER TABLE `jewelery`
  ADD PRIMARY KEY (`jew_id`),
  ADD KEY `jew_cat` (`jew_cat`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_user` (`order_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `jewelery`
--
ALTER TABLE `jewelery`
  MODIFY `jew_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_jew`) REFERENCES `jewelery` (`jew_id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`item_order`) REFERENCES `orders` (`order_id`);

--
-- Ограничения внешнего ключа таблицы `jewelery`
--
ALTER TABLE `jewelery`
  ADD CONSTRAINT `jewelery_ibfk_1` FOREIGN KEY (`jew_cat`) REFERENCES `category` (`category_id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_user`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
