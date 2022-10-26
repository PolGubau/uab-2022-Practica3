
--initialize database 
CREATE DATABASE IF NOT EXISTS `cv` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


-- Create a table for USERS:
CREATE TABLE usuaris (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(300) NOT NULL,
    email VARCHAR(50),
    nom VARCHAR(30),
    cognoms VARCHAR(30),
    dataNaixement DATE,
    sexe VARCHAR(1),
    rol VARCHAR(30),
    estatCivil VARCHAR(30),
    carnetConduir VARCHAR(30),
    codiPostal VARCHAR(30),
    poblacio VARCHAR(30),
    provincia VARCHAR(30),
    pais VARCHAR(30),
    carrer VARCHAR(30),
    numero VARCHAR(30),
    dataCreacio TIMESTAMP
);

-- One user can have many telephones, we will create a table for telephones:
CREATE TABLE telefons (
    telefonId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    telefonNumero VARCHAR(30) NOT NULL,
    telefonTipus VARCHAR(30) NOT NULL,
    userID INT(6) UNSIGNED NOT NULL,
    dataCreacio TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);
-- One user can have many emails, we will create a table for emails:
CREATE TABLE emails (
    emailId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(30) NOT NULL,
    emailTipus VARCHAR(30) NOT NULL,
    userID INT(6) UNSIGNED NOT NULL,
    dataCreacio TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);


-- Create a table for HABILITIES:

CREATE TABLE IF NOT EXISTS habilitats (
    habilitatId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habilitatValor VARCHAR(50) NOT NULL,
    habilitatNivell INT NOT NULL,
    userID INT NOT NULL,,
    PRIMARY KEY (habilitatId),
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);

-- Create a table for languages:

CREATE TABLE IF NOT EXISTS idiomes (
    idiomaId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idiomaNom VARCHAR(50) NOT NULL,
    idiomaNivell INT NOT NULL,
    userID INT NOT NULL,
    PRIMARY KEY (idiomaId),
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);

-- Create a table for informatics:

CREATE TABLE IF NOT EXISTS informatica (
    informaticaId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    informaticaNom VARCHAR(50) NOT NULL,
    informaticaNivell INT NOT NULL,
    userID INT NOT NULL,
    PRIMARY KEY (informaticaId),
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);


-- Create a table for working experience:
CREATE TABLE IF NOT EXISTS experiencies (
    experienciaId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    experienciaDataInici VARCHAR(50) NOT NULL,
    experienciaDataFi VARCHAR(50) NOT NULL,
    experienciaTitol VARCHAR(50) NOT NULL,
    experienciaEmpresa VARCHAR(50) NOT NULL,
    experienciaUbicacio VARCHAR(50) NOT NULL,
    experienciaDescripcio VARCHAR(500) NOT NULL,
    userID INT NOT NULL,
    PRIMARY KEY (experienciaId),
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);

-- Create a table for working studies:
CREATE TABLE IF NOT EXISTS estudis (
    estudiId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    estudiDataInici VARCHAR(50) NOT NULL,
    estudiDataFi VARCHAR(50) NOT NULL,
    estudiTitol VARCHAR(50) NOT NULL,
    estudiEmpresa VARCHAR(50) NOT NULL,
    estudiUbicacio VARCHAR(50) NOT NULL,
    estudiDescripcio VARCHAR(500) NOT NULL,
    userID INT NOT NULL,
    PRIMARY KEY (estudiId),
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);

-- Create a table for working courses:
CREATE TABLE IF NOT EXISTS cursos (
    cursId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cursDataInici VARCHAR(50) NOT NULL,
    cursDataFi VARCHAR(50) NOT NULL,
    cursTitol VARCHAR(50) NOT NULL,
    cursEmpresa VARCHAR(50) NOT NULL,
    cursUbicacio VARCHAR(50) NOT NULL,
    cursDescripcio VARCHAR(500) NOT NULL,
    userID INT NOT NULL,
    PRIMARY KEY (cursId),
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);

-- Create a table for working projects:
CREATE TABLE IF NOT EXISTS projectes (
    projecteId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    projecteDataInici VARCHAR(50) NOT NULL,
    projecteDataFi VARCHAR(50) NOT NULL,
    projecteTitol VARCHAR(50) NOT NULL,
    projecteEmpresa VARCHAR(50) NOT NULL,
    projecteUbicacio VARCHAR(50) NOT NULL,
    projecteDescripcio VARCHAR(500) NOT NULL,
    userID INT NOT NULL,
    PRIMARY KEY (projecteId),
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);

-- Create a table for working interests:
CREATE TABLE IF NOT EXISTS interessos (
    interesId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    interesNom VARCHAR(50) NOT NULL,
    interesDescripcio VARCHAR(500) NOT NULL,
    userID INT NOT NULL,
    PRIMARY KEY (interesId),
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);



