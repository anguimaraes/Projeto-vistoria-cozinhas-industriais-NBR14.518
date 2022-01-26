<?php 

include_once "../conexao.php";

try{
$idShop = filter_var($_GET['idShop'], FILTER_SANITIZE_NUMBER_INT);

             $consulta = $conectar->query("SELECT ativo_shop  FROM shop WHERE idShop like '$idShop%' ");
             $dadosShop = $consulta->FETCHALL(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                for ($i=0; $i < $total; $i++) { 
                     "<option>" . $dadosShop[$i]['ativo_shop'] . "</option> "; 
                


	if ($dadosShop[$i]['ativo_shop'] == 1) {
			echo"<script language='javascript' type='text/javascript'>alert('Não é possivel excluir um shopping com o status Ativo');window.location.href='editar-excluirShop.php';</script>";
	}else{


	$idShop = filter_var($_GET['idShop'], FILTER_SANITIZE_NUMBER_INT);

	//inserindo os dados
	$delete = $conectar->prepare("DELETE FROM shop WHERE idShop = :idShop");

	$delete->bindParam(':idShop', $idShop);
	$delete->execute();

	header("location: editar-excluirShop.php");
	}
}

}catch(PDOException $e){

	echo 'Erro: ' . $e->getMessage();

}

?>