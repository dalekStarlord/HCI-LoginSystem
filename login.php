

<?php
session_start();
include "test.php";

$message = "";

// If form submitted


    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;
    echo $password;
    //SQL
    $sql = "SELECT * FROM accounts WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Check password
        if (password_verify($password, $user['password'])) {

            // Login success
            $_SESSION['username'] = $user['username'];
            header("Location: welcome.php");
            exit;

        } else {
            $message = "Incorrect password!";
            echo $message;
        }
    } else {
        $message = "User not found!";
        echo $message;
    }
    $stmt->close();
    $conn->close();

?>