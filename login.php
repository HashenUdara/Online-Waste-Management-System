<?php
require_once('views/header.php');
$_SESSION['validate'] = "login";
?>
<?php


$error= '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  

  $email = $_POST['email'];
  $password = $_POST['password'];

  // SQL query to retrieve user data
  $sql = "SELECT * FROM user WHERE email='".$email."' AND passwd='".$password."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Login successful, redirect to dashboard
    $row = $result->fetch_assoc();
    
    if($row['status'] == 0){
      $error=  '<div class="invalid-feedback" style="display:unset;">Email Verfication Failed. </div>';
      $_SESSION['validate'] = "register";
      $_SESSION['email'] = $row['email'];
      header('Location: otp-create.php?redirect=login');
      exit();
    }else{
      if($row['approve_status'] == 0){
        $error=  '<div class="invalid-feedback" style="display:unset;">Account Approval Pending..</div>';
        header('Location: pending-approval.php?redirect=login');
        exit();
      }else{
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name']= $row['name'];
        
        switch ($row['user_type']) {
          case 'admin':
            header('Location: admin/index.php');
            break;
          case 'user':
            header('Location: user/index.php');
            break;
          case 'collector':
            header('Location: collector/index.php');
            break;
          default:
          $error= '<div class="invalid-feedback" style="display:unset;">Unknown user type</div>';
            break;
        }
        exit();
      }
     
    }

    
  } else {
    // Login failed, show error message
    // echo "<p>Invalid email or password</p>";
  
    $error=  '<div class="invalid-feedback" style="display:unset;">Invalid Email & Password </div>';
  }


  $conn->close();
}
?>
  <body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off" novalidate>
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="your@email.com" autocomplete="off">
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                  <span class="form-label-description">
                    <a href="./enter-email.php">I forgot password</a>
                  </span>
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" name="password" class="form-control"  placeholder="Your password"  autocomplete="off">
                  <?php echo $error ?>
                </div>
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </div>
            </form>
          </div>
          
          
        </div>
        <div class="text-center text-muted mt-3">
          Don't have account yet? <a href="./register.php" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>
    
<?php
require_once('views/footer.php');
?>