<?php
declare(strict_types=1);

require_once(__DIR__ . '/../database/piece_storage.php');
require_once(__DIR__ . '/../database/db.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request method');
}

$photo = $_FILES['piece-photo'];
$type = $_POST['piece-type'] ?? '';
$brand = $_POST['piece-brand'] ?? '';
$value = $_POST['piece-value'] ?? 0;
$quantity = $_POST['qnt-piece'] ?? 0;
$qrcode = $_POST['qrcode'] ?? null;
$purchase_date = $_POST['piece-purchase-date'] ?? '';

if (!$type || !$brand || !is_numeric($value) || !is_numeric($quantity) || !$purchase_date) {
    die('Missing or invalid data.');
}

// handle Photo upload
$upload_dir = './database/piece_imgs/';
if (!isset($photo) || $photo['error'] !== UPLOAD_ERR_OK) {
    die('Error uploading photo');
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_file($finfo, $photo['tmp_name']);
finfo_close($finfo);

if (strpos($mime_type, 'image/') !== 0) {
    die('File is not an image');
}

$file_ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
$filename = $qrcode . '.' . $file_ext;
$target_path = $upload_dir . $filename;

if (!move_uploaded_file($photo['tmp_name'], '.' . $target_path)) {
    die('Failed to move file');
}

$new_piece = new Piece ($target_path, strtolower($type), strtolower($brand), floatval($value), intval($quantity), $qrcode, $purchase_date);

try {
    $storage = new PieceStorage( $db = getDatabaseConnection() );
    $storage->savePiece($new_piece);

    header('Location: ../pages/menu.php?msg=added-piece');
    exit;

} catch (Exception $e) {
    die('Error storing piece: ' . $e->getMessage());
}

?>