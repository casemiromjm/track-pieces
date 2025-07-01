<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/code.php');
require_once(__DIR__ . '/../utils/qrcode_generator.php');
require_once(__DIR__ . '/../utils/qrcode_result.php');
require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/qrcode_db.php');
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

    $session->set('qr', $qr_result->getDataUri());

    header('Location: ../pages/generate_qrcode.php');
    exit;

} catch (Exception $e) {
    die('Error generating qrcode: ' . $e->getMessage());
}

?>