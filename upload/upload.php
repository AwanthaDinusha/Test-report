<?php
require_once("../../../db.php");
require_once("../../../SelectDBFields.php");	
require_once("../../../../ChkSession.php");
require_once("../../../../CheckLogin.php");
require("connect_maping.php");
require("up_layer.php");

mysql_query ("set character_set_client='utf8'"); mysql_query ("set character_set_results='utf8'"); mysql_query ("set collation_connection='utf8_general_ci'"); $assName = $_SESSION['ass_eowyn']; $pmPO = $_SESSION['pm_Middle_Earth_90100']; if(isset($_POST['btn-upload'])) { $file = mt_rand(1000,100000)."-".$_FILES['file']['name']; $file_loc = $_FILES['file']['tmp_name']; $file_size = $_FILES['file']['size']; $file_type = $_FILES['file']['type']; $folder="UPLOAD_BTM_EX/"; $new_size = $file_size/1024; $status_b=5; $dtte=date("Y-m-d H:i:s"); $new_file_name = strtolower($file); $final_file=str_replace(' ','-',$new_file_name); if($file_size
< 1000000) { if($file_type !="application/vnd.ms-excel" ) { ?>
	<script>
		alert('error file format');
       window.location.href='uplaod_index.php?fail1';
	</script>
	<?php } else{ if(move_uploaded_file($file_loc,$folder.$final_file))
	 { $Tb_call=new TM_EX_ONLINE_UPLOAD(); $repB_call=$Tb_call ->TM_EX_I_BULK($dtte,$pmPO,$assName,$status_b); $re_B=mysqli_query($linecheck,$repB_call); $Arr_BID= mysqli_fetch_array($re_B); $BID_cal = $Arr_BID[0]; $_SESSION['BID_cal'] = $BID_cal; $re_B->close(); $linecheck->next_result(); if($BID_cal !="") { $Tc_call = new TM_EX_ONLINE_UPLOAD(); $rep_call=$Tc_call -> TM_EX_F_pushing($BID_cal,$final_file,$file_type,$new_size,$dtte); $re_P=mysqli_query($linecheck, $rep_call); $Arr_turn= mysqli_fetch_array($re_P); $ID_cal = $Arr_turn[0]; $_SESSION['ID_cal'] = $ID_cal; $re_P->close(); $linecheck->next_result(); } ?>
	<script>
		alert('successfully uploaded');
       window.location.href='read_excel_upload.php?success';
	</script>
	<?php } else { ?>
	<script>
		alert('error while uploading file');
       window.location.href='uplaod_index.php?fail';
	</script>
	<?php } } } else{?>
		<script>
		window.location.href='../../TM_warning/warning61.php?';
		</script>
        <?php
		echo "Sorry, your file is too large.(Max Upload. 1 MB)";} }?>