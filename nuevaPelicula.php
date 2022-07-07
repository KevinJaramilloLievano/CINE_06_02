<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nueva pelicula</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estiloCine1.css">
</head>
<script type="text/javascript">
	function Validacion()
	{
		var Confirmacion = confirm("estas seguro de que los datos son correctos?");
		if (Confirmacion==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
<body>
	<div class="container centrado">
		<h2 class="letraBlanca">Agregar nueva pelicula</h2>

		<form action="guardarPelicula.php" method="POST">
			<div class="row">

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-8">
					<input class="form-control" name="nombrePelicula" type="text" placeholder="Nombre de la pelicula">
				</div>
				<div class="col-lg-4">
					<input class="form-control" type="date" name="fecha">		
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-6">
					<input class="form-control" type="text" name="nacionalidad" placeholder="Nacionalidad">
				</div>
				<div class="col-lg-3">
					<input class="form-control" type="text" name="idioma" placeholder="Idioma">
				</div>
				<div class="col-lg-3">
					<input class="form-control" type="text" name="color" placeholder="Color">
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-4">
					<input type="text" class="form-control" name="clasificacion" placeholder="Clasificacion">
				</div>

				<div class="col-lg-8">
					<textarea class="form-control" name="sinopsis" placeholder="Sinopsis" rows="3"></textarea>
				</div>

				<div class="col-lg-12">
					<br>
				</div>

				<div class="col-lg-10">
					
				</div>

				<div class="col-lg-2">
					<input type="submit" class="btn btn-primary" onclick ="return Validacion()" value="Guardar">
				</div>


			</div>
			
			
		</form>
	</div>
</body>
</html>