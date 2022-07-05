<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalle película</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estiloCine1.css">
</head>
<body>
	<div class="container centrado">
		<h2 class="letraBlanca">
			Detalle película
			<a href="peliculas.php" class="btn btn-info">Volver</a>
		</h2>

		<?php 
			$idPelicula = $_GET['id'];
			//echo "ID = ". $idPelicula;

			//Obtien las variables del archivo externo
			include('conexions.php');
			$conexion = new mysqli($serverName,$userName,$password, $dbName);
			$consulta = "Select * from pelicula where idPelicula=".$idPelicula;
			//echo "<br>Query: ".$consulta;

			$resultado = $conexion->query($consulta);
			/* Comprobamos si el id existe
				En caso de que exista se ejecutara norma;
				De lo contrario lo redirigira a error 404 
			*/
			$comprobacion = mysqli_num_rows($resultado);
			
			if ($comprobacion == 0){
				// redirigir
				header("Location: ./404.php");
				exit();
			} else {
				// Ejecutar
				require 'phpqrcode/qrlib.php';
				$dir = "temp/";

				if(!file_exists($dir))
					mkdir($dir);
			}
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
			      	echo "Pelicula: ".$row['idPelicula'];
			      	$filename = $dir.'pelicula_'.$row['idPelicula'].'.png';
					$tam = 10;
					$level = 'M';
					$frameSize = 3;
					$datos = "Pelicula ".$row['idPelicula']."\n".$row['nombrePelicula']."\n".$row['fecha']."\n".$row['nacionalidad']."\n".$row['idioma']."\n".$row['ColorPelicula']."\n".$row['Clasificacion']."\n".$row['sinopsis'];
					$contenido = $datos;

					QRcode::png($contenido, $filename, $level, $tam, $frameSize);

					echo '<img src="'.$filename.'" width="50%"/>'; 
			      ?>
			  </th>
		    </tr>
		  </thead>
		  <tbody>
		  		<tr>
			      <th scope="row">Nombre</th>
			      <td>
			      	<?PHP echo $row['nombrePelicula']; ?>
			      </td>  
			    </tr>

			    <tr>
			      <th scope="row">Fecha</th>
			      <td>
			      	<?PHP echo $row['fecha']; ?>
			      </td>  
			    </tr>

			    <tr>
			      <th scope="col">Nacionalidad</th>
			      <td>
			      	<?PHP echo $row['nacionalidad']; ?>
			      </td>
			    </tr>

			    <tr>
			      <th scope="row">Idioma</th>
			      <td>
			      	<?PHP echo $row['idioma']; ?>
			      </td>  
			    </tr>

			    <tr>
			      <th scope="row">Color</th>
			      <td>
			      	<?PHP echo $row['ColorPelicula']; ?>
			      </td>  
			    </tr>

			    <tr>
			      <th scope="row">Clasificación</th>
			      <td>
			      	<?PHP echo $row['Clasificacion']; ?>
			      </td>  
			    </tr>

			    <tr>
			      <th scope="row">Sinopsis</th>
			      <td>
			      	<?PHP echo $row['sinopsis']; ?>
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