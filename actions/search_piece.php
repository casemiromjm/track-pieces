<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/db.php');
require_once(__DIR__ . '/../utils/session.php');

$session = new Session();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request method');
}

$qrcode_data = $_POST['qrcode-data'] ?? '000000';

try {
    $db = getDatabaseConnection();

    $stmt = $db->prepare('SELECT * FROM Piece WHERE qrcode=:piece_qrcode');
    $stmt->execute([':piece_qrcode' => $qrcode_data]);
    $piece = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$piece) {
        header('Location: ../pages/menu.php?msg=piece-not-found');
    }

    $session->set('piece', $piece);

    // (string) é provisorio
    header('Location: ../pages/show_piece.php?qrcode=' . urlencode((string)$piece['qrcode']));
    exit;

} catch (Exception $e) {
    die('Error while searchin for a piece: ' . $e->getMessage());
}

?>
