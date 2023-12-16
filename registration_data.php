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
                                <li class="breadcrumb-item active" aria-current="page">Enrollment No.</li>
                            </ol>
                        </nav>
                    </div>
                
                </div>
                
                <h6 class="mb-0 text-uppercase">Enrollment No. Data</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Machine</th>
                                        <th>Enrollment Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                      include('db.php');
                                    
                                     $sql = "SELECT * FROM registration_number ORDER BY date_insert DESC,id DESC";
                                        $result = $conn->query($sql);
                                    
                                        if ($result->num_rows > 0) 
                                        {
                                                $serialNumber = 0; // Initialize the serial number counter
                                           
                                            while($row = $result->fetch_assoc()) 
                                            {
                                                    $serialNumber++;
                                                // $id=$row['id'];
                                                 $machinetype=$row['machine_type'];
                                                  // $machinetype="WCD";
                                                 //echo $machinetype;
                                                echo "<tr>";
                                                //echo "<td>".$row['id']."</td>";
                                                echo "<td>".$serialNumber."</td>"; // Display the serial number
                                                echo "<td>".$row['date_insert']."</td>";
                                                echo "<td>".$row['time_insert']."</td>";
                                                echo "<td>".$row['machine_type']."</td>";
                                                echo "<td>".$row['registration_num']."</td>";
                                                if($row['flag']== "ACTIVE")
                                                {
                                                    echo "<td style='color: #00ff97; font-weight: bold;'>".$row['flag']."</td>";
                                                }
                                                else
                                                {
                                                    echo "<td style='color: red; font-weight: bold;'>".$row['flag']."</td>";
                                                }
                                                
                                                // echo "<td><a href=\"registration_data.php\" class=\"btn btn-primary px-4\" onclick=\"updateRow('{$row['id']}', '{$machinetype}')\">Update</a></td>";


                                                echo '<td>
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" style="color:green; font-weight: bold;" href="#" onclick="updateRow(' . $row['id'] . ', \'ACTIVE\')">ACTIVE</a></li>
        <li><a class="dropdown-item" href="#" style="color:blue; font-weight: bold;" onclick="updateRow(' . $row['id'] . ', \'INACTIVE\')">INACTIVE</a></li>


        <li><a href="#" style="color:red; font-weight: bold;" class="dropdown-item delete-record" data-id="' . $row['id'] . '">Delete</a></li>


    </ul></td>
';
                                        
                                                echo "</tr>";
                                                }
                                        
                                        }
                                            else{
                                                echo"1";
                                            }
                                     
                                    
                                    
                                    ?>

                                
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Machine</th>
                                        <th>Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
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

    <script>
$(document).ready(function() {
    $(".delete-record").click(function(e) {
        e.preventDefault();
        
        var id = $(this).data("id");
        
        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                type: "POST",
                url: "delete_registration.php", // Replace with the actual script to delete from the database
                data: { id: id },
                success: function(response) {
                    // Handle success, for example, you can reload the page or update the UI
                    Swal.fire({
                        icon: 'success',
                        title: 'Record Deleted',
                        text: 'The record has been successfully deleted.',
                        showConfirmButton: false,
                        timer: 1500 // Time in milliseconds
                    });
                    
                    // Reload the page after a brief delay
                    setTimeout(function() {
                        location.reload();
                    }, 1500); // Same time as the timer above
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                }
            });
        }
    });
});
</script>



 <script type="text/javascript">
    function updateRow(id, action) {
        // You can capture more data from the row if needed (e.g., name)
        var data = {
            id: id,
            action: action
        };

        console.log(data.id);
        console.log(data.action);

        // Make an AJAX request to the server-side script to update the data
        // (using Fetch API, XMLHttpRequest, or a library like jQuery)
        fetch('update_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            // Handle the response from the server
            console.log(result.message);

            // Check if the update was successful
            if (result.message === 'Row updated successfully') {
                Swal.fire({
                    icon: 'success',
                    title: 'Record Updated',
                    text: 'The record has been successfully updated.',
                    showConfirmButton: false,
                    timer: 1500 // Time in milliseconds
                });

                // Reload the page after a brief delay
                setTimeout(function() {
                    location.reload();
                }, 1500); // Same time as the timer above
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Update Failed',
                    text: 'There was an error updating the record.'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Update Failed',
                text: 'There was an error updating the record.'
            });
        });
    }
</script>




    <!-- script for updating registration number -->

  <!--   <script type="text/javascript">
        function updateRow(id,machinetype) {
          // You can capture more data from the row if needed (e.g., name)
          var data = {
            id: id,
            name: machinetype

          };

          console.log(data.id);
          console.log(data.name);
        
          // Make an AJAX request to the server-side script to update the data
          // (using Fetch API, XMLHttpRequest, or a library like jQuery)
          fetch('update_data.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(result => {
            // Handle the response from the server, e.g., display a success message
            console.log(result.message);
          })
          .catch(error => console.error('Error:', error));
        }

    </script>
 -->
    <!-- -----------------end---------------------- -->

</body>


</html>
