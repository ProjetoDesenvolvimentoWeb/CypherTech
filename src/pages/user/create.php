<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém os dados do formulário
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$link = $_POST['link'];
$categoria = $_POST['categoria'];

// Insere os dados na tabela Produtos
$sql = "INSERT INTO Produtos (nome, preco, link, categoria) VALUES ('$nome', '$preco', '$link', '$categoria')";

if ($conn->query($sql) === TRUE) {
    echo "Novo produto cadastrado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
