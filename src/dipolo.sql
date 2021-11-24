DROP DATABASE IF EXISTS dipolotcc;
DROP USER IF EXISTS 'dipolo'@'localhost';

CREATE DATABASE dipolotcc;

USE dipolotcc;

CREATE TABLE usuarios (
 cod_usuario int NOT NULL AUTO_INCREMENT, 
 nickname varchar(10) NOT NULL,
 nome varchar(100) NOT NULL,
 datanasc date NOT NULL,
 email varchar(35) NOT NULL,
 senha varchar(255) NOT NULL,
 adm boolean NOT NULL,
 primary key(cod_usuario)
);

CREATE USER 'dipolo'@'localhost' IDENTIFIED BY '1010';
GRANT ALL PRIVILEGES ON dipolotcc.* TO 'dipolo'@'localhost';
