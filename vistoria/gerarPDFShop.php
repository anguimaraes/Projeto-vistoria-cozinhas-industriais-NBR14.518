<?php 
	include "../fpdf/fpdf.php";
	include "../conexaoRelatorio.php";
	include_once "../conexao.php";
     


	function selectidEquipamentos(){
	$_SERVER["REQUEST_METHOD"] == 'POST';

    if (isset($_POST['shoppingVistoria'])) {
    
      $variavelphp = $_POST['shoppingVistoria'];
    }

    $banco = abrirBanco();
    $sql = "SELECT * FROM equipamentos WHERE shoppingVistoria = '$variavelphp'";
    $resultado = $banco->query($sql);
    $banco->close();
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

	function zebrado($pdf, $zebrado){
			if (!$zebrado){
    		$pdf->SetFillColor(255,228,196);
    		$zebrado = true ;
		} else {
    		$pdf->SetFillColor(173,216,230);
    		$zebrado = false ;
		}
				return $zebrado;
	}



	$equip = selectidEquipamentos();

	$pdf = new FPDF();
	$pdf->AliasNbPages();


	$pdf->AddPage();
	$pdf->SetY(20);
	$pdf->Image('../imagens/logoStand.jpeg', 10, 10, -600);

	$pdf->setFont('Arial', 'B', 16);
	$pdf->Cell(0,5, utf8_decode('Relatório de Vistorias'),0,0,"C");
	$pdf->Ln(15);


	$pdf->setFont("Arial", "I", 10);
	$pdf->setFillColor(169,169,169);
	$pdf->Cell(40,7,utf8_decode("Shopping"),1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("Loja"),1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("Vistoriador"),1,0,"", true);
	$pdf->Cell(35,7,"Data da vistoria",1,0,"",true);
	$pdf->Ln();
					
		$zebrado = false ;							
	foreach ($equip as $equip) {
			$zebrado = zebrado($pdf, $zebrado);
			$pdf->Cell(40,7,utf8_decode($equip["shoppingVistoria"]),1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($equip["lojaVistoria"]),1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($equip["nomeVistoriador"]),1,0,"", true);
			$pdf->Cell(35,7, formatoData($equip["dataVistoria"]),1,0,"", true);
			$pdf->Ln();
	}
	$pdf->Cell(190,7,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');

	$equip = selectidEquipamentos();

	$pdf->AddPage();
	$pdf->SetY(20);
	$pdf->Image('../imagens/logoStand.jpeg', 10, 10, -600);

	$pdf->setFont('Arial', 'B', 16);
	$pdf->Cell(0,5, utf8_decode('Relatório de Vistorias'),0,0,"C");
	$pdf->Ln(15);

	$pdf->setFont("Arial", "I", 10);
	$pdf->setFillColor(169,169,169);
	$pdf->Cell(60,7,utf8_decode("Coifa"),1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("Lavador de Gases"),1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("duto"),1,0,"", true);
	$pdf->Ln();

		$zebrado = false ;
		foreach ($equip as $equip) {
			$zebrado = zebrado($pdf, $zebrado);
			$pdf->Cell(60,7,utf8_decode($equip["coifa"]),1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($equip["lavador"]),1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($equip["duto"]),1,0,"", true);
			$pdf->Ln();
	}
	$pdf->Cell(190,7,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');

	$equip = selectidEquipamentos();

	$pdf->AddPage();
	$pdf->SetY(20);
	$pdf->Image('../imagens/logoStand.jpeg', 10, 10, -600);

	$pdf->setFont('Arial', 'B', 16);
	$pdf->Cell(0,5, utf8_decode('Relatório de Vistorias'),0,0,"C");
	$pdf->Ln(15);

	$pdf->setFont("Arial", "I", 10);
	$pdf->setFillColor(169,169,169);
	$pdf->Cell(70,7,utf8_decode("Central"),1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("Cil. Co2"),1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("Exaustor"),1,0,"", true);

	$pdf->Ln();

		$zebrado = false ;
		foreach ($equip as $equip) {
			$zebrado = zebrado($pdf, $zebrado);
			$pdf->Cell(70,7,utf8_decode($equip["central"]),1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($equip["co2"]),1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($equip["exaustor"]),1,0,"", true);
			$pdf->Ln();
	}

	$pdf->Cell(190,7,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');

		$equip = selectidEquipamentos();

	$pdf->AddPage();
	$pdf->SetY(20);
	$pdf->Image('../imagens/logoStand.jpeg', 10, 10, -600);

	$pdf->setFont('Arial', 'B', 16);
	$pdf->Cell(0,5, utf8_decode('Relatório de Vistorias'),0,0,"C");
	$pdf->Ln(15);

	$pdf->setFont("Arial", "I", 10);
	$pdf->setFillColor(169,169,169);
	$pdf->Cell(60,7,utf8_decode("Cil. Saponaceo"),1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("Damper corta-fogo"),1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("Desarme do Exaustor"),1,0,"", true);
	$pdf->Ln();

		$zebrado = false ;
		foreach ($equip as $equip) {
			$zebrado = zebrado($pdf, $zebrado);
			$pdf->Cell(60,7,utf8_decode($equip["saponaceo"]),1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($equip["damper"]),1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($equip["desarmeEx"]),1,0,"", true);
			$pdf->Ln();
	}

	$pdf->Cell(190,7,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');
	$pdf->output();


?>