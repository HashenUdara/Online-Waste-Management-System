
<?php
require_once('./components/header.php');
if($_SESSION['validate'] != "bin-management"){
	header('Location:bin.php');
  }

require_once('../conn.php');

$size=$_POST["size"];


$sql="insert into bin(bin_height,actual_value) values($size,$size)";
//$conn->query($sql);

if (mysqli_query($conn, $sql)) {
	echo " Inserted Data successfully!";
	 header('Location: ./bin.php');
} else {
	echo "Error inserting record: " . mysqli_error($conn);
}
?>