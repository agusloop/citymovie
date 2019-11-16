<?php      
    
   $usu="";
   $contra=""; 
   
   $datos=array(); 
   //$datos="";
   if( !empty($_REQUEST['nomUsuario']) && !empty($_REQUEST['nomContra']) )
   {	   
		$usu=htmlspecialchars($_REQUEST['nomUsuario']);
		$contra=htmlspecialchars($_REQUEST['nomContra']);
		
      $cliente=new SoapClient(null, array(
	  'uri' => 'http://citymovie.weare8lions.com.mx/',
	  'location' =>  'http://citymovie.weare8lions.com.mx/citymovieWS/wsarticulo.php'
	   )	
	  );
	  
	  $datos=$cliente->acceso($usu,$contra);
	  
	  if((int)$datos[0]["ID"]!=0){
	  echo json_encode($datos);
	  }
	  
	  
	  else
	  {
	     echo json_encode($datos[0]);
	  }
	  
	  
	
   }  
?> 