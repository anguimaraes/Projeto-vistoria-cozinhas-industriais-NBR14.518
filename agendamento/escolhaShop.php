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
    <title>Cadastro de Vistoria</title>

    <link rel="stylesheet" href="../estilos.css">
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">


</head>
<body>
    <form class="escolhaShop" action="formAgendamento.php" method="post">
    <h3 id="cadastroShop">Escolha o Shopping</h3>

    <div class="meio">
        <label for="shoppingVistoria" id="lblShop">Shopping:</label>
        <form method="post" action="formCadastroVistoria.php">

        <select name="shoppingVistoria" id="shoppingVistoria">
            <?php
             $consulta = $conectar->query("SELECT razaoSocial, nomeFantasia, CNPJ, pessoaContato, telefone, email, endereco, bairro, municipio, uf, cep  FROM shop");
             $dadosShop = $consulta->FETCHALL(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                for ($i=0; $i < $total; $i++) { 
                    echo "<option>" . $dadosShop[$i]['nomeFantasia'] . "</option> "; 
                }

             ?>
        </select>
    </div>
        <button class="threed" id="botaoAvancar" type="submit">Avançar</button>
        <button class="threed" id="botaoCancelar" ><a href="../telaInicial.php">Voltar</a> </button>
       
 
        </form>
            </form>
</body>
</html>