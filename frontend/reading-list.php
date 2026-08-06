<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Complete library master database reference
$books_data = [
    ["id" => 1, "title" => "My Killer Vacation", "author" => "Tessa Bailey", "rating" => 4.2, "cover" => "My killer vacation.jpg"],
    ["id" => 2, "title" => "Consider Me", "author" => "Becka Mack", "rating" => 4.5, "cover" => "Consider me.jpg"],
    ["id" => 3, "title" => "Play With Me", "author" => "Becka Mack", "rating" => 4.4, "cover" => "Play with me.jpg"],
    ["id" => 4, "title" => "The Seven Husbands of Evelyn Hugo", "author" => "Taylor Jenkins Reid", "rating" => 4.7, "cover" => "The seven husbands of evelyn hugo.jpg"],
    ["id" => 101, "title" => "Fourth Wing", "author" => "Rebecca Yarros", "rating" => 4.8, "cover" => "Fourth Wing.jpeg"],
    ["id" => 102, "title" => "Iron Flame", "author" => "Rebecca Yarros", "rating" => 4.6, "cover" => "Iron flame.jpg"],
    ["id" => 103, "title" => "A Court of Thorns and Roses", "author" => "Sarah J. Maas", "rating" => 4.7, "cover" => "A court of thorns & roses.jpg"]
];

// Fetch saved book IDs from session
$saved_ids = $_SESSION['saved_books'] ?? [];
$want_to_read_books = array_filter($books_data, fn($b) => in_array($b['id'], $saved_ids));
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
    <style>
        .shelf-section { padding: 0 40px; margin-bottom: 40px; }
        .shelf-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .shelf-header h3 { font-size: 20px; color: var(--text-color, #333); }
        .book-row-netflix { display: flex; gap: 16px; overflow-x: auto; scroll-behavior: smooth; padding-bottom: 15px; scrollbar-width: none; -ms-overflow-style: none; }
        .book-row-netflix::-webkit-scrollbar { display: none; }
        .book-row-netflix .book-card, .book-row-netflix > div { flex: 0 0 200px; max-width: 200px; }
        .book-card img, .book-row-netflix img { width: 100%; height: 280px; object-fit: cover; border-radius: 8px; }
    </style>
</head>
<body>

    <?php include __DIR__ . '/../components/navbar.php'; ?>

    <main class="main-content">

        <section class="hero-section" style="padding: 30px 40px; margin-bottom: 30px;">
            <div class="hero-content">
                <h1>My Library</h1>
                <p>Your personal bookshelf, all in one place.</p>
            </div>
        </section>

        <!-- Want to Read Section (Dynamically populated from session bookmarks) -->
        <section class="shelf-section">
            <div class="shelf-header">
                <h3>Want to Read (<?php echo count($want_to_read_books); ?>)</h3>
                <a href="book.php?category=want_to_read" class="view-all">View all</a>
            </div>
            <div class="book-row-netflix">
                <?php 
                if (!empty($want_to_read_books)) {
                    foreach($want_to_read_books as $b) {
                        $title = $b['title']; 
                        $author = $b['author']; 
                        $rating = $b['rating']; 
                        $image = '../assets/images/book-covers/' . $b['cover'];
                        include __DIR__ . '/../components/book-card.php';
                    }
                } else {
                    echo '<p style="color: #a89c8e;">No saved books yet. Go bookmark some from the home page!</p>';
                }
                ?>
            </div>
        </section>

    </main>

    <?php include __DIR__ . '/../components/footer.php'; ?>
    <script src="../assets/js/main.js"></script>
</body>
</html>