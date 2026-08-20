<?php
// backend/auth/login_process.php
session_start();
require_once __DIR__ . '/../config/database.php';

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
        // Fetch user from database securely using prepared statements
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify user exists and check password hash
        if ($user && password_verify($password, $user['password'])) {
            
            // Regenerate Session ID to prevent session fixation attacks
            session_regenerate_id(true);

            // Set session data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'] ?? 'Reader';
            $_SESSION['username'] = $user['username'] ?? '';
            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = true;

            // Redirect to user dashboard
            header("Location: ../../frontend/dashboard.php");
            exit();

        } else {
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: ../../frontend/login.php");
            exit();
        }

    } catch (Exception $e) {
        $_SESSION['error'] = "An error occurred. Please try again later.";
        header("Location: ../../frontend/login.php");
        exit();
    }

} else {
    // Redirect direct GET access back to login page
    header("Location: ../../frontend/login.php");
    exit();
}