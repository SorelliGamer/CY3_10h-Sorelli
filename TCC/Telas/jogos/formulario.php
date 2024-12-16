<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        main {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            color: #495057;
            margin-bottom: 20px;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-info">
    <main>
        <h1>Cadastrar Jogo</h1>
        <form action="../../db/add_jogo.php" method="post">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div>
                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" required>
            </div>
            <div>
                <label for="preco">Preço</label>
                <input type="text" name="preco" id="preco" required>
            </div>
            <div>
                <label for="quantidade">Quantidade</label>
                <input type="text" name="quantidade" id="quantidade" required>
            </div>
            <div>
                <button type="submit">Cadastrar</button>
                <a href="jogos_painel.php">Voltar</a>
            </div>
        </form>
    </main>
</body>
</html>
