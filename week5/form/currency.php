<!doctype html>
<html lang="en">
<head>
<title>Our currency calculator!</title>
<link href="" rel="" type="">
</head>

<body>

<form action="currency.php" method="post"> <!--if action is blank, it will keep talking with the same page-->
<fieldset>
<label>Name</label>
<input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"> <br>
<label>How much money would you like to convert?</label> 
<input type="text" name="myAmount" value="<?php if(isset($_POST['myAmount'])) echo $_POST['myAmount']; ?>"> <br>
<label>Please check the currency that you have: </label> 
<ul>
<li><input type="radio" name="currency" value=".76"
<?php if(isset($_POST['currency']) && $_POST['currency'] == '.76') 
echo 'checked = "checked"'; ?>>Canadian</li>
<li><input type="radio" name="currency" value="1.10"
<?php if(isset($_POST['currency']) && $_POST['currency'] == '1.10') 
echo 'checked = "checked"'; ?>>Euro</li>
<li><input type="radio" name="currency" value="1.23"
<?php if(isset($_POST['currency']) && $_POST['currency'] == '1.23') 
echo 'checked = "checked"'; ?>>Pound</li>
</ul>

<label>Choose your bank</label>
<select name="bank">
<option value="NULL"
<?php if(isset($_POST['bank']) && $_POST['bank'] == 'NULL') 
echo 'selected = "unselected"'; ?>>Select one</option>
<option value="Bank of America"
<?php if(isset($_POST['bank']) && $_POST['bank'] == 'Bank of America') 
echo 'selected = "selected"'; ?>>Bank of America</option>
<option value="Wells Fargo"
<?php if(isset($_POST['bank']) && $_POST['bank'] == 'Wells Fargo') 
echo 'selected = "selected"'; ?>>Wells Fargo</option>

</select>

<input type="submit" name="submit" value="Show me my dollars">
<input type="reset" name="reset" value="Reset">
</fieldset>

</form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if(empty($_POST['name'])) {
        echo '<p>Please fill out your name!</p>';
    }

    if(empty($_POST['myAmount'])) {
        echo '<p>Please enter your amount that you would like to convert!</p>';
    }

    if(empty($_POST['currency'])) {
        echo '<p>Please check your currency!</p>';
    }

    if($_POST['bank'] == 'NULL') {
        echo '<p>Please select your bank!</p>';
    }

else if(isset($_POST['name'],
              $_POST['myAmount'],
              $_POST['currency'],
              $_POST['bank']) &&
        is_numeric($_POST['myAmount']) && // is_numeric can have only one variable
        is_numeric($_POST['currency'])) {

        $name = $_POST['name'];
        $myAmount = $_POST['myAmount'];
        $currency = $_POST['currency'];
        $bank = $_POST['bank'];

        $total = $myAmount * $currency;
        $total_f = number_format($total, 2);

        echo '<p>'.$name.', thank you for your submission.</p>';
        echo '<p>You have $'.$total_f.' American dollars.</p>';
        echo '<p>Your funds will be wired to '.$bank.'</p>';
} //end elseif


} //end post



//The page doesn't be reset
//When you don't put name, it still shows the message with empty name

