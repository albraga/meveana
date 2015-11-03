/*
DROP DATABASE IF EXISTS u386344985_mevea;
CREATE DATABASE IF NOT EXISTS u386344985_mevea;
USE u386344985_mevea; 
*/
CREATE TABLE terceirizada (
nome VARCHAR(50) NOT NULL,
cnpj VARCHAR(18) NULL,
endereco VARCHAR(255) NULL,
telefone VARCHAR(20) NULL,
email VARCHAR(20) NULL,
PRIMARY KEY (nome)
);
CREATE TABLE entregador (
nome VARCHAR(50) NOT NULL,
tercei_nome VARCHAR(50) NOT NULL,
cpf VARCHAR(18) NULL,
rg VARCHAR(18) NULL,
celular VARCHAR(20) NULL,
PRIMARY KEY (nome),
FOREIGN KEY (tercei_nome) REFERENCES terceirizada(nome)
);
CREATE TABLE situacao (
status VARCHAR(30) NOT NULL,
PRIMARY KEY (status)
);
CREATE TABLE produto (
desc_tam VARCHAR(255) NOT NULL,
preco DECIMAL(6,2),
PRIMARY KEY (desc_tam)
);
CREATE TABLE cliente (
nome VARCHAR(50) NOT NULL,
tel VARCHAR(20) NOT NULL,
endereco VARCHAR(255) NOT NULL,
pontoref VARCHAR(255) NULL,
datanasc DATE NULL,
PRIMARY KEY (nome, tel)
);

CREATE TABLE pedido (
codigo INT NOT NULL AUTO_INCREMENT,
cliente_nome VARCHAR(50) NOT NULL,
cliente_tel VARCHAR(20) NOT NULL,
entregador VARCHAR(50) NULL,
situacao_status VARCHAR(30) NOT NULL,
PRIMARY KEY (codigo),
FOREIGN KEY (cliente_nome, cliente_tel) REFERENCES cliente(nome, tel),
FOREIGN KEY (entregador) REFERENCES entregador(nome),
FOREIGN KEY (situacao_status) REFERENCES situacao(status)
);

CREATE TABLE pedido_produto (
     id INT NOT NULL AUTO_INCREMENT,  
     pedido_codigo INT NOT NULL,
     produto_desc_tam VARCHAR(255) NOT NULL,
     PRIMARY KEY (id),
     FOREIGN KEY (pedido_codigo) REFERENCES pedido(codigo),
     FOREIGN KEY (produto_desc_tam) REFERENCES produto(desc_tam)
);

INSERT INTO situacao VALUES('PENDENTE');
INSERT INTO situacao VALUES('EM TRaNSITO');
INSERT INTO situacao VALUES('ENTREGUE');
INSERT INTO situacao VALUES('CANCELADO');
INSERT INTO terceirizada VALUES('Outsourcing LTDA','777','rua tal','9989','out@out.com');
INSERT INTO entregador VALUES('Fulano de Tal','Outsourcing LTDA','240','341','9959');
INSERT INTO cliente VALUES('Fulano','9999-2222','rua','nenhum','1979-04-30');
INSERT INTO cliente VALUES('Sicrano','8888-1111','avenida','nada','1948-12-15');
INSERT INTO cliente VALUES('Beltrano','6666-3333','travessa','---','1983-01-02');
INSERT INTO produto VALUES('PIZZA PORTUGUESA PEQUENA', 10.00);
INSERT INTO produto VALUES('PIZZA PORTUGUESA GRANDE', 20.00);
INSERT INTO produto VALUES('COCA-COLA LITRO', 5.00);
