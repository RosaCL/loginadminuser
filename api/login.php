<?php
//login
session_start();
if (isset($_POST['submit'])) {
    $name = $_POST['nome'];
    $username = $_POST['username']; // Corrigido de '$username' para 'username'
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $csenha = md5($_POST['csenha']);
    $user_type = $_POST['user_type'];

    // Usando prepared statement para SELECT
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE username = :username AND senha = :senha");
    $stmt->execute(['username' => $username, 'senha' => $senha]);
    $row = $stmt->fetch(); // Pega a primeira linha de resultado

    if ($row) { // Se uma linha foi encontrada
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