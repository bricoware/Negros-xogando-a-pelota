<?php
	//Recupero o nome do equipo que entra na petición $_GET
	$equipo = $_GET["equipo"];
	
	$conexion = new mysqli("localhost","root","","nba");
	
	if($conexion->errno){
		echo "Houbo un erro na conexión debido a: ".$conexion->error;
		die("Detivemos a carga da páxina");
	}
	
	//Redacto a consulta que me permite recuperar a todos os xogadores do equipo que chega na supervariable asociativa $_GET
	$consulta = "SELECT * FROM jugadores WHERE Nombre_equipo=\"$equipo\"";
	
	$taboaXogadores = $conexion->query($consulta);
	
	if($conexion->errno){
		echo "Houbo un erro na consulta a táboa de xogadores debido a: ".$conexion->error;
		die("Detívose a carga da páxina");
	}
	//Creo un array que empregarei para almacenar a todos os xogadores dese clube
	$xogadores = [];
	while($filaXogador = $taboaXogadores->fetch_assoc()){
		// Emprego o método array_push(array, dato) para engadir cada ringleira da consulta no array
		array_push($xogadores, $filaXogador);
	}
	
?>
<!-- Agora que teño todos os datos almacenados comezo coa parte HTML -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="carlos comesaña">
		<meta name="description" content="Xogadores de <?php echo $equipo;?>">
		<meta name="keywords" content="<?php echo $equipo;?>, nba, xogadores">
		<title>Xogadores de <?php echo $equipo;?></title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css"></link>
		<link href="css/all.css" rel="stylesheet" type="text/css"></link>
	</head>
	<body>
		<header>
		<div>
			<img src="imaxes/nba.png" />
		</div>
		<div>
			<h1>NBA</h1>
		</div>
	</header>
	<div class="clearfix"></div>
	<nav>
		<ul>
			<a href="#"><li>Menú 1</li></a>
			<a href="#"><li>Menú 2</li></a>
			<a href="#"><li>Menú 3</li></a>
		</ul>
	</nav>
		<article>
			<table>
				<thead>
					<tr>
						<th>Código</th>
						<th>Nombre</th>
						<th>Procedencia</th>
						<th>Altura</th>
						<th>Peso</th>
						<th>Posición</th>
						<th>Accións</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
					for($contador=0; $contador<count($xogadores); $contador++){
						$xogador = $xogadores[$contador];
						$codigo = $xogador['codigo'];
						$nombre = $xogador['Nombre'];
						$procedencia = $xogador['Procedencia'];
						$altura = $xogador['Altura'];
						$peso = $xogador['Peso'];
						$posicion = $xogador['Posicion'];
						echo "<tr>";
						
							echo "<td>$codigo</td>";
							echo "<td>$nombre</td>";
							echo "<td>$procedencia</td>";
							echo "<td>$altura</td>";
							echo "<td>$peso</td>";
							echo "<td>$posicion</td>";
						?>
						<td>
							<i class="fas fa-edit"></i>
							<i class="fas fa-eraser"></i>
						</td>
						<?php
						echo "</tr>";
					}
					?>
				</tbody>
		</article>
		<footer>
		</footer>
	</body>