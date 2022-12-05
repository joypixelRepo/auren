-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2022 a las 15:58:55
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `auren`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `common_name` varchar(255) NOT NULL,
  `official_name` varchar(255) NOT NULL,
  `capital` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `cca2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `common_name`, `official_name`, `capital`, `region`, `cca2`, `created_at`, `updated_at`) VALUES
(1, 'Kyrgyzstan', 'Kyrgyz Republic	', 'Bishkek', 'Asia', 'KG', NULL, NULL),
(2, 'Palestine', 'State of Palestine', 'Ramallah Jerusalem', 'Asia', 'PS', NULL, NULL),
(3, 'Spain', 'Kingdom of Spain', 'Madrid', 'Europe', 'ES', NULL, NULL),
(4, 'Andorra', 'Principality of Andorra', 'Andorra la Vella', 'Europe', 'AD', NULL, NULL),
(6, 'Netherlands', 'Kingdom of the Netherlands', 'Amsterdam', 'Europe', 'NL', NULL, NULL),
(10, 'North Macedonia', 'Republic of North Macedonia', 'Skopje', 'Europe', 'MK', NULL, NULL),
(11, 'Faroe Islands', 'Faroe Islands', 'Tórshavn', 'Europe', 'FO', NULL, NULL),
(12, 'Croatia', 'Republic of Croatia', 'Zagreb', 'Europe', 'HR', NULL, NULL),
(13, 'Hungary', 'Hungary', 'Budapest', 'Europe', 'HU', NULL, NULL),
(14, 'Liechtenstein', 'Principality of Liechtenstein', 'Vaduz', 'Europe', 'LI', NULL, NULL),
(16, 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'Sarajevo', 'Europe', 'BA', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cca2` (`cca2`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
