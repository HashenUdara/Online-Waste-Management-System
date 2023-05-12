
<?php
session_start();
if($_SESSION['user_type'] != "user"){
  header('Location: ../login.php');
}
 
$user_id = $_SESSION['user_id'];
$dispaly_name = 'User'; 
$dispaly_role= 'User';

if(isset($_SESSION['name'])){
  $dispaly_name=  $_SESSION['name'];
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Waste Management System</title>
    <!-- CSS files -->
    <link href="../dist/css/tabler.min.css?1674944402" rel="stylesheet"/>
    <link href="../dist/css/tabler-flags.min.css?1674944402" rel="stylesheet"/>
    <link href="../dist/css/tabler-payments.min.css?1674944402" rel="stylesheet"/>
    <link href="../dist/css/tabler-vendors.min.css?1674944402" rel="stylesheet"/>
    <link href="../dist/css/demo.min.css?1674944402" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>