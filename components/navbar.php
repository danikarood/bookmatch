<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar">
    <div class="nav-container" style="display: flex; justify-content: space-between; align-items: center; max-width: 1400px; margin: 0 auto; padding: 12px 40px;">
        <div class="nav-logo">
            <a href="dashboard.php" style="display: flex; align-items: center; gap: 10px; text-decoration: none; color: #2c221e; font-weight: bold; font-size: 18px;">
                <img src="../assets/images/Title%20logo.svg" alt="BookMatch Logo" style="height: 28px;">
                <span>BookMatch</span>
            </a>
        </div>
        
        <ul class="nav-links" style="display: flex; list-style: none; gap: 24px; margin: 0; padding: 0;">
            <li><a href="dashboard.php" class="<?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>" style="text-decoration: none; color: #555; font-weight: 500;">Home</a></li>
            <li><a href="discover.php" class="<?php echo ($current_page == 'discover.php') ? 'active' : ''; ?>" style="text-decoration: none; color: #555; font-weight: 500;">Discover</a></li>
            <li><a href="quizzes.php" class="<?php echo ($current_page == 'quizzes.php') ? 'active' : ''; ?>" style="text-decoration: none; color: #555; font-weight: 500;">Quizzes</a></li>
            <li><a href="books.php" class="<?php echo ($current_page == 'books.php') ? 'active' : ''; ?>" style="text-decoration: none; color: #555; font-weight: 500;">Books</a></li>
            <li><a href="genres.php" class="<?php echo ($current_page == 'genres.php') ? 'active' : ''; ?>" style="text-decoration: none; color: #555; font-weight: 500;">Genres</a></li>
            <li><a href="community.php" class="<?php echo ($current_page == 'community.php') ? 'active' : ''; ?>" style="text-decoration: none; color: #555; font-weight: 500;">Community</a></li>
            <li><a href="my-library.php" class="<?php echo ($current_page == 'my-library.php') ? 'active' : ''; ?>" style="text-decoration: none; color: #555; font-weight: 500;">My Library</a></li>
        </ul>

        <div class="nav-right" style="display: flex; align-items: center; gap: 20px;">
            <div class="profile-dropdown" style="position: relative;">
                <a href="user-profile.php" class="profile-btn" style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: #333; font-weight: 500;">
                    <i class="fa-solid fa-circle-user" style="font-size: 20px;"></i>
                    <span>Profile</span>
                    <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i>
                </a>
                <div class="dropdown-content" style="display: none; position: absolute; right: 0; background: #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border-radius: 6px; padding: 8px 0; min-width: 130px; z-index: 100;">
                    <a href="user-profile.php" style="display: block; padding: 8px 16px; color: #333; text-decoration: none; font-size: 14px;">My Profile</a>
                    <a href="settings.php" style="display: block; padding: 8px 16px; color: #333; text-decoration: none; font-size: 14px;">Settings</a>
                    <a href="logout.php" style="display: block; padding: 8px 16px; color: #333; text-decoration: none; font-size: 14px;">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
.nav-links a.active {
    color: var(--primary-color, #C18844) !important;
    font-weight: 600;
}
.profile-dropdown:hover .dropdown-content {
    display: block !important;
}
</style>