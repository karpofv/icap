<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/css/datatables.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/time/css/bootstrap-timepicker.css">
<div class="row">
	<div class="col-xs-12">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Denuncias sobre el personal del CPEB
		</h1>
    </div>
</div>
<?php
	/*Se incluyen archicos comunes*/
	$org = $_POST['org'];
	//------------------------------------------------------------------------------------------------------------
	/*Se recogen los datos para manipularlos*/
    $codigo=$_POST['den_codigo'];
    $fecha=$_POST['den_fecha'];
    $hora=$_POST['den_hora'];
    $nacional=$_POST['den_nacional'];
    $cedula=$_POST['den_cedula'];
    $nombres=$_POST['den_nombres'];
    $apellidos=$_POST['den_apellidos'];
    $fecnac=$_POST['den_fecnac'];
    $genero=$_POST['den_genero'];
    $grado=$_POST['den_grado'];
    $oficio=$_POST['den_oficio'];
    $estadoc=$_POST['den_estadoc'];
    $direccion=$_POST['den_direccion'];
    $exposicion=$_POST['den_exposicion'];
    $cedfun=$_POST['den_funcedula'];
    $nomfun=$_POST['den_funnombre'];
    $apefun=$_POST['den_funapellido'];
    $rango=$_POST['den_funrango'];
    $borrar = $_POST['borrar'];
    $editarrt = $_POST['editar'];
    $eliminar = $_POST['eliminar'];
    $mostrar = $_POST['mostrar'];
    $asigfun = $_POST['asigfun'];
	//------------------------------------------------------------------------------------------------------------
	/*Se verifican los permisos del usuario*/
    if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
		/*GUARDAR -----------Se verifica que $editarrt=="" y las variables no se encuentren vacias para proceder a guardar  */
        if ($mostrar == "" and $editarrt=="" and $cedula!=""){
			/*Se verifica no se encuentre ya registrado la denuncia de lo contrario se realiza el insert*/
			$resultx = paraTodos::arrayConsultanum("den_codigo", "denuncia", "den_codigo = '$codigo'");
			if ($resultx > 0){
				echo '
				<div class="alert alert-block alert-success" data-action="savesuccesfull">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Ya existe denuncia registrada bajo el mismo denunciante y fecha</h4>
				</div>';
			} else {
				$insertar = paraTodos::arrayInserte("den_fecha,den_hora, den_nacional, den_cedula, den_nombres, den_apellidos, den_fecnac, den_genero, den_grado, den_oficio, den_estadoc, den_direccion, den_exposicion, den_funcedula, den_funnombre, den_funapellido, den_funrango","denuncia","'$fecha','$hora','$nacional','$cedula','$nombres','$apellidos','$fecnac','$genero','$grado','$oficio','$estadoc','$direccion','$exposicion','$cedfun','$nomfun','$apefun','$rango'");
                if ($insertar) {
                    echo '<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Denuncia Registrada!</h4>
						</div>';
							$editarrt="";
							$codigo="";
							$fecha="";
							$hora="";
							$nacional="";
							$cedula="";
							$nombres="";
							$apellidos="";
							$fecnac="";
							$genero="";
							$grado="";
							$oficio="";
							$estadoc="";
							$direccion="";
							$exposicion="";
							$cedfun="";
							$nomfun="";
							$apefun="";
							$rango="";
                	}else{
						echo '
						<div class="alert alert-block alert-success">
							<a class="close" data-dismiss="alert" href="#">×</a>
							<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> No se proceso los datos, del Registro!</h4>
						</div>';
                	}				
				}
				//------------------------------------------------------------------------------------------------------------			
			}
			
		//------------------------------------------------------------------------------------------------------------
		/*UPDATE--------------Se verifica que $editarrt!="" y las variables no se encuentren vacias para proceder a Editar*/
        if ($editarrt!="" and $cedula!=""){
			//------------------------------------------------------------------------------------------------------------
			/*Se modifica los datos de registro del Denuncia*/ $modifico=paraTodos::arrayUpdate("den_fecha='$fecha',den_cedula='$cedula',den_nombres='$nombres',den_apellidos='$apellidos',den_fecnac='$fecnac',den_genero='$genero',den_grado='$grado',den_oficio='$oficio',den_estadoc='$estadoc',den_direccion='$direccion',den_exposicion='$exposicion',den_funcedula='$cedfun',den_funnombre='$nomfun',den_funapellido='$apefun',den_funrango='$rango'", "denuncia", "den_codigo='$editarrt'");			
            if($modifico){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Registro Modificado!</h4>
				</div>';
				$editarrt="";
                $codigo="";
                $fecha="";
                $hora="";
                $nacional="";
                $cedula="";
                $nombres="";
                $apellidos="";
                $fecnac="";
                $genero="";
                $grado="";
                $oficio="";
                $estadoc="";
                $direccion="";
                $exposicion="";
                $cedfun="";
                $nomfun="";
                $apefun="";
                $rango="";
            }
			//------------------------------------------------------------------------------------------------------------			
        }
		//------------------------------------------------------------------------------------------------------------		
		/*MOSTRAR---------------------Se verifica si la variable $editarr!="" para proceder a Mostrar los datos guardados del Denuncia*/
        if ($editarrt!="" and $cedula=="") {
			$resultsedes = paraTodos::arrayConsulta("*", "denuncia", "den_codigo = '$editarrt'");
            foreach ($resultsedes as $row){
                $codigo=$row['den_codigo'];
                $fecha=$row['den_fecha'];
                $hora=$row['den_hora'];
                $nacional=$row['den_nacional'];
                $cedula=$row['den_cedula'];
                $nombres=$row['den_nombres'];
                $apellidos=$row['den_apellidos'];
                $fecnac=$row['den_fecnac'];
                $genero=$row['den_genero'];
                $grado=$row['den_grado'];
                $oficio=$row['den_oficio'];
                $estadoc=$row['den_estadoc'];
                $direccion=$row['den_direccion'];
                $exposicion=$row['den_exposicion'];
                $cedfun=$row['den_funcedula'];
                $nomfun=$row['den_funnombre'];
                $apefun=$row['den_funapellido'];
                $rango=$row['den_funrango'];
			}
        }
        /*ACTUALIZAR TABLA DE FUNCIONARIOS IMPLICADOS---------------------*/
        if ($editarrt!="" and $_POST['cedulain']!= '' and $eliminar==''){
			$resultsedes = paraTodos::arrayConsulta("*", "denuncia", "den_codigo = '$editarrt'");
            foreach ($resultsedes as $row){
                $codigo=$row['den_codigo'];
                $fecha=$row['den_fecha'];
                $hora=$row['den_hora'];
                $nacional=$row['den_nacional'];
                $cedula=$row['den_cedula'];
                $nombres=$row['den_nombres'];
                $apellidos=$row['den_apellidos'];
                $fecnac=$row['den_fecnac'];
                $genero=$row['den_genero'];
                $grado=$row['den_grado'];
                $oficio=$row['den_oficio'];
                $estadoc=$row['den_estadoc'];
                $direccion=$row['den_direccion'];
                $exposicion=$row['den_exposicion'];
                $cedfun=$row['den_funcedula'];
                $nomfun=$row['den_funnombre'];
                $apefun=$row['den_funapellido'];
                $rango=$row['den_funrango'];
			}     
            /*SE VALIDA LA CEDULA PERTENEZCA A UN FUNCIONARIO REGISTRADO*/
            $validarfun = paraTodos::arrayConsultanum("*", "funcionarios", "fun_cedula = '$_POST[cedulain]'");
            if ($validarfun>0){
                /*SE VALIDA EL FUNCIONARIO NO SE ENCUENTRE YA ASIGNADO A LA DENUNCIA*/
                $validarfunrep = paraTodos::arrayConsultanum("*", "denuncia_func", "denf_dencodigo = $editarrt and denf_funcedula=$_POST[cedulain]");
                if ($validarfunrep == 0){
                    $funcionario = paraTodos::arrayConsulta("*", "funcionarios f, rangos r", " f.fun_rango=r.rang_codigo and fun_cedula =$_POST[cedulain]");
                    foreach ($funcionario as $rowf){
				        $insertar = paraTodos::arrayInserte("denf_dencodigo, denf_funcedula, denf_funnombre, denf_funapellido, denf_funrango","denuncia_func","$editarrt,$_POST[cedulain],'$rowf[fun_nombre]','$rowf[fun_apellido]','$rowf[rang_descrip]'");
                    }
                    $resultsedes = paraTodos::arrayConsulta("*", "denuncia_fun", "denf_dencodigo = '$editarrt'");
                    foreach ($resultsedes as $row){
    ?>
	<tr>
		<td>
			<?php echo $row['denf_funcedula']?>
		</td>
		<td>
			<?php echo $row['denf_funnombre']?>
		</td>
		<td>
			<?php echo $row['denf_funapellido']?>
		</td>
		<td>
			<?php echo $row['denf_funrango']?>
		</td>
		<td>
			<?php                                           
                        if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
    ?>
				<a title="Eliminar el registro" onclick=" var msg = confirm('Esta seguro que desea eliminar el registro?');
        									if (msg) {
        										$.ajax({
        											type: 'POST',
        											url: 'controller.php',
        											data: { editar: $editarrt, org: <?php echo $org; ?>,cedula: <?php echo $row['denf_funcedula']?>, eliminar: 1},
        											success: function(html) { $('#content').html(html); }
        										});
        									} return false;" href="javascript: void(0);"> <i class="fa fa-eraser" style="font-size: 1.600em;margin-left: 10px;"></i> </a>
				<?php
                        }
    ?>
		</td>
	</tr>
	<?php
                    }
                } else {
                    echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Funcionario ya se encuentra asignado a esta denuncia!</h4>
				</div>';                    
                }
            } else {
                echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Cédula no pertene a un funcionario registrado!</h4>
				</div>';                
            }
        }
        /*ELIMINAR FUNCIONARIO ASIGNADO*/
        if ($editarrt!="" and $_POST['cedulain']!= '' and $eliminar!=''){
			$resultsedes = paraTodos::arrayConsulta("*", "denuncia", "den_codigo = '$editarrt'");
            foreach ($resultsedes as $row){
                $codigo=$row['den_codigo'];
                $fecha=$row['den_fecha'];
                $hora=$row['den_hora'];
                $nacional=$row['den_nacional'];
                $cedula=$row['den_cedula'];
                $nombres=$row['den_nombres'];
                $apellidos=$row['den_apellidos'];
                $fecnac=$row['den_fecnac'];
                $genero=$row['den_genero'];
                $grado=$row['den_grado'];
                $oficio=$row['den_oficio'];
                $estadoc=$row['den_estadoc'];
                $direccion=$row['den_direccion'];
                $exposicion=$row['den_exposicion'];
                $cedfun=$row['den_funcedula'];
                $nomfun=$row['den_funnombre'];
                $apefun=$row['den_funapellido'];
                $rango=$row['den_funrango'];
			}     
            $insertar = paraTodos::arrayDelete("denf_funcedula=$_POST[cedula]","denuncia_func");
            $resultsedes = paraTodos::arrayConsulta("*", "denuncia_fun", "denf_dencodigo = '$editarrt'");
            foreach ($resultsedes as $row){
?>
		<tr>
			<td>
				<?php echo $row['denf_funcedula']?>
			</td>
			<td>
				<?php echo $row['denf_funnombre']?>
			</td>
			<td>
				<?php echo $row['denf_funapellido']?>
			</td>
			<td>
				<?php echo $row['denf_funrango']?>
			</td>
			<td>
				<?php
                    if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1){
?>
					<a title="Eliminar el registro" onclick=" var msg = confirm('Esta seguro que desea eliminar el registro?');
        									if (msg) {
        										$.ajax({
        											type: 'POST',
        											url: 'controller.php',
        											data: { editar: $editarrt, org: <?php echo $org; ?>, cedula: <?php echo $row['denf_funcedula']?>, eliminar: 1},
        											success: function(html) { $('#content').html(html); }
        										});
        									} return false;" href="javascript: void(0);"> <i class="fa fa-eraser" style="font-size: 1.600em;margin-left: 10px;"></i> </a>
					<?php
                    }
?>
			</td>
		</tr>
		<?php
            }
            if($insertar){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Registro Eliminado!</h4>
				</div>';
            }            
        }
		//------------------------------------------------------------------------------------------------------------
		/*BORRAR-----------------Se verifica si la variable $borrar!="" para proceder a eliminar la denuncia*/
        if ($borrar<>"") {
			$delete = paraTodos::arrayDelete("den_codigo = $borrar","denuncia");
            if ($delete) {
				echo '
					<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i>Denuncia Eliminada!</h4>
					</div>';
            }
        }		
		//------------------------------------------------------------------------------------------------------------	
