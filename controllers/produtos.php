<?php
[require_once('config.php');
[$teclado = $_POST('teclado');
[$mouse = $_POST('mouse');
[$fone = $_POST('fone');

[$sql = "INSERT INTO Produtos (teclado,mouse,fone) VALUES ('".$teclado.'",'".$mouse.'",'".$fone.'")";

$result = $connection->query($sql);
if(!result){
    http_response_code(500);
    echo json_encode(["error"=="Erro ao inserir no banco de dados"]);
}else{
    http_response_code(200);
    echo json_encode(["sucess"=="Salvo no banco de dados"]);
}
?>