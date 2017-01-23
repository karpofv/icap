<?php
	/*Se incluyen archicos comunes*/
	$org = $_POST['org'];
	//------------------------------------------------------------------------------------------------------------
	/*Se recogen los datos para manipularlos*/
    $cedula=$_POST['cedula'];
    $apellidos=$_POST['apellido'];
    $nombres=$_POST['nombre'];
    $correo=$_POST['correo'];
    $nusuario=$_POST['nusuario'];
    $nclave=md5($_POST['nclave']);
    $idperfil=$_POST['idperfil'];
    $borrar=$_POST['borrar'];
    $editarrt=$_POST['editar'];
    $cargo=$_POST['depart'];
	//------------------------------------------------------------------------------------------------------------
	/*Se verifican los permisos del usuario*/
    if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
		/*GUARDAR -----------Se verifica que $editarrt=="" y las variables no se encuentren vacias para proceder a guardar  */		
        if ($nusuario<>"" and $nclave<>"" and $idperfil<>'0' and $idperfil<>'' and $editarrt=="" and $nombres!="" and $apellidos!="" and $cedula!=''){
			/*Se verifica no se encuentre ya registrado el Usuario de lo contrario se realiza el insert*/
			$resultx = paraTodos::arrayConsultanum("id", "usuarios", "Usuario like '%".$nusuario."%'");
			if ($resultx > 0){
				echo '<div class="alert alert-block alert-success">
	<a class="close" data-dismiss="alert" href="#">×</a>
	<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Usuario ya esta registrado!</h4>
</div>';
			} else {
				$insertar = paraTodos::arrayInserte("Cedula,Usuario,Contrasena,CodSede,Tipo,Nivel","usuarios","'$cedula','$nusuario','$nclave','0','Valido','$idperfil'");
				$insertar = paraTodos::arrayInserte("nacionalidad,Usuario,cedula,Nombres,Apellidos,sexo, correo","registrados","'V','$nusuario','$cedula','$nombres','$apellidos','','$correo'");
                if ($insertar) {
                    echo '<h3 class="message">Usuario creado</h3>';
					$resultx = paraTodos::arrayConsulta("id", "usuarios", "Usuario = '$nusuario'");
					foreach($resultx as $row){
                        $idUsua=$row[id];						
					}
                }else{
                    echo "<h3 class='error'>No se proceso los datos, del Registro</h3>";
                }				
			}
			//------------------------------------------------------------------------------------------------------------			
		}
		//------------------------------------------------------------------------------------------------------------
		/*UPDATE--------------Se verifica que $editarrt!="" y las variables no se encuentren vacias para proceder a Editar*/				
        if ($idperfil<>"0" and $idperfil<>"" and $editarrt!="" and $nombres!="" and $apellidos!="" and $cedula!="" and $correo!=""){
			/*Se modifica el Nivel del Usuario*/
			$modifico = paraTodos::arrayUpdate("Nivel='$idperfil'", "usuarios", "id=$editarrt");
			//------------------------------------------------------------------------------------------------------------
			/*Se modifica los datos de registro del Usuario*/			
			$modifico = paraTodos::arrayUpdate("Apellidos='$apellidos', Nombres='$nombres', correo='$correo'", "registrados", "cedula='$cedula'");			
            if($modifico){
                echo '<h3 class="message">Registro Modificado</h3>';
            }
			//------------------------------------------------------------------------------------------------------------			
        }
		//------------------------------------------------------------------------------------------------------------		
		/*MOSTRAR---------------------Se verifica si la variable $editarr!="" para proceder a Mostrar los datos guardados del usuario*/		
        if ($editarrt!=""){
			$resultsedes = paraTodos::arrayConsulta("*", "usuarios", "id = '$editarrt'");
            foreach ($resultsedes as $rowses){
                $idperfil=$rowses["Nivel"];
                $cemp=$rowses["Cedula"];
                $ucemp=$rowses["Usuario"];
				$resultsede = paraTodos::arrayConsulta("Nombres,Apellidos,correo", "registrados", "cedula = '$cemp'");				
				foreach ($resultsede as $rowse){
                    $apnomb=$rowse["Nombres"];
					$apnomba=$rowse["Apellidos"];
					$correo=$rowse["correo"];					
				}			
			}
        }
		//------------------------------------------------------------------------------------------------------------
		/*BORRAR-----------------Se verifica si la variable $borrar!="" para proceder a eliminar el usuario*/
        if ($borrar<>"") {
			$delete = paraTodos::arrayDelete("cedula = '$cedula'","registrados");
			$delete = paraTodos::arrayDelete("id = $borrar","usuarios");
            if ($delete) {
                echo '<h3 class="message">Usuario eliminado</h3>';
            }
        }		
		//------------------------------------------------------------------------------------------------------------	
