<?php
session_start();
unset($_SESSION['SESS_UNAME']);
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
$login="1";
}
else{
$login="2";
}
?>
<html>
<?php
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
$login="1";
}
else{
$user=(trim($_SESSION['SESS_UNAME']));
$grp=$_SESSION['SESS_GROUP'];
$login="2";
}
?>
<head>
  <meta charset="UTF-8">
  <title>Inventory</title>
  <link rel="shortcut icon" href="images/inventory.ico" />
  <link rel="stylesheet" type="text/css" href="css/login.css">

<script type="text/javascript">
function confirmComplete() {
alert("confirmComplete");
var answer=confirm("Are you sure you want to continue");
if (answer==true)
  {
    return true;
  }
elseo
  {
    return false;
  }
}
</script>
</head>
<body>
<br>
    <!--the code below is used to display the message of the input validation-->
    <?php
    if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
    echo '<ul class="err">';
    foreach($_SESSION['ERRMSG_ARR'] as $msg) {
    echo '<li>',$msg,'</li>';
    }
    echo '</ul>';
    unset($_SESSION['ERRMSG_ARR']);
    }
    ?>
	<form name="loginform" action="regenerate.php" method="post">
	<div class="landing-page"><div class="form-appointment"><div class="wpcf7" id="wpcf7-f560-p590-o1">
	<form>
    <input name="email" type="text" placeholder="Enter your email ID here..."/>
    <input name="" type="submit" value="Go" class="login login-submit" />
	</div>
    </form>

</body>
</html>