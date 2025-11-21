# Sign in/out system

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

- MySQL

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

