CREATE DATABASE produccionweb;
USE produccionweb;

-- TABLA CATEGORIAS
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categories` (`id`, `nombre`, `activo`) VALUES
(1, 'Apple', 1),
(2, 'Samsung', 1),
(3, 'Xiaomi', 1),
(4, 'Huawei', 1);

-- TABLA COMENTARIOS
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `rank` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `producto` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- TABLA MODELOS
CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL, 
  `categoria` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `models` (`id`, `nombre`, `activo`, `categoria`) VALUES
(1, 'iPhone 11 Pro', 1, 1),
(2, 'iPhone X', 1, 1),
(3, 'iPhone 8', 1, 1),
(4, 'iPhone 8 Plus', 1, 1),
(5, 'S10e', 1, 2),
(6, 'S10 Plus', 1, 2),
(7, 'Note 10', 1, 2),
(8, 'A50', 1, 2),
(9, 'Mi 9', 1, 3),
(10, 'Mi 9T', 1, 3),
(11, 'P30', 1, 4),
(12, 'P30 II', 1, 4);


-- TABLA PERFILES
CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `perfiles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Filtros'),
(3, 'Ventas'),
(4, 'Reseñas');


-- TABLA PERFIL_PERMISOS
CREATE TABLE `perfil_permisos` (
  `perfil` int(11) NOT NULL,
  `permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `perfil_permisos` (`perfil`, `permiso`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);


-- TABLA PERMISOS
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `module` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `permisos` (`id`, `nombre`, `code`, `module`) VALUES
(1, 'Administrador', 'a.a', 'adm'),
(2, 'Categorias', 'c.c', 'cat'),
(3, 'Productos', 'p.p', 'prod'),
(4, 'Comentarios', 'c.r', 'com');


-- TABLA PRODUCTOS
CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float(100,0) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `destacado` tinyint(4) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `productos` (`id`, `titulo`, `descripcion`, `precio`, `imagen`, `activo`, `destacado`, `categoria`, `modelo`) VALUES
(1, 'iPhone 11 Pro', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 1100, 'iphone-11-pro.jpg', 1, 1, 1, 1),
(2, 'iPhone X', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 949, 'iphone-x.jpg', 1, 0, 1, 2),
(3, 'iPhone 8 Plus', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 899, 'iphone-8-plus.jpg', 1, 1, 1, 3),
(4, 'iPhone 11', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 1199, 'iphone-11-pro-dos.jpg', 1, 0, 1, 4),
(5, 'Samsung S10e', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 799, 'samsung-s10e.jpg', 1, 1, 2, 5),
(6, 'Samsung S10 Plus', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 899, 'samsung-s10-plus.jpg', 1, 0, 2, 6),
(7, 'Samsung Note 10', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 1100, 'samsung-note-10.jpg', 1, 1, 2, 7),
(8, 'Samsung A50', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 699, 'samsung-a50.jpg', 1, 0, 2, 8),
(9, 'Xiaomi Mi 9', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 699, 'xiaomi-mi-9.jpg', 1, 1, 3, 9),
(10, 'Xiaomi Mi 9T', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 699, 'xiaomi-mi-9t.jpg', 1, 0, 3, 10),
(11, 'Huawei P30', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 550, 'huawei-p30.jpg', 1, 1, 4, 11),
(12, 'Huawei P30 II', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita commodi minus nemo? Non aspernatur sunt autem quisquam sed, consequatur corporis tenetur beatae eius similique rerum sequi aliquam at laborum. Deleniti!', 500, 'huawei-p30-2.jpg', 1, 0, 4, 12);


-- TABLA USUARIOS
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `nombre`, `email`, `user`, `password`) VALUES
(27, 'Admin', 'admin@admin.com', 'admin', '$2y$10$YN0mb.Rc7pyaUhketa.KJugs3PazMe6BB5AC5gl.MD2mG5hnNPLti'),
(28, 'Brian', 'brian@brian.com', 'brian', '$2y$10$yzUITjpgANM9j/FkIDoyhekWkUk9jl62hvsMTNt0BQxmUx/aKtWVy'),
(29, 'Leonel', 'leonel@leonel.com', 'leonel', '$2y$10$5NDw/nGwlml56W.bZZoOO.7xGUCsDXrNZpb9sdq7lqQ8yGKmON6Ye'),
(30, 'Romano', 'romano@romano.com', 'romano', '$2y$10$Rt0WT/NVL6I4wMpjgyAAde8bH6cm4rv8j/sdlIdDlGmXcuznhRUw.');


-- TABLA USUARIOS_PERFIL
CREATE TABLE `user_perfil` (
  `user` int(11) NOT NULL,
  `perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_perfil` (`user`, `perfil`) VALUES
(27, 1),
(28, 2),
(29, 3),
(30, 4);


-- LLAVES PRIMARIAS
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto` (`producto`);

ALTER TABLE `models`
  ADD PRIMARY KEY (`id`)
  ADD KEY `categoria` (`categoria`);;

ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `perfil_permisos`
  ADD PRIMARY KEY (`perfil`,`permiso`);

ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `modelo` (`modelo`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

ALTER TABLE `user_perfil`
  ADD PRIMARY KEY (`user`,`perfil`);


-- AUTOINCREMENTAR 'ID'
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;


-- LLAVES FORANEAS
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`);

ALTER TABLE `models`
  ADD CONSTRAINT `models_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categories` (`id`);

ALTER TABLE `productos`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`modelo`) REFERENCES `models` (`id`);