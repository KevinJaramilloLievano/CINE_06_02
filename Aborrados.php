<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actores</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estiloCine1.css">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
	<style>
		a{
			color: white;
		}
	</style>
</head>

<header>
	<nav class="navbar navbar-expand-lg bg-dark">
		<div class="container-fluid">
			<h2 class="letraBlanca">Lista de Actores Eliminados. </h2> 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="index.php">Home</a>
				</li>
				<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="peliculas.php">Peliculas</a>
				</li>
				<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#">Directores</a>
				</li>
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="peliculas.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Actores
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="actores.php">Home actores</a></li>
					<li><a class="dropdown-item" href="nuevoActor.php">Agregar</a></li>
					<li><a class="dropdown-item" href="reporteActor.php">Generar reporte</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="respaldoGeneralActor.php">Respaldo general</a></li>
				</ul>
			</ul>
			</div>
		</div>
	</nav>
	<br>
</header>

<body>
		
		<?PHP 
			//variable que conecta con mysql
			//parámetros: servidor, usuario, contraseña, BD
			$conexion = new mysqli("localhost", "root", "", "peliculas");
			//Estructura para obtener todos los registros de la tabla actor
			$consulta = "SELECT * FROM actor WHERE estatus=0";
			//Variable que guarda el resultado del query
			$resultado = $conexion->query($consulta);

			require 'phpqrcode/qrlib.php';
			$dir = "temp/";

			if(!file_exists($dir))
				mkdir($dir);
		?>
			
		<table class="table table-dark table-striped table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nombre del actor</th>
		      <th scope="col">Nacionalidad</th>
		      <th scope="col">Detalle</th>
		      <th scope="col">Editar</th>
			  <th scope="col">Restablecer actor</th>
			  <th scope="col">Borrado físico</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?PHP
		  	//Ciclo para recorrer el objeto y sus datos
			while($row = $resultado->fetch_assoc())
			{
				$filename = $dir.'pelicula_'.$row['idActor'].'.png';
				$tam = 10;
				$level = 'M';
				$frameSize = 3;
				$datos = "Actor".$row['idActor']."\n".$row['nombre']."\n".$row['nacionalidad'];
				$contenido = $datos;

				QRcode::png($contenido, $filename, $level, $tam, $frameSize);

				
			  	?>
			    <tr>
			      <th scope="row">
			      	<?PHP echo $row['idActor']; ?>
			      </th>
			      <td>
			      	<?PHP echo $row['nombre']; ?>

			      </td>
			      <td>
			      	<?PHP echo $row['nacionalidad']; ?>
			      </td>
			      <td>
			      	<a href="detalleActor.php?id=<?php echo $row['idActor'];?>">
					  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-columns-reverse" viewBox="0 0 16 16">
  					  <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 0 .5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10A.5.5 0 0 1 4 .5Zm-4 2A.5.5 0 0 1 .5 2h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 4h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 6h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2A.5.5 0 0 1 .5 8h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1h-10a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm-4 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm4 0a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Z"/>
					  </svg>
			      	</a>
			      </td>

			      <td>
			      	<a href="editarActor.php?id=<?php echo $row['idActor'];?>">
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>
			      	</a>
			      </td>

			      <td>
			      	<a href="Retlogico.php?id=<?php echo $row['idActor'];?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
						<path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
						<path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
						<path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z"/>
						</svg>	
			      	</a>
			      </td>

			      <td>
			      	<a href="borrarFisicoActor.php?id=<?php echo $row['idActor'];?>">
					  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
  					  <path d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z"/>
					  </svg>
			      	</a>	
			      </td>
			    </tr>
			    <?PHP
			}
			?>
		  </tbody>
		</table>
	</div>
</body>
</html>