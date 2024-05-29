-- MySQL Script generated by MySQL Workbench
-- Mon May 27 21:51:33 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema projetCnam
-- -----------------------------------------------------

-- Création du schéma
CREATE SCHEMA IF NOT EXISTS `projetCnam` DEFAULT CHARACTER SET utf8;
USE `projetCnam`;

-- Table Utilisateur
CREATE TABLE IF NOT EXISTS `Utilisateur` (
    `Id_ARA` VARCHAR(50) NOT NULL,
    `Nom` VARCHAR(50),
    `Prenom` VARCHAR(50),
    `Ville` VARCHAR(50),
    `Code_Postal` INT,
    `Ecole` VARCHAR(50),
    `Etude` VARCHAR(50),
    `Mail` VARCHAR(100) NOT NULL UNIQUE,
    `MDP` VARCHAR(255) NOT NULL,
    `Identifiant` VARCHAR(50) UNIQUE,
    `Type_user` BIT,
    `Mdp_oublie` BIT,
    `Vehicule` VARCHAR(50),
    PRIMARY KEY (`Id_ARA`),
    UNIQUE INDEX `Mail_UNIQUE` (`Mail` ASC),
    UNIQUE INDEX `id_ARA_UNIQUE` (`Id_ARA` ASC)
) ENGINE = InnoDB;

-- Table Publication
CREATE TABLE IF NOT EXISTS `Publication` (
    `id_Publication` INT AUTO_INCREMENT,
    `Id_ARA` VARCHAR(50) NOT NULL,
    `Intitule` VARCHAR(100) NOT NULL,
    `Place` INT NOT NULL,
    `date_depart` DATETIME NOT NULL,
    `date_arrive` DATETIME NOT NULL,
    `Lieu_depart` VARCHAR(100) NOT NULL,
    `Lieu_arrive` VARCHAR(100) NOT NULL,
    `Nb_place_reserver` INT DEFAULT 0,
    `date_Publication` DATETIME NOT NULL,
    `Plein` BIT NOT NULL,
    PRIMARY KEY (`id_Publication`),
    FOREIGN KEY (`Id_ARA`) REFERENCES `Utilisateur`(`Id_ARA`)
) ENGINE = InnoDB;

-- Table Reservation
CREATE TABLE IF NOT EXISTS `Reservation` (
    `id_reservation` INT AUTO_INCREMENT,
    `id_publication` INT NOT NULL,
    `Id_ARA` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id_reservation`),
    FOREIGN KEY (`Id_ARA`) REFERENCES `Utilisateur`(`Id_ARA`),
    FOREIGN KEY (`id_publication`) REFERENCES `Publication`(`id_Publication`)
) ENGINE = InnoDB;

-- Table Message
CREATE TABLE IF NOT EXISTS `Message` (
    `id_msg` INT AUTO_INCREMENT,
    `Id_Ara_Envoyeur` VARCHAR(50) NOT NULL,
    `Id_Ara_Destinataire` VARCHAR(50) NOT NULL,
    `Message` TEXT NOT NULL,
    `heure_message` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_msg`),
    FOREIGN KEY (`Id_Ara_Envoyeur`) REFERENCES `Utilisateur`(`Id_ARA`),
    FOREIGN KEY (`Id_Ara_Destinataire`) REFERENCES `Utilisateur`(`Id_ARA`)
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;