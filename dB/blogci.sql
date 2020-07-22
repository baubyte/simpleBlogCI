-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-07-2020 a las 14:10:36
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blogci`
--
DROP DATABASE IF EXISTS `blogci`;
CREATE DATABASE IF NOT EXISTS `blogci` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `blogci`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf16_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tecnologia', '2020-07-14 13:30:07', '2020-07-14 13:30:07', NULL),
(2, 'Informatica', '2020-07-14 13:30:07', '2020-07-14 13:30:07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `comment` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '', '', '', '2020-07-16 09:01:43', '2020-07-16 09:01:43', NULL),
(2, 1, 'adadadasd', 'asdad@gmail.com', 'adasdadadadadaddasdsa asdasd asd asd asd asd sad asda sd asdas d asd asd ad asdasd asda das asd asdasd asd sad d', '2020-07-16 09:12:43', '2020-07-16 09:12:43', NULL),
(3, 1, 'adadadasd', 'asdad@gmail.com', 'adasdadadadadaddasdsa asdasd asd asd asd asd sad asda sd asdas d asd asd ad asdasd asda das asd asdasd asd sad d', '2020-07-16 09:13:02', '2020-07-16 09:13:02', NULL),
(4, 1, 'adadadasd', 'asdad@gmail.com', 'adasdadadadadaddasdsa asdasd asd asd asd asd sad asda sd asdas d asd asd ad asdasd asda das asd asdasd asd sad d', '2020-07-16 09:15:51', '2020-07-16 09:15:51', NULL),
(5, 1, 'adadadasd', 'asdad@gmail.com', 'adasdadadadadaddasdsa asdasd asd asd asd asd sad asda sd asdas d asd asd ad asdasd asda das asd asdasd asd sad d', '2020-07-16 09:16:31', '2020-07-16 09:16:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'paredbaez.martin@gmail.com', '2020-07-13 11:21:39', '2020-07-13 11:21:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `banner` text COLLATE utf16_spanish_ci NOT NULL,
  `title` text COLLATE utf16_spanish_ci NOT NULL,
  `slug` text COLLATE utf16_spanish_ci NOT NULL,
  `intro` text COLLATE utf16_spanish_ci NOT NULL,
  `content` text COLLATE utf16_spanish_ci NOT NULL,
  `category` int(11) NOT NULL,
  `tags` text COLLATE utf16_spanish_ci NOT NULL,
  `show_home` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `banner`, `title`, `slug`, `intro`, `content`, `category`, `tags`, `show_home`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1594745461_e0f8d4cfd54babaf62c4.png', 'tests', 'tests', 'test de un post', '<p><span style=\"background-color: rgb(255, 255, 0);\">dasd d asd asd as dasd as dasd asdasd asd ad asd asd asd asdasdas asd asd a</span><br></p>', 1, 'nuevo', 1, 0, '2020-07-14 13:51:01', '2020-07-14 13:51:01', NULL),
(2, '1594745570_85be451d9323eacb2b5a.png', 'tests', 'tests', 'test de un post', '<p><span style=\"background-color: rgb(255, 255, 0);\">dasd d asd asd as dasd as dasd asdasd asd ad asd asd asd asdasdas asd asd a</span><br></p>', 1, 'nuevo', 0, 0, '2020-07-14 13:52:50', '2020-07-14 13:52:50', NULL),
(3, '1594745604_98f4181d6cee6b8f9c76.png', 'tests', 'tests', 'test de un post', '<p><span style=\"background-color: rgb(255, 255, 0);\">dasd d asd asd as dasd as dasd asdasd asd ad asd asd asd asdasdas asd asd a</span><br></p>', 1, 'nuevo', 0, 0, '2020-07-14 13:53:24', '2020-07-14 13:53:24', NULL),
(4, '1594745724_04ad6d07d7177693df86.png', 'tests1', 'tests1', 'test de un post1', '<p><span style=\"font-family: &quot;Comic Sans MS&quot;;\">adsada da sd asd asd adas das dasd asd sad assdsad asd asd as dsa asd asdasdadada das d asd ad ad adasdasdasd asd asd asd asd asd asd as das da sad a d sdasd a</span><br></p>', 2, 'nuevo1', 1, 0, '2020-07-14 13:55:24', '2020-07-14 13:55:24', NULL),
(5, '1594752278_31eb2478d1c46145c7a9.png', 'tests3', 'tests3', 'test de un post3', '<p>zmjbnjkbdfkjafrbfh&nbsp; asdkfjbakjfbasd f asdkjbasjkdbaksj asjiodbhaskjb ans dkasd asd<br></p>', 2, 'nuevo3', 0, 0, '2020-07-14 15:44:38', '2020-07-14 15:44:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf16_spanish_ci NOT NULL,
  `username` varchar(80) COLLATE utf16_spanish_ci NOT NULL,
  `password` text COLLATE utf16_spanish_ci NOT NULL,
  `role` int(11) NOT NULL,
  `last_login` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
