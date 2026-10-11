<!-- ejemplo comun de como seran todos: web minima con formato para insertar php -->
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<!--<meta charset="utf-8" /> notacion xml vs html de etiqueta apertuda y cierre -->
		<link rel="stylesheet" href="ej1.css">
		<title>ej1.htm</title>
	</head>
	<body>
		<h1>ej1.htm</h1>
		<script src="ej1.js"></script>
<?php
echo "\t\t<p>Hola mundo</p>\n"; // ahi esta el script, lo unico que añade al 1.htm -> eso ya es backend porque genera codigo kinda I guess
?>
	</body>
</html>
