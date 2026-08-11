<?php
// Exact array matching your local dataset and image filenames
$books_data = [
    ["id" => 1, "title" => "The Midnight Library", "author" => "Matt Haig", "genre" => "Fiction", "rating" => 4.8, "cover" => "The midnight library.jpg"],
    ["id" => 101, "title" => "The Fourth Wing", "author" => "Rebecca Yarros", "genre" => "Romantasy", "rating" => 4.8, "cover" => "Fourth Wing.jpeg"],
    ["id" => 102, "title" => "The Seven Husbands of Evelyn Hugo", "author" => "Taylor Jenkins Reid", "genre" => "Historical Fiction", "rating" => 4.8, "cover" => "The seven husbands of evelyn hugo.jpg"],
    ["id" => 103, "title" => "Icebreaker", "author" => "Hannah Grace", "genre" => "Romance", "rating" => 4.6, "cover" => "Icebreaker.jpg"],
    ["id" => 104, "title" => "Powerless", "author" => "Elsie Silver", "genre" => "Contemporary Romance", "rating" => 4.5, "cover" => "Powerless.jpg"],
    ["id" => 301, "title" => "The House in the Cerulean Sea", "author" => "TJ Klune", "genre" => "Fantasy", "rating" => 4.5, "cover" => "The house in the cerulean sea.jpg"],
    ["id" => 402, "title" => "Daisy Jones & The Six", "author" => "Taylor Jenkins Reid", "genre" => "Historical Fiction", "rating" => 4.6, "cover" => "Daisy jones and the six.jpg"],
    ["id" => 404, "title" => "Lessons in Chemistry", "author" => "Bonnie Garmus", "genre" => "Historical Fiction", "rating" => 4.6, "cover" => "Lessons in chemistry.jpg"],
    ["id" => 506, "title" => "The Seven Year Slip", "author" => "Ashley Poston", "genre" => "Romance", "rating" => 4.5, "cover" => "The seven year slip.jpg"]
];

