<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMatch</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    
    <!-- Bootstrap and FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- External CSS -->
    <link rel="stylesheet" href="../assets/css/login.css?v=3.0">
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0 login-wrapper">
            
            <!-- Left Hero Section -->
            <div class="col-lg-6 d-none d-lg-flex login-hero">
                <div class="hero-overlay-content">
                    <h1 class="hero-title">
                        Every great<br>
                        story begins with<br>
                        <em>a single page.</em>
                    </h1>
                    <p class="hero-subtitle">
                        Find the stories that inspire you, challenge you, and stay with you long after the last page is turned.
                    </p>
                </div>
            </div>

            <!-- Right Login Card Section -->
            <div class="col-lg-6 login-panel">
                <div class="login-card">

                    <!-- Logo and Brand Header -->
                    <div class="brand-header text-center mb-2">
                        <div class="logo-icon-wrapper">
                            <img src="../assets/images/Secondary%20logo.svg" alt="BookMatch Logo" class="brand-logo-img">
                        </div>
                        <h2 class="brand-name">BookMatch</h2>
                        <div class="brand-divider">
                            <span>◇</span>
                        </div>
                    </div> 

                    <!-- Welcome Back Header -->
                    <div class="text-center mb-3">
                        <h3 class="welcome-heading">Welcome Back!</h3>
                        <p class="welcome-subtext">Sign in to continue your reading journey.</p>
                    </div>

                    <!-- Session Error Alert -->
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger py-2 px-3 mb-3 text-center" style="font-size: 0.85rem; border-radius: 8px;">
                            <?php 
                                echo htmlspecialchars($_SESSION['error']); 
                                unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <form action="../backend/auth/login_process.php" method="POST">
                        
                        <!-- Email Input Field -->
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <div class="custom-input-group">
                                <span class="input-icon"><i class="fa-regular fa-envelope"></i></span>
                                <input type="email" name="email" class="custom-input" placeholder="Enter your email" required> 
                            </div>
                        </div> 

                        <!-- Password Input Field -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="custom-input-group">
                                <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password" id="password" class="custom-input" placeholder="Enter your password" required>
                                <span class="password-toggle" onclick="togglePassword('password', this)">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </span>
                            </div>
                        </div> 

                        <!-- Checkbox & Link Row -->
                        <div class="d-flex justify-content-between align-items-center mb-3 text-options">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input custom-checkbox" id="remember_me" name="remember_me">
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                            <a href="forgot_password.php" class="forgot-link">Forgot password?</a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary-submit w-100">
                            Sign In <i class="fa-solid fa-arrow-right ms-2"></i>
                        </button>

                        <!-- OR Divider -->
                        <div class="divider-or">
                            <span>or</span>
                        </div>

                        <!-- Google Social Sign-In -->
                        <button type="button" class="btn btn-google-social w-100">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google Logo" width="18">
                            Continue with Google
                        </button>

                        <!-- Register Redirect -->
                        <p class="text-center footer-account-text">
                            Don't have an account? <a href="signup.php" class="create-account-link">Create account</a>
                        </p>
                    </form>
                </div>
            </div>

        </div> <!-- End .login-wrapper row -->
    </div>

    <!-- Bootstrap JS & External Custom JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js?v=1.0"></script>
</body>
</html>