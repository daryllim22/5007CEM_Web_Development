<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $service = $_POST['service'];

    // TODO: Process the booking (e.g., save to database, send confirmation email, etc.)

    // Display confirmation message
    echo "<h2>Booking Confirmed</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone Number: $phone</p>";
    echo "<p>Date: $date</p>";
    echo "<p>Time: $time</p>";
    echo "<p>Service: $service</p>";

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $database = "sport_facility";

    // Create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO booking (name, email, phone, date, time, service) VALUES ('$name', '$email', '$phone', '$date', '$time', '$service')";

    // Execute the query
    if ($conn->query($sql) === true) {
        echo "Booking data inserted successfully.";
    } else {
        echo "Error inserting booking data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the booking page if accessed directly without form submission
    header('Location: booking_page.php');
    exit;
}
?>
