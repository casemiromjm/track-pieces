<?php
declare(strict_types=1);

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/qrcode_result.php');

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\Writer\PngWriter;

class QrcodeGenerator {
    // members

    private int $size = 300;
    private int $margin = 10;
    private string $encoding = 'UTF-8';
    private string $writerType = 'png';
    private ErrorCorrectionLevel $errorCorrection = ErrorCorrectionLevel::High;
    private RoundBlockSizeMode $roundBlockMode = RoundBlockSizeMode::Margin;

    // methods

    public function __construct() {

    }

    /**
     * Generates a Qrcode with a certain code
     * @param string $data The data that will be stored in the Qrcode
     */
    public function generate(string $data) {

        $writer = match($this->writerType) {
            'svg' => new SvgWriter(),
            default => new PngWriter(),
        };

        $builder = new Builder(
            writer: $writer,
            writerOptions: [],
            validateResult: false,
            data: $data,
            encoding: new Encoding($this->encoding),
            errorCorrectionLevel: $this->errorCorrection,
            size: $this->size,
            margin: $this->margin,
            roundBlockSizeMode: $this->roundBlockMode,
        );

        return new QrcodeResult($builder->build(), $data);
    }

    // PARA USAR, PRECISA MUDAR A MANEIRA COMO GUARDA O ARQUIVO
    public function useSvg() : self {
        $this->writerType = 'svg';

        return $this;
    }
}

?>