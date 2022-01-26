<?php 
	require("conexao.php");

		if(isset($_POST["email"]) && isset($_POST["senha"]) && $conectar !=null){
		$query = $conectar->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
		$password = md5($_POST['senha']);
		$query->execute(array($_POST["email"], $password));

		if($query->rowCount()){
			$user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

			session_start();
			$_SESSION["usuario"] = array($user["nome"], $user["adm"]);

			echo "<script>window.location = 'telaInicial.php'</script>";

		}else{

				echo"<script>alert('Usuario e/ou senha incorretos!');</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
		}

?> 
