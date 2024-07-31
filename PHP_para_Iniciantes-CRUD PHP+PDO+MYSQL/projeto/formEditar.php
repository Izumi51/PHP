<?php
    include_once "conexao.php";

    try {
        // Sanitizar e validar o ID recebido via GET
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        
        // Preparar e executar a consulta SQL com parâmetro
        $stmt = $conectar->prepare("SELECT * FROM login WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Buscar os dados
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar se a linha foi encontrada
        if (!$linha) {
            echo "Usuário não encontrado.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro ao consultar o banco de dados: " . $e->getMessage();
        exit();
    }
?>

<form action="editar.php" method="post">
    Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($linha['nome'], ENT_QUOTES, 'UTF-8'); ?>" id="nome"><br>
    Login: <input type="text" name="login" value="<?php echo htmlspecialchars($linha['login'], ENT_QUOTES, 'UTF-8'); ?>" id="login"><br>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['id'], ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" value="Editar">
</form>
