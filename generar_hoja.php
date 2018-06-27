<?php

require "fpdf/fpdf.php";

class punto{
	private $x;
	private $y;

	function __construct($xAct, $yAct){
		$this->x = $xAct;
		$this->y = $yAct;
	}

	public function obtenerX(){
		return $this->x;
	}

	public function obtenerY(){
		return $this->y;
	}
}

class documento{
	private $orientacion;
	private $tamanio;
	private $formato;
	private $formatoActivo;
	private $tipoCuerpo;
	private $tipoEncabezado;
	private $margenActivo;
	private $grosorMargen;
	private $colorMargen;
	private $numPaginasActivo;
	private $cantidadPaginas;
	private $paginaInicial;
	private $reversoActivo;
	private $puntosNormal = array();
	private $puntosReverso = array();

	function __construct($tam, $for, $forAct, $tipoFor, $tipoEnc, $margenAct, $grosor, $col, $numPag, $cantPag, $pagIni, $rev){
		$this->tamanio = $tam;
		$this->formato = $for;
		$this->formatoActivo = $forAct;
		$this->tipoCuerpo = $tipoFor; //no esta en vista
		$this->tipoEncabezado = $tipoEnc; //no esta en vista
		$this->margenActivo = $margenAct;
		$this->grosorMargen = $grosor;
		$this->colorMargen = $col;
		$this->numPaginasActivo = $numPag;
		$this->cantidadPaginas = $cantPag;
		$this->paginaInicial = $pagIni;
		$this->reversoActivo = $rev;
		$this->fpdf = new FPDF('P','mm','Letter');

	//	var_dump($this);
		$this->obtenerOrientacion($tam);
		switch($tam){
			case 1:
				$this->generarProfesionalPuntosNormal();
				if($this->verificarExistencia($rev)){
					$this->generarProfesionalPuntosReverso();
				}
				break;
		}

		$this->fpdf->SetMargins(0, 0);
		$this->fpdf->SetLineWidth(0.2);
	}

	public function verificarExistencia($valor){
		if(isset($valor)){
			return true;
		}else{
			return false;
		}
	}

	public function obtenerOrientacion($tamanio){
		if($tamanio == 3){
			$this->orientacion = "L";
		}else{
			$this->orientacion = "P";
		}
	}

