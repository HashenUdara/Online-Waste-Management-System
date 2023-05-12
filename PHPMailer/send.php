<?php
  if ($_POST) {
    require 'class.phpmailer.php';

    $mail = new PHPMailer;
    
    // custom information
    $mail->From = '';
    $mail->FromName = '';
    $mail->addAddress('');
    $mail->Subject = '';

    foreach ($_POST as $key => $value) {
      if ((!empty($value)) && ($key != "submit")) {
        $body.= '<p style="text-transform:capitalize;"><strong>' . str_replace("_"," ",$key) . '</strong><br />' . $value . '</p>';
      }
       else {
        die("Please complete all the required fields and try again!");
      }
    }

    if ($_FILES) {
      foreach ($_FILES as $file) {
        $mail->addAttachment($file['tmp_name'], $file['name']);
      }
    }

    $mail->Body = $body;
    $mail->isHTML(true); 

    if(!$mail->send()) {
       echo 'Message could not be sent, please try again later.';
       exit;
    }
    
    echo 'Success';
  }
?>