<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View Records</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/plugins/testimonial/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/testimonial/css/owl.theme.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <style>
        /* Custom table styles */
        .container {
            padding-top: 20px;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
        }

        .booking-table th,
        .booking-table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .booking-table th {
            background-color: #f2f2f2;
        }

        .booking-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .booking-table tbody tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        
    </header>

    <div class="container">
        <h1>Booking Records</h1>
        <div class="table-responsive">
            <table class="table booking-table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>IC Number</th>
                        <th>Address</th>
                        <th>Services</th>
                        <th>Date</th>
						<th>Status</th>
                    </tr>
                </thead>
                <tbody>
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

                    // Fetch records from the database
                    $sql = "SELECT * FROM cleaningbooking";
                    $result = $conn->query($sql);

                    // Display records in the table
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['idbooking'] . "</td>";
                            echo "<td>" . $row['firstname'] . "</td>";
                            echo "<td>" . $row['lastname'] . "</td>";
                            echo "<td>" . $row['phonenum'] . "</td>";
                            echo "<td>" . $row['icnum'] . "</td>";
                            echo "<td>" . $row['homeadd'] . "</td>";
                            echo "<td>" . $row['services'] . "</td>";
                            echo "<td>" . $row['daycleaning'] . "</td>";
							echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No records found</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 20px;">
            <a href="admin_dashboard.php" class="btn btn-primary">Dashboard</a>
        </div>
    </div>
</body>
</html>
