<?php
require_once("../../../db.php");
require_once("../../../SelectDBFields.php");	
require_once("../../../../ChkSession.php");
require_once("../../../../CheckLogin.php");
include 'reader.php';
require("connect_maping.php");
require("up_layer.php");
mysql_query ("set character_set_client='utf8'"); mysql_query ("set character_set_results='utf8'"); mysql_query ("set collation_connection='utf8_general_ci'"); $PoCode = $_SESSION['pm_Middle_Earth_90100']; $IssuedBy = $_SESSION['ass_eowyn']; $ReceiptNo =$_SESSION['END_BID_cal']; $Th_call = new TM_EX_ONLINE_UPLOAD(); $rep_hcall=$Th_call -> TM_EX_S_PrI($ReceiptNo); $re_h=mysqli_query($linecheck, $rep_hcall); $Arr_h_bl= mysqli_fetch_array($re_h); $St_no_TM = $Arr_h_bl[0]; $Lt_no_TM = $Arr_h_bl[1]; $PO_CODE = $Arr_h_bl[2]; $ISS_OFFICER = $Arr_h_bl[3]; $IssuedTime = $Arr_h_bl[4]; $re_h->close(); $linecheck->next_result(); $Th_call = new TM_EX_ONLINE_UPLOAD(); $rep_hcall=$Th_call -> TM_EX_S_PrJ($ReceiptNo); $re_h=mysqli_query($linecheck, $rep_hcall); $Arr_h_bl= mysqli_fetch_array($re_h); $Total_Amount_TM = $Arr_h_bl[0]; $Total_Item_TM = $Arr_h_bl[1]; $T_NAME_TM = $Arr_h_bl[2]; $T_ADDRESS_TM = $Arr_h_bl[3]; $re_h->close(); $linecheck->next_result(); $IDTM = "BTM".$ReceiptNo; $ID = $PO_CODE.$ReceiptNo; $ID = str_pad($ID, 10, '0', STR_PAD_LEFT); $RAddress = ""; $Category = "Bulk e-Telemail"; if( $T_ADDRESS_TM == "" ){ $T_ADDRESS_TM = "-"; } if($T_NAME_TM == "" ){ $T_NAME_TM = "-"; } $Remarks = "TM".$St_no_TM." to TM".$Lt_no_TM." Number of e-Telemail-".$Total_Item_TM; $Amount = number_format("$Total_Amount_TM", 2, '.', ','); $CAmnt = 0.00; $Commission = number_format("$CAmnt", 2, '.', ','); $RName = "";	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>e-Pay System</title>

<style type="text/css">
@page {size:8.5in 3.66in;}
</style>

<style type="text/css">
table {table-layout:fixed;	width:700px;}
td.price{text-align: left;}
</style>

<style type="text/css" media="print">
.NonPrintable {display: none;}
</style>

