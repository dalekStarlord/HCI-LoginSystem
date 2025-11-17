<?php
session_start();

// Check if user is logged in before showing logout page
if (!isset($_SESSION['username'])) {
    header("Location: loginForm.php");
    exit;
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
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

        .button-group {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #1a1a1a;
            color: white;
        }

        .btn-primary:hover {
            background: #333;
        }

        .btn-primary:active {
            background: #000;
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #1a1a1a;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .spinner {
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            margin-left: 8px;
            vertical-align: middle;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 480px) {
            .container {
                padding: 32px 24px;
            }

            h1 {
                font-size: 24px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Goodbye, <span class="username"><?php echo $username; ?></span></h1>
        <p class="message">Are you sure you want to logout?</p>
        
        <div class="button-group">
            <a href="logout.php" class="btn btn-primary" id="logoutBtn">
                Confirm Logout
                <span class="spinner" id="logoutSpinner" style="display: none;"></span>
            </a>
            <a href="welcome.php" class="btn btn-secondary">Cancel</a>
        </div>
    </div>

    <script>
        const logoutBtn = document.getElementById('logoutBtn');
        const logoutSpinner = document.getElementById('logoutSpinner');

        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            logoutSpinner.style.display = 'inline-block';
            logoutBtn.style.pointerEvents = 'none';
            
            setTimeout(() => {
                window.location.href = 'logout.php';
            }, 300);
        });
    </script>
</body>
</html>
