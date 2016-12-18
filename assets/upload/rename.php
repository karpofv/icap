<?php
	session_start(); 
	$_SESSION['ci'] = $_POST['c'];
	if ($_SESSION['ci'] != ""){
		echo $_SESSION['ci'];
	} else {
		echo 0;
	}
?>