?>
			<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-sortable" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="position: relative; opacity: 1; left: 0px; top: 0px;">
					<header role="heading">
						<h2>Denuncias CPEB </h2> <span class="jarviswidget-loader" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span> </header>
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
									den_fecha: $('#fecha').val(),
									den_hora: $('#hora').val(),                                                        
									den_nacional: $('#nacional').val(),                                                        
									den_cedula: $('#cedula').val(),
									den_nombres: $('#nombre').val(),
									den_apellidos: $('#apellido').val(),
									den_fecnac: $('#fecnac').val(),
									den_genero: $('#genero').val(),
									den_grado: $('#grado').val(),
									den_oficio: $('#oficio').val(),
									den_estadoc: $('#estcivil').val(),
									den_direccion: $('#direc').val(),
									den_exposicion: $('#expo').val(),
									den_funcedula: $('#tcedfun').html(),
									den_funnombre: $('#tnomfun').html(),
									den_funapellido: $('#tapefun').html(),
									den_funrango: $('#trango').html(),                                               
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
									den_fecha: $('#fecha').val(),
									den_hora: $('#hora').val(),                                                        
									den_nacional: $('#nacional').val(),                                                        
									den_cedula: $('#cedula').val(),
									den_nombres: $('#nombre').val(),
									den_apellidos: $('#apellido').val(),
									den_fecnac: $('#fecnac').val(),
									den_genero: $('#genero').val(),
									den_grado: $('#grado').val(),
									den_oficio: $('#oficio').val(),
									den_estadoc: $('#estcivil').val(),
									den_direccion: $('#direc').val(),
									den_exposicion: $('#expo').val(),
									den_funcedula: $('#tcedfun').html(),
									den_funnombre: $('#tnomfun').html(),
									den_funapellido: $('#tapefun').html(),
									den_funrango: $('#trango').html(),
                                    mostrar: '',
                                    org   		: <?php echo $org; ?>
                                },
                                success: function(html) {
                                	$('#content').html(html);
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
                            }); return false" action="javascript: void(0);" method="post" class="smart-form">
											<?php
        }
		//------------------------------------------------------------------------------------------------------------
