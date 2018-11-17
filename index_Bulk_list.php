
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Pay System</title>
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<link   href="js/css/bootstrap.min.css" rel="stylesheet">
<script src="js/js/bootstrap.min.js"></script>
<style type="text/css" media="print">
.td_style {
	text-align:center;
	font:Tahoma, Geneva, sans-serif;
	color:#30F;
	size:45px;
}
.th1 {
	text-align:center;
	color:#FFF;
}
.style5 {
	color:#0B615E;
	font-size: 16px;
	font:Verdana, Geneva, sans-serif;
	font-weight:500;
	word-spacing: 3px;
}
</style>
</head>
<p>
<div class="row"></div>
<body>
<form name="Telimail">
  <?php
   
 
	require("../../db.php");
	require("../../SelectDBFields.php");	
	require("../../../ChkSession.php");
	require("../../../CheckLogin.php");
	require("../Telemail_sent/header64encription/encoding64.php");
	require("../Telemail_sent/header64encription/decoding64.php");
	
echo '<h3 align="center">e-TeleMail</h3>';

	
	 $assName = $_SESSION['ass_eowyn'];//Assistant's name (2nd Login)
	 $pmPO = $_SESSION['pm_Middle_Earth_90100'];//PM's post office
	 $Bcod = $_SESSION['Bulkcode'];	
	
	$Bcad=base64_url_decode($Bcod);
	 $Bcad=mysql_real_escape_string($Bcad);
echo '<h4 align="center">Bulk Receipt No '. $Bcad.'</h4>';
	
  $result = mysql_query("SELECT * FROM tbltelemailbulk WHERE IssuePO='$pmPO' AND Delivery_Status='0' AND F_status='5' ") or die(mysql_error());
  if($row  = mysql_fetch_array($result))
  {
	  
	  
	  echo'<table border="0" bordercolor="red" align="center">';
      echo'<thead>';
        echo'<tr bgcolor="#0B615E">';
		
  	      echo'<th align="left">&nbsp;&nbsp;</th>';
          echo'<th align="left"><font color="#FFFFFF">TM No</font></th>';
		    echo'<th align="center"><font color="#FFFFFF">&nbsp;&nbsp;Receiver Name</font></th>';		  
		    echo'<th><font color="#FFFFFF">Address</font></th>';
	        echo'<th><font color="#FFFFFF">&nbsp;&nbsp;Customer Name</font></th>';
		    echo'<th><font color="#FFFFFF">Action</font></th>';
		  
          
		 		  
         echo'</tr>';
		 echo'<tr>';
		 echo'<td height="10">&nbsp;</td>';
		 echo'</tr>';
       echo'</thead>';
       echo'<tbody>';
	  $i =0;
	  
			   
					   do {
						   $i = $i+1;
				$Address=$row['Address_1'];
				
						   	echo '<tr>';
							echo '<td align="left"><font color="#009900"><b>&nbsp;'. $i .'&nbsp;</b></font></td>';
							echo '<td align="left">'. $row['Tm_No'] . '</td>';
							echo '<td>&nbsp;&nbsp;'. $row['Customer_Name'] . '</td>';
							echo '<td>&nbsp;&nbsp;'. $Address.'</td>';
							echo '<td>&nbsp;&nbsp;'. $row['SName'] . '</td>';
							
							
							
							
							//Tranfer Button
							echo '</td>';
							if($row['Print_stats']=='0'&& $row['Delivery_Status']=='0'&& $row['F_status']=='5' ){
							
							$ID = $row['ID'];
							$bases=base64_url_encode($ID);

								echo '<td width=82 align="center">';
								echo '&nbsp;&nbsp;&nbsp;';
								echo '<a class="btn btn-success btn-xs" title="Transfer" href="Bulk_update.php?upno='.$bases.'">Update</a>';
								}
							
							else if($row['Print_stats']=='1'&& $row['Delivery_Status']=='0'&& $row['F_status']=='0' ){
							
								echo '<td width=82 align="center">';
								echo '&nbsp;&nbsp;&nbsp;';
								echo '<a disabled="disabled" class="btn btn-default">Update</a>';		
								}
							
							else if($row['Print_stats']=='1'&& $row['Delivery_Status']=='1'&& $row['F_status']=='1' ){
							
								echo '<td width=82 align="center">';
								echo '&nbsp;&nbsp;&nbsp;';
								echo '<a disabled="disabled" class="btn btn-default">Update</a>';
							}
							
							echo '</td>';
							
							
							echo '</tr>';
							
					   }while($row  = mysql_fetch_array($result));
					   
				    			
	mysql_close($conn);				   
  }
  else{
	                echo '<tr>';
					echo '<td align="center" colspan="6" ><h2> <span class="td_style">No e-Telemails to your Post Office</span></h2> </td>';
		    		echo '</tr>';  
  }
					   
					
	
	
	
	
	  ?>
  </tbody>
  </table>
</form>
</p>
</form>
</div>
</div>
</body>
</html>