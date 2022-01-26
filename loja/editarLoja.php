<?php 

include_once "../conexao.php";

try{

	$idLoja = filter_var($_POST['idLoja'], FILTER_SANITIZE_NUMBER_INT);
	$nomeFantasia = filter_var($_POST['nomeFantasia']);
	$CNPJ = filter_var($_POST['CNPJ']);
	$pessoaContato = filter_var($_POST['pessoaContato']);
	$telefone = filter_var($_POST['telefone']);
	$email = filter_var($_POST['email']);
	$shopping = filter_var($_POST['shopping']);

	//inserindo os dados
	$update = $conectar->prepare("UPDATE loja SET nomeFantasia= :nomeFantasia, CNPJ= :CNPJ, pessoaContato= :pessoaContato, telefone=:telefone, email= :email, shopping= :shopping WHERE idLoja = :idLoja");

	$update->bindParam(':idLoja', $idLoja);
	$update->bindParam(':nomeFantasia', $nomeFantasia);
	$update->bindParam(':CNPJ', $CNPJ);
	$update->bindParam(':pessoaContato', $pessoaContato);
	$update->bindParam(':telefone', $telefone);
	$update->bindParam(':email', $email);
	$update->bindParam(':shopping', $shopping);
	$update->execute();

	header("location: editar-excluirLoja.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>