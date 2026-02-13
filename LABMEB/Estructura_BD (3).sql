-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2026 a las 00:50:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrer`
--

CREATE TABLE `carrer` (
  `Id_carrera` bigint(20) UNSIGNED NOT NULL,
  `carrer_name` varchar(100) NOT NULL,
  `Id_college` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `college`
--

CREATE TABLE `college` (
  `Id_college` bigint(20) UNSIGNED NOT NULL,
  `college_name` varchar(100) NOT NULL,
  `director` varchar(200) DEFAULT NULL,
  `Id_university` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `Id_country` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `Continent` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipment_services`
--

CREATE TABLE `equipment_services` (
  `Id_equipment` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institution`
--

CREATE TABLE `institution` (
  `Id_institution` bigint(20) UNSIGNED NOT NULL,
  `institution_name` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `Id_state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratory`
--

CREATE TABLE `laboratory` (
  `Id_laboratory` int(11) NOT NULL,
  `specialization` varchar(200) DEFAULT NULL,
  `director` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratory_services`
--

CREATE TABLE `laboratory_services` (
  `Id_laboratory` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `Id_person` bigint(20) UNSIGNED NOT NULL,
  `Id_number` varchar(10) DEFAULT NULL,
  `full_name` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person_roles`
--

CREATE TABLE `person_roles` (
  `Id_person` int(11) DEFAULT NULL,
  `Id_college` int(11) DEFAULT NULL,
  `Id_laboratory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `Id_region` bigint(20) UNSIGNED NOT NULL,
  `region_name` varchar(50) NOT NULL,
  `Id_country` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scientific_equipment`
--

CREATE TABLE `scientific_equipment` (
  `Id_equipment` bigint(20) UNSIGNED NOT NULL,
  `equipment_name` varchar(100) NOT NULL,
  `technology` varchar(15) DEFAULT NULL,
  `Id_institution` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `Id_service` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

CREATE TABLE `state` (
  `Id_state` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `Id_region` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `university`
--

CREATE TABLE `university` (
  `Id_university` int(11) NOT NULL,
  `president` varchar(100) DEFAULT NULL,
  `type` varchar(3) DEFAULT NULL,
  `extra_information` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrer`
--
ALTER TABLE `carrer`
  ADD PRIMARY KEY (`Id_carrera`);

--
-- Indices de la tabla `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`Id_college`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Id_country`);

--
-- Indices de la tabla `equipment_services`
--
ALTER TABLE `equipment_services`
  ADD PRIMARY KEY (`Id_equipment`,`Id_service`);

--
-- Indices de la tabla `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`Id_institution`);

--
-- Indices de la tabla `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`Id_laboratory`);

--
-- Indices de la tabla `laboratory_services`
--
ALTER TABLE `laboratory_services`
  ADD PRIMARY KEY (`Id_laboratory`,`Id_service`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Id_person`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`Id_region`);

--
-- Indices de la tabla `scientific_equipment`
--
ALTER TABLE `scientific_equipment`
  ADD PRIMARY KEY (`Id_equipment`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Id_service`);

--
-- Indices de la tabla `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`Id_state`);

--
-- Indices de la tabla `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`Id_university`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrer`
--
ALTER TABLE `carrer`
  MODIFY `Id_carrera` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `college`
--
ALTER TABLE `college`
  MODIFY `Id_college` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `Id_country` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `institution`
--
ALTER TABLE `institution`
  MODIFY `Id_institution` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `Id_person` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `Id_region` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `scientific_equipment`
--
ALTER TABLE `scientific_equipment`
  MODIFY `Id_equipment` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `Id_service` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `state`
--
ALTER TABLE `state`
  MODIFY `Id_state` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
