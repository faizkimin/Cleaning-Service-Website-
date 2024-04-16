<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
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

        .back-btn {
            text-align: center;
            margin-bottom: 20px;
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

        .booking-card {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .booking-card h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .booking-actions {
            text-align: center;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .btn-update {
            background-color: #28a745;
        }

        .btn-update:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Bookings</h1>

        <div class="back-btn">
            <a href="admin_dashboard.php">Dashboard</a>
        </div>

        <?php
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
        $sql = "SELECT * FROM cleaningbooking";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <form class="booking-card" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <h2>Booking #<?php echo $row['idbooking']; ?></h2>
                    <input type="hidden" name="idbooking" value="<?php echo $row['idbooking']; ?>">
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phonenum">Phone:</label>
                        <input type="text" id="phonenum" name="phonenum" value="<?php echo $row['phonenum']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="icnum">IC Number:</label>
                        <input type="text" id="icnum" name="icnum" value="<?php echo $row['icnum']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="homeadd">Address:</label>
                        <input type="text" id="homeadd" name="homeadd" value="<?php echo $row['homeadd']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="services">Service:</label>
                        <input type="text" id="services" name="services" value="<?php echo $row['services']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="daycleaning">Date:</label>
                        <input type="text" id="daycleaning" name="daycleaning" value="<?php echo $row['daycleaning']; ?>" required>
					</div>
                    <div class="form-group">
                        <label for="status">Status Cleaning:</label>
                        <select id="status_<?php echo $row['idbooking']; ?>" name="status" required>
							<option selected>Select Status</option>
							<option value="pending" <?php if($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
							<option value="ongoing" <?php if($row['status'] == 'ongoing') echo 'selected'; ?>>Ongoing</option>
							<option value="done" <?php if($row['status'] == 'done') echo 'selected'; ?>>Done</option>
						</select>

                    </div>
                    <div class="booking-actions">
                        <button class="btn-update" type="button" onclick="updateStatus(<?php echo $row['idbooking']; ?>)">Update</button>
                        <button class="btn-delete" onclick="deleteBooking(<?php echo $row['idbooking']; ?>)">Delete</button>
                    </div>
                </form>
        <?php
            }
        } else {
            echo "<p>No bookings found.</p>";
        }
        ?>
        <script>
            function updateStatus(id) {
    var statusSelect = document.getElementById("status_" + id); // Append the booking ID
    var status = statusSelect.options[statusSelect.selectedIndex].value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Status updated successfully.");
        }
    };
    xhr.send("id=" + id + "&status=" + status);
}



            function deleteBooking(id) {
                var confirmation = confirm("Are you sure you want to delete this booking?");
                if (confirmation) {
                    // Redirect to delete_booking.php or perform AJAX delete request
                    window.location = "delete_booking.php?id=" + id;
                }
            }
        </script>
    </div>
</body>
</html>
