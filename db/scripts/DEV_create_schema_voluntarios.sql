-- MySQL Script generated by MySQL Workbench
-- Sun Nov 18 15:47:42 2018
-- Model: Voluntários    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema voluntarios
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `voluntarios` ;

-- -----------------------------------------------------
-- Schema voluntarios
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `voluntarios` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `voluntarios` ;

-- -----------------------------------------------------
-- Table `voluntarios`.`tipo_registo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `voluntarios`.`tipo_registo` ;

CREATE TABLE IF NOT EXISTS `voluntarios`.`tipo_registo` (
  `codigo_registo` VARCHAR(8) NOT NULL,
  `descricao_registo` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`codigo_registo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `voluntarios`.`tipo_contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `voluntarios`.`tipo_contato` ;

CREATE TABLE IF NOT EXISTS `voluntarios`.`tipo_contato` (
  `codigo_tipo_contato` VARCHAR(8) NOT NULL,
  `descricao_tipo_contato` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`codigo_tipo_contato`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `voluntarios`.`tipo_remocao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `voluntarios`.`tipo_remocao` ;

CREATE TABLE IF NOT EXISTS `voluntarios`.`tipo_remocao` (
  `codigo_tipo_remocao` VARCHAR(8) NOT NULL,
  `descricao_tipo_remocao` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`codigo_tipo_remocao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `voluntarios`.`genero`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `voluntarios`.`genero` ;

CREATE TABLE IF NOT EXISTS `voluntarios`.`genero` (
  `codigo_genero` VARCHAR(8) NOT NULL,
  `descricao_genero` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`codigo_genero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `voluntarios`.`voluntario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `voluntarios`.`voluntario` ;

CREATE TABLE IF NOT EXISTS `voluntarios`.`voluntario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(32) NOT NULL,
  `apelido` VARCHAR(64) NOT NULL,
  `data_nascimento` DATE NULL,
  `tipo_contato` VARCHAR(8) NULL,
  `email1` VARCHAR(254) NULL,
  `email2` VARCHAR(254) NULL,
  `telefone` VARCHAR(16) NULL,
  `genero` VARCHAR(8) NULL,
  `nif` VARCHAR(9) NULL,
  `localidade` VARCHAR(25) NULL,
  `codigo_postal` VARCHAR(8) NULL,
  `consente_promocoes` TINYINT(1) NULL,
  `consente_campanhas` TINYINT(1) NULL,
  `tipo_registo` VARCHAR(8) NOT NULL,
  `data_registo` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_remocao` VARCHAR(8) NULL,
  PRIMARY KEY (`id`),
  INDEX `tipo_registo_voluntario_idx` (`tipo_registo` ASC),
  INDEX `tipo_contato_voluntario_idx` (`tipo_contato` ASC),
  INDEX `tipo_remocao_voluntario_idx` (`tipo_remocao` ASC),
  INDEX `genero_voluntario_idx` (`genero` ASC),
  INDEX `apelido_idx` (`apelido` ASC),
  CONSTRAINT `tipo_registo_voluntario`
    FOREIGN KEY (`tipo_registo`)
    REFERENCES `voluntarios`.`tipo_registo` (`codigo_registo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `tipo_contato_voluntario`
    FOREIGN KEY (`tipo_contato`)
    REFERENCES `voluntarios`.`tipo_contato` (`codigo_tipo_contato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `tipo_remocao_voluntario`
    FOREIGN KEY (`tipo_remocao`)
    REFERENCES `voluntarios`.`tipo_remocao` (`codigo_tipo_remocao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `genero_voluntario`
    FOREIGN KEY (`genero`)
    REFERENCES `voluntarios`.`genero` (`codigo_genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `voluntarios`.`acao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `voluntarios`.`acao` ;

CREATE TABLE IF NOT EXISTS `voluntarios`.`acao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(64) NOT NULL,
  `local` VARCHAR(64) NOT NULL,
  `data` DATE NOT NULL,
  `descricao` VARCHAR(254) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `voluntarios`.`participacoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `voluntarios`.`participacoes` ;

CREATE TABLE IF NOT EXISTS `voluntarios`.`participacoes` (
  `voluntario_id` INT NOT NULL,
  `acao_id` INT NOT NULL,
  INDEX `id_voluntario_idx` (`voluntario_id` ASC),
  INDEX `id_acao_idx` (`acao_id` ASC),
  PRIMARY KEY (`voluntario_id`, `acao_id`),
  CONSTRAINT `id_voluntario`
    FOREIGN KEY (`voluntario_id`)
    REFERENCES `voluntarios`.`voluntario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_acao`
    FOREIGN KEY (`acao_id`)
    REFERENCES `voluntarios`.`acao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE = '';
GRANT USAGE ON *.* TO webapp;
 DROP USER webapp;
SET SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
CREATE USER 'webapp' IDENTIFIED BY 'UNvHL8Q8';

GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `voluntarios`.* TO 'webapp';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `voluntarios`.`tipo_registo`
-- -----------------------------------------------------
START TRANSACTION;
USE `voluntarios`;
INSERT INTO `voluntarios`.`tipo_registo` (`codigo_registo`, `descricao_registo`) VALUES ('F', 'Formulário');
INSERT INTO `voluntarios`.`tipo_registo` (`codigo_registo`, `descricao_registo`) VALUES ('I', 'Importação');

COMMIT;


-- -----------------------------------------------------
-- Data for table `voluntarios`.`tipo_contato`
-- -----------------------------------------------------
START TRANSACTION;
USE `voluntarios`;
INSERT INTO `voluntarios`.`tipo_contato` (`codigo_tipo_contato`, `descricao_tipo_contato`) VALUES ('S', 'Contato Simples');
INSERT INTO `voluntarios`.`tipo_contato` (`codigo_tipo_contato`, `descricao_tipo_contato`) VALUES ('IC', 'Informação Corrente');
INSERT INTO `voluntarios`.`tipo_contato` (`codigo_tipo_contato`, `descricao_tipo_contato`) VALUES ('P', 'Peditório');

COMMIT;


-- -----------------------------------------------------
-- Data for table `voluntarios`.`tipo_remocao`
-- -----------------------------------------------------
START TRANSACTION;
USE `voluntarios`;
INSERT INTO `voluntarios`.`tipo_remocao` (`codigo_tipo_remocao`, `descricao_tipo_remocao`) VALUES ('P', 'Parcial');
INSERT INTO `voluntarios`.`tipo_remocao` (`codigo_tipo_remocao`, `descricao_tipo_remocao`) VALUES ('T', 'Total');

COMMIT;


-- -----------------------------------------------------
-- Data for table `voluntarios`.`genero`
-- -----------------------------------------------------
START TRANSACTION;
USE `voluntarios`;
INSERT INTO `voluntarios`.`genero` (`codigo_genero`, `descricao_genero`) VALUES ('M', 'Masculino');
INSERT INTO `voluntarios`.`genero` (`codigo_genero`, `descricao_genero`) VALUES ('F', 'Feminino');

COMMIT;


-- -----------------------------------------------------
-- Data for table `voluntarios`.`voluntario`
-- -----------------------------------------------------
START TRANSACTION;
USE `voluntarios`;
INSERT INTO `voluntarios`.`voluntario` (`id`, `nome`, `apelido`, `data_nascimento`, `tipo_contato`, `email1`, `email2`, `telefone`, `genero`, `nif`, `localidade`, `codigo_postal`, `consente_promocoes`, `consente_campanhas`, `tipo_registo`, `data_registo`, `tipo_remocao`) VALUES (DEFAULT, 'Ana', 'Monteiro', '1984-03-14', 'S', 'a25monteiro@hotmail.com', NULL, '914066193', 'F', '287304370', 'Palmela', NULL, NULL, NULL, 'F', DEFAULT, NULL);
INSERT INTO `voluntarios`.`voluntario` (`id`, `nome`, `apelido`, `data_nascimento`, `tipo_contato`, `email1`, `email2`, `telefone`, `genero`, `nif`, `localidade`, `codigo_postal`, `consente_promocoes`, `consente_campanhas`, `tipo_registo`, `data_registo`, `tipo_remocao`) VALUES (DEFAULT, 'Cristina', 'Ramos', '1945-08-29', 'S', 'crisramos53@gmail.com', NULL, '916907262', 'F', '292277997', 'Setúbal', NULL, NULL, NULL, 'F', DEFAULT, NULL);
INSERT INTO `voluntarios`.`voluntario` (`id`, `nome`, `apelido`, `data_nascimento`, `tipo_contato`, `email1`, `email2`, `telefone`, `genero`, `nif`, `localidade`, `codigo_postal`, `consente_promocoes`, `consente_campanhas`, `tipo_registo`, `data_registo`, `tipo_remocao`) VALUES (DEFAULT, 'Diogo', 'Silva', '1978-11-13', 'P', 'diogofs@hotmail.com', NULL, '915830956', 'M', '255727755', 'Lisboa', NULL, NULL, NULL, 'F', DEFAULT, NULL);
INSERT INTO `voluntarios`.`voluntario` (`id`, `nome`, `apelido`, `data_nascimento`, `tipo_contato`, `email1`, `email2`, `telefone`, `genero`, `nif`, `localidade`, `codigo_postal`, `consente_promocoes`, `consente_campanhas`, `tipo_registo`, `data_registo`, `tipo_remocao`) VALUES (DEFAULT, 'Helena', 'Rodrigues', '1968-11-07', 'S', 'helrodriguez44@hotmail.com', NULL, '911203232', 'F', '242806791', 'Setúbal', NULL, NULL, NULL, 'F', DEFAULT, NULL);
INSERT INTO `voluntarios`.`voluntario` (`id`, `nome`, `apelido`, `data_nascimento`, `tipo_contato`, `email1`, `email2`, `telefone`, `genero`, `nif`, `localidade`, `codigo_postal`, `consente_promocoes`, `consente_campanhas`, `tipo_registo`, `data_registo`, `tipo_remocao`) VALUES (DEFAULT, 'Jorge', 'Almeida', '1997-11-13', 'IC', 'jalmeida@gmail.com', NULL, '912752716', 'M', '264632222', 'Lisboa', NULL, NULL, NULL, 'F', DEFAULT, NULL);
INSERT INTO `voluntarios`.`voluntario` (`id`, `nome`, `apelido`, `data_nascimento`, `tipo_contato`, `email1`, `email2`, `telefone`, `genero`, `nif`, `localidade`, `codigo_postal`, `consente_promocoes`, `consente_campanhas`, `tipo_registo`, `data_registo`, `tipo_remocao`) VALUES (DEFAULT, 'Maria', 'Valente', '1974-11-28', 'S', 'mvale86@gmail.com', NULL, '914727046', 'F', '256300178', 'Azeitão', NULL, NULL, NULL, 'F', DEFAULT, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `voluntarios`.`acao`
-- -----------------------------------------------------
START TRANSACTION;
USE `voluntarios`;
INSERT INTO `voluntarios`.`acao` (`id`, `nome`, `local`, `data`, `descricao`) VALUES (DEFAULT, 'Campanha de Recolha de Alimentos - Dezembro 2017', 'Lisboa', '2017-12-01', NULL);
INSERT INTO `voluntarios`.`acao` (`id`, `nome`, `local`, `data`, `descricao`) VALUES (DEFAULT, 'Campanha de Recolha de Alimentos - Maio 2017', 'Setúbal', '2017-05-24', NULL);
INSERT INTO `voluntarios`.`acao` (`id`, `nome`, `local`, `data`, `descricao`) VALUES (DEFAULT, 'Campanha de Recolha de Alimentos - Setembro 2016', 'Setúbal', '2016-09-12', NULL);
INSERT INTO `voluntarios`.`acao` (`id`, `nome`, `local`, `data`, `descricao`) VALUES (DEFAULT, 'Campanha de Recolha de Alimentos - Maio 2015', 'Lisboa', '2017-05-26', NULL);

COMMIT;
