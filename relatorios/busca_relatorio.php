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
    
<p><a href="../telaInicial.php"><img src="img/home.png" style="width: 30px;" title="Página Inical"></a></p>
<h3 id="cadastroShop">Relatórios</h3>    

<div>
<p><center>
    
<table id="customers">
    <thead>
        <th>#</th>
        <th>Shopping</th>
        <th>Loja</th>
        <th>Vistoriante</th>
        <th>Data</th>
        <th>Opções</th>
    </thead>
<tbody>
        
<?php
$i=0;        
$busca_vistoria=$conectar->query("select * from equipamentos ORDER BY idEquipamentos DESC");
while($lin=$busca_vistoria->fetch(PDO::FETCH_OBJ))
{
    $i++;
    echo '<tr>
        <td>'.$i.'</td>
        <td>'.$lin->shoppingVistoria.'</td>
        <td>'.$lin->lojaVistoria.'</td>
        <td>'.$lin->nomeVistoriador.'</td>
        <td>'.strftime("%d/%m/%Y", strtotime($lin->dataVistoria)).'</td>        
        <form method="post" action="rel_vistoria.php">
        <input type="hidden" name="id" value="'.$lin->idEquipamentos.'">
        <td align="center">            
            <input type="image" src="img/lupa.png" style="width: 30px;" title="Exibir Vistoria">
        </td>        
        </form>
    </tr>';
}    
?>    
</tbody></table>
</center></p>    
</div>    

<p><a href="../telaInicial.php">Voltar</a></p>
    
</body>
    
</html>