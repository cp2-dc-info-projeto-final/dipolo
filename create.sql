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
 caminho_img varchar(256),
 primary key(cod_usuario)
);

INSERT INTO `usuarios` (`cod_usuario`, `nickname`, `nome`, `datanasc`, `email`, `senha`, `adm`) VALUES
(1, 'testadm', 'Usuário Admin', '2021-11-29', 'email@example.com', '$2y$10$hDGwTyvP.tJGbShpjv4KyOEyIqlq3ERpuDbWZ94Qmfv2QgtAKU2PS', 1),
(2, 'test1', 'Usuário Comum', '2021-11-29', 'email@example.com', '$2y$10$5QotISSBV9FxJjH2bHlFLO9Z1C0S2UUKLurv3z53uN7hdMghUm7Ee', 0),
(3, 'test2', 'Usuário Comum II', '2021-11-29', 'email@example.com', '$2y$10$j00Rut4fH7MDoyYU.oELIe6zXNeSelpgjBaz8eowSm1LJU1MKg9HO', 0),
(4, 'test3', 'Usuário Comum III', '2021-11-29', 'email@example.com', '$2y$10$WAOVO2Lb6XcFQQFH4HqUWO6WyODkJewKEv44KoOgYbpJXcnr5tNfO', 0);

CREATE TABLE postagens (
 cod_postagem int NOT NULL AUTO_INCREMENT,
 texto_post varchar(350) NOT NULL,
 cod_usuario int NOT NULL,
 primary key(cod_postagem),
 foreign key (cod_usuario) references usuarios (cod_usuario)
);

INSERT INTO `postagens` (`cod_postagem`, `texto_post`, `cod_usuario`) VALUES 
(1, 'Piscina é melhor do que praia porque não entra areia na roupa.\r\n', 1),
(2, 'Nescau é melhor que Toddy porque dissolve melhor e fica mais forte com menos quantidade de pó. ', 2);

CREATE TABLE comentarios (
 cod_comentario int NOT NULL AUTO_INCREMENT,
 texto_coment varchar(350) NOT NULL,
 cod_usuario int NOT NULL,
 cod_postagem int NOT NULL,
 primary key(cod_comentario),
 foreign key (cod_usuario) references usuarios (cod_usuario),
 foreign key (cod_postagem) references postagens (cod_postagem)
);

INSERT INTO `comentarios` (`cod_comentario`, `texto_coment`, `cod_usuario`, `cod_postagem`) VALUES 
(1, 'Você está olhando pelo lado errado. Dá pra fazer castelos e esculturas de areia; por isso, praia é melhor do que piscina.', 2, 1), 
(2, 'O melhor mesmo é cachoeira, onde se tem mais contato com a natureza.', 3, 1);

CREATE TABLE timeline (
 cod_usuario int NOT NULL,
 cod_postagem int NOT NULL,
 primary key(cod_usuario, cod_postagem),
 foreign key (cod_usuario) references usuarios (cod_usuario),
 foreign key (cod_postagem) references postagens (cod_postagem)
);

INSERT INTO `timeline` (`cod_usuario`, `cod_postagem`) VALUES 
(1, 1), (2, 2);

CREATE TABLE curtidas_postagens (
 cod_curtida_postagem int NOT NULL AUTO_INCREMENT,
 cod_usuario int NOT NULL,
 cod_postagem int NOT NULL,
 primary key (cod_curtida_postagem),
 foreign key (cod_usuario) references usuarios (cod_usuario),
 foreign key (cod_postagem) references postagens (cod_postagem)
);

INSERT INTO `curtidas_postagens` (`cod_curtida_postagem`, `cod_usuario`, `cod_postagem`) VALUES 
(1, 1, 2), (2, 2, 1), (3, 3, 1), (4, 3, 1), (5, 4, 2), (6, 1, 1), (7, 2, 2);

CREATE TABLE curtidas_comentarios (
 cod_curtida_comentario int NOT NULL AUTO_INCREMENT,
 cod_usuario int NOT NULL,
 cod_comentario int NOT NULL,
 primary key (cod_curtida_comentario),
 foreign key (cod_usuario) references usuarios (cod_usuario),
 foreign key (cod_comentario) references comentarios (cod_comentario)
);

INSERT INTO `curtidas_comentarios` (`cod_curtida_comentario`, `cod_usuario`, `cod_comentario`) VALUES 
(1, 1, 1), (2, 1, 2), (3, 2, 1), (4, 2, 2), (5, 3, 2), (6, 4, 1);