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
	<title>Cadastro de Loja</title>

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
<form class="cadastro" action="cadastrarLoja.php" method="post">
    <h3 id="cadastroShop">Cadastro de Loja</h3>
    <h6>* O preenchimento de todos os campos é obrigatório</h6>
    <div class="esquerda">
        <label for="nomeFantasia">Nome Fantasia:</label>
        <input type="text" name="nomeFantasia" id="nomeFantasia" maxlength="20" autofocus="true" required="required"/>
    </div>


<div class="direita">
        <label for="CNPJ">CNPJ:</label>
        <input type="text" name="CNPJ" maxlength="18" id="CNPJ" required="required" placeholder="Digite somente números"/> 
    </div>

    <div class="esquerda">
        <label for="pessoaContato">Pessoa para contato:</label>
        <input type="text" name="pessoaContato" id="pessoaContato" maxlength="20" required="required"/>
    </div>

    <div class="direita">
        <label for="telefone">Telefone:</label>
        <input type="text" placeholder="Digite somente números" maxlength="15" name="telefone" id="telefone" required="required"/>
    </div>

    <div class="esquerda">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" maxlength="30" placeholder="exemplo@exemplo.com" required="required"/>
    </div>

    <div class="direita">
        <label for="shopping">Shopping:</label>
        <select type="text" name="shopping" id="shopping" >
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
        <button class="threed" id="botaoCadastro" type="submit">Cadastrar</button>
        <button class="threed" id="botaoCancelar" ><a href="../telaInicial.php">Cancelar</a> </button>
        <button class="threed" id="botaoEdita"><a href="editar-excluirLoja.php">Editar ou Excluir</button>
        <!--<button class="threed" id="botaoRelatorio"><a href="gerarPDF.php" target="_blank">Gerar relatório PDF</button>-->
    </div> 



    </form>
</body>
</html>
