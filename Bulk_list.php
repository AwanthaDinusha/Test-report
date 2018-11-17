<?php 
require( "../../data_base_connectavity.php");
require( "../../ChkSession.php"); 
require( "../../CheckLogin.php");
require("../../logic/findpo.php");
require("../../logic/infommsg_lyer.php");
require( "../Telemail_sent/header64encription/encoding64.php"); 
	 $startdat=$_GET[ 'startdat'];
	  $enddat=$_GET[ 'enddat'];
	  ?>
      
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>e-Telemail System</title>
    <!--	<script type="text/javascript" src="MOIssue.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
	<link href="js/css/bootstrap.min.css" rel="stylesheet">
	<script src="js/js/bootstrap.min.js"></script>
    
    -->
    
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <link href="../../css/common_table_style.css" rel="stylesheet" type="text/css" />
    <link href="../../css/common_style.css" rel="stylesheet" type="text/css"/>
    <script src="../../js/stalert.min.js"> </script>
    <link href="../../css/stalert.css" rel="stylesheet" type="text/css">
</head>
<p>
	<div class="row"></div>

	<body>
		<form name="Telimail">
			<?php
		echo "<br/>";	
	 $dbconnection=new databaseconnection();
	$mysqli=$dbconnection->getdb();
			 $assName=$_SESSION['ass_eowyn'];//Assistant 's name (2nd Login)
	
	 $pmPO = $_SESSION['pm_Middle_Earth_90100']; 
	 $sql_query="SELECT  DISTINCT (*)  FROM srilankan_request WHERE   ";
	 /*
	 SELECT DISTINCT(`SponcerID`),`PassPortNumber` FROM `srilankan_request` WHERE `RequestType`='1' AND`ActionControler`='2'
	 
	 
	 SELECT DISTINCT(`SponcerID`) FROM `srilankan_request` 
INNER JOIN `sponsor` ON srilankan_request.SponcerID=sponsor.ID
WHERE srilankan_request.RequestType='1' AND srilankan_request.`ActionControler`='1'

SELECT DISTINCT(`SponcerID`),sponsor.Salutation,sponsor.SponsorName FROM `srilankan_request` 
INNER JOIN `sponsor` ON srilankan_request.SponcerID=sponsor.ID
WHERE srilankan_request.RequestType='1' AND srilankan_request.`ActionControler`='1'
	 */
    $result = $mysqli->query($sql_query);
		 
	  
	 if($row = mysqli_fetch_array($result)) {
		 
		 
	$TMissuper = new findpostoffices();
$msg_per= $TMissuper->find_pers_on($row['Issue_officer']);

echo"<div class='datagrid'> ";
		  echo '<table  align="center">';
		   echo '<thead>'; echo '<tr>';
	  echo '<th align="left"></th>';
	   echo '<th align="left"><font color="#FFFFFF">&nbsp;&nbsp;Bulk ID&nbsp;&nbsp;</font></th>'; 
	   echo '<th align="center"><font color="#FFFFFF">&nbsp;&nbsp;Start No&nbsp;&nbsp;</font></th>'; echo '<th><font color="#FFFFFF">&nbsp;&nbsp;End No&nbsp;&nbsp;</font></th>'; 
	   echo '<th><font color="#FFFFFF">&nbsp;&nbsp;Date and Time&nbsp;&nbsp;</font></th>';
	    echo '<th><font color="#FFFFFF">&nbsp;&nbsp;Officer&nbsp;&nbsp;</font></th>';
		  echo '<th><font color="#FFFFFF">&nbsp;&nbsp;Update&nbsp;&nbsp;</font></th>';
		  echo '<th><font color="#FFFFFF">&nbsp;&nbsp;Proceed&nbsp;&nbsp;</font></th>'; 
		  echo '</tr>';
	  echo '</thead>'; echo '<tbody>';	  $i=0;
	 
	  do { $i=$i+1; echo '<tr>'; echo '<td align="center"><font color=""><b>'. $i .'</b></font></td>'; echo '<td align="left">&nbsp;&nbsp;'. $row[ 'Bulk_Id'] . '&nbsp;&nbsp;</td>'; echo '<td>&nbsp;&nbsp;'."TM". $row[ 'Start_Tm'] . '&nbsp;&nbsp;</td>'; echo '<td>&nbsp;&nbsp;'."TM". $row[ 'Last_Tm']. '&nbsp;&nbsp;</td>'; echo '<td>&nbsp;&nbsp;'. $row[ 'Date_Time'] . '&nbsp;&nbsp;</td>'; echo '<td>&nbsp;&nbsp;'. $msg_per . '&nbsp;&nbsp;</td>'; echo '</td>'; $ID=$row[ 'Bulk_Id'];
	  
	   $bases=base64_url_encode($ID);
	    if($row[ 'BStatus']=='0' || $row[ 'BStatus']=='5' ){ echo '<td width=82 align="center">'; echo '&nbsp;&nbsp;&nbsp;'; echo '<a class="btnacti" title="Update" href="index_list_bulk.php?Buno='.$bases. '">Update</a>'; echo '</td>';
	   
	   
	   } 
	   if($row[ 'BStatus']=='1' || $row[ 'BStatus']=='2' ){ echo '<td width=82 align="center">'; echo '&nbsp;&nbsp;&nbsp;'; echo '<a class="btnacti" title="Update" href="index_list_bulk.php?Buno='.$bases. '">View</a>'; echo '</td>';}
	   
	   	$ID = $row['Bulk_Id'];
							$bases1=base64_url_encode($ID);
							// update message
							if($row['BStatus']=='0' ){
								
								
	
								echo '<td width=82 align="center">';
								echo '&nbsp;&nbsp;&nbsp;';
								echo '<a class="btnacti" title="Proceed" href="proceed.php?Bunoproc='.$bases1.'">Proceed</a>';
								echo '</td>';
								}
								elseif($row['BStatus']=='5')
								{
										echo '<td width=82 align="center">';
								echo '&nbsp;&nbsp;&nbsp;';
								echo '<a class="btnacti" title="Proceed" href="proceed2.php?Bunoproc='.$bases1.'">Proceed</a>';
								echo '</td>';
									}
							
							elseif($row['BStatus']=='1' )
								{
										echo '<td width=82 align="center">';
								echo '&nbsp;&nbsp;&nbsp;';
								echo '<a disabled="disabled"  class="btndefault">Proceed</a>';
								echo '</td>';
									}
									
									elseif($row['BStatus']=='2')
								{
										echo '<td width=82 align="center">';
								echo '&nbsp;&nbsp;&nbsp;';
								echo '<a disabled="disabled" class="btndefault" >Proceed</a>';
								echo '</td>';
									}
									
							
							
	    }
	   
	   
	   
	   while($row=mysqli_fetch_array($result)); mysqli_close($mysqli); } else{ echo '<tr>'; 
	   
	   	//header("Location:../TM_warning/warning62.php");
		
/*$msgp = new B_K_Eor_MSG();
   $msgp->MESSPRINTVI_EWYESNO();	
   */
   

	    echo '<td align="center" colspan="6" > <span class="style21">
	   
	   Can not find Bulk referance number during your selected period </span> </td>'; echo '</tr>'; } ?>
			</tbody>
			</table>
		</form>
</p>
</form>
</div>
</div>
</body>

</html>