<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nuevo actor</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estiloCine1.css">
</head>
<body>
	<div class="container centrado">
		<h2 class="letraBlanca">Agregar un nuevo actor</h2>

		<form action="guardarActor.php" method="POST">
			<div class="row">

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-8">
					<input class="form-control" name="nombre" type="text" placeholder="Nombre del actor">
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-6">
					<input class="form-control" type="text" name="nacionalidad" placeholder="Nacionalidad">
				</div>

				<div class="col-lg-2">
					<input type="submit" class="btn btn-primary" value="Guardar">
				</div>


			</div>
			
			
		</form>
	</div>
</body>
</html>