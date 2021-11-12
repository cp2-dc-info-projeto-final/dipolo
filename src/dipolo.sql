CREATE DATABASE dipolotcc;

CREATE TABLE usuarios (
 cod_usuario int NOT NULL AUTO_INCREMENT, 
 nickname varchar(10) NOT NULL,
 nome varchar(100) NOT NULL,
 datanasc date NOT NULL,
 email varchar(35) NOT NULL,
 senha varchar(255) NOT NULL,
 adm char(3) NOT NULL,
 primary key(cod_usuario)
);

CREATE USER 'person'@'localhost' IDENTIFIED BY '1010';
GRANT ALL PRIVILEGES ON dipolotcc.* TO 'person'@'localhost';

ALTER TABLE 'usuarios' CHANGE 'adm' 'adm' BOOLEAN NOT NULL;
