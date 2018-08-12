<?php
include('main.html');
include('dbconnect.php');
if(isset($_REQUEST['hostname']))
{
        $str = $_REQUEST['hostname'];
        $findme = ":";
        $pos = strpos($str, $findme);
        if ($pos === false) {
                include('search_with_searchname.php');
        }
}
else
{
        include('landing.php');
}
?>

