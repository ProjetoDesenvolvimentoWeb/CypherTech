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

$sql = "DELETE FROM Produtos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produto excluído com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
