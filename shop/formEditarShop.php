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
	$idShop = filter_var($_GET['idShop'], FILTER_SANITIZE_NUMBER_INT);

	$consulta = $conectar->query("SELECT * FROM shop WHERE idShop = '$idShop'");
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

//Mascara de CEP
function mascaraCep(d,e){
    v_obj3=d
    v_fun3=e
    setTimeout("execmascara3()",3)
}
 
function execmascara3(){
    v_obj3.value=v_fun3(v_obj3.value)
}
 
function mcep(f){
        f=f.replace(/\D/g,"");
        f=f.replace(/^(\d{2})(\d)/,"$1.$2");
        f=f.replace(/\.(\d{3})(\d)/,".$1-$2");
            return f;
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
       id3('cep').onkeyup = function() {
         mascaraCep(this, mcep);   
     }
}
        </script>

        
    </script>

</head>
<body>
<form class="cadastro" action="editarShop.php" method="post">
    <h3 id="cadastroShop">Edição de Shopping</h3>

    <div class="esquerda">
        <label for="razaoSocial">Razão Social:</label>
        <input type="text" maxlength="50" name="razaoSocial" value="<?php echo $linha['razaoSocial']?>"  id="razaoSocial" autofocus="true" />
    </div>

<div class="direita">
        <label for="nomeFantasia">Nome Fantasia:</label>
        <input type="text" maxlength="20" name="nomeFantasia" value="<?php echo $linha['nomeFantasia']?>" id="nomeFantasia" />
    </div>


<div class="esquerda">
        <label for="CNPJ">CNPJ:</label>
        <input type="text" name="CNPJ" maxlength="18" value="<?php echo $linha['CNPJ']?>" id="CNPJ" /> 
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
        <label for="endereco">Endereço:</label>
        <input type="text" maxlength="50" name="endereco" value="<?php echo $linha['endereco']?>" id="endereco" />
    </div>

      <div class="esquerda">
        <label for="bairro">Bairro:</label>
        <input type="text" maxlength="20" name="bairro" value="<?php echo $linha['bairro']?>" id="bairro" />
    </div>

     <div class="direita">
        <label for="municipio">Município:</label>
        <input type="text" maxlength="30" name="municipio" value="<?php echo $linha['municipio']?>" id="municipio" />
    </div>

      <div class="esquerda">
        <label for="uf">UF:</label>
        <input type="text" name="uf" maxlength="2" value="<?php echo $linha['uf']?>" id="uf" />
    </div>

    <div class="direita">
        <label for="cep">CEP:</label>
        <input type="text" maxlength="10" name="cep" value="<?php echo $linha['cep']?>" id="cep" />
    </div>

        <div class="esquerda">
        <label for="ativo_shop">Status do shopping:</label>
        <select name="ativo_shop" id="ativo_shop">
            <option value="1">Shopping Ativo</option>
            <option value="0">Shopping Inativo</option>
        </select>
    </div>



    <div>
    	<input type="hidden" name="idShop" value="<?php echo $linha['idShop']?>" >
        <button class="threed" id="botaoCadastro" type="submit">Editar</button>
        <button class="threed" id="botaoCancelar" ><a href="editar-excluirShop.php">Cancelar</a> </button>
    </div> 



    </form>
</body>
</html>