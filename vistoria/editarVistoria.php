<?php 

include_once "../conexao.php";

try{

	$idEquipamentos = filter_var($_POST['idEquipamentos'], FILTER_SANITIZE_NUMBER_INT);
	$shoppingVistoria = filter_var($_POST['shoppingVistoria']);
	$lojaVistoria = filter_var($_POST['lojaVistoria']);
	$nomeVistoriador = filter_var($_POST['nomeVistoriador']);
	$dataVistoria = filter_var($_POST['dataVistoria']);
	$coifa = filter_var($_POST['coifa']);
	$lavador = filter_var($_POST['lavador']);
	$duto = filter_var($_POST['duto']);
	$exaustor = filter_var($_POST['exaustor']);
	$central = filter_var($_POST['central']);
	$co2 = filter_var($_POST['co2']);
	$saponaceo = filter_var($_POST['saponaceo']);
	$damper = filter_var($_POST['damper']);
	$desarmeEx = filter_var($_POST['desarmeEx']);
	$numero = filter_var($_POST['numero']);

	//inserindo os dados
	$update = $conectar->prepare("UPDATE equipamentos SET shoppingVistoria= :shoppingVistoria, lojaVistoria= :lojaVistoria, nomeVistoriador= :nomeVistoriador, dataVistoria= :dataVistoria, coifa=:coifa, lavador= :lavador, duto= :duto, exaustor= :exaustor, central= :central, co2= :co2, saponaceo= :saponaceo, damper= :damper, desarmeEx= :desarmeEx, numero= :numero WHERE idEquipamentos = :idEquipamentos");

	$update->bindParam(':idEquipamentos', $idEquipamentos);
	$update->bindParam(':shoppingVistoria', $shoppingVistoria);
	$update->bindParam(':lojaVistoria', $lojaVistoria);
	$update->bindParam(':nomeVistoriador', $nomeVistoriador);
	$update->bindParam(':dataVistoria', $dataVistoria);
	$update->bindParam(':coifa', $coifa);
	$update->bindParam(':lavador', $lavador);
	$update->bindParam(':duto', $duto);
	$update->bindParam(':exaustor', $exaustor);
	$update->bindParam(':central', $central);
	$update->bindParam(':co2', $co2);
	$update->bindParam(':saponaceo', $saponaceo);
	$update->bindParam(':damper', $damper);
	$update->bindParam(':desarmeEx', $desarmeEx);
	$update->bindParam(':numero', $numero);
	$update->execute();

	header("location: editar-excluirVistoria.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>