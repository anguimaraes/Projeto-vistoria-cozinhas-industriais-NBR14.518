<?php 
	session_start();

	if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
		$adm = $_SESSION["usuario"][1];
		$nome = $_SESSION["usuario"][0];
	}else{
		echo "<script>window.location = '../index.php'</script>";
	}
	
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Cadastro de Usuários</title>

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

//Mascara de CPF
function mascaraCpf(a,b){
    v_obj2=a
    v_fun2=b
    setTimeout("execmascara2()",2)
}
 
function execmascara2(){
    v_obj2.value=v_fun2(v_obj2.value)
}
 
function mcpf(c){
        c=c.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
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
    id2('cpf').onkeyup = function(){
        mascaraCpf( this, mcpf );
        }
        id('telefone').onkeyup = function() {
         mascara(this, mtel);   
     }
       id3('cep').onkeyup = function() {
         mascaraCep(this, mcep);   
     }
}
        </script>

</head>
<body>
<form class="cadastro" action="cadastrarUsuario.php" method="post">
    <h3 id="cadastroShop">Cadastro de Vistoriadores</h3>
    <h6>* O preenchimento de todos os campos é obrigatório</h6>
    <div class="esquerda">
        <label for="nome">Nome Completo:</label>
        <input type="text" name="nome" required="required" maxlength="100" id="nome" autofocus="true" />
    </div>

<div class="direita">
        <label for="email">Email:</label>
        <input type="email" name="email" required="required" id="email" maxlength="100" placeholder="exemplo@exemplo.com" />
    </div>


<div class="esquerda">
        <label for="telefone">Telefone:</label>
        <input type="text" placeholder="Digite somente números" maxlength="15" name="telefone" required="required" id="telefone">
    </div>

    <div class="esquerda">
        <label for="cpf">CPF:</label>
        <input type="text" class="form-control bg-white border-1 custom-shadow custom-radius cpf_cnpj" placeholder="Digite somente números" maxlength="14" name="cpf" required="required" id="cpf" />
    </div>

    <div class="direita">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required="required" maxlength="100" id="endereco" />
    </div>

    <div class="esquerda">
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" required="required" maxlength="30" id="cidade" />
    </div>

    <div class="direita">
        <label for="uf">UF:</label>
        <input type="text" name="uf" required="required" id="uf" maxlength="2" />
    </div>

      <div class="esquerda">
        <label for="cep">CEP:</label>
        <input type="text" name="cep" maxlength="10" required="required" id="cep" placeholder="Digite somente números"/>
    </div>

     <div class="direita">
        <label for="adm">Nivel de acesso:</label>
        <select name="adm" required="required" id="adm">
            <option value="1">Usuario Adm</option>
            <option value="0">Usuario Vistoriador</option>
        </select>
    </div>

      <div class="esquerda">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required="required" placeholder="Exemplo123*" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,50}$).*$" id="senha" />
    </div>

    <p id="obsSenha">* A Senha deve conter minimo de 8 caracteres com:<br>&nbsp Letra maiuscula,minuscula, número e caracter especial</p>


    <div>
        <button class="threed" id="botaoCadastroUs" type="submit">Cadastrar</button>
        <button class="threed" id="botaoCancelar" ><a href="../telaInicial.php">Cancelar</a> </button>
        <button class="threed" id="botaoEdita"><a href="pesquisarUsuario.php">Pesquisar Usuário</button>
    </div> 



    </form>
</body>
</html>

