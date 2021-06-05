CREATE DATABASE produccionweb;
USE produccionweb;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- TABLA CATEGORIAS
CREATE TABLE `categories` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `activo` tinyint,
  `padre` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`id`, `nombre`, `activo`, `padre`) VALUES
(1, 'Apple', 1, 0),
(2, 'Samsung', 1, 0),
(3, 'Xiaomi', 1, 0),
(4, 'Huawei', 1, 0),
(5, 'iPhone 11 Pro', 1, 1),
(6, 'iPhone X', 1, 1),
(7, 'iPhone 8', 1, 1),
(8, 'iPhone 8 Plus', 1, 1),
(9, 'S10e', 1, 2),
(10, 'S10 Plus', 1, 2),
(11, 'Note 10', 1, 2),
(12, 'A50', 1, 2),
(13, 'Mi 9', 1, 3),
(14, 'Mi 9 II', 1, 3),
(15, 'P30', 1, 4),
(16, 'P30 II', 1, 4);


-- TABLA COMENTARIOS
CREATE TABLE `comments` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `rank` int NOT NULL,
  `fecha` datetime,
  `producto` int NOT NULL,
  `ip` varchar(15) NOT NULL,
  `activo` tinyint
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- TABLA PERFILES
CREATE TABLE `perfiles` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `perfiles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Filtros'),
(3, 'Ventas'), 
(4, 'Reseñas');


-- TABLA PERFIL_PERMISOS
CREATE TABLE `perfil_permisos` (
  `perfil` int NOT NULL,
  `permiso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `perfil_permisos` (`perfil`, `permiso`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);


-- TABLA PERMISOS
CREATE TABLE `permisos` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `module` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `permisos` (`id`, `nombre`, `code`, `module`) VALUES
(1, 'Administrador', 'a.a', 'adm'),
(2, 'Categorias', 'c.c', 'cat'),
(3, 'Productos', 'p.p', 'prod'),
(4, 'Comentarios', 'c.r', 'com');


-- TABLA PRODUCTOS
CREATE TABLE `productos` (
  `id` int NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float(100, 2) NOT NULL, 
  `imagen` varchar(255), 
  `activo` tinyint,
  `destacado` tinyint,
  `categoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `productos` (`id`, `titulo`, `descripcion`, `precio`, `imagen`, `activo`, `destacado`, `categoria`) VALUES
(1, 'iPhone 11 Pro', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 1100, 'iphone-11-pro.jpg', 1, 1, 5),
(2, 'iPhone X', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 949, 'iphone-x.jpg', 1, 0, 6),
(3, 'iPhone 8 Plus', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 899, 'iphone-8-plus.jpg', 1, 1, 7),
(4, 'iPhone 11', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 1199, 'iphone-11-pro-dos.jpg', 1, 0, 8),
(5, 'Samsung S10e', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 799, 'samsung-s10e.jpg', 1, 1, 9),
(6, 'Samsung S10 Plus', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 899, 'samsung-s10-plus.jpg', 1, 0, 10),
(7, 'Samsung Note 10', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 1100, 'samsung-note-10.jpg', 1, 1, 11),
(8, 'Samsung A50', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 699, 'samsung-a50.jpg', 1, 0, 12),
(9, 'Xiaomi Mi 9', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 699, 'xiaomi-mi-9.jpg', 1, 1, 13),
(10, 'Xiaomi Mi 9 II', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 699, 'xiaomi-mi-9-2.jpg', 1, 0, 14),
(11, 'Huawei P30', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 550, 'huawei-p30.jpg', 1, 1, 15),
(12, 'HUawei P30 II', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 500, 'huawei-p30-2.', 1, 0, 16);


-- TABLA USUARIOS
CREATE TABLE `users` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- TABLA USUARIO_PERFIL
CREATE TABLE `user_perfil` (
  `user` int NOT NULL,
  `perfil` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- LLAVES PRIMARIAS 
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto` (`producto`);

ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `perfil_permisos`
  ADD PRIMARY KEY (`perfil`,`permiso`);

ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

ALTER TABLE `user_perfil`
  ADD PRIMARY KEY (`user`,`perfil`);

-- ID's AUTOINCREMENTABLES
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `perfiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `permisos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;


-- LLAVES FORANEAS
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `productos`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

COMMIT;