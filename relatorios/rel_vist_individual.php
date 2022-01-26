<?php  
    //cerificando se a sessão existe
    session_start();
    if(!isset($_SESSION['id_usuario'])){

        header("location: ../index.php");
        exit;
    }  
include_once "../conexao.php";
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Relatórios</title>

	<!--<link rel="stylesheet" href="../estilos.css">-->
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<?php $id=$_POST['id']; ?>
    
<p><a href="../telaInicial.php"><img src="img/home.png" style="width: 30px;" title="Página Inical"></a></p>
<h3 id="cadastroShop">Relatórios &#8226; Vistoria</h3>    

<div>
<p><center>
    
<table id="customers">
    <thead>
        
        <th>Shopping</th>
        <th>Loja</th>
        <th>Vistoriante</th>
        <th>Data</th>
        <th>Coifa</th>
        <th>Lavador</th>
        <th>Duto</th>
        <th>Exaustor</th>
        <th>Central</th>
        <th>CO2</th>
        <th>Saponaceo</th>
        <th>Damper</th>
        <th>Desarme</th>
        <th>Opções</th>
    </thead>
<tbody>
        
<?php

$busca_vistoria=$conectar->query("select * from equipamentos where idEquipamentos='$id' ");
$lin=$busca_vistoria->fetch(PDO::FETCH_OBJ);

    echo '<tr>
        <td>'.$lin->shoppingVistoria.'</td>
        <td>'.$lin->lojaVistoria.'</td>
        <td>'.$lin->nomeVistoriador.'</td>
        <td>'.strftime("%d/%m/%Y", strtotime($lin->dataVistoria)).'</td>        
        <td>'.$lin->coifa.'</td>        
        <td>'.$lin->lavador.'</td>
        <td>'.$lin->duto.'</td>
        <td>'.$lin->exaustor.'</td>
        <td>'.$lin->central.'</td>
        <td>'.$lin->co2.'</td>
        <td>'.$lin->saponaceo.'</td>
        <td>'.$lin->dumper.'</td>
        <td>'.$lin->desarmeEx.'</td>        
        <form method="post" action="gera_pdf.php" target="_blank">
        <input type="hidden" name="id" value="'.$lin->idEquipamentos.'">
        <td align="center">            
            <input type="image" src="img/ico_pdf.png" style="width: 30px;" title="Gerar PDF">
        </td>        
        </form>
    </tr>';
    
?>    
</tbody></table>
</center></p>    
</div>    

<p><a href="busca_relatorio.php">Voltar</a></p>
    
</body>
    
</html>