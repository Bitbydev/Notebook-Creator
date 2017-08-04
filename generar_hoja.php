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
		case 3:
			$orientacion = "L";
			break;
		
		default:
			$orientacion = "P";
			break;
	}
	return $orientacion;
}

//Generar función para decidir el tamaño de la página
function generar_tamanio($tamanio, $formato){
	switch ($tamanio){
		case 1:
			$tamanio = "letter";
			break;
		
		case 2:
			$tamanio = array(263, 200);
			break;
		
		case 3:
			if($formato == 3){
				$tamanio = array(212, 155);
			}else{
				$tamanio = array(210, 155);
			}
			break;
		
		case 4:
			$tamanio = array(150, 215);
			break;

		default:
			echo "ERROR: COMUNIQUESE CON EL ADMINISTRADOR DE SISTEMA";
			break;
	}
	return $tamanio;
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
					$pdf->Line(30, 12, 144.2, 12);
					$pdf->Line(30, 19.5, 144.2, 19.5);
					$pdf->Line(30, 27, 144.2, 27);
					//Lineas verticales
					$pdf->Line(30, 12, 30, 27);
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
					//Lineas horizontales - Parte Grande
					$pdf->Line(30, 12, 147, 12);
					$pdf->Line(30, 19.5, 147, 19.5);
					$pdf->Line(30, 27, 147, 27);
					//Lineas verticales
					$pdf->Line(30, 12, 30, 27);
					$pdf->Line(147, 12, 147, 27);

					//Lineas horizontales
					$pdf->Line(151, 12, 207, 12);
					$pdf->Line(151, 19.5, 207, 19.5);
					$pdf->Line(151, 27, 207, 27);
					//Lineas verticales
					$pdf->Line(151, 12, 151, 27);
					$pdf->Line(207, 12, 207, 27);
					break;

				case 3:
					//Lineas horizontales - Parte Grande
					$pdf->Line(30, 12, 143.5, 12);
					$pdf->Line(30, 19.5, 143.5, 19.5);
					$pdf->Line(30, 27, 143.5, 27);
					//Lineas verticales
					$pdf->Line(30, 12, 30, 27);
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
					$pdf->Line(30, 12, 143.5, 12);
					$pdf->Line(30, 19.5, 143.5, 19.5);
					$pdf->Line(30, 27, 143.5, 27);
					//Lineas verticales
					$pdf->Line(30, 12, 30, 27);
					$pdf->Line(143.5, 12, 143.5, 27);

					//Lineas horizontales
					$pdf->Line(147.5, 12, 205, 12);
					$pdf->Line(147.5, 19.5, 205, 19.5);
					$pdf->Line(147.5, 27, 205, 27);
					//Lineas verticales
					$pdf->Line(147.5, 12, 147.5, 27);
					$pdf->Line(205, 12, 205, 27);
					break;

				default:
					//Lineas horizontales - Parte grande
					$pdf->Line(30, 12, 144.2, 12);
					$pdf->Line(30, 19.5, 144.2, 19.5);
					$pdf->Line(30, 27, 144.2, 27);
					//Lineas verticales
					$pdf->Line(30, 12, 30, 27);
					$pdf->Line(144.2, 12, 144.2, 27);

					//Lineas horizontales
					$pdf->Line(148.2, 12, 206, 12);
					$pdf->Line(148.2, 19.5, 206, 19.5);
					$pdf->Line(148.2, 27, 206, 27);
					//Lineas verticales
					$pdf->Line(148.2, 12, 148.2, 27);
					$pdf->Line(206, 12, 206, 27);
					break;
			}
			break;
		//FORMA PROFESIONAL
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(16, 17, 189, 17);
					$pdf->Line(16, 24.5, 189, 24.5);
					$pdf->Line(16, 32, 189, 32);
					//Lineas verticales
					$pdf->Line(16, 17, 16, 32);
					$pdf->Line(189, 17, 189, 32);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(16, 17, 189, 17);
					$pdf->Line(16, 24.5, 189, 24.5);
					$pdf->Line(16, 32, 189, 32);
					//Lineas verticales
					$pdf->Line(16, 17, 16, 32);
					$pdf->Line(189, 17, 189, 32);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(16, 12, 191, 12);
					$pdf->Line(16, 22, 191, 22);
					//Lineas verticales
					$pdf->Line(16, 12, 16, 22);
					$pdf->Line(191, 12, 191, 22);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(16, 12, 191, 12);
					$pdf->Line(16, 22, 191, 22);
					//Lineas verticales
					$pdf->Line(16, 12, 16, 22);
					$pdf->Line(191, 12, 191, 22);
					break;

				default:
					//Lineas horizontales
					$pdf->Line(16, 17, 189, 17);
					$pdf->Line(16, 24.5, 189, 24.5);
					$pdf->Line(16, 32, 189, 32);
					//Lineas verticales
					$pdf->Line(16, 17, 16, 32);
					$pdf->Line(189, 17, 189, 32);
					break;
			}
			break;
		//FORMA ITALIANA
		case 3:
			switch($formato){
				case 3:
					//Lineas horizontales
					$pdf->Line(28, 11, 204, 11);
					$pdf->Line(28, 19, 204, 19);
					//Lineas verticales
					$pdf->Line(28, 11, 28, 19);
					$pdf->Line(204, 11, 204, 19);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(22, 12, 197, 12);
					$pdf->Line(22, 20, 197, 20);
					//Lineas verticales
					$pdf->Line(22, 12, 22, 20);
					$pdf->Line(197, 12, 197, 20);
					break;

				default:
					//Lineas horizontales
					$pdf->Line(28, 11, 204, 11);
					$pdf->Line(28, 19, 204, 19);
					//Lineas verticales
					$pdf->Line(28, 11, 28, 19);
					$pdf->Line(204, 11, 204, 19);
					break;
			}
			break;
		//FORMA ITALIANA
		case 4:
			switch($formato){
				case 4:
					//Lineas horizontales
					$pdf->Line(15, 11, 142, 11);
					$pdf->Line(15, 21, 142, 21);
					//Lineas verticales
					$pdf->Line(15, 11, 15, 21);
					$pdf->Line(142, 11, 142, 21);
					break;

				default:
					//Lineas horizontales
					$pdf->Line(15, 11, 142, 11);
					$pdf->Line(15, 21, 142, 21);
					//Lineas verticales
					$pdf->Line(15, 11, 15, 21);
					$pdf->Line(142, 11, 142, 21);
					break;
			}
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
					$pdf->Line(9, 12, 130.2, 12);
					$pdf->Line(9, 19.5, 130.2, 19.5);
					$pdf->Line(9, 27, 130.2, 27);
					//Lineas verticales
					$pdf->Line(9, 12, 9, 27);
					$pdf->Line(130.2, 12, 130.2, 27);

					//Lineas horizontales
					$pdf->Line(134.9, 12, 186, 12);
					$pdf->Line(134.2, 19.5, 186, 19.5);
					$pdf->Line(134.2, 27, 186, 27);
					//Lineas verticales
					$pdf->Line(134.2, 12, 134.2, 27);
					$pdf->Line(186, 12, 186, 27);
					break;

				case 2:
					//Lineas horizontales - Parte Grande
					$pdf->Line(9, 12, 130.2, 12);
					$pdf->Line(9, 19.5, 130.2, 19.5);
					$pdf->Line(9, 27, 130.2, 27);
					//Lineas verticales
					$pdf->Line(9, 12, 9, 27);
					$pdf->Line(130.2, 12, 130.2, 27);

					//Lineas horizontales
					$pdf->Line(134.2, 12, 186, 12);
					$pdf->Line(134.2, 19.5, 186, 19.5);
					$pdf->Line(134.2, 27, 186, 27);
					//Lineas verticales
					$pdf->Line(134.2, 12, 134.2, 27);
					$pdf->Line(186, 12, 186, 27);
					break;

				case 3:
					//Lineas horizontales - Parte Grande
					$pdf->Line(11, 12, 130.2, 12);
					$pdf->Line(11, 19.5, 130.2, 19.5);
					$pdf->Line(11, 27, 130.2, 27);
					//Lineas verticales
					$pdf->Line(11, 12, 11, 27);
					$pdf->Line(130.2, 12, 130.2, 27);

					//Lineas horizontales
					$pdf->Line(134.2, 12, 186, 12);
					$pdf->Line(134.2, 19.5, 186, 19.5);
					$pdf->Line(134.2, 27, 186, 27);
					//Lineas verticales
					$pdf->Line(134.2, 12, 134.2, 27);
					$pdf->Line(186, 12, 186, 27);
					break;

				case 4:
					//Lineas horizontales - Parte Grande
					$pdf->Line(11, 12, 130.2, 12);
					$pdf->Line(11, 19.5, 130.2, 19.5);
					$pdf->Line(11, 27, 130.2, 27);
					//Lineas verticales
					$pdf->Line(11, 12, 11, 27);
					$pdf->Line(130.2, 12, 130.2, 27);

					//Lineas horizontales
					$pdf->Line(134.2, 12, 186, 12);
					$pdf->Line(134.2, 19.5, 186, 19.5);
					$pdf->Line(134.2, 27, 186, 27);
					//Lineas verticales
					$pdf->Line(134.2, 12, 134.2, 27);
					$pdf->Line(186, 12, 186, 27);
					break;

				default:
					//Lineas horizontales - Parte grande
					$pdf->Line(10, 12, 130.2, 12);
					$pdf->Line(10, 19.5, 130.2, 19.5);
					$pdf->Line(10, 27, 130.2, 27);
					//Lineas verticales
					$pdf->Line(10, 12, 10, 27);
					$pdf->Line(130.2, 12, 130.2, 27);

					//Lineas horizontales
					$pdf->Line(134.2, 12, 186, 12);
					$pdf->Line(134.2, 19.5, 186, 19.5);
					$pdf->Line(134.2, 27, 186, 27);
					//Lineas verticales
					$pdf->Line(134.2, 12, 134.2, 27);
					$pdf->Line(186, 12, 186, 27);
					break;
			}
			break;
		//FORMA PROFESIONAL
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(11, 17, 184, 17);
					$pdf->Line(11, 24.5, 184, 24.5);
					$pdf->Line(11, 32, 184, 32);
					//Lineas verticales
					$pdf->Line(11, 17, 11, 32);
					$pdf->Line(184, 17, 184, 32);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(11, 17, 184, 17);
					$pdf->Line(11, 24.5, 184, 24.5);
					$pdf->Line(11, 32, 184, 32);
					//Lineas verticales
					$pdf->Line(11, 17, 11, 32);
					$pdf->Line(184, 17, 184, 32);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(9, 12, 183, 12);
					$pdf->Line(9, 22, 183, 22);
					//Lineas verticales
					$pdf->Line(9, 12, 9, 22);
					$pdf->Line(183, 12, 183, 22);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(9, 12, 183, 12);
					$pdf->Line(9, 22, 183, 22);
					//Lineas verticales
					$pdf->Line(9, 12, 9, 22);
					$pdf->Line(183, 12, 183, 22);
					break;

				default:
					//Lineas horizontales
					$pdf->Line(11, 17, 184, 17);
					$pdf->Line(11, 24.5, 184, 24.5);
					$pdf->Line(11, 32, 184, 32);
					//Lineas verticales
					$pdf->Line(11, 17, 11, 32);
					$pdf->Line(184, 17, 184, 32);
					break;
			}
			break;
		//FORMA ITALIANA
		case 3:
			switch($formato){
				case 3:
					//Lineas horizontales
					$pdf->Line(24, 11, 199, 11);
					$pdf->Line(24, 19, 199, 19);
					//Lineas verticales
					$pdf->Line(24, 11, 24, 19);
					$pdf->Line(199, 11, 199, 19);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(26, 12, 203, 12);
					$pdf->Line(26, 20, 203, 20);
					//Lineas verticales
					$pdf->Line(26, 12, 26, 20);
					$pdf->Line(203, 12, 203, 20);
					break;

				default:
					//Lineas horizontales
					$pdf->Line(24, 11, 199, 11);
					$pdf->Line(24, 19, 199, 19);
					//Lineas verticales
					$pdf->Line(24, 11, 24, 19);
					$pdf->Line(199, 11, 199, 19);
					break;
			}
			break;
		//FORMA ITALIANA
		case 4:
			switch($formato){
				case 4:
					//Lineas horizontales
					$pdf->Line(9, 11, 135, 11);
					$pdf->Line(9, 21, 135, 21);
					//Lineas verticales
					$pdf->Line(9, 11, 9, 21);
					$pdf->Line(135, 11, 135, 21);
					break;

				default:
					//Lineas horizontales
					$pdf->Line(9, 11, 135, 11);
					$pdf->Line(9, 21, 135, 21);
					//Lineas verticales
					$pdf->Line(9, 11, 9, 21);
					$pdf->Line(135, 11, 135, 21);
					break;
			}
			break;

		default:
			# code...
			break;
	}
}

