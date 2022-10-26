
CREATE TABLE IF NOT EXISTS usuaris (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(300) NOT NULL,
    email VARCHAR(50) NOT NULL,
    nom VARCHAR(30) NOT NULL,
    cognoms VARCHAR(30) NOT NULL,
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
CREATE TABLE IF NOT EXISTS telefons (
    telefonId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    telefonNumero VARCHAR(30) NOT NULL,
    telefonTipus VARCHAR(30) NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    dataCreacio TIMESTAMP,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);
CREATE TABLE IF NOT EXISTS emails ( emailId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, email VARCHAR(30) NOT NULL, emailTipus VARCHAR(30) NOT NULL, userId INT(6) UNSIGNED NOT NULL, dataCreacio TIMESTAMP, FOREIGN KEY (userId) REFERENCES usuaris(id) );

CREATE TABLE IF NOT EXISTS habilitats (
    habilitatId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habilitatValor VARCHAR(80) NOT NULL,
    habilitatNivell INT NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    dataCreacio TIMESTAMP,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);


CREATE TABLE IF NOT EXISTS idiomes (
    idiomaId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idiomaNom VARCHAR(50) NOT NULL,
    idiomaNivell INT NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);
CREATE TABLE IF NOT EXISTS informatica (
    informaticaId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    informaticaNom VARCHAR(50) NOT NULL,
    informaticaNivell INT NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);
CREATE TABLE IF NOT EXISTS experiencies (
    experienciaId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    experienciaDataInici VARCHAR(50) NOT NULL,
    experienciaDataFi VARCHAR(50) NOT NULL,
    experienciaTitol VARCHAR(50) NOT NULL,
    experienciaEmpresa VARCHAR(50) NOT NULL,
    experienciaUbicacio VARCHAR(50) NOT NULL,
    experienciaDescripcio VARCHAR(500) NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);
CREATE TABLE IF NOT EXISTS estudis (
    estudiId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    estudiDataInici VARCHAR(50) NOT NULL,
    estudiDataFi VARCHAR(50) NOT NULL,
    estudiTitol VARCHAR(50) NOT NULL,
    estudiEmpresa VARCHAR(50) NOT NULL,
    estudiUbicacio VARCHAR(50) NOT NULL,
    estudiDescripcio VARCHAR(500) NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);
CREATE TABLE IF NOT EXISTS cursos (
    cursId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cursDataInici VARCHAR(50) NOT NULL,
    cursDataFi VARCHAR(50) NOT NULL,
    cursTitol VARCHAR(50) NOT NULL,
    cursEmpresa VARCHAR(50) NOT NULL,
    cursUbicacio VARCHAR(50) NOT NULL,
    cursDescripcio VARCHAR(500) NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);
CREATE TABLE IF NOT EXISTS projectes (
    projecteId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    projecteDataInici VARCHAR(50) NOT NULL,
    projecteDataFi VARCHAR(50) NOT NULL,
    projecteTitol VARCHAR(50) NOT NULL,
    projecteEmpresa VARCHAR(50) NOT NULL,
    projecteUbicacio VARCHAR(50) NOT NULL,
    projecteDescripcio VARCHAR(500) NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);
CREATE TABLE IF NOT EXISTS interessos (
    interesId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    interesNom VARCHAR(50) NOT NULL,
    interesDescripcio VARCHAR(500) NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);
CREATE TABLE IF NOT EXISTS cvs (
    cvId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cvNom VARCHAR(50) NOT NULL,
    cvPerfil VARCHAR(500) NOT NULL,
    cvDataCreacio VARCHAR(50) NOT NULL,
    cvDataModificacio VARCHAR(50) NOT NULL,
    userId INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (userId) REFERENCES usuaris(id)
);
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