?>
												<header> Datos Generales de la denuncia </header>
												<fieldset>
													<div class="row">
														<section class="col col-3">
															<label class="label">Fecha</label>
															<label class="input">
																<input type="date" class="input-sm" size="60" name="fecha" id="fecha" value="<?php echo $fecha ; ?>" required="required"> </label>
														</section>
														<section class="col col-3">
															<label class="label">Hora</label>
															<div class="input-group bootstrap-timepicker timepicker">
																<input id="hora" type="text" class="form-control input-small" value="<?php echo $hora ; ?>" required> <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span> </div>
														</section>
													</div>
												</fieldset>
												<header> Datos del denunciante</header>
												<fieldset>
													<div class="row">
														<section class="col col-4">
															<label class="label">Nacionalidad</label>
															<label class="select">
																<select id="nacional" name="nacional">
																	<?php  
																		Combos::CombosSelect('1', $naciona, 'DISTINCT nac_codigo,nac_descripcion', 'nacionalidad', 'nac_codigo', 'nac_descripcion', "nac_codigo<>'' ORDER BY nac_descripcion desc");
																	?>
																</select> <i></i> </label>
														</section>
														<section class="col col-4">
															<label class="label">Cédula</label>
															<label class="input">
																<input type="number" class="input-sm" min="1" size="10" name="cedula" id="cedula" value="<?php echo $cedula;?>" required="required"> </label>
														</section>
													</div>
													<div class="row">
														<section class="col col-6">
															<label class="label">Nombres</label>
															<label class="input">
																<input type="text" class="input-sm" maxLength="100" size="60" name="nombre" id="nombre" value="<?php echo $nombres ; ?>" required="required"> </label>
														</section>
														<section class="col col-6">
															<label class="label">Apellidos</label>
															<label class="input">
																<input type="text" class="input-sm" maxLength="100" size="60" name="apellido" id="apellido" value="<?php echo $apellidos ; ?>" required="required"> </label>
														</section>
													</div>
													<div class="row">
														<section class="col col-3">
															<label class="label">Fecha de Nacimiento</label>
															<label class="input">
																<input type="date" class="input-sm" size="60" name="fenac" id="fecnac" value="<?php echo $fecnac ; ?>" required="required"> </label>
														</section>
														<section class="col col-4">
															<label class="label">Genero</label>
															<label class="select">
																<select id="genero" name="genero">
																	<option value="0">Seleccione el Genero</option>
																	<?php  
																		Combos::CombosSelect('1', $genero, 'DISTINCT id,Nombre', 'sexo', 'id', 'Nombre', "id<>'' ORDER BY Nombre");
																	?>
																</select> <i></i> </label>
														</section>
													</div>
													<div class="row">
														<section class="col col-6">
															<label class="label">Grado de Instrucción</label>
															<label class="input">
																<input type="text" class="input-sm" maxLength="100" size="60" name="grado" id="grado" value="<?php echo $grado ; ?>" required="required"> </label>
														</section>
														<section class="col col-6">
															<label class="label">Oficio</label>
															<label class="input">
																<input type="text" class="input-sm" maxLength="100" size="60" name="oficio" id="oficio" value="<?php echo $oficio ; ?>" required="required"> </label>
														</section>
														<section class="col col-3">
															<label class="label">Estado Civil</label>
															<label class="select">
																<select id="estcivil" name="estcivil">
																	<option value="0">Seleccione el Estado Civil</option>
																	<?php  
																		Combos::CombosSelect('1', $estadoc, 'DISTINCT estc_codigo,estc_descripcion', 'estado_civil', 'estc_codigo', 'estc_descripcion', "estc_codigo<>'' ORDER BY estc_descripcion");
																	?>
																</select> <i></i> </label>
														</section>
														<section class="col col-9">
															<label class="label">Dirección</label>
															<label class="textarea"> <i class="icon-append fa fa-comment"></i>
																<textarea rows="5" name="direc" id="direc" required="required"><?php echo $direccion; ?></textarea>
															</label>
														</section>
														<section class="col col-10">
															<label class="label">Breve exposición del denunciante</label>
															<label class="textarea"> <i class="icon-append fa fa-comment"></i>
																<textarea rows="5" name="expo" id="expo" required="required"><?php echo $exposicion; ?></textarea>
															</label>
														</section>
													</div>
												</fieldset>
												<header> Funcionario Receptor</header>
												<fieldset>
													<div class="row">
														<section class="col col-3">
															<label class="label">Cédula</label>
															<label class="input">
																<input type="number" class="input-sm" min="1" size="10" name="cedfun" id="cedfun"> </label>
														</section>
														<section class="col col-1">
															<br> <a onclick="
																		var ced = $('#cedfun').val();
																		$.ajax({
																			type: 'POST',
																			url: 'controller.php',		
																			data: { org:2, cedula: ced, ver:1},
																			success: function(html) {
																				$('#tbfun').html(html);
																			},
																			error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
																		}); return false;" href="javascript: void(0);" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-ok"></i></a> </section>
													</div>
													<div class="table-responsive" id="tbfun"> <b>Funcionario que hace el llamado de atención</b>
														<table class="table table-bordered">
															<thead>
																<tr>
																	<th>Cédula</th>
																	<th>Nombres</th>
																	<th>Apellidos</th>
																	<th>Rango</th>
																</tr>
															</thead>
															<tbody id="tbfuncionario">
																<?php
																	$funcionarios = paraTodos::arrayConsulta("*", "denuncia", "den_codigo = $codigo");
																	foreach($funcionarios as $rowf){
						?>
																	<tr>
																		<td id="tcedfun">
																			<?php echo $rowf['den_funcedula']?>
																		</td>
																		<td id="tnomfun">
																			<?php echo $rowf['den_funnombre']?>
																		</td>
																		<td id="tapefun">
																			<?php echo $rowf['den_funapellido']?>
																		</td>
																		<td id="trango">
																			<?php echo $rowf['den_funrango']?>
																		</td>
																	</tr>
																	<?php
																	}
						?>
															</tbody>
														</table>
													</div>
												</fieldset>
												<header> Funcionarios Implicados</header>												
												<fieldset>						
													<div class="row collapse" id="rowcedimpli">
														<section class="col col-3">
															<label class="label">Cédula</label>
															<label class="input">
																<input type="number" class="input-sm" min="1" size="10" name="cedulafimp" id="cedulafimp"> </label>
														</section>
														<section class="col col-1">
															<br>
															<a onclick="
																		var ced = $('#cedulafimp').val();
																		$.ajax({
																			type: 'POST',
																			url: 'controller.php',		
																			data: { 
                                                                                codigo: '<?php echo $codigo; ?>',
                                                                                opcion: 'aggfunimpl',
                                                                                org: 352,
                                                                                cedula: ced, 
                                                                                ver: 1
                                                                            },
																			success: function(html) {
                                                                                $.ajax({
																			         type: 'POST',
																			         url: 'controller.php',		
																			         data: { 
                                                                                        codigo: '<?php echo $codigo; ?>',
                                                                                        opcion: 'acttabfunimpl',
                                                                                        org: 352,
                                                                                        ver: 1
                                                                                    },
																			        success: function(html) {
                                                                                        $('#tbfuncasig').html(html);
                                                                                    },
																			        error: function(xhr,msg,excep) {
                                                                                        alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                                                    }
                                                                                });
																            },
																			error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
																		}); return false;" href="javascript: void(0);" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-ok"></i></a>
														</section>
													</div>
													<div class="table-responsive">
													<b>Funcionarios Implicados</b>
														<table class="table table-bordered">
															<thead>
																<tr>
																	<th>Cédula</th>
																	<th>Nombres</th>
																	<th>Apellidos</th>
																	<th>Rango</th>
																	<th>Eliminar</th>
																</tr>
															</thead>
															<tbody id="tbfuncasig">
						<?php
																	$funcionarios = paraTodos::arrayConsulta("*", "denuncia_func", "denf_dencodigo = $codigo");
																	foreach($funcionarios as $rowf){
						?>
																	<tr>
																		<td><?php echo $rowf['denf_funcedula']?></td>
																		<td><?php echo $rowf['denf_funnombre']?></td>
																		<td><?php echo $rowf['denf_funapellido']?></td>
																		<td><?php echo $rowf['denf_funrango']?></td>
																		<td>
						<?php
																			if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
						?>										
																			 <a title="Eliminar el registro" onclick=" var msg = confirm('Esta seguro que desea eliminar el registro?');
																	if (msg) {
																		$.ajax({
                                                                           type: 'POST',
                                                                           url: 'controller.php',		
                                                                            data: { 
                                                                                codigo: <?php echo $codigo; ?>,
                                                                                opcion: 'delfunimpl',
                                                                                org: 352,
                                                                                cedula: <?php echo $rowf['denf_funcedula']?>, 
                                                                                ver: 1
                                                                            },
                                                                            success: function(html) {
                                                                                $.ajax({
                                                                                     type: 'POST',
                                                                                    url: 'controller.php',		
                                                                                    data: { 
                                                                                        codigo: '<?php echo $rowf['denf_dencodigo']?>',
                                                                                        opcion: 'acttabfunimpl',
                                                                                        org: 352,
                                                                                        ver: 1
                                                                                    },
                                                                                    success: function(html) {
                                                                                        $('#tbfuncasig').html(html);
                                                                                    },
                                                                                    error: function(xhr,msg,excep) {
                                                                                        alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                                                                    }
                                                                                });
                                                                            },
                                                                            error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                                                                        });
																	} return false;" href="javascript: void(0);"> 
																				 <i class="fa fa-eraser" style="font-size: 1.600em;margin-left: 10px;"></i> 
																			</a>											
						<?php
																			}
						?>
																		</td>
																	</tr>
						<?php
																	}
						?>

															</tbody>
														</table>
													</div>
												</fieldset>
												<footer>
													<button type="submit" class="btn btn-primary"> Guardar </button>
													<button type="button" class="btn btn-default"> Cancelar </button>
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
	/*Si el usuario tiene permisos de lectura se muestra la tabla con los expdientes registrados*/
}

		if ($permiso_accion['S']==1) {
		$resultc = paraTodos::arrayConsulta("*", "denuncia", "1=1");
?>
				<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">
						<header role="heading">
							<h2>Denuncias Registradas</h2> <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span> </header>
						<!-- widget div-->
						<div role="content">
							<!-- widget content -->
							<div class="widget-body no-padding">
								<table id="denuncias" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nº</th>
											<th>Fecha</th>
											<th>Cedula</th>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Editar</th>
											<th>Asignar Func.</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody>
										<?php
		/*Se arrojan los datos en la tabla de denuncias registradas*/
		foreach($resultc as $rowc){
			//------------------------------------------------------------------------------------------------------------
?>
											<tr style="border-bottom: 1px solid #EEEEEE;">
												<td>
													<?php echo $rowc['den_codigo'];?>
												</td>
												<td>
													<?php echo $rowc['den_fecha'];?>
												</td>
                                                <td>
													<?php echo $rowc['den_cedula'];?>
												</td>
												<td>
													<?php echo $rowc['den_nombres'];?>
												</td>
                                                <td>
													<?php echo $rowc['den_apellidos'];?>
												</td>
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
                                                        editar: '<?php echo $rowc['den_codigo']; ?>',
                                                        org: <?php echo $org; ?>
                                                    },
        											success: function(html) {
        												$('#content').html(html);
        											},
        											error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
        										}); return false;" href="javascript: void(0);"> <i class="fa fa-pencil-square-o" style="font-size: 1.600em;margin-left: 10px;"></i> </a>
														<?php
				}
				//------------------------------------------------------------------------------------------------------------						
