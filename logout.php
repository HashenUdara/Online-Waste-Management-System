<?php
session_start();

// Destroy all session data
session_destroy();

// Redirect the user to the login page
header("Location: login.php");
exit();
?>
