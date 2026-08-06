<?php
// Static Data Array matching your exact home/dashboard book structure
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMatch - Complete Book Catalog</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Specific tweaks for the catalog grid layout page */
        .catalog-container {
            max-width: 1350px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .catalog-header {
            margin-bottom: 30px;
            text-align: center;
        }
        .catalog-header h1 {
            font-size: 36px;
            color: var(--text-color, #333);
            margin-bottom: 10px;
        }
        .catalog-header p {
            color: #777;
            font-size: 14px;
        }
        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 24px;
        }
        .books-grid .book-card, 
        .books-grid > div {
            width: 100%;
            max-width: none;
        }
        .books-grid img {
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

    <!-- Main Catalog Container -->
    <main class="main-content catalog-container">
        
        <div class="catalog-header">
            <h1>Complete Book Catalog</h1>
            <p>Explore all <?php echo $total_books; ?> dashboard books available in your library collection.</p>
        </div>

        <div class="books-grid">
            <?php 
            foreach($books_data as $b) {
                $title = $b['title']; 
                $author = $b['author']; 
                $rating = $b['rating']; 
                $image = '../assets/images/book-covers/' . $b['cover'];
                include '../components/book-card.php';
            }
            ?>
        </div>

    </main>

    <!-- Include Modular Footer -->
    <?php include '../components/footer.php'; ?>

    <script src="../assets/js/main.js"></script>
</body>
</html>