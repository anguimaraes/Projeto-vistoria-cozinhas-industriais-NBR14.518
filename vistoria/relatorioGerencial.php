<?php  
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        $adm = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = '../index.php'</script>";
    }

    include_once "../conexao.php";


    $dataInicial = $_POST['dataInicial'];
    $dataFinal = $_POST['dataFinal'];


    if ($dataInicial > $dataFinal) {
            echo"<script language='javascript' type='text/javascript'>alert('A data inicial não pode ser maior que a data final');window.location.href='modalRelGen.php';</script>";
    }else{

    $consulta = $conectar->query("SELECT * FROM equipamentos WHERE dataVistoria BETWEEN('$dataInicial') AND ('$dataFinal')");
        $dadosData = $consulta->FETCHALL(PDO::FETCH_ASSOC);
        $total = $consulta->rowCount();
        for ($i=0; $i < $total; $i++) { 

            include "formRelatorioGerencial.php";
        }
    }

?>
    <center>
        <form method="post" action="../relatorios/gera_pdf_gerencial.php" target="_blank">
        <input type="hidden" name="dt_ini" value="<?php echo $dataInicial; ?>">
        <input type="hidden" name="dt_fim" value="<?php echo $dataFinal; ?>">
        <td align="center">
        <h4 id="h4PDFGen">Gerar todos os Relatórios em PDF</h4>             
        <input type="image" id="botaoPDFGen" src="../img/ico-pdf.png" style="width: 50px;" title="Gerar PDF">
        </td>        
        </form>
    </center>

<button class="threed" id="botaoVoltarPesquisaRelGen" ><a href="escolhaAgendamento.php">Voltar</a> </button>