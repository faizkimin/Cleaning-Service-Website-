<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        .dashboard-links {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .dashboard-links a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 15px 30px;
            border-radius: 5px;
            margin: 0 10px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .dashboard-links a:hover {
            background-color: #0056b3;
        }

        .logout-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Admin!</h1>
        <div class="dashboard-links">
            <a href="view_record.php">View Booking Records</a>
            <a href="managebookings.php">Manage Bookings</a>
			<a href="searchrecord.php">Search Bookings</a>
            <!-- Add more links/buttons for other administrative functions -->
        </div>
        <!-- Include dynamic content here, such as statistics or recent bookings -->
        <form action="admin_login.html" method="post">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>
