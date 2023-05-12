<?php
require_once('views/header.php');

if($_SESSION['validate'] != "enterforget-otp"){
  header('Location:enterforget-otp.php');
}
$_SESSION['validate'] = "forget-password";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $npasswd = $_POST['npasswd'];
  $cpasswd=$_POST['cpasswd'];
  
  $email = $_SESSION['email'];


  if($npasswd==$cpasswd){
    $sql="UPDATE user  SET passwd='".$cpasswd."' WHERE  email='".$email."'";
    if($result = $conn->query($sql)){
      header('Location: login.php');
      exit;

    }else{
      $error="Invlid email";?>
      <ul>
      <li style="color:red;text-align: center;"><?php echo $error; ?></li></ul><?php
      
    }
  }
  
  

 

}


?>
  <body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Create New Password</h2>
            <form action="" method="POST" autocomplete="off" novalidate>
              <div class="mb-2">
                <label class="form-label">
                  New Password
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control"  placeholder="Your new password"  autocomplete="off" name="npasswd">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                  </span>
                </div>
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Conform Password
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control"  placeholder="Conform Password"  autocomplete="off" name="cpasswd">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                  </span>
                </div>
              </div>
              <div class="form-footer">
              <!--  <button type="submit" class="btn btn-primary w-100">Change Password</button>-->
              <input type="submit" class="btn btn-primary w-100" value="Change Password">
              </div>
            </form>
          </div>
          
          
        </div>
        
      </div>
    </div>
    
<?php
require_once('views/footer.php');
?>