<?php
require_once('views/header.php');
if($_SESSION['validate'] != "otp-create"){
  header('Location:otp-create.php');
}
$_SESSION['validate'] = "enter-otp";

$email="";
$msg= "";
$error= '';
if(isset($_GET['redirect'])){
  $msg = "Please verify your email address by entering the OTP (One-Time Password) before continuing.";
}

?>
 

  <body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <form class="card card-md" action="" method="POST" autocomplete="off" novalidate>
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Verification</h2>
            <p class="text-muted mb-4"><?php  echo $msg ?></p>
            <div class="mb-3">
              <label class="form-label">OTP Code</label>
              <input type="text" class="form-control" placeholder="Enter OTP Code" name="otp">
            </div>
            <div class="form-footer">
            <input type="submit" class="btn btn-primary w-100" value="Verify">
            </div>
        </form>
            <?php


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $totp = $_POST['otp'];
      $email = $_SESSION['email'];
      
      $sql = "SELECT otp FROM user WHERE email='$email'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

     $otp= $row['otp']; 
     
    
    if ($totp == $otp){
      $sql= "UPDATE user SET status=1 WHERE email='$email'";
      $result = $conn->query($sql);
      header('Location: login.php');
    }else{
      
      $error="Invlid OTP";
      
     }
    };?>




      <ul style="list-style-type: none;">
        <li style="color:red;"><?php echo $error; ?></li>
      </ul>
      </div>
      </div>
    </div>
   
<?php

require_once('views/footer.php');

?>