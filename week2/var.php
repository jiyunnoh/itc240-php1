<?php 
// comment tags are green - working with variables
# one line comment
/*
multi line comments look like our css comment
*/

//variable color is light blue, semi-colon in white

$firstName = "Jiyun";
$lastName = "Noh";

// echo nl2br("$firstName $lastName \n");  

// echo "$firstName $lastName  <br>"; 
echo "$firstName $lastName";
// echo "{$firstName} {$lastName}";
echo "<br>";

echo '  '.$firstName.' '.$lastName.'  <br>';  // '.$variable.'

/* the magic with single quote surrounding a variable
'.variable.'
*/
// new line no longer works, but now there is a function

$vegetables[]= 'spinach';
$vegetables[]= 'broccoli';
$vegetables[]= 'asparagus';
$vegetables[]= 'kale';
print_r ($vegetables);


$name = "<br>Michael";
$name .= " Kim";

echo $name;

//data types inside a variable = integers
echo "<br>";

$x = 5;
$x += 5; //equals 10
echo $x; //$x equals 10
echo "<br>";

$a = 5;
$b = 5;
$c = $a + $b;
echo $c;

echo "<br>";

// $x = 10;
$x *= 5;
echo $x; //equals 50
echo "<br>";

$y = 20;
$y *=10; //equals 0
echo $y;
echo "<br>";

// Arithmetic - *, /, + and -

$newNumber = 10;
$newNumber2 = 5;
$newNumber3 = 8;
$total = $newNumber + ($newNumber2 * $newNumber3);
echo $total;
echo "<br>";
echo "<ul>";
$bookTitle = "<li>Handmaid's Tale</li>";
$bookAuthor = "<li>Margaret Atwood</li>";
$bookSaying = "<li>\"Praise be\"</li>";
$bookSaying = '<li>"Praise be"</li>';
$bookCharacter = "<li>June</li>";
$bookActor = "<li>Elizabeth Moss</li>";
echo "</ul>";
echo $bookTitle;
echo $bookAuthor;
echo $bookSaying;
echo $bookCharacter;
echo $bookActor;

$bookSaying = "<li>\"Praise be\"</li>";





?>