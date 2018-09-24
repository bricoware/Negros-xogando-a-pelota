<?php

	$conexion = new mysqli("localhost", "root", "", "nba");
	
	if($conexion->errno){
		echo "Houbo un erro coa chamada a Base de Datos".
	}
	
	$consulta = "SELECT * FROM partidos INNER JOIN equipos ON partidos.equipo_local"



?>
<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Partidos NBA</title>
		<meta name="author" content="Ccomesana">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width; zoom=1.0">
	</head>
	<body>
		<header></header>
		<nav></nav>
		<section>
			<div>
				<form action="#" method="GET">
					<?php
$conexion = new mysqli("localhost","root","","nba");

if($conexion->errno){
	echo "Houbo un erro conectando coa Base de Datos";
}						

$consulta = "SELECT DISTINCT temporada FROM partidos ORDER BY temporada";
						
$resposta = $conexion->query($consulta);

$tempada = $resposta->fetch_all(MYSQLI_NUM);

					?>
					<select name="tempada">
						<?php
							for($contador=0; 
								$contador<count($tempada); 
								$contador++){
								
								$opcion = $tempada[$contador][0];
								
								echo "<option value='$opcion'>
										$opcion
									  </option>";
							}
						?>
					</select>
					<input type="submit" value="SELECCIONAR" />
				</form>
			</div>
		</section>
		<footer></footer>
	</body>
</html>

















