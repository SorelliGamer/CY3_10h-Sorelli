<?php
    require_once '../../connection/connection.php';

    $id = $_GET['id'];

    $sql_codigo = "SELECT * FROM produtos WHERE id='$id'";
    $resultado = $mysqli->query($sql_codigo);
    $infos = $resultado->fetch_assoc();
    $nome = $infos['nome'];
    $marca = $infos['marca'];
    $preco = $infos['preco'];
    $quantidade = $infos['quantidade'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <main>
        <h1>Editar jogos</h1>
        <form action="../../db/editar_jogo.php" method="post">
            <input type="text" name="id" id="id" hidden value="<?php echo $id;?>">
            <div>
                <label for="nome">nome</label>
                <input type="text" name="nome" id="nome" required value="<?php echo $nome;?>">
            </div>
            <div>
                <label for="marca">marca</label>
                <input type="text" name="marca" id="marca" required value="<?php echo $marca;?>">
            </div>
            <div>
                <label for="preco">preco</label>
                <input type="text" name="preco" id="marca" required value="<?php echo $preco;?>">
            </div>
            <div>
                <label for="quantidade">quantidade</label>
                <input type="text" name="quantidade" id="quantidade" required value="<?php echo $quantidade;?>">
            </div>
            <div>
                <button type="submit">Editar</button>
                <a href="jogos_painel.php">Voltar</a>
            </div>
        </form>
    </main>
</body>
</html>