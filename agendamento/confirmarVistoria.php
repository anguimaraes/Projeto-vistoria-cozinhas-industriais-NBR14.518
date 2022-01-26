<?php 
	session_start();

	if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
		$adm = $_SESSION["usuario"][1];
		$nome = $_SESSION["usuario"][0];
	}else{
		echo "<script>window.location = '../index.php'</script>";
	}
?>
<link rel="stylesheet" href="../estilos.css">
<link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">

<h2 id="editar">Confirmar a vistoria</h2>

<?php

	include_once "../conexao.php";
  

    
   try{

   	  $numero = $_GET['numero'];


	//execução da instrução sql

		$consulta = $conectar->query("SELECT idAgenda, numeroAgenda, shoppingAgenda, lojaAgenda, nomeAgenda, dataAgenda FROM agendamento");

	echo "<table id=tituloEditar><tr><td>Número da Vistoria</td><td>Shopping</td><td>Loja</td><td>Nome do Vistoriador</td><td>Data da vistoria</td><td>Ações</td></tr> </table>";


	while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

		/*$data_timestamp1 = strtotime($linha[dataAgenda]);
		$linha[dataAgenda] = date("d/m/Y", $data_timestamp1);*/


		 echo "<table id=corpoEditar><tr><td>$linha[numeroAgenda]</td><td>$linha[shoppingAgenda]</td><td>$linha[lojaAgenda]</td><td>$linha[nomeAgenda]</td><td>$linha[dataAgenda]</td><td> <button id=botaoConfirmar><a href='finalizarVistoria.php?idAgenda=$linha[idAgenda]'>Confirmar a vistoria</a></button></td></tr>";
	}


	echo "</table>";

	echo $consulta->rowCount() . " Registros Exibidos" . "<br>";


}catch(PDOException $e){

	echo $e->getMessage();

}
?>



