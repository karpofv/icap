	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/css/datatables.css">
<?php
	/*Se incluyen archicos comunes*/
	$org = $_POST['org'];
	//------------------------------------------------------------------------------------------------------------
	/*Se recogen los datos para manipularlos*/
    $asiscod = $_POST['asis_codigo'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['fun_nombre'];
    $apellido = $_POST['fun_apellido'];
    $fecingreso = $_POST['fun_fecingreso'];
    $fecreingreso = $_POST['fun_fecreingreso'];
    $placa = $_POST['fun_placa'];
    $rango = $_POST['fun_rango'];
    $procedencia = $_POST['fun_procedencia'];
    $adscrito = $_POST['fun_adscrito'];
    $numexp = $_POST['numexp'];
    $expcodigo = $_POST['expcodigo'];
    $fecini = $_POST['fecini'];
    $editarrt = $_POST['editar'];
    $mostrar = $_POST['mostrar'];
    $motivobserv = $_POST['motivobserv'];
    $tiporeentre = $_POST['tiporeentre'];
    $lugarreent = $_POST['lugarreent'];
    $canthoras = $_POST['canthoras'];
    $superv = $_POST['superv'];
    $observofic = $_POST['observofic'];
    $pondera = $_POST['pondera'];
	//------------------------------------------------------------------------------------------------------------
	/*Se verifican los permisos del usuario*/
?>
	<div class="row">
		<div class="col-xs-12">
			<h1 class="page-title txt-color-blueDark"><i class="fa fa-edit fa-fw "></i>Asistencias Registradas (Voluntarias, Obligatorias)</h1> 
		</div>
	</div>
<?php
if ($permiso_accion['S']==1) {
?>
		<article class="col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">
				<header role="heading">
					<h2>Asistencias Aplicadas</h2> 
				<?php
					if ($permiso_accion['P']==1) {					
				?>					
					<a class="a-print" href="<?php echo $ruta_base;?>system/controller.php?ver=1&org=<?php echo $org;?>&act=2" target="_blank" title="Imprimir"><span class="glyphicon glyphicon-print pull-right glyph-lg"></span></a>
				<?php
					}	
					?>					
				</header>
				<!-- widget div-->
				<div role="content">
					<!-- widget content -->
					<div class="widget-body no-padding">
						<table id="funcionarios" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nº Expediente</th>
										<th>Fecha</th>
										<th>Cédula</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Horas</th>
										<th>Supervisor</th>
										<th>Tipo</th>
										<th>Editar</th>
<?php
					if ($permiso_accion['P']==1) {					
?>					
										<th>Imprimir</th>
				<?php
					}	
					?>										
									</tr>
								</thead>
								<tbody>
<?php
		/*Se arrojan los datos en la tabla de funcionarios registrados*/
		$resultc = paraTodos::arrayConsulta("*", "asistencia_o a, funcionarios f", "a.asis_funcedula=f.fun_cedula");
		foreach($resultc as $rowc){
            $codigom = $rowc['asis_expcodigo'];
            if (strlen($codigom)==2){
                $codigom="0".$codigom;
            }
            if (strlen($codigom)==1){
                $codigom="00".$codigom;
            }
			//------------------------------------------------------------------------------------------------------------
?>
									<tr style="border-bottom: 1px solid #EEEEEE;">
										<td><?php echo $codigom;?></td>
										<td><?php echo $rowc['asis_fecha'];?></td>
										<td><?php echo $rowc['fun_cedula'];?></td>
										<td><?php echo $rowc['fun_nombre'];?></td>
										<td><?php echo $rowc['fun_apellido'];?></td>
										<td><?php echo $rowc['asis_horas'];?></td>																			
										<td><?php echo $rowc['asis_supervisor'];?></td>																			
										<td><?php echo $rowc['asis_tipo'];?></td>																			
										<td>
<?php
											/*Se verifica tenga todos los permisos*/
        									if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
												if($rowc['asis_tipo']=='OBLIGATORIA'){
													$org = 64;
													$act=2;
												}
												if($rowc['asis_tipo']=='VOLUNTARIA'){
													$org = 65;
													$act=3;													
												}
?>
												<a title="Editar el registro" onclick="
       			 		$.ajax({
        			 		type: 'POST',
        			 		url: 'controller.php',
        					data: { 
        						editar: '<?php echo $rowc[asis_codigo]; ?>', 
        						ver 		: 1,        						
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
<?php
					if ($permiso_accion['P']==1) {					
?>															
										<td>
										<a class="text-center" href="<?php echo $ruta_base;?>system/controller.php?ver=1&org=16&act=<?php echo $act;?>" target="_blank" title="Imprimir"><span class="glyphicon glyphicon-print pull-right glyph-lg"></span></a>
										</td>
				<?php
					}	
					?>										
									</tr>
<?php
		}
		$resultc = paraTodos::arrayConsulta("*", "asistencia_v a, funcionarios f", "a.asis_funcedula=f.fun_cedula");	
		foreach($resultc as $rowc){
			//------------------------------------------------------------------------------------------------------------
?>
									<tr style="border-bottom: 1px solid #EEEEEE;">
										<td><?php echo $rowc['asis_expcodigo'];?></td>
										<td><?php echo $rowc['asis_fecha'];?></td>
										<td><?php echo $rowc['fun_cedula'];?></td>
										<td><?php echo $rowc['fun_nombre'];?></td>
										<td><?php echo $rowc['fun_apellido'];?></td>
										<td><?php echo $rowc['asis_horas'];?></td>																			
										<td><?php echo $rowc['asis_supervisor'];?></td>																			
										<td><?php echo $rowc['asis_tipo'];?></td>																			
										<td>
<?php
											/*Se verifica tenga todos los permisos*/
        									if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
												if($rowc['asis_tipo']=='OBLIGATORIA'){
													$org = 64;
													$act=2;
												}
												if($rowc['asis_tipo']=='VOLUNTARIA'){
													$org = 65;
													$act=3;													
												}
?>
												<a title="Editar el registro" onclick="
       			 		$.ajax({
        			 		type: 'POST',
        			 		url: 'controller.php',
        					data: { 
        						editar: '<?php echo $rowc[asis_codigo]; ?>',
								ver 		: 1,        						
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
										<td>
										<a class="text-center" href="<?php echo $ruta_base;?>system/controller.php?org=69&act=<?php echo $act;?>" target="_blank" title="Imprimir"><span class="glyphicon glyphicon-print pull-right glyph-lg"></span></a>
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
	/*Si el usuario tiene permisos de lectura se muestra la tabla con los funcionarios registrados*/
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
