<?php
session_start();
if(isset($_SESSION['IS_LOGIN'])){
include('db.php'); // Include your database connection code

// Function to retrieve district name based on ID
function getDistrictName($conn, $districtID) {
    $query = "SELECT name FROM district WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $districtID);
    $stmt->execute();
    $stmt->bind_result($districtName);
    $stmt->fetch();
    $stmt->close();
    return $districtName;
}

// Function to retrieve taluka name based on ID
function getTalukaName($conn, $talukaID) {
    $query = "SELECT name FROM taluka WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $talukaID);
    $stmt->execute();
    $stmt->bind_result($talukaName);
    $stmt->fetch();
    $stmt->close();
    return $talukaName;
}

// Function to retrieve village name based on ID
function getVillageName($conn, $villageID) {
    $query = "SELECT name FROM village WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $villageID);
    $stmt->execute();
    $stmt->bind_result($villageName);
    $stmt->fetch();
    $stmt->close();
    return $villageName;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $machineType = $_POST["machinetype"];
    $admissionType = $_POST["admissiontype"];
    $fillDate = $_POST["fill_date"];
    $fillTime = $_POST["fill_time"]; 

$formattedDateTime = date("YmdHis", strtotime($fillDate . ' ' . $fillTime));



    $registrationNum = $_POST["registration_num"];
    $registrationNo = $_POST["registration_no"];
// combined numbers
    $combinedRegistration = $registrationNum . $registrationNo;

    $aadharNumber = $_POST["aadhar_number"];
    $fullName = $_POST["full_name"];
    $mobile = $_POST["mobile"];
    $dob = $_POST["dob"];

    $district = $_POST["district"];
    $taluka = $_POST["taluka"];
    $village = $_POST["village"];

    $paymentAmounts = array(
    "New" => "NA",
    "Mandatory Biometric" => "NA",
    "Biometric" => "100",
    "Demographic" => "50",
    "KYC" => "50"
);

// Set the payment amount based on the selected machine type
$paymentAmount = $paymentAmounts[$admissionType];
$status="Inprocess";
$calling="Not Yet";
$created_at=$_POST["fill_date"];

    // Perform the database insertion
 // Perform the database insertion
// $query = "INSERT INTO admission_data (id, machine_type, admission_type, fill_datetime, registration_combined, aadhar_number, full_name, mobile,dob, district, taluka, village, payment_amount,status) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
// $stmt = $conn->prepare($query);

$query = "INSERT INTO admission_data (id, machine_type, admission_type, fill_datetime, registration_combined, aadhar_number, full_name, mobile, dob, district, taluka, village, payment_amount, status, calling,created_at) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

// Retrieve district, taluka, and village names based on IDs
$districtName = getDistrictName($conn, $district);
$talukaName = getTalukaName($conn, $taluka);
$villageName = getVillageName($conn, $village);

// $stmt->bind_param("sssssssssssss", $machineType, $admissionType, $fillDateTime, $combinedRegistration, $aadharNumber, $fullName, $mobile, $dob, $districtName, $talukaName, $villageName, $paymentAmount,$status);

$stmt->bind_param("sssssssssssssss", $machineType, $admissionType, $formattedDateTime, $combinedRegistration, $aadharNumber, $fullName, $mobile, $dob, $districtName, $talukaName, $villageName, $paymentAmount, $status, $calling, $created_at);


if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error inserting data: " . $stmt->error;
}

$stmt->close();
$conn->close();

}

}else{
    header('location:index.php');
    die();
}
?>