<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Tela de Login</title>
	<link rel="stylesheet" href="estilos.css">
	<link rel="shortcut icon" type="imagex/png" href="imagens/logoStand.ico">
<script>                        
function mouseoverPass(obj) {
  var obj = document.getElementById('myPassword');
  obj.type = "text";
}
function mouseoutPass(obj) {
  var obj = document.getElementById('myPassword');
  obj.type = "password";
}
</script>
</head>
<body>
	<div id="corpo-form">
		<h1>Entrar</h1>
		<form method="POST" action="login.php">
			<div class="containerLogin">
    			<img src="imagens/logoFinal.png"/>
			</div>
			<h2 id="nomeSistemaLogin">Sistema STAND</h2>
			<input id="login1" type="email" placeholder="Usuário" name="email">
			<input class="login2" type="password" name="senha" id="myPassword" placeholder="Digite a Senha" required>
			<img src="http://i.stack.imgur.com/H9Sb2.png" onclick="mouseoverPass();" onmouseout="mouseoutPass();"  id="olho" class="olho"/>
			<input class="threed" id="botaoCadLogin1" type="submit" value="Acessar">
		</form>
	</div>
</body>
</html>