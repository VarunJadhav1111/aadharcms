<?php
session_start();
if(isset($_SESSION['IS_LOGIN'])){
include('db.php'); // Include your database connection code

if (isset($_POST["machineType"])) {
    $machine_type = $_POST["machineType"];

    // Assuming you have a valid SQL query to fetch data based on machine type
    $query = "SELECT registration_num FROM registration_number WHERE machine_type = ? AND flag = 'ACTIVE'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $machine_type);
    $stmt->execute();
    $result = $stmt->get_result();

       if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array(
            "registration_num" => $row["registration_num"],
            // Add other fetched data here
        );
        echo json_encode($response);
    } else {
        // Return a JSON response even for errors
        echo json_encode(array("error" => "No data found for the selected machine type."));

    }
} else {
    // Return a JSON response even for errors
    echo json_encode(array("error" => "Invalid request."));
}

}else{
    header('location:index.php');
    die();
}
?>
