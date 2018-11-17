<?php

require("logic/record_layer.php");
require("logic/logic_orbit.php");
require("logic/logic_layer.php");
 

if(isset($_GET['ID'] )&&( $_GET['UNAME'])&&( $_GET['WO']))
	
	{
		
echo $v_ID_clos=$_GET['ID'];
echo $v_UNAME_clos=$_GET['UNAME'];
echo $v_UNWO_clos=$_GET['WO'];
echo $v_SVR_call=$_GET['linkcall'];

 $loginwindow="A";
$ip=$_SERVER['REMOTE_ADDR'];
$cutdate= new ORBIT_CYCRAL();
$currentdate=$cutdate->GET_AUTOUPDATE();

$li=773;

		if(($v_ID_clos!='')&&($v_UNAME_clos!='')&&($v_UNWO_clos!=''))
		{
			session_start();
			session_unset();
			$_SESSION = array();
			session_destroy();
			
					
			header("Location: " . $_SERVER['php_SELF']); 
			if($v_SVR_call==905)
			{
		echo $URL="http://192.168.1.19/EPayTest_my/Logout.php?light_sts=$li";
			}
			if($v_SVR_call==906)
			{
		echo $URL="http://192.168.1.19/EPayTest_my/Logout.php?light_sts=$li";
			}
			if($v_SVR_call==907)
			{
		echo $URL="http://192.168.1.19/EPayTest_my/Logout.php?light_sts=$li";
			}
			if($v_SVR_call==908)
			{
		echo $URL="http://192.168.1.19/EPayTest_my/Logout.php?light_sts=$li";
			}
			if($v_SVR_call==909)
			{
		echo $URL="http://192.168.1.19/EPayTest_my/Logout.php?light_sts=$li";
			}
			if($v_SVR_call==910)
			{
		echo $URL="http://192.168.1.19/EPayTest_my/Logout.php?light_sts=$li";
			}
		header ("Location: $URL");
			
	
			
	//$URL="main_login.php";
		//header("Location: $URL");
  
		}}//if isset
?> 