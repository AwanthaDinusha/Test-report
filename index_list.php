
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Pay System</title>
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>

<link   href="js/css/bootstrap.min.css" rel="stylesheet">
<script src="js/js/bootstrap.min.js"></script>


</head>
<p>
<div class="row">
   
  </div>
<body>

 <form name="Telimail">
     <?php
   
 
	require("../../db.php");
	require("../../SelectDBFields.php");	
	require("../../../ChkSession.php");
	require("../../../CheckLogin.php");
	require("../Telimail/findpo.php");
	require("../Telemail_sent/header64encription/encoding64.php");
	require("../Telemail_sent/header64encription/decoding64.php");

echo '<h3 align="center">e-TeleMail</h3>';

	 $assName = $_SESSION['ass_eowyn'];
	 $pmPO = $_SESSION['pm_Middle_Earth_90100'];
	 $Bcod = $_SESSION['Bulkcode'];	
	
	$Bcad=base64_url_decode($Bcod);
	 $Bcad=mysql_real_escape_string($Bcad);
echo '<h4 align="center">Bulk Receipt No '. $Bcad.'</h4>';

  $result = mysql_query("SELECT ID,Tm_No,Bulk_Id,Message,POCode,IssuePO,F_status,SName,Print_stats,Customer_Name,Address_1 FROM tbl_online_telem WHERE Bulk_Id='$Bcad' AND IssuePO='$pmPO' AND `F_status`=5  OR `F_status` =6  OR `F_status` =9 OR `F_status` =10 ") or die(mysql_error());
  if($row  = mysql_fetch_array($result))
  {
	  
	  
	  echo'<table border="0" bordercolor="#0B615E" align="center">';
      echo'<thead>';
        echo'<tr bgcolor="#0B615E">';
		
  	        echo'<th align="left">&nbsp;&nbsp;</th>';
            echo'<th align="left"><font color="#FFFFFF">TM No</font></th>';
		    echo'<th align="center"><font color="#FFFFFF">&nbsp;&nbsp;Receiver Name</font></th>';		  
		    echo'<th><font color="#FFFFFF">Address</font></th>';
			echo'<th><font color="#FFFFFF">&nbsp;&nbsp;Customer Name</font></th>';
			echo'<th><font color="#FFFFFF">&nbsp;&nbsp;Post Office</font></th>';
			echo'<th><font color="#FFFFFF">Type</font></th>';
			echo'<th><font color="#FFFFFF">Status</font></th>';
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
				$pmPunic=$row['POCode'];
				 $TMobj = new findpo();
	 $printpo= $TMobj->find_tpo($pmPunic);
				
						   	echo '<tr>';
							
							echo '<td align="left"><font color="#009900"><b>&nbsp;'. $i .'&nbsp;</b></font></td>';
							echo '<td align="left">'. $row['Tm_No'] . '</td>';
							echo '<td>&nbsp;&nbsp;'. $row['Customer_Name'] . '</td>';
							echo '<td>&nbsp;&nbsp;'. $Address.'</td>';
							echo '<td>&nbsp;&nbsp;'. $row['SName'] . '</td>';
							echo '<td>&nbsp;&nbsp;'. $printpo . '</td>';
							
							//type of telemail
							
							if($row['F_status']=='5' || $row['F_status']=='9')
							{echo '<td>&nbsp;&nbsp;Accept online &nbsp;&nbsp;</td>';}
							
							else if($row['F_status']=='6' || $row['F_status']=='10')
							{echo '<td>&nbsp;&nbsp;Excel upload &nbsp;&nbsp;</td>';}
							
					
							
							else
							{echo '<td>&nbsp;&nbsp;***</td>';}
							
							// update or not
							
							if($row['F_status']=='5' || $row['F_status']=='6')
							{echo '<td>&nbsp;&nbsp;Not update &nbsp;&nbsp;</td>';}
							
							else if($row['F_status']=='9' || $row['F_status']=='10')
							{echo '<td>&nbsp;&nbsp;Updated &nbsp;&nbsp;</td>';}
							
					
							
							else
							{echo '<td>&nbsp;&nbsp;***</td>';}
							
				
							echo '</td>';
							$ID = $row['ID'];
							$bases=base64_url_encode($ID);
				
							if($row['F_status']=='5' || $row['F_status']=='6'  ){
	
								echo '<td width=82 align="center">';
								echo '&nbsp;&nbsp;&nbsp;';
								echo '<a class="btn btn-info btn-block" title="Update" href="Bulk_update.php?upno='.$bases.'">Update</a>';
								}
							
							
							else if($row['F_status']=='9' || $row['F_status']=='10'){
							
								echo '<td width=82 align="center">';
								echo '&nbsp;&nbsp;&nbsp;';
								echo '<a class="btn btn-info btn-block" title="Update" href="Bulk_update.php?upno='.$bases.'">Update</a>';
								}
								
							
							echo '</td>';
							
							
							
							
					   }while($row  = mysql_fetch_array($result));
					   
					  
				    			
	mysql_close($conn);				   
  }
  
  
  else{               echo '<tr>';
				header("Location:../TM_warning/warning64.php");
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