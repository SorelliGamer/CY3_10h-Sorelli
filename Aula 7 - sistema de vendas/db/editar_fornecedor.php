<?php
    require_once '../connection/conn.php';
    $id = $_POST['id'];
    $name = $_POST['nome'];
    $cidade = $_POST['cidade'];

    $sql_codigo = "UPDATE fornecedores SET nome='$name', cidade='$cidade' WHERE id='$id'";

    $resultado = $mysqli->query($sql_codigo);

    if ($resultado === TRUE){
        header('location: ../screens/fornecedores/fornecedores_painel.php');
    }
    else {
        header('location: ../screens/fornecedores/fornecedores_painel.php?erro');
    }

?>