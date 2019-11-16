<!DOCTYPE html>
<?php
    if( !$conn = mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_agus_mascotas') ){
    $estado = "0";
    }
    else{
        if(
            $_POST["txtNombre"]!="" &&
            $_POST["txtTipo"]!="" &&
            $_POST["txtClasificacion"]
            ){
                $nombre=htmlspecialchars($_POST['txtNombre']);
                $tipo=htmlspecialchars($_POST['txtTipo']);
                $clasificacion=htmlspecialchars($_POST['txtClasificacion']);
                $senInsert=mysqli_query($conn,"INSERT INTO `mascotas` VALUES (null,'".$nombre."','".$tipo."','".$clasificacion."')") or die(mysqli_error($conn));
                if($sendInsert){
                echo "<script language='javascript'>alert('No se registro.');</script>";
                }else{
                echo "<script language='javascript'>alert('Registrado Correctamente .');</script>";
                }
            }
    }
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
	<title></title>
	<meta name="viewport" content="width=divece-widht, user-scalable=no, initial-scalable, initial-scalable=1.0, maximum-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/cards.css">
	<link rel="stylesheet" href="css/foot.css">
	<link rel="stylesheet" href="css/form.css">
</head>
<body>
	<header>
		
		
		<input type="checkbox" name="" id="btn-menu">
		<label for="btn-menu"><img src="img/menu.png" class="menuresponsive"></label>

		<nav class="menu">
			<ul>
				<li><a href="">Inicio</a></li>
				
				<li><a href="">Consultar Animales</a></li>				
			</ul>
			
		</nav>


	</header>
<div class="formContenedor">
	<form method="POST">
    		<div >
			    <label>Nombre: </label>
			    <input type="text" name="txtNombre" class="form-control" placeholder="Nombre">
			</div>
			<div >
			    <label>Tipo: </label>
			    <select class="form-control" name="txtTipo">
			      <option value="Perro">Perro</option>
			      <option value="Gato">Gato</option>
			      <option value="Conejo">Conejo</option>
			      <option value="Caballo">Caballo</option>
			    </select>
		    </div>
    		<div >
			    <label>Clasificaci¨®n: </label>
			    <select class="form-control" name="txtClasificacion">
			      <option value="Hervivoro">Hervivoro</option>
			      <option value="Carnivoro">Carnivoro</option>
			      <option value="Omnivoro">Omnivoro</option>
			    </select>
		    </div>
		    <button type="submit" class="btn">Registrar</button>
		    
    	</form>
    	<button class="btn"><a href="mostrar.php">Consultar Mascotas.</a></button>
    	</div>
	
	
	
	
	
	
	


<br>
<br>






	<footer>
		<ul class="footcarta">
			<li class="itemsfoot">
				<h2>Quienes somos</h2>
				<div>Quienes somos</div>
				<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam ad veniam amet architecto ea. Ea asperiores praesentium porro, itaque, ex accusamus fuga dolore laboriosam voluptas nihil aut earum quis necessitatibus.</p>
			</li>
			<li class="itemsfoot tapar">
				<h2>Acerca de Nosotros</h2>
				<div>Acerca de Nosotros</div>
				<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam ad veniam amet architecto ea. Ea asperiores praesentium porro, itaque, ex accusamus fuga dolore laboriosam voluptas nihil aut earum quis necessitatibus.</p>
			</li>
			<li class="itemsfoot">
				<h2>Encabezado</h2>
				<div>Contactanos</div>
				<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam ad veniam amet architecto ea. Ea asperiores praesentium porro, itaque, ex accusamus fuga dolore laboriosam voluptas nihil aut earum quis necessitatibus.</p>
			</li>
		</ul>
	</footer>





</body>
</html>