<?php
session_start();

if (isset($_SESSION['IS_LOGIN'])) {
    // Include the database connection file
    include('db.php');

    // Receive data from the JavaScript request
    $data = json_decode(file_get_contents("php://input"), true);

    // Validate and sanitize the input
    $id = intval($data['id']);
    $action = $conn->real_escape_string($data['action']);

    if ($action == "ACTIVE") {
        $sql = "UPDATE registration_number SET flag = 'ACTIVE' WHERE id = ?";
    } else {
        $sql = "UPDATE registration_number SET flag = 'INACTIVE' WHERE id = ?";
    }

    // Prepare the SQL statement with a parameterized query
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameter
        $stmt->bind_param("i", $id);

        // Execute the statement
        if ($stmt->execute()) {
            $response = array('message' => 'Row updated successfully');
        } else {
            $response = array('message' => 'Error updating row: ' . $stmt->error);
        }

        // Close the statement
        $stmt->close();
    } else {
        $response = array('message' => 'Error preparing statement: ' . $conn->error);
    }

    // Close the database connection
    $conn->close();

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    header('Location: index.php');
    die();
}
?>
