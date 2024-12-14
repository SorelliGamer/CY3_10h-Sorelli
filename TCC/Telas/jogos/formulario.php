<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <h1>Cadastrar Jogo</h1>
        <form action="../../db/add_jogo.php" method="post">
            <div>
                <label for="nome">nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div>
                <label for="marca">marca</label>
                <input type="text" name="marca" id="marca" required>
            </div>
            <div>
                <label for="preco">preco</label>
                <input type="text" name="preco" id="preco" required>
            </div>
            <div>
                <label for="quantidade">quantidade</label>
                <input type="text" name="quantidade" id="quantidade" required>
            </div>
            <div>
                <button type="submit">Cadastrar</button>
                <a href="fornecedores_painel.php">Voltar</a>
            </div>
        </form>
    </main>
</body>
</html>