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

<h2 id="editar">Editar ou excluir Shoppings</h2>

<!--<form method="post" id="botao-pesquisa" action="editar-excluirShop.php">
 	 <input  type="search" name="busca" placeholder="Pesquisa pelo nome fantasia" autofocus="true"/>
  	<button type="submit">Buscar</button>
</form> -->

<?php

	include_once "../conexao.php";
  

    
   try{

    /*if (isset($_POST['busca'])) {
      $nomeFantasia = $_POST['busca'];
    }*/

	//execução da instrução sql

			$consulta = $conectar->query("SELECT idShop, razaoSocial, nomeFantasia, CNPJ, pessoaContato, telefone, email, endereco, bairro, municipio, uf, cep, ativo_shop  FROM shop ");


	echo "<table id=tituloEditar><tr><td>Razao Social</td><td>Nome Fantasia</td><td>CNPJ</td><td>Pessoa para Contato</td><td>Telefone</td><td>Email</td><td>Endereço</td><td>Bairro</td><td>Município</td><td>UF</td><td>CEP</td><td>Status do Shopping</td><td>Ações</td></tr> </table>";


	while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

		/*if ($linha[ativo_shop] == 1) {
			$linha[ativo_shop] = "Ativo";
		}else{
			$linha[ativo_shop] = "Inativo";
		}*/

		 echo "<table id=corpoEditar><tr><td>$linha[razaoSocial]</td><td>$linha[nomeFantasia]</td><td>$linha[CNPJ]</td><td>$linha[pessoaContato]</td><td>$linha[telefone]</td><td>$linha[email]</td><td>$linha[endereco]</td><td>$linha[bairro]</td><td>$linha[municipio]</td><td>$linha[uf]</td><td>$linha[cep]</td><td>$linha[ativo_shop]</td><td><button id=botaoEditar><a href='formEditarShop.php?idShop=$linha[idShop]'>Editar</a></button> - <button id=botaoExcluir><a href='excluirShop.php?idShop=$linha[idShop]'>Excluir</a></button></td></tr>";
	}


	echo "</table>";

	echo $consulta->rowCount() . " Registros Exibidos" . "<br>";


}catch(PDOException $e){

	echo $e->getMessage();

}
?>

 <button class="threed" id="botaoVoltarPesquisa"><a href="formCadastroShop.php">Voltar</a> </button>