?>
												</td>
												<td>
													<?php
										/*Se verifica tenga todos los permisos*/
        								if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
?>
														<a title="Asignar Funcionario" onclick="
						       			 		$.ajax({
						        			 		type: 'POST',
        			 								url: 'controller.php',		
        											data: { 
                                                        mostrar: '<?php echo $rowc['den_codigo']; ?>',
                                                        org: <?php echo $org; ?>,
                                                        asigfun: 1
                                                    },
        											success: function(html) {
        												$('#content').html(html);
                                                        $('#rowcedimpli').removeClass('collapse');                                       
        											},
        											error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
        										}); return false;" href="javascript: void(0);"> <i class="fa fa-pencil-square-o" style="font-size: 1.600em;margin-left: 10px;"></i> </a>
														<?php
				}
				//------------------------------------------------------------------------------------------------------------						
?>
												</td>
												<td>
													<?php
											/*Se verifica tenga todos los permisos*/
        									if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
?>
														<a title="Eliminar el registro" onclick=" var msg = confirm('Esta seguro que desea eliminar el registro?');
        									if (msg) {
        										$.ajax({
        											type: 'POST',
        											url: 'controller.php',
        											data: { borrar: <?php echo $rowc[den_codigo]; ?>, org: <?php echo $org; ?>},
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
?>
<script src="<?php echo $ruta_base; ?>assets/time/js/bootstrap-timepicker.js"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#denuncias').DataTable({
								"language": {
									"url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
								}
							});
							if ($("#estadoxp").val() === '5') {
								$("#secobserv_otros").removeClass("collapse");
								$("#secarchiv").addClass("collapse");
							}
							if ($("#estadoxp").val() === '3') {
								$("#secarchiv").removeClass("collapse");
								$("#secobserv_otros").addClass("collapse");
							}
							$('#hora').timepicker();
						});
						$("#estadoxp").change(function () {
							if ($("#estadoxp").val() === '5') {
								$("#secobserv_otros").removeClass("collapse");
								$("#secarchiv").addClass("collapse");
							}
							if ($("#estadoxp").val() === '3') {
								$("#secarchiv").removeClass("collapse");
								$("#secobserv_otros").addClass("collapse");
							}
						});
					</script>