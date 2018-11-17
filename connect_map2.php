<?php




$linecheck = mysqli_connect($host, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

if (!$linecheck)
 {
   {header("Location: error/Error_404.php");exit;}
}
/*
$linecheck=mysql_connect($host,$username,$password) or die ("Server Connect Error".mysql_error());
	$sel=mysql_select_db($dbname) or die ("Database Select Error".mysql_error());
*/
?>