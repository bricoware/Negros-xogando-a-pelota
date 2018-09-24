<?php
if(isset($_POST) && count($_POST)>0){
	$conexion = new mysqli("localhost", "root","","nba");
	if($conexion->errno){
		echo "<div>Houbo un erro na conexión que se resume en ".$conexion->error.".</div>";
		die();
	}
	$nome = $_POST['nomeUsuario'];
	$correo = $_POST['correoUsuario'];
	$nacemento = $_POST['dataUsuario'];
$consulta = "INSERT INTO suscricion (nomeUsuario, correoUsuario) VALUES(\"$nome\", \"$correo\")";
	$resultado = $conexion->query($consulta);
	if($conexion->errno){
		echo $conexion->error;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	*{
		box-sizing:border-box;
	}
	header{
		width:100%;
	}
	header > div {
		float:left;
	}
	header > div > img{
		width:20%;
	}
	header > div > h1{
		width:80%;
	}
	div.clearfix{
		clear: both;
	}
	ul{
		list-style:none;
		text-align:center;
	}
	ul > a > li{
		float:left;
		width:calc(100%/3);
	}
</style>
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
		<form id="contacto"
			  action="#"
			  method="POST">
			<div>
				<label>Nome de suscritor</label>
				<input type="text"
					   name="nomeUsuario"
					   placeholder="Escribe o teu nome"
					   maxlength="50" />
			</div>
			<div>
				<label>Correo electrónico</label>
				<input type="email"
					   name="correoUsuario"
					   maxlength="100"  />
			</div>
			<div>
				<label>Data de Nacemento</label>
				<input type="date"
					   name="dataUsuario"
					   min="2018-01-01"
					   max="<?php
								echo date("Y-m-d");
							?>"
			</div>
			<div>
				<input type="checkbox"
					   name="checkUsuario"
					   required="required"
					   value="0" />
				Estou de acordo coas condicións de contrato
			</div>
			<div>
				<input type="submit" value="Enviar" />
				<!--input type="button" value="Enviar" onclick="Javascrit:enviarFormulario();"/-->
			</div>
		</form>
	</article>
</body>
<script type="text/javascript">
	function enviarFormulario(){
		var formulario = window.document.forms['contacto'];
		console.log(formulario);
		var nomeUsuario = formulario["nomeUsuario"];
		var correoUsuario = formulario["correoUsuario"];
		var checkUsuario = formulario["checkUsuario"];
	}
</script>
</html>