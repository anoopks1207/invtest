<?php
if(!isset($_SESSION)) { session_start(); } 
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
echo "<script type=\"text/javascript\">window.location = 'index.php'</script>";
include("authenticate.php");
include('dbconnect.php');
}
$accessflag=(trim($_SESSION['access']));
?>
<html>
<head>
<title>Inventory V 1.0</title>
<link rel="shortcut icon" href="images/inventory.ico" />
<link rel="stylesheet" type="text/css" href="css/style2.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	font-family: 'Lato', Arial, sans-serif;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
	border-radius: 12px;
}
</style>
</head>
<body>
<div class="tab">
 
  <button class="tablinks" onclick="openCity(event, 'server')" id="defaultOpen">Server Details</button>
	<button class="tablinks" onclick="openCity(event, 'cpumem')">CPU-Mem Report</button>
	<button class="tablinks" onclick="openCity(event, 'checklist')">Build Checklist</button>
	<button class="tablinks" onclick="openCity(event, 'cfg2html')">Cfg2html</button>
	<button class="tablinks" onclick="openCity(event, 'hardening')">Hardening Report</button>
</div>

<div id="server" class="tabcontent">
	<h2><font color='#996666'><b><?php echo "$Host_Name"; ?></font></b></h2>
	<table id="table_list">
	<tr><td ><label>Environment </td><td><?php echo "$Criticality"; ?></font></label></td>
	<td ><label>SID </td><td><?php echo "$SID"; ?></font></label></td></tr>
	<tr><td ><label>Server Status </td><td><font color='#993300' ><b><?php echo "$Status"; ?></b></font></label></td>
	<td ><label>Virtual Host </td><td><?php echo "$Virtual_Host"; ?></font>	</label></td> </tr>
	<tr><td ><label>Server Type </td><td><?php echo "$Server_Type"; ?></font></label></td>
	<td ><label>Server Location </td><td><?php echo "$Server_loc";?></font></label></td>
	<tr><td ><label>Server Zone </td><td><?php echo "$Server_Zone"; ?></font></label></td>
	<td ><label>Model</td><td><?php echo "$Model";?></font> </label></td></tr>
	<tr><td ><label >Serial Number</td><td><?php echo "$Serial";?></font></label></td>
	<td colspan="2" ><legend><b>Application Details </b></legend></td></tr>
	<tr><td ><label>OS </td><td><?php echo "$OS";?></label></td>
	<td ><label>Project</label></td><td><?php echo "$Project"; ?></font></label></td></tr>
	<tr><td ><label>OS Version </td><td><?php echo "$OS_Version";?></font></label></td>
	<td ><label>Application </td><td><?php echo "$Application"; ?></font></label></td></tr>
	<tr><td ><label>Number of CPU </td><td><?php echo "$CPUs"; ?></font></label></td>
	<td ><label>Application Owner </td><td><?php echo "$Application_Owner"; ?></font></label></td>
	<tr><td ><label>Core per CPU </td><td><?php echo "$Core_per_CPU"; ?></font></label></td>
	<td ><label>Application Support Group</td><td><?php echo "$Application_sup_grp";?></font> </label></td></tr>
	<tr><td ><label>CPU Speed </td><td><?php echo "$CPU_Speed"; ?></font></label></td>
	<td colspan="2" ><legend><b>Other Details</b> </legend></td></tr>	
	<tr><td ><label>Memory </td><td><?php echo "$Memory"; ?></font></label></td>
	<td ><label>Leasing Company or Purchased </td><td><?php echo "$Leas_Purchased"; ?></font></label></td></tr>	
	<tr><td ><label>10.0.x.x Subnet IP </td><td><?php echo "$ten_Subnet"; ?></font></label></td>
	<td ><label>Maintenance thru SD or HP</td><td><?php echo "$Maint_SD_HP"; ?></font></label></td></tr>	
	<tr><td ><label>175.1.2.x Subnet IP</td><td><?php echo "$sev_Subnet"; ?></font></label></td>
	<td ><label>Maintenance Contact Number</td><td><?php echo "$Maint_Con_Number"; ?></font></label></td></tr>	
	<tr><td ><label>Ansible Integration </td><td><?php echo "$ansible"; ?></font></label></td>
	<td ><label>Expiry </td><td><?php echo "$Expiry"; ?></font></label></td></tr>	
	<tr><td><label>Notes </td><td><?php echo "$Notes"; ?></font></label></td>
	<td ><label>Last update on </td><td><?php echo "$timestamp"; ?></font></label></td></tr>

	<?php
	if($Server_Type == "Physical" AND $OS == "Linux" AND $Model !== 'PRECISION T1700' AND (strpos($Model, 'POWEREDGE') !== false))
	{echo "<tr><td><label>Console Access</td><td colspan=3><a target=_blank href='https://$Host_Name.drac.lennoxintl.com'>$Host_Name.drac.lennoxintl.com</a></font></label></td>";}
	?>

	<?php
	if($Server_Type == "Physical" AND (strpos($Model, 'UCS') !== false) AND $Project !== 'Oracle RAC to UCS' AND $Server_loc == "Richardson")
	{echo "<tr><td><label>Console Access</td><td colspan=3><a target=_blank href='https://10.0.44.100/ucsm/kvm.html'>UCS-KVM</a></font></label></td>";}
	?>

	<?php
	if($Server_Type == "Physical" AND (strpos($Model, 'UCS') !== false) AND $Server_loc == "DataBank")
	{echo "<tr><td><label>Console Access</td><td colspan=3><a target=_blank href='https://10.2.16.15/ucsm/kvm.html'>UCS-KVM</a></font></label></td>";}
	?>
					
	<?php
	if ($accessflag=="2") {
	echo "<tr><th colspan=4><a align=right href='update.php?hostname=$Host_Name' class=button>Update &raquo;</a></th></tr>";
	}
	?>
	</table>
