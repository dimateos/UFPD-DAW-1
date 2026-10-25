<?php
/*
2. Busca en internet o escribe un código en PHP que pida dos números, los sume y los imprima en pantalla y explícalo línea por línea.

Aclaración: se trata de leer desde consola, no se trata de usar formularios (que no se ha explicado aún cómo recoger en PHP los valores enviados a través de un formulario HTML).
*/

$numero1 = (float) readline('Introduce el primer número: ');   // Lee el primer número desde la consola y lo convierte a numero
$numero2 = (float) readline('Introduce el segundo número: ');  // ^^ lo mismo para el segundo
$suma = $numero1 + $numero2;                                   // Suma los dos números y guarda el resultado...
echo "La suma es: $suma";                                      // Imprime la variable suma in-line con el texto
