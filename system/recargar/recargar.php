<?php
	/*Se incluye archivo auth para autentificar la sesion*/
    require('../includes/auth.php');
    $permiso = $_SESSION['usuario_login'];
    $nivel = $_SESSION['usuario_perfil'];
    $opcion = $_POST['opcion'];
    include_once '../includes/combos.php';
    error_reporting(E_ALL);
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);
	//------------------------------------------------------------------------------------------------------------
	/*Se valida el usuario tenga un nivel de acceso Valido de lo contrario se redirige a la principal*/
    $nivel_acceso='Valido';
    if ($nivel_acceso!=$_SESSION['usuario_nivel']) {
        header ("Location: $redir?error_login=5");
        exit;
    }
    if($opcion == "aggfunimpl"){
        $codigo = $_POST['codigo'];
        $cedula = $_POST['cedula'];
        $consulta = paraTodos::arrayConsulta("fun_cedula,fun_nombre, fun_apellido, rang_descrip", "funcionarios f, rangos r", "f.fun_rango=r.rang_codigo and f.fun_cedula=$cedula");
        foreach($consulta as $row){
            $insert = paraTodos::arrayInserte("denf_dencodigo, denf_funcedula,denf_funnombre,denf_funapellido,denf_funrango", "denuncia_func", "'$codigo', '$row[fun_cedula]', '$row[fun_nombre]', '$row[fun_apellido]', '$row[rang_descrip]'");
        }
    }
    if($opcion == "delfunimpl"){
        $codigo = $_POST['codigo'];
        $cedula = $_POST['cedula'];
        $consulta = paraTodos::arrayDelete("denf_dencodigo=$codigo and denf_funcedula=$cedula", "denuncia_func");       
    }
    if($opcion == "acttabfunimpl"){
        $codigo = $_POST['codigo'];
        $funcionarios = paraTodos::arrayConsulta("*", "denuncia_func", "denf_dencodigo = $codigo");
        foreach($funcionarios as $rowf){
?>
        <tr>
            <td><?php echo $rowf['denf_funcedula']?></td>
			<td><?php echo $rowf['denf_funnombre']?></td>
			<td><?php echo $rowf['denf_funapellido']?></td>
			<td><?php echo $rowf['denf_funrango']?></td>
			<td>									
                <a title="Eliminar el registro" onclick=" var msg = confirm('Esta seguro que desea eliminar el registro?');
				if (msg) {
					$.ajax({
					   type: 'POST',
                        url: 'controller.php',		
						data: { 
                            codigo: '<?php echo $rowf['denf_dencodigo']?>',
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
            </td>
        </tr>
<?php
        }           
    }    
?>