<?php
require_once('views/header.php');
$_SESSION['validate'] = "register";
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $user_type = $_POST['user_type'];
  $tel = $_POST['tel'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate form data
  $errors = array();
  if (empty($name)) {
    $errors[] = 'Name is required';
  }
  if (empty($email)) {
    $errors[] = 'Email is required';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
  } else {
    // Check if email already exists
    $stmt = mysqli_prepare($conn, "SELECT user_id FROM user WHERE email = ?");
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
      $errors[] = 'Email already exists';
    }
    mysqli_stmt_close($stmt);
  }
  if (empty($user_type)) {
    $errors[] = 'User type is required';
  }
  if (empty($tel)) {
    $errors[] = 'Telephone number is required';
  }
  if (empty($password)) {
    $errors[] = 'Password is required';
  } else if ($password !== $confirm_password) {
    $errors[] = 'Passwords do not match';
  }

  // Insert user data into database
  if (empty($errors)) {
    $stmt = mysqli_prepare($conn, "INSERT INTO user (name, email, user_type, status, tel, `approve_status`, passwd) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sssiiss', $name, $email, $user_type, $status, $tel, $approve_status, $password);
    $status = 0;
    $approve_status = 0;
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $user_id = mysqli_insert_id($conn);
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_type'] = $user_type;
    $_SESSION['email'] = $email;
    $_SESSION['passwd'] = $password;
    $_SESSION['name'] = $name;

    mysqli_close($conn);

    header('Location: otp-create.php');
    exit;
  }
}
?>


  <body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
      <div class="container container-tight py-4" style="max-width: 50rem;">
        
        <form class="card card-md" action="" method="POST" autocomplete="off" novalidate>


          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="row">
            <div class="col-xl-6">
          
            
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <input type="tel" name="tel" class="form-control" placeholder="Enter Telephone Number" required>
            </div>
            <!-- <div class="mb-3">
              <label class="form-label">Permit No</label>
              <input type="text" class="form-control" placeholder="Enter Permit no" required>
            </div> -->
          </div>
          
          <div class="col-xl-6">
            <div class="mb-3">
              <div class="form-label">Select User Role</div>
              <select class="form-select" id="user_type" name="user_type">
                <option value="user">User</option>
                <option value="collector">Collector</option>
              </select>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" class="form-control"  placeholder="Password"  autocomplete="off" required>

              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Conform Password</label>
              <div class="input-group input-group-flat">
                <input type="password" name="confirm_password" class="form-control"  placeholder="Password"  autocomplete="off" required>
              </div>
            </div>

            
              <label class="form-label" style="color: white;"> .</label>
              <button type="submit" class="btn btn-primary w-100">Create new account</button>
            
          </div>
          </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          
    <?php if (!empty($errors)) { ?>
    <ul style="list-style-type: none;">
      <?php foreach ($errors as $error) { ?>
        <li style="color:red;"><?php echo $error; ?></li>
      <?php } ?>
    </ul>
  <?php } ?>
          Already have account? <a href="./login.php" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
<?php
require_once('views/footer.php');
?>