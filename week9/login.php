<?php //This is our login page
//Our form resides here

include('server.php');
include('includes/header.php');
?>

<h2 class="text-center">Login!</h2>

<form class="center" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<fieldset>
<label>Username</label>
<input type="text" name="UserName" value="<?php echo htmlspecialchars($UserName); ?>">
<label>Password</label>
<input type="password" name="Password">
<?php include('errors.php'); ?>
<button type="submit" name="login_user">Login</button>
<button type="button" onclick="window.location.href='
<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'">Reset</button>

</fieldset>
</form>

<p class="text-center italic">Not yet a member? <a href="register.php">Sign up!</a></p>

<?php include('includes/footer.php'); ?>