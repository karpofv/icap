<?php
	/**
	 *
	 * Description: Archivo de autentificacion.
	 *
	 * LICENSE:   HFJ_LICENSE
	 *
	 * @category    includes
	 * @package     Seido
	 * @author      <hfj@hfj.com>
	 * @version     3.0
	 * @file        auth.php
	 * @path        includes/
	 * @date        21/06/2009
	*/
	require_once 'conf/configure.php';
	require_once 'conf/conexion.php';
	require_once 'tools.php';
	$url = explode("?",$_SERVER['HTTP_REFERER']);
	$pag_referida = $url[0];
	$redir2 = $pag_referida;
	// chequear si se llama directo al script.
	if ($_SERVER['HTTP_REFERER'] == '') {
		die(header ("Location:  $redir?error_login=10"));
		exit;
	}
	if (isset($_POST['user']) || isset($_POST['pass']) || ($_POST['user']!='') || ($_POST['pass']!='')) {
		$usu = trim($_POST['user']);
		$login = stripslashes($usu);
		$login = preg_replace("/[';]/", "", $login);
		$usuario = paraTodos::arrayConsultanum('Usuario', $auth_table, "Usuario='$login'");
		if ($usuario != 0) {
			$password = trim($_POST['pass']);
			$password = md5($password);
			// almacenamos datos del Usuario en un array para empezar a chequear.
			$usuario_consulta = paraTodos::arrayConsulta('*', $auth_table, "Usuario='$login'");			
			if ($login != $usuario_consulta[0]['Usuario']) {
				Header ("Location: $redir?error_login=4");
				exit;
			}        
			if ($password != $usuario_consulta[0]['contrasena']) {
				Header ("Location: $redir?error_login=3");
				exit;
			}  
			unset($login);
			unset($password);
			session_name($sess_name);
			session_start();
			session_cache_limiter('nocache,private');
			$_SESSION['usuario_nivel'] = $usuario_consulta[0]['Tipo'];
			$_SESSION['usuario_login'] = $usuario_consulta[0]['id'];
			$_SESSION['usuario_nomusu'] = $usuario_consulta[0]['Usuario'];
			$_SESSION['usuario_cedu'] = $usuario_consulta[0]['Cedula'];
			$_SESSION['usuario_password']  = $usuario_consulta[0]['contrasena'];
			$_SESSION['user_pass_ne'] = $_POST['pass'];
			$_SESSION['usuario_perfil'] = $usuario_consulta[0]['Nivel'];
			$_SESSION['tipo_usuario']=$usuario_consulta[0]['TipoUsuario'];
			//Verificacion de los permisos de lectura escritura
			$auth['S']=1;
			$auth['I']=1;
			$auth['D']=1;
			$auth['U']=1;
			$pag = $_SERVER['PHP_SELF'];
			Header ("Location: $pag?valida=hola");
			exit;
		} else {
			Header ("Location: $redir?error_login=2");
			exit;
		}
	} else {
		session_name($sess_name);
		session_start();
		$auth['S']=1;
		$auth['I']=1;
		$auth['D']=1;
		$auth['U']=1;
		if (!isset($_SESSION['usuario_login']) && !isset($_SESSION['usuario_password'])) {
			session_destroy();
			Header ("Location: $redir?error_login=9");
			exit;
		}
	}
?>
