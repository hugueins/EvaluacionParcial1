-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema peliculas
-- -----------------------------------------------------
-- base de datos Gestión Peliculas

-- -----------------------------------------------------
-- Schema peliculas
--
-- base de datos Gestión Peliculas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `peliculas` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `peliculas` ;

-- -----------------------------------------------------
-- Table `peliculas`.`actores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`actores` (
  `actor_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `nacionalidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`actor_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`rol` (
  `rol_id` INT NOT NULL AUTO_INCREMENT,
  `nombre_rol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`rol_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`usuario` (
  `beneficiario_id` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(100) NOT NULL,
  `identificacion` INT(10) NOT NULL,
  `usuario` VARCHAR(40) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(80) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `rol_rol_id` INT NOT NULL,
  PRIMARY KEY (`beneficiario_id`),
  INDEX `fk_usuario_rol1_idx` (`rol_rol_id` ASC) ,
  CONSTRAINT `fk_usuario_rol1`
    FOREIGN KEY (`rol_rol_id`)
    REFERENCES `peliculas`.`rol` (`rol_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`peliculas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`peliculas` (
  `peliculas_id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `genero` VARCHAR(50) NOT NULL,
  `anio` INT(4) NOT NULL,
  `director` VARCHAR(100) NOT NULL,
  `usuario_beneficiario_id` INT NOT NULL,
  PRIMARY KEY (`peliculas_id`),
  INDEX `fk_peliculas_usuario1_idx` (`usuario_beneficiario_id` ASC) ,
  CONSTRAINT `fk_peliculas_usuario1`
    FOREIGN KEY (`usuario_beneficiario_id`)
    REFERENCES `peliculas`.`usuario` (`beneficiario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`valoracion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`valoracion` (
  `valoracion_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`valoracion_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`cometarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`cometarios` (
  `comentarios_id` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `comentarios` VARCHAR(45) NULL,
  `usuario_beneficiario_id` INT NOT NULL,
  `valoracion_valoracion_id` INT NOT NULL,
  PRIMARY KEY (`comentarios_id`),
  INDEX `fk_valoracion_usuario1_idx` (`usuario_beneficiario_id` ASC) ,
  INDEX `fk_calificacion_valoracion1_idx` (`valoracion_valoracion_id` ASC) ,
  CONSTRAINT `fk_valoracion_usuario1`
    FOREIGN KEY (`usuario_beneficiario_id`)
    REFERENCES `peliculas`.`usuario` (`beneficiario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_calificacion_valoracion1`
    FOREIGN KEY (`valoracion_valoracion_id`)
    REFERENCES `peliculas`.`valoracion` (`valoracion_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `peliculas`.`actores_has_peliculas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `peliculas`.`actores_has_peliculas` (
  `actores_actor_id` INT NOT NULL,
  `peliculas_peliculas_id` INT NOT NULL,
  PRIMARY KEY (`actores_actor_id`, `peliculas_peliculas_id`),
  INDEX `fk_actores_has_peliculas_peliculas1_idx` (`peliculas_peliculas_id` ASC) ,
  INDEX `fk_actores_has_peliculas_actores1_idx` (`actores_actor_id` ASC) ,
  CONSTRAINT `fk_actores_has_peliculas_actores1`
    FOREIGN KEY (`actores_actor_id`)
    REFERENCES `peliculas`.`actores` (`actor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_actores_has_peliculas_peliculas1`
    FOREIGN KEY (`peliculas_peliculas_id`)
    REFERENCES `peliculas`.`peliculas` (`peliculas_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
