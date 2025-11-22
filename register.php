<?php
include "test.php";

$message = "";

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username already exists
    $sqlSelect = "SELECT username FROM accounts WHERE username = ?";
    $selectStmt = $conn->prepare($sqlSelect);
    $selectStmt->bind_param("s", $username);
    $selectStmt->execute();
    $selectResult = $selectStmt->get_result();

    if ($selectResult->num_rows > 0) {
        // Username exists
        header("Location: registerForm.php?error=" . urlencode("Username already exists. Please choose another."));
        exit;
    }

    // If not exists → insert new account
    $sqlInsert = "INSERT INTO accounts (username, password) VALUES (?, ?)";
    $insertStmt = $conn->prepare($sqlInsert);
    $insertStmt->bind_param("ss", $username, $hashed_password);

    if ($insertStmt->execute()) {
        header("Location: loginForm.php?success=" . urlencode("Registration successful! Please login."));
        exit;
    } else {
        header("Location: registerForm.php?error=" . urlencode("Error: Failed to register user."));
        exit;
    }
}
?>
