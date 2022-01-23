CREATE DATABASE IF NOT EXISTS tienda_regalos;
use tienda_regalos;

CREATE TABLE IF NOT EXISTS `tienda_regalos`.`regalos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `destinatario` INT NOT NULL,
  `precio` FLOAT NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE `tienda_regalos`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));
