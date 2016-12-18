<?php
	/*Se incluyen archicos comunes*/
	$org = $_POST['org'];
	//------------------------------------------------------------------------------------------------------------
	/*Se recogen los datos para manipularlos*/
    $nacionalidad=$_POST['fun_nacionalidad'];
    $cedula = $_POST['fun_cedula'];
    $fecnac = $_POST['fun_fecnac'];
    $nombre = $_POST['fun_nombre'];
    $apellido = $_POST['fun_apellido'];
    $genero = $_POST['fun_genero'];
    $fecingreso = $_POST['fun_fecingreso'];
    $fecegreso = $_POST['fun_fecegreso'];
    $motivegreso = $_POST['fun_motivegreso'];
    $fecreingreso = $_POST['fun_fecreingreso'];
    $anosserv = $_POST['fun_anosserv'];
    $estcivil = $_POST['fun_estcivil'];
    $telefonom = $_POST['fun_telefonom'];
    $telefonoc = $_POST['fun_telefonoc'];
    $direccion = $_POST['fun_direccion'];
    $nommadre = $_POST['fun_nom_madre'];
    $cargafam = $_POST['fun_cargafam'];
    $nompadre = $_POST['fun_nom_padre'];
    $placa = $_POST['fun_placa'];
    $rango = $_POST['fun_rango'];
    $procedencia = $_POST['fun_procedencia'];
    $adscrito = $_POST['fun_adscrito'];
    $nivelacad = $_POST['fun_nivelacad'];
    $nivel = $_POST['fun_nivel'];
    $profesion = $_POST['fun_profesion'];
    $cursos = $_POST['fun_cursos'];
    $talleres = $_POST['fun_talleres'];
    $reportes = $_POST['fun_reportesserv'];
    $retirado = $_POST['fun_retirado'];
    $idperfil = $_POST['idperfil'];
    $borrar = $_POST['borrar'];
    $editarrt = $_POST['editar'];
	//------------------------------------------------------------------------------------------------------------
	/*Se verifican los permisos del usuario*/
    if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
		/*GUARDAR -----------Se verifica que $editarrt=="" y las variables no se encuentren vacias para proceder a guardar  */		
        if ($editarrt=="" and $cedula<>""){
			/*Se verifica no se encuentre ya registrado el Usuario de lo contrario se realiza el insert*/
			$resultx = paraTodos::arrayConsultanum("fun_codigo", "funcionarios", "func_cedula = '$cedula'");
			if ($resultx > 0){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Funcionario ya esta registrado!</h4>
				</div>';
			} else {
				$insertar = paraTodos::arrayInserte("fun_nacionalidad, fun_cedula, fun_fecnac, fun_nombre, fun_apellido, fun_genero, fun_fecingreso, fun_fecegreso, fun_motivegreso, fun_fecreingreso, fun_anosserv, fun_estcivil, fun_telefonom, fun_telefonoc, fun_direccion, fun_nom_madre, fun_cargafam, fun_nom_padre, fun_placa, fun_rango, fun_nivel, fun_procedencia, fun_adscrito, fun_nivelacad, fun_profesion, fun_cursos, fun_talleres, fun_reportesserv, fun_retirado","funcionarios","'$nacionalidad','$cedula','$fecnac','$nombre','$apellido','$genero','$fecingreso','$fecegreso','$motivegreso','$fecreingreso','$anosserv','$estcivil','$telefonom','$telefonoc','$direccion','$nommadre','$cargafam','$nompadre','$placa','$rango','$nivel','$procedencia','$adscrito','$nivelacad','$profesion','$cursos','$talleres','$reportes','$retirado'");
                if ($insertar) {
                    echo '<div class="alert alert-block alert-success">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Funcionario Creado!</h4>
					</div>';
				$editarrt="";
				$nacionalidad='';
				$cedula = '';
				$fecnac = '';
				$nombre = '';
				$apellido = '';
				$genero = '';
				$fecingreso = '';
				$fecegreso = '';
				$motivegreso = '';
				$fecreingreso = '';
				$anosserv = '';
				$estcivil = '';
				$telefonom = '';
				$telefonoc = '';
				$direccion = '';
				$nommadre = '';
				$cargafam = '';
				$nompadre = '';
				$placa = '';
				$rango = '';
				$procedencia = '';
				$adscrito = '';
				$nivelacad = '';
				$nivel = '';
				$profesion = '';
				$cursos = '';
				$talleres = '';
				$reportes = '';
				$retirado = '';
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
        if ($editarrt!=""){
			//------------------------------------------------------------------------------------------------------------
			/*Se modifica los datos de registro del Usuario*/			
			$modifico = paraTodos::arrayUpdate("fun_nacionalidad='$nacionalidad',fun_cedula='$cedula',fun_fecnac='$fecnac',fun_nombre='$nombre',fun_apellido='$apellido',fun_genero='$genero',fun_fecingreso='$fecingreso',fun_fecegreso='$fecegreso',fun_motivegreso='$motivegreso',fun_fecreingreso='$fecreingreso',fun_anosserv='$anosserv',fun_estcivil='$estcivil',fun_telefonom='$telefonom',fun_telefonoc='$telefonoc',fun_direccion='$direccion',fun_nom_madre='$nommadre',fun_cargafam='$cargafam',fun_nom_padre='$nompadre',fun_placa='$placa',fun_rango='$rango',fun_nivel='$nivel',fun_procedencia='$procedencia',fun_adscrito='$adscrito',fun_nivelacad='$nivelacad',fun_profesion='$profesion',fun_cursos='$cursos',fun_talleres='$talleres',fun_reportesserv='$reportes',fun_retirado='$retirado'", "funcionarios", "fun_codigo='$editarrt'");			
            if($modifico){
				echo '
				<div class="alert alert-block alert-success">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Registro Modificado!</h4>
				</div>';
				$editarrt="";
				$nacionalidad='';
				$cedula = '';
				$fecnac = '';
				$nombre = '';
				$apellido = '';
				$genero = '';
				$fecingreso = '';
				$fecegreso = '';
				$motivegreso = '';
				$fecreingreso = '';
				$anosserv = '';
				$estcivil = '';
				$telefonom = '';
				$telefonoc = '';
				$direccion = '';
				$nommadre = '';
				$cargafam = '';
				$nompadre = '';
				$placa = '';
				$rango = '';
				$procedencia = '';
				$adscrito = '';
				$nivelacad = '';
				$nivel = '';
				$profesion = '';
				$cursos = '';
				$talleres = '';
				$reportes = '';
				$retirado = '';
            }
			//------------------------------------------------------------------------------------------------------------			
        }
		//------------------------------------------------------------------------------------------------------------		
		/*MOSTRAR---------------------Se verifica si la variable $editarr!="" para proceder a Mostrar los datos guardados del usuario*/		
        if ($editarrt!=""){
			$resultsedes = paraTodos::arrayConsulta("*", "funcionarios", "fun_codigo = '$editarrt'");
            foreach ($resultsedes as $row){
				$nacionalidad=$row['fun_nacionalidad'];
				$cedula = $row['fun_cedula'];
				$fecnac = $row['fun_fecnac'];
				$nombre = $row['fun_nombre'];
				$apellido = $row['fun_apellido'];
				$genero = $row['fun_genero'];
				$fecingreso = $row['fun_fecingreso'];
				$fecegreso = $row['fun_fecegreso'];
				$motivegreso = $row['fun_motivegreso'];
				$fecreingreso = $row['fun_fecreingreso'];
				$anosserv = $row['fun_anosserv'];
				$estcivil = $row['fun_estcivil'];
				$telefonom = $row['fun_telefonom'];
				$telefonoc = $row['fun_telefonoc'];
				$direccion = $row['fun_direccion'];
				$nommadre = $row['fun_nom_madre'];
				$cargafam = $row['fun_cargafam'];
				$nompadre = $row['fun_nom_padre'];
				$placa = $row['fun_placa'];
				$rango = $row['fun_rango'];
				$procedencia = $row['fun_procedencia'];
				$adscrito = $row['fun_adscrito'];
				$nivelacad = $row['fun_nivelacad'];
				$nivel = $row['fun_nivel'];
				$profesion = $row['fun_profesion'];
				$cursos = $row['fun_cursos'];
				$talleres = $row['fun_talleres'];
				$reportes = $row['fun_reportesserv'];
				$retirado = $row['fun_retirado'];
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
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/css/datatables.css">	
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
			<i class="fa fa-edit fa-fw "></i> 
				Registro Individual de Funcionarios activos en el CPEB
		</h1> </div>
	</div>
	<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-sortable" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="position: relative; opacity: 1; left: 0px; top: 0px;">
			<header role="heading">
				<h2>Funcionarios </h2> <span class="jarviswidget-loader" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span> </header>
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
									fun_nacionalidad: $('#nacional').val(),
									fun_cedula: $('#cedula').val(),
									fun_fecnac: $('#fecnac').val(),
									fun_nombre: $('#nombre').val(),
									fun_apellido: $('#apellido').val(),
									fun_genero: $('#genero').val(),
									fun_fecingreso: $('#fecing').val(),
									fun_fecegreso: $('#feceg').val(),
									fun_motivegreso: $('#motivo').val(),
									fun_fecreingreso: $('#fecreing').val(),
									fun_anosserv: $('#anualserv').val(),
									fun_estcivil: $('#estcivil').val(),
									fun_telefonom: $('#telefm').val(),
									fun_telefonoc: $('#telefh').val(),
									fun_direccion: $('#direc').val(),
									fun_nom_madre: $('#nombrem').val(),
									fun_cargafam: $('#cargaf').val(),
									fun_nom_padre: $('#nombrep').val(),
									fun_placa: $('#placa').val(),
									fun_rango: $('#rango').val(),
									fun_procedencia: $('#proc').val(),
									fun_adscrito: $('#adsc').val(),
									fun_nivelacad: $('#nivelacad').val(),
									fun_nivel: $('#nivel').val(),
									fun_profesion: $('#profes').val(),
									fun_cursos: $('#cursos').val(),
									fun_talleres: $('#taller').val(),
									fun_reportesserv: $('#reports').val(),
									fun_retirado: $('#retirado').val(),
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
									fun_nacionalidad: $('#nacional').val(),
									fun_cedula: $('#cedula').val(),
									fun_fecnac: $('#fecnac').val(),
									fun_nombre: $('#nombre').val(),
									fun_apellido: $('#apellido').val(),
									fun_genero: $('#genero').val(),
									fun_fecingreso: $('#fecing').val(),
									fun_fecegreso: $('#feceg').val(),
									fun_motivegreso: $('#motivo').val(),
									fun_fecreingreso: $('#fecreing').val(),
									fun_anosserv: $('#anualserv').val(),
									fun_estcivil: $('#estcivil').val(),
									fun_telefonom: $('#telefm').val(),
									fun_telefonoc: $('#telefh').val(),
									fun_direccion: $('#direc').val(),
									fun_nom_madre: $('#nombrem').val(),
									fun_cargafam: $('#cargaf').val(),
									fun_nom_padre: $('#nombrep').val(),
									fun_placa: $('#placa').val(),
									fun_rango: $('#rango').val(),
									fun_procedencia: $('#proc').val(),
									fun_adscrito: $('#adsc').val(),
									fun_nivelacad: $('#nivelacad').val(),
									fun_nivel: $('#nivel').val(),
									fun_profesion: $('#profes').val(),
									fun_cursos: $('#cursos').val(),
									fun_talleres: $('#taller').val(),
									fun_reportesserv: $('#reports').val(),
									fun_retirado: $('#retirado').val(),
                                    idperfil    : $('#idperfil').val(),
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
							<div class="row">
								<section class="col col-2">
									<label class="label">Nacionalidad</label>
									<label class="select">
										<select id="nacional" name="nacional">
       										<option>Seleccione</option>
        									<?php  
												$nacionalidad = Combos::CombosSelect('1', $nacionalidad, 'DISTINCT fun_nacionalidad', 'funcionarios', 'fun_nacionalidad', 'fun_nacionalidad', "fun_cedula<>'' ORDER BY fun_retirado");
												$nacionalidad;
												if ($nacionalidad==''){
											?>
												<option>V</option>
												<option>E</option>
											<?php
												}
											?>
										</select> <i></i> 
									</label>
								</section>
								<section class="col col-4">
									<label class="label">Placa</label>
									<label class="input">
										<input type="number" class="input-sm" min="1" size="10" name="placa" id="placa" value="<?php echo $placa;?>" required="required"> 
									</label>
								</section>
								<section class="col col-6">
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
								<section class="col col-2">
									<label class="label">Cédula</label>
									<label class="input">
										<input type="number" class="input-sm" min="1" size="10" name="cedula" id="cedula" value="<?php echo $cedula;?>" required="required"> </label>
								</section>
								<section class="col col-5">
									<label class="label">Nombres</label>
									<label class="input">
										<input type="text" class="input-sm" maxLength="100" size="60" name="nombre" id="nombre" value="<?php echo $apellido ; ?>" required="required"> 
									</label>
								</section>
								<section  class="col col-5">
									<label class="label">Apellidos</label>
									<label class="input">
										<input type="text"class="input-sm" maxLength="100" size="60" name="apellido" id="apellido" value="<?php echo $nombre ; ?>" required="required"> </label>								
								</section>
							</div>	
							<div class="row">
								<section class="col col-3">
									<label class="label">Estado Civil</label>
									<label class="input">
										<input type="text" class="input-sm" maxLength="100" size="60" name="estcivil" id="estcivil" value="<?php echo $estcivil ; ?>" required="required">
									</label>								
								</section>
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
										<label class="label">Teléfono de Habitación</label>									
										<label class="input"> <i class="icon-prepend fa fa-phone"></i>
											<input type="tel" name="telefh" id="telefh" data-mask="(999) 999-9999" value="<?php echo $telefonoc ; ?>">
										</label>
								</section>
								<section class="col col-6">
										<label class="label">Teléfono Movil</label>									
										<label class="input"> <i class="icon-prepend fa fa-phone"></i>
											<input type="tel" name="telefm" id="telefm" data-mask="(999) 999-9999"  value="<?php echo $telefonom; ?>">
										</label>
								</section>
							</div>
							<section>
									<label class="label">Dirección</label>
									<label class="textarea"> <i class="icon-append fa fa-comment"></i> 										
										<textarea rows="5" name="direc" id="direc" required="required"><?php echo $direccion; ?></textarea> 
									</label>
							</section>
						</fieldset>
						<header> Datos Familiares </header>						
						<fieldset>
							<section class="col col-6">
								<label class="label">Nombre de la Madre</label>
								<label class="input">
									<input type="text" class="input-sm" maxLength="100" size="60" name="nombrem" id="nombrem" value="<?php echo $nommadre ; ?>"> 
								</label>
							</section>
							<section class="col col-6">
								<label class="label">Nombre del Padre</label>
								<label class="input">
									<input type="text" class="input-sm" maxLength="100" size="60" name="nombrep" id="nombrep" value="<?php echo $nompadre ; ?>"> 
								</label>
							</section>
							<section class="col col-2">
								<label class="label">Carga Familiar</label>
								<label class="input">
									<input type="number" class="input-sm" min="1" size="10" name="cargaf" id="cargaf" value="<?php echo $cargafam ;?>" required="required">
								</label>
							</section>							
						</fieldset>
						<header> Datos Académicos </header>						
						<fieldset>
							<div class="row">
								<section class="col col-6">
									<label class="label">Nivel Académico</label>
									<label class="input">
										<input type="text" class="input-sm" maxLength="100" size="60" name="nivelacad" id="nivelacad" value="<?php echo $nivelacad ; ?>" required="required"> 
									</label>
								</section>
								<section class="col col-6">
									<label class="label">Profesión</label>
									<label class="input">
										<input type="text" class="input-sm" maxLength="100" size="60" name="profes" id="profes" value="<?php echo $profesion ; ?>" required="required"> 
									</label>
								</section>
							</div>
								<section>
										<label class="label">Cursos Realizados</label>
										<label class="textarea"> <i class="icon-append fa fa-comment"></i> 										
											<textarea rows="5" name="cursos" id="cursos"><?php echo $cursos  ; ?></textarea> 
										</label>
								</section>
								<section>
										<label class="label">Talleres Realizados</label>
										<label class="textarea"> <i class="icon-append fa fa-comment"></i> 										
											<textarea rows="5" name="taller" id="taller"><?php echo $talleres   ; ?></textarea> 
										</label>
								</section>
						</fieldset>
						<header> Datos Laborales </header>						
						<fieldset>
							<div class="row">
								<section class="col col-3">
									<label class="label">Fecha de Ingreso</label>
									<label class="input">
										<input type="date" class="input-sm" size="60" name="fecing" id="fecing" value="<?php echo $fecingreso ; ?>" required="required"> 
									</label>
								</section>
								<section class="col col-2">
									<label class="label">Años de Servicio</label>
									<label class="input">
										<input type="number" class="input-sm" min="1" size="10" name="anualserv" id="anualserv" value="<?php echo $anosserv ;?>" required="required">
									</label>
								</section>
								<section class="col col-4">
									<label class="label">Retirado</label>
									<label class="select">
										<select id="retirado" name="retirado">
											<option value="0">Seleccione Opcion</option>
        									<?php  
												$retirado = Combos::CombosSelect('1', $retirado, 'DISTINCT fun_retirado', 'funcionarios', 'fun_retirado', 'fun_retirado', "fun_cedula<>'' ORDER BY fun_retirado");
												$retirado;
												if ($retirado==''){
											?>
												<option>Si</option>
												<option>No</option>
											<?php
												}
											?>
										</select> <i></i> 
									</label>
								</section>							
							</div>
							<div class="row">
								<section class="col col-3">
									<label class="label">Fecha de Egreso</label>
									<label class="input">
										<input type="date" class="input-sm" size="60" name="feceg" id="feceg" value="<?php echo $fecegreso ; ?>"> 
									</label>
								</section>
								<section class="col col-6">
									<label class="label">Motivo del Egreso</label>
									<label class="input">
										<input type="text" class="input-sm" maxLength="100" size="60" name="motivo" id="motivo" value="<?php echo $motivegreso ; ?>"> 
									</label>
								</section>							
								<section class="col col-3">
									<label class="label">Fecha de Reingreso</label>
									<label class="input">
										<input type="date" class="input-sm" size="60" name="fecreing" id="fecreing" value="<?php echo $fecreingreso ; ?>"> 
									</label>
								</section>
							</div>
							<div class="row">							
								<section class="col col-6">
									<label class="label">Procedencia</label>
									<label class="input">
										<input type="text" class="input-sm" maxLength="100" size="60" name="proc" id="proc" value="<?php echo $procedencia ; ?>" required="required"> 
									</label>
								</section>
								<section class="col col-6">
									<label class="label">Adscrito</label>
									<label class="input">
										<input type="text" class="input-sm" maxLength="100" size="60" name="adsc" id="adsc" value="<?php echo $adscrito ; ?>" required="required"> 
									</label>
								</section>
								<section class="col col-6">
									<label class="label">Nivel</label>
									<label class="select">
										<select id="nivel" name="nivel">
											<option>Seleccione el Nivel</option>										
        									<?php  
												Combos::CombosSelect('1', $nivel, 'DISTINCT niv_codigo,niv_descrip', 'niveles', 'niv_codigo', 'niv_descrip', "niv_codigo<>'' ORDER BY niv_descrip");
											?>
										</select> <i></i> 
									</label>
								</section>
								<section class="col col-6">
									<label class="label">Rango</label>
									<label class="select">
										<select id="rango" name="rango">
											<option>Seleccione el Rango</option>
        									<?php  
												Combos::CombosSelect('1', $rango, 'DISTINCT rang_codigo,rang_descrip', 'rangos', 'rang_codigo', 'rang_descrip', "rang_codigo<>'' ORDER BY rang_descrip");
											?>
										</select> <i></i> 
									</label>
								</section>
							</div>
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
	/*Si el usuario tiene permisos de lectura se muestra la tabla con los funcionarios registrados*/
}
	if ($permiso_accion['S']==1) {
		$resultc = paraTodos::arrayConsulta("*", "funcionarios", "1=1")
?>
		<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">
				<header role="heading">
					<h2>funcionarios Registrados</h2> <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span> 
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
										<th>Editar</th>
										<th>Foto</th>
										<th>Eliminar</th>
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
												<a title="Editar el registro" onclick="
       			 		$.ajax({
        			 		type: 'POST',
        			 		url: 'controller.php',
        					data: { editar: '<?php echo $rowc[fun_codigo]; ?>', org: <?php echo $org; ?>},
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
<?php
											/*Se verifica tenga todos los permisos*/
        									if ($permiso_accion['S']==1 AND $permiso_accion['I']==1 AND $permiso_accion['U']==1 AND $permiso_accion['D']==1) {
?>										
												<div tabindex="500" class="btn btn-primary btn-file">
													<i class="glyphicon glyphicon-folder-open"></i>&nbsp;  
													<span class="hidden-xs">Seleccione Imagen …</span>
													<input id="archivoImage<?php echo $rowc['fun_cedula'];?>" name="archivoImage<?php echo $rowc['fun_cedula'];?>" type="file" class="file">					
												</div>
											<input id="botonSubidor" type="button" class="btn btn-default" value="Actualizar" onclick="													
													var urlr = '<?php echo $ruta_base;?>assets/upload/rename.php';
													var c = <?php echo $rowc['fun_cedula'];?>;
													$.ajax({
														url:urlr,
														type:'POST',
														data: { c: c }
													});
													var inputFileImage = document.getElementById('archivoImage<?php echo $rowc['fun_cedula'];?>');
													var file = inputFileImage.files[0];
													var data = new FormData();
													data.append('archivo',file);
													var url = '<?php echo $ruta_base;?>assets/upload/upload.php';													
													$.ajax({
														url:url,
														type:'POST',
														contentType:false,
														data:data,
														processData:false,
														success : function (msg) {
														}
													});							
													$.ajax({
        			 									type: 'POST',
        			 									url: 'controller.php',
        												data: { editar: '<?php echo $rowc[fun_codigo]; ?>', org: <?php echo $org; ?>},
        												success: function(html) {
        													$('#content').html(html);
        												},
        												error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
        											});																																											"
											>																					
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
        											data: { borrar: <?php echo $rowc[fun_codigo]; ?>, org: <?php echo $org; ?>, cedula: <?php echo $rowc['fun_cedula'];?>},
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
<script type="text/javascript">	
	$(document).ready(function() {
		$('#funcionarios').DataTable({
			"language": {
				"url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
        	}			
		});
	});	
</script>