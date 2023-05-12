<?php
require_once('./components/header.php');
if($_SESSION['validate'] != "truck-management"){
	header('Location:truck.php');
  }

require_once('../conn.php');
$truck_no = "";
if(!($_POST["t_id"])){
	header('Location: ./truck.php');
  }else{
	$truck_no=$_POST["t_id"];
  }

if(($_POST["u_id"])){
	$user_id= $_POST["u_id"];
  }



if($truck_no != ""){
	$sql="insert IGNORE into truck values('$truck_no',$user_id)";

	if (mysqli_query($conn, $sql)) {
		echo " Inserted Data successfully!";
		header('Location: ./truck.php');
	} else {
		echo "Error inserting record: " . mysqli_error($conn);
	}
}

?>
<!--<br><br>
<a href="truck_data.php"><button>Go Back</button></a>-->
