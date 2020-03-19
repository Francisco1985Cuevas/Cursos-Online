-- 
-- Estructura de tabla para la tabla `product`
-- 

CREATE TABLE `product` (
  `product_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(50) collate latin1_spanish_ci NOT NULL default '',
  `price` decimal(10,2) NOT NULL default '0.00',
  `on_promotion` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=57 ;

-- 
-- Volcar la base de datos para la tabla `product`
-- 

INSERT INTO `product` VALUES (1, 'El acorazado potemkim', '14.99', 0);
INSERT INTO `product` VALUES (2, 'Casablanca', '49.99', 1);
INSERT INTO `product` VALUES (3, 'Ladrón de Bicicletas', '12.99', 0);
INSERT INTO `product` VALUES (4, 'Tiempos Modernos', '18.99', 0);
INSERT INTO `product` VALUES (5, 'Rashomon', '15.99', 0);
INSERT INTO `product` VALUES (6, 'Psicosis', '13.99', 0);
INSERT INTO `product` VALUES (7, 'El ciudadano Kane', '35.99', 0);
INSERT INTO `product` VALUES (8, 'Cantando bajo la lluvia', '18.99', 0);
INSERT INTO `product` VALUES (9, 'El padrino', '22.99', 1);
INSERT INTO `product` VALUES (10, 'Fresas Salvajes', '49.99', 0);
INSERT INTO `product` VALUES (11, 'Luces de la ciudad', '35.99', 0);
INSERT INTO `product` VALUES (12, 'El tesoro de Sierra Madre', '18.99', 1);
INSERT INTO `product` VALUES (13, 'Vértigo', '30.99', 0);
INSERT INTO `product` VALUES (14, 'Atrapado sin salida', '23.99', 0);
INSERT INTO `product` VALUES (15, 'El Mago de Oz', '14.99', 0);
INSERT INTO `product` VALUES (16, 'La Naranja Mecánica', '19.99', 0);
INSERT INTO `product` VALUES (17, 'Fanny y Alexander', '14.99', 0);
INSERT INTO `product` VALUES (18, 'Manhattan', '12.99', 0);
INSERT INTO `product` VALUES (19, 'Cleopatra', '17.99', 0);
INSERT INTO `product` VALUES (20, 'Nido de Ratas', '19.99', 0);
INSERT INTO `product` VALUES (21, 'Lawrence de Arabia', '25.00', 0);
INSERT INTO `product` VALUES (22, 'La Quimera del Oro', '24.99', 0);
INSERT INTO `product` VALUES (23, 'Ben Hur', '10.99', 0);
INSERT INTO `product` VALUES (24, 'El Halcón Maltés', '9.99', 1);
INSERT INTO `product` VALUES (25, 'Metrópolis', '6.50', 0);
INSERT INTO `product` VALUES (26, '2001:Odisea en el espacio', '5.99', 1);
INSERT INTO `product` VALUES (27, 'Sonata de Otoño', '1.75', 0);
INSERT INTO `product` VALUES (28, 'El último Emperador', '1.35', 1);
INSERT INTO `product` VALUES (29, 'Rebelde sin Causa', '1.99', 0);
INSERT INTO `product` VALUES (30, 'El Paciente Inglés', '2.75', 0);
INSERT INTO `product` VALUES (31, 'Viridiana', '46.99', 0);
INSERT INTO `product` VALUES (32, 'La lista de Schindler', '9.49', 0);
INSERT INTO `product` VALUES (33, 'Sin aliento', '8.99', 0);
INSERT INTO `product` VALUES (34, 'La Malvada', '7.99', 0);
INSERT INTO `product` VALUES (35, 'Kagemusha', '4.25', 0);
INSERT INTO `product` VALUES (36, 'La pasión de Juana de Arco', '4.25', 0);
INSERT INTO `product` VALUES (37, 'Carmen', '3.50', 0);
INSERT INTO `product` VALUES (38, 'Mefisto', '1.99', 0);
INSERT INTO `product` VALUES (39, 'Las Noches de Cabiria', '0.80', 0);
INSERT INTO `product` VALUES (40, 'Excalibur', '1.98', 1);
INSERT INTO `product` VALUES (41, 'Los Siete Samurais', '0.99', 0);
INSERT INTO `product` VALUES (42, 'La Diligencia', '5.99', 1);
INSERT INTO `product` VALUES (43, 'El Resplandor', '2.99', 0);
INSERT INTO `product` VALUES (44, 'Amadeus', '0.50', 0);
INSERT INTO `product` VALUES (45, 'Pelle el Conquistador', '3.50', 1);
INSERT INTO `product` VALUES (46, 'Cabaret', '2.99', 0);
INSERT INTO `product` VALUES (47, 'El Padrino 2', '1.99', 0);
INSERT INTO `product` VALUES (48, 'El Séptimo Sello', '5.99', 1);
INSERT INTO `product` VALUES (49, 'El Gran Dictador', '7.50', 1);
INSERT INTO `product` VALUES (50, 'Napoléon', '1.75', 0);
INSERT INTO `product` VALUES (51, 'Las Uvas de la Ira', '0.99', 0);
INSERT INTO `product` VALUES (52, 'Lo que el viento se llevó', '1.25', 0);
INSERT INTO `product` VALUES (53, 'Los Olvidados', '0.99', 0);
INSERT INTO `product` VALUES (54, 'Gandhi', '0.99', 0);
INSERT INTO `product` VALUES (55, 'El Tambor de Hojalata', '1.49', 0);
INSERT INTO `product` VALUES (56, 'Solo ante el peligro', '1.29', 1);
