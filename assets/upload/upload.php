<?php 
	session_start(); 
	$nuevo_nombre = $_SESSION['ci'];
	$return = Array('ok'=>TRUE);
	$upload_folder ='../images/fotos';
	$nombre_archivo = $_FILES['archivo']['name'];
	$tipo_archivo = $_FILES['archivo']['type'];
	$tamano_archivo = $_FILES['archivo']['size'];
	$tmp_archivo = $_FILES['archivo']['tmp_name'];
	$archivador = $upload_folder . '/' . $nuevo_nombre . '.jpg';
	if (!move_uploaded_file($tmp_archivo, $archivador)) {
		$return = $nuevo_nombre."Ocurrio un error al subir el archivo. ".$nombre_archivo." No pudo guardarse.";
	}
	header('Content-Type: application/json');
	echo json_encode($return);
?>