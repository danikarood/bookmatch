<?php
$book_detail = null;
$book_map = [
    'the midnight library' => ['title' => 'The Midnight Library', 'author' => 'Matt Haig', 'rating' => 4.8, 'cover' => '../assets/images/book-covers/The midnight library.jpg', 'genre' => 'Fiction', 'description' => 'A moving, mind-bending story about second chances, regret, and the lives we could have lived if we had made different choices.', 'tags' => ['Fiction', 'Contemporary', 'Philosophical'], 'badge' => 'Featured Pick', 'read_time' => '8h 15m', 'price' => '$18.99'],
    'the seven husbands of evelyn hugo' => ['title' => 'The Seven Husbands of Evelyn Hugo', 'author' => 'Taylor Jenkins Reid', 'rating' => 4.7, 'cover' => '../assets/images/book-covers/The seven husbands of evelyn hugo.jpg', 'genre' => 'Historical Fiction', 'description' => 'Aging Hollywood icon Evelyn Hugo finally tells the truth about her glamorous and scandalous life while revealing the one love story she never expected to tell.', 'tags' => ['Fiction', 'Contemporary', 'Romance', 'Historical'], 'badge' => 'Featured Pick', 'read_time' => '7h 30m', 'price' => '$18.99'],
    'fourth wing' => ['title' => 'Fourth Wing', 'author' => 'Rebecca Yarros', 'rating' => 4.8, 'cover' => '../assets/images/book-covers/Fourth Wing.jpeg', 'genre' => 'Romantasy', 'description' => 'An exhilarating fantasy romance where a gifted rider is thrown into a brutal war college, sharpened by danger, loyalty, and the promise of a destiny that could change everything.', 'tags' => ['Fantasy', 'Romance', 'Adventure', 'YA'], 'badge' => 'Bestseller', 'read_time' => '9h 10m', 'price' => '$21.99'],
    'the atlas six' => ['title' => 'The Atlas Six', 'author' => 'Olivie Blake', 'rating' => 4.5, 'cover' => '../assets/images/book-covers/The atlas six.jpg', 'genre' => 'Fantasy', 'description' => 'Six incredibly talented magicians are handpicked to join an elite secret society, where power, ambition, and betrayal can reshape the world.', 'tags' => ['Fantasy', 'Magical', 'Mystery', 'Academic'], 'badge' => 'Top Pick', 'read_time' => '8h 05m', 'price' => '$18.49'],
    'the night circus' => ['title' => 'The Night Circus', 'author' => 'Erin Morgenstern', 'rating' => 4.7, 'cover' => '../assets/images/book-covers/The night circus.jpg', 'genre' => 'Fantasy', 'description' => 'A beautifully atmospheric tale of a magical circus, star-crossed lovers, and a duel played out in shadows, wonder, and illusion.', 'tags' => ['Fantasy', 'Romance', 'Magical'], 'badge' => 'Staff Pick', 'read_time' => '7h 00m', 'price' => '$17.99'],
    'the song of achilles' => ['title' => 'The Song of Achilles', 'author' => 'Madeline Miller', 'rating' => 4.7, 'cover' => '../assets/images/book-covers/The song of achilles.jpg', 'genre' => 'Historical Fiction', 'description' => 'A lyrical retelling of the Iliad centered on Achilles and Patroclus, filled with tenderness, longing, and heartbreak.', 'tags' => ['Mythology', 'Historical', 'Romance'], 'badge' => 'Readers Love It', 'read_time' => '6h 40m', 'price' => '$17.50'],
    'verity' => ['title' => 'Verity', 'author' => 'Colleen Hoover', 'rating' => 4.6, 'cover' => '../assets/images/book-covers/Verity.jpg', 'genre' => 'Thriller', 'description' => 'A tense, psychological page-turner about obsession, deception, and a writer whose manuscript may hide a terrifying truth.', 'tags' => ['Thriller', 'Suspense', 'Dark'], 'badge' => 'Trending', 'read_time' => '6h 30m', 'price' => '$19.20']
];

$requested = $_GET['book'] ?? $_GET['title'] ?? '';
$requested_key = strtolower(trim((string) $requested));

if ($requested_key !== '') {
    foreach ($book_map as $slug => $book) {
        if ($slug === $requested_key || strtolower($book['title']) === $requested_key) {
            $book_detail = $book;
            break;
        }
    }
}

if (!$book_detail) {
    $book_detail = $book_map['the seven husbands of evelyn hugo'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($book_detail['title']); ?> | BookMatch</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php include '../components/navbar.php'; ?>

    <main class="main-content" style="padding: 40px 20px; max-width: 1300px; margin: 0 auto;">
        <?php include '../components/book-details.php'; ?>
    </main>

    <?php include '../components/footer.php'; ?>
</body>
</html>
