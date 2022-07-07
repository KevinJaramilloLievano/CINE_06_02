<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estiloCine1.css">
	<style>
		a{
			color: white;
		}
	</style>

	<!-- modificacion de estilo para la barra de busqueda en la tabla -->
	<style> 
		input{width: 1300px}
	</style>


</head>
<body>

<ul class="menu">
		<li><a href="index.php"><img src="Icons/home.png" width="35" height="35" alt="Home"></a></li>
		<li><a href="peliculas.php">Peliculas</a></li>
		<li><a href="actores.php">Actores</a></li>
		<li><a href="´directores.php">Directores</a></li>
        <li><a href="acerca de.php">Acerca de</a></li>
	</ul>

	<div class="miniespacio">
		<br><br><br><br>
	</div>
	<div class="container">
		<h2 class="letraBlanca">
			Lista de películas
			<br>
			<a href="index.php" class="btn btn-info"><img src="Icons/return.png" width="35" height="35" alt="Return"></a>
			<a href="nuevaPelicula.php" class="btn btn-success">+Agregar</a>
			<a href="reportePeliculas.php" class="btn btn-secondary">Generar reporte</a>
			<a href="respaldoGeneral.php" class="btn btn-warning">Respaldo general</a>
		</h2>
		
		<?PHP 
			//Obtien las variables del archivo externo
			include('conexions.php');
			//variable que conecta con mysql
			//parámetros: servidor, usuario, contraseña, BD
			$conexion = new mysqli($serverName,$userName,$password,$dbName);	
			//Estructura para obtener todos los registros de la tabla actor
			$consulta = "SELECT * FROM pelicula WHERE estatus=1";
			//Variable que guarda el resultado del query
			$resultado = $conexion->query($consulta);

			require 'phpqrcode/qrlib.php';
			$dir = "temp/";

			if(!file_exists($dir))
				mkdir($dir);
		?>
			

		<!-- creacion de funcion para buscar en tabla, infobuscar id de la funcion y tabla id de la tabla -->
			<input type="text" id="infobuscar" onkeyup="buscar()" placeholder="Buscar en la tabla">
		<!-- se le añade una id a la tabla para poder realizar la busqueda -->			
		<table id="tabla" class="table table-dark table-striped table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nombre pelicula</th>
		      <th scope="col">Nacionalidad</th>
		      <th scope="col">Detalle</th>
		      <th scope="col">Editar</th>
			  <th scope="col">Borrado lógico</th>
			  <th scope="col">Borrado físico</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?PHP
		  	//Ciclo para recorrer el objeto y sus datos
			$enumeracion = 1;
			while($row = $resultado->fetch_assoc())
			{
				$filename = $dir.'pelicula_'.$row['idPelicula'].'.png';
				$tam = 10;
				$level = 'M';
				$frameSize = 3;
				$datos = "Pelicula ".$row['idPelicula']."\n".$row['nombrePelicula']."\n".$row['fecha']."\n".$row['nacionalidad']."\n".$row['idioma']."\n".$row['ColorPelicula']."\n".$row['Clasificacion']."\n".$row['sinopsis'];
				$contenido = $datos;

				QRcode::png($contenido, $filename, $level, $tam, $frameSize);

				
			  	?>
			    <tr>
			      <th scope="row">
			      	<?PHP echo $enumeracion;
					$enumeracion++;
					?>
			      </th>
			      <td>
			      	<?PHP echo $row['nombrePelicula']; ?>

			      </td>
			      <td>
			      	<?PHP echo $row['nacionalidad']; ?>
			      </td>
			      <td>
			      	<a href="detallePelicula.php?id=<?php echo $row['idPelicula'];?>">
			      	  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
					  <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4zm2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547zM14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
					</svg>
			      	</a>
			      </td>

			      <td>
			      	<a href="editarPelicula.php?id=<?php echo $row['idPelicula'];?>">
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>
			      	</a>
			      </td>

			      <td>
			      	<a href="borrarLogicoPelicula.php?id=<?php echo $row['idPelicula'];?>"> <button type='button' class='btn btn-danger'onclick="return confirmdelete()" >Borrar</button>
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
						<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
						<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
						</svg>
			      	</a>
			      </td>

			      <td>
			      	<a href="borrarFisicoPelicula.php?id=<?php echo $row['idPelicula'];?>">
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-snapchat" viewBox="0 0 16 16">
						  <path d="M15.98 11.93c-.068-.232-.405-.395-.405-.395l-.082-.044a6.462 6.462 0 0 1-1.466-.96 5.028 5.028 0 0 1-.85-.966 3.775 3.775 0 0 1-.47-.966c-.03-.126-.027-.173 0-.238a.36.36 0 0 1 .116-.13c.187-.132.49-.33.677-.448.16-.106.3-.194.381-.252.262-.184.439-.367.544-.568a.987.987 0 0 0 .048-.827c-.143-.377-.497-.605-.946-.605-.098 0-.204.01-.306.034a4.325 4.325 0 0 0-.707.228c-.014.007-.03-.007-.03-.02.02-.507.043-1.188-.011-1.834-.051-.585-.17-1.078-.368-1.507a4.053 4.053 0 0 0-.656-.983 3.989 3.989 0 0 0-1.037-.833C9.697.207 8.88 0 7.992 0c-.888 0-1.7.207-2.419.616a4.043 4.043 0 0 0-1.037.833c-.2.231-.46.551-.656.983-.198.429-.317.922-.368 1.507-.054.65-.034 1.276-.01 1.833 0 .017-.017.028-.03.02a5.195 5.195 0 0 0-.705-.227 1.34 1.34 0 0 0-.306-.034c-.449 0-.803.228-.946.605a.975.975 0 0 0 .048.827c.105.2.286.388.544.568.082.058.218.146.381.252.18.119.476.31.664.442a.434.434 0 0 1 .129.14c.027.068.03.115-.004.248-.057.194-.19.54-.466.956a4.99 4.99 0 0 1-.85.966 6.468 6.468 0 0 1-1.456.959c-.027.014-.058.027-.092.047 0 0-.333.17-.394.388-.092.323.153.626.405.79.411.265.915.408 1.204.486.081.02.153.04.22.061a.457.457 0 0 1 .191.112c.058.072.065.164.085.266.03.17.102.38.313.527.232.16.527.17.898.187.391.014.878.034 1.432.218.259.085.49.228.762.394.565.347 1.266.78 2.466.78 1.201 0 1.909-.436 2.477-.783.268-.163.5-.306.752-.391.554-.184 1.04-.2 1.432-.218.374-.014.666-.024.898-.187.224-.156.292-.388.32-.565.016-.085.027-.163.078-.228.04-.054.139-.091.183-.108l.228-.065c.293-.078.657-.17 1.099-.422.537-.3.575-.67.517-.854z"/>
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


<!-- funcion para llamar al metodo de busqueda -->
<script>
	function buscar() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("infobuscar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<script type="text/javascript">
		function confirmdelete(){

			var respuesta = confirm("esta seguro que desea eliminar");
			if (respuesta == true){
              
				
				return true;
			}
			else{
				return false;
			}
		}
		
		</script>
	
</body>
</html>