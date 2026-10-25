<?php
/*
4. Dadas estas variables en PHP:

$a = 7;
$b = 3.5;
$c = "10";

Considerando estos valores, ¿cuáles de las siguientes expresiones son verdaderas?

a) $a / $b == 2
b) intval($c) == $a
c) $a * $b != intval($c)
d) $b ** 2 > $a
*/

$a = 7;
$b = 3.5;
$c = "10"; // intval se usa para convertir a int numero

// tests personales sobre precision de PHP
var_dump(7 / 3.5);
var_dump(7 / 3.5 === 2.0);
var_dump(sprintf('%.20f', 7 / 3.5));
var_dump(sprintf('%.20f', 1 / 3));
var_dump(sprintf('%.20f', 0.1+0.2));
var_dump(sprintf('%.20f', 0.1+0.7));

echo '$a / $b == 2: ' . ($a / $b == 2 ? 'verdadero' : 'falso') . "\n";                   // debería ser verdadero ya que la division es exacta 2.0!
echo 'intval($c) == $a: ' . (intval($c) == $a ? 'verdadero' : 'falso') . "\n";           // debería ser falso ya que c!=a
echo '$a * $b != intval($c): ' . ($a * $b != intval($c) ? 'verdadero' : 'falso') . "\n"; // debería ser verdadero ya que 7*3 da mas de 10 etc
echo '$b ** 2 > $a: ' . ($b ** 2 > $a ? 'verdadero' : 'falso') . "\n";                   // debería ser verdadero ya que 3.5 al cuadrado es mas de 9
