<?php
include('../conexoes/conexao_loja.php');

    $nome = $_POST['pesquisa'];

    //QUERY
    $sql_codigo = "SELECT p.nome, p.marca, quantidade,(p.preco *quantidade) AS valor_venda FROM `vendas` JOIN produtos p ON p.id = vendas.produto_id WHERE p.nome LIKE '%$nome%'";

    $sql_query = $mysqli->query($sql_codigo);
    if ($sql_query->num_rows >= 1){
        $infos = $sql_query->fetch_all();
        session_start();
        $_SESSION['Itens'] = $infos;
        header('Location: index.php?ok');
    }
    else {
        header('location: index.php?vazio');
    }


?>