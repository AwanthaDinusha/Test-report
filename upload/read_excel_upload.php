
<html>
<head>
  <style type="text/css">

.style1 {
	font-size: 20px;
	color: #F00;
}

.style2 {
	color: #FFF;
	font-size: 18px;
	font:Verdana;
}

#FrmPayments fieldset div table tr .style2 div {
	color: #FFF;
}

.table {
	position:relative;
	width:661px;
	height:208px;
	margin:100px auto 0 auto;
}

.table-gradient {
	left:7%;
	position:absolute;
	border-radius:10px;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	background: -moz-linear-gradient(left, #FFF 0%, #FFF 50%, #FFF 50%, #FFF 100%);
	background: -webkit-gradient(linear, left top, right top, color-stop(0%, #CCCCCC), color-stop(50%, #EEEEEE), color-stop(50%, #EEEEEE), color-stop(100%, #CCCCCC));
	box-shadow:0 10px 20px #000;
}

.table-gradient tr td #FrmPayments fieldset table tr td strong {
	color: #000;
}

.input_box {
	padding: 3px;
	margin: 3px;
	background-color:#CCF;
	border: 1px solid #06F;
	font:Verdana, Geneva, sans-serif;
	font-size:16px;
}

.ertext{
	font:Verdana, Geneva, sans-serif;
	font-size:28px;
	color:#666;
	font-weight:700;
}

.ercodetext{
	font:Verdana, Geneva, sans-serif;
	font-size:28px;
	color:#666;
	font-weight:700;
}


.selecttext{
	font:Verdana, Geneva, sans-serif;
	font-size:22px;
	color:#F00;
	font-weight:700;
}

.selecttext1{
	font:Verdana, Geneva, sans-serif;
	font-size:16px;
	color:#C33;
	font-weight:600;
}

.selecttext2{
	font:Verdana, Geneva, sans-serif;
	font-size:16px;
	color:#F00;
	font-weight:7400;
}
-->
</style>
</head>
<?php

require_once("../../../db.php");
require_once("../../../SelectDBFields.php");	
require_once("../../../../ChkSession.php");
require_once("../../../../CheckLogin.php");
include 'reader.php';
require("connect_maping.php");
require("up_layer.php");

$getID_cal = $_SESSION['ID_cal']; $assName = $_SESSION['ass_eowyn']; $pmPO = $_SESSION['pm_Middle_Earth_90100']; $BID_cal = $_SESSION['BID_cal']; $date_x=date("Y-m-d"); $date_x_TS=date("Y-m-d h:i:s"); $F_Stat=2; $File_stat=0; $MEGA_excel = new Spreadsheet_Excel_Reader(); mysql_query ("set character_set_client='utf8'"); mysql_query ("set character_set_results='utf8'"); mysql_query ("set collation_connection='utf8_general_ci'"); $TD_call = new TM_EX_ONLINE_UPLOAD(); $D_call=$TD_call -> TM_EX_S_LOADFI($getID_cal); $re_DFIL=mysqli_query($linecheck,$D_call); $Arr_DFIL= mysqli_fetch_array($re_DFIL); $D_FILE = $Arr_DFIL[0]; $re_DFIL->close(); $linecheck->next_result(); $D_FILE_CC = "UPLOAD_BTM_EX/".$D_FILE; $MEGA_excel->read($D_FILE_CC); ?>

<body>
	<frame>
		<table width="1000" height="201" class="table-gradient" align="center">
			<tr>
				<td width="120" class="ertext">&nbsp;Error-:</td>
				<td width="865" class="ercodetext">601</td>
				<td width="15"></td>
			</tr>
			<tr>
				<td height="48" width="120">&nbsp;</td>
				<?php echo "<td width='865'class='selecttext'>"; echo "We detected your upload file has following errors ,please check before upload it "; echo "</td>"; echo "<td width='15'></td>"; echo "</tr>"; $p=1; $ukj=51; $linemine=0; while($p<=$MEGA_excel->sheets[0]['numRows']) { if($p
				<$ukj){ $cell=isset($MEGA_excel->sheets[0]['cells'][$p][1]) ? $MEGA_excel->sheets[0]['cells'][$p][1] : ''; $cell1 = isset($MEGA_excel->sheets[0]['cells'][$p][2]) ? $MEGA_excel->sheets[0]['cells'][$p][2] : ''; $cell2 = isset($MEGA_excel->sheets[0]['cells'][$p][3]) ? $MEGA_excel->sheets[0]['cells'][$p][3] : ''; $cell3 = isset($MEGA_excel->sheets[0]['cells'][$p][4]) ? $MEGA_excel->sheets[0]['cells'][$p][4] : ''; $cell4 = isset($MEGA_excel->sheets[0]['cells'][$p][5]) ? $MEGA_excel->sheets[0]['cells'][$p][5] : ''; $cell5 = isset($MEGA_excel->sheets[0]['cells'][$p][6]) ? $MEGA_excel->sheets[0]['cells'][$p][6] : ''; $cell6 = isset($MEGA_excel->sheets[0]['cells'][$p][7]) ? $MEGA_excel->sheets[0]['cells'][$p][7] : ''; $cell7 = isset($MEGA_excel->sheets[0]['cells'][$p][8]) ? $MEGA_excel->sheets[0]['cells'][$p][8] : ''; $cell8 = isset($MEGA_excel->sheets[0]['cells'][$p][9]) ? $MEGA_excel->sheets[0]['cells'][$p][9] : ''; $cell9 = isset($MEGA_excel->sheets[0]['cells'][$p][10]) ? $MEGA_excel->sheets[0]['cells'][$p][10] : ''; if($cell =="" || $cell1 =="" || $cell2 =="" || $cell3 =="" || $cell4 =="" || $cell5 =="" || $cell6 =="" || $cell7 =="" || $cell8 =="" || $cell9 =="" ) { echo"
					<tr>"; echo"
						<td></td>"; echo "
						<td width='865' class='selecttext1'>"; echo "Your excel file row no ".$p." has empty cell? "; echo"</td>"; $p++; $linemine++; } else{ $p++; $fij=$p; } } } echo"
						<td></td>"; echo"</tr>"; echo"
					<tr>"; echo"
						<td></td>"; echo "
						<td class='selecttext2'>"; echo "Total errors-:". $linemine; echo"</td>"; echo"
						<td></td>"; echo"</tr>"; ?>
					<tr>
						<td height="36" align="right">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td width="13"></td>
					</tr>
		</table>
		</fram>
		<?php if($linemine==0) 
		{ header( 'Location:read_excel_file.php'); }		
		   ?>    
   
	

</html>