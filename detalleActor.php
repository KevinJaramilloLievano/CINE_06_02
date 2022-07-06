<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalle de actores</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estiloCine1.css">
</head>
<body>
	<div class="container centrado">
		<h2 class="letraBlanca">
			Detalle de actores
			<a href="actores.php" class="btn btn-info">Volver</a>
		</h2>

		<?php 
			$idActor = $_GET['id'];
			//echo "ID = ". $idPelicula;

			$conexion = new mysqli("localhost","root","","peliculas");
			$consulta = "Select * from actor where idActor=".$idActor;

			//echo "<br>Query: ".$consulta;

			$resultado = $conexion->query($consulta);
			require 'phpqrcode/qrlib.php';
			$dir = "temp/";

			if(!file_exists($dir))
				mkdir($dir);
		?>

		<table class="table table-dark table-striped table-hover">
		<?PHP
	  	//Ciclo para recorrer el objeto y sus datos
		while($row = $resultado->fetch_assoc())
		{
		  	?>
		  <thead>
		    <tr>
		      <th scope="row">
			      <?PHP 
			      	echo "Actor: ".$row['idActor'];
			      	$filename = $dir.'pelicula_'.$row['idActor'].'.png';
					$tam = 10;
					$level = 'M';
					$frameSize = 3;
					$datos = "Actor ".$row['idActor']."\n".$row['nombre']."\n".$row['nacionalidad'];
					$contenido = $datos;

					QRcode::png($contenido, $filename, $level, $tam, $frameSize);

					echo '<img src="'.$filename.'" width="50%"/>'; 
			      ?>
			  </th>
		    </tr>
		  </thead>
		  <tbody>
		  		<tr>
			      <th scope="row">Nombre del actor</th>
			      <td>
			      	<?PHP echo $row['nombre']; ?>
			      </td>  
			    </tr>

			    <tr>
			      <th scope="col">Nacionalidad</th>
			      <td>
			      	<?PHP echo $row['nacionalidad']; ?>
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