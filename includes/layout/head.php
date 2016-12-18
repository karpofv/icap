<!DOCTYPE html>
<html lang="en-us">
<!-- Mirrored from 192.241.236.31/themes/preview/smartadmin/1.8.x/ajax/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Oct 2016 06:09:12 GMT -->

<head>
	<meta charset="utf-8">
	<title> ICAP | BARINAS</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- #CSS Links -->
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/themes/css/style.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/themes/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/themes/css/font-awesome.min.css">
	<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/themes/css/smartadmin-production-plugins.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/themes/css/smartadmin-production.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/themes/css/smartadmin-skins.min.css">
	<!-- DEV links : turn this on when you like to develop directly -->
	<!--<link rel="stylesheet" type="text/css" media="screen" href="../Source_UNMINIFIED_CSS/smartadmin-production.css">-->
	<!--<link rel="stylesheet" type="text/css" media="screen" href="../Source_UNMINIFIED_CSS/smartadmin-skins.css">-->
	<!-- SmartAdmin RTL Support -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/themes/css/smartadmin-rtl.min.css">
	<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->
	<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $ruta_base; ?>assets/themes/css/demo.min.css">
	<!-- #FAVICONS -->
	<link rel="shortcut icon" href="<?php echo $ruta_base; ?>assets/themes/img/favicon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo $ruta_base; ?>assets/themes/img/favicon/favicon.ico" type="image/x-icon">
	<!-- #APP SCREEN / ICONS -->
	<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
	<link rel="apple-touch-icon" href="<?php echo $ruta_base; ?>assets/themes/img/splash/sptouch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $ruta_base; ?>assets/themes/img/splash/touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $ruta_base; ?>assets/themes/img/splash/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $ruta_base; ?>assets/themes/img/splash/touch-icon-ipad-retina.png">
	<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- Startup image for web apps -->
	<link rel="apple-touch-startup-image" href="<?php echo $ruta_base; ?>assets/themes/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="<?php echo $ruta_base; ?>assets/themes/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="<?php echo $ruta_base; ?>assets/themes/img/splash/iphone.png" media="screen and (max-device-width: 320px)"> </head>
<!-- #BODY -->
<body class="smart-style-0 menu-on-top">
	<!-- #HEADER -->
	<header id="header">
		<div id="header-cintillo" class="col-xs-12 col-sm-12 col-md-6 col-lg-offset-3 col-lg-5">
		</div>
		<!-- end projects dropdown -->
		<!-- #TOGGLE LAYOUT BUTTONS -->
		<!-- pulled right: nav area -->
		<div class="pull-right">
			<!-- collapse menu button -->
			<div id="hide-menu" class="btn-header pull-right"> <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span> </div>
			<!-- end collapse menu -->
			<!-- #MOBILE -->
			<!-- Top menu profile link : this shows only when top menu is active -->
			<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
				<li class="">
					<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> <img src="<?php echo $ruta_base;?>assets/themes/img/avatars/male.png"class="online" /> </a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="#ajax/profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>Mi</u> Perfil</a>
						</li>
						<li class="divider"></li>
						<li> <a href="controller.php?org=33&salir=1" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>S</u>alir</strong></a> </li>
					</ul>
				</li>
			</ul>
			<!-- logout button -->
			<div id="logout" class="btn-header transparent pull-right">
				<span>
					<a href="controller.php?org=44&salir=1" title="Salir" data-action="userLogout" data-logout-msg="Realmente Desea Salir del Sistema?">
                        <i class="fa fa-sign-out"></i>
                    </a> 
				</span>
			</div>
			<!-- end logout button -->
			<!-- search mobile button (this is hidden till mobile view port) -->
			<div id="search-mobile" class="btn-header transparent pull-right"> <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span> </div>
			<!-- end search mobile button -->
			<!-- fullscreen button -->
			<div id="fullscreen" class="btn-header transparent pull-right"> <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span> </div>
			<div class="btn-header transparent pull-right"> <span> <?php echo $_SESSION['usuario_nomusu']?> </span> </div>
			<!-- end fullscreen button -->
		</div>
		<!-- end pulled right: nav area -->	
	</header>	
	<!-- END HEADER -->