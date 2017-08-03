<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema automatizado para margenes</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<header class="row">
			<div class="col-xs-12">
				<h4 class="text-center">Elige las opciones necesarías para crear margenes en los tamaños más usados de cuadernos o para crear el formato de un cuaderno para tu uso personal.</h4>
			</div>
		</header>
		<form action="generar_hoja.php" method="post" id="generar_hoja" target="_blank">
			<section class="row">
				<h3 class="text-center">Seleccione tamaño</h3>
				<div class="col-xs-12 col-md-3 text-center">
					<input type="radio" name="tamanio" id="tam_carta" value="1" checked>
					<label for="tam_carta">
						<div class="imagen_cont">
							<img src="images/img_carta.jpg" alt="" class="imagen img-responsive">
						</div>
						<p>Carta</p>
					</label>
				</div>
				<div class="col-xs-12 col-md-3 text-center">
					<input type="radio" name="tamanio" id="tam_cuaderno" value="2">
					<label for="tam_cuaderno">
						<div class="imagen_cont">
							<img src="images/img_profesional.jpg" alt="" class="imagen img-responsive">
						</div>
						<p>Forma Profesional</p>
					</label>
				</div>
				<div class="col-xs-12 col-md-3 text-center">
					<input type="radio" name="tamanio" id="tam_italiano" value="3">
					<label for="tam_italiano">
						<div class="imagen_cont">
							<img src="images/img_italiano.jpg" alt="" class="imagen img-responsive">
						</div>
						<p>Forma Italiana</p>
					</label>
				</div>
				<div class="col-xs-12 col-md-3 text-center">
					<input type="radio" name="tamanio" id="tam_frances" value="4">
					<label for="tam_frances">
						<div class="imagen_cont">
							<img src="images/img_frances.jpg" alt="" class="imagen img-responsive">
						</div>
						<p>Forma Francesa</p>
					</label>
				</div>
			</section>

			<section class="row">
				<h3 class="text-center">Seleccione formato</h3>
				<div class="col-xs-12 col-md-3 text-center">
					<input type="radio" name="formato" id="for_raya" value="1" checked>
					<label for="for_raya">
						<img src="images/img_raya.png" alt=""><br>
						<p>Raya</p>
					</label>
				</div>
				<div class="col-xs-12 col-md-3 text-center">
					<input type="radio" name="formato" id="for_doble_raya" value="2">
					<label for="for_doble_raya">
						<img src="images/img_doble_raya.png" alt=""><br>
						<p>Doble Raya</p>
					</label>
					
				</div>
				<div class="col-xs-12 col-md-3 text-center">
					<input type="radio" name="formato" id="for_cuadro_chico" value="3">
					<label for="for_cuadro_chico">
						<img src="images/img_cuadro_chico.png" alt=""><br>
						<p>Cuadro Chico(5mm)</p>
					</label>
					
				</div>
				<div class="col-xs-12 col-md-3 text-center">
					<input type="radio" name="formato" id="for_cuadro_grande" value="4">
					<label for="for_cuadro_grande">
						<img src="images/img_cuadro_grande.png" alt=""><br>
						<p>Cuadro Grande(7mm)</p>
					</label>
						
				</div>
			</section>

			<section class="row">
				<h3 class="text-center">Seleccione margen</h3>
				<div class="col-xs-12 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="act_margen" id="act_margen" value="true">
						</span>
						<input type="text" class="form-control" value="Activar margenes" readonly>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="texto_grosor">Grosor: </span>
						<input type="number" name="grosor" id="grosor" value="2" min="0" max="30" class="form-control">
						<span class="input-group-addon" id="texto_grosor">mm</span>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="texto_color">Color: </span>
						<input type="color" name="color" id="color" value="#000000" class="form-control">
					</div>
				</div>
			</section>

			<section class="row">
				<h3 class="text-center">Colocar sello</h3>
				<div class="col-xs-12 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="act_sello" id="act_sello" value="true">
						</span>
						<input type="text" class="form-control" value="Activar sello" readonly>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="texto_archivo_sello">Imagen </span>
						<input type="file" id="archivo_sello" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-md-4 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="texto_leyenda">Leyenda </span>
						<input type="text" id="leyenda" name="leyenda" class="form-control">
					</div>
				</div>
			</section>
			
			<section class="row">
				<h3 class="text-center">Opciones adicionales</h3>
				<div class="col-xs-12 col-md-3 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="act_formato" id="act_formato" value="true">
						</span>
						<input type="text" class="form-control" value="Activar serigrafía de cuaderno" readonly>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="act_reverso" id="act_reverso" value="true">
						</span>
						<input type="text" class="form-control" value="Generar reverso" readonly>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 text-center">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" name="num_pagina" id="num_pagina" value="true">
						</span>
						<input type="text" class="form-control" value="Mostrar número de página" readonly>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 text-center">
					<div class="input-group">
						<span class="input-group-addon" id="texto_cant_pagina">Cantidad de páginas </span>
						<input type="number" name="cant_pagina" id="cant_pagina" value="0" min="0" class="form-control">
					</div>
				</div>
			</section>
			<div class="row">
				<div class="col-xs-12 text-center"><input type="submit" class="btn btn-primary" value="Generar Hoja"></div>
			</div>
		</div>	
	</div>
</body>
</html>