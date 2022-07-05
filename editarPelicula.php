<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar pelicula</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estiloCine1.css">
</head>
<body>
	<div class="container centrado">
		<?php
			$idPelicula = $_GET['id'];

			$conexion = new mysqli("localhost","root","","peliculas");
			$consulta = "Select * from pelicula where idPelicula=".$idPelicula;

			$resultado = $conexion->query($consulta);
			$comprobacion = mysqli_num_rows($resultado);
			
			if ($comprobacion == 0){
				// redirigir
				header("Location: ./404.php");
				exit();
			}
		?>
		<?php 
			while($row = $resultado->fetch_assoc())
			{			
		?>
		<h2 class="letraBlanca">Editar pelicula: <?php echo $row['nombrePelicula'];?></h2>

		<form action="actualizarPelicula.php" method="POST">
			<div class="row">

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-8">
					<input class="form-control" name="nombrePelicula" type="text" placeholder="Nombre de la pelicula" value="<?php echo $row['nombrePelicula'];?>">
				</div>
				<div class="col-lg-4">
					<input class="form-control" type="date" name="fecha" id="fecha" value="<?php echo $row['fecha'];?>">		
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-6">
					<input class="form-control" type="text" name="nacionalidad" placeholder="Nacionalidad" value="<?php echo $row['nacionalidad'];?>">
				</div>
				<div class="col-lg-3">
					<input class="form-control" type="text" name="idioma" placeholder="Idioma" value="<?php echo $row['idioma'];?>">
				</div>
				<div class="col-lg-3">
					<input class="form-control" type="text" name="color" placeholder="Color" value="<?php echo $row['ColorPelicula'];?>">
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-4">
					<input type="text" class="form-control" name="clasificacion" placeholder="Clasificacion" value="<?php echo $row['Clasificacion'];?>">
				</div>

				<div class="col-lg-8">
					<textarea class="form-control" name="sinopsis" placeholder="Sinopsis" rows="3" ><?php echo $row['sinopsis'];?>
					</textarea>
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-9">
					
				</div>

				<div class="col-lg-3">

					<input type="hidden" name="idP" value="<?php echo $row['idPelicula'];?>">

					<input type="submit" class="btn btn-warning" value="Actualizar">
				</div>


			</div>
			
			
		</form>
	</div>
	<?php }?>
</body>
</html>