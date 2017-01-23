<?php
	error_reporting(E_ALL);
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);
	include_once("includes/layout/headp.php");
	require ("includes/conf/configure.php");
?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h1 class="txt-color-red login-header-big">ICAP</h1>
			<div class="hero">
				<div class="pull-left login-desc-box-l">
					<h3 class="paragraph-header">SISTEMA PARA EL CONTROL DE LA GESTION POLICIAL</h3>
				</div>
				
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="well no-padding">
				<form action="index2.php" id="login-form" class="smart-form client-form" method="post" enctype="multipart/form-data">
					<header><h3 class="txt-color-red login-header-big">INGRESAR</h3></header>
					<fieldset>
						<section>
							<label class="label">Usuario</label>
							<label class="input"> <i class="icon-append fa fa-user"></i>
								<input type="text" name="user" id="user"> <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Porfavor ingrese su usuario</b></label>
						</section>
						<section>
							<label class="label">Contraseña</label>
							<label class="input"> <i class="icon-append fa fa-lock"></i>
								<input type="password" name="pass" id="pass"> <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingresa tu contraseña</b> </label>
						</section>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary"> Ingresar </button>
					</footer>
				</form>
			</div>
		</div>
	</div>
	<?php
    include_once("includes/layout/footp.php");
?>