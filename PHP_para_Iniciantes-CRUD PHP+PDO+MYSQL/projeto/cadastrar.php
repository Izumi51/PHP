<?php
include_once "conexao.php";

try {
    // Filtrar e validar dados recebidos via POST para evitar XSS
    $nome = htmlspecialchars($_POST["nome"], ENT_QUOTES, 'UTF-8');
    $login = htmlspecialchars($_POST["login"], ENT_QUOTES, 'UTF-8');

    // Preparar a instrução SQL para prevenir injeção SQL
    $insert = $conectar->prepare("INSERT INTO login (nome, login) VALUES (:nome, :login)");

    // Vincular os parâmetros com os dados sanitizados
    $insert->bindParam(':nome', $nome); 
    $insert->bindParam(':login', $login);

    // Executar a instrução SQL
    $insert->execute();

    // Redirecionar após a inserção
    header("Location: index.php");
    exit(); // Importante para garantir que o script não continue após o redirecionamento
}
catch (PDOException $e) {
	echo "erro" . $e->getMessage();
}
?>