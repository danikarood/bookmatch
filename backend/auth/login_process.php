<?php
// Start session management
session_start();

// Include database connection (adjust path if needed)
require_once '../config/database.php';

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Retrieve and sanitize inputs
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $remember_me = isset($_POST['remember_me']);

    // Basic Input Validation
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Please fill in all required fields.";
        header("Location: ../../frontend/login.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Please provide a valid email address.";
        header("Location: ../../frontend/login.php");
        exit();
    }

    try {
        // Prepare SQL query to find user by email
        $stmt = $pdo->prepare("SELECT id, username, email, password FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            
            // Regenerate Session ID to prevent session fixation attacks
            session_regenerate_id(true);

            // Set session data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = true;

            // Handle "Remember Me" Cookie functionality
            if ($remember_me) {
                // Generate secure random token
                $rememberToken = bin2hex(random_bytes(32));
                
                // Store token hash in database (Optional enhancement)
                $tokenHash = hash('sha256', $rememberToken);
                $updateStmt = $pdo->prepare("UPDATE users SET remember_token = :token WHERE id = :id");
                $updateStmt->execute([':token' => $tokenHash, ':id' => $user['id']]);

                // Set cookie for 30 days
                setcookie('remember_token', $rememberToken, [
                    'expires' => time() + (86400 * 30),
                    'path' => '/',
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);
            }

            // Redirect to user dashboard / home page
            header("Location: ../../frontend/dashboard.php");
            exit();

        } else {
            // Generic error message for security (don't specify if email or password was wrong)
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: ../../frontend/login.php");
            exit();
        }

    } catch (PDOException $e) {
        // Log error and display user-friendly message
        error_log("Login Error: " . $e->getMessage());
        $_SESSION['error'] = "An unexpected error occurred. Please try again later.";
        header("Location: ../../frontend/login.php");
        exit();
    }

} else {
    // Redirect direct GET access back to login page
    header("Location: ../../frontend/login.php");
    exit();
}