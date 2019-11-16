<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="paginas/css/estilosgenerales.css">
	 
    
</head>
<body>
    <div class="wrapper">
        <br>
	<?php
    //isset verifica que exista la variable op, posteriormente se convierte todo a minúsculas
    $pagina = isset($_GET['op'])? strtolower($_GET['op']) : 'index';
    require_once 'paginas/encabezado.php';
    require_once 'paginas/' . $pagina . '.php';
    require_once 'paginas/piepagina.php';
	
	?>
	</div>
</body>
</html>