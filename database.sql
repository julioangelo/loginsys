CREATE DATABASE if NOT EXISTS filmesdb;

use filmesdb;

CREATE TABLE if NOT EXISTS usuarios (
    id INT(11) NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(30) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    criado DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY(id)
);

