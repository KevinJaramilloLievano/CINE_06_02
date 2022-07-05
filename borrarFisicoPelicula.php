<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Borrar físico</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estiloCine1.css">
</head>
<body>
	<div class="container centrado">
		<?php 
			$idPelicula = $_GET['id'];

			//Obtien las variables del archivo externo
			include('conexions.php');
			$conexion = new mysqli($serverName,$userName,$password, $dbName);
			$consulta = "Select * from pelicula where idPelicula=".$idPelicula;

			$resultado = $conexion->query($consulta);
			$comprobacion = mysqli_num_rows($resultado);
			
			if ($comprobacion == 0){
				// redirigir
				header("Location: ./404.php");
				exit();
			}
		?>

		<h2 class="letraBlanca">
			<?php 
			while($row = $resultado->fetch_assoc())
			{
				echo "Eliminada:<br>".$row['nombrePelicula'];
			}
			?>

			<?php
				$consultaBorrar = "Delete from pelicula where idPelicula=".$idPelicula;
				//echo "Consulta: ".$consultaBorrar;
				$conexion->query($consultaBorrar);
			?>
			<br>
			<a href="peliculas.php" class="btn btn-info">Volver</a>
		</h2>

		
		
	</div>
</body>
</html>