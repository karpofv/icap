<!-- #NAVIGATION -->
<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
<aside id="left-panel">
		<div class="col-xs-12 hidden-xs hidden-sm animated fadeInDown " id="banner">
			<span class="ribbon-button-alignment"> 
				<span id="refresh" class="btn btn-ribbon" data-action="minimizebanner" data-title="refresh" rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i>Con esto podras minimizar el banner" data-html="true">
					<i class="fa fa-arrow-down"></i>
				</span> 
			</span>		
		</div>
	<!-- NAVIGATION : This navigation is also responsive
	To make this navigation dynamic please make sure to link the node
	(the reference to the nav > ul) after page load. Or the navigation
	will not initialize.
	-->
	<nav>
	<!-- 
	NOTE: Notice the gaps after each icon usage <i></i>..
	Please note that these links work a bit different than
	traditional href="" links. See documentation for details.
	-->
		<ul>
			<li class="">
			<li>
				<a href="<?php $ruta_base;?>controller.php?org=33"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Inicio</span></a>
			</li>
			<li>
				<a href="javascript: void(0);">
					<i class="fa fa-lg fa fa-wrench"></i> 
					<span class="menu-item-parent">Administrar</span>
				</a>						
				<ul>
					<li class="">
						<a href="javascript: void(0);" title="Oficinas" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 56
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
								<span class="menu-item-parent">Oficinas</span>
						</a>
					</li>
					<li class="">
						<a href="javascript: void(0);" title="Usuarios" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 55
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
								<span class="menu-item-parent">Usuarios</span>
						</a>
					</li>
					<li>
						<a href="javascript: void(0);" title="Cargos" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 57
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
								<span class="menu-item-parent">Cargos</span>
						</a>
					</li>
					<li>
						<a href="javascript: void(0);" title="Rangos" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 58
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
								<span class="menu-item-parent">Rangos</span>
						</a>
					</li>
					<li>
						<a href="javascript: void(0);" title="Niveles" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 61
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
								<span class="menu-item-parent">Niveles</span>
						</a>
					</li>
					<li class="javascript: void(0);">
						<a href="#" title="Backup"><span class="menu-item-parent">Backup</span></a>
					</li>
				</ul>	
			</li>
			<li>
				<a href="javascript: void(0);" title="Rangos" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 60
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
						<i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Registrar</br> Funcionario</span>
					</a>				
			</li>
			<li>
				<a href="#">
					<i class="fa fa-lg fa fa-wrench"></i> 
					<span class="menu-item-parent">Expediente <br> Administrativo</span>
				</a>						
				<ul>
					<li class="">
						<a href="javascript: void(0);" title="Oficinas" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 62
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
								<span class="menu-item-parent">Aperturar Expediente</span>
						</a>
					</li>
					<li class="">
						<a href="javascript: void(0);" title="Usuarios" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 63
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
								<span class="menu-item-parent">Decisiones</span>
						</a>
					</li>
				</ul>				
			</li>
			<li>
				<a href="javascript: void(0);">
					<i class="fa fa-lg fa-fw fa-table"></i> 
					<span class="menu-item-parent">Medidas de</br> Asistencia</span>
				</a>
				<ul>
					<li class="">
						<a href="javascript: void(0);" title="Oficinas" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 64
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
								<span class="menu-item-parent">Asistencia Obligatoria</span>
						</a>
					</li>
					<li class="">
						<a href="javascript: void(0);" title="Usuarios" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 65
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false">
								<span class="menu-item-parent">Asistencia Voluntaria</span>
						</a>
					</li>
				</ul>				
			</li>
			<li>
				<a href="javascript: void(0);" onclick="
								$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 66
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Llamados de</br> Atención</span></a>			
			</li>
			<li>
				<a href="javascript: void(0);" onclick="
								$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 67
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">Destitución</span></a>					
			</li>	
			<li>
				<a href="javascript: void(0);" title="Usuarios" onclick="$.ajax({ 
									type: 'POST', url: 'controller.php',
									data: {org   : 68
									},
									success: function(html) {
										$('#content').html(html);
									},
									error: function(xhr,msg,excep) {
										alert('Error Status ' + xhr.status + ': ' + msg + '/ ' + excep);
									}
								}); return false"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Denuncias</span></a>
			</li>					
		</ul>
	</nav>						
</aside>
<!-- END NAVIGATION -->
