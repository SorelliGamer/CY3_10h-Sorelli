<?php
    require_once '../../connection/connection.php';

    $sql_codigo = 'SELECT * FROM produtos';
    $resultado = $mysqli->query($sql_codigo);
    
    if ($resultado->num_rows > 0){
        $infos = $resultado->fetch_all();
    }
    else{

        $infos = [];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos</title>
</head>
<body>
    <main>
        <h1>
            Jogos
        </h1>
        <table>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>Marca</th>
                <th>preco</th>
                <th>quantidade</th>
            </tr>
            <?php
            if (count($infos) == 0){
                echo '<tr>

                    <td colspan="4">Nenhum jogo registrado</td>
                </tr>';
            }else{
                foreach($infos as $item){
                    $id = $item[0];
                    $nome = $item[1];
                    $marca = $item[2];
                    $preco = $item[3];
                    $quantidade = $item[4];
                    echo'<tr>
                            <td>'. $id .'</td>
                            <td>'. $nome .'</td>
                            <td>'. $marca .'</td>
                            <td>'. $preco .'</td>
                            <td>'. $quantidade .'</td>
                            <td><a href="formulario_editar.php?id='. $id .'">editar</a> | <a href="../../db/deletar_fornecedor.php?id='. $id .'">deletar</a></td>
                    </tr>';
                }
                }
            ?>
            <tr>
                <td colspan="4"><a href="formulario.php">+</a></td>
            </tr>
        </table>
    </main>
</body>
</html>