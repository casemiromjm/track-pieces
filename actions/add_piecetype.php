<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/db.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request method');
}

$new_piecetype = $_POST['new-piecetype'] ?? '';
$new_piecetype = strtolower($new_piecetype);

try {
    $db = getDatabaseConnection();

    $checkStmt = $db->prepare('SELECT COUNT(*) FROM PieceType WHERE type=:new_piecetype');
    $checkStmt->execute([':new_piecetype' => $new_piecetype]);
    
    if ($checkStmt->fetchColumn() > 0) {
        die('This piece type already exists');
    }

    $stmt = $db->prepare('INSERT INTO PieceType (type) VALUES (:new_piecetype)');
    $stmt->execute([':new_piecetype' => $new_piecetype,]);

    header('Location: ../pages/menu.php?msg=added-new-piecetype');
    exit;

} catch (Exception $e) {
    die('Error adding a new piece type: ' . $e->getMessage());
}

?>