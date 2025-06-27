<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/code.php');
require_once(__DIR__ . '/../utils/qrcode.php');
require_once(__DIR__ . '/../utils/session.php');

$session = new Session();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request method');
}

try {

    while (isCodeDuplicate( $code = generateRandomCode() ));
    $qr_result = generateQrcode($code); 

    $session->set('qr', $qr_result->getDataUri());

    $qr_result->saveToFile(__DIR__.'/../database/qr/' . $code . '.svg');

    header('Location: ../pages/generate_qrcode.php');
    exit;

} catch (Exception $e) {
    die('Error generating qrcode:' . $e->getMessage());
}

?>