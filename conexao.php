<?php 
	
	$server = "127.0.0.1";
	$usuario = "root";
	$senha = "";
	$banco = "vistoria";

	try{
		$conectar = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha);
		$conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $erro){
		echo "Ocorreu um erro de conexao: {$erro->getMessage()}";
		$conectar = null;
	}

?>