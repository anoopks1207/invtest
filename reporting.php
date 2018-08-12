<html>
<head>
<title>Inventory</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<?php
include('dbconnect.php');
#session_start();
$x="(1=0)";
$y="(1=1)";
$z="0";
$j="0";
$k="0";
if (isset($_REQUEST['Type'])) {
$type = $_REQUEST['Type'];
$recent = $_REQUEST['recent'];
#OS
if(!isset($_REQUEST['os']))
{
#$os = [];
$os_or="(1=1)";
}
else
{
$os = $_REQUEST['os'];
$os_or=" (1=0";
if(count($os)>0)
{
for($i=0;$i<count($os);$i++)
{
{
$os_or=$os_or." OR OS='".$os[$i]."' ";  
}
}
}
$os_or=$os_or.") ";
}
#SERVER TYPE
if(!isset($_REQUEST['srvtype']))
{
#$srvtype = [];
$srvtype_or=$y;
}
else
{
$srvtype = $_REQUEST['srvtype'];
$srvtype_or=" (1=0";
if(count($srvtype)>0)
{
for($i=0;$i<count($srvtype);$i++)
{
$srvtype_or=$srvtype_or." OR Server_Type='".$srvtype[$i]."' ";  
}
}
$srvtype_or=$srvtype_or.") ";
}

#Criticality
if(!isset($_REQUEST['Criticality']))
{
#$Criticality = [];
$Criticality_or=$y;
}
else
{
$Criticality = $_REQUEST['Criticality'];
$Criticality_or=" (1=0";
if(count($Criticality)>0)
{
for($i=0;$i<count($Criticality);$i++)
{
$Criticality_or=$Criticality_or." OR Criticality='".$Criticality[$i]."' ";  
}
}
$Criticality_or=$Criticality_or.") ";
}
#Location
if(!isset($_REQUEST['Srv_loc']))
{
#$Srv_loc = [];
$Srv_loc_or=$y;
}
else
{
$Srv_loc = $_REQUEST['Srv_loc'];
$Srv_loc_or=" (1=0";
if(count($Srv_loc)>0)
{
for($i=0;$i<count($Srv_loc);$i++)
{
$Srv_loc_or=$Srv_loc_or." OR Server_loc='".$Srv_loc[$i]."' ";  
}
}
$Srv_loc_or=$Srv_loc_or.") ";
}

#Zone
if(!isset($_REQUEST['Zone']))
{
$Zone_or=$y;
}
else
{
$Zone = $_REQUEST['Zone'];
$Zone_or=" (1=0";
if(count($Zone)>0)
{
for($i=0;$i<count($Zone);$i++)
{
$Zone_or=$Zone_or." OR Server_Zone='".$Zone[$i]."' ";  
}
}
$Zone_or=$Zone_or.") ";
}
#Project
if (!isset($_REQUEST['Project'])) {
$project_or = "(1=1)";
}
elseif ($_REQUEST['Project']=="") {
$project_or = "(1=1)";
}
else{
$proj = $_REQUEST['Project'];
$project_or = "Project = '$proj'";
}
#Application
if (!isset($_REQUEST['SID'])) {
$Application_or = "(1=1)";
}
elseif ($_REQUEST['SID']=="") {
$Application_or = "(1=1)";
}
else{
$app = $_REQUEST['SID'];
$Application_or = "SID = '$app'";
}
#Recent
if (!isset($_REQUEST['recent'])) {
$recent_or = "(1=1)";
}
elseif ($_REQUEST['recent']=="ALL") {
$recent_or = "(1=1)";
}
else{
$recent = $_REQUEST['recent'];
$recent_or = "(timestamp > DATE_SUB(NOW(), INTERVAL $recent))";
}
if ($type=="Server") {
$query = "SELECT * FROM servers WHERE $os_or AND $srvtype_or AND $project_or AND $Criticality_or AND $Application_or AND $recent_or AND $Srv_loc_or AND $Zone_or AND Server_Status like 'Live' ORDER BY Host_Name";
$message="";
$message .= "<html>";
$message .= "<style>";
$message .= "table, td, th {";
$message .= "border: 1px solid black; text-decoration:none; border-collapse: collapse;";
$message .= "}";
$message .= "</style>";
$message .= "<body>";
$message .= "<table id=table >";
$message .= "<tr><td bgcolor=#80ccff><b>Host Name</b></td><td bgcolor=#80ccff><b>Environment</b></td><td bgcolor=#80ccff><b>OS</b></td><td bgcolor=#80ccff><b>Type</b></td><td bgcolor=#80ccff><b>Project</b></td><td bgcolor=#80ccff><b>Model</b></td>";
$result = mysql_query($query);
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
$message .= "<tr><td>";
$message .= "{$row['Host_Name']}";
$message .= "</td><td>";
$message .= "{$row['Criticality']}";
$message .= "</td><td>";
$message .= "{$row['OS']}";
$message .= "</td><td>";
$message .= "{$row['Server_Type']}";
$message .= "</td><td>";
$message .= "{$row['Project']}";
$message .= "</td><td>";
$message .= "{$row['Model']}";
$z=$z+1;
}
$message .= "</table>";
$message .= "</body>";
$message .= "</html>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<font color='#CC0066' size='4' align='center'> &nbsp; &nbsp; " .$z. " Servers found.</font>";
echo "<table id=table>";
echo "<form action='email.php' method='post'>";
echo "<td><font size='3'>Mail this Report to your email ID</font></td>";
echo "<td><input placeholder='Enter Email ID here...' type='text' name='email' size='60' value=''>";
echo "<input type='hidden' name='message' value='$message'>";
echo "<td><input type='submit' value='Send' size='30'></td>";
echo "</form>";
echo "</table>";
echo "<table id=table>";
echo "<tr><td><b><label>Host Name</label></b></td><td><b>Enviornment</b></td><td ><b>OS</b></td><td><b>OS Version</b></td><td><b>Type</b></td><td><b>Project</b></td><td><b>Model</b></td><td><b>Zone</b></td>";
$result = mysql_query($query);
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
echo "<tr><td><label>";
echo "<a href='searchhost.php?hostname=$row[Host_Name]&dCriticality=$row[Criticality]' target='_blank'>{$row['Host_Name']}</a>";
echo "</label></td><td>";
echo "{$row['Criticality']}";
echo "</td><td>";
echo "{$row['OS']}";
echo "</td><td>";
echo "{$row['OS_Version']}";
echo "</td><td>";
echo "{$row['Server_Type']}";
echo "</td><td>";
echo "{$row['Project']}";
echo "</td><td>";
echo "{$row['Model']}";
echo "</td><td>";
echo "{$row['Server_Zone']}";
}
echo "</table>"; 
}
}
?>