<?php 

include_once "../conexao.php";

try{

	$idShop = filter_var($_POST['idShop'], FILTER_SANITIZE_NUMBER_INT);
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
	$update = $conectar->prepare("UPDATE shop SET razaoSocial= :razaoSocial, nomeFantasia= :nomeFantasia, CNPJ= :CNPJ, pessoaContato= :pessoaContato, telefone=:telefone, email= :email, endereco= :endereco, bairro= :bairro, municipio= :municipio, uf= :uf, cep= :cep, ativo_shop= :ativo_shop WHERE idShop = :idShop");

	$update->bindParam(':idShop', $idShop);
	$update->bindParam(':razaoSocial', $razaoSocial);
	$update->bindParam(':nomeFantasia', $nomeFantasia);
	$update->bindParam(':CNPJ', $CNPJ);
	$update->bindParam(':pessoaContato', $pessoaContato);
	$update->bindParam(':telefone', $telefone);
	$update->bindParam(':email', $email);
	$update->bindParam(':endereco', $endereco);
	$update->bindParam(':bairro', $bairro);
	$update->bindParam(':municipio', $municipio);
	$update->bindParam(':uf', $uf);
	$update->bindParam(':cep', $cep);
	$update->bindParam(':ativo_shop', $ativo_shop);
	$update->execute();

	header("location: editar-excluirShop.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>