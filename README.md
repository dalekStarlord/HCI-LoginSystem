# User Authentication System

A modern, minimalist PHP-based user authentication system with secure login, registration, and session management features.

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [File Structure](#file-structure)
- [Usage](#usage)
- [Security Features](#security-features)
- [Design](#design)
- [Troubleshooting](#troubleshooting)

## 🎯 Overview

This is a complete user authentication system built with PHP, MySQL, and vanilla JavaScript. It provides a clean, minimalist interface for user registration, login, and session management. The system uses prepared statements for SQL queries and password hashing for secure credential storage.

## ✨ Features

### Core Functionality
- **User Registration**: Create new accounts with username and password
- **User Login**: Secure authentication with password verification
- **Session Management**: PHP session-based user tracking
- **Logout**: Secure session termination with confirmation page
- **Welcome Page**: Protected dashboard showing user information

### User Experience
- **Minimalist Design**: Clean, modern interface with minimal styling
- **Responsive Layout**: Mobile-first design that works on all devices
- **Password Visibility Toggle**: Show/hide password functionality
- **Password Strength Indicator**: Real-time password strength feedback (register page)
- **Form Validation**: Client-side and server-side validation
- **Loading States**: Visual feedback during form submission
- **Error Handling**: User-friendly error messages

### Security
- **Password Hashing**: Uses PHP's `password_hash()` with `PASSWORD_DEFAULT`
- **Prepared Statements**: SQL injection prevention
- **XSS Protection**: Output escaping with `htmlspecialchars()`
- **Session Security**: Session validation on protected pages
- **Input Validation**: Server-side validation for all inputs

## 📦 Requirements

- **PHP**: Version 7.4 or higher
- **MySQL/MariaDB**: Version 10.0 or higher
- **Web Server**: Apache (XAMPP recommended) or Nginx
- **Browser**: Modern browser with JavaScript enabled

## 🚀 Installation

### Step 1: Clone or Download
Place all project files in your web server directory:
- **XAMPP**: `C:\xampp\htdocs\system\`
- **WAMP**: `C:\wamp64\www\system\`
- **MAMP**: `/Applications/MAMP/htdocs/system/`

### Step 2: Configure Database Connection
Edit `test.php` and update the database credentials:

```php
$host = "localhost";
$user = "root";      // Your MySQL username
$pass = "";          // Your MySQL password
$dbname = "hci";     // Your database name
```

### Step 3: Import Database
1. Open phpMyAdmin (usually at `http://localhost/phpmyadmin`)
2. Create a new database named `hci`
3. Import the `hci.sql` file or run the SQL commands manually

### Step 4: Access the Application
Navigate to: `http://localhost/system/loginForm.php`

## 🗄️ Database Setup

### Database Schema

The system uses a single table: `accounts`

```sql
CREATE TABLE `accounts` (
  `primaryKey` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`primaryKey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Import Database
You can import the database using:
1. **phpMyAdmin**: Import `hci.sql` file
2. **Command Line**: 
   ```bash
   mysql -u root -p hci < hci.sql
   ```

## 📁 File Structure

```
system/
│
├── loginForm.php      # Login page (UI)
├── login.php          # Login processing (backend)
├── registerForm.php   # Registration page (UI)
├── register.php       # Registration processing (backend)
├── welcome.php        # Protected welcome/dashboard page
├── logoutPage.php     # Logout confirmation page
├── logout.php         # Logout processing (destroys session)
├── test.php           # Database connection configuration
├── hci.sql            # Database schema and sample data
└── README.md          # This file
```

## 🔧 Usage

### User Registration Flow
1. Navigate to `registerForm.php`
2. Enter a username (minimum 3 characters)
3. Enter a password (minimum 6 characters)
4. Password strength indicator shows real-time feedback
5. Click "Register" to create account
6. Redirected to login page upon success

### User Login Flow
1. Navigate to `loginForm.php`
2. Enter username and password
3. Click "Login"
4. On success, redirected to `welcome.php`
5. On failure, error message displayed

### Logout Flow
1. From `welcome.php`, click "Logout"
2. Confirmation page (`logoutPage.php`) appears
3. Click "Confirm Logout" to end session
4. Session destroyed and redirected to login

### Protected Pages
- `welcome.php`: Requires active session
- `logoutPage.php`: Requires active session
- Unauthorized access redirects to `loginForm.php`

## 🔒 Security Features

### Password Security
- Passwords are hashed using `password_hash()` with `PASSWORD_DEFAULT`
- Uses bcrypt algorithm (default in PHP 7.0+)
- Passwords are never stored in plain text
- Password verification uses `password_verify()`

### SQL Injection Prevention
- All database queries use prepared statements
- Parameters are bound using `bind_param()`
- No direct string concatenation in SQL queries

### XSS Protection
- All user output is escaped using `htmlspecialchars()`
- Prevents malicious script injection in displayed content

### Session Security
- Sessions are validated on protected pages
- Session data is cleared on logout
- Automatic redirect to login if session invalid

### Input Validation
- Client-side validation (JavaScript)
- Server-side validation (PHP)
- Minimum length requirements enforced
- Username: 3+ characters
- Password: 6+ characters

## 🎨 Design

### Design Philosophy
The system uses a **minimalist design approach** with:
- Clean white cards on light gray background
- Simple black buttons with subtle hover effects
- System fonts for optimal readability
- Minimal shadows and borders
- Focus on content and usability

### Color Palette
- **Background**: `#f5f5f5` (Light gray)
- **Cards**: `#ffffff` (White)
- **Text**: `#1a1a1a` (Dark gray/black)
- **Secondary Text**: `#666` (Medium gray)
- **Borders**: `#ddd` (Light gray)
- **Buttons**: `#1a1a1a` (Black)
- **Error**: `#c33` (Red)
- **Success**: `#3c3` (Green)

### Responsive Design
- Mobile-first approach
- Breakpoint at 480px
- Flexible layouts
- Touch-friendly buttons (minimum 44x44px)

### Interactive Elements
- Smooth transitions on hover
- Loading spinners during form submission
- Password visibility toggle
- Real-time password strength indicator
- Form validation feedback

## 🐛 Troubleshooting

### Common Issues

#### Database Connection Error
**Problem**: "Connection failed" error
**Solution**: 
- Check `test.php` credentials
- Verify MySQL service is running
- Ensure database `hci` exists

#### Session Not Working
**Problem**: User gets logged out immediately
**Solution**:
- Check PHP session configuration
- Ensure `session_start()` is called before any output
- Verify write permissions on session directory

#### Password Not Working
**Problem**: Can't login with correct password
**Solution**:
- Verify password was hashed during registration
- Check if using `password_verify()` for comparison
- Ensure database stores hashed passwords (60+ characters)

#### Redirect Issues
**Problem**: Pages redirect incorrectly
**Solution**:
- Check file paths are correct
- Verify `header()` is called before any output
- Ensure `exit` or `die` after redirect

#### Form Not Submitting
**Problem**: Form doesn't submit or shows errors
**Solution**:
- Check JavaScript console for errors
- Verify form action paths are correct
- Ensure PHP error reporting is enabled for debugging

### Debug Mode
To enable error reporting for debugging, add at the top of PHP files:

```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

**⚠️ Warning**: Disable error reporting in production!

## 📝 Code Notes

### Important Files

#### `test.php`
- Contains database connection configuration
- Included in all backend processing files
- **Note**: Remove `echo "Connected successfully!";` in production

#### `login.php`
- Processes login form submission
- Validates credentials against database
- Creates session on successful login
- **Note**: Missing POST method check - should add `if ($_SERVER["REQUEST_METHOD"] == "POST")`

#### `register.php`
- Processes registration form
- Hashes password before storage
- Inserts new user into database
- **Note**: Should add duplicate username check

#### `logout.php`
- Destroys session data
- Redirects to logout confirmation page
- Clears all session variables

## 🔄 Future Enhancements

Potential improvements for the system:
- [ ] Email verification
- [ ] Password reset functionality
- [ ] Remember me feature
- [ ] Account profile management
- [ ] Two-factor authentication
- [ ] Rate limiting for login attempts
- [ ] CSRF token protection
- [ ] Admin panel
- [ ] User roles and permissions

## 📄 License

This project is open source and available for educational purposes.

## 👤 Author

Created as a user authentication system demonstration.

## 🤝 Contributing

Feel free to fork, modify, and use this project for your own purposes.

---

**Last Updated**: 2025
**Version**: 1.0.0

