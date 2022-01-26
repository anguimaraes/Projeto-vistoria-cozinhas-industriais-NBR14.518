<?php 

include_once "../conexao.php";

try{
	
	$nomeFantasia = filter_var($_POST['nomeFantasia']);
	$CNPJ = filter_var($_POST['CNPJ']);
	$pessoaContato = filter_var($_POST['pessoaContato']);
	$telefone = filter_var($_POST['telefone']);
	$email = filter_var($_POST['email']);
	$shopping = filter_var($_POST['shopping']);

	$consulta = $conectar->query("SELECT idShop FROM shop WHERE nomeFantasia like '$shopping%'");
             $dadosAgen = $consulta->FETCHALL(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                for ($i=0; $i < $total; $i++) { 
                   $id_Shop = $dadosAgen[$i]['idShop'];
                   
                  }
	
	//inserindo os dados
	$insert = $conectar->prepare("INSERT INTO loja (nomeFantasia, CNPJ, pessoaContato, telefone, email, shopping, id_Shop) VALUES( :nomeFantasia, :CNPJ, :pessoaContato, :telefone, :email, :shopping, :id_Shop)");
	

	$insert->bindvalue(':nomeFantasia', $nomeFantasia);
	$insert->bindvalue(':CNPJ', $CNPJ);
	$insert->bindvalue(':pessoaContato', $pessoaContato);
	$insert->bindvalue(':telefone', $telefone);
	$insert->bindvalue(':email', $email);
	$insert->bindvalue(':shopping', $shopping);
	$insert->bindvalue(':id_Shop', $id_Shop);

	$insert->execute();
	

	header("location: modalLoja.php");

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>