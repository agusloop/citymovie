<?php      
   $usu="";
   $contra=""; 
        $nombre = "";
        $yea="";
        $reparto = "";
        $sinopsis="";
        $imagen = "";
   
   $datos=array(); 
   //$datos="";
   if( !empty($_POST['txtNomb']) && !empty($_POST['txtYear']) && !empty($_POST['txtGenero']) && !empty($_POST['txtReparto']) && !empty($_POST['txtSinopsis']) && !empty($_FILES['imagen']['name'])  )
   {	   
		  	$nombre = htmlspecialchars($_POST['txtNomb']);
            $yea = htmlspecialchars($_POST['txtYear']);
            $genero = htmlspecialchars($_POST['txtGenero']);
            $reparto = htmlspecialchars($_POST['txtReparto']);
            $sinopsis = htmlspecialchars($_POST['txtSinopsis']);
            $nombreImg = "imagen".date("dHis").".". pathinfo($_FILES['imagen']['name'],PATHINFO_EXTENSION);
			$archivo = $_FILES['imagen']['tmp_name'];
				//ruta del destino del servidor
            $carpeta = "paginas/imgUp/";
    
        //mover imagen a directorio temporal

        move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombreImg);

		
      $cliente=new SoapClient(null, array(
	  'uri' => 'http://citymovie.weare8lions.com.mx/',
	  'location' =>  'http://citymovie.weare8lions.com.mx/citymovieWS/wsarticulo.php'
	   )	
	  );
	  
	  
		  $datos=$cliente->registroPeli($nombre,$yea,$genero,$reparto,$sinopsis,$nombreImg);
	  
	  if($datos) {
		$nombre= $_POST ['txtNomb'];
		$yea= $_POST ['txtYear'];
		$genero= $_POST ['txtGenero'];
		$reparto= $_POST ['txtReparto'];
		$sinopsis= $_POST ['txtSinopsis'];
		
		$nombreImg = "imagen".date("dHis").".". pathinfo($_FILES['imagen']['name'],PATHINFO_EXTENSION);
		$archivo = $_FILES['imagen']['tmp_name'];
				//ruta del destino del servidor
        $carpeta = $carpeta = "paginas/imgUp/";
    
        //mover imagen a directorio temporal

        move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombreImg);
        
		
	
   } 
   echo "<script language='javascript'>alert('Registro Exitoso')</script>";
    echo "<script language='javascript'>alert('.$mensaje.');document.location.href='?op=paginar';</script>";

   }

	
   
?> 



<!DOCTYPE html>
<html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252" charset="utf-8" >
	<title></title>
		
    <!-- viewport: se utiliza para controlar c���mo aparecer��� el contenido HTML
         en los navegadores m���viles, de esta forma nos aseguramos que el contenido 
         se ajusta al ancho del dispositivo.
         En este caso estamos indicando que el contenido tendr��� el ancho del dispositivo
         y que la escala inicial es de 1 -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <meta name="author" content="Agustin Lopez Aguilar ---- ALA">

</head>
<body>
    <div class='wrap'>
	<form action=" " method="post"  id="contact_form" enctype="multipart/form-data">

 <legend>Registro de Peliculas</legend>
    
        <div>
            <input type='text' id='txtNom' placeholder='Nombre de la pelicula' name="txtNomb">
        </div>


        <div>
        <input type='number' id='txtContra' placeholder='A&ntilde;o' name="txtYear">
        </div>
        
        <div>
        <input type='number' id='txtGenero' placeholder='Genero' name="txtGenero">
        </div>
        <div>
        <input type='text' id='txtReparto' placeholder='Reparto' name="txtReparto">
        </div>
        <div>
        <input type='text' id='txtSinopsis' placeholder='Sinopsis' name="txtSinopsis">
        </div>
        
        
        <div>
        <input type='file' id='txtiMAGEN'  name="imagen" required="">
        </div>

        
        <div>
            <button type="submit" class='btn'>Registrar </button>
        </div>
    </form>
        
  
</div>



</body>
</html>