<?php
// Start session management
session_start();

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Retrieve inputs
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

    // --- STATIC USER CREDENTIALS FOR TESTING ---
    $static_email = "danikaworx@gmail.com";
    $static_password = "123456"; // Simple plain-text check for static testing
    $static_user = [
        'id' => 1,
        'username' => 'TestUser',
        'email' => $static_email
    ];

    // Verify static credentials
    if ($email === $static_email && $password === $static_password) {
        
        // Regenerate Session ID to prevent session fixation attacks
        session_regenerate_id(true);

        // Set session data
        $_SESSION['user_id'] = $static_user['id'];
        $_SESSION['username'] = $static_user['username'];
        $_SESSION['email'] = $static_user['email'];
        $_SESSION['logged_in'] = true;

        // Redirect to user dashboard
        header("Location: ../../frontend/dashboard.php");
        exit();

    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: ../../frontend/login.php");
        exit();
    }

} else {
    // Redirect direct GET access back to login page
    header("Location: ../../frontend/login.php");
    exit();
}