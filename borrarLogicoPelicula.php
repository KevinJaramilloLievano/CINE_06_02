<?php

	$idP = $_GET['id'];

	$conexion = new mysqli("localhost","root","","peliculas");
	$consulta1 = "Select * from pelicula where idPelicula=".$idP;
	
	$result = $conexion->query($consulta1);
	$comprobacion = mysqli_num_rows($result);
			
			if ($comprobacion == 0){
				// redirigir
				header("Location: ./404.php");
				exit();
			}
			else{
				$consulta = "UPDATE pelicula set estatus=0 WHERE idPelicula=$idP";
				$conexion->query($consulta);
				echo "Pelicula eliminada correctamente";
				echo "<a href='peliculas.php'>Volver</a>";
			}
?>