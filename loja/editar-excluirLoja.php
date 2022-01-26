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

<h2 id="editar">Editar ou excluir lojas</h2>

<!--<form method="post" id="botao-pesquisa" action="editar-excluirLoja.php">
 	 <input type="search" name="busca" placeholder="Pesquisa pelo nome da loja" autofocus="true"/>
  	<button type="submit">Buscar</button>
</form> -->

<?php

	include_once "../conexao.php";
  

    
   try{
   	    if (isset($_POST['nomeFantasia'])) {
   	  		$nomeFantasia = $_POST['busca'];
		}
	//execução da instrução sql

			$consulta = $conectar->query("SELECT idLoja, nomeFantasia, CNPJ, pessoaContato, telefone, email, shopping FROM loja ");

	echo "<table id=tituloEditar><tr><td>Nome Fantasia</td><td>CNPJ</td><td>Pessoa para Contato</td><td>Telefone</td><td>Email</td><td>Shopping</td><td>Ações</td></tr> </table>";


	while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {


		 echo "<table id=corpoEditar><tr><td>$linha[nomeFantasia]</td><td>$linha[CNPJ]</td><td>$linha[pessoaContato]</td><td>$linha[telefone]</td><td>$linha[email]</td><td>$linha[shopping]</td><td><button id=botaoEditar><a href='formEditarLoja.php?idLoja=$linha[idLoja]'>Editar</a></button> - <button id=botaoExcluir><a href='excluirLoja.php?idLoja=$linha[idLoja]'>Excluir</a></button></td></tr>";
	}


	echo "</table>";

	echo $consulta->rowCount() . " Registros Exibidos" . "<br>";


}catch(PDOException $e){

	echo $e->getMessage();

}
?>

 <button class="threed" id="botaoVoltarPesquisa"><a href="formCadastroLoja.php">Voltar</a> </button>

