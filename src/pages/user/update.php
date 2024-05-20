<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$link = $_POST['link'];
$categoria = $_POST['categoria'];

$sql = "UPDATE Produtos SET nome='$nome', preco='$preco', link='$link', categoria='$categoria' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produto atualizado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
