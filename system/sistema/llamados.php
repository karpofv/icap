<?php
    $org=$_POST[org];
    $borrar=$_POST[borrar];
    if($borrar!=''){
        paraTodos::arrayDelete("llam_codigo=$borrar", "llamados");
    }
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/css/datatables.css">
	<div class="row">
		<div class="col-xs-12">
			<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i>
				Llamados de atención realizados
		</h1> </div>
	</div>
<?php
if ($permiso_accion['S']==1) {
		$resultc = paraTodos::arrayConsulta("*", "llamados l left join funcionarios f on l.llam_funcedula=f.fun_cedula", "1=1");
?>
		<article class="col-sm-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">
				<header role="heading">
					<h2><b>Llamados de atención registrados</b></h2>
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
						<table id="llamados" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nº</th>
										<th>Fecha</th>
										<th>Cédula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Motivo</th>
										<th>Relación</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
<?php
		/*Se arrojan los datos en la tabla de expedientes registrados*/
		foreach($resultc as $rowc){
            $codigom = $rowc['llam_codigo'];
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
										<td><?php echo $rowc['exp_fecexp'];?></td>
										<td><?php echo $rowc['llam_fecha'];?></td>
										<td><?php echo $rowc['fun_nombre'];?></td>
										<td><?php echo $rowc['fun_apellido'];?></td>
										<td><?php echo $rowc['llam_motivo'];?></td>
										<td><?php echo $rowc['llam_relacion'];?></td>
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
        											data: {
        												borrar: <?php echo $rowc[llam_codigo]; ?>,
        												ver: 1,
        												org: <?php echo $org; ?>
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
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#llamados').DataTable({
			"language": {
				"url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
        	}
		});
    });
</script>
