<?php

use Endroid\QrCode\Writer\Result\ResultInterface;

class QrcodeResult {
    // members

    private ResultInterface $qr_result;
    private string $data;

    // methods

    public function __construct(ResultInterface $qr_result, string $data) {
        $this->qr_result = $qr_result;
        $this->data = $data;
    }

    public function getData() : string {
        return $this->data;
    }

    public function getDataUri() : string {
        return $this->qr_result->getDataUri();
    }

    public function saveToFile(string $path) {
        return $this->qr_result->saveToFile($path);
    }
}

?>