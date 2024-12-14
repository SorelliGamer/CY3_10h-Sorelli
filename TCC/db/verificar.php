<?php
include('../connection/connection.php');

session_start();

$email = $_POST['email'];
$senha = $_POST['pass'];

if (isset($email) && isset($senha)) {
    $sql_codigo = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    $sql_query = $mysqli->query($sql_codigo);

    $quantidade_linhas = $sql_query->num_rows;

    if ($quantidade_linhas == 1) {
        $resultado = $sql_query->fetch_assoc();

        $_SESSION['id'] = $resultado['id'];
        header('Location: ../Telas/painel.php?cadastrado=nao');
    } else {
        header('Location: ../Telas/login.php?error');
    }
}
