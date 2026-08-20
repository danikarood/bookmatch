<?php
session_start();
require_once '../../config/database.php';

// Check if result_id is passed via GET or POST
$result_id = isset($_REQUEST['result_id']) ? intval($_REQUEST['result_id']) : 0;

if ($result_id <= 0) {
    header("Location: ../../frontend/quizzes.php?error=invalid_session");
    exit;
}

try {
    // 1. Fetch the quiz session details and associated answers
    $stmt = $pdo->prepare("
        r.quiz_id, r.user_id, qa.question_id, qa.selected_option 
        FROM quiz_results r
        JOIN quiz_user_answers qa ON r.result_id = qa.result_id
        WHERE r.result_id = ?
    ");
    $stmt->execute([$result_id]);
    $answers = $stmt->fetchAll();

    if (empty($answers)) {
        throw new Exception("No answers found for this quiz session.");
    }

    $quiz_id = $answers[0]['quiz_id'];

    // 2. Simple calculation logic: Find the most frequently selected option or map to a result type
    $optionCounts = [];
    foreach ($answers as $ans) {
        $option = trim($ans['selected_option']);
        if (!isset($optionCounts[$option])) {
            $optionCounts[$option] = 0;
        }
        $optionCounts[$option]++;
    }

    // Determine the dominant choice/personality/genre outcome
    arsort($optionCounts);
    $dominantOption = key($optionCounts);

    // Map the outcome to a readable result summary (customize based on your quiz logic)
    $resultSummary = "Result Match: " . ucfirst($dominantOption);

    // 3. Update the quiz_results table with the calculated summary
    $updateStmt = $pdo->prepare("UPDATE quiz_results SET result_summary = ? WHERE result_id = ?");
    $updateStmt->execute([$resultSummary, $result_id]);

    // 4. Redirect the user to a results view page or display the recommendation
    // (Ensure you have a results display page set up, or redirect to a profile/dashboard page)
    header("Location: ../../frontend/quiz-results.php?result_id=" . $result_id);
    exit;

} catch (Exception $e) {
    // Handle calculation errors gracefully
    die("Error calculating quiz results: " . $e->getMessage());
}
?>