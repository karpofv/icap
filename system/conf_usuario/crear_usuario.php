<?php
	/*Se incluyen archicos comunes*/
	$idsubmenu = $_GET['org'];
	if ($idsubmenu==""){
		$idsubmenu = $_POST['org'];
	}
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
                echo '<h3 class="error">Usuario ya esta registrado</h3>';
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
	<div class="row  border-bottom white-bg dashboard-header">
		<div class="col-md-3">
			<h2>Usuarios</h2> <!-- <small>You have 42 messages and 6 notifications.</small> -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Ingrese Datos del Empleado</h5>
					<div class="ibox-tools">
						<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-wrench"></i> </a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="#">Config option 1</a> </li>
							<li><a href="#">Config option 2</a> </li>
						</ul>
						<a class="close-link"> <i class="fa fa-times"></i> </a>
					</div>
				</div>
				<div class="ibox-content">
					<?php
		/*Si la variable Editar es recibida por post entonces se arma el formulario con la accion para editar de lo contrario Guardar*/		
        if ($editarrt!='') {
?>
						<FORM onsubmit="$.ajax({
                                type: 'POST',
                                url: 'controller.php',
                                data: {
                                    cedula      : $('#cedula').val(),
                                    act      	: 2,
                                    apellido    : $('#apellido').val(),
                                    nombre      : $('#nombre').val(),
                                    correo      : $('#correo').val(),
                                    nusuario    : $('#nusuario').val(),
                                    nclave      : $('#nclave').val(),
                                    idperfil    : $('#idperfil').val(),
                                    org   		: <?php echo $idsubmenu; ?>,
                                    editar     	: <?php echo $editarrt; ?>
                                },
                                success: function(html) {
                                	$('#page-content').html(html); 
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
							}); return false" action="javascript: void(0);" method="post" class="form-horizontal">
							<?php
        }else{ 
?>
								<FORM onsubmit="$.ajax({ 
                                type: 'POST',
                                url: 'controller.php',
                                data: {
                                    cedula      : $('#cedula').val(),
                                    act      	: 2,
                                    apellido    : $('#apellido').val(),
                                    nombre      : $('#nombre').val(),
                                    correo      : $('#correo').val(),
                                    nusuario    : $('#nusuario').val(),
                                    nclave      : $('#nclave').val(),
                                    idperfil    : $('#idperfil').val(),
                                    org   		: <?php echo $idsubmenu; ?>
                                },
                                success: function(html) {
                                	$('#page-content').html(html); 
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
                            }); return false" action="javascript: void(0);" method="post"  class="form-horizontal">
									<?php
        }
		//------------------------------------------------------------------------------------------------------------
?>
					<div class="form-group">
						<label class="col-sm-2 control-label">Cédula:</label>
						<div class="col-sm-2">
                               <input type="text" class="form-control gen_input" maxLength="12" size="10" name="cedula" id="cedula" value="<?php echo $cemp;?>" required="required">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Nombres:</label>
						<div class="col-sm-10">
                               <input type="text" class="form-control gen_input" maxLength="100" size="60" name="nombre" id="nombre" value="<?php echo $apnomb;?>" required="required">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Apellidos:</label>
						<div class="col-sm-10">
                               <input type="text" class="form-control gen_input" maxLength="100" size="60" name="apellido" id="apellido" value="<?php echo $apnomba;?>" required="required">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Correos:</label>
						<div class="col-sm-10">
                               <input type="email" class="form-control gen_input" maxLength="100" size="60" name="correo" id="correo" value="<?php echo $correo;?>" required="required">
						</div>
					</div>
				<div class="ibox-title">
					<h5>Ingresar Usuario</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<div class="form-group">
						<label class="col-sm-2 control-label">Usuario:</label>
						<div class="col-sm-2">
                               <input type="text" class="form-control gen_input" maxLength="10" size="10" name="nusuario" id="nusuario" value="<?php echo $ucemp;?>" required="required">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Contraseña:</label>
						<div class="col-sm-2">
                               <input class="form-control gen_input" maxLength="10" size="10" maxLength="10" size="10" name="nclave" id="nclave" type="password" <?php if ($editarrt=="" ) { ?> required="required"
														<?php 
									} 
?> >
						</div>
					</div>
				</div>		
				<div class="ibox-title">
					<h5>Perfil del Usuario</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>				
				<div class="ibox-content">
					<div class="form-group">
						<label class="col-sm-2 control-label">Perfil</label>
						<div class="col-sm-2">
							<select style='font-family: Arial; height: 33px;padding: 7px;border: 1px solid #DDDDDD;' id="idperfil" name="idperfil" required="required" class="form-control">
								<option value="0">Seleccione el Perfil</option>
								<?php  Combos::CombosSelect($permiso, $id, 'DISTINCT CodPerfil,Nombre', 'perfiles', 'CodPerfil', 'Nombre', "CodPerfil<>'' ORDER BY Nombre");   ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-primary" type="submit" name="Grabar" value="Enviar">Enviar</button>
						</div>
					</div>
				</div>
				</FORM>
			</div>
		</div>
	</div>
</div>									
								<?php
	}
	/*Si el usuario tiene permisos de lectura se muestra la tabla con los usuarios registrados*/
	if ($permiso_accion['S']==1) {
		$resultc = paraTodos::arrayConsulta("usuarios.id,usuarios.Cedula,usuarios.Usuario,registrados.Nombres,registrados.Apellidos,registrados.correo,
    usuarios.Nivel", "usuarios,registrados", "usuarios.Tipo='Valido' and usuarios.Cedula=registrados.cedula")
?>
									<div style="width: 90%;border: 1px solid #CCCCCC;background: #FFFFFF;margin: 10px auto 0px auto;">
										<table cellSpacing="1" cellPadding="2" style="width: 100%;">
											<tr>
												<th colSpan="5" style="width: 100%;padding: 6px;background: #FAFAFA;border: 1px solid #DDDDDD;"> Usuarios Registrados </th>
											</tr>
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
        					data: { editar: '<?php echo $rowc[id]; ?>', org: <?php echo $idsubmenu; ?>, act:2},
        					success: function(html) {
        						$('#page-content').html(html);
        					},
        					error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
        				}); return false;" href="javascript: void(0);"> <i class="glyph-icon icon-edit opacity-80" style="font-size: 1.600em;margin-left: 10px;"></i> </a>
															<a title="Eliminar el registro" onclick=" var msg = confirm('Esta seguro que desea eliminar el registro?');
        				if (msg) {
        					$.ajax({
        						type: 'POST',
        						url: 'controller.php',
        						data: { borrar: '<?php echo $rowc[id]; ?>', org: <?php echo $idsubmenu; ?>, act:2, cedula: <?php echo $rowc['Cedula']; ?>},
        						success: function(html) { $('#page-content').html(html); }
        					});
        				} return false;" href="javascript: void(0);"> <i class="glyph-icon icon-remove opacity-80" style="font-size: 1.600em;margin-left: 10px;"></i> </a>
															<?php
				}
				//------------------------------------------------------------------------------------------------------------						
?>
													</td>
												</tr>
												<?php		
		}
		//------------------------------------------------------------------------------------------------------------					
?>
										</table>
									</div>
									<?php
	}
	//------------------------------------------------------------------------------------------------------------

?>