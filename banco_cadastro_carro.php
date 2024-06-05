<?php

$nomecarro = $_POST['nomecarro'];
$marca   = $_POST['marca'];
$cor   = $_POST['cor'];
$cidade   = $_POST['cidade'];
$estado   = $_POST['estado'];
$ano   = $_POST['ano'];

// Conectar ao banco de dados
$conexao = new mysqli("127.0.0.1", "root", "", "loja");

// Verificar conexão
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

// Verificar se o estado existe
$estadoStmt = $conexao->prepare("SELECT sigla_estado FROM estado WHERE sigla_estado = ?");
$estadoStmt->bind_param("s", $estado);
$estadoStmt->execute();
$estadoStmt->store_result();

if ($estadoStmt->num_rows == 0) {
    // Inserir o estado se não existir
    $insertEstadoStmt = $conexao->prepare("INSERT INTO estado (sigla_estado) VALUES (?)");
    $insertEstadoStmt->bind_param("s", $estado);
    $insertEstadoStmt->execute();
    $insertEstadoStmt->close();
}

$estadoStmt->close();

// Preparar e vincular
$stmt = $conexao->prepare("INSERT INTO carro (nome_carros, marca, cor, cidade_carros, sigla_estado, ano_carros) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nomecarro, $marca, $cor, $cidade, $estado, $ano);

// Executar a declaração
if ($stmt->execute()) {
    header("location: info_carros.php");
} else {
    echo "Error: " . $stmt->error;
}

// Fechar a declaração e a conexão
$stmt->close();
$conexao->close();

?>
