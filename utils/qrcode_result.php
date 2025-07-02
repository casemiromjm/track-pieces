<?php

use Endroid\QrCode\Writer\Result\ResultInterface;

class QrcodeResult {
    // members

    private ResultInterface $qr_result;
    private string $data;
    private string $fileExt;

    // methods

    public function __construct(ResultInterface $qr_result, string $data, string $fileExt) {
        $this->qr_result = $qr_result;
        $this->data = $data;
        $this->fileExt = $fileExt;
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

    public function getFileExt() : string {
        return $this->fileExt;
    }
}

?>