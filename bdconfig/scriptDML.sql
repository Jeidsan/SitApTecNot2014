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
  `dataAtualizacao` VARCHAR(45) NULL,
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


-- -----------------------------------------------------
-- Data for table `sitaprendizagem`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitaprendizagem`;
INSERT INTO `sitaprendizagem`.`usuario` (`idusuario`, `nome`, `email`, `login`, `senha`, `dataCadastro`, `foto`, `dataNascimento`, `cidade`, `estado`, `bairro`, `endereco`, `cep`, `telefone`, `celular`, `dataAtualizacao`) VALUES (NULL, 'Jeidsan Pereira', 'jeidsanpereira@gmail.com', 'jeidsan', 'jeidsan', NULL, 'jeidsan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`usuario` (`idusuario`, `nome`, `email`, `login`, `senha`, `dataCadastro`, `foto`, `dataNascimento`, `cidade`, `estado`, `bairro`, `endereco`, `cep`, `telefone`, `celular`, `dataAtualizacao`) VALUES (NULL, 'João Pereira', 'jdamasceno@pereira.com', 'jdamasceno', 'jdamasceno', NULL, 'jdamasceno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`usuario` (`idusuario`, `nome`, `email`, `login`, `senha`, `dataCadastro`, `foto`, `dataNascimento`, `cidade`, `estado`, `bairro`, `endereco`, `cep`, `telefone`, `celular`, `dataAtualizacao`) VALUES (NULL, 'Maria Norma Pereira', 'mnorma@pereira.com', 'mclarindo', 'mclarindo', NULL, 'mclarindo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`usuario` (`idusuario`, `nome`, `email`, `login`, `senha`, `dataCadastro`, `foto`, `dataNascimento`, `cidade`, `estado`, `bairro`, `endereco`, `cep`, `telefone`, `celular`, `dataAtualizacao`) VALUES (NULL, 'Vanda Julieta da Conceição', 'vjulieta@conceicao.com', 'mnorma', 'mnorma', NULL, 'mnorma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`usuario` (`idusuario`, `nome`, `email`, `login`, `senha`, `dataCadastro`, `foto`, `dataNascimento`, `cidade`, `estado`, `bairro`, `endereco`, `cep`, `telefone`, `celular`, `dataAtualizacao`) VALUES (NULL, 'Manuel Clarindo da Conceição', 'mclarindo@conceicao.com', 'vjulieta', 'vjulieta', NULL, 'vjulieta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `sitaprendizagem`.`categoria`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitaprendizagem`;
INSERT INTO `sitaprendizagem`.`categoria` (`idcategoria`, `nome`) VALUES (NULL, 'Álgebra');
INSERT INTO `sitaprendizagem`.`categoria` (`idcategoria`, `nome`) VALUES (NULL, 'Informática');
INSERT INTO `sitaprendizagem`.`categoria` (`idcategoria`, `nome`) VALUES (NULL, 'Geometria');
INSERT INTO `sitaprendizagem`.`categoria` (`idcategoria`, `nome`) VALUES (NULL, 'Lógica');
INSERT INTO `sitaprendizagem`.`categoria` (`idcategoria`, `nome`) VALUES (NULL, 'Análise');
INSERT INTO `sitaprendizagem`.`categoria` (`idcategoria`, `nome`) VALUES (NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `sitaprendizagem`.`noticia`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitaprendizagem`;
INSERT INTO `sitaprendizagem`.`noticia` (`idnoticia`, `titulo`, `texto`, `dataCadasto`, `idusuario`, `positivo`, `negativo`, `dataAtualizacao`) VALUES (NULL, 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', '', 1, 0, 0, NULL);
INSERT INTO `sitaprendizagem`.`noticia` (`idnoticia`, `titulo`, `texto`, `dataCadasto`, `idusuario`, `positivo`, `negativo`, `dataAtualizacao`) VALUES (NULL, 'Mussum Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', '', 2, 0, 0, NULL);
INSERT INTO `sitaprendizagem`.`noticia` (`idnoticia`, `titulo`, `texto`, `dataCadasto`, `idusuario`, `positivo`, `negativo`, `dataAtualizacao`) VALUES (NULL, 'Ave Maria', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', '', 3, 0, 0, NULL);
INSERT INTO `sitaprendizagem`.`noticia` (`idnoticia`, `titulo`, `texto`, `dataCadasto`, `idusuario`, `positivo`, `negativo`, `dataAtualizacao`) VALUES (NULL, 'Totta Pulcra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', '', 4, 0, 0, NULL);
INSERT INTO `sitaprendizagem`.`noticia` (`idnoticia`, `titulo`, `texto`, `dataCadasto`, `idusuario`, `positivo`, `negativo`, `dataAtualizacao`) VALUES (NULL, 'Ah Lelek Lek Lek', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', '', 5, 0, 0, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `sitaprendizagem`.`comentario`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitaprendizagem`;
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 1, 2, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 2, 3, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 3, 4, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 4, 5, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 5, 4, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 4, 3, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 3, 2, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 2, 1, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 1, 2, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 2, 3, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 3, 4, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 4, 5, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 5, 4, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 4, 3, NULL, NULL, NULL);
INSERT INTO `sitaprendizagem`.`comentario` (`idcomentario`, `comentario`, `dataCadastro`, `idnoticia`, `idusuario`, `dataAtualizacao`, `positivo`, `negativo`) VALUES (NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate lorem commodo risus laoreet, quis auctor magna elementum. Praesent vulputate purus nec libero scelerisque faucibus. Vestibulum et varius tortor. Proin quis nunc ac metus interdum interdum. Phasellus faucibus arcu et mi bibendum interdum. Fusce mollis sem dignissim vulputate congue. Nullam quis odio id tellus facilisis accumsan. Praesent cursus nulla justo, ut scelerisque elit ultrices sed. Maecenas ut rutrum enim. Duis laoreet nisl odio, nec tempus nulla volutpat eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut pellentesque diam vel urna pulvinar, et fermentum urna sagittis.', 'now()', 3, 2, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `sitaprendizagem`.`foto`
-- -----------------------------------------------------
START TRANSACTION;
USE `sitaprendizagem`;
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (1, 'noticia1_1', 1, NULL);
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (2, 'noticia1_2', 2, NULL);
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (3, 'noticia2_1', 3, NULL);
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (4, 'noticia2_2', 4, NULL);
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (5, 'noticia3_1', 5, NULL);
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (6, 'noticia3_2', 6, NULL);
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (7, 'noticia4_1', 7, NULL);
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (8, 'noticia4_2', 8, NULL);
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (9, 'noticia5_1', 9, NULL);
INSERT INTO `sitaprendizagem`.`foto` (`idfoto`, `nome`, `idnoticia`, `url`) VALUES (10, 'noticia5_2', 10, NULL);

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
