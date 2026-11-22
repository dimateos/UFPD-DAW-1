<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>DWES03 - Diego Mateos</title>
	</head>
	<body>
		<h1>Cálculo de la nota final</h1>
<?php

// Si no venimos del formulario, iniciar los arrays
if (isset($_POST["submit"]) == false) {
	$examenes = array();
	$tareas = array();

	// evitar que se cambie tras cada POST
	$tipo = "examen";
}

// Si ya se ha submiteado el form, obtener los valores almacenados y añadir el nuevo
else {
	$examenes = unserialize($_POST["examenes"]);
	$tareas = unserialize($_POST["tareas"]);
	$tipo = $_POST["tipo"];

	// selector "tipo" define donde meter la nota
	if ($tipo == "examen") {
		$examenes[] = $_POST["nota"];
	}
	else {
		$tareas[] = $_POST["nota"];
	}
}

// HTML del formulario de input con hidden inputs para almacenar las variables
// se ha añadido que al selector de tipo condicionalmente se active el tipo último usado usando php inline como en los inputs hidden
?>
		<form method="post">
			<p>
				<label>Tipo de elemento a evaluar:
					<select name="tipo" required>
						<option value="examen" <?php if ($tipo == "examen") { echo "selected"; } ?>>Examen</option>
						<option value="tarea" <?php if ($tipo == "tarea") { echo "selected"; } ?>>Tarea</option>
					</select>
				</label>
			</p>
			<p>
				<label>Nota (de 0 a 10):
					<input type="number" name="nota" min="0" max="10" step="1" required>
				</label>
			</p>
			<input type="hidden" name="examenes" value='<?php echo serialize($examenes);?>'>
			<input type="hidden" name="tareas" value='<?php echo serialize($tareas);?>'>
			<p><input type="submit" name="submit" value="Guardar nota"></p>
		</form>
<?php

// Calcular y mostrar la nota final (70% / 30%), se ha supuesto un 0 en caso de no haber nota del tipo
function calcularNotaFinal($examenes, $tareas) {

	// se recorre y acumula la nota (se podria haber hecho sin una funcion ya que los itero para mostrarlas)
	$totalExamenes = 0;
	foreach ($examenes as $examen) {
		$totalExamenes = $totalExamenes + $examen;
	}
	$totalTareas = 0;
	foreach ($tareas as $tarea) {
		$totalTareas = $totalTareas + $tarea;
	}

	// se supone un 0 si no hay notas + se evita dividir entre 0
	// se ha usado count en vez de sumar a una variable y contar durante los bucles
	$mediaExamenes = 0;
	if (count($examenes) > 0) {
		$mediaExamenes = $totalExamenes / count($examenes);
	}
	$mediaTareas = 0;
	if (count($tareas) > 0) {
		$mediaTareas = $totalTareas / count($tareas);
	}

	return $mediaExamenes * 0.7 + $mediaTareas * 0.3;
}

// Información sobre las notas guardadas tras el formulario
if (isset($_POST["submit"]) == true) {
	echo "\t\t<h2>Notas guardadas</h2>\n";

	// mostrar las notas de los examenes
	echo "\t\t<p>Exámenes:</p>\n";
	foreach ($examenes as $examen) {
		echo "\t\t<p>$examen</p>\n";
	}

	// mostrar las notas de las tareas
	echo "\t\t<p>Tareas:</p>\n";
	foreach ($tareas as $tarea) {
		echo "\t\t<p>$tarea</p>\n";
	}

	// la nota final se calcula con la siguiente funcion
	$notaFinal = calcularNotaFinal($examenes, $tareas);
	echo "\t\t<p>Nota final: $notaFinal</p>\n";
}
?>
	</body>
</html>
