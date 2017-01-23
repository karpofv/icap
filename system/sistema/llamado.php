	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/css/datatables.css">	
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Llamadas de atención
			</h1>
		</div>
	</div>	
<?php
	/*Se incluyen archicos comunes*/
	$org = $_POST['org'];
	//------------------------------------------------------------------------------------------------------------
	/*Se recogen los datos para manipularlos*/
    $llamada = $_POST['llam_codigo'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['fun_nombre'];
    $apellido = $_POST['fun_apellido'];
    $fecingreso = $_POST['fun_fecingreso'];
    $fecreingreso = $_POST['fun_fecreingreso'];
    $placa = $_POST['fun_placa'];
    $rango = $_POST['fun_rango'];
    $procedencia = $_POST['fun_procedencia'];
    $adscrito = $_POST['fun_adscrito'];
    $fecha = $_POST['fecha'];
    $motivo = $_POST['motivo'];
    $realacion = $_POST['relacion'];
    $cedfun = $_POST['cedfun'];
    $borrar = $_POST['borrar'];
    $editarrt = $_POST['editar'];
    $mostrar = $_POST['mostrar'];
	//------------------------------------------------------------------------------------------------------------
	/*Se verifican los permisos del usuario*/
if ($permiso_accion['S']==1) {
		$resultc = paraTodos::arrayConsulta("*", "funcionarios", "1=1")
?>
		<article class="col-sm-12 col-md-12 col-lg-6">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">
				<header role="heading">
					<h2>Funcionarios Registrados</h2> 
				</header>
				<!-- widget div-->
				<div role="content">
					<!-- widget content -->
					<div class="widget-body no-padding">
						<table id="funcionarios" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Cedula</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Placa</th>
										<th>Seleccionar</th>
									</tr>
								</thead>
								<tbody>
<?php
		/*Se arrojan los datos en la tabla de funcionarios registrados*/
		foreach($resultc as $rowc){
			//------------------------------------------------------------------------------------------------------------
?>
									<tr style="border-bottom: 1px solid #EEEEEE;">
										<td><?php echo $rowc['fun_cedula'];?></td>
										<td><?php echo $rowc['fun_nombre'];?></td>
										<td><?php echo $rowc['fun_apellido'];?></td>
										<td><?php echo $rowc['fun_placa'];?></td>																			
										<td>
<?php
											/*Se verifica tenga todos los permisos*/
        									if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
?>
												<a title="Seleccionar funcionario" onclick="
       			 		$.ajax({
        			 		type: 'POST',
        			 		url: 'controller.php',
        					data: { 
        						mostrar: '<?php echo $rowc[fun_codigo]; ?>', 
        						ver: 1,
        						org: <?php echo $org; ?>
        					},
        					success: function(html) {
        						$('#content').html(html);
        					},
        					error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
        				}); return false;" href="javascript: void(0);"> 
        										<i class="fa fa-pencil-square-o" style="font-size: 1.600em;margin-left: 10px;"></i> </a>											
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
    if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
		/*GUARDAR -----------Se verifica que $editarrt=="" y las variables no se encuentren vacias para proceder a guardar  */		
        if ($editarrt=="" and $motivo!=""){
			/*Se verifica no se encuentre ya registrado el Usuario de lo contrario se realiza el insert*/
			/*$resultx = paraTodos::arrayConsultanum("asis_codigo", "asistencia", "asis_funcedula = '$cedula' and asis_expcodigo=$expcodigo");
			if ($resultx > 0){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Funcionario ya posee asginada una asistencia obligatoria bajo este expediente!</h4>
				</div>';
			} else {*/
				$insertar = paraTodos::arrayInserte("llam_fecha, llam_funcedula, llam_motivo, llam_relacion, llam_cedfun","llamados","'$fecha',$cedula,'$motivo','$realacion','$cedfun'");
                if ($insertar) {
                    echo '<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Llamado de atención registrado!</h4>
					</div>';
					$llamada = "";
					$cedula = "";
					$nombre = "";
					$apellido = "";
					$fecingreso = "";
					$fecreingreso = "";
					$placa = "";
					$rango = "";
					$procedencia = "";
					$adscrito = "";
					$fecha = "";
					$motivo = "";
					$realacion = "";
					$cedfun = "";
                }else{
					echo '
					<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> No se proceso los datos, del Registro!</h4>
					</div>';
                }				
			/*}*/
			//------------------------------------------------------------------------------------------------------------			
		}
		//------------------------------------------------------------------------------------------------------------
		/*UPDATE--------------Se verifica que $editarrt!="" y las variables no se encuentren vacias para proceder a Editar*/				
        if ($editarrt!="" and $asiscod!=""){
			//------------------------------------------------------------------------------------------------------------
			/*Se modifica los datos de registro del Usuario*/			
			$modifico = paraTodos::arrayUpdate("asis_fecha='$fecini',asis_expcodigo='$expcodigo',asis_funcedula='$cedula',asis_observacion='$motivobserv',asis_tipor='$tiporeentre',asis_lugarr='$lugarreent',asis_horas='$canthoras',asis_supervisor='$superv',asis_observaofic='$observofic',asis_pondera='$pondera',asis_tipo='OBLIGATORIA'", "asistencia", "asis_codigo='$editarrt'");			
            if($modifico){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Registro Modificado!</h4>
				</div>';
				$editarrt="";
				$llamada = "";
				$cedula = "";
				$nombre = "";
				$apellido = "";
				$fecingreso = "";
				$fecreingreso = "";
				$placa = "";
				$rango = "";
				$procedencia = "";
				$adscrito = "";
				$fecha = "";
				$motivo = "";
				$realacion = "";
				$cedfun = "";
            }
			//------------------------------------------------------------------------------------------------------------			
        }
		//------------------------------------------------------------------------------------------------------------		
		/*MOSTRAR---------------------Se verifica si la variable $editarr!="" para proceder a Mostrar los datos guardados del usuario*/		
        if ($mostrar!=""){
			$resultsedes = paraTodos::arrayConsulta("*", "funcionarios f, rangos r", "f.fun_rango=rang_codigo and f.fun_codigo=$mostrar");
            foreach ($resultsedes as $row){
				$cedula = $row['fun_cedula'];
				$nombre = $row['fun_nombre'];
				$apellido = $row['fun_apellido'];
				$fecingreso = $row['fun_fecingreso'];
				$fecreingreso = $row['fun_fecreingreso'];
				$placa = $row['fun_placa'];
				$rango = $row['rang_descrip'];
				$procedencia = $row['fun_procedencia'];
				$adscrito = $row['fun_adscrito'];
			}
        }
		//------------------------------------------------------------------------------------------------------------
		/*BORRAR-----------------Se verifica si la variable $borrar!="" para proceder a eliminar el usuario*/
        if ($borrar<>"") {
			$delete = paraTodos::arrayDelete("asis_codigo = $borrar","asistencia");
            if ($delete) {
				echo '
					<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i>Asistencia eliminada!</h4>
					</div>';
            }
        }		
		//------------------------------------------------------------------------------------------------------------	
?>
	<article class="col-sm-12 col-md-12 col-lg-6">
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-sortable" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="position: relative; opacity: 1; left: 0px; top: 0px;">
			<header role="heading">
				<h2><b>Datos del Funcionario</b> </h2> <span class="jarviswidget-loader" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span> </header>
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
									cedula: $('#cedula').val(),
									fecha: $('#fecha').val(),
									motivo: $('#motivo').val(),
									relacion: $('#relacion').val(),
									cedfun: $('#cedfun').val(),
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
									cedula: $('#cedula').html(),
									fecha: $('#fecha').val(),
									motivo: $('#motivo').val(),
									relacion: $('#relacion').val(),
									cedfun: $('#cedfun').val(),
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
						<header> <b>Datos Personales </b></header>
						<fieldset>
							<div class="row">
								<section class="col col-12">
									<?php
										$url = $absolute_uri."assets/images/fotos/$cedula.jpg";
										$urlexist = paraTodos::url_exists($url);
										if ($urlexist == '1') {
											$foto = $url;
										} else {											
											$foto = $ruta_base."assets/images/fotos/sinfoto.jpg";
										}
									?>
									<img id="imgperfil" src="<?php echo $foto."?".rand(1,1000);?>" alt="img" class="online" width="150px;">
								</section>								
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="label"><b>Cédula</b></label>
									<label class="input" id="cedula">
										<?php echo $cedula;?>
								</section>
								<section class="col col-6">
									<label class="label"><b>Fecha de Ingreso</b></label>
									<label class="input">
										<?php echo $fecingreso;?>
									</label>
								</section>								
								<section class="col col-6">
									<label class="label"><b>Nombres</b></label>
									<label class="input">
										<?php echo $apellido ; ?>
									</label>
								</section>
								<section class="col col-6">
									<label class="label"><b>Fecha de Reingreso</b></label>
									<label class="input">
										<?php echo $fecreingreso;?>
									</label>
								</section>								
								<section  class="col col-6">
									<label class="label"><b>Apellidos</b></label>
									<label class="input">
										<?php echo $nombre ; ?>
								</section>
								<section class="col col-6">
									<label class="label"><b>Placa</b></label>
									<label class="input">
										<?php echo $placa;?>
									</label>
								</section>									
							</div>
						</fieldset>
						<header><b> Datos Laborales </b></header>						
						<fieldset>
							<div class="row">							
								<section class="col col-6">
									<label class="label"><b>Procedencia</b></label>
									<label class="input">
										<?php echo $procedencia ; ?>
									</label>
								</section>
								<section class="col col-6">
									<label class="label"><b>Adscrito</b></label>
									<label class="input">
										<?php echo $adscrito ; ?>
									</label>
								</section>
								<section class="col col-6">
									<label class="label"><b>Rango</b></label>
									<label class="select">										
        									<?php  
												echo $rango
											?>
									</label>
								</section>
							</div>
						</fieldset>
						<header> <b> Llamado de Atención </b></header>						
						<fieldset>
							<div class="row">
								<section class="col col-4">
									<label class="label"><b>Fecha</b></label>
									<label class="input">
										<input type="date" class="input-sm" size="60" name="fecha" id="fecha" value="<?php echo $fecha ; ?>" required="required"> </label>								
								</section>
							</div>
							<div class="row">							
								<section class="col col-6">
									<label class="label"><b>Motivo</b></label>
									<label class="textarea"> <i class="icon-append fa fa-comment"></i> 										
										<textarea rows="5" name="motivo" id="motivo" required="required"><?php echo $motivo; ?></textarea> 
									</label>
								</section>
								<section class="col col-6">
									<label class="label"><b>Relaciona con</b></label>
									<label class="textarea"> <i class="icon-append fa fa-comment"></i> 										
										<textarea rows="5" name="relacion" id="relacion" required="required"><?php echo $relacion; ?></textarea> 
									</label>
								</section>								
							</div>							
						</fieldset>
						<fieldset>						
							<div class="row">
								<section class="col col-3">
									<label class="label">Cédula</label>
									<label class="input">
										<input type="number" class="input-sm" min="1" size="10" name="cedfun" id="cedfun"> </label>
								</section>
								<section class="col col-1">
									<br>
									<a onclick="
                                                var ced = $('#cedfun').val();
                                                $.ajax({
						        			 		type: 'POST',
        			 								url: 'controller.php',		
        											data: { org:2, cedula: ced, ver:2},
        											success: function(html) {
        												$('#tbfun').html(html);
        											},
        											error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
        										}); return false;" href="javascript: void(0);" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-ok"></i></a>
								</section>
							</div>
							<div class="table-responsive" id="tbfun">
							<b>Funcionario que hace el llamado de atención</b>
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
			                                $funcionarios = paraTodos::arrayConsulta("*", "funcionarios", "expf_expcodigo = $codigo");
                                            foreach($funcionarios as $rowf){
?>
                                            <tr>
                                                <td><?php echo $rowf['expf_funcedula']?></td>
                                                <td><?php echo $rowf['expf_funnombre']?></td>
                                                <td><?php echo $rowf['expf_funapellido']?></td>
                                                <td><?php echo $rowf['expf_funrango']?></td>                                                
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
	/*Si el usuario tiene permisos de lectura se muestra la tabla con los funcionarios registrados*/
}
	//------------------------------------------------------------------------------------------------------------
?>
<script type="text/javascript">	
	$(document).ready(function() {
		$('#funcionarios').DataTable({
			"language": {
				"url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
        	}			
		});
	});	
</script>