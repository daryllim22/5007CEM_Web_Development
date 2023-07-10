<?php
session_start();
if(isset($_SESSION["user"])) {
    /*header("Location: booking_page.php");*/
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resgistration</title>
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
    <div class="container" align="center">
        <br>
        <form action="register_code.php" method="post">
            <label for="name">Userame:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="repeat_password">Repeat Password:</label>
            <input type="password" id="repeat_password" name="repeat_password" required><br><br>
            <input type="submit" name="submit">
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>

       
        
    </div>

