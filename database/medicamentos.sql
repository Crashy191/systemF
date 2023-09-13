-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2023 a las 17:17:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `medicamentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','vendor','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('Prof. Manley Auer', 'abelardo15@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'active', 'GLjezP1olH', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Celestine Goodwin', 'abraham.schamberger@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'inactive', 'c8Iy1X9WNC', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Administrador', 'admin@gmail.com', NULL, '$2y$10$dGI.GZo/YPRz0lZYEr.bU.WCHcnX/C8JTjVKpb8ypCy7Ov.RT52bi', NULL, NULL, 'admin', 'active', NULL, NULL, NULL),
('Wilburn Hartmann', 'aliza51@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'DkGHFYA5ol', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Annamae Cronin', 'allie29@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'active', 'FGBpE66t6a', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Avis Bogan', 'avon@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'SUEQdv7sQx', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Craig Johnson', 'benedict12@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'active', 'wjQIGm5WL4', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Amely Bednar', 'blanda.maurine@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'active', 'jlQO1EnwAu', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Zula Ankunding', 'braden.watsica@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', 'ajyE6vU6J8', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Eduardo Haley', 'conrad.quigley@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', 'eRLSbnrsgu', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Carlos customer', 'customer@gmail.com', NULL, '$2y$10$Km2f.MB/Ze/rSHi7l84Aeu6pDYbjj2L1kQ7YTuARijOLQv3dtkCZq', NULL, NULL, 'customer', 'active', NULL, NULL, NULL),
('Elouise Murazik', 'cwilliamson@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'ueDMzx9KJ6', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Melyna Gibson', 'danielle11@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', '4OeMQEzxMx', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Mr. Sonny Torphy', 'dewayne45@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'active', 'Wyc0tyuHwL', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Mrs. Mariela Wisozk DDS', 'doyle.dominic@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', 'TcMD1FTXaw', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Bernice Thompson', 'earlene50@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', '0o0XLGfXdk', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Ms. Zella Pfannerstill DVM', 'emmanuelle59@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'inactive', 'FgoQpmzNdG', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Aditya Kling', 'franecki.marjolaine@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'inactive', 'Oi1CIczYNq', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Mr. Rick Skiles PhD', 'german71@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', 'KQCprRCxta', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Dr. Richmond Cole', 'gibson.lelah@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', 'jh9kYxfSze', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Derrick O\'Kon', 'gust.kirlin@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'active', '0z7U6ZTuzq', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Robyn Watsica', 'heathcote.maximus@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', 'farf8lP0Ug', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('May Ondricka', 'hosinski@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'z1lKTd1kPS', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Mr. Marvin Wiza Sr.', 'jettie16@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', 'pVoIjT96Yd', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Mr. Nasir Schuppe IV', 'larissa12@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'active', 'jnZavyX7kH', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Mara Quigley', 'lbechtelar@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'QW7Ofcl8kE', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Sean Schumm PhD', 'levi06@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', '1X28Px34h1', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Gerda Hilpert', 'little.mikayla@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', 'zwpXWJ94T5', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Cara Quigley', 'maia31@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', 'JMtIl5Q0EH', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Dr. Dallin Feil Sr.', 'marc30@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'jMmjj9yHEA', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Logan Ondricka', 'minnie.vandervort@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', 'MxeMcyBWE1', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Mrs. Annalise O\'Connell', 'nhirthe@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', 'CrLb5j4cIm', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Dr. Curt Becker Jr.', 'orrin50@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', 'CPJ5HYpHXB', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Luella Jakubowski', 'osinski.bridie@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', 'uXUqbkyOH2', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Peter Parker', 'oswaldo28@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'wjL4gsfjxT', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Chanelle Mayer', 'qmurphy@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', 'ysOl33EK0o', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Rosalinda Bartell IV', 'queenie.hegmann@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', 'Vv1F6vPVHx', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Miss Ericka Douglas', 'ray73@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'inactive', 'gfxIeZnVO1', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Carlo Kilback', 'reed.paucek@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', '0WPSLggh0D', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Donny Schmeler', 'reynold70@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'inactive', 'TNoyWjRB8V', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Prof. Jaquan Weissnat', 'ronny89@example.com', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'inactive', 'nRVbfEg63t', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('D\'angelo Jenkins', 'ruby18@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'inactive', 'x5IAwJAZKq', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Jamarcus Roob', 'ruecker.aniyah@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'R7NjG3VgWQ', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Casimir Langosh', 'sydnie.kautzer@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', 'NCtrd0qxZG', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Vita Bernier', 'tara39@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'active', 'UuQsJF3626', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Vendor', 'vendor@gmail.com', NULL, '$2y$10$Ewo.3a8v2coPt6px/CqFpuuzFTEdseKTF6Tp.hMwHZfgk3hQ0Ys5.', NULL, NULL, 'vendor', 'active', NULL, NULL, NULL),
('Rosamond Dickinson', 'von.kirk@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'd3JlqB2Ufa', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Wyman Nader III', 'wmraz@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'active', 'Hocp7E4COH', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Ena Russel', 'xgibson@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'admin', 'active', 'B4pfxM3Qng', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Willis Weissnat', 'xkuphal@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'inactive', '3LI54nTebc', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Earnestine Wiza', 'xmarvin@example.org', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'inactive', 'bclGYwUUeL', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Ashtyn Prohaska', 'ybrown@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'customer', 'active', 'y3VZLWejDB', '2023-08-25 15:15:47', '2023-08-25 15:15:47'),
('Alicia Erdman', 'ytremblay@example.net', '2023-08-25 15:15:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vendor', 'inactive', 'DgaD8afd2y', '2023-08-25 15:15:47', '2023-08-25 15:15:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_email_unique` (`email`);
COMMIT;
