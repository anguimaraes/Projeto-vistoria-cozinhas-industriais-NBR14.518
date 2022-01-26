<?php 
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        $adm = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'index.php'</script>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Alerta</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logoStand.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Loja Cadastrada com sucesso!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Deseja cadastrar uma nova loja?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"><a href="formCadastroLoja.php">Cadastrar nova loja</a></button>
                        <button type="button" class="btn btn-default"><a href="../telaInicial.php">Finalizar</a></button>
                    </div>
                </div>

            </div>
        </div>

    </div>

<script type="text/javascript">
    $('#myModal').modal('show')
</script>

</body>

</html>