-- Creating a table for the Cv, a cv will have all or a part of the information of the user, in a cv can exist many emails, telephones, etc.:
CREATE TABLE IF NOT EXISTS cvs (
    cvId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvNom VARCHAR(50) NOT NULL,
    cvPerfil VARCHAR(500) NOT NULL,
    cvDataCreacio VARCHAR(50) NOT NULL,
    cvDataModificacio VARCHAR(50) NOT NULL,
    userID INT NOT NULL,
    PRIMARY KEY (cvId),
    FOREIGN KEY (userID) REFERENCES usuaris(id)
);
-- When we create a CV, we will assign some information from the user (its emails, telephones, etc.) to the CV:
CREATE TABLE IF NOT EXISTS cvTelefons (
    cvTelefonId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvTelefon VARCHAR(30) NOT NULL,
    cvTelefonTipus VARCHAR(30) NOT NULL,
    cvId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (cvId) REFERENCES cvs(cvId)
);
CREATE TABLE IF NOT EXISTS cvEmails (
    cvEmailId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvEmail VARCHAR(50) NOT NULL,
    cvEmailTipus VARCHAR(30) NOT NULL,
    cvId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (cvId) REFERENCES cvs(cvId)
);
CREATE TABLE IF NOT EXISTS cvIdiomes (
    cvIdiomaId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvIdiomaNom VARCHAR(50) NOT NULL,
    cvIdiomaNivell INT NOT NULL,
    cvId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (cvId) REFERENCES cvs(cvId)
);
CREATE TABLE IF NOT EXISTS cvInformatica (
    cvInformaticaId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvInformaticaNom VARCHAR(50) NOT NULL,
    cvInformaticaNivell INT NOT NULL,
    cvId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (cvId) REFERENCES cvs(cvId)
);
CREATE TABLE IF NOT EXISTS cvExperiencies (
    cvExperienciaId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvExperienciaDataInici VARCHAR(50) NOT NULL,
    cvExperienciaDataFi VARCHAR(50) NOT NULL,
    cvExperienciaTitol VARCHAR(50) NOT NULL,
    cvExperienciaEmpresa VARCHAR(50) NOT NULL,
    cvExperienciaUbicacio VARCHAR(50) NOT NULL,
    cvExperienciaDescripcio VARCHAR(500) NOT NULL,
    cvId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (cvId) REFERENCES cvs(cvId)
);
CREATE TABLE IF NOT EXISTS cvEstudis (
    cvEstudiId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvEstudiDataInici VARCHAR(50) NOT NULL,
    cvEstudiDataFi VARCHAR(50) NOT NULL,
    cvEstudiTitol VARCHAR(50) NOT NULL,
    cvEstudiEmpresa VARCHAR(50) NOT NULL,
    cvEstudiUbicacio VARCHAR(50) NOT NULL,
    cvEstudiDescripcio VARCHAR(500) NOT NULL,
    cvId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (cvId) REFERENCES cvs(cvId)
);
CREATE TABLE IF NOT EXISTS cvProjectes (
    cvProjecteId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvProjecteDataInici VARCHAR(50) NOT NULL,
    cvProjecteDataFi VARCHAR(50) NOT NULL,
    cvProjecteTitol VARCHAR(50) NOT NULL,
    cvProjecteEmpresa VARCHAR(50) NOT NULL,
    cvProjecteUbicacio VARCHAR(50) NOT NULL,
    cvProjecteDescripcio VARCHAR(500) NOT NULL,
    cvId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (cvId) REFERENCES cvs(cvId)
);
CREATE TABLE IF NOT EXISTS cvInteressos (
    cvInteresId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvInteresNom VARCHAR(50) NOT NULL,
    cvInteresDescripcio VARCHAR(500) NOT NULL,
    cvId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (cvId) REFERENCES cvs(cvId)
);


-- Creating a view to show ALL the information of the user filtering by the user id :
-- WE WILL RECEIVE THE USER ID AND WE WILL SHOW ALL THE INFORMATION OF THE USER:
CREATE VIEW usuarisView AS
SELECT * FROM usuaris
INNER JOIN telefons ON usuaris.id = telefons.userID
INNER JOIN emails ON usuaris.id = emails.userID
INNER JOIN habilitats ON usuaris.id = habilitats.userID
INNER JOIN idiomes ON usuaris.id = idiomes.userID
INNER JOIN informatica ON usuaris.id = informatica.userID
INNER JOIN experiencies ON usuaris.id = experiencies.userID
INNER JOIN estudis ON usuaris.id = estudis.userID
INNER JOIN cursos ON usuaris.id = cursos.userID
INNER JOIN projectes ON usuaris.id = projectes.userID
INNER JOIN interessos ON usuaris.id = interessos.userID
INNER JOIN cvs ON usuaris.id = cvs.userID;
WHERE usuaris.id = 1;



-- CREATE VIEW usuarisView AS
-- SELECT * FROM usuaris
-- INNER JOIN telefons ON usuaris.id = telefons.userID
-- INNER JOIN emails ON usuaris.id = emails.userID
-- INNER JOIN habilitats ON usuaris.id = habilitats.userID
-- INNER JOIN idiomes ON usuaris.id = idiomes.userID
-- INNER JOIN informatica ON usuaris.id = informatica.userID
-- INNER JOIN experiencies ON usuaris.id = experiencies.userID
-- INNER JOIN estudis ON usuaris.id = estudis.userID
-- INNER JOIN cursos ON usuaris.id = cursos.userID
-- INNER JOIN projectes ON usuaris.id = projectes.userID
-- INNER JOIN interessos ON usuaris.id = interessos.userID
-- WHERE usuaris.id = 1; 
-- ;

 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(300) NOT NULL,
    email VARCHAR(50),
    nom VARCHAR(30),
    cognoms VARCHAR(30),
    dataNaixement DATE,
    sexe VARCHAR(1),
    rol VARCHAR(30),
    estatCivil VARCHAR(30),
    carnetConduir VARCHAR(30),
    codiPostal VARCHAR(30),
    poblacio VARCHAR(30),
    provincia VARCHAR(30),
    pais VARCHAR(30),
    carrer VARCHAR(30),
    numero VARCHAR(30),
    dataCreacio TIMESTAMP


