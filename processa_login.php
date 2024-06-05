<?php
// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os campos de e-mail e senha foram preenchidos
    if (isset($_POST['Email']) && isset($_POST['Senha'])) {
        // Realize a autenticação do usuário aqui, você pode fazer consultas ao banco de dados para verificar as credenciais
        
        // Exemplo de autenticação simples (substitua por sua lógica real de autenticação)
        $email = $_POST['Email'];
        $senha = $_POST['Senha'];
        
        // Verificar se as credenciais correspondem
        if ($email == "usuario@example.com" && $senha == "senha123") {
            // Autenticação bem-sucedida, redirecione para a página inicial ou faça qualquer outra ação necessária
            header("Location: index.php"); // Altere index.php para a página desejada
            exit();
        } else {
            // Autenticação falhou, redirecione de volta para a página de login com uma mensagem de erro
            header("Location: login.php?error=1");
            exit();
        }
    }
}

// Se o formulário não foi submetido corretamente, redirecione para a página de login com uma mensagem de erro
header("Location: login.php?error=2");
exit();
?>