?>
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Usuarios
		</h1> </div>
	</div>
	<article class="col-sm-12 col-md-12 col-lg-6">
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-sortable" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="position: relative; opacity: 1; left: 0px; top: 0px;">
			<header role="heading">
				<h2>Control de Usuarios </h2> <span class="jarviswidget-loader" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span> </header>
			<!-- widget div-->
			<div role="content">
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->
				</div>
				<!-- end widget edit box -->
				<!-- widget content -->
				<div class="widget-body no-padding">
<?php
        if ($editarrt!='') {
?>
						<FORM onsubmit="$.ajax({
                                type: 'POST',
                                url: 'controller.php',
                                data: {
                                    cedula      : $('#cedula').val(),
                                    apellido    : $('#apellido').val(),
                                    nombre      : $('#nombre').val(),
                                    correo      : $('#correo').val(),
                                    nusuario    : $('#nusuario').val(),
                                    nclave      : $('#nclave').val(),
                                    idperfil    : $('#idperfil').val(),
                                    ver 		: 1,                                    
                                    org   		: <?php echo $org; ?>,
                                    editar     	: <?php echo $editarrt; ?>
                                },
                                success: function(html) {
                                	$('#content').html(html); 
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
							}); return false" action="javascript: void(0);" method="post" class="smart-form">
							<?php
        }else{ 
?>
								<FORM onsubmit="$.ajax({ 
                                type: 'POST',
                                url: 'controller.php',
                                data: {
                                    cedula      : $('#cedula').val(),
                                    apellido    : $('#apellido').val(),
                                    nombre      : $('#nombre').val(),
                                    correo      : $('#correo').val(),
                                    nusuario    : $('#nusuario').val(),
                                    nclave      : $('#nclave').val(),
                                    idperfil    : $('#idperfil').val(),
                                    ver 		: 1,
                                    org   		: <?php echo $org; ?>
                                },
                                success: function(html) {
                                	$('#content').html(html); 
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
                            }); return false" action="javascript: void(0);" method="post"  class="smart-form">
									<?php
        }
		//------------------------------------------------------------------------------------------------------------
?>
						<header> Datos Personales </header>
						<fieldset>
							<section>
								<label class="label">Cédula</label>
								<label class="input">
									<input type="text" class="input-xs" maxLength="12" size="10" name="cedula" id="cedula" value="<?php echo $cemp;?>" required="required"> </label>
							</section>
							<section>
								<label class="label">Nombres</label>
								<label class="input">
									<input type="text" class="input-sm" maxLength="100" size="60" name="nombre" id="nombre" value="<?php echo $apnomb; ?>" required="required"> </label>
							</section>
							<section>
								<label class="label">Apellidos</label>
								<label class="input">
									<input type="text" maxlength="10" maxLength="100" size="60" name="apellido" id="apellido" value="<?php echo $apnomba; ?>" required="required"> </label>								
							</section>
							<section>
								<label class="label">Correo</label>
								<label class="input">
									<input type="email" class="input-lg" maxLength="100" size="60" name="correo" id="correo" value="<?php echo $correo; ?>" required="required"> </label>
									<div class="note"> <strong>Recuerde:</strong> Debe introducir un correo valido ejemplo@ejemplo.com</div>									
							</section>
						</fieldset>
						<header> Ingresar Usuario </header>
						<fieldset>
							<section>
								<label class="label">Usuario</label>
								<label class="input">
									<input type="text" class="input-xs" name="nusuario" id="nusuario" value="<?php echo $ucemp; ?>" required="required"> </label>
							</section>
							<section>
								<label class="label">Contraseña</label>
								<label class="input">
									<input class="input-xs" maxLength="10" size="10" maxLength="10" size="10" name="nclave" id="nclave" type="password"> </label>
							</section>
						</fieldset>
						<header> Perfil del Usuario </header>
						<fieldset>
							<section>
								<label class="label">Perfil</label>
								<label class="select">
									<select id="idperfil" name="idperfil" required="required">
										<option value="0">Seleccione el Perfil</option>
										<?php  Combos::CombosSelect($permiso, $id, 'DISTINCT CodPerfil,Nombre', 'perfiles', 'CodPerfil', 'Nombre', "CodPerfil<>'2' ORDER BY Nombre");   ?>
									</select> <i></i> </label>
							</section>
						</fieldset>
						<footer>
							<button type="submit" class="btn btn-primary"> Guardar </button>
							<button type="button" class="btn btn-default" onclick="window.history.back();"> Regresar </button>
						</footer>
					</form>
				</div>
				<!-- end widget content -->
			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->
	</article>
