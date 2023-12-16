<?php
session_start();
if(isset($_SESSION['IS_LOGIN'])){
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Check if the status and/or remark are set in the POST data
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
        // Update the status in the database
        $updateStatusQuery = "UPDATE admission_data SET status = '$status' WHERE id = $id";
        if (mysqli_query($conn, $updateStatusQuery)) {
            $statusUpdated = true;
        } else {
            $statusUpdated = false;
        }
    }
    
    if (isset($_POST['remark'])) {
        $remark = $_POST['remark'];
        // Update the remark in the database
        $updateRemarkQuery = "UPDATE admission_data SET remark = '$remark' WHERE id = $id";
        if (mysqli_query($conn, $updateRemarkQuery)) {
            $remarkUpdated = true;
        } else {
            $remarkUpdated = false;
        }
    }
    
    // Check if at least one update was successful
    if ($statusUpdated || $remarkUpdated) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}



}else{
    header('location:index.php');
    die();
}
?>
