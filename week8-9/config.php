<?php
// my config file
ob_start(); //preventing header errors before reading the whole page
define('DEBUG', 'TRUE'); //We want to see all the errors
include('credentials.php');


function myerror($myFile, $myLine, $errorMsg)
{
if(defined('DEBUG') && DEBUG)
{
echo"Error in file: <b>".$myFile."</b> on line: <b>".$myLine."</b><br />";
echo"Error Message: <b>".$errorMsg."</b><br />";
die();
}else{
        echo "I'm sorry, we have encountered an error. ";
        die();
}
}

?>
