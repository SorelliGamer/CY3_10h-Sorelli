<?php 
    include('../conexoes/conexao_loja.php');
    
 $sql_codigo = "SELECT p.nome, p.marca, quantidade,(p.preco *quantidade) AS valor_venda FROM `vendas` JOIN produtos p ON p.id = vendas.produto_id ORDER BY valor_venda DESC LIMIT 3";


    $sql_query = $mysqli->query($sql_codigo);
    
    $infos = $sql_query->fetch_all();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top vendas</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>TOP vendas</h1>
    <main class="container-principal">
        <div class="container-titulo">
            <div>
                Nome:
            </div>
            <div>
                Marca:
            </div>
            <div>
                Quantidade:
            </div>
            <div>
                Preço:
            </div>
        </div>
    <?php
    foreach ($infos as $linha){
        $nome = $linha[0];
        $marca = $linha[1];
        $quantidade = $linha[2];
        $valor = $linha[3];

    echo '<div class="container">';
    echo '<div>'.$nome.'</div>';
    echo '<div>'.$marca.'</div>';
    echo '<div>'.$quantidade.'</div>';
    echo '<div>'.$valor.'</div>';
    echo '</div>';

    
    }
    ?>
</body>
</html>