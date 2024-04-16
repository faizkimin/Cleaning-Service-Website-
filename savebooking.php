<?php
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

// Get form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenum = $_POST['phonenum'];
$idnum = $_POST['idnum'];
$homeadd = $_POST['homeadd'];
$services = $_POST['services'];
$daycleaning = $_POST['daycleaning'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO cleaningbooking (firstname, lastname, phonenum, icnum, homeadd, services, daycleaning) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $firstname, $lastname, $phonenum, $idnum, $homeadd, $services, $daycleaning);

// Execute the statement
if ($stmt->execute()) {
    // Close connection
    $stmt->close();
    $conn->close();
    // Display success message and redirect to booking form
    echo "<script>alert('Booking saved successfully.'); window.location = 'booking.html';</script>";
} else {
    echo "Error: " . $stmt->error;
    // Close connection
    $stmt->close();
    $conn->close();
}
?>