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

<h2 id="editar">Editar ou excluir vistorias</h2>

<!--<form method="post" id="botao-pesquisa" action="editar-excluirVistoria.php">
 	 <input type="search" name="busca" placeholder="Pesquisa pelo nome do shopping" autofocus="true"/>
  	<button type="submit">Buscar</button>
</form> -->

<?php

	include_once "../conexao.php";
  

    
   try{

   	  //$shoppingVistoria = $_POST['busca'];

	//execução da instrução sql

			$consulta = $conectar->query("SELECT idEquipamentos, numero, shoppingVistoria, lojaVistoria, nomeVistoriador, dataVistoria, coifa, lavador, duto, exaustor, central, co2, saponaceo, damper, desarmeEx  FROM equipamentos ");

	echo "<table id=tituloEditar><tr><td>Número da Vistoria</td><td>Shopping</td><td>Loja</td><td>Nome do Vistoriador</td><td>Data da vistoria</td><td>Coifa</td><td>Lavador de gases</td><td>Duto</td><td>Exaustor</td><td>Central de combate a incêndio</td><td>Cilindro de Co2</td><td>Cilindro de saponaceo</td><td>Damper corta-fogo</td><td>Desarme do exaustor</td><td>Relatórios</td><td>Ações</td></tr> </table>";


	while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

		/*$data_timestamp1 = strtotime($linha[dataVistoria]);
		$linha[dataVistoria] = date("d/m/Y", $data_timestamp1);*/


		 echo "<table id=corpoEditar><tr><td>$linha[numero]</td><td>$linha[shoppingVistoria]</td><td>$linha[lojaVistoria]</td><td>$linha[nomeVistoriador]</td><td>$linha[dataVistoria]</td><td>$linha[coifa]</td><td>$linha[lavador]</td><td>$linha[duto]</td><td>$linha[exaustor]</td><td>$linha[central]</td><td>$linha[co2]</td><td>$linha[saponaceo]</td><td>$linha[damper]</td><td>$linha[desarmeEx]</td><td><button id=botaoRelInd><a href='relatorioIndividual.php?idEquipamentos=$linha[idEquipamentos]'>Relatório individual</a></button></td><td><button id=botaoEditar><a href='formEditarVistoria.php?idEquipamentos=$linha[idEquipamentos]'>Editar</a></button> - <button id=botaoExcluir><a href='excluirVistoria.php?idEquipamentos=$linha[idEquipamentos]'>Excluir</a></button></td></tr>";
	}


	echo "</table>";

	echo $consulta->rowCount() . " Registros Exibidos" . "<br>";


}catch(PDOException $e){

	echo $e->getMessage();

}
?>

 <button class="threed" id="botaoVoltarPesquisa"><a href="escolhaAgendamento.php">Voltar</a> </button>

