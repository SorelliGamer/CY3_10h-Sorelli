<?php
    include('../connection/connection.php');
    session_start();

    if ($_GET['cadastrado'] == 'sim'){
        $nome = $_SESSION['nome']; // Corrigido aqui
        $sql_codigo_usuario = "SELECT id FROM usuarios WHERE id='$nome'";
        $resultado_id = $mysqli->query($sql_codigo_usuario);
        $conteudo = $resultado_id->fetch_assoc();
        $id = $conteudo['id'];
    } else {
        $id = $_SESSION['id'];
        $sql_codigo_usuario = "SELECT nome FROM usuarios WHERE id='$id'";
        $resultado_nome = $mysqli->query($sql_codigo_usuario);
        $nome_usuario = $resultado_nome->fetch_assoc();
        $nome = $nome_usuario['nome'];
    }

    $sql_codigo = "SELECT * FROM itens WHERE id_user='$id'";
    $resultado = $mysqli->query($sql_codigo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #495057;
        }
        .container {
            margin-top: 30px;
            text-align: center;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            background-color: #e9ecef;
        }
        tr.infos:nth-child(even) {
            background-color: #f1f3f5;
        }
        tr.cabecalho:hover, tr.infos:hover {
            background-color: #dee2e6;
            cursor: pointer;
        }
        .botao_add, .botao_logout {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #28a745;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin: 10px;
        }
        .botao_add:hover, .botao_logout:hover {
            background-color: #218838;
        }
        .bg-info {
            background-color: #17a2b8 !important;
        }
    </style>
</head>
<body class="bg-info">
    <div>
        <h1>Wishlist - <?php echo $nome; ?></h1>
        <main class="container">
            <table>
                <tr class="cabecalho">
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
                <?php
                if ($resultado->num_rows >= 1) {
                    while($item = $resultado->fetch_assoc()){
                        echo '<tr class="infos">';
                        echo '<td>'.$item['nome'].'</td>';
                        echo '<td>'.$item['quantidade'].'</td>';
                        echo '<td> <a href="editar.php?id='.$item['id'].'">Editar</a> </td>';
                        echo '<td> <a href="deletar.php?id='.$item['id'].'">Deletar</a> </td>';
                        echo '</tr>';
                    }
                }    
                ?>
                <tr>
                    <td class="add" colspan="4">
                        <?php
                            echo '<a type="submit" class="botao_add" href="jogos/jogos_painel.php">Adicionar</a>';
                        ?>
                    </td>
                </tr>
            </table>
        </main> 
        <div>
            <?php
                echo '<a type="submit" class="botao_logout" href="login.php">Sair</a>';
            ?>
        </div