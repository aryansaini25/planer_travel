<?php
session_start();
include 'database.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
}

$email = $_SESSION['email'];

// Fetch user's planned and booked trips
$sql = "SELECT * FROM bookings WHERE user_email='$email'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Travel Planner</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Your Profile</h2>
        <h3>Planned and Booked Trips:</h3>
        <table>
            <tr>
                <th>Flight ID</th>
                <th>Hotel ID</th>
            </tr>
            <?php if ($result->num_rows > 0): while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['flight_id']; ?></td>
                    <td><?php echo $row['hotel_id']; ?></td>
                </tr>
            <?php endwhile; else: ?>
                <tr>
                    <td colspan="2">No trips booked yet.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
