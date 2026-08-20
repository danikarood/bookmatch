<?php
// backend/signup_process.php

session_start();
require_once __DIR__ . '/../backend/config/database.php'; // Adjust path if your config file is located elsewhere

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // 1. Sanitize & collect input data
    $firstName       = htmlspecialchars(trim($_POST['first_name'] ?? ''));
    $lastName        = htmlspecialchars(trim($_POST['last_name'] ?? ''));
    $email           = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password        = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $readingGoal     = htmlspecialchars(trim($_POST['reading_goal'] ?? ''));
    
    // Handle genres checkbox array
    $genres = isset($_POST['genres']) && is_array($_POST['genres']) ? $_POST['genres'] : [];
    $genresJson = json_encode($genres);

    // 2. Form Validations
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        die("Please fill in all required fields.");
    }

    if ($password !== $confirmPassword) {
        die("Passwords do not match. Please go back and try again.");
    }

    // Check if email already exists
    $stmtCheck = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmtCheck->execute([$email]);
    if ($stmtCheck->fetch()) {
        die("An account with this email already exists. Please sign in instead.");
    }

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // 3. Insert User into Database
        $sql = "INSERT INTO users (first_name, last_name, email, password, genres, reading_goal, created_at) 
                VALUES (:first_name, :last_name, :email, :password, :genres, :reading_goal, NOW())";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':first_name'   => $firstName,
            ':last_name'    => $lastName,
            ':email'        => $email,
            ':password'     => $hashedPassword,
            ':genres'       => $genresJson,
            ':reading_goal' => $readingGoal
        ]);

        // Get the newly created user's ID
        $userId = $pdo->lastInsertId();

        // Automatically log the user in by setting session variables
        $_SESSION['user_id'] = $userId;
        $_SESSION['first_name'] = $firstName;

        // Redirect to dashboard on success
        header("Location: ../frontend/dashboard.php");
        exit();

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }

} else {
    // Redirect direct page visits back to the signup page
    header("Location: ../frontend/signup.php");
    exit();
}