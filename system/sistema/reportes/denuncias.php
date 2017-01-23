<?php
    require_once('../includes/fpdf/fpdf.php');
    class PDF extends FPDF {
        function Header() {
            /*** Funcion Donde es Escribe los Datos que se Imprimen en la zona superior del Documento ***/
         }
         function Footer() {
          /*** Funcion Donde es Escribe los Datos que se Imprimen en la zona Inferior del Documento ***/
          }
     }
	$funcionarios = paraTodos::arrayConsulta("*", "denuncia d, nacionalidad n", " d.den_nacional=n.nac_codigo");
    $pdf=new PDF(); 
	$pdf->addpage('L','Letter',0);
	$pdf->SetFont('Arial','B',8);
	$pdf->Image($absolute_uri.'assets/images/policiaest.jpg',5,5,-700);
	$pdf->Cell(0,5,utf8_decode('GOBERNACIÓN DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('CUERPO DE POLICÍA DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('OFICINA DE CONTROL Y ACTUACIÓN POLICIAL'),0,1,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'DENUNCIAS REGISTRADAS',0,0,'C');
	$pdf->SetFont('Arial','B',6);
	$pdf->Ln();
    $pdf->Cell(10,4,utf8_decode('Nº'),1,0,'C');
    $pdf->Cell(15,4,utf8_decode('Nº denuncia'),1,0,'C');
    $pdf->Cell(20,4,utf8_decode('Nacionalidad'),1,0,'C');
    $pdf->Cell(20,4,utf8_decode('Cédula'),1,0,'C');
    $pdf->Cell(25,4,'Nombre',1,0,'C');
    $pdf->Cell(25,4,'Apellido',1,0,'C');
    $pdf->Cell(25,4,'Func. Receptor',1,0,'C');
    $pdf->Cell(120,4,utf8_decode('Exposición'),1,0,'C');
	$pdf->SetFont('Arial','',6);
	$pdf->Ln();
	$cuenta=0;
	foreach($funcionarios as $rowf){
		$cuenta= $cuenta+1;
		$den= $rowf[den_codigo];		
		if (strlen($rowf[den_codigo])==2){
			$den= "0".$rowf[den_codigo];
		}
		if (strlen($rowf[den_codigo])==1){
			$den= "00".$rowf[den_codigo];	
		}		
		$pdf->Cell(10,5,$cuenta,1,0,'C');
		$pdf->Cell(15,5,$den,1,0,'C');
		$pdf->Cell(20,5,$rowf['nac_descripcion'],1,0,'L');		
		$pdf->Cell(20,5,$rowf['den_cedula'],1,0,'L');
		$pdf->Cell(25,5,$rowf['den_nombres'],1,0,'L');
		$pdf->Cell(25,5,$rowf['den_apellidos'],1,0,'L');
		$pdf->Cell(25,5,$rowf['den_funapellido']." ".$rowf['den_funnombre'],1,0,'L');
		$pdf->Cell(120,5,$rowf['den_exposicion'],1,0,'L');
		$pdf->Ln();
	}
    $pdf->Output();
?>