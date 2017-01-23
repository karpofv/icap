<?php
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    include_once("includes/auth.php");
    if ($_SESSION['usuario_nivel'] != 'Valido') {
        header ("Location: index.php?error_login=5");
        exit;
    }
    switch ($_SESSION['usuario_nivel']){
	   case 'Valido':
            header ("Location: system/controller.php?org=1");
        break;
    }
?>