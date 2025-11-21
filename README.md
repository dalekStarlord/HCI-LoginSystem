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

"""
# [PROJECT_NAME]

## Project Overview

Short description:

This project is a lightweight user authentication prototype implemented in PHP with a simple front-end. It demonstrates registration, login, session management, and basic client-side features such as password visibility toggles and strength indicators.

Main goals / Use case:

- Provide a minimal, easy-to-understand authentication flow suitable for learning and small projects.
- Serve as a starting template for integrating authentication into PHP-based applications.
- Demonstrate secure practices (password hashing, prepared statements) in a compact codebase.

## Team Roles

- [TEAM_MEMBER_1_NAME] – [PROJECT MANAGER]
- [TEAM_MEMBER_2_NAME] – [BACKEND DEVELOPER]
- [TEAM_MEMBER_3_NAME] – [FRONTEND DEVELOPER]
- [TEAM_MEMBER_4_NAME] – [QA / TESTER]

## Technology Stack

### Frontend

- HTML, CSS, JavaScript (vanilla)

### Backend

- PHP (compatible with PHP 7.4+)

### Database

- MySQL / MariaDB

### Tools & Others

- Git, XAMPP (or any PHP + MySQL stack), phpMyAdmin, Browser DevTools

## Requirements / Prerequisites

- PHP 7.4 or higher
- MySQL or MariaDB server
- Web server (Apache recommended when using XAMPP/WAMP/MAMP)
- A modern web browser with JavaScript enabled

Environment variables / config files:

- Database config is in `test.php` (update host, username, password, database name as needed).

## How to Run / Compile the Prototype Locally

1. Clone or download the repository and place it in your webserver folder (examples):

```bash
# For XAMPP on Windows
# Copy project to:
C:\xampp\htdocs\system\

# Or clone directly into the folder (example):
cd C:\xampp\htdocs
git clone <repository-url>
```

2. Configure the database connection in `test.php` (update credentials):

```php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'hci';
```

3. Create the database and import the schema (using phpMyAdmin or CLI):

Using phpMyAdmin:

- Open `http://localhost/phpmyadmin`
- Create a new database named `hci`
- Import `hci.sql`

4. Start your web server (if using XAMPP, start Apache & MySQL), then open the app in your browser:

```
http://localhost/system/loginForm.php
```

## Usage Instructions

- Access the app at `http://localhost/system/loginForm.php` (default local setup).
- Register a new account via `registerForm.php`.
- After registration, log in using the created credentials.

Default test credentials (placeholder):

- Username: `Hatdog123`
- Password: `password123`

## Project Structure

Key files and folders:

- `loginForm.php` — Login page (frontend)
- `login.php` — Login processing (backend)
- `registerForm.php` — Registration page (frontend)
- `register.php` — Registration processing (backend)
- `welcome.php` — Protected welcome/dashboard page
- `logout.php` / `logoutPage.php` — Logout processing and confirmation
- `test.php` — Simple database connection config used by backend scripts
- `hci.sql` — Database schema and sample data
- `README.md` — This file


## Troubleshooting

- If you see database connection errors: check `test.php` credentials and ensure MySQL is running.
- If pages redirect unexpectedly: confirm `session_start()` usage and file paths.

## Contributing

Feel free to fork and submit pull requests. Use the placeholders above when assigning roles.

---

**Last Updated**: 2025

"""

