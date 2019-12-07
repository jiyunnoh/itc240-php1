<?php
// Our Calculator

//define my variables and initialize them with empty values
//define my error variables

$nameErr = $myAmountErr = $bankErr = $currencyErr = '';
$name = $myAmount = $bank = $currency = $total = $total_f = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['name'])) {
        $nameErr = 'Please fill out your name';
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['myAmount'])) {
        $myAmountErr = 'Please fill out your Amount';
    } else {
        $myAmount = $_POST['myAmount'];
    }

    if(empty($_POST['bank'])) {
        $bankErr = 'Please choose your bank';
    } else {
        $bank = $_POST['bank'];
    }

    if($_POST['currency'] == 'NULL') {
        $currencyErr = 'Please select your currency';
    } else {
        $currency = $_POST['currency'];
    }

} //end server request
?>

<!doctype html>
<html lang="en">
<head>
<title>Our Wonderful Calculator</title>
<style>
.error {
    color: red;
    font-style: italic;
}

form {
    width: 450px;
    margin: 0 auto;
}

form label, form span {
    display: block;
}

h2, p {
    text-align: center;
}

</style>
</head>

<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<label>Name</label>
<input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
<span class="error"><?php echo $nameErr; ?></span>
<label>Enter your amount</label>
<input type="text" name="myAmount" value="<?php echo htmlspecialchars($myAmount); ?>">
<span class="error"><?php echo $myAmountErr; ?></span>

<label>Choose your bank</label>
<ul>
<li><input type="radio" name="bank" value="Bank of America" <?php if(isset($_POST['bank'])
&& $_POST['bank'] == 'Bank of America') { echo 'checked = "checked"'; } ?> >Bank of America</li>
<li><input type="radio" name="bank" value="Chase" <?php if(isset($_POST['bank'])
&& $_POST['bank'] == 'Chase') { echo 'checked = "checked"'; } ?>>Chase</li>
<li><input type="radio" name="bank" value="Wells Fargo" <?php if(isset($_POST['bank'])
&& $_POST['bank'] == 'Wells Fargo') { echo 'checked = "checked"'; } ?>>Wells Fargo</li>
<li><input type="radio" name="bank" value="Banner Bank" <?php if(isset($_POST['bank'])
&& $_POST['bank'] == 'Banner Bank') { echo 'checked = "checked"'; } ?>>Banner</li>
</ul>
<span class="error"><?php echo $bankErr; ?></span>

<label>Select your currency</label>
<select name="currency">
<option value="NULL" <?php if(isset($_POST['currency']) 
&& $_POST['currency'] == 'NULL') { echo 'selected = "unselected"';} ?> >Select one</option>
<option value=".76" <?php if(isset($_POST['currency']) 
&& $_POST['currency'] == '.76') { echo 'selected = "selected"';} ?>>Canadian</option>
<option value="1.10" <?php if(isset($_POST['currency']) 
&& $_POST['currency'] == '1.10') { echo 'selected = "selected"';} ?>>Euro</option>
<option value="1.23" <?php if(isset($_POST['currency']) 
&& $_POST['currency'] == '1.23') { echo 'selected = "selected"';} ?>>Pound</option>
</select>
<span class="error"><?php echo $currencyErr; ?></span>

<input type="submit" name="submit" value="Show me the money">
<input type="reset" name="reset" value="Reset">
</fieldset>
</form>

</body>
</html>

<?php
if(isset($_POST['myAmount'],
         $_POST['currency']) &&
         is_numeric($_POST['myAmount']) &&
         is_numeric($_POST['currency'])) {

            $total = $myAmount * $currency;

echo '<h2>'.$name.', thank you for submitting the form </h2> 
<p>You will receive 
$'.number_format($total, 2).' dollars and 
we will be wiring it to '.$bank.'</p>';


} //end if isset


// form action="<?php echo $_SERVER['PHP_SELF']; What is the purpose??
