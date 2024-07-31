<?php
include_once "conexao.php";

try {
    // Filtrar e validar dados recebidos via POST para evitar XSS
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Preparar a instrução SQL para prevenir injeção SQL
    $delete = $conectar->prepare("DELETE FROM login WHERE id = :id");

    // Vincular os parâmetros com os dados sanitizados
    $delete->bindParam(':id', $id, PDO::PARAM_INT);

    // Executar a instrução SQL
    $delete->execute();

    // Redirecionar após a inserção
    header("Location: index.php");
    exit(); // Importante para garantir que o script não continue após o redirecionamento
}
catch (PDOException $e) {
	echo "erro" . $e->getMessage();
}
?>
