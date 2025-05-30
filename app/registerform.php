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
        <div class="form-container">
            <form action="" method="post">
                <h3>Cadastre-se agora</h3>
                <input type="text" name="nome" placeholder="Digite seu nome completo" required>
                <input type="email" name="email" placeholder="Digite seu e-mail" required>
                <input type="text" name="username" placeholder="Digite seu username" required>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
                <input type="cpassword" name="senha" placeholder="Confirme sua senha" required>
                <select name="user-type" id="">
                    <option value="user">USER</option>
                    <option value="admin">ADMIN</option>
                </select>
                <input type="submit" name="submit" value="Cadastre agora" class="btn">
                <p>Já tem uma conta? <a href="login.php">Faça seu login</a></p>
            </form>
        </div>


<footer class="footer">
    <a target="_blank" href="https://github.com/RosaCL"><img src="./ressources/img/costureza.png" alt=""></a>
</footer>

    <script src="./ressources/js/script.js"></script>
</body>

</html>