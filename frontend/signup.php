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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/signup.css">
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0 split-layout">
        
        <!-- Left Side: Hero Column -->
        <div class="col-lg-5 d-none d-lg-flex hero-section">
            <div class="brand-logo-container">
                <img src="../assets/images/Third%20logo.svg" alt="BookMatch Logo" class="corner-logo-img">
            </div>
            <div class="hero-text-content">
                <h1>Your Next<br>Favourite<br><em>Story</em> Awaits.</h1>
                <p class="mt-3">Join a community that celebrates great stories and helps you discover books you'll love.</p>
            </div>
        </div>

        <!-- Right Side: Form Panel Column -->
        <div class="col-lg-7 form-panel">
            <div class="form-card">
                <h2>Create Your Account</h2>
                
                <form action="../backend/auth/signup_process.php" method="POST">
                    
                    <!-- First & Last Name Row -->
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter your first name" required>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2 mt-md-0">
                            <label class="form-label">Last Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter your last name" required>
                            </div>
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                        </div>
                    </div>

                    <!-- Passwords Row -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Create a password" required>
                                <span class="input-group-text password-toggle" onclick="togglePassword('password', this)">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2 mt-md-0">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your password" required>
                                <span class="input-group-text password-toggle" onclick="togglePassword('confirm_password', this)">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Favourite Genres Badges -->
                    <label class="form-label">Favourite Genres</label>
                    <div class="genre-grid">
                        <input type="checkbox" class="btn-check" id="genre_fantasy" name="genres[]" value="Fantasy">
                        <label class="btn-genre" for="genre_fantasy"><i class="fa-solid fa-wand-magic-sparkles"></i> Fantasy</label>
                        
                        <input type="checkbox" class="btn-check" id="genre_romance" name="genres[]" value="Romance">
                        <label class="btn-genre" for="genre_romance"><i class="fa-regular fa-heart"></i> Romance</label>
                        
                        <input type="checkbox" class="btn-check" id="genre_mystery" name="genres[]" value="Mystery">
                        <label class="btn-genre" for="genre_mystery"><i class="fa-solid fa-magnifying-glass"></i> Mystery</label>

                        <input type="checkbox" class="btn-check" id="genre_historical" name="genres[]" value="Historical Fiction">
                        <label class="btn-genre" for="genre_historical"><i class="fa-solid fa-landmark"></i> Historical Fiction</label>

                        <input type="checkbox" class="btn-check" id="genre_scifi" name="genres[]" value="Science Fiction">
                        <label class="btn-genre" for="genre_scifi"><i class="fa-solid fa-rocket"></i> Science Fiction</label>

                        <input type="checkbox" class="btn-check" id="genre_thriller" name="genres[]" value="Thriller">
                        <label class="btn-genre" for="genre_thriller"><i class="fa-solid fa-user-secret"></i> Thriller</label>

                        <input type="checkbox" class="btn-check" id="genre_contemporary" name="genres[]" value="Contemporary">
                        <label class="btn-genre" for="genre_contemporary"><i class="fa-solid fa-city"></i> Contemporary</label>

                        <input type="checkbox" class="btn-check" id="genre_nonfiction" name="genres[]" value="Non-Fiction">
                        <label class="btn-genre" for="genre_nonfiction"><i class="fa-solid fa-book-open"></i> Non-Fiction</label>
                    </div>

                    <!-- Reading Goal Select -->
                    <div class="mb-3">
                        <label class="form-label">Reading Goal</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                            <select class="form-select" name="reading_goal">
                                <option value="" selected disabled>Select your reading goal</option>
                                <option value="casual">Casual (1-2 books a month)</option>
                                <option value="avid">Avid (3-5 books a month)</option>
                                <option value="power">Power Reader (5+ books a month)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons Row -->
                    <div class="row g-2 mt-2">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary-custom w-100 d-flex justify-content-center align-items-center gap-2">
                                Join BookMatch <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-google w-100">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google Logo" width="18"> 
                                Sign up with Google
                            </button>
                        </div>
                    </div>

                    <p class="text-center mt-3 mb-0" style="font-size: 0.9rem;">
                        Already have an account? <a href="login.php" class="sign-in-link">Sign in</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>