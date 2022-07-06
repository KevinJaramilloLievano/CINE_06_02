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
			$idActor = $_GET['id'];

			$conexion = new mysqli("localhost","root","","peliculas");
			$consulta = "Select * from actor where idActor=".$idActor;

			$resultado = $conexion->query($consulta);
		?>

		<h2 class="letraBlanca">
			<?php 
			while($row = $resultado->fetch_assoc())
			{
				echo "El actor eliminado es:<br>".$row['nombre'];
			}
			?>

			<?php
				$consultaBorrar = "Delete from actor where idActor=".$idActor;
				//echo "Consulta: ".$consultaBorrar;
				$conexion->query($consultaBorrar);
			?>
			<br>
			<a href="actores.php" class="btn btn-info">Volver</a>
		</h2>

		
		
	</div>
</body>
</html>