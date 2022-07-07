<?PHP 
		$idPelicula = $_GET['id'];
        $califi = $_POST["estrella"];
        //echo "ID = ". $idPelicula;

        $conexion = new mysqli("localhost","root","","peliculas");
        $consulta = "Select * from pelicula where idPelicula=".$idPelicula;

        //echo "<br>Query: ".$consulta;

				

		$insertar="UPDATE pelicula SET califi = '$califi' where idPelicula='$idPelicula'";
		 $ejecutarstar=mysqli_query($conexion,$insertar);
				  
 ?>