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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-info " >
    <form action="" method="post" class="row justify-content-center">
        <h1 >Cadastrar Cliente</h1>
        <input type="hidden" name="id">
        <label>Nome</label>
        <input type="text" name="nome" required>
        <label>Email</label>
        <input type="text" name="email" required>
        <label>Senha</label>
        <input type="number" name="pass" required>
        <input type="submit" value="cadastrar" class="btn btn-success">
        <a href="login.php" class="btn btn-danger">Voltar</a>
    </form>
</body>
</html>