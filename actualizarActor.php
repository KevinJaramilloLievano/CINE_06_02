<?php

		$idA = $_POST['idA'];
		$nombreA = $_POST['nombre'];
		$nacionalidad = $_POST['nacionalidad'];

		//Servidor, usuario, contraseña, BD
		$conexion = new mysqli("localhost","root","","peliculas");
		$consulta = "UPDATE actor SET 
					 nombre = '$nombreA',
					 nacionalidad = '$nacionalidad'
					 WHERE idActor = $idA
					 ";

		//echo "Consulta: <br> " . $consulta;
		$conexion->query($consulta);

	echo "Datos actualizados";
	echo "<a href='actores.php'>Volver</a>"

?>