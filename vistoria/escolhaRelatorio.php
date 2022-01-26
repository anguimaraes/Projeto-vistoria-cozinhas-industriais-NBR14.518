<?php  
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        $adm = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = '../index.php'</script>";
    }

include_once "../conexao.php";
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Escolha de Relatórios</title>

    <link rel="stylesheet" href="../estilos.css">
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">

</head>
<body>
    <form class="escolhaRelatorio" action="gerarPDFNum.php" method="post" target="_blank"> <!--gerarPDFNum-->
    <h3 id="numero">Escolha o tipo de Relatório</h3>

    <div class="RelNum">
        <label for="numero" id="lblNumero">Escolha por Número:</label>

        <select name="numero" id="numero">
            <?php
             $consulta = $conectar->query("SELECT numero, lojaVistoria, shoppingVistoria FROM equipamentos");
             $dadosRelNum = $consulta->FETCHALL(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                for ($i=0; $i < $total; $i++) { 
                    echo "<option>" . $dadosRelNum[$i]['numero'] . " - " . $dadosRelNum[$i]['lojaVistoria']. " ". "(" . $dadosRelNum[$i]['shoppingVistoria'] . ")" ."</option>";
                }

             ?>
        </select>
            <button class="threed" id="botaoRelNum" type="submit">Gerar por Número</button>
        </form>
    </div>


        <div class="RelShop">
        <label for="shoppingVistoria" id="lblShop">Escolha por Shopping:</label>
        <form method="post" action="gerarPDFShop.php" target="_blank">

        <select name="shoppingVistoria" id="shoppingVistoriaRel">
            <?php
             $consulta = $conectar->query("SELECT DISTINCT shoppingVistoria FROM equipamentos");
             $dadosShop = $consulta->FETCHALL(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                for ($i=0; $i < $total; $i++) { 
                    echo "<option>" . $dadosShop[$i]['shoppingVistoria'] . "</option> "; 
                }

             ?>
        </select>
        <button class="threed" id="botaoRelShop" target="_blank" type="submit">Gerar por Shopping</button>
    </form>
    </div>

            <div class="RelData">
        <label for="dataVistoria" id="lblData">Escolha pela Data:</label>
        <form method="post" action="GerarPDFData.php" target="_blank">

        <select name="dataVistoria" id="dataVistoria">
            <?php
             $consulta = $conectar->query("SELECT DISTINCT dataVistoria FROM equipamentos");
             $dadosData = $consulta->FETCHALL(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                for ($i=0; $i < $total; $i++) { 
                    $data_timestamp1 = strtotime($dadosData[$i][dataVistoria]);
                    $dadosData[$i][dataVistoria] = date("d/m/Y", $data_timestamp1);
                    echo "<option>" . $dadosData[$i]['dataVistoria'] . "</option> "; 
                }

             ?>
        </select>
        <button class="threed" id="botaoRelData" type="submit">Gerar por Data</button>
    </form>
    </div>
        <button class="threed" id="botaoCancelarRel" ><a href="escolhaAgendamento.php">Voltar</a> </button>
       
 
        
    </form>
</body>
</html>