<?php 

require "fpdf/fpdf.php";
// --- MISCELANEA
function existe_formato(){
	if(isset($_POST["act_formato"])){
		return true;
	}else{
		return false;
	}
}

function existe_margen(){
	if(isset($_POST["act_margen"])){
		return true;
	}else{
		return false;
	}
}

function existe_reverso(){
	if(isset($_POST["act_reverso"])){
		return true;
	}else{
		return false;
	}
}

/// --- OBTENER TAMAÑOS
//Generar la orientación de la hoja
function generar_orientacion($tamanio){
	switch ($tamanio) {
		case 1:
			$orientacion = "P";
			break;

		case 2:
			$orientacion = "P";
			break;

		case 3:
			$orientacion = "L";
			break;

		default:
			$orientacion = "P";
			break;
	}
	return $orientacion;
}
//!--- OBTENER TAMAÑOS

// --- GENERAR SERIGRAFÍA DE CUADERNO
// --- GENERAR MARGENES PRINCIPALES
//Generar header del cuaderno
function generar_header($pdf, $tipo, $formato){
	$pdf->SetDrawColor(184, 50, 39);
	$pdf->SetLineWidth(0.1);//SetLineWidth se maneja en cm, no en la medida que establezcas
	switch ($tipo) {
		//FORMA CARTA
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales - Parte grande
					$pdf->Line(20, 12, 144.2, 12);
					$pdf->Line(20, 19.5, 144.2, 19.5);
					$pdf->Line(20, 27, 144.2, 27);
					//Lineas verticales
					$pdf->Line(20, 12, 20, 27);
					$pdf->Line(144.2, 12, 144.2, 27);

					//Lineas horizontales
					$pdf->Line(148.2, 12, 207, 12);
					$pdf->Line(148.2, 19.5, 207, 19.5);
					$pdf->Line(148.2, 27, 207, 27);
					//Lineas verticales
					$pdf->Line(148.2, 12, 148.2, 27);
					$pdf->Line(207, 12, 207, 27);
					break;

				case 2:
					//Lineas horizontales - Parte grande
					$pdf->Line(20, 12, 144.2, 12);
					$pdf->Line(20, 19.5, 144.2, 19.5);
					$pdf->Line(20, 27, 144.2, 27);
					//Lineas verticales
					$pdf->Line(20, 12, 20, 27);
					$pdf->Line(144.2, 12, 144.2, 27);

					//Lineas horizontales
					$pdf->Line(148.2, 12, 207, 12);
					$pdf->Line(148.2, 19.5, 207, 19.5);
					$pdf->Line(148.2, 27, 207, 27);
					//Lineas verticales
					$pdf->Line(148.2, 12, 148.2, 27);
					$pdf->Line(207, 12, 207, 27);
					break;

				case 3:
					//Lineas horizontales - Parte Grande
					$pdf->Line(20, 12, 143.5, 12);
					$pdf->Line(20, 19.5, 143.5, 19.5);
					$pdf->Line(20, 27, 143.5, 27);
					//Lineas verticales
					$pdf->Line(20, 12, 20, 27);
					$pdf->Line(143.5, 12, 143.5, 27);

					//Lineas horizontales
					$pdf->Line(147.5, 12, 205, 12);
					$pdf->Line(147.5, 19.5, 205, 19.5);
					$pdf->Line(147.5, 27, 205, 27);
					//Lineas verticales
					$pdf->Line(147.5, 12, 147.5, 27);
					$pdf->Line(205, 12, 205, 27);
					break;

				case 4:
					//Lineas horizontales - Parte Grande
					$pdf->Line(20, 12, 143.5, 12);
					$pdf->Line(20, 19.5, 143.5, 19.5);
					$pdf->Line(20, 27, 143.5, 27);
					//Lineas verticales
					$pdf->Line(20, 12, 20, 27);
					$pdf->Line(143.5, 12, 143.5, 27);

					//Lineas horizontales
					$pdf->Line(147.5, 12, 202, 12);
					$pdf->Line(147.5, 19.5, 202, 19.5);
					$pdf->Line(147.5, 27, 202, 27);
					//Lineas verticales
					$pdf->Line(147.5, 12, 147.5, 27);
					$pdf->Line(202, 12, 202, 27);
					break;

				default:
					//Lineas horizontales - Parte grande
					$pdf->Line(20, 12, 144.2, 12);
					$pdf->Line(20, 19.5, 144.2, 19.5);
					$pdf->Line(20, 27, 144.2, 27);
					//Lineas verticales
					$pdf->Line(20, 12, 20, 27);
					$pdf->Line(144.2, 12, 144.2, 27);

					//Lineas horizontales
					$pdf->Line(148.2, 12, 207, 12);
					$pdf->Line(148.2, 19.5, 207, 19.5);
					$pdf->Line(148.2, 27, 207, 27);
					//Lineas verticales
					$pdf->Line(148.2, 12, 148.2, 27);
					$pdf->Line(207, 12, 207, 27);
					break;
			}
			break;
		//FORMA ITALIANA
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(20, 8, 146.3, 8);
					$pdf->Line(20, 16, 146.3, 16);

					$pdf->Line(150.3, 8, 209, 8);
					$pdf->Line(150.3, 16, 209, 16);
					//Lineas verticales
					$pdf->Line(20, 8, 20, 16);
					$pdf->Line(146.3, 8, 146.3, 16);

					$pdf->Line(150.3, 8, 150.3, 16);
					$pdf->Line(209, 8, 209, 16);

					//Lineas horizontales
					$pdf->Line(20, 146, 146.3, 146);
					$pdf->Line(20, 154, 146.3, 154);

					$pdf->Line(150.3, 146, 209, 146);
					$pdf->Line(150.3, 154, 209, 154);
					//Lineas verticales
					$pdf->Line(20, 146, 20, 154);
					$pdf->Line(146.3, 146, 146.3, 154);

					$pdf->Line(150.3, 146, 150.3, 154);
					$pdf->Line(209, 146, 209, 154);
					break;
					
				case 2:
					//Lineas horizontales
					$pdf->Line(20, 8, 146.3, 8);
					$pdf->Line(20, 16, 146.3, 16);

					$pdf->Line(150.3, 8, 209, 8);
					$pdf->Line(150.3, 16, 209, 16);
					//Lineas verticales
					$pdf->Line(20, 8, 20, 16);
					$pdf->Line(146.3, 8, 146.3, 16);

					$pdf->Line(150.3, 8, 150.3, 16);
					$pdf->Line(209, 8, 209, 16);

					//Lineas horizontales
					$pdf->Line(20, 146, 146.3, 146);
					$pdf->Line(20, 154, 146.3, 154);

					$pdf->Line(150.3, 146, 209, 146);
					$pdf->Line(150.3, 154, 209, 154);
					//Lineas verticales
					$pdf->Line(20, 146, 20, 154);
					$pdf->Line(146.3, 146, 146.3, 154);

					$pdf->Line(150.3, 146, 150.3, 154);
					$pdf->Line(209, 146, 209, 154);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(20, 8, 146.3, 8);
					$pdf->Line(20, 16, 146.3, 16);

					$pdf->Line(150.3, 8, 209, 8);
					$pdf->Line(150.3, 16, 209, 16);
					//Lineas verticales
					$pdf->Line(20, 8, 20, 16);
					$pdf->Line(146.3, 8, 146.3, 16);

					$pdf->Line(150.3, 8, 150.3, 16);
					$pdf->Line(209, 8, 209, 16);

					//Lineas horizontales
					$pdf->Line(20, 146, 146.3, 146);
					$pdf->Line(20, 154, 146.3, 154);

					$pdf->Line(150.3, 146, 209, 146);
					$pdf->Line(150.3, 154, 209, 154);
					//Lineas verticales
					$pdf->Line(20, 146, 20, 154);
					$pdf->Line(146.3, 146, 146.3, 154);

					$pdf->Line(150.3, 146, 150.3, 154);
					$pdf->Line(209, 146, 209, 154);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(20, 8, 146.3, 8);
					$pdf->Line(20, 16, 146.3, 16);

					$pdf->Line(150.3, 8, 209, 8);
					$pdf->Line(150.3, 16, 209, 16);
					//Lineas verticales
					$pdf->Line(20, 8, 20, 16);
					$pdf->Line(146.3, 8, 146.3, 16);

					$pdf->Line(150.3, 8, 150.3, 16);
					$pdf->Line(209, 8, 209, 16);

					//Lineas horizontales
					$pdf->Line(20, 146, 146.3, 146);
					$pdf->Line(20, 154, 146.3, 154);

					$pdf->Line(150.3, 146, 209, 146);
					$pdf->Line(150.3, 154, 209, 154);
					//Lineas verticales
					$pdf->Line(20, 146, 20, 154);
					$pdf->Line(146.3, 146, 146.3, 154);

					$pdf->Line(150.3, 146, 150.3, 154);
					$pdf->Line(209, 146, 209, 154);
					break;

				default:
					//Lineas horizontales
					$pdf->Line(20, 8, 146.3, 8);
					$pdf->Line(20, 16, 146.3, 16);

					$pdf->Line(150.3, 8, 209, 8);
					$pdf->Line(150.3, 16, 209, 16);
					//Lineas verticales
					$pdf->Line(20, 8, 20, 16);
					$pdf->Line(146.3, 8, 146.3, 16);

					$pdf->Line(150.3, 8, 150.3, 16);
					$pdf->Line(209, 8, 209, 16);

					//Lineas horizontales
					$pdf->Line(20, 146, 146.3, 146);
					$pdf->Line(20, 154, 146.3, 154);

					$pdf->Line(150.3, 146, 209, 146);
					$pdf->Line(150.3, 154, 209, 154);
					//Lineas verticales
					$pdf->Line(20, 146, 20, 154);
					$pdf->Line(146.3, 146, 146.3, 154);

					$pdf->Line(150.3, 146, 150.3, 154);
					$pdf->Line(209, 146, 209, 154);
					break;
			}
			break;
		//FORMA FRANCESA
		case 3:
			//Lineas horizontales
			$pdf->Line(20, 8, 131, 8);
			$pdf->Line(20, 16, 131, 16);
			//Lineas verticales
			$pdf->Line(20, 8, 20, 16);
			$pdf->Line(131, 8, 131, 16);

			//Lineas horizontales
			$pdf->Line(159, 8, 270, 8);
			$pdf->Line(159, 16, 270, 16);
			//Lineas verticales
			$pdf->Line(159, 8, 159, 16);
			$pdf->Line(270, 8, 270, 16);
			break;

		default:
			# code...
			break;
	}
}