	public function generarProfesionalPuntosNormal(){
		//Generar puntos del area de trabajo
		$this->puntosNormal["1tp"] = new punto(20, 15);
		$this->puntosNormal["2tp"] = new punto(201, 15);
		$this->puntosNormal["3tp"] = new punto(20, 264);
		$this->puntosNormal["4tp"] = new punto(201, 264);

		//Generar puntos del primer header
		$this->puntosNormal["1tph1"] = $this->puntosNormal["1tp"];
		$this->puntosNormal["2tph1"] = $this->puntosNormal["2tp"];
		$this->puntosNormal["3tph1"] = new punto(20, 30);
		$this->puntosNormal["4tph1"] = new punto(201, 30);

		//Generar puntos del segundo header
		$this->puntosNormal["1tph2"] = $this->puntosNormal["1tph1"];
		$this->puntosNormal["2tph2"] = $this->puntosNormal["2tph1"];
		$this->puntosNormal["3tph2"] = $this->puntosNormal["3tph1"];
		$this->puntosNormal["4tph2"] = $this->puntosNormal["4tph1"];
		$this->puntosNormal["5tph2"] = new punto(20, 22.5);
		$this->puntosNormal["6tph2"] = new punto(201, 22.5);

		//Generar puntos del tercer header
		$this->puntosNormal["1tph3"] = $this->puntosNormal["1tph2"];
		$this->puntosNormal["2tph3"] = new punto(155, 15);
		$this->puntosNormal["3tph3"] = $this->puntosNormal["3tph2"];
		$this->puntosNormal["4tph3"] = new punto(155, 30);
		$this->puntosNormal["5tph3"] = new punto(160, 15);
		$this->puntosNormal["6tph3"] = $this->puntosNormal["2tph2"];
		$this->puntosNormal["7tph3"] = new punto(160, 30);
		$this->puntosNormal["8tph3"] = $this->puntosNormal["4tph2"];

		//Generar puntos del cuarto header
		$this->puntosNormal["1tph4"] = $this->puntosNormal["1tph3"];
		$this->puntosNormal["2tph4"] = $this->puntosNormal["2tph3"];
		$this->puntosNormal["3tph4"] = $this->puntosNormal["3tph3"];
		$this->puntosNormal["4tph4"] = $this->puntosNormal["4tph3"];
		$this->puntosNormal["5tph4"] = $this->puntosNormal["5tph3"];
		$this->puntosNormal["6tph4"] = $this->puntosNormal["6tph3"];
		$this->puntosNormal["7tph4"] = $this->puntosNormal["7tph3"];
		$this->puntosNormal["8tph4"] = $this->puntosNormal["8tph3"];
		$this->puntosNormal["9tph4"] = $this->puntosNormal["5tph2"];
		$this->puntosNormal["10tph4"] = new punto(155, 22.5);
		$this->puntosNormal["11tph4"] = new punto(160, 22.5);
		$this->puntosNormal["12tph4"] = $this->puntosNormal["6tph2"];

		//Generar puntos del body
		$this->puntosNormal["1tpb"] = new punto(20, 35);
		$this->puntosNormal["2tpb"] = new punto(201, 35);
		$this->puntosNormal["3tpb"] = $this->puntosNormal["3tp"];
		$this->puntosNormal["4tpb"] = $this->puntosNormal["4tp"];
		$this->puntosNormal["1tpb"] = new punto(30, 35);
		$this->puntosNormal["2tpb"] = new punto(30, 264);

		//var_dump($this->puntosNormal);
	}

	public function generarProfesionalPuntosReverso(){
		//Generar puntos del area de trabajo
		$this->puntosReverso["1tp"] = new punto(15, 15);
		$this->puntosReverso["2tp"] = new punto(196, 15);
		$this->puntosReverso["3tp"] = new punto(15, 264);
		$this->puntosReverso["4tp"] = new punto(196, 264);

		//Generar puntos del primer header
		$this->puntosReverso["1tph1"] = $this->puntosReverso["1tp"];
		$this->puntosReverso["2tph1"] = $this->puntosReverso["2tp"];
		$this->puntosReverso["3tph1"] = new punto(15, 30);
		$this->puntosReverso["4tph1"] = new punto(196, 30);

		//Generar puntos del segundo header
		$this->puntosReverso["1tph2"] = $this->puntosReverso["1tph1"];
		$this->puntosReverso["2tph2"] = $this->puntosReverso["2tph1"];
		$this->puntosReverso["3tph2"] = $this->puntosReverso["3tph1"];
		$this->puntosReverso["4tph2"] = $this->puntosReverso["4tph1"];
		$this->puntosReverso["5tph2"] = new punto(15, 22.5);
		$this->puntosReverso["6tph2"] = new punto(196, 22.5);

		//Generar puntos del tercer header
		$this->puntosReverso["1tph3"] = $this->puntosReverso["1tph2"];
		$this->puntosReverso["2tph3"] = new punto(150, 15);
		$this->puntosReverso["3tph3"] = $this->puntosReverso["3tph2"];
		$this->puntosReverso["4tph3"] = new punto(150, 30);
		$this->puntosReverso["5tph3"] = new punto(155, 15);
		$this->puntosReverso["6tph3"] = $this->puntosReverso["2tph2"];
		$this->puntosReverso["7tph3"] = new punto(155, 30);
		$this->puntosReverso["8tph3"] = $this->puntosReverso["4tph2"];

		//Generar puntos del cuarto header
		$this->puntosReverso["1tph4"] = $this->puntosReverso["1tph3"];
		$this->puntosReverso["2tph4"] = $this->puntosReverso["2tph3"];
		$this->puntosReverso["3tph4"] = $this->puntosReverso["3tph3"];
		$this->puntosReverso["4tph4"] = $this->puntosReverso["4tph3"];
		$this->puntosReverso["5tph4"] = $this->puntosReverso["5tph3"];
		$this->puntosReverso["6tph4"] = $this->puntosReverso["6tph3"];
		$this->puntosReverso["7tph4"] = $this->puntosReverso["7tph3"];
		$this->puntosReverso["8tph4"] = $this->puntosReverso["8tph3"];
		$this->puntosReverso["9tph4"] = $this->puntosReverso["5tph2"];
		$this->puntosReverso["10tph4"] = new punto(150, 22.5);
		$this->puntosReverso["11tph4"] = new punto(155, 22.5);
		$this->puntosReverso["12tph4"] = $this->puntosReverso["6tph2"];

		//Generar puntos del body
		$this->puntosReverso["1tpb"] = new punto(15, 35);
		$this->puntosReverso["2tpb"] = new punto(196, 35);
		$this->puntosReverso["3tpb"] = $this->puntosReverso["3tp"];
		$this->puntosReverso["4tpb"] = $this->puntosReverso["4tp"];
		$this->puntosReverso["1tpb"] = new punto(25, 35);
		$this->puntosReverso["2tpb"] = new punto(25, 264);

		//var_dump($this->puntosReverso);
	}

