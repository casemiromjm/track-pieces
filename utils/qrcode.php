<?php
declare(strict_types=1);

require_once(__DIR__ . '/../vendor/autoload.php');

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\SvgWriter;

/**
 * Generates a Qrcode with a certain code
 * @param mixed $code The code that will be stored in the Qrcode
 */
function generateQrcode($code) {
    $builder = new Builder(
        writer: new SvgWriter(),
        writerOptions: [],
        validateResult: false,
        data: (string)$code,
        encoding: new Encoding('UTF-8'),
        errorCorrectionLevel: ErrorCorrectionLevel::High,
        size: 300,
        margin: 10,
        roundBlockSizeMode: RoundBlockSizeMode::Margin,
    );

    return $builder->build();
}

function storeQrcode($qr) {

}

?>