<?php 

include_once "../conexao.php";

try{

	$idEquipamentos = filter_var($_GET['idEquipamentos'], FILTER_SANITIZE_NUMBER_INT);

	//inserindo os dados
	$delete = $conectar->prepare("DELETE FROM equipamentos WHERE idEquipamentos = :idEquipamentos");

	$delete->bindParam(':idEquipamentos', $idEquipamentos);
	$delete->execute();

	header("location: editar-excluirVistoria.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>