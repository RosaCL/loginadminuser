<?php
include('/laragon/www/loginadminuser/api/config.php');

// Cria tabela usuario
$pdo->exec("CREATE TABLE IF NOT EXISTS usuario (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    username VARCHAR(250) UNIQUE NOT NULL,
    email VARCHAR(250) UNIQUE NOT NULL,
    senha VARCHAR(250) NOT NULL,
    user_type ENUM ('user', 'admin') DEFAULT 'user' 
)");



?>