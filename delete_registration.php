<?php 
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Create a database connection (replace with your database credentials)
    include('db.php');
    // Check connection
   

    // Prepare and execute the delete query
    $sql = "DELETE FROM registration_number WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
