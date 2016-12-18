<?php
	/*Se incluyen archicos comunes*/
	$org = $_POST['org'];
	//------------------------------------------------------------------------------------------------------------
	/*Se recogen los datos para manipularlos*/
    $codigo=$_POST['codigo'];
    $descrip=$_POST['descrip'];
    $borrar=$_POST['borrar'];
    $editarrt=$_POST['editar'];
	//------------------------------------------------------------------------------------------------------------
	/*Se verifican los permisos del usuario*/
    if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
		/*GUARDAR -----------Se verifica que $editarrt=="" y las variables no se encuentren vacias para proceder a guardar  */		
        if ($editarrt=="" and $descrip!=""){
			/*Se verifica no se encuentre ya registrado el nivel de lo contrario se realiza el insert*/
			$resultx = paraTodos::arrayConsultanum("niv_descrip", "niveles", "niv_descrip = '$descrip'");
			if ( $resultx > 0){
                echo '<h3 class="error">nivel ya esta registrado</h3>';
			} else {
				$insertar = paraTodos::arrayInserte("niv_descrip","niveles","'$descrip'");
                if ($insertar) {
                    echo '<h3 class="message">nivel creado</h3>';
                }else{
                    echo "<h3 class='error'>No se proceso los datos, del Registro</h3>";
                }				
			}
			//------------------------------------------------------------------------------------------------------------			
		}
		//------------------------------------------------------------------------------------------------------------
		/*UPDATE--------------Se verifica que $editarrt!="" y las variables no se encuentren vacias para proceder a Editar*/				
        if ($codigo<>"0" and $descrip<>"" and $editarrt!=""){
			//------------------------------------------------------------------------------------------------------------
			/*Se modifica los datos de registro del Usuario*/			
			$modifico = paraTodos::arrayUpdate("niv_descrip='$descrip'", "niveles", "niv_codigo='$codigo'");			
            if($modifico){
                echo '<h3 class="message">Registro Modificado</h3>';
            }
			//------------------------------------------------------------------------------------------------------------			
        }
		//------------------------------------------------------------------------------------------------------------		
		/*MOSTRAR---------------------Se verifica si la variable $editarr!="" para proceder a Mostrar los datos guardados del usuario*/		
        if ($editarrt!=""){
			$resultsedes = paraTodos::arrayConsulta("*", "niveles", "niv_codigo = '$editarrt'");
            foreach ($resultsedes as $rowses){
                $codigo=$rowses["niv_codigo"];
                $descrip=$rowses["niv_descrip"];
			}
        }
		//------------------------------------------------------------------------------------------------------------
		/*BORRAR-----------------Se verifica si la variable $borrar!="" para proceder a eliminar el usuario*/
        if ($borrar > 0) {
			$delete = paraTodos::arrayDelete("niv_codigo = '$borrar'","niveles");
            if ($delete) {
                echo '<h3 class="message">nivel eliminado</h3>';
            }
        }		
		//------------------------------------------------------------------------------------------------------------	
?>
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Niveles
		</h1> </div>
	</div>
	<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-sortable" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="position: relative; opacity: 1; left: 0px; top: 0px;">
			<header role="heading">
				<h2>Registro de Niveles </h2> <span class="jarviswidget-loader" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span> </header>
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
                                    codigo      : $('#codigo').val(),
                                    descrip    : $('#descrip').val(),
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
                                    descrip      : $('#descrip').val(),
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
						<fieldset>
							<section>
								<label class="label">Descripción</label>
								<label class="input">
									<input type="text" class="input-xs" name="descrip" id="descrip" value="<?php echo $descrip;?>" required="required"> </label>
									<input type="text" class="input-xs collapse" maxLength="12" size="10" name="codigo" id="codigo" value="<?php echo $codigo;?>"> </label>
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
		$resultc = paraTodos::arrayConsulta("*", "niveles", "niv_codigo<>0")
?>
		<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">
				<header role="heading">
					<h2>Niveles Registrados</h2> <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span> 
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
			//------------------------------------------------------------------------------------------------------------
?>
									<tr style="border-bottom: 1px solid #EEEEEE;">
										<td style="padding: 15px 7px 15px 7px;"> <b> <?php printf("%s",$rowc[niv_descrip]);?></b> </td>
										<td>
<?php
				/*Se verifica tenga todos los permisos*/
        		if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
?>
												<a title="Editar el registro" onclick="
        			 	$.ajax({
        			 		type: 'POST',
        			 		url: 'controller.php',
        					data: { editar: '<?php echo $rowc[niv_codigo]; ?>', org: <?php echo $org; ?>},
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
        						data: { borrar: <?php echo $rowc[niv_codigo]; ?>, org: <?php echo $org; ?>},
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