//Generar margen de serigrafia del cuerpo del cuaderno
function generar_body($pdf, $tipo, $formato){
	switch($tipo){
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(30, 31, 207, 31);
					$pdf->Line(30, 263, 207, 263);
					//Lineas verticales
					$pdf->Line(30, 31, 30, 263);
					$pdf->Line(207, 31, 207, 263);
					break;
				
				case 2:
					//Lineas horizontales
					$pdf->Line(30, 31, 207, 31);
					$pdf->Line(30, 259, 207, 259);
					//Lineas verticales
					$pdf->Line(30, 31, 30, 259);
					$pdf->Line(207, 31, 207, 259);
					break;
				
				case 3:
					//Lineas horizontales
					$pdf->Line(30, 31, 205, 31);
					$pdf->Line(30, 261, 205, 261);
					//Lineas verticales
					$pdf->Line(30, 31, 30, 261);
					$pdf->Line(205, 31, 205, 261);
					break;
				
				case 4:
					//Lineas horizontales
					$pdf->Line(30, 31, 205, 31);
					$pdf->Line(30, 262, 205, 262);
					//Lineas verticales
					$pdf->Line(30, 31, 30, 262);
					$pdf->Line(205, 31, 205, 262);
					break;
				
				default:
					break;
			}
			break;
		//FORMA PROFESIONAL
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(16, 36, 189, 36);
					$pdf->Line(16, 254, 189, 254);
					//Lineas verticales
					$pdf->Line(16, 36, 16, 254);
					$pdf->Line(189, 36, 189, 254);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(16, 36, 189, 36);
					$pdf->Line(16, 254, 189, 254);
					//Lineas verticales
					$pdf->Line(16, 36, 16, 254);
					$pdf->Line(189, 36, 189, 254);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(16, 27, 191, 27);
					$pdf->Line(16, 247, 191, 247);
					//Lineas verticales
					$pdf->Line(16, 27, 16, 247);
					$pdf->Line(191, 27, 191, 247);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(16, 27, 191, 27);
					$pdf->Line(16, 247, 191, 247);
					//Lineas verticales
					$pdf->Line(16, 27, 16, 247);
					$pdf->Line(191, 27, 191, 247);
					break;
			}
			break;
		//FORMA ITALIANA
		case 3:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(12, 24, 204, 24);
					$pdf->Line(12, 145, 204, 145);
					//Lineas verticales
					$pdf->Line(12, 24, 12, 145);
					$pdf->Line(204, 24, 204, 145);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(12, 24, 204, 24);
					$pdf->Line(12, 145, 204, 145);
					//Lineas verticales
					$pdf->Line(12, 24, 12, 145);
					$pdf->Line(204, 24, 204, 145);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(12, 24, 204, 24);
					$pdf->Line(12, 145, 204, 145);
					//Lineas verticales
					$pdf->Line(12, 24, 12, 145);
					$pdf->Line(204, 24, 204, 145);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(6, 24, 197, 24);
					$pdf->Line(6, 145, 197, 145);
					//Lineas verticales
					$pdf->Line(6, 24, 6, 145);
					$pdf->Line(197, 24, 197, 145);
					break;
			}
			break;
		//FORMA FRANCESA
		case 4:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(15, 23, 142, 23);
					$pdf->Line(15, 205, 142, 205);
					//Lineas verticales
					$pdf->Line(15, 23, 15, 205);
					$pdf->Line(142, 23, 142, 205);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(15, 23, 142, 23);
					$pdf->Line(15, 205, 142, 205);
					//Lineas verticales
					$pdf->Line(15, 23, 15, 205);
					$pdf->Line(142, 23, 142, 205);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(15, 23, 142, 23);
					$pdf->Line(15, 205, 142, 205);
					//Lineas verticales
					$pdf->Line(15, 23, 15, 205);
					$pdf->Line(142, 23, 142, 205);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(15, 23, 142, 23);
					$pdf->Line(15, 205, 142, 205);
					//Lineas verticales
					$pdf->Line(15, 23, 15, 205);
					$pdf->Line(142, 23, 142, 205);
					break;
			}
			break;
		default:
			# code...
			break;
	}
}