<?php
	/*Si el usuario tiene permisos de lectura se muestra la tabla con los usuarios registrados*/
}
	if ($permiso_accion['S']==1) {
		$resultc = paraTodos::arrayConsulta("usuarios.id,usuarios.Cedula,usuarios.Usuario,registrados.Nombres,registrados.Apellidos,registrados.correo,
    usuarios.Nivel", "usuarios,registrados", "usuarios.Tipo='Valido' and usuarios.Cedula=registrados.cedula and usuarios.nivel<>2")
?>
		<article class="col-sm-12 col-md-12 col-lg-6">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">
				<header role="heading">
					<h2>Usuarios Registrados</h2> 
				</header>
				<!-- widget div-->
				<div role="content">
					<!-- widget content -->
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead> </thead>
							<tbody>
<?php
		/*Se arrojan los datos en la tabla de usuarios registrados*/
		foreach($resultc as $rowc){
      		$borra=$rowc["id"];
      		$editar=$rowc["id"];
      		$cdemp=$rowc["Cedula"];
      		$nnusuario=$rowc["Usuario"];
      		$nnclave=$rowc["Nivel"];
      		$nombperfil='';
			/*Se busca el perfil al que pertenece el usuario*/
			$resultq1d = paraTodos::arrayConsulta("Nombre", "perfiles", "CodPerfil=$nnclave");
			foreach ($resultq1d as $rowq1d){
        		$nombperfil=$rowq1d["Nombre"];				
			}
			//------------------------------------------------------------------------------------------------------------
?>
									<tr style="border-bottom: 1px solid #EEEEEE;">
										<td style="padding: 15px 7px 15px 7px;"> <b> <?php printf("%s",$nnusuario);?></b> </td>
										<td> <b><?php echo $rowc["Cedula"]; ?> : <?php echo $rowc["Nombres"]; ?>, <?php echo $rowc["Apellidos"]; ?><br><?php echo $rowc["correo"]; ?></b> </td>
										<td> <b class="btn btn-primary popover-button"><?php echo $nombperfil; ?></b> </td>
										<td>
<?php
				/*Se verifica tenga todos los permisos*/
        		if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
?>
												<a title="Editar el registro" onclick="
        			 	$.ajax({
        			 		type: 'POST',
        			 		url: 'controller.php',
        					data: { 
        						editar: '<?php echo $rowc[id]; ?>', 
								ver 		: 1,
        						org: <?php echo $org; ?>
        					},
        					success: function(html) {	
        						$('#content').html(html);
        					},
        					error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
        				}); return false;" href="javascript: void(0);"> 
        										<i class="fa fa-pencil-square-o" style="font-size: 1.600em;margin-left: 10px;"></i> </a>
												<a title="Eliminar el registro" onclick=" var msg = confirm('Esta seguro que desea eliminar el registro?');
        				if (msg) {
        					$.ajax({
        						type: 'POST',
        						url: 'controller.php',
        						data: { 
        							borrar: <?php echo $rowc[id]; ?>,
									ver 		: 1,
        							org: <?php echo $org; ?>,
        							cedula: <?php echo $rowc['Cedula'];?>
        						},
        						success: function(html) { $('#content').html(html); }
        					});
        				} return false;" href="javascript: void(0);"> <i class="fa fa-eraser" style="font-size: 1.600em;margin-left: 10px;"></i> </a>
<?php
				}
				//------------------------------------------------------------------------------------------------------------						
?>
										</td>
									</tr>
<?php
		}
?>
							</tbody>
						</table>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
<?php
	}
	//------------------------------------------------------------------------------------------------------------
?>