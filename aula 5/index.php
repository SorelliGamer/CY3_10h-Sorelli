<?php
    include('../conexoes/conexao_estoque.php');

    $sql_codigo = 'SELECT * FROM itens';
    $resultado = $mysqli ->query($sql_codigo);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>padaria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>
        Padaria dos sonhos
    </h1>
    <main class="container">
        <table>
            <tr class="cabecalho">
                <th>nome</th>
                <th>quatidade</th>
                <th>ações</th>
            </tr>
            <?php
            if ($resultado->num_rows >= 1) {
                while($item = $resultado->fetch_assoc()){
                echo    '<tr class="infos">';
                echo    '<td>'.$item['Nome'].'</td>';
                echo    '<td>'.$item['Quantidade'].'</td>';
                echo    '<td> <a href="editar.php?id='.$item['Id'].'">Editar</a> </td>';
                echo    '<td> <a href="deletar.php?id='.$item['Id'].'">Deletar</a> </td>';
                echo '</tr>';
                }
            }    
            ?>
            <tr>
                <td class="add" colspan="4">
                <?php
                    echo '<a type="submit" class="botao_add" href="Adicionar.php">Adicionar</a>';
                    ?>
                </td>
            </tr>
        </table>
    </main>
</body>
</html>