//Generar reverso del margen de serigrafia del cuerpo del cuaderno
function generar_body_reverso($pdf, $tipo, $formato){
	switch($tipo){
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(9, 31, 186, 31);
					$pdf->Line(9, 263, 186, 263);
					//Lineas verticales
					$pdf->Line(9, 31, 9, 263);
					$pdf->Line(186, 31, 186, 263);
					break;
				
				case 2:
					//Lineas horizontales
					$pdf->Line(9, 31, 186, 31);
					$pdf->Line(9, 259, 186, 259);
					//Lineas verticales
					$pdf->Line(9, 31, 9, 259);
					$pdf->Line(186, 31, 186, 259);
					break;
				
				case 3:
					//Lineas horizontales
					$pdf->Line(11, 31, 186, 31);
					$pdf->Line(11, 261, 186, 261);
					//Lineas verticales
					$pdf->Line(11, 31, 11, 261);
					$pdf->Line(186, 31, 186, 261);
					break;
				
				case 4:
					//Lineas horizontales
					$pdf->Line(11, 31, 186, 31);
					$pdf->Line(11, 262, 186, 262);
					//Lineas verticales
					$pdf->Line(11, 31, 11, 262);
					$pdf->Line(186, 31, 186, 262);
					break;
				
				default:
					break;
			}
			break;
		//FORMA PROFESIONAL
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(11, 36, 184, 36);
					$pdf->Line(11, 254, 184, 254);
					//Lineas verticales
					$pdf->Line(11, 36, 11, 254);
					$pdf->Line(184, 36, 184, 254);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(11, 36, 184, 36);
					$pdf->Line(11, 254, 184, 254);
					//Lineas verticales
					$pdf->Line(11, 36, 11, 254);
					$pdf->Line(184, 36, 184, 254);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(9, 27, 183, 27);
					$pdf->Line(9, 247, 183, 247);
					//Lineas verticales
					$pdf->Line(9, 27, 9, 247);
					$pdf->Line(183, 27, 183, 247);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(9, 27, 183, 27);
					$pdf->Line(9, 247, 183, 247);
					//Lineas verticales
					$pdf->Line(9, 27, 9, 247);
					$pdf->Line(183, 27, 183, 247);
					break;
			}
			break;
		//FORMA ITALIANA
		case 3:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(7, 24, 199, 24);
					$pdf->Line(7, 145, 199, 145);
					//Lineas verticales
					$pdf->Line(7, 24, 7, 145);
					$pdf->Line(199, 24, 199, 145);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(7, 24, 199, 24);
					$pdf->Line(7, 145, 199, 145);
					//Lineas verticales
					$pdf->Line(7, 24, 7, 145);
					$pdf->Line(199, 24, 199, 145);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(7, 24, 199, 24);
					$pdf->Line(7, 145, 199, 145);
					//Lineas verticales
					$pdf->Line(7, 24, 7, 145);
					$pdf->Line(199, 24, 199, 145);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(11, 24, 203, 24);
					$pdf->Line(11, 145, 203, 145);
					//Lineas verticales
					$pdf->Line(11, 24, 11, 145);
					$pdf->Line(203, 24, 203, 145);
					break;
			}
			break;
		//FORMA FRANCESA
		case 4:
			switch($formato){
				case 1:
					//Lineas horizontales
					$pdf->Line(9, 23, 135, 23);
					$pdf->Line(9, 205, 135, 205);
					//Lineas verticales
					$pdf->Line(9, 23, 9, 205);
					$pdf->Line(135, 23, 135, 205);
					break;

				case 2:
					//Lineas horizontales
					$pdf->Line(9, 23, 135, 23);
					$pdf->Line(9, 205, 135, 205);
					//Lineas verticales
					$pdf->Line(9, 23, 9, 205);
					$pdf->Line(135, 23, 135, 205);
					break;

				case 3:
					//Lineas horizontales
					$pdf->Line(9, 23, 135, 23);
					$pdf->Line(9, 205, 135, 205);
					//Lineas verticales
					$pdf->Line(9, 23, 9, 205);
					$pdf->Line(135, 23, 135, 205);
					break;

				case 4:
					//Lineas horizontales
					$pdf->Line(9, 23, 135, 23);
					$pdf->Line(9, 205, 135, 205);
					//Lineas verticales
					$pdf->Line(9, 23, 9, 205);
					$pdf->Line(135, 23, 135, 205);
					break;
			}
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
		//FORMA CARTA
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 29; $i++){
						$pdf->Line(30, 31+(8*$i), 207, 31+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 20; $i++){
						$pdf->Line(30, 31+(12*$i)-4, 207, 31+(12*$i)-4);
					}

					for($i = 1; $i < 19; $i++){
						$pdf->Line(30, 31+(12*$i), 207, 31+(12*$i));
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 46; $i++){
						$pdf->Line(30, 31+(5*$i), 205, 31+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 35; $i++){
						$pdf->Line(30+(5*$i), 31, 30+(5*$i), 261);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 33; $i++){
						$pdf->Line(30, 31+(7*$i), 205, 31+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 25; $i++){
						$pdf->Line(30+(7*$i), 31, 30+(7*$i), 262);
					}
					break;
			}
			break;
		//FORMA PROFESIONAL
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 28; $i++){
						$pdf->Line(16, 36+(8*$i), 189, 36+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 20; $i++){
						$pdf->Line(16, 36+(11.5*$i), 189, 36+(11.5*$i));
						$pdf->Line(16, 36+(11.5*$i)-4, 189, 36+(11.5*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 44; $i++){
						$pdf->Line(16, 27+(5*$i), 191, 27+(5*$i));
					}
					//Lineas verticales
					for($i = 0; $i < 36; $i++){
						$pdf->Line(16+(5*$i), 27, 16+(5*$i), 247);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 32; $i++){
						$pdf->Line(16, 27+(7*$i), 191, 27+(7*$i));
					}
					//Lineas verticales
					for($i = 0; $i < 26; $i++){
						$pdf->Line(16+(7*$i), 27, 16+(7*$i), 247);
					}
					break;
			}
			break;
		//FORMA ITALIANA
		case 3:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(12, 24+(8*$i), 204, 24+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 11; $i++){
						$pdf->Line(12, 24+(12*$i), 204, 24+(12*$i));
						$pdf->Line(12, 24+(12*$i)-4, 204, 24+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 25; $i++){
						$pdf->Line(12, 24+(5*$i), 204, 24+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 4; $i++){
						$pdf->Line(12+(5*$i), 24, 12+(5*$i), 145);
					}
					for($i = 0; $i < 36; $i++){
						$pdf->Line(28+(5*$i), 24, 28+(5*$i), 145);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 18; $i++){
						$pdf->Line(6, 24+(7*$i), 197, 24+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 3; $i++){
						$pdf->Line(6+(7*$i), 24, 6+(7*$i), 145);
					}
					//Lineas verticales
					for($i = 0; $i < 25; $i++){
						$pdf->Line(22+(7*$i), 24, 22+(7*$i), 145);
					}
					break;
			}
			break;
		//FORMA FRANCESA
		case 4:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 23; $i++){
						$pdf->Line(15, 23+(8*$i), 142, 23+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(15, 23+(12*$i), 142, 23+(12*$i));
						$pdf->Line(15, 23+(12*$i)-4, 142, 23+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 37; $i++){
						$pdf->Line(15, 23+(5*$i), 142, 23+(5*$i));
					}
					//Lineas verticales
					for($i = 0; $i < 26; $i++){
						$pdf->Line(15+(5*$i), 23, 15+(5*$i), 205);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 27; $i++){
						$pdf->Line(15, 23+(7*$i), 142, 23+(7*$i));
					}
					//Lineas verticales
					for($i = 0; $i < 19; $i++){
						$pdf->Line(15+(7*$i), 23, 15+(7*$i), 205);
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
		//FORMA CARTA
		case 1:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 29; $i++){
						$pdf->Line(9, 31+(8*$i), 186, 31+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 20; $i++){
						$pdf->Line(9, 31+(12*$i)-4, 186, 31+(12*$i)-4);
					}

					for($i = 1; $i < 19; $i++){
						$pdf->Line(9, 31+(12*$i), 186, 31+(12*$i));
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 46; $i++){
						$pdf->Line(11, 31+(5*$i), 186, 31+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 35; $i++){
						$pdf->Line(11+(5*$i), 31, 11+(5*$i), 261);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 33; $i++){
						$pdf->Line(11, 31+(7*$i), 186, 31+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 25; $i++){
						$pdf->Line(11+(7*$i), 31, 11+(7*$i), 262);
					}
					break;
			}
			break;
		//FORMA PROFESIONAL
		case 2:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 28; $i++){
						$pdf->Line(11, 36+(8*$i), 184, 36+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 19; $i++){
						$pdf->Line(11, 36+(12*$i), 184, 36+(12*$i));
						$pdf->Line(11, 36+(12*$i)-4, 184, 36+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 44; $i++){
						$pdf->Line(9, 27+(5*$i), 183, 27+(5*$i));
					}
					//Lineas verticales
					for($i = 0; $i < 34; $i++){
						$pdf->Line(15+(5*$i), 27, 15+(5*$i), 247);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 32; $i++){
						$pdf->Line(9, 27+(7*$i), 183, 27+(7*$i));
					}
					//Lineas verticales
					for($i = 0; $i < 26; $i++){
						$pdf->Line(15+(7*$i), 27, 15+(7*$i), 247);
					}
					break;
			}
			break;
		//FORMA ITALIANA
		case 3:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(7, 24+(8*$i), 199, 24+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 11; $i++){
						$pdf->Line(7, 24+(12*$i), 199, 24+(12*$i));
						$pdf->Line(7, 24+(12*$i)-4, 199, 24+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 25; $i++){
						$pdf->Line(7, 24+(5*$i), 199, 24+(5*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 4; $i++){
						$pdf->Line(7+(5*$i), 24, 7+(5*$i), 145);
					}
					for($i = 0; $i < 36; $i++){
						$pdf->Line(24+(5*$i), 24, 24+(5*$i), 145);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 18; $i++){
						$pdf->Line(11, 24+(7*$i), 203, 24+(7*$i));
					}
					//Lineas verticales
					for($i = 1; $i < 3; $i++){
						$pdf->Line(11+(7*$i), 24, 11+(7*$i), 145);
					}
					//Lineas verticales
					for($i = 0; $i < 25; $i++){
						$pdf->Line(26+(7*$i), 24, 26+(7*$i), 145);
					}
					break;
			}
			break;
		//FORMA FRANCESA
		case 4:
			switch($formato){
				case 1:
					//Lineas horizontales
					for($i = 1; $i < 23; $i++){
						$pdf->Line(9, 23+(8*$i), 135, 23+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 16; $i++){
						$pdf->Line(9, 23+(12*$i), 135, 23+(12*$i));
						$pdf->Line(9, 23+(12*$i)-4, 135, 23+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 37; $i++){
						$pdf->Line(9, 23+(5*$i), 135, 23+(5*$i));
					}
					//Lineas verticales
					for($i = 0; $i < 26; $i++){
						$pdf->Line(9+(5*$i), 23, 9+(5*$i), 205);
					}
					break;

				case 4:
					//Lineas horizontales
					for($i = 1; $i < 27; $i++){
						$pdf->Line(9, 23+(7*$i), 135, 23+(7*$i));
					}
					//Lineas verticales
					for($i = 0; $i < 19; $i++){
						$pdf->Line(9+(7*$i), 23, 9+(7*$i), 205);
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
						$pdf->Line(30, 31, 207, 31);
						$pdf->Line(30, 263, 207, 263);
						//Lineas verticales
						$pdf->Line(30, 31, 30, 263);
						$pdf->Line(207, 31, 207, 263);
						break;
					
					case 2:
						//Lineas horizontales
						$pdf->Line(30, 31, 207, 31);
						$pdf->Line(30, 259, 207, 259);
						//Lineas verticales
						$pdf->Line(30, 31, 30, 259);
						$pdf->Line(207, 31, 207, 259);
						break;
					
					case 3:
						//Lineas horizontales
						$pdf->Line(30, 31, 205, 31);
						$pdf->Line(30, 261, 205, 261);
						//Lineas verticales
						$pdf->Line(30, 31, 30, 261);
						$pdf->Line(205, 31, 205, 261);
						break;
					
					case 4:
						//Lineas horizontales
						$pdf->Line(30, 31, 205, 31);
						$pdf->Line(30, 262, 205, 262);
						//Lineas verticales
						$pdf->Line(30, 31, 30, 262);
						$pdf->Line(205, 31, 205, 262);
						break;
					
					default:
						break;
				}
			break;
			case 2:
				if($formato == 2 || $formato == 1){
					//Lineas horizontales
					$pdf->Line(22, 36, 189, 36);
					$pdf->Line(22, 254, 189, 254);
					//Lineas verticales
					$pdf->Line(22, 36, 22, 254);
					$pdf->Line(189, 36, 189, 254);
				}else{
					//Lineas horizontales
					$pdf->Line(23, 27, 191, 27);
					$pdf->Line(23, 247, 191, 247);
					//Lineas verticales
					$pdf->Line(23, 27, 23, 247);
					$pdf->Line(191, 27, 191, 247);
				}
				break;
			
			case 3:
				if($formato < 4){
					//Lineas horizontales
					$pdf->Line(28, 24, 204, 24);
					$pdf->Line(28, 145, 204, 145);
					//Lineas verticales
					$pdf->Line(28, 24, 28, 145);
					$pdf->Line(204, 24, 204, 145);
				}else{
					//Lineas horizontales
					$pdf->Line(22, 24, 197, 24);
					$pdf->Line(22, 145, 197, 145);
					//Lineas verticales
					$pdf->Line(22, 24, 22, 145);
					$pdf->Line(197, 24, 197, 145);
				}
				break;
			
			case 4:
				//Lineas horizontales
				$pdf->Line(15, 23, 142, 23);
				$pdf->Line(15, 205, 142, 205);
				//Lineas verticales
				$pdf->Line(15, 23, 15, 205);
				$pdf->Line(142, 23, 142, 205);
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
						$pdf->Line(9, 31, 186, 31);
						$pdf->Line(9, 263, 186, 263);
						//Lineas verticales
						$pdf->Line(9, 31, 9, 263);
						$pdf->Line(186, 31, 186, 263);
						break;
					
					case 2:
						//Lineas horizontales
						$pdf->Line(9, 31, 186, 31);
						$pdf->Line(9, 259, 186, 259);
						//Lineas verticales
						$pdf->Line(9, 31, 9, 259);
						$pdf->Line(186, 31, 186, 259);
						break;
					
					case 3:
						//Lineas horizontales
						$pdf->Line(11, 31, 186, 31);
						$pdf->Line(11, 261, 186, 261);
						//Lineas verticales
						$pdf->Line(11, 31, 11, 261);
						$pdf->Line(186, 31, 186, 261);
						break;
					
					case 4:
						//Lineas horizontales
						$pdf->Line(11, 31, 186, 31);
						$pdf->Line(11, 262, 186, 262);
						//Lineas verticales
						$pdf->Line(11, 31, 11, 262);
						$pdf->Line(186, 31, 186, 262);
						break;
					
					default:
						break;
				}
			break;

			case 2:
				if($formato == 2 || $formato == 1){
					//Lineas horizontales
					$pdf->Line(16, 36, 184, 36);
					$pdf->Line(16, 254, 184, 254);
					//Lineas verticales
					$pdf->Line(16, 36, 16, 254);
					$pdf->Line(184, 36, 184, 254);
				}else{
					//Lineas horizontales
					$pdf->Line(15, 27, 183, 27);
					$pdf->Line(15, 247, 183, 247);
					//Lineas verticales
					$pdf->Line(15, 27, 15, 247);
					$pdf->Line(183, 27, 183, 247);
				}
				break;
			
			case 3:
				if($formato < 4){
					//Lineas horizontales
					$pdf->Line(24, 24, 199, 24);
					$pdf->Line(24, 145, 199, 145);
					//Lineas verticales
					$pdf->Line(24, 24, 24, 145);
					$pdf->Line(199, 24, 199, 145);
				}else{
					//Lineas horizontales
					$pdf->Line(26, 24, 203, 24);
					$pdf->Line(26, 145, 203, 145);
					//Lineas verticales
					$pdf->Line(26, 24, 26, 145);
					$pdf->Line(203, 24, 203, 145);
				}
				break;
			
			case 4:
				//Lineas horizontales
				$pdf->Line(9, 23, 135, 23);
				$pdf->Line(9, 205, 135, 205);
				//Lineas verticales
				$pdf->Line(9, 23, 9, 205);
				$pdf->Line(135, 23, 135, 205);
				break;
			
			default:
				# code...
				break;
		}
	}
}
//!--- GENERAR MARGEN

// --- GENERAR LEYENDA
function generar_leyenda($pdf, $tamanio, $formato){
	if($_POST["leyenda"] != ""){
		if($tamanio == 1){
			if($pdf->PageNo()%2 == 0){
				$pdf->Text((($pdf->GetPageWidth()/4)*3)-20, 25, $_POST["leyenda"]);
			}else{
				$pdf->Text((($pdf->GetPageWidth()/4)*3), 25, $_POST["leyenda"]);
			}
		}else{
			if($tamanio < 3 && $formato < 3){
				$pdf->Text(($pdf->GetPageWidth()/2)-($pdf->GetStringWidth($_POST["leyenda"])/2), 22, $_POST["leyenda"]);
			}else{
				$pdf->Text(($pdf->GetPageWidth()/2)-($pdf->GetStringWidth($_POST["leyenda"])/2), 17, $_POST["leyenda"]);
			}
		}
	}
}
//!--- GENERAR LEYENDA

// --- GENERAR NUMERO DE PAGINA
function generar_pagina_extra($pdf){
	if(isset($_POST["num_pagina"])){
		$pdf->Text(($pdf->GetPageWidth()/2)-($pdf->GetStringWidth($_POST["cant_pagina"])/2), $pdf->GetPageHeight()-2, $pdf->PageNo());
		for($i = 2; $i <= $_POST["cant_pagina"]; $i++){
			$pdf->AddPage();
			if($i%2 == 0 && isset($_POST["act_reverso"])){
				generar_serigrafia_reverso($pdf, existe_formato(), $_POST["tamanio"], $_POST["formato"]);
				generar_margen_reverso($pdf, $_POST["tamanio"], $_POST["formato"], existe_margen(), $_POST["color"], $_POST["grosor"]);
				generar_leyenda_reverso($pdf, $_POST["tamanio"], $_POST["formato"]);
			}else{
				generar_serigrafia($pdf, existe_formato(), $_POST["tamanio"], $_POST["formato"]);
				generar_margen($pdf, $_POST["tamanio"], $_POST["formato"], existe_margen(), $_POST["color"], $_POST["grosor"]);
				generar_leyenda($pdf, $_POST["tamanio"], $_POST["formato"]);
			}
			$pdf->Text(($pdf->GetPageWidth()/2)-($pdf->GetStringWidth($_POST["cant_pagina"])/2), $pdf->GetPageHeight()-2, $pdf->PageNo());
		}
	}else{
		if(isset($_POST["act_reverso"])){
			$pdf->AddPage();
			generar_serigrafia_reverso($pdf, existe_formato(), $_POST["tamanio"], $_POST["formato"]);
			generar_margen_reverso($pdf, $_POST["tamanio"], $_POST["formato"], existe_margen(), $_POST["color"], $_POST["grosor"]);
			generar_leyenda($pdf, $_POST["tamanio"], $_POST["formato"]);
		}
	}
}
//!--- GENERAR NUMERO DE PAGINA

// --- INICIALIZACION DEL DOCUMENTO EN PDF
$pdf = new FPDF(generar_orientacion($_POST["tamanio"]), "mm", generar_tamanio($_POST["tamanio"], $_POST["formato"]));
$pdf->AddPage();
$pdf->SetMargins(0, 0, 0);
$pdf->SetTitle("Margen", true);
$pdf->SetFont('Arial',"B", 12);
generar_serigrafia($pdf, existe_formato(), $_POST["tamanio"], $_POST["formato"]);
generar_margen($pdf, $_POST["tamanio"], $_POST["formato"], existe_margen(), $_POST["color"], $_POST["grosor"]);
generar_leyenda($pdf, $_POST["tamanio"], $_POST["formato"]);
generar_pagina_extra($pdf);
$pdf->Output();

?>
