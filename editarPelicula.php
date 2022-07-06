<!DOCTYPE html>
<html>
<head>



	<meta charset="utf-8">

	<title>Editar pelicula</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,800;1,800&family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/editarPelicula.css">
	<script src="https://kit.fontawesome.com/bc44533dc2.js" crossorigin="anonymous"></script>


</head>
<body>


	<header class="header">
	  <div class="container">
	  
			<div class="logo">
				  <h1>Cinema UPP</h1>
			</div>
           <nav class="menu">
                <a href="#"> Inicio </a>
				<a href="#"> Servicios </a>
                <a href="#"> Blog </a>
                <a href="#"> Contacto </a>
			</nav>
	  </div>
	</header>


	<div class="container centrado">
		<?php
			$idPelicula = $_GET['id'];

			//Obtien las variables del archivo externo
			include('conexions.php');
			$conexion = new mysqli($serverName,$userName,$password, $dbName);
			$consulta = "Select * from pelicula where idPelicula=".$idPelicula;

			$resultado = $conexion->query($consulta);
			$comprobacion = mysqli_num_rows($resultado);
			
			if ($comprobacion == 0){
				// redirigir
				header("Location: ./404.php");
				exit();
			}
		?>
		<?php 
			while($row = $resultado->fetch_assoc())
			{			
		?>
		
		<div class="col-lg-12">
					<br><br><br><br>
		</div>



		<h2 class="letraBlanca">Editar pelicula:</h2>
		<h2 class="nomID"> <?php echo $row['nombrePelicula'];?> </h2>

		<form action="actualizarPelicula.php" method="POST">
			<div class="row">


				<div class="col-lg-12">
					<br>
				</div>


				<div class="col-lg-5">
					<label class="info">Nombre de la Pelicula</label>
					<input class="form-control" name="nombrePelicula" type="text" placeholder="Nombre de la pelicula" value="<?php echo $row['nombrePelicula'];?>">
					<br>
				</div>

		
				<div class="col-lg-3">
					<label class="info">Fecha</label>
						<input class="form-control" type="date" name="fecha" id="fecha" value="<?php echo $row['fecha'];?>">		
					<br>
				</div>

				
				<div class="col-lg-2">
					<label class="info">Clasificaci&oacuten</label>
					<input type="text" class="form-control" name="clasificacion" placeholder="Clasificacion" value="<?php echo $row['Clasificacion'];?>">
					<br>
					<br>
				</div>


				<div class="col-lg-3">
					<label class="info">Nacionalidad</label>
					<input class="form-control" type="text" name="nacionalidad" placeholder="Nacionalidad" value="<?php echo $row['nacionalidad'];?>">
					<br>
				</div>



				<div class="col-lg-3">
					<label class="info">Idioma</label>
					<input class="form-control" type="text" name="idioma" placeholder="Idioma" value="<?php echo $row['idioma'];?>">
					<br>
				</div>



				<div class="col-lg-3">
					<label class="info">Color/Blanco y Negro</label>
					<input class="form-control" type="text" name="color" placeholder="Color/Blanco y Negro" value="<?php echo $row['ColorPelicula'];?>">
				</div>



				<div class="col-lg-12">
					<br>
				</div>


				<label class="info">Sinopsis</label>
				<div class="col-lg-1">		
					<textarea class="form-control2" name="sinopsis" placeholder="Sinopsis" rows="3" ><?php echo $row['sinopsis'];?>
					</textarea>
					<br>
				</div>


				<div class="botonA">
					<br>
					<input type="hidden" name="idP" value="<?php echo $row['idPelicula'];?>">
					<input type="submit" class="btn btn-danger btn-lg" value="Actualizar">
					<br><br><br>
				</div>

			</div>
			
			
		</form>
	</div>
	<?php }?>

	<!--Pie de Pagina-->
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="img/palomitas.png" alt="Cinema UPP">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Somos la mejor pagina de peliculas, disfruta de todos los beneficios, te invitamos a que nos sigas en nuestras redes sociales.</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="https://es-la.facebook.com/UPPachuca/" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/uppachuca/" class="fa fa-instagram"></a>
                    <a href="https://twitter.com/uppachuca" class="fa fa-twitter"></a>
                    <a href="https://www.youtube.com/user/uppachuca" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2022 <b>Jonathan Ulises</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>
</body>
</html>