-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 22 2022 г., 00:28
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `serving_comp_tech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `father_name` varchar(45) NOT NULL,
  `birth_date` date NOT NULL,
  `passport_s_n` varchar(10) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `father_name`, `birth_date`, `passport_s_n`, `phone_number`, `address`, `user_id`) VALUES
(7, 'Мамонцев', 'Александр', 'Игоревич', '2002-08-28', '2222333333', '88005553535', 'Ул. Пушкина, дом 1', 60),
(8, 'Иванов', 'Иван', 'Иванович', '2022-12-01', '3333444444', '79145465475', 'Ул. Ленина, дом 23, кв. 94', 61),
(10, 'Которенко', 'Мария', 'Владимировна', '1993-07-25', '2513959547', '79029877554', 'ул. Ленина, дом 47, кв. 5', 48),
(11, 'Длиненовна', 'Анастасия', 'Святославовна', '2000-01-01', '2251954548', '79014394375', 'ул. Пушкина, дом 15', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `father_name` varchar(40) NOT NULL,
  `birth_date` date NOT NULL,
  `passport_s_n` varchar(10) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `father_name`, `birth_date`, `passport_s_n`, `phone_number`, `address`, `position_id`, `user_id`) VALUES
(4, 'Геннадий ', 'Носов ', 'Эльдарович', '1979-09-27', '4419787770', '75045438323', 'пр. Космонавтов, дом 56', 2, NULL),
(5, 'Иосиф ', 'Жданов ', 'Денисович', '1994-10-12', '4473613777', '71726902437', 'Гоголя, дом 13', 3, NULL),
(6, 'Карл ', 'Капустин ', 'Робертович', '1999-02-06', '4795301817', '74596817608', 'пер. Гагарина, дом36', 2, NULL),
(7, 'Пантелей ', 'Лазарев ', 'Максович', '1992-09-29', '4092601010', '79201206793', 'пл. Домодедовская, дом 62', 3, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `salary` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `name`, `salary`, `role_id`) VALUES
(1, 'Администратор', 65000, 1),
(2, 'Специалист', 45000, 2),
(3, 'Сотрудник', 30000, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Администратор'),
(2, 'Сотрудник'),
(3, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`, `type`, `price`) VALUES
(13, 'Диагностика', 'Диагностика', 0),
(20, 'Ремонт видеокарты', 'Ремонт', 3000),
(21, 'Ремонт компьютерной мыши', 'Ремонт', 1000),
(22, 'Ремонт блока питания', 'Ремонт', 2000),
(23, 'Ремонт материнской платы', 'Ремонт', 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `avatar` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `avatar`) VALUES
(1, 'root', 'd41ca9b3ff93b24da439c32ab28c24fd03220fbee13d3c4650f20125172ae72d', 1, 'uploads/1670203867441770480f8763ade2af2d7dba662da_jrmky_waifu2x_art_noise1_scale.png'),
(48, 'sonechka', 'efa00909604700a8f2e2a03159659e12fd89c49396d647a986e6aa5f6825779283d94c19700842aacc39bebfe24ae8ec89f2', 1, 'uploads/16702413032D34n6XZdQg.jpg'),
(60, 'volodya', '56afefe49c489175525568350ca7425ff1f81bcae6c678172454b21f69092cdf', 2, 'uploads/16715961367008303c79a057b60ca8e1a5b37ec934.jpg'),
(61, 'dima', '3830fe41d0423bada09282d6c94a4abfb0fcdb2e607227881d9671e8fd48d112', 3, 'uploads/1671635580Screenshot_1.png'),
(62, 'mfy', '56afefe49c489175525568350ca7425ff1f81bcae6c678172454b21f69092cdf', 3, 'uploads/1671658343r2mKkXmdt2w.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `hardware_name` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `warehouse`
--

INSERT INTO `warehouse` (`id`, `hardware_name`, `quantity`, `price`) VALUES
(20, 'MSI GTX 1080Ti', 6, 30000),
(21, 'Ryzen 7 5600X', 4, 15000),
(22, 'GIGABYTE B450 DS3H', 5, 6000),
(23, 'Microsoft Pro Intellimouse ', 3, 5500),
(24, 'BenQ XL 2546K', 2, 58500);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_users__fk` (`user_id`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_position_id_fk` (`position_id`),
  ADD KEY `employee_users__fk` (`user_id`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_roles_id_fk` (`role_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_uindex` (`username`),
  ADD KEY `users_roles__fk` (`role_id`);

--
-- Индексы таблицы `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT для таблицы `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_position_id_fk` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`),
  ADD CONSTRAINT `employee_users__fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_roles_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles__fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
