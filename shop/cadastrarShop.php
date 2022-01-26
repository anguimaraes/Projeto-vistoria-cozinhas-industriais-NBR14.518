<?php 

include_once "../conexao.php";

try{
	
	$razaoSocial = filter_var($_POST['razaoSocial']);
	$nomeFantasia = filter_var($_POST['nomeFantasia']);
	$CNPJ = filter_var($_POST['CNPJ']);
	$pessoaContato = filter_var($_POST['pessoaContato']);
	$telefone = filter_var($_POST['telefone']);
	$email = filter_var($_POST['email']);
	$endereco = filter_var($_POST['endereco']);
	$bairro = filter_var($_POST['bairro']);
	$municipio = filter_var($_POST['municipio']);
	$uf = filter_var($_POST['uf']);
	$cep = filter_var($_POST['cep']);
	$ativo_shop = filter_var($_POST['ativo_shop']);
	

	//inserindo os dados
	$insert = $conectar->prepare("INSERT INTO shop (razaoSocial, nomeFantasia, CNPJ, pessoaContato, telefone, email, endereco, bairro, municipio, uf, cep, ativo_shop) VALUES( :razaoSocial, :nomeFantasia, :CNPJ, :pessoaContato, :telefone, :email, :endereco, :bairro, :municipio, :uf, :cep, :ativo_shop)");
	

	$insert->bindvalue(':razaoSocial', $razaoSocial);
	$insert->bindvalue(':nomeFantasia', $nomeFantasia);
	$insert->bindvalue(':CNPJ', $CNPJ);
	$insert->bindvalue(':pessoaContato', $pessoaContato);
	$insert->bindvalue(':telefone', $telefone);
	$insert->bindvalue(':email', $email);
	$insert->bindvalue(':endereco', $endereco);
	$insert->bindvalue(':bairro', $bairro);
	$insert->bindvalue(':municipio', $municipio);
	$insert->bindvalue(':uf', $uf);
	$insert->bindvalue(':cep', $cep);
	$insert->bindvalue(':ativo_shop', $ativo_shop);
	$insert->execute();
	$teste = $insert->rowCount();

	header("location: modalShop.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>