<?php
    include('../connection/connection.php');
        session_start();
        
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql_codigo = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$pass')";

        if ($mysqli->query($sql_codigo) === TRUE){
            $_SESSION['nome'] = $nome;
            header('Location: painel.php?cadastrado=sim');
        }
        else {
            echo 'Erro ao atualizar, sadness' . $mysqli->error;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastrar Cliente</h1>
    <form action="" method="post">
        <input type="hidden" name="id">
        <label>Nome</label>
        <input type="text" name="nome" required>
        <label>Email</label>
        <input type="text" name="email" required>
        <label>Senha</label>
        <input type="number" name="pass" required>
        <input type="submit" value="cadastrar">
    </form>
    <a href="login.php">Voltar</a>
</body>
</html>