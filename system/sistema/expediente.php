	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/css/datatables.css">	
	<div class="row">
		<div class="col-xs-12">
			<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Apertura de Expediente Administrativo CPEB
		</h1> </div>
	</div>
<?php
	/*Se incluyen archicos comunes*/
	$org = $_POST['org'];
	//------------------------------------------------------------------------------------------------------------
	/*Se recogen los datos para manipularlos*/
    $num=$_POST['exp_codigo'];
    $fecexp = $_POST['exp_fecexp'];
    $estatus = $_POST['exp_estatus'];
    $hechos = $_POST['exp_hechos'];
    $fecdili = $_POST['exp_fecdili'];
    $espec = $_POST['exp_especif'];
    $estadoxp = $_POST['exp_estadoxp'];
    $observ_otros = $_POST['exp_observotro'];
    $archiv = $_POST['exp_archivo'];
    $borrar = $_POST['borrar'];
    $eliminar = $_POST['eliminar'];
    $mostrar = $_POST['mostrar'];
	//------------------------------------------------------------------------------------------------------------
	/*Se verifican los permisos del usuario*/

		if ($permiso_accion['S']==1) {
		$resultc = paraTodos::arrayConsulta("*", "expediente e, estado_exp ex, expediente_func ef", "e.exp_estadoxp=ex.estxp_codigo and e.exp_codigo=ef.expf_codigo");
?>
		<article class="col-sm-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">
				<header role="heading">
					<h2><b>Expedientes Registrados</b></h2> 
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
						<table id="expedientes" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nº</th>
										<th>Fecha</th>
										<th>Cédula</th>
										<th>Func. Implicado</th>
										<th>Estado</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
<?php
		/*Se arrojan los datos en la tabla de expedientes registrados*/
		foreach($resultc as $rowc){
			//------------------------------------------------------------------------------------------------------------
?>
									<tr style="border-bottom: 1px solid #EEEEEE;">
										<td><?php echo $rowc['exp_codigo'];?></td>
										<td><?php echo $rowc['exp_fecexp'];?></td>
										<td><?php echo $rowc['expf_funcedula'];?></td>
										<td><?php echo $rowc['expf_funapellido']." ".$rowc['expf_funnombre'];?></td>
										<td><?php echo $rowc['estxp_descrip'];?></td>
										<td>
<?php
										/*Se verifica tenga todos los permisos*/
        								if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
?>											<a title="Editar el registro" onclick="
						       			 		$.ajax({
						        			 		type: 'POST',
        			 								url: 'controller.php',		
        											data: { 
        												mostrar: '<?php echo $rowc['exp_codigo']; ?>', 
        												org: <?php echo $org; ?>, 
        												ver: 1,
        												exp_num: '<?php echo $rowc['exp_codigo']; ?>'
        											},
        											success: function(html) {
        												$('#content').html(html);
        												$('#aggfun').removeClass('collapse');
        											},
        											error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
        										}); return false;" href="javascript: void(0);"> 
        										<i class="fa fa-pencil-square-o" style="font-size: 1.600em;margin-left: 10px;"></i>
        									</a>
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
        											data: {
        												borrar: <?php echo $rowc[exp_codigo]; ?>, 
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
    if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
		/*GUARDAR -----------Se verifica que $editarrt=="" y las variables no se encuentren vacias para proceder a guardar  */
        if ($mostrar == "" and $fecexp!="" and $_POST['cedula']== ''){
			/*Se verifica no se encuentre ya registrado el Expediente de lo contrario se realiza el insert*/
			$resultx = paraTodos::arrayConsultanum("exp_codigo", "expedientes", "exp_codigo = '$num'");
			if ($resultx > 0){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Expediente ya esta registrado!</h4>
				</div>';
			} else {
				$insertar = paraTodos::arrayInserte("exp_num, exp_fecexp, exp_estatus, exp_hechos, exp_fecdili, exp_especif, exp_estadoxp, exp_observotro, exp_archivo","expediente","'0','$fecexp','$estatus','$hechos','$fecdili','$espec','$estadoxp','$observ_otros','$archiv'");
                if ($insertar) {
                    echo '<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Expediente Aperurado!</h4>
					</div>';
    				$num= "";
    				$fecexp =  "";
    				$estatus =  "";
    				$hechos =  "";
    				$fecdili =  "";
    				$espec =  "";
    				$estadoxp =  "";
    				$observ_otros =  "";
    				$archiv =  "";
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
        if ($mostrar!="" and $fecexp!="" and $_POST['cedula']== ''){
			//------------------------------------------------------------------------------------------------------------
			/*Se modifica los datos de registro del Expediente*/			
			$modifico = paraTodos::arrayUpdate("exp_num='0',exp_fecexp='$fecexp',exp_estatus='$estatus',exp_hechos='$hechos',exp_fecdili='$fecdili',exp_especif='$espec',exp_estadoxp='$estadoxp',exp_observotro='$observ_otros',exp_archivo='$archiv'", "expediente", "exp_codigo='$mostrar'");			
            if($modifico){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Registro Modificado!</h4>
				</div>';
    			$num= "";
    			$fecexp =  "";
    			$estatus =  "";
    			$hechos =  "";
    			$fecdili =  "";
    			$espec =  "";
    			$estadoxp =  "";
    			$observ_otros =  "";
    			$archiv =  "";
            }
			//------------------------------------------------------------------------------------------------------------			
        }
		//------------------------------------------------------------------------------------------------------------		
		/*MOSTRAR---------------------Se verifica si la variable $editarr!="" para proceder a Mostrar los datos guardados del Expediente*/
        if ($mostrar!="" and $_POST['cedula'] == '' and $fecexp=='') {
			$resultsedes = paraTodos::arrayConsulta("*", "expediente", "exp_codigo = '$mostrar'");
            foreach ($resultsedes as $row){
				$codigo = $row['exp_codigo'];
				$fecexp = $row['exp_fecexp'];
				$estatus = $row['exp_estatus'];
				$hechos = $row['exp_hechos'];
				$fecdili = $row['exp_fecdili'];
				$espec = $row['exp_especif'];
				$estadoxp = $row['exp_estadoxp'];
				$observ_otros = $row['exp_observotro'];
				$archiv = $row['exp_archivo'];
			}
        }
        /*ACTUALIZAR TABLA DE FUNCIONARIOS IMPLICADOS---------------------*/
        if ($mostrar!="" and $_POST['cedula']!= '' and $eliminar==''){
			$resultsedes = paraTodos::arrayConsulta("*", "expediente", "exp_codigo = '$mostrar'");
            foreach ($resultsedes as $row){
				$codigo = $row['exp_codigo'];
				$fecexp = $row['exp_fecexp'];
				$estatus = $row['exp_estatus'];
				$hechos = $row['exp_hechos'];
				$fecdili = $row['exp_fecdili'];
				$espec = $row['exp_especif'];
				$estadoxp = $row['exp_estadoxp'];
				$observ_otros = $row['exp_observotro'];
				$archiv = $row['exp_archivo'];
			}     
            /*SE VALIDA LA CEDULA PERTENEZCA A UN FUNCIONARIO REGISTRADO*/
            $validarfun = paraTodos::arrayConsultanum("*", "funcionarios", "fun_cedula = '$_POST[cedula]'");
            if ($validarfun>0){
                /*SE VALIDA EL FUNCIONARIO NO SE ENCUENTRE YA ASIGNADO AL EXPEDIENTE*/
                $validarfunrep = paraTodos::arrayConsultanum("*", "expediente_func", "expf_expcodigo = $mostrar and expf_funcedula=$_POST[cedula]");
                if ($validarfunrep == 0){
                    $funcionario = paraTodos::arrayConsulta("*", "funcionarios f, rangos r", " f.fun_rango=r.rang_codigo and fun_cedula =$_POST[cedula]");
                    foreach ($funcionario as $rowf){
				        $insertar = paraTodos::arrayInserte("expf_expcodigo, expf_funcedula, expf_funnombre, expf_funapellido, expf_funrango","expediente_func","$mostrar,$_POST[cedula],'$rowf[fun_nombre]','$rowf[fun_apellido]','$rowf[rang_descrip]'");
                    }
                    $resultsedes = paraTodos::arrayConsulta("*", "expediente_fun", "expf_expcodigo = '$mostrar'");
                    foreach ($resultsedes as $row){
    ?>
                    <tr>
                        <td><?php echo $row['expf_funcedula']?></td>
                        <td><?php echo $row['expf_funnombre']?></td>
                        <td><?php echo $row['expf_funapellido']?></td>
                        <td><?php echo $row['expf_funrango']?></td>
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
        												mostrar: $mostrar, 
        												org: <?php echo $org; ?>,
        												cedula: <?php echo $row['expf_funcedula']?>, 
        												ver: 1,
        												eliminar: 1
        											},
        											success: function(html) { $('#content').html(html); }
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
                } else {
                    echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Funcionario ya se encuentra asignado a este expediente!</h4>
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
        if ($mostrar!="" and $_POST['cedula']!= '' and $eliminar!=''){
			$resultsedes = paraTodos::arrayConsulta("*", "expediente", "exp_codigo = '$mostrar'");
            foreach ($resultsedes as $row){
				$codigo = $row['exp_codigo'];
				$fecexp = $row['exp_fecexp'];
				$estatus = $row['exp_estatus'];
				$hechos = $row['exp_hechos'];
				$fecdili = $row['exp_fecdili'];
				$espec = $row['exp_especif'];
				$estadoxp = $row['exp_estadoxp'];
				$observ_otros = $row['exp_observotro'];
				$archiv = $row['exp_archivo'];
			}     
            $insertar = paraTodos::arrayDelete("expf_funcedula=$_POST[cedula]","expediente_func");
            $resultsedes = paraTodos::arrayConsulta("*", "expediente_fun", "expf_expcodigo = '$mostrar'");
            foreach ($resultsedes as $row){
?>
                <tr>
                    <td><?php echo $row['expf_funcedula']?></td>
                    <td><?php echo $row['expf_funnombre']?></td>
                    <td><?php echo $row['expf_funapellido']?></td>
                    <td><?php echo $row['expf_funrango']?></td>
                    <td>
<?php
                    if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1){
?>
                        <a title="Eliminar el registro" onclick=" var msg = confirm('Esta seguro que desea eliminar el registro?');
        									if (msg) {
        										$.ajax({
        											type: 'POST',
        											url: 'controller.php',
        											data: { 
        												mostrar: $mostrar, 
        												org: <?php echo $org; ?>, 
        												cedula: <?php echo $row['expf_funcedula']?>, 
        												ver: 1,
        												eliminar: 1
        											},
        											success: function(html) { $('#content').html(html); }
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
            if($insertar){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Registro Eliminado!</h4>
				</div>';
            }            
        }
		//------------------------------------------------------------------------------------------------------------
		/*BORRAR-----------------Se verifica si la variable $borrar!="" para proceder a eliminar el expediente*/
        if ($borrar<>"") {
			$delete = paraTodos::arrayDelete("exp_codigo = $borrar","expediente");
            if ($delete) {
				echo '
					<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i>Expediente Eliminado!</h4>
					</div>';
            }
        }		
		//------------------------------------------------------------------------------------------------------------	
?>
	<article class="col-sm-12">
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-sortable" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="position: relative; opacity: 1; left: 0px; top: 0px;">
			<header role="heading">
				<h2><b>Expediente CPEB</b></h2> <span class="jarviswidget-loader" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span> </header>
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
        if ($mostrar!='') {
?>
						<FORM onsubmit="$.ajax({
                                type: 'POST',
                                url: 'controller.php',
                                data: {
									exp_num: 0,
									exp_fecexp: $('#fecexp').val(),
									exp_estatus: $('#estatus').val(),
									exp_hechos: $('#hechos').val(),
									exp_fecdili: $('#fecdili').val(),
									exp_especif: $('#espec').val(),
									exp_estadoxp: $('#estadoxp').val(),
									exp_observotro: $('#observ_otros').val(),
									exp_archivo: $('#archiv').val(),
                                    ver 		: 1,                                   
                                    org   		: <?php echo $org; ?>,
                                    mostrar     	: <?php echo $mostrar; ?>
                                },
                                success: function(html) {
                                	$('#content').html(html);
        							$('#aggfun').addClass('collapse');
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
									exp_fecexp: $('#fecexp').val(),
									exp_estatus: $('#estatus').val(),
									exp_hechos: $('#hechos').val(),
									exp_fecdili: $('#fecdili').val(),
									exp_especif: $('#espec').val(),
									exp_estadoxp: $('#estadoxp').val(),
									exp_observotro: $('#observ_otros').val(),
									exp_archivo: $('#archiv').val(),
									ver 		: 1,                                   
                                    org   		: <?php echo $org; ?>
                                },
                                success: function(html) {
                                	$('#content').html(html);
        							$('#aggfun').addClass('collapse');
                                },
                                error: function(xhr,msg,excep) {
                                	alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
                                }
                            }); return false" action="javascript: void(0);" method="post"  class="smart-form">
									<?php
        }
		//------------------------------------------------------------------------------------------------------------
?>						
						<header> Datos Generales del Expediente </header>						
						<fieldset>
							<div class="row">
								<section class="col col-2">
									<label class="label">Fecha de Expediente</label>
									<label class="input">
										<input type="date" class="input-sm" size="60" name="fecexp" id="fecexp" value="<?php echo $fecexp ; ?>" required="required"> </label>								
								</section>
								<section class="col col-3">
									<label class="label">Estatus</label>
									<label class="select">
										<select id="estatus" name="estatus">
											<option>Seleccione el Estatus</option>
											<?php  
												Combos::CombosSelect('1', $estatus, 'DISTINCT esta_codigo,esta_descrip', 'estatus', 'esta_codigo', 'esta_descrip', "esta_codigo<>'' ORDER BY esta_descrip");
											?>
										</select> <i></i> 
									</label>
								</section>
							</div>
							<section>
									<label class="label">Hechos</label>
									<label class="textarea"> <i class="icon-append fa fa-comment"></i> 										
										<textarea rows="5" name="hechos" id="hechos" required="required"><?php echo $hechos; ?></textarea> 
									</label>
							</section>
							<div class="row">
								<section class="col col-2">
									<label class="label">Fecha de la ultima Diligencia</label>
									<label class="input">
										<input type="date" class="input-sm" size="60" name="fecdili" id="fecdili" value="<?php echo $fecdili ; ?>"> </label>								
								</section>
								<section  class="col col-10">
									<label class="label">Especifique</label>
									<label class="input">
										<input type="text"class="input-sm" maxLength="100" size="60" name="espec" id="espec" value="<?php echo $espec ; ?>"> </label>								
								</section>
                            </div>
                            <div class="row">
								<section class="col col-2">
									<label class="label">Estado</label>
									<label class="select">
										<select id="estadoxp" name="estadoxp">
											<option>Seleccione el Estado</option>
											<?php  
												Combos::CombosSelect('1', $estadoxp, 'DISTINCT estxp_codigo,estxp_descrip', 'estado_exp', 'estxp_codigo', 'estxp_descrip', "estxp_codigo<>'' ORDER BY estxp_descrip");
											?>
										</select> <i></i> 
									</label>
								</section>	
								<section  class="col col-10 collapse" id="secobserv_otros">
									<label class="label">Observación</label>
									<label class="input">
										<input type="text"class="input-sm" maxLength="100" size="60" name="observ_otros" id="observ_otros" value="<?php echo $observ_otros ; ?>"> </label>								
								</section>
								<section  class="col col-10 collapse" id="secarchiv">
									<label class="label">Archivo</label>
									<label class="input">
										<input type="text"class="input-sm archivo" maxLength="100" size="60" name="archiv" id="archiv" value="<?php echo $archiv ; ?>">
										<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Porfavor ingrese el Año y el Renglon</b>
									</label>
								</section>																							
							</div>
						</fieldset>						
                        <fieldset>						
							<div class="row collapse" id="aggfun">
								<section class="col col-3">
									<label class="label">Cédula</label>
									<label class="input">
										<input type="number" class="input-sm" min="1" size="10" name="cedula" id="cedula"> </label>
								</section>
								<section class="col col-1">
									<br>
									<a onclick="
                                                var ced = $('#cedula').val();                                                
                                                $.ajax({
						        			 		type: 'POST',
        			 								url: 'controller.php',		
        											data: { 
        												mostrar: '<?php echo $codigo; ?>', 
        												org: <?php echo $org; ?>, 
        												ver: 1,
        												cedula: ced
        											},
        											success: function(html) {
        												$('#content').html(html);
        												$('#aggfun').removeClass('collapse');        												
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
									<tbody id="tbfuncionario">
<?php
			                                $funcionarios = paraTodos::arrayConsulta("*", "expediente_func", "expf_expcodigo = $codigo");
                                            foreach($funcionarios as $rowf){
?>
                                            <tr>
                                                <td><?php echo $rowf['expf_funcedula']?></td>
                                                <td><?php echo $rowf['expf_funnombre']?></td>
                                                <td><?php echo $rowf['expf_funapellido']?></td>
                                                <td><?php echo $rowf['expf_funrango']?></td>
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
        												mostrar: <?php echo $rowf[expf_expcodigo]; ?>, 
        												org: <?php echo $org; ?>,
        												cedula: <?php echo $rowf['expf_funcedula']?>, 
        												ver:1,
        												eliminar: 1
        											},
        											success: function(html) { 
        												$('#content').html(html);
        												$('#aggfun').removeClass('collapse');
        											}
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

?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#expedientes').DataTable({
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
	});
	$("#estadoxp").change( function() {
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