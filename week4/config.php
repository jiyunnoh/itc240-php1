<?php 
$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily';

// $title = basename($_SERVER['PHP_SELF'], '.php');
define('THIS_PAGE', basename($_SERVER['PHP_SELF'])); //THIS_PAGE is constant

switch(THIS_PAGE) {
case 'index.php':
$title = 'Home page of our website with switches';
break;

case 'about.php':
$title = 'About page of our website with switches';
break;

case 'daily.php':
$title = 'Daily page of our website with switches';
break;

}

?>


