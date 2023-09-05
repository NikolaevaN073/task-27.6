-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 05 2023 г., 16:40
-- Версия сервера: 11.1.0-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task27`
--

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `perm_id` int(10) NOT NULL,
  `perm_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`perm_id`, `perm_desc`) VALUES
(1, 'text is available'),
(2, 'image is available');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'user VK'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `role_perm`
--

CREATE TABLE `role_perm` (
  `role_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `role_perm`
--

INSERT INTO `role_perm` (`role_id`, `perm_id`) VALUES
(1, 1),
(1, 2),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `token`) VALUES
(1, 'admin@test.com', '$2y$10$tmi4/hBSNCqJwESYDcFMc.s4G4uQ5iooyh4o6e2rrvClG1mrQhS0.', '7adbe585195fc32709fe3e08442af57cb7854d7f4d555411703e83f7a3101965'),
(2, 'admin2@test.com', '$2y$10$KPmYIqibNaVnRWSBHMVk2.OeBzwIlkLFJnTquknUI278sBO5M5SOW', ''),
(3, 'user3@test.com', '$2y$10$.m0.CZh3.j28C8fHbZADHugvWiJiVEoAJrz2mh6zf8jtf/hKQx1ve', ''),
(4, 'user4@test.com', '$2y$10$qurWQ3OG0pLLovLItq6g2.erqdVZV3SbVcPQ29H.YSkZCHwUFTXYe', ''),
(5, 'user5@test.com', '$2y$10$7VolTxNlQ43bYGLMxpoOnOoVTzkbIgWznWckh67.MjJdpRiYAnEPq', ''),
(6, 'user6@test.com', '$2y$10$ukLreH43uGw9q8jjB1Hxc.7oVWEL/WYjqe3acf4n3/WP.VStE76p6', ''),
(7, 'user7@test.com', '$2y$10$E17hUfA/VKAPRFhr0k5mB.AaGerCQ/QrSaLd096qecW9E2FY3TZz6', ''),
(8, 'user8@test.com', '$2y$10$xTIQj0Zo477HRrxBCeuvYerGEjN4PfWdVOoLpyY5cg8cwI9UPKhK2', ''),
(9, 'testemail@test.com', '$2y$10$DSuQNtGCiK/SXc5wisd.2.LStuEgX3BYoTwJBgXE2IOfXOM91nKRS', ''),
(11, 'user555@test.com', '$2y$10$UryZBE18fkB.LnZNJx1gJ.S1uztP57l80mKULUkPbJBliT7UPHt1G', ''),
(12, 'nicnatalia@yandex.ru', '$2y$10$y2ZRaFUZlQHFy.zY3bOj2OsjEPLGF9FisvoZ7760x7uzzDKSxW8/.', ''),
(13, 'test@test.com', '$2y$10$IiYY7xqwo0/C9Y3fsdvKOO0G9j4jiMewNWLiO8ytwdrZmLhMyUNua', ''),
(14, 'us@test.com', '$2y$10$cRRrm2iNmTbdw5nDvE726.FxZYu6K2NI6rddou5yNILcmf/Uce.zK', ''),
(15, 'us15@test.com', '$2y$10$ufQFYXLedv0GZsVyJdY7uutZZonjdrC1nm7.0aU3M64JZu68HFExO', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 1),
(11, 2),
(12, 2),
(14, 2),
(15, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `role_perm`
--
ALTER TABLE `role_perm`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `perm_id` (`perm_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `role_perm`
--
ALTER TABLE `role_perm`
  ADD CONSTRAINT `role_perm_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `role_perm_ibfk_2` FOREIGN KEY (`perm_id`) REFERENCES `permissions` (`perm_id`);

--
-- Ограничения внешнего ключа таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
