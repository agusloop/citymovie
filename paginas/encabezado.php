<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	<title></title>
		
    <!-- viewport: se utiliza para controlar c贸mo aparecer谩 el contenido HTML
         en los navegadores m贸viles, de esta forma nos aseguramos que el contenido 
         se ajusta al ancho del dispositivo.
         En este caso estamos indicando que el contenido tendr谩 el ancho del dispositivo
         y que la escala inicial es de 1 -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <meta name="author" content="Agustin Lopez Aguilar ---- ALA">
    

	<link rel="stylesheet" type="text/css" href="paginas/css/default.css" />
    <link rel="stylesheet" type="text/css" href="paginas/css/component.css" />
	<script src="paginas/js/modernizr.custom.js"></script>
</head>
<body>
	<header>
     	<nav class="navbar">
     	<div class="bottomfoot  ocultar">
			<img src="paginas/imagenes/logo.png" class="TopImg">
		
		</div>
		

		<div class="bottomfoot ContenidoTop">
		    <div class="bottomfoot Tapar">
		    <div id="dl-menu" class="dl-menuwrapper tapar">
				<button class="dl-trigger">Abrir Menú</button>
						<ul class="dl-menu">
							<li><a  href="?op=index">Inicio</a></li>
  				            <li><a href="#">Servicios</a></li>
  				            <li><a href="?op=login">Iniciar Sesión</a></li>
							
						</ul>
			</div><!-- /dl-menuwrapper -->
			</div>
			<div  class="bottomfoot ocultar">
			<ul class="topnav">
  				<li><a  href="?op=index">Inicio</a></li>
  				<li><a href="#">Servicios</a></li>
  				<li><a href="?op=login">Iniciar Sesion</a></li>
  			
			</ul>
			</div>
		</div>
    
			<div class="bottomfoot right">
			<h2 class="TopTitle">El row</h2>
		
			</div>
			

		
     	</nav>
	</header>  
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="paginas/js/jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu({
					animationClasses : { classin : 'dl-animate-in-4', classout : 'dl-animate-out-4' }
				});
			});
		</script>



</body>
</html>