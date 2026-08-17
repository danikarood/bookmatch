<?php
$title = $title ?? 'Mood Match';
$subtitle = $subtitle ?? 'Find the book that matches your current vibe.';
$description = $description ?? 'Answer a few quick questions to discover your next perfect read.';
$questions = $questions ?? 8;
$duration = $duration ?? '5 min';
$participants = $participants ?? '12k';
$image = $image ?? 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=900&q=80';
$link = $link ?? '#';
$badge = $badge ?? 'Personality Quiz';
?>
<div class="quiz-card" onclick="window.location.href='<?php echo htmlspecialchars($link, ENT_QUOTES, 'UTF-8'); ?>'">
    <div class="quiz-card-image">
        <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>">
    </div>
    <div class="quiz-card-content">
        <span class="quiz-card-badge"><?php echo htmlspecialchars($badge, ENT_QUOTES, 'UTF-8'); ?></span>
        <h3><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h3>
        <p class="quiz-card-subtitle"><?php echo htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="quiz-card-description"><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?></p>

        <div class="quiz-card-meta">
            <span><i class="fa-solid fa-circle-question"></i> <?php echo htmlspecialchars($questions, ENT_QUOTES, 'UTF-8'); ?> Qs</span>
            <span><i class="fa-regular fa-clock"></i> <?php echo htmlspecialchars($duration, ENT_QUOTES, 'UTF-8'); ?></span>
            <span><i class="fa-solid fa-users"></i> <?php echo htmlspecialchars($participants, ENT_QUOTES, 'UTF-8'); ?></span>
        </div>

        <button class="quiz-card-button" type="button">Take Quiz</button>
    </div>
</div>
