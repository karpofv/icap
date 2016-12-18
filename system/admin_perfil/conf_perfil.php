<?php
	$idperfil=$_POST['eliminar'];
	$mody=$_POST['mody'];	
	/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/	
	if (isset($_POST['eliminar'])) {
    	$consulta_nombre_perfil = paraTodos::arrayConsulta('Nombre','perfiles',"CodPerfil=$idperfil");		
		foreach ($consulta_nombre_perfil as $rows){
			$nombre_perfil=$rows["Nombre"];			
		}
    	$verifica_perfil = paraTodos::arrayConsultanum('*','usuarios',"Nivel='$nombre_perfil'");
    	if ($verifica_perfil==0) {
 			$consulta_eliminar = paraTodos::arrayDelete("IdPerfil=$idperfil",'perfiles_det');
 			$consulta_eliminar = paraTodos::arrayDelete("CodPerfil=$idperfil",'perfiles');
    	} else {
 			echo "<h3 class=\"error\">El perfil no puede ser eliminado porque se encuentra en uso</h3>";
    	}
	}
	if ($_POST['nuevoperfil']<>"") {    
		//Si el texto tiene algo es porque se va a crear un nuevo perfil
		$indicemenu=$_POST['indicemenu'];	
		$nuevoperfil=$_POST['nuevoperfil'];
		//Validar si el perfil solapa a otro
		if ($nuevoperfil<>'') {		
    		$consulta_nombre_perfil = paraTodos::arrayConsultanum('Nombre','perfiles',"Nombre like '%".$nuevoperfil."%'");
			if ($consulta_nombre_perfil > 0) {
				die ('<h3 class="error">El nombre de perfil seleccionado no puede usarse, intente con otro</h3>');
			}
		}
		if ($nuevoperfil<>'') {
			$id=time();
			$insertar_perfil = paraTodos::arrayInserte("CodPerfil,Nombre","perfiles","'$id','$nuevoperfil'");
			$idperfil=$id;
		}		
    }
?>
	<form onsubmit="$.ajax({
	 				type: 'POST',
	 				url: 'controller.php',
	 				data: 'idsubmenu=<?php echo $idsubmenu;?>&nuevoperfil='+$('#nuevoperfil').val(),
					success: function(html) {
						$('#page-content').html(html); 
					},
					error: function(xhr,msg,excep) {
						alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); 
					}
				});
				return false" action="javascript: void(0);" method="post" name="enviar">
		<div class="container" style="margin: 57px auto 0 auto;background: #FFFFFF;border: 1px solid #DDDDDD;width: 60%;">
			<div style="color: #A50000;width: 100%;padding: 8px 0px 8px 0px; text-align: center;height: 45px;font-weight: bold;overflow: hidden;font-size: 11pt;border: 1px solid #DDDDDD;background: #FAFAFA;;"> Administraci&oacute;n de Perfiles </div>
			<div style="height: auto;overflow: hidden;padding: 10px;">
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Perfil</label>
					<div class="col-sm-10">
						<select class="form-control" id="idperfil" name="idperfil" style=" border: 1px solid #DDDDDD;height: 32px;width: 60%;">
							<option value="">Selecciona un perfil</option>
							<?php Combos::CombosSelect($permiso, $id, 'DISTINCT CodPerfil,Nombre', 'perfiles', 'CodPerfil', 'Nombre', "CodPerfil<>'' ORDER BY Nombre");  ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Nombre del Nuevo Perfil</label>
					<div class="col-sm-10">
						<input class="gen_input" maxLength="150" size="30" name="nuevoperfil" id="nuevoperfil" type="text" title="Ingrese nuevo perfil" style=" border: 1px solid #DDDDDD;height: 32px;" onchange="ApagaTexto();" required="required"> </div>
				</div>
			</div>
			<div style="color: #A50000;width: 100%;padding: 8px 0px 8px 0px; text-align: center;height: auto;font-weight: bold;overflow: hidden;font-size: 11pt;border: 1px solid #DDDDDD;background: #FAFAFA;;">
				<button class="btn btn-primary popover-button" type="submit">Crear Perfil</button>
			</div>
		</div>
	</form>
	<div id="perfilver"></div>
	<?php
?>
		<script type="text/javascript">
			$('#idperfil').change(function () {
				var perf = $('#idperfil').val();
				if (perf != '') {
					$.ajax({
						type: 'POST'
						, url: 'controller.php'
						, data: 'act=2&org=<?php echo $idMenut; ?>&idperfil'+perf
						, success: function (html) {
							alert(html);
							$('#perfilver').html(html);
						}
					});
				}
			});
		</script>