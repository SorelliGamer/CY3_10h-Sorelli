<?php

    require_once '../connectio/conn.php'

    $id = $_GET['id'];
    $sql_codigo = "DELETE FROM fornecedores WhErE id='$id'";


    if ($mysqli->query($sql_codigo) === TRUE){
        header('location: ../screen/fornecedores/fornecedores_painel.php');
    }
    
?>