<style type="text/css">
.style1 {
	font-size: 16px;
}
</style>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init)
{  //reloads the window if Nav4 resized
	if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
	document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
	else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<body>
<font size="2">
<div style="width:288px; height:18px; position: absolute; left: 50px; top: 26px;"></div>
<div style="width:24px; height:18px; position: absolute; left: 342px; top: 26px;"></div>
<div style="width:126px; height:18px; position: absolute; left: 370px; top: 26px;" class="NonPrintable">Post Office&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-</div>
<div style="width:208px; height:36px; position: absolute; left: 500px; top: 26px;"><?php FindPO();echo " (".$PoCode.")";?></div>
<div style="width:288px; height:18px; position: absolute; left: 50px; top: 66px;"></div>
<div style="width:24px; height:18px; position: absolute; left: 342px; top: 66px;"></div>
<div style="width:126px; height:18px; position: absolute; left: 370px; top: 66px;" class="NonPrintable">Date &amp; Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-</div>
<div style="width:208px; height:18px; position: absolute; left: 500px; top: 66px;"><?php echo $IssuedTime;?></div>

<div style="width:76px; height:18px; position: absolute; left: 32px; top: 82px;" class="NonPrintable">ID</div>
<div style="width:208px; height:18px; position: absolute; left: 130px; top: 89px;"><?php echo trim($ID);?></div>
<div style="width:24px; height:18px; position: absolute; left: 342px; top: 89px;"></div>
<div style="width:338px; height:18px; position: absolute; left: 370px; top: 89px;"></div>

<div style="width:76px; height:18px; position: absolute; left: 50px; top: 126px;" class="NonPrintable">Category</div>
<div style="width:208px; height:18px; position: absolute; left: 130px; top: 126px;"><?php echo $Category;?></div>
<div style="width:24px; height:18px; position: absolute; left: 342px; top: 126px;"></div>
<div style="width:126px; height:18px; position: absolute; left: 370px; top: 126px;" class="NonPrintable">Amount</div>
<div style="width:208px; height:18px; position: absolute; left: 500px; top: 126px;" class="style1"><?php echo "  Rs.  ".$Amount;?></div>

<div style="width:76px; height:18px; position: absolute; left: 50px; top: 166px;" class="NonPrintable">Bill No</div>
<div style="width:208px; height:18px; position: absolute; left: 130px; top: 166px;" class="style1"><?php echo $IDTM;?></div>
<div style="width:24px; height:18px; position: absolute; left: 342px; top: 166px;"></div>
<div style="width:126px; height:18px; position: absolute; left: 370px; top: 166px;" class="NonPrintable">Additional Charges</div>
<div style="width:208px; height:18px; position: absolute; left: 500px; top: 166px;" class="style1"><?php echo "  Rs.  ".$Commission;?></div>

<div style="width:56px; height:18px; position: absolute; left: 70px; top: 196px;" class="NonPrintable">Name</div>
<div style="width:208px; height:18px; position: absolute; left: 130px; top: 196px;"><?php echo $T_NAME_TM;?></div>
<div style="width:24px; height:18px; position: absolute; left: 342px; top: 196px;"></div>
<div style="width:106px; height:18px; position: absolute; left: 390px; top: 196px;" class="NonPrintable">Name</div>
<div style="width:208px; height:18px; position: absolute; left: 500px; top: 195px;"><?php echo $RName;?></div>

<div style="width:56px; height:36px; position: absolute; left: 70px; top: 231px;" class="NonPrintable">Address</div>
<div style="width:208px; height:36px; position: absolute; left: 130px; top: 231px;"><?php echo $T_ADDRESS_TM;?></div>
<div style="width:24px; height:36px; position: absolute; left: 342px; top: 231px;"></div>
<div style="width:106px; height:36px; position: absolute; left: 390px; top: 231px;" class="NonPrintable">Address</div>
<div style="width:208px; height:36px; position: absolute; left: 500px; top: 231px;"><?php echo $RAddress;?></div>

<div style="width:76px; height:40px; position: absolute; left: 50px; top: 271px;" class="NonPrintable">Remarks</div>
<div style="width:208px; height:40px; position: absolute; left: 130px; top: 271px;"><?php echo $Remarks;?></div>
<div style="width:24px; height:40px; position: absolute; left: 342px; top: 271px;"></div>
<div style="width:126px; height:18px; position: absolute; left: 370px; top: 308px;"></div>
<div style="width:208px; height:18px; position: absolute; left: 500px; top: 308px; text-align: center;" class="NonPrintable">Officer</div>
<div style="width:126px; height:18px; position: absolute; left: 370px; top: 286px; text-align: center;" class="NonPrintable">Signature</div>
<div style="width:208px; height:18px; position: absolute; left: 500px; top: 286px; text-align: center;">(<?php echo $IssuedBy ;?>)</div>
</font>

<div style="width:658px; height:10px; position: absolute; left: 50px; top: 330px; font-size:8px; font-style: italic;" class="NonPrintable">e-Pay form 01</div>

<div style="width:12px; height:72px; position: absolute; left: 50px; top: 195px;" class="NonPrintable"><img src="../../../../images/Remitter.jpg" align="middle" /></div>
<div style="width:12px; height:72px; position: absolute; left: 370px; top: 196px;" class="NonPrintable"><img src="../../../../images/Recipient.jpg" /></div>

<div style="width:43px; height:26px; position: absolute; left: 334px; top: 352px;">
<input name="Print" type="submit" id="print-button" value="Print" onclick="print();" class="NonPrintable" />
</div>

</body>
</html>