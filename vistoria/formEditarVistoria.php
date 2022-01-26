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
	<title>Edição de cadastro Vistoria</title>

	<link rel="stylesheet" href="../estilos.css">
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">

</head>
<body>
<form class="cadastroVistoria" action="editarVistoria.php" method="post">
    <h3 id="cadastroShop">Vistoria</h3>

    <?php 
        $_SERVER["REQUEST_METHOD"] == 'POST';

        if (isset($_POST['shoppingVistoria'])) {
    
        $variavelphp = $_POST['shoppingVistoria'];
    }

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
        <select name="coifa" id="coifa">
            <option value="Filtros Inerciais ok" <?php echo selected( 'Filtros Inerciais ok', $linha['coifa']); ?>>Filtros Inerciais ok</option>
            <option value="Filtros Inerciais sujos" <?php echo selected( 'Filtros Inerciais sujos', $linha['coifa']); ?>>Filtros Inerciais sujos</option>
            <option value="Filtros Inerciais invertidos" <?php echo selected( 'Filtros Inerciais invertidos', $linha['coifa']); ?>>Filtros Inerciais invertidos</option>
            <option value="Filtros Inerciais não completos" <?php echo selected( 'Filtros Inerciais não completos', $linha['coifa']); ?>>Filtros Inerciais não completos</option>
            <option value="Filtros Inerciais inexistentes" <?php echo selected( 'Filtros Inerciais inexistentes', $linha['coifa']); ?>>Filtros Inerciais inexistentes</option>
        </select>
    </div>

    <div class="esquerda">
        <label for="lavador">Lavador de Gases:</label>
        <select name="lavador" id="lavador">
            <option value="Lavador de gases ok" <?php echo selected( 'Lavador de gases ok', $linha['lavador']); ?>>Lavador de gases ok</option>
            <option value="Lavador de gases inoperante" <?php echo selected( 'Lavador de gases inoperante', $linha['lavador']); ?>>Lavador de gases inoperante</option>
            <option value="Não possui lavador de gases" <?php echo selected( 'Não possui lavador de gases', $linha['lavador']); ?>>Não possui lavador de gases</option>
        </select>
    </div>

    <div class="direita">
        <label for="duto">Duto:</label>
        <select name="duto" id="duto">
            <option value="Duto ok" <?php echo selected( 'Duto ok', $linha['duto']); ?>>Duto ok</option>
            <option value="Duto não possui portas de inspeção" <?php echo selected( 'Duto não possui portas de inspeção', $linha['duto']); ?>>Duto não possui portas de inspeção</option>
            <option value="Duto sujo" <?php echo selected( 'Duto sujo', $linha['duto']); ?>>Duto sujo</option>
        </select>
    </div>

      <div class="esquerda">
       <label for="exaustor">Exaustor:</label>
        <select name="exaustor" id="exaustor">
            <option value="Exaustor ok" <?php echo selected( 'Exaustor ok', $linha['exaustor']); ?>>Exaustor ok</option>
            <option value="Exaustor inoperante" <?php echo selected( 'Exaustor inoperante', $linha['exaustor']); ?>>Exaustor inoperante</option>
            <option value="Exaustor sem proteção de polia" <?php echo selected( 'Exaustor sem proteção de polia', $linha['exaustor']); ?>>Exaustor sem proteção de polia</option>
        </select>
    </div>

    <h3 id="cadastroShop">Sistema de Co2</h3>

     <div class="direita">
      <label for="central">Central de combate a incêndio:</label>
        <select name="central" id="central">
            <option value="Central ok" <?php echo selected( 'Central ok', $linha['central']); ?>>Central ok</option>
            <option value="Central inoperânte" <?php echo selected( 'Central inoperânte', $linha['central']); ?>>Central inoperânte</option>
            <option value="Central alarmada mas sem sinal sonoro" <?php echo selected( 'Central alarmada mas sem sinal sonoro', $linha['central']); ?>>Central alarmada mas sem sinal sonoro</option>
            <option value="Central com sinal sonoro mas não alarmada" <?php echo selected( 'Central com sinal sonoro mas não alarmada', $linha['central']); ?>>Central com sinal sonoro mas não alarmada</option>
        </select>
    </div>

      <div class="esquerda">
       <label for="co2">Cilindro de Co2:</label>
        <select name="co2" id="co2">
            <option value="Cilindro ok" <?php echo selected( 'Cilindro ok',$linha['co2']); ?>>Cilindro ok</option>
            <option value="Co2 não disparado" <?php echo selected( 'Co2 não disparado',$linha['co2']); ?>>Co2 não disparado</option>
            <option value="Cilindro com validade vencida" <?php echo selected( 'Cilindro com validade vencida',$linha['co2']); ?>>Cilindro com validade vencida</option>
            <option value="Não possui cilindro de Co2" <?php echo selected( 'Não possui cilindro de Co2',$linha['co2']); ?>>Não possui cilindro de Co2</option>
        </select>
    </div>

    <div class="direita">
          <label for="saponaceo">Cilindro de saponáceo:</label>
        <select name="saponaceo" id="saponaceo">
            <option value="Cilindro ok" <?php echo selected( 'Cilindro ok',$linha['saponaceo']); ?>>Cilindro ok</option>
            <option value="Saponáceo não disparado" <?php echo selected( 'Saponáceo não disparado',$linha['saponaceo']); ?>>Saponáceo não disparado</option>
            <option value="Cilindro com validade vencida" <?php echo selected( 'Cilindro com validade vencida',$linha['saponaceo']); ?>>Cilindro com validade vencida</option>
            <option value="Não possui cilindro de saponáceo" <?php echo selected( 'Não possui cilindro de saponáceo',$linha['saponaceo']); ?>>Não possui cilindro de saponáceo</option>
        </select>
    </div>

    <div class="esquerda">
       <label for="damper">Damper corta-fogo:</label>
        <select name="damper" id="damper">
            <option value="Damper corta-fogo acionado" <?php echo selected( 'Damper corta-fogo acionado',$linha['damper']); ?>>Damper corta-fogo acionado</option>
            <option value="Damper corta-fogo não acionado" <?php echo selected( 'Damper corta-fogo não acionado',$linha['damper']); ?>>Damper corta-fogo não acionado</option>
            <option value="Não possui Damper corta-fogo" <?php echo selected( 'Não possui Damper corta-fogo',$linha['damper']); ?>>Não possui Damper corta-fogo</option>
        </select>
    </div>

    <div class="direita">
          <label for="desarmeEx">Desarme do Exaustor:</label>
        <select name="desarmeEx" value="<?php echo $linha['desarmeEx']?>" id="desarmeEx">
            <option value="Exaustor desarmou" <?php echo selected( 'Exaustor desarmou',$linha['desarmeEx']); ?>>Exaustor desarmou</option>
            <option value="Exaustor não desarmou" <?php echo selected( 'Exaustor não desarmou',$linha['desarmeEx']); ?>>Exaustor não desarmou</option>
        </select>
    </div>




    <div>
    	<input type="hidden" name="idEquipamentos" value="<?php echo $linha['idEquipamentos']?>" >
        <button class="threed" id="botaoEditarVistoria" type="submit">Editar</button>
        <button class="threed" id="botaoCancelarVistoria" ><a href="editar-excluirVistoria.php">Cancelar</a> </button>
    </div> 



    </form>
</body>
</html>