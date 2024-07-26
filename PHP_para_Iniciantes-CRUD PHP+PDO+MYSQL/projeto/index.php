<?php
    include_once "conexao.php";

    try {
        $consulta = $conectar->query("SELECT * FROM login");

        echo "
        <a href='formCadastro.php'>Novo Cadastro</a>
        <h1>Lista de usuario</h1>
        ";
        echo "
        <table border = '1'>
        <tr>
            <td>Nome</td>
            <td>Login</td>
            <td>Acoes</td>
        </tr>
        ";
        
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "
            <tr>
                <td>$linha[nome]</td>
                <td>$linha[login]</td>
                <td>
                    <a href='formEdita.php?id=$linha[id]'>Editar</a>
                    <a href='excluir.php?id=$linha[id]''>Excluir</a>
                </td>
            </tr>
            ";
        }

        echo "</table>";

        echo $consulta->rowCount() . "exibidos";
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }

?>