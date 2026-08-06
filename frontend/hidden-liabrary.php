<?php
// Dataset for Archived Books
$archive_books = [
    [
        "id" => 1,
        "title" => "The Whispering Tide",
        "author" => "Sarah Tolcser",
        "genre" => "Literary Fiction",
        "rating" => 2.4,
        "reason" => "Not the right time",
        "description" => "A coastal town holds its breath as the tide reveals secrets better left buried.",
        "date" => "May 12, 2024",
        "cover" => "The whispering tide .jpg"
    ],
    [
        "id" => 2,
        "title" => "Letters We Never Sent",
        "author" => "Donna Lee Roberts",
        "genre" => "Literary Fiction",
        "rating" => 2.2,
        "reason" => "Too similar",
        "description" => "A collection of unsent letters that trace a love story through what was left unsaid.",
        "date" => "Apr 28, 2024",
        "cover" => "Letters we never sent.jpg"
    ],
    [
        "id" => 3,
        "title" => "Ashfall",
        "author" => "Mike Mullin",
        "genre" => "Gothic Horror",
        "rating" => 2.6,
        "reason" => "Changed my mind",
        "description" => "When ash falls like snow, survival is only the beginning of the story.",
        "date" => "Mar 30, 2024",
        "cover" => "Ashfall.jpg"
    ],
    [
        "id" => 4,
        "title" => "The Clockmaker's Daughter",
        "author" => "Kate Mortan",
        "genre" => "Historical Fiction",
        "rating" => 2.7,
        "reason" => "Not for me",
        "description" => "In a city of gears and secrets, she was never meant to fit in.",
        "date" => "Mar 18, 2024",
        "cover" => "The clockmasters daughter.jpg"
    ],
    [
        "id" => 5,
        "title" => "Beneath the Broken ",
        "author" => "Colleen Hoover",
        "genre" => "Historical Fiction",
        "rating" => 2.3,
        "reason" => "Too similar",
        "description" => "Some dreams shine brightest in the places we try hardest to leave.",
        "date" => "Apr 02, 2024",
        "cover" => "Beneath the broken.jpg"
    ],
    [
        "id" => 6,
        "title" => "Silent Orchids",
        "author" => "Morgan Wylie",
        "genre" => "Speculative Fiction",
        "rating" => 2.5,
        "reason" => "Not the right time",
        "description" => "Beauty hides. Betrayal blooms. Silence remembers.",
        "date" => "Apr 11, 2024",
        "cover" => "Silent orchids.jpg"
    ],
    [
        "id" => 7,
        "title" => "The Winter Child",
        "author" => "Cassandra Parkin",
        "genre" => "Nordic Noir",
        "rating" => 2.8,
        "reason" => "Changed my mind",
        "description" => "A girl with no memory. A village with no past. A truth that won't stay buried.",
        "date" => "Feb 14, 2024",
        "cover" => "The winter child.jpg"
    ],
    [
        "id" => 8,
        "title" => "Echoes of Yesterday",
        "author" => "Vaibhav Palhade",
        "genre" => "Magical Realism",
        "rating" => 2.9,
        "reason" => "Not for me",
        "description" => "The past is a patient storyteller. Stories repeat.",
        "date" => "Mar 22, 2024",
        "cover" => "Echoes of yesterday.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMatch - The Meridian Archive</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="archive-body">

    <!-- Include Navbar -->
    <?php include '../components/navbar.php'; ?>

    <main class="main-content archive-page">

        <!-- Archive Hero Header -->
        <section class="archive-hero">
            <div class="archive-hero-inner">
                <span class="archive-subtitle">THE MERIDIAN ARCHIVE &middot; EST: 2016</span>
                <h1>The Hidden Library:<br><em>Forgotten & Archived Stories</em></h1>
                <p>Works that fell beneath the threshold &mdash; but whose architecture endures.<br>Every volume here was structurally preserved by the Archive Council.</p>
            </div>
        </section>

        <!-- On the Archive System Info Box -->
        <section class="archive-info-box">
            <div class="info-icon"><i class="fa-solid fa-lock"></i></div>
            <div class="info-content">
                <h4>On the Archive System</h4>
                <p>Works in this collection received aggregate ratings below <strong>3.5 stars</strong> upon initial release and were removed from public shelves under the Standard Curation Protocol. The Archive Council reviews each removal for structural merit &mdash; prose craft, narrative architecture, thematic originality &mdash; independent of popular reception.</p>
            </div>
            <div class="info-aside">
                <p>Books that pass structural review are preserved here indefinitely.<br>Ratings shown reflect original public scores and have not been revised.</p>
            </div>
        </section>

        <!-- Filter By Genre Section -->
        <div class="filter-section">
            <span class="filter-label">FILTER BY GENRE:</span>
            <div class="genre-filter-row">
                <button class="genre-btn active" data-genre="all">
                    <i class="fa-solid fa-box-archive"></i>
                    <span>All</span>
                    <small>8 Volumes</small>
                </button>
                <button class="genre-btn" data-genre="Literary Fiction">
                    <i class="fa-solid fa-feather"></i>
                    <span>Literary Fiction</span>
                    <small>3 Volumes</small>
                </button>
                <button class="genre-btn" data-genre="Gothic Horror">
                    <i class="fa-solid fa-chess-rook"></i>
                    <span>Gothic Horror</span>
                    <small>1 Volume</small>
                </button>
                <button class="genre-btn" data-genre="Historical Fiction">
                    <i class="fa-solid fa-landmark"></i>
                    <span>Historical Fiction</span>
                    <small>2 Volumes</small>
                </button>
                <button class="genre-btn" data-genre="Speculative Fiction">
                    <i class="fa-solid fa-eye"></i>
                    <span>Speculative Fiction</span>
                    <small>1 Volume</small>
                </button>
                <button class="genre-btn" data-genre="Afrofuturism">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    <span>Afrofuturism</span>
                    <small>1 Volume</small>
                </button>
                <button class="genre-btn" data-genre="Nordic Noir">
                    <i class="fa-solid fa-tree"></i>
                    <span>Nordic Noir</span>
                    <small>1 Volume</small>
                </button>
                <button class="genre-btn" data-genre="Magical Realism">
                    <i class="fa-solid fa-hat-wizard"></i>
                    <span>Magical Realism</span>
                    <small>1 Volume</small>
                </button>
            </div>
        </div>

        <!-- Archive Statistics Bar -->
        <div class="archive-stats-bar">
            <div class="stat-item">
                <i class="fa-solid fa-book-open"></i>
                <div>
                    <strong>8</strong>
                    <span>VOLUMES ARCHIVED</span>
                </div>
            </div>
            <div class="stat-item">
                <i class="fa-solid fa-comments"></i>
                <div>
                    <strong>2,841</strong>
                    <span>STRUCTURAL REVIEWS</span>
                </div>
            </div>
            <div class="stat-item">
                <i class="fa-solid fa-star"></i>
                <div>
                    <strong>1.94</strong>
                    <span>AVG. ORIGINAL RATING</span>
                </div>
            </div>
            <div class="stat-item">
                <i class="fa-solid fa-clock"></i>
                <div>
                    <strong>2016</strong>
                    <span>OLDEST ENTRY</span>
                </div>
            </div>
            <div class="sort-wrapper">
                <label for="sortSelect">Sort by:</label>
                <select id="sortSelect">
                    <option value="recent">Recently Archived</option>
                    <option value="rating-asc">Rating: Low to High</option>
                    <option value="title">Title (A-Z)</option>
                </select>
            </div>
        </div>

        <!-- Books Grid -->
        <div class="archive-books-grid" id="archiveGrid">
            <?php foreach($archive_books as $book): ?>
                <div class="archive-card" data-genre="<?php echo htmlspecialchars($book['genre']); ?>">
                    <div class="archive-card-cover">
                        <img src="../assets/images/book-covers/<?php echo rawurlencode($book['cover']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
                    </div>
                    <div class="archive-card-info">
                        <h3><?php echo htmlspecialchars($book['title']); ?></h3>
                        <span class="author"><?php echo htmlspecialchars($book['author']); ?></span>
                        <div class="rating-row">
                            <div class="stars">
                                <?php 
                                $rating = $book['rating'];
                                for($i=1; $i<=5; $i++):
                                    if($i <= floor($rating)):
                                        echo '<i class="fa-solid fa-star"></i>';
                                    elseif($i - $rating < 1):
                                        echo '<i class="fa-solid fa-star-half-stroke"></i>';
                                    else:
                                        echo '<i class="fa-regular fa-star"></i>';
                                    endif;
                                endfor;
                                ?>
                            </div>
                            <span class="score"><?php echo number_format($rating, 1); ?></span>
                        </div>
                        <div class="archive-meta">
                            <span class="meta-label">Archive Reason</span>
                            <span class="meta-value"><i class="fa-solid fa-rotate"></i> <?php echo htmlspecialchars($book['reason']); ?></span>
                        </div>
                        <p class="description"><?php echo htmlspecialchars($book['description']); ?></p>
                        <div class="archived-date">
                            <i class="fa-regular fa-calendar"></i> Archived on <?php echo htmlspecialchars($book['date']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bottom Action Banner -->
        <section class="archive-bottom-banner">
            <div class="archive-banner-content">
                <div class="banner-box-icon"><i class="fa-solid fa-box-archive"></i></div>
                <div>
                    <h3>These stories may not have found their moment, but they haven't lost their meaning.</h3>
                    <p>Thank you for helping us preserve what deserves to be remembered.</p>
                </div>
                <a href="#" class="btn-archived-shelf">View Archived Bookshelf <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </section>

        <!-- Footer Note Subtext -->
        <div class="archive-footer-subtext">
            <span>THE MERIDIAN ARCHIVE &middot; ALL STRUCTURAL REVIEWS ARE FINAL &middot; RATINGS ARE HISTORICAL RECORDS</span>
        </div>

    </main>

    <!-- Include Footer -->
    <?php include '../components/footer.php'; ?>

    <script src="../assets/js/main.js"></script>
</body>
</html>