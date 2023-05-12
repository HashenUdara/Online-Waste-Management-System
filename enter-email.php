<?php
require_once('views/header.php');
$_SESSION['validate'] = "enter-email";

?>



  <body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <form class="card card-md" action="" method="POST" autocomplete="off" novalidate>
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Forgot password</h2>
            <p class="text-muted mb-4">Enter your email address and your password will be reset and emailed to you.</p>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" placeholder="Enter email" name = 'e_mail'>
            </div>
            <input type="submit" class="btn btn-primary w-100" value="Send me Verification Code">
          </div>


          <?php


     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $email = $_POST['e_mail'];
     $verify = 0;
    
     
 
     $sql = "SELECT email FROM user ";
     $result = $conn->query($sql);
     while($mail = $result->fetch_assoc()){
      
      if($email === $mail['email']){
        $verify = 1;
        break;
      }else{
        $verify = 0;
        
      }
     }

    if($verify === 1){
      $_SESSION['email'] = $email;
      header('Location: forget-otp.php');
      exit;
    }else{
      
      $error="Invlid email";?>
      <ul style="list-style-type: none;">
         <li style="color:red;text-align: center;"><?php echo $error; ?></li>
      </ul>
   <?php 
  
    }
  
  
}?>




        </form>
        <div class="text-center text-muted mt-3">
          Forget it, <a href="./register.php">send me back</a> to the sign in screen.
        </div>
      </div>
    </div>
<?php

require_once('views/footer.php');

?>