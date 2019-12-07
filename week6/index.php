
<?php
$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily';
$nav['stuff.php'] = 'Stuff';
$nav['contact.php'] = 'Contact';

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

function makeLinks($nav) {
    $myReturn = '';

foreach($nav as $key => $value) {
    if (THIS_PAGE == $key) {
    $myReturn .= '<li><a class="active" href="'.$key.'">'.$value.'</a></li>'; 
    } 
    else {
    $myReturn .= '<li><a href="'.$key.'">'.$value.'</a></li>'; //.= concatenation
    }
} return $myReturn;

} //end function

?>

<!doctype html>
<html lang="en">
<head>
<title> <?= $title ?></title>
<link href="css/styles.css" type="text/css" rel="stylesheet">
<style>
.active {
    color: red;
}
</style>
</head>

<body class="<?= $body?>">
<h1>Welcome to our home page</h1>

<nav>
<ul>
<?php
echo makeLinks($nav);
?>
</ul>
</nav>


</body>
</html>