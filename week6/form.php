<?php 
// This will be my emailable form

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['name'],
             $_POST['email'],
             $_POST['gender'],
             $_POST['comments'],
             $_POST['wines'])) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $comments = $_POST['comments'];
                $wines = $_POST['wines'];

                $male = 'unchecked';
                $female = 'unchecked';
                $cab = 'unchecked';
                $merlot = 'unchecked';
                $syrah = 'unchecked';
                $malbec = 'unchecked';

                if($gender == 'male') {
                    $male = 'checked';
                } elseif($gender == 'female') {
                    $female = 'checked';
                }

                $to = 'ianjy1127@gmail.com';
                $subject = 'Test Email ' .date("m/d/y");
                $body = 'Thank you '.$name.' for submitting the form' .PHP_EOL.'';
                $body .= 'Your email: '.$email.' and your gender: '.$gender.'' .PHP_EOL.'';
                $body .= 'Your comments: '.$comments.' ';   
                $headers = array(
                    'From' => 'no-reply@mystudentwa.com',
                    'Reply-to' => ''.$email.'' );
                
                mail($to, $subject, $body, $headers);
                header('Location: thx.php');

    } // end if isset
} // end if server request
?>

<!doctype html>
<html lang="en">
<head>
<title>Our Emailable Form</title>
<style>

</style>
</head>

<body>
<form action="" method="post">
<label>Name</label>
<input type="text" name="name">
<label>Email</label>
<input type="email" name="email">
<label>Gender</label>
<ul>
<li><input type="radio" name="gender" value="female">Female</li>
<li><input type="radio" name="gender" value="male">Male</li>
</ul>
<label>Favorite Wines</label>
<ul>
<li><input type="checkbox" name="wines[]" value="cab">Cabernet</li>
<li><input type="checkbox" name="wines[]" value="merlot">Merlot</li>
<li><input type="checkbox" name="wines[]" value="syrah">Syrah</li>
<li><input type="checkbox" name="wines[]" value="malbec">Malbec</li>
</ul>
<label>Comments</label>
<textarea name="comments"></textarea>
<input type="submit" name="submit" value="Send it">
<input type="reset" name="reset" value="Reset">
</form>

</body>
</html>
