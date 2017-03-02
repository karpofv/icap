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
	$funcionarios = paraTodos::arrayConsulta("*", "llamados l left join funcionarios f on l.llam_funcedula=f.fun_cedula", "1=1");
    $pdf=new PDF();
	$pdf->addpage('P','letter',0);
	$pdf->SetFont('Arial','B',8);
	$pdf->Image($absolute_uri.'assets/images/policiaest.jpg',5,5,-700);
	$pdf->Cell(0,5,utf8_decode('GOBERNACIÓN DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('CUERPO DE POLICÍA DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('OFICINA DE CONTROL Y ACTUACIÓN POLICIAL'),0,1,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,utf8_decode('LLAMADOS DE ATENCIÓN'),0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',6);
    $pdf->Cell(10,4,utf8_decode('Nº'),1,0,'C');
    $pdf->Cell(20,4,'Fecha',1,0,'C');
    $pdf->Cell(18,4,utf8_decode('Cédula'),1,0,'C');
    $pdf->Cell(30,4,'Nombre',1,0,'C');
    $pdf->Cell(30,4,'Apellido',1,0,'C');
    $pdf->Cell(45,4,'Motivo',1,0,'C');
    $pdf->Cell(45,4,utf8_decode('Relación'),1,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);
	$cuenta=0;
	foreach($funcionarios as $rowf){
		$exp= $rowf[llam_codigo];
		if (strlen($rowf[llam_codigo])==2){
			$exp= "0".$rowf[llam_codigo];
		}
		if (strlen($rowf[llam_codigo])==1){
			$exp= "00".$rowf[llam_codigo];
		}
		$pdf->Cell(10,4,$exp,1,0,'C');
		$pdf->Cell(20,4,$rowf[llam_fecha],1,0,'C');
		$pdf->Cell(18,4,$rowf[fun_cedula],1,0,'C');
		$pdf->Cell(30,4,$rowf[fun_nombre],1,0,'C');
		$pdf->Cell(30,4,$rowf[fun_apellido],1,0,'C');
		$pdf->Cell(45,4,$rowf[llam_motivo],1,0,'C');
		$pdf->Cell(45,4,$rowf[llam_relacion],1,0,'C');
		$pdf->Ln();
	}
    $pdf->Output();
?>
