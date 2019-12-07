<?php 
// This will be my emailable form

$name = $email = $gender = $comments = $wines = $phone = $privacy = '';
$nameErr = $emailErr = $genderErr = $commentsErr = $winesErr = $phoneErr = $privacyErr = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

if(empty($_POST['name'])) {
    $nameErr = '<p class="error">Please fill out your name</p>';
} else {
    $name = $_POST['name'];
}

if(empty($_POST['email'])) {
    $emailErr = '<p class="error">Please fill out your email</p>';
} else {
    $email = $_POST['email'];
}

if(empty($_POST['gender'])) {
    $genderErr = '<p class="error">Please check your gender</p>';
} else {
    $gender = $_POST['gender'];
}

if(empty($_POST['wines'])) {
    $winesErr = '<p class="error">Please select your wines</p>';
} else {
    $wines = $_POST['wines'];
}

if(empty($_POST['comments'])) {
    $commentsErr = '<p class="error">Please type your comments</p>';
} else {
    $comments = $_POST['comments'];
}

if(empty($_POST['phone'])) {  // if empty, type in your number
    $phoneErr = '<p class="error">Your phone number please!</p>';
} elseif(array_key_exists('phone', $_POST)){
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone'])) { 
        $phoneErr = '<p class="error">Invalid format!</p>';
    } else {
    $phone = $_POST['phone'];
    }
} //end elseif

if(empty($_POST['privacy'])) {
    $privacyErr = '<p class="error">Please check privacy</p>';
} else {
    $privacy = $_POST['privacy'];
}    


    if(isset($_POST['name'],
             $_POST['email'],
             $_POST['gender'],
             $_POST['phone'],
             $_POST['comments'],
             $_POST['privacy'],
             $_POST['wines'])) {

                function myWines() {
                    $myReturn = '';
                    if(!empty($_POST['wines'])) {
                        $myReturn = implode(",", $_POST['wines']);
                    } return $myReturn; //end if not empty
                } //end function

                $to = 'ianjy1127@gmail.com';
                $subject = 'Test Email ' .date("m/d/y");
                $body = 'Thank you '.$name.' for submitting the form' .PHP_EOL.'';
                $body .= 'Your email: '.$email.' '.PHP_EOL.'';
                $body .= 'Your gender: '.$gender.' ' .PHP_EOL.'';
                $body .= 'Your phone: '.$phone.' ' .PHP_EOL.'';
                $body .= 'Your wines: '.myWines().''.PHP_EOL.''; 
                $body .= 'Your comments: '.$comments.' '; 
                 
                $headers = array(
                    'From' => 'no-reply@webdesignbyjy.com',
                    'Reply-to' => ''.$email.'' );
                
                if ($_POST['name']!="" && $_POST['email']!="" && $_POST['gender']!="" && 
                $_POST['phone']!="" && $_POST['wines']!="" && $_POST['comments']!="" && 
                $_POST['privacy']!="") {    
                    mail($to, $subject, $body, $headers);
                    header('Location: thx.php');
                } //end if

    } // end if isset
} // end if server request
?>

<!doctype html>
<html lang="en">
<head>
<title>Our Emailable Form</title>
<style>
label {
    display: block;
}

.error {
    color: red;
}

textarea {
    display: block;
}


</style>
</head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<label>Name</label>
<input type="text" name="name" value="
<?php if(isset($_POST['name'])) {
    echo htmlspecialchars($_POST['name']); } ?>">
<span><?php echo $nameErr; ?></span>
<label>Email</label>
<input type="email" name="email" value="
<?php if(isset($_POST['email'])) {
    echo htmlspecialchars($_POST['email']); } ?>">
<span><?php echo $emailErr; ?></span>
<label>Phone</label>
<input type="text" name="phone" placeholder="xxx-xxx-xxxx" value="
<?php if(isset($_POST['phone'])) {
    echo htmlspecialchars($_POST['phone']); } ?>">
<span><?php echo $phoneErr; ?></span>
<label>Gender</label>
<ul>
<li><input type="radio" name="gender" value="female"
<?php if(isset($_POST['gender']) && $_POST['gender'] == 'female') {
    echo 'checked = "checked"'; } ?>>Female</li>
<li><input type="radio" name="gender" value="male"
<?php if(isset($_POST['gender']) && $_POST['gender'] == 'male') {
    echo 'checked = "checked"'; } ?>>Male</li>
</ul>
<span><?php echo $genderErr; ?></span>
<label>Favorite Wines</label>
<ul>
<li><input type="checkbox" name="wines[]" value="cab"
<?php if(isset($_POST['wines']) && in_array('cab', $wines)) {
    echo 'checked="checked"'; } ?>>Cabernet</li>
<li><input type="checkbox" name="wines[]" value="merlot"
<?php if(isset($_POST['wines']) && in_array('merlot', $wines)) {
    echo 'checked="checked"'; } ?>>Merlot</li>
<li><input type="checkbox" name="wines[]" value="syrah"
<?php if(isset($_POST['wines']) && in_array('syrah', $wines)) {
    echo 'checked="checked"'; } ?>>Syrah</li>
<li><input type="checkbox" name="wines[]" value="malbec"
<?php if(isset($_POST['wines']) && in_array('malbec', $wines)) {
    echo 'checked="checked"'; } ?>>Malbec</li>
</ul>
<span><?php echo $winesErr; ?></span>
<label>Comments</label>
<textarea name="comments">
<?php if(isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']); ?></textarea>
<span><?php echo $commentsErr; ?></span>
<label>Privacy</label>
<input type="radio" name="privacy" value="yes"
<?php if(isset($_POST['privacy']) && $_POST['privacy'] == 'yes') {
    echo 'checked="checked"'; } ?>>
<span><?php echo $privacyErr; ?></span>

<input type="submit" name="submit" value="Send it">
<input type="button" onclick="window.location.href =
'<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'" value="RESET!">
</form>

</body>
</html>
