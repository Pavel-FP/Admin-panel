-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 31 2023 г., 06:50
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `orders`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ordersTable`
--

CREATE TABLE `ordersTable` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number` int NOT NULL,
  `payment` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ordersTable`
--

INSERT INTO `ordersTable` (`id`, `name`, `number`, `payment`, `status`) VALUES
(1, 'Pizza \"Paralloerererasolla Chkrparaerro\"', 53095, 'Due', 'Pending'),
(2, 'Spaghetti istantanei \"Doshirak con manzo\"', 46643, 'Due', 'Pending'),
(3, 'Pollo dalla figa di mamma kurnosov', 12756, 'Due', 'Pending'),
(4, 'Salsiccia di antipova', 75675, 'Due', 'Pending'),
(5, 'Lasagne con salsa piccante di produzione maschile', 96745, 'Due', 'Pending'),
(6, 'Zuppa alla griglia \"Zuppa del Capo\"', 67845, 'Due', 'Pending'),
(7, 'Zuppa in scatola dalla Russia \"Yupi-yo\"', 53765, 'Due', 'Pending'),
(8, 'Carbone in scatola grigliato \"dalla Nigeria\"', 86351, 'Due', 'Pending'),
(9, 'Gnocchi preparati dallo chef Billy Herrington \"Gachi Muchi\"', 24153, 'Due', 'Pending');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ordersTable`
--
ALTER TABLE `ordersTable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ordersTable`
--
ALTER TABLE `ordersTable`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
