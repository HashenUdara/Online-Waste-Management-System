<?php
require_once('./components/header.php');
if($_SESSION['validate'] != "bin-collect"){
	header('Location:collect.php');
  }
$_SESSION['validate'] = "bin-collect";

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
                  Bin Collect Info
                </h2>
				<br/><br/>
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
$sql = "SELECT bin_no,actual_value FROM bin where bin_no='$Search'" ;
$result = $conn->query($sql);


if ($result->num_rows > 0) {
		
	   $row=$result->fetch_assoc();

             
                echo'<div class="col-md-4 col-lg-100">';
				
                echo'<div class="card">';
                 echo '<div class="card-body p-5 text-center">';
                    
                  echo '  <h3 class="m-0 mb-1"><a href="#">'.$row["bin_no"].' bin</a></h3>'.'<br/>';
                  echo '  <div class="text-muted">Live Bin Data</div>'.'<br/>';
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


	
			  
  
  
}else{
	
 echo'<div class="col-md-4 col-lg-100">';
				
                echo'<div class="card">';
                 echo '<div class="card-body p-5 text-center">';
                    
                  echo '  <h3 class="m-0 mb-1"><a href="#">'."Invalied Bin Id".'</a></h3>'.'<br/>';
                  echo '  <div class="text-muted"></div>'.'<br/>';
				 
					
					
				
					
					
                    
                  echo '</div>';
				  
				  echo '<form action="collect.php" method="POST">';
									 
				//echo '<input type="hidden" value="'.$row["bin_no"].'" name="clct"/>';
					
				  
				  echo '<input type="submit" class="btn btn-primary w-100" value="Go Back">';
				  
				  echo '</form>';
				  
                  echo '<div class="d-flex">';
                    
                     echo '
                    
                  </div>
                </div>
              </div>';	
	
	
}
?>






