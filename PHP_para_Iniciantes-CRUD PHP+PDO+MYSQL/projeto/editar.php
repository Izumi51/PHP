<?php
include_once "conexao.php";

try {
    // Filtrar e validar dados recebidos via POST para evitar XSS
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = htmlspecialchars($_POST["nome"], ENT_QUOTES, 'UTF-8');
    $login = htmlspecialchars($_POST["login"], ENT_QUOTES, 'UTF-8');

    // Preparar a instrução SQL para prevenir injeção SQL
    $update = $conectar->prepare("UPDATE login SET nome = :nome, login = :login WHERE id = :id");

    // Vincular os parâmetros com os dados sanitizados
    $update->bindParam(':id', $id, PDO::PARAM_INT);
    $update->bindParam(':nome', $nome, PDO::PARAM_STR);
    $update->bindParam(':login', $login, PDO::PARAM_STR);

    // Executar a instrução SQL
    $update->execute();

    // Redirecionar após a inserção
    header("Location: index.php");
    exit(); // Importante para garantir que o script não continue após o redirecionamento
}
catch (PDOException $e) {
	echo "erro" . $e->getMessage();
}
?>