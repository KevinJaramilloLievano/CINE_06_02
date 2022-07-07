<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ACERCA DE</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estiloCine1.css">
	<style>
		a{
			color: white;
		}
	</style>
</head>
<body>

<ul class="menu">
		<li><a href="index.php">Inicio</a></li>
		<li><a href="peliculas.php">Peliculas</a></li>
		<li><a href="actores.php">Actores</a></li>
		<li><a href="directores.php">Directores</a></li>
        <li><a href="acerca de.php">Acerca de</a></li>
	</ul>

	<div class="miniespacio">
		<br><br><br><br>
	</div>
	<div class="container">
		<h2 class="letraBlanca">
			Lista del Grupo
			<br>
			<a href="index.php" class="btn btn-info">Volver</a>
		</h2>

		<?PHP 
			//variable que conecta con mysql
			//parámetros: servidor, usuario, contraseña, BD
			$conexion = new mysqli("localhost", "root", "", "peliculas");
			//Estructura para obtener todos los registros de la tabla actor
			$consulta = "SELECT * idAlumno, Nombre, Apellido, Apodo FROM acerca de WHERE estatus=1";
			//Variable que guarda el resultado del query
			$resultado = $conexion->query($consulta);

			require 'phpqrcode/qrlib.php';
			$dir = "temp/";

			if(!file_exists($dir))
				mkdir($dir);
		?>

        <table class="table table-purple table-striped table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nombre de Alumno</th>
		      <th scope="col">Apellido de Alumno</th>
		      <th scope="col">Apodo de Alumno</th>
		      <th scope="col">Sección de Trabajo</th>
		    </tr>
		  </thead>
		  <tbody>

          <?PHP 
			$enumeracion = 1;
			$acercade = 0; 
			while($acercade) 
            {
                ?>
			    <tr>
			      <th scope="acercade">
			      	<?PHP echo $enumeracion;
					$enumeracion++;
					?>
			      </th>
                  <tr id="<?php echo $acercade['idAlumno']; ?>">
                  <td><?php echo $acercade['idAlumno']; ?></td>
                  <td><?php echo $acercade['Nombre']; ?></td>
                  <td><?php echo $acercade['Apellido']; ?></td>
                  <td><?php echo $acercade['Apodo']; ?></td> 
                  <td><?php echo $acercade['Sección de Trabajo']; ?></td> 
			    </tr>
			    <?PHP
			}
			?>
		  </tbody>
		</table>
	</div>
</body>
</html>
