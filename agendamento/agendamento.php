<?php 

include_once "../conexao.php";

try{
	
	$shoppingAgenda = filter_var($_POST['shoppingAgenda']);
	$lojaAgenda = filter_var($_POST['lojaAgenda']);
	$nomeAgenda = filter_var($_POST['nomeAgenda']);
	$dataAgenda = filter_var($_POST['dataAgenda']);
	$numeroAgenda = filter_var($_POST['numeroAgenda']);

	$dataAtual = date("Y-m-d");
		if ($dataAgenda < $dataAtual) {
			echo"<script language='javascript' type='text/javascript'>alert('Agendamento não realizado. A data escolhida é inferior a data atual');window.location.href='escolhaShop.php';</script>";
	}else{


             $consulta = $conectar->query("SELECT dataAgenda, nomeAgenda FROM agendamento WHERE dataAgenda = '$dataAgenda' AND nomeAgenda = '$nomeAgenda'");
             $dadosAgen = $consulta->FETCHALL(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                for ($i=0; $i < $total; $i++) { 
						 "<option>" . $total . "</option> "; 
                   
                  }

	if ($total == 1) {
		echo"<script language='javascript' type='text/javascript'>alert('Vistoriador ja tem um agendamento cadastrado para esse dia');window.location.href='escolhaShop.php';</script>";
	}else{


	//inserindo os dados
	$insert = $conectar->prepare("INSERT INTO agendamento (shoppingAgenda, lojaAgenda, nomeAgenda, dataAgenda, numeroAgenda) VALUES(:shoppingAgenda, :lojaAgenda, :nomeAgenda, :dataAgenda, :numeroAgenda)");
	

	$insert->bindParam(':shoppingAgenda', $shoppingAgenda);
	$insert->bindParam(':lojaAgenda', $lojaAgenda);
	$insert->bindParam(':nomeAgenda', $nomeAgenda);
	$insert->bindParam(':dataAgenda', $dataAgenda);
	$insert->bindParam(':numeroAgenda', $numeroAgenda);
	
	$insert->execute();
	$teste = $insert->rowCount();

	header("location: modalAgendamento.php");

}
}
}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

	}

?>