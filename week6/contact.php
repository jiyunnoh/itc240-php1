<?php
$name = $email = $phone = $privacy = $pets = $house = '';
$nameErr = $emailErr = $phoneErr = $privacyErr = $petsErr = $houseErr = '';

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

if(empty($_POST['phone'])) {
    $phoneErr = '<p class="error">Please fill out your phone number</p>';
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

if($_POST['house'] == 'NULL') {
    $houseErr = '<p class="error">Please choose your house</p>';
} else {
    $house = $_POST['house'];
} 

if(empty($_POST['pets'])) {
    $petsErr = '<p class="error">Please check pets you prefer</p>';
} else {
    $pets = $_POST['pets'];
}

if(isset($_POST['name'],
         $_POST['email'],
         $_POST['phone'],
         $_POST['privacy'],
         $_POST['house'],
         $_POST['pets'])) {

            function myPets() {
                $myReturn = '';
                if(!empty($_POST['pets'])) {
                    $myReturn = implode(', ', $_POST['pets']);
                } return $myReturn;
            } //end function

            $to = 'ianjy1127@gmail.com';
            $subject = 'Test Email '.date("m/d/y");
            $body = 'Thank you, '.$name.' for submitting the form'.PHP_EOL.'';
            $body .= 'Your email: '.$email.' '.PHP_EOL.'';
            $body .= 'Your phone number: '.$phone.' '.PHP_EOL.'';
            $body .= 'Your house: '.$house.' '.PHP_EOL.'';
            $body .= 'Your pets: '.myPets().' ';
            $headers = array(
                'From' => 'no-reply@webdesignbyjy.com',
                'Reply-to' => ''.$email.'' );

            if($_POST['name']!="" && $_POST['email']!="" && $_POST['phone']!="" && 
            $_POST['house']!="" && $_POST['pets']!="" && $_POST['privacy']!="") {    
                mail($to, $subject, $body, $headers);
                header('Location: thx.php');
            }

} //end if isset

} //end server request

?>


<!doctype html>
<html lang="en">
<head>
<title>Our Emailable Form</title>
<style>
fieldset {
    background-color: beige;
}

label {
    display: block;
    margin-top: 10px;
}

ul {
    padding: 0;
    margin-top: 10px;
}

li {
    list-style-type: none;
}

span {
    display: block;
}

.error {
    color: red;
}
</style>
</head>

<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
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

<label>Phone Number</label>
<input type="text" name="phone" placeholder="xxx-xxx-xxxx" value="
<?php if(isset($_POST['phone'])) {
    echo htmlspecialchars($_POST['phone']); } ?>">
<span><?php echo $phoneErr; ?></span>

<label>House</label>
<select name="house">
<option value="NULL"
<?php if(isset($_POST['house']) && $_POST['house'] == 'NULL') {
    echo 'selected ="unselected"'; } ?>>Select your house</option>
<option value="gryffindor"
<?php if(isset($_POST['house']) && $_POST['house'] == 'gryffindor') {
    echo 'selected ="selected"'; } ?>>Gryffindor</option>
<option value="hufflepuff"
<?php if(isset($_POST['house']) && $_POST['house'] == 'hufflepuff') {
    echo 'selected ="selected"'; } ?>>Hufflepuff</option>
<option value="ravenclaw"
<?php if(isset($_POST['house']) && $_POST['house'] == 'ravenclaw') {
    echo 'selected ="selected"'; } ?>>Ravenclaw</option>
<option value="slytherin"
<?php if(isset($_POST['house']) && $_POST['house'] == 'slytherin') {
    echo 'selected ="selected"'; } ?>>Slytherin</option>
</select>
<span><?php echo $houseErr; ?></span>

<label>Pet</label>
<ul>
<li><input type="checkbox" name="pets[]" value="owl"
<?php if(isset($_POST['pets']) && in_array('owl', $pets)) {
    echo 'checked = "checked"'; } ?>>Owl</li>
<li><input type="checkbox" name="pets[]" value="hippogriff"
<?php if(isset($_POST['pets']) && in_array('hippogriff', $pets)) {
    echo 'checked = "checked"'; } ?>>Hippogriff</li>
<li><input type="checkbox" name="pets[]" value="toad"
<?php if(isset($_POST['pets']) && in_array('toad', $pets)) {
    echo 'checked = "checked"'; } ?>>Toad</li>
<li><input type="checkbox" name="pets[]" value="phoenix"
<?php if(isset($_POST['pets']) && in_array('phoenix', $pets)) {
    echo 'checked = "checked"'; } ?>>Phoenix</li>
<li><input type="checkbox" name="pets[]" value="rat"
<?php if(isset($_POST['pets']) && in_array('rat', $pets)) {
    echo 'checked = "checked"'; } ?>>Rat</li>
<li><input type="checkbox" name="pets[]" value="cat"
<?php if(isset($_POST['pets']) && in_array('cat', $pets)) {
    echo 'checked = "checked"'; } ?>>Cat</li>
</ul>
<span><?php echo $petsErr; ?></span>

<label>Privacy</label>
<input type="radio" name="privacy" value="yes"
<?php if(isset($_POST['privacy']) && $_POST['privacy'] == 'yes') {
    echo 'checked="checked"'; }?>>
<span><?php echo $privacyErr ?></span>

<input type="submit" name="submit" value="Send it!">
<input type="button" onclick="window.location.href=
'<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'" value="Reset">
</fieldset>
</form>

</body>
</html>