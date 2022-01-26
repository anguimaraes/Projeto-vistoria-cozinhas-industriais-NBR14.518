<?php 

include_once "../conexao.php";

try{
	
	$nome = filter_var($_POST['nome']);
	$email = filter_var($_POST['email']);
	$telefone = filter_var($_POST['telefone']);
	$cpf = filter_var($_POST['cpf']);
	$endereco = filter_var($_POST['endereco']);
	$cidade = filter_var($_POST['cidade']);
	$uf = filter_var($_POST['uf']);
	$cep = filter_var($_POST['cep']);
	$adm = filter_var($_POST['adm']);
	$senha = filter_var($_POST['senha']);

	

	//inserindo os dados
	$insert = $conectar->prepare("INSERT INTO usuarios (nome, email, telefone, cpf, endereco, cidade, uf, cep, adm, senha) VALUES( :nome, :email, :telefone, :cpf, :endereco, :cidade, :uf, :cep, :adm, :senha)");
	

	$insert->bindvalue(':nome', $nome);
	$insert->bindvalue(':email', $email);
	$insert->bindvalue(':telefone', $telefone);
	$insert->bindvalue(':cpf', $cpf);
	$insert->bindvalue(':endereco', $endereco);
	$insert->bindvalue(':cidade', $cidade);
	$insert->bindvalue(':uf', $uf);
	$insert->bindvalue(':cep', $cep);
	$insert->bindvalue(':adm', $adm);
	$insert->bindvalue(':senha', md5($senha));
	$insert->execute();
	$teste = $insert->rowCount();

	header("location: modalUsuario.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>