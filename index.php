<?php
// initialize session
session_start();
include("authenticate.php");
 
// check to see if user is logging out
if(isset($_GET['out'])) {
	// destroy session
	session_unset();
	$_SESSION = array();
	unset($_SESSION['SESS_UNAME'],$_SESSION['access']);
	session_destroy();
}
 
// check to see if login form has been submitted
if(isset($_POST['userLogin'])){
	// run information through authenticator
	if(authenticate($_POST['userLogin'],$_POST['userPassword']))
	{
		// authentication passed
		header("Location: protected.php");
		die();
	} else {
		// authentication failed
		$error = 1;
	}
}
 
// output error to user
if(isset($error)) echo "Login failed: Incorrect user name, password, or rights<br />";
 
// output logout success
if(isset($_GET['out'])) echo "Logout successful";
?>
<head>
<title>Inventory</title>
<link rel="shortcut icon" href="images/inventory.png" />
<link rel="stylesheet" type="text/css" href="css/login.css">
<script type="text/javascript">
$(document).ready(function () {
  $('input[type=submit]').click(function () {
    $('input[type=submit]').toggleClass('red');
  });
});
#body {
width: 100%;
height: 100%;
}
</script>
</head>
<div id="body">
<div class="landing-page"><div class="form-appointment"><div class="wpcf7" id="wpcf7-f560-p590-o1"><form action="index.php" method="post" class="wpcf7-form" novalidate="novalidate" _lpchecked="1">
<form>
<div class="group">
<div style="width: 100%; float: center;">
<h3 align="center">Unix - Linux Inventory</h3>
<span class="wpcf7-form-control-wrap text-680"><input type="text" name="userLogin" value="" size="25" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" placeholder="Username"></span><br>
<span class="wpcf7-form-control-wrap text-680"><input type="password" name="userPassword" value="" size="25" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" placeholder="Password"></span><br>
</div><div>
<input name="" type="submit" value="Login" class="login login-submit"> <span style="display:inline-block; width: 110;"></span> </div>
</form>
</div>
</div>


