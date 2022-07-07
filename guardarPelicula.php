<!DOCTYPE html>
<html>
    <head>
<?PHP

	$nombreP = $_POST["nombrePelicula"];
	$fecha = $_POST["fecha"];
	$nac = $_POST["nacionalidad"];
	$idioma = $_POST["idioma"];
	$color = $_POST["color"];
	$clasi = $_POST["clasificacion"];
	$sin = $_POST["sinopsis"];
	/*echo "La pelicula se llama ".$nombreP."<br>";
	echo "La fecha es ".$fecha."<br>";
	echo "Nacionalidad: ".$nac."<br>Idioma: ".$idioma."<br>";
	echo "Color: ".$color."<br>Clasificacion: ".$clasi."<br>";
	echo "Sinopsis: ".$sin;*/

	//Obtien las variables del archivo externo
	include('conexions.php');
	//4 parámetros: servidor, usuario, contraseña y BD
	$conexion = new mysqli($serverName,$userName,$password, $dbName);
	$consulta = "INSERT INTO pelicula (idPelicula, nombrePelicula, fecha, nacionalidad, idioma, ColorPelicula, Clasificacion, sinopsis, estatus) 
	VALUES (null,'$nombreP', $fecha, '$nac', '$idioma', '$color', '$clasi', '$sin', 1)";
	$ejecutar = mysqli_query($conexion,$consulta);

	echo"<script>alert('guadrdado');</script>";
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