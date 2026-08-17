<?php
// Static Data Array with exact file names matching your book-covers folder structure
$books_data = [
    ["id" => 1, "title" => "My Killer Vacation", "author" => "Tessa Bailey", "genre" => "Contemporary Romance", "rating" => 4.2, "is_owned" => true, "cover" => "My killer vacation.jpg"],
    ["id" => 2, "title" => "Consider Me", "author" => "Becka Mack", "genre" => "Sports Romance", "rating" => 4.5, "is_owned" => true, "cover" => "Consider me.jpg"],
    ["id" => 3, "title" => "Play With Me", "author" => "Becka Mack", "genre" => "Sports Romance", "rating" => 4.4, "is_owned" => true, "cover" => "Play with me.jpg"],
    ["id" => 4, "title" => "Unravel Me", "author" => "Becka Mack", "genre" => "Sports Romance", "rating" => 4.6, "is_owned" => true, "cover" => "Unravel me.jpg"],
    ["id" => 5, "title" => "Fall With Me", "author" => "Becka Mack", "genre" => "Sports Romance", "rating" => 4.5, "is_owned" => true, "cover" => "Fall with me.jpg"],
    ["id" => 6, "title" => "Breathe With Me", "author" => "Becka Mack", "genre" => "Sports Romance", "rating" => 4.7, "is_owned" => true, "cover" => "Breathe with me.jpg"],
    ["id" => 7, "title" => "Flawless", "author" => "Elsie Silver", "genre" => "Contemporary Romance", "rating" => 4.4, "is_owned" => true, "cover" => "Flawless.jpg"],
    ["id" => 8, "title" => "Heartless", "author" => "Elsie Silver", "genre" => "Contemporary Romance", "rating" => 4.6, "is_owned" => true, "cover" => "Heartless.jpg"],
    ["id" => 9, "title" => "Powerless", "author" => "Elsie Silver", "genre" => "Contemporary Romance", "rating" => 4.3, "is_owned" => true, "cover" => "Powerless.jpg"],
    ["id" => 10, "title" => "Reckless", "author" => "Elsie Silver", "genre" => "Contemporary Romance", "rating" => 4.5, "is_owned" => true, "cover" => "Reckless.jpg"],
    ["id" => 101, "title" => "Fourth Wing", "author" => "Rebecca Yarros", "genre" => "Romantasy", "rating" => 4.8, "is_owned" => false, "cover" => "Fourth Wing.jpeg"],
    ["id" => 102, "title" => "Iron Flame", "author" => "Rebecca Yarros", "genre" => "Romantasy", "rating" => 4.6, "is_owned" => false, "cover" => "Iron flame.jpg"],
    ["id" => 103, "title" => "A Court of Thorns and Roses", "author" => "Sarah J. Maas", "genre" => "Romantasy", "rating" => 4.7, "is_owned" => false, "cover" => "A court of thorns & roses.jpg"],
    ["id" => 104, "title" => "House of Earth and Blood", "author" => "Sarah J. Maas", "genre" => "Romantasy", "rating" => 4.5, "is_owned" => false, "cover" => "House of earth & blood.jpg"],
    ["id" => 105, "title" => "The Cruel Prince", "author" => "Holly Black", "genre" => "Romantasy", "rating" => 4.2, "is_owned" => false, "cover" => "The cruel prince.jpg"],
    ["id" => 201, "title" => "The Housemaid", "author" => "Freida McFadden", "genre" => "Thriller", "rating" => 4.5, "is_owned" => false, "cover" => "The housemaid.jpg"],
    ["id" => 202, "title" => "Verity", "author" => "Colleen Hoover", "genre" => "Thriller", "rating" => 4.6, "is_owned" => false, "cover" => "Verity.jpg"],
    ["id" => 203, "title" => "The Silent Patient", "author" => "Alex Michaelides", "genre" => "Thriller", "rating" => 4.4, "is_owned" => false, "cover" => "The silent patient.jpg"],
    ["id" => 301, "title" => "Book Lovers", "author" => "Emily Henry", "genre" => "Contemporary Romance", "rating" => 4.5, "is_owned" => true, "cover" => "Book lovers.jpg"],
    ["id" => 302, "title" => "Beach Read", "author" => "Emily Henry", "genre" => "Contemporary Romance", "rating" => 4.3, "is_owned" => true, "cover" => "Beach read.jpg"]
];

