<?php
	class Menu {
    	function menuEmpMenj($quien,$nivel) {        
        	$campos="DISTINCT  m_menu_emp_menj.conex,m_menu_emp_menj.menu,m_menu_emp_menj.id";
        	$tablas="m_menu_emp_menj,perfiles_det";
        	$consultas="m_menu_emp_menj.id=perfiles_det.Menu AND perfiles_det.IdPerfil=$nivel AND perfiles_det.S=1 Order By m_menu_emp_menj.menu";
        	$res_ =paraTodos::arrayConsulta($campos,$tablas,$consultas);
        	foreach ($res_ as $rows ) {
            	$ii++;
            	if (strlen($rows['menu']) > 14) {
              		$empresaMenu = substr($rows['menu'],0,14).'... ';
            	} else {
              		$empresaMenu = $rows['menu'];
            	}
            	if($ii==1){
?>
					<li class="divider"></li>
                	<li style="background: #333333;"><a><i class="glyph-icon icon-laptop"></i><span style="color: #FFFFFF;">Opciones Mensajeria</span></a></li>
                	<li class="divider"></li>
<?php
				}
?>
            	<li>
                	<a href="#" title="<?php echo $rows['menu']; ?>"><i class="glyph-icon icon-linecons-cloud"></i> <span><?php echo $empresaMenu; ?></span></a>
                	<ul>
<?php
                		$campos="DISTINCT m_menu_emp_sub_menj.Url_1,m_menu_emp_sub_menj.menu,m_menu_emp_sub_menj.id";
                		$tablas="m_menu_emp_sub_menj,perfiles_det";
                		$consultas="m_menu_emp_sub_menj.id=perfiles_det.Submenu AND perfiles_det.Menu=$rows[id] AND perfiles_det.IdPerfil=$nivel AND perfiles_det.S=1 Order By m_menu_emp_sub_menj.orden,m_menu_emp_sub_menj.menu";
                		$res_ =paraTodos::arrayConsulta($campos,$tablas,$consultas);
                		foreach ($res_ as $rowsb ) {
                    		if (strlen($rowsb['menu']) > 35) {
                      			$empresaSMenu = substr($rowsb['menu'],0,35).'... ';
                    		} else {
                      			$empresaSMenu = $rowsb['menu'];
                    		}
?>
                    		<li>
                    			<a title="Pulse para ejecutar (<?php echo $rowsb['menu']; ?>)" onclick="$.ajax({ type: 'POST', url: 'controller.php', data: 'org=<?php echo $rowsb[id]; ?>&ver=1', success: function(html) { $('#page-content').html(html); }, error: function(xhr,msg,excep) { alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep); }
                    }); return false;" href="javascript: void(0);">
                    				<span><?php echo $empresaSMenu; ?></span>
                    			</a>
							</li>
<?php
                		} ?>
                	</ul>
            	</li>
<?php
			}
		}
	}
?>
