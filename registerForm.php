<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            max-width: 400px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 32px;
            font-size: 24px;
            font-weight: 500;
            letter-spacing: -0.5px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 14px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            padding-right: 40px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.2s;
            background: white;
            color: #1a1a1a;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #1a1a1a;
        }

        .input-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #999;
            font-size: 16px;
            padding: 4px;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #1a1a1a;
        }

        .password-strength {
            margin-top: 8px;
            height: 3px;
            background: #e0e0e0;
            border-radius: 2px;
            overflow: hidden;
            display: none;
        }

        .password-strength.show {
            display: block;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s;
            border-radius: 2px;
        }

        .password-strength-bar.weak {
            width: 33%;
            background: #e74c3c;
        }

        .password-strength-bar.medium {
            width: 66%;
            background: #f39c12;
        }

        .password-strength-bar.strong {
            width: 100%;
            background: #27ae60;
        }

        .password-hint {
            font-size: 12px;
            color: #999;
            margin-top: 6px;
            display: none;
        }

        .password-hint.show {
            display: block;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: #1a1a1a;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 8px;
            position: relative;
        }

        .submit-btn:hover {
            background: #333;
        }

        .submit-btn:active {
            background: #000;
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .submit-btn .spinner {
            display: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .submit-btn.loading .btn-text {
            opacity: 0;
        }

        .submit-btn.loading .spinner {
            display: block;
        }

        .link-text {
            text-align: center;
            margin-top: 24px;
            color: #666;
            font-size: 14px;
        }

        .link-text a {
            color: #1a1a1a;
            text-decoration: none;
            font-weight: 500;
        }

        .link-text a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 3px solid #c33;
            display: none;
        }

        .success-message {
            background: #efe;
            color: #3c3;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 3px solid #3c3;
            display: none;
        }

        .error-message.show,
        .success-message.show {
            display: block;
        }

        @media (max-width: 480px) {
            .container {
                padding: 32px 24px;
            }

            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Account</h2>
        <div class="error-message" id="errorMessage"></div>
        <div class="success-message" id="successMessage"></div>
        <form method="POST" action="register.php" id="registerForm">
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-wrapper">
                    <input type="text" id="username" name="username" required autocomplete="username" placeholder="Choose username" minlength="3">
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Create password" minlength="6">
                    <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">👁️</button>
                </div>
                <div class="password-strength" id="passwordStrength">
                    <div class="password-strength-bar" id="passwordStrengthBar"></div>
                </div>
                <div class="password-hint" id="passwordHint">Password must be at least 6 characters</div>
            </div>

            <button type="submit" class="submit-btn" id="submitBtn">
                <span class="btn-text">Register</span>
                <span class="spinner"></span>
            </button>
        </form>

        <div class="link-text">
            Already have an account? <a href="loginForm.php">Login</a>
        </div>
    </div>

    <script>
        const passwordToggle = document.getElementById('passwordToggle');
        const passwordInput = document.getElementById('password');
        
        passwordToggle.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            passwordToggle.textContent = type === 'password' ? '👁️' : '🙈';
        });

        const passwordStrength = document.getElementById('passwordStrength');
        const passwordStrengthBar = document.getElementById('passwordStrengthBar');
        const passwordHint = document.getElementById('passwordHint');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            
            if (password.length > 0) {
                passwordStrength.classList.add('show');
                passwordHint.classList.add('show');
                
                let strength = 'weak';
                if (password.length >= 8 && /[A-Z]/.test(password) && /[0-9]/.test(password)) {
                    strength = 'strong';
                } else if (password.length >= 6) {
                    strength = 'medium';
                }
                
                passwordStrengthBar.className = 'password-strength-bar ' + strength;
            } else {
                passwordStrength.classList.remove('show');
                passwordHint.classList.remove('show');
            }
        });

        const registerForm = document.getElementById('registerForm');
        const submitBtn = document.getElementById('submitBtn');
        const errorMessage = document.getElementById('errorMessage');
        const successMessage = document.getElementById('successMessage');

        registerForm.addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;

            if (!username || !password) {
                e.preventDefault();
                showError('Please fill in all fields');
                return;
            }

            if (username.length < 3) {
                e.preventDefault();
                showError('Username must be at least 3 characters');
                return;
            }

            if (password.length < 6) {
                e.preventDefault();
                showError('Password must be at least 6 characters');
                return;
            }

            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
        });

        function showError(message) {
            errorMessage.textContent = message;
            errorMessage.classList.add('show');
            successMessage.classList.remove('show');
            setTimeout(() => {
                errorMessage.classList.remove('show');
            }, 5000);
        }

        function showSuccess(message) {
            successMessage.innerHTML = message;
            successMessage.classList.add('show');
            errorMessage.classList.remove('show');
        }

        const usernameInput = document.getElementById('username');
        usernameInput.addEventListener('blur', function() {
            const username = this.value.trim();
            if (username.length > 0 && username.length < 3) {
                showError('Username must be at least 3 characters');
            }
        });

        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('error')) {
            showError(urlParams.get('error'));
        }
        if (urlParams.get('success')) {
            showSuccess(urlParams.get('success'));
        }
    </script>
</body>
</html>
