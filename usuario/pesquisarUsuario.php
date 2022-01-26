<?php 
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        $adm = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = '../index.php'</script>";
    }
    
?>

<link rel="stylesheet" href="../estilos.css">
<link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">

<h2 id="consulta">Consultar ou Excluir</h2>

<form method="post" id="botao-pesquisa" action="pesquisarUsuario.php">
     <input type="search" name="busca" placeholder="Pesquisa pelo nome do usuário" autofocus="true"/>
    <button type="submit">Buscar</button>
</form> 


<?php 

include_once "../conexao.php";
   try{

    if (isset($_POST['nome'])) {
      $nome = $_POST['busca'];
    }
  

  $consulta = $conectar->query("SELECT idUsuario, nome, email, telefone, cpf, endereco, cidade, uf, cep, adm FROM usuarios WHERE nome like '$nome%'");


echo "<table id=tituloEditar><tr><td>Nome</td><td>Email</td><td>Telefone</td><td>CPF</td><td>Endereco</td><td>Cidade</td><td>UF</td><td>CEP</td><td>Tipo de Usuário</td><td>Ações</td></tr> </table>";


    while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

        /*if ($linha[adm] == 1) {
            $linha[adm] = "Usuario Adm";
        }else{
           $linha[adm] = "Usuario Vistoriador"; 
        }*/


         echo "<table id=corpoEditar><tr><td>$linha[nome]</td><td>$linha[email]</td><td>$linha[telefone]</td><td>$linha[cpf]</td><td>$linha[endereco]</td><td>$linha[cidade]</td><td>$linha[uf]</td><td>$linha[cep]</td><td>$linha[adm]</td><td><button id=botaoExcluir><a href='excluirUsuario.php?idUsuario=$linha[idUsuario]'>Excluir</a></button></td></tr>";
    }

    echo "</table>";

    echo $consulta->rowCount() . " Registros Exibidos" . "<br>";


}catch(PDOException $e){

    echo $e->getMessage();

}

?>

 <button class="threed" id="botaoVoltarPesquisa"><a href="../telaInicial.php">Voltar</a> </button>