$total_books = count($books_data);
$saved_reads = 12; 
$owned_count = count(array_filter($books_data, fn($b) => $b['is_owned']));
$recent_books = $books_data;

$booktok_books = array_filter($books_data, fn($b) => in_array($b['title'], ["Fourth Wing", "Iron Flame", "Heartless", "Verity", "The Housemaid"]));
$community_picks = array_filter($books_data, fn($b) => $b['rating'] >= 4.6);

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
    <title>BookMatch</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Netflix-style horizontal row scrolling layout without visible scrollbars */
        .shelf-section {
            padding: 0 40px;
            margin-bottom: 40px;
        }
        .shelf-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .shelf-header h3 {
            font-size: 20px;
            color: var(--text-color, #333);
        }
        .book-row-netflix {
            display: flex;
            gap: 16px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 15px;
            /* Hide scrollbar for clean UI while keeping it scrollable */
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE and Edge */
        }
        .book-row-netflix::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
        .book-row-netflix .book-card, 
        .book-row-netflix > div {
            flex: 0 0 200px;
            max-width: 200px;
        }
        
        /* Fix book card image sizing so covers fit properly */
        .book-card img, .book-row-netflix img, .book-row img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <!-- Include Modular Navbar -->
    <?php include '../components/navbar.php'; ?>

    <!-- Main Container -->

        <!-- Hero Section with Asset 1 Background -->
        <section class="hero-section">
            <div class="hero-bg-img" style="background-image: url('../assets/images/Top-left hero background..jpg');"></div>
            <div class="hero-content">
                <h1>Find the Story<br>That's Meant For You.</h1>
                <p>Answer a few questions about your mood, tastes and interests and let BookMatch find your perfect next read from thousands of books and real readers.</p>
                <div class="hero-buttons">
                    <button class="btn-primary" onclick="window.location.href='quizzes.php'"><i class="fa-solid fa-wand-magic-sparkles"></i> Find My Match</button>
                    <button class="btn-secondary">Browse Books</button>
                </div>
            </div>
            <div class="hero-recommendation-card">
                <div class="rec-badge">TODAY'S RECOMMENDATION</div>
                <div class="rec-body">
                    <img src="../assets/images/book-covers/The seven husbands of evelyn hugo.jpg" alt="Book Cover" class="rec-book-img" style="object-fit: cover;">
                    <div class="rec-details">
                        <h2>The Seven Husbands<br>of Evelyn Hugo</h2>
                        <p class="author">Taylor Jenkins Reid</p>
                        <div class="match-score">
                            <span class="percentage">98%</span> Match
                        </div>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <span>4.7 (12,430 ratings)</span>
                        </div>
                        <div class="tags">
                            <span>Fiction</span><span>Contemporary</span><span>Romance</span><span>Historical</span>
                        </div>
                        <p class="description">Aging Hollywood icon Evelyn Hugo finally tells her story—of ambition, love, scandal, and the seven marriages that changed her life forever.</p>
                        <div class="rec-actions">
                            <button class="btn-why">Why this book?</button>
                            <button class="btn-save"><i class="fa-regular fa-bookmark"></i> Save Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Today's Picks Netflix-style Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Today's Picks (Total Library: <?php echo $total_books; ?> books)</h3>
               <a href="book.php?category=todays_picks" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php 
                foreach($recent_books as $b) {
                    $title = $b['title']; 
                    $author = $b['author']; 
                    $rating = $b['rating']; 
                    $image = '../assets/images/book-covers/' . $b['cover'];
                    include '../components/book-card.php';
                }
                ?>
            </div>
        </section>

        <!-- Trending on BookTok Netflix-style Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Trending on BookTok <i class="fa-brands fa-tiktok" style="color: #C18844;"></i></h3>
                <a href="book.php?category=booktok" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php 
                foreach($booktok_books as $b) {
                    $title = $b['title']; 
                    $author = $b['author']; 
                    $rating = $b['rating']; 
                    $image = '../assets/images/book-covers/' . $b['cover'];
                    include '../components/book-card.php';
                }
                ?>
            </div>
        </section>

        <!-- Community Picks Netflix-style Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Community Picks</h3>
                <a href="book.php?category=community_picks" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php 
                foreach($community_picks as $b) {
                    $title = $b['title']; 
                    $author = $b['author']; 
                    $rating = $b['rating']; 
                    $image = '../assets/images/book-covers/' . $b['cover'];
                    include '../components/book-card.php';
                }
                ?>
            </div>
        </section>

        <!-- Browse by Genre -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Browse by Genre</h3>
                <a href="#" class="view-all">View all</a>
            </div>
            <div class="mood-row">
                <div class="mood-card">
                    <img src="https://images.unsplash.com/photo-1534447677768-be436bb09401?auto=format&fit=crop&w=300&q=80" alt="Romance">
                    <span>Contemporary Romance</span>
                </div>
                <div class="mood-card">
                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=300&q=80" alt="Romantasy">
                    <span>Romantasy & Fantasy</span>
                </div>
                <div class="mood-card">
                    <img src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?auto=format&fit=crop&w=300&q=80" alt="Thriller">
                    <span>Mystery & Thriller</span>
                </div>
                <div class="mood-card">
                    <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=300&q=80" alt="Sports">
                    <span>Sports Romance</span>
                </div>
            </div>
        </section>

        <!-- Browse by Mood -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Browse by Mood</h3>
                <a href="#" class="view-all">View all</a>
            </div>
            <div class="mood-row">
                <div class="mood-card">
                    <img src="../assets/images/Cozy and Comfort.jpg" alt="Mood">
                    <span>Cozy & Comforting</span>
                </div>
                <div class="mood-card">
                    <img src="https://images.unsplash.com/photo-1509198397868-475647b2a1e5?auto=format&fit=crop&w=300&q=80" alt="Mood">
                    <span>Dark & Emotional</span>
                </div>
                <div class="mood-card">
                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=300&q=80" alt="Mood">
                    <span>Adventurous & Epic</span>
                </div>
                <div class="mood-card">
                    <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=300&q=80" alt="Mood">
                    <span>Light & Uplifting</span>
                </div>
            </div>
        </section>

        <!-- Newsletter & Asset 2 Illustration Integration -->
        <section class="lower-section">
            <div class="newsletter-box">
                <div class="newsletter-content">
                    <h3>Join Our Newsletter</h3>
                    <p>Get personalised book recommendations, reading tips and exclusive picks delivered to your inbox.</p>
                    <form action="" method="POST">
                        <input type="email" name="email" placeholder="Your email address" required>
                        <button type="submit">Subscribe</button>
                    </form>
                    <?php if(!empty($newsletter_status)): ?>
                        <p class="newsletter-msg"><?php echo $newsletter_status; ?></p>
                    <?php endif; ?>
                </div>
                <div class="illustration-container">
                    <img src="../assets/images/Bottom left illustration.png" alt="Stacked books and vase illustration">
                </div>
            </div>
        </section>

    </main>

    <!-- Embedded Website-Matching Modal Popup Box -->
    <div id="why-modal-overlay" class="modal-overlay">
        <div class="modal-card">
            <div class="modal-header">
                <i class="fa-solid fa-mug-hot logo-icon-small"></i>
                <h4>BookMatch AI Insight</h4>
            </div>
            <p>This book matches your affinity for character-driven historical fiction and emotional storytelling!</p>
            <div class="modal-action">
                <button id="modal-ok-btn" class="btn-primary">Got it</button>
            </div>
        </div>
    </div>

    <!-- Include Modular Footer -->
    <?php include '../components/footer.php'; ?>

    <script src="../assets/js/main.js"></script>
</body>
</html>