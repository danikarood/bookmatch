<?php
// Reusable book card component accepting parameters
$title = $title ?? "The Night Circus";
$author = $author ?? "Erin Morgenstern";
$rating = $rating ?? "4.7";
$image = $image ?? "https://images.unsplash.com/photo-1543002588-bfa74002ed7e?auto=format&fit=crop&w=200&q=80";
?>
<div class="book-card" onclick="window.location.href='book-details.php'">
    <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>">
    <i class="fa-regular fa-bookmark bookmark-overlay"></i>
    <h4><?php echo htmlspecialchars($title); ?></h4>
    <p><?php echo htmlspecialchars($author); ?></p>
    <div class="mini-rating"><i class="fa-solid fa-star"></i> <?php echo htmlspecialchars($rating); ?></div>
</div>