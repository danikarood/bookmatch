<?php
$host = 'localhost';
$dbname = 'bookmatch';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $quiz_type = $_GET['type'] ?? 'next-read';
    
    // Haal vrae op vir hierdie spesifieke quiz
    $stmt = $pdo->prepare("SELECT * FROM questions WHERE quiz_type = ?");
    $stmt->execute([$quiz_type]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Databasis fout: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookMatch Quiz - <?php echo htmlspecialchars($quiz_type); ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #fbf7f0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 40px; color: #2b221e; }
        .quiz-engine-box { max-width: 800px; margin: 0 auto; background: #fffdf9; padding: 40px; border-radius: 20px; border: 1px solid #e6d7c3; box-shadow: 0 16px 40px rgba(56, 40, 28, 0.07); }
        h1 { color: #c88c42; margin-bottom: 20px; font-family: Georgia, serif; }
        .question-block { margin-bottom: 25px; }
        .submit-btn { background: #c88c42; color: white; border: none; padding: 12px 24px; border-radius: 10px; cursor: pointer; font-size: 16px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="quiz-engine-box">
        <h1>Quiz: <?php echo ucwords(str_replace('-', ' ', $quiz_type)); ?></h1>
        
        <?php if (empty($questions)): ?>
            <p>Geen vrae gevind vir hierdie quiz in die databasis nie. Voeg asseblief SQL-data by!</p>
        <?php else: ?>
            <form action="save_results.php" method="POST">
                <?php foreach ($questions as $index => $q): ?>
                    <div class="question-block">
                        <p><strong><?php echo ($index + 1) . '. ' . htmlspecialchars($q['question_text']); ?></strong></p>
                        <!-- Voeg opsies hier by volgens jou databasis struktuur -->
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="submit-btn">Submit Quiz</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>