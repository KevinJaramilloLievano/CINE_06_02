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



<?php

	$idP = $_GET['id'];

	$conexion = new mysqli("localhost","root","","peliculas");
	$consulta1 = "Select * from actor where idActor=".$idP;
	
	$result = $conexion->query($consulta1);
	$comprobacion = mysqli_num_rows($result);
			
			if ($comprobacion == 1){
				$consulta = "UPDATE actor set estatus=1 WHERE idActor=$idP";
				$conexion->query($consulta);?>
				<div>
				  <div class="text-center">
  					<img src="https://yt3.ggpht.com/ytc/AKedOLSH9dSUfA6dkIHo3uUXvWEG0cFvuFqHKTUymHwQ=s900-c-k-c0x00ffffff-no-rj" class="rounded" alt="...">
				  
				<h1 class=letraBlanca> Actor restablecido correctamente</h1> <br>";
				<button type="button" class="btn btn-primary btn-lg"><a href='actores.php'>Volver</a></button>";
				<button type="button" class="btn btn-primary btn-lg"><a href='index.php'>Home</a></button>";
				</div>
				</div>
				<?php	
			}
			else{
				
                // redirigir
				header("Location: ./404.php");
				exit();
			}?>
