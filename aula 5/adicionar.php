<?php
    include('../conexoes/conexao_estoque.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];

        $sql_codigo = "INSERT INTO itens (nome, quantidade) VALUES ('$nome', '$quantidade')";

        if ($mysqli->query($sql_codigo) === TRUE){
            header('Location: index.php');
        }
        else {
            echo 'Erro ao atualizar, sadness' . $mysqli->error;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Adicionar item</h1>
    <form action="" method="post">
        <input type="hidden" name="id">
        <label>Nome</label>
        <input type="text" name="nome" required>
        <label>Quantidade</label>
        <input type="number" name="quantidade" value="<?php echo $item['Quantidade']; ?>" required>

        <input type="submit" value="Salvar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>