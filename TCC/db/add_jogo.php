<?php
    require_once '../connection/connection.php';

    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql_codigo = "INSERT INTO produtos (nome, marca, preco, quantidade) VALUES ('$nome', '$marca', '$preco', '$quantidade')";

    $resultado = $mysqli->query($sql_codigo);
    var_dump($resultado);
    if ($resultado === TRUE){
        header('location: ../telas/jogos/jogos_painel.php');
    } 
    

?>
