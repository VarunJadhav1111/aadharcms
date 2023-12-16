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
                        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="https://myaadhaar.uidai.gov.in/check-aadhaar" class="btn btn-primary px-4"
                        target="_blank">Check Status</a></td>
                </div>
            </div>
        </div>

        <hr/>
        <div class="row">
            <div class="col-xl mx-auto">
                <div class="card">
                    <div class="card-header px-4 py-3">
                        <h5 class="mb-0">Customer Data</h5>
                    </div>
                    <div class="card-body p-4">
                        <form class="row g-3 needs-validation" name="" novalidate="" action="" method="GET">
                            <div class="col-md-4">
        <label for="date_from" class="form-label">From Date</label>
        <input type="date" class="form-control" name="date_from" id="date_from" placeholder="" value="<?php isset($_GET['date_from']) ? $_GET['date_from'] : '' ?>" required="">
    </div>
    <div class="col-md-4">
        <label for="date_to" class="form-label">To Date</label>
        <input type="date" class="form-control" name="date_to" id="date_to" placeholder="" value="<?php isset($_GET['date_to']) ? $_GET['date_to'] : '' ?>" required="">
    </div>
                           
    <div class="col-md-4">
        <label for="machine_type" class="form-label">Status</label>
            <select id="status"  name="status" class="form-select" required="">
                <option selected="" value="">Select Status</option>

                <option value="Inprocess" 
                    <?php isset($_GET['status'])== true ? ($_GET['status']=='Inprocess'?'selected' : '') : '' ?>
                    >Inprocess
                </option>

                            <option value="Generated" <?php isset($_GET['status'])== true ? ($_GET['status']=='Generated'?'selected' : '') : '' ?>> Generated</option>

                            <option value="Rejected" <?php isset($_GET['status'])== true ? ($_GET['status']=='Rejected'?'selected' : '') : '' ?>>Rejected</option>

                            <option value="Hold" <?php isset($_GET['status'])== true ? ($_GET['status']=='Hold'?'selected' : '') : '' ?>>Hold</option>

                            <option value="Data Processing Error" <?php isset($_GET['status'])== true ? ($_GET['status']=='Data Processing Error'?'selected' : '') : '' ?>>Data Processing Error</option>

                            <option value="EID Not Found" <?php isset($_GET['status'])== true ? ($_GET['status']=='EID Not Found '?'selected' : '') : '' ?>>EID Not Found</option>
                                            
                                        </select>
                                        
                                    </div>
                                  
                                 
                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn btn-primary px-4">Filter</button>
                                         

                                            <a href="form_data_copy.php" class="btn btn-light px-4" >Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                     <?php
        include('db.php'); // Include your database connection code

        if (!empty($_GET['date_from']) && !empty($_GET['date_to'])) {
    $dateFrom = $_GET['date_from'];
    $dateTo = $_GET['date_to'];

   if (!empty($_GET['status'])) {
        $status = $_GET['status'];
        $result = mysqli_query($conn, "SELECT * FROM admission_data WHERE created_at BETWEEN '$dateFrom' AND '$dateTo' AND status='$status' ORDER BY id DESC");
    } else {
        $result = mysqli_query($conn, "SELECT * FROM admission_data WHERE created_at BETWEEN '$dateFrom' AND '$dateTo' ORDER BY id DESC");
    }
} else{
      echo "Please select a date range.";
    return;  // Return early to prevent further processing
             // $query = "SELECT * FROM admission_data ORDER BY id DESC"; // Replace with your table name
            // $result = mysqli_query($conn, "SELECT * FROM admission_data ORDER BY id DESC");

        }

                            // $query = "SELECT * FROM admission_data"; // Replace with your table name
                            
                            if ($result && mysqli_num_rows($result) > 0) {
                            ?>  
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Update</th>
                                <th>Sr.No</th>
                                <th>Machine Type</th>
                                <th>Admission Type</th>
                                <th>Date/Time</th>
                                <th>Enrollment No.</th>
                                <th>Aadhar Number</th>
                                <th>Full Name</th>
                                <th>Mobile</th>
                                <th>Date Of Birth</th>
                                <th>District</th>
                                <th>Taluka</th>
                                <th>Village</th>
                                <th>Fee</th>
                                <th>Age</th>
                                <th>Status</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
 

                                <?php  

                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo '<tr>';
                                    // ... Your existing code for displaying table rows ...

                                     // echo '<td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal' . $row['id'] . '">Edit</button></td>';

                            echo '<td><a href="#" class="text-inverse p-r-10" data-toggle="modal" data-target="#myModal' . $row['id'] . '"><i class="fas fa-edit" style="color: #0f51c2;"></i></a>

                            <a href="#" class="text-inverse p-r-10" data-toggle="modal" data-target="#updateModal' . $row['id'] . '"><i class="fas fa-pencil-alt" style="color: #e87317;"></i></a>

                            <a href="#" class="text-inverse p-r-10 delete-record" data-id="' . $row['id'] . '"><i class="fas fa-trash" style="color: red;"></i></a>


                            </td>';

                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['machine_type'] . '</td>';
                            echo '<td>' . $row['admission_type'] . '</td>';
                            echo '<td>' . $row['fill_datetime'] . '</td>';
                            // echo '<td>' . $row['fill_time'] . '</td>';
                            echo '<td>' . $row['registration_combined'] . '</td>';
                            
                            echo '<td>' . $row['aadhar_number'] . '</td>';
                            echo '<td>' . $row['full_name'] . '</td>';
                            echo '<td>' . $row['mobile'] . '</td>';
                            echo '<td>' . $row['dob'] . '</td>';
                            echo '<td>' . $row['district'] . '</td>';
                            echo '<td>' . $row['taluka'] . '</td>';
                            echo '<td>' . $row['village'] . '</td>';
                            echo '<td>' . $row['payment_amount'] . '</td>';
                             // Convert dob to a DateTime object
                            if ($row['dob'] !== null) {
                                    $dob = new DateTime($row['dob']); 
                                    $currentDate = new DateTime();
                            
                                // Calculate the difference between dob and current date
                                    $ageInterval = $currentDate->diff($dob);
                            
                             // Get the calculated age
                                    $age = $ageInterval->y;
                            
                                // Determine the appropriate CSS class based on age
                                    $ageClass = "";
                                    if ($age === 6) {
                                        echo "<td style='color: blue; font-weight: bold;'>" . $age . " years</td>"; 
                                    } 
                                    elseif ($age < 18) {
                                        echo "<td style='color: red; font-weight: bold;'>" . $age . " years</td>"; 
                                    } 
                                    else {
                                        echo "<td style='color: #06c477; font-weight: bold;'>" . $age . " years</td>"; 
                                    }
                                }

                        // Status dropdown
                            echo '<td>' . $row['status'] . '</td>';

                        // Remark input field
                            echo '<td>' . $row['remark'] . '</td>';
                           
                    echo '</tr>';
                                
                                // Modal for each row
          // ... your previous code ...

// Modal for each row
echo '<div class="modal fade" id="myModal' . $row['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
echo '<div class="modal-dialog">';
echo '<div class="modal-content">';
echo '<div class="modal-body">';
echo '<form id="myModal">';
// Your form fields for editing (Name, Email, Phone, etc.)
echo'<label for="machine_type" class="form-label" style="font-weight: bold;">Status</label>';
echo '<select class="form-control" name="status">';
echo '<option value="Inprocess" ' . ($row['status'] == "Inprocess" ? "selected" : "") . '>Inprocess</option>';
echo '<option value="Approved" ' . ($row['status'] == "Approved" ? "selected" : "") . '>Approved</option>';
echo '<option value="Rejected" ' . ($row['status'] == "Rejected" ? "selected" : "") . '>Rejected</option>';
echo '<option value="Hold" ' . ($row['status'] == "Hold" ? "selected" : "") . '>Hold</option>';
echo '</select>';
echo'<label for="machine_type" class="form-label" style="font-weight: bold;">Remark</label>';
echo '<input class="form-control" type="text" name="remark" value="' . $row['remark'] . '">';
echo '</form>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
echo '<button type="button" class="btn btn-primary" onclick="updateStatusRemark(this, ' . $row['id'] . ')">Save changes</button>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';



echo '<div class="modal fade" id="updateModal' . $row['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
echo '<div class="modal-dialog">';
echo '<div class="modal-content">';
echo '<div class="modal-body">';
echo '<form id="updateForm' . $row['id'] . '" action="update_script.php" method="post">';


// Additional input fields for the table headers
echo '<label for="machine_type" class="form-label" style="font-weight: bold;">Machine Type</label>';
echo '<input class="form-control" readonly type="text" name="machine_type" value="' . $row['machine_type'] . '">';

echo '<label for="admission_type" class="form-label"  style="font-weight: bold;">Admission Type</label>';
echo '<input class="form-control" readonly type="text" name="admission_type" value="' . $row['admission_type'] . '">';

echo '<label for="date_time" class="form-label" style="font-weight: bold;">Date/Time</label>';
echo '<input class="form-control" type="text" name="date_time" value="' . $row['fill_datetime'] . '">';

echo '<label for="enrollment_no" class="form-label" style="font-weight: bold;">Enrollment No.</label>';
echo '<input class="form-control" type="text" name="enrollment_no" value="' . $row['registration_combined'] . '">';

echo '<label for="aadhar_number" class="form-label" style="font-weight: bold;">Aadhar Number</label>';
echo '<input class="form-control" type="text" name="aadhar_number" value="' . $row['aadhar_number'] . '">';

echo '<label for="full_name" class="form-label" style="font-weight: bold;">Full Name</label>';
echo '<input class="form-control" type="text" name="full_name" value="' . $row['full_name'] . '">';

echo '<label for="mobile" class="form-label" style="font-weight: bold;">Mobile</label>';
echo '<input class="form-control" type="text" name="mobile" value="' . $row['mobile'] . '">';

echo '<label for="date_of_birth" class="form-label" style="font-weight: bold;">Date Of Birth</label>';
echo '<input class="form-control" type="text" name="date_of_birth" value="' . $row['dob'] . '">';

echo '<label for="district" class="form-label" style="font-weight: bold;">District</label>';
echo '<input class="form-control" type="text" name="district" value="' . $row['district'] . '">';

echo '<label for="taluka" class="form-label" style="font-weight: bold;">Taluka</label>';
echo '<input class="form-control" type="text" name="taluka" value="' . $row['taluka'] . '">';

echo '<label for="village" class="form-label" style="font-weight: bold;">Village</label>';
echo '<input class="form-control" type="text" name="village" value="' . $row['village'] . '">';

echo '</div>';
echo '</form>';
echo '<div class="modal-footer">';
echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
echo '<button type="button" class="btn btn-primary" onclick="updateAdmissionForm(document.getElementById(\'updateForm' . $row['id'] . '\'))">Save changes</button>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


                                    echo '</tr>';
                                }

                                ?>
                            
                        </tbody>
                    </table>
                    <?php 
                    } else {
                                echo "No data found.";
                            }
                            ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright © 2023. All right reserved.</p>
</footer>
</div>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<!-- script for update -->
<script>
$(document).ready(function() {
    $(".delete-record").click(function(e) {
        e.preventDefault();

        var id = $(this).data("id");

        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                type: "POST",
                url: "delete_script.php", // Replace with the actual script to delete from the database
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

    // Handle the search button click event
    $('#searchButton').on('click', function() {
        var searchTerm = $('#searchInput').val();
        var dateFrom = $('#dateFrom').val();
        var dateTo = $('#dateTo').val();

        // Perform an AJAX request to fetch filtered data
        $.ajax({
            url: 'search.php', // Replace with the URL of your search PHP script
            method: 'POST',
            data: {
                searchTerm: searchTerm,
                dateFrom: dateFrom,
                dateTo: dateTo
            },
            dataType: 'html',
            success: function(response) {
                // Update the table with the filtered data
                $('#example2 tbody').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>

<!-- Additional JavaScript for updating status and remark -->

<script>
// Function to update status/remark
function updateStatusRemark(buttonElement, id) {
    var status = $(buttonElement).closest('.modal-content').find('select[name="status"]').val();
    var remark = $(buttonElement).closest('.modal-content').find('input[name="remark"]').val();

    // Perform AJAX request to update status and remark
    $.ajax({
        type: "POST",
        url: "update_values.php", // Update this to your PHP script handling updates
        data: { id: id, status: status, remark: remark },
        success: function(response) {
            Swal.fire({
                icon: "success",
                title: "Staus/Remark Updated",
                text: response,
                timer: 1000,
                showConfirmButton: false,
            }).then(function() {
                window.location.href = "form_data.php"; // Redirect to admission.php
            });
        },
        error: function() {
            Swal.fire({
                icon: "error",
                title: "Error Submitting Data",
                text: "An error occurred while submitting data.",
            });
        },
    });
}
</script>

<script>
$(document).ready(function() {
    var table = $('#example2').DataTable({
        lengthChange: true,
        buttons: [
            'copy',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A3',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16] // Include columns 0, 1, and 2 in the PDF
                }
            },
            'excel',
            {
                extend: 'print',
                orientation: 'landscape',
                pageSize: 'A3',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16] // Include columns 0, 1, and 2 in the PDF
                }
            }
        ]
    });

    table.buttons().container()
        .appendTo('#example2_wrapper .col-md-6:eq(0)');
});
</script>
<!--app JS-->
<script src="assets/js/app.js"></script>
</body>

</html>
