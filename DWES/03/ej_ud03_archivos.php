<!doctype html>
<!-- queremos que el documento HTML ocupe el 100% de la pantalla -->
<html lang="es" style="height: 100%">
	<head>
		<meta charset="utf-8">
		<title>Semana presencial (evaluaci&oacute;n parcial)</title>
		<script>
			// validacion JavaScript: solo aceptamos archivos .jpg
			function f() {
				if (myform.fichero.value.split('.').pop() != "jpg") {
					alert("Error: tipo de archivo incorrecto (no es jpg)");
					return false;
				}
				return true;
			}
		</script>
	</head>
	<!-- queremos que el cuerpo del documento HTML ocupe el 100% del documento HTML -->
	<body style="height: 100%">
		<h1>Semana presencial (evaluaci&oacute;n parcial)</h1>
		<!-- queremos que la imagen ocupe el 50% del cuerpo -->
		<img src="img.jpg" alt="img" style="height: 50%; border: 1em solid black">
		<!-- formulario preparado para poder subir al servidor el contenido de un fichero que seleccionamos en local -->
		<form name="myform" method="post" enctype="multipart/form-data" onsubmit="return f();">
			<!-- si descomentamos el input hidden, limitamos el "tamanyo" del archivo -->
			<!--<input type="hidden" name="MAX_FILE_SIZE" value="1">-->
			<p><input type="file" name="fichero" accept=".jpg" required></p>
			<p><input type="submit" name="submit"></p>
		</form>
<?php
if (isset($_POST["submit"]) == true) { // si venimos del formulario ...
	if (is_uploaded_file($_FILES["fichero"]["tmp_name"]) == false) {
		// Error al subir el archivo
		echo "\t\t<p style='color: red'>Error al subir el archivo: ".$_FILES["fichero"]["error"]."</p>\n";
	}
	elseif ($_FILES["fichero"]["type"] != "image/jpeg") {
		// Error: tipo de archivo incorrecto (no es jpg)
		echo "\t\t<p style='color: red'>Error: tipo de archivo incorrecto (no es jpg)</p>\n";
		return;
	}
	else {
		// movemos el archivo de la ruta temporal del servidor, para sobreescribir el archivo img.jpg
		move_uploaded_file($_FILES["fichero"]["tmp_name"], "./img.jpg");
	}
}
?>
	</body>
</html>
