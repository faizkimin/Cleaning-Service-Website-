<?php
// Check if the ID parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

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

    // SQL to delete a record
    $sql = "DELETE FROM cleaningbooking WHERE idbooking = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "No ID specified for deletion.";
}
?>
