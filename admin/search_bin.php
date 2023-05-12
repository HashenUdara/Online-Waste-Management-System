<?php
require_once('./components/header.php');
if($_SESSION['validate'] != "bin-live"){
	header('Location:live.php');
  }
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
                </h2><br/><br/>
                <div class="text-muted mt-1"> </div>
              </div>
              
           </div>


            <div class="row row-cards"  id="api_key_count">



</div>
                

<?php
require_once('../conn.php');

?>


<?php

$Search = $_POST['search'];
if($Search>-1){

// Get the number of API keys in the database
$sql = "SELECT * FROM bin where bin_no = $Search";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

   // Loop through the data and echo it out

   
   while ($row = $result->fetch_assoc()) {
	$Bin_No = $row["bin_no"];
	$Bin_Hei = $row['bin_height'];
	$A_val = $row['actual_value'];
	$C_Date = $row['collected_date'];
	$Bin_Sta = $row['bin_status'];
	$Truck_No = $row['truck_no'];
	
    
   
	$P = (($Bin_Hei-$A_val)/$Bin_Hei)*100;
	$Bin_Precentage =$P;
    

    //echo $Bin_No;
	
    echo '<br/><br/><div class="col-sm-6 col-lg-4.5">
    <div class="card card-md">
                  <div class="card-body text-center">
                    <div class="text-uppercase text-muted font-weight-medium" style="font-size: 1.2rem;">

                    BIN'. $Bin_No.'

                    </div>
                    <div class="display-5 fw-bold my-3">'

                    .round($Bin_Precentage).'%

                    </div>
                    <div class="mb-3">
                            
                            <div class="progress mb-2">
                              <div class="progress-bar" style="width: '.$Bin_Precentage.'%" role="progressbar"  aria-valuemin="0" aria-valuemax="100" aria-label="53% Complete">
                                <span class="visually-hidden">53% Complete</span>
                              </div>
                            </div>
                            
                          </div>

                        <div style="display: flex;flex-direction: column;align-items: flex-start;">
                        <div class="mb-2">
                          
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 7l16 0"></path>
                        <path d="M10 11l0 6"></path>
                        <path d="M14 11l0 6"></path>
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg>


                          Bin Size: <strong>5L</strong>
                        </div>





                  



                        <div class="mb-2">
                          
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M16 3l0 4"></path><path d="M8 3l0 4"></path><path d="M4 11l16 0"></path><path d="M11 15l1 0"></path><path d="M12 15l0 3"></path></svg>


                          Last Collected Date: <strong>'.$C_Date.'</strong>
                        </div>
                        
                      </div>
                      
                  </div>
                </div>
              </div></div>
';
	
	
  }
  

} else {
	
	echo'<div class="col-md-4 col-lg-100">';
				
                echo'<div class="card">';
                 echo '<div class="card-body p-5 text-center">';
                    
                  echo '  <h3 class="m-0 mb-1"><a href="#">'."Invalied Bin Id".'</a></h3>'.'<br/>';
                  echo '  <div class="text-muted"></div>'.'<br/>';
				 
					
					
				
					
					
                    
                  echo '</div>';
				  
				  echo '<form action="live.php" method="POST">';
									 
				//echo '<input type="hidden" value="'.$row["bin_no"].'" name="clct"/>';
					
				  
				  echo '<input type="submit" class="btn btn-primary w-100" value="Go Back">';
				  
				  echo '</form>';
				  
                  echo '<div class="d-flex">';
                    
                     echo '
                    
                  </div>
                </div>
              </div>';	
	
	
	
  
}
}
?>






