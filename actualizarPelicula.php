<?php
	
	$idP = $_POST['idP'];
	$nombreP = $_POST['nombrePelicula'];
	$fecha = $_POST['fecha'];
	$nacionalidad = $_POST['nacionalidad'];
	$idioma = $_POST['idioma'];
	$color = $_POST['color'];
	$clasificacion = $_POST['clasificacion'];
	$sinopsis = $_POST['sinopsis'];

	//Servidor, usuario, contraseña, BD
	$conexion = new mysqli("localhost","root","", "peliculas");
	$consulta = "UPDATE pelicula SET 
				 nombrePelicula = '$nombreP',
				 fecha = '$fecha',
				 nacionalidad = '$nacionalidad',
				 idioma = '$idioma',
				 ColorPelicula = '$color',
				 Clasificacion = '$clasificacion',
				 sinopsis = '$sinopsis',
				 estatus = 1
				 WHERE idPelicula = $idP
				";
	//echo "Consulta: <br> " . $consulta;

	$conexion->query($consulta);

	echo "Datos actualizados";
	echo "<a href='peliculas.php'>Volver</a>"

?>