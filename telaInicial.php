<?php 
	session_start();

	if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
		$adm = $_SESSION["usuario"][1];
		$nome = $_SESSION["usuario"][0];
	}else{
		echo "<script>window.location = 'index.php'</script>";
	}
	
	include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Tela Inicial</title>
	<link rel="stylesheet" href="estilos.css">
	<link rel="shortcut icon" type="imagex/png" href="imagens/logoStand.ico">
</head>
<body>


<span id="exibeNome"><?php echo "Olá, ". $nome; ?></span>


	<div id="corpo-form">
		<form>
			<div class="container">
    			<img src="imagens/logoFinal.png"/>
			</div>
			<h2 id="nomeSistema">Sistema STAND</h2>
			<h2>Bem vindo!</h2>
			<h3>Escolha uma das opções abaixo:</h3>
			<div id="botoesPrincipais">
				<?php if($adm): ?>
				<button class="threed" id="botoesIniciais"><a href="usuario/formCadastroUsuario.php">Cadastro de Acesso</a></button>
				<?php endif; ?>
				<button class="threed" id="botoesIniciais"><a href="shop/formCadastroShop.php">Cadastro de Shopping</a></button>
				<button class="threed" id="botoesIniciais"><a href="loja/formCadastroLoja.php">Cadastro de Loja</a></button>
				<button class="threed" id="botoesIniciais"><a href="agendamento/escolhaShop.php">Agendamento de vistoria</a></button>
				<button class="threed" id="botoesIniciais"><a href="vistoria/escolhaAgendamento.php">Iniciar Vistoria</a></button>
				<button class="threed" id="botoesIniciais"><a href="sair.php">Sair</a></button>
			</div>
		</form>
	</div>

	<div id="footer">
	  <footer>
	  	<div id="footer1">
       		<b>Desenvolvedores:</b>
			<p>André Guimarães</p><br>
			<p>Leonardo Soares</p><br>
			<p>Greison Rocha</p><br>
	
	</div>

	<br>
	<div id=footer2>	
		<b>Endereço:</b>
			<p>Lúcia Rocha Vanderlei, 6 - Engenho - Itaguaí. CEP: 23820-430</p>
		<br>

		<b>Telefones:</b>
			<p>(21) 99784 - 0683</p><br>
			<p>(21) 97021 - 4434</p><br>
			<p>(21) 98663 - 4109</p><br>
		<br>
	</div>
	<div id=footer3>
		<b id="email">Email's:</b>
			<p id="email"><a href=mailto:andregtst@gmail.com>andregtst@gmail.com</a></p><br>
			<p id="email2"><a href=mailto:leoprsoares@gmail.com>leoprsoares@gmail.com</a></p><br>
			<p id="email2"><a href=mailto:greisonrocha4@gmail.com>greisonrocha4@gmail.com</a></p><br>

	</div>
	<div id="copyright" class="clr" role="contentinfo">
				© Copyright - TCC FEUC 2021  			
	</div><!-- #copyright -->
      </footer>
    </div>
</body>
</html>