SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `sitaprendizagem` ;
CREATE SCHEMA IF NOT EXISTS `sitaprendizagem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sitaprendizagem` ;

-- -----------------------------------------------------
-- Table `sitaprendizagem`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitaprendizagem`.`usuario` ;

CREATE TABLE IF NOT EXISTS `sitaprendizagem`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `login` VARCHAR(25) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `dataCadastro` DATETIME NULL,
  `foto` VARCHAR(100) NULL,
  `dataNascimento` DATETIME NULL,
  `cidade` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  `endereco` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `celular` VARCHAR(45) NULL,
  `dataAtualizacao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitaprendizagem`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitaprendizagem`.`categoria` ;

CREATE TABLE IF NOT EXISTS `sitaprendizagem`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitaprendizagem`.`noticia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitaprendizagem`.`noticia` ;

CREATE TABLE IF NOT EXISTS `sitaprendizagem`.`noticia` (
  `idnoticia` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(1024) NOT NULL,
  `texto` TEXT NOT NULL,
  `dataCadasto` DATETIME NOT NULL,
  `idusuario` INT NOT NULL,
  `positivo` INT NOT NULL DEFAULT 0,
  `negativo` INT NOT NULL DEFAULT 0,
  `dataAtualizacao` DATETIME NULL,
  PRIMARY KEY (`idnoticia`),
  INDEX `fk_Noticia_Usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_Noticia_Usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `sitaprendizagem`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitaprendizagem`.`comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitaprendizagem`.`comentario` ;

CREATE TABLE IF NOT EXISTS `sitaprendizagem`.`comentario` (
  `idcomentario` INT NOT NULL AUTO_INCREMENT,
  `comentario` TEXT NOT NULL,
  `dataCadastro` DATETIME NOT NULL,
  `idnoticia` INT NOT NULL,
  `idusuario` INT NOT NULL,
  `dataAtualizacao` DATETIME NOT NULL,
  `positivo` INT NULL,
  `negativo` INT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `fk_Comentario_Noticia1_idx` (`idnoticia` ASC),
  INDEX `fk_Comentario_Usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_Comentario_Noticia1`
    FOREIGN KEY (`idnoticia`)
    REFERENCES `sitaprendizagem`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `sitaprendizagem`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitaprendizagem`.`foto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitaprendizagem`.`foto` ;

CREATE TABLE IF NOT EXISTS `sitaprendizagem`.`foto` (
  `idfoto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `idnoticia` INT NOT NULL,
  `url` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idfoto`),
  INDEX `fk_Foto_Noticia1_idx` (`idnoticia` ASC),
  CONSTRAINT `fk_Foto_Noticia1`
    FOREIGN KEY (`idnoticia`)
    REFERENCES `sitaprendizagem`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitaprendizagem`.`categoria_tem_noticia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitaprendizagem`.`categoria_tem_noticia` ;

CREATE TABLE IF NOT EXISTS `sitaprendizagem`.`categoria_tem_noticia` (
  `idnoticia` INT NOT NULL,
  `idcategoria` INT NOT NULL,
  PRIMARY KEY (`idnoticia`, `idcategoria`),
  INDEX `fk_noticia_has_categoria_categoria1_idx` (`idcategoria` ASC),
  INDEX `fk_noticia_has_categoria_noticia1_idx` (`idnoticia` ASC),
  CONSTRAINT `fk_noticia_has_categoria_noticia1`
    FOREIGN KEY (`idnoticia`)
    REFERENCES `sitaprendizagem`.`noticia` (`idnoticia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticia_has_categoria_categoria1`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `sitaprendizagem`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
