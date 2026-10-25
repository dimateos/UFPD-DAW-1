<?php
/*
3. Dadas estas variables en PHP:

$x = 5;
$y = 3;

¿Cuáles de las siguientes expresiones son verdaderas?

a) $x > $y && $x != $y
b) $x == $y || $x > $y
c) !($x <= $y)
d) $x + $y >= 8 && $x - $y < 2
*/

$x = 5;
$y = 3;

echo '$x > $y && $x != $y: ' . ($x > $y && $x != $y ? 'verdadero' : 'falso') . "\n";                    // debería ser verdadero ya que ambas true
echo '$x == $y || $x > $y: ' . ($x == $y || $x > $y ? 'verdadero' : 'falso') . "\n";                    // debería ser verdadero por $x > $y
echo '!($x <= $y): ' . (!($x <= $y) ? 'verdadero' : 'falso') . "\n";                                    // debería ser verdadero ya que niega falso
echo '$x + $y >= 8 && $x - $y < 2: ' . ($x + $y >= 8 && $x - $y < 2 ? 'verdadero' : 'falso') . "\n";    // debería ser falso ya que 8==8 pero 2<2 es falso