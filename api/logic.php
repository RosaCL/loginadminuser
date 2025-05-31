<?php

include ("/laragon/www/loginadminuser/api/config.php");



if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']); 
    $csenha = md5($_POST['csenha']);
    $user_type = $_POST['user_type'];

    $errors = []; // Array para armazenar mensagens de erro

    // 1. Verificar se o usuário já existe
    // Usando prepared statement para segurança
    $stmt_select = $pdo->prepare("SELECT * FROM usuario WHERE username = :username OR email = :email");
    $stmt_select->bindParam(':username', $username);
    $stmt_select->bindParam(':email', $email);
    $stmt_select->execute();

    if ($stmt_select->rowCount() > 0) {
        $errors[] = "Nome de usuário ou e-mail já existe!";
    }

    // 2. Verificar se as senhas coincidem
    if ($senha !== $csenha) {
        $errors[] = "As senhas não são iguais!";
    }

    // 3. Se não houver erros, inserir o novo usuário
    if (empty($errors)) {
        // Usando prepared statement para inserção
        $stmt_insert = $pdo->prepare("INSERT INTO usuario (nome, username, email, senha, user_type) VALUES (:nome, :username, :email, :senha, :user_type)");
        $stmt_insert->bindParam(':nome', $nome);
        $stmt_insert->bindParam(':username', $username);
        $stmt_insert->bindParam(':email', $email);
        $stmt_insert->bindParam(':senha', $senha);
        $stmt_insert->bindParam(':user_type', $user_type);

        if ($stmt_insert->execute()) {
            header('Location: login.php');
            exit(); // Importante para garantir que o redirecionamento ocorra
        } else {
            $errors[] = "Erro ao registrar o usuário. Tente novamente.";
            
        }
    }

    // Se houver erros, exiba-os (ou passe para a view/template)
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
        }
    }
}

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
            exit(); // É importante usar exit() após header()
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['nome'];
            header('Location: user_login.php');
            exit(); // É importante usar exit() após header()
        }
    } else {
        $error[] = 'Username ou senha incorreta';
    }
}

?>