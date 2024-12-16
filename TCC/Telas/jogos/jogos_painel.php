<?php
    require_once '../../connection/connection.php';

    $sql_codigo = 'SELECT * FROM produtos';
    $resultado = $mysqli->query($sql_codigo);
    
    if ($resultado->num_rows > 0){
        $infos = $resultado->fetch_all();
    } else {
        $infos = [];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        main {
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            color: #495057;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        td {
            background-color: #e9ecef;
        }

        tr:nth-child(even) {
            background-color: #f1f3f5;
        }

        tr:hover {
            background-color: #dee2e6;
            cursor: pointer;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .add-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body class="bg-info">
    <main>
        <h1>Jogos</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
            <?php
            if (count($infos) == 0){
                echo '<tr>
                    <td colspan="6">Nenhum jogo registrado</td>
                </tr>';
            } else {
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
                            <td><a href="formulario_editar.php?id='. $id .'">Editar</a> | <a href="../../db/deletar_jogo.php?id='. $id .'">Deletar</a></td>
                    </tr>';
                }
            }
            ?>
            <tr>
                <td colspan="6"><a href="formulario.php" class="add-btn">+</a></td>
            </tr>
        </table>
    </main>
</body>
</html>
