<?php
require_once('./components/header.php');
if($_SESSION['validate'] != "bin-management"){
	header('Location:bin.php');
  }

require_once('../conn.php');

$num=$_POST["Rbin"];

$x="select * from bin where bin_no=$num";
$re=$conn->query($x);
$y=$re->num_rows;
if ($y==1){
	
	
	// Check connection
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}

	// sql to delete a record
		
	$sq = "DELETE FROM bin WHERE bin_no=$num";
	
	
	if (mysqli_query($conn, $sq)) {
		echo " Deleted successfully!";
		header('Location: ./bin.php');

	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
}else{
	echo "$num Not Found";
}
?>