<?php 

include_once "../conexao.php";

try{

	$idUsuario = filter_var($_GET['idUsuario'], FILTER_SANITIZE_NUMBER_INT);

	//inserindo os dados
	$delete = $conectar->prepare("DELETE FROM usuarios WHERE idUsuario = :idUsuario");

	$delete->bindParam(':idUsuario', $idUsuario);
	$delete->execute();

	header("location: pesquisarUsuario.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>