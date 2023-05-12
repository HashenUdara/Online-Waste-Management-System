<?php
require_once('./components/header.php');
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


              <div class="col-12">
                <div class="card card-md">
                  <div class="card-stamp card-stamp-lg">
                    <div class="card-stamp-icon bg-primary">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M3 3l18 18"></path>
   <path d="M4 7h3m4 0h9"></path>
   <path d="M10 11l0 6"></path>
   <path d="M14 14l0 3"></path>
   <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l.077 -.923"></path>
   <path d="M18.384 14.373l.616 -7.373"></path>
   <path d="M9 5v-1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
</svg>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-10">
                        <h3 class="h1">Welcome <?php   echo $dispaly_name ?></h3>
                        <div class="markdown text-muted">
                          This dashboard provides you with a comprehensive overview of the waste management system's network, allowing you to monitor and manage waste disposal processes in real-time
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>







          </div>
        </div>

      </div>
    </div>






<?php

require_once('./components/footer.php');

?>

