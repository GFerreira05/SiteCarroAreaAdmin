<?php

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$adm = isset($_POST['adm']) ? 1 : 0; // Converte o valor de adm para 1 ou 0

// Conectar ao banco de dados
$conexao = new mysqli("127.0.0.1", "root", "", "loja");

// Verificar conexão
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
}

// Preparar e vincular
$stmt = $conexao->prepare("INSERT INTO llogin (nome, sobrenome, email, senha, adm) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $nome, $sobrenome, $email, $senha, $adm);

// Executar a declaração
if ($stmt->execute()) {
    header("Location: info_usuarios.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Fechar a declaração e a conexão
$stmt->close();
$conexao->close();

?>
