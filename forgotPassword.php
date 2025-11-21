<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif; background:#f5f5f5; display:flex; align-items:center; justify-content:center; min-height:100vh; margin:0; }
        .card { background:#fff; padding:35px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.08); width:100%; max-width:420px; }
        h2 { margin:0 0 16px 0; font-size:20px; color:#1a1a1a; }
        .hint { font-size:14px; color:#666; margin-bottom:12px; }
        .input { width:100%; padding:10px 12px; border:1px solid #ddd; border-radius:6px; margin-bottom:12px; }
        .btn { background:#1a1a1a; color:#fff; padding:10px 12px; border-radius:6px; border:none; cursor:pointer; }
        .link { display:block; margin-top:12px; color:#1a1a1a; text-decoration:none; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Forgot Password</h2>
        <p class="hint">Enter your username or email.</p>
        <form method="POST" action="#">
            <input class="input" type="text" name="identifier" placeholder="Username or email" required>
            <button class="btn" type="submit">Request Reset</button>
        </form>
        <a class="link" href="loginForm.php">Back to login</a>
    </div>
</body>
</html>
