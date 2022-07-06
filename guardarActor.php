<?PHP
		$nombreP = $_POST["nombre"];
		$nac = $_POST["nacionalidad"];
		$des = $_POST['descripcion'];
	
		$conexion = new mysqli("localhost","root","","peliculas");
		$consulta = "INSERT INTO actor (idActor, nombre, nacionalidad, descripcion , estatus) 
		VALUES (null,'$nombreP', '$nac','$des', 1)";

		$ejecutar = mysqli_query($conexion,$consulta);


		echo "Registro correcto <br>";
		echo "<a href='actores.php'>Volver</a>"	 
?>