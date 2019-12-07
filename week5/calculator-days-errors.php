<?php 

$name = $hours_day = $total_hours = $days = $amount = $price = $fuel = $total = $total_f = '';
$nameErr = $hours_dayErr = $amountErr = $priceErr = $fuelErr = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['name'])) {
        $nameErr = '<p class="error">Please fill out your name</p>';
    } else {
        $name = $_POST['name'];
    }
    
    if(empty($_POST['hours_day'])) {
        $hours_dayErr = '<p class="error">Please fill out hours per day</p>';
    } else {
        $hours_day = $_POST['hours_day'];
    }

    if(empty($_POST['amount'])) {
        $amountErr = '<p class="error">Please fill out the distance</p>';
    } else {
        $amount = $_POST['amount'];
    }

    if(empty($_POST['price'])) {
        $priceErr = '<p class="error">Please select the price</p>';
    } else {
        $price = $_POST['price'];
    }

    if($_POST['fuel'] == 'NULL') {
        $fuelErr = '<p class="error">Please select the fuel efficiency</p>';
    } else {
        $fuel = $_POST['fuel'];
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
    box-sizing: border-box;
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

.result {
    border: 1px grey solid;
    padding-left: 20px;
    padding-bottom: 20px; 
    margin-top: 20px;
}

.result p {
    margin: 0;
}

.error {
    color: red;
    display: block;
    text-align: center;
    padding: 5px;
    border: 1px grey solid;
}

h2 {
    color: red;  
}

</style>
</head>

<body>
<h1>Our Calculator!</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<label>Name</label>
<input type="text" name="name">

<label>How many miles will you be driving?</label>
<input type="text" name="amount">

<label>How many hours per day would you like to be driving?</label>
<input type="text" name="hours_day">

<label>Price per gallon</label>
<ul>
<li><input type="radio" name="price" value="3.00">$3.00</li>
<li><input type="radio" name="price" value="3.50">$3.50</li>
<li><input type="radio" name="price" value="4.00">$4.00</li>
</ul>

<label>Fuel Efficiency</label>
<select name="fuel">
<option value="NULL">Select Fuel Efficiency</option>
<option value="10">Terrible</option>
<option value="30">Good</option>
<option value="50">Great</option>
</select>

<input type="submit" name="submit" value="Calculate">
<input type="reset" name="reset" value="Reset">

</fieldset>

<span><?php echo $nameErr; ?></span>
<span><?php echo $amountErr; ?></span>
<span><?php echo $hours_dayErr; ?></span>
<span><?php echo $priceErr; ?></span>
<span><?php echo $fuelErr; ?></span>

</form>
</body>
</html>

<?php
if(isset($_POST['amount'],
         $_POST['price'],
         $_POST['fuel'],
         $_POST['name'],
         $_POST['hours_day']) && 
         is_numeric($_POST['amount']) &&
         is_numeric($_POST['price']) &&
         is_numeric($_POST['fuel']) &&
         is_numeric($_POST['hours_day'])) {
            $name = $_POST['name'];
            $hours_day = $_POST['hours_day'];
            $amount = $_POST['amount'];
            $price = $_POST['price'];
            $fuel = $_POST['fuel'];

            $total = $amount / $fuel * $price;
            $total_f = number_format($total, 2);

            $total_hours = ceil($amount / 65);
            $days = ceil($total_hours / $hours_day);

            echo '<div class="result">';
            echo '<h2>Calculator Results</h2>';
            echo '<p>'.$name.', you will be driving <strong> '.$amount.' miles</strong></p>';
            echo '<p>Your vehicle has an efficiency rating of <strong>'.$fuel.' miles per gallon</strong></p>';
            echo '<p>Your total cost for gas will be <strong>$'.$total_f.' dollars</strong></p>';
            echo '<p>You will be driving a total of <strong>'.$total_hours.' equating to '.$days.' days.</strong></p>';
            echo '</div>';

} //end if isset

?>



