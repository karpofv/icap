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
	$funcionarios = paraTodos::arrayConsulta("*", "funcionarios f, rangos r", "f.fun_rango=r.rang_codigo and fun_cedula=$_GET[ced]");
    $pdf=new PDF(); 
	$pdf->addpage();
	$pdf->SetFont('Arial','B',8);
	$pdf->Image($absolute_uri.'assets/images/policiaest.jpg',5,5,-700);
	$pdf->Cell(0,5,utf8_decode('GOBERNACIÓN DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('CUERPO DE POLICÍA DEL ESTADO BARINAS'),0,1,'C');
	$pdf->Cell(0,5,utf8_decode('OFICINA DE CONTROL Y ACTUACIÓN POLICIAL'),0,1,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'RECORD DE CONDUCTA',0,0,'C');
	foreach($funcionarios as $rowf){
		$cedula = $rowf['fun_cedula'];
		$fecnac = $rowf['fun_fecnac'];
		$nacional = $rowf['fun_nacionalidad'];
		$ingreso = $rowf['fun_fecingreso'];
		$procede = $rowf['fun_procedencia'];
		$padre = $rowf['fun_nom_padre'];
		$madre = $rowf['fun_nom_madre'];
		$nivel = $rowf['fun_nivelacad'];
		$estadocv = $rowf['fun_estcivil'];
		$cargaf = $rowf['fun_cargafam'];
		$profesion = $rowf['fun_profesion'];
	}
	$edad= date('Y-m-d')-$fecnac;
	$antiguedad= date('Y-m-d')-$ingreso;
	if($nacional=='V'){
		$nacional='VENEZOLANO(A)';
	}
	if($nacional=='E'){
		$nacional='EXTRANGERO(A)';
	}
	$pdf->Ln();
    $pdf->Cell(90,5,utf8_decode('Cédula:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$cedula,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Fecha de Nacimiento:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$fecnac,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Edad:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$edad,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Nacionalidad:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$nacional,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Fecha de Ingreso:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$ingreso,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Antiguedad:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$antiguedad,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Procedencia:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$procede,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Nombre del Padre:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$padre,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Nombre de la Madre:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$madre,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Dirección:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$fecnac,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Nivel Académico:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$nivel,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Profesión:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$profesion,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Estado Civil:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$estadocv,1,1,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(90,5,utf8_decode('Carga Familiar:'),1,0,'L');
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(90,5,$cargaf,1,1,'L');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'ASISTENCIAS VOLUNTARIAS',0,0,'C');
	$asistenciav = paraTodos::arrayConsulta("*", "asistencia_v", "asis_funcedula=$_GET[ced]");
	foreach ($asistenciav as $row){
		$numasisv= $row[asis_expcodigo];		
		if (strlen($row[asis_expcodigo])==2){
			$numasisv= "0".$row[asis_expcodigo];
		}
		if (strlen($row[asis_expcodigo])==1){
			$numasisv= "00".$row[asis_expcodigo];	
		}
		$pdf->Cell(0,10,utf8_decode("$row[asis_fecha] / Nº $numasisv / $row[asis_observacion] con una cantidad de horas $row[asis_horas]."),0,1,'L');
	}
	$pdf->Ln();
	$asistenciav = 'null';
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'ASISTENCIAS OBLIGATORIAS',0,0,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();
	$asistenciao = paraTodos::arrayConsulta("*", "asistencia_o", "asis_funcedula=$_GET[ced]");
	foreach ($asistenciao as $row){	
		$numasiso = $row[asis_expcodigo];
		if (strlen($row[asis_expcodigo])==2){
			$numasiso= "0".$row[asis_expcodigo];
		}
		if (strlen($row[asis_expcodigo])==1){
			$numasiso= "00".$row[asis_expcodigo];	
		}
		$pdf->Cell(0,10,utf8_decode("$row[asis_fecha] / Nº $numasiso / $row[asis_observacion] con una cantidad de horas $row[asis_horas]."),0,1,'L');
	}
	$asistenciao = 'null';
	$pdf->Ln();		
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,utf8_decode('LLAMADOS DE ATENCIÓN'),0,0,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();
	$llamados = paraTodos::arrayConsulta("*", "llamados", "llam_funcedula=$_GET[ced]");
	foreach ($llamados as $row){
		$numll= $row[asis_expcodigo];		
		if (strlen($row[asis_expcodigo])==2){
			$numll= "0".$row[asis_expcodigo];
		}
		if (strlen($row[asis_expcodigo])==1){
			$numll= "00".$row[asis_expcodigo];	
		}
		$pdf->Cell(0,10,utf8_decode("$row[llam_fecha] / Nº $numll / $row[llam_motivo]."),0,1,'L');
	}
	$llamados = 'null';
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,10,'DENUNCIAS',0,0,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();
	$denuncia = paraTodos::arrayConsulta("*", "denuncia", "den_cedula=$_GET[ced]");
	foreach ($denuncia as $row){
		$numden= $row[asis_expcodigo];		
		if (strlen($row[asis_expcodigo])==2){
			$numden= "0".$row[asis_expcodigo];
		}
		if (strlen($row[asis_expcodigo])==1){
			$numden= "00".$row[asis_expcodigo];	
		}
		$pdf->Cell(0,10,utf8_decode("$row[den_fecha] / Nº $numden /."),0,1,'L');
	}
	$denuncia = 'null';
    $pdf->Output();
?>