<?php
// Update script (update_script.php)

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the ID from the AJAX request
    $id = $_POST['id']; // Replace with the appropriate field name
    // echo $id;
    // echo $_POST['aadhar_number'];
    // Create a database connection
  include('db.php');

    // Perform the update based on the ID
    // Modify this part according to your table structure and fields
    $sql = "UPDATE admission_data SET
            machine_type = ?,
            admission_type = ?,
            fill_datetime = ?,
            registration_combined = ?,
            aadhar_number = ?,
            full_name = ?,
            mobile = ?,
            dob = ?,
            district = ?,
            taluka = ?,
            village = ?
            WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'sssssssssssi', // Adjust the data types based on your field types
        $_POST['machine_type'],
        $_POST['admission_type'],
        $_POST['date_time'],
        $_POST['enrollment_no'],
        $_POST['aadhar_number'],
        $_POST['full_name'],
        $_POST['mobile'],
        $_POST['date_of_birth'],
        $_POST['district'],
        $_POST['taluka'],
        $_POST['village'],
        $id
    );

    if ($stmt->execute()) {
        echo 'Data updated successfully';
    } else {
        echo 'Error updating data: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request';
}
?>