//Generar header reverso del cuaderno
function generar_header_reverso($pdf, $tipo, $formato){
	$pdf->SetDrawColor(184, 50, 39);
	$pdf->SetLineWidth(0.1);//SetLineWidth se maneja en cm, no en la medida que establezcas
	switch ($tipo) {
		//FORMA CARTA
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales - Parte grande
					$pdf->Line(9, 12, 140.2, 12);
					$pdf->Line(9, 19.5, 140.2, 19.5);
					$pdf->Line(9, 27, 140.2, 27);
					//Lineas verticales
					$pdf->Line(9, 12, 9, 27);
					$pdf->Line(140.2, 12, 140.2, 27);

					//Lineas horizontales
					$pdf->Line(144.9, 12, 196, 12);
					$pdf->Line(144.2, 19.5, 196, 19.5);
					$pdf->Line(144.2, 27, 196, 27);
					//Lineas verticales
					$pdf->Line(144.2, 12, 144.2, 27);
					$pdf->Line(196, 12, 196, 27);
					break;

				case 2:
					//Lineas horizontales - Parte Grande
					$pdf->Line(9, 12, 140.2, 12);
					$pdf->Line(9, 19.5, 140.2, 19.5);
					$pdf->Line(9, 27, 140.2, 27);
					//Lineas verticales
					$pdf->Line(9, 12, 9, 27);
					$pdf->Line(140.2, 12, 140.2, 27);

					//Lineas horizontales
					$pdf->Line(144.2, 12, 196, 12);
					$pdf->Line(144.2, 19.5, 196, 19.5);
					$pdf->Line(144.2, 27, 196, 27);
					//Lineas verticales
					$pdf->Line(144.2, 12, 144.2, 27);
					$pdf->Line(196, 12, 196, 27);
					break;

				case 3:
					//Lineas horizontales - Parte Grande
					$pdf->Line(11, 12, 140.2, 12);
					$pdf->Line(11, 19.5, 140.2, 19.5);
					$pdf->Line(11, 27, 140.2, 27);
					//Lineas verticales
					$pdf->Line(11, 12, 11, 27);
					$pdf->Line(140.2, 12, 140.2, 27);

					//Lineas horizontales
					$pdf->Line(144.2, 12, 196, 12);
					$pdf->Line(144.2, 19.5, 196, 19.5);
					$pdf->Line(144.2, 27, 196, 27);
					//Lineas verticales
					$pdf->Line(144.2, 12, 144.2, 27);
					$pdf->Line(196, 12, 196, 27);
					break;

				case 4:
					//Lineas horizontales - Parte Grande
					$pdf->Line(14, 12, 140.2, 12);
					$pdf->Line(14, 19.5, 140.2, 19.5);
					$pdf->Line(14, 27, 140.2, 27);
					//Lineas verticales
					$pdf->Line(14, 12, 14, 27);
					$pdf->Line(140.2, 12, 140.2, 27);

					//Lineas horizontales
					$pdf->Line(144.2, 12, 196, 12);
					$pdf->Line(144.2, 19.5, 196, 19.5);
					$pdf->Line(144.2, 27, 196, 27);
					//Lineas verticales
					$pdf->Line(144.2, 12, 144.2, 27);
					$pdf->Line(196, 12, 196, 27);
					break;

				default:
					//Lineas horizontales - Parte grande
					$pdf->Line(14, 12, 140.2, 12);
					$pdf->Line(14, 19.5, 140.2, 19.5);
					$pdf->Line(14, 27, 140.2, 27);
					//Lineas verticales
					$pdf->Line(14, 12, 14, 27);
					$pdf->Line(140.2, 12, 140.2, 27);

					//Lineas horizontales
					$pdf->Line(144.2, 12, 196, 12);
					$pdf->Line(144.2, 19.5, 196, 19.5);
					$pdf->Line(144.2, 27, 196, 27);
					//Lineas verticales
					$pdf->Line(144.2, 12, 144.2, 27);
					$pdf->Line(196, 12, 196, 27);
					break;
			}
			break;
		//FORMA ITALIANA
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(7, 8, 133.3, 8);
					$pdf->Line(7, 16, 133.3, 16);

					$pdf->Line(137.3, 8, 196, 8);
					$pdf->Line(137.3, 16, 196, 16);
					//Lineas verticales
					$pdf->Line(7, 8, 7, 16);
					$pdf->Line(133.3, 8, 133.3, 16);

					$pdf->Line(137.3, 8, 137.3, 16);
					$pdf->Line(196, 8, 196, 16);

					//Lineas horizontales
					$pdf->Line(7, 146, 133.3, 146);
					$pdf->Line(7, 154, 133.3, 154);

					$pdf->Line(137.3, 146, 196, 146);
					$pdf->Line(137.3, 154, 196, 154);
					//Lineas verticales
					$pdf->Line(7, 146, 7, 154);
					$pdf->Line(133.3, 146, 133.3, 154);

					$pdf->Line(137.3, 146, 137.3, 154);
					$pdf->Line(196, 146, 196, 154);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(7, 8, 133.3, 8);
					$pdf->Line(7, 16, 133.3, 16);

					$pdf->Line(137.3, 8, 196, 8);
					$pdf->Line(137.3, 16, 196, 16);
					//Lineas verticales
					$pdf->Line(7, 8, 7, 16);
					$pdf->Line(133.3, 8, 133.3, 16);

					$pdf->Line(137.3, 8, 137.3, 16);
					$pdf->Line(196, 8, 196, 16);

					//Lineas horizontales
					$pdf->Line(7, 146, 133.3, 146);
					$pdf->Line(7, 154, 133.3, 154);

					$pdf->Line(137.3, 146, 196, 146);
					$pdf->Line(137.3, 154, 196, 154);
					//Lineas verticales
					$pdf->Line(7, 146, 7, 154);
					$pdf->Line(133.3, 146, 133.3, 154);

					$pdf->Line(137.3, 146, 137.3, 154);
					$pdf->Line(196, 146, 196, 154);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(7, 8, 133.3, 8);
					$pdf->Line(7, 16, 133.3, 16);

					$pdf->Line(137.3, 8, 196, 8);
					$pdf->Line(137.3, 16, 196, 16);
					//Lineas verticales
					$pdf->Line(7, 8, 7, 16);
					$pdf->Line(133.3, 8, 133.3, 16);

					$pdf->Line(137.3, 8, 137.3, 16);
					$pdf->Line(196, 8, 196, 16);

					//Lineas horizontales
					$pdf->Line(7, 146, 133.3, 146);
					$pdf->Line(7, 154, 133.3, 154);

					$pdf->Line(137.3, 146, 196, 146);
					$pdf->Line(137.3, 154, 196, 154);
					//Lineas verticales
					$pdf->Line(7, 146, 7, 154);
					$pdf->Line(133.3, 146, 133.3, 154);

					$pdf->Line(137.3, 146, 137.3, 154);
					$pdf->Line(196, 146, 196, 154);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(7, 8, 133.3, 8);
					$pdf->Line(7, 16, 133.3, 16);

					$pdf->Line(137.3, 8, 196, 8);
					$pdf->Line(137.3, 16, 196, 16);
					//Lineas verticales
					$pdf->Line(7, 8, 7, 16);
					$pdf->Line(133.3, 8, 133.3, 16);

					$pdf->Line(137.3, 8, 137.3, 16);
					$pdf->Line(196, 8, 196, 16);

					//Lineas horizontales
					$pdf->Line(7, 146, 133.3, 146);
					$pdf->Line(7, 154, 133.3, 154);

					$pdf->Line(137.3, 146, 196, 146);
					$pdf->Line(137.3, 154, 196, 154);
					//Lineas verticales
					$pdf->Line(7, 146, 7, 154);
					$pdf->Line(133.3, 146, 133.3, 154);

					$pdf->Line(137.3, 146, 137.3, 154);
					$pdf->Line(196, 146, 196, 154);
					break;

				default:
					//Lineas horizontales
					$pdf->Line(7, 8, 133.3, 8);
					$pdf->Line(7, 16, 133.3, 16);

					$pdf->Line(137.3, 8, 196, 8);
					$pdf->Line(137.3, 16, 196, 16);
					//Lineas verticales
					$pdf->Line(7, 8, 7, 16);
					$pdf->Line(133.3, 8, 133.3, 16);

					$pdf->Line(137.3, 8, 137.3, 16);
					$pdf->Line(196, 8, 196, 16);

					//Lineas horizontales
					$pdf->Line(7, 146, 133.3, 146);
					$pdf->Line(7, 154, 133.3, 154);

					$pdf->Line(137.3, 146, 196, 146);
					$pdf->Line(137.3, 154, 196, 154);
					//Lineas verticales
					$pdf->Line(7, 146, 7, 154);
					$pdf->Line(133.3, 146, 133.3, 154);

					$pdf->Line(137.3, 146, 137.3, 154);
					$pdf->Line(196, 146, 196, 154);
					break;
			}
			break;
		//FORMA FRANCESA
		case 3:
			//Lineas horizontales
			$pdf->Line(8, 8, 119, 8);
			$pdf->Line(8, 16, 119, 16);
			//Lineas verticales
			$pdf->Line(8, 8, 8, 16);
			$pdf->Line(119, 8, 119, 16);

			//Lineas horizontales
			$pdf->Line(147, 8, 259, 8);
			$pdf->Line(147, 16, 259, 16);
			//Lineas verticales
			$pdf->Line(147, 8, 147, 16);
			$pdf->Line(259, 8, 259, 16);
			break;

		default:
			# code...
			break;
	}
}

