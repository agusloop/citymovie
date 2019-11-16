<?php

class clsarticulo{

	public function acceso($usu,$contra)
	{	 
         $datos=array();   
      
      if($conn = mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart') ){
		$renglon = mysqli_query($conn,"CALL spSesion('$usu','$contra')");	  			
			while($resultado = mysqli_fetch_assoc($renglon)){
                            $datos[0]["ID"] =$resultado["ID"];				
				if((int)$datos[0]!=0)
				{				
					$datos[1]["NOMBRE"] =$resultado["NOMBRE"];				
					$datos[2]["ROL"] =$resultado["ROL"];					
				}
			}							
            mysqli_close($conn); 		
      }    
                 
	   return $datos;
	}
	
	
		public function accesoMiembros($usu,$contra)
	{	 
         $datos=array();   
      
      if($conn = mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart') ){
		$renglon = mysqli_query($conn,"CALL spLoginMiembros('$usu','$contra')");	  			
			while($resultado = mysqli_fetch_assoc($renglon)){
                            $datos[0]["ID"] =$resultado["ID"];				
				if((int)$datos[0]!=0)
				{				
					$datos[1]["NOMBRE"] =$resultado["NOMBRE"];				
					$datos[2]["usu"] =$resultado["USU"];					
				}
			}							
            mysqli_close($conn); 		
      }    
                 
	   return $datos;
	}

	public function accesoDos($usu,$contra)
	{	  
      if($conn = mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart') ){
		  
		  $datos="";  
		  
			$renglon = mysqli_query($conn,"CALL  spSesion('$usu','$contra')");	  
			
			while($resultado = mysqli_fetch_assoc($renglon)){
                        
                            if((int)$resultado["ID"]!=0)
                            {
                                
                                if($resultado["ROL"]==1)
                                {
                                    $tipo='ADMINISTRADOR';
                                }
                                else
                                {
                                    $tipo='USUARIO';
                                }

                            $datos="Bienvenido " .$resultado["NOMBRE"]." estás entrando como " .$tipo."...";
}
else
{
                            $datos="Acceso Denegado";
} 

		
			}							
            mysqli_close($conn); 		
      }    
                 
	   return $datos;
	}
	
	
public function contarArti()
	{
		$res=array();		
		
  		if($conn = mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart') ){		
		   $consulta = mysqli_query($conn,"call spMostrarPeli (0,0,0);");	      			 
		   $res[0]=mysqli_num_rows($consulta);	  	  
		}
		mysqli_free_result($consulta);
		mysqli_close($conn); 			
		return $res;
	} 

	public function spMostrarPeli($iniPag,$numReg)
	{
		$res=array();		
		$reg=0; 		
		$conn=mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart');	    
		$recordSet=mysqli_query($conn,"call spMostrarPeli ($iniPag,$numReg,1);");
		while($resultado = mysqli_fetch_assoc($recordSet)){
			$res[$reg]["id"]=$resultado["ID"];
			$res[$reg]["nombre"]=$resultado["NOMBRE"];
			$res[$reg]["yea"]=$resultado["YEA"];
			$res[$reg]["genero"]=$resultado["GENERO"];
			$res[$reg]["fecha"]=$resultado["FECHA"];
			$res[$reg]["imagen"]=$resultado["IMAG"];
			
			

			$reg++;
		}			
		
		
		
		
	
		
		
		
		
		 mysqli_free_result($recordSet);			 
		 mysqli_close($conn); 	

		return $res;
	}
	
