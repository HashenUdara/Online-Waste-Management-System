<?php

require_once('./components/header.php');
$_SESSION['validate'] = "truck-management";
?>

<?php
require_once('../conn.php');

?>

  <body>
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

            <div class="row row-cards">
                
            <div class="col-lg-4">

            
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                    <div class="col">
                        <h3 class="card-title">
                        Assign New Truck
                        </h3>
                    </div>
                    </div>
                </div>
                </div>
                <!--Form-->
                <form action = "truck_insert_data.php" method = "POST">

                <div class="card">
                  <div class="card-body">
                    <div class="mb-3">
                      <div class="form-label">Truck Number</div>
                      <input type="text" class="form-control" name = "t_id">
                    </div>
                    <div class="row">
                      <div class="">
                        <div class="mb-3">
                          

                          <label class="form-label">Users</label>
                          <select class="form-select" name = "u_id">
                          <?php
                          $sql = "select user_id from user";
                          $result = $conn->query($sql);
                          while($row = $result->fetch_assoc()){
                            echo '<option value='.$row["user_id"].'>'.$row["user_id"].'</option>';
                          }

                          ?>
                         
                              </select>

                        </div>
                      </div>
                    </div>
                    <div class="mt-2">
                      <input type = "Submit" value = " Assign User"class="btn btn-primary w-100">
                       
                      </a>
                    </div>
                  </div>
                </div>
              </div>






<div class="col-lg-8">
              
              <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                    <div class="col">
                        <h3 class="card-title">
                        Available Truck List
                        </h3>
                    </div>
                    </div>
                </div>
                </div>






              <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                      <thead>
                        <tr>
                          <th>Truck No</th>
                          <th>User ID</th>
                          <th>User Name</th>
                          <th class="w-1"></th>
                          
                        </tr>
                      </thead>

                      
                      <?php

                      $sql = "SELECT truck.truck_no,truck.user_id,user.name FROM truck inner join user on 
                              truck.user_id = user.user_id where truck.user_id = user.user_id";
                      $result = $conn->query($sql);
                      
                      while($row = $result->fetch_assoc()){
                      
                        echo "<tr><td>". $row['truck_no']. "</td>";
                        echo "<td>". $row['user_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td></tr>";
                        
                                     
                      
                      }

                      ?>

                      
                    
                    </table>
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







