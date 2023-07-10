<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="header">
    <h1>Lim's Sports Complex</h1>
</div>
      
<div class="navbar">
    <a href="booking_page.html">Bookings</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
    <a href="login.php">Login</a>
</div>
<center>
    <h2>Login</h2>
    <form method="POST" action="booking_page.php">
        <label for="name">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
        <input type="button" value="Register" onclick="location.href='register.php'">
    </form>
</center>

<?php
if (isset($_POST['login'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sport_facility"; // Replace with your actual database name

    // Create a database connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL query using prepared statements
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");

    // Bind the username parameter
    mysqli_stmt_bind_param($stmt, "s", $username);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the user data
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Check if the user exists
    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            exit();
        } else {
            echo "<div class='alert alert-danger'>Username or password is incorrect.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Username or password is incorrect.</div>";
    }

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
</body>
</html>
