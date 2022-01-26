<?php 
	include "../fpdf/fpdf.php";
	include "../conexaoRelatorio.php";

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


	$shop = selectAllShop();

	$pdf = new FPDF();
	$pdf->AliasNbPages();


	$pdf->AddPage();
	$pdf->SetY(20);
	$pdf->Image('../imagens/logoStand.jpeg', 10, 10, -600);

	$pdf->setFont('Arial', 'B', 16);
	$pdf->Cell(0,5, utf8_decode('Relatório de Shoppings'),0,0,"C");
	$pdf->Ln(15);


	$pdf->setFont("Arial", "I", 10);
	$pdf->setFillColor(169,169,169);
	$pdf->Cell(80,7,utf8_decode("Razão Social"),1,0,"", true);
	$pdf->Cell(40,7,"Nome Fantasia",1,0,"", true);
	$pdf->Cell(40,7,"CNPJ",1,0,"", true);
	$pdf->Cell(40,7,"Pessoa de contato",1,0,"", true);
	$pdf->Ln();

	$zebrado = false ;
	foreach ($shop as $shop) {
			$zebrado = zebrado($pdf, $zebrado);
			$pdf->Cell(80,7,utf8_decode($shop["razaoSocial"]),1,0,"", true);
			$pdf->Cell(40,7,utf8_decode($shop["nomeFantasia"]),1,0,"", true);
			$pdf->Cell(40,7,$shop["CNPJ"],1,0,"", true);
			$pdf->Cell(40,7,utf8_decode($shop["pessoaContato"]),1,0,"", true);
			$pdf->Ln();
	}
	$pdf->Ln();
	$pdf->Cell(190,7,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');

	$shop = selectAllShop();

	$pdf->AddPage();
	$pdf->SetY(20);
	$pdf->Image('../imagens/logoStand.jpeg', 10, 10, -600);

	$pdf->setFont('Arial', 'B', 16);
	$pdf->Cell(0,5, utf8_decode('Relatório de Shoppings'),0,0,"C");
	$pdf->Ln(15);

	$pdf->setFont("Arial", "I", 10);
	$pdf->setFillColor(169,169,169);
	$pdf->Cell(40,7,"Telefone",1,0,"", true);
	$pdf->Cell(40,7,"Email",1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("Endereço"),1,0,"", true);
	$pdf->Cell(60,7,"Bairro",1,0,"", true);
	$pdf->Ln();
		$zebrado = false ;
		foreach ($shop as $shop) {
			$zebrado = zebrado($pdf, $zebrado);
			$pdf->Cell(40,7,$shop["telefone"],1,0,"", true);
			$pdf->Cell(40,7,utf8_decode($shop["email"]),1,0,"", true);
			$pdf->Cell(60,7,$shop["endereco"],1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($shop["bairro"]),1,0,"", true);
			$pdf->Ln();
	}
	$pdf->Ln();
	$pdf->Cell(190,7,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');

	$shop = selectAllShop();

	$pdf->AddPage();
	$pdf->SetY(20);
	$pdf->Image('../imagens/logoStand.jpeg', 10, 10, -600);

	$pdf->setFont('Arial', 'B', 16);
	$pdf->Cell(0,5, utf8_decode('Relatório de Shoppings'),0,0,"C");
	$pdf->Ln(15);

	$pdf->setFont("Arial", "I", 10);
	$pdf->setFillColor(169,169,169);
	$pdf->Cell(40,7,utf8_decode("Municipio"),1,0,"", true);
	$pdf->Cell(40,7,"UF",1,0,"", true);
	$pdf->Cell(60,7,"CEP",1,0,"", true);
	$pdf->Ln();
		$zebrado = false ;
		foreach ($shop as $shop) {
			$zebrado = zebrado($pdf, $zebrado);
			$pdf->Cell(40,7,utf8_decode($shop["municipio"]),1,0,"", true);
			$pdf->Cell(40,7,$shop["uf"],1,0,"",true);
			$pdf->Cell(60,7,$shop["cep"],1,0,"", true);
			$pdf->Ln();
	}

	$pdf->Ln();
	$pdf->Cell(190,7,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');
	$pdf->output();


?>