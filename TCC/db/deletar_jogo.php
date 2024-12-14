<?php

    require_once '../connection/connection.php';

    $id = $_GET['id'];
    $sql_codigo = "DELETE FROM produtos WHERE id='$id'";


    if ($mysqli->query($sql_codigo) === TRUE){
        header('location: ../telas/jogos/jogos_painel.php');
    }
    
?>