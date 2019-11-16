<?php      
    
   $usu="";
   $contra=""; 
   
   $datos=array(); 
   //$datos="";
   if( !empty($_POST['txtUsuario']) && !empty($_POST['txtContrasena']) )
   {	   
		$usu=htmlspecialchars($_POST['txtUsuario']);
		$contra=htmlspecialchars($_POST['txtContrasena']);
		
      $cliente=new SoapClient(null, array(
	  'uri' => 'http://citymovie.weare8lions.com.mx/',
	  'location' =>  'http://citymovie.weare8lions.com.mx/citymovieWS/wsarticulo.php'
	   )	
	  );
	  
	  $datos=$cliente->acceso($usu,$contra);
	  
	  if((int)$datos[0]["ID"]!=0){
	   
	    
	  if(!isset($_SESSION['cveUsuario']))
    {
        $_SESSION['cveUsuario']=(int)$datos[0]["ID"];
        echo $_SESSION['cveUsuario'];
        
    }else{
        echo "<script language='javascript'>alert('Ya esta seteada'".$_SESSION['cveUsuario']."');</script>";
    }
    
    	  if(!isset($_SESSION['nomUsuario']))
    {
        $_SESSION['nomUsuario']=$datos[1]["NOMBRE"];
        echo $_SESSION['nomUsuario'];
    }else{
        echo "<script language='javascript'>alert('Ya esta seteada'".$_SESSION['nomUsuario']."');</script>";
    }
    
 
	  $mensaje="Bienvenido ".$_SESSION['nomUsuario']." estas entrando al sistema..."; 
	  echo "<script language='javascript'>alert('.$mensaje.');document.location.href='?op=principal';</script>";
	  }
	  
	  
	  else
	  {
	      echo "<script language='javascript'>alert('Acceso Denegado');</script>";
	  }
	  
	  
	
   }  
?> 

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	<title></title>
		
    <!-- viewport: se utiliza para controlar cómo aparecerá el contenido HTML
         en los navegadores móviles, de esta forma nos aseguramos que el contenido 
         se ajusta al ancho del dispositivo.
         En este caso estamos indicando que el contenido tendrá el ancho del dispositivo
         y que la escala inicial es de 1 -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <meta name="author" content="Agustin Lopez Aguilar ---- ALA">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>
<form action=" " method="post"  id="contact_form">
<div class='wrap'>
  <h2 class="NomArt">Inicio de Sesi&ntilde;n</h2>
    <form>
        <div>
            <input type='text' id='txtUsuario' placeholder='Usuario' name="txtUsuario">
        </div>
        
        <div>
        <input type='password' id='txtContra' placeholder='Clave' name="txtContrasena">
        </div>
        
        <div>
            <button class='btn'>Ingresar</button>
        </div>
        
    </form>
  
</div>
</form>

</body>
</html>