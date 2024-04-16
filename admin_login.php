<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your actual database password
$dbname = "cleaning_service"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform SQL query to check admin credentials
    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Admin authentication successful
        $_SESSION['admin_username'] = $username;
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        // Admin authentication failed
        echo "Invalid username or password";
    }
}

// Close database connection
$conn->close();
?>