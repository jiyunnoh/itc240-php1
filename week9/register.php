<?php //This is our register page
//Our form resides here

include('server.php');
include('includes/header.php');
?>

<h2 class="text-center">Register</h2>

<form class="center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<label>First Name</label>
<input type="text" name="FirstName" value="<?php echo htmlspecialchars($_POST['FirstName']); ?>">
<label>Last Name</label>
<input type="text" name="LastName" value="<?php echo htmlspecialchars($_POST['LastName']); ?>">
<label>User Name</label>
<input type="text" name="UserName" value="<?php echo htmlspecialchars($_POST['UserName']); ?>">
<label>Email</label>
<input type="email" name="Email" value="<?php echo htmlspecialchars($_POST['Email']); ?>">
<label>Password</label>
<input type="password" name="Password_1">
<label>Confirm Password</label>
<input type="password" name="Password_2">
<button type="submit" class="btn" name="reg_user">Register</button>

<?php include('errors.php'); ?>

</fieldset>
</form>

<p class="text-center italic">
Already a member? <a href="login.php">Sign in!</a>
</p>

<?php include('includes/footer.php'); ?>