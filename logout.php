 <?php
//logout.php
session_start();
$user=(trim($_SESSION['SESS_UNAME']));
session_destroy();
include('dbconnect.php');
$x="0";
$query = "UPDATE user SET flag='$x' WHERE uname = '$user'";
mysql_query($query);
header("location: index.php");
?> 