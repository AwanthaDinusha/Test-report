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

  var specialKeys = new Array();
        specialKeys.push(8,9); //Backspace
       
        
     
		function IsNumericTP(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error12").style.display = ret ? "none" : "inline";
            return ret;
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
ob_start();
require( "../../data_base_connectavity.php");
require( "../../ChkSession.php"); 
require( "../../CheckLogin.php");
require("../../logic/findpo.php");
require("../Telemail_logic/logic_recieves.php");
require("../Telemail_logic/logic_recieveb.php");
require("../Telemail_logic/LOGIC_SELC_PO_LIST.php");

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
<br>
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
          
          <div align="center">
            <table width="661" >
              
              <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Telemail No</div></td>
                <td><span class=""><?php echo $TM=$Return_AXR_QFIL['TMNO'];?></span></td>
                <td>&nbsp;</td>
              </tr>
              
          

 <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Sender Name </div></td>
                <td><span id="sprytextfield1">
                  <label>
                    <input type="text" name="sqna" id="1" accesskey="1" tabindex="1" size="53" onClick="Clear1(this.id);" onblur="Clear2(this.id);" value="<?php echo $Return_AXR_QFIL['SNAME1'];?>">
                  </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                <td>&nbsp;</td>
              </tr>
       <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Sender Address </div></td>
                <td><span id="sprytextfield1">
                 <label>
                    <textarea name="swma" id="2" cols="45" rows="5" accesskey="2" onClick="Clear1(this.id);" onblur="Clear2(this.id);"tabindex="2"><?php echo $Return_AXR_QFIL['SADDRE1S'];?></textarea>
                  </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                <td>&nbsp;</td>
              </tr>
       <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Sender Contact</div></td>
                <td><span id="sprytextfield1">
                  <label>
                    <input type="text" name="sena" id="3" accesskey="3" tabindex="3" maxlength="10" size="53" onClick="Clear1(this.id);" onblur="Clear2(this.id);" onkeypress="return IsNumericTP(event);" onpaste="return false;" ondrop = "return false;" value="<?php echo $Return_AXR_QFIL['SCONTACTX'];?>"> <span id="error12" style="color: Red; display: none"><b>*Input Only 
                  
                  Numbers</b></span>
                  </label>
                  
                  
                  
                <span class="textfieldRequiredMsg">A value is required.</span>
                
                </span></td>
                <td>&nbsp;</td>
              </tr>
      


       
       <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Receiver Name </div></td>
                <td><span id="sprytextfield1">
                  <label>
                    <input type="text" name="rna" id="4" accesskey="4" tabindex="4" size="53" onClick="Clear1(this.id);" onblur="Clear2(this.id);" value="<?php echo $Return_AXR_QFIL['CUST_NAME'];?>">
                  </label>
                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Receiver Address</div></td>
                <td><span id="sprytextarea1">
                  <label>
                    <textarea  name="rad" id="5" cols="45" rows="3" accesskey="5" onClick="Clear1(this.id);" onblur="Clear2(this.id);" tabindex="5"  ><?php echo $Return_AXR_QFIL['ADDRE1S'];?></textarea>
                  </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="style2"><div align="left">Message</div></td>
                <td><span id="sprytextarea2">
                  <label>
                    <textarea name="rma" id="6" cols="45" rows="5" accesskey="6" onClick="Clear1(this.id);" onblur="Clear2(this.id);"tabindex="6"><?php echo $Return_AXR_QFIL['MSG'];?></textarea>
                  </label>
                <span class="textareaRequiredMsg">A value is required.</span></span></td>
                <td></td>
              </tr>
              <tr>
                <td width="5">&nbsp;</td>
                <td width="154" class="style2"><div align="left">Delivery Office </div></td>
                <td width="448">
                  <select name="ctpo" id="users" onChange="showUser(this.value)" tabindex="6">
                    <option name="option1" id="option1" value="">Select delivery office:</option>
                                 
                     <?PHP
					 
					 $RDS=0;
	 $TMobjposto = new EL_SELCTOR();
	 $TMobjposto->po_selctroid($RDS);?>
                  </select>
                  
                 
                  <?php  echo "selected-:";


	 $TMobjposto = new findpostoffices();
	 $TMobjposto->RE_apli_up_town ($TMobjposto->find_tpo($curPO));?>
                <td width="36">&nbsp;</td>
              </tr>
              <tr>
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td><input name="save" class="btnacti" type="submit" id="Pay" value="Save" onClick="return confirm('Are you sure you want to transfer this telemail?')" ></td>
                
                <td>&nbsp;</td>
              </tr>
            </table>
          </div>
          <p>
            <?php
		
if(isset($_POST['save']))
{$so_AS_A=new databaseconnection();	
$r_qefq_ad_esopp=$so_AS_A->getdb();

	 $awa_s1 = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['sqna']);
	 $s1_awa = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['swma']);
	 $awa_sq3 = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['sena']);
	 $rna = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['rna']);
	 $rad = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['rad']);
	 $rma = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['rma']);
	 $z_ctpo = mysqli_real_escape_string($r_qefq_ad_esopp,$_POST['ctpo']);
 	 
	if($curPO!="")
	{
		
		
		if($z_ctpo=="")
		
		{$z_ctpo=$curPO;}
$trin= new LA_ROSE_BULK();
$extream=$trin->DR_EXTREEM_TOKEN($hiugen);
$LB_fingja=new databaseconnection();
$Ra_mona=$LB_fingja->getdb();
$UP_OU231T_qwbn_w = new TM_LA_PARAGUWA();
$p56Aos_DA_HKll=$UP_OU231T_qwbn_w-> TM_INDEX_U_CORST_D($rna,$rad,$z_ctpo,$rma,$extream,$upBcad,$awa_s1,$s1_awa,$awa_sq3);
$CRISS_QF87=mysqli_query($Ra_mona,$p56Aos_DA_HKll);
$Return_AXR_lppg3e= mysqli_fetch_array($CRISS_QF87);
$divya= $Return_AXR_lppg3e[0];
		if($divya=='8762')
			{	
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
  
</table>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
</script>
</div>
</div>
</body>
</html><?php
}}

ob_end_flush();
?>
