CREATE DATABASE db_nasa;

USE db_nasa;


CREATE TABLE tb_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(255) NOT  NULL,
    dt_nascimento DATE NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    sexo CHAR(1),
    email VARCHAR(255), 
    senha VARCHAR(32),
    info INT,
    online INT,
    dt_cadastro DATETIME DEFAULT NOW()

);

CREATE TABLE tb_bombeiros ( 
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
);

CREATE TABLE tb_voluntario ( 
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_bombeiro INT, 
);

-- Tabela para verificar Skills de cada Usuario
CREATE TABLE tb_skills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_skill VARCHAR(255),
    nivel INT,
    aprovado INT,
    id_usuario INT
)

CREATE TABLE tb_questions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    questao VARCHAR(255),

) 

CREATE TABLE tb_phone (
    id INT PRIMARY KEY AUTO_INCREMENT,
    dd INT NOT NULL,
    telefone VARCHAR(10) NOT NULL,
    tipo_telefone INT NOT NULL, 
    id_usuario INT NOT NULL
);

CREATE TABLE tb_endereco (
    id INT PRIMARY KEY AUTO_INCREMENT,
    endereco VARCHAR(255) NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL,
    pais CHAR(2),
    bairro VARCHAR(255) NOT NULL,
    cep VARCHAR(20),
    numero INT NOT NULL,
    complemento VARCHAR(123)
);



CREATE TABLE tb_error(
    id INT PRIMARY KEY AUTO_INCREMENT,
    erro VARCHAR(255) NOT NULL,
    tela INT
);

INSERT INTO tb_error( erro, tela) VALUES ('Campo senha esta diferente.', 1);
INSERT INTO tb_error( erro, tela) VALUES ('Por favor, digite seus dados novamente.', 1);
INSERT INTO tb_error( erro, tela) VALUES ('Esse CPF e/ou email já estão cadastrados.', 1);

    /**
     * Erros: 
     *  1 = Suas senhas estão diferentes.
     *  2 = Por favor, digite seus dados novamente.
     *  3 = Esse CPF e/ou email já estão cadastrados.
     */

-- Tela - 1 - Register, 2 - Login
-- Tipo Informação: 1 - Sim, 0 - Não
-- Tipo voluntario 1 - Bombeiro, 2 - Voluntario, 3 - Usuario
-- Tipo Telefone 1 - Residencial, 2 - Celular, 3 - Coorporativo
-- Sexo F - Feminino, M - Masculino, N - Não informado
-- online: 1 - Online, 0 - Offline
-- info: Quer ser informado sim ou não
-- Nivel: 1 - Basico, 2 - Intermediario, 3 - Avançado, 4 - Especialista
-- aprovado: 1 - Sim, 0 - Não
-- Id_bombeiro - Verificar bombeiro responsavel pelo Voluntario