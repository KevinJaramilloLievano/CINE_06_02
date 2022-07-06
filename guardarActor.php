<?PHP
	error_reporting(0);

		$idA = $_POST["idActor"];
		$nombreP = $_POST["nombre"];
		$nac = $_POST["nacionalidad"];
	
		$conexion = new mysqli("localhost","root","","peliculas");
		$consulta = "INSERT INTO actor (idActor, nombre, nacionalidad) 
		VALUES ('$idA','$nombreP', '$nac')";

		$ejecutar = mysqli_query($conexion,$consulta);


		echo "Registro correcto <br>";
		echo "<a href='actores.php'>Volver</a>"	 
?>