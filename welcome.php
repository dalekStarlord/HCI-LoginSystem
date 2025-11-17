<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: loginForm.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 8px;
            padding: 48px 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        h1 {
            color: #1a1a1a;
            margin-bottom: 12px;
            font-size: 28px;
            font-weight: 500;
            letter-spacing: -0.5px;
        }

        .username {
            color: #1a1a1a;
            font-weight: 600;
        }

        .message {
            color: #666;
            font-size: 15px;
            margin-bottom: 32px;
            line-height: 1.6;
        }

        .user-info {
            background: #f9f9f9;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 32px;
            text-align: left;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #666;
            font-size: 14px;
        }

        .info-value {
            color: #1a1a1a;
            font-weight: 500;
            font-size: 14px;
        }

        .status-active {
            color: #27ae60;
        }

        .logout-btn {
            display: inline-block;
            padding: 12px 32px;
            background: #1a1a1a;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            transition: background 0.2s;
        }

        .logout-btn:hover {
            background: #333;
        }

        .logout-btn:active {
            background: #000;
        }

        @media (max-width: 480px) {
            .container {
                padding: 32px 24px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span></h1>
        <p class="message">You have successfully logged in to your account.</p>
        
        <div class="user-info">
            <div class="info-item">
                <span class="info-label">Username</span>
                <span class="info-value"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Status</span>
                <span class="info-value status-active">Active</span>
            </div>
        </div>

        <a href="logoutPage.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
