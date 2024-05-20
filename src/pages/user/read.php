<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM Produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nome: " . $row["nome"]. " - Preço: " . $row["preco"]. " - Link: " . $row["link"]. " - Categoria: " . $row["categoria"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>
