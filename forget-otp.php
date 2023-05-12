<?php
require_once('views/header.php');
if($_SESSION['validate'] != "enter-email"){
    header('Location:enter-email.php');
  }
  $_SESSION['validate'] = "forget-otp";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Start session
//session_start();
$email =$_SESSION['email'];



// Generate an OTP code
$otp = mt_rand(100000, 999999);

// Create a new PHPMailer object
$mail = new PHPMailer();

// Set the SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'sahanduruthuautomation@gmail.com';
$mail->Password = 'aqsdnbtxmkyqqjah';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Set the email content
$mail->setFrom('sahanduruthuautomation@gmail.com', 'OWMS');
$mail->addAddress($email);
$mail->Subject = 'Your OTP code';
$mail->Body = 'Your OTP code is: ' . $otp;

// Send the email
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    // Store the OTP code in the database
    $stmt = mysqli_prepare($conn, "UPDATE user SET otp = '".$otp."' WHERE email = '".$email."'");
   
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    mysqli_close($conn);
    
    // Redirect to the OTP verification page
   $_SESSION['email']= $email;
    header('Location:enterforget-otp.php');
   // header('Location: otpverify.php?email=' . urlencode($email));
    exit;
}
?>