<?php 

include('header.php');
 ?>

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Tables</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Received Call Data</li>
                            </ol>
                        </nav>
                    </div>
                   
                </div>
                
                <!-- <h6 class="mb-0 text-uppercase">Received Call Data</h6> -->
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Sr.No</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Aadhar No.</th>
                                        <th>Mobile No.</th>
                                        <th>Village</th>
                                        <th>Taluka</th>
                                        <th>Call Status</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   <!--  -->

<?php
// Connect to your database
include('db.php'); // Include your database connection code

// Define the required time period (5 years)
$requiredYears = 5;

// Calculate the date that is 5 years before today
$requiredDate = date("YmdHis", strtotime("-$requiredYears years"));

// Query to fetch the data
// $query = "SELECT * FROM admission_data WHERE admission_type = 'Biometric' AND fill_datetime <= '$requiredDate'";

$query = "SELECT * FROM admission_data WHERE (admission_type = 'New' OR admission_type = 'Biometric') AND fill_datetime <= '$requiredDate'";


// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result->num_rows > 0) {
     $serialNumber = 0;
    while ($row = mysqli_fetch_assoc($result)) {

       
         if($row['calling']== "Received")
        {
             echo '<tr>';
            $serialNumber++;                                           
           
             
        echo "<td>".$serialNumber."</td>"; 
                $formattedDate = date("Y-m-d H:i:s", strtotime($row['fill_datetime']));
echo "<td>".$formattedDate."</td>";
        echo "<td>".$row['full_name']."</td>"; 
        echo "<td>".$row['aadhar_number']."</td>"; 
        echo "<td>".$row['mobile']."</td>"; 
        echo "<td>".$row['village']."</td>"; 
        echo "<td>".$row['taluka']."</td>"; 
        echo "<td style='color:#00ff97;'>".$row['calling']."</td>"; 
             // 
        echo '</tr>';
}

        
    }
} else {
    echo "Error executing query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

                                    
                                </tbody>
                               <!-- 'e' -->
                            </table>
                        </div>
                    </div>
                </div>

            


            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2023. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->

  



    <!--start switcher-->
  
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
 


<!-- php code for update row -->




<!-- end -->
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                lengthChange: true,
                buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );
         
            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>


</html>
