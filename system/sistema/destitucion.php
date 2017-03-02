<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/css/datatables.css">
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Destitución de Funcionarios
		</h1> 
	</div>
</div>
<?php
	//------------------------------------------------------------------------------------------------------------
	/*Se recogen los datos para manipularlos*/
	$org = $_POST['org'];
    $cedula=$_POST['cedula'];
    $radio=$_POST['$radio'];
    $idperfil = $_POST['idperfil'];
    $borrar = $_POST['borrar'];
    $editarrt = $_POST['editar'];
    $destitucion = $_POST['destitucion'];
    $fechadest = $_POST['fecdecision'];
    $descrip = $_POST['descripcion'];
	//------------------------------------------------------------------------------------------------------------
	if ($permiso_accion['S']==1) {
		$resultc = paraTodos::arrayConsulta("*", "expediente e, expediente_func ef, estado_exp ex", "e.exp_codigo=ef.expf_expcodigo and e.exp_estadoxp=ex.estxp_codigo and exp_estatus=4 ")
?>
		<article class="col-sm-12 col-md-12">
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">
			<header role="heading">
				<h2>Expedientes Registrados en proceso de Destitución</h2> 
			</header>
			<!-- widget div-->
			<div role="content">
				<!-- widget content -->
				<div class="widget-body no-padding">
					<table id="funcionarios" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Nº de Expediente</th>
								<th>Fecha</th>
								<th>Cédula</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Rango</th>
								<th>Estado</th>
								<th>Decisión</th>
								<th>Seleccionar</th>
							</tr>
						</thead>
						<tbody>
							<?php
							/*Se arrojan los datos en la tabla de funcionarios registrados*/
							foreach($resultc as $rowc){
                                $codigom = $rowc['exp_codigo'];
                                if (strlen($codigom)==2){
                                    $codigom="0".$codigom;
                                }
                                if (strlen($codigom)==1){
                                    $codigom="00".$codigom;
                                }
								//------------------------------------------------------------------------------------------------------------
?>
								<tr style="border-bottom: 1px solid #EEEEEE;">
									<td>
										<?php echo $codigom;?>
									</td>
									<td>
										<?php echo $rowc['exp_fecexp'];?>
									</td>
									<td>
										<?php echo $rowc['expf_funcedula'];?>
									</td>
									<td>
										<?php echo $rowc['expf_funnombre'];?>
									</td>
									<td>
										<?php echo $rowc['expf_funapellido'];?>
									</td>
									<td>
										<?php echo $rowc['expf_funrango'];?>
									</td>
									<td>
										<?php echo $rowc['estxp_descrip'];?>
									</td>
									<td>
										<?php echo $rowc['expf_destitucion'];?>
									</td>
									<td>
										<?php
									/*Se verifica tenga todos los permisos*/
       								if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
?>
											<a title="Asignar Decisión" onclick="
					       			 		$.ajax({
					        			 		type: 'POST',
        		 								url: 'controller.php',		
        										data: { 
        											editar: '<?php echo $rowc['expf_codigo']; ?>', 
        											org: <?php echo $org; ?>, 
        											ver: 1,
        											cedula: <?php echo $rowc['expf_funcedula']; ?>
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
	/*Se verifican los permisos del usuario*/
    if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {				
			//------------------------------------------------------------------------------------------------------------
			/*UPDATE--------------Se verifica que $editarrt!="" y las variables no se encuentren vacias para proceder a Editar*/				
        	if ($editarrt!="" and $descrip!=""){
			//------------------------------------------------------------------------------------------------------------
			/*Se modifica los datos de registro del Usuario*/			
			$modifico = paraTodos::arrayUpdate("expf_destitucion='$destitucion',expf_fecdest='$fechadest',expf_descripcion='$descrip'", "expediente_func", "expf_codigo='$editarrt'");			
            if($modifico){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Registro Modificado!</h4>
				</div>';
				$num="";
				$fecexp="";
				$estatus="";
				$hechos="";
				$fecdeli="";
				$espec="";
				$estxp="";
				$observ_otros="";
				$archiv="";
				$cedula="";
				$nombre="";
				$apellido="";
				$destitucion = "";
				$fechadest = "";
				$descrip = "";
            }
			//------------------------------------------------------------------------------------------------------------			
        }
			//------------------------------------------------------------------------------------------------------------		
			/*MOSTRAR---------------------Se verifica si la variable $editarr!="" para proceder a Mostrar los datos guardados del usuario*/		
        	if ($editarrt!=""){
			$resultsedes = paraTodos::arrayConsulta("*", "expediente e, estatus es, estado_exp ex, expediente_func ef", "ef.expf_expcodigo=e.exp_codigo and ex.estxp_codigo=e.exp_estadoxp and es.esta_codigo=exp_estatus and expf_codigo = $editarrt and ef.expf_funcedula=$cedula");
            foreach ($resultsedes as $row){
				$num=$row['exp_codigo'];
				$fecexp=$row['exp_fecexp'];
				$estatus=$row['esta_descrip'];
				$hechos=$row['exp_hechos'];
				$fecdeli=$row['exp_fecdili'];
				$espec=$row['exp_especif'];
				$estxp=$row['estxp_descrip'];
				$observ_otros=$row['exp_observotro'];
				$archiv=$row['exp_archivo'];
				$cedula=$row['expf_funcedula'];
				$nombre=$row['expf_funnombre'];
				$apellido=$row['expf_funapellido'];
				$descrip=$row['expf_descripcion'];
				$fechadest=$row['expf_fecdest'];
				$destitucion=$row['expf_destitucion'];
			}
        }
			//------------------------------------------------------------------------------------------------------------
			/*BORRAR-----------------Se verifica si la variable $borrar!="" para proceder a eliminar el usuario*/
        	if ($borrar<>"") {				
			$delete = paraTodos::arrayDelete("fun_codigo = $borrar","funcionarios");
            if ($delete) {
				echo '
					<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i>Funcionario eliminado!</h4>
					</div>';
            }
        }		
			//------------------------------------------------------------------------------------------------------------	
?>
		<article class="col-sm-12 col-md-12 col-lg-6">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-sortable" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="position: relative; opacity: 1; left: 0px; top: 0px;">
				<header role="heading">
					<h2>Expediente CPEB </h2> <span class="jarviswidget-loader" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span> </header>
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
							<FORM onsubmit="
                               $.ajax({
                                type: 'POST',
                                url: 'controller.php',
                                data: {
									destitucion: $('input:radio[name=radio]:checked').val(),
									descripcion: $('#descrip').val(),
									fecdecision: $('#fecdecision').val(),
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
									expf_destitucion: $('#radio').val(),
									descripcion: $('#descrip').val(),
									fecdecision: $('#fecdecision').val(),
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
                            }); return false" action="javascript: void(0);" method="post" class="smart-form">
										<?php
        }
		//------------------------------------------------------------------------------------------------------------
?>
											<header> Datos Generales del Expediente </header>
											<fieldset>
												<div class="row">
													<section class="col col-2">
														<label class="label"><b>Nº de Expediente</b></label>
														<label class="label">
															<?php echo $num;?>
														</label>
													</section>
													<section class="col col-3">
														<label class="label"><b>Fecha de Expediente</b></label>
														<label class="input">
															<?php echo $fecexp ; ?>
														</label>
													</section>
													<section class="col col-7">
														<label class="label"><b>Estatus</b></label>
														<label class="select">
															<label class="input">
																<?php echo $estatus ; ?>
															</label>
														</label>
													</section>
												</div>
												<section>
													<label class="label"><b>Hechos</b></label>
													<label class="textarea"> <i class="icon-append fa fa-comment"></i>
														<label class="input">
															<?php echo $hechos ; ?>
														</label>
													</label>
												</section>
												<div class="row">
													<section class="col col-3">
														<label class="label"><b>Fecha de la ultima Deligencia</b></label>
														<label class="input">
															<label class="input">
																<?php echo $fecdeli; ?>
															</label>
														</label>
													</section>
													<section class="col col-9">
														<label class="label"><b>Especifique</b></label>
														<label class="input">
															<label class="input">
																<?php echo $espec; ?>
															</label>
														</label>
													</section>
													<section class="col col-3">
														<label class="label"><b>Estado</b></label>
														<label class="select">
															<label class="input">
																<?php echo $estxp; ?>
															</label>
														</label>
													</section>
													<section class="col col-9 collapse" id="secobserv_otros">
														<label class="label"><b>Observación</b></label>
														<label class="input">
															<label class="input">
																<?php echo $observ_otros; ?>
															</label>
														</label>
													</section>
													<section class="col col-9 collapse" id="secarchiv">
														<label class="label"><b>Archivo</b></label>
														<label class="input">
															<label class="input">
																<?php echo $archiv; ?>
															</label>
														</label>
													</section>
												</div>
											</fieldset>
											<header>Destitución</header>
											<fieldset>
												<div class="row">
													<section class="col col-2">
														<label class="label"><b>Cédula</b></label>
														<label class="input">
															<label class="input">
																<?php echo $cedula; ?>
															</label>
														</label>
													</section>
													<section class="col col-5">
														<label class="label"><b>Nombres</b></label>
														<label class="input">
															<label class="input">
																<?php echo $nombre; ?>
															</label>
														</label>
													</section>
													<section class="col col-5">
														<label class="label"><b>Apellidos</b></label>
														<label class="input">
															<label class="input">
																<?php echo $apellido; ?>
															</label>
														</label>
													</section>
												</div>
											</fieldset>
											<fieldset>
												<div class="row">			
													<section class="col col-3">
														<label class="label"><b>Fecha</b></label>
														<label class="input">
															<input type="date" class="input-sm" size="60" name="fecdecision" id="fecdecision" value="<?php echo $fechadest ; ?>" required="required"> </label>								
													</section>
												</div>
												<section>
													<label class="label"><b>Numeral(es) (LEFPol - LEFPúb)</b></label>
													<label class="textarea"> <i class="icon-append fa fa-comment"></i> 										
														<textarea rows="5" name="descrip" id="descrip" required="required" placeholder="3,6,10(LEFPol) y 6 (LEFPúb)"><?php echo $descrip; ?></textarea> 
													</label>
												</section>
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
?>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#funcionarios').DataTable({
						"language": {
							"url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
						}
					});
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
