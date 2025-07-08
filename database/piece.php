<?php
declare(strict_types=1);

require_once(__DIR__ . '/piece_storage.php');

class Piece {
    // members

    private string $img_path;
    private string $type;
    private string $brand;
    private float $value;
    private int $qnt;
    private string $qrcode_data;
    private bool $isBroke = false;
    private bool $isInEvent = false;

    // methods

    public function __construct(string $img_path, string $type, string $brand, float $value, int $qnt, string $qrcode_data) {
        $this->img_path = $img_path;
        $this->type = $type;
        $this->brand = $brand;
        $this->value = $value;
        $this->qnt = $qnt;
        $this->qrcode_data = $qrcode_data;
    }

    public function isBroke() : bool {
        return $this->isBroke;
    }

    public function isInEvent() : bool {
        return $this->isInEvent;
    }

    public function setIsBroke(bool $val) : void {
        $this->isBroke = $val;
    }

    public function setIsInEvent(bool $val) : void {
        $this->isInEvent = $val;
    }

    public function getImgPath() : string {
        return $this->img_path;
    }

    public function getType() : string {
        return $this->type;
    }

    public function getBrand() : string {
        return $this->brand;
    }

    public function getValue() : float {
        return $this->value;
    }

    public function getQuantity() : int {
        return $this->qnt;
    }

    public function getQrcodeData() : string {
        return $this->qrcode_data;
    }

    
}

?>