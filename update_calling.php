<?php
session_start();
if(isset($_SESSION['IS_LOGIN'])){
    include('db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];
        
        // Check if the status and/or remark are set in the POST data
        if (isset($_POST['calling'])) {
            $calling = $_POST['calling'];
            // Update the status in the database
            $updateStatusQuery = "UPDATE admission_data SET calling = '$calling' WHERE id = $id";
            if (mysqli_query($conn, $updateStatusQuery)) {
                $statusUpdated = true;
            } else {
                $statusUpdated = false;
            }
        }
        
        // Check if at least one update was successful
        if ($statusUpdated) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
} else {
    header('location:index.php');
    die();
}
?>
