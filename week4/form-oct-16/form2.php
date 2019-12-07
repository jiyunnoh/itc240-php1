<?php 
// this is our form and adding additional form elements!

if(isset($_POST['name'],
$_POST['email'],
$_POST['comments'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];
echo 'Thank you, '. $name.' <br>';
echo 'We are confirming your email as: '. $email. '<br>';
echo 'And your comments: '. $comments. '<br>';
}

else { //show form!
echo '
<form action="" method="post">
<label>NAME</label> <br>
<input type="text" name="name"> <br>
<label>EMAIL</label> <br>
<input type="email" name="email"> <br>
<label>COMMENTS</label> <br>
<textarea name="comments"></textarea> <br>
<input type="submit" name="submit" value="Send it!">
<input type="reset" name="reset" value="Reset!">
</form>
';
}









