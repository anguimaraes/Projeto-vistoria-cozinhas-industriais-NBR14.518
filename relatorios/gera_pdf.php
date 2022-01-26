<?php

// cerificando se a sessão existe
// session_start();
//if(!isset($_SESSION['id_usuario'])){

//    header("location: ../index.php");
//    exit;
//}  
include_once "../conexao.php";

$id=$_POST['id'];

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$stylesheet = file_get_contents('pdf.css');

$busca_vistoria=$conectar->query("select * from equipamentos where idEquipamentos='$id'");
$lin=$busca_vistoria->fetch(PDO::FETCH_OBJ);

$mpdf->WriteHTML('<center>');
$html = '<img src="../imagens/logoStand.jpeg"/ width="10%">';
$mpdf->WriteHTML($html);
$mpdf->WriteHTML('<h2 style="text-align: center;">Relatório de Vistoria</h2>');
$mpdf->WriteHTML('<span><strong>Número da Vistoria:</strong> '.$lin->numero.'</span>');
$mpdf->WriteHTML('</center>');
$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('<table width="100%">');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Shopping:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->shoppingVistoria.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Loja:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->lojaVistoria.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Vistoriante:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->nomeVistoriador.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Data:</b></td>');
$mpdf->WriteHTML('<td>'.strftime("%d/%m/%Y", strtotime($lin->dataVistoria)).'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('</table>');

//$mpdf->WriteHTML('<h2><center>Equipamentos</center></h2>');

$mpdf->WriteHTML('<br><br><br><br>');

$mpdf->WriteHTML('<p><span style="font-size: 18px; font-weight: bold; text-align: center; text-decoration: underline;">Sistema de Exaustão</span></p>');

$mpdf->WriteHTML('<table width="100%">');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Coifa:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->coifa.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Lavador:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->lavador.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Duto:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->duto.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Exaustor:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->exaustor.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Central:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->central.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('</table>');

$mpdf->WriteHTML('<br><br><br><br>');
    
$mpdf->WriteHTML('<p><span style="font-size: 18px; font-weight: bold; text-align: center; text-decoration: underline;">Sistema de CO2</span></p>');

$mpdf->WriteHTML('<table width="100%">');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Central de Combate a Incêndio:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->central.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Saponaceo:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->saponaceo.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Cilindro de CO2:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->co2.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Dumper:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->damper.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('<tr>');
$mpdf->WriteHTML('<td align="right"><b>Desarme Exaustor:</b></td>');
$mpdf->WriteHTML('<td>'.$lin->desarmeEx.'</td>');
$mpdf->WriteHTML('</tr>');
$mpdf->WriteHTML('</table>');
            $footer = "<table width=\"1000\">
                   <tr>
                     <td style='font-size: 18px; padding-bottom: 20px;' align=\"right\">Página: {PAGENO}</td>
                   </tr>
                 </table>";

$mpdf->SetHTMLFooter($footer);
    $css = file_get_contents("css/minu.css");
    $mpdf->WriteHTML($css,1);
  

$mpdf->Output();

?>