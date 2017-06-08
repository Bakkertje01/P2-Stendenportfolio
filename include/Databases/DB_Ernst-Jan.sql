-- MySQL Script generated by MySQL Workbench
-- Thu Jun  8 12:16:14 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`User_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`User_type` (
  `Type_ID` INT UNSIGNED NOT NULL,
  `Docent` VARCHAR(45) NULL,
  `SLB` VARCHAR(45) NULL,
  `Gast` VARCHAR(45) NULL,
  `Student` VARCHAR(45) NULL,
  `Admin` VARCHAR(45) NULL,
  PRIMARY KEY (`Type_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Gebruiker`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Gebruiker` (
  `Gebruiker_ID` INT NOT NULL AUTO_INCREMENT,
  `Voornaam` VARCHAR(45) NOT NULL,
  `Achternaam` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Wachtwoord` VARCHAR(45) NOT NULL,
  `Verified` TINYINT NOT NULL,
  `User_type_Type_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Gebruiker_ID`),
  UNIQUE INDEX `Gebruiker_ID_UNIQUE` (`Gebruiker_ID` ASC),
  INDEX `fk_Gebruiker_User_type_idx` (`User_type_Type_ID` ASC),
  CONSTRAINT `fk_Gebruiker_User_type`
    FOREIGN KEY (`User_type_Type_ID`)
    REFERENCES `mydb`.`User_type` (`Type_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Bericht`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Bericht` (
  `Bericht_ID` INT NOT NULL AUTO_INCREMENT,
  `Datum_tijd` DATETIME NULL,
  `Gebruiker_Gebruiker_ID` INT NOT NULL,
  PRIMARY KEY (`Bericht_ID`),
  INDEX `fk_Bericht_Gebruiker1_idx` (`Gebruiker_Gebruiker_ID` ASC),
  CONSTRAINT `fk_Bericht_Gebruiker1`
    FOREIGN KEY (`Gebruiker_Gebruiker_ID`)
    REFERENCES `mydb`.`Gebruiker` (`Gebruiker_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;