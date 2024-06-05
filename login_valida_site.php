<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $Senha = $_POST["Senha"];

    $conexao = new mysqli(
        "127.0.0.1",
        "root",
        "",
        "loja"
    );

    if ($conexao->connect_error) {
        die("Connection failed: " . $conexao->connect_error);
    }

    $sql = "SELECT * FROM llogin WHERE email='$Email' AND senha='$Senha'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        // Login bem sucedido
        header("location: index1.html");
        exit;
    } else {
        // Login falhou
        echo "Usuário e/ou senha inválidos";
    }

    $conexao->close();
} else {
    // Redirecionar para a página de login se não for um POST request
    header("location: index1.html");
    exit;
}

?>
