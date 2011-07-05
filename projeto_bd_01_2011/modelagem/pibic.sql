SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `pibic` ;
CREATE SCHEMA IF NOT EXISTS `pibic` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
SHOW WARNINGS;
USE `pibic` ;

-- -----------------------------------------------------
-- Table `pibic`.`area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`area` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`area` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`palavra_chave`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`palavra_chave` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`palavra_chave` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_palavra_chave_area`
    FOREIGN KEY (`area_id` )
    REFERENCES `pibic`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_palavra_chave_area` ON `pibic`.`palavra_chave` (`area_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`campus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`campus` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`campus` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`depto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`depto` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`depto` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  `depto_id` INT NOT NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_depto_area1`
    FOREIGN KEY (`area_id` )
    REFERENCES `pibic`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_depto_depto1`
    FOREIGN KEY (`depto_id` )
    REFERENCES `pibic`.`depto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_depto_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `pibic`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_depto_area1` ON `pibic`.`depto` (`area_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_depto_depto1` ON `pibic`.`depto` (`depto_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_depto_campus1` ON `pibic`.`depto` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`faculdade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`faculdade` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`faculdade` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_faculdade_area1`
    FOREIGN KEY (`area_id` )
    REFERENCES `pibic`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_faculdade_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `pibic`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_faculdade_area1` ON `pibic`.`faculdade` (`area_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_faculdade_campus1` ON `pibic`.`faculdade` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`centro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`centro` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`centro` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_centro_area1`
    FOREIGN KEY (`area_id` )
    REFERENCES `pibic`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_centro_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `pibic`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_centro_area1` ON `pibic`.`centro` (`area_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_centro_campus1` ON `pibic`.`centro` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`instituto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`instituto` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`instituto` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_instituto_area1`
    FOREIGN KEY (`area_id` )
    REFERENCES `pibic`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_instituto_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `pibic`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_instituto_area1` ON `pibic`.`instituto` (`area_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_instituto_campus1` ON `pibic`.`instituto` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`curso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`curso` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`curso` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_curso_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `pibic`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_curso_campus1` ON `pibic`.`curso` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`pessoa` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`pessoa` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(70) NOT NULL ,
  `estado_civil` INT NULL ,
  `sexo` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`discente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`discente` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`discente` (
  `matricula` INT NOT NULL ,
  `site` VARCHAR(45) NULL ,
  `blog` VARCHAR(100) NULL ,
  `twitter` VARCHAR(45) NULL ,
  `end_institucional` VARCHAR(100) NULL ,
  `cv_lattes` VARCHAR(45) NULL ,
  `pessoa_id` INT NOT NULL ,
  `curso_id` INT NOT NULL ,
  PRIMARY KEY (`matricula`) ,
  CONSTRAINT `fk_discente_pessoa1`
    FOREIGN KEY (`pessoa_id` )
    REFERENCES `pibic`.`pessoa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_discente_curso1`
    FOREIGN KEY (`curso_id` )
    REFERENCES `pibic`.`curso` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_discente_pessoa1` ON `pibic`.`discente` (`pessoa_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_discente_curso1` ON `pibic`.`discente` (`curso_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`bolsista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`bolsista` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`bolsista` (
  `edital` VARCHAR(45) NULL ,
  `outros` VARCHAR(100) NULL ,
  `cota_unb` INT NULL ,
  `ic_balcao` INT NULL ,
  `acoes_afirm_cnpq` VARCHAR(100) NULL ,
  `unb_cerrado` VARCHAR(50) NULL ,
  `pibic_cnpq` VARCHAR(70) NULL ,
  `remunerado` TINYINT(1)  NULL ,
  `discente_matricula` INT NOT NULL ,
  `cod` INT NOT NULL AUTO_INCREMENT ,
  INDEX `fk_bolsista_discente1` (`discente_matricula` ASC) ,
  PRIMARY KEY (`cod`) ,
  CONSTRAINT `fk_bolsista_discente1`
    FOREIGN KEY (`discente_matricula` )
    REFERENCES `mydb`.`discente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`ira`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`ira` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`ira` (
  `id` INT NOT NULL ,
  `valor` INT NULL ,
  `discente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_ira_discente1`
    FOREIGN KEY (`discente_matricula` )
    REFERENCES `pibic`.`discente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_ira_discente1` ON `pibic`.`ira` (`discente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`tecnico_gestor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`tecnico_gestor` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`tecnico_gestor` (
  `id` INT NOT NULL ,
  `perfil` INT NOT NULL ,
  `site` VARCHAR(45) NULL ,
  `blog` VARCHAR(70) NULL ,
  `twitter` VARCHAR(45) NULL ,
  `end_institucional` VARCHAR(45) NULL ,
  `cv_lattes` VARCHAR(45) NULL ,
  `graduacao` DATE NULL ,
  `data_admissao` DATE NOT NULL ,
  `data_saida` DATE NULL ,
  `pessoa_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tecnico_gestor_pessoa1`
    FOREIGN KEY (`pessoa_id` )
    REFERENCES `pibic`.`pessoa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tecnico_gestor_pessoa1` ON `pibic`.`tecnico_gestor` (`pessoa_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`docente` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`docente` (
  `matricula` INT NOT NULL ,
  `regime_trabalho` INT NULL ,
  `cv_lattes` VARCHAR(45) NULL ,
  `site` VARCHAR(45) NULL ,
  `blog` VARCHAR(70) NULL ,
  `twitter` VARCHAR(45) NULL ,
  `end_institucional` VARCHAR(100) NULL ,
  `data_entrada` DATE NULL ,
  `vinculo` INT NULL ,
  `pessoa_id` INT NOT NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`matricula`) ,
  CONSTRAINT `fk_docente_pessoa1`
    FOREIGN KEY (`pessoa_id` )
    REFERENCES `pibic`.`pessoa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_docente_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `pibic`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_docente_pessoa1` ON `pibic`.`docente` (`pessoa_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_docente_campus1` ON `pibic`.`docente` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`email`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`email` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`email` (
  `id` INT NOT NULL ,
  `email` VARCHAR(45) NULL ,
  `discente_matricula` INT NULL ,
  `tecnico_gestor_id` INT NULL ,
  `docente_matricula` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_email_discente1`
    FOREIGN KEY (`discente_matricula` )
    REFERENCES `pibic`.`discente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_email_tecnico_gestor1`
    FOREIGN KEY (`tecnico_gestor_id` )
    REFERENCES `pibic`.`tecnico_gestor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_email_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_email_discente1` ON `pibic`.`email` (`discente_matricula` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_email_tecnico_gestor1` ON `pibic`.`email` (`tecnico_gestor_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_email_docente1` ON `pibic`.`email` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`telefone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`telefone` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`telefone` (
  `id` INT NOT NULL ,
  `telefone` VARCHAR(45) NULL ,
  `tipo` INT NULL ,
  `discente_matricula` INT NULL ,
  `tecnico_gestor_id` INT NULL ,
  `docente_matricula` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_telefone_discente1`
    FOREIGN KEY (`discente_matricula` )
    REFERENCES `pibic`.`discente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefone_tecnico_gestor1`
    FOREIGN KEY (`tecnico_gestor_id` )
    REFERENCES `pibic`.`tecnico_gestor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefone_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_telefone_discente1` ON `pibic`.`telefone` (`discente_matricula` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_telefone_tecnico_gestor1` ON `pibic`.`telefone` (`tecnico_gestor_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_telefone_docente1` ON `pibic`.`telefone` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`titulacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`titulacao` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`titulacao` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`historico_titulacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`historico_titulacao` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`historico_titulacao` (
  `data` DATE NULL ,
  `titulacao_id` INT NOT NULL ,
  `tecnico_gestor_id` INT NULL ,
  `docente_matricula` INT NULL ,
  CONSTRAINT `fk_historico_titulacao_titulacao1`
    FOREIGN KEY (`titulacao_id` )
    REFERENCES `pibic`.`titulacao` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historico_titulacao_tecnico_gestor1`
    FOREIGN KEY (`tecnico_gestor_id` )
    REFERENCES `pibic`.`tecnico_gestor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historico_titulacao_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_historico_titulacao_titulacao1` ON `pibic`.`historico_titulacao` (`titulacao_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_historico_titulacao_tecnico_gestor1` ON `pibic`.`historico_titulacao` (`tecnico_gestor_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_historico_titulacao_docente1` ON `pibic`.`historico_titulacao` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`com_inst_gestor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`com_inst_gestor` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`com_inst_gestor` (
  `id` INT NOT NULL ,
  `data_entrada` DATE NULL ,
  `data_saida` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_cig_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_cig_docente1` ON `pibic`.`com_inst_gestor` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`com_externo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`com_externo` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`com_externo` (
  `id` INT NOT NULL ,
  `data_entrada` DATE NULL ,
  `data_saida` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_com_externo_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_com_externo_docente1` ON `pibic`.`com_externo` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`situacao_proic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`situacao_proic` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`situacao_proic` (
  `id` INT NOT NULL ,
  `inadimplencia` VARCHAR(120) NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_situacao_proic_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_situacao_proic_docente1` ON `pibic`.`situacao_proic` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`bols_produtiv`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`bols_produtiv` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`bols_produtiv` (
  `id` INT NOT NULL ,
  `nivel` VARCHAR(45) NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_bols_produtiv_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_bols_produtiv_docente1` ON `pibic`.`bols_produtiv` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`qualis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`qualis` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`qualis` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `data` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_qualis_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_qualis_docente1` ON `pibic`.`qualis` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`livro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`livro` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`livro` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `editorial` VARCHAR(45) NULL ,
  `data` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_livro_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_livro_docente1` ON `pibic`.`livro` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`outras_producoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`outras_producoes` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`outras_producoes` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `tipo` INT NULL ,
  `data` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_outras_producoes_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_outras_producoes_docente1` ON `pibic`.`outras_producoes` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`tipo_orientacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`tipo_orientacao` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`tipo_orientacao` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pibic`.`tipo_or_x_doc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pibic`.`tipo_or_x_doc` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pibic`.`tipo_or_x_doc` (
  `data_ini` DATE NULL ,
  `data_fim` DATE NULL ,
  `tipo_orientacao_id` INT NOT NULL ,
  `docente_matricula` INT NOT NULL ,
  CONSTRAINT `fk_tipo_or_x_doc_tipo_orientacao1`
    FOREIGN KEY (`tipo_orientacao_id` )
    REFERENCES `pibic`.`tipo_orientacao` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_or_x_doc_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `pibic`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tipo_or_x_doc_tipo_orientacao1` ON `pibic`.`tipo_or_x_doc` (`tipo_orientacao_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tipo_or_x_doc_docente1` ON `pibic`.`tipo_or_x_doc` (`docente_matricula` ASC) ;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
