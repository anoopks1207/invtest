<?php
include ('main.html');
if(!isset($_SESSION)) { session_start(); } 
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
echo "<script type=\"text/javascript\">window.location = 'index.php'</script>";
}
?>
<html>
<head>
<title>Inventory</title>
<link rel="shortcut icon" href="images/inventory.ico" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php
include('dbconnect.php');
if(isset($_REQUEST['hostname']))
{
include('update_with_searchname.php');
}
else
{echo "<script type=\"text/javascript\">alert('Please Select a Server to Update');"."window.location = 'searchhost.php'</script>";
}
?>
</body>
</html>
