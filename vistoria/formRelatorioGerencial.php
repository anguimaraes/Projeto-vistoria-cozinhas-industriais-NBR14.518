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

       <div>
        <label for="numero">Número da Vistoria:</label>
             <input type="text" name="numero" value="<?php echo $dadosData[$i]['numero']?>" id="numero" readonly/> 
    </div>


   <div class="esquerda">
        <label for="shoppingVistoria">Shopping:</label>
             <input type="text" name="shoppingVistoria" value="<?php echo $dadosData[$i]['shoppingVistoria']?>" id="shoppingVistoria" readonly/> 

    </div>


    <div class="direita">
        <label for="lojaVistoria">Loja:</label>
             <input type="text" name="lojaVistoria" value="<?php echo $dadosData[$i]['lojaVistoria']?>" id="lojaVistoria" readonly/> 

    </div>


    <div class="esquerda">
        <label for="nomeVistoriador">Nome do Vistoriador:</label>
             <input type="text" name="nomeVistoriador" value="<?php echo $dadosData[$i]['nomeVistoriador']?>" id="nomeVistoriador" readonly/> 

    </div>

      <div class="esquerda">
        <label for="dataVistoria">Data:</label>
        <input type="date" name="dataVistoria" value="<?php echo $dadosData[$i]['dataVistoria']?>" id="dataVistoria" readonly/>
    </div>

      <h3 id="cadastroShop">Sistema de Exaustão</h3>

    <div class="direita">
        <label for="coifa">Coifa:</label>
         <input type="text" name="coifa" value="<?php echo $dadosData[$i]['coifa']?>" id="coifaRel" readonly/>
    </div>

    <div class="esquerda">
        <label for="lavador">Lavador de Gases:</label>
        <input type="text" name="lavador" value="<?php echo $dadosData[$i]['lavador']?>" id="lavadorRel" readonly/>
    </div>

    <div class="direita">
        <label for="duto">Duto:</label>
        <input type="text" name="duto" value="<?php echo $dadosData[$i]['duto']?>" id="dutoRel" readonly/>
    </div>

      <div class="esquerda">
       <label for="exaustor">Exaustor:</label>
       <input type="text" name="exaustor" value="<?php echo $dadosData[$i]['exaustor']?>" id="exaustorRel" readonly/>
    </div>

    <h3 id="cadastroShop">Sistema de Co2</h3>

     <div class="direita">
      <label for="central">Central de combate a incêndio:</label>
       <input type="text" name="central" value="<?php echo $dadosData[$i]['central']?>" id="centralRel" readonly/>
    </div>

      <div class="esquerda">
       <label for="co2">Cilindro de Co2:</label>
       <input type="text" name="co2" value="<?php echo $dadosData[$i]['co2']?>" id="co2Rel" readonly/>
    </div>

    <div class="direita">
          <label for="saponaceo">Cilindro de saponáceo:</label>
          <input type="text" name="saponaceo" value="<?php echo $dadosData[$i]['saponaceo']?>" id="saponaceoRel" readonly/>
    </div>

    <div class="esquerda">
       <label for="damper">Damper corta-fogo:</label>
        <input type="text" name="damper" value="<?php echo $dadosData[$i]['damper']?>" id="damperRel" readonly/>
    </div>

    <div class="direita">
          <label for="desarmeEx">Desarme do Exaustor:</label>
          <input type="text" name="desarmeEx" value="<?php echo $dadosData[$i]['desarmeEx']?>" id="desarmeExRel" readonly/>
    </div>
    
    <div>

        <!--<button class="threed" id="botaoVoltarPesquisa" ><a href="editar-excluirVistoria.php">Voltar</a> </button>-->
    </div> 

    </form><br>
    
</body></html>