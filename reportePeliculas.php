<?php

	header('Content-Type: text/html; charset=UTF-8');
	require('fpdf/fpdf.php');

	//Obtien las variables del archivo externo
	include('conexions.php');
	//parámetros: servidor, usuario, contraseña, BD
	$conexion = new mysqli($serverName,$userName,$password, $dbName);
	//Estructura para obtener todos los registros de la tabla actor
	$consulta = "SELECT idPelicula, nombrePelicula, nacionalidad, estatus FROM pelicula WHERE estatus=1";
	//Variable que guarda el resultado del query
	$resultado = $conexion->query($consulta);

    //Generación de reporte
    $pdf = new FPDF();

		//Ciclo para recorrer el objeto y sus datos
		while($row = $resultado->fetch_assoc())
		{
		
		    $pdf->AddPage();
		    $pdf->SetFont('Arial', 'BI', 20);
			$pdf->Cell(190, 30, utf8_decode('CINE UPP "Películas"'), 0, 1, 'C');

			$pdf->SetFont('Arial', '', 14);
			$pdf->SetXY(20,40);
		    $pdf->Cell(170,30, utf8_decode($row['nombrePelicula']).' - '.utf8_decode($row['nacionalidad']), 0, 1, 'C');

		    $rutaImagen = 'C:/xampp/htdocs/CINE_06_02/temp/pelicula_'.$row['idPelicula'].'.png';
		    $pdf->Image($rutaImagen,75,60,60,60);


		    //Parámetros de la imagen:
		    //url o localización del recurso
		    //Posición X, Posición Y, Ancho y Alto
		    $pdf->Image('https://pbs.twimg.com/media/CUHMuS5UkAAjPpM.jpg',20,8,25,25);
		    $pdf->Image('https://i.pinimg.com/originals/0c/32/97/0c3297f3516a415219c7e89e16a4a3d2.jpg',170,8,25,25);

			$pdf->SetY(250);
            $pdf->SetFont('Arial','I',8);

            $pdf->Cell(0,10,utf8_decode('Página ').$pdf->PageNo().' - Derechos Reservados',0,0,'C');
	    }

    $pdf->Output();

?>