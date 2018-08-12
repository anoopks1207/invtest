<?php
include ('main.html');
session_start();
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
echo "<script type=\"text/javascript\">window.location = 'index.php'</script>";
}
else{
$user=(trim($_SESSION['SESS_UNAME']));
}
?>
<html>
<head>
<title>Inventory</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<title>Inventory</title>
</head>
<style>
a.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	border-radius: 12px;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
}

</style>
<body>
	
    <?php
        include('dbconnect.php');
        $query = "SELECT * FROM user";
    ?>

	<table id="table">
<br></br>
        <tr>
        <th><a align="right" href="generateinv.php" class="button">Generate Inventory</a></th>
        </tr>
        <tr>
        <td width="100%">
             <?php
                   include('invcsv/update.html');
             ?>
        </td>
        </tr>
	</table>

</body>
</html>
