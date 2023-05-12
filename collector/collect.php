<?php

require_once('./components/header.php');
$_SESSION['validate'] = "bin-collect";

?>


<?php
require_once('../conn.php');
$bin_no = '';
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
          <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  User Info
                </h2>
                <div class="text-muted mt-1"> </div>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">


                
                <form action = "csearch.php" method = "POST">
                <div class="d-flex">
                  <input type="text" class="form-control d-inline-block w-9 me-1" placeholder="Search Bin no" name = "search">
                 
                 <input type = "Submit" value = "Search" style = "border-radius: 4px;background-color: #0066cE;border: 2px solid #0066cE;
                 color: white;padding: 5px 15px;">
                  <!--<a href="#" class="btn btn-primary">
                    <!- Download SVG icon from http://tabler-icons.io/i/plus ->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                       <path d="M21 21l-6 -6"></path>
                    </svg>
                    
                  </a>-->
                </div>
                </form>
                
              </div>
           </div>

            <br>

            

            <?php
              //get the data
              $username=$_SESSION['user_id'];
              $x="select * from user where user_id=$username";

              $result=$conn->query($x);
              $data=$result->fetch_assoc();


              echo "User_Id &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     : ".$data["user_id"]."<br><br>";

              echo "User_Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   : ".$data["name"]."<br><br>";

              echo "Phone_Number &nbsp&nbsp: ".$data["tel"]."<br><br>";
            ?>

            <br>
            <div class="col">
                <h2 class="page-title">
                  Bin Collect Information
                </h2>
                <div class="text-muted mt-1"></div>
              </div>

            <div class="row row-cards">



            <?php

              $sql = "SELECT bin_no,actual_value FROM bin" ;
              $result = $conn->query($sql);

              while($row = $result->fetch_assoc()){
                echo'<div class="col-md-6 col-lg-3">';
                echo'<div class="card">';
                 echo '<div class="card-body p-4 text-center">';
                    
                  echo '  <h3 class="m-0 mb-1"><a href="#">'.$row["bin_no"].' bin</a></h3>';
                  echo '  <div class="text-muted">Live Bin Data</div>';
				 echo $row["actual_value"];
					
					
				
					//$data=$r->fetch_assoc();
					
					
                    
                  echo '</div>';
				  
				  echo '<form action="dcollect.php" method="POST">';
									 
				echo '<input type="hidden" value="'.$row["bin_no"].'" name="clct"/>';
					
				  
				  echo '<input type="submit" class="btn btn-primary w-100" value="Collect">';
				  
				  echo '</form>';
				  
                  echo '<div class="d-flex">';
                    
                     echo '
                    
                  </div>
                </div>
              </div>';
              }

            ?>



              


              









            </div>






          </div>
        </div>

      </div>
    </div>


<?php

require_once('./components/footer.php');

?>


