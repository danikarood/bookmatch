<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMatch - Create Your Account</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="../assets/images/Title%20logo.svg">
    
    <!-- External Frameworks & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/signup.css">
</head>
<body class="signup-page">

<div class="signup-wrapper">
    <div class="container-fluid p-0">
        <div class="row g-0 split-layout">
            
            <!-- Left Side: Hero Column -->
            <div class="col-lg-5 d-none d-lg-flex hero-section">
                <div class="hero-content">
                    <div class="brand-header">
                        <span class="brand-title">BookMatch</span>
                        <div class="ornament-divider">
                            <span class="diamond">◆</span>
                        </div>
                    </div>

                    <div class="hero-text-content">
                        <h1>Your Next<br>Favourite<br><em class="highlight-text">Story</em> Awaits.</h1>
                        <p>Join a community that celebrates great stories and helps you discover books you'll love.</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Expanded Form Panel -->
            <div class="col-lg-7 form-panel">
                <div class="form-card">
                    <h2>Create Your Account</h2>
                    <div class="ornament-divider center-ornament">
                        <span class="diamond">◆</span>
                    </div>
                    
                    <form action="../backend/auth/signup_process.php" method="POST">
                        
                        <!-- First & Last Name Row -->
                        <div class="row g-2 mb-2">
                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <div class="input-wrapper">
                                    <i class="fa-regular fa-user input-icon"></i>
                                    <input type="text" name="first_name" class="custom-input" placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <div class="input-wrapper">
                                    <i class="fa-regular fa-user input-icon"></i>
                                    <input type="text" name="last_name" class="custom-input" placeholder="Enter your last name" required>
                                </div>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <div class="input-wrapper">
                                <i class="fa-regular fa-envelope input-icon"></i>
                                <input type="email" name="email" class="custom-input" placeholder="Enter your email address" required>
                            </div>
                        </div>

                        <!-- Passwords Row (Side-by-side on wide screens to save vertical height) -->
                        <div class="row g-2 mb-2">
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-lock input-icon"></i>
                                    <input type="password" name="password" id="password" class="custom-input" placeholder="Create a password" required>
                                    <button type="button" class="password-toggle-btn" onclick="togglePassword('password', this)" aria-label="Toggle password visibility">
                                        <i class="fa-regular fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-lock input-icon"></i>
                                    <input type="password" name="confirm_password" id="confirm_password" class="custom-input" placeholder="Confirm your password" required>
                                    <button type="button" class="password-toggle-btn" onclick="togglePassword('confirm_password', this)" aria-label="Toggle password visibility">
                                        <i class="fa-regular fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Favourite Genres -->
                        <div class="mb-2">
                            <label class="form-label">Favourite Genres</label>
                            <div class="genre-grid">
                                <input type="checkbox" class="btn-check" id="genre_fantasy" name="genres[]" value="Fantasy">
                                <label class="genre-chip" for="genre_fantasy"><i class="fa-solid fa-wand-magic-sparkles"></i> Fantasy</label>
                                
                                <input type="checkbox" class="btn-check" id="genre_romance" name="genres[]" value="Romance">
                                <label class="genre-chip" for="genre_romance"><i class="fa-regular fa-heart"></i> Romance</label>
                                
                                <input type="checkbox" class="btn-check" id="genre_mystery" name="genres[]" value="Mystery">
                                <label class="genre-chip" for="genre_mystery"><i class="fa-solid fa-magnifying-glass"></i> Mystery</label>

                                <input type="checkbox" class="btn-check" id="genre_historical" name="genres[]" value="Historical Fiction">
                                <label class="genre-chip" for="genre_historical"><i class="fa-solid fa-landmark"></i> Historical Fiction</label>

                                <input type="checkbox" class="btn-check" id="genre_scifi" name="genres[]" value="Science Fiction">
                                <label class="genre-chip" for="genre_scifi"><i class="fa-solid fa-globe"></i> Science Fiction</label>

                                <input type="checkbox" class="btn-check" id="genre_thriller" name="genres[]" value="Thriller">
                                <label class="genre-chip" for="genre_thriller"><i class="fa-solid fa-feather"></i> Thriller</label>

                                <input type="checkbox" class="btn-check" id="genre_contemporary" name="genres[]" value="Contemporary">
                                <label class="genre-chip" for="genre_contemporary"><i class="fa-solid fa-mug-hot"></i> Contemporary</label>

                                <input type="checkbox" class="btn-check" id="genre_nonfiction" name="genres[]" value="Non-Fiction">
                                <label class="genre-chip" for="genre_nonfiction"><i class="fa-solid fa-leaf"></i> Non-Fiction</label>
                            </div>
                        </div>

                        <!-- Reading Goal Select -->
                        <div class="mb-3">
                            <label class="form-label">Reading Goal</label>
                            <div class="input-wrapper">
                                <i class="fa-solid fa-book-open input-icon"></i>
                                <select class="custom-select" name="reading_goal">
                                    <option value="" selected disabled>Select your reading goal</option>
                                    <option value="casual">Casual (1-2 books a month)</option>
                                    <option value="avid">Avid (3-5 books a month)</option>
                                    <option value="power">Power Reader (5+ books a month)</option>
                                </select>
                                <i class="fa-solid fa-chevron-down select-arrow"></i>
                            </div>
                        </div>

                        <!-- Primary Submit Button -->
                        <button type="submit" class="btn-primary-action">
                            Join BookMatch <i class="fa-solid fa-arrow-right ms-2"></i>
                        </button>

                        <div class="divider-or">
                            <span>or</span>
                        </div>

                        <!-- Google Signup Button -->
                        <button type="button" class="btn-google-action">
                            <svg class="google-icon" viewBox="0 0 24 24" width="18" height="18">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.1c-.22-.66-.35-1.36-.35-2.1s.13-1.44.35-2.1V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                            Sign up with Google
                        </button>

                        <p class="signin-prompt">
                            Already have an account? <a href="login.php" class="signin-link">Sign in</a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>