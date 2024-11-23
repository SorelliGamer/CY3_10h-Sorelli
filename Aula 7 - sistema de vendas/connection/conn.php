<?php 
// VARIAVEIS DE AMBIENTE
$servidor ='localhost';
$banco_de_dados = 'nique_loja';
$usuario = 'root';
$senha = '';

// CRIA CONEXÃO COM BANCO DE DADOS
$mysqli = new mysqli($servidor, $usuario, $senha);

// VERIFICA A CONEXÃO
if ($mysqli -> error){
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
// verificar se existe o banco de dados
$banco_de_dados_existe = $mysqli->select_db($banco_de_dados);

if(!$banco_de_dados_existe){
    $sql_codigo = "CREATE DATABASE $banco_de_dados";

    if($mysqli->query($sql_codigo) === TRUE){
        echo 'Banco criado com sucesso';
    }
    else{
        die("Erro ao criar ao banco de dados" . $mysqli->error);
    }

    // SE CONECTA AO BANCO DE DADOS RECEM CRIADO
    $mysqli->select_db($banco_de_dados);

    // CRIANDO TABELAS
    $tabelas = [
        "fornecedores" => "
            CREATE TABLE fornecedores(
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                cidade VARCHAR(50) NOT NULL
            )
        ",
        "produtos" => "
            CREATE TABLE produtos(
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                marca VARCHAR(50) NOT NULL,
                tamanho VARCHAR(10) NOT NULL,
                preco DECIMAL (10, 2) NOT NULL,
                quantidade INT NOT NULL,
                id_fornecedores INT,
                FOREIGN KEY (id_fornecedores) REFERENCES fornecedores(id)
            )
        ",
        "usuarios" => "
           CREATE TABLE usuarios(
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            telefone VARCHAR(15) NOT NULL,
            data_nascimento DATE NOT NULL,
            cpf VARCHAR(11) UNIQUE NOT NULL,
            cep VARCHAR(9) NOT NULL

           ) 
        ",
        "vendas" => "
            CREATE TABLE vendas(
                id INT AUTO_INCREMENT PRIMARY KEY,
                data_venda DATE NOT NULL,
                id_produto INT,
                id_usuario INT,
                FOREIGN KEY (id_produto) REFERENCES produto(id),
                FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
                )
        "
    ];

    foreach($tabelas as $nome => $sql){
        if ($mysqli ->query($sql) === TRUE){
            echo "Tabela '$nome' criada com sucesso!\n";
        }
        else{
            echo "erro ao criar tabela '$nome': " . $mysqli->error . "\n";
        }
    }

}
else{
    echo "Banco de dados já existe! \n";
}

// FECHA A CONEXÃO
// $mysqli->close();

?>