<?php
	/*Se incluye archivo auth para autentificar la sesion*/
    if ($_GET[salir]=='1') {
        session_cache_limiter('nocache,private');
        session_name($sess_name);
        session_start();
        $sid = session_id();
        session_destroy();
    }
    require('../includes/auth.php');
    $permiso = $_SESSION['usuario_login'];
    $nivel = $_SESSION['usuario_perfil'];
    include_once '../includes/combos.php';
    error_reporting(E_ALL);
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);
	//------------------------------------------------------------------------------------------------------------
	/*Se valida el usuario tenga un nivel de acceso Valido de lo contrario se redirige a la principal*/
    $nivel_acceso='Valido';
    if ($nivel_acceso!=$_SESSION['usuario_nivel']) {
        header ("Location: $redir?error_login=5");
        exit;
    }
	//------------------------------------------------------------------------------------------------------------
	/*Se toma el id del menu a consultar por el metodo POST en caso de no encontrarse se toma el Enviado por GET*/
    $idMenut=$_POST['org'];
    if ($idMenut=='') {
        $idMenut=$_GET['org'];
    }
	//------------------------------------------------------------------------------------------------------------
	/*Se toma el id de la url secundaria a consultar por el metodo POST en caso de no encontrarse se toma el Enviado por GET*/
    $act=$_POST['act'];
    if ($act=='') {
        $act=$_GET['act'];
    }
	//************************************************************************************************************
	/* Se consultan los permisos del perfil del uauario en caso de que tenga alguno asignado*/
	$res = paraTodos::arrayConsultanum("S,U,D,I,P","perfiles_det","IdPerfil = '$_SESSION[usuario_perfil]' AND SubMenu = '$idMenut'");
    if ($res > 0) {
        $permiso_accion = array();
		$res = paraTodos::arrayConsulta("S,U,D,I,P","perfiles_det","IdPerfil = '$_SESSION[usuario_perfil]' AND SubMenu = '$idMenut'");		
        foreach ($res as $val) {
            foreach ($val as $key=>$value){
                $permiso_accion[$key] = $value;
            }
        }
    }
	//------------------------------------------------------------------------------------------------------------
	/* En caso que se reciba la variable ver vacia por POST se establece la tabla menu_emp_sub para consultar archivos a llamar*/
    if ($_POST[ver]=='') {
        $bMenu='menu_emp_sub';
    }
	/* En caso que se reciba la variable ver vacia por POST se establece la tabla m_menu_emp_sub_menj para consultar archivos a llamar*/
    if ($_POST[ver]=='1' or $_GET[ver]=='1') {
        $bMenu='m_menu_emp_sub_menj';
    }
	//------------------------------------------------------------------------------------------------------------
	/* Se consultan los archivos a llamar segun el menu seleccionado y se vacia en la variable $conef*/
    $campos="URL_1,URL_2,URL_3,URL_4,URL_5,URL_6,URL_7,URL_8,URL_9,URL_10";
    $tablas="$bMenu";
    $consultas="id=$idMenut";
    $res_ = paraTodos::arrayConsulta($campos,$tablas,$consultas);
    foreach ($res_ as $rownivel ) {
        if ($act=='' Or $act=='1') {
             $conexf=$rownivel["URL_1"];
           }
        if ($act=='2') {
             $conexf=$rownivel["URL_2"];
           }
        if ($act=='3') {
             $conexf=$rownivel["URL_3"];
           }
        if ($act=='4') {
             $conexf=$rownivel["URL_4"];
           }
        if ($act=='5') {
             $conexf=$rownivel["URL_5"];
           }
		if ($act=='6') {
             $conexf=$rownivel["URL_6"];
           }
		if ($act=='7') {
             $conexf=$rownivel["URL_7"];
           }
		if ($act=='8') {
             $conexf=$rownivel["URL_8"];
           }
		if ($act=='9') {
             $conexf=$rownivel["URL_9"];
           }
		if ($act=='10') {
             $conexf=$rownivel["URL_10"];
           }
    }
	//----------------------------------------------------------------------------------------------------------------
	//------------------------------------------------------------------------------------------------------------
	/* En caso que se reciba la variable ver=1 se manda se ejecuta el archivo correspondiente a la tabla recargar*/
    if ($_POST[ver]=='2' Or $_GET[ver]=='2') {
        $campos="URL";
        $tablas="recargar";
        $consultas="id=$idMenut";
        $res_ =paraTodos::arrayConsulta($campos,$tablas,$consultas);
        foreach ($res_ as $rownivel ) {
            $conexf=$rownivel["URL"];
        }
    }
	//--------------------------------------------------------------------------------------------------------------
	/*Finalmente se incluye el archivo buscado*/
    if ($conexf!='') {
        include_once ($conexf);
    }
	//--------------------------------------------------------------------------------------------------------------
?>