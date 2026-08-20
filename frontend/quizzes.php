<?php
// Verbind met jou databasis en haal dinamiese vrae-tellings op
$host = 'localhost';
$dbname = 'bookmatch';
$username = 'root';
$password = '';

$quiz_counts = [];
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tel hoeveel vrae per quiz in die databasis is
    $stmt = $pdo->prepare("SELECT quiz_type, COUNT(*) as total FROM questions GROUP BY quiz_type");
    $stmt->execute();
    $quiz_counts = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
} catch (PDOException $e) {
    // Val terug op standaard waardes as databasis nie beskikbaar is nie
}

// Hulpfunksie vir tellings
function getCount($type, $default, $counts) {
    return isset($counts[$type]) ? $counts[$type] . ' questions' : $default;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMatch - Quizzes</title>
    <link rel="icon" href="../assets/images/Title%20logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-cream: #fbf7f0;
            --panel: #fffdf9;
            --border: #e6d7c3;
            --text-main: #2b221e;
            --muted: #7a6e65;
            --accent-gold: #c88c42;
            --accent-dark: #9e6324;
            --shadow: 0 16px 40px rgba(56, 40, 28, 0.07);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: var(--bg-cream);
            color: var(--text-main);
            overflow-x: hidden;
            min-height: 100vh;
        }

        .quiz-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 30px 80px;
        }

        .quiz-section-wrapper {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 32px;
            padding: 60px;
            margin-bottom: 60px;
            box-shadow: var(--shadow);
            position: relative;
        }

        .quiz-tag {
            display: inline-block;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            font-weight: 700;
            color: var(--accent-dark);
            margin-bottom: 15px;
        }

        .quiz-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin: 10px 0 20px 0;
            color: var(--accent-gold);
        }

        .quiz-title {
            font-size: clamp(38px, 4.5vw, 62px);
            font-weight: 400;
            line-height: 1.08;
            color: var(--text-main);
            margin-bottom: 20px;
            font-family: Georgia, serif;
        }

        .quiz-title span {
            color: var(--accent-gold);
            font-style: italic;
        }

        .quiz-description {
            font-size: 16px;
            line-height: 1.7;
            color: var(--muted);
            margin-bottom: 30px;
            max-width: 600px;
        }

        .quiz-info-cards {
            display: flex;
            gap: 16px;
            margin-bottom: 35px;
        }

        .info-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 16px 22px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
        }

        .info-card i {
            font-size: 20px;
            color: var(--accent-gold);
        }

        .info-card .label {
            font-size: 11px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .info-card .value {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-main);
        }

        .quiz-buttons {
            display: flex;
            flex-direction: column;
            gap: 14px;
            max-width: 440px;
        }

        .btn-primary-quiz {
            background: linear-gradient(135deg, #c88c42 0%, #a66e2c 100%);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 18px 28px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 20px rgba(200, 140, 66, 0.25);
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary-quiz:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(200, 140, 66, 0.35);
        }

        .quiz-features-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid var(--border);
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .feature-icon {
            width: 44px;
            height: 44px;
            background: rgba(200, 140, 66, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-gold);
            font-size: 18px;
            flex-shrink: 0;
        }

        .feature-text h4 {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 4px;
            color: var(--text-main);
        }

        .feature-text p {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.5;
        }

        .layout-next-read {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 50px;
            align-items: center;
        }

        .visual-bookstack {
            background: #f4ebd0;
            border-radius: 24px;
            overflow: hidden;
            height: 520px;
            position: relative;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.05);
        }

        .visual-bookstack img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .layout-personality {
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .personality-visual-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .personality-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 8px 24px rgba(0,0,0,0.03);
        }

        .personality-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 12px;
        }

        .personality-card h4 {
            font-size: 16px;
            font-family: Georgia, serif;
            margin-bottom: 6px;
        }

        .personality-card p {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.4;
        }

        .layout-genre {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 50px;
            align-items: center;
        }

        .genre-bookshelf-visual {
            background: #2b1d12;
            border-radius: 24px;
            padding: 24px;
            border: 4px solid #483321;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            height: 500px;
            overflow: hidden;
        }

        .genre-bookshelf-visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .layout-mood {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 50px;
            align-items: center;
        }

        .mood-visual {
            border-radius: 24px;
            overflow: hidden;
            height: 280px;
            position: relative;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .mood-visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 1024px) {
            .layout-next-read, .layout-personality, .layout-genre, .layout-mood {
                grid-template-columns: 1fr;
            }
            .quiz-features-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <?php include '../components/navbar.php'; ?>

    <main class="quiz-container">

        <!-- 1. PERSONALIZED RECOMMENDATION QUIZ -->
        <section class="quiz-section-wrapper" id="next-read">
            <div class="layout-next-read">
                <div class="visual-bookstack">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=900&q=80" alt="Book Stack">
                </div>
                <div>
                    <span class="quiz-tag"><i class="fa-solid fa-sparkles"></i> Personalized Recommendation Quiz</span>
                    <h1 class="quiz-title">What's My <span>Next Read?</span></h1>
                    <div class="quiz-divider"><i class="fa-solid fa-diamond"></i></div>
                    <p class="quiz-description">Answer a few thoughtful questions and we’ll recommend the perfect book for your next adventure.</p>
                    
                    <div class="quiz-info-cards">
                        <div class="info-card">
                            <i class="fa-regular fa-clock"></i>
                            <div>
                                <div class="label">Estimated time</div>
                                <div class="value">2-3 minutes</div>
                            </div>
                        </div>
                        <div class="info-card">
                            <i class="fa-solid fa-list-ul"></i>
                            <div>
                                <div class="label">Questions</div>
                                <div class="value"><?php echo getCount('next-read', '10 questions', $quiz_counts); ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="quiz-buttons">
                        <a href="../backend/quiz/quiz-engine.php?type=mood" class="btn-primary-quiz">
                            <span>Start Quiz</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="quiz-features-row">
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-book-open"></i></div>
                    <div class="feature-text"><h4>Personal</h4><p>Tailored to your mood and preferences.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-compass"></i></div>
                    <div class="feature-text"><h4>Discover</h4><p>Find books you’ll love but never knew existed.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-heart"></i></div>
                    <div class="feature-text"><h4>Smart Matches</h4><p>Backed by reader insights and community love.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-bolt"></i></div>
                    <div class="feature-text"><h4>Quick & Fun</h4><p>A short quiz for your next great read.</p></div>
                </div>
            </div>
        </section>

        <!-- 2. READING PERSONALITY QUIZ -->
        <section class="quiz-section-wrapper" id="reading-personality">
            <div class="layout-personality">
                <div>
                    <span class="quiz-tag">Personality Quiz</span>
                    <h1 class="quiz-title">What's My Reading <span>Personality?</span></h1>
                    <div class="quiz-divider"><i class="fa-solid fa-diamond"></i></div>
                    <p class="quiz-description">Discover what kind of reader you truly are and receive personalised recommendations based on your reading style.</p>
                    
                    <div class="quiz-info-cards">
                        <div class="info-card">
                            <i class="fa-regular fa-clock"></i>
                            <div>
                                <div class="label">Estimated time</div>
                                <div class="value">3 minutes</div>
                            </div>
                        </div>
                        <div class="info-card">
                            <i class="fa-solid fa-list-ul"></i>
                            <div>
                                <div class="label">Questions</div>
                                <div class="value"><?php echo getCount('personality', '12 questions', $quiz_counts); ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="quiz-buttons">
                        <a href="../backend/quiz/quiz-engine.php?type=mood" class="btn-primary-quiz">
                            <span>Start Quiz</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="personality-visual-grid">
                    <div class="personality-card">
                        <img src="https://images.unsplash.com/photo-1524578271613-d550eacf6090?auto=format&fit=crop&w=400&q=80" alt="Dreamer">
                        <h4>The Dreamer</h4>
                        <p>Stories that transport you.</p>
                    </div>
                    <div class="personality-card">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=400&q=80" alt="Thinker">
                        <h4>The Thinker</h4>
                        <p>Stories that spark thoughts.</p>
                    </div>
                    <div class="personality-card">
                        <img src="https://images.unsplash.com/photo-1526243741027-444d633d7365?auto=format&fit=crop&w=400&q=80" alt="Explorer">
                        <h4>The Explorer</h4>
                        <p>Adventure and discovery.</p>
                    </div>
                    <div class="personality-card">
                        <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?auto=format&fit=crop&w=400&q=80" alt="Empath">
                        <h4>The Empath</h4>
                        <p>Deep connections.</p>
                    </div>
                </div>
            </div>

            <div class="quiz-features-row">
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-heart"></i></div>
                    <div class="feature-text"><h4>Understand Yourself</h4><p>Learn what makes your reading heart beat.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-book"></i></div>
                    <div class="feature-text"><h4>Personalised Picks</h4><p>Get book recommendations tailored to you.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-users"></i></div>
                    <div class="feature-text"><h4>Join Community</h4><p>Connect with readers who share your style.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-sparkles"></i></div>
                    <div class="feature-text"><h4>Celebrate Reading</h4><p>Because every reader has a unique story.</p></div>
                </div>
            </div>
        </section>

        <!-- 3. GENRE QUIZ -->
        <section class="quiz-section-wrapper" id="perfect-genre">
            <div class="layout-genre">
                <div>
                    <span class="quiz-tag">Genre Quiz</span>
                    <h1 class="quiz-title">What's My Perfect Reading <span>Genre?</span></h1>
                    <div class="quiz-divider"><i class="fa-solid fa-diamond"></i></div>
                    <p class="quiz-description">Let's discover which genre fits your personality best through an interactive bookshelf layout.</p>
                    
                    <div class="quiz-info-cards">
                        <div class="info-card">
                            <i class="fa-regular fa-clock"></i>
                            <div>
                                <div class="label">Estimated time</div>
                                <div class="value">2 minutes</div>
                            </div>
                        </div>
                        <div class="info-card">
                            <i class="fa-solid fa-list-ul"></i>
                            <div>
                                <div class="label">Questions</div>
                                <div class="value"><?php echo getCount('genre', '10 questions', $quiz_counts); ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="quiz-buttons">
                        <a href="../backend/quiz/quiz-engine.php?type=genre" class="btn-primary-quiz">
                            <span>Start Quiz</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="genre-bookshelf-visual">
                    <img src="https://images.unsplash.com/photo-1524578271613-d550eacf6090?auto=format&fit=crop&w=900&q=80" alt="Bookshelf">
                </div>
            </div>

            <div class="quiz-features-row">
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-sparkles"></i></div>
                    <div class="feature-text"><h4>Discover Match</h4><p>Find the genre that resonates with who you are.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-book-bookmark"></i></div>
                    <div class="feature-text"><h4>Personalised Picks</h4><p>Get book recommendations tailored to genre.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-users"></i></div>
                    <div class="feature-text"><h4>Join Community</h4><p>Connect with readers who share your taste.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-star"></i></div>
                    <div class="feature-text"><h4>Celebrate Stories</h4><p>Because every genre has a world for you.</p></div>
                </div>
            </div>
        </section>

        <!-- 4. MOOD MATCH QUIZ -->
        <section class="quiz-section-wrapper" id="reading-mood">
            <div class="layout-mood">
                <div>
                    <span class="quiz-tag">Mood Match Quiz</span>
                    <h1 class="quiz-title">Find a Book for Your <span>Mood</span></h1>
                    <div class="quiz-divider" style="justify-content: flex-start;"><i class="fa-solid fa-diamond"></i></div>
                    <p class="quiz-description">Whether you're feeling adventurous, relaxed, nostalgic or inspired, we'll recommend books that match your mood.</p>
                    
                    <div class="quiz-info-cards" style="max-width: 500px;">
                        <div class="info-card">
                            <i class="fa-regular fa-clock"></i>
                            <div>
                                <div class="label">Estimated time</div>
                                <div class="value">90 seconds</div>
                            </div>
                        </div>
                        <div class="info-card">
                            <i class="fa-solid fa-list-ul"></i>
                            <div>
                                <div class="label">Questions</div>
                                <div class="value"><?php echo getCount('mood', '8 questions', $quiz_counts); ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="quiz-buttons">
                        <a href="../backend/quiz/quiz-engine.php?type=mood" class="btn-primary-quiz">
                            <span>Start Quiz</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="mood-visual">
                    <img src="../assets/images/whats my reading mood.png" alt="Reading Moods">
                </div>
            </div>

            <div class="quiz-features-row">
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-heart"></i></div>
                    <div class="feature-text"><h4>Mood-Based Picks</h4><p>Books that fit exactly how you're feeling.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-face-smile"></i></div>
                    <div class="feature-text"><h4>Feel Understood</h4><p>Because the right book changes your day.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-sparkles"></i></div>
                    <div class="feature-text"><h4>Discover More</h4><p>Explore new stories matching your vibe.</p></div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon"><i class="fa-solid fa-book-open"></i></div>
                    <div class="feature-text"><h4>Share Mood</h4><p>See what others are reading and feeling now.</p></div>
                </div>
            </div>
        </section>

    </main>

    <?php include '../components/footer.php'; ?>
</body>
</html>