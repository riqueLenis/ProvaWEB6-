CREATE DATABASE api_db;

USE api_db;

CREATE TABLE IF NOT EXISTS cadastro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    telefone VARCHAR(255),
    email VARCHAR(255) NOT NULL
);