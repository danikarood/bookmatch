<?php
// frontend/book-details.php
session_start();
require_once __DIR__ . '/../backend/config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$book_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch book details along with author info
$stmt = $pdo->prepare("SELECT b.*, a.name AS author_name FROM books b LEFT JOIN authors a ON b.author_id = a.id WHERE b.id = ?");
$stmt->execute([$book_id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($book['title']); ?> - BookMatch</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .details-page-wrapper {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .book-details-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            padding: 40px;
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 40px;
            align-items: start;
        }
        .book-details-cover img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .book-details-info h1 {
            font-size: 32px;
            color: #1a1a1a;
            margin-bottom: 8px;
            line-height: 1.2;
        }
        .book-details-info .author {
            font-size: 16px;
            color: #666;
            margin-bottom: 16px;
        }
        .book-details-info .author strong {
            color: #333;
        }
        .rating-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fdf8f0;
            color: #b7791f;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .rating-badge i {
            color: #ecc94b;
        }
        .book-synopsis-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .book-details-info .description {
            font-size: 15px;
            line-height: 1.7;
            color: #555;
            margin-bottom: 25px;
        }
        .action-buttons {
            display: flex;
            gap: 12px;
        }
        .back-nav {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-color, #C18844);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .back-nav:hover {
            text-decoration: underline;
        }
        @media(max-width: 768px) {
            .book-details-card {
                grid-template-columns: 1fr;
                padding: 20px;
            }
            .book-details-cover img {
                max-width: 220px;
                margin: 0 auto;
                display: block;
            }
        }
    </style>
</head>
<body>

    <?php include '../components/navbar.php'; ?>

    <main class="details-page-wrapper">
        <a href="dashboard.php" class="back-nav"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>

        <div class="book-details-card">
            <div class="book-details-cover">
                <img src="../assets/images/book-covers/<?php echo htmlspecialchars($book['cover_image'] ?? $book['cover'] ?? 'placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
            </div>
            <div class="book-details-info">
                <h1><?php echo htmlspecialchars($book['title']); ?></h1>
                <p class="author">By <strong><?php echo htmlspecialchars($book['author_name'] ?? 'Unknown Author'); ?></strong></p>
                
                <div class="rating-badge">
                    <i class="fa-solid fa-star"></i>
                    <span><?php echo htmlspecialchars($book['rating'] ?? '4.5'); ?> / 5.0</span>
                </div>

                <div class="book-synopsis-title">About this book</div>
                <p class="description">
                    <?php echo nl2br(htmlspecialchars($book['description'] ?? 'Small-town romance meets a gripping storyline with deep emotional resonance and characters you will fall in love with.')); ?>
                </p>

                <div class="action-buttons">
                    <button class="btn-primary" style="display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa-regular fa-bookmark"></i> Save Book
                    </button>
                </div>
            </div>
        </div>
    </main>

    <?php include '../components/footer.php'; ?>

</body>
</html>