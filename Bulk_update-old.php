<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>e-Pay System</title>

<script language="javascript1.5" type="text/javascript">


function Clear1(str)
{    
   document.getElementById(str).value= "";
}

function Clear2(str2)
{    
var aa1=document.getElementById(str2);
	if (aa1.value==""){  
    document.getElementById(str2).style.backgroundColor = "#ffcccc"; 
	}else{
    document.getElementById(str2).style.backgroundColor = "#ffffff";   
  }
}

</script>

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<link href="../../css/common_table_style.css" rel="stylesheet" type="text/css" />
<link href="../../css/common_style.css" rel="stylesheet" type="text/css" />

</head>
<?php

require( "../../data_base_connectavity.php");
require( "../../ChkSession.php"); 
require( "../../CheckLogin.php");
require("../../logic/findpo.php");
require("../Telemail_logic/logic_recieves.php");

	require("../Telemail_sent/header64encription/encoding64.php");
	require("../Telemail_sent/header64encription/decoding64.php");
	$assName = $_SESSION['ass_eowyn'];
	$pmPO = $_SESSION['pm_Middle_Earth_90100'];
	$assID=$_SESSION['ass_Din_Ironfoot_156'];
	
	if(isset($_GET['upno'])){
	 $ROZ_heb=$_GET['upno'];
	
	 $ROZ_heb=base64_url_decode($ROZ_heb);
	 $upBcad=$ROZ_heb;
	 $LB_fingja=new databaseconnection();
	$Ra_mona=$LB_fingja->getdb();
	 
	 $UP_OUT_qwbn_CALL = new TM_LA_PARAGUWA();
 		 $paqpos_DA_HKll=$UP_OUT_qwbn_CALL-> TM_INDEX_F_LOSD_D($ROZ_heb);
		 $KUDNX_CRISS_QF87=mysqli_query($Ra_mona,$paqpos_DA_HKll);
		 $Return_AXR_QFIL= mysqli_fetch_array($KUDNX_CRISS_QF87);	
	 	
//TMNO,BULKNO,CUST_NAME,ADDRE1S,POCode1,MSG,WR,TYPE_TM,SNAME1,SADDRE1S,SCONTACTX,AMOUNTEACH,ISSUEPO2,ISSUEBY,ISSUEDATE,ISSUETS,PRINTSTS,PRINTDATE,PRINTTS,PRINTBY,DLYSTS,DLYDATE,DLYTS,DLYBY,FISTS,FSTS;
		
	  //$upBcad=mysql_real_escape_string($upBcad);
	/*
		 $dbconnection=new databaseconnection();
	$mysqli=$dbconnection->getdb();
	$results = "SELECT * FROM tbl_online_telem WHERE ID='$upBcad'";
	 $result = $mysqli->query($results);  
	$Return_AXR_QFIL = mysqli_fetch_array($result);
	*/
	$print_status=$Return_AXR_QFIL[16];

	$Delivery_status=$Return_AXR_QFIL['DLYSTS'];
	$Address=$Return_AXR_QFIL['ADDRE1S'];
	$curPO=$Return_AXR_QFIL['POCode1'];
	$UPID=$Return_AXR_QFIL['BULKNO'];
	$hiugen=$Return_AXR_QFIL['FSTS'];

	$base_upino=base64_url_encode($UPID);
$_SESSION['Bulkcode'] = $base_upino;
	
		
if($print_status==0 && $Delivery_status== 0){
	
?>
<body>

        <div align="center">
    <div class="datagridview">


<form action="" method="post" name="FrmPayments" id="FrmPayments">

      
     
        <table width="670" border="0">
        <thead><th colspan="4">Bulk Telemail update</th></thead>
            <tr>
              <td width="207">&nbsp;</td>
              <td width="117">&nbsp;</td>
           	  <td width="40">&nbsp;</td>
              
            </tr>
            
            
        </tr>
            
          </table>
          <br>
          <div align="center">
            <table width="661" >
              
              <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Telemail No</div></td>
                <td><span class="style3"><?php echo $TM=$Return_AXR_QFIL['TMNO'];?></span></td>
                <td>&nbsp;</td>
              </tr>
              
            
              <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Sender Name </div></td>
                <td><span class="style3"><?php echo $Return_AXR_QFIL['SNAME1'];?></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Sender Address </div></td>
                <td><span class="style3"><?php echo $Return_AXR_QFIL['SADDRE1S'];?></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Sender Contact</div></td>
                <td><span class="style3"><?php echo $Return_AXR_QFIL['SCONTACTX'];?></span></td>
                <td>&nbsp;</td>
              </tr>
              
              <!--	<tr>
			<td>&nbsp;</td>
			<td class="style2"><div align="left">Amount</div></td>
			<td>
            	<div align="left">
				<input name="Amnt" type="text" id="Amnt" tabindex="10" onBlur="this.value=formatCurrency(this.value);" onChange="Letters(Amnt.value);">&nbsp;
                <font color="#0000FF"><label id="Lett"></label></font>
				</div>
			</td>
			<td>&nbsp;</td>
		</tr>
       -->
       <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Receiver Name </div></td>
                <td><span id="sprytextfield1">
                  <label>
                    <input type="text" name="rna" id="1" accesskey="1" tabindex="1" size="53" onClick="Clear1(this.id);" onblur="Clear2(this.id);" value="<?php echo $Return_AXR_QFIL['CUST_NAME'];?>">
                  </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Receiver Address</div></td>
                <td><span id="sprytextarea1">
                  <label>
                    <textarea  name="rad" id="2" cols="45" rows="3" accesskey="2" onClick="Clear1(this.id);" onblur="Clear2(this.id);" tabindex="2"  ><?php echo $Return_AXR_QFIL['ADDRE1S'];?></textarea>
                  </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Message</div></td>
                <td><span id="sprytextarea2">
                  <label>
                    <textarea name="rma" id="3" cols="45" rows="5" accesskey="3" onClick="Clear1(this.id);" onblur="Clear2(this.id);"tabindex="3"><?php echo $Return_AXR_QFIL['MSG'];?></textarea>
                  </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
                <td></td>
              </tr>
              <tr>
                <td width="5">&nbsp;</td>
                <td width="154" class="style2"><div align="left">Delivery Office </div></td>
                <td width="448"><?php
	

					//$result = mysql_query("SELECT * FROM `poffice` WHERE `POName` LIKE'%PO%' OR `POName` LIKE'%SPO%' ORDER BY `POName` ASC ");
					//$result = mysql_query("SELECT POCode,POName FROM tbl_online_delivery WHERE 1 ORDER BY `POName` ");
					
					$congeringt=new databaseconnection();
                $mresult=$congeringt->getdb(); 
                $sql_creart= "SELECT POCode,POName,Line_Status FROM tbl_online_delivery WHERE Line_Status=0 ORDER BY POName ASC";
                
                $result = $mresult->query($sql_creart);
                
?>
                  <select name="slectpo" id="users" onChange="showUser(this.value)" tabindex="6">
                    <option name="option1" id="option1" value="">Select delivery office:</option>
                    <?php   
                                 while ($Return_AXR_QFIL = mysqli_fetch_array($result)) 
					      {//find the valied start and end date							

							?>
                    <option value="<?php echo $Return_AXR_QFIL['POCode'];?>"> <?php echo $Return_AXR_QFIL["POName"]; ?> </option>
                    <?php  } ?>
                  </select>
                  
                  <!-- <span class="selectRequiredMsg">Select an item!</span>-->
                  
                <td width="36">&nbsp;</td>
              </tr>
              <tr>
                <td height="76">&nbsp;</td>
                <td>&nbsp;</td>
                <td><table width="152" border="0">
                    <tr>
                      <td width="56"><input name="save" type="submit" id="Pay" value="Save" onClick="return confirm('Are you sure you want to transfer this telemail?')" ></td>
                      <td width="134"><div align="left"></div></td>
                    </tr>
                  </table></td>
                <font color="green"></font>
                <td>&nbsp;</td>
              </tr>
            </table>
          </div>
          <p>
            <?php
		
if(isset($_POST['save']))
{$dbconect=new databaseconnection();	
$r_qefq_ad_esopp=$dbconect->getdb();
	 $rna = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['rna']);
	 $rad = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['rad']);
	 $rma = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['rma']);
	 $slectpo = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['slectpo']);
 $upBcad;
 
 	if($hiugen==5)
	{$hiugen=9;}
	elseif($hiugen==6)
	{$hiugen=10;} 
	if($slectpo!="")
	{
		
		
	 $LB_fingja=new databaseconnection();
	$Ra_mona=$LB_fingja->getdb();
	 
	 $UP_OU231T_qwbn_w = new TM_LA_PARAGUWA();
 echo $paqp56Aos_DA_HKll=$UP_OU231T_qwbn_w-> TM_INDEX_U_CORST_D($rna,$rad,$slectpo,$rma,$hiugen,$upBcad);
		 $KUDNX_CRISS_QF87=mysqli_query($Ra_mona,$paqp56Aos_DA_HKll);
		 $Return_AXR_lppg3e= mysqli_fetch_array($KUDNX_CRISS_QF87);
		 
		 
		
			if($Return_AXR_lppg3e[0]=="8762")
			{	
			
				//$bases=base64_url_encode($upBcad);		
				header("Location:index_list_bulk.php?Buno=$base_upino");
			}
			else
			{
				echo "Fail Insertion contact ICT division";	
			}
	}
	else
	{
		echo "<label class='colory'>You did not select a post office";	
	}



mysqli_close($r_qefq_ad_esopp);
mysqli_close($Ra_mona);
 

}

if(isset($_POST['Reset']))
{
	//header("Location:index.php");
}

		
		?>
          </p>
        </fieldset>
      </form></td>
  </tr>
  <tr>
<td height="21">&nbsp;</td>
</tr>
</table>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
</script>
</body>
</html><?php
}}
?>