		public function spMostrarPeliAndroid($iniPag,$numReg)
	{
		$res=array();		
		$reg=0; 		
		$conn=mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart');	    
		$recordSet=mysqli_query($conn,"call spMostrarPeli ($iniPag,$numReg,1);");
		while($resultado = mysqli_fetch_assoc($recordSet)){
			$res[$reg]["id"]=$resultado["ID"];
			$res[$reg]["nombre"]=$resultado["NOMBRE"];
			$res[$reg]["yea"]=$resultado["YEA"];
			$res[$reg]["genero"]=$resultado["GENERO"];
			$res[$reg]["reparto"]=$resultado["REPARTO"];
			
			$res[$reg]["fecha"]=$resultado["FECHA"];
			$res[$reg]["sinopsis"]=$resultado["SINOPSIS"];
			$res[$reg]["imagen"]=$resultado["IMAG"];
			
			

			$reg++;
		}			
		
		
		
		
	
		
		
		
		
		 mysqli_free_result($recordSet);			 
		 mysqli_close($conn); 	

		return $res;
	}
	
		

	
	
public function SelArti($id){
	    $res= array();
	    $conn=mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart');
	    $recordSet=mysqli_query($conn,"call spDetPeli($id);");
	    while($resultado = mysqli_fetch_array($recordSet)){	
			$res["id"]=$resultado["ID"];
			$res["nombre"]=$resultado["NOMBRE"];
			$res["yea"]=$resultado["YEA"];
			$res["genero"]=$resultado["GENERO"];
			$res["reparto"]=$resultado["REPARTO"];
			$res["fecha"]=$resultado["FECHA"];
			$res["sinopsis"]=$resultado["SINOPSIS"];
			$res["imagen"]=$resultado["IMAG"];
		
	}
	mysqli_free_result($recordSet);
	mysqli_close($conn);
	return $res;
	}
	
	

	
	   public function buscarusuario($id)
   {
       $datos=array(); 
       $conn=mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart');	    
       $recordSet=mysqli_query($conn,"call spBuscarUsuario($id);");
       	while($resultado = mysqli_fetch_assoc($recordSet)){
                $datos[0]["ID"] =$resultado["ID"];				
				if((int)$datos[0]["ID"]!=0)
				{	
			$res["id"]=$resultado["ID"];
			$res["area"]=$resultado["AREA"];
			$res["titulo"]=$resultado["TITULO"];
			$res["resumen"]=$resultado["RESUMEN"];
			$res["volumen"]=$resultado["VOLUMEN"];
			$res["fecha"]=$resultado["FECHA"];	
					
				}
			}							
            mysqli_close($conn); 		
         
                 
	   return $datos;
   }
	
	

	
	
		public function registroPeli($nombre,$yea,$genero,$reparto,$sinopsis,$nombreImg)
	{	 
         $datos=array();   
      
      if($conn = mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart') ){
		$renglon = mysqli_query($conn,"CALL spRegistrarPelicula('$nombre','$yea','$genero','$reparto','$sinopsis','$nombreImg')");	  			
			while($resultado = mysqli_fetch_assoc($renglon)){
                $datos[0]["ID"] =$resultado["ID"];				
				if((int)$datos[0]!=0)
				{				
					$datos[1]["nombre"] =$resultado["PNOMBRE"];
					$datos[2]["yea"] =$resultado["YEA"];
					$datos[3]["genero"] =$resultado["GENERO"];
					$datos[4]["reparto"] =$resultado["REPARTO"];
					$datos[5]["sinopsis"] =$resultado["SINOPSIS"];
					$datos[6]["imagen"] =$resultado["IMAGEN"];
					
				
				
										
				}
			}							
            mysqli_close($conn); 		
      }    
                 
	   return $datos;
	}
	
	
	public function eliminarPeli($id){
	    $res;
	    $conn=mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart');
	    $res=mysqli_query($conn,"call spEliminarPeli($id);");
	    mysqli_free_result($res);
    	mysqli_close($conn);
    	return $res;
	}
	
	public function actualizarPeli($id, $nombre,$yea,$genero,$reparto,$sinopsis,$nombreImg){
	    $res= array();
	    $conn=mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart');
	  $recordSet=mysqli_query($conn,"call spActualizarPeli('$id','$nombre','$yea','$genero','$reparto','$sinopsis','$nombreImg');");
	     while($resultado = mysqli_fetch_array($recordSet)){
	         $res["UP"]=$resultado["UP"];
	     }
	    mysqli_free_result($recordSet);
    	mysqli_close($conn);
    	return $res;
	}
	
	
	
	 public function roles()
   {
       $datos=array();
       $reg=0;
       $conn=mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_Proyecto_MovieStart');	    
       $recordSet=mysqli_query($conn,"call spAreas();");
       	while($resultado = mysqli_fetch_assoc($recordSet)){
       	    
       	        $datos[$reg]["area"]=$resultado["AREA"];
       	    
                $datos[$reg]["ID"] =$resultado["ID"];
                
                $reg++;
       	}
       	mysqli_close($conn); 
       	return $datos;
       
   }

	

	
    
}

?>