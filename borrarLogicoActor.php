<?php

	$idP = $_GET['id'];

	$conexion = new mysqli("localhost","root","","peliculas");
	$consulta1 = "Select * from actor where idActor=".$idP;
	
	$result = $conexion->query($consulta1);
	$comprobacion = mysqli_num_rows($result);
			
			if ($comprobacion == 0){
				// redirigir
				header("Location: ./404.php");
				exit();
			}
			else{
				$consulta = "UPDATE actor set estatus=0 WHERE idActor=$idP";
				$conexion->query($consulta);
				echo "Actor eliminado correctamente";
				echo "<a href='actores.php'>Volver</a>";
			}
?>
