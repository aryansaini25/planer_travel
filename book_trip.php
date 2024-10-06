<?php
session_start();
include 'database.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flight_id = $_POST['flight_id'];
    $hotel_id = $_POST['hotel_id'];
    $user_email = $_SESSION['email'];

    // Save booking to database
    $sql = "INSERT INTO bookings (user_email, flight_id, hotel_id) VALUES ('$user_email', '$flight_id', '$hotel_id')";
    
    if ($conn->query($sql) === TRUE) {
        $success = "Trip booked successfully!";
    } else {
        $error = "Error booking trip: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Trip - Travel Planner</title>
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
        select {
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Book Your Trip</h2>
        <?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post" action="book_trip.php">
            <select name="flight_id" required>
                <option value="">Select Flight</option>
                <!-- Populate flights here -->
            </select>
            <select name="hotel_id" required>
                <option value="">Select Hotel</option>
                <!-- Populate hotels here -->
            </select>
            <input type="submit" value="Book Trip">
        </form>
    </div>
</body>
</html>
