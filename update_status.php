<?php
// Check if the ID and status values are set
if(isset($_POST['id']) && isset($_POST['status'])) {

    $id = $_POST['id'];
    $status = $_POST['status'];

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cleaning_service";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE cleaningbooking SET status = ? WHERE idbooking = ?");
    $stmt->bind_param("si", $status, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Status updated successfully to $status."; // Display the updated status
    } else {
        echo "Error updating status: " . $stmt->error; // Display any error that occurs during the update
        echo "Error description: " . mysqli_error($conn); // Show MySQL error
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "ID or status not specified for updating.";
}
?>
