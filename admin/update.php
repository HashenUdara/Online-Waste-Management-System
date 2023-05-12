<?php
require_once('../conn.php');

?>



<?php







// Get the number of API keys in the database
$sql = "SELECT * FROM bin";
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
	
    echo '<div class="col-sm-6 col-lg-4.5">
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
	/*if($Bin_Precentage == 100){
        echo "BIN ".$Bin_No;
    }*/
	
  }
  

} else {
  echo "Can't Fetch Data";
}

echo"<table  width = '100%'>";

echo "<tr><h2 class='page-title'>
<br/><br/>Full Bin List
</h2></tr>";
	
$sql1 = "selecr * from bins";
$result = $conn->query($sql);


if($result->num_rows > 0){
		
	while($row = $result->fetch_assoc()){
        $Bin_Hei = $row['bin_height'];
	    $A_val = $row['actual_value'];

	    $Bin_Precentage =(($Bin_Hei-$A_val)/$Bin_Hei)*100;

		if($Bin_Precentage == 100){
			
			echo "<tr style = font-size:15px;><td>&nbsp;&nbsp;&nbsp;-> BIN ".$row["bin_no"]."</td><tr>";
		}
		
		
	}
}




                       

// Close database connection
$conn->close();

?>