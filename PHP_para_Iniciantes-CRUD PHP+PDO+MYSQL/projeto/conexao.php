<?php
try {
	//faz a conexaoo com o banco
	//objeto banco(banco:tipo de host; porta; nome do banco;, usuario, senha(no caso sem senha))
	$conectar = new PDO ("mysql:host=localhost;port=3306;dbname=pdo;","root",""); 
}
catch (PDOException $e) {
	
	//caso ocorra algum erro na conexao com o banco, exibe a mensagem
	echo "erro ao conectar com o banco" . $e->getMessage();
}
?>