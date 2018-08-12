<?php
session_start();
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
$login="1";
}
else{
$user=(trim($_SESSION['SESS_UNAME']));
$grp=$_SESSION['SESS_GROUP'];
$login="2";
}
?>
<html>
<head>
<link rel="shortcut icon" href="images/inventory.ico" />
<title>Inventory </title>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<?php
include('dbconnect.php');
include('PasswordGenerate.php');

?>
</body>
</html>
