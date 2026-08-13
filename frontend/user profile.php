<?php
// Dataset for My Library Page Profile and Dashboard
$user_profile = [
    "name" => "Danika Rood",
    "handle" => "@danika.reads",
    "bio" => "“There is no friend as loyal as a book.”\n– Ernest Hemingway",
    "avatar" => "https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300&auto=format&fit=crop&q=80",
    "books_read" => 48,
    "pages_read" => "12.4K",
    "book_reviews" => 28,
    "streak_days" => 28
];

$currently_reading = [
    "title" => "The Song of Achilles",
    "author" => "Madeline Miller",
    "progress" => 65,
    "cover" => "The song of achilles.jpg", // update if needed based on your assets
    "estimated_finish" => "5 days"
];

$wishlist_books = [
    ["title" => "Fourth Wing", "author" => "Rebecca Yarros", "cover" => "Fourth Wing.jpeg"],
    ["title" => "The Atlas Six", "author" => "Olivie Blake", "cover" => "The atlas six.jpg"],
    ["title" => "A Court of Thorns and Roses", "author" => "Sarah J. Maas", "cover" => "A court of thorns and roses.jpg"],
    ["title" => "Tomorrow, and Tomorrow, and Tomorrow", "author" => "Gabrielle Zevin", "cover" => "Tomorrow, and tomorrow, and tomorrow.jpg"]
];

$recommended_books = [
    ["title" => "The Invisible Life of Addie LaRue", "author" => "V. E. Schwab", "match" => "96%", "cover" => "The invisible life of addie larue.jpg"],
    ["title" => "Once Upon a Broken Heart", "author" => "Stephanie Garber", "match" => "95%", "cover" => "Once upon a broken heart.jpg"],
    ["title" => "The Midnight Library", "author" => "Matt Haig", "match" => "94%", "cover" => "The midnight library.jpg"],
    ["title" => "Daisy Jones & The Six", "author" => "Taylor Jenkins Reid", "match" => "93%", "cover" => "Daisy jones and the six.jpg"],
    ["title" => "The House in the Cerulean Sea", "author" => "TJ Klune", "match" => "91%", "cover" => "The house in the cerulean sea.jpg"]
];

