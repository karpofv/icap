<?php
Class Menu {
    function menuEmpUsuario($quien,$cedula,$pendiente='') {
        $NroRegistros=0;
        $NroRegistros= mysql_num_rows(mysql_query("SELECT id FROM correos WHERE Conex='$cedula' AND Status='0'"));
        ?>
        <li class="divider"></li>
        <li>
        	<span class="ribbon-button-alignment"> 
				<span id="refresh" class="btn btn-ribbon" data-action="minimizebanner" data-title="refresh" rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i>Con esto podras minimizar el banner" data-html="true">
					<i class="fa fa-arrow-down"></i>
				</span> 
			</span>
       </li>
               <?php if($NroRegistros > 0){ ?>
                <div style="font-weight: 600;cursor: pointer;float: right;margin: -37px 0px 6px 15px;color: #FFFFFF;background: #FF0000;padding: 1px 5px 1px 5px;-moz-border-radius: 50px 50px 50px 50px;-webkit-border-radius: 50px 50px 50px 50px;border-radius: 50px 50px 50px 50px;">
                    <?php echo $NroRegistros; ?>
                </div><?php
                } ?>
        </li>
        <li><a href="#" title="Reclamos"><i class="glyph-icon icon-edit"></i> <span>Reclamos</span></a></li>

        <li><a href="../../index.php?logaut=1"><i class="glyph-icon icon-clock-os"></i><span>Cerrar Sesion</span></a></li>
        <?php
    }
    function menuEmpMenj($quien,$nivel) {
        $consultasMenu = new paraTodos();
        $filasMenu = $consultasMenu->arrayConsulta("DISTINCT  m_menu_emp_menj.conex,m_menu_emp_menj.menu,m_menu_emp_menj.id","m_menu_emp_menj,perfiles_det","m_menu_emp_menj.id=perfiles_det.Menu AND perfiles_det.IdPerfil=$nivel AND perfiles_det.S=1 Order By m_menu_emp_menj.menu");
        foreach($filasMenu as $filasMenud){
            $ii++;
            if (strlen($filasMenud['menu']) > 14) {
              $empresaMenu = substr($filasMenud['menu'],0,14).'... ';
            } else {
              $empresaMenu = $filasMenud['menu'];
            }
            ?>
            <li>
				<a href="javascript: void(0);" title="<?php echo $filasMenud['menu']; ?>">
					<i class="fa fa-lg fa fa-wrench"></i> 
					<span class="menu-item-parent"><?php echo $empresaMenu; ?></span>
				</a>
                <ul>
                    <?php
                    $filasSubMenu = $consultasMenu->arrayConsulta("DISTINCT m_menu_emp_sub_menj.Url_1,m_menu_emp_sub_menj.menu,m_menu_emp_sub_menj.id","m_menu_emp_sub_menj,perfiles_det","m_menu_emp_sub_menj.id=perfiles_det.Submenu AND perfiles_det.Menu=$filasMenud[id] AND perfiles_det.IdPerfil=$nivel AND perfiles_det.S=1 Order By m_menu_emp_sub_menj.orden,m_menu_emp_sub_menj.menu");
                    foreach($filasSubMenu as $filasSubMenud){
                            if (strlen($filasSubMenud['menu']) > 35) {
                              $empresaSMenu = substr($filasSubMenud['menu'],0,35).'... ';
                            } else {
                              $empresaSMenu = $filasSubMenud['menu'];
                            }
                            ?>
                            <li>
								<a href="javascript: void(0);" title="<?php echo $filasSubMenud['menu']; ?>" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : <?php echo $filasSubMenud[id]; ?>&ver=1
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
