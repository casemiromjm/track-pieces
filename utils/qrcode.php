<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\SvgWriter;

/**
 * Creates a Qrcode with a certain code
 * @param mixed $code The code that will be stored in the Qrcode
 */
function createQrcode($code) {
    $builder = new Builder(
        writer: new SvgWriter(),
        writerOptions: [],
        validateResult: false,
        data: $code,
        encoding: new Encoding('UTF-8'),
        errorCorrectionLevel: ErrorCorrectionLevel::High,
        size: 300,
        margin: 10,
        roundBlockSizeMode: RoundBlockSizeMode::Margin,
    );

    return $builder->build();
}

?>