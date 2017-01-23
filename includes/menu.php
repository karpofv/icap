<?php
Class Menu {
    function menuEmpMenj($quien,$nivel) {
        $consultasMenu = new paraTodos();
        $filasMenu = $consultasMenu->arrayConsulta("DISTINCT  m_menu_emp_menj.conex,m_menu_emp_menj.menu,m_menu_emp_menj.id,m_menu_emp_menj.Imagen","m_menu_emp_menj,perfiles_det","m_menu_emp_menj.id=perfiles_det.Menu AND perfiles_det.IdPerfil=$nivel AND perfiles_det.S=1 Order By m_menu_emp_menj.orden");
        foreach($filasMenu as $filasMenud){
            $ii++;
            if (strlen($filasMenud['menu']) > 14) {
              $empresaMenu = $filasMenud['menu'];				
              /*$empresaMenu = substr($filasMenud['menu'],0,14).'... ';*/
            } else {
              $empresaMenu = $filasMenud['menu'];
            }
            ?>
            <li>
				<a href="javascript: void(0);" title="<?php echo $filasMenud['menu']; ?>">
					<i class="<?php echo $filasMenud['Imagen']; ?>"></i> 
					<span class="menu-item-parent"><?php echo $empresaMenu; ?></span>
				</a>
                <ul>
                    <?php
                    $filasSubMenu = $consultasMenu->arrayConsulta("DISTINCT m_menu_emp_sub_menj.Url_1,m_menu_emp_sub_menj.menu,m_menu_emp_sub_menj.id","m_menu_emp_sub_menj,perfiles_det","m_menu_emp_sub_menj.id=perfiles_det.Submenu AND perfiles_det.Menu=$filasMenud[id] AND perfiles_det.IdPerfil=$nivel AND perfiles_det.S=1 Order By m_menu_emp_sub_menj.orden,m_menu_emp_sub_menj.menu");
                    foreach($filasSubMenu as $filasSubMenud){
                            if (strlen($filasSubMenud['menu']) > 35) {
								$empresaSMenu = $filasSubMenud['menu'];
                              /*$empresaSMenu = substr($filasSubMenud['menu'],0,35).'... ';*/
                            } else {
                              $empresaSMenu = $filasSubMenud['menu'];
                            }
                            ?>
                            <li>
								<a href="javascript: void(0);" title="<?php echo $filasSubMenud['menu']; ?>" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {
										org   : <?php echo $filasSubMenud[id]; ?>,
										ver: 1
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
									<span class="menu-item-parent"><?php echo $empresaSMenu; ?></span>
								</a>                                                                                 	
                            </li>
                            <?php
                    } ?>
                </ul>
            </li>
            <?php
        }
        ////////////////////////////////////////////////////////////////////
    }
}
