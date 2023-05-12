<html>
<head>
<title></title>
</head>
<body>
<?php
if($_SESSION['validate'] != "user-management"){
   header('Location:users.php');
 }
 
require_once('../conn.php');
   $UserId= $_POST['uid'];
   $sql="Delete from user where user_id=$UserId";
   $conn->query($sql);
   echo"<center><br/><br/><br/><br/><font color='red'><h1><b>Successfully Data Deleted</b></h1></font></center>";
   header('Location: ./users.php');
   $conn->close();
   ?>
</body>
</html>