//Generar margen de serigrafia del cuerpo del cuaderno
function generar_body($pdf, $tipo, $formato){
	switch($tipo){
		//FORMA PROFESIONAL
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(20, 31, 207, 31);
					$pdf->Line(20, 263, 207, 263);
					//Lineas verticales
					$pdf->Line(20, 31, 20, 263);
					$pdf->Line(207, 31, 207, 263);
					break;
				
				case 2:
					//Lineas horizontales
					$pdf->Line(20, 31, 207, 31);
					$pdf->Line(20, 259, 207, 259);
					//Lineas verticales
					$pdf->Line(20, 31, 20, 259);
					$pdf->Line(207, 31, 207, 259);
					break;
				
				case 3:
					//Lineas horizontales
					$pdf->Line(20, 31, 205, 31);
					$pdf->Line(20, 261, 205, 261);
					//Lineas verticales
					$pdf->Line(20, 31, 20, 261);
					$pdf->Line(205, 31, 205, 261);
					break;
				
				case 4:
					//Lineas horizontales
					$pdf->Line(20, 31, 202, 31);
					$pdf->Line(20, 262, 202, 262);
					//Lineas verticales
					$pdf->Line(20, 31, 20, 262);
					$pdf->Line(202, 31, 202, 262);
					break;
				
				default:
					break;
			}
			break;
		//FORMA ITALIANA
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(20, 20, 209, 20);
					$pdf->Line(20, 131.5, 209, 131.5);
					//Lineas verticales
					$pdf->Line(20, 20, 20, 131.5);
					$pdf->Line(209, 20, 209, 131.5);

					//Lineas horizontales
					$pdf->Line(20, 158, 209, 158);
					$pdf->Line(20, 269.5, 209, 269.5);
					//Lineas verticales
					$pdf->Line(20, 158, 20, 269.5);
					$pdf->Line(209, 158, 209, 269.5);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(20, 20, 209, 20);
					$pdf->Line(20, 131.5, 209, 131.5);
					//Lineas verticales
					$pdf->Line(20, 20, 20, 131.5);
					$pdf->Line(209, 20, 209, 131.5);

					//Lineas horizontales
					$pdf->Line(20, 158, 209, 158);
					$pdf->Line(20, 269.5, 209, 269.5);
					//Lineas verticales
					$pdf->Line(20, 158, 20, 269.5);
					$pdf->Line(209, 158, 209, 269.5);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(20, 20, 209, 20);
					$pdf->Line(20, 131.5, 209, 131.5);
					//Lineas verticales
					$pdf->Line(20, 20, 20, 131.5);
					$pdf->Line(209, 20, 209, 131.5);

					//Lineas horizontales
					$pdf->Line(20, 158, 209, 158);
					$pdf->Line(20, 269.5, 209, 269.5);
					//Lineas verticales
					$pdf->Line(20, 158, 20, 269.5);
					$pdf->Line(209, 158, 209, 269.5);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(20, 20, 209, 20);
					$pdf->Line(20, 131.5, 209, 131.5);
					//Lineas verticales
					$pdf->Line(20, 20, 20, 131.5);
					$pdf->Line(209, 20, 209, 131.5);

					//Lineas horizontales
					$pdf->Line(20, 158, 209, 158);
					$pdf->Line(20, 269.5, 209, 269.5);
					//Lineas verticales
					$pdf->Line(20, 158, 20, 269.5);
					$pdf->Line(209, 158, 209, 269.5);
					break;
			}
			break;
		//FORMA FRANCESA
		case 3:
			//Lineas horizontales
			$pdf->Line(20, 20, 131, 20);
			$pdf->Line(20, 206, 131, 206);
			//Lineas verticales
			$pdf->Line(20, 20, 20, 206);
			$pdf->Line(131, 20, 131, 206);
			
			//Lineas horizontales
			$pdf->Line(159, 20, 270, 20);
			$pdf->Line(159, 206, 270, 206);
			//Lineas verticales
			$pdf->Line(159, 20, 159, 206);
			$pdf->Line(270, 20, 270, 206);
			break;

		default:
			# code...
			break;
	}
}

