<?php
require_once('./components/header.php');
?>

<body>
    <script src="../dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page">
      <!-- Sidebar -->
      <?php require_once('components/sidebar.php') ?>
      <!-- Sidebar end -->
      
      <div class="page-wrapper">
        <!-- Page header -->
        <?php require_once('components/page-header.php') ?>
        <!-- Page header end -->

        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card card-md">
                  <div class="card-header">
                    <h4 class="card-title">Profile Settings</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">

<?php
require_once('../conn.php');
$sql = "SELECT name, email, user_id, tel FROM user WHERE user_id = ".$_SESSION['user_id'];
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
		$name=$row['name'];
		$email=$row['email']; 
		$user_id=$row['user_id'];
		$tel=$row['tel'];

    echo '<div class="col-xl-6">
          
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" placeholder="Edit name" value="' . $name . '">
    </div>
    <div class="mb-3">
      <label class="form-label">Email address</label>
      <input type="email" class="form-control" placeholder="Edit email" value="' . $email . '">
    </div>
    <div class="mb-3">
      <label class="form-label">User ID</label>
      <input type="tele" class="form-control" placeholder="Edit Telephone Number" value="' . $user_id . '">
    </div>
    <div class="mb-3">
      <label class="form-label">Phone Number</label>
      <input type="text" class="form-control" placeholder="Edit Permit no" value="' . $tel . '">
    </div>';	
} else {
  echo "1002 Not Found|";
}
} else {
echo "Query error: " . $conn->error;
}
?>
</div>

<!-- Re Direct Change Password -->

<div class="col-xl-6">
        
        <form action="" method="post">
         
          <div class="w-100">
            <div class="mb-3">
              <label class="form-label">Current Passwords</label>
              <input type="password" class="form-control" placeholder="Enter Current Password" name="cur">
            </div>
            
            <div class="mb-3">
              <label class="form-label">New Password</label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control"  placeholder="Password"  autocomplete="off" name="new">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Conform New Password</label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control"  placeholder="Password"  autocomplete="off" name="repw">
                
              </div>
            </div>

            
              <label class="form-label" style="color: white;"> .</label>
              <input type="submit" class="btn btn-primary w-100" value="Save">
              
            
          </div>
          </div>
          </div>
          </form>








          </div>
        </div>

      </div>
    </div>


    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $Currrent_Paswd = $_POST["cur"];
  $New_Paswd = $_POST["new"];
  $Conform_Paswd = $_POST["repw"];

  $sql = "Select passwd from user where user_id='".$user_id."'";
  $result = $conn->query($sql);
  $pass = $result->fetch_assoc();

  if(($pass["passwd"] == $Currrent_Paswd) && ($New_Paswd === $Conform_Paswd)){
    $sql1 = "UPDATE user SET passwd = '".$New_Paswd."' WHERE user_id ='" .$user_id."'";
    $conn->query($sql1);

    $error="Successful";?>
      <ul style="list-style-type: none;">
         <li style="color:green;text-align: center;"><?php echo $error; ?></li>
      </ul>
   <?php 

  }else{
    $error="Something Went Wrong";?>
      <ul style="list-style-type: none;">
         <li style="color:red;text-align: center;"><?php echo $error; ?></li>
      </ul>
   <?php 
  }
}
?>

<?php

require_once('./components/footer.php');

?>




