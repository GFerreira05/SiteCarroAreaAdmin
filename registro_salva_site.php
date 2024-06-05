<?php

    $Nome = $_POST["Nome"];
    $Sobrenome = $_POST["Sobrenome"];
    $Email = $_POST["Email"];
    $Senha = $_POST["Senha"];

    $conexao = new mysqli(
        "127.0.0.1",    
        "root",         
        "",             
        "loja"        
    );

    $sql = "
    INSERT INTO llogin (nome, sobrenome, email, senha) 
    VALUES ('$Nome','$Sobrenome', '$Email', '$Senha')
    ";

    $rs = $conexao->query($sql);

    header("location: login_site.html");

?>