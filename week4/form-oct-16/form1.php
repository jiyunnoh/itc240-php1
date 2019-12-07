<?php 
// this is our form!

if (isset($_POST['name'])){
$name = $_POST['name'];
echo $name;
}

else { //show form!
echo '
<form action="" method="post">
<label>NAME</label> <br>
<input type="text" name="name"> <br>
<input type="submit" name="submit" value="Send it!">
<input type="reset" name="reset" value="Reset!">
</form>
';
}







