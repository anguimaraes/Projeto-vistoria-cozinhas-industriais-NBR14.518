<?php 

include_once "../conexao.php";

try{

	$idAgenda = filter_var($_GET['idAgenda'], FILTER_SANITIZE_NUMBER_INT);

	//inserindo os dados
	$delete = $conectar->prepare("DELETE FROM agendamento WHERE idAgenda = :idAgenda");

	$delete->bindParam(':idAgenda', $idAgenda);
	$delete->execute();

	header("location: ../telaInicial.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>