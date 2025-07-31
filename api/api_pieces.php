<?php
declare(strict_types=1);

require_once(__DIR__.'/../database/db.php');

$db = getDatabaseConnection();

// get all pieces
$stmt = $db->prepare('SELECT * FROM Piece ORDER BY piece_ID ASC');
$stmt->execute();

$pieces = $stmt->fetchAll();

echo json_encode($pieces);

?>