	public function generarNuevaPagina(){
		$this->fpdf->AddPage();
	}

	public function generarProfesionalHeaderNormal(){
		$this->fpdf->SetDrawColor(184, 50, 39);
		switch($this->tipoEncabezado){
			case 1:
				//Dibuja las lineas horizontales
				$this->fpdf->Line($this->puntosNormal["1tph1"]->obtenerX(), $this->puntosNormal["1tph1"]->obtenerY(), $this->puntosNormal["2tph1"]->obtenerX(), $this->puntosNormal["2tph1"]->obtenerY());
				$this->fpdf->Line($this->puntosNormal["3tph1"]->obtenerX(), $this->puntosNormal["3tph1"]->obtenerY(), $this->puntosNormal["4tph1"]->obtenerX(), $this->puntosNormal["4tph1"]->obtenerY());
				//Dibuja las lineas verticales
				$this->fpdf->Line($this->puntosNormal["1tph1"]->obtenerX(), $this->puntosNormal["1tph1"]->obtenerY(), $this->puntosNormal["3tph1"]->obtenerX(), $this->puntosNormal["3tph1"]->obtenerY());
				$this->fpdf->Line($this->puntosNormal["2tph1"]->obtenerX(), $this->puntosNormal["2tph1"]->obtenerY(), $this->puntosNormal["4tph1"]->obtenerX(), $this->puntosNormal["4tph1"]->obtenerY());
				break;
		}
	}

	public function generarDocumento(){
		$this->generarNuevaPagina();
		$this->generarProfesionalHeaderNormal();
		$this->fpdf->Output("D", "cuaderno.pdf");
	}
}

// --- INICIALIZACION DEL DOCUMENTO EN PDF
/*$pdf = new FPDF(generar_orientacion($_POST["tamanio"]), "mm", "letter", $_POST["formato"]);
generar_pagina($pdf, $_POST["tamanio"], $_POST["formato"]);
$pdf->Output();
*/

$pTam = $_POST["tamanio"];
$pFor = $_POST["formato"];
$pTfo = 1;//$_POST["tipo-formato"]; no esta en vista
$pEnc = 1;//$_POST["tipo-encabezado"]; no esta en vista
$pMar = $_POST["margen"];
$pGro = $_POST["grosor"];
$pCol = $_POST["color"];
$pSer = $_POST["serigrafia"];
$pRev = $_POST["reverso"];
$pPag = $_POST["pagina"];
$pNum = $_POST["num-paginas"];
$pIni = $_POST["inicio-pag"];

$prueba = new documento($pTam, $pFor, $pSer, $pTfo, $pEnc, $pMar, $pGro, $pCol, $pPag, $pNum, $pIni, $pRev);
$prueba->generarDocumento();

?>
