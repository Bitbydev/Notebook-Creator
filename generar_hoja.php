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

//Generar margen de serigrafia del cuerpo del cuaderno
function generar_body($pdf, $tipo, $formato){
	$pdf->SetDrawColor(28, 142, 192);
	$pdf->SetLineWidth(0.1);//SetLineWidth se maneja en cm, no en la medida que establezcas
	switch ($tipo){
		//FORMA CARTA
		case 1:
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
					for($i = 1; $i < 28; $i++){
						$pdf->Line(16, 36+(8*$i), 189, 36+(8*$i));
					}
					break;

				case 2:
					//Lineas horizontales
					for($i = 1; $i < 19; $i++){
						$pdf->Line(16, 36+(12*$i), 189, 36+(12*$i));
						$pdf->Line(16, 36+(12*$i)-4, 189, 36+(12*$i)-4);
					}
					break;

				case 3:
					//Lineas horizontales
					for($i = 1; $i < 44; $i++){
						$pdf->Line(16, 27+(5*$i), 191, 27+(5*$i));
					}
					//Lineas verticales
					for($i = 0; $i < 34; $i++){
						$pdf->Line(22+(5*$i), 27, 22+(5*$i), 247);
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
//!--- GENERAR SERIGRAFIA DE FORMATO

//Elegir el formato de serigrafia
function generar_serigrafia($pdf, $estado, $tipo, $formato){
	if($estado == true){
		generar_header($pdf, $tipo, $formato);
		generar_body($pdf, $tipo, $formato);
		generar_formato($pdf, $tipo, $formato);
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
//!--- GENERAR MARGEN

// --- GENERAR LEYENDA
function generar_leyenda($pdf, $tamanio, $formato){
	if($_POST["leyenda"] != ""){
		if($tamanio < 3 && $formato < 3){
			$pdf->Text(($pdf->GetPageWidth()/2)-($pdf->GetStringWidth($_POST["leyenda"])/2), 22, $_POST["leyenda"]);
		}else{
			$pdf->Text(($pdf->GetPageWidth()/2)-($pdf->GetStringWidth($_POST["leyenda"])/2), 17, $_POST["leyenda"]);
		}
	}
}
//!--- GENERAR LEYENDA

// --- INICIALIZACION DEL DOCUMENTO EN PDF
$pdf = new FPDF(generar_orientacion($_POST["tamanio"]), "mm", generar_tamanio($_POST["tamanio"], $_POST["formato"]));
$pdf->AddPage();
$pdf->SetMargins(0, 0, 0);
$pdf->SetTitle("Margen", true);
$pdf->SetFont('Arial',"B", 12);
generar_serigrafia($pdf, existe_formato(), $_POST["tamanio"], $_POST["formato"]);
generar_margen($pdf, $_POST["tamanio"], $_POST["formato"], existe_margen(), $_POST["color"], $_POST["grosor"]);
generar_leyenda($pdf, $_POST["tamanio"], $_POST["formato"]);
$pdf->Output();

?>
