<?php
$datos=array(); 

$estado = "0";

     $cliente=new SoapClient(null, array(
	  'uri' => 'http://citymovie.weare8lions.com.mx/',
	  'location' =>  'http://citymovie.weare8lions.com.mx/citymovieWS/wsarticulo.php','ISO-8859-1'
	   )	
	  );
	  

if(isset($_GET['ne']))
{
	$_SESSION['ne']=$_GET['ne'];
	
}
else
{   
        $totalRegistro=0;
$numRegistro=100;

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
	    
		
	
		$datos=$cliente->spMostrarPeliAndroid($inicioPag,$numRegistro);
		if((int)$datos[0]!=0){
		    while($row=($result)){
		        $datos[]=$row;
		    }
		}
		echo json_encode($datos);
      }               
?>
