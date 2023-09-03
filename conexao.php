<?php
	date_default_timezone_set('America/Sao_Paulo');	

	//Declaração de variaveis para conexão
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "vp";

	//Conexão por PDO
	try {
		$pdo = new PDO("mysql:dbname=$dbname;host=$servidor;charset=utf8", "$usuario", "$senha");
	} catch (Exception $e) {
		echo 'Erro ao Conectar com o banco de dados! <p>' .$e;
	}
	
	//Conexão por mysqli
	$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ("Falha de Conexão ou de Database".mysql_error());
?>