SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
SHOW WARNINGS;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`area` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`area` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`palavra_chave`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`palavra_chave` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`palavra_chave` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_palavra_chave_area`
    FOREIGN KEY (`area_id` )
    REFERENCES `mydb`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_palavra_chave_area` ON `mydb`.`palavra_chave` (`area_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`campus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`campus` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`campus` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`depto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`depto` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`depto` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  `depto_id` INT NOT NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_depto_area1`
    FOREIGN KEY (`area_id` )
    REFERENCES `mydb`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_depto_depto1`
    FOREIGN KEY (`depto_id` )
    REFERENCES `mydb`.`depto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_depto_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `mydb`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_depto_area1` ON `mydb`.`depto` (`area_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_depto_depto1` ON `mydb`.`depto` (`depto_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_depto_campus1` ON `mydb`.`depto` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`faculdade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`faculdade` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`faculdade` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_faculdade_area1`
    FOREIGN KEY (`area_id` )
    REFERENCES `mydb`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_faculdade_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `mydb`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_faculdade_area1` ON `mydb`.`faculdade` (`area_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_faculdade_campus1` ON `mydb`.`faculdade` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`centro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`centro` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`centro` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_centro_area1`
    FOREIGN KEY (`area_id` )
    REFERENCES `mydb`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_centro_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `mydb`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_centro_area1` ON `mydb`.`centro` (`area_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_centro_campus1` ON `mydb`.`centro` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`instituto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`instituto` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`instituto` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `area_id` INT NOT NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_instituto_area1`
    FOREIGN KEY (`area_id` )
    REFERENCES `mydb`.`area` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_instituto_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `mydb`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_instituto_area1` ON `mydb`.`instituto` (`area_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_instituto_campus1` ON `mydb`.`instituto` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`curso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`curso` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`curso` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `campus_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_curso_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `mydb`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_curso_campus1` ON `mydb`.`curso` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`pessoa` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`pessoa` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(70) NOT NULL ,
  `estado_civil` INT NULL ,
  `sexo` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`discente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`discente` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`discente` (
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
    REFERENCES `mydb`.`pessoa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_discente_curso1`
    FOREIGN KEY (`curso_id` )
    REFERENCES `mydb`.`curso` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_discente_pessoa1` ON `mydb`.`discente` (`pessoa_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_discente_curso1` ON `mydb`.`discente` (`curso_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`bolsista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bolsista` ;

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
  PRIMARY KEY (`discente_matricula`) ,
  CONSTRAINT `fk_bolsista_discente1`
    FOREIGN KEY (`discente_matricula` )
    REFERENCES `mydb`.`discente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`ira`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`ira` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`ira` (
  `id` INT NOT NULL ,
  `valor` INT NULL ,
  `discente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_ira_discente1`
    FOREIGN KEY (`discente_matricula` )
    REFERENCES `mydb`.`discente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_ira_discente1` ON `mydb`.`ira` (`discente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tecnico_gestor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tecnico_gestor` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tecnico_gestor` (
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
    REFERENCES `mydb`.`pessoa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tecnico_gestor_pessoa1` ON `mydb`.`tecnico_gestor` (`pessoa_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`docente` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`docente` (
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
    REFERENCES `mydb`.`pessoa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_docente_campus1`
    FOREIGN KEY (`campus_id` )
    REFERENCES `mydb`.`campus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_docente_pessoa1` ON `mydb`.`docente` (`pessoa_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_docente_campus1` ON `mydb`.`docente` (`campus_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`email`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`email` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`email` (
  `id` INT NOT NULL ,
  `email` VARCHAR(45) NULL ,
  `discente_matricula` INT NULL ,
  `tecnico_gestor_id` INT NULL ,
  `docente_matricula` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_email_discente1`
    FOREIGN KEY (`discente_matricula` )
    REFERENCES `mydb`.`discente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_email_tecnico_gestor1`
    FOREIGN KEY (`tecnico_gestor_id` )
    REFERENCES `mydb`.`tecnico_gestor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_email_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_email_discente1` ON `mydb`.`email` (`discente_matricula` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_email_tecnico_gestor1` ON `mydb`.`email` (`tecnico_gestor_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_email_docente1` ON `mydb`.`email` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`telefone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`telefone` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`telefone` (
  `id` INT NOT NULL ,
  `telefone` VARCHAR(45) NULL ,
  `tipo` INT NULL ,
  `discente_matricula` INT NULL ,
  `tecnico_gestor_id` INT NULL ,
  `docente_matricula` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_telefone_discente1`
    FOREIGN KEY (`discente_matricula` )
    REFERENCES `mydb`.`discente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefone_tecnico_gestor1`
    FOREIGN KEY (`tecnico_gestor_id` )
    REFERENCES `mydb`.`tecnico_gestor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefone_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_telefone_discente1` ON `mydb`.`telefone` (`discente_matricula` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_telefone_tecnico_gestor1` ON `mydb`.`telefone` (`tecnico_gestor_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_telefone_docente1` ON `mydb`.`telefone` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`titulacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`titulacao` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`titulacao` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`historico_titulacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`historico_titulacao` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`historico_titulacao` (
  `data` DATE NULL ,
  `titulacao_id` INT NOT NULL ,
  `tecnico_gestor_id` INT NULL ,
  `docente_matricula` INT NULL ,
  CONSTRAINT `fk_historico_titulacao_titulacao1`
    FOREIGN KEY (`titulacao_id` )
    REFERENCES `mydb`.`titulacao` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historico_titulacao_tecnico_gestor1`
    FOREIGN KEY (`tecnico_gestor_id` )
    REFERENCES `mydb`.`tecnico_gestor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historico_titulacao_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_historico_titulacao_titulacao1` ON `mydb`.`historico_titulacao` (`titulacao_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_historico_titulacao_tecnico_gestor1` ON `mydb`.`historico_titulacao` (`tecnico_gestor_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_historico_titulacao_docente1` ON `mydb`.`historico_titulacao` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`com_inst_gestor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`com_inst_gestor` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`com_inst_gestor` (
  `id` INT NOT NULL ,
  `data_entrada` DATE NULL ,
  `data_saida` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_cig_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_cig_docente1` ON `mydb`.`com_inst_gestor` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`com_externo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`com_externo` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`com_externo` (
  `id` INT NOT NULL ,
  `data_entrada` DATE NULL ,
  `data_saida` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_com_externo_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_com_externo_docente1` ON `mydb`.`com_externo` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`situacao_proic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`situacao_proic` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`situacao_proic` (
  `id` INT NOT NULL ,
  `inadimplencia` VARCHAR(120) NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_situacao_proic_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_situacao_proic_docente1` ON `mydb`.`situacao_proic` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`bols_produtiv`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`bols_produtiv` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`bols_produtiv` (
  `id` INT NOT NULL ,
  `nivel` VARCHAR(45) NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_bols_produtiv_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_bols_produtiv_docente1` ON `mydb`.`bols_produtiv` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`qualis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`qualis` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`qualis` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `data` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_qualis_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_qualis_docente1` ON `mydb`.`qualis` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`livro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`livro` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`livro` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `editorial` VARCHAR(45) NULL ,
  `data` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_livro_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_livro_docente1` ON `mydb`.`livro` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`outras_producoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`outras_producoes` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`outras_producoes` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `tipo` INT NULL ,
  `data` DATE NULL ,
  `docente_matricula` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_outras_producoes_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_outras_producoes_docente1` ON `mydb`.`outras_producoes` (`docente_matricula` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tipo_orientacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tipo_orientacao` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tipo_orientacao` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tipo_or_x_doc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tipo_or_x_doc` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tipo_or_x_doc` (
  `data_ini` DATE NULL ,
  `data_fim` DATE NULL ,
  `tipo_orientacao_id` INT NOT NULL ,
  `docente_matricula` INT NOT NULL ,
  CONSTRAINT `fk_tipo_or_x_doc_tipo_orientacao1`
    FOREIGN KEY (`tipo_orientacao_id` )
    REFERENCES `mydb`.`tipo_orientacao` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_or_x_doc_docente1`
    FOREIGN KEY (`docente_matricula` )
    REFERENCES `mydb`.`docente` (`matricula` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tipo_or_x_doc_tipo_orientacao1` ON `mydb`.`tipo_or_x_doc` (`tipo_orientacao_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tipo_or_x_doc_docente1` ON `mydb`.`tipo_or_x_doc` (`docente_matricula` ASC) ;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
