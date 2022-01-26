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


	$loja = selectAllLoja();

	$pdf = new FPDF();
	$pdf->AliasNbPages();


	$pdf->AddPage();

	$pdf->SetY(20);
	$pdf->Image('../imagens/logoStand.jpeg', 10, 10, -600);
	$pdf->setFont('Arial', 'B', 16);
	$pdf->Cell(0,5, utf8_decode('Relatório de Lojas'),0,0,"C");
	$pdf->Ln(15);


	$pdf->setFont("Arial", "I", 10);
	$pdf->setFillColor(169,169,169);
	$pdf->Cell(40,7,"Shopping",1,0,"", true);
	$pdf->Cell(40,7,utf8_decode("Nome Fantasia"),1,0,"", true);
	$pdf->Cell(40,7,"CNPJ",1,0,"", true);
	$pdf->Cell(60,7,utf8_decode("Pessoa de contato"),1,0,"",true);
	
	$pdf->Ln();

	$zebrado = false ;	
	foreach ($loja as $loja) {
			$zebrado = zebrado($pdf, $zebrado);
			$pdf->Cell(40,7,utf8_decode($loja["shopping"]),1,0,"", true);
			$pdf->Cell(40,7,utf8_decode($loja["nomeFantasia"]),1,0,"", true);
			$pdf->Cell(40,7,$loja["CNPJ"],1,0,"", true);
			$pdf->Cell(60,7,utf8_decode($loja["pessoaContato"]),1,0,"", true);
			
			$pdf->Ln();
	}
	$pdf->Ln();
	$pdf->Cell(190,7,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');

	$loja = selectAllLoja();

	$pdf->AddPage();

	$pdf->SetY(20);
	$pdf->Image('../imagens/logoStand.jpeg', 10, 10, -600);	
	$pdf->setFont('Arial', 'B', 16);
	$pdf->Cell(0,5, utf8_decode('Relatório de Lojas'),0,0,"C");
	$pdf->Ln(15);

	$pdf->setFont("Arial", "I", 10);
	$pdf->setFillColor(169,169,169);
	$pdf->Cell(60,7,"Email",1,0,"", true);
	$pdf->Cell(60,7,"Telefone",1,0,"", true);

	$pdf->Ln();

		$zebrado = false ;	
		foreach ($loja as $loja) {
			$zebrado = zebrado($pdf, $zebrado);
			$pdf->Cell(60,7,utf8_decode($loja["email"]),1,0,"", true);
			$pdf->Cell(60,7,$loja["telefone"],1,0,"", true);
			$pdf->Ln();
	}
	$pdf->Ln();
	$pdf->Cell(190,7,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');

	$pdf->output();


?>