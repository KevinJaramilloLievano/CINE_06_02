<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar datos del actor</title>
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
		<?php 
			while($row = $resultado->fetch_assoc())
			{			
		?>
		<h2 class="letraBlanca">Editar datos del actor: <?php echo $row['nombre'];?></h2>

		<form action="actualizarActor.php" method="POST">
			<div class="row">

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-8">
					<input class="form-control" name="nombre" type="text" placeholder="Nombre del actor" value="<?php echo $row['nombre'];?>">
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-8">
					<input class="form-control" type="text" name="nacionalidad" placeholder="Nacionalidad" value="<?php echo $row['nacionalidad'];?>">
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-8">
					<input class="form-control" type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $row['descripcion']?>">
				</div>
				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-3">

					<input type="hidden" name="idA" value="<?php echo $row['idActor'];?>">

					<input type="submit" class="btn btn-warning" value="Actualizar">
				</div>


			</div>
			
			
		</form>
	</div>
	<?php }?>
</body>
</html>