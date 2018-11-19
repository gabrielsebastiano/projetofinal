/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Gabriel
 * Created: 26/10/2018
 */

CREATE TABLE usuario(
	idUsuario int AUTO_INCREMENT NOT null,
    nome varchar(255),
    email varchar(255),
    login varchar(255),
    senha varchar(255),
    datanascimento DATE,
    PRIMARY KEY(idUsuario)
)
CREATE TABLE tipo(
	idTipo int AUTO_INCREMENT NOT NULL,
    nome varchar(255),
    descricao varchar(255),
    PRIMARY KEY (idTipo)
)
CREATE TABLE torrent(
	idTorrent int AUTO_INCREMENT NOT NULL,
    nomeArquivo varchar(255),
    tamanho varchar(255),
    dataInsercao DATE,
    tipo int,
    seeds int,
    PRIMARY KEY (idTorrent),
    FOREIGN KEY (tipo) REFERENCES tipo(idTipo)
)