<?php
// backend/signup-process.php

session_start();

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
    $genresJson = json_encode($genres); // Recommended: Store as JSON array string in DB

    // 2. Form Validations
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        die("Please fill in all required fields.");
    }

    if ($password !== $confirmPassword) {
        die("Passwords do not match. Please go back and try again.");
    }

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    /*
    --------------------------------------------------------------------------
    3. MySQL Database Integration (Uncomment when database config is ready)
    --------------------------------------------------------------------------
    
    $dbHost = 'localhost';
    $dbName = 'bookmatch';
    $dbUser = 'root';
    $dbPass = ''; // Default XAMPP password is empty

    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

        // Redirect to dashboard on success
        header("Location: ../frontend/dashboard.php");
        exit();

    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
    */

    // temporary response output until database is connected
    echo "<h2>Account Registration Captured!</h2>";
    echo "<p><strong>Name:</strong> " . $firstName . " " . $lastName . "</p>";
    echo "<p><strong>Email:</strong> " . $email . "</p>";
    echo "<p><strong>Selected Genres:</strong> " . implode(", ", $genres) . "</p>";
    echo "<p><strong>Reading Goal:</strong> " . $readingGoal . "</p>";
    echo "<br><a href='../frontend/signup.php'>Back to Signup</a>";

} else {
    // Redirect direct page visits back to the signup page
    header("Location: ../frontend/signup.php");
    exit();
}