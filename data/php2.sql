-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 11 2019 г., 10:55
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `php2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
                        `id` int(11) NOT NULL,
                        `session_id` varchar(50) NOT NULL,
                        `good_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `good_id`) VALUES
(1, '1', '18'),
(2, '', '18'),
(3, '', '19'),
(4, '', '17'),
(5, '', '17'),
(19, '64d5ska8gpm5fslp6p628nvpkg', ''),
(20, '64d5ska8gpm5fslp6p628nvpkg', ''),
(21, '64d5ska8gpm5fslp6p628nvpkg', ''),
(22, '64d5ska8gpm5fslp6p628nvpkg', ''),
(23, '64d5ska8gpm5fslp6p628nvpkg', ''),
(24, '64d5ska8gpm5fslp6p628nvpkg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
                         `id` int(11) NOT NULL,
                         `name` varchar(50) NOT NULL,
                         `description` text NOT NULL,
                         `price` int(11) NOT NULL,
                         `nameImg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `nameImg`) VALUES
(17, 'часы Vacheron Constantin 1', 'Основанный в 1755 году Дом Vacheron Constantin – старейшая в мире часовая мануфактура  – на протяжении более 260 лет неустанно формирует, совершенствует и переосмысливает часовое искусство. Богатейшее наследие компании основано на преемственности поколений искусных мастеров и стилистических изысканиях. Все творения Дома являются воплощением самых строгих стандартов Высокого часового искусства. Каждое изделие наделено уникальными техническими и эстетическими характеристиками.', 900, 'vacheron_constantin_1.jpg'),
(18, 'часы Vacheron Constantin 2', 'Основанный в 1755 году Дом Vacheron Constantin – старейшая в мире часовая мануфактура  – на протяжении более 260 лет неустанно формирует, совершенствует и переосмысливает часовое искусство. Богатейшее наследие компании основано на преемственности поколений искусных мастеров и стилистических изысканиях. Все творения Дома являются воплощением самых строгих стандартов Высокого часового искусства. Каждое изделие наделено уникальными техническими и эстетическими характеристиками.', 1000, 'vacheron_constantin_2.jpg'),
(19, 'часы Vacheron Constantin 3', 'Основанный в 1755 году Дом Vacheron Constantin – старейшая в мире часовая мануфактура  – на протяжении более 260 лет неустанно формирует, совершенствует и переосмысливает часовое искусство. Богатейшее наследие компании основано на преемственности поколений искусных мастеров и стилистических изысканиях. Все творения Дома являются воплощением самых строгих стандартов Высокого часового искусства. Каждое изделие наделено уникальными техническими и эстетическими характеристиками.', 1100, 'vacheron_constantin_3.jpg'),
(20, 'часы Vacheron Constantin 4', 'Основанный в 1755 году Дом Vacheron Constantin – старейшая в мире часовая мануфактура  – на протяжении более 260 лет неустанно формирует, совершенствует и переосмысливает часовое искусство. Богатейшее наследие компании основано на преемственности поколений искусных мастеров и стилистических изысканиях. Все творения Дома являются воплощением самых строгих стандартов Высокого часового искусства. Каждое изделие наделено уникальными техническими и эстетическими характеристиками.', 1200, 'vacheron_constantin_4.jpg'),
(36, 'часы Vacheron Constantin 1', 'productDexription', 11, 'vacheron_constantin_1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
                       `id` int(11) NOT NULL,
                       `name` text NOT NULL,
                       `session_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `session_id`) VALUES
(1, ':name', ':session_id'),
(2, ':name', ':session_id'),
(3, ':name', ':session_id'),
(4, ':name', ':session_id'),
(5, ':name', ':session_id'),
(6, ':name', ':session_id');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
