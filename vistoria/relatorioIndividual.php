<?php  
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        $adm = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = '../index.php'</script>";
    }

	include_once "../conexao.php";

	//Garantindo que só vai aceitar se o id for um número inteiro
	$idEquipamentos = filter_var($_GET['idEquipamentos'], FILTER_SANITIZE_NUMBER_INT);

	$consulta = $conectar->query("SELECT * FROM equipamentos WHERE idEquipamentos = '$idEquipamentos'");
	$linha = $consulta->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Relatório de Vistoria</title>

	<link rel="stylesheet" href="../estilos.css">
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">

</head>
<body>
<form class="cadastroVistoria" action="#" method="post">
    <h3 id="cadastroShop">Vistoria</h3>

    <?php 

       //Função para aparecer o select escolhido
        function selected( $value, $selected ){
        return $value==$selected ? ' selected="selected"' : '';
    }
     ?>

       <div>
        <label for="numero">Número da Vistoria:</label>
             <input type="text" name="numero" value="<?php echo $linha['numero']?>" id="numero" readonly/> 
             <?php 
               $variavelphp = $linha['numero']
              ?>
    </div>


   <div class="esquerda">
        <label for="shoppingVistoria">Shopping:</label>
             <input type="text" name="shoppingVistoria" value="<?php echo $linha['shoppingVistoria']?>" id="shoppingVistoria" readonly/> 
             <?php 
               $variavelphp = $linha['shoppingVistoria']
              ?>
    </div>


    <div class="direita">
        <label for="lojaVistoria">Loja:</label>
             <input type="text" name="lojaVistoria" value="<?php echo $linha['lojaVistoria']?>" id="lojaVistoria" readonly/> 
             <?php 
               $variavelphp = $linha['lojaVistoria']
              ?>
    </div>


    <div class="esquerda">
        <label for="nomeVistoriador">Nome do Vistoriador:</label>
             <input type="text" name="nomeVistoriador" value="<?php echo $linha['nomeVistoriador']?>" id="nomeVistoriador" readonly/> 
             <?php 
               $variavelphp = $linha['nomeVistoriador']
              ?>
    </div>

    <div class="esquerda">
        <label for="dataVistoria">Data:</label>
        <input type="date" name="dataVistoria" value="<?php echo $linha['dataVistoria']?>" id="dataVistoria" readonly/>
    </div>

      <h3 id="cadastroShop">Sistema de Exaustão</h3>

    <div class="direita">
        <label for="coifa">Coifa:</label>
         <input type="text" name="coifa" value="<?php echo $linha['coifa']?>" id="coifaRel" readonly/>
    </div>

    <div class="esquerda">
        <label for="lavador">Lavador de Gases:</label>
        <input type="text" name="lavador" value="<?php echo $linha['lavador']?>" id="lavadorRel" readonly/>
    </div>

    <div class="direita">
        <label for="duto">Duto:</label>
        <input type="text" name="duto" value="<?php echo $linha['duto']?>" id="dutoRel" readonly/>
    </div>

      <div class="esquerda">
       <label for="exaustor">Exaustor:</label>
       <input type="text" name="exaustor" value="<?php echo $linha['exaustor']?>" id="exaustorRel" readonly/>
    </div>

    <h3 id="cadastroShop">Sistema de Co2</h3>

     <div class="direita">
      <label for="central">Central de combate a incêndio:</label>
       <input type="text" name="central" value="<?php echo $linha['central']?>" id="centralRel" readonly/>
    </div>

      <div class="esquerda">
       <label for="co2">Cilindro de Co2:</label>
       <input type="text" name="co2" value="<?php echo $linha['co2']?>" id="co2Rel" readonly/>
    </div>

    <div class="direita">
          <label for="saponaceo">Cilindro de saponáceo:</label>
          <input type="text" name="saponaceo" value="<?php echo $linha['saponaceo']?>" id="saponaceoRel" readonly/>
    </div>

    <div class="esquerda">
       <label for="damper">Damper corta-fogo:</label>
        <input type="text" name="damper" value="<?php echo $linha['damper']?>" id="damperRel" readonly/>
    </div>

    <div class="direita">
          <label for="desarmeEx">Desarme do Exaustor:</label>
          <input type="text" name="desarmeEx" value="<?php echo $linha['desarmeEx']?>" id="desarmeExRel" readonly/>
    </div>

    <div>
    	<input type="hidden" name="idEquipamentos" value="<?php echo $linha['idEquipamentos']?>" >
                    <button class="threed" id="botaoVoltarPesquisaRel" ><a href="editar-excluirVistoria.php">Voltar</a> </button>

    </div> 


    </form>
    
    <br>
    
    <div>
    <center>
        
        <form method="post" action="../relatorios/gera_pdf.php" target="_blank">
        <input type="hidden" name="id" value="<?php echo $idEquipamentos; ?>">
        <td align="center">
            <h4 id="h4PDF">Gerar Relatório PDF</h4>            
            <input type="image" id="botaoPDF" src="../img/ico-pdf.png" style="width: 50px;" title="Gerar PDF">
        </td>        
        </form>
        
    </center>
    </div>
        
    
</body>
</html>