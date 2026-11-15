<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>ej_ud02_02</title>
	</head>
	<body>
		<h1>ej_ud02_02</h1>
<?php
if (isset($_POST["submit"]) == false) { // si no venimos del formulario ...
	$numeros = array(); // ... inicializar array
}
else { // en otro caso ...
	$numeros = unserialize($_POST["numeros"]); // obtener array de numeros
	$numeros[] = $_POST["numero"]; // agregar numero introducido por el usuario al array
}

foreach ($numeros as $numero) { // recorrer el array de numeros
	echo "\t\t<p>$numero</p>"; // mostrar numero
}
?>
		<form method="POST">
			<input type="hidden" name="numeros" value='<?php echo serialize($numeros);?>'>
			<p><label>N&uacute;mero (entre 0 y 9): <input name="numero" type="number" value="0" min="0" max="9"></label></p>
			<p><input type="submit" name="submit"></p>
		</form>
	</body>
</html>
