<!doctype html>
<html lang="en">
<head>
<title>Form 3 inside the HTML</title>
<style>
</style>
</head>

<body>

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


</body>
</html>



<?php 
// this is our form and adding additional form elements!

if(isset($_POST['name'],
$_POST['email'],
$_POST['comments'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

if(empty($name && $email && $comments)) {
echo '<h2>Error!</h2>';
echo 'Please fill out the fields.';
}
else {
    echo 'Thank you, '. $name.' <br>';
    echo 'We are confirming your email as: '. $email. '<br>';
    echo 'And your comments: '. $comments. '<br>';
}

}








