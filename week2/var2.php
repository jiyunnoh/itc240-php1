<?php 
// more on variables - let's think about shopping in different countries!
// introducing new functions date('Y'); print_r(); number_format(2 arguments);


$can = 2349;
$can *= 0.76;
$can_f = number_format($can, 2);
$eur = 597;
$eur *= 1.10;
$eur_f = number_format($eur, 2);
$eng = 3267;
$eng *= 1.23;
$eng_f = number_format($eng, 2);
$total = $can + $eur + $eng;

echo "$can <br>";
echo 'I now have $'.$can_f.' dollars <br>';
echo "$eur <br>";
echo 'I now have $'.$eur_f.' dollars <br>';
echo "$eng <br>";
echo 'I now have $'.$eng_f.' dollars <br>';
echo $total;
echo '<br>';
echo 'I have a total of '.$total.' dollars to spend in the good USA! <br>';

$fahrenheit = 104;
$fahrenheit = 5/9 * ($fahrenheit - 32);

echo "$fahrenheit <br>";
echo 'A Celsius temperature is '.$fahrenheit.'  ';

?>