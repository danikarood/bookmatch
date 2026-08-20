<?php
// Start session to manage user data
session_start();

// Include configuration
require_once '../config/database.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../frontend/admin.php');
    exit();
}

// Get form data
$name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
$role = isset($_POST['role']) ? htmlspecialchars(trim($_POST['role'])) : '';

// Validate name
if (empty($name)) {
    $_SESSION['error'] = 'Name is required.';
    header('Location: ../../frontend/admin.php');
    exit();
}

// Handle avatar upload
$avatar_path = '';
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = '../../assets/images/admin-avatars/';
    
    // Create directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    
    $file_tmp = $_FILES['avatar']['tmp_name'];
    $file_name = $_FILES['avatar']['name'];
    $file_size = $_FILES['avatar']['size'];
    $file_error = $_FILES['avatar']['error'];
    
    // Validate file size (max 5MB)
    if ($file_size > 5 * 1024 * 1024) {
        $_SESSION['error'] = 'File size must not exceed 5MB.';
        header('Location: ../../frontend/admin.php');
        exit();
    }
    
    // Validate file type
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['error'] = 'Only image files are allowed (JPG, PNG, GIF, WEBP).';
        header('Location: ../../frontend/admin.php');
        exit();
    }
    
    // Generate unique filename
    $new_file_name = 'admin_avatar_' . time() . '_' . uniqid() . '.' . $file_extension;
    $upload_path = $upload_dir . $new_file_name;
    
    // Move uploaded file
    if (move_uploaded_file($file_tmp, $upload_path)) {
        $avatar_path = '../assets/images/admin-avatars/' . $new_file_name;
    } else {
        $_SESSION['error'] = 'Failed to upload image.';
        header('Location: ../../frontend/admin.php');
        exit();
    }
}

// TODO: Update database with new admin profile information
// For now, we'll store in session (you can implement database update here)
$_SESSION['admin_profile'] = [
    'name' => $name,
    'role' => $role,
    'avatar' => !empty($avatar_path) ? $avatar_path : $_SESSION['admin_profile']['avatar'] ?? ''
];

$_SESSION['success'] = 'Admin profile updated successfully!';
header('Location: ../../frontend/admin.php');
exit();
?>
