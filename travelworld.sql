/*
Navicat MySQL Data Transfer

Source Server         : practicas
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : travelworld

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2019-04-23 19:44:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for fichaviaje
-- ----------------------------
DROP TABLE IF EXISTS `fichaviaje`;
CREATE TABLE `fichaviaje` (
  `idFichaViaje` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idTarifa` int(11) NOT NULL,
  `idLugarOrigen` int(11) NOT NULL,
  `idLugarDestino` int(11) NOT NULL,
  `fechaViaje` date NOT NULL,
  `idTransporte` int(11) NOT NULL,
  `idReserva` int(11) NOT NULL,
  PRIMARY KEY (`idFichaViaje`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idTarifa` (`idTarifa`),
  KEY `lugarOrigen` (`idLugarOrigen`),
  KEY `lugarDestino` (`idLugarDestino`),
  KEY `fichaviaje_ibfk_5` (`idTransporte`),
  KEY `fichaviaje_ibfk_6` (`idReserva`),
  CONSTRAINT `fichaviaje_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fichaviaje_ibfk_2` FOREIGN KEY (`idTarifa`) REFERENCES `tarifas` (`idTarifa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fichaviaje_ibfk_3` FOREIGN KEY (`idLugarOrigen`) REFERENCES `lugares` (`idLugar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fichaviaje_ibfk_4` FOREIGN KEY (`idLugarDestino`) REFERENCES `lugares` (`idLugar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fichaviaje_ibfk_5` FOREIGN KEY (`idTransporte`) REFERENCES `transporte` (`idTransporte`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fichaviaje_ibfk_6` FOREIGN KEY (`idReserva`) REFERENCES `reservas` (`idReserva`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fichaviaje
-- ----------------------------
INSERT INTO `fichaviaje` VALUES ('1', '1', '1', '1', '2', '2019-02-05', '3', '1');
INSERT INTO `fichaviaje` VALUES ('2', '2', '2', '3', '4', '2019-02-06', '1', '2');
INSERT INTO `fichaviaje` VALUES ('3', '3', '3', '2', '1', '2019-02-08', '2', '3');
INSERT INTO `fichaviaje` VALUES ('4', '4', '4', '4', '3', '2019-02-09', '4', '2');
INSERT INTO `fichaviaje` VALUES ('5', '5', '2', '1', '2', '2019-02-09', '4', '6');
INSERT INTO `fichaviaje` VALUES ('6', '8', '4', '1', '1', '2019-02-21', '4', '6');
INSERT INTO `fichaviaje` VALUES ('7', '6', '2', '5', '6', '2019-02-09', '4', '1');
INSERT INTO `fichaviaje` VALUES ('8', '7', '3', '2', '6', '2019-02-17', '3', '6');
INSERT INTO `fichaviaje` VALUES ('9', '9', '2', '5', '2', '2019-02-17', '2', '6');
INSERT INTO `fichaviaje` VALUES ('10', '10', '5', '3', '7', '2019-02-18', '1', '6');
INSERT INTO `fichaviaje` VALUES ('11', '11', '4', '7', '6', '2019-02-18', '2', '6');
INSERT INTO `fichaviaje` VALUES ('23', '12', '3', '2', '3', '2019-04-23', '1', '6');
INSERT INTO `fichaviaje` VALUES ('24', '15', '1', '1', '2', '2019-04-15', '1', '2');

-- ----------------------------
-- Table structure for hoteles
-- ----------------------------
DROP TABLE IF EXISTS `hoteles`;
CREATE TABLE `hoteles` (
  `idHotel` int(11) NOT NULL AUTO_INCREMENT,
  `nombreHotel` varchar(30) NOT NULL,
  `estrellas` char(1) NOT NULL,
  `precioHotel` decimal(12,2) NOT NULL,
  PRIMARY KEY (`idHotel`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hoteles
-- ----------------------------
INSERT INTO `hoteles` VALUES ('1', 'Marriot', '4', '1000.00');
INSERT INTO `hoteles` VALUES ('2', 'Hyatt', '4', '1500.00');
INSERT INTO `hoteles` VALUES ('3', 'One', '4', '800.00');
INSERT INTO `hoteles` VALUES ('4', 'Riu', '5', '5400.00');
INSERT INTO `hoteles` VALUES ('5', 'Quinta Real', '4', '1226.00');
INSERT INTO `hoteles` VALUES ('6', 'Madero', '3', '600.00');
INSERT INTO `hoteles` VALUES ('7', 'Pancha', '1', '200.00');
INSERT INTO `hoteles` VALUES ('10', 'Indequito', '1', '120.25');

-- ----------------------------
-- Table structure for lugares
-- ----------------------------
DROP TABLE IF EXISTS `lugares`;
CREATE TABLE `lugares` (
  `idLugar` int(20) NOT NULL AUTO_INCREMENT,
  `nombreLugar` varchar(30) NOT NULL,
  PRIMARY KEY (`idLugar`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lugares
-- ----------------------------
INSERT INTO `lugares` VALUES ('1', 'Cardenas, Mexico');
INSERT INTO `lugares` VALUES ('2', 'Villahermosa, Mexico');
INSERT INTO `lugares` VALUES ('3', 'Cancun, Mexico');
INSERT INTO `lugares` VALUES ('4', 'Cd. Mexico, Mexico');
INSERT INTO `lugares` VALUES ('5', 'Merida');
INSERT INTO `lugares` VALUES ('6', 'Canada');
INSERT INTO `lugares` VALUES ('7', 'Estados Unidos');

-- ----------------------------
-- Table structure for recomendacionlugares
-- ----------------------------
DROP TABLE IF EXISTS `recomendacionlugares`;
CREATE TABLE `recomendacionlugares` (
  `idRecomendación` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of recomendacionlugares
-- ----------------------------

-- ----------------------------
-- Table structure for reservas
-- ----------------------------
DROP TABLE IF EXISTS `reservas`;
CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `costoReserva` decimal(12,2) NOT NULL,
  `fechaReserva` date NOT NULL,
  `idHotel` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `reservas_ibfk_1` (`idHotel`),
  KEY `reservas_ibfk_2` (`idUsuario`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hoteles` (`idHotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reservas
-- ----------------------------
INSERT INTO `reservas` VALUES ('1', '500.00', '2019-02-10', '4', '1');
INSERT INTO `reservas` VALUES ('2', '1000.00', '2019-02-06', '2', '2');
INSERT INTO `reservas` VALUES ('3', '2000.00', '2019-02-06', '3', '3');
INSERT INTO `reservas` VALUES ('6', '300.00', '2019-02-06', '5', '4');
INSERT INTO `reservas` VALUES ('7', '5000.00', '2019-02-12', '1', '5');
INSERT INTO `reservas` VALUES ('9', '7000.00', '2019-02-13', '5', '6');

-- ----------------------------
-- Table structure for sexo
-- ----------------------------
DROP TABLE IF EXISTS `sexo`;
CREATE TABLE `sexo` (
  `idSexo` int(11) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sexo
-- ----------------------------
INSERT INTO `sexo` VALUES ('1', 'masculino');
INSERT INTO `sexo` VALUES ('2', 'femenino');

-- ----------------------------
-- Table structure for tarifas
-- ----------------------------
DROP TABLE IF EXISTS `tarifas`;
CREATE TABLE `tarifas` (
  `idTarifa` int(20) NOT NULL AUTO_INCREMENT,
  `precioTarifa` varchar(20) NOT NULL,
  PRIMARY KEY (`idTarifa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tarifas
-- ----------------------------
INSERT INTO `tarifas` VALUES ('1', '5000');
INSERT INTO `tarifas` VALUES ('2', '10000');
INSERT INTO `tarifas` VALUES ('3', '20000');
INSERT INTO `tarifas` VALUES ('4', '500');
INSERT INTO `tarifas` VALUES ('5', '1000');
INSERT INTO `tarifas` VALUES ('6', '6000');
INSERT INTO `tarifas` VALUES ('7', '900');
INSERT INTO `tarifas` VALUES ('8', '3000');

-- ----------------------------
-- Table structure for tipousuario
-- ----------------------------
DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(15) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipousuario
-- ----------------------------
INSERT INTO `tipousuario` VALUES ('1', 'administrador');
INSERT INTO `tipousuario` VALUES ('2', 'operador');
INSERT INTO `tipousuario` VALUES ('3', 'cliente');

-- ----------------------------
-- Table structure for transporte
-- ----------------------------
DROP TABLE IF EXISTS `transporte`;
CREATE TABLE `transporte` (
  `idTransporte` int(11) NOT NULL AUTO_INCREMENT,
  `tipoTransporte` varchar(20) NOT NULL,
  PRIMARY KEY (`idTransporte`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transporte
-- ----------------------------
INSERT INTO `transporte` VALUES ('1', 'Autobus');
INSERT INTO `transporte` VALUES ('2', 'Cruceros');
INSERT INTO `transporte` VALUES ('3', 'Avion');
INSERT INTO `transporte` VALUES ('4', 'Automovil');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(30) NOT NULL,
  `apellidoPaterno` varchar(20) NOT NULL,
  `apellidoMaterno` varchar(20) NOT NULL,
  `telefono` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `idHotel` int(11) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `idSexo` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `usuarios_ibfk_1` (`idHotel`),
  KEY `usuarios_ibfk_2` (`idTipoUsuario`),
  KEY `usuarios_ibfk_3` (`idSexo`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hoteles` (`idHotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Cesar Augusto', 'Hernandez', 'Abreu', '9931940606', 'cesar@halito.com', '1234', '1', '1', '1');
INSERT INTO `usuarios` VALUES ('2', 'Lizbeth', 'Abreu', 'Lopez', '9933442588', 'lizbetita@outlook.com', '1234', '2', '3', '2');
INSERT INTO `usuarios` VALUES ('3', 'Anette', 'Abreu', 'Lopez', '9932595081', 'anetita@hotmail.com', '1234', '3', '3', '2');
INSERT INTO `usuarios` VALUES ('4', 'Daniel Orbelin ', 'Ramirez', 'Reyes', '9932773182', 'danyundertaker@hotmail.com', '1234', '4', '3', '1');
INSERT INTO `usuarios` VALUES ('5', 'Carlos', 'Hernandez', 'Abreu', '9932333405', 'carlitos@gmail.com', '1234', '5', '2', '1');
INSERT INTO `usuarios` VALUES ('6', 'Eliza', 'Abreu', 'Cruz', '9937661244', 'paty@outlook.com', '1234', '6', '3', '2');
INSERT INTO `usuarios` VALUES ('7', 'Victor', 'Del Valle ', 'García', '9932995041', 'victorcito@hotmail.com', '1234', '6', '3', '1');
INSERT INTO `usuarios` VALUES ('8', 'Karla', 'De a Rosa', 'Morales', '9931148764', 'yaret@outlook.com', '1234', '5', '3', '2');
INSERT INTO `usuarios` VALUES ('9', 'Seberino', 'Osorio', 'Sanchez', '9931940324', 'sebesanchez@hotmail.com', '1234', '4', '3', '1');
INSERT INTO `usuarios` VALUES ('10', 'German', 'Juarez', 'Morales', '9936778250', 'termineitor@gmail.com', '1234', '3', '3', '1');
INSERT INTO `usuarios` VALUES ('11', 'Jose', 'Alejandro', 'Lazaro', '993238105', 'alejandrolazaro@hotmail.com', '1234', '2', '3', '1');
INSERT INTO `usuarios` VALUES ('12', 'Carmen', 'Perez ', 'Maldonado', '9934254193', 'lonewolf@hotmail.com', '1234', '1', '3', '1');
INSERT INTO `usuarios` VALUES ('13', 'Jorge', 'Torres', 'Vidal', '9371294983', 'jtvidal@gmail.com', '1234', '2', '3', '1');
INSERT INTO `usuarios` VALUES ('14', 'Miguel', 'Hernandez', 'Hernandez', '9932064583', 'loncho@hotmail.com', '1234', '4', '3', '1');
INSERT INTO `usuarios` VALUES ('15', 'Alex', 'Flores', 'Ulin', '9361111708', 'floulin@hotmail.com', '1234', '6', '3', '1');
INSERT INTO `usuarios` VALUES ('16', 'Abigail', 'Figueroa', 'Hernandez', '9931097376', 'bigui@gmail.com', '1234', '3', '3', '2');
INSERT INTO `usuarios` VALUES ('17', 'Yuli', 'Estefany', 'Garcia', '9931081186', 'yuli@outlook.com', '1234', '5', '3', '2');
INSERT INTO `usuarios` VALUES ('18', 'Luis', 'Torres', 'Gallegos', '9933062303', 'luisin@hotmail.com', '1234', '5', '3', '1');
INSERT INTO `usuarios` VALUES ('19', 'Alejandro', 'Cortes', 'Garcia', '9933426187', 'alegarcia@hotmail.com', '1234', '2', '3', '1');
INSERT INTO `usuarios` VALUES ('20', 'Elizabeth ', 'Garcia', 'Ramos', '9931534402', 'eli@gmail.com', '1234', '4', '3', '2');
INSERT INTO `usuarios` VALUES ('21', 'Pancha', 'Pancha', 'Pancha', '1234567', 'pancha@pancha.com', '1234', '2', '3', '1');
INSERT INTO `usuarios` VALUES ('24', 'Diego ', 'Hernandez', 'Lopez', '9999999901', 'diegohl@correo.com', '1234', '3', '3', '1');
INSERT INTO `usuarios` VALUES ('25', 'pruebita', 'pruebita', 'pruebita', '9933313205', 'pruebita@correo.com', '1234', '5', '3', '1');
INSERT INTO `usuarios` VALUES ('26', 'JAJAJAJAAJA', 'JAJAJAJAJAJA', 'JAJAJAJAJAJA', '1234565432', 'jaja@correo.com', '1234', '2', '3', '1');

-- ----------------------------
-- View structure for vwfichaviaje
-- ----------------------------
DROP VIEW IF EXISTS `vwfichaviaje`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vwfichaviaje` AS SELECT
fichaviaje.idFichaViaje,
fichaviaje.fechaViaje,
usuarios.nombreUsuario,
usuarios.apellidoMaterno,
tarifas.precioTarifa,
transporte.tipoTransporte,
fichaviaje.idLugarOrigen,
fichaviaje.idLugarDestino,
origen.nombreLugar AS nombreOrigen,
destino.nombreLugar AS nombreDestino,
reservas.costoReserva,
fichaviaje.idUsuario,
fichaviaje.idTarifa,
fichaviaje.idTransporte,
fichaviaje.idReserva
FROM
fichaviaje
LEFT JOIN usuarios ON fichaviaje.idUsuario = usuarios.idUsuario
LEFT JOIN tarifas ON fichaviaje.idTarifa = tarifas.idTarifa
LEFT JOIN transporte ON fichaviaje.idTransporte = transporte.idTransporte
LEFT JOIN lugares AS origen ON fichaviaje.idLugarOrigen = origen.idLugar
LEFT JOIN lugares AS destino ON fichaviaje.idLugarDestino = destino.idLugar
LEFT JOIN reservas ON reservas.idUsuario = usuarios.idUsuario ;

-- ----------------------------
-- View structure for vwreservas
-- ----------------------------
DROP VIEW IF EXISTS `vwreservas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vwreservas` AS SELECT
reservas.idReserva,
reservas.costoReserva,
reservas.fechaReserva,
reservas.idHotel,
hoteles.nombreHotel,
hoteles.estrellas,
usuarios.nombreUsuario
FROM
reservas
LEFT JOIN hoteles ON reservas.idHotel = hoteles.idHotel
LEFT JOIN usuarios ON reservas.idUsuario = usuarios.idUsuario ;

-- ----------------------------
-- View structure for vwusuarios
-- ----------------------------
DROP VIEW IF EXISTS `vwusuarios`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vwusuarios` AS SELECT
usuarios.nombreUsuario,
usuarios.apellidoPaterno,
usuarios.apellidoMaterno,
usuarios.telefono,
usuarios.email,
usuarios.`contraseña`,
usuarios.idHotel,
usuarios.idTipoUsuario,
hoteles.nombreHotel,
tipousuario.tipoUsuario,
sexo.sexo,
usuarios.idUsuario
FROM
usuarios
INNER JOIN hoteles ON usuarios.idHotel = hoteles.idHotel
INNER JOIN tipousuario ON usuarios.idTipoUsuario = tipousuario.idTipoUsuario
INNER JOIN sexo ON usuarios.idSexo = sexo.idSexo ;
