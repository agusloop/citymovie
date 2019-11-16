<!DOCTYPE html>
<?php
$estado = "";
if( !$conn = mysqli_connect('localhost', 'wearelio_Agustin', 'agustin2705', 'wearelio_agus_mascotas') ){
    $estado = "0";
}
else{
    $estado = "1";
	  $recordMascotas=mysqli_query($conn,"SELECT * from `mascotas` ORDER BY mas_id");
      }
?>

<!DOCTYPE html>
<html>
<head>
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
				<li><a href="">Compra</a></li>
				<li><a href="">Consultar Carros</a></li>				
			</ul>
			
		</nav>


	</header>

			
<h1 class="text-center">Consulta de mascotas.</h1>
    <div class="contenedor">
       
            <?php
            if($estado!="0")
                  {	  
                      while($registro = mysqli_fetch_array($recordMascotas)){

                       
                       echo "<ul class='carta'>";
                       echo "<li class='items'>";
                       echo "<div class='producto'>";
                       echo "<div class='contenido'>";
                       echo "<h5>Nombre: $registro[1]</h5>";
                       echo "<h5>Tipo: $registro[1]</h5>";
                       echo "<h5>Clase: $registro[1]</h5>";
                       echo "</div>";
                       echo "</div>";
                       
                       
                       echo "</li>";
                       echo "</ul>";

                       echo "<br><br>";
                      }    
                      mysqli_free_result($recordMascotas);  	  
                  }
                ?>
        
        <div>
        <button class="btn"><a href="index.php">Inicio.</a></button>
        </div>
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