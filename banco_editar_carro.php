<?php
$id = isset($_POST['idcarro']) ? $_POST['idcarro'] : '';
$nomecarro = isset($_POST['nomecarro']) ? $_POST['nomecarro'] : '';
$marca = isset($_POST['marca']) ? $_POST['marca'] : '';
$cor = isset($_POST['cor']) ? $_POST['cor'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$ano = isset($_POST['ano']) ? $_POST['ano'] : '';

// Conectar ao banco de dados
$con = new mysqli("127.0.0.1", "root", "", "loja");

// Verificar conexão
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Verificar se o id do carro existe
$sql_check = "SELECT COUNT(1) as total FROM carro WHERE id_carros=$id";
$rs = $con->query($sql_check);

if (!$rs) {
    echo "Erro na consulta: " . $con->error;
    exit;
}

$total = $rs->fetch_assoc();

if ($total["total"] == 0) {
    echo "Id não existe";
    exit;
}

// Atualizar o registro do carro
$sql_update = "UPDATE carro SET nome_carros = '$nomecarro', marca = '$marca', cor = '$cor', cidade_carros = '$cidade', sigla_estado = '$estado', ano_carros = '$ano' WHERE id_carros = $id";

if ($con->query($sql_update) === TRUE) {
    header("location: info_carros.php");
    exit;
} else {
    echo "Error: " . $con->error;
}

// Fechar a conexão
$con->close();
?>