//Generar reverso del margen de serigrafia del cuerpo del cuaderno
function generar_body_reverso($pdf, $tipo, $formato){
	switch($tipo){
		//FORMA PROFESIONAL
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(9, 31, 196, 31);
					$pdf->Line(9, 263, 196, 263);
					//Lineas verticales
					$pdf->Line(9, 31, 9, 263);
					$pdf->Line(196, 31, 196, 263);
					break;
				
				case 2:
					//Lineas horizontales
					$pdf->Line(9, 31, 196, 31);
					$pdf->Line(9, 259, 196, 259);
					//Lineas verticales
					$pdf->Line(9, 31, 9, 259);
					$pdf->Line(196, 31, 196, 259);
					break;
				
				case 3:
					//Lineas horizontales
					$pdf->Line(11, 31, 196, 31);
					$pdf->Line(11, 261, 196, 261);
					//Lineas verticales
					$pdf->Line(11, 31, 11, 261);
					$pdf->Line(196, 31, 196, 261);
					break;
				
				case 4:
					//Lineas horizontales
					$pdf->Line(14, 31, 196, 31);
					$pdf->Line(14, 262, 196, 262);
					//Lineas verticales
					$pdf->Line(14, 31, 14, 262);
					$pdf->Line(196, 31, 196, 262);
					break;
				
				default:
					break;
			}
			break;
		//FORMA ITALIANA
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(7, 20, 196, 20);
					$pdf->Line(7, 131.5, 196, 131.5);
					//Lineas verticales
					$pdf->Line(7, 20, 7, 131.5);
					$pdf->Line(196, 20, 196, 131.5);

					//Lineas horizontales
					$pdf->Line(7, 158, 196, 158);
					$pdf->Line(7, 269.5, 196, 269.5);
					//Lineas verticales
					$pdf->Line(7, 158, 7, 269.5);
					$pdf->Line(196, 158, 196, 269.5);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(7, 20, 196, 20);
					$pdf->Line(7, 131.5, 196, 131.5);
					//Lineas verticales
					$pdf->Line(7, 20, 7, 131.5);
					$pdf->Line(196, 20, 196, 131.5);

					//Lineas horizontales
					$pdf->Line(7, 158, 196, 158);
					$pdf->Line(7, 269.5, 196, 269.5);
					//Lineas verticales
					$pdf->Line(7, 158, 7, 269.5);
					$pdf->Line(196, 158, 196, 269.5);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(7, 20, 196, 20);
					$pdf->Line(7, 131.5, 196, 131.5);
					//Lineas verticales
					$pdf->Line(7, 20, 7, 131.5);
					$pdf->Line(196, 20, 196, 131.5);

					//Lineas horizontales
					$pdf->Line(7, 158, 196, 158);
					$pdf->Line(7, 269.5, 196, 269.5);
					//Lineas verticales
					$pdf->Line(7, 158, 7, 269.5);
					$pdf->Line(196, 158, 196, 269.5);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(7, 20, 196, 20);
					$pdf->Line(7, 131.5, 196, 131.5);
					//Lineas verticales
					$pdf->Line(7, 20, 7, 131.5);
					$pdf->Line(196, 20, 196, 131.5);

					//Lineas horizontales
					$pdf->Line(7, 158, 196, 158);
					$pdf->Line(7, 269.5, 196, 269.5);
					//Lineas verticales
					$pdf->Line(7, 158, 7, 269.5);
					$pdf->Line(196, 158, 196, 269.5);
					break;
			}
			break;
		//FORMA FRANCESA
		case 3:
			//Lineas horizontales
			$pdf->Line(8, 20, 119, 20);
			$pdf->Line(8, 206, 119, 206);
			//Lineas verticales
			$pdf->Line(8, 20, 8, 206);
			$pdf->Line(119, 20, 119, 206);

			//Lineas horizontales
			$pdf->Line(147, 20, 259, 20);
			$pdf->Line(147, 206, 259, 206);
			//Lineas verticales
			$pdf->Line(147, 20, 147, 206);
			$pdf->Line(259, 20, 259, 206);
			break;

		default:
			# code...
			break;
	}
}
//!--- GENERAR MARGENES PRINCIPALES

