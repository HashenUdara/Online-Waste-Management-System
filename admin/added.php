<?php
require_once('./components/header.php');
if($_SESSION['validate'] != "user-management"){
   header('Location:users.php');
 }

require_once('../conn.php');
   $UserId= $_POST["id"];
   $sql="Update  user set approve_status='1' where user_id=$UserId";
   $conn->query($sql);
   echo"<center><br/><br/><br/><br/><font color='red'><h1><b>Successfully Data Added</b></h1></font></center>";
   header('Location: ./users.php');
   $conn->close();
?>
