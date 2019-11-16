
  
  
<?php
$estado = "";

if (isset($_GET['id'])) {
        $estado = "1";
        $id=$_GET['id'];
     $cliente=new SoapClient(null, array(
    'uri' => 'http://citymovie.weare8lions.com.mx/',
    'location' =>  'http://citymovie.weare8lions.com.mx/citymovieWS/wsarticulo.php','utf8'
     )  
    );
        $datosPag=$cliente->SelArti($id);
    if (isset($_POST['actualizar'])) {
        echo "entre";
        if(!empty($_POST['txtID'] && $_POST['txtNombre'] && 
           $_POST['txtYear'] && $_POST['txtGenero'] &&
           $_POST['txtFecha']&& $_FILES['imagen']['name']))
        {
            echo "entre a la parte 2";
          	$id=htmlspecialchars($_POST['txtID']);
            $nombre=htmlspecialchars($_POST['txtNombre']);         
            $yea=htmlspecialchars($_POST['txtYear']);
            $genero=htmlspecialchars($_POST['txtGenero']);
            $reparto=htmlspecialchars($_POST['txtReparto']);
            $sinopsis=htmlspecialchars($_POST['txtSinopsis']);
            $nombreImg = "imagen".date("dHis").".". pathinfo($_FILES['imagen']['name'],PATHINFO_EXTENSION);
			$archivo = $_FILES['imagen']['tmp_name'];
				//ruta del destino del servidor
            $carpeta = "paginas/imgUp/";
    
        //mover imagen a directorio temporal

        move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombreImg);
            	
          
            $datosUpd= $cliente->actualizarPeli($id, $nombre,$yea,$genero,$reparto,$sinopsis,$nombreImg);
           
            
           
            if((int)$datosUpd[0]["ID"]!=0){
	      
	      echo "<script language='javascript'>alert('Los datos no se pudieron Actualizar');</script>";
	  
	            }
	    else
	            {
	                $mensaje="La pelicula " .$nombre." fueron se le modificaron algunos valores " ;    
	            echo "<script language='javascript'>alert('.$mensaje.');document.location.href='?op=paginar';</script>";
	      
	            }

        }
          
}
    elseif (isset($_POST['eliminar'])) {
    if($id!=0){
    $queryResult=$cliente->eliminarPeli($id);
            if((int)$queryResult[0]["ID"]!=0){
	      
	      echo "<script language='javascript'>alert('El registro no se pudo eliminar');</script>";
	  
	            }
	    else
	            {
	                $mensaje="La pelicula con numero de ID =  " .$nombre." y nombre de imagen " .$nombreImg." Fue eliminada exitosamente";    
	            echo "<script language='javascript'>alert('.$mensaje.');document.location.href='?op=paginar';</script>";
	      
	            }
    
    
    }
} 
}
?>

<body>
	<h1 style='text-align: center; padding-top:50px;'>Detalle Articulo 

	</h1>
	

		<form action=" " method="post"  id="contact_form" enctype="multipart/form-data">
			
				<?php
                  if($estado !="0"){
                        $articulo =$datosPag["articulo"];
                        echo "<div>";		        
                	
                		echo "<div><input readonly='readonly' type='text' name='txtID' value='".$datosPag["id"]."'/></div>";
                		echo "<div><input  type='text' name='txtNombre' value='".$datosPag["nombre"]."'/></div>";
                		echo "<div><input  type='text' name='txtYear' value='".$datosPag["yea"]."'/></div>";
                		echo "<div><input  type='number' name='txtGenero' value='".$datosPag["genero"]."'/></div>"; 
                		echo "<div><input  type='text' name='txtReparto' value='".$datosPag["reparto"]."'/></div>"; 
                		echo "<div><input  type='text' name='txtSinopsis' value='".$datosPag["sinopsis"]."'/></div>"; 
                		echo "<div><input readonly='readonly' type='text' name='txtFecha' value='".$datosPag["fecha"]."'/></div>"; 
                			$imagen2='paginas/imgUp/'.$datosPag['imagen'];
						
                		
                		echo "<input style='width 80px; heigth: 80px;'type='image' src='$imagen2' />";

                		echo "<div><input type='file' name='imagen' value='".$datosPag[$imagen]."'/></div>"; 
                		
                		echo "</div>";
                  }
                ?>
               <div>
                   <button type="submit" name="actualizar" class="btn btn-warning" >Actualizar</button>
               </div>
               <div>
                   
                   <button type="submit" name="eliminar" class="btn btn-warning" >Eliminar</button>
               </div>
                    
              

		</form>

</body>