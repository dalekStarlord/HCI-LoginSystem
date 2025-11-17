<?php
include "test.php";

$message = "";

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into DB
    $sql = "INSERT INTO accounts (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        $message = "Registration successful! <a href='login.php'>Login here</a>";
        echo $message;
    } else {
        $message = "Error: Failed to register user.";
        echo $message;
    }
    echo $message;
    $stmt->close();
    $conn->close();
}
?>