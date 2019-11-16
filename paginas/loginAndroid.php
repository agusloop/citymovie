
<?php
$usu="";
$contra="";
$datos="";
if(!empty($_REQUEST['usu']) && !empty($_REQUEST['contra'])){
    $usu=htmlspecialchars($_REQUEST['usu']);
	$contra=htmlspecialchars($_REQUEST['contra']);
 $cliente=new SoapClient(null, array(
	  'uri' => 'http://citymovie.weare8lions.com.mx/',
	  'location' =>  'http://citymovie.weare8lions.com.mx/citymovieWS/wsarticulo.php'
	   )	
	  );
	$datos= $cliente->accesoMiembros($usu,$contra);
	
	if((int)$datos[0]!=0){
	    echo json_encode($datos);
	}else{
	    //NO SE ENCUENTRA EL USUARIO
	    echo json_encode($datos[0]);
	}
}


?>