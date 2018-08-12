<?php
require_once('dbconnect.php');
session_start();
$ip = $_SERVER["REMOTE_ADDR"];
$sip=$_SERVER['SERVER_ADDR'];

if(isset($_POST['username']) && isset($_POST['password'])){

    $adServer = "ldap://na.lennoxintl.com";
	
    $ldap = ldap_connect($adServer);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ldaprdn = 'CORP16' . "\\" . $username;

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);

    if ($bind) {
        $filter="(sAMAccountName=$username)";
        $result = ldap_search($ldap,"dc=na,dc=lennoxintl,dc=com",$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)                       
			#$usergn = $info[$i]["givenname"][0]; 
			#echo "GN: $usergn";
			session_regenerate_id();
			$_SESSION['SESS_UNAME'] = $info[$i]["givenname"][0];
			session_write_close();
			$query = "Login Successful from $ip";
			$user = $_SESSION['SESS_UNAME'];
			include('log.php');
			header("location: landing.php");
        }
        @ldap_close($ldap);
    } else {
        $errmsg_arr[] = "user name and password not found";
		$errflag = true;
		if($errflag) 
		{
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.html");
		exit();
}
    }

}else{
?>

<?php } ?> 