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
        $stmt->close();
        $conn->close();
        header("Location: loginForm.php?success=" . urlencode("Registration successful! Please login."));
        exit;
    } else {
        $stmt->close();
        $conn->close();
        header("Location: registerForm.php?error=" . urlencode("Error: Failed to register user."));
        exit;
    }
}
?>