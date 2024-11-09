<?php
    include('../../conexoes/conexao_sistema.php');
    // if (!isset($_session)){
    //     header("location: login.php");
    // }
    // else{
        session_start();
        if ($_GET['cadastrado'] == 'sim'){
            $nome = $session['nome'];
            $sql_codigo_usuario = "SELECT id FROM cliente WHERE id='$nome'";
            $resultado_id = $mysqli->query($sql_codigo_usuario);
            $conteudo = $resultado_id->fetch_assoc();
            $id = $conteudo['id'];
        }
        else{
            $id = $_SESSION['id'];
            $sql_codigo_usuario = "SELECT nome FROM cliente WHERE id='$id' ";
        
            $resultado_nome = $mysqli->query($sql_codigo_usuario);
            $nome_usuario = $resultado_nome->fetch_assoc();

            $nome = $nome_usuario['nome'];

        }
        $sql_codigo = "SELECT * FROM itens WHERE id_user='$id' ";
    
        $resultado = $mysqli ->query($sql_codigo);

    

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
</head>
<body>
<h1>
        Wishlist - <?php echo $nome;  ?>
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
                echo    '<td>'.$item['nome'].'</td>';
                echo    '<td>'.$item['quantidade'].'</td>';
                echo    '<td> <a href="editar.php?id='.$item['id'].'">Editar</a> </td>';
                echo    '<td> <a href="deletar.php?id='.$item['id'].'">Deletar</a> </td>';
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
    <div>
    <?php
        echo '<a type="submit" class="botao_logout" href="logout.php">sair</a>';
    ?>
    </div>
</body>
</html>