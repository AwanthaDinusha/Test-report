<?PHP

function TM_EX_CELL_LOAD($getID_cal) { $getID_cal=$getID_cal; $clear = preg_replace('/[^A-Za-z0-9\-\']/', '', $getID_cal); return $clear; } function TM_EX_CELL_ERROR($FAIKL) { $fr=0; $FAIKL=$FAIKL; if($fr
<51){ $fail_arr=array($fr=>$FAIKL); $_SESSION['animals']=$fail_arr; $fr++; } }
?>