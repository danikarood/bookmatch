<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar">
    <div class="nav-container">
        <!-- Logo removed completely per your request -->
        
        <ul class="nav-links">
            <li><a href="dashboard.php" class="<?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">Home</a></li>
            <li><a href="discover.php" class="<?php echo ($current_page == 'discover.php') ? 'active' : ''; ?>">Discover</a></li>
            <li><a href="quizzes.php" class="<?php echo ($current_page == 'quizzes.php') ? 'active' : ''; ?>">Quizzes</a></li>
            <li><a href="books.php" class="<?php echo ($current_page == 'books.php') ? 'active' : ''; ?>">Books</a></li>
            <li><a href="community.php" class="<?php echo ($current_page == 'community.php') ? 'active' : ''; ?>">Community</a></li>
            <li><a href="reading-list.php" class="<?php echo ($current_page == 'my-library.php') ? 'active' : ''; ?>">My Library</a></li>
            <li><a href="user profile.php" class="profile-btn <?php echo ($current_page == 'user-profile.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-circle-user"></i>
                    <span>Profile</span>
                </a></li>
        </ul>

    </div>
</nav>

<style>
/* Clean, modern navbar styles using your existing CSS classes */
.navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    background-color: var(--bg-color, #f9f6f0);
    border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    box-shadow: 0 2px 4px rgba(0,0,0,0.02);
}

.nav-container {
    max-width: 1300px;
    margin: 0 auto;
    padding: 14px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 28px;
    margin: 0;
    padding: 0;
}

.nav-links a {
    text-decoration: none;
    color: #555555;
    font-size: 15px;
    font-weight: 500;
    transition: color 0.2s ease;
}

.nav-links a:hover, 
.nav-links a.active {
    color: var(--primary-color, #C18844);
}

.nav-links a.active {
    font-weight: 600;
}

.nav-right {
    display: flex;
    align-items: center;
}

.profile-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    color: #555555;
    font-size: 15px;
    font-weight: 500;
    padding: 0;
    border-radius: 0;
    background: transparent;
    transition: color 0.2s ease;
}

.profile-btn:hover,
.profile-btn.active {
    color: var(--primary-color, #C18844);
}

.profile-btn i.fa-circle-user {
    font-size: 18px;
    color: inherit;
}
</style>