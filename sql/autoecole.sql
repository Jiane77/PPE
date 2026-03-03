DROP DATABASE IF EXISTS autoecole;
CREATE DATABASE autoecole;
USE autoecole;

-- 1. Tables de base
CREATE TABLE candidat (
    idcandidat INT(5) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(50),
    tel VARCHAR(50),
    adresse VARCHAR(50),
    PRIMARY KEY (idcandidat)
);

CREATE TABLE moniteur (
    idmoniteur INT(5) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(50),
    tel VARCHAR(50),
    adresse VARCHAR(50),
    PRIMARY KEY (idmoniteur)
);

CREATE TABLE vehicule (
    idvehicule INT(5) NOT NULL AUTO_INCREMENT,
    marque VARCHAR(50),
    modele VARCHAR(50),
    annee INT(4),
    categorie VARCHAR(50),
    immatriculation VARCHAR(20),
    PRIMARY KEY (idvehicule)
);

-- 2. Table Utilisateur (définie avec le rôle dès le départ)
CREATE TABLE utilisateur (
    idutilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    mdp VARCHAR(255),
    role ENUM('candidat','moniteur','admin') DEFAULT 'candidat'
);

-- 3. Tables avec clés étrangères
CREATE TABLE cours (
    idcours INT(5) NOT NULL AUTO_INCREMENT,
    dateheure DATETIME,
    duree INT(5),
    idcandidat INT(5) NOT NULL,
    idmoniteur INT(5) NOT NULL,
    idvehicule INT(5) NOT NULL,
    PRIMARY KEY (idcours),
    FOREIGN KEY (idcandidat) REFERENCES candidat(idcandidat),
    FOREIGN KEY (idmoniteur) REFERENCES moniteur(idmoniteur),
    FOREIGN KEY (idvehicule) REFERENCES vehicule(idvehicule)
);


-- Admin (Rôle bien spécifié à l'insertion)
INSERT INTO utilisateur (nom, email, mdp, role)
VALUES ('Administrateur', 'admin@autoecole.com', SHA2('admin123', 256), 'admin');

-- Candidat Test
INSERT INTO utilisateur (nom, email, mdp, role)
VALUES ('Djihane Maria', 'candidat@test.com', SHA2('candidat123', 256), 'candidat');

-- Moniteur Test
INSERT INTO utilisateur (nom, email, mdp, role)
VALUES ('Moniteur Test', 'moniteur@test.com', SHA2('moniteur123', 256), 'moniteur');

-- Données métiers
INSERT INTO candidat (idcandidat, nom, prenom, email, tel, adresse)
VALUES (2, 'Haroun', 'Djihane', 'candidat@test.com', '0102030405', '123 Rue du Code');

/*ajouter des colonnes*/
mysql> ALTER TABLE utilisateur
    -> ADD COLUMN prenom VARCHAR(50) AFTER nom,
    -> ADD COLUMN tel VARCHAR(20) AFTER email,
    -> ADD COLUMN adresse VARCHAR(255) AFTER tel;

