<?php
$id = isset($_POST['idlogin']) ? $_POST['idlogin'] : '';
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$adm = isset($_POST['adm']) ? $_POST['adm'] : '';

// Conectar ao banco de dados
$con = new mysqli("127.0.0.1", "root", "", "loja");

// Verificar conexão
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Verificar se o id do carro existe
$sql_check = "SELECT COUNT(1) as total FROM llogin WHERE id_login=$id";
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
$sql_update = "UPDATE llogin SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', senha = '$senha', adm = '$adm' WHERE id_login = $id";

if ($con->query($sql_update) === TRUE) {
    header("location: info_usuarios.php");
    exit;
} else {
    echo "Error: " . $con->error;
}

// Fechar a conexão
$con->close();
?>
