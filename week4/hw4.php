<?php //adder.php

if(isset($_POST['num1'], $_POST['num2'])) { 
$num1 = $_POST['num1']; 
$num2 = $_POST['num2']; 
$myTotal = $num1 + $num2; 
echo '<h2 align="center">You added <font color="blue">'. $num1 .' </font> and '; 
echo '<font color="blue">'.$num2.' </font> and the answer is
<font color="red">'. $myTotal .' </font> !'; 
echo'<br><a href="hw4.php">Reset page</a>';
}

else {
echo ' 
<h1 align="center">Adder.php</h1>   
<form action="" method="post">  
<label>Enter the first number:</label>
<input type="text" name="num1"><br>  
<label>Enter the second number:</label>
<input type="text" name="num2"><br>  
<input type="submit" value="Add Em!!">   
</form> 
';
} 
?>

<!--
1. corrected the closing tag for php
2. added $_POST['num2']
3. corrected -= to = for $myTotal
4. corrected Num2 to num2
5. corrected "" to '' for echo
6. corrected ';} for echo inside ELSE
7. corrected \form to form
8. added labels for form
9. corrected Num1 to num1
10. corrected "Add Em!! to "Add Em!!"
11. added ; at the end of lines
12. added method for form
13. corrected style tag for h1 and h2
14. added a blank space between the opening tag for php and comments
15. placed html content in ELSE
-->
  