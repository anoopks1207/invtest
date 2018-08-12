<?php
include ('main.html')
?>
html>
<head>
<link rel="shortcut icon" href="images/inventory.ico" />
<title>Inventory</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>

<form name='aksupdate' class='aksupdate' action='reports.php' method='post' >
<table id=table>
<tr>
<tr><th colspan=2 font bgcolor='#99e6ff'>Select Options to Generate Report</th></tr>

<fieldset form name='aksupdate' class='input'>
	
<select id='myselect' name='Type'>
<option value='Server'>Server</option>
</select>

<tr><td><b>Project</td>
<td>
<?php
include('dbconnect.php');
$sql="Select distinct Project from servers ORDER BY Project";   
$q=mysql_query($sql);
echo "<select name=\"Project\" id=\"myselect\">"; 
echo "<option size ='30' ></option>";
while($row = mysql_fetch_array($q)) 
{
echo "<option value='".$row['Project']."'>".$row['Project']."</option>"; 
}
echo "</select>";
?>
</td>
</tr>
<tr><td colspan='2' id='cntnt'>&nbsp;</td></tr>
<tr>
<td><b>Application</td>
<td>
<?php
include('dbconnect.php');
$sql="Select distinct SID from servers where Server_Status = 'Live' ORDER BY SID";   
$q=mysql_query($sql);
echo "<select name=\"SID\" id=\"myselect\">"; 
echo "<option size ='30' ></option>";
while($row = mysql_fetch_array($q)) 
{
echo "<option value='".$row['SID']."'>".$row['SID']."</option>"; 
}
echo "</select>";
?>
</td>
</tr>
<tr><td colspan='2' id='cntnt'>&nbsp;</td></tr>
<tr>
<td><b>Recently Updated</td>
<td><select id='myselect' name='recent'>
<option value='ALL' selected='selected'>All</option>
<option value='1 WEEK'>Last One Week</option>
<option value='2 WEEK'>Last Two Week</option>
<option value='3 WEEK'>Last Three Week</option>
<option value='1 MONTH'>Last One Month</option>
</select></td>
</tr>
<tr><td><b>OS</td>
<td>
<?php 
include('dbconnect.php');
$sql = "Select Options from Options WHERE Category='OS' AND SubCategory='0' ORDER BY Options";
   $query_resource = mysql_query($sql);
while( $rows = mysql_fetch_assoc($query_resource) ):
?>
<span> <?php echo $rows['Options']; ?></span>
<input type="checkbox" name="os[]" value="<?php echo $rows['Options']; ?>" />
<?php endwhile; ?>
</td>
</tr>
<tr><td colspan='2' id='cntnt'>&nbsp;</td></tr>
<tr>
<td><b>Server Type</td>
<td>
<?php 
include('dbconnect.php');
$sql = "Select Options from Options WHERE Category='Srv_Type' ORDER BY Options";
$query_resource = mysql_query($sql);
while( $rows = mysql_fetch_assoc($query_resource) ):
?>
<span> <?php echo $rows['Options']; ?></span>
<input type="checkbox" name="srvtype[]" value="<?php echo $rows['Options']; ?>" />
<?php endwhile; ?>
</td>
</tr>
<tr><td colspan='2' id='cntnt'>&nbsp;</td></tr>
<tr>
<td><b>Criticality</td>
<td>
<?php 
include('dbconnect.php');
$sql = "Select Options from Options WHERE Category='Criticality' ORDER BY Options";
$query_resource = mysql_query($sql);
while( $rows = mysql_fetch_assoc($query_resource) ):
?>
<span> <?php echo $rows['Options']; ?></span>
<input type="checkbox" name="Criticality[]" value="<?php echo $rows['Options']; ?>" />
<?php endwhile; ?>
</td>
</tr>
<tr><td colspan='2' id='cntnt'>&nbsp;</td></tr>
<tr>
<td><b>Location</td>
<td>
<?php 
include('dbconnect.php');
$sql = "Select Options from Options WHERE Category='Location' ORDER BY Options";
$query_resource = mysql_query($sql);
while( $rows = mysql_fetch_assoc($query_resource) ):
?>
<span> <?php echo $rows['Options']; ?></span>
<input type="checkbox" name="Srv_loc[]" value="<?php echo $rows['Options']; ?>" />
<?php endwhile; ?>
</td>
</tr>
<tr><td colspan='2' id='cntnt'>&nbsp;</td></tr>
<tr>
<td><b>Zone</td>
<td>
<?php 
include('dbconnect.php');
$sql = "Select Options from Options WHERE Category='Zone' ORDER BY Options";
$query_resource = mysql_query($sql);
while( $rows = mysql_fetch_assoc($query_resource) ):
?>
<span> <?php echo $rows['Options']; ?></span>
<input type="checkbox" name="Zone[]" value="<?php echo $rows['Options']; ?>" />
<?php endwhile; ?>
</td>
</tr>
<tr><td colspan='2' id='cntnt'><input style="float: right" type='submit' value='Search'></td></tr>
</table>
</form>
</div>  
</body>
</html>
<?php
include('reporting.php');
?>