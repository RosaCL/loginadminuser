<?php
include('/laragon/www/conexaolocal/api/config.php');

// Cria tabela usuario
$pdo->exec("CREATE TABLE IF NOT EXISTS usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    username VARCHAR(250) UNIQUE NOT NULL,
    email VARCHAR(250) UNIQUE NOT NULL,
    senha VARCHAR(250) NOT NULL
)");



// Cria tabela organizador 
$pdo->exec("CREATE TABLE IF NOT EXISTS organizador (
    id_org INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    nome_org VARCHAR(250) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)  ON DELETE CASCADE
)");

// Cria tabela evento 
$pdo->exec("CREATE TABLE IF NOT EXISTS evento (
    id_evt INT PRIMARY KEY AUTO_INCREMENT,
    id_org INT NOT NULL,
    nome_evt VARCHAR(250) NOT NULL,
    descricao VARCHAR(250) NOT NULL,
    start_date_event DATETIME NOT NULL,
    end_date DATETIME,
    local_evento VARCHAR(255),
    endereco VARCHAR(255),
    cidade VARCHAR(100),
    preco DECIMAL(10,2) DEFAULT 0.00,
    status_evento ENUM('Ativo', 'Cancelado', 'Encerrado') DEFAULT 'Ativo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_org) REFERENCES organizador(id_org)  ON DELETE CASCADE
)");

// Cria tabela interacao 
$pdo->exec("CREATE TABLE IF NOT EXISTS interacao (
    id_interacao INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_evt INT NOT NULL,
    tipo ENUM('like', 'subscribe', 'favorite') NOT NULL,
    UNIQUE ( id_usuario, id_evt, tipo),
    FOREIGN KEY ( id_usuario) REFERENCES usuario( id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_evt) REFERENCES evento(id_evt) ON DELETE CASCADE
)");

// Cria tabela comentario
$pdo->exec("CREATE TABLE IF NOT EXISTS comentario (
    id_cmt INT PRIMARY KEY AUTO_INCREMENT,
    comentario VARCHAR(250) NOT NULL,
    id_usuario INT NOT NULL,
    id_evt INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),    
    FOREIGN KEY (id_evt) REFERENCES evento(id_evt)
)");
?>
