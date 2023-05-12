<?php
require_once('./components/header.php');
$_SESSION['validate'] = "user-management";

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

          <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                    <div class="col">
                        <h3 class="card-title">
                         User Requests
                        </h3>
                    </div>
                    </div>
                </div>
                </div>



            <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                      <thead>
                        <tr>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  
					  $sql = "Select user_id,name,email FROM user where approve_status='0'" ;
						$result = $conn->query($sql);
						// output data of each row

                        while($row = $result->fetch_assoc()) {
						echo "<tr>
                          <td>
                            <div>" . $row["user_id"]. "</div>
                          </td>
                          <td>
                            <div>" . $row["name"]. "</div>
                          </td>
                          <td>
                            <div>" . $row["email"]. "</div>
                          </td>
                          
                          <td>
                            <div class='btn-list flex-nowrap'>
                                <form action='added.php' method='POST'>
								<input type='hidden' name='id' value=" . $row["user_id"]. ">
								<input type='submit' class='btn btn-outline-success w-100' name='Accept' value='Accept'>
								</form>
								<form action='deleted.php' method='POST'>
								<input type='hidden' name='id' value=" . $row["user_id"]. ">
								<input type='submit' class='btn btn-outline-danger w-100' name='Reject' value='Reject'>
								</form>
                              
                            </div>
                          </td>
                        </tr>";
						}
						?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


                <br>

              <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                    <div class="col">
                        <h3 class="card-title">
                        All Users
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
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Telephone</th>
                          <th class="w-1"></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr><?php
						$sql = "Select user_id,name,email,user_type,tel from user where approve_status = 1" ;
                          $result = $conn->query($sql);
                          // output data of each row

                    while($row = $result->fetch_assoc()) {
                      echo "<tr>";
                        echo "<td>" . $row['user_id']. "</td>";
                        echo "<td class='text-muted'>" . $row['name'] ."</td>";
                        echo "<td class='text-muted'>". $row["email"]. "</td>";
                        echo "<td class='text-muted'>". $row["user_type"]. "</td>";
                        echo "<td>". $row["tel"]."</td>";
                        echo "<td>";
                        echo "<form action='remove.php' method='POST'>";
                        echo "<input type='hidden' name='uid' value= ". $row['user_id']." >";
                        echo "<input type='submit' class='btn btn-ghost-danger w-100' name='Remove' value='Remove'>";
                        echo "</form>";
					              echo "</td>";
                        echo "</tr>";


                    }
                    ?>
                      </tbody>
                    </table>
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