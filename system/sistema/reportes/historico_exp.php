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
	$funcionarios = paraTodos::arrayConsulta("*", "expediente e, estado_exp ex, expediente_func ef", "e.exp_estadoxp=ex.estxp_codigo and e.exp_codigo=ef.expf_codigo");
    $pdf=new PDF(); 
	$pdf->addpage('L','Letter',0);
	$pdf->SetFont('Arial','B',8);
	$pdf->Image($absolute_uri.'assets/images/cintillo_reporte.jpg',45,5,0);
	$pdf->Ln(20);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'HISTORICO DE EXPEDIENTE',0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',6);
    $pdf->Cell(25,4,utf8_decode('Identificación Expdiente'),1,0,'C');
    $pdf->Cell(91,4,utf8_decode('Identificación Funcionario'),1,0,'C');
    $pdf->Cell(60,4,utf8_decode('Estatus del Expediente'),1,0,'C');
    $pdf->Cell(75,4,utf8_decode('Estado'),1,1,'C');
    $pdf->Cell(10,4,utf8_decode('Nº'),1,0,'C');
    $pdf->Cell(15,4,'Fecha',1,0,'C');
    $pdf->Cell(25,4,'Nombre',1,0,'C');
    $pdf->Cell(25,4,'Apellido',1,0,'C');
    $pdf->Cell(10,4,utf8_decode('Cédula'),1,0,'C');
    $pdf->Cell(6,4,'Sexo',1,0,'C');
    $pdf->Cell(25,4,'Rango',1,0,'C');
    $pdf->Cell(15,4,'Cerrado',1,0,'C');
    $pdf->Cell(15,4,'Asist. Vol.',1,0,'C');
    $pdf->Cell(15,4,'Asist. Oblig.',1,0,'C');
    $pdf->Cell(15,4,utf8_decode('Destitución'),1,0,'C');
	$pdf->Cell(15,4,utf8_decode('Sustanciación'),1,0,'C');
    $pdf->Cell(15,4,'Consejo',1,0,'C');
    $pdf->Cell(15,4,'Archivo',1,0,'C');
    $pdf->Cell(15,4,utf8_decode('Procuraduría'),1,0,'C');
    $pdf->Cell(15,4,utf8_decode('Otros'),1,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',6);
	$cuenta=0;
	foreach($funcionarios as $rowf){
        $consulsex = paraTodos::arrayConsulta("Nombre", "funcionarios f, sexo s", "f.fun_genero=s.id");
		$exp= $rowf[asis_expcodigo];		
		if (strlen($rowf[exp_codigo])==2){
			$exp= "0".$rowf[exp_codigo];
		}
		if (strlen($rowf[exp_codigo])==1){
			$exp= "00".$rowf[exp_codigo];	
		}
		$pdf->Cell(10,4,$exp,1,0,'C');
		$pdf->Cell(15,4,$rowf[exp_fecexp],1,0,'C');
		$pdf->Cell(25,4,$rowf[expf_funnombre],1,0,'C');
		$pdf->Cell(25,4,$rowf[expf_funapellido],1,0,'C');
		$pdf->Cell(10,4,$rowf[expf_funcedula],1,0,'C');
		$pdf->Cell(6,4,substr($consulsex[0][Nombre],0,1),1,0,'C');
		$pdf->Cell(25,4,$rowf[expf_funrango],1,0,'C');
		if ($rowf[exp_estatus]==1) {
			$cerrado='X';
		}
		if ($rowf[exp_estatus]==2) {
			$asisv='X';
		}
		if ($rowf[exp_estatus]==3) {
			$asiso='X';
		}
		if ($rowf[exp_estatus]==4) {
			$desti='X';
		}
		$pdf->Cell(15,4,$cerrado,1,0,'C');
		$pdf->Cell(15,4,$asisv,1,0,'C');
		$pdf->Cell(15,4,$asiso,1,0,'C');
		$pdf->Cell(15,4,$desti,1,0,'C');
		if ($rowf[exp_estadoxp]==1) {
			$sust='X';
		}
		if ($rowf[exp_estadoxp]==2) {
			$consej='X';
		}
		if ($rowf[exp_estadoxp]==3) {
			$archivo='X';
		}
		if ($rowf[exp_estadoxp]==4) {
			$procurad='X';
		}
		if ($rowf[exp_estadoxp]==5) {
			$otros='X';
		}
		$pdf->Cell(15,4,$sust,1,0,'C');
		$pdf->Cell(15,4,$consej,1,0,'C');
		$pdf->Cell(15,4,$archivo,1,0,'C');
		$pdf->Cell(15,4,$procurad,1,0,'C');
		$pdf->Cell(15,4,$otros,1,0,'C');
		$pdf->Ln();
	}
    $pdf->Output();
?>
