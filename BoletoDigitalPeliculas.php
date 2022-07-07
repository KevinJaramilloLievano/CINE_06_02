<?php

	header('Content-Type: text/html; charset=UTF-8');
	require('fpdf/fpdf.php');

	//Obtien las variables del archivo externo
	include('conexions.php');
	//parámetros: servidor, usuario, contraseña, BD
	$conexion = new mysqli($serverName,$userName,$password, $dbName);
	//Estructura para obtener todos los registros de la tabla pelicula
	$consulta = "SELECT idPelicula, nombrePelicula, nacionalidad, estatus FROM pelicula WHERE estatus=1";
	//Variable que guarda el resultado del query
	$resultado = $conexion->query($consulta);

    //Generación de reporte
    $pdf = new FPDF();


		//Ciclo para recorrer el objeto y sus datos
		while($row = $resultado->fetch_assoc())
		{
		
		    $pdf->AddPage();
		    $pdf->SetFont('Arial','',18);
		    $pdf->Cell(190,1,'CINE: UPP',0,1,'a');

            $pdf->SetFont('Arial','',14);
			$pdf->Cell(150,14,'Numero Asiento:',0,1,'a');

            $pdf->SetFont('Arial','',14);
			$pdf->Cell(130,8,'Boleto: GENERAL EVENTO(1)',0,1,'a');

            $pdf->SetFont('Arial','',14);
			$pdf->Cell(190,8,'Nombre pelicula:',0,1,'a');

		    $rutaImagen = 'C:/xampp/htdocs/CINE_06_02/temp/pelicula_'.$row['idPelicula'].'.png';
		    $pdf->Image($rutaImagen,10,40,40,40);

            $pdf->SetFont('Arial','',8);
            $pdf->Cell(100,85,'C.P: 43830 Ex Hacienda de Santa Barbara (Hgo)',0,1,'a');

		    //Parámetros de la imagen:
		    //url o localización del recurso
		    //Posición X, Posición Y, Ancho y Alto
		   // $pdf->Image('https://enriqueromerodominguezcine.com/wp-content/uploads/2020/01/Enrique-Romero-Cine-series-y-peliculas-de-netflix-logo.png',20,8,20,20);

		    //$pdf->Image('https://static.vecteezy.com/system/resources/previews/002/412/416/non_2x/horror-films-studio-movie-cinema-film-production-logo-design-icon-illustration-vector.jpg',170,1,20,30);

	    }

    $pdf->Output();

?>