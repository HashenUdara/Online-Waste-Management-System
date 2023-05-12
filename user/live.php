<?php
require_once('./components/header.php');
$_SESSION['validate'] = "bin-live";
?>

  <body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="../dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page">
      <!-- Sidebar -->
      <?php require_once('components/sidebar.php') ?>
      <!-- Sidebar end -->
      
      <div class="page-wrapper">
        <!-- Page header -->
        <?php require_once('components/page-header.php') ?>
        <!-- Page header end -->







        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
          <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Bin Live Data
                </h2>
                <div class="text-muted mt-1"> </div>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">


                
                <form action = "search_bin.php" method = "POST">
                <div class="d-flex">
                  <input type="text" class="form-control d-inline-block w-9 me-1" placeholder="Search Bin no" name = "search">
                 
                 <input type = "Submit" value = "Search" style = "border-radius: 4px;background-color: #0066cE;border: 2px solid #0066cE;
                 color: white;padding: 5px 15px;">
                  
                </div>
                </form>
                
              </div>
           </div>

          <br><br>
            <div class="row row-cards"  id="api_key_count">

            <div class="page page-center">
      <div class="container container-slim py-4">
        <div class="text-center">
          <div class="mb-3">
            <a href="." class="navbar-brand navbar-brand-autodark"></a>
          </div>
          <div class="text-muted mb-3">Preparing Live Data</div>
          <div class="progress progress-sm">
            <div class="progress-bar progress-bar-indeterminate"></div>
          </div>
        </div>
      </div>
    </div>
              

</div>
                


<?php

require_once('./components/footer.php');

?>
<script>

// Function to update the API key count
function updateApiKeyCount() {

  // Send an AJAX request to the PHP script that gets the Update
  $.ajax({
    url: 'update.php',
    type: 'get',
    success: function(data) {
      $('#api_key_count').html(data);
    }
  });

}

// Call the updateApiKeyCount function every 1 seconds
setInterval(updateApiKeyCount, 1000);

</script>







