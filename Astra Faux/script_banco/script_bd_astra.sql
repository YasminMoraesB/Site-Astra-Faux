Create database if not exists astraFaux;

use astraFaux;

CREATE TABLE if not exists Produto (
  id int unsigned auto_increment not null,
  nome VARCHAR(40)   NULL  ,
  qtd INT(5)  NULL  ,
  descricao TEXT NULL  ,
  valor DECIMAL(6,2)  NULL  ,
  img BLOB NULL   ,
PRIMARY KEY(id));

CREATE TABLE if not exists Usuario (
  id INTEGER UNSIGNED  NOT NULL  AUTO_INCREMENT,
  nome VARCHAR(40)  NULL  ,
  senha VARCHAR(10)  NULL  ,
  data_de_nascimento DATE  NULL  ,
  email VARCHAR(40)  NULL  ,
  endereco VARCHAR(40)  NULL  ,
  complemento VARCHAR(15)  NULL  ,
  cidade VARCHAR(30)  NULL  ,
  estado VARCHAR(20)  NULL  ,
  cep VARCHAR(10)  NULL    ,
PRIMARY KEY(id));


CREATE TABLE if not exists Adm (
  username VARCHAR(5)  NOT NULL   AUTO_INCREMENT,
  senha VARCHAR(20)  NULL    ,
PRIMARY KEY(username));


CREATE TABLE if not exists Novidade (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Produto_id INTEGER UNSIGNED  NOT NULL  ,
  data_de_publicacao DATE  NULL    ,
PRIMARY KEY(id)  ,
FOREIGN KEY(Produto_id) REFERENCES Produto(id));




