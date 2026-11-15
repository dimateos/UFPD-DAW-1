<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Ejemplo 21/10/2024 PHP</title>
	</head>
	<body>
		<h1>Ejemplo 21/10/2024 PHP</h1>
<?php
// Obtener el valor de los objetos de formulario
$nombre = $_POST["nombre"];
$fnac = $_POST["fnac"]; // formato AAAA-MM-DD

// Obtener año de nacimiento
$anyo_nac = substr($fnac, 0, 4);

// Obtener año actual
$fecha_actual = date("Y-m-d");
$anyo_actual = substr($fecha_actual, 0, 4);

// Calcular edad
$edad = $anyo_actual - $anyo_nac;

// Mostrar el saludo
echo "\t\t<p>Hola ".$nombre.", tienes ".$edad." a&ntilde;os</p>\n";
//echo "\t\t<p>Hola $nombre, tienes $edad a&ntilde;os</p>\n";
?>
		<p><a href="ejemplo_21_10_2024.htm">Volver atr&aacute;s</a></p>
	</body>
</html>
