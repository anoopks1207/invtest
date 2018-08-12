
<html>
<head>
<link rel="shortcut icon" href="images/inventory.ico" />
<style type="text/css">
body {
                background: #f0f0f0;
                margin: 0;
                padding: 0;
                font: 10px normal Verdana, Arial, Helvetica, sans-serif;
                color: #444;
}
</style>
<link rel="stylesheet" type="text/css" href="user_css/userinfo.css">

</head>
 
<body>
<?php

include('user_dbconnect.php');
if(isset($_REQUEST['uname']))
{
include('user_search_with_searchname.php');
}
else
{
     
}
?>
</body>
</html>
