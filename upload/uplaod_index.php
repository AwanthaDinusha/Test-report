<?php
require_once("../../../db.php");
	require("../../../SelectDBFields.php");	
	require("../../../../ChkSession.php");
	require("../../../../CheckLogin.php");
mysql_query ("set character_set_client='utf8'"); 
mysql_query ("set character_set_results='utf8'"); 
mysql_query ("set collation_connection='utf8_general_ci'");
$assName = $_SESSION['ass_eowyn'];
$pmPO = $_SESSION['pm_Middle_Earth_90100'];

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Bulk Telemail Uploading</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
	<div id="header">
		<label>Bulk Telemail Upload</label>
	</div>
	<br />
	<br />
	<div id="body">
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file"  accept=".xls,.xlsx, application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
			<button type="submit" name="btn-upload">upload</button>
		</form>
		<br />
		<br />
		<?php if(isset($_GET[ 'success'])) { ?>
		<label>File Uploaded Successfully... <a href="view.php">click here to view file.</a>
		</label>
		<?php } else if(isset($_GET[ 'fail'])) { ?>
		<label>Problem While File Uploading !</label>
		<?php } else if(isset($_GET[ 'fail1'])) { ?>
		<label>Problem While File Uploading ! error file format</label>
		<?php } else { ?>
		<label>Upload Your Excell file(file format is " .XLS ")</label>
		<?php } ?>
		<div id="footer">
			<label>Bulk Telemail Upload</label>
		</div>
	</div>
</body>

</html>