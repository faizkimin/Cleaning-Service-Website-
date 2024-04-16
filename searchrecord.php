<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Booking Records</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 10px;
            width: 70%;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-right: 10px;
        }

        .search-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-btn:hover {
            background-color: #0056b3;
        }

        .search-results {
            text-align: center;
            overflow-x: auto;
        }

        .search-results table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .search-results th, .search-results td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .search-results th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .search-results tr:hover {
            background-color: #f9f9f9;
        }

        .no-records {
            margin-top: 20px;
            color: #555;
        }

        .back-btn {
            text-align: center;
            margin-top: 20px;
        }

        .back-btn a {
            display: inline-block;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-btn a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Booking Records</h1>
        <form class="search-form" action="#" method="post">
            <input type="text" class="search-input" name="search" placeholder="Enter Booking ID or Customer Name" value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
            <button type="submit" class="search-btn">Search</button>
        </form>
        
        <div class="search-results">
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

            // Fetch records from the database if form submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $search_query = $_POST['search'];
                $sql = "SELECT * FROM cleaningbooking WHERE idbooking = '$search_query' OR firstname LIKE '%$search_query%' OR lastname LIKE '%$search_query%'";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Booking ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>IC Number</th><th>Address</th><th>Services</th><th>Date</th></tr>";
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
                    echo "</table>";
                } else {
                    echo "<p class='no-records'>No records found.</p>";
                }
            }

            // Close connection
            $conn->close();
            ?>
        </div>

        <div class="back-btn">
            <a href="admin_dashboard.php">Dashboard</a>
        </div>
    </div>
</body>
</html>
