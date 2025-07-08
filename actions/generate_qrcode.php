<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/code.php');
require_once(__DIR__ . '/../utils/qrcode_generator.php');
require_once(__DIR__ . '/../utils/qrcode_result.php');
require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/qrcode_storage.php');
require_once(__DIR__ . '/../database/db.php');

$session = new Session();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request method');
}

try {

    $code = (new RandomCodeGenerator())->generate();
    $qr_result = (new QrcodeGenerator())->generate($code);

    $storage = new QrcodeStorage($db = getDatabaseConnection());
    $storage->saveQrcode($qr_result);

    $session->set('qrcode-data', $qr_result->getData());
    $session->set('qrcode-imgpath', $storage->getLastQrcode()['qrcode_img']);

    header('Location: ../pages/add_piece.php');
    exit;

} catch (Exception $e) {
    die('Error generating qrcode: ' . $e->getMessage());
}

?>