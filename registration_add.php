<?php

include('header.php');
include('db.php');
date_default_timezone_set("Asia/Kolkata");

$date_insert = date('y/m/d');
$time_insert = date("h:i:sa");
$machine_type = $_POST["machine_type"];
$registration_num = $_POST["registration_num"];
$flag = "INACTIVE";

// Prepare the SQL statement using a prepared statement
$stmt = $conn->prepare("INSERT INTO registration_number (date_insert, time_insert, machine_type, registration_num, flag) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $date_insert, $time_insert, $machine_type, $registration_num, $flag);

if ($stmt->execute()) {
 
    echo '<script>
        // Load SweetAlert from CDN or locally
        
        // Display a SweetAlert
        Swal.fire({
            icon: "success",
            title: "Submitted",
            timer: 2000, // 3 seconds
            showConfirmButton: false
        }).then(function() {
            window.location.href = "registration_data.php"; // Replace with the correct relative URL
        });
    </script>';
} else {
    //echo "Error: " . $stmt->error;

     echo '<script>
        // Load SweetAlert from CDN or locally
        
        // Display a SweetAlert
        Swal.fire({
            icon: "Error",
            title: "Submitted",
            timer: 2000, // 3 seconds
            showConfirmButton: false
        }).then(function() {
            window.location.href = "registration_data.php"; // Replace with the correct relative URL
        });
    </script>';
}

$stmt->close();
$conn->close();

?>
