<?php
require_once('views/header.php');


// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Check if the 'api_key' POST parameter is set
  if (isset($_POST)) {

    // Get the API key from the POST parameter
    $api_key = $_POST['api_key'];


    // $api_key = $_POST['apikey'];

    $data = $_POST['data'];

    // Add the API key to the 'apikeys' table
    $sql = "UPDATE bin SET actual_value=$data WHERE bin_no='$api_key'";

    if ($conn->query($sql) === TRUE) {
      echo "Update successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  } else {
    echo "Something went wrong!";
  }

} else {
  echo "Invalid request method";
}

// Close database connection
$conn->close();

?>
