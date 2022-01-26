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
<form class="cadastroVistoria" action="agendamento.php" method="post">
    <h3 id="cadastroShop">Agendamento de ordem de serviço</h3>

    <?php 
        $_SERVER["REQUEST_METHOD"] == 'POST';

        if (isset($_POST['shoppingVistoria'])) {
    
        $variavelphp = $_POST['shoppingVistoria'];

    }
     ?>
        <div>
            <label for="numero"> Ordem de serviço:</label>
            <input type="text" name="numeroAgenda" value="<?php echo uniqid(), PHP_EOL; ?>" id="numero" readonly/>
        </div>

         <div class="esquerda"> 
            <label for="shoppingVistoria">Shopping:</label>
             <input type="text" name="shoppingAgenda" value="<?php echo $variavelphp?>" id="shoppingVistoria" readonly/> 
        </div>  


<div class="direita">
        <label for="lojaVistoria">Loja:</label>
        <select name="lojaAgenda" id="lojaVistoria">
            <?php
             $consulta = $conectar->query("SELECT loja.nomeFantasia FROM shop RIGHT JOIN loja ON idShop = id_Shop WHERE shopping = '$variavelphp'");
             $dadosLoja = $consulta->FETCHALL(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                for ($i=0; $i < $total; $i++) { 
                        echo "<option>" . $dadosLoja[$i]['nomeFantasia'] . "</option> "; 
                }
             ?>
        </select>  
    </div>

<div class="esquerda">
        <label for="nomeVistoriador">Nome do Vistoriador:</label>
        <select name="nomeAgenda" id="nomeVistoriador">
            <?php
             $consulta = $conectar->query("SELECT nome  FROM usuarios");
             $dadosShop = $consulta->FETCHALL(PDO::FETCH_ASSOC);
                $total = $consulta->rowCount();
                for ($i=0; $i < $total; $i++) { 
                    echo "<option>" . $dadosShop[$i]['nome'] . "</option> "; 
                }
             ?>
        </select>
    </div>

      <div class="esquerda">
        <label for="dataVistoria">Data:</label>
        <input type="date" name="dataAgenda" id="dataVistoriaAgen" value='<?php echo date("Y-m-d"); ?>' />
    </div>

   

    <div>
        <button class="threed" id="botaoCadastro" type="submit">Cadastrar</button>
        <button class="threed" id="botaoCancelar" ><a href="../telaInicial.php">Cancelar</a> </button>
        <button class="threed" id="botaoEdita"><a href="editar-excluirAgendamento.php">Excluir Agendamentos</button>
    </div> 



    </form>
</body>
</html>