<?php
session_start();
header('Content-Type: application/json');
require_once '../../config/database.php';

// Get incoming JSON data
$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['quiz_id'], $data['answers'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid data payload.']);
    exit;
}

$quiz_id = $data['quiz_id'];
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; // Optional if guests can take quizzes
$answers = $data['answers']; // Array of answers

try {
    $pdo->beginTransaction();

    // 1. Insert into quiz_results table
    $stmt = $pdo->prepare("INSERT INTO quiz_results (quiz_id, user_id, completed_at) VALUES (?, ?, NOW())");
    $stmt->execute([$quiz_id, $user_id]);
    $result_id = $pdo->lastInsertId();

    // 2. Insert each response into quiz_user_answers table
    $ansStmt = $pdo->prepare("INSERT INTO quiz_user_answers (result_id, question_id, selected_option) VALUES (?, ?, ?)");

    foreach ($answers as $ans) {
        $ansStmt->execute([
            $result_id,
            $ans['question_id'],
            $ans['selected_option']
        ]);
    }

    $pdo->commit();
    echo json_encode(['success' => true, 'result_id' => $result_id]);

} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>