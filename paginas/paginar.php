
<?php

$estado = "0";

     $cliente=new SoapClient(null, array(
	  'uri' => 'http://citymovie.weare8lions.com.mx/',
	  'location' =>  'http://citymovie.weare8lions.com.mx/citymovieWS/wsarticulo.php','utf8'
	   )	
	  );
	  
	$datos=array(); 
	$datosPag=array();

if(isset($_GET['ne']))
{
	$_SESSION['ne']=$_GET['ne'];
	echo '<script language="javascript">document.location.href="?op=login";</script>';
}
else
{

$totalRegistro=6;
$numRegistro=6;

     $estado = "1";	 
	 if(isset($_GET['pagina'])){
		  $numPagina=$_GET['pagina'];		
	 }
	 else 
	 {
		  $inicioPag=0;
		  $numPagina=1;
	 }	 	 
	  if($numPagina>1)
	  {		  
		$inicioPag=($numPagina-1)*$numRegistro;	  		
	  }
	  else 
	  {
		  $inicioPag=0;
	  }	  
	    
	    
	  	$datos=$cliente->contarArti();
		$totalRegistro=$datos[0];		
		
	    $totalPaginas=ceil($totalRegistro/$numRegistro);	  	  					    
		
	
		$datosPag=$cliente->spMostrarPeli($inicioPag,$numRegistro);;			
      }               
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=charset=ISO-8859-1">
	<title></title>
		
    <!-- viewport: se utiliza para controlar c贸mo aparecer谩 el contenido HTML
         en los navegadores m贸viles, de esta forma nos aseguramos que el contenido 
         se ajusta al ancho del dispositivo.
         En este caso estamos indicando que el contenido tendr谩 el ancho del dispositivo
         y que la escala inicial es de 1 -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <meta name="author" content="Agustin Lopez Aguilar ---- ALA">
  
</head>
<body>

<section class="SecUno">
<form method="post" id="frm">
  <h2 class="NomArt">Lista de Peliculas</h2>
    
        				<?php
				if($estado!="0")
				{	          
					for($rr=0;$rr<count($datosPag);$rr++){	
					    $imagen='paginas/imgUp/'.$datosPag[$rr]['imagen'];
						echo "<div class='articulos' style='background-image: url($imagen);background-repeat: round;background-size: cover;'>";		
						     
						echo "<h2 class='NomArt'>".$datosPag[$rr]["nombre"]."</h2>";
						
						echo "<p>"."A&ntilde;o:  ".$datosPag[$rr]["yea"]."</p>";
					
						
						
						
						echo "<p><a href='?op=crud&id=".$datosPag[$rr]["id"]."'>Detalle</a></p>";  
					
						echo "</div>";
					}
        echo "<center>";	  
	  
	  if($totalPaginas>1)
	  {
	     echo "<font face='tahoma' size='2' color='#800080'>P&aacute;ginas: </font>";
	  }
	  else
	  {
		  echo "<font face='tahoma' size='2' color='#800080'>P&aacute;gina: </font>";
	  }	  
	  for ($i=1; $i<=$totalPaginas; $i++)
	  {		
		if ($numPagina == $i)
		{
			echo "<font face='tahoma' size='2' color='#800080'><b> $numPagina </b> </font>";
		}
		else
		{		
			echo " <a href='?op=paginar&pagina=$i'>$i</a> ";
		}
	  }
	  echo "</center>";
				}
?>  
        
        
        </form>
   
</section>


</body>
</html>