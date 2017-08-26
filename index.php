<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema automatizado para margenes</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<header class="row">
			<div class="col-xs-12">
				<h2 class="text-center bold">Notebook Creator</h4>
			</div>
			<div class="col-xs-12 fondo-negro">
				<h4 class="text-center">Elige las opciones adecuadas para la creación de tu cuaderno</h4>
			</div>
		</header>
		<form action="generar_hoja.php" method="post" id="generar_hoja" target="_blank">
			<div class="col-xs-12 bg-primary">
				<h4 class="text-center bold">Seleccione un tamaño</h4>
			</div>
			<section class="col-xs-12">
				<div class="col-xs-4 text-center">
					<input type="radio" name="tamanio" id="tam_profesional" value="1" checked>
					<label for="tam_profesional" class="btn btn-warning">
						<div class="imagen_cont">
							<img src="images/tam_profesional.png" alt="" class="img-responsive">
						</div>
						<h4>Forma Profesional</h4>
					</label>
				</div>
				<div class="col-xs-4 text-center">
					<input type="radio" name="tamanio" id="tam_italiano" value="2">
					<label for="tam_italiano" class="btn btn-warning">
						<div class="imagen_cont">
							<img src="images/tam_italiano.png" alt="" class="img-responsive">
						</div>
						<h4>Forma Italiana</h4>
					</label>
				</div>
				<div class="col-xs-4 text-center">
					<input type="radio" name="tamanio" id="tam_frances" value="3">
					<label for="tam_frances" class="btn btn-warning">
						<div class="imagen_cont">
							<img src="images/tam_frances.png" alt="" class="img-responsive">
						</div>
						<h4>Forma Frances</h4>
					</label>
				</div>
			</section>
			
			<div class="col-xs-12 bg-primary">
				<h4 class="text-center bold">Seleccione un formato</h4>
			</div>
			<section class="col-xs-12">
				<div class="col-xs-3 text-center">
					<input type="radio" name="formato" id="for_raya" value="1" checked>
					<label for="for_raya" class="btn btn-warning">
						<img src="images/for_raya.png" alt="" class="img-responsive"><br>
						<h4>Raya</h4>
					</label>
				</div>
				<div class="col-xs-3 text-center">
					<input type="radio" name="formato" id="for_dobleraya" value="2">
					<label for="for_dobleraya" class="btn btn-warning">
						<img src="images/for_dobleraya.png" alt="" class="img-responsive"><br>
						<h4>Doble Raya</h4>
					</label>
				</div>
				<div class="col-xs-3 text-center">
					<input type="radio" name="formato" id="for_cuadrochico" value="3">
					<label for="for_cuadrochico" class="btn btn-warning">
						<img src="images/for_cuadrochico.png" alt="" class="img-responsive"><br>
						<h4>Cuadro Chico 5mm</h4>
					</label>
				</div>
				<div class="col-xs-3 text-center">
					<input type="radio" name="formato" id="for_cuadrogrande" value="4">
					<label for="for_cuadrogrande" class="btn btn-warning">
						<img src="images/for_cuadrogrande.png" alt="" class="img-responsive"><br>
						<h4>Cuadro Grande 7mm</h4>
					</label>
				</div>
			</section>

			<div class="col-xs-12 bg-primary">
				<h4 class="text-center bold">Colocar margen</h4>
			</div>
			<section class="col-xs-12">
				<div class="col-xs-6 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="act_margen" id="act_margen" value="true">
						</span>
						<input type="text" class="form-control" value="Activar margenes" readonly>
					</div>
				</div>
				<div class="col-xs-6 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="texto_grosor">Grosor: </span>
						<input type="number" name="grosor" id="grosor" value="2" min="0" max="30" class="form-control">
						<span class="input-group-addon" id="texto_grosor">mm</span>
					</div>
				</div>
				<div class="col-xs-6 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="texto_color">Color: </span>
						<input type="color" name="color" id="color" value="#000000" class="form-control">
					</div>
				</div>
			</section>

			<div class="col-xs-12 bg-primary">
				<h4 class="text-center bold">Colocar sello</h4>
			</div>
			<section class="col-xs-12">
				<div class="col-xs-6 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="act_sello" id="act_sello" value="true">
						</span>
						<input type="text" class="form-control" value="Activar sello" readonly>
					</div>
				</div>
				<div class="col-xs-6 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="texto_leyenda">Leyenda </span>
						<input type="text" id="leyenda" name="leyenda" class="form-control">
					</div>
				</div>
			</section>
			
			<div class="col-xs-12 bg-primary">
				<h4 class="text-center bold">Opciones de formato</h4>
			</div>
			<section class="col-xs-12">
				<div class="col-xs-6 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="act_formato" id="act_formato" value="true">
						</span>
						<input type="text" class="form-control" value="Activar serigrafía de cuaderno" readonly>
					</div>
				</div>
				<div class="col-xs-6 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="act_reverso" id="act_reverso" value="true">
						</span>
						<input type="text" class="form-control" value="Generar reverso" readonly>
					</div>
				</div>
			</section>
			
			<div class="col-xs-12 bg-primary">
				<h4 class="text-center bold">Opciones de página</h4>
			</div>
			<section class="col-xs-12">
				<div class="col-xs-6 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="num_pagina" id="num_pagina" value="true">
						</span>
						<input type="text" class="form-control" value="Mostrar número de página" readonly>
					</div>
				</div>
				<div class="col-xs-6 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="texto_cant_pagina">Cantidad de páginas </span>
						<input type="number" name="cant_pagina" id="cant_pagina" value="0" min="0" class="form-control">
					</div>
				</div>
				<div class="col-xs-6 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="inicio_num_pagina">Iniciar página desde </span>
						<input type="number" name="inicio_pagina" id="inicio_pagina" value="1" min="1" class="form-control">
					</div>
				</div>
			</section>
			<div class="col-xs-12 text-center"><input type="submit" class="btn btn-primary" value="Generar Cuaderno"></div>
		</form>	
	</div>
</body>
</html>