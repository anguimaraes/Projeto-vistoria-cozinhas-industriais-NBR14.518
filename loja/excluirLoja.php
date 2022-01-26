<?php 

include_once "../conexao.php";

try{

	$idLoja = filter_var($_GET['idLoja'], FILTER_SANITIZE_NUMBER_INT);

	//inserindo os dados
	$delete = $conectar->prepare("DELETE FROM loja WHERE idLoja = :idLoja");

	$delete->bindParam(':idLoja', $idLoja);
	$delete->execute();

	header("location: editar-excluirLoja.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>