</div>

<div id="cpumem" class="tabcontent">
  	<h2><font color='#996666'><b><?php echo "$Host_Name"; ?></font></b></h2>
	<?php
	$query = "select host, month, cpuavg, memoryavg, cpupeak, mempeak from cpumem.report where host like '%$Host_Name%' group by month ORDER BY FIELD(month,'January','February','March','April','May','June','July','August','September','October','November','December')";
	$result = mysql_query($query);
	$rows = mysql_fetch_array($result);
	$Host = $rows['host'];
	$month = $rows['month'];
	echo "<table id=table_list>";
	echo "<tr><td><b>Month</b></td><td><b>CPU Average</b></td><td><b>CPU Peak</b></td><td><b>Memory Average</b></td><td><b>Memory Peak</b></td></tr>";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	 {
	 echo "<tr><td>";
	 echo "{$row['month']}";
	 echo "</td><td>";
	 echo "{$row['cpuavg']}";
	 echo "</td><td>";
	 echo "{$row['cpupeak']}";
	 echo "</td><td>";
	 echo "{$row['memoryavg']}";
	 echo "</td><td>";
	 echo "{$row['mempeak']}";						
	 echo "</td></tr>";
	 }
	$query2 = "select model, memt, tslot, fslot from cpumem.hw where host = '$Host_Name'";
	$result2 = mysql_query($query2);
	echo "<table id=table_list>";
	while($rows = mysql_fetch_array($result2, MYSQL_ASSOC))
	 {
	echo "<tr><td><b>Model</b></td>";
	echo "<td>";
	echo "{$rows['model']}";
	echo "</td></tr>";
	echo "<tr><td><b>Total Memory</b></td>";
	echo "<td>";
	echo "{$rows['memt']}";
	echo "</td></tr>";
	echo "<tr><td><b>Memory Slots</b></td>";
	echo "<td>";
	echo "{$rows['tslot']}";
	echo "</td></tr>";
	echo "<tr><td><b>Free Slots</b></td>";
	echo "<td>";
	echo "{$rows['fslot']}";
	echo "</td></tr>";
	echo " ";
	}
	echo "</table>"; 
	echo "<br>";
	?>
</div>

<div id="checklist" class="tabcontent">
 	<?php
	$chkhst = strtoupper($Host_Name);
	if (file_exists("checklist/$chkhst.html")) {
	include("checklist/$chkhst.html");
	} else {
	echo "The file does not exist";
	}
	?>
</div>

<div id="cfg2html" class="tabcontent">
<h2><font color='#996666'><b><?php echo "$Host_Name"; ?></font></b></h2>
<?php
	$chkhtml = strtolower($Host_Name);
	foreach (glob("cfg2html/$chkhtml*") as $filename) {     
	echo "<table id=table>";
	echo "<tr><td>";
	echo "<tr><td><a target=_blank href='$filename' class=button>$filename</a></td></tr>";
	echo "</td><td>";
	}
	$htmlold = strtolower($Host_Name);
	foreach (glob("old_html/$htmlold*") as $filenameold) {     
	echo "<tr><td><a target=_blank href='$filenameold' class=button>$filenameold</a></td></tr>";
	echo "</td><td>";
	}
?>
</div>

<div id="hardening" class="tabcontent">
<h2><font color='#996666'><b><?php echo "$Host_Name"; ?></font></b></h2>
<?php
$chkhst = strtoupper($Host_Name);
$files = scandir("/var/www/html/hardening_reports/$chkhst",1);
$newest_file = $files[0];
include("/var/www/html/hardening_reports/$chkhst/$newest_file");
?>
</div>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html> 
