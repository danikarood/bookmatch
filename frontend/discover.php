<?php
// Static Data Array extracted and aligned with the BookMatch Discover view UI
$books_data = [
    // Because You're Here / Featured
    ["id" => 1, "title" => "The Midnight Library", "author" => "Matt Haig", "genre" => "Fiction", "rating" => 4.8, "is_owned" => false, "cover" => "The midnight library.jpg"],
    
    // Trending Books
    ["id" => 101, "title" => "The Fourth Wing", "author" => "Rebecca Yarros", "genre" => "Romantasy", "rating" => 4.8, "is_owned" => false, "cover" => "Fourth Wing.jpeg"],
    ["id" => 102, "title" => "The Seven Husbands of Evelyn Hugo", "author" => "Taylor Jenkins Reid", "genre" => "Historical Fiction", "rating" => 4.8, "is_owned" => true, "cover" => "The seven husbands of evelyn hugo.jpg"],
    ["id" => 103, "title" => "Icebreaker", "author" => "Hannah Grace", "genre" => "Romance", "rating" => 4.6, "is_owned" => true, "cover" => "Icebreaker.jpg"],
    ["id" => 104, "title" => "Powerless", "author" => "Elsie Silver", "genre" => "Contemporary Romance", "rating" => 4.5, "is_owned" => true, "cover" => "Powerless.jpg"],

    // Hidden Gems
    ["id" => 201, "title" => "The Atlas Six", "author" => "Olivie Blake", "genre" => "Fantasy", "rating" => 4.5, "is_owned" => false, "cover" => "The atlas six.jpg"],
    ["id" => 202, "title" => "The Song of Achilles", "author" => "Madeline Miller", "genre" => "Historical Fiction", "rating" => 4.7, "is_owned" => false, "cover" => "The song of achilles.jpg"],
    ["id" => 203, "title" => "A Psalm for the Wild-Built", "author" => "T.K. Klune", "genre" => "Science Fiction", "rating" => 4.7, "is_owned" => false, "cover" => "A psalm for the wild built.jpg"],

    // New Releases
    ["id" => 301, "title" => "The House in the Cerulean Sea", "author" => "Erin Morgenstern", "genre" => "Fantasy", "rating" => 4.5, "is_owned" => false, "cover" => "The house in the cerulean sea.jpg"],
    ["id" => 302, "title" => "Legends & Lattes", "author" => "Travis Baldree", "genre" => "Fantasy", "rating" => 4.8, "is_owned" => false, "cover" => "Legends and lattes.jpg"],
    ["id" => 303, "title" => "The Familiar", "author" => "Leigh Bardugo", "genre" => "Historical Fantasy", "rating" => 4.7, "is_owned" => false, "cover" => "The familiar.jpg"],
    ["id" => 304, "title" => "Bury Our Bones in the Midnight Soil", "author" => "V.E. Schwab", "genre" => "Fantasy Horror", "rating" => 4.7, "is_owned" => false, "cover" => "Bury our bones in the midnight soil.jpg"],

    // Staff Picks
    ["id" => 401, "title" => "The Night Circus", "author" => "Erin Morgenstern", "genre" => "Fantasy", "rating" => 4.7, "is_owned" => false, "cover" => "The night circus.jpg"],
    ["id" => 402, "title" => "Daisy Jones & The Six", "author" => "Taylor Jenkins Reid", "genre" => "Historical Fiction", "rating" => 4.6, "is_owned" => true, "cover" => "Daisy jones and the six.jpg"],
    ["id" => 403, "title" => "The Invisible Life of Addie LaRue", "author" => "V.E. Schwab", "genre" => "Fantasy", "rating" => 4.6, "is_owned" => false, "cover" => "The invisible life of addie larue.jpg"],
    ["id" => 404, "title" => "Lessons in Chemistry", "author" => "Bonnie Garmus", "genre" => "Historical Fiction", "rating" => 4.6, "is_owned" => false, "cover" => "Lessons in chemistry.jpg"],
    ["id" => 405, "title" => "The Priory of the Orange Tree", "author" => "Samantha Shannon", "genre" => "Fantasy", "rating" => 4.7, "is_owned" => false, "cover" => "The priory of the orange tree.jpg"],
    ["id" => 406, "title" => "Remarkably Bright Creatures", "author" => "Shelby Van Pelt", "genre" => "Fiction", "rating" => 4.6, "is_owned" => false, "cover" => "Remarkably bright creatures.jpg"],

    // Community Favorites
    ["id" => 501, "title" => "It Ends With Us", "author" => "Colleen Hoover", "genre" => "Romance", "rating" => 4.7, "is_owned" => false, "cover" => "It ends with us.jpg"],
    ["id" => 502, "title" => "Verity", "author" => "Colleen Hoover", "genre" => "Thriller", "rating" => 4.6, "is_owned" => false, "cover" => "Verity.jpg"],
    ["id" => 503, "title" => "The Ballad of Never After", "author" => "Stephanie Garber", "genre" => "Fantasy", "rating" => 4.6, "is_owned" => false, "cover" => "The ballad of never after.jpg"],
    ["id" => 504, "title" => "They Both Die at the End", "author" => "Adam Silvera", "genre" => "Young Adult", "rating" => 4.6, "is_owned" => false, "cover" => "They both die at the end.jpg"],
    ["id" => 505, "title" => "Project Hail Mary", "author" => "Andy Weir", "genre" => "Science Fiction", "rating" => 4.8, "is_owned" => false, "cover" => "Project hail mary.jpg"],
    ["id" => 506, "title" => "Seven Year Slip", "author" => "Ashley Poston", "genre" => "Romance", "rating" => 4.5, "is_owned" => false, "cover" => "The seven year slip.jpg"]
];

