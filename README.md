# Simple PHP User Registration and Login System

This project is a functional, educational example of a user authentication system built with **PHP** and **MySQL**. It provides the core functionality for user registration, login, and session management using browser cookies. The front end is styled with the **Bootstrap 5** framework for a clean and responsive interface.

## About The Project

This project is designed for beginners learning back-end web development with PHP. It demonstrates a complete, albeit simple, workflow for handling user accounts, from creating a new account to logging in and out. The application conditionally displays different content based on whether the user is logged in or not.

### Key Concepts and Features

*   **User Registration**: A form that collects a new user's login, email, and password, validates the input, and stores it in a MySQL database.
*   **User Login (Authorization)**: A form that validates a user's credentials against the database records.
*   **Session Management with Cookies**: Upon successful login, a `user` cookie is set in the browser to keep the user logged in across page visits.
*   **Logout Functionality**: A script that destroys the user's cookie to end their session.
*   **Dynamic UI**: The main page (`index.php`) uses PHP to check for the existence of the `user` cookie and conditionally shows either the login/registration forms or a personalized welcome message.
*   **Database Interaction**: Demonstrates how to connect to a MySQL database using the `MySQLi` extension, perform `INSERT` queries for registration, and `SELECT` queries for login validation.

## Project Structure

The application is composed of several PHP files, each with a specific role:

*   **`index.php`**: The main entry point and user interface. It displays the registration/login forms or the logged-in user's view.
*   **`check.php`**: The registration handler. It receives data from the registration form, performs basic validation, hashes the password, and inserts the new user into the database.
*   **`autho.php`**: The login handler. It receives data from the login form, queries the database for a matching user, and sets a session cookie upon success.
*   **`exit.php`**: The logout script. It simply expires the user's session cookie.

## Setup and Installation

To run this project, you need a local server environment with PHP and MySQL (e.g., XAMPP, WAMP, MAMP).

### 1. Database Setup

Before running the application, you must set up the database.

*   **Create the Database**: Connect to your MySQL server (e.g., via phpMyAdmin) and create a new database named `register-form`.

*   **Create the `users` Table**: Run the following SQL query to create the necessary table:
    ```sql
    CREATE TABLE `register-form`.`users` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `login` VARCHAR(100) NOT NULL,
        `email` VARCHAR(50) NOT NULL,
        `password` VARCHAR(32) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;
    ```

### 2. Configuration

*   The database connection settings (`localhost`, `root`, ``, `register-form`) are hardcoded in `check.php` and `autho.php`. If your MySQL setup uses a password for the `root` user or different credentials, you will need to update these files.

### 3. Running the Application

1.  Place all the project files (`index.php`, `check.php`, etc.) in a folder inside your web server's root directory (e.g., `C:/xampp/htdocs/my-login-app/`).
2.  Start your Apache and MySQL services.
3.  Open your web browser and navigate to `http://localhost/my-login-app/`.

---

## ‼️ Important Security Warnings ‼️

This project is intended for **educational purposes only**. The code contains several **critical security vulnerabilities** and should **NEVER** be used in a production environment.

1.  **Insecure Password Hashing**:
    *   **Vulnerability**: The code uses `md5()`, which is an outdated and cryptographically broken hashing algorithm. It is extremely vulnerable to rainbow table attacks and collisions.
    *   **Recommendation**: **Always** use modern PHP password hashing functions like `password_hash()` to create hashes and `password_verify()` to check them.

2.  **SQL Injection**:
    *   **Vulnerability**: User input (`$login`, `$password`) is inserted directly into SQL queries. An attacker could manipulate this input to execute malicious SQL commands, potentially destroying or stealing all your data.
    *   **Recommendation**: **Always** use **prepared statements** with `MySQLi` or `PDO` to safely handle user data. This separates the SQL command from the data, preventing injection attacks.

3.  **No Cross-Site Scripting (XSS) Protection**:
    *   **Vulnerability**: The line `<p>Привет <?=$_COOKIE['user']?>.` prints the content of the cookie directly to the HTML page. If an attacker could manipulate the cookie's value to include malicious JavaScript, it would execute in the user's browser.
    *   **Recommendation**: **Always** sanitize user-provided data before displaying it by using `htmlspecialchars()`. For example: `<?=htmlspecialchars($_COOKIE['user'])?>`.
```
