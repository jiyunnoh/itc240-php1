<?php 
if(isset($_GET['today'])) { //not $today. It is a keyword. Not a variable.
$today = $_GET['today'];
} //end main if statement
else {
$today = date('l'); 
} //end else 

switch($today) {
case 'Monday':
$coffee = 'Monday is Latte day'; 
$pic = 'latte.jpg';
$alt = 'Latte';
$body = 'red'; 
break;

case 'Tuesday':
$coffee = 'Tuesday is Joe day'; 
$pic = 'joe.jpg';
$alt = 'Joe';
$body = 'pink'; 
break;
}
?>


<?php 
include('config.php');
include('includes/header.php'); ?>


<main>
<h1><?= $coffee?> </h1>

<h2>Click below to view different days.</h2>
<ul>
<li><a href="daily.php?today=Monday">Monday</a></li> <!--we are at the same page, switching the content-->
<li><a href="daily.php?today=Tuesday">Tuesday</a></li>
</ul>

</main>

<aside>
<h3>This is my latte image</h3>
<img src="images/<?= $pic ?>" alt="<?= $alt ?>">
</aside>

<?php include('includes/footer.php'); ?>