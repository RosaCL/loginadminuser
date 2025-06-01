<?php
include("/laragon/www/conexaolocal/api/config.php");

session_start();

// Verifica se é um submit de registro
if (isset($_POST['submit']) && isset($_POST['nome'])) {
    // Lógica de registro
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']); 
    $csenha = md5($_POST['csenha']);
    $user_type = $_POST['user_type'];
    
    // ... resto do código de registro
} 
// Verifica se é um submit de login
elseif (isset($_POST['submit'])) {
    // Lógica de login
    $username = $_POST['username'];
    $senha = md5($_POST['senha']);
    
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE username = :username AND senha = :senha");
    $stmt->execute(['username' => $username, 'senha' => $senha]);
    $row = $stmt->fetch();
    
    if ($row) {
        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['nome'];
            header('Location: admin_login.php');
            exit(); 
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['nome'];
            header('Location: user_login.php');
            exit();
        }
    } else {
        $error[] = 'Username ou senha incorreta';
    }
}
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
                <h3>Login</h3>  
            <?php
                if (isset($error)) {
                    foreach ($error as $errorMessage) { 
                        echo '<span class="error_msg">' . $errorMessage . '</span>';
                    }
                }
            ?>           
                <input type="text" name="username" placeholder="Digite seu username" required>
                <input type="password" name="senha" placeholder="Digite sua senha" required>                
                <input type="submit" name="submit" value="Enviar" class="btn">
                <p>Já tem uma conta? <a href="registerform.php">Faça seu cadastro</a></p>
            </form>
        </div>


<footer class="footer">
    <a target="_blank" href="https://github.com/RosaCL"><img src="./ressources/img/costureza.png" alt=""></a>
</footer>

    <script src="./ressources/js/script.js"></script>
</body>

</html>