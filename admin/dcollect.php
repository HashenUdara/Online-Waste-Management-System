<?php
require_once('./components/header.php');
if($_SESSION['validate'] != "bin-collect"){
	header('Location:collect.php');
  }

require_once('../conn.php');
?>
<?php
$bin_id=$_POST["clct"];
$now_date = date("Y-m-d");
$x="update bin set collected_date ='".$now_date."' where bin_no=".$bin_id;

if ($conn->query($x)===True){
	echo 'chang ';
	header('Location: ./collect.php');
}else{
	echo 'not chang';
	header('Location: ./collect.php');
}
$x="update bin set actual_value=0 where bin_no=".$bin_id;
if ($conn->query($x)===True){
	echo 'chang ';
	header('Location: ./collect.php');
}else{
	echo 'not chang';
	header('Location: ./collect.php');
}

?>