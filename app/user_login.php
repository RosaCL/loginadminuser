<?php
include("/laragon/www/conexaolocal/api/config.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexão Local</title>
    <link rel="stylesheet" href="./ressources/css/style.css">    
    <link rel="stylesheet" href="./ressources/css/cadastro.css">
    <link rel="stylesheet" href="./ressources/css/useradmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div class="container">
    <div class="content">
        <h3>Olá, <span>username</span></h3>
        <h1>Bem Vindo <span></span></h1>
        <p>Está é a página do usuário</p>
        <a href="index.php" class="btn">Login</a>
        <a href="cadastro.php" class="btn">Cadastro</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</div>

<footer class="footer">
    <a target="_blank" href="https://github.com/RosaCL"><img src="./ressources/img/costureza.png" alt=""></a>
</footer>

    <script src="./ressources/js/script.js"></script>
</body>

</html>