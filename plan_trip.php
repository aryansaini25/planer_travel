<?php
session_start();
include 'database.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    
    // Example: Query the database for flights/hotels based on destination and date
    // This is a placeholder query; adapt it as needed
    $flights = $conn->query("SELECT * FROM flights WHERE destination='$destination' AND date='$date'");
    $hotels = $conn->query("SELECT * FROM hotels WHERE location='$destination'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Trip - Travel Planner</title>
    <style>
        /* Responsive CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        .results {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Plan Your Trip</h2>
        <form method="post" action="plan_trip.php">
            <input type="text" name="destination" placeholder="Destination" required>
            <input type="date" name="date" required>
            <input type="submit" value="Search">
        </form>

        <?php if (isset($flights) || isset($hotels)): ?>
            <div class="results">
                <h3>Available Flights:</h3>
                <ul>
                    <?php if ($flights->num_rows > 0): while($row = $flights->fetch_assoc()): ?>
                        <li><?php echo $row['flight_number'] . " to " . $row['destination']; ?></li>
                    <?php endwhile; else: ?>
                        <li>No flights available</li>
                    <?php endif; ?>
                </ul>

                <h3>Available Hotels:</h3>
                <ul>
                    <?php if ($hotels->num_rows > 0): while($row = $hotels->fetch_assoc()): ?>
                        <li><?php echo $row['hotel_name']; ?></li>
                    <?php endwhile; else: ?>
                        <li>No hotels available</li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
