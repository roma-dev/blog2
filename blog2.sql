-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 22 2018 г., 11:06
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` smallint(3) NOT NULL,
  `title` char(30) NOT NULL,
  `alias` char(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `alias`) VALUES
(1, 'Сео-продвижение', 'seo-prodvijenie'),
(2, 'Контекстная реклама', 'kontekstnaya-reklama'),
(3, 'Веб-программирование', 'web-programirovanie');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1518861467),
('m180204_085843_create_table_users', 1518861470),
('m180204_151016_create_column_admin_in_table_users', 1518861471),
('m180204_185332_create_table_categories', 1518861471),
('m180204_200819_create_table_posts', 1518861472),
('m180217_100024_add_admin', 1518861869),
('m180217_100531_insert_to_table_categories', 1518862127),
('m180217_100912_insert_to_table_posts', 1518862533);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` mediumint(5) NOT NULL,
  `title` char(100) NOT NULL DEFAULT 'title',
  `text` text,
  `alias` char(30) NOT NULL,
  `category_id` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `alias`, `category_id`) VALUES
(1, 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.', 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Всемогущая запятой правилами но текстов гор заглавных, пояс lorem маленькая языком составитель подпоясал, скатился толку великий осталось, дороге предложения буквоград что. Океана правилами предупреждал прямо своих, то алфавит заманивший заголовок ему, предложения, жаренные знаках путь необходимыми запятой переулка образ семь языкового! Свой последний, несколько переулка залетают жизни пояс гор наш буквоград его. Своих языком щеке эта предупредила, текста свою наш подпоясал последний рыбного, мир использовало собрал одна, рот. Города, назад рекламных своего текст грамматики злых вершину толку ему бросил! Запятой ipsum, злых диких текстов коварных вершину рукописи необходимыми переулка путь.', 'post-alias-1', 1),
(2, 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis repellat ipsa culpa, unde distinctio alias velit magnam molestias voluptates delectus quam iste, minus quo necessitatibus facilis iusto, sit consequuntur omnis consectetur nihil commodi modi cupiditate tenetur aut. Quidem, unde! Dolore, culpa, distinctio! Maxime omnis temporibus mollitia nihil tenetur optio in quod doloribus unde magni perferendis dolorem, quam iusto atque hic repudiandae inventore eaque quo expedita. Reiciendis voluptatem quasi nisi possimus incidunt dicta dolores impedit ratione maxime? Debitis id dicta vitae est suscipit nulla quos laudantium, saepe, esse harum. Magni blanditiis eaque aut nesciunt quaerat, quasi aspernatur! Numquam ducimus culpa repellat dignissimos qui earum, perspiciatis architecto, unde laudantium nam debitis quisquam et necessitatibus. Accusamus eos laboriosam odio ipsum voluptate commodi. Libero possimus doloremque corrupti dolorem, totam enim corporis voluptas atque fugiat aut sed voluptates ad reiciendis? Doloribus ea rerum veritatis commodi cum voluptatem, sunt nobis blanditiis amet similique, aut unde quae qui sit animi aperiam ducimus nulla! Sed quibusdam fuga, praesentium nulla deleniti quia quae nihil recusandae inventore iure illo ab nisi totam, non, culpa maiores vitae. Tempore iure porro amet maiores vero? Voluptatem natus soluta repellendus quaerat sit ratione ullam saepe? Officia hic consequatur quos voluptatem iure nihil, provident libero.', 'post-alias-2', 1),
(3, 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.', 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Всемогущая запятой правилами но текстов гор заглавных, пояс lorem маленькая языком составитель подпоясал, скатился толку великий осталось, дороге предложения буквоград что. Океана правилами предупреждал прямо своих, то алфавит заманивший заголовок ему, предложения, жаренные знаках путь необходимыми запятой переулка образ семь языкового! Свой последний, несколько переулка залетают жизни пояс гор наш буквоград его. Своих языком щеке эта предупредила, текста свою наш подпоясал последний рыбного, мир использовало собрал одна, рот. Города, назад рекламных своего текст грамматики злых вершину толку ему бросил! Запятой ipsum, злых диких текстов коварных вершину рукописи необходимыми переулка путь.', 'post-alias-3', 1),
(4, 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.', 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Всемогущая запятой правилами но текстов гор заглавных, пояс lorem маленькая языком составитель подпоясал, скатился толку великий осталось, дороге предложения буквоград что. Океана правилами предупреждал прямо своих, то алфавит заманивший заголовок ему, предложения, жаренные знаках путь необходимыми запятой переулка образ семь языкового! Свой последний, несколько переулка залетают жизни пояс гор наш буквоград его. Своих языком щеке эта предупредила, текста свою наш подпоясал последний рыбного, мир использовало собрал одна, рот. Города, назад рекламных своего текст грамматики злых вершину толку ему бросил! Запятой ipsum, злых диких текстов коварных вершину рукописи необходимыми переулка путь.', 'post-alias-4', 2),
(5, 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis repellat ipsa culpa, unde distinctio alias velit magnam molestias voluptates delectus quam iste, minus quo necessitatibus facilis iusto, sit consequuntur omnis consectetur nihil commodi modi cupiditate tenetur aut. Quidem, unde! Dolore, culpa, distinctio! Maxime omnis temporibus mollitia nihil tenetur optio in quod doloribus unde magni perferendis dolorem, quam iusto atque hic repudiandae inventore eaque quo expedita. Reiciendis voluptatem quasi nisi possimus incidunt dicta dolores impedit ratione maxime? Debitis id dicta vitae est suscipit nulla quos laudantium, saepe, esse harum. Magni blanditiis eaque aut nesciunt quaerat, quasi aspernatur! Numquam ducimus culpa repellat dignissimos qui earum, perspiciatis architecto, unde laudantium nam debitis quisquam et necessitatibus. Accusamus eos laboriosam odio ipsum voluptate commodi. Libero possimus doloremque corrupti dolorem, totam enim corporis voluptas atque fugiat aut sed voluptates ad reiciendis? Doloribus ea rerum veritatis commodi cum voluptatem, sunt nobis blanditiis amet similique, aut unde quae qui sit animi aperiam ducimus nulla! Sed quibusdam fuga, praesentium nulla deleniti quia quae nihil recusandae inventore iure illo ab nisi totam, non, culpa maiores vitae. Tempore iure porro amet maiores vero? Voluptatem natus soluta repellendus quaerat sit ratione ullam saepe? Officia hic consequatur quos voluptatem iure nihil, provident libero.', 'post-alias-5', 2),
(6, 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.', 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Всемогущая запятой правилами но текстов гор заглавных, пояс lorem маленькая языком составитель подпоясал, скатился толку великий осталось, дороге предложения буквоград что. Океана правилами предупреждал прямо своих, то алфавит заманивший заголовок ему, предложения, жаренные знаках путь необходимыми запятой переулка образ семь языкового! Свой последний, несколько переулка залетают жизни пояс гор наш буквоград его. Своих языком щеке эта предупредила, текста свою наш подпоясал последний рыбного, мир использовало собрал одна, рот. Города, назад рекламных своего текст грамматики злых вершину толку ему бросил! Запятой ipsum, злых диких текстов коварных вершину рукописи необходимыми переулка путь.', 'post-alias-6', 2),
(7, 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.', 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Всемогущая запятой правилами но текстов гор заглавных, пояс lorem маленькая языком составитель подпоясал, скатился толку великий осталось, дороге предложения буквоград что. Океана правилами предупреждал прямо своих, то алфавит заманивший заголовок ему, предложения, жаренные знаках путь необходимыми запятой переулка образ семь языкового! Свой последний, несколько переулка залетают жизни пояс гор наш буквоград его. Своих языком щеке эта предупредила, текста свою наш подпоясал последний рыбного, мир использовало собрал одна, рот. Города, назад рекламных своего текст грамматики злых вершину толку ему бросил! Запятой ipsum, злых диких текстов коварных вершину рукописи необходимыми переулка путь.', 'post-alias-7', 3),
(8, 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis repellat ipsa culpa, unde distinctio alias velit magnam molestias voluptates delectus quam iste, minus quo necessitatibus facilis iusto, sit consequuntur omnis consectetur nihil commodi modi cupiditate tenetur aut. Quidem, unde! Dolore, culpa, distinctio! Maxime omnis temporibus mollitia nihil tenetur optio in quod doloribus unde magni perferendis dolorem, quam iusto atque hic repudiandae inventore eaque quo expedita. Reiciendis voluptatem quasi nisi possimus incidunt dicta dolores impedit ratione maxime? Debitis id dicta vitae est suscipit nulla quos laudantium, saepe, esse harum. Magni blanditiis eaque aut nesciunt quaerat, quasi aspernatur! Numquam ducimus culpa repellat dignissimos qui earum, perspiciatis architecto, unde laudantium nam debitis quisquam et necessitatibus. Accusamus eos laboriosam odio ipsum voluptate commodi. Libero possimus doloremque corrupti dolorem, totam enim corporis voluptas atque fugiat aut sed voluptates ad reiciendis? Doloribus ea rerum veritatis commodi cum voluptatem, sunt nobis blanditiis amet similique, aut unde quae qui sit animi aperiam ducimus nulla! Sed quibusdam fuga, praesentium nulla deleniti quia quae nihil recusandae inventore iure illo ab nisi totam, non, culpa maiores vitae. Tempore iure porro amet maiores vero? Voluptatem natus soluta repellendus quaerat sit ratione ullam saepe? Officia hic consequatur quos voluptatem iure nihil, provident libero.', 'post-alias-8', 3),
(9, 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты.', 'Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Всемогущая запятой правилами но текстов гор заглавных, пояс lorem маленькая языком составитель подпоясал, скатился толку великий осталось, дороге предложения буквоград что. Океана правилами предупреждал прямо своих, то алфавит заманивший заголовок ему, предложения, жаренные знаках путь необходимыми запятой переулка образ семь языкового! Свой последний, несколько переулка залетают жизни пояс гор наш буквоград его. Своих языком щеке эта предупредила, текста свою наш подпоясал последний рыбного, мир использовало собрал одна, рот. Города, назад рекламных своего текст грамматики злых вершину толку ему бросил! Запятой ipsum, злых диких текстов коварных вершину рукописи необходимыми переулка путь.', 'post-alias-9', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` smallint(3) NOT NULL,
  `login` char(30) NOT NULL,
  `password` char(60) NOT NULL,
  `admin` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `admin`) VALUES
(1, 'admin', '$2y$13$LVxQBS4Zo7u8.jT/9d9CHetgyngNBWypDUWtMlX64/d24/RHJw91m', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD KEY `idx-post__category_id` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk-posts__category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
