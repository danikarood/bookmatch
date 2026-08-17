<?php
$book_detail = $book_detail ?? null;

if (!$book_detail) {
    $book_map = [
        'the midnight library' => ['title' => 'The Midnight Library', 'author' => 'Matt Haig', 'rating' => 4.8, 'cover' => '../assets/images/book-covers/The midnight library.jpg', 'genre' => 'Fiction', 'description' => 'A moving, mind-bending story about second chances, regret, and the lives we could have lived if we had made different choices.', 'tags' => ['Fiction', 'Contemporary', 'Philosophical'], 'badge' => 'Featured Pick', 'read_time' => '8h 15m', 'price' => '$18.99'],
        'the seven husbands of evelyn hugo' => ['title' => 'The Seven Husbands of Evelyn Hugo', 'author' => 'Taylor Jenkins Reid', 'rating' => 4.7, 'cover' => '../assets/images/book-covers/The seven husbands of evelyn hugo.jpg', 'genre' => 'Historical Fiction', 'description' => 'Aging Hollywood icon Evelyn Hugo finally tells the truth about her glamorous and scandalous life while revealing the one love story she never expected to tell.', 'tags' => ['Fiction', 'Contemporary', 'Romance', 'Historical'], 'badge' => 'Featured Pick', 'read_time' => '7h 30m', 'price' => '$18.99'],
        'fourth wing' => ['title' => 'Fourth Wing', 'author' => 'Rebecca Yarros', 'rating' => 4.8, 'cover' => '../assets/images/book-covers/Fourth Wing.jpeg', 'genre' => 'Romantasy', 'description' => 'An exhilarating fantasy romance where a gifted rider is thrown into a brutal war college, sharpened by danger, loyalty, and the promise of a destiny that could change everything.', 'tags' => ['Fantasy', 'Romance', 'Adventure', 'YA'], 'badge' => 'Bestseller', 'read_time' => '9h 10m', 'price' => '$21.99'],
        'the atlas six' => ['title' => 'The Atlas Six', 'author' => 'Olivie Blake', 'rating' => 4.5, 'cover' => '../assets/images/book-covers/The atlas six.jpg', 'genre' => 'Fantasy', 'description' => 'Six incredibly talented magicians are handpicked to join an elite secret society, where power, ambition, and betrayal can reshape the world.', 'tags' => ['Fantasy', 'Magical', 'Mystery', 'Academic'], 'badge' => 'Top Pick', 'read_time' => '8h 05m', 'price' => '$18.49'],
        'the night circus' => ['title' => 'The Night Circus', 'author' => 'Erin Morgenstern', 'rating' => 4.7, 'cover' => '../assets/images/book-covers/The night circus.jpg', 'genre' => 'Fantasy', 'description' => 'A beautifully atmospheric tale of a magical circus, star-crossed lovers, and a duel played out in shadows, wonder, and illusion.', 'tags' => ['Fantasy', 'Romance', 'Magical'], 'badge' => 'Staff Pick', 'read_time' => '7h 00m', 'price' => '$17.99'],
        'the song of achilles' => ['title' => 'The Song of Achilles', 'author' => 'Madeline Miller', 'rating' => 4.7, 'cover' => '../assets/images/book-covers/The song of achilles.jpg', 'genre' => 'Historical Fiction', 'description' => 'A lyrical retelling of the Iliad centered on Achilles and Patroclus, filled with tenderness, longing, and heartbreak.', 'tags' => ['Mythology', 'Historical', 'Romance'], 'badge' => 'Readers Love It', 'read_time' => '6h 40m', 'price' => '$17.50'],
        'verity' => ['title' => 'Verity', 'author' => 'Colleen Hoover', 'rating' => 4.6, 'cover' => '../assets/images/book-covers/Verity.jpg', 'genre' => 'Thriller', 'description' => 'A tense, psychological page-turner about obsession, deception, and a writer whose manuscript may hide a terrifying truth.', 'tags' => ['Thriller', 'Suspense', 'Dark'], 'badge' => 'Trending', 'read_time' => '6h 30m', 'price' => '$19.20']
    ];

    $requested_book = $_GET['book'] ?? $_GET['title'] ?? $_GET['id'] ?? null;
    $requested_key = strtolower(trim((string) $requested_book));

    if ($requested_key !== '') {
        foreach ($book_map as $slug => $book) {
            if ($slug === $requested_key || strtolower($book['title']) === $requested_key || (string) $requested_key === (string) ($book['id'] ?? '')) {
                $book_detail = $book;
                break;
            }
        }
    }

    if (!$book_detail) {
        $book_detail = $book_map['the seven husbands of evelyn hugo'];
    }
}

$book_detail['tags'] = $book_detail['tags'] ?? ['Fiction', 'Contemporary'];

$title = htmlspecialchars($book_detail['title'] ?? 'Untitled Book');
$author = htmlspecialchars($book_detail['author'] ?? 'Unknown Author');
$rating = htmlspecialchars($book_detail['rating'] ?? '4.5');
$cover = htmlspecialchars($book_detail['cover'] ?? '../assets/images/book-covers/The seven husbands of evelyn hugo.jpg');
$genre = htmlspecialchars($book_detail['genre'] ?? 'Fiction');
$description = htmlspecialchars($book_detail['description'] ?? 'A captivating story that brings together emotion, depth, and unforgettable characters.');
$badge = htmlspecialchars($book_detail['badge'] ?? 'Featured Pick');
$read_time = htmlspecialchars($book_detail['read_time'] ?? '6h');
$price = htmlspecialchars($book_detail['price'] ?? '$14.99');
$tags = $book_detail['tags'];
?>
<div class="book-details-panel">
    <div class="book-details-image-wrap">
        <img src="<?php echo $cover; ?>" alt="<?php echo $title; ?>" class="book-details-cover">
    </div>

    <div class="book-details-content">
        <span class="book-details-badge"><?php echo $badge; ?></span>
        <h2><?php echo $title; ?></h2>
        <p class="book-details-author"><?php echo $author; ?></p>

        <div class="book-details-meta">
            <span class="book-details-rating"><i class="fa-solid fa-star"></i> <?php echo $rating; ?></span>
            <span class="book-details-genre"><?php echo $genre; ?></span>
            <span class="book-details-read-time"><?php echo $read_time; ?></span>
        </div>

        <p class="book-details-description"><?php echo $description; ?></p>

        <div class="book-details-tags">
            <?php foreach ($tags as $tag): ?>
                <span><?php echo htmlspecialchars($tag); ?></span>
            <?php endforeach; ?>
        </div>

        <div class="book-details-actions">
            <button class="book-details-primary">Read Now</button>
            <button class="book-details-secondary">Save Book</button>
            <span class="book-details-price"><?php echo $price; ?></span>
        </div>
    </div>
</div>
