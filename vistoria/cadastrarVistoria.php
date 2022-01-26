<?php 

include_once "../conexao.php";

try{
	
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
	$insert = $conectar->prepare("INSERT INTO equipamentos (shoppingVistoria, lojaVistoria, nomeVistoriador, dataVistoria, coifa, lavador, duto, exaustor, central, co2, saponaceo, damper, desarmeEx, numero) VALUES(:shoppingVistoria, :lojaVistoria, :nomeVistoriador, :dataVistoria, :coifa, :lavador, :duto, :exaustor, :central, :co2, :saponaceo, :damper, :desarmeEx, :numero)");
	

	$insert->bindParam(':shoppingVistoria', $shoppingVistoria);
	$insert->bindParam(':lojaVistoria', $lojaVistoria);
	$insert->bindParam(':nomeVistoriador', $nomeVistoriador);
	$insert->bindParam(':dataVistoria', $dataVistoria);
	$insert->bindParam(':coifa', $coifa);
	$insert->bindParam(':lavador', $lavador);
	$insert->bindParam(':duto', $duto);
	$insert->bindParam(':exaustor', $exaustor);
	$insert->bindParam(':central', $central);
	$insert->bindParam(':co2', $co2);
	$insert->bindParam(':saponaceo', $saponaceo);
	$insert->bindParam(':damper', $damper);
	$insert->bindParam(':desarmeEx', $desarmeEx);
	$insert->bindParam(':numero', $numero);
	
	$insert->execute();
	$teste = $insert->rowCount();

	header("location: ../agendamento/ConfirmarVistoria.php?numero=$numero");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>