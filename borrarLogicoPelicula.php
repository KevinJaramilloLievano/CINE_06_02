<!DOCTYPE html>
<html>
    <head>
<?php

	$idP = $_GET['id'];

	//Obtien las variables del archivo externo
	include('conexions.php');
	$conexion = new mysqli($serverName,$userName,$password, $dbName);
	$consulta1 = "Select * from pelicula where idPelicula=".$idP;
	
	$result = $conexion->query($consulta1);
	$comprobacion = mysqli_num_rows($result);
			
			if ($comprobacion == 0){
				// redirigir
				header("Location: ./404.php");
				exit();
			}
			else{
				$consulta = "UPDATE pelicula set estatus=0 WHERE idPelicula=$idP";
				$conexion->query($consulta);
				echo"<script>alert('eliminado');</script>";
			}
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