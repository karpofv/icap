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
	$funcionarios = paraTodos::arrayConsulta("*", "funcionarios f, rangos r", "f.fun_rango=r.rang_codigo");
    $pdf=new PDF(); 
	$pdf->addpage();
	$pdf->SetFont('Arial','B',8);
	$pdf->Image($absolute_uri.'assets/images/policiaest.jpg',5,5,-700);
	$pdf->Cell(0,5,utf8_decode('GOBERNACIÓN DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('CUERPO DE POLICÍA DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('OFICINA DE CONTROL Y ACTUACIÓN POLICIAL'),0,1,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'FUNCIONARIOS REGISTRADOS',0,0,'C');
	$pdf->Ln();
    $pdf->Cell(10,4,utf8_decode('Nº'),1,0,'C');
    $pdf->Cell(20,4,utf8_decode('Cédula'),1,0,'C');
    $pdf->Cell(20,4,'Placa',1,0,'C');
    $pdf->Cell(45,4,'Nombre',1,0,'C');
    $pdf->Cell(45,4,'Apellido',1,0,'C');
    $pdf->Cell(50,4,'Rango',1,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);
	$cuenta=0;
	foreach($funcionarios as $rowf){
		$cuenta= $cuenta+1;
		$pdf->Cell(10,5,$cuenta,1,0,'C');
		$pdf->Cell(20,5,$rowf['fun_cedula'],1,0,'L');
		$pdf->Cell(20,5,$rowf['fun_placa'],1,0,'L');
		$pdf->Cell(45,5,$rowf['fun_nombre'],1,0,'L');
		$pdf->Cell(45,5,$rowf['fun_apellido'],1,0,'L');
		$pdf->Cell(50,5,$rowf['rang_descrip'],1,0,'L');
		$pdf->Ln();
	}
    $pdf->Output();
?>