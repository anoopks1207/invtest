<html>
<head>
<link rel="shortcut icon" href="images/inventory.ico" />
<title>Inventory</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
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

#myselect { 
width:100%; 
padding: 6px 20px;
outline: none;

font-size: 16px;
background-position: 255px -8px;
background-repeat: no-repeat;
}
#format_select { 
width:70px; 
padding: padding: 12px 20px;
outline: none;
border: 1px solid #ccc;
border-radius: 5px;
background-color: #ffffff;
font-size: 12px;
background-position: 255px -8px;
background-repeat: no-repeat;
}
#myselect option {

}
* { margin: 0; padding: 0; }
body { font: 14px Georgia, serif; }

input[type=text], select {
    width: 100%;
    padding: 6px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
</head>
<?php
$hname=$_REQUEST["hostname"];
$hname=trim($hname); 
$query = mysql_query("SELECT * FROM servers WHERE Host_Name = '$hname'");
$rows = mysql_fetch_array($query);
$num_rows = mysql_num_rows($query);
 
if(!$rows)
{
echo "<script type=\"text/javascript\">alert('The Server $hname Does not Exist');"."window.location = 'searchhost.php?hostname=$hname'</script>";
}
$Criticality = $rows['Criticality'];
$Virtual_Host = $rows['Virtual_Host'];
$Server_loc = $rows['Server_loc'];
$Server_Zone = $rows['Server_Zone'];
$SID = $rows['SID'];
$Model =  $rows['Model'];
$Server_Type = $rows['Server_Type'];
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
$Project = $rows['Project'];
$ansible = $rows['ansible'];
$Application = $rows['Application'];
$Application_Owner = $rows['Application_Owner'];
$Application_sup_grp = $rows['Application_sup_grp'];
$timestamp = $rows['timestamp'];
?>
<?php
	$get=mysql_query("SELECT Options from Options where Category = 'Location'" );
	$location_u = '';
	 while($row = mysql_fetch_assoc($get))
	{
	  $location_u .= '<option value = "'.$row['Options'].'">'.$row['Options'].'</option>';
	}
	?>	
<?php
	echo "<form name='aksupdate' class='aksupdate' action='updatedbsd.php' method='post'>";
    echo "<table id=table>";
	echo "<th><font color='#996666'><b> $hname </font></th>";
	echo "<fieldset form name='aksupdate' class='input'>";
	if ($Criticality == Development)
	{
	echo "<tr><td>Environment</td> 
	<td><select id='myselect' name='Criticality'>
			<option selected>$Criticality</option>
                <option value='Sandbox'>Sandbox</option>
				<option value='DR'>DR</option>
				<option value='Test'>Test</option>
				<option value='Production'>Production</option>
             	</select></td><td>SID</td><td><input type='text' name='SID' value='$SID'></td></tr>";
	}else if ($Criticality == Production)
	{
	echo "<tr><td>Environment</td> 
	<td><select id='myselect' name='Criticality'>
			<option selected>$Criticality</option>
                <option value='Sandbox'>Sandbox</option>
				<option value='DR'>DR</option>
				<option value='Test'>Test</option>
				<option value='Development'>Development</option>
             	</select></td><td>SID</td><td><input type='text' name='SID' value='$SID'></td></tr>";
	}else if ($Criticality == Sandbox)
	{
	echo "<tr><td>Environment</td> 
	<td><select id='myselect' name='Criticality'>
			<option selected>$Criticality</option>
                <option value='Production'>Production</option>
				<option value='DR'>DR</option>
				<option value='Test'>Test</option>
				<option value='Development'>Development</option>
             	</select></td><td>SID</td><td><input type='text' name='SID' value='$SID'></td></tr>";
	}else if ($Criticality == DR)
	{
	echo "<tr><td>Environment</td> 
	<td><select id='myselect' name='Criticality'>
			<option selected>$Criticality</option>
                <option value='Production'>Production</option>
				<option value='Sandbox'>Sandbox</option>
				<option value='Test'>Test</option>
				<option value='Development'>Development</option>
             	</select></td><td>SID</td><td><input type='text' name='SID' value='$SID'></td></tr>";
	}else if ($Criticality == Test)
	{
	echo "<tr><td>Environment</td> 
	<td><select id='myselect' name='Criticality'>
			<option selected>$Criticality</option>
                <option value='Production'>Production</option>
				<option value='Sandbox'>Sandbox</option>
				<option value='DR'>DR</option>
				<option value='Development'>Development</option>
             	</select></td><td>SID</td><td><input type='text' name='SID' value='$SID'></td></tr>";
	}	
	if ($Status == Live)
				{
				echo "<tr><td>Status</td>
				<td><select id='myselect' name='Status'>
				<option value=$Status>$Status</option>					
                <option value='Decommissioned'>Decommissioned</option>
             	</select></td>
	<td>Virtual Host</td><td><input type='text' name='Virtual_Host' value='$Virtual_Host'></td></tr>";
				}else
				{
				echo "<tr><td>Status</td>
				<td><select id='myselect' name='Status'>
				<option value=$Status>$Status</option>					
                <option value='Live'>Live</option>
             	</select></td>
	<td>Virtual Host</td><td><input type='text' name='Virtual_Host' value='$Virtual_Host'></td></tr>";	
				}				
	if ($Server_Type == 'Physical')
				{
				echo "<tr><td >Server Type</td>
				<td><select id='myselect' name='Server_Type'>
				<option value=$Server_Type>$Server_Type</option>					
                <option value='Virtual'>Virtual</option>
             	</select></td>";
				}else
				{
				echo "<td >Server Type</td>
				<td><select id='myselect' name='Server_Type'>
				<option value=$Server_Type>$Server_Type</option>					
                <option value='Physical'>Physical</option>
             	</select></td>";
				}
	echo "<td>Server Location</td>
	<td><select id='myselect' name='Server_loc'>	
	<option selected=selected >$Server_loc</option>			
	<option value=$Server_loc>$location_u</option>
	</td></tr>";	
	if ($Server_Zone == 'Trusted')
				{
				echo "<tr><td >Server Zone</td>
				<td><select id='myselect' name='Server_Zone'>
				<option value=$Server_Zone>$Server_Zone</option>					
                <option value='DMZ'>DMZ</option>
             	</select></td>";
				}else
				{
				echo "<td >Server Zone</td>
				<td><select id='myselect' name='Server_Zone'>
				<option value=$Server_Zone>$Server_Zone</option>					
                <option value='Trusted'>Trusted</option>
             	</select></td>";
				}
	echo "<td>Model</td><td><input type='text' name='Model' value='$Model'></td></tr>";
	echo "<tr><td>Serial Number</td><td><input type='text' name='Serial' value='$Serial'></td><td colspan=2 ><legend><b>Application Details </b></legend></td>";
	echo "<tr><td>OS</td><td><input type='text' name='OS' value='$OS'></td><td>Project</td><td><input type='text' name='Project' value='$Project'></td></tr>";
	echo "<tr><td>OS Version</td><td><input type='text' name='OS_Version' value='$OS_Version'></td><td>Application</td><td><input type='text' name='Application' value='$Application'></td></tr>";
	echo "<tr><td>Number of CPU</td><td><input type='text' name='CPUs' value='$CPUs'></td><td>Application Owner</td><td><input type='text' name='Application_Owner' value='$Application_Owner'></td></tr>";
	echo "<tr><td>Core per CPU</td><td><input type='text' name='Core_per_CPU' value='$Core_per_CPU'></td><td>Application Support Group</td><td><input type='text' name='Application_sup_grp' value='$Application_sup_grp'></td></tr>";
	echo "<tr><td>CPU Speed</td><td><input type='text' name='CPU_Speed' value='$CPU_Speed'></td><td>Leasing Company or Purchased</td><td><input type='text' name='Leas_Purchased' value='$Leas_Purchased'></td></tr>";
	echo "<tr><td>Memory</td><td><input type='text' name='Memory' value='$Memory'></td><td>Maintenance thru Source Direct or HP</td><td><input type='text' name='Maint_SD_HP' value='$Maint_SD_HP'></td></tr>";
	echo "<tr><td>10.0.x.x Subnet IP - lanx</td><td><input type='text' name='ten_Subnet' value='$ten_Subnet'></td><td>Maintenance Contact Number</td><td><input type='text' name='Maint_Con_Number' value='$Maint_Con_Number'></td></tr>";
	echo "<tr><td>175.1.2.x Subnet IP - lanx</td><td><input type='text' name='sev_Subnet' value='$sev_Subnet'></td><td>Expiry</td><td><input type='text' name='Expiry' value='$Expiry'></td></tr>";
	echo "<tr><td >Notes</td><td><input type='text' name='Notes' value='$Notes'></td>";	
	if ($ansible == 'No')
				{
				echo "<td >Ansible Integration</td>
				<td><select id='myselect' name='ansible'>
				<option value=$ansible>$ansible</option>					
                <option value='Yes'>Yes</option>
             	</select></td>";
				}else
				{
				echo "<td >Ansible Integration</td>
				<td><select id='myselect' name='ansible'>
				<option value=$ansible>$ansible</option>					
                <option value='No'>No</option>
             	</select></td>";
				}	
	echo "<tr><td colspan=2><a class='button' href='searchhost.php?hostname=$hname'>&laquo; Cancel</a></td><td colspan=2><button class='button' name='hostn' value='$hname'>Submit &raquo;</button></td></tr>";
	echo "<tr></tr>";
	echo "</table>";
	echo "</fieldset>";
	echo "</form>";
	echo "</body>";
?>                

   