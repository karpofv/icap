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
	$funcionarios = paraTodos::arrayConsulta("*", "asistencia_o a, funcionarios f", "a.asis_funcedula=f.fun_cedula");
    $pdf=new PDF(); 
	$pdf->addpage('P','Letter',0);
	$pdf->SetFont('Arial','B',8);
	$pdf->Image($absolute_uri.'assets/images/policiaest.jpg',5,5,-700);
	$pdf->Cell(0,5,utf8_decode('GOBERNACIÓN DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('CUERPO DE POLICÍA DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('OFICINA DE CONTROL Y ACTUACIÓN POLICIAL'),0,1,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'ASISTENCIAS APLICADAS',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',6);
    $pdf->Cell(10,4,utf8_decode('Nº'),1,0,'C');
    $pdf->Cell(20,4,utf8_decode('Nº Expdiente'),1,0,'C');
    $pdf->Cell(15,4,utf8_decode('Fecha'),1,0,'C');
    $pdf->Cell(15,4,utf8_decode('Cedula'),1,0,'C');
    $pdf->Cell(30,4,utf8_decode('Nombres'),1,0,'C');
    $pdf->Cell(30,4,utf8_decode('Apellidos'),1,0,'C');
    $pdf->Cell(10,4,utf8_decode('Horas'),1,0,'C');
    $pdf->Cell(30,4,utf8_decode('Supervisor'),1,0,'C');
    $pdf->Cell(30,4,utf8_decode('Tipo'),1,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',6);
	$cuenta=0;
	foreach($funcionarios as $rowf){
		$cuenta=$cuenta+1;	
		$exp= $rowf[asis_expcodigo];		
		if (strlen($rowf[asis_expcodigo])==2){
			$exp= "0".$rowf[asis_expcodigo];
		}
		if (strlen($rowf[asis_expcodigo])==1){
			$exp= "00".$rowf[asis_expcodigo];	
		}
		$pdf->Cell(10,4,$cuenta,1,0,'C');
		$pdf->Cell(20,4,$exp,1,0,'C');
		$pdf->Cell(15,4,$rowf[asis_fecha],1,0,'C');
		$pdf->Cell(15,4,$rowf[asis_funcedula],1,0,'C');		
		$pdf->Cell(30,4,$rowf[fun_nombre],1,0,'C');
		$pdf->Cell(30,4,$rowf[fun_apellido],1,0,'C');
		$pdf->Cell(10,4,$rowf[asis_horas],1,0,'C');
		$pdf->Cell(30,4,$rowf[asis_supervisor],1,0,'C');		
		$pdf->Cell(30,4,$rowf[asis_tipo],1,0,'C');		
		$pdf->Ln();
	}
    $pdf->Output();
?>