<?php
include('main.html');
if(!isset($_SESSION)) { session_start(); }
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
echo "<script type=\"text/javascript\">window.location = 'index.php'</script>";
}
?>


<head>
<link rel="shortcut icon" href="images/inventory.ico" />
</head>
<?php

include('dbconnect.php');

$hname=$_REQUEST["hname"];
$hname=trim($hname);
$OS = $_REQUEST["OS"];
$OS=trim($OS); 
$query = "SELECT * FROM servers WHERE Host_Name LIKE '%$hname%' and OS = '$OS'";
$query = mysql_query($query);
$rows = mysql_fetch_array($query);
$count = mysql_num_rows($query);

	$Host_Name = $rows['Host_Name'];
	$Criticality = $rows['Criticality'];
	$Virtual_Host = $rows['Virtual_Host'];
	$Server_Zone = $rows['Server_Zone'];
	$Server_loc = $rows['Server_loc'];
	$SID = $rows['SID'];
	$Project = $rows['Project'];
	$Model =  $rows['Model'];
	$Serial = $rows['Serial'];
	$CPUs = $rows['CPUs'];
	$Core_per_CPU = $rows['Core_per_CPU'];
	$CPU_Speed = $rows['CPU_Speed'];
	$Memory = $rows['Memory'];
	$OS = $rows['OS'];
	$OS_Version = $rows['OS_Version'];
	$ten_Subnet = $rows['10_Subnet'];
	$sev_Subnet = $rows['175_Subnet'];
	$Leas_Purchased = $rows['Leas_Purchased'];
	$Maint_SD_HP = $rows['Maint_SD_HP'];
	$Maint_Con_Number = $rows['Maint_Con_Number'];
	$Expiry = $rows['Expiry'];
	$Notes = $rows['Notes'];
	$Status = $rows['Server_Status'];
	$timestamp = $rows['timestamp'];
	$Application = $rows['Application'];
	$Application_Owner = $rows['Application_Owner'];
	$ansible = $rows['ansible'];
	$app_comments = $rows['app_comments'];
	$Server_Type = $rows['Server_Type'];
	
	include('list.php');

?>


