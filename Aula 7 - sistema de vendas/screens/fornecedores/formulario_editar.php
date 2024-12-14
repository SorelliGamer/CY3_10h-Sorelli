<?php
    require_once '../../connection/conn.php';

    $id = $_GET['id'];

    $sql_codigo = "SELECT * FROM fornecedores WHERE id='$id'";
    $resultado = $mysqli->query($sql_codigo);
    $infos = $resultado->fetch_assoc();
    $nome = $infos['nome'];
    $cidade = $infos['cidade'];
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
        <h1>editar fornecedores</h1>
        <form action="../../db/editar_fornecedor.php" method="post">
            <input type="text" name="id" id="id" hidden value="<?php echo $id;?>">
            <div>
                <label for="nome">nome</label>
                <input type="text" name="nome" id="nome" required value="<?php echo $nome;?>">
            </div>
            <div>
                <label for="cidade">cidade</label>
                <input type="text" name="cidade" id="cidade" required value="<?php echo $cidade;?>">
            </div>
            <div>
                <button type="submit">Editar</button>
                <a href="jogos_painel.php">Voltar</a>
            </div>
        </form>
    </main>
</body>
</html>