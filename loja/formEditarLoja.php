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
	$idLoja = filter_var($_GET['idLoja'], FILTER_SANITIZE_NUMBER_INT);

	$consulta = $conectar->query("SELECT * FROM loja WHERE idLoja = '$idLoja'");
	$linha = $consulta->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Edição de cadastro Shopping</title>

	<link rel="stylesheet" href="../estilos.css">
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">

	<script>
//mascara telefone

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
    return document.getElementById( el );
}

//Mascara de CNPJ
function mascaraCnpj(a,b){
    v_obj2=a
    v_fun2=b
    setTimeout("execmascara2()",2)
}
 
function execmascara2(){
    v_obj2.value=v_fun2(v_obj2.value)
}
 
function mcnpj(c){
        c=c.replace(/^(\d{2})(\d)/,"$1.$2"); //Coloca ponto entre o segundo e o terceiro dígitos
        c=c.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3"); //Coloca ponto entre o quinto e o sexto dígitos
        c=c.replace(/\.(\d{3})(\d)/,".$1/$2"); //Coloca uma barra entre o oitavo e o nono dígitos
        c=c.replace(/(\d{4})(\d)/,"$1-$2"); //Coloca um hífen depois do bloco de quatro dígitos
            return c;
}
function id2( ol ){
    return document.getElementById( ol );
}

function id3( ul ){
    return document.getElementById( ul );
}
    window.onload = function(){
    id2('CNPJ').onkeyup = function(){
        mascaraCnpj( this, mcnpj );
        }
        id('telefone').onkeyup = function() {
         mascara(this, mtel);   
     }
}      
    </script>

</head>
<body>
<form class="cadastro" action="editarLoja.php" method="post">
    <h3 id="cadastroShop">Edição de Loja</h3>


<div class="esquerda">
        <label for="nomeFantasia">Nome Fantasia:</label>
        <input type="text" maxlength="20" name="nomeFantasia" value="<?php echo $linha['nomeFantasia']?>" id="nomeFantasia" />
    </div>

<div class="direita">
        <label for="CNPJ">CNPJ:</label>
        <input type="text" maxlength="18" name="CNPJ" value="<?php echo $linha['CNPJ']?>" id="CNPJ" /> 
    </div>

    <div class="esquerda">
        <label for="pessoaContato">Pessoa para contato:</label>
        <input type="text" maxlength="20" name="pessoaContato" value="<?php echo $linha['pessoaContato']?>" id="pessoaContato" />
    </div>

    <div class="direita">
        <label for="telefone">Telefone:</label>
        <input type="text" placeholder="Digite um número de telefone" maxlength="15" name="telefone" value="<?php echo $linha['telefone']?>" id="telefone" />
    </div>

    <div class="esquerda">
        <label for="email">Email:</label>
        <input type="text" maxlength="30" name="email" value="<?php echo $linha['email']?>" id="email" />
    </div>

    <div class="direita">
        <label for="shopping">Shopping:</label>
          <select type="text" name="shopping" id="shopping">
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

    <div>
    	<input type="hidden" name="idLoja" value="<?php echo $linha['idLoja']?>" >
        <button class="threed" id="botaoCadastro" type="submit">Editar</button>
        <button class="threed" id="botaoCancelar" ><a href="editar-excluirLoja.php">Cancelar</a> </button>
    </div> 



    </form>
</body>
</html>