// Display top 5 books for Popular This Week
$popular_books = array_slice($books_data, 0, 5);

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
    <title>BookMatch - Community</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- Include Modular Navbar -->
    <?php include '../components/navbar.php'; ?>

    <!-- Main Container -->
    <main class="main-content community-page">

        <!-- Hero Section -->
        <section class="community-hero">
            <div class="community-hero-content">
                <h1>The stories we love<br>are better <em>together.</em></h1>
                <p>Join a community of readers who share your passion for books, ideas, and meaningful conversations.</p>
                <div class="community-hero-actions">
                    <a href="#" class="btn-primary">Explore Community <i class="fa-solid fa-users"></i></a>
                    <a href="#" class="btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Create Post</a>
                </div>
            </div>
            <div class="community-hero-quote">
                <blockquote>
                    &ldquo;Books are a uniquely portable magic.&rdquo;
                    <span>- Stephen King</span>
                </blockquote>
                <span class="inspiration-label">This week's inspiration</span>
            </div>
        </section>

        <!-- Top Grid Section -->
        <div class="community-grid-top">
            
            <!-- Featured Readers Card -->
            <section class="community-card featured-readers-card">
                <div class="card-header">
                    <h3>Featured Readers</h3>
                    <a href="#" class="view-all">View all &gt;</a>
                </div>
                <div class="readers-row">
                    <div class="reader-item">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&auto=format&fit=crop&q=80" alt="Olivia M.">
                        <h4>Olivia M.</h4>
                        <span class="handle">@oliviaslibrary</span>
                        <p class="bio">Lover of literary fiction and slow mornings.</p>
                        <span class="badge">Top Reviewer</span>
                        <div class="reader-stats">
                            <div><strong>128</strong><span>Reviews</span></div>
                            <div><strong>2.4K</strong><span>Followers</span></div>
                            <div><strong>356</strong><span>Following</span></div>
                        </div>
                    </div>
                    <div class="reader-item">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" alt="Ethan R.">
                        <h4>Ethan R.</h4>
                        <span class="handle">@ethanshelves</span>
                        <p class="bio">Fantasy enthusiast and world-building nerd.</p>
                        <span class="badge">Rising Contributor</span>
                        <div class="reader-stats">
                            <div><strong>94</strong><span>Reviews</span></div>
                            <div><strong>1.8K</strong><span>Followers</span></div>
                            <div><strong>210</strong><span>Following</span></div>
                        </div>
                    </div>
                    <div class="reader-item">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80" alt="Maya L.">
                        <h4>Maya L.</h4>
                        <span class="handle">@mayalovesbooks</span>
                        <p class="bio">Romance reader with a soft spot for poets.</p>
                        <span class="badge">Book Club Host</span>
                        <div class="reader-stats">
                            <div><strong>76</strong><span>Reviews</span></div>
                            <div><strong>1.6K</strong><span>Followers</span></div>
                            <div><strong>132</strong><span>Following</span></div>
                        </div>
                    </div>
                    <div class="reader-item">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80" alt="Noah K.">
                        <h4>Noah K.</h4>
                        <span class="handle">@noahbooks</span>
                        <p class="bio">Non-fiction seeker and lifelong learner.</p>
                        <span class="badge">Top Reviewer</span>
                        <div class="reader-stats">
                            <div><strong>102</strong><span>Reviews</span></div>
                            <div><strong>2.1K</strong><span>Followers</span></div>
                            <div><strong>287</strong><span>Following</span></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Reader Reviews Box -->
            <section class="community-card reader-reviews-card">
                <div class="card-header">
                    <h3>Reader Reviews</h3>
                    <a href="#" class="view-all">View all reviews &gt;</a>
                </div>
                <div class="review-highlight-content">
                    <img src="../assets/images/book-covers/The night circus.jpg" alt="The Night Circus" class="review-book-cover" onerror="this.src='../assets/images/book-covers/The%20midnight%20library.jpg'">
                    <div class="review-info">
                        <div class="reviewer-meta">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=150&auto=format&fit=crop&q=80" alt="Sophie L." class="mini-avatar">
                            <div>
                                <h5>Sophie L.</h5>
                                <span class="time-ago">3 days ago</span>
                            </div>
                        </div>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            <span>5.0</span>
                        </div>
                        <h4>A masterpiece of imagination and wonder.</h4>
                        <p>&ldquo;The Night Circus is pure magic. Erin Morgenstern creates a world that feels like a dream you never want to wake up from.&rdquo;</p>
                        <div class="review-actions">
                            <span><i class="fa-regular fa-heart"></i> 128</span>
                            <span><i class="fa-regular fa-comment"></i> 24</span>
                            <i class="fa-regular fa-bookmark bookmark-icon"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Book Clubs Box -->
            <section class="community-card book-clubs-card">
                <div class="card-header">
                    <h3>Book Clubs</h3>
                    <a href="#" class="view-all">View all clubs &gt;</a>
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

        <!-- Atmospheric Banner 1 -->
        <!-- Atmospheric Banner 1 -->
        <div class="community-visual-banner" style="background-image: url('../assets/images/Community%201.png');">
            <div class="banner-overlay-content">
                <h3>The Reader’s Nook</h3>
                <p>Curl up with a warm cup of coffee, a cozy blanket, and your next unforgettable story.</p>
            </div>
        </div>

        <!-- Bottom Grid Section -->
        <div class="community-grid-bottom">

            <!-- Reading Challenges -->
            <section class="community-card challenges-card">
                <div class="card-header">
                    <h3>Reading Challenges</h3>
                    <a href="#" class="view-all">View all challenges &gt;</a>
                </div>
                <div class="challenges-row">
                    <div class="challenge-box">
                        <div class="challenge-bg" style="background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=300&auto=format&fit=crop&q=80');"></div>
                        <h4>12 Books in 12 Months</h4>
                        <p>Read 12 books this year</p>
                        <div class="progress-bar"><div class="fill" style="width: 58%;"></div></div>
                        <span class="progress-count">7 / 12</span>
                    </div>
                    <div class="challenge-box">
                        <div class="challenge-bg" style="background-image: url('https://images.unsplash.com/photo-1474366521846-f46cb572a398?w=300&auto=format&fit=crop&q=80');"></div>
                        <h4>Read More Poetry</h4>
                        <p>Read 6 poetry books</p>
                        <div class="progress-bar"><div class="fill" style="width: 50%;"></div></div>
                        <span class="progress-count">3 / 6</span>
                    </div>
                    <div class="challenge-box">
                        <div class="challenge-bg" style="background-image: url('https://images.unsplash.com/photo-1512820790803-83ca734da794?w=300&auto=format&fit=crop&q=80');"></div>
                        <h4>Try a New Genre</h4>
                        <p>Step outside your comfort zone</p>
                        <div class="progress-bar"><div class="fill" style="width: 40%;"></div></div>
                        <span class="progress-count">2 / 5</span>
                    </div>
                </div>
            </section>

            <!-- Trending Discussions -->
            <section class="community-card discussions-card">
                <div class="card-header">
                    <h3>Trending Discussions</h3>
                    <a href="#" class="view-all">View all discussions &gt;</a>
                </div>
                <div class="discussion-list">
                    <div class="discussion-item">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&auto=format&fit=crop&q=80" alt="Olivia M." class="mini-avatar">
                        <div class="discussion-content">
                            <h5>Which book had the biggest impact on you this year (so far)?</h5>
                            <span>Started by Olivia M. • 128 replies</span>
                        </div>
                        <i class="fa-solid fa-fire fire-icon"></i>
                    </div>
                    <div class="discussion-item">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" alt="Ethan R." class="mini-avatar">
                        <div class="discussion-content">
                            <h5>The best opening lines in literature?</h5>
                            <span>Started by Ethan R. • 96 replies</span>
                        </div>
                        <i class="fa-solid fa-fire fire-icon"></i>
                    </div>
                    <div class="discussion-item">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80" alt="Maya L." class="mini-avatar">
                        <div class="discussion-content">
                            <h5>Hardcovers or paperbacks: what's your preference and why?</h5>
                            <span>Started by Maya L. • 72 replies</span>
                        </div>
                    </div>
                </div>
                <a href="#" class="more-conversations">More conversations happening now</a>
            </section>

            <!-- Popular This Week Section -->
            <section class="community-card popular-weekly-card">
                <div class="card-header">
                    <h3>Popular This Week</h3>
                    <a href="#" class="view-all">View all &gt;</a>
                </div>
                <div class="popular-books-row">
                    <?php foreach($popular_books as $book): ?>
                        <div class="popular-book-item">
                            <img src="../assets/images/book-covers/<?php echo rawurlencode($book['cover']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
                            <h5 class="book-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                            <p class="book-author"><?php echo htmlspecialchars($book['author']); ?></p>
                            <div class="book-rating"><i class="fa-solid fa-star"></i> <span><?php echo htmlspecialchars($book['rating']); ?></span></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

        </div>

        <!-- Atmospheric Banner 2 -->
        <!-- Atmospheric Banner 2 -->
        <div class="community-visual-banner" style="background-image: url('../assets/images/Community%202.png');">
            <div class="banner-overlay-content">
                <h3>The Library Archive</h3>
                <p>Explore timeless volumes, secret maps, and treasured stories preserved across the ages.</p>
            </div>
        </div>

        <!-- Newsletter Section -->
        <section class="lower-section">
            <div class="newsletter-box">
                <div class="newsletter-content">
                    <h3>Stay in the loop</h3>
                    <p>Get the latest bookish discussions, club updates, and reading inspiration.</p>
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