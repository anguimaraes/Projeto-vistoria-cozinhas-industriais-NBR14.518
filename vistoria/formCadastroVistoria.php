<?php  
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        $adm = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = '../index.php'</script>";
    }

include_once "../conexao.php";

    $idAgenda = filter_var($_GET['idAgenda'], FILTER_SANITIZE_NUMBER_INT);

    $consulta = $conectar->query("SELECT * FROM agendamento WHERE idAgenda = '$idAgenda'");
    $linha = $consulta->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Vistoria</title>

	<link rel="stylesheet" href="../estilos.css">
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">


</head>
<body>
<form class="cadastroVistoria" action="cadastrarVistoria.php" method="post">
    <h3 id="cadastroShop">Vistoria</h3>

       <div>
        <label for="numero">Número da Vistoria:</label>
             <input type="text" name="numero" value="<?php echo $linha['numeroAgenda']?>" id="numero" readonly/> 
             <?php 
               $variavelphp = $linha['numeroAgenda']
              ?>
    </div>


       <div class="esquerda">
        <label for="shoppingVistoria">Shopping:</label>
             <input type="text" name="shoppingVistoria" value="<?php echo $linha['shoppingAgenda']?>" id="shoppingVistoria" readonly/> 
             <?php 
               $variavelphp = $linha['shoppingAgenda']
              ?>
    </div>

    <div class="direita">
        <label for="lojaVistoria">Loja:</label>
             <input type="text" name="lojaVistoria" value="<?php echo $linha['lojaAgenda']?>" id="lojaVistoria" readonly/> 
             <?php 
               $variavelphp = $linha['lojaAgenda']
              ?>
    </div>

    <div class="esquerda">
        <label for="nomeVistoriador">Nome do Vistoriador:</label>
             <input type="text" name="nomeVistoriador" value="<?php echo $linha['nomeAgenda']?>" id="nomeVistoriador" readonly/> 
             <?php 
               $variavelphp = $linha['nomeAgenda']
              ?>
    </div>

      <div class="esquerda">
        <label for="dataVistoria">Data:</label>
        <input type="date" name="dataVistoria" value="<?php echo $linha['dataAgenda']?>" id="dataVistoria" readonly/>
    </div>

    <h3 id="cadastroShop">Sistema de Exaustão</h3>

    <div class="direita">
        <label for="coifa">Coifa:</label>
        <select name="coifa" id="coifa">
            <option value="Filtros Inerciais ok">Filtros Inerciais ok</option>
            <option value="Filtros Inerciais sujos">Filtros Inerciais sujos</option>
            <option value="Filtros Inerciais invertidos">Filtros Inerciais invertidos</option>
            <option value="Filtros Inerciais não completos">Filtros Inerciais não completos</option>
            <option value="Filtros Inerciais inexistentes">Filtros Inerciais inexistentes</o1tion>
        </select>
    </div>

    <div class="esquerda">
        <label for="lavador">Lavador de Gases:</label>
        <select name="lavador" id="lavador">
            <option value="Lavador de gases ok">Lavador de gases ok</option>
            <option value="Lavador de gases inoperante">Lavador de gases inoperante</option>
            <option value="Não possui lavador de gases">Não possui lavador de gases</option>
        </select>
    </div>

    <div class="direita">
        <label for="duto">Duto:</label>
        <select name="duto" id="duto">
            <option value="Duto ok">Duto ok</option>
            <option value="Duto não possui portas de inspeção">Duto não possui portas de inspeção</option>
            <option value="Duto sujo">Duto sujo</option>
        </select>
    </div>

      <div class="esquerda">
       <label for="exaustor">Exaustor:</label>
        <select name="exaustor" id="exaustor">
            <option value="Exaustor ok">Exaustor ok</option>
            <option value="Exaustor inoperante">Exaustor inoperante</option>
            <option value="Exaustor sem proteção de polia">Exaustor sem proteção de polia</option>
        </select>
    </div>

    <h3 id="cadastroShop">Sistema de Co2</h3>

     <div class="direita">
      <label for="central">Central de combate a incêndio:</label>
        <select name="central" id="central">
            <option value="Central ok">Central ok</option>
            <option value="Central inoperânte">Central inoperânte</option>
            <option value="Central alarmada mas sem sinal sonoro">Central alarmada mas sem sinal sonoro</option>
            <option value="Central com sinal sonoro mas não alarmada">Central com sinal sonoro mas não alarmada</option>
        </select>
    </div>

      <div class="esquerda">
       <label for="co2">Cilindro de Co2:</label>
        <select name="co2" id="co2">
            <option value="Cilindro ok">Cilindro ok</option>
            <option value="Co2 não disparado">Co2 não disparado</option>
            <option value="Cilindro com validade vencida">Cilindro com validade vencida</option>
            <option value="Não possui cilindro de Co2">Não possui cilindro de Co2</option>
        </select>
    </div>

    <div class="direita">
          <label for="saponaceo">Cilindro de saponáceo:</label>
        <select name="saponaceo" id="saponaceo">
            <option value="Cilindro ok">Cilindro ok</option>
            <option value="Saponáceo não disparado">Saponáceo não disparado</option>
            <option value="Cilindro com validade vencida">Cilindro com validade vencida</option>
            <option value="Não possui cilindro de saponáceo">Não possui cilindro de saponáceo</option>
        </select>
    </div>

    <div class="esquerda">
       <label for="damper">Damper corta-fogo:</label>
        <select name="damper" id="damper">
            <option value="Damper corta-fogo acionado">Damper corta-fogo acionado</option>
            <option value="Damper corta-fogo não acionado">Damper corta-fogo não acionado</option>
            <option value="Não possui Damper corta-fogo">Não possui Damper corta-fogo</option>
        </select>
    </div>

    <div class="direita">
          <label for="desarmeEx">Desarme do Exaustor:</label>
        <select name="desarmeEx" id="desarmeEx">
            <option value="Exaustor desarmou">Exaustor desarmou</option>
            <option value="Exaustor não desarmou">Exaustor não desarmou</option>
        </select>
    </div>



    <div>
        <button class="threed" id="botaoCadastro" type="submit">Cadastrar</button>
        <button class="threed" id="botaoCancelar" ><a href="../telaInicial.php">Cancelar</a> </button>
        <button class="threed" id="botaoEdita"><a href="editar-excluirVistoria.php">Editar ou Excluir</button>
        <!--<button class="threed" id="botaoRelatorio"><a href="escolhaRelatorio.php">Gerar relatório PDF</button>-->
    </div> 



    </form>
</body>
</html>