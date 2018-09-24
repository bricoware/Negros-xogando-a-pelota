<?php
$conexion = new mysqli("localhost", "root", "", "nba");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
$consulta = "SELECT * FROM equipos";
$resultado = $conexion->query($consulta);
$equipos = [];
while($fila = $resultado->fetch_assoc()){
	array_push($equipos, $fila);
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/estilo.css" rel="stylesheet" type="text/css"</link>
</head>
<body>
	<header>asdsdadsadsa
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
	<div id="slider">
	</div>
	<section>
		<?php
			for($inicio=0; $inicio<count($equipos); $inicio++){
				$equipo = $equipos[$inicio];
				if($inicio%3 == 0){
					echo "<div>";
				}
echo '<a href="equipo.php?equipo='.$equipo['Nombre'].'">';
				
				echo "<article class='equipo'>";
				echo "<div>";
				echo "<img src='imaxes/nba.png' width=90 height=90 />";
				echo "<p>".$equipo['Ciudad']." ".$equipo['Nombre']."<p>";
				echo "<p>".$equipo['Division']."<p>";
				echo "<p>".$equipo['Conferencia']."<p>";
				echo "</div>";
				echo "</article>";
				echo '</a>';
				if($inicio%3 == 2){
					echo "</div>";
				}
				
			}
		
		?>
	
	</section>
</body>
</html>