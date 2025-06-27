<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/code.php');
require_once(__DIR__ . '/../utils/qrcode.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request method');
}

try {
    $code = generateRandomCode();
    $qr_image = generateQrcode($code);

    // send created qr code to the page to be displayed!!!!

    $qr_image->saveToFile(__DIR__.'/../database/qr/' . $code . '.svg');


} catch (Exception $e) {
    die('Error generating qrcode:' . $e->getMessage());
}

?>