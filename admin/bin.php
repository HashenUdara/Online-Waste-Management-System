<?php
require_once('./components/header.php');
$_SESSION['validate'] = "bin-management";


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
                        Bin Management
                        </h3>
                    </div>
                    </div>
                </div>
                </div>

                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Bin</h3>
                    
                  </div>
                  <div class="card-body">
                    <form action="addbin.php"  method="POST">
                    
                    <div class="mb-3">
                      <div class="form-label" >Bin Size</div>
                      <input type="text" class="form-control" placeholder="Enter Bin Size" name="size">
                    </div>

                    <div class="mb-3">
                      
                      <input type="submit" class="btn btn-primary w-100" value="Add new Bin">
                    </div>
                    </form>
                    
                    
                  </div>
                </div>
              </div>






<div class="col-lg-8">
              
              <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                    <div class="col">
                        <h3 class="card-title">
                        Bin List
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
                          <th>Bin No</th>
						  <th>Size</th>
                          <th>Actual Value</th>
                          <th class="w-1"></th>
                          
                        </tr>
                      </thead>
<?php
require_once('../conn.php');
$sql = "SELECT bin_no,actual_value,bin_height FROM bin" ;
$result = $conn->query($sql);
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr> 
		<td>" . $row["bin_no"]. "</td> 
		<td>". $row["bin_height"]. "</td> 
		<td>" . $row["actual_value"] . "</td> 
		<td>
			<form action='rbin.php'  method='POST'>
			<input type='hidden' name='Rbin' value=". $row["bin_no"]. ">
<input type='submit' value='Remove' class='btn btn-ghost-danger w-100'/>
</form>
</td> 
	</tr>";
}
echo "</table>";
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







