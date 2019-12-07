<?php 

$amount = $price = $fuel = $total = $total_f = $error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['amount'] && $_POST['price'] && $_POST['fuel'])) {
        $error = '<h2>Error</h2> <p>Please enter a valid distant, price per gallon, and fuel efficiency.</p>';
    }

}

?>

<!doctype html>
<html lang="en">
<head>
<title>Calculating Trip!</title>
<style>
body {
    width: 450px;
    margin: 0 auto;
}
 h1, h2 {
     text-align: center;
 }

fieldset {
     background-color: beige;
 }

form label, form select {
    display: block;
    margin: 5px 0;
}

form select {
    margin-bottom: 10px;
}

form ul {
    padding: 0;
}

form li {
    list-style-type: none;
}

</style>
</head>

<body>
<h1>Our Calculator!</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<label>How many miles will you be driving</label>
<input type="text" name="amount">
<label>Price per gallon</label>
<ul>
<li><input type="radio" name="price" value="3.00">$3.00</li>
<li><input type="radio" name="price" value="3.50">$3.50</li>
<li><input type="radio" name="price" value="4.00">$4.00</li>
</ul>
<label>Fuel Efficiency</label>
<select name="fuel">
<option value="10">Terrible</option>
<option value="30">Good</option>
<option value="50">Great</option>
</select>

<input type="submit" name="submit" value="Calculate">
<input type="reset" name="reset" value="Reset">

</fieldset>
<span><?php echo $error?></span>

</form>
</body>
</html>

<?php
if(isset($_POST['amount'],
         $_POST['price'],
         $_POST['fuel']) && 
         is_numeric($_POST['amount']) &&
         is_numeric($_POST['price']) &&
         is_numeric($_POST['fuel'])) {
            $amount = $_POST['amount'];
            $price = $_POST['price'];
            $fuel = $_POST['fuel'];

            $total = $amount / $fuel * $price;
            $total_f = number_format($total, 2);

            echo '<h2>Calculator Results</h2>';
            echo '<p>You have driven '.$amount.' miles</p>';
            echo '<p>Your vehicle has an efficiency rating of '.$fuel.' miles per gallon</p>';
            echo '<p>Your total cost for gas will be $'.$total_f.' dollars</p>';

} //end if isset



?>



