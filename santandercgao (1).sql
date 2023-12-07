-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2023 a las 13:37:17
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
-- Base de datos: `santandercgao`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `idCiudad` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`idCiudad`, `nombre`) VALUES
(5, 'Medellin'),
(7, 'Tunja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidades`
--

CREATE TABLE `disponibilidades` (
  `idDisponibilidad` int(11) NOT NULL,
  `fechaDisponibilidad` datetime DEFAULT NULL,
  `idManzana` int(11) NOT NULL,
  `idMujer` int(11) NOT NULL,
  `idServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos`
--

CREATE TABLE `establecimientos` (
  `idEstablecimiento` int(11) NOT NULL,
  `nombreEst` varchar(45) DEFAULT NULL,
  `responsableEst` varchar(45) DEFAULT NULL,
  `direccionEst` varchar(45) DEFAULT NULL,
  `idServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `establecimientos`
--

INSERT INTO `establecimientos` (`idEstablecimiento`, `nombreEst`, `responsableEst`, `direccionEst`, `idServicio`) VALUES
(1, 'Pera', 'Ana Maria', 'cr55', 2),
(3, 'Banano', 'Elena gilbert', 'cr22-66', 2),
(4, 'carita feliz', 'Paola', 'cr22-55', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manzanasdelcuidado`
--

CREATE TABLE `manzanasdelcuidado` (
  `idManzana` int(11) NOT NULL,
  `nombreManzana` varchar(45) DEFAULT NULL,
  `idCiudad` int(11) NOT NULL,
  `localidadManzana` varchar(45) DEFAULT NULL,
  `direccionManzana` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `manzanasdelcuidado`
--

INSERT INTO `manzanasdelcuidado` (`idManzana`, `nombreManzana`, `idCiudad`, `localidadManzana`, `direccionManzana`) VALUES
(1, 'Manitas Creativas', 5, 'Fontibon', '55 cl. 20c #97b -26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mujercuidadora`
--

CREATE TABLE `mujercuidadora` (
  `idMujer` int(11) NOT NULL,
  `tipoDocMujer` varchar(45) DEFAULT NULL,
  `numeroDocMujer` varchar(45) DEFAULT NULL,
  `nombreMujer` varchar(45) DEFAULT NULL,
  `apellidoMujer` varchar(45) DEFAULT NULL,
  `telefonoMujer` varchar(45) DEFAULT NULL,
  `correoMujer` varchar(45) DEFAULT NULL,
  `ciudadMujer` varchar(45) DEFAULT NULL,
  `direccionMujer` varchar(45) DEFAULT NULL,
  `ocupacionMujer` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mujercuidadora`
--

INSERT INTO `mujercuidadora` (`idMujer`, `tipoDocMujer`, `numeroDocMujer`, `nombreMujer`, `apellidoMujer`, `telefonoMujer`, `correoMujer`, `ciudadMujer`, `direccionMujer`, `ocupacionMujer`) VALUES
(10, 'Cedula', '292993393', 'Tatiana', 'Lopez', '3124567890', 'tatis@gmail.com', 'Bogota', 'cr2', 'Arquitecta'),
(14, 'Cedula', '22222222222', 'Pepita', 'perez', '586454545945', 'pao@gmail.com', 'bucaramanga', 'cr2', 'profesora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('lau@gmail.com', '$2y$10$y9yXmSNsOzyz1imhv7RBF.jZNPuqq3dMBAsJpLJAUfSNoOBsPQzY2', '2023-11-27 03:51:43'),
('camilagonmar2212@gmail.com', '$2y$10$faHsNV99T7RrTrVTUIvYT.FtxUL7gz/Tm1WrQxfk/Vx8yDMM.jGui', '2023-11-27 03:53:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idServicio` int(11) NOT NULL,
  `nombreServicio` varchar(45) NOT NULL,
  `descripcionServicio` varchar(60) DEFAULT NULL,
  `idTipoServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicio`, `nombreServicio`, `descripcionServicio`, `idTipoServicio`) VALUES
(2, 'Peluqueria', 'Cortar el pelo', 3),
(3, 'Spa', 'Masajes y belleza', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervicios`
--

CREATE TABLE `tiposervicios` (
  `idTipoServicio` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tiposervicios`
--

INSERT INTO `tiposervicios` (`idTipoServicio`, `nombre`) VALUES
(3, 'lavanderia'),
(4, 'Peluqueria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Laura', 'lau@gmail.com', NULL, '$2y$10$UylbHP4LFApzsGGcv29Ye.IGwSNOGAdfqtfx5ESNQEBbgSvUq3xqa', '0muH3VCsTPl8IxL4GgvCcaHQCck5QKk3oaeSPFhRlbVlhKpMvbjm9VDl7pXt', '2023-11-14 19:18:05', '2023-11-14 19:18:05'),
(4, 'pepito', 'pepito@gmail', NULL, '$2y$10$EnP.xQtO/unYx1BgjnQD2u097Dpf1krsy5iZv.DdRh.BHXedjSmpm', NULL, '2023-11-28 10:02:29', '2023-11-28 10:02:29'),
(5, 'Samuel', 'samuelreyco@gmail.com', NULL, '$2y$10$qdc/i8qgqykPTDCsfXKNCOCn4hyT5i2GlASqSJf0hSjffMeeVJLtW', NULL, '2023-11-29 04:46:54', '2023-11-29 18:11:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indices de la tabla `disponibilidades`
--
ALTER TABLE `disponibilidades`
  ADD PRIMARY KEY (`idDisponibilidad`,`idManzana`,`idMujer`,`idServicio`),
  ADD KEY `fk_disponibilidades_manzanasDelCuidado1_idx` (`idManzana`),
  ADD KEY `fk_disponibilidades_mujerCuidadora1_idx` (`idMujer`),
  ADD KEY `fk_disponibilidades_servicios1_idx` (`idServicio`);

--
-- Indices de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD PRIMARY KEY (`idEstablecimiento`,`idServicio`),
  ADD KEY `fk_Establecimientos_servicios1_idx` (`idServicio`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `manzanasdelcuidado`
--
ALTER TABLE `manzanasdelcuidado`
  ADD PRIMARY KEY (`idManzana`,`idCiudad`),
  ADD KEY `fk_manzanasDelCuidado_Ciudades_idx` (`idCiudad`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mujercuidadora`
--
ALTER TABLE `mujercuidadora`
  ADD PRIMARY KEY (`idMujer`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `tiposervicios` (`idTipoServicio`);

--
-- Indices de la tabla `tiposervicios`
--
ALTER TABLE `tiposervicios`
  ADD PRIMARY KEY (`idTipoServicio`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `disponibilidades`
--
ALTER TABLE `disponibilidades`
  MODIFY `idDisponibilidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `idEstablecimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `manzanasdelcuidado`
--
ALTER TABLE `manzanasdelcuidado`
  MODIFY `idManzana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mujercuidadora`
--
ALTER TABLE `mujercuidadora`
  MODIFY `idMujer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tiposervicios`
--
ALTER TABLE `tiposervicios`
  MODIFY `idTipoServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `disponibilidades`
--
ALTER TABLE `disponibilidades`
  ADD CONSTRAINT `fk_disponibilidades_manzanasDelCuidado1` FOREIGN KEY (`idManzana`) REFERENCES `manzanasdelcuidado` (`idManzana`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disponibilidades_mujerCuidadora1` FOREIGN KEY (`idMujer`) REFERENCES `mujercuidadora` (`idMujer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disponibilidades_servicios1` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD CONSTRAINT `fk_Establecimientos_servicios1` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `manzanasdelcuidado`
--
ALTER TABLE `manzanasdelcuidado`
  ADD CONSTRAINT `fk_manzanasDelCuidado_Ciudades` FOREIGN KEY (`idCiudad`) REFERENCES `ciudades` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`idTipoServicio`) REFERENCES `tiposervicios` (`idTipoServicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
