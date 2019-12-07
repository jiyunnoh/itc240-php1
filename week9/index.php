<?php //index.php This is always in every page

session_start();

if(!isset($_SESSION['UserName'])) {
    $_SESSION['msg'] = 'You must log in first';
    header('Location: login.php');
}//end if isset

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}//end if

include('includes/header.php');
?>

<main>
<h1>Home Page</h1>
<div class="box">
<!-- notification message -->
<?php
if(isset($_SESSION['success'])) {
    echo '<p class="red italic"> '.$_SESSION['success'].'</p>';
    unset($_SESSION['success']);
}
?>

<!-- communicate to the logged in user -->
<?php
if(isset($_SESSION['UserName'])) : ?>
<p>Welcome <strong><?php echo $_SESSION['UserName']; ?></strong></p>
<p><a href="index.php?logout='1'">Logout</a></p>
<?php endif; ?>
</div> 
</main>


<?php include('includes/footer.php'); ?>