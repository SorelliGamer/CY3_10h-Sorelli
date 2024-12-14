<?php
    require_once '../connection/connection.php';
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql_codigo = "UPDATE produtos SET nome='$nome', marca='$marca', preco='$preco', quantidade='$quantidade'  WHERE id='$id'";

    $resultado = $mysqli->query($sql_codigo);

    if ($resultado === TRUE){
        header('location: ../telas/jogos/jogos_painel.php');
    }
    else {
        header('location: ../telas/jogos/jogos_painel.php?erro');
    }

?>