DROP DATABASE IF EXISTS dipolotcc;
DROP USER IF EXISTS 'dipolo'@'localhost';

CREATE DATABASE dipolotcc;
CREATE USER 'dipolo'@'localhost' IDENTIFIED BY '1010';
GRANT ALL PRIVILEGES ON dipolotcc.* TO 'dipolo'@'localhost';

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

INSERT INTO `usuarios` (`cod_usuario`, `nickname`, `nome`, `datanasc`, `email`, `senha`, `adm`) 
VALUES (NULL, 'MainADM', 'Administrador Principal', '2021-11-11', 'adm.principal@gmail.com', 
'$2y$10$ekt1zZWnWT3XG4HDTzdlUuZIcxgnKvr3OiZZ0e76HORSSBc5dWtZi', '1');