$total_books = count($books_data);

// Categorized arrays mapping to UI sections
$trending_books = array_filter($books_data, fn($b) => in_array($b['title'], ["The Fourth Wing", "The Seven Husbands of Evelyn Hugo", "Icebreaker", "Powerless"]));
$hidden_gems = array_filter($books_data, fn($b) => in_array($b['title'], ["The Atlas Six", "The Song of Achilles", "A Psalm for the Wild-Built"]));
$new_releases = array_filter($books_data, fn($b) => in_array($b['title'], ["The House in the Cerulean Sea", "Legends & Lattes", "The Familiar", "Bury Our Bones in the Midnight Soil"]));
$staff_picks = array_filter($books_data, fn($b) => in_array($b['title'], ["The Night Circus", "Daisy Jones & The Six", "The Invisible Life of Addie LaRue", "Lessons in Chemistry", "The Priory of the Orange Tree", "Remarkably Bright Creatures"]));
$community_favorites = array_filter($books_data, fn($b) => in_array($b['title'], ["It Ends With Us", "Verity", "The Ballad of Never After", "They Both Die at the End", "Project Hail Mary", "Seven Year Slip"]));

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
    <title>BookMatch - Discover</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- Include Modular Navbar -->
    <?php include '../components/navbar.php'; ?>

    <!-- Main Container -->
    <main class="main-content">
        <!-- Hero / Discover Section matching UI design -->
        <section class="hero-section">
            <div class="hero-bg-img" style="background-image: url('../assets/images/Discover top left .png');"></div>
            <div class="hero-content">
                <h1>Discover Your Next<br>Great Read.</h1>
                <p>Explore books that fit your mood, match your personality and expand your world. Every story is a new adventure.</p>
                
                <!-- Search bar input block from Discover screen -->
                <form action="books.php" method="GET" class="discover-search-bar">
                    <input type="text" name="search" placeholder="Search by title, author, keyword or ISBN..." required>
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <button type="submit">Search</button>
                </form>
            </div>

            <!-- Recommendation Card: Because You're Here -->
            <div class="hero-recommendation-card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <div class="rec-badge" style="font-weight: bold; font-size: 12px; color: #666;">Because You're Here</div>
                    <a href="#" style="font-size: 12px; color: #C18844; text-decoration: none;">View all &gt;</a>
                </div>
                <div class="rec-body" style="display: flex; gap: 15px;">
                    <img src="../assets/images/book-covers/The midnight library.jpg" alt="The Midnight Library Book Cover" class="rec-book-img" style="width: 100px; height: 150px; object-fit: cover; border-radius: 6px;">
                    <div class="rec-details">
                        <h2 style="font-size: 16px; margin: 0 0 4px 0;">The Midnight Library</h2>
                        <p class="author" style="font-size: 13px; color: #666; margin: 0 0 8px 0;">Matt Haig</p>
                        <div class="match-score" style="font-size: 13px; font-weight: bold; color: #2e7d32; margin-bottom: 6px;">
                            <span class="percentage">98%</span> Match
                        </div>
                        <div class="ratings" style="font-size: 12px; color: #f59e0b;">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <span style="color: #666; margin-left: 4px;">4.8 (12,430)</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trending Books Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Trending Books</h3>
                <a href="#" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php foreach($trending_books as $b): ?>
                    <div class="book-card" onclick="window.location.href='book-details.php?book=<?php echo rawurlencode($b['title']); ?>'">
                        <img src="../assets/images/book-covers/<?php echo htmlspecialchars($b['cover']); ?>" alt="<?php echo htmlspecialchars($b['title']); ?>" class="book-cover-img">
                        <h4 class="book-title"><?php echo htmlspecialchars($b['title']); ?></h4>
                        <p class="book-author"><?php echo htmlspecialchars($b['author']); ?></p>
                        <div class="book-rating">
                            <i class="fa-solid fa-star"></i> <span><?php echo htmlspecialchars($b['rating']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Hidden Gems Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Hidden Gems</h3>
                <a href="#" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php foreach($hidden_gems as $b): ?>
                    <div class="book-card" onclick="window.location.href='book-details.php?book=<?php echo rawurlencode($b['title']); ?>'">
                        <img src="../assets/images/book-covers/<?php echo htmlspecialchars($b['cover']); ?>" alt="<?php echo htmlspecialchars($b['title']); ?>" class="book-cover-img">
                        <h4 class="book-title"><?php echo htmlspecialchars($b['title']); ?></h4>
                        <p class="book-author"><?php echo htmlspecialchars($b['author']); ?></p>
                        <div class="book-rating">
                            <i class="fa-solid fa-star"></i> <span><?php echo htmlspecialchars($b['rating']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- New Releases Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>New Releases</h3>
                <a href="#" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php foreach($new_releases as $b): ?>
                    <div class="book-card" onclick="window.location.href='book-details.php?book=<?php echo rawurlencode($b['title']); ?>'">
                        <img src="../assets/images/book-covers/<?php echo htmlspecialchars($b['cover']); ?>" alt="<?php echo htmlspecialchars($b['title']); ?>" class="book-cover-img">
                        <h4 class="book-title"><?php echo htmlspecialchars($b['title']); ?></h4>
                        <p class="book-author"><?php echo htmlspecialchars($b['author']); ?></p>
                        <div class="book-rating">
                            <i class="fa-solid fa-star"></i> <span><?php echo htmlspecialchars($b['rating']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Staff Picks Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Staff Picks</h3>
                <a href="#" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php foreach($staff_picks as $b): ?>
                    <div class="book-card" onclick="window.location.href='book-details.php?book=<?php echo rawurlencode($b['title']); ?>'">
                        <img src="../assets/images/book-covers/<?php echo htmlspecialchars($b['cover']); ?>" alt="<?php echo htmlspecialchars($b['title']); ?>" class="book-cover-img">
                        <h4 class="book-title"><?php echo htmlspecialchars($b['title']); ?></h4>
                        <p class="book-author"><?php echo htmlspecialchars($b['author']); ?></p>
                        <div class="book-rating">
                            <i class="fa-solid fa-star"></i> <span><?php echo htmlspecialchars($b['rating']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Community Favorites Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Community Favorites</h3>
                <a href="#" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php foreach($community_favorites as $b): ?>
                    <div class="book-card" onclick="window.location.href='book-details.php?book=<?php echo rawurlencode($b['title']); ?>'">
                        <img src="../assets/images/book-covers/<?php echo htmlspecialchars($b['cover']); ?>" alt="<?php echo htmlspecialchars($b['title']); ?>" class="book-cover-img">
                        <h4 class="book-title"><?php echo htmlspecialchars($b['title']); ?></h4>
                        <p class="book-author"><?php echo htmlspecialchars($b['author']); ?></p>
                        <div class="book-rating">
                            <i class="fa-solid fa-star"></i> <span><?php echo htmlspecialchars($b['rating']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="lower-section">
            <div class="newsletter-box">
                <div class="newsletter-content">
                    <h3>Stay in the Loop</h3>
                    <p>Get personalised recommendations, new releases and bookish inspiration delivered to your inbox.</p>
                    <form action="" method="POST">
                        <input type="email" name="email" placeholder="Your email address" required>
                        <button type="submit">Subscribe</button>
                    </form>
                    <?php if(!empty($newsletter_status)): ?>
                        <p class="newsletter-msg"><?php echo $newsletter_status; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main>

    <!-- Include Modular Footer -->
    <?php include '../components/footer.php'; ?>

    <script src="../assets/js/main.js"></script>
</body>
</html>