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

<h2 id="editar">Excluir Agendamentos</h2>

<!--<form method="post" id="botao-pesquisa" action="editar-excluirAgendamento.php">
 	 <input type="search" name="busca" placeholder="Pesquisa pelo nome do shopping" autofocus="true"/>
  	<button type="submit">Buscar</button>
</form> -->

<?php

	include_once "../conexao.php";
  

    
   try{

   	if (isset($_POST['busca'])) {
   	  $shoppingAgenda = $_POST['busca'];
	}
	//execução da instrução sql

			$consulta = $conectar->query("SELECT idAgenda, numeroAgenda, shoppingAgenda, lojaAgenda, nomeAgenda, dataAgenda FROM agendamento ");

	echo "<table id=tituloEditar><tr><td>Número da Vistoria</td><td>Shopping</td><td>Loja</td><td>Nome do Vistoriador</td><td>Data da vistoria</td><td>Ações</td></tr> </table>";


	while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

		/*$data_timestamp1 = strtotime($linha[dataAgenda]);
		$linha[dataAgenda] = date("d/m/Y", $data_timestamp1);*/


		 echo "<table id=corpoEditar><tr><td>$linha[numeroAgenda]</td><td>$linha[shoppingAgenda]</td><td>$linha[lojaAgenda]</td><td>$linha[nomeAgenda]</td><td>$linha[dataAgenda]</td><td> <button id=botaoExcluir><a href='excluirAgendamento.php?idAgenda=$linha[idAgenda]'>Excluir</a></button></td></tr>";
	}


	echo "</table>";

	echo $consulta->rowCount() . " Registros Exibidos" . "<br>";


}catch(PDOException $e){

	echo $e->getMessage();

}
?>

 <button class="threed" id="botaoVoltarPesquisa"><a href="../telaInicial.php">Voltar</a> </button>

