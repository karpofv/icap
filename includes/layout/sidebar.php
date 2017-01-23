<!-- #NAVIGATION -->
<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
<aside id="left-panel">
		<div class="col-xs-12 hidden-xs hidden-sm animated fadeInDown " id="banner">
			<img src="../assets/images/banner.jpg" class="img-responsive" id="banner1">			
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
				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="minimizebanner" data-title="refresh" rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i>Con esto podras minimizar el banner" data-html="true">
						<i class="fa fa-arrow-down"></i>
					</span> 
				</span>					
            <?php menu::menuEmpMenj($quien,$nivel); ?>            					
		</ul>
	</nav>						
</aside>
<!-- END NAVIGATION -->
