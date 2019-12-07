
<!doctype html>
<html lang="en">
<head>
<title> <?= $title ?></title>
<link href="css/styles.css" type="text/css" rel="stylesheet">
</head>

<body class="<?= $body?>">
<header>

</header>

<nav>
<ul>
<?php
foreach($nav as $key => $value) {
if (THIS_PAGE == $key) {
echo '<li><a class="active" href="'.$key.'">'.$value.'</a></li>'; 
} 
else {
echo '<li><a href="'.$key.'">'.$value.'</a></li>';
}
}
?>
</ul>
</nav>


<div id="wrapper">