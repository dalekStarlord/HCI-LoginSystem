<?php
$host = "localhost";
$user = "root";      // default XAMPP username
$pass = "";          // default XAMPP password (empty)
$dbname = "hci";    // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?>