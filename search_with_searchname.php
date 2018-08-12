<head>
<link rel="shortcut icon" href="images/inventory.ico" />
</head>
<?php
if(!isset($_SESSION)) { session_start(); } 
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
echo "<script type=\"text/javascript\">window.location = 'index.php'</script>";
}

$flag="0";
$hname=$_REQUEST["hostname"];
#$OS=$_REQUEST["OS"];
$hname=trim($hname); 
$query = "SELECT * FROM servers WHERE Host_Name LIKE '%$hname%'";
$query = mysql_query($query);
$rows = mysql_fetch_array($query);
$count = mysql_num_rows($query);
$num_rows = $count;
#echo $num_dbrows;
#$count = $num_rows+$num_dbrows;
#$wait_value = "";
#echo $count;
#echo $count;

if ($count>1) {
include('list_dup.php');
		$flag="2";
	}

if ($num_rows==1) {
	$flag="1";
}

elseif ($flag<1) {
	echo "<script type=\"text/javascript\">alert('Server $hname not found in the record.')</script>";
	echo "<script type=\"text/javascript\">window.location = 'landing.php'</script>";
}

if ($flag=="1") {
	
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
	$Application_sup_grp = $rows['Application_sup_grp'];
	$ansible = $rows['ansible'];
	$app_comments = $rows['app_comments'];
	$Server_Type = $rows['Server_Type'];
}
?>

	<?php
		if ($flag=="1") {
			include('list.php');
		}
	?>

