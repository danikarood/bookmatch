<?php
// frontend/dashboard.php
session_start();
require_once __DIR__ . '/../backend/config/database.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$firstName = $_SESSION['first_name'] ?? 'Reader';

// Fetch all books joined with the authors table to get the author's name
$stmt = $pdo->query("SELECT b.*, a.name AS author_name FROM books b LEFT JOIN authors a ON b.author_id = a.id");
$all_books = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Strictly filter: Only keep books where the numerical rating is 3.5 or higher
$books_data = array_filter($all_books, function($b) {
    $rating = isset($b['rating']) ? floatval($b['rating']) : 0;
    return $rating >= 3.5;
});

// Safely collect hidden books (< 3.5 rating) for the hidden library
$hidden_library = array_filter($all_books, function($b) {
    $rating = isset($b['rating']) ? floatval($b['rating']) : 0;
    return $rating > 0 && $rating < 3.5;
});

$total_books = count($books_data);
$recent_books = $books_data;

// Filter categories dynamically using database column data (only from visible books)
$booktok_books = array_filter($books_data, fn($b) => in_array($b['title'], ["Fourth Wing", "Iron Flame", "Heartless", "Verity", "The Housemaid"]));
$community_picks = array_filter($books_data, fn($b) => floatval($b['rating'] ?? 0) >= 4.6);

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
    <title>Dashboard - BookMatch</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .book-row-netflix::-webkit-scrollbar {
            display: none;
        }
        .book-row-netflix .book-card, 
        .book-row-netflix > div {
            flex: 0 0 200px;
            max-width: 200px;
        }
        .book-card img, .book-row-netflix img, .book-row img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 8px;
        }
        .book-card {
            background: #fff;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .book-card h4 {
            font-size: 15px;
            margin: 10px 0 5px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .book-card p {
            font-size: 13px;
            color: #666;
            margin-bottom: 10px;
        }
        .btn-view-details {
            display: block;
            text-align: center;
            background: transparent;
            border: 1px solid var(--primary-color, #C18844);
            color: var(--primary-color, #C18844);
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .btn-view-details:hover {
            background: var(--primary-color, #C18844);
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- Include Modular Navbar -->
    <?php include '../components/navbar.php'; ?>

    <main class="py-4">

        <!-- Hero Section with Asset 1 Background -->
        <section class="hero-section">
            <div class="hero-bg-img" style="background-image: url('../assets/images/Top-left hero background..jpg');"></div>
            <div class="hero-content">
                <h1>Find the Story<br>That's Meant For You, <?php echo htmlspecialchars($firstName); ?>.</h1>
                <p>Answer a few questions about your mood, tastes and interests and let BookMatch find your perfect next read from thousands of books and real readers.</p>
                <div class="hero-buttons">
                    <button class="btn-primary" onclick="window.location.href='quizzes.php'"><i class="fa-solid fa-wand-magic-sparkles"></i> Find My Match</button>
                    <button class="btn-secondary" onclick="window.scrollTo({top: 600, behavior: 'smooth'});">Browse Books</button>
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
                <?php foreach($recent_books as $b): ?>
                    <div class="book-card">
                        <div>
                            <img src="../assets/images/book-covers/<?php echo htmlspecialchars($b['cover_image'] ?? $b['cover'] ?? 'placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($b['title']); ?>">
                            <h4><?php echo htmlspecialchars($b['title']); ?></h4>
                            <p>By <?php echo htmlspecialchars($b['author_name'] ?? 'Unknown Author'); ?></p>
                        </div>
                        <a href="book-details.php?id=<?php echo $b['id']; ?>" class="btn-view-details">View Details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Trending on BookTok Netflix-style Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Trending on BookTok <i class="fa-brands fa-tiktok" style="color: #C18844;"></i></h3>
                <a href="book.php?category=booktok" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php foreach($booktok_books as $b): ?>
                    <div class="book-card">
                        <div>
                            <img src="../assets/images/book-covers/<?php echo htmlspecialchars($b['cover_image'] ?? $b['cover'] ?? 'placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($b['title']); ?>">
                            <h4><?php echo htmlspecialchars($b['title']); ?></h4>
                            <p>By <?php echo htmlspecialchars($b['author_name'] ?? 'Unknown Author'); ?></p>
                        </div>
                        <a href="book-details.php?id=<?php echo $b['id']; ?>" class="btn-view-details">View Details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Community Picks Netflix-style Row -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Community Picks</h3>
                <a href="book.php?category=community_picks" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php foreach($community_picks as $b): ?>
                    <div class="book-card">
                        <div>
                            <img src="../assets/images/book-covers/<?php echo htmlspecialchars($b['cover_image'] ?? $b['cover'] ?? 'placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($b['title']); ?>">
                            <h4><?php echo htmlspecialchars($b['title']); ?></h4>
                            <p>By <?php echo htmlspecialchars($b['author_name'] ?? 'Unknown Author'); ?></p>
                        </div>
                        <a href="book-details.php?id=<?php echo $b['id']; ?>" class="btn-view-details">View Details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Browse by Genre (Linked to primary genres) -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Browse by Genre</h3>
                <a href="book.php" class="view-all">View all</a>
            </div>
            <div class="mood-row">
                <a href="book.php?primary_genre=Romance" class="mood-card text-decoration-none">
                    <img src="https://images.unsplash.com/photo-1534447677768-be436bb09401?auto=format&fit=crop&w=300&q=80" alt="Romance">
                    <span>Romance</span>
                </a>
                <a href="book.php?primary_genre=Romantasy" class="mood-card text-decoration-none">
                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=300&q=80" alt="Romantasy">
                    <span>Romantasy</span>
                </a>
                <a href="book.php?primary_genre=Thriller" class="mood-card text-decoration-none">
                    <img src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?auto=format&fit=crop&w=300&q=80" alt="Thriller">
                    <span>Mystery & Thriller</span>
                </a>
                <a href="book.php?primary_genre=Fantasy" class="mood-card text-decoration-none">
                    <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=300&q=80" alt="Fantasy">
                    <span>Fantasy</span>
                </a>
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