$newsletter_status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $newsletter_status = "Thank you for subscribing!";
    } else {
        $newsletter_status = "Please enter a valid email address.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMatch - My Library</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- Include Modular Navbar -->
    <?php include '../components/navbar.php'; ?>

    <!-- Main Container -->
    <main class="main-content library-page">

        <!-- Top Section Layout: Left Sidebar Profile & Right Dashboard Grid -->
        <div class="library-layout-wrapper">
            
            <!-- Left Sidebar Profile Card -->
            <aside class="profile-sidebar">
                <div class="profile-card">
                    <div class="avatar-container">
                        <img src="<?php echo htmlspecialchars($user_profile['avatar']); ?>" alt="<?php echo htmlspecialchars($user_profile['name']); ?>" class="profile-avatar">
                        <button class="avatar-edit-btn"><i class="fa-solid fa-pen"></i></button>
                    </div>
                    <h2><?php echo htmlspecialchars($user_profile['name']); ?></h2>
                    <span class="handle"><?php echo htmlspecialchars($user_profile['handle']); ?></span>
                    <p class="profile-bio"><?php echo nl2br(htmlspecialchars($user_profile['bio'])); ?></p>
                    
                    <div class="profile-quick-stats">
                        <div>
                            <strong><?php echo $user_profile['books_read']; ?></strong>
                            <span>Books Read</span>
                        </div>
                        <div>
                            <strong><?php echo $user_profile['pages_read']; ?></strong>
                            <span>Pages Read</span>
                        </div>
                        <div>
                            <strong><?php echo $user_profile['book_reviews']; ?></strong>
                            <span>Book Reviews</span>
                        </div>
                    </div>

                    <div class="profile-actions">
                        <a href="#" class="btn-primary-block">Edit Profile</a>
                        <a href="#" class="btn-settings"><i class="fa-solid fa-gear"></i></a>
                    </div>
                </div>
            </aside>

            <!-- Right Main Dashboard Area -->
            <div class="library-dashboard-content">

                <!-- Row 1: Reading Overview, Reading Streak, Favourite Genres, Achievements -->
                <div class="dashboard-row-top">
                    
                    <!-- Reading Overview -->
                    <div class="community-card overview-card">
                        <div class="card-header">
                            <h3>Reading Overview</h3>
                            <a href="#" class="view-all">View full stats &gt;</a>
                        </div>
                        <div class="overview-stats-grid">
                            <div class="stat-item">
                                <i class="fa-solid fa-book-open"></i>
                                <strong>48</strong>
                                <span>Books Read</span>
                            </div>
                            <div class="stat-item">
                                <strong>12.4K</strong>
                                <span>Pages Read</span>
                            </div>
                            <div class="stat-item">
                                <strong>352</strong>
                                <span>Hours Read</span>
                            </div>
                        </div>
                        <div class="overview-rating-banner">
                            <strong>4.7</strong>
                            <span>Avg. Rating</span>
                        </div>
                    </div>

                    <!-- Reading Streak -->
                    <div class="community-card streak-card">
                        <div class="card-header">
                            <h3>Reading Streak</h3>
                        </div>
                        <div class="streak-content">
                            <div class="streak-fire-count">
                                <i class="fa-solid fa-fire"></i>
                                <span>28</span>
                            </div>
                            <p class="streak-sub">Days in a row</p>
                            <div class="streak-days-circles">
                                <span class="day-dot active">M</span>
                                <span class="day-dot active">T</span>
                                <span class="day-dot active">W</span>
                                <span class="day-dot active">T</span>
                                <span class="day-dot active">F</span>
                                <span class="day-dot active">S</span>
                                <span class="day-dot">S</span>
                            </div>
                            <p class="streak-footer-text">Keep it up! You're on fire! 🔥</p>
                        </div>
                    </div>

                    <!-- Favourite Genres -->
                    <div class="community-card genres-card">
                        <div class="card-header">
                            <h3>Favourite Genres</h3>
                            <a href="#" class="view-all">View all &gt;</a>
                        </div>
                        <div class="genres-tags">
                            <span class="genre-pill">Fantasy</span>
                            <span class="genre-pill">Romance</span>
                            <span class="genre-pill">Historical Fiction</span>
                            <span class="genre-pill">Mystery</span>
                            <span class="genre-pill">Poetry</span>
                            <span class="genre-pill">Contemporary</span>
                        </div>
                    </div>

                    <!-- Achievements -->
                    <div class="community-card achievements-card">
                        <div class="card-header">
                            <h3>Achievements</h3>
                            <a href="#" class="view-all">View all &gt;</a>
                        </div>
                        <div class="achievements-list">
                            <div class="achievement-item">
                                <div class="achievement-icon"><i class="fa-solid fa-award"></i></div>
                                <div class="achievement-info">
                                    <h4>Page Turner</h4>
                                    <p>Read 25 books</p>
                                </div>
                            </div>
                            <div class="achievement-item">
                                <div class="achievement-icon"><i class="fa-solid fa-compass"></i></div>
                                <div class="achievement-info">
                                    <h4>Genre Explorer</h4>
                                    <p>Read books from 10 genres</p>
                                </div>
                            </div>
                            <div class="achievement-item">
                                <div class="achievement-icon"><i class="fa-solid fa-star"></i></div>
                                <div class="achievement-info">
                                    <h4>Top Reviewer</h4>
                                    <p>Write 10 reviews</p>
                                </div>
                            </div>
                            <div class="achievement-item">
                                <div class="achievement-icon"><i class="fa-solid fa-bookmark"></i></div>
                                <div class="achievement-info">
                                    <h4>Book Collector</h4>
                                    <p>Add 50 books to your library</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Row 2: Currently Reading, Wishlist, Recent Reviews, Friends -->
                <div class="dashboard-row-middle">
                    
                    <!-- Currently Reading -->
                    <div class="community-card currently-reading-card">
                        <div class="card-header">
                            <h3>Currently Reading</h3>
                        </div>
                        <div class="currently-reading-body">
                            <img src="../assets/images/book-covers/The song of achilles.jpg" alt="The Song of Achilles" class="current-book-cover" onerror="this.src='../assets/images/book-covers/The%20midnight%20library.jpg'">
                            <div class="current-book-details">
                                <h4>The Song of Achilles</h4>
                                <p>Madeline Miller</p>
                                <div class="progress-bar"><div class="fill" style="width: 65%;"></div></div>
                                <span class="progress-percentage">65%</span>
                            </div>
                        </div>
                        <a href="#" class="btn-continue">Continue Reading</a>
                        <span class="estimated-finish"><i class="fa-regular fa-clock"></i> Estimated finish: 5 days</span>
                    </div>

                    <!-- Wishlist -->
                    <div class="community-card wishlist-card">
                        <div class="card-header">
                            <h3>Wishlist</h3>
                            <a href="#" class="view-all">View all &gt;</a>
                        </div>
                        <div class="wishlist-row">
                            <?php foreach($wishlist_books as $book): ?>
                                <div class="wishlist-item">
                                    <img src="../assets/images/book-covers/<?php echo rawurlencode($book['cover']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
                                    <h5><?php echo htmlspecialchars($book['title']); ?></h5>
                                    <span><?php echo htmlspecialchars($book['author']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Recent Reviews -->
                    <div class="community-card recent-reviews-card">
                        <div class="card-header">
                            <h3>Recent Reviews</h3>
                            <a href="#" class="view-all">View all &gt;</a>
                        </div>
                        <div class="reviews-list-vertical">
                            <div class="review-mini-item">
                                <img src="../assets/images/book-covers/The night circus.jpg" alt="The Night Circus" onerror="this.src='../assets/images/book-covers/The%20midnight%20library.jpg'">
                                <div class="review-mini-content">
                                    <h4>The Night Circus</h4>
                                    <span class="author-sub">Erin Morgenstern</span>
                                    <div class="stars"><i class="fa-solid fa-star"></i> <span>5.0</span></div>
                                    <p>An enchanting and imaginative story that feels like magic. Beautifully written!</p>
                                    <span class="time-ago">2 days ago</span>
                                </div>
                            </div>
                            <div class="review-mini-item">
                                <img src="../assets/images/book-covers/The seven husbands of evelyn hugo.jpg" alt="Evelyn Hugo" onerror="this.src='../assets/images/book-covers/The%20midnight%20library.jpg'">
                                <div class="review-mini-content">
                                    <h4>The Seven Husbands of Evelyn Hugo</h4>
                                    <span class="author-sub">Taylor Jenkins Reid</span>
                                    <div class="stars"><i class="fa-solid fa-star"></i> <span>4.5</span></div>
                                    <span class="time-ago">1 week ago</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Friends -->
                    <div class="community-card friends-card">
                        <div class="card-header">
                            <h3>Friends</h3>
                            <a href="#" class="view-all">View all &gt;</a>
                        </div>
                        <div class="friends-list">
                            <div class="friend-item">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&auto=format&fit=crop&q=80" alt="Olivia M.">
                                <div class="friend-info">
                                    <h5>Olivia M.</h5>
                                    <span>@oliviaslibrary</span>
                                    <small>162 books</small>
                                </div>
                                <button class="btn-message"><i class="fa-regular fa-comment"></i></button>
                            </div>
                            <div class="friend-item">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" alt="Ethan R.">
                                <div class="friend-info">
                                    <h5>Ethan R.</h5>
                                    <span>@ethanshelves</span>
                                    <small>98 books</small>
                                </div>
                                <button class="btn-message"><i class="fa-regular fa-comment"></i></button>
                            </div>
                            <div class="friend-item">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80" alt="Maya L.">
                                <div class="friend-info">
                                    <h5>Maya L.</h5>
                                    <span>@mayalovesbooks</span>
                                    <small>134 books</small>
                                </div>
                                <button class="btn-message"><i class="fa-regular fa-comment"></i></button>
                            </div>
                            <div class="friend-item">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80" alt="Noah K.">
                                <div class="friend-info">
                                    <h5>Noah K.</h5>
                                    <span>@noahbooks</span>
                                    <small>76 books</small>
                                </div>
                                <button class="btn-message"><i class="fa-regular fa-comment"></i></button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Recent Activity Banner Row -->
        <div class="library-bottom-grid">
            
            <!-- Recent Activity Card -->
            <section class="community-card recent-activity-card" style="background-image: url('../assets/images/Community%201.png'); background-size: cover; background-position: center;">
                <div class="card-header">
                    <h3>Recent Activity</h3>
                </div>
                <div class="activity-list">
                    <div class="activity-item">
                        <i class="fa-solid fa-book-open"></i>
                        <div>
                            <p>Finished reading <strong>The Song of Achilles</strong></p>
                            <span class="time-ago">2 days ago</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <i class="fa-solid fa-bookmark"></i>
                        <div>
                            <p>Added <strong>Fourth Wing</strong> to wishlist</p>
                            <span class="time-ago">3 days ago</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <i class="fa-solid fa-star"></i>
                        <div>
                            <p>Reviewed <strong>The Night Circus</strong></p>
                            <span class="time-ago">5 days ago</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <i class="fa-solid fa-users"></i>
                        <div>
                            <p>Joined <strong>The Fantasy Fellowship</strong> book club</p>
                            <span class="time-ago">1 week ago</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <i class="fa-solid fa-fire"></i>
                        <div>
                            <p>Completed a 28 day reading streak</p>
                            <span class="time-ago">1 week ago</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Recommended For You Card -->
            <section class="community-card recommended-card">
                <div class="card-header">
                    <h3>Recommended For You</h3>
                    <a href="#" class="view-all">View all &gt;</a>
                </div>
                <div class="recommended-books-row">
                    <?php foreach($recommended_books as $book): ?>
                        <div class="recommended-book-item">
                            <img src="../assets/images/book-covers/<?php echo rawurlencode($book['cover']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
                            <h5 class="book-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                            <p class="book-author"><?php echo htmlspecialchars($book['author']); ?></p>
                            <span class="match-score"><?php echo htmlspecialchars($book['match']); ?> Match</span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Book Clubs Card -->
            <section class="community-card library-clubs-card">
                <div class="card-header">
                    <h3>Book Clubs</h3>
                    <a href="#" class="view-all">View all &gt;</a>
                </div>
                <div class="clubs-list">
                    <div class="club-item">
                        <div class="club-details">
                            <h5>The Classic Readers</h5>
                            <span>1,842 members</span>
                        </div>
                        <button class="btn-join">Join</button>
                    </div>
                    <div class="club-item">
                        <div class="club-details">
                            <h5>Fantasy Fellowship</h5>
                            <span>2,317 members</span>
                        </div>
                        <button class="btn-join">Join</button>
                    </div>
                    <div class="club-item">
                        <div class="club-details">
                            <h5>Poetry & Prose</h5>
                            <span>1,126 members</span>
                        </div>
                        <button class="btn-join">Join</button>
                    </div>
                    <div class="club-item">
                        <div class="club-details">
                            <h5>Non-Fiction Thinkers</h5>
                            <span>1,573 members</span>
                        </div>
                        <button class="btn-join">Join</button>
                    </div>
                </div>
            </section>

        </div>

        <!-- Atmospheric Banner -->
        <div class="community-visual-banner" style="background-image: url('../assets/images/Community%202.png');">
            <div class="banner-overlay-content">
                <h3>Stay inspired.</h3>
                <p>Get the latest bookish recommendations, reading tips, and community highlights straight to your inbox.</p>
            </div>
        </div>

        <!-- Newsletter Section -->
        <section class="lower-section">
            <div class="newsletter-box">
                <div class="newsletter-content">
                    <form action="" method="POST">
                        <input type="email" name="email" placeholder="Your email address" required>
                        <button type="submit">Subscribe <i class="fa-solid fa-paper-plane"></i></button>
                    </form>
                    <?php if(!empty($newsletter_status)): ?>
                        <p class="newsletter-msg"><?php echo $newsletter_status; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main>

    <!-- Edit Profile Modal -->
<div id="editProfileModal" class="modal-overlay" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Edit Profile</h3>
            <button type="button" class="modal-close-btn" id="closeModalBtn">&times;</button>
        </div>
        <form id="editProfileForm" action="update-profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="editName">Name</label>
                <input type="text" id="editName" name="name" value="Danika Rood">
            </div>
            <div class="form-group">
                <label for="editBio">Bio / Favorite Quote</label>
                <textarea id="editBio" name="bio">"There is no friend as loyal as a book."</textarea>
            </div>
            <div class="form-group">
                <label for="editAvatar">Profile Picture</label>
                <input type="file" id="editAvatar" name="avatar">
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-secondary" id="cancelModalBtn">Cancel</button>
                <button type="submit" class="btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

    <!-- Include Modular Footer -->
    <?php include '../components/footer.php'; ?>

    <script src="../assets/js/main.js"></script>
</body>
</html>