// --- GENERAR SERIGRAFIA DE FORMATO
//Generar la serigrafía del cuadro chico
function generar_formato($pdf, $tipo, $formato){
	$pdf->SetDrawColor(28, 142, 192);
	switch ($tipo){
		//FORMA PROFESIONAL
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 29; $i++){
						$pdf->Line(20, 31+(8*$i), 207, 31+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 20; $i++){
						$pdf->Line(20, 31+(12*$i)-4, 207, 31+(12*$i)-4);
					}

					for($i = 1; $i < 19; $i++){
						$pdf->Line(20, 31+(12*$i), 207, 31+(12*$i));
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 46; $i++){
						$pdf->Line(20, 31+(5*$i), 205, 31+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 37; $i++){
						$pdf->Line(20+(5*$i), 31, 20+(5*$i), 261);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 33; $i++){
						$pdf->Line(20, 31+(7*$i), 202, 31+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 26; $i++){
						$pdf->Line(20+(7*$i), 31, 20+(7*$i), 262);
					}
					break;
			}
			break;
		//FORMA ITALIANA
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 14; $i++){
						$pdf->Line(20, 20+(8*$i), 209, 20+(8*$i));
					}

					for($i = 1; $i < 14; $i++){
						$pdf->Line(20, 158+(8*$i), 209, 158+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 10; $i++){
						$pdf->Line(20, 20+(12*$i), 209, 20+(12*$i));
						$pdf->Line(20, 20+(12*$i)-4, 209, 20+(12*$i)-4);
					}

					for($i = 1; $i < 10; $i++){
						$pdf->Line(20, 158+(12*$i), 209, 158+(12*$i));
						$pdf->Line(20, 158+(12*$i)-4, 209, 158+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 23; $i++){
						$pdf->Line(20, 20+(5*$i), 209, 20+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 38; $i++){
						$pdf->Line(20+(5*$i), 20, 20+(5*$i), 131.5);
					}

					//Lineas horizontales
					for($i = 1; $i < 23; $i++){
						$pdf->Line(20, 158+(5*$i), 209, 158+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 38; $i++){
						$pdf->Line(20+(5*$i), 158, 20+(5*$i), 269.5);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(20, 20+(7*$i), 209, 20+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 27; $i++){
						$pdf->Line(20+(7*$i), 20, 20+(7*$i), 131.5);
					}

					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(20, 158+(7*$i), 209, 158+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 27; $i++){
						$pdf->Line(20+(7*$i), 158, 20+(7*$i), 269.5);
					}
					break;
			}
			break;
		//FORMA FRANCESA
		case 3:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 24; $i++){
						$pdf->Line(20, 20+(8*$i), 131, 20+(8*$i));
						$pdf->Line(159, 20+(8*$i), 270, 20+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(20, 20+(12*$i), 131, 20+(12*$i));
						$pdf->Line(20, 20+(12*$i)-4, 131, 20+(12*$i)-4);

						$pdf->Line(159, 20+(12*$i), 270, 20+(12*$i));
						$pdf->Line(159, 20+(12*$i)-4, 270, 20+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 38; $i++){
						$pdf->Line(20, 20+(5*$i), 131, 20+(5*$i));
						$pdf->Line(159, 20+(5*$i), 270, 20+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 23; $i++){
						$pdf->Line(20+(5*$i), 20, 20+(5*$i), 206);
						$pdf->Line(159+(5*$i), 20, 159+(5*$i), 206);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 27; $i++){
						$pdf->Line(20, 20+(7*$i), 131, 20+(7*$i));
						$pdf->Line(159, 20+(7*$i), 270, 20+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(20+(7*$i), 20, 20+(7*$i), 206);
						$pdf->Line(159+(7*$i), 20, 159+(7*$i), 206);
					}
					break;
			}
			break;
		default:
			# code...
			break;
	}
}

//Generar el reverso de la serigrafía
function generar_formato_reverso($pdf, $tipo, $formato){
	$pdf->SetDrawColor(28, 142, 192);
	switch ($tipo){
		//FORMA PROFESIONAL
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 29; $i++){
						$pdf->Line(9, 31+(8*$i), 196, 31+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 20; $i++){
						$pdf->Line(9, 31+(12*$i)-4, 196, 31+(12*$i)-4);
					}

					for($i = 1; $i < 19; $i++){
						$pdf->Line(9, 31+(12*$i), 196, 31+(12*$i));
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 46; $i++){
						$pdf->Line(11, 31+(5*$i), 196, 31+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 37; $i++){
						$pdf->Line(11+(5*$i), 31, 11+(5*$i), 261);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 33; $i++){
						$pdf->Line(14, 31+(7*$i), 196, 31+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 26; $i++){
						$pdf->Line(14+(7*$i), 31, 14+(7*$i), 262);
					}
					break;
			}
			break;
		//FORMA ITALIANA
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 14; $i++){
						$pdf->Line(7, 20+(8*$i), 196, 20+(8*$i));
					}

					for($i = 1; $i < 14; $i++){
						$pdf->Line(7, 158+(8*$i), 196, 158+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 10; $i++){
						$pdf->Line(7, 20+(12*$i), 196, 20+(12*$i));
						$pdf->Line(7, 20+(12*$i)-4, 196, 20+(12*$i)-4);
					}

					//Lineas horizontales
					for($i = 1; $i < 10; $i++){
						$pdf->Line(7, 158+(12*$i), 196, 158+(12*$i));
						$pdf->Line(7, 158+(12*$i)-4, 196, 158+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 23; $i++){
						$pdf->Line(7, 20+(5*$i), 196, 20+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 38; $i++){
						$pdf->Line(7+(5*$i), 20, 7+(5*$i), 131.5);
					}

					//Lineas horizontales
					for($i = 1; $i < 23; $i++){
						$pdf->Line(7, 158+(5*$i), 196, 158+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 38; $i++){
						$pdf->Line(7+(5*$i), 158, 7+(5*$i), 269.5);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(7, 20+(7*$i), 196, 20+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 27; $i++){
						$pdf->Line(7+(7*$i), 20, 7+(7*$i), 131.5);
					}

					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(7, 158+(7*$i), 196, 158+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 27; $i++){
						$pdf->Line(7+(7*$i), 158, 7+(7*$i), 269.5);
					}
					break;
			}
			break;
		//FORMA FRANCESA
		case 3:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 24; $i++){
						$pdf->Line(8, 20+(8*$i), 119, 20+(8*$i));
						$pdf->Line(147, 20+(8*$i), 259, 20+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(8, 20+(12*$i), 119, 20+(12*$i));
						$pdf->Line(8, 20+(12*$i)-4, 119, 20+(12*$i)-4);

						$pdf->Line(147, 20+(12*$i), 259, 20+(12*$i));
						$pdf->Line(147, 20+(12*$i)-4, 259, 20+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 38; $i++){
						$pdf->Line(8, 20+(5*$i), 119, 20+(5*$i));
						$pdf->Line(147, 20+(5*$i), 259, 20+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 23; $i++){
						$pdf->Line(8+(5*$i), 20, 8+(5*$i), 206);
						$pdf->Line(147+(5*$i), 20, 147+(5*$i), 206);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 27; $i++){
						$pdf->Line(8, 20+(7*$i), 119, 20+(7*$i));
						$pdf->Line(147, 20+(7*$i), 259, 20+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(8+(7*$i), 20, 8+(7*$i), 206);
						$pdf->Line(147+(7*$i), 20, 147+(7*$i), 206);
					}
					break;
			}
			break;
		default:
			# code...
			break;
	}
}
//!--- GENERAR SERIGRAFIA DE FORMATO

//Elegir el formato de serigrafia
function generar_serigrafia($pdf, $estado, $tipo, $formato){
	if($estado == true){
		generar_header($pdf, $tipo, $formato);
		generar_body($pdf, $tipo, $formato);
		generar_formato($pdf, $tipo, $formato);
	}
}

//Elegir el formato de serigrafia del reverso
function generar_serigrafia_reverso($pdf, $estado, $tipo, $formato){
	if($estado == true){
		generar_header_reverso($pdf, $tipo, $formato);
		generar_body_reverso($pdf, $tipo, $formato);
		generar_formato_reverso($pdf, $tipo, $formato);
	}
}
//!--- GENERAR SERIGRAFÍA DE CUADERNO

// --- GENERAR MARGEN
//Formatear color de margen
function formato_rgb_rojo($color){
	$r = hexdec(substr($color, 1, 2));
	return $r;
}

function formato_rgb_verde($color){
	$g = hexdec(substr($color, 3, 2));
	return $g;
}

function formato_rgb_azul($color){
	$b = hexdec(substr($color, 5, 2));
	return $b;
}

//Generar el margen de cuaderno
function generar_margen($pdf, $tipo, $formato, $estado, $color, $grosor){
	if($estado == true){
		$pdf->SetDrawColor(intval(formato_rgb_rojo($color)), intval(formato_rgb_verde($color)), intval(formato_rgb_azul($color)));
		$pdf->SetLineWidth(intval($grosor));
		switch ($tipo) {
			case 1:
				switch($formato){
					case 1:
						//Lineas horizontales
						$pdf->Line(20, 31, 207, 31);
						$pdf->Line(20, 263, 207, 263);
						//Lineas verticales
						$pdf->Line(20, 31, 20, 263);
						$pdf->Line(207, 31, 207, 263);
						break;
					
					case 2:
						//Lineas horizontales
						$pdf->Line(20, 31, 207, 31);
						$pdf->Line(20, 259, 207, 259);
						//Lineas verticales
						$pdf->Line(20, 31, 20, 259);
						$pdf->Line(207, 31, 207, 259);
						break;
					
					case 3:
						//Lineas horizontales
						$pdf->Line(20, 31, 205, 31);
						$pdf->Line(20, 261, 205, 261);
						//Lineas verticales
						$pdf->Line(20, 31, 20, 261);
						$pdf->Line(205, 31, 205, 261);
						break;
					
					case 4:
						//Lineas horizontales
						$pdf->Line(20, 31, 202, 31);
						$pdf->Line(20, 262, 202, 262);
						//Lineas verticales
						$pdf->Line(20, 31, 20, 262);
						$pdf->Line(202, 31, 202, 262);
						break;
					
					default:
						break;
				}
				break;
			case 2:
				//Lineas horizontales
				$pdf->Line(20, 20, 209, 20);
				$pdf->Line(20, 131.5, 209, 131.5);
				//Lineas verticales
				$pdf->Line(20, 20, 20, 131.5);
				$pdf->Line(209, 20, 209, 131.5);

				//Lineas horizontales
				$pdf->Line(20, 158, 209, 158);
				$pdf->Line(20, 269.5, 209, 269.5);
				//Lineas verticales
				$pdf->Line(20, 158, 20, 269.5);
				$pdf->Line(209, 158, 209, 269.5);
				break;
			//FORMA FRANCESA
			case 3:
				//Lineas horizontales
				$pdf->Line(20, 20, 131, 20);
				$pdf->Line(20, 206, 131, 206);
				//Lineas verticales
				$pdf->Line(20, 20, 20, 206);
				$pdf->Line(131, 20, 131, 206);
				
				//Lineas horizontales
				$pdf->Line(159, 20, 270, 20);
				$pdf->Line(159, 206, 270, 206);
				//Lineas verticales
				$pdf->Line(159, 20, 159, 206);
				$pdf->Line(270, 20, 270, 206);
				break;

			default:
				# code...
				break;
		}
	}
}

//Generar el margen reverso de cuaderno
function generar_margen_reverso($pdf, $tipo, $formato, $estado, $color, $grosor){
	if($estado == true){
		$pdf->SetDrawColor(intval(formato_rgb_rojo($color)), intval(formato_rgb_verde($color)), intval(formato_rgb_azul($color)));
		$pdf->SetLineWidth(intval($grosor));
		switch ($tipo) {
			case 1:
				switch($formato){
					case 1:
						//Lineas horizontales
						$pdf->Line(9, 31, 196, 31);
						$pdf->Line(9, 263, 196, 263);
						//Lineas verticales
						$pdf->Line(9, 31, 9, 263);
						$pdf->Line(196, 31, 196, 263);
						break;
					
					case 2:
						//Lineas horizontales
						$pdf->Line(9, 31, 196, 31);
						$pdf->Line(9, 259, 196, 259);
						//Lineas verticales
						$pdf->Line(9, 31, 9, 259);
						$pdf->Line(196, 31, 196, 259);
						break;
					
					case 3:
						//Lineas horizontales
						$pdf->Line(11, 31, 196, 31);
						$pdf->Line(11, 261, 196, 261);
						//Lineas verticales
						$pdf->Line(11, 31, 11, 261);
						$pdf->Line(196, 31, 196, 261);
						break;
					
					case 4:
						//Lineas horizontales
						$pdf->Line(14, 31, 196, 31);
						$pdf->Line(14, 262, 196, 262);
						//Lineas verticales
						$pdf->Line(14, 31, 14, 262);
						$pdf->Line(196, 31, 196, 262);
						break;
					
					default:
						break;
				}
			break;

			case 2:
				//Lineas horizontales
				$pdf->Line(7, 20, 196, 20);
				$pdf->Line(7, 131.5, 196, 131.5);
				//Lineas verticales
				$pdf->Line(7, 20, 7, 131.5);
				$pdf->Line(196, 20, 196, 131.5);

				//Lineas horizontales
				$pdf->Line(7, 158, 196, 158);
				$pdf->Line(7, 269.5, 196, 269.5);
				//Lineas verticales
				$pdf->Line(7, 158, 7, 269.5);
				$pdf->Line(196, 158, 196, 269.5);
				break;
			
			//FORMA FRANCESA
			case 3:
				//Lineas horizontales
				$pdf->Line(8, 20, 119, 20);
				$pdf->Line(8, 206, 119, 206);
				//Lineas verticales
				$pdf->Line(8, 20, 8, 206);
				$pdf->Line(119, 20, 119, 206);

				//Lineas horizontales
				$pdf->Line(147, 20, 259, 20);
				$pdf->Line(147, 206, 259, 206);
				//Lineas verticales
				$pdf->Line(147, 20, 147, 206);
				$pdf->Line(259, 20, 259, 206);
				break;

			default:
				# code...
				break;
		}
	}
}
//!--- GENERAR MARGEN

// --- GENERAR LEYENDA
function generar_leyenda($pdf, $tamanio){
	if($_POST["leyenda"] != ""){
		switch($tamanio){
			case 1:
				$pdf->Text((($pdf->GetPageWidth()/4)*3)-3, 25, $_POST["leyenda"]);
				break;

			case 2:
				$pdf->Text((($pdf->GetPageWidth()/4)*3), 14, $_POST["leyenda"]);
				$pdf->Text((($pdf->GetPageWidth()/4)*3), 152, $_POST["leyenda"]);
				break;

			case 3:
				$pdf->Text((($pdf->GetPageWidth()/4)*3)+20, 14, $_POST["leyenda"]);
				$pdf->Text((($pdf->GetPageWidth()/4)+20), 14, $_POST["leyenda"]);
				break;
		}
	}
}
//!--- GENERAR LEYENDA

// --- GENERAR LEYENDA
function generar_leyenda_reverso($pdf, $tamanio){
	if($_POST["leyenda"] != ""){
		switch($tamanio){
			case 1:
				$pdf->Text((($pdf->GetPageWidth()/4)*3)-10, 25, $_POST["leyenda"]);
				break;

			case 2:
				$pdf->Text((($pdf->GetPageWidth()/4)*3)-15, 14, $_POST["leyenda"]);
				$pdf->Text((($pdf->GetPageWidth()/4)*3)-15, 152, $_POST["leyenda"]);
				break;

			case 3:
				$pdf->Text((($pdf->GetPageWidth()/4)*3)+7, 14, $_POST["leyenda"]);
				$pdf->Text((($pdf->GetPageWidth()/4)+7), 14, $_POST["leyenda"]);
				break;
		}
	}
}
//!--- GENERAR LEYENDA

// --- GENERAR NUMERO DE PAGINA
function generar_pagina($pdf, $tamanio, $formato){
	$pdf->SetMargins(0, 0, 0);
	$pdf->SetTitle("Margen", true);
	$pdf->SetFont('Arial',"B", 12);
	if(isset($_POST["num_pagina"])){
		
		if($_POST["tamanio"] > 1){
			$cant_pagina = $_POST["cant_pagina"]/2;
		}else{
			$cant_pagina = $_POST["cant_pagina"];
		}

		for($i = 1; $i <= $cant_pagina; $i++){
			if($i%2 != 0 && isset($_POST["act_reverso"])){
				$pdf->AddPage();
				generar_serigrafia($pdf, existe_formato(), $_POST["tamanio"], $_POST["formato"]);
				generar_margen($pdf, $_POST["tamanio"], $_POST["formato"], existe_margen(), $_POST["color"], $_POST["grosor"]);
				generar_leyenda($pdf, $_POST["tamanio"]);

				switch($tamanio){
					case 1:
						$pdf->Text(204, $pdf->GetPageHeight()-5, $pdf->PageNo());
						break;

					case 2:
						$pdf->Text(205, $pdf->GetPageHeight()-5, (($i*2)-1)+2);
						$pdf->Text(205, $pdf->GetPageHeight()-143, ($i*2)-1);
						break;

					case 3:
						$pdf->Text(127, $pdf->GetPageHeight()-5, ($i*2)-1);
						$pdf->Text(266, $pdf->GetPageHeight()-5, (($i*2)-1)+2);
						break;
				}

			}else{
				$pdf->AddPage();
				generar_serigrafia_reverso($pdf, existe_formato(), $_POST["tamanio"], $_POST["formato"]);
				generar_margen_reverso($pdf, $_POST["tamanio"], $_POST["formato"], existe_margen(), $_POST["color"], $_POST["grosor"]);
				generar_leyenda_reverso($pdf, $_POST["tamanio"]);
				
				switch($tamanio){
					case 1:
						$pdf->Text(10, $pdf->GetPageHeight()-5, $pdf->PageNo());
						break;

					case 2:
						$pdf->Text(9, $pdf->GetPageHeight()-5, (($i*2)-2)+2);
						$pdf->Text(9, $pdf->GetPageHeight()-143, ($i*2)-2);
						break;

					case 3:
						$pdf->Text(10, $pdf->GetPageHeight()-5, (($i*2)-2)+2);
						$pdf->Text(149, $pdf->GetPageHeight()-5, ($i*2)-2);
						break;
				}

			}
		}
	}else{
		generar_serigrafia($pdf, existe_formato(), $_POST["tamanio"], $_POST["formato"]);
		generar_margen($pdf, $_POST["tamanio"], $_POST["formato"], existe_margen(), $_POST["color"], $_POST["grosor"]);
		generar_leyenda($pdf, $_POST["tamanio"]);

		if(isset($_POST["act_reverso"])){
			$pdf->AddPage();
			generar_serigrafia_reverso($pdf, existe_formato(), $_POST["tamanio"], $_POST["formato"]);
			generar_margen_reverso($pdf, $_POST["tamanio"], $_POST["formato"], existe_margen(), $_POST["color"], $_POST["grosor"]);
			generar_leyenda($pdf, $_POST["tamanio"]);
		}
	}
}
//!--- GENERAR NUMERO DE PAGINA

// --- INICIALIZACION DEL DOCUMENTO EN PDF
$pdf = new FPDF(generar_orientacion($_POST["tamanio"]), "mm", "letter", $_POST["formato"]);
generar_pagina($pdf, $_POST["tamanio"], $_POST["formato"]);
$pdf->Output();

?>
