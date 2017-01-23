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
	$funcionarios = paraTodos::arrayConsulta("*", "expediente e, estatus es, expediente_func ef, funcionarios f", "e.exp_estatus=es.esta_codigo and e.exp_codigo=ef.expf_expcodigo and ef.expf_funcedula=f.fun_cedula and esta_descrip='ASISTENCIA VOLUNTARIA' and e.exp_codigo NOT IN (select asis_expcodigo from asistencia_v)");
    $pdf=new PDF(); 
	$pdf->addpage();
	$pdf->SetFont('Arial','B',8);
	$pdf->Image($absolute_uri.'assets/images/policiaest.jpg',5,5,-700);
	$pdf->Cell(0,5,utf8_decode('GOBERNACIÓN DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('CUERPO DE POLICÍA DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('OFICINA DE CONTROL Y ACTUACIÓN POLICIAL'),0,1,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'ASISTENCIAS VOLUNTARIAS POR PROCESAR',0,0,'C');
	$pdf->Ln();
    $pdf->Cell(10,4,utf8_decode('Nº'),1,0,'C');
    $pdf->Cell(20,4,utf8_decode('Fecha'),1,0,'C');
    $pdf->Cell(20,4,'Expediente',1,0,'C');
    $pdf->Cell(20,4,'Cedula',1,0,'C');
    $pdf->Cell(60,4,'Nombre',1,0,'C');
    $pdf->Cell(60,4,'Apellido',1,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',8);
	$cuenta=0;
	foreach($funcionarios as $rowf){
		$cuenta= $cuenta+1;
		$exp= $rowf[asis_expcodigo];		
		if (strlen($rowf[exp_codigo])==2){
			$exp= "0".$rowf[exp_codigo];
		}
		if (strlen($rowf[exp_codigo])==1){
			$exp= "00".$rowf[exp_codigo];	
		}		
		$pdf->Cell(10,5,$cuenta,1,0,'C');
		$pdf->Cell(20,5,$rowf['exp_fecexp'],1,0,'L');
		$pdf->Cell(20,5,$exp,1,0,'L');
		$pdf->Cell(20,5,$rowf['fun_cedula'],1,0,'L');
		$pdf->Cell(60,5,$rowf['fun_nombre'],1,0,'L');
		$pdf->Cell(60,5,$rowf['fun_apellido'],1,0,'L');
		$pdf->Ln();
	}
    $pdf->Output();
?>