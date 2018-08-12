<?php
session_start();
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
echo "<script type=\"text/javascript\">window.location = 'login.php'</script>";
}
else{
$login="2";
$user=$_SESSION['SESS_UNAME'];
}
?>
<?php
$hname=$_REQUEST['hostn'];
$Criticality = $_REQUEST['Criticality'];
$Virtual_Host = $_REQUEST['Virtual_Host'];
$Server_loc = $_REQUEST['Server_loc'];
$Server_Zone = $_REQUEST['Server_Zone'];
$SID = $_REQUEST['SID'];
$Model =  $_REQUEST['Model'];
$Server_Type = $_REQUEST['Server_Type'];
$Serial = $_REQUEST['Serial'];
$CPUs = $_REQUEST['CPUs'];
$Core_per_CPU = $_REQUEST['Core_per_CPU'];
$CPU_Speed = $_REQUEST['CPU_Speed'];
$Memory = $_REQUEST['Memory'];
$OS = $_REQUEST['OS'];
$OS_Version = $_REQUEST['OS_Version'];
$ten_Subnet = $_REQUEST['ten_Subnet'];
$sev_Subnet = $_REQUEST['sev_Subnet'];
$Leas_Purchased = $_REQUEST['Leas_Purchased'];
$Maint_SD_HP = $_REQUEST['Maint_SD_HP'];
$Maint_Con_Number = $_REQUEST['Maint_Con_Number'];
$Expiry = $_REQUEST['Expiry'];
$Notes = $_REQUEST['Notes'];
$Status = $_REQUEST['Status'];
$Application = $_REQUEST['Application'];
$ansible = $_REQUEST['ansible'];
$Application_Owner = $_REQUEST['Application_Owner'];
$Application_sup_grp = $_REQUEST['Application_sup_grp'];
$Project = $_REQUEST['Project'];
include('dbconnect.php');
$query = "UPDATE servers SET Criticality = '$Criticality', Virtual_Host = '$Virtual_Host', Server_loc = '$Server_loc', Server_Zone = '$Server_Zone', SID = '$SID', Project= '$Project', Model = '$Model', Server_Type = '$Server_Type', Serial = '$Serial', CPUs = '$CPUs', Core_per_CPU = '$Core_per_CPU', CPU_Speed = '$CPU_Speed', Memory = '$Memory', OS = '$OS', OS_Version = '$OS_Version', 10_Subnet = '$ten_Subnet', 175_Subnet = '$sev_Subnet', Leas_Purchased = '$Leas_Purchased', Maint_SD_HP = '$Maint_SD_HP', Maint_Con_Number = '$Maint_Con_Number', Expiry = '$Expiry', Notes = '$Notes', Server_Status = '$Status', Application = '$Application', Application_Owner = '$Application_Owner', app_comments = '$app_comments', Application_sup_grp = '$Application_sup_grp', ansible = '$ansible' WHERE Host_Name = '$hname'";
mysql_query($query);
include('log.php');
echo "<script type=\"text/javascript\">window.location = 'searchhost.php?hostname=$hname'</script>";
?>