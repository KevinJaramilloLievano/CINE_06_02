<!DOCTYPE html>
<html>
    <head>
<?php
	
	$idP = $_POST['idP'];
	$nombreP = $_POST['nombrePelicula'];
	$fecha = $_POST['fecha'];
	$nacionalidad = $_POST['nacionalidad'];
	$idioma = $_POST['idioma'];
	$color = $_POST['color'];
	$clasificacion = $_POST['clasificacion'];
	$sinopsis = $_POST['sinopsis'];

	//Servidor, usuario, contraseña, BD
	
	//Obtien las variables del archivo externo
	include('conexions.php');
	$conexion = new mysqli($serverName,$userName,$password, $dbName);
	$consulta = "UPDATE pelicula SET 
				 nombrePelicula = '$nombreP',
				 fecha = '$fecha',
				 nacionalidad = '$nacionalidad',
				 idioma = '$idioma',
				 ColorPelicula = '$color',
				 Clasificacion = '$clasificacion',
				 sinopsis = '$sinopsis',
				 estatus = 1
				 WHERE idPelicula = $idP
				";
	//echo "Consulta: <br> " . $consulta;

	$conexion->query($consulta);

	echo"<script>alert('actualizado');</script>";

?>
<script type="text/javascript">
        function redirect() {
            window.location = "peliculas.php";
        }
        window.onload = redirect;
        </script>
</head>
    <body>
    
    </body>
</html>