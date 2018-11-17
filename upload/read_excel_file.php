<html>
  <head> 
  <title>Read Excel file</title>
  </head>
  <body>
	<?php
	
	
	
require_once("../../../db.php");
require_once("../../../SelectDBFields.php");	
require_once("../../../../ChkSession.php");
require_once("../../../../CheckLogin.php");
include 'reader.php';
require("connect_maping.php");
require("up_layer.php");
require("lo_layer.php");

$getID_cal = $_SESSION['ID_cal']; $assName = $_SESSION['ass_eowyn']; $pmPO = $_SESSION['pm_Middle_Earth_90100']; $BID_cal = $_SESSION['BID_cal']; $date_x=date("Y-m-d"); $date_x_TS=date("Y-m-d h:i:s"); $F_Stat=6; $File_stat=0; $MEGA_excel = new Spreadsheet_Excel_Reader(); mysql_query ("set character_set_client='utf8'"); mysql_query ("set character_set_results='utf8'"); mysql_query ("set collation_connection='utf8_general_ci'"); mysql_query ("set collation_connection='utf8_general_ci'"); $TD_call = new TM_EX_ONLINE_UPLOAD(); $D_call=$TD_call -> TM_EX_S_LOADFI($getID_cal); $re_DFIL=mysqli_query($linecheck,$D_call); $Arr_DFIL= mysqli_fetch_array($re_DFIL); $D_FILE = $Arr_DFIL[0]; $re_DFIL->close(); $linecheck->next_result(); $D_FILE_CC = "UPLOAD_BTM_EX/".$D_FILE; $MEGA_excel->read($D_FILE_CC); $x=2; $ukj=51; $linemine=0; $fij=0; while($x
<=$MEGA_excel->sheets[0]['numRows']) { if($x
<$ukj){ $cell=isset($MEGA_excel->sheets[0]['cells'][$x][1]) ? $MEGA_excel->sheets[0]['cells'][$x][1] : ''; $cell1 = isset($MEGA_excel->sheets[0]['cells'][$x][2]) ? $MEGA_excel->sheets[0]['cells'][$x][2] : ''; $cell2 = isset($MEGA_excel->sheets[0]['cells'][$x][3]) ? $MEGA_excel->sheets[0]['cells'][$x][3] : ''; $cell3 = isset($MEGA_excel->sheets[0]['cells'][$x][4]) ? $MEGA_excel->sheets[0]['cells'][$x][4] : ''; $cell4 = isset($MEGA_excel->sheets[0]['cells'][$x][5]) ? $MEGA_excel->sheets[0]['cells'][$x][5] : ''; $cell5 = isset($MEGA_excel->sheets[0]['cells'][$x][6]) ? $MEGA_excel->sheets[0]['cells'][$x][6] : ''; $cell6 = isset($MEGA_excel->sheets[0]['cells'][$x][7]) ? $MEGA_excel->sheets[0]['cells'][$x][7] : ''; $cell7 = isset($MEGA_excel->sheets[0]['cells'][$x][8]) ? $MEGA_excel->sheets[0]['cells'][$x][8] : ''; $cell8 = isset($MEGA_excel->sheets[0]['cells'][$x][9]) ? $MEGA_excel->sheets[0]['cells'][$x][9] : ''; $cell9 = isset($MEGA_excel->sheets[0]['cells'][$x][10]) ? $MEGA_excel->sheets[0]['cells'][$x][10] : ''; if($cell2 !="") { $TQ_call = new TM_EX_ONLINE_UPLOAD(); $Q_call=$TQ_call-> TM_EX_S_PO_DLY($cell2); $re_QFIL=mysqli_query($linecheck,$Q_call)or die("Error: ".mysqli_error($linecheck)); $Arr_QFIL= mysqli_fetch_array($re_QFIL); $Q_FILE = $Arr_QFIL[0]; $cell2=$Q_FILE; $re_QFIL->close(); $linecheck->next_result(); } if($cell =="" || $cell1 =="" || $cell2 =="" || $cell3 =="" || $cell4=="" || $cell5 =="" || $cell6 =="" || $cell7 =="" || $cell8 =="" || $cell9 =="" ) { $x++; $linemine++; } else{ $cell=TM_EX_CELL_LOAD($cell); $cell1=TM_EX_CELL_LOAD($cell1); $cell2=TM_EX_CELL_LOAD($cell2); $cell3=TM_EX_CELL_LOAD($cell3); $cell4=TM_EX_CELL_LOAD($cell4); $cell5=TM_EX_CELL_LOAD($cell5); $cell6=TM_EX_CELL_LOAD($cell6); $cell7=TM_EX_CELL_LOAD($cell7); $cell8=TM_EX_CELL_LOAD($cell8); $cell9=TM_EX_CELL_LOAD($cell9); if ($cell5=="Normal") {$cell5=0;} elseif($cell5=="Delivery Confirmation") {$cell5=1;} elseif($cell5=="Reply Paid") {$cell5=2;} else{$cell5=0;} $TE_call = new TM_EX_ONLINE_UPLOAD(); $E_call=$TE_call -> TM_EX_I_LOADFI($BID_cal,$cell,$cell1,$cell2,$cell3,$cell4,$cell5,$cell6,$cell7,$cell8,$cell9,$pmPO,$assName,$date_x,$date_x_TS,$File_stat,$F_Stat); $re_EFIL=mysqli_query($linecheck,$E_call); $x++; $fij=$x; } } } $fij= $fij-$linemine; $TF_call = new TM_EX_ONLINE_UPLOAD(); $F_call=$TF_call -> TM_EX_S_LOAD_DISTANCE($BID_cal,$fij); $re_FFIL=mysqli_query($linecheck,$F_call); $_SESSION['END_BID_cal'] = $BID_cal; 
	header( 'Location:Tele_mai_print.php');
		   ?>    
   
	
  </body>
</html>
